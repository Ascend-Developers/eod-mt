<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;

class RapidAntigenSiteAudit extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'site_id',
        'user_id',
        'cabinNo',
        'trainingSampleWithdrawal',
        'trainingRATUse',
        'trainingInUseOfESN',
        'rapidAntigenTestBatchCheck',
        'correctSwabAndCassetteLabeling',
        'infectionControl_PPE',
        'wasteDisposal',
        'preparationOfExtractionTubes',
        'nonReactingCassettes',
        'healthAndSafety',
    ];

    public function site(){
        return $this->belongsTo(Site::class, 'site_id')->select('name');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
