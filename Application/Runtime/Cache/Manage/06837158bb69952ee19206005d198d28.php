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

<div style="margin-bottom:60px;">
<div style="background:#CCCCCC;color:green;">权限管理 -》添加权限  </div>
<div class="orderlist">

<form action="<?php echo U('Rbac/addNodeHandle');?>" autocomplete="false" method="post">
<table border="1" class="addNode"  style="border-collapse:collapse;margin-top:20px;margin-bottom:50px;" width="600" align="center">
	<legend style="margin-top:20px;"><center>添加权限</center></legend>
	<!-- <input type="hidden" name="pid" value="0"/> -->
<tr>
	<td>英文名称:</td>
	<td align="right"><input style="border:1px solid #ABCDEF;" type="text" name="name" value="" size="40" /></td>
</tr>

<tr>
	<td>显示中文名称:</td>
	<td><input style="border:1px solid #ABCDEF;" type="text" name="title" value="" size="40" /></td>
</tr>

<tr>
	<td>状态:</td>
	<td>
		<input type="radio" name="status" value="0" />禁用&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="radio" name="status" value="1" checked/>开启
	</td>
</tr>

<tr>
	<td>显示:</td>
	<td>
		<input type="radio" name="show" value="0" checked/>是&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="radio" name="show" value="1"  />否
	</td>
</tr>


<tr>
	<td>类型:</td>
	<td>
		 <select name="level" id="" style="border:1px solid #ABCDEF;">
		 	<option value="1">项目</option>
		 	<option value="2">模块</option>
		 	<option value="3">操作</option>
		 </select>
	</td>
</tr>

<tr>
	<td>父节点:</td>
	<td>
		 <select name="pid" id="" style="border:1px solid #ABCDEF;">
		 	<option value="0">根节点</option>
		 	<?php if(is_array($nodeList)): foreach($nodeList as $key=>$row): if($row['level'] == 1): ?><option value="<?php echo ($row['id']); ?>"><?php echo ($row['title']); ?></option>
		 		<?php else: ?>
		 		  <option value="<?php echo ($row['id']); ?>">&nbsp;&nbsp;|<?php echo ($row['title']); ?></option><?php endif; endforeach; endif; ?>
		 </select>
	</td>
</tr>

<tr>
	<td>排序:</td>
	<td><input style="border:1px solid #ABCDEF;" type="text" name="sort" value="" size="40"/></td>
</tr>

<tr>
	<td colspan="2" style="text-align:center;" align="center">
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
.addNode tr td{
	text-align:left;
}
.more_link:hover{
	color:red;
}
a{
	text-decoration:none;
}


</style>