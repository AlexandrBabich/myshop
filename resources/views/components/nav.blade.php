
<div class="navbar navbar-fixed-top navbar-inverse" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#b-menu-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="b-menu-1">
            <ul class="nav navbar-nav top_nav">
                @if (! $leftMenu->isEmpty())
                    @foreach($leftMenu as $Menu)
                        <li><a class="a_1" href="{!! $Menu->url !!}">{!! $Menu->title !!}</a></li>
                    @endforeach
                @endif

                    @if (! $menuImage->isEmpty())
                        @foreach($menuImage as $item)
                            @if ($item->title=='logo')
                                <li class=" logotip_nav_block hidden-sm hidden-xs"> <a class="logotip" href="/"> <img src="/uploads/menuImages/original/{{$item->image}}" /></a></li>
                            @endif
                        @endforeach
                    @endif

                    @if ( isset(Auth::user()->email))
                        <li class="right_nav"><a  class="a_1" href="auth/logout" >Logout</a></li>
                    @else
                        <li class="right_nav"><a  class="a_1" id="Login" style="cursor: pointer" >Login</a></li>
                    @endif

                @if (! $rightMenu->isEmpty())
                    @foreach($rightMenu as $Menu)
                        <li class="right_nav"><a  class="a_1" href="{!! $Menu->url !!}">{!! $Menu->title !!}</a></li>
                    @endforeach
                @endif



            </ul>
        </div> <!-- /.nav-collapse -->
    </div> <!-- /.container -->
</div> <!-- /.navbar -->

@if (isset($info))
<div class="INFO_BLOCK">
       <div> <a>{{$info}}</a></div>
</div>
@endif
<div class="login">
    <div class="CLOSE">X</div>
    <div class="block_login">
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
    </div>
</div>
