<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Jenssegers\Mongodb\Auth\User as Authenticatable;
use Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;
use Auth;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'type', 'phone', 'category', 'module_ids', 'site_ids', 'category'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password'
    ];

    public function sites(){
        return $this->belongsToMany(Site::class);
    }

    public function modules(){
        return $this->belongsToMany(Module::class, 'module_ids');
    }


    public function modulesNameArr()
    {
        $name = [];
        foreach(Auth::user()->modules as $mo){
            array_push($name, $mo->name);
        }
        // in_array("EOD Submission", $name)
        // return in_array("EOD Submission", $name);
        return $name;
    }
    public function getSites(){
        if(Auth::user()->type == 'admin'){
            return Site::all();
        }
        return Site::whereIn('site_id', Auth::user()->site_id)->get();
    }
}
