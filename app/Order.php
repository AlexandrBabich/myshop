<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    protected $table='order';

    public function orderItem(){
        return $this->hasMany('App\OrderItem');
    }

    static function issueOrder($convert){
        return DB::table('order')->insertGetId($convert);
    }

    static function updateOrder($id,$allPrice){
        DB::update('Update `order` SET price ='.$allPrice.' where id= '.$id);
    }


}
