<?php

namespace App;

use App\Notifications;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, LogsActivity;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable=['name','email','admin','department','password','title','profileimage', 'phonenumber','facebook','linkedin'];

    protected static $logName= 'User';

    protected static $logAttributes = ['name' , 'email', 'user', 'password', 'title', 'profileimage', 'phonenumber', 'facebook', 'linkedin'];

    protected static $logOnlyDirty = true;


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getDescriptionForEvent(string $eventName): string
        {
            return ("User {$eventName} profile");
        }

   
   
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function project()
    {
        return $this->hasMany('App\Project');
    }

    public function tasks()
    {
        return $this->belongsToMany('App\Task');
    }

    public function departments()
    {
        return $this->belongsTo('App\Department');
    }

    public function report()
    {
        return $this->hasMany('App\Report');
    }
    
}
