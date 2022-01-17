<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;
class Shipment extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'site_id',
        'shipment_time',
        'on_schedule',
        'no_swabs_in_package',
        'no_swabs_in_ptu',
        'user_id'
    ];

    protected $dates = [
        'shipment_time'
    ];

    public function site()
    {
        return $this->belongsTo(Site::class, 'site_id')->select('name');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id')->select('name');
    }
}
