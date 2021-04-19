<?php

namespace App\Exports;

use App\Cardat;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;

class UsersExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $now = date('Y-m-d H:i:s', strtotime('07:00:00'));
        $yesterday = date('Y-m-d H:i:s', strtotime('07:00:00 - 1 days'));
        DB::table('data')->whereDate('waktu', '2016-12-31');
    }
}
