@extends('layouts.default')

@include('components.head')
@include('components.nav')
@include('components.category')




<div class="container">
    <div class="col-lg-6 col-md-6 col-sm-10 col-xs-12 col-lg-offset-3 col-md-offset-3 col-sm-offset-1 ">
        <form method="POST" action="/auth/register">
            {!! csrf_field() !!}

            <div class="form-group">
                Name
                <input class="form-control" type="text" name="name" value="{{ old('name') }}">
            </div>

            <div class="form-group">
                Email
                <input class="form-control" type="email" name="email" value="{{ old('email') }}">
            </div>

            <div class="form-group">
                Password
                <input class="form-control" type="password" name="password">
            </div>

            <div class="form-group">
                Confirm Password
                <input class="form-control" type="password" name="password_confirmation">
            </div>

            <div class="form-group">
                Address
                <input class="form-control" type="text" name="address">
            </div>

            <div class="form-group">
                Number
                <input class="form-control" type="text" name="number">
            </div>

            <div class="form-group">
                <button class="btn btn-primary" type="submit">Register</button>
            </div>
        </form>
    </div>
</div>


@include('components.footer')


@section('content')

@stop