<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class InventoryTransaction extends Model
{
    protected $fillable = [
            'inventory_id',
            'site_id' ,
            'item_id' ,
            'intialStock',
            'test',
            'newStockRec',
            'eodStock',
    ];

    public function inventory()
    {
        return $this->belongsTo(Inventory::class, 'inventory_id');
    }

    public function site()
    {
        return $this->belongsTo(Site::class, 'site_id');
    }

    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id');
    }
}
