<?php

namespace App\Charts;
use App\Models\WaitingTime;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Carbon\Carbon;
class MonthlyUsersChart
{
    // protected $chart;
    

    // public function __construct(LarapexChart $chart )
    // {
        
    //     $this->chart = $chart;
    // }

    // public function build($site): \ArielMejiaDev\LarapexCharts\LineChart
    // { 
    //     if($site){
    //         $created_at = WaitingTime::where('site_id', $site['site'])->get()->map(function ($data) {
    //             return Carbon::parse($data->created_at)->format('Y-m-d H:i:s');
    //          })->toArray();    
    //         return $this->chart->lineChart()
    //         ->setTitle('Waiting Time & Checklist')
    //         ->addLine('Waiting Time 1', WaitingTime::where('site_id', $site['site'])->get()->pluck('t1')->toArray())
    //         ->addLine('Waiting Time 2', WaitingTime::where('site_id', $site['site'])->get()->pluck('t2')->toArray())
    //         ->setXAxis($created_at)
    //         ->setColors(['#ffc63b', '#008080']);
    //     }else{
    //         $created_at = WaitingTime::all()->map(function ($data) {
    //             return Carbon::parse($data->created_at)->format('Y-m-d H:i:s');
    //          })->toArray();    
    //         return $this->chart->lineChart()
    //         ->setTitle('Waiting Time & Checklist')
    //         ->addLine('Waiting Time 1', \App\Models\WaitingTime::all()->pluck('t1')->toArray())
    //         ->addLine('Waiting Time 2', \App\Models\WaitingTime::all()->pluck('t2')->toArray())
    //         ->setXAxis($created_at)
    //         ->setColors(['#ffc63b', '#008080']);
    //     }
        
    // }
}


