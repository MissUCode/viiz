<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
<title>后台管理系统</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="__PUBLIC__/css/bootstrap.min.css" />
<link rel="stylesheet" href="__PUBLIC__/css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="__PUBLIC__/css/fullcalendar.css" />
<link rel="stylesheet" href="__PUBLIC__/css/matrix-style.css" />
<link rel="stylesheet" href="__PUBLIC__/css/matrix-media.css" />
<link href="__PUBLIC__/font-awesome/css/font-awesome.css" rel="stylesheet" />
<link rel="stylesheet" href="__PUBLIC__/css/jquery.gritter.css" />
<link rel="icon" href="__PUBLIC__/images/logo.png"  type="image/x-icon" />
<style type='text/css'>
	*{
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
        <li class="submenu <?php if($position == zone): ?>active<?php endif; ?>"  attr="zone" id="zone"> <a href="#"><i class="icon icon-info-sign"></i> <span>论坛管理</span>
            <span class="label label-important">4</span></a>
            <ul>
                <li><a href="__ROOT__/Zoneadmin/Zone/shareLists"> 圈子管理</a></li>
                <li><a href="__ROOT__/Zoneadmin/Zone/articleLists"> 帖子管理</a></li>
                <li><a href="__ROOT__/Zoneadmin/Zone/commentLists" > 评论审核</a></li>
                <!--<li><a href="__ROOT__/Zoneadmin/Zone/articleLists"> 数据统计</a></li>-->
                <li><a href="__ROOT__/Zoneadmin/Zone/feedback"> 留言管理</a></li>
            </ul>
        </li>

    </ul>
</div>
<!--sidebar-menu-->

<!--main-container-part-->
<div id="content">
<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> <a href="./" title="去首页" class="tip-bottom"><i class="icon-home"></i> 后台主页</a></div>
  </div>
<!--End-breadcrumbs-->

<!--Action boxes-->
  <div class="container-fluid">
    <div class="quick-actions_homepage">
      <ul class="quick-actions">
        <li class="bg_lb"> <a href="index.html"> <i class="icon-dashboard"></i> <span class="label label-important">20</span> 我的仪表板 </a> </li>
        <li class="bg_lg span3"> <a href="charts.html"> <i class="icon-signal"></i> 图表</a> </li>
        <li class="bg_ly"> <a href="widgets.html"> <i class="icon-inbox"></i><span class="label label-success">101</span> 小工具 </a> </li>
        <li class="bg_lo"> <a href="tables.html"> <i class="icon-th"></i> 表格</a> </li>
        <li class="bg_ls"> <a href="grid.html"> <i class="icon-fullscreen"></i> 全宽</a> </li>
        <li class="bg_lo span3"> <a href="form-common.html"> <i class="icon-th-list"></i> 表单</a> </li>
        <li class="bg_ls"> <a href="buttons.html"> <i class="icon-tint"></i> 按钮</a> </li>
        <li class="bg_lb"> <a href="interface.html"> <i class="icon-pencil"></i>元素</a> </li>
        <li class="bg_lg"> <a href="calendar.html"> <i class="icon-calendar"></i> 日历</a> </li>
        <li class="bg_lr"> <a href="error404.html"> <i class="icon-info-sign"></i> 错误</a> </li>

      </ul>
    </div>
<!--End-Action boxes-->    

<!--Chart-box-->    
    <div class="row-fluid">
      <div class="widget-box">
        <div class="widget-title bg_lg"><span class="icon"><i class="icon-signal"></i></span>
          <h5>访客趋势</h5>
        </div>
        <div class="widget-content" >
          <div class="row-fluid">
            <div class="span9">
              <div class="chart"></div>
            </div>
            <div class="span3">
              <ul class="site-stats">
                <li class="bg_lh"><i class="icon-user"></i> <strong>2540</strong> <small>Total Users</small></li>
                <li class="bg_lh"><i class="icon-plus"></i> <strong>120</strong> <small>New Users </small></li>
                <li class="bg_lh"><i class="icon-shopping-cart"></i> <strong>656</strong> <small>Total Shop</small></li>
                <li class="bg_lh"><i class="icon-tag"></i> <strong>9540</strong> <small>Total Orders</small></li>
                <li class="bg_lh"><i class="icon-repeat"></i> <strong>10</strong> <small>Pending Orders</small></li>
                <li class="bg_lh"><i class="icon-globe"></i> <strong>8540</strong> <small>Online Orders</small></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
<!--End-Chart-box--> 
    <hr/>
  </div>
</div>

<!--end-main-container-part-->

<!--Footer-part-->

<div class="row-fluid">
    <div id="footer" class="span12"> 2014 &copy; 小青椒网络科技版权 小青椒</a> </div>
</div>

<!--end-Footer-part-->

<script src="__PUBLIC__/js/excanvas.min.js"></script> 
<script src="__PUBLIC__/js/jquery.min.js"></script> 
<script src="__PUBLIC__/js/jquery.ui.custom.js"></script> 
<script src="__PUBLIC__/js/bootstrap.min.js"></script> 
<script src="__PUBLIC__/js/jquery.flot.min.js"></script> 
<script src="__PUBLIC__/js/jquery.flot.resize.min.js"></script> 
<script src="__PUBLIC__/js/jquery.peity.min.js"></script> 
<script src="__PUBLIC__/js/fullcalendar.min.js"></script> 
<script src="__PUBLIC__/js/matrix.js"></script> 
<script src="__PUBLIC__/js/matrix.dashboard.js"></script> 
<script src="__PUBLIC__/js/jquery.gritter.min.js"></script> 
<script src="__PUBLIC__/js/matrix.interface.js"></script> 
<script src="__PUBLIC__/js/matrix.chat.js"></script> 
<script src="__PUBLIC__/js/jquery.validate.js"></script> 
<script src="__PUBLIC__/js/matrix.form_validation.js"></script> 
<script src="__PUBLIC__/js/jquery.wizard.js"></script> 
<script src="__PUBLIC__/js/jquery.uniform.js"></script> 
<script src="__PUBLIC__/js/select2.min.js"></script> 
<script src="__PUBLIC__/js/matrix.popover.js"></script> 
<script src="__PUBLIC__/js/jquery.dataTables.min.js"></script> 
<script src="__PUBLIC__/js/matrix.tables.js"></script> 

<script type="text/javascript">
  // This function is called from the pop-up menus to transfer to
  // a different page. Ignore if the value returned is a null string:
  function goPage (newURL) {

      // if url is empty, skip the menu dividers and reset the menu selection to default
      if (newURL != "") {
      
          // if url is "-", it is this page -- reset the menu:
          if (newURL == "-" ) {
              resetMenu();            
          } 
          // else, send page to designated URL            
          else {  
            document.location.href = newURL;
          }
      }
  }

// resets the menu selection upon entry to this page:
function resetMenu() {
   document.gomenu.selector.selectedIndex = 2;
}
</script>
</body>
</html>