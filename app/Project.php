<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class Project extends Model
{
    use SoftDeletes, LogsActivity;

    protected $fillable =[
        'name', 'description', 'dueDate', 'attachment' ,'status' ,'report','owner_id' ,'employee_id'
    ];

    protected $dates = ['deleted_at'];


    protected static $logName= 'Project Action';

    protected static $logAttributes = ['name', 'description', 'dueDate', 'attachment' ,'status'];

    protected static $logOnlyDirty = true;

    public function getDescriptionForEvent(string $eventName): string
    {
        return ("User {$eventName} a project");
    }

    
    public function tasks(){
        return $this->hasMany('App\Task');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
