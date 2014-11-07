<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
<title>论坛管理-添加帖子</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="__PUBLIC__/css/bootstrap.min.css" />
<link rel="stylesheet" href="__PUBLIC__/css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="__PUBLIC__/css/colorpicker.css" />
<link rel="stylesheet" href="__PUBLIC__/css/datepicker.css" />
<link rel="stylesheet" href="__PUBLIC__/css/uniform.css" />
<link rel="stylesheet" href="__PUBLIC__/css/select2.css" />
<link rel="stylesheet" href="__PUBLIC__/css/tip.css" />
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
        <h5>编辑帖子</h5>
    </div>
    <div class="widget-content nopadding">
        <form action="__ROOT__/Zoneadmin/Zone/article_action" method="post" class="form-horizontal" enctype="multipart/form-data">
            <div class="control-group">
                <label class="control-label">帖子标题 :</label>
                <div class="controls">
                    <input type="text" class="span11" placeholder="帖子标题" name="title" value="<?php echo ($info["title"]); ?>" />
                    <input type="hidden" class="span11" name="id" value="<?php echo ($info["id"]); ?>" />
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">帖子所属分享圈 :</label>
                <div class="controls">
                    <input type="text"  class="span2" placeholder="可输入分享圈名称查找" name="thesid" id="thesid"   style="margin-top: 0px;" />
                    <select class="form-control" style="margin-top: 0px;color: #666;" name="sid" id="sid">
                        <option value="0">请选择帖子所属分享圈</option>
                        <?php if(is_array($shares)): $i = 0; $__LIST__ = $shares;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$shares): $mod = ($i % 2 );++$i;?><option value="<?php echo ($shares["id"]); ?>" <?php if($info['sid'] == $shares['id']): ?>selected='selected'<?php endif; ?> ><?php echo ($shares["title"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                </div>
                <div class="controls">
                </div>
            </div>

            <div class="control-group">
                <label class="control-label">帖子图片 :</label>
                <div class="controls">
                    <div class="uploader" id="uniform-undefined">
                        <input type="file" id="fileElem" multiple accept="image/*"  onchange="handleFiles(this)" size="19" style="opacity: 0;" name="pic">
                        <span class="filename"></span><span class="action">添加图片</span>
                    </div>
                    <div id="fileList" style="width:100px;height:100px;">
                        <?php if($info['pics']): ?><a href="__ROOT__/<?php echo ($info["pics"]); ?>" target="_blank"> <img src="__ROOT__/<?php echo ($info["pics"]); ?>" style="width: 120px;height: 80px;"></a>
                            <?php else: ?>
                            <img src="__PUBLIC__/images/logo.png"><?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">帖子设置 ：</label>
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
                <label class="control-label">帖子内容：</label>
                <div class="controls">
                    <textarea class="span11" name="content" style="min-height: 200px;" placeholder="分享圈的描述信息"><?php echo ($info["content"]); ?></textarea>
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
<script src="__PUBLIC__/js/tip.js"></script>
<script src="__PUBLIC__/js/jquery.peity.min.js"></script>
<script type="text/javascript">
    $(function(){
        var attr=$('#zone').attr('attr');
        var p='<?php echo ($position); ?>';
        if(attr==p){
            $('#zone').children('ul').css('display','block');
        }
        $('#thesid').blur(function(){
            var thesid=$(this).val();
            if(thesid==''){
                return false;
            }
            $("#sid option:first").nextAll().remove();
            $.post(
                    "/Zoneadmin/Zone/find",
                    {thesid:thesid},
                    function(data){
                        if(!data){
                            content="不存在名称为‘"+thesid+"’的分享圈！";
                            viitip('notice',content,1000);
                        }else{
                            jQuery.each( data, function(i,v){
                                value="<option value='"+data[i]['id']+"' >"+data[i]['title']+"</option>";
                                $("#sid").append(value);
                            });
                            content="已查出名称为‘"+thesid+"’的分享圈，请选择！";
                            viitip('success',content,1500);
                        }
                    }
            );
        })


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