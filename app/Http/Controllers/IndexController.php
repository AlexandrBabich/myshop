<?php
/**
 * Created by PhpStorm.
 * User: Александр
 * Date: 08.11.2015
 * Time: 18:48
 */

namespace App\Http\Controllers;



use App\Products;
use App\Slider;


class IndexController extends MainController{

    public function index(Slider $slider, Products $products){
        $this->data['slides'] = $slider->getActive();
        $this->data['products'] = $products->getActive();
        return view('pages.index', $this->data);
    }

    public function getCategoryProduct($id, Slider $slider, Products $products){
        $this->data['slides'] = $slider->getActive();
        $this->data['products'] = $products->getCategoryProduct($id);
        return view('pages.index', $this->data);
    }

    public function projectList(Project $project){
        $this->data['projects'] = $project->getActive();
        return view('pages.project_list', $this->data);
    }

    public function projectCart($slug, Project $project){
        $this->data['project'] = $project->getBySlug($slug);
        return view('pages.project_cart', $this->data);
    }

    public function about(){
        $this->data['about'] = json_decode(file_get_contents(storage_path().'/administrator_settings/about.json'));
        return view('pages.about', $this->data);
    }
}