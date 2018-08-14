$(function () {

    create_button = function(){

            var $constructor = $(".constructor");

    //    $constructor.append('<div class="dragBlock"></div>');

            $('.element').resizable({
               // containment: 'parent'
            }).draggable({
               // containment:'parent'
            });

        var $form_inputs = $('#rectangle div').find('input');
        var $width = $('#rectangle_width');
        var $height = $('#rectangle_height');
        var $background_color = $('#rectangle_background_color');
        var $border_radius = $('#rectangle_border_radius');
        var $border_width = $('#rectangle_border_width');
        var $border_color = $('#rectangle_border_color');
        var $border_style = $('#rectangle_border_style');
        var $field_selector = $constructor.find('.dragBlock');


        blur_action = function () {
            $field_selector.css({
                'width':$width.val(),
                'height':$height.val(),
                'background-color':$background_color.val(),
                'border-radius':$border_radius.val() + 'px',
                'border-width':$border_width.val(),
                'border-color':$border_color.val(),
                'border-style':$border_style.val()});
            console.log($border_radius.val());
        };
        $form_inputs.on('input keyup', blur_action);

        $('.dragBlock').click(function () {
           $width.val(parseInt($(this).css('height').replace(/\D+/g,"")));
        });

    };
    $(".nav-item").click(create_button);

    $('.nav-link').click(function () {
        $('.back').css('transform','translateX(210px)');
    });

    // $(document).click(function (e){ // событие клика по веб-документу
    //     var div = $(".back"); // тут указываем ID элемента
    //     if (!div.is(e.target) && ! $('.nav-link').is(e.target) // если клик был не по нашему блоку
    //         && div.has(e.target).length === 0) { // и не по его дочерним элементам
    //         div.css('transform','translateX(-95px)'); // скрываем его
    //     }
    // });
    $('.close_back').click(function () {
        $('.back').css('transform','translateX(-95px)');
    });


});
