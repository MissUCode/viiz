<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
<title>编辑会员信息</title>
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
        background: #fff;
		font-family:'微软雅黑';
	}
</style>
</head>
<body>
<div class="widget-box" style="width: 1300px;">
    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
        <h5>会员信息编辑</h5>
    </div>
    <div class="widget-content nopadding">
        <form action="__ROOT__/Zoneadmin/Member/add_action" method="post" class="form-horizontal">
            <div class="control-group">
                <label class="control-label">昵称:</label>
                <div class="controls">
                    <input type="text" class="span11" placeholder="昵称" name="nick_name" value="<?php echo ($info["nickname"]); ?>" />
                    <input type="hidden" name="id" value="<?php echo ($info["id"]); ?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">邮箱 :</label>
                <div class="controls">
                    <input type="text" class="span11" placeholder="邮箱"  name="email" value="<?php echo ($info["email"]); ?>" />
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">联系电话 :</label>
                <div class="controls">
                    <input type="text" class="span11" placeholder="联系电话"  name="phone" value="<?php echo ($info["phone"]); ?>" />
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">会员积分 :</label>
                <div class="controls">
                    <input type="text" class="span11" placeholder="会员积分"  name="score" value="<?php echo ($info["score"]); ?>" />
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">会员等级：</label>
                <div class="controls">
                    <label>
                        <input type="radio" name="lev" value="0" <?php if($info["lev"] == 0): ?>checked="checked"<?php endif; ?>  />
                        普通会员</label>
                    <label>
                        <input type="radio" name="lev" value="1" <?php if($info["lev"] == 1): ?>checked="checked"<?php endif; ?> />
                        二级会员
                    </label>
                    <label>
                        <input type="radio" name="lev" value="2" <?php if($info["lev"] == 2): ?>checked="checked"<?php endif; ?> />
                        三级会员
                    </label>
                    <label>
                        <input type="radio" name="lev" value="3" <?php if($info["lev"] == 3): ?>checked="checked"<?php endif; ?> />
                        四级会员
                    </label>
                </div>
            </div>
            <div class="control-group">

            </div>
            <div class="control-group">
                <label class="control-label">备注信息：</label>
                <div class="controls">
                    <textarea class="span11" name="remark" ><?php echo ($info["remark"]); ?></textarea>
                </div>
            </div>
            <div class="form-actions">
                <button type="submit" class="btn btn-success">提交</button>
                <button type="reset" class="btn btn-primary">取消</button>
            </div>
        </form>
    </div>
</div>
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
        var attr=$('#admin').attr('attr');
        var p='<?php echo ($position); ?>';
        if(attr==p){
            $('#admin').children('ul').css('display','block');
        }
    })
</script>

</body>
</html>