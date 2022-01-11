<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class WaitingTime extends Model
{
    use HasFactory;

    protected $fillable = [
        'site_id', 't1', 't2', 't3', 'user_id'
    ];

    public function site(){
        return $this->belongsTo(Site::class, 'site_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
