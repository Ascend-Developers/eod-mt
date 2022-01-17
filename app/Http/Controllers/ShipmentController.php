<?php

namespace App\Http\Controllers;

use App\Models\Shipment;
use App\Models\Site;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Exports\ShipmentsExport;
use Excel;

class ShipmentController extends Controller
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
        $shipments = Shipment::all();
        return view('shipments.index', compact('shipments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sites = Site::all();
        return view('shipments.create', compact('sites'));
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
            'shipment_time'=> ['required'],
            'on_schedule'=> ['required'],
            'site_id'=> ['required'],
            'no_swabs_in_package'=> ['required'],
            'no_swabs_in_ptu'=> ['required'],
        ]);
        $data = [
            'shipment_time' => $request->input('shipment_time'),
            'on_schedule' => $request->input('on_schedule'),
            'site_id' => $request->input('site_id'),
            'no_swabs_in_package' => $request->input('no_swabs_in_package'),
            'no_swabs_in_ptu' => $request->input('no_swabs_in_ptu'),
            'user_id' => Auth::user()->_id,
        ];
        $shipments = Shipment::create($data);
        return redirect()->route('shipment.index')->with('success','Shipment is created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Shipment  $shipment
     * @return \Illuminate\Http\Response
     */
    public function show(Shipment $shipment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Shipment  $shipment
     * @return \Illuminate\Http\Response
     */
    public function edit(Shipment $shipment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Shipment  $shipment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shipment $shipment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Shipment  $shipment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shipment $shipment)
    {
        //
    }

    public function export()
    {
        return Excel::download(new ShipmentsExport, 'shipment.xlsx');
    }
}
