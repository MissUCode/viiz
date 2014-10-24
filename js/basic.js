/**
 * Created by Administrator on 14-10-24.
 */
$(function(){
    $('.banner-right').click(function(){
        Height= $(document).height();
        $('.bu').css('height',Height);
        $('.bu').fadeIn(500);
        $('.menu').animate({
            right:"0px"
        }, 500 );
    })
    $('.bu').click(function(){
        $('.menu').animate({
            right:"-50%"
        }, 500 );
        $(this).fadeOut(500);
    })
})