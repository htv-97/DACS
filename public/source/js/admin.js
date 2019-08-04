$('document').ready(function(e){
// menu active
  $('body').on('click','.nav-item',function(e){
    $('.nav-item').removeClass('active pre-active');
    $(this).addClass('active');
    $(this).prev().addClass('pre-active');
  })
// custom select option
    $('select.selectStyle').each(function(){
        var $this = $(this), numberOfOptions = $(this).children('option').length;
    
        $this.addClass('select-hidden'); 
        $this.wrap('<div class="select"></div>');
        $this.after('<div class="select-styled"></div>');

        var $styledSelect = $this.next('div.select-styled');
        $selected = $this.children('option:selected'); 
        // console.log($selected.h);
        // $selected.addClass('active');
        $styledSelect.text($selected.text());
    
        var $list = $('<ul />', {
            'class': 'select-options'
        }).insertAfter($styledSelect);
    
        for (var i = 0; i < numberOfOptions; i++) {
            $('<li />', {
                text: $this.children('option').eq(i).text(),
                rel: $this.children('option').eq(i).val(),
                class: $this.children('option').eq(i).attr('class')
            }).appendTo($list);
        }
    
        var $listItems = $list.children('li');
    
        $styledSelect.click(function(e) {
            $('div.select-styled.active').not(this).each(function(){
                $(this).removeClass('active').next('ul.select-options').hide();
            });
            $(this).toggleClass('active').next('ul.select-options').toggle();
            console.log($(this));
            return false;

        });
    
        $listItems.click(function(e) {
            $listItems.removeClass('active');
            $styledSelect.text($(this).text()).removeClass('active');
            $this.val($(this).attr('rel'));
            $(this).addClass('active');
            $list.hide();
            return false;
        });
    
        $(window).click(function() {
            $styledSelect.removeClass('active');
            $list.hide();
        });

    });
// quantity input
    $(".quantity").append('<div class="dec qtybutton">-</div><div class="inc qtybutton">+</div>');
    
        // var timer=0;
        $('.qtybutton').on("mousedown", function (e) {
            var timer;
            e.stopPropagation();
            if(e.which === 1)
             timer = setInterval(qTy, 80,$(this));
            else
                clearInterval(timer);
            $(this).on("mouseup mouseleave", function (e) {
                console.log(e.which);
                clearInterval(timer);
            })
        });
        

        
   function qTy(elm){
    var oldValue = parseFloat(elm.parent().find("input").val());
    var step = parseFloat(elm.parent().find('input').attr('step'));
    step = (step && step != 0) ? step : 1;
    oldValue = oldValue ? oldValue : 0;
    if (elm.hasClass("inc")) {
        var newVal = parseFloat(oldValue) + step;
    } else {
        // Don't allow decrementing below zero
        if (oldValue > 1) {
            var newVal = parseFloat(oldValue) - step;
        } else {
            newVal = 0;
        }
    }
    elm.parent().find("input").val(newVal);
   }
    /* JS before after func */
    Element.prototype.appendBefore = function (element) {
        element.parentNode.insertBefore(this, element);
    }, false;

    Element.prototype.appendAfter = function (element) {
        element.parentNode.insertBefore(this, element.nextSibling);
    }, false;

    })