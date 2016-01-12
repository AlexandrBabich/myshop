<?php

namespace App\Http\Controllers;

use App\Category;
use App\Components;
use App\Footer;
use App\MenuImage;
use App\Menu;
use Illuminate\Support\Facades\Session;

class MainController extends Controller{

    public function __construct(Menu $menuModel, MenuImage $menuImage, Category $category, Footer $footer, Components $components){
        $this->data = [];

        $category = $category->getActive();

        $leftMenu = $menuModel->getLeftMenu();
        $rightMenu = $menuModel->getRightMenu();
        $MenuImage = $menuImage->getActive();
        $footer = $footer->getActive();
        $components = $components->getComponents();


            $bascedCount=Session::get('bascedCount');



        $this->data = ['leftMenu' => $leftMenu ,
                        'rightMenu' => $rightMenu,
                        'menuImage' =>$MenuImage,
                        'category' =>$category,
                        'footer' =>$footer[0],
                        'components' => $components[0],
                         'bascedCount' => $bascedCount,

        ];

    }


}