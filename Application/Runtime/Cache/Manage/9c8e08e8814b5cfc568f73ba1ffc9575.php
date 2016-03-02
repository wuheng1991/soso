<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>武汉金开瑞生物工程有限公司---后台管理</title>
<link href="/Public/Consel/css/style.css" rel="stylesheet" type="text/css">
<script  src="/Public/Consel/js/jquery.js"></script>
<!-- <script  src="/Public/Consel/js/jquery-ui.min.js"></script> -->
<!-- <link href="/Public/Consel/js/jquery-ui.min.css" rel="stylesheet" type="text/css" /> -->
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

<script>
$(document).ready(function(){
	// $( "#stime" ).datepicker({
	// 	dateFormat:'yy-mm-dd'
	// });
	// $( "#etime" ).datepicker({
	// 	dateFormat:'yy-mm-dd'
	// });
	var p = <?php echo ($page); ?>;
	var countP = <?php echo ($pages); ?>;
	$('#next').click(function(){
		var dang = p + 1;
		if (p<countP){
			$('#page').val(dang);
		} else {
			$('#page').val(countP);
			return false;
		}
		$('#sequencingForm').submit();
	});
	$('#pre').click(function(){
		if (p<2) return false;
		var pdang = p - 1;
		$('#page').val(pdang);
		$('#sequencingForm').submit();
	});
	$('#select7').change(function(){
		$('#page').val($(this).val());
		$('#sequencingForm').submit();
	});
	$('#search').click(function(){
		// alert('aaa');
		$('#page').val('');
		$('#sequencingForm').submit();
	});
});
</script>
 
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
<div style="background:#CCCCCC;color:green;">权限管理 -》用户管理 </div>
<div class="orderlist">

<form id="sequencingForm" action="<?php echo U('Rbac/userList');?>" method="post">

<input type="hidden" name="page" id="page" value="<?php echo ($page); ?>" />

<table border="1"  style="border-collapse:collapse;margin-top:20px;" width="1100" align="center">
	<legend style="margin-top:20px;"><center>用户管理</center></legend>
	<!-- <input type="hidden" name="pid" value="0"/> -->

	<tr class="chazhao" style="border:0px;">
		<td colspan="4"  >
			<br/>
			用户名：<input type="text" name="username_se" id="" value="<?php echo ($username_se); ?>" size="40"/>
			<br/>
			<br/>


		</td>
		<!-- <td colspan="2"  >
			<br/>
			所属用户组：  
			<select name="group_se" id="group_se">
                <option value="0"> --请选择-- </option>

				<?php if(is_array($roleList)): foreach($roleList as $key=>$role): ?><option value="<?php echo ($role['id']); ?>" <?php if(($group_se) == $role['id']): ?>selected='selected'<?php endif; ?>><?php echo ($role['name']); ?></option><?php endforeach; endif; ?>

			 </select>
			<br/>
			<br/>
		</td> -->
		<td colspan="2"  >
			<br/>
			<img id="search" src="/Public/Consel/images/query_btn.gif" />
			<br/>
			<br/>
		</td>

	</tr>

	 
 
<tr style="background:#CCCCCC;">
	 <td  >序号</td>
	 <td style="width:150px;">用户名</td>
	 <td style="width:200px;">上次登录时间</td>
	 <td style="width:150px;">上次登录IP</td>
	 <td style="width:200px;">所属用户组</td>
	 <td>操作</td>
	 
	 
</tr>
 <?php if(is_array($userList)): foreach($userList as $key=>$row): ?><tr class="nodeList">
 		 <td><?php echo ($row["id"]); ?></td>
 		 <td><?php echo ($row["username"]); ?></td>
 		 <td><?php echo (date("Y-m-d / H:i:s",$row["logintime"])); ?></td>
 		 <td><?php echo ($row["loginip"]); ?></td>
 		 <td><?php echo ($row['TpRole'][0]['name']); ?></td> 
 		 <td>
 		 	<!-- <a href="<?php echo U('Rbac/delUser',array('id'=>$row['id']));?>" style="text-decoration:none;">【删除】</a> --><a href="javascript:if(window.confirm('您确定要删除吗？')){
          window.location.href='<?php echo U('Rbac/delUser',array('id'=>$row['id']));?>'; 
 		 }" style="text-decoration:none;">
 		 	【删除】	
 		 	</a>
 		 </td>
 	</tr><?php endforeach; endif; ?>
 
 
 
 
</table>

<br>
<br>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td>
                    	<table width="100%" cellpadding="0" cellspacing="0" border="0" align="center" bgcolor="#F9F9F9" class="index-3">
							<tr>
								<td width="300" align="center" class="bj-3">&nbsp;</td>
								<td width="410" align="center" class="bj-3"> 
                          <!--  <button  style="cursor:pointer;" onclick="javascript:window.location.history.back();"> 返回上一步  </button> -->
								</td>
								<td width="190" align="center" class="bj-3">共<?php echo ($pages); ?>页&nbsp;&nbsp;<img id="pre" title="上一页" src="/Public/Consel/images/2_r2.jpg" width="15" height="15">&nbsp;&nbsp;
									<img id="next" title="下一页" src="/Public/Consel/images/2_r1.jpg" width="15" height="15">&nbsp;&nbsp;
								<select id="select7" name="select7" class="index-12">
                                  <option value="">跳转</option>
                                  <?php $__FOR_START_570570901__=1;$__FOR_END_570570901__=$pages+1;for($pageNum=$__FOR_START_570570901__;$pageNum < $__FOR_END_570570901__;$pageNum+=1){ ?><option value="<?php echo ($pageNum); ?>"><?php echo ($pageNum); ?></option><?php } ?>
                                </select>
								页</td>
							</tr>
						</table>
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
.nodeList .node_chile{
	text-align:left;

}
.chazhao td{
	border:0px;
}
.chazhao td input,select{
	border:1px solid #ABCDEF;
}
</style>