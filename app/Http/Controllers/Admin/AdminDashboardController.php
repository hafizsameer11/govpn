<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Connection as ModelsConnection;
use App\Models\Server;
use FTP\Connection;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    //
    public function index()
    {
        $totalServers = Server::count();
        $totalConnections = ModelsConnection::count();
        $totalLoad = Server::sum('load');

        return view('admin.dashboard', compact('totalServers', 'totalConnections', 'totalLoad'));
    }
}
