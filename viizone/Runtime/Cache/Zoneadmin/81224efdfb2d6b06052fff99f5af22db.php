<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
<title>添加管理员</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="__PUBLIC__/css/bootstrap.min.css" />
<link rel="stylesheet" href="__PUBLIC__/css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="__PUBLIC__/css/colorpicker.css" />
<link rel="stylesheet" href="__PUBLIC__/css/datepicker.css" />
<link rel="stylesheet" href="__PUBLIC__/css/uniform.css" />
<link rel="stylesheet" href="__PUBLIC__/css/select2.css" />
<link rel="stylesheet" href="__PUBLIC__/css/matrix-style.css" />
<link rel="stylesheet" href="__PUBLIC__/css/matrix-media.css" />
<link rel="stylesheet" href="__PUBLIC__/css/bootstrap-wysihtml5.css" />
<link href="__PUBLIC__/font-awesome/css/font-awesome.css" rel="stylesheet" />
<link rel="icon" href="__PUBLIC__/images/logo.png"  type="image/x-icon" />
<style type='text/css'>
	body{
		font-family:'微软雅黑';
	}
    .btn{
        font-family:'微软雅黑';
    }
</style>
</head>
<body>

<!--Header-part-->
<div id="header">
    <h1><a href="dashboard.html"><?php echo (session('admin_name')); ?></a></h1>
</div>
<!--close-Header-part-->
<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
    <ul class="nav">
        <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">欢迎 <?php echo (session('admin_name')); ?></span><b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li><a href="#"><i class="icon-user"></i> 我的设置</a></li>
                <li class="divider"></li>
                <li><a href="#"><i class="icon-check"></i> 我的日志</a></li>
                <li class="divider"></li>
                <li><a href="__ROOT__/Zoneadmin/Enter/logout"><i class="icon-key"></i> 退出</a></li>
            </ul>
        </li>
        <li class="dropdown" id="menu-messages"><a href="#" data-toggle="dropdown" data-target="#menu-messages" class="dropdown-toggle"><i class="icon icon-envelope"></i> <span class="text">我的信息</span> <span class="label label-important">5</span> <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li><a class="sAdd" title="" href="#"><i class="icon-plus"></i> 新消息</a></li>
                <li class="divider"></li>
                <li><a class="sInbox" title="" href="#"><i class="icon-envelope"></i> 收信箱</a></li>
                <li class="divider"></li>
                <li><a class="sOutbox" title="" href="#"><i class="icon-arrow-up"></i> 发信箱</a></li>
                <li class="divider"></li>
                <li><a class="sTrash" title="" href="#"><i class="icon-trash"></i> 回收站</a></li>
            </ul>
        </li>
        <li class=""><a title="" href="#"><i class="icon icon-cog"></i> <span class="text">设置</span></a></li>
        <li class=""><a title="" href="__ROOT__/Zoneadmin/Enter/logout"><i class="icon icon-share-alt"></i> <span class="text">退出系统</span></a></li>
    </ul>
</div>
<!--close-top-Header-menu-->
<!--start-top-serch-->
<div id="search">
    <input type="text" placeholder="搜索..."/>
    <button type="submit" class="tip-bottom" title="Search"><i class="icon-search icon-white"></i></button>
</div>
<!--close-top-serch-->
<!--sidebar-menu-->
<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> 首页</a>
    <ul>
        <li class="<?php if($position == index): ?>active<?php endif; ?>">
            <a href="__ROOT__/Zoneadmin/Index/index.html"><i class="icon icon-home"></i> <span>首页</span></a>
        </li>
        <li class="submenu <?php if($position == admin): ?>active<?php endif; ?>" attr="admin" id="admin"> <a href="#"><i class="icon icon-user"></i> <span>管理员管理</span> <span class="label label-important">2</span></a>
            <ul>
                <li><a href="__ROOT__/Zoneadmin/Admin/add">添加管理员</a></li>
                <li><a href="__ROOT__/Zoneadmin/Admin/lists">管理员列表</a></li>
            </ul>
        </li>
        <li class="submenu <?php if($position == member): ?>active<?php endif; ?>" attr="member" id="member"> <a href="#"><i class="icon icon-file"></i> <span>会员管理</span> <span class="label label-important">2</span></a>
            <ul>
                <li><a href="__ROOT__/Zoneadmin/Member/add">添加会员</a></li>
                <li><a href="__ROOT__/Zoneadmin/Member/lists">会员列表</a></li>
            </ul>
        </li>
        <li class="submenu <?php if($position == zone): ?>active<?php endif; ?>"  attr="zone" id="zone"> <a href="#"><i class="icon icon-info-sign"></i> <span>论坛管理</span> <span class="label label-important">5</span></a>
            <ul>
                <li><a href="__ROOT__/Zoneadmin/Zone/shareLists"> 圈子管理</a></li>
                <li><a href="__ROOT__/Zoneadmin/Zone/articleLists"> 帖子管理</a></li>
                <li><a href="__ROOT__/Zoneadmin/Zone/adlist" > 评论管理</a></li>
                <li><a href="__ROOT__/Zoneadmin/Zone/articleLists"> 数据统计</a></li>
                <li><a href="__ROOT__/Zoneadmin/Zone/feedback"> 留言管理</a></li>
            </ul>
        </li>

    </ul>
