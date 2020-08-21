<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;


class Task extends Model
{

    use SoftDeletes;


    protected $fillable =[
        'employee_id','project_id','task_name','task_detail','priority','due_date','attachment'
    ];

    protected $dates = ['deleted_at'];


    public function project(){
        return $this->belongsTo('App\Project');
    }

    public function users(){
        return $this->belongsToMany('App\User');
    }
}
