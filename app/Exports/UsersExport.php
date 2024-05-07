<?php

namespace App\Exports;

use App\Models\User;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\WithMapping;
use Yajra\DataTables\Exports\DataTablesCollectionExport;
use Maatwebsite\Excel\Concerns\FromQuery;

class UsersExport extends DataTablesCollectionExport implements WithMapping, FromQuery
{
    public function query()
    {
        return User::latest();
    }

    public function headings(): array
    {
        return [
            'Name',
            'Email',
            'Date & Time Registered',
            'Role',
        ];
    }

    public function map($row): array
    {
        return [
            $row['name'],
            $row['email'],
            Carbon::parse($row['created_at'])->setTimezone('Asia/Manila')->isoFormat('llll'),
            userRoles()[$row['role']],
        ];
    }
}
