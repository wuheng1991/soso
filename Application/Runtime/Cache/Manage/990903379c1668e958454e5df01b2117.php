<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>武汉金开瑞生物工程有限公司---后台管理</title>
<link href="/Public/Consel/css/style.css" rel="stylesheet" type="text/css">
<script  src="/Public/Consel/js/jquery.js"></script>
<!-- <script  src="/Public/Consel/js/jquery-ui.min.js"></script> -->
<link href="/Public/Consel/js/jquery-ui.min.css" rel="stylesheet" type="text/css" />
</head>
<style>
   body{
   	font-family:"微软雅黑";
   }
	#search:hover{
		cursor:pointer;
	}
	#pre{
     cursor:pointer;
	}
	#next{
    cursor:pointer;
	}
	#select7{
		 cursor:pointer;
	}
	.prev{
		border:0px solid red;
		padding:6px;
	}
	.next{
		border:0px solid red;
		padding:6px;
	}
	.current{
		border:1px solid red;
	}
	.num{
		padding:4px;
	}
</style>
 
<body>
<table width="100%" border="0" cellpadding="0" cellspacing="0" background="/Public/Consel/images/hui.jpg">
	<tr>
		<td>&nbsp;</td>
	</td>
</table>
<table width="97%" border="0" align="center" cellpadding="0" cellspacing="0">
	<tr>
		<td width="100%" align="center" valign="top" bgcolor="#FFFFFF">
        	<table width="100%" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<table width="100%" cellpadding="0" cellspacing="0" border="0" align="center" style="border-bottom:#ccc solid 1px; margin-bottom:10px;">
							<tr>
								<td width="2%" height="30"><img src="/Public/Consel/images/2_r1.jpg" /></td>
								<td width="80%" class="index-5"><span class="index-7"><font style="color:#f57e20;"><?php echo session('admin-name');?></font>，您已登录成功！<a href="<?php echo U('User/logout');?>"  target=_top>退出</a></td></td>
								<td width="15%">武汉金开瑞生物工程有限公司</td>
							</td>
						</table>
				  	</td>
				</td>
			</table>
		</td>
	</td>
</table>

<div style="margin-bottom:30px;">
<div style="background:#CCCCCC;color:green;">安全管理 -》修改密码  </div>
<div class="orderlist">

<form action="<?php echo U('Safe/passwordHandle');?>" onsubmit="return check_password();" autocomplete="off" method="post">
<table border="1"  style="border-collapse:collapse;margin-top:20px;" width="400" align="center">
	<legend style="margin-top:20px;"><center>修改密码</center></legend>

	<input type="hidden" name="uId" value="<?php echo ($arr["id"]); ?>"/>
<tr>
	<td>用户名:</td>
	<td><input style="border:1px solid #ABCDEF;" type="text"  value="<?php echo ($arr["username"]); ?>" size="40" readonly /></td>
</tr>
<tr>
	<td>新密码:</td>
	<td><input style="border:1px solid #ABCDEF;" type="password" id="user_pass" name="password"  value="" size="40"/></td>
</tr>
<tr>
	<td>确认密码：</td>
	<td >
	<input style="border:1px solid #ABCDEF;" type="password" id="user_pass_re" name="rePassword" value="" size="40"/>	 
	</td>
</tr>
<tr>
	<td colspan="2" align="center">
		<!-- <br/> -->
		<br/>
		<input style="cursor:pointer;" type="submit" value="保存修改"/>

	</td>
</tr>
 
</table>
</form>

</div>
 



</div>
</body>
</html>
<style>
.orderlist ul{list-style:none;width:100%;white-space: nowrap;}
.orderlist li{width:100%;float:left;white-space: nowrap;} 
.orderlist span { padding-left: 0px;}
tr td{
	width:120px;
	text-align:center;
}
.more_link:hover{
	color:red;
}
a{
	text-decoration:none;
}
</style>

<script type="text/javascript">
	function check_password(){

	//新密码不能为空
	//确认密码不能为空
	//	新密码 == 确认密码
  flag = true;

  user_pass = document.getElementById('user_pass').value;
  user_pass = $.trim(user_pass);

  user_pass_re = document.getElementById('user_pass_re').value;
  user_pass_re = $.trim(user_pass_re);

  if(user_pass == ''){
   alert('新密码不能为空');
   document.getElementById('user_pass').value='';
   $('#user_pass').focus();
   flag = false;
   return false;
  }

   if(user_pass_re == ''){
   alert('确认密码不能为空');
   document.getElementById('user_pass_re').value='';
   $('#user_pass_re').focus();
   flag = false;
   return false;
  }

  if(user_pass != user_pass_re){
   alert('新密码与确认密码不符，无法提交！');
   $('#user_pass_re').focus();
   flag = false;
   return false;
  }

  if(flag == true){
  return true;
  }


		
	}
</script>