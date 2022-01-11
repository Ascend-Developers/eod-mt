<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Site extends Model
{
    use HasFactory;
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
