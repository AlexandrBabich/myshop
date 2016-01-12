<div id="carousel-example-generic" class="carousel slide row" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        @foreach($slides as $slide)
            @if ($slide->id == 1)
                <li data-target="#carousel-example-generic" data-slide-to="{{$slide->id}}" class="active"></li>
            @else
                <li data-target="#carousel-example-generic" data-slide-to="{{$slide->id}}" class=""></li>
            @endif
        @endforeach
    </ol>

    <!-- Slider Content (Wrapper for slides )-->
    <div class="carousel-inner">
        @foreach($slides as $key => $slide)
            @if ($key == 1)
                <div class="item active">
                    @else
                        <div class="item">
                            @endif
                            <div class="container">
                                <img width="100%"  src="/uploads/slides/large/{{$slide->image}}" alt="" />
                            </div>
                        </div>
                        @endforeach

                </div>

                <!-- Controls -->
                <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                </a>
    </div>
</div>