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
        'type'
    ];

    public function region(){
        return $this->belongsTo(Region::class, 'region_id');
    }

    public function inventories(){
        return $this->hasMany(Inventory::class, 'site_id');
    }
}
