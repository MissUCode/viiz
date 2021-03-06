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
        <div class="col-md-12 content content-d" url=""  >
            <h1 class="h1-top"><span class="glyphicon glyphicon-share"></span>  我的帖子</h1>
        </div>
        <?php if(is_array($articles)): $i = 0; $__LIST__ = $articles;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$articles): $mod = ($i % 2 );++$i;?><div class="col-md-12 content content-d" url="" >
            <div class="col-md-12 content-user" >
                <a class="user-pic delete" alt="<?php echo ($articles["id"]); ?>" title="article">删除</a>
                <span class="infos">
                    <label><b><?php echo ($articles["title"]); ?></b></label>
                    <label style="font-size: 10px;"><?php echo (date('Y-m-d H:i:s',$articles["addtime"])); ?></label>
                </span>
                <?php if($articles['is_top']): ?><img src="__PUBLIC__/images/hot.gif" class="hot-best-top"><?php endif; ?>
            </div>
            <div class="col-md-12 content-content" url="">
                <span class="col-md-12" >
                   <p><?php echo ($articles["content"]); ?></p>
                   <p class="action-list">
                       <label>
                           <a  class="zan"><?php echo ($articles["like"]); ?></a>
                           <a  class="share shareTo"></a>
                           <a  class="comment"><?php echo ($articles["comments"]); ?></a>
                       </label>
                   </p>
                </span>

            </div>
        </div><?php endforeach; endif; else: echo "" ;endif; ?>
        <?php if(!$articles): ?><div class="col-md-12 content content-d" url="" style="height: 100px;margin-top: 15px;">
              <span class="the-comment" >
                   <p class="no-comment">您还没有发布帖子呢~~！</p>
             </span>
            </div><?php endif; ?>
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
<script src="__PUBLIC__/js/basic.js"></script>
<script src="__PUBLIC__/js/tip.js"></script>
<script src="__PUBLIC__/js/layer/layer.m.js"></script>
<script type="text/javascript">
    $(function(){
        $('.delete').click(function(){
            var id=$(this).attr('alt');
            var act=$(this).attr('title');
            layer.open({
                content: '你确认要删除该帖子吗？',
                btn: ['确定', '取消'],
                shadeClose: false,
                yes: function(){
                    $.post('__ROOT__/Users/delete',{id:id,act:act},function(data){
                        var m=data.message;
                        var rid=data.rid;
                        if(m=='fail'){
                            layer.open({
                                content: '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;删除失败!',
                                style: 'background-color:#42ab35; color:red; border:none;',
                                time: 2
                            });
                        }else if(m=='success'){
                            layer.open({
                                content: '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;删除成功!',
                                style: 'background-color:#42ab35; color:#fff; border:none;',
                                time: 2
                            });
                            setTimeout(function(){
                                location.reload();
                            },1000);
                        }else{
                        }
                    })
                }, no: function(){
                    return false;
                }
            });
        })
    })
</script>
</body>
</html>