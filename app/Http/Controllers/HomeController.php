<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WaitingTime;

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
        $wts = WaitingTime::all();
        $t1 = [];
        $t2 = [];
        $t3 = [];
        foreach($wts as $wt){
            array_push($t1, $wt->t1);
            array_push($t2, $wt->t2);
            array_push($t3, $wt->t3);
        }
        if(count($t1)>0){
            $t1 = array_sum($t1)/count($t1);
        }else{
            $t1 = 0;
        }
        if(count($t2)>0){
            $t2 = array_sum($t2)/count($t2);
        }else{
            $t2 = 0;
        }
        if(count($t3)>0){
            $t3 = array_sum($t3)/count($t3);
        }else{
            $t3 = 0;
        }
        return view('home', compact('t1', 't2', 't3'));
    }
}
