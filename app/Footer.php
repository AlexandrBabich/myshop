<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Footer extends Model
{
    protected $table = 'footers';

    public function getActive(){
        return $this->published()->get();
    }

    public function scopePublished($query){
        $query->where(['active' => 1]);
    }
}
