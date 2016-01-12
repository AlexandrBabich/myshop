<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Feedback extends Model
{
    protected $table = 'feedbacks';

    public function insertFeedback($message){
        $data=date("Y-m-d");
        $values = array('name' => $message['name'],
                        'email' => $message['email'],
                        'message' => $message['message'],
                        'date' => $data);
        DB::table('feedbacks')->insert($values);
    }


    protected $fillable = [
            'name',
            'email',
            'message',
    ];


}
