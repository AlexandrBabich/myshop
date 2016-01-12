
<div class="form-group">
    {!! Form::label('Имя: *') !!}
    {!! Form::text('name', null, ['class'=> 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('E-mail: ') !!}
    {!! Form::text('email', null, ['class'=> 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('Сообщение: *') !!}
    {!! Form::textarea('message', null, ['class'=> 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::submit('Добавить', ['class'=> 'btn btn-primary']) !!}
</div>
