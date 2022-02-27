<?php

namespace App\Exports;

use App\Models\Shipment;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Auth;

class ShipmentsExport implements FromQuery, WithMapping, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return Shipment::all();
    // }

    public function query()
    {
        if(Auth::user()->type == "agent"){
            $shipment = Shipment::whereIn('site_id', Auth::user()->getSites()->pluck('id')->toArray());
        }else{
            $shipment = Shipment::query();
        }
        return $shipment;
    }

    public function headings(): array
    {
        return [
            'Site Name',
            'Shipment Time',
            'No swabs in Package',
            'No swabs in PTU',
            'On Schedule',
            'Submitted By',
        ];
    }

    public function map($shipment): array
    {
        return [
            $shipment->site ?  $shipment->site->name : "--",
            $shipment->shipment_time,
            $shipment->no_swabs_in_package,
            $shipment->no_swabs_in_ptu,
            $shipment->on_schedule,
            $shipment->user ?  $shipment->user->name : "--"
        ];
    }
}
