<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class WaitingTime extends Model
{
    use HasFactory;

    protected $fillable = [
        'site_id', 't1', 't2', 't3'
    ];

    public function site(){
        return $this->belongsTo(Site::class, 'site_id');
    }
}
