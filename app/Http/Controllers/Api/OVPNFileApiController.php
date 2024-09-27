<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Jobs\LogConnectionJob;
use App\Models\Connection;
use App\Models\OVPNFile;
use App\Models\Server;
use Exception;
use Illuminate\Http\Request;

class OVPNFileApiController extends Controller
{
    //
    public function getOvpnFile($serverId, Request $request)
    {
        try {

            $server = Server::findOrFail($serverId);
            $ovpnFile = OVPNFile::where('server_id', $server->id)
                                ->orderBy('usage_count', 'asc')
                                ->first();
            if (!$ovpnFile) {
                return response()->json(['error' => 'OVPN file not found'], 404);
            }
            LogConnectionJob::dispatch($server->id, $request->ip(), $request->input('vpn_username'));
            $ovpnFile->incrementUsage();
            return response()->json(['ovpn_url' => url("storage/ovpn_files/{$ovpnFile->file_name}")]);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    public function disconnect(Request $request)
    {
        try {
            $connection = Connection::where('vpn_username', $request->input('vpn_username'))
                                    ->where('server_id', $request->input('server_id'))
                                    ->firstOrFail();
            $connection->server->decrementLoad();
            $connection->delete();
            return response()->json(['message' => 'Disconnected successfully']);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
