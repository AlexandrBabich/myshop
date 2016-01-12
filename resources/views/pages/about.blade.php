@extends('layouts.default')

@section('content')

    <h1>О Нас</h1>
    <div class="row">
        <div class="col-lg-6 col-md-6">
            {!! $about->content !!}
        </div>
        <div class="col-lg-6 col-md-6">
            <img src="/uploads/{!! $about->image !!}" />
        </div>
    </div>
@stop