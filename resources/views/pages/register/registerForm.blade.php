{!! Form::open(['route' => 'register.store']) !!}


@if (isset($messages))
{!! $messages !!}
@endif
<div class="form-group">
    {!! Form::label('Логин: *') !!}
    {!! Form::text('name', null, ['class'=> 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('E-mail: ') !!}
    {!! Form::text('email', null, ['class'=> 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('Пароль: *') !!}
    {!! Form::text('password', null, ['class'=> 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::submit('Регистрация', ['class'=> 'btn btn-primary']) !!}
</div>

{!! Form::close()!!}