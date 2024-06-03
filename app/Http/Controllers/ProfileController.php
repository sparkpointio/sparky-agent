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

        return view('profile.index', compact('user'));
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
            'address' => 'required|string',
        ]);

        $user = Auth::user();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->birthdate = $request->birthdate;
        $user->contact_number = $request->contact_number;
        $user->address = $request->address;
        $user->update();

        return response()->json([
            'birthdate' => $user['birthdate'],
            'formattedBirthdate' => Carbon::parse($user['birthdate'])->format('Y-F-d'),
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
