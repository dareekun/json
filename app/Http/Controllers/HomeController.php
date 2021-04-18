<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $record = DB::table('data')->get();
        return view('home', ['record' => $record, 'i' => 1]);
    }

    public function option(){
        $recorda = date('H:i',strtotime(DB::table('option')->where('name', 'time')->select('time')->value('time')));
        $recordb = date('H:i',strtotime(DB::table('option')->where('name', 'start')->select('time')->value('time')));
        $recordc = date('H:i',strtotime(DB::table('option')->where('name', 'stop')->select('time')->value('time')));
        return view('option', ['time' => $recorda, 'start' => $recordb, 'stop' => $recordc]);
    }

    public function export(Request $request){
        DB::table('option')->where('name', 'time')->update([
            'time' => $request->time
        ]);
        return redirect('/option');
    }

    public function schedule(Request $request){
        DB::table('option')->where('name', 'start')->update([
            'time' => $request->start
        ]);
        DB::table('option')->where('name', 'stop')->update([
            'time' => $request->stop
        ]);
        return redirect('/option');
    }
}
