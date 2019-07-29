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

        // wishlist
        // console.log(typeof($wishList)===['object','string']);
        // localStorage.removeItem('wishList')
            if(typeof(Storage) !== undefined){
                $oldWishList = localStorage.getItem('wishList');
                console.log('old',$oldWishList);
                $wishList = ($oldWishList !== null ) ? $oldWishList.split(',') : []; 
                $('.wishlist[data-id]').each(function(){
                    $attr = $(this).attr('data-id');
                    if($wishList.indexOf($attr) > -1){
                        $(this).addClass('active');
                    }
                });

                $('.wishlist[data-id]').on('click',function(e){
                    $(this).toggleClass('active');
                    $id = $(this).attr('data-id');
                    if($wishList.indexOf($id) > -1)
                    {
                        $data=$wishList.filter((item,index) => item !== $id);
                        $wishList = $data;
                        console.log($wishList,$data);
                    }
                    else
                        $wishList.push($id);
                    
                    console.log($wishList);
                        // $newWishList = Array.from(new Set($wishList))
                    localStorage.setItem('wishList',$wishList);
                    console.log({'Storage':Storage,'test':localStorage.getItem('wishList'),'type':typeof(localStorage.getItem('wishList'))})
                // ajax
                    $.ajax({
                        url : 'http://localhost/DACS-laravel/public/wishlist/'+$id,
                        method : "get",
                        data : {id:$id,wishList:$wishList, _token:"{{ csrf_token() }}"},
                        dataType : "text",
                        success: function (data) {
                            console.log('success',data);
                        }
                    });
                
                });
            }
            else alert('Trình duyệt bạn xài không hỗ trợ. Hãy nâng cấp trình duyệt để sử dụng!!!');
    
    
    
            //    $('.wishlist[data-id]').on('click',function(){
    //        $(this).toggleClass('active');
    //        var id = $(this).attr('data-id');
    //        var url = this.baseURI+'wishlist/'+id;
    //        $.ajax({
    //            type: "get",
    //            url: url,
    //            data: {'id':id},
    //            dataType: "dataType",
    //            success: function (res) {
    //                if(res == 'Ok')
    //                     console.log('yes');
    //                 else console.log('no');
    //            }
    //        });
    //    });
        
    $("*").dblclick(function(e){
        e.preventDefault();
    });
    

})
