<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table='category';

    public function products(){
        return $this->hasMany('App\Products');
    }

    public function getActive(){
        return $this->published()
            ->get();
    }

    public function scopePublished($query){
        $query->where(['active' => 1]);
    }

}
