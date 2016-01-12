<?php
/**
 * Created by PhpStorm.
 * User: Александр
 * Date: 03.12.2015
 * Time: 22:01
 */

namespace App\Http\Controllers;



use App\Order;
use App\OrderItem;

class OrderController extends Controller
{

    public function Order($user,$deliveryInfo,$products, $orderItemController){
        $convert=$this->convertArray($user,$deliveryInfo);
        $id=Order::issueOrder($convert);
        $info=$orderItemController->infoProducts($products,$id);
        Order::updateOrder($id,$info['allPrice']);
        $info['id']=$id;
        return $info;
    }

    public function convertArray($user,$deliveryInfo){
        $convert=array();
        foreach($user as $key => $item){
            $convert[$key]=$item['value'];
        }
        $convert['delivery_price']=$deliveryInfo[0]->price;
        $convert['delivery']=$deliveryInfo[0]->title;
        $convert['price']=0;
        $convert['date']=date("Y-m-d H:i:s");
        return $convert;
    }
}