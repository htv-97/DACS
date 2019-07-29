// import { stringify } from "querystring";


// import { stringify } from "querystring";

$(document).ready(function () {



    var owl = $('.owl-carousel');
    var owl3 = $('.owl-carousel-3');
    var arr = ['<span class="icon-arrow-left"></span>','<span class="icon-arrow-right"></span>']
    owl.owlCarousel({
        items: 1,
        center:true,
        loop: true,
        dots:true,
        nav: false,
        smartSpeed: 400,
        margin: 0,
        autoplay: false
        // autoplayTimeout: 1000,
        // autoplayHoverPause: true
    });
    owl3.owlCarousel({
        center:true,
        items: 3,
        smartSpeed: 400,
        loop: true,
        nav: true,
        navText:arr,
        dots:true,
        margin: 50,
        autoplay: false,
        // autoplayTimeout: 1000,
        // autoplayHoverPause: true,
        responsiveClass:true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            900:{
                items: 3
            },
            1500:{
                items: 4
            }
        }
    });
    var logo = $(".logo__header");
   
    $(window).scroll(function(){
        if(logo.offset().top > 100){
           logo.addClass("active");
        }
        else  
            logo.removeClass("active");
    })

    // $('.search,.cart').hide();
        // $(".control-search").click(function (e) { 
        //     $('.search').toggle(400);
        //     $('.cart').hide(400);
        // });
        // $('.control-cart').click(function (e) { 
        //     $('.cart').toggle(300);    
        //     $('.search').hide(300);    
        // });
    $("[data-toggle='target']").on("click",function(){
        var target = $(this).attr('data-target');
        $("#"+target+"").parent().children().not($("#"+target+"")).hide(300);
        $("#"+target+"").toggle(300);
    })
    $("[data-show='target']").on("click",function(){
        var target = $(this).attr('data-target');
        $("#"+target+"").parent().children().not($("#"+target+"")).hide(300);
        $("#"+target+"").show(300);
    })    
    $("[data-toggle='gparent']").click(function(){
        $(this).parent().parent().toggle(300);
    })

    // card
        
    // input increase/decrease
        function formatNumber(num) {
            return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')
        }
        function updateTotalPrices(wrapper){
            var arrPrice = [];
            // console.log(wrapper,wrapper.find("[data-price-total]"));
            // console.log(wrapper.find("[data-price-total]"));
            wrapper.find("[data-price-total]").each(function(){
                arrPrice.push(parseInt($(this).attr('data-price-total')));
            });
            // console.log(totalPriceAll,arrPrice);
            var totalPriceAll = 0;
            if(Array.isArray(arrPrice) && arrPrice.length)
                totalPriceAll = arrPrice.reduce((total,value)=> total+=value)
            wrapper.find('#totalPrices').text(formatNumber(totalPriceAll));
        }
        function updateTotalPrice(val,price,elm){
            $totalPrice = val*price;
            elm.parent().parent().find("[data-price-total]").attr('data-price-total',$totalPrice);
            elm.parent().parent().find("[data-price-total]").text(formatNumber($totalPrice));
        }


    
    
        $('input[type="number"]').on('change',function(e){
            $id = $(this).attr('data-id');
            $price = $(this).attr('data-price');
            updateTotalPrice($(this).val(),$price,$(this));
            updateTotalPrices($('form').has($(this)));
            $qty = $(this).val();
            console.log($id,$qty);
            $.ajax({
                type: "get",
                url: window.location.origin+"/DACS-laravel/public/cart/qty-cart/"+$id,
                data: {'qty':$qty},
                dataType: "json",
                success: function (res) {
                    $(`#extension-icon [data-target="cart"]`).attr('data-qty',res.totalQty);
                }
            });
        })

        function inputUpDown(e){
            $inputNum = $(this).parent().children('input[type="number"]');
            var type = $(this).attr('data-type');
            var value = parseInt($inputNum.val());
            var price = parseInt($inputNum.attr('data-price'));
            var id = $inputNum.attr('data-id');
            var check=e.data.param;
            if(check < 0) value--;
            else if(check > 0) value ++;
            value = (isNaN(value) || value <= 0) ? 0 : value;
            console.log(value);
            price = (isNaN(price) || price <= 0) ? 0 : price;

            $(this).parent().children('input[type="number"]').val(value);
            console.log(value,price,$(this));
            updateTotalPrice(value,price,$(this));
           
            var wrapper = $('form').has($(this));
            updateTotalPrices(wrapper);
            $.ajax({
                type: "get",
                data: {'type':type},
                url: window.location.origin+'/DACS-laravel/public/cart/qty-one-cart/'+id,
                dataType: "json",
                success: function (res) {
                    $(`#extension-icon [data-target="cart"]`).attr('data-qty',res.totalQty);

                }
            });
        }
        $('.plus').on('click',{param : 1},inputUpDown);
        $('.minus').on('click',{param : -1},inputUpDown);
        // remover product
        var _token = $('input[type="hidden"][name="_token"]').val();
        $('[ajax-remove]').click(function (e) { 
            var id = $(this).attr('data-id');
            var type = $(this).attr('ajax-remove'); 
            var target = $('[class^="cart__wrapper"]').has($(this));
            target.slideUp(200);
            var wrapper = $('form').has($(this));
            setTimeout(() => {
                target.remove();
                updateTotalPrices(wrapper);

            }, 200);
            $.ajax({
                type: "get",
                data: {},
                url: `${window.location.origin}/DACS-laravel/public/${type}/del/${id}`,
                dataType: "json",
                success: function (res) {
                    $(`#extension-icon [data-target="${type}"]`).attr('data-qty',res.totalQty);
                    console.log(res);
                }
            });
          
        });
      
        // wishlist

        $('[data-wishlist="add"]').on('click',function(e){
            var id = $(this).attr('data-id');
            // console.log($(this).attr('data-wishlist'));
            // $(this).attr('data-wishlist','remove');
            var elm = $(this);
            $.ajax({
                type: "get",
                url: window.location.origin+"/DACS-laravel/public/wishlist/add/"+id,
                data: {},
                dataType: "json",
                success: function (res) {
                    // if(typeof(Storage) !== 'undefined'){
                    //     var oldWishStorage = localStorage.getItem('wishlist');
                    //     var wishStorage = oldWishStorage ? oldWishList.split(',') : [];
                    // }
                    // else alert('Vui lòng nâng cấp trình duyệt để sử dụng!!')
                    elm.toggleClass('active');
                    $('#extension-icon .icon-heart1').attr('data-qty',res.totalQty);
                    var data = res.items;
                    $('#wishlist #wishlist_content').empty();
                    var wishStorage = [];
                    for(let i in data){
                        wishStorage.push(data[i].id);
                        var first = `
                        <div class="cart__wrapper grid mb-3">
                            <img src="http://localhost/DACS-laravel/public/source/image/product/${data[i].image}" alt="">
                            <div>
                                <div class="grid__head-quick-seen">
                                    <strong>${data[i].name}</strong>
                                    <i class="icon-x1" data-id="${data[i].id}"></i>
                                </div>
                                <div class="card__prices">`;
                        
                        var price = data[i].isSale 
                                    ? `<span class='price'>${formatNumber(data[i].promotion_price)}</span>
                                        <span class='price__through'>${formatNumber(data[i].unit_price)}</span>`  
                                    :`<span class='price'>${formatNumber(data[i].unit_price)}</span>`                                
                        var end = `</div>
                            </div>
                        </div>`;
                        var product = `${first} ${price} ${end}`;   
                        $('#wishlist #wishlist_content').append(product);
                    };
                    localStorage.setItem('wishlist',wishStorage);
                }
            });
        })
    // if(typeof(Storage) !== null){
    //     var wishStorage = localStorage.getItem('wishlist');
    //     $('[data-wishlist]').each(function (index, element) {
    //         var id = $(this).attr('data-id');
    //         if(wishStorage.indexOf(id) > -1)
    //             $(this).addClass('active');            
    //     });
    // }
    $('[remove-storage]').on('click',function(){
        var keyStorage = $(this).attr('remove-storage');
        localStorage.removeItem(keyStorage);
    })    

    $("*").dblclick(function(e){
        e.preventDefault();
    });
    

})
