<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
<title>评论内容</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="__PUBLIC__/css/bootstrap.min.css" />
<link rel="stylesheet" href="__PUBLIC__/css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="__PUBLIC__/css/matrix-style.css" />
<link rel="stylesheet" href="__PUBLIC__/css/matrix-media.css" />
<link rel="stylesheet" href="__PUBLIC__/css/ui-dialog.css">
<link rel="stylesheet" href="__PUBLIC__/css/tip.css" />
<link href="__PUBLIC__/font-awesome/css/font-awesome.css" rel="stylesheet" />
<link rel="icon" href="__PUBLIC__/images/logo.png"  type="image/x-icon" />
<style type='text/css'>
    body{
        font-family:'微软雅黑';
    }
    .btn{
        font-family:'微软雅黑';
    }
    .tran
    {
        width: 40px;
        height: 40px;
        cursor: pointer;
        transform:rotate(-7deg);
        -ms-transform:rotate(-7deg); 	/* IE 9 */
        -moz-transform:rotate(-7deg); 	/* Firefox */
        -webkit-transform:rotate(-7deg); /* Safari 和 Chrome */
        -o-transform:rotate(-7deg); 	/* Opera */
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
<div id="content">
  <div id="content-header">
    <div id="breadcrumb">  <a href="__ROOT__/Zoneadmin/Index/index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> 首页</a>
        <a href="__ROOT__/Zoneadmin/Zone/shareLists" class="tip-bottom">论坛管理</a> <a href="__ROOT__/Zoneadmin/Zone/feedback" class="current">留言管理</a> </div>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-file"></i> </span>
            <h5>留言管理</h5>
          </div>
          <div class="widget-content nopadding">
              <form action="__ROOT__/Zoneadmin/Zone/comment_delall" method="post" id="delall">

              <ul class="recent-posts">
             <?php if(is_array($comments)): $i = 0; $__LIST__ = $comments;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$comment): $mod = ($i % 2 );++$i;?><li style="position: relative;">
                <div class="user-thumb" style="background: none;">

                </div>
                <div class="article-post">

                  <span class="user-info">联系方式：<?php echo ($comment["contact"]); ?>  留言时间：<?php echo (date('Y-m-d H:i:s',$comment["addtime"])); ?> </span>
                  <p>
                      留言内容：
                      <a href=""><?php echo ($comment["content"]); ?></a>
                  </p>
                    <?php if($comment['pics'] != ''): ?><a href="__ROOT__/<?php echo ($comment["pics"]); ?>" target="_blank"><img src="__ROOT__/<?php echo ($comment["pics"]); ?>" style="width: 60px;height: 80px;margin-left: 60px;"></a><?php endif; ?>
                </div>
                <?php if($comment['status'] == 1): ?><img src="__PUBLIC__/images/check.png" style="position: absolute;top: 20px;left: 50%;" class="tran"><?php endif; ?>
              </li><?php endforeach; endif; else: echo "" ;endif; ?>
                  <?php if(!$comment): ?><li style="position: relative;">

                          <div class="article-post">
                              <div class="fr">

                              </div>
                              <span class="user-info"></span>
                              <p style="text-align: center;">
                                  无网站留言！
                              </p>
                          </div>

                      </li><?php endif; ?>
              <li>
                  <!--<label style="display:block;width: 80px;cursor: pointer;float: left;" for="selectall"><input type="checkbox" id="selectall">  全选</label>-->
                  <!--<button class="btn btn-warning btn-mini doall" type="button" alt="nopass">批量禁止</button>-->
                  <!--<button class="btn btn-success btn-mini doall" type="button" alt="pass">批量通过</button>-->
                  <!--<button class="btn btn-danger btn-mini doall" type="button" alt="del">批量删除</button>-->
              </li>
            </ul>
              </form>
          </div>
        </div>
      </div>
        <div class="span8">
            <div class="dataTables_paginate fg-buttonset ui-buttonset fg-buttonset-multi ui-buttonset-multi paging_full_numbers" id="DataTables_Table_0_paginate">
               <?php echo ($page); ?>
            </div>
        </div>
    </div>
  </div>
</div>
<!--main-container-part-->
<!--Footer-part-->
<div class="row-fluid">
    <div id="footer" class="span12"> 2014 &copy; 小青椒网络科技版权 小青椒</a> </div>
</div>
<!--end-Footer-part-->
<script src="__PUBLIC__/js/jquery.min.js"></script> 
<script src="__PUBLIC__/js/bootstrap.min.js"></script> 
<script src="__PUBLIC__/js/jquery.ui.custom.js"></script> 
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

        $('#selectall').click(function(){
            var c=$(this).attr('checked');
            if(c=='checked'){
                $('.cid').attr('checked','checked');
            }else{
                $('.cid').removeAttr('checked');
            }
        })
        $('.turn').click(function(){
            var act=$(this).attr('alt');
            var id=$(this).attr('attr');
            if(act=='del'){
                var d = dialog({
                    title: '信息提示',
                    content: '您确定要删除此评论吗？！',
                    okValue: '确定',
                    ok: function () {
                        $.post(
                                "__ROOT__/Zoneadmin/Zone/comment_ajax.html",
                                {act:act,id:id},
                                function(data){
                                    if(data==1){
                                        viitip('success','评论删除成功！',1000);
                                        setTimeout(function(){
                                            location.reload();
                                        },1500)
                                    }else{
                                        viitip('error','评论删除失败！',1000);
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
                        "__ROOT__/Zoneadmin/Zone/comment_ajax.html",
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
        $('.doall').click(function(){
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

    })
</script>
</body>
</html>