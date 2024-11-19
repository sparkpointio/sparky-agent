<?php

namespace App\Http\Controllers\Admin;

use App\Exports\UsersExport;
use App\Models\Item;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    public function index(Request $request) {
        if ($request->ajax()) {
            $data = User::latest();

            return DataTables::of($data)
                ->addColumn('date_time_registered', function ($row) {
                    return Carbon::parse($row['created_at'])->setTimezone('Asia/Manila')->isoFormat('llll');
                })
                ->addColumn('user_role', function ($row) {
                    return userRoles()[$row['role']];
                })
                ->addColumn('name', function ($row) {
                    return $row['first_name'] . ' ' . $row['last_name'];
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
                ->make();
        }

        return view('admin.users.index');
    }

    public function exportExcel() {
        return Excel::download(new UsersExport, 'users.xlsx');
    }
}
