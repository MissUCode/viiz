<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <title>微商助手</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta http-equiv=Content-Type content="text/html;charset=utf-8">
    <link rel="stylesheet" href="__PUBLIC__/css/bootstrap_home.min.css">
    <link rel="stylesheet" href="__PUBLIC__/css/comm.css">
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
    <div class="row" >
        <div class="col-md-12 content content-d" url=""  >
            <h1 class="h1-top"><span class="glyphicon glyphicon-share"></span>  我的帖子</h1>
        </div>
        <div class="col-md-12 content content-d" url="" >
            <div class="col-md-12 content-user" >
                <a class="user-pic delete">删除</a>
                <span class="infos">
                    <label><b>微商的做法</b></label>
                    <label style="font-size: 10px;">2014-10-21 14:28:36</label>
                </span>
                <img src="__PUBLIC__/images/hot.gif" class="hot-best-top">
            </div>
            <div class="col-md-12 content-content" url="">
                <span class="col-md-12" >
                   <p>微商的做法：1、坚持。2、不要脸。3、坚持不要脸。</p>
                   <p class="action-list">
                       <label>
                           <a  class="zan">10</a>
                           <a  class="share shareTo"></a>
                           <a  class="comment">110</a>
                       </label>
                   </p>
                </span>

            </div>
        </div>
        <div class="col-md-12 content content-d" url="" >
            <div class="col-md-12 content-user" >
                <a class="user-pic delete">删除</a>
                <a class="set-top">置顶</a>
                <span class="infos">
                    <label><b>微商的做法</b></label>
                    <label style="font-size: 10px;">2014-10-21 14:28:36</label>
                </span>
            </div>
            <div class="col-md-12 content-content">
                <span class="col-md-12" >
                   <p>微商的做法：1、坚持。2、不要脸。3、坚持不要脸。</p>
                   <p class="action-list">
                       <label>
                           <a  class="zan">10</a>
                           <a  class="share shareTo"></a>
                           <a  class="comment">110</a>
                       </label>
                   </p>
                </span>

            </div>
        </div>
        <div class="col-md-12 content content-d"  url="">
            <div class="col-md-12 content-user" >
                <a class="user-pic delete">删除</a>
                <a class="set-top">置顶</a>
                <span class="infos">
                    <label><b>微商的做法</b></label>
                    <label style="font-size: 10px;">2014-10-21 14:28:36</label>
                </span>
            </div>
            <div class="col-md-12 content-content">
                <span class="col-md-12" >
                   <p>微商的做法：1、坚持。2、不要脸。3、坚持不要脸。</p>
                   <p class="action-list">
                       <label>
                           <label>
                               <a  class="zan">10</a>
                               <a  class="share shareTo"></a>
                               <a  class="comment">110</a>
                           </label>
                       </label>
                   </p>
                </span>

            </div>
        </div>
    </div>
    <div class="row" style="padding-bottom: 60px;">
        <div class="col-md-12">
            <p style="text-align: center;line-height: 30px;color: #666;">已显示全部</p>
        </div>
        <div class="col-md-12">
            <span style="display: block;width: 150px;margin:0 auto;"><label style="color:#666;font-weight: bold;">微商助手</label><img src="__PUBLIC__/images/logo-f.png"></span>
        </div>
    </div>
</div>
<div class="banner">
    <span class="banner-left"><a href="javascript:history.go(-1);"> < </a></span>
    <span class="banner-center"><a >建分享圈</a></span>
    <span class="banner-right"><a >...</a></span>
</div>
<div class="menu">
    <h2 class="center-head"><i class="glyphicon glyphicon-user"></i> 个人中心</h2>
    <div class="col-md-12 content-user" style="margin:15px 0px 0px 15px;">
        <img src="__PUBLIC__/images/u.jpg" class="img-responsive img-circle user-pic">
                <span class="infos" style="top:8px;left: 45px;">
                   <label><b><?php echo (session('users_name')); ?></b><img src="__PUBLIC__/images/l1.jpg"></label>
                </span>
    </div>
    <ul class="menu-list">
        <li><a href="__ROOT__/Users/shares.html">我的分享圈</a><i class="go">></i></li>
        <li><a href="__ROOT__/Users/articles.html">我的帖子</a><i class="go">></i></li>
        <li><a href="__ROOT__/Users/profile.html">我的资料</a><i class="go">></i></li>
        <li><a href="__ROOT__/Users/notice.html">我的通知</a><i class="go">></i><i class="notice">15</i></li>
        <li><a href="#">反馈建议</a><i class="go">></i></li>
        <?php if($_SESSION['users_id']): ?><li><a href="__ROOT__/Uenter/logout.html">退出登录</a><i class="go">></i></li>
          <?php else: ?>
            <li><a href="__ROOT__/Uenter/login.html">我要登录</a><i class="go">></i></li><?php endif; ?>
    </ul>
</div>
<div class="add-content">
  <span class="text-content">
      <label class="text-content-header"><i class="glyphicon glyphicon-map-marker" style=""></i> 有你参与才精彩<button class="cancel">取消</button></label>
      <p class="circel-desc">
          <label class="circel-name"><i >分享圈名称：</i><input type="text" placeholder="分享圈名称..." id="share-title"></label>
          <label class="circel-d"><i >分享圈简述：</i><textarea  placeholder="说点什么吧..." id="share-desc"></textarea></label>
      </p>
  </span>
  <span class="pic-content">
      <!--<img src="__PUBLIC__/images/img3.jpg" class="upload-img">-->
      <form action="__ROOT__/Index/upImg" method="post" id="uploadForm" enctype="multipart/form-data" >
       <input type="file" class="up-img" style="display: none;" name="pic" id="pic">
      </form>
      <input type="hidden" name="pics" id="sharepic" value="">
      <!--<img src="__PUBLIC__/images/img.jpg" class="upload-img">-->
      <a class="add-face">+_+</a>
      <a class="add-pic"><i class="glyphicon glyphicon-picture"></i></a>
      <button class="submit" type="button" id="submit-button">发送</button>
  </span>
     <span class="face-pic">
     <?php if(is_array($faces)): $i = 0; $__LIST__ = $faces;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$faces): $mod = ($i % 2 );++$i;?><img src="__PUBLIC__/images/face/<?php echo ($faces["name"]); ?>" alt="<emt><?php echo ($faces["name"]); ?></emt>" class="face"><?php endforeach; endif; else: echo "" ;endif; ?>
  </span>
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
<script src="__PUBLIC__/js/basic.js"></script>
</body>
</html>