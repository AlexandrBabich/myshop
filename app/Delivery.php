<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Delivery extends Model
{
    protected $table = 'delivery';

    public function getDeliveryActive(){
        return $this->published()->get();
    }


    public function getPriceDelivery($Id){
        return DB::SELECT('SELECT price, title FROM `delivery` where id ='.$Id.'');
    }


    public function scopePublished($query){
        $query->where(['active' => 1]);
    }
}