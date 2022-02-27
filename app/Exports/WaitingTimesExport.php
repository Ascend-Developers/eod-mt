<?php

namespace App\Exports;

use App\Models\WaitingTime;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Auth;

class WaitingTimesExport implements FromQuery, WithMapping, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return WaitingTime::all();
    // }

    public function query()
    {

        if(Auth::user()->type == "agent"){
            $wt = WaitingTime::whereIn('site_id', Auth::user()->getSites()->pluck('id')->toArray());
        }else{
            $wt = WaitingTime::query();
        }
        return $wt;
    }

    public function headings(): array
    {
        return [
            'Site Name',
            'T1 (Arrival to Cabin)',
            'T2 (At Cabin)',
            'T3 (Total TAT)',
            'Status',
            'Submit By',
            'Date Of Report',
            'Code Red status',
            'Operator supervisor on site',
            'Double clinical resources per cabin',
            'Home kits available on site',
            'Home kits in use in the last hour',
            'Number of lanes closed',
            'Code Red status and Shurta Al Murour present',
            'PCR sample collection frequency as scheduled',
            'ART sample to taken kitchen continuously',
            'On site stocks for PCR, ART sufficient for day',
            'Hippa Filter on site in ART kitchen',
            'Data is being entered as per training',
            'Shift to shift handover as per operator SLA',
            'Mode Of Operations',
            'Top 3 issues by site (Staggered with 50% of cabins swapping at any time and no more than 15 mins handover)',
        ];
    }

    public function map($wt): array
    {
        return [
            $wt->site ? $wt->site->name : "--",
            $wt->t1,
            $wt->t2,
            $wt->t3,
            $wt->t3 < 20 ? 'Green' : 'Red',
            $wt->user ? $wt->user->name: "--",
            $wt->created_at->format('F j, Y, g:i a'),
            $wt->codeRedStatus,
            $wt->operatorSupervisorOnSite,
            $wt->doubleClinicalResourcesPerCabin,
            $wt->homeKitsAvailableOnSite,
            $wt->homeKitsInUseInTheLastHour,
            $wt->numberOfLanesClosed,
            $wt->codeRedStatusAndShurtaAlMurourPresent,
            $wt->PCRSampleCollectionFrequencyAsScheduled,
            $wt->ARTSampleToTakenKitchenContinuously,
            $wt->onSiteStocksForPCR_ARTSufficientForDay,
            $wt->HippaFilterOnSiteInARTKitchen,
            $wt->dataIsBeingEnteredAsPerTraining,
            $wt->shiftToShiftHandoverAsPerOperatorSLA,
            $wt->modeOfOperations,
            $wt->details
        ];
    }
}
