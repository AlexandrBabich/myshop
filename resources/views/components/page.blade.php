<div class="container">
    <div class="row">
        @if (isset($content) AND $content!='' AND $content!=NULL)
            @if (isset($content['0']->image))
                <div class="image_page">
                    <img width="200px" src="/uploads/pages/large/{{$content['0']->image}}" />
                </div>
            @endif

                <div class="title_page">{!!$content['0']->title!!}</div>
            {!!$content['0']->content!!}

@endif
</div>
</div>