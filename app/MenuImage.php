<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuImage extends Model
{
    protected $table = "menu_images";

    public function getActive(){
        return $this->published()->get();
    }

    public function scopePublished($query){
        $query->where(['active' => 1]);
    }
}
