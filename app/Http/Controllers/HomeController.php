<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Monarobase\CountryList\CountryListFacade;
use Rinvex\Country\Loader;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('home.index');
    }

    public function underConstruction()
    {
        return view('underConstruction.index');
    }

    public function nftPass()
    {
        return view('nftPass.index');
    }

    public function try(Request $request)
    {
        if(config('app.env') == 'production') {
            abort(404);
        }

//        return json_decode(Http::get('https://maps.googleapis.com/maps/api/place/autocomplete/json', [
//            'input' => 'daraga',
//            'components' => 'country:ph',
//            'key' => config('app.google_maps_api_key')
//        ]), true);

        return Loader::countries();

        $user = User::find(1);
        $user->name = 'Bernard Historillo';
        $user->role = 1;
        $user->update();

        return $user->audits()->latest()->get();

        $user = User::find(1);
        $url = route('home.index') . '/' . Str::random(50);
        return view('emails.verification', compact('user', 'url'));
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
