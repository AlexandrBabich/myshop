<?php
/**
 * Created by PhpStorm.
 * User: Александр
 * Date: 22.12.2015
 * Time: 20:10
 */

namespace App\Http\Controllers;
use App\Feedback;
use App\Http\Requests\FeedbackRequest;
use App\Http\Requests\StoreFeedbackPostRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;


class FeedbackController  extends MainController{

    public function create($info=Null)
    {
        if(isset($info)){
            $this->data['info']=$info;
        }
        return view('feedback.create',$this->data);
    }

/*
    public function store(FeedbackRequest $request)
    {
        $input=Redirect::all();
        Feedback::create($input);
        return Redirect::to('/feedback/create');
    }

*/

    public function store(Request $request, Feedback $feedback, SendMailController $sendMailController)
    {
        $messages = [
            'required' => 'Поле  должно быть заполнено.',
            'email' => 'Некорректно введенный email',
            'max:255' => 'Максимально допустимое значение 255 символов',
            'captcha' => 'Введите правильно символы с картинки!',
        ];

        $v = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email',
            'message' => 'required',
            'captcha' => 'required|captcha'
        ], $messages);


        if ($v->fails())
        {
            return redirect()->back()->withErrors($v->errors())->withInput();;

        }else{

            $feedback->insertFeedback($request->all());

            $sendMailController->sendFeedbackToAdmin($request->all());

            //Input::clearResolvedInstances();
            $info="Спасибо за вопрос, в ближайшее время мы Вам ответим!";
            return redirect()->route('feedbackCreate',[$info]);

        }

    }

}