<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<body>

<div style="min-width: 900px">
    <div style="width: 100%">
        <a style="color:black">ф.И.О.:  {{$user['name']['value']}}</a><br>
        <a style="color:black">Email:  {{$user['email']['value']}}</a><br>
        <a style="color:black">Номер телефона:  {{$user['number']['value']}}</a><br>
        <a style="color:black">Адрес:  {{$user['address']['value']}}</a><br>
        <a style="color:black">Дополнительная информация:  {{$user['info']['value']}}</a><br>
        <a style="color:black">Тип доставки:  {{$deliveryInfo}}</a><br>
        <a style="color:black">Цена доставки:  {{$deliveryPrice}} грн.</a><br>
<hr><br>
        <a style="color: black; font-size: 16px; font-weight: bold">Общая цена: {{$allPrice}} грн.</a><br>
        <hr><br>
    </div>
<div style="width:100%;">
        @foreach($infoProduct as $item)


                <div style=" width: 200px;   height: 200px; margin: 10px auto; padding: 1em; border-radius: 0 0px 20px 20px; float: left; border-style: solid;border-width: 1px 1px 1px 1px; border-color: #808080;">
                    <div style="width:100%; text-align: center;"><a style="color: black; font-size: 14px">{!! $item['info'][0]->title !!}</a></div>
                        <div style="width: 100%; text-align: center">
                            {!! Html::image('/uploads/products/small/'.$item['info'][0]->image )!!}
                        </div>
                    @if($item['info'][0]->newPrice)
                        <div style="width: 100%;"><a><label style="text-decoration: line-through; color: dimgrey">{!!$item['info'][0]->price!!}</label> грн.</a></div>
                        <div  style="width: 100%;"><a><label style="color: red">{!!$item['info'][0]->newPrice!!}</label> грн.</a></div>
                    @else
                        <div  style="width: 100%;"><a><label style="color: red">{!!$item['info'][0]->price!!}</label> </a>грн.</div>
                    @endif
                    <div style="width:100%;">
                        <a>Количество: {!!$item['count']!!} </a>
                    </div>

                </div>



        @endforeach
</div>


</div>

</body>
</html>