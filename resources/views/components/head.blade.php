    <div class="row">
        <div class="conteiner">
            <div class="col-lg-3 col-md-3  col-sm-4 col-xs-9">
                @if ($components->logotip)
                           <div class="logotip_block"><a href="/"> <img height="50px" src="/uploads/components/large/{{$components->logotip}}" /></a></div>
                @endif
            </div>
            <div class="col-lg-7 col-md-7  col-sm-5 hidden-xs">
                <form action="/search" method="post">
                <div class="search_block input-group">

                    <input type="text" class="form-control" name="search">
                        {!! csrf_field() !!}
                      <span class="input-group-btn">
                        <button class="btn btn-default" type="submit">Go!</button>
                      </span>

                </div><!-- /input-group -->
                </form>
            </div>
            <div class="col-lg-2 col-md-2  col-sm-3 col-xs-3">
                @if ($components->cart)
                    <div class="cart_block">
                        @if ($bascedCount['Count'])

                                <div class="count_basked_block">{{$bascedCount['Count']}}</div>

                        @endif
                        <a href="/basked"> <img height="50px" src="/uploads/components/large/{{$components->cart}}" /></a></div>
                @endif
            </div>
            <div class="hidden-lg hidden-md hidden-sm col-xs-12">
                <form action="/search" method="post">
                <div class="search_block input-group">
                    <input type="text" class="form-control"  name="search">
                    {!! csrf_field() !!}
                      <span class="input-group-btn" >
                        <button class="btn btn-default" type="submit">Go!</button>
                      </span>
                </div><!-- /input-group -->
                </form>
            </div>
        </div>
    </div>
