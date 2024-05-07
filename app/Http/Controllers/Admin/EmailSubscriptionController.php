<?php

namespace App\Http\Controllers\Admin;

use App\Models\EmailSubscription;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class EmailSubscriptionController extends Controller
{
    public function index(Request $request) {
        $emailSubscriptions = EmailSubscription::latest()
            ->get();

        return view('admin.email-subscriptions.index', compact('emailSubscriptions'));
    }
}
