<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\Request;

class AdminPlanController extends Controller
{
    //
    public function index()
    {
        $plans = Plan::all();
        return view('admin.plans.index', compact('plans'));
    }
    public function create()
    {
        return view('admin.plans.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'duration' => 'required',
            'price' => 'required'
        ]);
        Plan::create($request->all());
        return redirect()->route('plans.index')->with('success', 'Plan Added Successfully');
    }
    public function edit($id)
    {
        $plan = Plan::find($id);
        return view('admin.plans.edit', compact('plan'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'duration' => 'required',
            'price' => 'required'
        ]);
        $plan = Plan::find($id);
        $plan->update($request->all());
        return redirect()->route('plans.index')->with('success', 'Plan Updated Successfully');
    }
    public function destroy($id)
    {
        $plan = Plan::find($id);
        $plan->delete();
        return redirect()->route('plans.index')->with('success', 'Plan Deleted Successfully');
    }
}
