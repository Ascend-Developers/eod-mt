<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Inventory extends Model
{

    protected $fillable = [
        'site_id',
        'item_id',
        'stock'
    ];

    public function item()
    {
        return $this->belongsTo(Ißtem::class, 'item_id');
    }

    public function site()
    {
        return $this->belongsTo(Site::class, 'site_id');
    }
}
