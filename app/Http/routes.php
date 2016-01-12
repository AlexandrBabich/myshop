<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|


Route::get('/', function () {
    return view('welcome');
});
*/




get('/',['as' => 'main', 'uses' => 'IndexController@index']);
get('projects',['as' => 'projectList', 'uses' => 'IndexController@projectList']);
get('projects/{slug}',['as' => 'projectCart', 'uses' => 'IndexController@projectCart']);
get('about-us',['as' => 'about', 'uses' => 'IndexController@about']);
get('blog',['as' => 'blog', 'uses' => 'BlogController@index']);
get('blog/{slug}',['as' => 'blog.record', 'uses' => 'BlogController@cart']);
get('category/{id}',['as' => '', 'uses' => 'IndexController@getCategoryProduct']);
get('product/{id}',['as' => '', 'uses' => 'ProductController@getProduct']);
get('auth/register', 'Auth\AuthController@getRegister');
post('auth/register', 'Auth\AuthController@postRegister');
post('addItem', [ 'as'=>'basket', 'uses'=>'BaskedController@addItem']);
post('delItem', [ 'as'=>'basket', 'uses'=>'BaskedController@delItem']);
post('buy', [ 'as'=>'buy', 'uses'=>'BaskedController@buy']);
get('page/{slug}', ['as' => 'page', 'uses' => 'PagesController@goUrl']);
post('search', [ 'as'=>'search', 'uses'=>'ProductController@search']);
Route::get('feedback/create/{info?}', ['as'=>'feedbackCreate', 'uses'=>'FeedbackController@create']);
Route::post('feedback', 'FeedbackController@store');

Route::get('basked', [ 'uses'=>'BaskedController@getBasked']);

Route::any('captcha-test', function()
{
    if (Request::getMethod() == 'POST')
    {
        $rules = ['captcha' => 'required|captcha'];
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails())
        {
            echo '<p style="color: #ff0000;">Incorrect!</p>';
        }
        else
        {
            echo '<p style="color: #00ff30;">Matched :)</p>';
        }
    }

    $form = '<form method="post" action="captcha-test">';
    $form .= '<input type="hidden" name="_token" value="' . csrf_token() . '">';
    $form .= '<p>' . captcha_img() . '</p>';
    $form .= '<p><input type="text" name="captcha"></p>';
    $form .= '<p><button type="submit" name="check">Check</button></p>';
    $form .= '</form>';
    return $form;
});


use Illuminate\Support\Facades\Mail;


get('mail', function(){
  /* if(mail("Sashcool@ukr.net", "My Subject", "Line 1\nLine 2\nLine 3", "from: Sasasa@ukr.net")){
       echo 111111111111111111;
   }else{
       echo 22222222222;
   };
*/
    Mail::send('emails.test', ['name' => 'Novice'], function($message)
    {
        $message->to('Sashcool@ukr.net', 'Laravel')->from('Sashcool@ukr.net')->subject('Welcome!');


    });

});





Route::get('home', ['uses'=>'HomeController@index', 'as'=>'home']);
Route::get('message/{id}/edit', ['uses'=>'HomeController@edit', 'as' => 'message.edit'])->where(['id' => '[0-9]+']);
Route::post('home', ['uses'=>'HomeController@store', 'as'=>'store']);





Route::get('home/create', ['uses'=>'HomeController@create', 'as'=>'home.create']);
Route::post('home/store', ['uses'=>'HomeController@store', 'as'=>'home.store']);

Route::get('register', ['uses'=>'RegisterController@create', 'as'=>'register']);
Route::post('register/store', ['uses'=>'RegisterController@store', 'as'=>'register.store']);



// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...



Route::get('checkAuth', function(){
    if(Auth::guest()){
        return Redirect::to('auth/login');
    }else{
        echo 'Hello'. Auth::user()->email;
    }
});

//$router->resource('home', 'HomeController');