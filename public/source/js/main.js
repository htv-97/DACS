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
        autoplay: true,
        autoplayTimeout: 1000,
        autoplayHoverPause: true
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
        autoplay: true,
        autoplayTimeout: 1000,
        autoplayHoverPause: true,
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
        // remover product
        $('.remove-product').click(function (e) { 
            var target = $('.cart__product').has($(this));
            target.slideUp(200);
            setTimeout(() => {
                target.remove();
                
            }, 200);
            // var prices = parseInt($('.cart .card__prices span:last-child').text());
            //     console.log(prices);

            // $('#total').innerText = 
        });
        
    // input increase/decrease
        function inputUpDown(e){
            var value = parseInt($(this).parent().children('input[type="number"]').val());
            var check=e.data.param;
            console.log(value,check < 0,value<0);
            if(check < 0) value--;
            else value ++;
            value = (isNaN(value) || value <= 0) ? 0 : value;
            console.log(value);
            $(this).parent().children('input[type="number"]').val(value);
        }

        $('.plus').on('click',{param : 1},inputUpDown);
        $('.minus').on('click',{param : -1},inputUpDown);

        
    $("*").dblclick(function(e){
        e.preventDefault();
    });

})