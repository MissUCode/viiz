<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
<title>论坛管理</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="__PUBLIC__/css/bootstrap.min.css" />
<link rel="stylesheet" href="__PUBLIC__/css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="__PUBLIC__/css/uniform.css" />
<link rel="stylesheet" href="__PUBLIC__/css/matrix-style.css" />
<link rel="stylesheet" href="__PUBLIC__/css/matrix-media.css" />
<link href="__PUBLIC__/font-awesome/css/font-awesome.css" rel="stylesheet" />
<link rel="stylesheet" href="__PUBLIC__/css/ui-dialog.css">
<link rel="stylesheet" href="__PUBLIC__/css/tip.css">
<link rel="icon" href="__PUBLIC__/images/logo.png"  type="image/x-icon" />
<style type='text/css'>
	*{
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
                <li><a href="__ROOT__/Zoneadmin/Zone/adlist" > 广告管理</a></li>
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
          <a href="__ROOT__/Zoneadmin/Zone/shareLists" class="tip-bottom">论坛管理</a> <a href="__ROOT__/Zoneadmin/Zone/shareLists" class="current">分享圈管理</a>
      </div>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
          <form method="post" action="__ROOT__/Zoneadmin/Zone/shareLists">
          选择条件：<input type="text"  class="span2" placeholder="输入分享圈名称" name="title"  style="margin-top: 11px;" />
              <select class="form-control" style="margin-top: 11px;color: #666;" name="is_check">
                  <option value="2">请选择</option>
                  <option value="0">未审核</option>
                  <option value="1">已审核</option>
              </select>
              <select class="form-control" style="margin-top: 11px;color: #666;" name="status">
                  <option value="2">请选择</option>
                  <option value="1">审核通过</option>
                  <option value="0">审核未通过</option>
              </select>
          <button type="submit" class="btn" >查找</button>
          </form>
          <div class="span12">
             <a class="btn  btn-success" href="__ROOT__/Zoneadmin/Zone/addshare" style="margin-right:43px;float: right;">+ 添加分享圈</a>
          </div>
        <div class="widget-box">
          <div class="widget-title"> <span class="icon">
            <input type="checkbox" id="title-checkbox" name="title-checkbox" />
            </span>
            <h5>全选 </h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered table-striped with-check">
              <thead>
                <tr>
                  <th><i class="icon-resize-vertical"></i></th>
                  <th>分享圈名称</th>
                  <th>封面图片</th>
                  <th>圈主人ID</th>
                  <th>是否置顶</th>
                  <th>是否热门</th>
                  <th>是否推荐</th>
                  <th>会员数</th>
                  <th>点击率</th>
                  <th>是否审核</th>
                  <th>状态（默认通过）</th>
                  <th>创建时间</th>
                  <th>备注信息</th>
                  <th>操作</th>
                </tr>

              </thead>
              <tbody>
              <form method="post" action="__ROOT__/Zoneadmin/Zone/delall" id="delall">
                  <input type="hidden" name="act" value="" id="action">
              <?php if(is_array($shares)): $i = 0; $__LIST__ = $shares;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$shares): $mod = ($i % 2 );++$i;?><tr>
                  <td><input type="checkbox" name="ids[]" value="<?php echo ($shares["id"]); ?>" class="checkbox"  /></td>
                  <td style="text-align: center"><?php echo ($shares["title"]); ?></td>
                  <td style="text-align: center"><img src="__ROOT__/<?php echo ($shares["pic"]); ?>" style="width: 120px;height: 30px;"></td>
                  <td style="text-align: center"><?php echo ($shares["uid"]); ?></td>
                  <td style="text-align: center">
                      <?php if($shares['is_top'] == 1): ?><img src="__PUBLIC__/images/Y.png" style="width: 15px;height: 15px;cursor: pointer;" class="turn" alt="top_off" attr="<?php echo ($shares["id"]); ?>">
                      <?php else: ?>
                      <img src="__PUBLIC__/images/N.png" style="width: 15px;height: 15px;cursor: pointer;" class="turn" alt="top_on" attr="<?php echo ($shares["id"]); ?>"><?php endif; ?>
                  </td>
                  <td style="text-align: center">
                      <?php if($shares['is_hot'] == 1): ?><img src="__PUBLIC__/images/Y.png" style="width: 15px;height: 15px;cursor: pointer;" class="turn" alt="hot_off" attr="<?php echo ($shares["id"]); ?>">
                          <?php else: ?>
                          <img src="__PUBLIC__/images/N.png" style="width: 15px;height: 15px;cursor: pointer;" class="turn" alt="hot_on" attr="<?php echo ($shares["id"]); ?>"><?php endif; ?>
                  </td>
                    <td style="text-align: center">
                        <?php if($shares['is_tj'] == 1): ?><img src="__PUBLIC__/images/Y.png" style="width: 15px;height: 15px;cursor: pointer;" class="turn" alt="tj_off" attr="<?php echo ($shares["id"]); ?>">
                            <?php else: ?>
                            <img src="__PUBLIC__/images/N.png" style="width: 15px;height: 15px;cursor: pointer;" class="turn" alt="tj_on" attr="<?php echo ($shares["id"]); ?>" ><?php endif; ?>
                    </td>
                    <td style="text-align: center"><?php echo ($shares["member"]); ?></td>
                    <td style="text-align: center"><?php echo ($shares["click"]); ?></td>
                    <td style="text-align: center">
                        <?php if($shares['is_check'] == 1): ?><span class="badge badge-success">已审核</span>
                        <?php else: ?>
                        <span class="badge badge-important">未审核</span><?php endif; ?>
                    </td>
                    <td style="text-align: center">
                        <?php if($shares['status'] == 1): ?><span class="badge badge-success">通过审核</span>
                            <?php else: ?>
                            <span class="badge">未通过审核</span><?php endif; ?>
                    </td>
                  <td style="text-align: center"><?php echo (date('Y-m-d H:i:s',$shares["ctime"])); ?></td>
                   <?php if($admins['remark']): ?><td style="text-align: center"><?php echo ($shares["remark"]); ?></td>
                       <?php else: ?>
                       <td style="text-align: center">无备注信息！</td><?php endif; ?>

                  <td class="center" style="text-align: center">
                      <button class="btn btn-mini btn-info edit" type="button"  attr="<?php echo ($shares["id"]); ?>">编辑&查看</button>
                      <?php if($shares['lock'] == 1): ?><button class="btn btn-mini btn-success turn" type="button" alt="on" attr="<?php echo ($shares["id"]); ?>">允许显示</button><?php endif; ?>
                      <?php if($shares['lock'] == 0): ?><button class="btn btn-mini btn-warning turn" type="button" alt="off" attr="<?php echo ($shares["id"]); ?>">禁止显示</button><?php endif; ?>
                      <button class="btn btn-mini btn-primary turn" type="button" alt="pass" attr="<?php echo ($shares["id"]); ?>">通过审核</button>
                      <button class="btn btn-mini btn-inverse turn" type="button" alt="nopass" attr="<?php echo ($shares["id"]); ?>">不通过审核</button>
                      <button class="btn btn-mini btn-danger turn" type="button" alt="del" attr="<?php echo ($shares["id"]); ?>">删除</button>
                  </td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                <tr><td colspan="14">
                    <button class="btn btn-mini btn-danger delall" type="button" alt="del">全部删除</button>
                    <button class="btn btn-mini btn-primary delall" type="button" alt="pass">批量通过</button>
                    <button class="btn btn-mini btn-inverse delall" type="button" alt="nopass">批量不通过</button>
                </td></tr>
              </form>
              </tbody>
            </table>
          </div>
          <div class="span8">
              <div class="dataTables_paginate fg-buttonset ui-buttonset fg-buttonset-multi ui-buttonset-multi paging_full_numbers" id="DataTables_Table_0_paginate">
                  <?php echo ($page); ?>
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
<script src="__PUBLIC__/js/jquery.uniform.js"></script>
    <script src="__PUBLIC__/js/matrix.js"></script>
