<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Region;
use App\Exports\RegionsExport;
use Excel;

class RegionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $regions = Region::all();
        return view('regions.index', compact('regions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('regions.create');
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
            'name'=> ['required', Rule::unique('regions','name')->whereNull('deleted_at')],
        ]);
        $data = [
            'name' => $request->input('name'),
        ];
        $region = Region::create($data);
        return redirect()->route('region.index')->with('success','Reagion is created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $regions = Region::find($id);
        return view('regions.Show', compact('regions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $regions = Region::find($id);
        return view('regions.edit', compact('regions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
            'name'=> ['required'],
        ]);

        $region = Region::find($id);

        $region->name =  $request->input('name');

        $region->save();

        return redirect()->route('region.index')->with('success','Reagion is Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $regions = Region::find($id);
        $regions->delete();
        return redirect()->route('region.index');
    }

    public function export()
    {
        return Excel::download(new RegionsExport, 'region.xlsx');
    }
}
