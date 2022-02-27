<?php

namespace App\Exports;

use App\Models\RapidAntigenSiteAudit;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Auth;

class RapidAntigenSiteAuditsExport implements FromQuery, WithMapping, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return RapidAntigenSiteAudit::all();
    // }

    public function query()
    {
        if(Auth::user()->type == "agent"){
            $rasa = RapidAntigenSiteAudit::whereIn('site_id', Auth::user()->getSites()->pluck('id')->toArray());
        }else{
            $rasa = RapidAntigenSiteAudit::query();
        }
        return $rasa;
    }

    public function headings(): array
    {
        return [
            'Site Name',
            'Cabin No',
            'Training sample withdrawal',
            'Training RAT use',
            'Training in use of HESN',
            'Rapid Antigen Test Batch Check',
            'Correct swab and cassette labeling',
            'Infection Control / PPE',
            'Waste Disposal',
            'Preparation of extraction tubes',
            'Non reacting cassettes',
            'Health and Safety',
            'Submitted By',
            'Report Date',
        ];
    }

    public function map($rasa): array
    {
        return [
            $rasa->site ? $rasa->site->name : "--",
            $rasa->cabinNo,
            $rasa->trainingSampleWithdrawal,
            $rasa->trainingRATUse,
            $rasa->trainingInUseOfESN,
            $rasa->rapidAntigenTestBatchCheck,
            $rasa->correctSwabAndCassetteLabeling,
            $rasa->infectionControl_PPE,
            $rasa->wasteDisposal,
            $rasa->preparationOfExtractionTubes,
            $rasa->nonReactingCassettes,
            $rasa->healthAndSafety,
            $rasa->user ? $rasa->user->name: "--",
            $rasa->created_at->format('F j, Y, g:i a')
        ];
    }
}
