<div class="row footer">
    <div class="container ">
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 ">
            <img width="60%" style="padding-bottom: 10px" src="/uploads/footers/small/{{$footer->image}}" />

            <div class="call_centre">
                {!!$footer->col1!!}
            </div>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 ">
            @if (! $category->isEmpty())
                @foreach($category as $item)
                   <li><a href="{!! $item->slug !!}">{!! $item->title !!}</a></li>
                @endforeach
            @endif
        </div>

        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 ">
            @if (! $leftMenu->isEmpty())
                @foreach($leftMenu as $Menu)
                    <li><a class="a_1" href="{!! $Menu->url !!}">{!! $Menu->title !!}</a></li>
                @endforeach
            @endif
                @if (! $rightMenu->isEmpty())
                    @foreach($rightMenu as $Menu)
                     <li><a  class="a_1" href="{!! $Menu->url !!}">{!! $Menu->title !!}</a></li>
                    @endforeach
                @endif
        </div>

        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 ">
               {!!$footer->col2!!}
        </div>

    </div>
</div>

<div class="feedback_block">
<a href="/feedback/create">
    <img height="100%" src="/uploads/temp/0nt9GI7o42M.jpg">
</a>
</div>