<script src="__PUBLIC__/dist/dialog-min.js"></script>
<script src="__PUBLIC__/dist/dialog-plus.js"></script>
<script src="__PUBLIC__/js/tip.js"></script>
<script type="text/javascript">
    $(function(){
        var attr=$('#zone').attr('attr');
        var p='<?php echo ($position); ?>';
        if(attr==p){
            $('#zone').children('ul').css('display','block');
        }
        $('.turn').click(function(){
            var act=$(this).attr('alt');
            var id=$(this).attr('attr');
            if(act=='del'){
                var d = dialog({
                title: '信息提示',
                content: '您确定要删除该分享圈吗？！',
                okValue: '确定',
                ok: function () {
                    $.post(
                            "__ROOT__/Zoneadmin/Zone/ajax.html",
                            {act:act,id:id},
                            function(data){
                                if(data==1){
                                    viitip('success','数据删除成功！',1000);
                                    setTimeout(function(){
                                        location.reload();
                                    },1500)
                                }else{
                                    viitip('error','数据删除失败！',1000);
                                }
                            }
                    );
                },
                cancelValue: '取消',
                cancel: function () {}
            });
            d.showModal();
            }else{
                $.post(
                        "__ROOT__/Zoneadmin/Zone/ajax.html",
                        {act:act,id:id},
                        function(data){
                            if(data==1){
                                viitip('success','操作成功！',1000);
                                setTimeout(function(){
                                    location.reload();
                                },1500)
                            }else{
                                viitip('error','操作失败！',1000);
                            }
                        }
                );
            }
        })

        $('.edit').click(function(){
            var id=$(this).attr('attr');
            var spurl="__ROOT__/Zoneadmin/Zone/edit/id/"+id;
            var  d=dialog({
                id: 'open',
                title: '编辑分享圈',
                url: spurl,
                cancelValue: '关闭窗口',
                cancel: function () {}
            });
            d.showModal();
        })

        $('.delall').click(function(){
            var act=$(this).attr('alt');
            $('#action').val(act);
            if(act=='del'){
                var content='您确定要删除全部分享圈吗？！'
            }
            if(act=='pass'){
                var content='您确定要批量通过审核吗？！'
            }
            if(act=='nopass'){
                var content='您确定要批量不通过审核吗？！'
            }
            var d = dialog({
                title: '信息提示',
                content: content,
                okValue: '确定',
                ok: function () {
                    $('#delall').submit();
                },
                cancelValue: '取消',
                cancel: function () {}
            });
            d.showModal();
        })

        $('#title-checkbox').click(function(){
            var c=$(this).attr('checked');
              if(c=='checked'){
                  $('.checkbox').attr('checked','checked');
              }else{
                  $('.checkbox').removeAttr('checked');
              }
        })
    })
</script>
</body>
</html>