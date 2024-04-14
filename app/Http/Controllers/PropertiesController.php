<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Throwable;

class PropertiesController extends Controller
{
    /**
     * Display the form for creating a new property.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('properties.create');
    }

    /**
     * Store a newly created property in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'no_of_rooms' => 'required|integer',
            'no_of_bathrooms' => 'required|integer',
            'price' => 'required|numeric',
            'type' => 'required|in:House,Apartment',
            'location' => 'required|string',
            'photo' => 'nullable|image|max:12288', // Assuming a photo is optional, max 12MB
        ]);

        try {
            DB::beginTransaction();

            // Handle the photo upload if there is one
            if ($request->hasFile('photo') && $request->file('photo')->isValid()) {
                // Store the file in the 'public/properties' directory and get the path
                $path = $request->file('photo')->store('properties', 'public');
                // Save the path in the database
                $validatedData['photo'] = $path;
            }

            // Create a new property in the database
            Property::create($validatedData);

            DB::commit();

            return redirect()->route('properties.index')->with('success', 'Property added successfully.');
        } catch (Throwable $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Failed to add the property. Please try again.');
        }
    }

    /**
     * Display the list of all properties.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $properties = Property::all();
        return view('properties.index', compact('properties'));
    }

    /**
     * Display the specified property.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $property = Property::findOrFail($id);
        return view('properties.show', compact('property'));
    }
}
