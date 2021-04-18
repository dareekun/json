<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NoLoginController extends Controller
{
    public function post(Request $request){
        $nama = $request->input('Data.CompareInfo.PersonInfo.PersonName');
        $nik = $request->input('Data.CompareInfo.PersonInfo.PersonId');
        $waktu = $request->input('Data.CaptureInfo.CaptureTime');

        DB::table('data')->insert([
            'nama' => $nama,
            'nik' => $nik,
            'waktu' => $waktu
        ]);

        return 'Success';
    }

    public function download(){
        $day   = date('d');
        $month = date('m');
        $year  = date('Y');
        $start = date('H:i',strtotime(DB::table('option')->where('name', 'start')->select('time')->value('time')));
        $stop  = date('H:i',strtotime(DB::table('option')->where('name', 'stop')->select('time')->value('time')));

        return $day;
    }
}
