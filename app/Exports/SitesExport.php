<?php

namespace App\Exports;

use App\Models\Site;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class SitesExport implements FromQuery, WithMapping, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return Site::all();
    // }

    public function query()
    {
        $site = Site::query();
        return $site;
    }

    public function headings(): array
    {
        return [
            'Name',
            'Major/Minor',
            'Region',
            'Site Type',
        ];
    }

    public function map($site): array
    {
        return [
           $site->name,
           $site->type,
           $site->region ? $site->region->name : "--",
           $site->siteType,
        ];
    }
}
