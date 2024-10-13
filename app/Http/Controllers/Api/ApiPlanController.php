<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\Request;

class ApiPlanController extends Controller
{
    public function index(){
        $plans=Plan::all();
        return response()->json($plans);

    }
    public function singleplan(Request $request){
        $id=$request->id;
        $plan=Plan::find($id);
        return response()->json(['status'=>200,'plan'=>$plan]);

    }
}
