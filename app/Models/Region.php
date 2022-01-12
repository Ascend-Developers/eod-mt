<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;

class Region extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['name'];
}
