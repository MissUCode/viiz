<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
   <meta charset="utf-8" />
   <title>微搜-用户中心</title>
   <meta content="width=device-width, initial-scale=1.0" name="viewport" />
   <meta content="" name="description" />
   <meta content="Mosaddek" name="author" />
   <link href="__PUBLIC__/css/metro-bootstrap.css" rel="stylesheet" />
   <link rel="stylesheet" href="__PUBLIC__/css/font-awesome.min.css">
   <link rel="stylesheet" href="__PUBLIC__/css/css.css">
    <link rel="stylesheet" href="__PUBLIC__/css/ui-dialog.css">
    <link rel="stylesheet" href="__PUBLIC__/css/tip.css">
    <link rel="icon" href="__PUBLIC__/images/favicon.png"  type="image/x-icon" />
   <style type="text/css">
       body{
           font-family: '微软雅黑';
       }
   </style>
</head>
<body>
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
<div class="content" >
    <div class="maylike" style="margin-top: 10px;">
        <h2 class="lists-title" style="height: 0px;border-bottom: none;">
            <!--<a href="#" class="tab-a-active">用户中心</a>-->
        </h2>
        <div class="container-content">
          <div class="ucenter-left">
              <ul class="list-group">
    <li class="list-group-item <?php if($position == 'index'): ?>list-group-item-active<?php endif; ?>" style="border-radius: 0px 15px 0px 0px;"><a href="<?php echo U('Users/index');?>">中心首页</a></li>
    <li class="list-group-item <?php if($position == 'score'): ?>list-group-item-active<?php endif; ?>"><a href="<?php echo U('Users/score');?>">我的积分</a></li>
    <li class="list-group-item <?php if($position == 'account'): ?>list-group-item-active<?php endif; ?>"><a href="<?php echo U('Users/account');?>">我的账号</a></li>
    <li class="list-group-item <?php if($position == 'about'): ?>list-group-item-active<?php endif; ?>"><a href="<?php echo U('Users/about');?>">关于推广</a></li>
    <li class="list-group-item <?php if($position == 'spread'): ?>list-group-item-active<?php endif; ?>"><a href="<?php echo U('Users/spread');?>">我的推广</a></li>
    <li class="list-group-item <?php if($position == 'profile'): ?>list-group-item-active<?php endif; ?>"><a href="<?php echo U('Users/profile');?>">修改信息</a></li>
    <li class="list-group-item <?php if($position == 'notice'): ?>list-group-item-active<?php endif; ?>"><a href="<?php echo U('Users/notice');?>">系统通知</a></li>
