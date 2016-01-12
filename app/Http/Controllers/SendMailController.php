<?php
/**
 * Created by PhpStorm.
 * User: Александр
 * Date: 12.12.2015
 * Time: 13:37
 */

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Mail;

class SendMailController extends Controller
{
    public function checkMail($user,$info,$deliveryInfo){
        $email=User::getAdminEmail();
$data=['user' => $user, 'infoProduct'=> $info['infoProduct'], 'allPrice'=> $info['allPrice'], 'deliveryPrice'=>$deliveryInfo[0]->price, 'deliveryInfo'=>$deliveryInfo[0]->title];
        Mail::send(['html' => 'emails.order'], $data, function($message) use ($user,$info,$email)
        {
            $message->to($user['email']['value'], 'order')->from('test@example.com')->subject('Ваш заказ №'.$info['id'].'!');
            $message->bcc($email[0]->email, 'order');
        });
    }

    public function sendFeedbackToAdmin($array){
       // dd($array);
        $email=User::getAdminEmail();
        $data=['name'=>$array['name'], 'email'=>$array['email'], 'info'=>$array['message']];
        Mail::send(['html' => 'emails.feedback'], $data, function($message)use ($email)
        {
            $message->to($email[0]->email, 'Laravel')->replyTo('test@example.com', 'Feedback')->from('test@example.com')->subject('Feedback');
        });
    }

}