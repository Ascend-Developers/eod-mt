<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Jenssegers\Mongodb\Auth\User as Authenticatable;
use Hash;
use Carbon\Carbon;
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
        return Site::whereIn('_id', Auth::user()->site_ids)->get();
    }

    public function hourlySub()
    {
        return $this->hasMany(WaitingTime::class, 'user_id');
    }


    public function getDateSubmissionProgress($date){
        $day[0] = Carbon::parse($date)->startOfDay();
        $day[1] = Carbon::parse($date)->endOfDay();
        $result = WaitingTime::where('user_id', $this->_id)->whereBetween('created_at', [$day[0], $day[1]])->count();
        $per  = ($result/8)*100;
        return ($per > 100 ? 100 : $per);
    }
    public function getUserCount($date){
        $day[0] = Carbon::parse($date)->startOfDay();
        $day[1] = Carbon::parse($date)->endOfDay();
        $result = WaitingTime::where('user_id', $this->_id)->whereBetween('created_at', [$day[0], $day[1]])->count();
       
        return ($result);
    }

    public function getClass($value){
        // dd($result);
        if($value  >= 75){
            return 'success';
        }

        if($value  < 80 && $value > 70){
            return 'primary';
        }

        if($value  < 70 && $value > 50){
            return 'warning';
        }

        if($value  < 50){
            return 'danger';
        }
    }

}
