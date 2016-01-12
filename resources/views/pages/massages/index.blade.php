@extends('index')
<a href="auth/register">Регистрация</a>
<a href="checkAuth">Проверить</a>
@section('content')
    <div>
        {!! link_to_route('register',"Регистрация") !!}
    </div>

   @include('_common._form')
        <div class="text-right"><b>Всего сообщений:</b><i class="badge">{{ $count  }}</i> </div><br>

   @include('pages.massages._item')

@stop