<?php

namespace App\Http\Controllers;

use App\Models\Region;
use App\Models\Site;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Exports\SitesExport;
use Excel;
use Auth;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->type == "agent"){
            return redirect()->back();
        }
        $regions = Region::all();
        $sites = Site::all();
        return view('sites.index', compact('regions', 'sites'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->type == "agent"){
            return redirect()->back();
        }
        $regions = Region::all();
        return view('sites.create', compact('regions'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::user()->type == "agent"){
            return redirect()->back();
        }
        $this->validate($request, [
            'name' => ['required', Rule::unique('sites','name')->whereNull('deleted_at')],
            // 'region_id' => ['required'],
        ]);
        $data = [
            'name' => $request->input('name'),
            'region_id' => $request->input('region_id'),
            'type' => $request->input('type') == true ? 'mega' : 'minor',
            'siteType' =>  $request->input('siteType')
        ];
        $site = Site::create($data);

        return redirect()->route('site.index')->with('success', 'Site is created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        if(Auth::user()->type == "agent"){
            return redirect()->back();
        }
        $site = Site::find($id);
        return view('sites.Show', compact('site'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        if(Auth::user()->type == "agent"){
            return redirect()->back();
        }
        $site = Site::find($id);
        $regions = Region::all();
        return view('sites.edit', compact('regions', 'site'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        if(Auth::user()->type == "agent"){
            return redirect()->back();
        }
        $this->validate($request, [
            'name' => ['required'],
            // 'region_id' => ['required'],
        ]);

        $site = Site::find($id);

        $site->name =  $request->input('name');
        $site->region_id =  $request->input('region_id');
        $site->type =  $request->input('type') == true ? 'mega' : 'minor';
        $site->siteType =  $request->input('siteType');

        $site->save();

        return redirect()->route('site.index')->with('success', 'Site is updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        if(Auth::user()->type == "agent"){
            return redirect()->back();
        }
        $site = Site::find($id);
        $site->delete();
        return redirect()->route('site.index');
    }

    public function export()
    {
        return Excel::download(new SitesExport, 'site.xlsx');
    }
}
