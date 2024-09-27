<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\OVPNFile;
use App\Models\Server;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminOVPNFileController extends Controller
{
    /**
     * Display a listing of OVPN files.
     */
    public function index()
    {
        // Fetch OVPN files with associated server
        $ovpnFiles = OVPNFile::with('server')->get();
        return view('admin.ovpn_files.index', compact('ovpnFiles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Fetch servers for the dropdown
        $servers = Server::all();
        return view('admin.ovpn_files.forms', compact('servers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate input data
        $request->validate([
            'server_id' => 'required|exists:servers,id',
            'ovpn_file' => 'required|file',
        ]);

        // Handle file upload
        $file = $request->file('ovpn_file');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('ovpn_files', $fileName, 'public');

        // Create new OVPNFile record
        OVPNFile::create([
            'server_id' => $request->input('server_id'),
            'file_name' => $fileName,
            'file_path' => $filePath, // Make sure you have a 'file_path' column in your OVPNFile model
            'usage_count' => 0,
        ]);

        return redirect()->route('admin.ovpn-files.index')->with('success', 'OVPN file uploaded successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OVPNFile $ovpnFile)
    {
        $servers = Server::all();
        return view('admin.ovpn_files.form', compact('ovpnFile', 'servers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OVPNFile $ovpnFile)
    {
        // Validate input data
        $request->validate([
            'server_id' => 'required|exists:servers,id',
            'ovpn_file' => 'nullable|file|mimes:ovpn',
        ]);

        // Update file if new file is uploaded
        if ($request->hasFile('ovpn_file')) {
            // Delete old file
            if (Storage::disk('public')->exists($ovpnFile->file_path)) {
                Storage::disk('public')->delete($ovpnFile->file_path);
            }

            // Upload new file
            $file = $request->file('ovpn_file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('ovpn_files', $fileName, 'public');

            // Update file name and path
            $ovpnFile->file_name = $fileName;
            $ovpnFile->file_path = $filePath;
        }

        // Update server_id
        $ovpnFile->server_id = $request->input('server_id');
        $ovpnFile->save();

        return redirect()->route('admin.ovpn-files.index')->with('success', 'OVPN file updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OVPNFile $ovpnFile)
    {
        // Delete the file from storage
        if (Storage::disk('public')->exists($ovpnFile->file_path)) {
            Storage::disk('public')->delete($ovpnFile->file_path);
        }

        // Delete the record from database
        $ovpnFile->delete();

        return redirect()->route('admin.ovpn-files.index')->with('success', 'OVPN file deleted successfully.');
    }
}
