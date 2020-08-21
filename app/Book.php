<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table='books';
    protected $primaryKey='id';
    protected $fillable=['categories_id','book_name','book_image','book_description','book_size','book_downloads','book_link','user_id'];
    public function category(){
        return $this->belongsTo(Category::class,'categories_id','id');
    }
    public function user()

{

    return $this->belongsTo('App\User');
}
}
