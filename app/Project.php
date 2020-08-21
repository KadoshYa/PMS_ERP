<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;


class Project extends Model
{
    protected $fillable =[
        'name', 'description', 'dueDate', 'attachment' ,'status'
    ];

    protected $dates = ['deleted_at'];

    use SoftDeletes;
    
    public function tasks(){
        return $this->hasMany('App\Task');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
