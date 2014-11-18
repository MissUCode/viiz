<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <title>微商助手</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta http-equiv=Content-Type content="text/html;charset=utf-8">
    <link rel="stylesheet" href="__PUBLIC__/css/bootstrap_home.min.css">
    <link rel="stylesheet" href="__PUBLIC__/css/comm.css">
    <link rel="icon" href="__PUBLIC__/images/logo.png"  type="image/x-icon" />
</head>
<body>
<div style="display:block;width: 500px;margin:0 auto;margin-top: 150px;">

        <input type="file" name="pic" id="pic" style="display: none;">

    <input type="button" id="save" value="上传图片">
</div>
<script src="__PUBLIC__/js/jquery-1.11.0.min.js"></script>
<script src="__PUBLIC__/js/bootstrap.min.js"></script>
<script src="__PUBLIC__/js/upload.js"></script>
<script type="text/javascript">
    $(function(){
        $('#save').click(function(){
            $.upload({
               // 上传地址
            url: '__ROOT__/Index/upimg',
                // 文件域名字
                    fileName: 'pic',
                // 其他表单数据
                    params: {name: 'pic'},
            // 上传完成后, 返回json, text
                   dataType: 'json',
                // 上传之前回调,return true表示可继续上传
                    onSend: function() {
                return true;
            },
            // 上传之后回调
            onComplate: function(data) {
                alert(data.picname);
            }
        });
        })
    })
</script>
</body>
</html>