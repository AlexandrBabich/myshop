<?php
/**
 * Created by PhpStorm.
 * User: Александр
 * Date: 05.12.2015
 * Time: 10:16
 */

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class OrderItem extends Model
{
protected $table="orderItem";

    public function order(){
        return $this->belongsTo('App\Order');
    }

    public function products(){
        return $this->belongsTo('App\Products');
    }

    static function insertItemOrder( $convert){
        DB::table('orderItem')->insert($convert);

      //  DB::INSERT( 'INSERT `orderItem` VALUES("'.$convert.'")');


    }
}