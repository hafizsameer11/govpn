<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Server;
use Illuminate\Http\Request;

class AdminServerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $servers = Server::with('country')->get();
        return view('admin.servers.index', compact('servers'));
    }

    public function create()
    {
        $countries = Country::all();
        return view('admin.servers.create', compact('countries'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'country_id' => 'required|exists:countries,id',
            'ip_address'=>'required',
            'isPremium'=>'required'
        ]);

        Server::create($request->all());
        return redirect()->route('admin.servers.index')->with('success', 'Server created successfully.');
    }

    public function edit(Server $server)
    {
        $countries = Country::all();
        return view('admin.servers.edit', compact('server', 'countries'));
    }

    public function update(Request $request, Server $server)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'country_id' => 'required|exists:countries,id',
            'isPremium'=>'required'
        ]);

        $server->update($request->all());
        return redirect()->route('admin.servers.index')->with('success', 'Server updated successfully.');
    }

    public function destroy(Server $server)
    {
        $server->delete();
        return redirect()->route('admin.servers.index')->with('success', 'Server deleted successfully.');
    }
}
