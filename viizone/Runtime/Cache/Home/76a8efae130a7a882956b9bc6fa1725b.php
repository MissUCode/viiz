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
    <div class="row" style="background: #fff;">
        <div class="col-md-12" style="width:100%;background: #fff;">
          <span class="detail-header"><h2><a href="__ROOT__/Index/share/share_id/<?php echo ($shareinfo["id"]); ?>">帖子来自：<b><?php echo ($shareinfo["title"]); ?></b></a></h2><i class="ii"> > </i></span>
        </div>
        <div class="col-md-12 content content-d" url="" >
            <div class="col-md-12 content-user" >

                <?php if($articleinfo['pic']): ?><img src="__ROOT__/<?php echo ($articleinfo["pic"]); ?>" class="img-responsive img-circle user-pic">
                    <?php else: ?>
                    <img src="__PUBLIC__/images/v_user.png" class="img-responsive img-circle user-pic"><?php endif; ?>

                <span class="infos">
                    <label><b><?php echo (msubstr($articleinfo["title"],0,12)); ?></b><img src="__PUBLIC__/images/v<?php echo ($articleinfo["lev"]); ?>.png"></label>
                    <label style="font-size: 10px;"><?php echo (date('Y-m-d H:i:s',$articleinfo["addtime"])); ?>&nbsp; By <font style="color: #42ab35;"><?php echo (msubstr($articleinfo["username"],0,8)); ?></font></label>
                </span>
                <?php if($articleinfo['is_top']): ?><img src="__PUBLIC__/images/hot.gif" class="hot-best-top"><?php endif; ?>
            </div>
            <div class="col-md-12 content-content">
                <span class="col-md-12" >
                   <p><?php echo ($articleinfo["content"]); ?></p>
                     <?php if($articleinfo['pics'] != ''): ?><img src="__ROOT__/<?php echo ($articleinfo["pics"]); ?>" class="img-responsive"><?php endif; ?>
                   <p class="action-list">
                       <label>
                           <a  class="zan share-like" id="share-<?php echo ($articleinfo["id"]); ?>" alt="<?php echo ($articleinfo["id"]); ?>" title="article"><?php echo ($articleinfo["like"]); ?></a>
                           <a  class="share shareTo"></a>
                           <a  class="comment comment-to" alt="0"><?php echo ($commentCounts); ?></a>
                       </label>
                   </p>
                </span>
            </div>
            <div class="col-md-12 content-comment">
            <h2><b><i class="glyphicon glyphicon-comment" ></i> 所有评论</b></h2>
                <input type="hidden" id="toid" value="0">
                <input type="hidden" id="pid" value="0">
                <?php if(!$comments): ?><span class="the-comment" >
                   <p class="no-comment">本帖暂时没有用户评价~~！</p>
                   </span><?php endif; ?>
                <?php if(is_array($comments)): $i = 0; $__LIST__ = $comments;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$comments): $mod = ($i % 2 );++$i;?><span class="the-comment" >
                   <p class="the-left">
                       <?php if($comments['pic']): ?><img src="__ROOT__/<?php echo ($comments["pic"]); ?>" class="img-responsive img-circle user-pic2">
                           <?php else: ?>
                           <img src="__PUBLIC__/images/v_user.png" class="img-responsive img-circle user-pic2"><?php endif; ?>
                   </p>
                   <p class="the-right">
                       <font style="color: #42ab35;"><?php echo (($comments["nickname"])?($comments["nickname"]):"该用户隐藏昵称"); ?>
                           <img src="__PUBLIC__/images/v<?php echo ($comments["lev"]); ?>.png"> :
                       </font>
                       <?php echo ($comments["content"]); ?>
                       <?php if($comments['pics']): ?><img src="__ROOT__/<?php echo ($comments["pics"]); ?>" class="img-responsive" style="margin-top: 5px;" ><?php endif; ?>
                     <p class="c-action">
                        <label><a class="glyphicon glyphicon-hand-right share-like" id="share-<?php echo ($comments["id"]); ?>" alt="<?php echo ($comments["id"]); ?>" title="comment">&nbsp;<?php echo ($comments["like"]); ?></a> <a class="glyphicon glyphicon-comment comment-to1" alt="<?php echo ($comments["id"]); ?>" title="0">&nbsp;评论</a></label>
                     </p>
                    <?php if($comments['child']): ?><p class="comment-in-comment">
                        <i class="san"></i>
                        <?php if(is_array($comments['child'])): $i = 0; $__LIST__ = $comments['child'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$child): $mod = ($i % 2 );++$i; if(!$child['toid']): ?><label class="rep comment-to2" alt="<?php echo ($comments["id"]); ?>" title="<?php echo ($child["uid"]); ?>"><font style="color: #42ab35;"><?php echo (($child["nickname"])?($child["nickname"]):"匿名会有"); ?>：</font><?php echo ($child["content"]); ?></label><?php endif; ?>
                            <?php if($child['toid']): ?><label class="rep comment-to2" alt="<?php echo ($comments["id"]); ?>" title="<?php echo ($child["uid"]); ?>"><font style="color: #42ab35;"><?php echo ($child["nickname"]); ?> 回复 <?php echo ($child["toname"]); ?>：</font>
                                <?php echo ($child["content"]); ?>
                            </label><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                    </p><?php endif; ?>
                   </p>
                </span><?php endforeach; endif; else: echo "" ;endif; ?>
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
    <span class="banner-center"><a >评论</a></span>
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
<div class="add-content" >
  <span class="text-content" style="height: 230px;">
      <label class="text-content-header"><i class="glyphicon glyphicon-map-marker" style=""></i> 有你参与才精彩<button class="cancel">取消</button></label>
      <p class="circel-desc">
          <label class="circel-d"><textarea  placeholder="说点什么吧..." id="share-desc"></textarea></label>
      </p>
  </span>
  <span class="pic-content" style="height: 60px;">
      <form action="__ROOT__/Index/upImg" method="post" id="uploadForm" enctype="multipart/form-data" >
       <input type="file" class="up-img" style="display: none;" name="pic" id="pic">
      </form>
      <input type="hidden" name="pics" id="sharepic" value="">
      <a class="add-face">+_+</a>
      <button class="submit" type="button" id="submit-button">评论</button>
  </span>
  <span class="face-pic">
     <?php if(is_array($faces)): $i = 0; $__LIST__ = $faces;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$faces): $mod = ($i % 2 );++$i;?><img src="__PUBLIC__/images/face/<?php echo ($faces["name"]); ?>" alt="<emt><?php echo ($faces["name"]); ?></emt>" class="face"><?php endforeach; endif; else: echo "" ;endif; ?>
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
        $('#submit-button').click(function(){
            var desc=$('#share-desc').val();
            var sid='<?php echo ($shareinfo["id"]); ?>';
            var aid='<?php echo ($articleinfo["id"]); ?>';
            var toid=$('#toid').val();
            var pid=$('#pid').val();
            if(desc==''){
                mobile_tip('error','请填写评论内容！',1000);
                return false;
            }
            $.post('__ROOT__/Index/comment',{desc:desc,aid:aid,toid:toid,pid:pid,sid:sid},function(data){
                var m=data.message;
                if(m=='no-in'){
                    mobile_tip('waiting','请先加入分享圈！',1000);
                    setTimeout(function(){
                        location.href='__ROOT__/Index/share/share_id/'+sid;
                    },1000);
                }else if(m=='110'){
                    mobile_tip('error','您还没登录！',1000);
                    setTimeout(function(){
                        location.href='__ROOT__/Uenter/login';
                    },1000);
                }else if(m=='success'){
                    mobile_tip('success','评论成功！',1000);
                    setTimeout(function(){
                        location.reload();
                    },1000);
                }else if(m=='fail'){
                    mobile_tip('error','评论失败！',1000);
                }else{
                    mobile_tip('error','请填写评论内容！',1000);
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
                    html='&nbsp;'+rid;
                    $('#share-'+id).html(html);
                }else{
                }
            })
            return false;
        })

    })
</script>
</body>
</html>