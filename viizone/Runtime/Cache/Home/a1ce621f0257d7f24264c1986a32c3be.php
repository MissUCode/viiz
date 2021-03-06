<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <title>微商助手-用户注册</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta http-equiv=Content-Type content="text/html;charset=utf-8">
    <link rel="stylesheet" href="__PUBLIC__/css/bootstrap_home.min.css">
    <link rel="stylesheet" href="__PUBLIC__/css/comm.css">
    <link rel="stylesheet" href="__PUBLIC__/css/tip.css">
    <link rel="icon" href="__PUBLIC__/images/logo.png"  type="image/x-icon" />
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="profile">
         <span class="top-pic">用户登陆</span>
         <span class="profile-form">
                 <label><i >登陆账号：</i><input type="text" class="tt"  id="username" placeholder="您的账号或昵称"></label>
                 <label><i>登陆密码：</i><input type="password" class="tt" id="password" placeholder="输入您的密码"></label>
                 <label style="height: 50px;"><input type="button" value="马上登陆"  class="saved tt" id="login"></label>
                 <label style="height: 50px;"><i>还没账号？<a href="__ROOT__/Uenter/reg.html">马上去注册！</a></i></label>
         </span>
        </div>
    </div>
    <div class="row" style="padding-bottom: 60px;margin-top: 15px;">
        <div class="col-md-12">
            <span style="display: block;width: 150px;margin:0 auto;"><label style="color:#666;font-weight: bold;">微商助手</label><img src="__PUBLIC__/images/logo-f.png"></span>
        </div>
    </div>

</div>
<div class="banner">
    <span class="banner-left"><a href="__ROOT__/" class="glyphicon glyphicon-home"></a></span>
</div>
<script src="__PUBLIC__/js/jquery-1.11.0.min.js"></script>
<script src="__PUBLIC__/js/bootstrap.min.js"></script>
<script src="__PUBLIC__/js/tip.js"></script>
<script type="text/javascript">
    $(function(){
         $('#login').click(function(){
             var username=$('#username').val();
             var password=$('#password').val();
             if(username=='' || password==''){
                 mobile_tip('error','账号密码必填！！',1000);
             }else{
                 $.post(
                         '__ROOT__/Uenter/loginAction',
                         {username:username,password:password},
                         function(data){
                             switch (data){
                                 case 'ok':
                                     mobile_tip('success','登陆成功！',1000);
                                     setTimeout(function(){
                                         location.href='__ROOT__/Users/index'
                                     },1500);
                                     break;
                                 case '110':
                                     mobile_tip('error','非法操作！',1000);
                                     break;
                                 case 'no-in':
                                     mobile_tip('error','该用户无效！',1000);
                                     break;
                                 case 'wrong':
                                     mobile_tip('error','密码错误！',1000);
                                     break;
                                 case 'wait':
                                     mobile_tip('waiting','请等待60秒！',1000);
                                     break;
                             }
                         }
                 )
             }
         })
    })
</script>
</body>
</html>