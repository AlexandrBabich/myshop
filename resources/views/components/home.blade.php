<div class="container">
    <div class="row">
        <div class="col-lg-12  col-md-12  col-sm-12 col-xs-12">
            <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12 hidden-xs">
                @if (! $category->isEmpty())
                    @foreach($category as $item)
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12  category_block">
                            <div class="category_title"><a class="title_category" href="/category/{!! $item->id !!}">{!! $item->title !!}</a></div>
                            @if($item->image)
                                <div class="category_image"><a href="/category/{!! $item->id !!}"><img width="80px" src="/uploads/category/small/{{$item->image}}" /></a></div>
                            @endif
                        </div>

                    @endforeach
                @endif


            </div>


            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 col-lg-offset-1  col-lg-offset-1">
                <div class="product_block">
                    @if (! empty($products))
                        @foreach($products as $item)

                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                <div class="product_block1 @if($item->action) action @endif">
                                    <div class="category_title"><a href="/product/{!! $item->id !!}">{!! $item->title !!}</a></div>
                                    @if($item->image)
                                        <div class="category_image"><a href="/product/{!! $item->id !!}"><img style="max-height:80px; max-width:100px;" src="/uploads/products/small/{{$item->image}}" /></a></div>
                                    @endif
                                    @if($item->newPrice)
                                        <div class="old_prise_block"><a class="text_none">{!!$item->price!!} грн.</a></div>
                                        <div class="prise_block"><a class="text_none">{!!$item->newPrice!!} грн.</a></div>
                                        @else
                                        <div class="prise_block"><a class="text_none">{!!$item->price!!} грн.</a></div>
                                    @endif
                                    <div class="block_batton"><a href="/product/{!! $item->id !!}">Купить</a></div>
                                    @if($item->action)
                                        <div class="action_block"><a class="text_none">Акция</a></div>
                                    @endif

                                    @if($item->shortDescription)
                                        <div class="short_block glyphicon glyphicon-hand-down"></div>
                                        <div class="Description_block">
                                            <div class="close_block glyphicon glyphicon-ban-circle">
                                            </div>
                                            <div class="Description_text"> {{ $item->shortDescription }}</div>
                                        </div>
                                    @endif

                                </div>
                            </div>

                        @endforeach
                    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12" style="text-align: center">
                            @include('partials.paginate', ['pager' => $products])
                    </div>
                    @else
                        <div style="text-align: center"><a style="font-size: 18px; color: red">Пусто!!!</a></div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>