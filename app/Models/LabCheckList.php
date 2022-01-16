<?php

namespace App\Models;
use Jenssegers\Mongodb\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;
class LabCheckList extends Model
{
    use SoftDeletes;

    protected $fillable = [
            'no_of_staff' ,
            'no_of_absence' ,
            'no_of_results' ,
            'no_of_rerun' ,
            'no_of_equipment_down' ,
            'no_of_swabs_received' ,
            'no_of_swabs_ptu' ,
            'site_id' ,
            'shift' ,
        ];

        public function site(){
            return $this->belongsTo(Site::class, 'site_id');
        }
}
