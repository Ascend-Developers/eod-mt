<?php

namespace App\Exports;

use App\Models\Item;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ItemsExport implements FromQuery, WithMapping, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return Item::all();
    // }

    public function query()
    {
        $item = Item::query();
        return $item;
    }

    public function headings(): array
    {
        return [
            'Name',
        ];
    }

    public function map($item): array
    {
        return [
           $item->name,
        ];
    }
}
