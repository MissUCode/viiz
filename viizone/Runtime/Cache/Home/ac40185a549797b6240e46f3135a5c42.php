<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <title>微商助手</title>
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
    <div class="row" >
        <div class="col-md-12" style="padding-top: 10px; border-bottom: #eee 1px solid;background: #fff;position: relative;">
            <span class="col-md-12 hot-title">
                <img src="__PUBLIC__/images/king.png" >
                <label>“<?php echo ($shareinfo["title"]); ?>”活跃份子</label>
            </span>
            <span class="col-md-12 hot-clude">
               <?php if(is_array($hot_users)): $i = 0; $__LIST__ = $hot_users;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$hot): $mod = ($i % 2 );++$i;?><p class="hot-c4">
                     <a href="#">
                         <?php if($hot['pic'] != ''): ?><img src="__ROOT__/<?php echo ($hot["pic"]); ?>" class="img-circle">
                             <?php else: ?>
                             <img src="__PUBLIC__/images/vii.png" class="img-circle"><?php endif; ?>
                     </a>
                     <label><?php echo (msubstr($hot["nickname"],0,5)); ?></label>
                   </p><?php endforeach; endif; else: echo "" ;endif; ?>
            </span>
            <a class="joinTo" alt="<?php echo ($shareinfo["id"]); ?>"></a>
        </div>
        <?php if(is_array($articles)): $i = 0; $__LIST__ = $articles;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$art): $mod = ($i % 2 );++$i;?><div class="col-md-12 content" url="__ROOT__/Index/article/article_id/<?php echo ($art["id"]); ?>.html">
            <div class="col-md-12 content-user">
                <?php if($art['userpic'] != ''): ?><img src="__ROOT__/<?php echo ($art["userpic"]); ?>" class="img-responsive img-circle user-pic">
                    <?php else: ?>
                    <img src="__PUBLIC__/images/vii.png" class="img-responsive img-circle user-pic"><?php endif; ?>
                <span class="infos">
                    <label><b><?php echo (msubstr($art["title"],0,15)); ?>...</b><img src="__PUBLIC__/images/l1.jpg"></label>
                    <label style="font-size: 10px;"><?php echo (date('Y-m-d H:i:s',$art["addtime"])); ?></label>
                </span>
                <?php if($art['is_top']): ?><img src="__PUBLIC__/images/hot.gif" class="hot-best-top"><?php endif; ?>
            </div>
            <div class="col-md-12 content-content">
                <span class="col-md-12" >
                   <p><?php echo ($art["content"]); ?></p>
                    <?php if($art['pics']): ?><img src="__ROOT__/<?php echo ($art["pics"]); ?>" class="img-responsive" width="40%" height="40%"><?php endif; ?>
                   <p class="action-list">
                       <label>
                           <a  class="zan share-like" id="share-<?php echo ($art["id"]); ?>" alt="<?php echo ($art["id"]); ?>" title="article"><?php echo ($art["like"]); ?></a>
                           <a  class="share shareTo"></a>
                           <a  class="comment"><?php echo ($art["comment"]); ?></a>
                       </label>
                   </p>
                </span>

            </div>
        </div><?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
    <div class="row" style="padding-bottom: 60px;">
        <div class="col-md-12" style="text-align: center;">
            <?php echo ($page); ?>
        </div>
        <div class="col-md-12">
            <span style="display: block;width: 150px;margin:0 auto;"><label style="color:#666;font-weight: bold;">微商助手</label><img src="__PUBLIC__/images/logo-f.png"></span>
        </div>
    </div>

</div>
<div class="banner">
    <span class="banner-left"><a href="javascript:history.go(-1);"> < </a></span>
    <span class="banner-center"><a >发布帖子</a></span>
    <span class="banner-right"><a >...</a></span>
</div>
<div class="menu">
    <h2 class="center-head"><i class="glyphicon glyphicon-user"></i> 个人中心</h2>
    <div class="col-md-12 content-user" style="margin:15px 0px 0px 15px;">
        <img src="__PUBLIC__/images/vii.png" class="img-responsive img-circle user-pic">
                <span class="infos" style="top:8px;left: 45px;">
                   <label><b><?php echo (session('users_name')); ?></b><img src="__PUBLIC__/images/l1.jpg"></label>
                </span>
    </div>
    <ul class="menu-list">
        <li><a href="__ROOT__/Users/shares.html">我的分享圈</a><i class="go">></i></li>
        <li><a href="__ROOT__/Users/articles.html">我的帖子</a><i class="go">></i></li>
        <li><a href="__ROOT__/Users/profile.html">我的资料</a><i class="go">></i></li>
        <li><a href="__ROOT__/Users/notice.html">我的通知</a><i class="go">></i><i class="notice">15</i></li>
        <li><a href="__ROOT__/Users/feedback.html">反馈建议</a><i class="go">></i></li>
        <?php if($_SESSION['users_id']): ?><li><a href="__ROOT__/Uenter/logout.html">退出登录</a><i class="go">></i></li>
            <?php else: ?>
            <li><a href="__ROOT__/Uenter/login.html">我要登录</a><i class="go">></i></li><?php endif; ?>
    </ul>
