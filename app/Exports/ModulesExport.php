<?php

namespace App\Exports;

use App\Models\Module;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ModulesExport implements FromQuery, WithMapping, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return Module::all();
    // }

    public function query()
    {
        $module = Module::query();
        return $module;
    }

    public function headings(): array
    {
        return [
            'Name',
        ];
    }

    public function map($module): array
    {
        return [
           $module->name,
        ];
    }
}
