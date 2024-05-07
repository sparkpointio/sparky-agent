<?php

namespace App\Http\Controllers\Admin;

use App\Models\Item;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    public function index(Request $request) {
        if ($request->ajax()) {
            $data = User::latest();

            return DataTables::of($data)
                ->addColumn('date_time_registered', function ($row) {
                    return Carbon::parse($row['created_at'])->isoFormat('llll');
                })
                ->addColumn('user_role', function ($row) {
                    return userRole()[$row['role']];
                })
                ->filterColumn('user_role', function ($query, $keyword) {
                    $keyword = strtolower($keyword);

                    if (str_contains('admin', $keyword)) {
                        $query->where('role', 1);
                    } elseif (str_contains('standard', $keyword)) {
                        $query->where('role', 0);
                    }
                })
                ->addColumn('actions', function ($row) {
                    $content = '
                        <div class="d-flex flex-wrap justify-content-center">
                            <div class="text-center">
                                <a href="' . route('admin.users.show', $row['id']) . '" class="btn btn-custom-1 btn-sm font-size-80 px-3">View</a>
                            </div>
                        </div>';

                    return $content;
                })
                ->rawColumns(['date_time_registered', 'actions'])
                ->make(true);
        }

        return view('admin.users.index');
    }
}
