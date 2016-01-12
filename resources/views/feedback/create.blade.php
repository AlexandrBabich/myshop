@extends('layouts.default')

@include('components.head')
@include('components.nav')
@include('components.category')




<div class="container">

    <div style="width: 100%; text-align: center"><a style="    font-size: 18px">Вы можете задать Нам вопрос!</a></div>
    <div class="col-lg-6 col-md-6 col-sm-10 col-xs-12 col-lg-offset-3 col-md-offset-3 col-sm-offset-1 ">
    <!--
        <form method="POST" action="/feedback">
            {!! csrf_field() !!}

            <div class="form-group">
                И.Ф.О. *:
                <input class="form-control" type="text" name="name" value="{{ Input::old('name') }}">
            </div>

            @if ($errors->first('name'))
                <div class="alert alert-danger">
                    <ul>
                        <li> {{$errors->first('name')}}</li>
                    </ul>
                </div>
            @endif

            <div class="form-group">
                Email *:
                <input class="form-control" type="text" name="email" value="{{ Input::old('email') }}">
            </div>

            @if ($errors->first('email'))
                <div class="alert alert-danger">
                    <ul>
                        <li> {{$errors->first('email')}}</li>
                    </ul>
                </div>
            @endif

            <div class="form-group">
                Сообщение *:
                <textarea class="form-control" type="text" name="message">{{ Input::old('message') }}</textarea>
            </div>

            @if ($errors->first('message'))
                <div class="alert alert-danger">
                    <ul>
                        <li> {{$errors->first('message')}}</li>
                    </ul>
                </div>
            @endif

            <div class="form-group">
                Каптча *:
                {!!captcha_img()!!}
                <input class="form-control" type="text" name="captcha">
            </div>

            @if ($errors->first('captcha'))
                <div class="alert alert-danger">
                    <ul>
                        <li> {{$errors->first('captcha')}}</li>
                    </ul>
                </div>
            @endif

            <div class="form-group">
                <button class="btn btn-primary" type="submit">Спросить</button>
            </div>
        </form>


-->

        {!! Form::open(['url' => 'feedback']) !!}
        <div class="form-group">
            {!! Form::label('name', ' И.Ф.О. *:') !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>
        @if ($errors->first('name'))
            <div class="alert alert-danger">
                <ul>
                    <li> {{$errors->first('name')}}</li>
                </ul>
            </div>
        @endif
        <div class="form-group">
            {!! Form::label('email', 'Email *:') !!}
            {!! Form::text('email', null, ['class' => 'form-control']) !!}
        </div>
        @if ($errors->first('email'))
            <div class="alert alert-danger">
                <ul>
                    <li> {{$errors->first('email')}}</li>
                </ul>
            </div>
            @endif
        <!-- Form Input -->
        <div class="form-group">
            {!! Form::label('message', 'Сообщение *:') !!}
            {!! Form::textarea('message', null, ['class' => 'form-control']) !!}
        </div>
        @if ($errors->first('message'))
            <div class="alert alert-danger">
                <ul>
                    <li> {{$errors->first('message')}}</li>
                </ul>
            </div>
            @endif

        <!-- Form Input -->
        <div class="form-group">
            {!! Form::label('captcha', ' Каптча *:') !!}
            {!!captcha_img()!!}
            {!! Form::text('captcha', null, ['class' => 'form-control']) !!}
        </div>
        @if ($errors->first('captcha'))
            <div class="alert alert-danger">
                <ul>
                    <li> {{$errors->first('captcha')}}</li>
                </ul>
            </div>
        @endif


        <div class="form-group">
            {!! Form::submit('Спросить', ['class' => 'btn btn-primary form-control']) !!}
        </div>

        {!! Form::close() !!}

    </div>
</div>


@include('components.footer')


@section('content')

@stop