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
    // Fetch countries with related servers and ovpnFiles without caching
    $countries = Country::with('servers.ovpnFiles')->get();

    // Modify the countries data to include the full URL for the flag
    $countries = $countries->map(function ($country) {
        if ($country->flag) {
            $country->flag = asset('storage/' . $country->flag);  // Generate full URL for the flag
        }
        return $country;
    });

    // Return the result as a JSON response
    return response()->json($countries);
}

}
