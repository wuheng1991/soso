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
<div style="background:#CCCCCC;color:green;">权限管理 -》添加用户  </div>
<div class="orderlist">
<input type="hidden" id="hid_user_tp" name="hid_user_tp" value="" />
<form action="<?php echo U('Rbac/addUserHandle');?>" onsubmit="return check_user();"  autocomplete="off" method="post">
<table border="1"  style="border-collapse:collapse;margin-top:20px;" width="400" align="center">
	<legend style="margin-top:20px;"><center>添加用户</center></legend>
	<input type="hidden" name="pid" value="0"/>
<tr>
	<td>用户名:</td>
	<td><input style="border:1px solid #ABCDEF;" type="text" id="new_user" name="username" value="" size="40" /></td>
</tr>
<tr>
	<td>密码:</td>
	<td><input style="border:1px solid #ABCDEF;" type="password" id="new_pass" name="password" value="" size="40"/></td>
</tr>
<tr>
	<td>所属用户组：</td>
	<td style="text-align:left;">
		 <select name="role_id" id="" style="border:1px solid #ABCDEF;">
		 	<?php if(is_array($roleList)): foreach($roleList as $key=>$row): ?><option value="<?php echo ($row["id"]); ?>"><?php echo ($row["name"]); ?></option><?php endforeach; endif; ?>
		 </select>
	</td>
</tr>
<tr>
	<td colspan="2" align="center">
		<!-- <br/> -->
		<br/>
		<input style="cursor:pointer;" type="submit" value="保存添加"/>

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
	function check_user(){
		flag = true;
		new_user = $("#new_user").val();
		new_user = $.trim(new_user);

		new_pass = $("#new_pass").val();
		new_pass = $.trim(new_pass);

        if(new_user == ''){
         alert('用户名称不能为空！');
          // $("#new_user").val();
          document.getElementById('new_user').value='';
         $("#new_user").focus();
        
         flag = false;
         return false;

        }

	     if(new_pass == ''){
	     alert('用户密码不能为空！');
	       document.getElementById('new_pass').value='';
	     $("#new_pass").focus();
	    
	     flag = false;
	     return false;

	    }

        // alert(new_user);

        if(new_user != ''){
        	// alert('aaaa');
        $.ajax({
           type: "GET", 
           async: false,          
           url: "/index.php/Manage/Rbac/userCheck",
           data:"username="+new_user,
           success: function(msg){
                 // alert(msg);
                if(msg == 'xyz'){
                 alert('该用户已经存在！');
                 document.getElementById('hid_user_tp').value='123456';
                 $("#new_user").focus();
                 flag = false;
                 return false;
                }
                if(msg == 'abc'){
                 document.getElementById('hid_user_tp').value='123';	
                flag = true;	
                return true;
                }
           }
        });

        // if(document.getElementById('hid_user_tp').value == '123456'){
        //  $("#new_user").focus();
        //  flag = false;
        //  return false;
        // }

        // if(document.getElementById('hid_user_tp').value == '123'){
        //    flag = true;	
        //    return true;
        // }

    }

     
  // alert(document.getElementById('hid_user_tp').value);
   

    if(flag == true){
    return true;
    }else{
    	return false;
    }

		  
	}
</script>