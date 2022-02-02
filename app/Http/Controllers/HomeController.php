<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WaitingTime;
use App\Models\Site;
use App\Models\Item;
use App\Charts\MonthlyUsersChart;



use ArielMejiaDev\LarapexCharts\LarapexChart;

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
        
        $sites = Site::all();
        
        $wts =  WaitingTime::all();

        return view('home', compact('sites',));
    }

    public function check( Request $request, MonthlyUsersChart $chart)
{
    $wts =  WaitingTime::all();
    $sites = Site::all();
    return view('check', ['chart' => $chart->build($request->all())] , compact('wts','sites'));
} 

   
}
