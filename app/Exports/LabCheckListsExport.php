<?php

namespace App\Exports;

use App\Models\LabCheckList;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class LabCheckListsExport implements FromQuery, WithMapping, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return LabCheckList::all();
    // }

    public function query()
    {
        $lab = LabCheckList::query();
        return $lab;
    }

    public function headings(): array
    {
        return [
            'Site Name',
            'Supervisor Active',
            'No of Starf',
            'No of Absence',
            'No of Results',
            'No of Rerun',
            'No of Equipment Down',
            'No of SWABS Received',
            'No of SWABS PTU',
            'Shifts',
        ];
    }

    public function map($lab): array
    {
        return [
            $lab->site ?  $lab->site->name : "--",
            $lab->shiftSupervisor,
            $lab->no_of_staff,
            $lab->no_of_absence,
            $lab->no_of_results,
            $lab->no_of_rerun,
            $lab->no_of_equipment_down,
            $lab->no_of_swabs_received,
            $lab->no_of_swabs_ptu,
            $lab->shift,
        ];
    }
}
