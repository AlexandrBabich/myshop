
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" />
<form method="POST" action="/auth/login">
    {!! csrf_field() !!}

    <div class="form-group">
        Email
        <input  class="form-control" type="email" name="email" value="{{ old('email') }}">
    </div>

    <div class="form-group">
        Password
        <input  class="form-control" type="password" name="password" id="password">
    </div>

    <div class="form-group">
        <input  type="checkbox" name="remember"> Remember Me
    </div>

    <div class="form-group">
        <button class="btn btn-primary" type="submit">Login</button>
    </div>
</form>


<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

