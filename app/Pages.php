<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pages extends Model
{
    protected $table='pages';


    public function getActive($slug){
        return DB::SELECT('SELECT * FROM `pages` where `slug` = "'.$slug.'" AND active=1');
    }

}
