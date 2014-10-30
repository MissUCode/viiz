/*
* Viitip v1.0.0 
* Author: Donkeyman
* Chinese nickName:上帝写代码
* Email :595441550@qq.com
* From  :China GZ
* Time  :2014-07-23 
* CopyRight:上帝版权所有，盗版不追究
*/
function viitip(type,contents,times){
	times=times==''?1000:times;
	var Top =$(document).scrollTop()+340 ;
	var left = $(window).width()/2-80;
	var msg="";
	switch(type){
		case "error":
		  msg+="<i class='error'></i>"+contents;
		  break;
		case "success":
		  msg+="<i class='success'></i>"+contents;
		  break;
		case "notice":
		  msg+="<i class='notice'></i>"+contents;
		  break;
		  case "waiting":
		  msg+="<i class='waiting'></i>"+contents;
		  break;	  
		}
	var html='<div class="viitip" style="top:'+(Top-20)+'px;left:'+(left)+'px;">';
	html+=msg+'</div>';
	$("body").append(html);
	$(".viitip").css('opacity','0')
	$(".viitip").animate({top:Top+'px',left:left+'px',opacity:'10'},1000);

	return setTimeout("moving_viitip()",times)

	
}
function moving_viitip(){
	$(".viitip").animate({top:'+=100px',opacity:'0'},1000,function(){$(this).remove()});
}
