<?php

namespace App\Http\Controllers;

use App\Models\WaitingTime;
use Illuminate\Http\Request;
use App\Models\Site;
use App\Models\User;
use Auth;
use App\Exports\WaitingTimesExport;
use Excel;
use App\Charts\MonthlyUsersChart;
use App\Charts\WaitingTimeChart;
use Illuminate\Support\Carbon;
use ArielMejiaDev\LarapexCharts\LarapexChart;
class WaitingTimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wts = WaitingTime::whereIn('site_id', Auth::user()->getSites()->pluck('id')->toArray())->orderBy('created_at', 'desc')->paginate(20);
        return view('waiting.index', compact('wts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $sites = Site::all();
        return view('waiting.create', compact('sites'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            't1'=> ['required'],
            't2'=> ['required'],
            'site_id'=> ['required'],
        ]);
        $data = [
            't1' => $request->input('t1'),
            't2' => $request->input('t2'),
            't3' => $request->input('t1')+$request->input('t2'),
            'site_id' => $request->input('site_id'),
            'user_id' => Auth::user()->_id,
            'codeRedStatus' => $request->input('codeRedStatus'),
            'operatorSupervisorOnSite' => $request->input('operatorSupervisorOnSite'),
            'doubleClinicalResourcesPerCabin' => $request->input('doubleClinicalResourcesPerCabin'),
            'homeKitsAvailableOnSite' => $request->input('homeKitsAvailableOnSite'),
            'homeKitsInUseInTheLastHour' => $request->input('homeKitsInUseInTheLastHour'),
            'numberOfLanesClosed' => $request->input('numberOfLanesClosed'),
            'codeRedStatusAndShurtaAlMurourPresent' => $request->input('codeRedStatusAndShurtaAlMurourPresent'),
            'PCRSampleCollectionFrequencyAsScheduled' => $request->input('PCRSampleCollectionFrequencyAsScheduled'),
            'ARTSampleToTakenKitchenContinuously' => $request->input('ARTSampleToTakenKitchenContinuously'),
            'onSiteStocksForPCR_ARTSufficientForDay' => $request->input('onSiteStocksForPCR_ARTSufficientForDay'),
            'HippaFilterOnSiteInARTKitchen' => $request->input('HippaFilterOnSiteInARTKitchen'),
            'dataIsBeingEnteredAsPerTraining' => $request->input('dataIsBeingEnteredAsPerTraining'),
            'shiftToShiftHandoverAsPerOperatorSLA' => $request->input('shiftToShiftHandoverAsPerOperatorSLA'),
            'modeOfOperations' => $request->input('modeOfOperations'),
            'details' => $request->input('details')
        ];
        $wt = WaitingTime::create($data);

        return redirect()->route('waiting.index')->with('success','Waiting time is created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WaitingTime  $waitingTime
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $wt = WaitingTime::find($id);
        return view('waiting.Show', compact('wt'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WaitingTime  $waitingTime
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $wt = WaitingTime::find($id);
        $sites = Site::all();
        return view('waiting.edit', compact('wt','sites'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WaitingTime  $waitingTime
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
            't1'=> ['required'],
            't2'=> ['required'],
            'site_id'=> ['required'],
        ]);

        $wt = WaitingTime::find($id);

        $wt->t1 =  $request->input('t1');
        $wt->t2 =  $request->input('t2');
        $wt->t3 =  $request->input('t1')+$request->input('t2');
        $wt->site_id =  $request->input('site_id');

        $wt->save();

        return redirect()->route('waiting.index')->with('success','Waiting time is Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WaitingTime  $waitingTime
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $wt = WaitingTime::find($id);
        $wt->delete();
        return redirect()->route('waiting.index');
    }

    public function export()
    {
        return Excel::download(new WaitingTimesExport, 'waitingTime.xlsx');
    }

    public function check( Request $request, MonthlyUsersChart $chart  )
{   
    
    $wts =  WaitingTime::all();
    $sites = Site::all();
    

//       if($site){

//         $sites= WaitingTime::where('site_id', $site)->get();

//         $created_at = WaitingTime::where('site_id', $site['site'])->get()->map(function ($data) {
//             return Carbon::parse($data->created_at)->format('Y-m-d H:i:s');
//          })->toArray();
//          $chart = (new LarapexChart)->lineChart()
//         ->setTitle('Waiting Time & Checklist')
//         ->addData('Waiting Time 1', WaitingTime::where('site_id', $site['site'])->get()->pluck('t1')->toArray())
//         ->addData('Waiting Time 2', WaitingTime::where('site_id', $site['site'])->get()->pluck('t2')->toArray())
//         ->setXAxis($created_at)
//         ->setColors(['#ffc63b', '#008080']);

//         $chart1 = (new LarapexChart)->lineChart()
//         ->setTitle('Waiting Time & Checklist')
//         ->addData('Waiting Time 1', WaitingTime::where('site_id', $site['site'])->get()->pluck('t3')->toArray())
//         ->setXAxis($created_at)
//         ->setColors(['#ffc63b', '#008080']);



// }
    
//      else{

        $Yes = WaitingTime::where('operatorSupervisorOnSite', 'Yes')->count();
        $No= WaitingTime::where('operatorSupervisorOnSite', 'No')->count();
        $Yes2 = WaitingTime::where('homeKitsAvailableOnSite', 'Yes')->count();
        $No2= WaitingTime::where('homeKitsAvailableOnSite', 'No')->count();
        // $wts= WaitingTime::first()
        $created_at = WaitingTime::all()->map(function ($data) {
            return Carbon::parse($data->created_at)->format('Y-m-d H:i:s');
         })->toArray();

        $chart =  (new LarapexChart)->lineChart()
        ->setTitle('Waiting Time T1 & T2 (In Minutes)')
        ->addData('Waiting Time 1', \App\Models\WaitingTime::all()->pluck('t1')->toArray())
        ->addData('Waiting Time 2', \App\Models\WaitingTime::all()->pluck('t2')->toArray())
        ->setXAxis($created_at)
        ->setColors(['#ffc63b', '#008080'])
        ->setHeight(462);


        $chart1 =  (new LarapexChart)->lineChart()
        ->setTitle('Waiting Time T3 (In Minutes)')
        ->addData('Waiting Time 3', \App\Models\WaitingTime::all()->pluck('t3')->toArray())
        
        ->setXAxis($created_at)
        ->setColors(['#ffc63b', '#008080'])
        ->setHeight(462);

        $chart2 =  (new LarapexChart)->donutChart()
        
        ->setTitle('Supervisor On Site')
        
        ->addData([$Yes, $No])
        ->setLabels(['Yes', 'No'])
        ->setHeight(108)
        ->setColors(['#0CA8A3', '#DC251C']);
        
        $chart3 =  (new LarapexChart)->donutChart()
        
        ->setTitle('Home Kits Available On Site')
        
        ->addData([$Yes2, $No2])
        ->setLabels(['Yes', 'No'])
        ->setHeight(108)
        ->setColors(['#553AFE', '#01C0F6']);

         
    // }

    // return view('waiting.dashboard', ['chart' => $chart->build($request->all())] , compact('wts','sites'));
    
    return view('waiting.dashboard',  compact('wts','sites', 'chart', 'chart1','chart2','chart3'));
}

    public function siteTracker(Request $request){
        $sites = Site::whereHas('hourlySub')->get();
        $users = User::whereHas('hourlySub')->get();
        $date = $request->has('date') ? Carbon::parse($request->date)->format('d-m-Y') : Carbon::today()->format('d-m-Y');

        $created_at = WaitingTime::where('created_at', [Carbon::parse($date)->startOfDay(), Carbon::parse($date)->endOfDay()])->get()->groupBy(function($date) {
            return Carbon::parse($date->created_at)->format('h');
        })->toArray();
        $wt = WaitingTime::where('created_at', [Carbon::parse($date)->startOfDay(), Carbon::parse($date)->endOfDay()])->pluck('t3')->toArray();

        $chart1 =  (new LarapexChart)->lineChart()
        ->setTitle('Waiting Time & Checklist')
        ->addData('Waiting Time 1',$wt)
        ->setXAxis($created_at)
        ->setColors(['#ffc63b', '#008080'])
        ->setHeight(300);

        $data=[];

        // dd($data, [Carbon::parse('8:00')->subMinutes(15), Carbon::parse('8:00')->addMinutes(15)]);
        $chart =  (new LarapexChart)->horizontalBarChart();
        // ->setTitle('Waiting Time & Checklist');

        $array = [' 08:00', ' 14:00', ' 00:00'];
// dd($date.$array[1]);
        foreach ($array as $key) {
            $tempData = [];
            foreach ($sites as $site) {
                array_push($tempData, WaitingTime::where('site_id', $site->_id)->whereBetween('created_at', [Carbon::parse($date.$key)->subMinutes(15), Carbon::parse($date.$key)->addMinutes(15)])->avg('t3'));
            }
            $chart =  $chart->addData($key, $tempData);
        }
        $chart =  $chart
        ->setXAxis($sites->pluck('name')->toArray())
        ->setColors(['#553AFE', '#01C0F6', '#F1963A'])
        ->setHeight(600);


        return view('waiting.siteTracker', compact('sites', 'users', 'chart', 'chart1'));
    }

}
