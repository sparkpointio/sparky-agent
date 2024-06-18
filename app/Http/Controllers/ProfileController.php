<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $countries = getCountryList();

        return view('profile.index', compact('user', 'countries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'birthdate' => 'required|date|before:today',
            'contact_number' => 'required|regex:/^\d+$/',
            'country' => 'required',
        ]);

        $user = Auth::user();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->birthdate = $request->birthdate;
        $user->contact_number = $request->contact_number;
        $user->country = $request->country;

        if($request->gmaps_address) {
            $request->validate([
                'gmaps_address' => 'required|string',
                'street_2' => 'required',
            ]);

            $user->region_id = 0;
            $user->province_id = 0;
            $user->city_id = 0;
            $user->barangay_id = 0;

            $user->gmaps_address = $request->gmaps_address;
            $user->street = $request->street_2;
        } else {
            $request->validate([
                'region_id' => 'required',
                'province_id' => 'required',
                'city_id' => 'required',
                'barangay_id' => 'required',
                'street' => 'required',
            ]);

            $user->gmaps_address = null;

            $user->region_id = $request->region_id;
            $user->province_id = $request->province_id;
            $user->city_id = $request->city_id;
            $user->barangay_id = $request->barangay_id;
            $user->street = $request->street;
        }

        $user->update();

        return response()->json([
            'birthdate' => $user['birthdate'],
            'formattedBirthdate' => Carbon::parse($user['birthdate'])->format('Y-F-d'),
            'address' => $user->completeAddress(),
        ]);
    }

    public function updatePhoto(Request $request)
    {
        $request->validate([
            'photo' => 'required|mimes:jpg,jpeg,png,bmp,tiff,webp|max:10240',
        ]);

        if($request->hasFile('photo')) {
            $file = $request->file('photo');
            $name = $file->hashName();

            $path = $file->storeAs(
                'photos/' . Auth::user()->id, $name, config('filesystems.default')
            );

            $url = Storage::url($path);

            $user = Auth::user();
            $user->photo = $url;
            $user->update();;
        }

        return response()->json([
            'photo' => Auth::user()->photo(),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
