<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Server;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;

class ServerApiController extends Controller
{
    public function index()
    {
        $countries = Country::with('servers')->get();
        $countries = $countries->map(function ($country) {
            if ($country->flag) {
                $country->flag = asset('storage/' . $country->flag);
            }
            $country->servers = $country->servers->map(function ($server) {
                if ($server->isPremium == "true") {
                    $server->premium_flag = asset('storage/icons/premium.png');
                }
                $server->signal = asset('storage/icons/signal.png');
                return $server;
            });

            return $country;
        });
        return response()->json($countries);
    }
    public function countryflag(Request $request)
    {
        $ip = $request->ip;
        return response()->json($ip);
        // $server = Server::where('ip_address', $ip)->with('country')->first();
        // if ($server) {
        //     return response()->json(asset('storage/' . $server->country->flag));

        // }else{
        //     return response()->json(['success'=>false,"message"=>"Server Not Found"],404);
        // }
    }
}
