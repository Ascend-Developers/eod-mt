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
        return Excel::download(new TrackingTimesExport, 'trackingTime.xlsx');
    }
    // public function trackingExport()
    // {
        
    //     return Excel::download(new TrackingTimesExport, 'trackingTime.xlsx');
    // }

    public function check( Request $request, MonthlyUsersChart $chart  )
{

    $sites = Site::all();



        $date = $request->has('date') ? Carbon::parse($request->date)->format('d-m-Y') : Carbon::today()->format('d-m-Y');

        $Yes = WaitingTime::where('operatorSupervisorOnSite', 'Yes')->whereBetween('created_at', [Carbon::parse($date)->startOfDay(), Carbon::parse($date)->endOfDay()])->count();
        $No= WaitingTime::where('operatorSupervisorOnSite', 'No')->whereBetween('created_at', [Carbon::parse($date)->startOfDay(), Carbon::parse($date)->endOfDay()])->count();
        $Yes2 = WaitingTime::where('homeKitsAvailableOnSite', 'Yes')->whereBetween('created_at', [Carbon::parse($date)->startOfDay(), Carbon::parse($date)->endOfDay()])->count();
        $No2= WaitingTime::where('homeKitsAvailableOnSite', 'No')->whereBetween('created_at', [Carbon::parse($date)->startOfDay(), Carbon::parse($date)->endOfDay()])->count();




         $created_at = WaitingTime::whereBetween('created_at', [Carbon::parse($date)->startOfDay(), Carbon::parse($date)->endOfDay()])->get()->groupBy(function($date) {
            return Carbon::parse($date->created_at)->format('h');
        })->toArray();

        $wts1 = WaitingTime::whereBetween('created_at', [Carbon::parse($date)->startOfDay(), Carbon::parse($date)->endOfDay()])->pluck('t1')->toArray();
        $wts2 = WaitingTime::whereBetween('created_at', [Carbon::parse($date)->startOfDay(), Carbon::parse($date)->endOfDay()])->pluck('t2')->toArray();
        $wts3 = WaitingTime::whereBetween('created_at', [Carbon::parse($date)->startOfDay(), Carbon::parse($date)->endOfDay()])->pluck('t3')->toArray();
        $wts = WaitingTime::whereBetween('created_at', [Carbon::parse($date)->startOfDay(), Carbon::parse($date)->endOfDay()])->get();
        $wts = WaitingTime::whereBetween('created_at', [Carbon::parse($date)->startOfDay(), Carbon::parse($date)->endOfDay()])->get();


        $chart =  (new LarapexChart)->lineChart()
        ->setTitle('Waiting Time T1 & T2 (In Minutes)')
        ->addData('Waiting Time 1', $wts1)
        ->addData('Waiting Time 2', $wts2)
        ->setXAxis($created_at)
        ->setColors(['#ffc63b', '#008080'])
        ->setHeight(300);


        $chart1 =  (new LarapexChart)->lineChart()
        ->setTitle('Waiting Time T3 (In Minutes)')
        ->addData('Waiting Time 3',$wts3)

        ->setXAxis($created_at)
        ->setColors(['#ffc63b', '#008080'])
        ->setHeight(300);

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




    return view('waiting.dashboard',  compact('wts','sites', 'chart', 'chart1','chart2','chart3'));
}

    public function siteTracker(Request $request){
        $sites = Site::whereHas('hourlySub')->get();
        $users = User::
        where('type', 'agent')
        ->whereHas('hourlySub')
        ->get();
       
        $date = $request->has('date') ? Carbon::parse($request->date)->format('d-m-Y') : Carbon::today()->format('d-m-Y');

        $created_at = WaitingTime::whereBetween('created_at', [Carbon::parse($date)->startOfDay(), Carbon::parse($date)->endOfDay()])->get()->groupBy(function($date) {
            return Carbon::parse($date->created_at)->format('h');
        })->toArray();
        $wt = WaitingTime::whereBetween('created_at', [Carbon::parse($date)->startOfDay(), Carbon::parse($date)->endOfDay()])->pluck('t3')->toArray();

        $chart1 =  (new LarapexChart)->lineChart()

        ->addData('Waiting Time T3',$wt)
        ->setXAxis($created_at)
        ->setColors(['#443DF6', '#DC251C'])
        ->setDataLabels(true)
        ->setHeight(300);

        $chart2 =  (new LarapexChart)->radialChart()
        ->setTitle('Attendence')
        // ->setSubtitle('Barcelona city vs Madrid sports.')
        ->addData([75, 60])
        ->setLabels(['Barcelona city', 'Madrid sports'])
        ->setHeight(250)
        ->setColors(['#553AFE', '#01C0F6']);

        //waiting time during shift times
        $data=[];
        $chart =  (new LarapexChart)->horizontalBarChart();
        $array = ['08:00', '16:00', '00:00'];
        foreach ($array as $key) {
            $tempData = [];
            foreach ($sites as $site) {
                array_push($tempData, WaitingTime::where('site_id', $site->_id)->whereBetween('created_at', [Carbon::parse($date.$key)->subMinutes(15), Carbon::parse($date.$key)->addMinutes(15)])->avg('t3'));
            }
            $chart =  $chart->addData($key, $tempData);
        }
        $chart =  $chart
        ->setXAxis($sites->pluck('name')->toArray())
        ->setColors(['#01C0F6', '#EF5DA8', '#4807EA'])
        ->setDataLabels(true)
        ->setHeight(800);

        //Submissions on time
        $data=[];
        foreach ($sites as $site) {
            $start = Carbon::parse($date."00:00");
            $end = Carbon::parse($date."23:59");
            $count = 0;
            for($d = $start ; $d < $end; $d->addHour() ){
                $sub = WaitingTime::where('site_id', $site->_id)->whereBetween('created_at', [Carbon::parse($d)->subMinutes(15), Carbon::parse($d)->addMinutes(15)])->first();
                if($sub)
                    $count++;
            }
            array_push($data, $count);
        };

        $chart_on_time =  (new LarapexChart)->horizontalBarChart();
        $chart_on_time =  $chart_on_time->addData('Submissions', $data);
        $chart_on_time =  $chart_on_time->setXAxis($sites->pluck('name')->toArray())
        ->setColors(['#4807EA', '#EF5DA8', '#F1963A'])
        ->setDataLabels(true)
        ->setHeight(800);

        $userWaitingData = WaitingTime::whereBetween('created_at', [Carbon::parse($date)->startOfDay(), Carbon::parse($date)->endOfDay()])->select('user_id', 'created_at', 'site_id')->with(['site'=>function($q){
            $q->select('name');
        }])->get()->groupBy(function($user){
            return $user->user->name;
        })->toArray();


        $userDataWaitingTime = [];
        foreach ($userWaitingData as $key => $value) {
            $count = count($value) - 1;
            // dd();
            $temp = [
                'name' => $key,
                // 'firstSiteName' => ,
                'firstSiteSubmission' => date('h:i A', strtotime($value[0]['created_at'])),
                // 'lastSiteName' => ,
                'lastSiteSubmission' => date('h:i A', strtotime($value[$count]['created_at'])),
            ];
            array_push($userDataWaitingTime, $temp);
        }
        return view('waiting.siteTracker', compact('sites', 'users', 'chart', 'chart1','chart2', 'userDataWaitingTime','chart_on_time'));
    }

}
