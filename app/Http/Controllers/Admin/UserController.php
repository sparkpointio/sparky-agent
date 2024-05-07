<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class UserController extends Controller
{
    public function index(Request $request) {
        $users = User::latest()
            ->get();

        return view('admin.users.index', compact('users'));
    }
}