</div>
<div class="add-content">
  <span class="text-content">
      <label class="text-content-header"><i class="glyphicon glyphicon-map-marker" style=""></i> 有你参与才精彩<button class="cancel">取消</button></label>
      <p class="circel-desc">
          <label class="circel-name"><i >帖子标题：</i><input type="text" placeholder="帖子标题..." id="share-title"></label>
          <label class="circel-d"><i >帖子内容：</i><textarea  placeholder="说点什么吧..." id="share-desc"></textarea></label>
      </p>
      <!--<textarea class="desc" placeholder="说点什么吧..."></textarea>-->
  </span>
  <span class="pic-content">
      <!--<img src="__PUBLIC__/images/img3.jpg" class="upload-img">-->
      <form action="__ROOT__/Index/upImg" method="post" id="uploadForm" enctype="multipart/form-data" >
       <input type="file" class="up-img" style="display: none;" name="pic" id="pic">
      </form>
      <input type="hidden" name="pics" id="sharepic" value="">
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
<script src="__PUBLIC__/js/upload.js"></script>
<script src="__PUBLIC__/js/basic.js"></script>
<script src="__PUBLIC__/js/tip.js"></script>
<script type="text/javascript">
    $(function(){
        $('.add-pic').click(function(){
            uploadimg('__ROOT__/Index/upImg','pic','pic','json','sharepic','__ROOT__/');
        })
        $('#submit-button').click(function(){
            var title=$('#share-title').val();
            var desc=$('#share-desc').val();
            var pic=$('#sharepic').val();
            var sid='<?php echo ($shareinfo["id"]); ?>';
            if(title==''||desc==''){
                mobile_tip('error','请填写完整的信息！',1000);
                return false;
            }
            $.post('__ROOT__/Index/addArticle',{title:title,desc:desc,pic:pic,sid:sid},function(data){
                var m=data.message;
                if(m=='no-in'){
                    mobile_tip('waiting','请先加入分享圈！',1000);
                    setTimeout(function(){
                        $('.cancel').click();
                    },1500);
                }else if(m=='110'){
                    mobile_tip('error','您还没登录！',1000);
                    setTimeout(function(){
                        location.href='__ROOT__/Uenter/login';
                    },1000);
                }else if(m=='success'){
                    mobile_tip('success','发布成功！',1000);
                    setTimeout(function(){
                        location.href='__ROOT__/Users/shares';
                    },1000);
                }else if(m=='fail'){
                    mobile_tip('error','发布帖子失败！',1000);
                }else{
                    mobile_tip('error','请填写完整的信息！',1000);
                }
            })
        })
        $('.joinTo').click(function(){
            var sid=$(this).attr('alt');
            $.post('__ROOT__/Index/joinTo',{sid:sid},function(data){
                var m=data.message;
                if(m=='had-in'){
                    mobile_tip('error','您已加入此圈很久了！',1000);
                }else if(m=='110'){
                    mobile_tip('error','您还没登录！',1000);
                    setTimeout(function(){
                        location.href='__ROOT__/Uenter/login';
                    },1000);
                }else if(m=='success'){
                    mobile_tip('success','加入成功！',1000);
                }else if(m=='fail'){
                    mobile_tip('error','加入失败！',1000);
                }else{
                    mobile_tip('error','系统繁忙！',1000);
                }
            })
        })
        $('.share-like').click(function(){
            var id=$(this).attr('alt');
            var act=$(this).attr('title');
            $.post('__ROOT__/Index/like',{id:id,act:act},function(data){
                var m=data.message;
                var rid=data.rid;
                if(m=='wait'){
                    mobile_tip('waiting','先休息一下嘛！',1000);
                }else if(m=='success'){
                    $('#share-'+id).html(rid);
                }else{
                }
            })
            return false;
        })
    })
</script>
</body>
</html>