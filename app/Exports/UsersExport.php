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
        $array = [];
        $start = DB::table('option')->where('name', 'start')->select('time')->value('time');
        $stop  = DB::table('option')->where('name', 'stop')->select('time')->value('time');
        $today   = date('Y-m-d H:i:s', strtotime($stop));
        $yesterday = date('Y-m-d H:i:s', strtotime($start.' - 1 days'));
        $record = DB::table('data')->whereDate('waktu', '>', $yesterday)->whereDate('waktu', '<', $today)->get();
        foreach ($record as $rc) {
            $array[] = '00'.$rc->nik.date('Hi', strtotime($rc->waktu)).date('md', strtotime($rc->waktu));
        }
        $data = collect($array)->transpose()->toArray();
        return $data;

    }
}
