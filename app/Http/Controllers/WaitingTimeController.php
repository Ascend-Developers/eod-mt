<?php

namespace App\Http\Controllers;

use App\Models\WaitingTime;
use Illuminate\Http\Request;
use App\Models\Site;
use Auth;
use App\Exports\WaitingTimesExport;
use Excel;
use App\Charts\MonthlyUsersChart;
use App\Charts\WaitingTimeChart;
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
    return view('waiting.dashboard', ['chart' => $chart->build($request->all())] , compact('wts','sites'));
} 

   

}
