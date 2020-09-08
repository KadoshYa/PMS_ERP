<?php

namespace App;

use App\Notifications;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Task extends Model
{

    use SoftDeletes, Notifiable, LogsActivity;


    protected $fillable =[
        'employee_id','project_id','task_name','task_detail','priority','due_date','attachment'
    ];

    protected $dates = ['deleted_at'];

    
    protected static $logName= 'Task Action';

    protected static $logAttributes = ['employee_id','project_id','task_name','task_detail','priority','due_date','attachment'];

    protected static $logOnlyDirty = true;
    
    public function getDescriptionForEvent(string $eventName): string
    {
        return (" User {$eventName} a task");
    }



    public function project(){
        return $this->belongsTo('App\Project');
    }

    public function users(){
        return $this->belongsToMany('App\User');
    }
}
