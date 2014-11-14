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
    <div class="row" style="background: #fff;">
        <div class="col-md-12" style="width:100%;background: #fff;">
          <span class="detail-header"><h2><a href="__ROOT__/Index/share/share_id/<?php echo ($shareinfo["id"]); ?>">帖子来自：<b><?php echo ($shareinfo["title"]); ?></b></a></h2><i class="ii"> > </i></span>
        </div>
        <div class="col-md-12 content content-d" url="" >
            <div class="col-md-12 content-user" >
                <img src="__PUBLIC__/images/u.jpg" class="img-responsive img-circle user-pic">
                <span class="infos">
                    <label><b><?php echo (msubstr($articleinfo["title"],0,15)); ?></b><img src="__PUBLIC__/images/l1.jpg"></label>
                    <label style="font-size: 10px;"><?php echo (date('Y-m-d H:i:s',$articleinfo["addtime"])); ?></label>
                </span>
                <img src="__PUBLIC__/images/hot.gif" class="hot-best-top">
            </div>
            <div class="col-md-12 content-content">
                <span class="col-md-12" >
                   <p><?php echo ($articleinfo["content"]); ?></p>
                     <?php if($articleinfo['pics'] != ''): ?><img src="__ROOT__/<?php echo ($articleinfo["pics"]); ?>" class="img-responsive"><?php endif; ?>
                   <p class="action-list">
                       <label>
                           <a  class="zan"><?php echo ($articleinfo["like"]); ?></a>
                           <a  class="share shareTo"></a>
                           <a  class="comment"><?php echo ($commentCounts); ?></a>
                       </label>
                   </p>
                </span>

            </div>
            <div class="col-md-12 content-comment">
            <h2><b><i class="glyphicon glyphicon-comment" ></i> 所有评论</b></h2>
                <span class="the-comment" >
                   <!--<p class="no-comment">本帖暂时没有用户评价~~！</p>-->
                   <p class="the-left">
                      <img src="__PUBLIC__/images/u.jpg" class="img-responsive img-circle user-pic2">
                   </p>
                   <p class="the-right">
                       <font style="color: #42ab35;">杨哲<img src="__PUBLIC__/images/l1.jpg" width="15" height="15"> :</font>
                       说得好呀，做生意就是要讲诚信的嘛，要不然大家都来破坏，吃亏了最后都是大家！大家看看我曾经的女友，很带劲的...O(∩_∩)O哈哈~
                       <img src="__PUBLIC__/images/img3.jpg" class="img-responsive" >
                     <p class="c-action">
                        <label><a class="glyphicon glyphicon-hand-right">&nbsp;赞</a> <a class="glyphicon glyphicon-comment">&nbsp;评论</a></label>
                     </p>
                    <p class="comment-in-comment">
                        <i class="san"></i>
                        <label class="rep"><font style="color: #42ab35;">杨哲：</font>别这样好不好？</label>
                        <label class="rep"><font style="color: #42ab35;">傻大个：</font>扯淡，明明是我的女人？</label>
                        <label class="rep"><font style="color: #42ab35;">杨哲 回复 傻大个：</font>你们赢了，我说的是真的！不信就算了，反正也就是那么回事的的啦，爱爱爱！</label>
                    </p>
                   </p>
                </span>
                <span class="the-comment" >
               <!--<p class="no-comment">本帖暂时没有用户评价~~！</p>-->
                   <p class="the-left">
                       <img src="__PUBLIC__/images/u.jpg" class="img-responsive img-circle user-pic2">
                   </p>
                   <p class="the-right">
                       <font style="color: #42ab35;">杨哲<img src="__PUBLIC__/images/l1.jpg" width="15" height="15"> :</font>
                       说得好呀，做生意就是要讲诚信的嘛，要不然大家都来破坏，吃亏了最后都是大家！大家看看我曾经的女友，很带劲的...O(∩_∩)O哈哈~
                       <img src="__PUBLIC__/images/img3.jpg" class="img-responsive" >
                      <p class="c-action">
                          <label><a class="glyphicon glyphicon-hand-right">&nbsp;赞</a> <a class="glyphicon glyphicon-comment">&nbsp;评论</a></label>
                      </p>
                    </p>
               </span>
               <span class="the-comment" >
               <!--<p class="no-comment">本帖暂时没有用户评价~~！</p>-->
               <p class="the-left">
                   <img src="__PUBLIC__/images/u.jpg" class="img-responsive img-circle user-pic2">
               </p>
               <p class="the-right">
                   <font style="color: #42ab35;">杨哲<img src="__PUBLIC__/images/l1.jpg" width="15" height="15"> :</font>
                   说得好呀，做生意就是要讲诚信的嘛，要不然大家都来破坏，吃亏了最后都是大家！大家看看我曾经的女友，很带劲的...O(∩_∩)O哈哈~

                  <p class="c-action">
                      <label><a class="glyphicon glyphicon-thumbs-up">&nbsp;赞</a> <a class="glyphicon glyphicon-comment">&nbsp;评论</a></label>
                  </p>
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
                   <label><b>翘脚的故事</b><img src="__PUBLIC__/images/l1.jpg"></label>
                </span>
    </div>
    <ul class="menu-list">
        <li><a href="#">我的分享圈</a><i class="go"> > </i></li>
        <li><a href="#">我的帖子</a><i class="go">></i></li>
        <li><a href="#">我的资料</a><i class="go">></i></li>
        <li><a href="#">我的通知</a><i class="go">></i><i class="notice">15</i></li>
        <li><a href="#">反馈建议</a><i class="go">></i></li>
    </ul>
</div>
<div class="add-content">
  <span class="text-content">
      <label class="text-content-header"><i class="glyphicon glyphicon-map-marker" style=""></i> 有你参与才精彩<button class="cancel">取消</button></label>
      <p class="circel-desc">
          <label class="circel-name">分享圈名称：<input type="text" placeholder="分享圈名称..."></label>
          <label class="circel-d">分享圈简述：<textarea  placeholder="说点什么吧..."></textarea></label>
      </p>
      <!--<textarea class="desc" placeholder="说点什么吧..."></textarea>-->
  </span>
  <span class="pic-content">
      <img src="__PUBLIC__/images/img3.jpg" class="upload-img">
      <input type="file" class="up-img" style="display: none;">
      <img src="__PUBLIC__/images/img.jpg" class="upload-img">
      <a class="add-face">+_+</a>
      <a class="add-pic"><i class="glyphicon glyphicon-picture"></i></a>
      <button class="submit">发送</button>
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
<script src="__PUBLIC__/js/jquery-1.11.0.min.js"></script>
<script src="__PUBLIC__/js/bootstrap.min.js"></script>
<script src="__PUBLIC__/js/basic.js"></script>
</body>
</html>