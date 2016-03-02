<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>武汉金开瑞生物工程有限公司---后台管理</title>
<link href="/Public/Consel/css/common.css" rel="stylesheet" type="text/css" />
<script  src="/Public/Consel/js/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$('#Img').click(function(){
		var m = new Date().getTime();
		var url = "<?php echo U('User/verify');?>";
		$(this).attr('src', "<?php echo U('User/verify');?>"+'?t='+m);
	});

   flag = "<?php echo ($flag); ?>";
   if(flag == '123'){
    top.window.location.reload();
   }
});
</script>
</head>

<body>
<div id="main">
  <div class="maincon">
    	<div class="mod-title"><img src="/Public/Consel/images/logo.gif" /></div>
		<div class="mod-notfound">
		<form method="post" action="<?php echo U('User/login');?>" autocomplete="off">
        <table width="100%" cellpadding="0" cellspacing="0" border="0">
        	<tr>
            	<td height="40" align="right" class="fs16">用户名：</td>
           	  	<td align="left"><input name="username" type="text" size="30" class="username" /></td>
            </tr>
            <tr>
            	<td height="40" align="right" class="fs16">密 码：</td>
              	<td align="left"><input name="password" type="password" size="30" class="username" /></td>
            </tr>
            <tr>
            	<td height="40" align="right" class="fs16">验证码：</td>
              	<td align="left"><input name="checkCode" type="text" size="6" class="username" />&nbsp;<img id="Img" src="<?php echo U('User/verify');?>" /></td>
            </tr>
            <tr>
            	<td colspan="2" height="10"></td>
            </tr>
            <tr>
            	<td colspan="2" align="center"><input type="image" src="/Public/Consel/images/login_btn.gif" /></td>
            </tr>
        </table>
		</form>
        
		</div>
    </div>
</div>

</body>
</html>