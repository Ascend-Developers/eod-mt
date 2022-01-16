<?php

namespace App\Http\Controllers;

use App\Models\RapidAntigenSiteAudit;
use Illuminate\Http\Request;
use App\Models\Site;
use Auth;

class RapidAntigenSiteAuditController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ratsas = RapidAntigenSiteAudit::whereIn('site_id', Auth::user()->getSites()->pluck('id')->toArray())->paginate(20);
        return view('RATSA.index', compact('ratsas'));
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
        return view('RATSA.create', compact('sites'));
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
            'site_id'=> ['required'],
        ]);
        $data = [
            'site_id' => $request->input('site_id'),
            'user_id' => Auth::user()->_id,
            'cabinNo' => $request->input('cabinNo'),
            'trainingSampleWithdrawal' => $request->input('trainingSampleWithdrawal'),
            'trainingRATUse' => $request->input('trainingRATUse'),
            'trainingInUseOfESN' => $request->input('trainingInUseOfESN'),
            'rapidAntigenTestBatchCheck' => $request->input('rapidAntigenTestBatchCheck'),
            'correctSwabAndCassetteLabeling' => $request->input('correctSwabAndCassetteLabeling'),
            'infectionControl_PPE' => $request->input('infectionControl_PPE'),
            'wasteDisposal' => $request->input('wasteDisposal'),
            'preparationOfExtractionTubes' => $request->input('preparationOfExtractionTubes'),
            'nonReactingCassettes' => $request->input('nonReactingCassettes'),
            'healthAndSafety' => $request->input('healthAndSafety'),
        ];
        $ratsa = RapidAntigenSiteAudit::create($data);

        return redirect()->route('ratsas.index')->with('success','Rapid Antigen Testing Site Audit is created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RapidAntigenSiteAudit  $rapidAntigenSiteAudit
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $ratsa = RapidAntigenSiteAudit::find($id);
        return view('RATSA.Show', compact('ratsa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RapidAntigenSiteAudit  $rapidAntigenSiteAudit
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $ratsa = RapidAntigenSiteAudit::find($id);
        $sites = Site::all();
        return view('RATSA.edit', compact('ratsa','sites'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RapidAntigenSiteAudit  $rapidAntigenSiteAudit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
            'site_id'=> ['required'],
        ]);

        $ratsa = RapidAntigenSiteAudit::find($id);

        $ratsa->site_id = $request->input('site_id');
        $ratsa->cabinNo = $request->input('cabinNo');
        $ratsa->trainingSampleWithdrawal = $request->input('trainingSampleWithdrawal');
        $ratsa->trainingRATUse = $request->input('trainingRATUse');
        $ratsa->trainingInUseOfESN = $request->input('trainingInUseOfESN');
        $ratsa->rapidAntigenTestBatchCheck = $request->input('rapidAntigenTestBatchCheck');
        $ratsa->correctSwabAndCassetteLabeling = $request->input('correctSwabAndCassetteLabeling');
        $ratsa->infectionControl_PPE = $request->input('infectionControl_PPE');
        $ratsa->wasteDisposal = $request->input('wasteDisposal');
        $ratsa->preparationOfExtractionTubes = $request->input('preparationOfExtractionTubes');
        $ratsa->nonReactingCassettes = $request->input('nonReactingCassettes');
        $ratsa->healthAndSafety = $request->input('healthAndSafety');

        $ratsa->save();

        return redirect()->route('ratsas.index')->with('success','Rapid Antigen Testing Site Audit is Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RapidAntigenSiteAudit  $rapidAntigenSiteAudit
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $ratsa = RapidAntigenSiteAudit::find($id);
        $ratsa->delete();
        return redirect()->route('ratsas.index');
    }
}
