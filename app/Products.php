<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use TomLingham\Searchy\Facades\Searchy;

class Products extends Model
{
    protected $table='products';

    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function orderItem(){
        return $this->hasMany('App\OrderItem');
    }

    public function getActive(){
        return $this->published()
            ->paginate(9);
    }

    public function getCategoryProduct($id){
        return $this->published()
            ->category($id)
            ->get();
    }

    public function getBascedProducts($productId){
        return DB::SELECT('SELECT * FROM `products` where id in ('.$productId.')');
    }


    public function getProduct($id){
        return $this->product($id)
            ->get();
    }

    public function scopeProduct($query, $id){
        $query->where(['id' => $id]);
    }

    public function scopePublished($query){
        $query->where(['active' => 1]);
    }

    public function scopeCategory($query, $id){
        $query->where(['category_id' => $id]);
    }

    static function getInfoProducts($id){
        return DB::SELECT('SELECT * FROM `products` where id= '.$id);
    }

    static function getPriceItem($id){
        return DB::SELECT('SELECT * FROM `products` where id= '.$id);
    }

    public function searchProduct($search){
       // return Searchy::search('products')->fields('title')->query($search)->get();
            return DB::SELECT('SELECT * FROM `products` WHERE MATCH (`title`) AGAINST ("'.$search.'" IN BOOLEAN MODE)');
/*
        return $this->where('title', 'LIKE', '%'. $search .'%')
            ->published()
            ->get();
*/
    }
}
