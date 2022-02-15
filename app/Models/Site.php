<?php

namespace App\Models;

use Carbon\Carbon;
use Jenssegers\Mongodb\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;

class Site extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'region_id',
        'type',
        'siteType'
    ];

    public function region(){
        return $this->belongsTo(Region::class, 'region_id');
    }

    public function inventories(){
        return $this->hasMany(Inventory::class, 'site_id');
    }

    public function hourlySub()
    {
        return $this->hasMany(WaitingTime::class, 'site_id');
    }

    public function getDateSubmissionProgress($date){
        $day[0] = Carbon::parse($date)->startOfDay();
        $day[1] = Carbon::parse($date)->endOfDay();
        $result = WaitingTime::where('site_id', $this->_id)->whereBetween('created_at', [$day[0], $day[1]])->count();
        $per  = ($result/24)*100;
        return ($per > 100 ? 100 : $per);
    }

    public function getClass($value){
        // dd($result);
        if($value  >= 75){
            return '#9AD00E';
        }

        if($value  < 80 && $value > 70){
            return '#01C0F6';
        }

        if($value  < 70 && $value > 50){
            return '#EF5DA8';
        }

        if($value  < 50){
            return '#DC251C';
        }
    }
}
