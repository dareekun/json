<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;

class NoLoginController extends Controller
{
    public function post(Request $request){
        DB::table('data')->insert([
            'nama' => $request->input('Data.CompareInfo.PersonInfo.PersonName'),
            'nik' => $request->input('Data.CompareInfo.PersonInfo.PersonId'),
            'waktu' => $request->input('Data.CaptureInfo.CaptureTime')
        ]);
        return 'Success';
    }

    public function download(){
        return (new UsersExport)->download('CARDAT'.date('Ymd').'.SDF', \Maatwebsite\Excel\Excel::CSV);
    }

    public function schedule(){
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
        Storage::disk('data')->put('CARDAT'.date('Ymd').'.SDF', $data);
    }
}