<?php

namespace App\Exports;

use App\Models\Region;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class RegionsExport implements FromQuery, WithMapping, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return Region::all();
    // }

    public function query()
    {
        $region = Region::query();
        return $region;
    }

    public function headings(): array
    {
        return [
            'Name',
        ];
    }

    public function map($region): array
    {
        return [
           $region->name,
        ];
    }
}
