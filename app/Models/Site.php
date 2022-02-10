<?php

namespace App\Models;

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
}
