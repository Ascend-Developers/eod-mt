<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class UsersExport implements FromQuery, WithMapping, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return User::all();
    // }

    public function query()
    {
        $user = User::query();
        return $user;
    }

    public function headings(): array
    {
        return [
            'Name',
            'Email',
            'Type',
            'Site',
            'Phone No',
            'Modules',
            'Category',
        ];
    }

    public function map($user): array
    {
        return [
           $user->name,
           $user->email,
           $user->type,
           $user->sites ? preg_replace('/[]]/', '',preg_replace('/[["]/', '',$user->sites->pluck('name'))) : "--",
           $user->phone,
           $user->modules ? preg_replace('/[]]/', '',preg_replace('/[["]/', '',$user->modules->pluck('name'))) : "--",
           $user->category,
        ];
    }
}