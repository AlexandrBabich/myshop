<?php
/**
 * Created by PhpStorm.
 * User: Александр
 * Date: 27.11.2015
 * Time: 23:13
 */

namespace App\Http\Controllers;

use App\Delivery;
use App\OrderItem;
use App\Products;
use App\Slider;
use Input;
use Request;
use Illuminate\Support\Facades\Session;

class BaskedController extends MainController
{
    public  function addItem(){
        if(Request::ajax()){
            $productID=Input::get('idProduct');
            if(Session::get('product')){
                $data = Session::get('product');
                $count=1;
                foreach($data as $item){
                    if($item['id']==$productID){
                        $count=$item['count']+$count;
                        }
                    }

                    Session::put('product.'.$productID, ['id' => $productID, 'count'=>$count]);
            }else(
                Session::put('product.'.$productID, ['id' => $productID, 'count'=>'1'])
            );
            $this->getCountItemSession();
            $data=1111111111111;
            return $data;
        };
    }

    public function getCountItemSession(){
        $baskedCount=0;
        $products = Session::get('product');
        foreach($products as $item){
            $baskedCount = $baskedCount +$item['count'];
        }
        Session::put('bascedCount.Count', $baskedCount);

    }

    public  function delItem(){
        $productID=Input::get('idProduct');
        if(Session::get('product')){
            $data = Session::get('product');
            foreach($data as $item){
                if($item['id']==$productID){
                    Session::forget('product.'.$item['id']);
                }
            }
        }
        $this->getCountItemSession();
        $data = 1;
        return $data;
    }

    public function getBasked(Products $products,Slider $slider, Delivery $delivery){
        if(Session::get('product')){
        $this->data['delivery']=  $delivery->getDeliveryActive();

        $productsBasked = Session::get('product');
        $this->data['countProducts']=collect($productsBasked);
        $productsId='';
        $k=0;
        foreach($productsBasked as $id){
            if($k==0){
                $productsId=$id['id'];
                $k++;
            }else{
                $productsId=$productsId.' ,'.$id['id'];
            }
        }
         $this->data['bascedProducts'] = collect($products->getBascedProducts($productsId));

        }else{
            $this->data['bascedErrr'] = 'Корзина пуста';
        }
        $this->data['slides'] = $slider->getActive();
        $this->data['products'] = $products->getActive();

        if(\Auth::user()){
            $this->data['name'] = \Auth::user()->name;
            $this->data['address'] = \Auth::user()->address;
            $this->data['email'] = \Auth::user()->email;
            $this->data['number'] = \Auth::user()->number;
        }

        return view('pages.cart', $this->data);
    }

    public  function buy(Delivery $delivery, OrderController $orderController,OrderItemController $orderItemController,SendMailController $sendMailController){

        $products=Input::get('basked');
        $deliveryId=Input::get('deliveryId');
        $deliveryInfo=$delivery->getPriceDelivery($deliveryId);
        $user=Input::get('user');
        $info=$orderController->Order($user,$deliveryInfo,$products,$orderItemController);
        $id=$info['id'];
        Session::forget('product');
        Session::forget('bascedCount');

        $sendMailController->checkMail($user,$info,$deliveryInfo);

        return $id;
    }

}