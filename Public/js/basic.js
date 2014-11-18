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
        var pic=$('#sharepic').val();
        if(pic!=''){
            $.post(delurl,{pic:pic},function(){})
            $('.pic-content').children().first().remove();
            $('.add-pic').show();
        }
        $('.bu').fadeOut(500);
        $('.add-content').animate({
            'bottom':'-100%'
        },500);
    })
//    $('.add-pic').click(function(){
//        $('.up-img').click();
//    })
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

function uploadimg(url,file,name,type,hidden){
    $.upload({
        // 上传地址
        url: url,
        // 文件域名字
        fileName: file,
        // 其他表单数据
        params: {name: name},
        // 上传完成后, 返回json, text
        dataType: type,
        // 上传之前回调,return true表示可继续上传
        onSend: function() {
            return true;
        },
        // 上传之后回调
        onComplate: function(data) {
            if(data.message=='ok'){
                $('#'+hidden).val(data.name);
                img='<img src="'+data.name+'" class="upload-img">';
                $('.pic-content').prepend(img);
                $('.add-pic').hide();
            }else{
                mobile_tip('error','图片上传失败！',1000);
            }
        }
    });
}