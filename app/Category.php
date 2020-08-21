<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Category extends Model
{
    protected $table='categories';
    protected $primaryKey='id';
    protected $fillable=['parent_id','name','description','status'];

    public function books()
    {
    
        return $this->hasMany('App\Book');
    }
}
