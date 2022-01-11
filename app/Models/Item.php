<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Item extends Model
{
    //
    protected $fillable = [
        'name',
    ];

    // public function transections(){
    //     return $this->hasMany(LabTransactions::class, 'item_id');
    // }

    // public function transectionsLatest(){
    //     return $this->hasOne(LabTransactions::class, 'item_id')->latest();
    // }

    // public function labs(){
    //     return $this->belongsToMany(Lab::class);
    // }
}
