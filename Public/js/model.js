/**
 * Created by Administrator on 14-10-24.
 */
function model(title,content,img,ok,cancel,url){

    var title=title;
    var content=content;
    var img = arguments[2] ? arguments[2] : 'question';
    var ok = arguments[3] ? arguments[3] : '确定';
    var cancel = arguments[4] ? arguments[4] : '取消';
    var model='<div class="blue"></div><div class="model"><div class="model-header"><h2 class="model-title">';
        model+=title;
        model+='<b class="model-close">X</b></h2></div><div class="model-center"><img src="'+url+'images/sure.gif" class="model-img"><label class="model-content">';
        model+=content;
        model+='</label></div><div class="model-bottom"><button class="model-cancel">';
        model+=cancel;
        model+='</button><button class="model-ok">';
        model+=ok;
        model+='</button></div></div>';
        $('body').append(model);
}
function out(){
    $('.model').fadeOut(500);
    $('.blue').fadeOut(600);
}