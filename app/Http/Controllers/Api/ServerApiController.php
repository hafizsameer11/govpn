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
    $countries = Country::with('servers')->get();

    // Modify the countries data
    $countries = $countries->map(function ($country) {
        if ($country->flag) {
            // Generate full URL for the country's flag
            $country->flag = asset('storage/' . $country->flag);
        }

        // Modify the servers for each country
        $country->servers = $country->servers->map(function ($server) {
            if ($server->isPremium=="true") {
                // Add the premium_flag attribute with the correct image path
                $server->premium_flag = asset('storage/icons/premium.png');
            }

            // Add signal attribute with signal image path
            $server->signal = asset('storage/icons/signal.png');

            return $server;
        });

        return $country;
    });

    // Return the modified result as a JSON response
    return response()->json($countries);
}


}
