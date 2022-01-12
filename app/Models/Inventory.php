<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;

class Inventory extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'site_id',
        'item_id',
        'stock'
    ];

    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id');
    }

    public function site()
    {
        return $this->belongsTo(Site::class, 'site_id')->select('name');
    }
}
