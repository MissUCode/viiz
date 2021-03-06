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
         <span class="top-pic">用户注册</span>
         <span class="profile-form">
             <label>您的昵称：<input type="text" class="tt" id="nickname" placeholder="您的昵称"></label>
             <label style="height: 30px;">
                 <input type="radio" name="sex"  value="1" checked > 您是男生
                 <input type="radio" name="sex" value="0"> 您是女生
             </label>
             <label>您的账号：<input type="text" class="tt" id="username" placeholder="您的账号(邮箱或手机)"></label>
             <label>您的密码：<input type="password" class="tt" id="password" placeholder="您的密码"></label>
             <label>确认密码：<input type="password" class="tt" id="repassword" placeholder="确认密码"></label>
              <label style="height: 30px;"><input type="button" value="1秒钟注册" class="saved tt" id="reg"></label>
              <label style="height: 30px;"><i><a href="__ROOT__/Uenter/login.html">返回登陆</a></i></label>
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
      $('#reg').click(function(){
         //mobile_tip('success','ok!',1000);
          var nickname=$('#nickname').val();
          var username=$('#username').val();
          var password=$('#password').val();
          var repassword=$('#repassword').val();
          var sex= $('input[name="sex"]:checked').val();
          if(nickname=='' ||username==''||password==''){
              mobile_tip('error','请填写完整信息!',1000);
              return false;
          }
          if(password!=repassword){
              mobile_tip('error','两次密码不一致!',1000);
              return false;
          }
          $.post(
                  '__ROOT__/Uenter/regAction',
                  {nickname:nickname,password:password,username:username,sex:sex},
                  function(data){
                      switch (data){
                          case 'ok':
                              mobile_tip('success','注册成功！',1000);
                              setTimeout(function(){
                                  location.href='__ROOT__/Uenter/login'
                              },1500);
                              break;
                          case '110':
                              mobile_tip('error','非法操作！',1000);
                              break;
                          case 'a-had':
                              mobile_tip('error','账号已被注册！',1000);
                              break;
                          case 'n-had':
                              mobile_tip('error','昵称已被注册！',1000);
                              break;
                          case 'a-wrong':
                              mobile_tip('error','账号格式错误！',1000);
                              break;
                          case 'wait':
                              mobile_tip('waiting','请等待60秒！',1000);
                              break;
                          case 'fail':
                              mobile_tip('error','注册失败！',1000);
                              break;
                          case 'lost':
                              mobile_tip('error','请填写完整的信息！',1000);
                              break;
                      }
                  }
          )
      })
        $('#nickname').blur(function(){
            var keys=$(this).val();
            if(keys==''){
                return false;
            }
            $.post(
                    '__ROOT__/Uenter/checkUser',
                    {
                        keys:keys,type:'nickname'
                    },
                    function(data){
                        //alert(data);
                        switch (data){
                            case '0':
                                mobile_tip('error','该昵称已被注册！',1000);
                                break;
                            case '1':
                                mobile_tip('success','该昵称可以注册！',1000);
                                break;
                        }
                    }
            )
        })
        $('#username').blur(function(){
            var keys=$(this).val();
            if(keys==''){
                return false;
            }
            $.post(
                    '__ROOT__/Uenter/checkUser',
                    {
                        keys:keys,type:'account'
                    },
                    function(data){
                        //alert(data);
                        switch (data){
                            case '0':
                                mobile_tip('error','该账号已被注册！',1000);
                                break;
                            case '1':
                                mobile_tip('success','该账号可以注册！',1000);
                                break;
                            case '2':
                                mobile_tip('error','账号格式不正确！',1000);
                                break;
                        }
                    }
            )
        })
    })
</script>
</body>
</html>