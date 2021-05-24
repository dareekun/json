<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


use Auth;
Use Redirect;

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
        $start = DB::table('option')->where('name', 'start')->select('time')->value('time');
		$stop  = DB::table('option')->where('name', 'stop')->select('time')->value('time');
		$today   = date('Y-m-d H:i:s', strtotime($stop));
		$yesterday = date('Y-m-d H:i:s', strtotime($start.' - 1 days'));
		$record = DB::table('data')->whereDate('waktu', '>', $yesterday)->whereDate('waktu', '<', $today)->get();
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

    public function account(){
        return view('account');
    }

    public function password(Request $request){
        $s1 = Auth::user();
        if (Hash::check($request->oldpass, $s1->password)) {
            if ($request->password == $request->confirmpass) {
                DB::table('users')->where('username', $s1->username)->update(
                    [
                        'password' => bcrypt($request->password),
                    ]
                );
                $errors = ['oldpass' => ['Password Berhasil Dirubah']]; 
                return Redirect::back()->withErrors($errors);
            }else {
                $errors = ['oldpass' => ['Password Tidak Sama']]; 
                return Redirect::back()->withErrors($errors);
            }
        }
        else {
            $errors = ['oldpass' => ['Password Salah']]; 
            return Redirect::back()->withErrors($errors);
        }
        if(strcmp($request->oldpass, $user->password) == 0){
            $errors = ['username' => ['Password Tidak Boleh Sama Dengan Password Saat Ini']]; 
            return Redirect::back()->withErrors($errors);
                }
        else {
        }
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
