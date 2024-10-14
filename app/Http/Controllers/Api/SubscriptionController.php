<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            
            'plan_id' => 'required',
            'deviceId' => 'required'
        ]);

        $subscriber = new Subscription();
        $subscriber->plan_id = $request->plan_id;
        $subscriber->deviceId = $request->deviceId;
        $subscriber->save();
        return response()->json(['message' => 'Subscription created successfully'], 200);
    }

    public function checksubscription(Request $request)
    {
        $id = $request->deviceId;
        $subscription = Subscription::where('deviceId', $id)->first();
        if ($subscription) {
            return response()->json([
                'status' => true,
                'message' => 'You are already subscribed'
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'You are not subscribed'
            ], 200);
        }
    }
}
