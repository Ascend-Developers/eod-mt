<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;

class WaitingTime extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'site_id',
        'user_id',
        'waiting_time',
        'no_customer',
        'working_hours',
        'data_entry',
        'no_clinics'
    ];

    public function site(){
        return $this->belongsTo(Site::class, 'site_id')->select('name');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
