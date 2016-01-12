<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Message;

class HomeController extends Controller
{
    public function index(){

        $data = [
            'title'     => 'Гостевая книга на Laravel 5.1',
            'pagetitle' => 'Гостевая книга ',
            'messages'  => Message::latest()->paginate(1),
            'count'     => Message::count()
         ];
        return view('pages.massages.index',$data);
    }

    public function edit($id){
        $data = [
            'title'     => 'Редактирование: Гостевая книга на Laravel 5.1',
            'pagetitle' => 'Редактирование: Гостевая книга '
        ];
        return view('pages.messages.edit',$data);
    }

    public  function  create(){
        return view('_common._form');
    }

    public function store(Message $Message, Request $request){

        $Message->create($request->all());
        return redirect()->route('home');

    }

}
