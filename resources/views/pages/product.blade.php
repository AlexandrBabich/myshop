<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/thema/css/style.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" />
</head>
<body>


@include('components.nav')
@include('components.head')
@include('components.category')



<div class="container">
    <div class="row">
        <div class="col-lg-12  col-md-12  col-sm-12 col-xs-12 ">
            <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12  hidden-xs hidden-sm">
                @if (! $category->isEmpty())
                    @foreach($category as $item)
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12  category_block">
                            <div class="category_title"><a href="/category/{!! $item->id !!}">{!! $item->title !!}</a></div>
                            @if($item->image)
                                <div class="category_image"><a href="/category/{!! $item->id !!}"><img width="80px" src="/uploads/category/small/{{$item->image}}" /></a></div>
                            @endif
                        </div>

                    @endforeach
                @endif


            </div>


            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 col-lg-offset-1  col-lg-offset-1 Info_prodect_block">
                <div class="to_cart">

                </div>
                <div class="product_block">

                    <div class="col-lg-6 col-md-6 col-sm-9 col-xs-12">
                        <img width="100%" src="/uploads/products/medium/{{$product->image}}"/>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-9 col-xs-12">
                    <div>
                        @if($product->newPrice)
                        <div class="old_PRICE_block">{{$product->price}} грн</div>
                            <div class="new_PRICE_block">{{$product->newPrice}} грн</div>
                            @else
                            <div class="new_PRICE_block">{{$product->price}} грн</div>
                        @endif
                    </div>
                        <div>
                            <div class="buy_product" data-token="{{ csrf_token() }}" data-id="{{$product->id}}">Купить</div>
                        </div>
                    </div>

                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        {!! $product->description!!}
                    </div>


                </div>
            </div>

            @yield('content')
        </div>

    </div>

</div>

@include('components.footer')

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/thema/js/style.js" ></script>


<script type="text/javascript">



    $('.buy_product').click(function(e){

        $(".to_cart").css('display','block');

        var id=$(this).attr("data-id");
        var route = '/addItem';
        var token=$(this).attr("data-token");
       $.ajax({
            url:route,
            headers:{'X-CSRF-TOKEN': token},
            type:'POST',
            dataType: 'json',
            data: {idProduct: id},
           success: function(id){
               //$('.basked_info').show("slow");
               var p = $(".cart_block");
               var offset = p.offset();
               var p2 = $(".to_cart");
               var offset2 = p2.offset();
               $(".to_cart").animate({
                   left: offset.left-offset2.left,
                   top: offset.top-offset2.top,
                   height: '50px',
                   width: '50px'
               },'slow');
               setTimeout(explode, 1000);
               function explode(){
                   $(".to_cart").css('display','none');
                   $(".to_cart").remove();
                   $('.Info_prodect_block').prepend( "<div class='to_cart'></div>");
               }

           }
        });


        if($('.count_basked_block').length>0){
            var count = $('.count_basked_block').text();
             $('.count_basked_block').text(parseFloat(count)+1);
        }else(
                $('.cart_block').prepend( '<div class="count_basked_block">1</div>')

        )

    });






</script>
</body>

</html>
