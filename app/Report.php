<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;

class Report extends Model
{
    protected $fillable =[
        'emplyee_id', 'report', 'file', 'report_date' ,'created_by', 'project_id', 'employee_id'
    ];
    use SoftDeletes, LogsActivity;
    
    protected static $logName= 'Report';

    protected static $logAttributes = ['title','name'];

    protected static $logOnlyDirty = true;
    
    public function getDescriptionForEvent(string $eventName): string
    {
        return (" User {$eventName} a report");
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}