</div>
<!--sidebar-menu-->

<div id="content">
<div id="content-header">
  <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> 首页</a> <a href="#" class="tip-bottom">会员管理</a> <a href="#" class="current">添加会员</a> </div>
</div>
<div class="container-fluid">
  <hr>
  <div class="row-fluid">
    <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>添加会员</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="__ROOT__/Zoneadmin/Member/add_action" method="post" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">昵称:</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="用户名" name="nick_name" />
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">登录密码:</label>
              <div class="controls">
                <input type="password"  class="span11" placeholder="登录密码"  name="password" />
              </div>
            </div>
              <div class="control-group">
                  <label class="control-label">确认密码:</label>
                  <div class="controls">
                      <input type="password"  class="span11" placeholder="确认密码" name="repassword"   />
                  </div>
              </div>
              <div class="control-group">
                  <label class="control-label">邮箱 :</label>
                  <div class="controls">
                      <input type="text" class="span11" placeholder="邮箱"  name="email"  />
                  </div>
              </div>
              <div class="control-group">
                  <label class="control-label">联系电话 :</label>
                  <div class="controls">
                      <input type="text" class="span11" placeholder="手机号码"  name="phone"  />
                  </div>
              </div>
              <div class="control-group">
                  <label class="control-label">会员积分 :</label>
                  <div class="controls">
                      <input type="text" class="span11" placeholder="会员积分"  name="score"  />
                  </div>
              </div>
              <div class="control-group">
                  <label class="control-label">会员等级：</label>
                  <div class="controls">
                      <label>
                          <input type="radio" name="lev" checked="checked" value="0" />
                          普通会员
                      </label>
                      <label>
                          <input type="radio" name="lev" value="1" />
                          二级会员
                      </label>
                      <label>
                          <input type="radio" name="lev" value="2" />
                          三级会员
                      </label>
                      <label>
                          <input type="radio" name="lev" value="3" />
                          四级会员
                      </label>
                  </div>
              </div>
            <div class="control-group">

            </div>
            <div class="control-group">
              <label class="control-label">备注信息：</label>
              <div class="controls">
                <textarea class="span11" name="remark" ></textarea>
              </div>
            </div>
            <div class="form-actions">
              <button type="submit" class="btn btn-success">添加</button>
              <button type="reset" class="btn btn-primary">取消</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<!--Footer-part-->
<div class="row-fluid">
    <div id="footer" class="span12"> 2014 &copy; 小青椒网络科技版权 小青椒</a> </div>
</div>
<!--end-Footer-part--> 
<script src="__PUBLIC__/js/jquery.min.js"></script>
<script src="__PUBLIC__/js/jquery.ui.custom.js"></script> 
<script src="__PUBLIC__/js/bootstrap.min.js"></script>
<script src="__PUBLIC__/js/masked.js"></script> 
<script src="__PUBLIC__/js/jquery.uniform.js"></script> 
<script src="__PUBLIC__/js/select2.min.js"></script> 
<script src="__PUBLIC__/js/matrix.js"></script>
<script src="__PUBLIC__/js/jquery.peity.min.js"></script>
<script type="text/javascript">
    $(function(){
        var attr=$('#member').attr('attr');
        var p='<?php echo ($position); ?>';
        if(attr==p){
            $('#member').children('ul').css('display','block');
        }
    })
</script>

</body>
</html>