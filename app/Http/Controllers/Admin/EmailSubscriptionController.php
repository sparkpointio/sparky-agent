<?php

namespace App\Http\Controllers\Admin;

use App\Models\EmailSubscription;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Yajra\DataTables\DataTables;

class EmailSubscriptionController extends Controller
{
    public function index(Request $request) {
        if ($request->ajax()) {
            $data = EmailSubscription::query();

            return DataTables::of($data)
                ->addColumn('date_time_subscribed', function ($row) {
                    return Carbon::parse($row['created_at'])->setTimezone('Asia/Manila')->isoFormat('llll');
                })
                ->addColumn('name', function ($row) {
                    $data = json_decode($row['data'], true);
                    return $data['name'] ?: 'Not Available';
                })
                ->filterColumn('name', function ($query, $keyword) {
                    $keyword = strtolower($keyword);
                    $query->where('data', 'LIKE',  '%' . $keyword . '%');
                })
                ->rawColumns(['date_time_subscribed', 'name'])
                ->make();
        }

        return view('admin.email-subscriptions.index');
    }
}
