<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
<title>添加评论</title>
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
<div class="widget-box" style="width: 1000px;">
    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
        <h5>添加评论</h5>
    </div>
    <div class="widget-content nopadding">
        <form action="__ROOT__/Zoneadmin/Zone/comment_action" method="post" class="form-horizontal" enctype="multipart/form-data">
            <div class="control-group">
                <label class="control-label">评论内容：</label>
                <div class="controls">
                    <textarea class="span8" name="content" style="min-height: 140px;" placeholder="评论内容"><?php echo ($info["desc"]); ?></textarea>
                    <input type="hidden" name="aid" value="<?php echo ($aid); ?>">
                    <input type="hidden" name="sid" value="<?php echo ($sid); ?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">评论图片 :</label>
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
            <div class="form-actions">
                <button type="submit" class="btn btn-success">评论</button>
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