<?php
/**
 * Created by PhpStorm.
 * User: Александр
 * Date: 08.11.2015
 * Time: 18:48
 */

namespace App\Http\Controllers;



use App\Pages;
use App\Slider;


class PagesController extends MainController{

    public function goUrl($slug, Slider $slider, Pages $pages){
        $this->data['slides'] = $slider->getActive();
        $this->data['content'] = $pages->getActive($slug);
        //dd( $this->data['content']);
        return view('pages.page', $this->data);
    }



}