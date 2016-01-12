<?php
/**
 * Created by PhpStorm.
 * User: Александр
 * Date: 05.12.2015
 * Time: 9:46
 */

namespace App\Http\Controllers;


use App\OrderItem;
use App\Products;

class OrderItemController extends  Controller
{
    public function infoProducts($products,$id){
        $allPrice=0;
        $convert=array();
        $infoProduct=array();
        foreach($products as $item){
            $infoItem=Products::getPriceItem($item['id']);
            $infoProduct[]=['info'=>$infoItem, 'count' => $item['count']];
            if($infoItem[0]->newPrice !='0' || $infoItem[0]->newPrice !=NULL ){
                $Price=$infoItem[0]->newPrice;
                $allPrice=$allPrice+($infoItem[0]->newPrice*$item['count']);
            }else{
                $Price=$infoItem[0]->price;
                $allPrice=$allPrice+($infoItem[0]->price*$item['count']);
            }
            $convert[]=['products_id' => $item['id'], 'count' => $item['count'], 'price' => $Price, 'title' => $infoItem[0]->title, 'order_id'=>$id ];
            OrderItem::insertItemOrder($convert);
        }
        $info=['infoProduct' => $infoProduct,'allPrice' => $allPrice];
        return $info;
    }


}