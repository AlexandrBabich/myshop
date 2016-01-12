$( document ).ready(function() {
    jQuery('#Login').click(function(){
        jQuery('.login').show("slow");
    })
    jQuery('.CLOSE').click(function(){
        jQuery('.login').hide("slow");
    })

    jQuery('.short_block').click(function(){
        jQuery(this).parent().find('.Description_block').show("slow");
    });

    jQuery('.close_block').click(function(){
        jQuery(this).parent().hide("slow");
    });



//------------------------ Корзина

    jQuery('select#Select_block').change(function(){
        updatePrice();
    });
    if($('#Cart_block').length>0){
        updatePrice();
    }
    function updatePrice(){
        var all_price=0;
        var countTovar=0;
        jQuery(".cart_product_block").each(function() {
            var id=jQuery(this).attr("data-id");
            var price=jQuery(this).find('.PRICE').text();
            var count=jQuery(this).find("#Select_block option:selected").text();
            countTovar=countTovar+parseFloat(count);
            all_price = all_price + price * count;
            $('.count_basked_block').text(countTovar);
        });

        var select_price_del=$('.select_delivery option:selected').attr("data-price");
        select_price_del= parseFloat(select_price_del);
        if(select_price_del == 0 || select_price_del =='' || select_price_del =='NULL'){
            $('.delivery_price_block').css('display','none');
        }else{
            $('.delivery_price_block').css('display','block');
            $('.delivery_price').text(select_price_del);
            all_price=all_price+select_price_del;
        }

        jQuery('.all_price').text(all_price);
    }


    $('.delete_tovar').click(function(e){
        var token= $( "input[name=_token]" ).val();
        var id=$(this).attr("data-id");
        var route = '/delItem';
        $.ajax({
            url:route,
            headers:{'X-CSRF-TOKEN': token},
            type:'POST',
            dataType: 'json',
            data: {idProduct: id}
        });

        $(this).parent().remove();
        updatePrice();
    });

    delivery();
    jQuery('.select_delivery').change(function(){
        delivery();
    });
    function delivery(){
        $('.description_delivery_block').each(function(){
            $(this).css('display','none');
        });
        var select_del=$('.select_delivery option:selected').val();
        $('#delivery_block').find('#div'+select_del).css('display','block');
        updatePrice();
    }


    $('button#buy').click(function(e){
        var check= 'TRUE';
        var user = {};
        jQuery("input.input_basked").each(function() {
            var val=jQuery(this).val();
            var name=jQuery(this).attr("name");
            if(val==''){
                alert('Нужно заполнить все поля!!!');
                check='FALSE';
                return false;
            }
            user[name] = {value:val}
        });

           var address= jQuery('textarea.address').val();
            if(address==''){
                alert('Нужно заполнить все поля!!!');
                check='FALSE';
                return false;
            }
        if(check=='TRUE') {
            user['address'] = {value: address};
            var info = jQuery('textarea.info').val();
            user['info'] = {value: info};
            var route = '/buy';
            var token = $(this).attr("data-token");
            var product = {};
            jQuery(".cart_product_block").each(function () {
                var id = jQuery(this).attr("data-id");
                var count = parseFloat(jQuery(this).find("#Select_block option:selected").text());
                product[id] = {"id": id, "count": count};
            });
            var delivery_id = $('.select_delivery option:selected').val();
            delivery_id = parseFloat(delivery_id);

            $.ajax({
                url: route,
                headers: {'X-CSRF-TOKEN': token},
                type: 'POST',
                dataType: 'json',
                data: {deliveryId: delivery_id, basked: product, user: user},
                success: function (id) {
                    //$('.basked_info').css('display','block');
                    $('.basked_info').show("slow");
                    $('.info_order').text('#' + id);
                }
            });
        }
    });

    $('.basked_info').click(function(){
        location.replace('/');
    });

    //------------------------------------------

    setTimeout(feedback, 1000);
    function feedback(){
        $('.feedback_block').fadeIn("slow");
        $(".feedback_block").animate({"left": "50px"}, "slow");
    }
    if($('.INFO_BLOCK').length>0){
        infoBlock();
        function infoBlock(){
            $('.INFO_BLOCK').animate({height: "show"}, 1000);
        }
        function closeinfoBlock(){
            $('.INFO_BLOCK').animate({height: "hide"}, 1000);
        }
        setTimeout(closeinfoBlock, 3000);
    }


});


