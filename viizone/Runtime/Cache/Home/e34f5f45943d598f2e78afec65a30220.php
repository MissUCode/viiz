<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <title>微商助手-我的资料</title>
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
    <div class="col-sm-12 ad">

    </div>
</div>
<div class="row">
    <!--<div class="col-sm-12 header-nav">-->
    <!--<a href="#" class="go-back"></a>-->
    <!--<h1 class="header-title">微商部落</h1>-->
    <!--<a href="#" class="add-new"></a>-->
    <!--</div>-->
    <div class="col-sm-12 header" style="background: #fff;">
        <a href="__ROOT__/"><img src="__PUBLIC__/images/logo.png" class="img-circle img-responsive logo" ></a>
        <h1 class="website-name">微商助手</h1>
        <img src="__PUBLIC__/images/chat.png" class="chat">
          <span class="tj">
              <label>分享圈：<font style="color: #42ab35;"><?php echo ($sharecount); ?></font></label>
              <label>&nbsp;访问量：<font style="color: #42ab35;"><?php echo ($visitcount); ?></font></label>
          </span>
        <!--<a href="#" class="action">-->
        <!--<img src="__PUBLIC__/images/join.png" >-->
        <!--</a>-->
        <!--<a href="#" class="action">-->
        <!--<img src="__PUBLIC__/images/create.png" >-->
        <!--</a>-->
        <a  class="action shareTo">
            <img src="__PUBLIC__/images/share.png" >
        </a>
    </div>
</div>
    <div class="row">
        <div class="profile">
         <span class="top-pic" style="margin-bottom:30px; ">
             <?php if($_SESSION['users_pic']): ?><img src="__ROOT__/<?php echo (session('users_pic')); ?>" class="img-responsive img-circle user-pic-p">
                 <?php else: ?>
                 <img src="__PUBLIC__/images/v_user.png" class="img-responsive img-circle user-pic-p"><?php endif; ?>
             <p style="margin-top:40px;text-align: center;color: #666;">修改头像</p>
         </span>
         <span class="profile-form">
             <label>我的昵称：<input type="text" class="tt" value="<?php echo ($infos["nickname"]); ?>" id="nickname"></label>
             <label style="height: 30px;">
                 <input type="radio" id="sex" name="sex" <?php if($infos['sex'] == 1): ?>checked="checked"<?php endif; ?> value="1" > 我是男生
                 <input type="radio" name="sex" <?php if($infos['sex'] == 0): ?>checked="checked"<?php endif; ?> value="0"> 我是女生
             </label>
             <label>我的账号：<input type="text" class="tt" value="<?php echo ($infos["username"]); ?>" id="username"></label>
             <label>我的密码：<input type="password" class="tt" id="password"></label>
             <label ><input type="button" value="保存" class="saved tt" id="profile"></label>
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
    <span class="banner-left"><a href="javascript:history.go(-1);"> < </a></span>
    <span class="banner-center"></span>
    <span class="banner-right"><a >...</a></span>
</div>
<div class="menu">
    <h2 class="center-head"><i class="glyphicon glyphicon-user"></i> 个人中心</h2>
    <div class="col-md-12 content-user" style="margin:15px 0px 0px 15px;">
        <?php if($_SESSION['users_pic']): ?><img src="__ROOT__/<?php echo (session('users_pic')); ?>" class="img-responsive img-circle user-pic">
            <?php else: ?>
            <img src="__PUBLIC__/images/v_user.png" class="img-responsive img-circle user-pic"><?php endif; ?>
                <span class="infos" style="top:8px;left: 45px;">
                   <label><b><?php echo (session('users_name')); ?></b><img src="__PUBLIC__/images/v<?php echo (session('users_lev')); ?>.png"></label>
                </span>
    </div>
    <ul class="menu-list">
        <li><a href="__ROOT__/Users/shares.html">我创建的分享圈</a><i class="go">></i></li>
        <li><a href="__ROOT__/Users/inShares.html">我加入的分享圈</a><i class="go">></i></li>
        <li><a href="__ROOT__/Users/articles.html">我发布的帖子</a><i class="go">></i></li>
        <li><a href="__ROOT__/Users/profile.html">我的个人资料</a><i class="go">></i></li>
        <li><a href="__ROOT__/Users/notice.html">我的系统通知</a><i class="go">></i><i class="notice">15</i></li>
        <li><a href="#">我要反馈建议</a><i class="go">></i></li>
        <?php if($_SESSION['users_id']): ?><li><a href="__ROOT__/Uenter/logout.html">退出登录</a><i class="go">></i></li>
            <?php else: ?>
            <li><a href="__ROOT__/Uenter/login.html">我要登录</a><i class="go">></i></li><?php endif; ?>
    </ul>
</div>
<div class="add-content">
  <span class="bottom-content" style="display:block;width:100%;background: #fff;float: left;border-top:#eee 1px solid;">
      <div class="row" style="padding:20px 0px 60px 0px;">
          <div class="col-md-12">
              <span style="display: block;width: 150px;margin:0 auto;"><label style="color:#666;font-weight: bold;">微商助手</label><img src="__PUBLIC__/images/logo-f.png"></span>
          </div>
      </div>
  </span>
</div>
<div class="addshare"></div>
<div class="bu"></div>
<script type="text/javascript">
    delurl="__ROOT__/Index/delPic";
</script>
<script src="__PUBLIC__/js/jquery-1.11.0.min.js"></script>
<script src="__PUBLIC__/js/bootstrap.min.js"></script>
<script src="__PUBLIC__/js/upload.js"></script>
<script src="__PUBLIC__/js/basic.js"></script>
<script src="__PUBLIC__/js/tip.js"></script>
<script type="text/javascript">
    $(function(){
        $('#profile').click(function(){
            var nickname=$('#nickname').val();
            var username=$('#username').val();
            var password=$('#password').val();
            var sex= $('input[name="sex"]:checked').val();
            $.post('__ROOT__/Users/profileAction',{nickname:nickname,username:username,password:password,sex:sex},function(data){
               if(data=='success'){
                   mobile_tip('success','资料修改成功！');
                   setTimeout(function(){
                       location.reload();
                   },1000);
               }else if(data=='fail'){
                   mobile_tip('error','资料修改失败！');
               }else if(data=='had-in'){
                   mobile_tip('error','账号或昵称已被注册！');
               }else{
                   mobile_tip('waiting','请休息一下！');
               }
            })
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