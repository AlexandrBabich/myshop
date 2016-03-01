<?php

namespace App\Http\Controllers;

use App\Category;
use App\Components;
use App\Footer;
use App\MenuImage;
use App\Menu;
use Illuminate\Support\Facades\Session;

class TestController extends Controller{
    const MIN_PASS_LENGTH = 4;

    private $user = array();

    public function __construct(array $user)
    {
        $this->user = $user;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function setPassword($password)
    {
        if (strlen($password) < self::MIN_PASS_LENGTH) {
            return false;
        }

        $this->user['password'] = $this->cryptPassword($password);

        return true;
    }

    private function cryptPassword($password)
    {
        return md5($password);
    }
}