</ul>
          </div>
          <div class="ucenter-right">
              <div class="panel panel-default">
                  <div class="panel-heading">系统通知</div>
                  <div class="panel-body">
                      <div class="widget-body">
                          <table class="table table-striped table-bordered table-advance table-hover">
                              <thead>
                              <tr>
                                  <th>
                                      <i style="font-style: normal;" for="selectall">
                                          <input type="checkbox" id="selectall" >  全选
                                      </i>
                                  </th>
                                  <th>时间</th>
                                  <th> 内容摘要</th>
                                  <th><i class="icon-bookmark"></i> 状态</th>
                                  <th>操作</th>
                              </tr>
                              </thead>
                              <tbody>
                              <form action="__ROOT__/Home/Users/deleteall" method="post" id="deleteall">
                                  <?php if(is_array($notices)): $i = 0; $__LIST__ = $notices;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$notices): $mod = ($i % 2 );++$i;?><tr>
                                          <td><input type="checkbox" name="notice_id[]" class="selectall" value="<?php echo ($notices["id"]); ?>"> </td>
                                          <td><?php echo (date('Y-m-d',$notices["ctime"])); ?></td>
                                          <td><?php echo (msubstr($notices["content"],0,30)); ?></td>
                                          <td>
                                              <?php if($notices['status'] == 1): ?><span class="label label-important label-mini">已查阅</span><?php endif; ?>
                                              <?php if($notices['status'] == 0): ?><span class="label label-success label-mini">未查阅</span><?php endif; ?>
                                          </td>
                                          <td>
                                              <button class="btn btn-success read" alt="<?php echo ($notices["id"]); ?>" type="button">查看</button>
                                              <button class="btn btn-danger del" alt="<?php echo ($notices["id"]); ?>" type="button">删除</button>
                                          </td>
                                      </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                                  <?php if(!$notices): ?><tr><td colspan="5" style="text-align: center;">暂无数据</td></tr><?php endif; ?>
                                  <?php if($notices): ?><tr><td colspan="4"></td><td ><button class="btn btn-danger delall" type="button" >全部删除</button></td></tr><?php endif; ?>

                              </form>
                              </tbody>
                          </table>
                             <?php echo ($page); ?>
                      </div>
                      <div class="maylike" style="width: 900px;">
                          <h2 class="lists-title" style="border:none;">热门微信号推荐：</h2>
                          <div class="container-content" style="border: none;">
                              <?php if(is_array($uc_hot)): $i = 0; $__LIST__ = $uc_hot;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$uchot): $mod = ($i % 2 );++$i;?><div class="thumbnail tile tile-teal margin-top">
                                      <a href="__ROOT__/Home/Index/detail/detail_id/<?php echo ($uchot["weixin_id"]); ?>.html?click=Ucenter_hot" >
                                          <img src="__ROOT__/<?php echo ($uchot["logo"]); ?>" style="width: 150px;height: 75px;">
                                          <h3><?php echo (msubstr($uchot["weixin_name"],0,6)); ?></h3>
                                          <span><label class="like"><?php echo ($uchot["like"]); ?></label><label class="clicks"><?php echo ($uchot["clicks"]); ?></label></span>
                                      </a>
                                  </div><?php endforeach; endif; else: echo "" ;endif; ?>
                              <div class="thumbnail tile tile-add margin-top">
                                  <a href="<?php echo U('Users/add');?>" title="提交账号" class="add-count">

                                  </a>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
        </div>
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
        <li><a href="__ROOT__/Users/shares.html">我的分享圈</a><i class="go">></i></li>
        <li><a href="__ROOT__/Users/articles.html">我的帖子</a><i class="go">></i></li>
        <li><a href="__ROOT__/Users/profile.html">我的资料</a><i class="go">></i></li>
        <li><a href="__ROOT__/Users/notice.html">我的通知</a><i class="go">></i><i class="notice">15</i></li>
        <li><a href="__ROOT__/Users/feedback.html">反馈建议</a><i class="go">></i></li>
        <li><a href="__ROOT__/Uenter/logout.html">退出登录</a><i class="go">></i></li>
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
<script type="text/javascript" src="__PUBLIC__/js/jquery.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/vendor/bootstrap.min.js"></script>
<script src="__PUBLIC__/dist/dialog-min.js"></script>
<script src="__PUBLIC__/dist/dialog-plus.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/comm.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/tip.js"></script>
<script type="text/javascript">
  $(function(){
      $('.read').click(function(){
          var id=$(this).attr('alt');
          var spurl="__ROOT__/Home/Users/read/id/"+id;
          var  d=dialog({
              id: 'open',
              title: '系统消息',
              url: spurl,
              cancelValue: '关闭窗口',
              cancel: function () {
              }
          });
          d.showModal();
      })
      $('.del').click(function(){
          var id=$(this).attr('alt');
          var d = dialog({
              title: '信息提示',
              content: '您确定要删除该系统消息吗？！',
              okValue: '确定',
              ok: function () {
                  $.post(
                          "__ROOT__/Home/Users/del_notice.html",
                          {act:'delete',id:id},
                          function(data){
                              if(data==1){
                                  viitip('success','系统消息删除成功！',1000);
                                  setTimeout(function(){
                                      location.reload();
                                  },1500)
                              }else{
                                  viitip('error','系统消息删除失败！',1000);
                              }
                          }
                  );
              },
              cancelValue: '取消',
              cancel: function () {}
          });
          d.showModal();
      })
  })
</script>
</body>

</html>