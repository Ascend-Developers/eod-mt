<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;

class WaitingTime extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'site_id',
        't1',
        't2',
        't3',
        'user_id',
        'codeRedStatus',
        'operatorSupervisorOnSite',
        'doubleClinicalResourcesPerCabin',
        'homeKitsAvailableOnSite',
        'homeKitsInUseInTheLastHour',
        'numberOfLanesClosed',
        'codeRedStatusAndShurtaAlMurourPresent',
        'PCRSampleCollectionFrequencyAsScheduled',
        'ARTSampleToTakenKitchenContinuously',
        'onSiteStocksForPCR_ARTSufficientForDay',
        'HippaFilterOnSiteInARTKitchen',
        'dataIsBeingEnteredAsPerTraining',
        'shiftToShiftHandoverAsPerOperatorSLA',
        'details',
        'modeOfOperations'
    ];

    public function site(){
        return $this->belongsTo(Site::class, 'site_id')->select('name');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
