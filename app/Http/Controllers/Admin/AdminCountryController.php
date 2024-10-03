<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminCountryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $countries = Country::all();
        return view('admin.countries.index', compact('countries'));
    }

    // Show form for creating or editing a country (using the same view)
    public function create()
    {
        return view('admin.countries.form');  // Use the same form for both creating and editing
    }

    // Store a newly created country
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'flag' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',  // Validate the flag as an image
        ]);

        $data = $request->all();
        if ($request->hasFile('flag')) {
            $flagPath = $request->file('flag')->store('flags', 'public');  // Store in 'storage/app/public/flags'
            $data['flag'] = $flagPath;
        }

        Country::create($data);

        return redirect()->route('admin.countries.index')->with('success', 'Country created successfully.');
    }

    // Show form for editing the specified country (same form as create)
    public function edit(Country $country)
    {
        return view('admin.countries.form', compact('country'));  // Same form view, passing the country model
    }

    // Update the specified country
    public function update(Request $request, Country $country)
{
    // Validate input including optional flag file upload
    $request->validate([
        'name' => 'required|string|max:255',
        'flag' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'  // Optional flag validation
    ]);

    // Collect data for update
    $data = $request->only('name');

    // Check if a new flag is uploaded
    if ($request->hasFile('flag')) {
        // Store the uploaded flag in the 'flags' folder in public storage
        $flagPath = $request->file('flag')->store('flags', 'public');

        // Add the new flag path to the update data
        $data['flag'] = $flagPath;

        // Optionally: Delete the old flag from storage if needed
        if ($country->flag) {
            Storage::disk('public')->delete($country->flag);
        }
    }

    // Update the country record with the new data
    $country->update($data);

    return redirect()->route('admin.countries.index')->with('success', 'Country updated successfully.');
}


    // Remove the specified country
    public function destroy(Country $country)
    {
        $country->delete();

        return response()->json(['success' => true]);
    }
}
