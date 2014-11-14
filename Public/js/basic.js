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
        $('.bu').fadeOut(500);
        $('.addshare').fadeOut(500);
    })
    $('.banner-center').click(function(){
        Height= $(document).height();
        $('.bu').css('height',Height);
        $('.bu').fadeIn(500);
        $('.add-content').animate({
            'bottom':'0%'
        },500);
    })
    $('.cancel').click(function(){
        $('.bu').fadeOut(500);
        $('.add-content').animate({
            'bottom':'-100%'
        },500);
    })
    $('.add-pic').click(function(){
        $('.up-img').click();
    })
    $('.shareTo').click(function(){
        Height= $(document).height();
        $('.bu').css('height',Height);
        $('.bu').fadeIn(500);
        $('.addshare').fadeIn(500);
        return false;
    })
    $('.content').click(function(){
        var url=$(this).attr('url');
        if(url!=''&& url !='undefined'){
            location.href=url;
        }
    })
})