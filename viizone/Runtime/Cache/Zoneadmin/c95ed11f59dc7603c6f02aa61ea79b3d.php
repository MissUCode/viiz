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
        background: #fff;
		font-family:'微软雅黑';
	}
    .btn{
        font-family:'微软雅黑';
    }
</style>
</head>
<body>
<div class="widget-box" style="width: 1300px;">
    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
        <h5>添加分享圈</h5>
    </div>
    <div class="widget-content nopadding">
        <form action="__ROOT__/Zoneadmin/Zone/add_action" method="post" class="form-horizontal" enctype="multipart/form-data">
            <div class="control-group">
                <label class="control-label">分享圈名称 :</label>
                <div class="controls">
                    <input type="text" class="span11" placeholder="名称" name="title" value="<?php echo ($info["title"]); ?>" />
                    <input type="hidden" name="id" value="<?php echo ($info["id"]); ?>">
                </div>
            </div>


            <div class="control-group">
                <label class="control-label">封面图片 :</label>
                <div class="controls">
                    <div class="uploader" id="uniform-undefined">
                        <input type="file" id="fileElem" multiple accept="image/*"  onchange="handleFiles(this)" size="19" style="opacity: 0;" name="pic">
                        <span class="filename"></span><span class="action">添加图片</span>
                    </div>
                    <div id="fileList" style="width:100px;height:100px;padding-top: 5px;">
                        <?php if($info['pic']): ?><img src="__ROOT__/<?php echo ($info["pic"]); ?>">
                            <?php else: ?>
                            <img src="__PUBLIC__/images/logo.png"><?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">分享圈设置 ：</label>
                <div class="controls">
                    <label>
                        <input type="checkbox" name="is_tj"  value="1" <?php if($info['is_tj'] == 1): ?>checked='checked'<?php endif; ?> />
                        推荐
                    </label>
                    <label>
                        <input type="checkbox" name="is_hot" value="1" <?php if($info['is_hot'] == 1): ?>checked='checked'<?php endif; ?> />
                        热门
                    </label>
                    <label>
                        <input type="checkbox" name="is_top" value="1" <?php if($info['is_top'] == 1): ?>checked='checked'<?php endif; ?> />
                        置顶
                    </label>

                </div>
            </div>
            <div class="control-group">

            </div>
            <div class="control-group">
                <label class="control-label">分享圈描述：</label>
                <div class="controls">
                    <textarea class="span11" name="desc" style="min-height: 140px;" placeholder="分享圈的描述信息"><?php echo ($info["desc"]); ?></textarea>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">备注信息：</label>
                <div class="controls">
                    <textarea class="span11" name="remark" placeholder="分享圈的备注信息" style="height: 110px;"><?php echo ($info["remark"]); ?></textarea>
                </div>
            </div>
            <div class="form-actions">
                <button type="submit" class="btn btn-success">提交</button>
                <button type="reset" class="btn btn-primary">取消</button>
            </div>
        </form>
    </div>
</div>
<!--Footer-part-->
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