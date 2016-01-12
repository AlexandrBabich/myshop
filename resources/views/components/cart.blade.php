
<div class="container">
    <div class="row">
        @if (isset($bascedProducts))
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
                    <div class="col-lg-8 col-md-8 col-lg-offset-2 col-md-offset-2">
                        <div class="form-group">
                            Ф. И. О.: *
                            <input class="form-control input_basked" type="text" name="name" value="@if (isset($name)){{$name}}@endif">
                        </div>

                        <div class="form-group">
                            Email: *
                            <input class="form-control input_basked" type="email" name="email" value="@if (isset($email)){{$email}}@endif">
                        </div>

                        <div class="form-group">
                            Адрес: *
                            <textarea class="form-control address" type="text"  name="address">@if (isset($address)){{$address}}@endif</textarea>
                        </div>

                        <div class="form-group">
                            Номер телефона: *
                            <input class="form-control input_basked" type="text" value="@if (isset($number)){{$number}}@endif" name="number">
                        </div>

                        <div class="form-group">
                            Дополнительная информация:
                            <textarea class="form-control info" type="text"  name="info"></textarea>
                        </div>
                        <div class="form-group" id="delivery_block">
                        @if (! $delivery->isEmpty())
                            <select class="form-control select_delivery">
                            @foreach($delivery as $item)
                                    <option value="{{$item->id}}" data-price="{{$item->price}}">{{$item->title}} </option>
                            @endforeach
                            </select>
                            @foreach($delivery as $item)
                                <div class="form-group description_delivery_block" id="div{{$item->id}}">
                                    {!!$item->description!!}
                                </div>
                            @endforeach
                            @endif
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" id="buy" data-token="{{ csrf_token() }}" type="submit">Оформить</button>
                        </div>

                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="product_block" id="Cart_block">
                        @if (! $bascedProducts->isEmpty())
                            @foreach($bascedProducts as $item)

                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="product_block1 cart_product_block @if($item->action) action @endif" data-id="{{$item->id}}">
                                        <div class="delete_tovar glyphicon glyphicon-remove" data-id="{{$item->id}}"></div>
                                        <div class="category_title"><a href="/product/{!! $item->id !!}">{!! $item->title !!}</a></div>
                                        @if($item->image)
                                            <div class="category_image"><a href="/product/{!! $item->id !!}"><img height="80px" width="100px" src="/uploads/products/small/{{$item->image}}" /></a></div>
                                        @endif
                                        @if($item->newPrice)
                                            <div class="old_prise_block"><a class="text_none"><label>{!!$item->price!!}</label> грн.</a></div>
                                            <div class="prise_block"><a class="text_none"><label class="PRICE">{!!$item->newPrice!!}</label> грн.</a></div>
                                        @else
                                            <div class="prise_block"><a class="text_none"><label class="PRICE">{!!$item->price!!}</label> </a>грн.</div>
                                        @endif


                                        @if($item->shortDescription)
                                            <div class="short_block glyphicon glyphicon-hand-down"></div>
                                            <div class="Description_block">
                                                <div class="close_block glyphicon glyphicon-ban-circle">
                                                </div>
                                                <div class="Description_text"> {{ $item->shortDescription }}</div>
                                            </div>
                                        @endif

                                        <div class="form-group formGroup">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                 <label for="sel1" class="select_count">Количество:</label>
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <select class="form-control" id="Select_block">
                                                    @if (! $countProducts->isEmpty())
                                                        @foreach($countProducts as $item2)
                                                            @if ($item2['id']==$item->id)
                                                                <option>{{ $item2['count'] }}</option>
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                    <option>5</option>
                                                    <option>6</option>
                                                    <option>7</option>
                                                    <option>8</option>
                                                    <option>9</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @endforeach
                        @endif

                        <div>
                            <div class="delivery_price_block">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">Цена доставки:</div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <a class="all_price_a"><label class="delivery_price"></label>грн.</a>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">Общая цена:</div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <a class="all_price_a"><label class="all_price"></label>грн.</a>
                            </div>
                        </div>

                    </div>
                </div>
            <div class="basked_info">
                <div class="basked_info_block">
                    <a>Ваш заказ <span class="info_order"></span> принят!</a>
                </div>
            </div>
            @else
            <a>Ваша корзина пуста</a>
        @endif
    </div>
</div>





