<?php
    if(C('LAYOUT_ON')) {
        echo '{__NOLAYOUT__}';
    }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>温馨提示消息-微搜网（www.viisou.com）</title>
<style type="text/css">
*{ padding: 0; margin: 0; }
body,html{ width: 100%;height: 100%; background: #f5f5f5; font-family: '微软雅黑'; color: #333; font-size: 16px; }
body{
    background: url("http://www.viisou.com/Public/images/tip.jpg")no-repeat center center fixed  #393939;
    -moz-background-size: cover;
    -webkit-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
}
.kk{
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.8);
    float: left;
}
.system-message{
    padding: 0px;
    display: block;
    width: 350px;
    height: 180px;
    margin: 0 auto;
    margin-top: 250px;
    background: #fff;
    /*-moz-border-radius:15px;*/
    /*-webkit-border-radius:15px;*/
    box-shadow:1px 3px 10px rgba(51,204,204,0.8);
    /*border-radius:15px;*/
}
.system-message h1{
    font-size: 28px;
    font-weight: normal;
    width: 100%;
    height: 40px;
    line-height: 40px;
    text-align: center;
    color: #fff;
    background: #33CCCC;
    float: left;
}
.system-message .jump{ text-align: center;}
.system-message .jump a{ color: #333;}
.system-message .success,.system-message .error{
    text-align: center;
    line-height: 80px; font-size: 22px

}
.system-message .detail{ font-size: 12px; line-height: 20px; margin-top: 12px; display:none}
    .ico{
        display: inline-block;
        width: 40px;
        line-height: 80px;
        font-size: 32px;
    }
    .yes{
        color: #33CCCC;
    }
    .no{
        color: red;
    }
</style>
</head>
<body>
<div class="kk">
<div class="system-message">
<present name="message">
<h1>温馨提示</h1>
<p class="success">
    <span class="ico yes">✓</span>
    <?php echo($message); ?>
</p>
<else/>
<h1>温馨提示</h1>
<p class="error">
    <span class="ico no">✘</span>
    <?php echo($error); ?>
</p>
</present>
<p class="detail"></p>
<p class="jump">
页面自动 <a id="href" href="<?php echo($jumpUrl); ?>">跳转</a> 等待时间： <b id="wait"><?php echo($waitSecond); ?></b>
</p>
</div>
</div>
<script type="text/javascript">
(function(){
var wait = document.getElementById('wait'),href = document.getElementById('href').href;
var interval = setInterval(function(){
	var time = --wait.innerHTML;
	if(time <= 0) {
		location.href = href;
		clearInterval(interval);
	};
}, 1000);
})();
</script>
</body>
</html>
