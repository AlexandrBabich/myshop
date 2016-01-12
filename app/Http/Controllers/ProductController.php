<?php
/**
 * Created by PhpStorm.
 * User: Александр
 * Date: 23.11.2015
 * Time: 21:40
 */

namespace App\Http\Controllers;


use App\Products;
use App\Slider;
use Illuminate\Support\Facades\Input;

class ProductController extends MainController
{
    public function getProduct($id,  Products $products){
        $product = $products->getProduct($id);
        $this->data['product'] =$product[0];

        return view('pages.product', $this->data);
    }

    public function search(Slider $slider, Products $products){
        $search=Input::all();
        $search=$this->parsing($search['search']);
        $this->data['products'] = $products->searchProduct($search);
        $this->data['slides'] = $slider->getActive();

        return view('pages.index', $this->data);
    }

    public function parsing($search){
        $check = explode(" ", $search);
        $newSearch='';
        foreach($check as $item){
            $newSearch=$newSearch.''.$item.'* ';
        }
        return $newSearch;
    }

}