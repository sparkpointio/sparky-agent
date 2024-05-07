<?php

namespace App\Exports;

use App\Models\EmailSubscription;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\WithMapping;
use Yajra\DataTables\Exports\DataTablesCollectionExport;
use Maatwebsite\Excel\Concerns\FromQuery;

class EmailSubscriptionsExport extends DataTablesCollectionExport implements WithMapping, FromQuery
{
    public function query()
    {
        return EmailSubscription::query();
    }

    public function headings(): array
    {
        return [
            'Email',
            'Name',
            'Date & Time Subscribed',
        ];
    }

    public function map($row): array
    {
        return [
            $row['email'],
            $this->name($row),
            Carbon::parse($row['created_at'])->setTimezone('Asia/Manila')->isoFormat('llll')
        ];
    }

    public function name($row) {
        $data = json_decode($row['data'], true);
        return $data['name'] ?: 'Not Available';
    }
}
