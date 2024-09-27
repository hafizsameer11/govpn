<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;

class ServerApiController extends Controller
{
    public function index()
    {
        // Cache the server list for 10 minutes to reduce database queries
        $countries = Cache::remember('countries_with_servers', 600, function () {
            return Country::with('servers.ovpnFiles')->get();
        });

        return response()->json($countries);
    }
}
