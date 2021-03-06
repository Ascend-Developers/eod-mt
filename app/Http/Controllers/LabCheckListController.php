<?php

namespace App\Http\Controllers;

use App\Models\LabCheckList;
use App\Models\Site;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Exports\LabCheckListsExport;
use Excel;

class LabCheckListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $checklistsCount = LabCheckList::whereIn('site_id', Auth::user()->getSites()->pluck('id')->toArray())->count();
        $checklists = LabCheckList::whereIn('site_id', Auth::user()->getSites()->pluck('id')->toArray())->orderBy('created_at', 'DESC')->paginate(20);
        return view('checklists.index', compact('checklists', 'checklistsCount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sites = Site::all();
        return view('checklists.create', compact('sites'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'no_of_staff' => ['required'],
            'no_of_absence' => ['required'],
            'no_of_results' => ['required'],
            'no_of_rerun' => ['required'],
            'no_of_equipment_down' => ['required'],
            'no_of_swabs_received' => ['required'],
            'no_of_swabs_ptu' => ['required'],
            'site_id' => ['required'],
            'shift' => ['required'],
            // 'region_id' => ['required'],
            'shiftSupervisor' => ['required']
        ]);
        $data = [
            'no_of_staff' => $request->input('no_of_staff'),
            'no_of_absence' => $request->input('no_of_absence'),
            'no_of_results' => $request->input('no_of_results'),
            'no_of_rerun' => $request->input('no_of_rerun'),
            'no_of_equipment_down' => $request->input('no_of_equipment_down'),
            'no_of_swabs_received' => $request->input('no_of_swabs_received'),
            'no_of_swabs_ptu' => $request->input('no_of_swabs_ptu'),
            'site_id' => $request->input('site_id'),
            'user_id' => Auth::user()->_id,
            'shift' => $request->input('shift'),
            'shiftSupervisor' => $request->input('shiftSupervisor')
        ];
        $site = LabCheckList::create($data);

        return redirect()->route('checklist.index')->with('success', 'Site is created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LabCheckList  $labCheckList
     * @return \Illuminate\Http\Response
     */
    public function show(LabCheckList $labCheckList)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LabCheckList  $labCheckList
     * @return \Illuminate\Http\Response
     */
    public function edit(LabCheckList $labCheckList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LabCheckList  $labCheckList
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LabCheckList $labCheckList)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LabCheckList  $labCheckList
     * @return \Illuminate\Http\Response
     */
    public function destroy(LabCheckList $labCheckList)
    {
        //
    }

    public function export()
    {
        return Excel::download(new LabCheckListsExport, 'checklist.xlsx');
    }
}
