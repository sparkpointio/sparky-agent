<?php

namespace App\Http\Controllers;

use App\Jobs\SendVerificationEmail;
use App\Mail\ResetPasswordMail;
use App\Mail\VerificationMail;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class AuthenticationController extends Controller
{
    public function index() {
        return view('login.index');
    }

    public function login(Request $request) {
        $credentials = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        if(!Auth::attempt($credentials)) {
            abort(422, 'Your provided credentials do not match the records in our system.');
        }

        if(!Auth::user()->email_verified_at) {
            Mail::to(Auth::user()->email)->queue(new VerificationMail(Auth::user()));
            $redirect = route('verification.notice');
        } else {
            $redirect = Redirect::intended('/')->getTargetUrl();
        }

        return response()->json([
            'redirect' => $redirect
        ]);
    }

    public function registerPage() {
        return view('register.index');
    }

    public function register(Request $request) {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string',
            'password_confirmation' => 'required|same:password',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        Mail::to($user->email)->queue(new VerificationMail($user));

        Auth::login($user);

        return response()->json([
            'redirect' => route('verification.notice')
        ]);
    }

    public function logout(Request $request) {
        Auth::logout();
        return redirect()->route('login.index');
    }

    public function forgotPassword(Request $request) {
        $request->validate([
            'email' => 'required|email'
        ]);

        Mail::to($request->email)->queue(new ResetPasswordMail($request->email));

        return response()->json();
    }

    public function resetPasswordView($token) {
        return view('resetPassword.index', ['token' => $token]);
    }

    public function resetPassword(Request $request) {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $passwordResetToken = DB::table('password_reset_tokens')
            ->where('email', $request->email)
            ->where('token', $request->token)
            ->first();

        abort_if(!$passwordResetToken, 422, 'Password reset is invalid.');
        abort_if(Carbon::parse($passwordResetToken->created_at)->addHour() < Carbon::now(), 422, 'Password reset is expired. Please request another password reset.');

        $user = User::where('email', $request->email)
            ->first();

        abort_if(!$user, 422, 'User is invalid.');

        $user->fill([
            'password' => Hash::make($request->password)
        ])->save();

        return  response()->json([
            'redirect' => route('login.index')
        ]);
    }
}
