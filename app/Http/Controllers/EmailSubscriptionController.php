<?php

namespace App\Http\Controllers;

use App\Models\EmailSubscription;
use Illuminate\Http\Request;

class EmailSubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $request->validate([
            'email' => 'required|email',
        ]);

        $emailSubscription = EmailSubscription::where('email', $request->email)
            ->first();

        if($emailSubscription) {
            $data = [];

            if($request->name) {
                $data['name'] = $request->name;
            }

            $emailSubscription->data = json_encode($data);
            $emailSubscription->update();
        } else {
            $data = [];

            if($request->name) {
                $data['name'] = $request->name;
            }

            $emailSubscription = new EmailSubscription();
            $emailSubscription->email = $request->email;
            $emailSubscription->data = json_encode($data);

            $emailSubscription->save();
        }

        return response()->json();
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
