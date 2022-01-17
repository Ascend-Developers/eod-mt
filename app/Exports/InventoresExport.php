<?php

namespace App\Exports;

use App\Models\InventoryTransaction;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class InventoresExport implements FromQuery, WithMapping, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return Invenory::all();
    // }

    public function query()
    {
        $inventory = InventoryTransaction::query();
        return $inventory;
    }

    public function headings(): array
    {
        return [
            'Site Name',
            'Item Name',
            'New Stock Received',
            'Test Taken',
            'Stock Before Submission',
            'Stock After Submission',
            'Submit By',
            'Created At',
        ];
    }

    public function map($inventory): array
    {
        return [
            $inventory->site ? $inventory->site->name : '--',
            $inventory->item ? $inventory->item->name : '--',
            $inventory->newStockRec,
            $inventory->test,
            $inventory->intialStock,
            $inventory->eodStock,
            $inventory->user ? $inventory->user->name : '--',
            $inventory->created_at->format('F j, Y, g:i a')
        ];
    }
}
