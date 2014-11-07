<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
<title>论坛管理-添加分享圈</title>
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
  <div id="breadcrumb">
      <a href="__ROOT__/Zoneadmin/Index/index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> 首页</a>
      <a href="#" class="tip-bottom">论坛管理</a> <a href="__ROOT__/Zoneadmin/Zone/shareLists" class="current">添加分享圈</a>
  </div>
</div>
<div class="container-fluid">
  <hr>
  <div class="row-fluid">
    <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>添加分享圈</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="__ROOT__/Zoneadmin/Zone/add_action" method="post" class="form-horizontal" enctype="multipart/form-data">
            <div class="control-group">
              <label class="control-label">分享圈名称 :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="名称" name="title" />
              </div>
            </div>


              <div class="control-group">
                  <label class="control-label">封面图片 :</label>
                  <div class="controls">
                      <div class="uploader" id="uniform-undefined">
                          <input type="file" id="fileElem" multiple accept="image/*"  onchange="handleFiles(this)" size="19" style="opacity: 0;" name="pic">
                          <span class="filename"></span><span class="action">添加图片</span>
                      </div>
                      <div id="fileList" style="width:100px;height:100px;">
                        <img src="__PUBLIC__/images/logo.png">
                      </div>
                  </div>
              </div>
              <div class="control-group">
                  <label class="control-label">分享圈设置 ：</label>
                  <div class="controls">
                      <label>
                          <input type="checkbox" name="is_tj"  value="1" />
                          推荐
                      </label>
                      <label>
                          <input type="checkbox" name="is_hot" value="1" />
                          热门
                      </label>
                      <label>
                          <input type="checkbox" name="is_top" value="1" />
                          置顶
                      </label>

                  </div>
              </div>
            <div class="control-group">

            </div>
            <div class="control-group">
              <label class="control-label">分享圈描述：</label>
              <div class="controls">
                <textarea class="span11" name="desc" style="min-height: 200px;" placeholder="分享圈的描述信息"></textarea>
              </div>
            </div>
              <div class="control-group">
                  <label class="control-label">备注信息：</label>
                  <div class="controls">
                      <textarea class="span11" name="remark" placeholder="分享圈的备注信息" style="height: 150px;"></textarea>
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
        var attr=$('#zone').attr('attr');
        var p='<?php echo ($position); ?>';
        if(attr==p){
            $('#zone').children('ul').css('display','block');
        }
    })

    window.URL = window.URL || window.webkitURL;
    var fileElem = document.getElementById("fileElem"),
            fileList = document.getElementById("fileList");

    function handleFiles(obj) {
        while(fileList.hasChildNodes()) //当div下还存在子节点时 循环继续
        {
            fileList.removeChild(fileList.firstChild);
        }
        var files = obj.files,
                img = new Image();
        if(window.URL){
            //File API
            img.src = window.URL.createObjectURL(files[0]); //创建一个object URL，并不是你的本地路径
            img.width = 100;
            img.onload = function(e) {
                window.URL.revokeObjectURL(this.src); //图片加载后，释放object URL
            }
            fileList.appendChild(img);
        }else if(window.FileReader){
            //opera不支持createObjectURL/revokeObjectURL方法。我们用FileReader对象来处理
            var reader = new FileReader();
            reader.readAsDataURL(files[0]);
            reader.onload = function(e){

                img.src = this.result;
                img.width = 100;
                fileList.appendChild(img);
            }
        }else{
            //ie
            obj.select();
            obj.blur();
            var nfile = document.selection.createRange().text;
            document.selection.empty();
            img.src = nfile;
            img.width = 100;
            img.onload=function(){

            }
            fileList.appendChild(img);
            //fileList.style.filter="progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod='image',src='"+nfile+"')";
        }
    }
</script>

</body>
</html>