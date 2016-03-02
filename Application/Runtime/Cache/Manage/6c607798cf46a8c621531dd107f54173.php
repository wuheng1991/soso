<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>武汉金开瑞生物工程有限公司---后台管理</title>
<link href="/Public/Consel/css/style.css" rel="stylesheet" type="text/css">
<script  src="/Public/Consel/js/jquery.js"></script>
<script  src="/Public/Consel/js/jquery-ui.min.js"></script>
<link href="/Public/Consel/js/jquery-ui.min.css" rel="stylesheet" type="text/css" />
</head>
<script>
$(document).ready(function(){
	$( "#stime" ).datepicker({
		dateFormat:'yy-mm-dd'
	});
	$( "#etime" ).datepicker({
		dateFormat:'yy-mm-dd'
	});
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
		$('#page').val('');
		$('#sequencingForm').submit();
	});
});
</script>
<body>
<table width="100%" border="0" cellpadding="0" cellspacing="0" background="/Public/Consel/images/hui.jpg">
	<tr>
		<td>&nbsp;</td>
	</tr>
</table>
<form id="sequencingForm" method="post" autocomplete="off" action="<?php echo U('Customer/searchlist');?>">

<input type="hidden" name="page" id="page" value="<?php echo ($page); ?>" />
<table width="97%" border="0" align="center" cellpadding="0" cellspacing="0">
	<tr>
		<td width="100%" align="center" valign="top" bgcolor="#FFFFFF">
        	<table width="100%" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<table width="100%" cellpadding="0" cellspacing="0" border="0" align="center" style="border-bottom:#ccc solid 1px; margin-bottom:10px;">
							<tr>
								<td width="2%" height="30"><img src="/Public/Consel/images/2_r1.jpg" /></td>
								<td width="73%" class="index-5" style="text-align:center;">
									<span class="index-7">
									<font style="color:#f57e20;"><?php echo session('admin-name');?></font>，您已登录成功！<a href="<?php echo U('User/logout');?>"  target=_top>退出</a>
								    </span>
							    </td>
								<td width="25%"><a href="/index.php/Manage.html" target=_top>后台主页</a>&nbsp;&nbsp;&nbsp;&nbsp;
									武汉金开瑞生物工程有限公司
								</td>
							</tr>
						</table>
				  	</td>
				</tr>
				<tr>
					<td>
                    	<table width="100%" cellpadding="4" cellspacing="0" border="0" align="center">
							<tr>
						<td>客户姓名：<input type="text" size="16" name="customer" value="<?php echo ($customer); ?>"/></td>	

						<td>所在地区： 
							 <select name="province" id="province">
					<option value="">选择</option>
					<?php foreach($proList as $k=>$PL) { ?>
						<?php if ($userInfo['province'] == $PL['id']){?>
						<option value="<?php echo $PL['id']?>" selected="selected"><?php echo $PL['name']?></option>
						<?php }else {?>
						<option value="<?php echo $PL['id']?>"><?php echo $PL['name']?></option>
						<?php }?>
					<?php }?>
				</select>
				<?php if ($userInfo['city'] > 0){ ?>
					<select name="city" id="city">
						<?php foreach ($city as $ck=>$cv){?>
							<?php if ($cv['id'] == $userInfo['city']){?>
							<option value="<?php echo $cv['id']?>" selected="selected"><?php echo $cv['name']?></option>
							<?php }else{ ?>
							<option value="<?php echo $cv['id']?>"><?php echo $cv['name']?></option>
							<?php }?>
						<?php } ?>
				<?php } else {?>
				<select name="city" id="city" style="display:none;">
				<?php }?>
				</select>
						</td>

						<td width="11%" align="right">电话号码：</td>
						<td width="15%"><input type="text" name="phone" size="16" value="<?php echo ($phone); ?>" /></td>
								<td width="30%" align="left">注册时间：
								<input type="text" id="stime" name="stime" size="10" value="<?php echo ($stime); ?>" /> - <input id="etime" type="text" size="10" name="etime" value="<?php echo ($etime); ?>" />
								</td>
                                <td><img id="search" src="/Public/Consel/images/query_btn.gif" /></td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
			<table width="100%" cellpadding="0" cellspacing="1" border="0" class="bj-1">
				<tr>
					<td width="134" align="center" class="index-7">注册时间<br></td>
					<td width="80" align="center" class="index-7">用户姓名</td>
					<td width="120" align="center" class="index-7">联系方式</td>
					<td width="216" align="center" class="index-7">登录帐号<br></td>
		            <td width="120" align="center" class="index-7">所在省/直辖市</td>
		            <td width="120" align="center" class="index-7">所在市/区</td>

		            <td width="120" align="center" class="index-7">审核</td>
					 
					<td width="120" align="center" class="index-7">操作</td>
				</tr>

				<?php if(is_array($userlist)): foreach($userlist as $key=>$userlist): ?><tr>
					<td align="center" class="bj-3"><?php echo (date('Y-m-d/H:i:s',$userlist["addtime"])); ?></td>
					<td align="center" class="bj-3"><?php echo ($userlist["name"]); ?></td>
					<td align="center" class="bj-3"><?php echo ($userlist["phone"]); ?></td>
					<td align="center" class="bj-3"><?php echo (getEmails($userlist["uid"])); ?></td>
				 
					 <td align="center" class="bj-3">
					 	 <?php echo (getProvince($userlist["province"])); ?>   
					 </td>
					 <td align="center" class="bj-3">
					 	 <?php echo (getCity($userlist["city"])); ?>
					 </td >

					 <td align="center" class="bj-3">
					 	 <input type="radio" class="user_check_1_<?php echo ($userlist['uid']); ?>" name="user_shen_<?php echo ($userlist['uid']); ?>" value="1" 
					 	 onclick="user_check(<?php echo ($userlist['uid']); ?>,1);"
					 	 <?php if((getCheck($userlist["uid"])) == "1"): ?>checked<?php endif; ?>/>关闭
					 	 &nbsp;&nbsp;&nbsp;&nbsp;
					 	 <input type="radio" class="user_check_2_<?php echo ($userlist['uid']); ?>" name="user_shen_<?php echo ($userlist['uid']); ?>" value="2" 
					 	  onclick="user_check(<?php echo ($userlist['uid']); ?>,2);"
					 	 <?php if((getCheck($userlist["uid"])) == "2"): ?>checked<?php endif; ?>/>开启
					 </td>
					<td align="center" class="bj-3">
						<a href="<?php echo U('Customer/show_kan','id='.$userlist['id']);?>">查看</a>&nbsp;|&nbsp;
						<a href="<?php echo U('Customer/change','id='.$userlist['id']);?>">修改</a>&nbsp;|&nbsp;
						<!-- <a href="<?php echo U('User/del','id='.$userlist['id']);?>">删除</a> -->
						<!-- <a href="javascript:if(confirm('您确定要删除该用户信息吗？')){
						window.location='http://www.jkrorder.com/index.php/Manage/Customer/del?id=<?php echo ($userlist["id"]); ?>';
					}">删除</a> -->
			<a href="javascript:if(confirm('您确定要删除该用户信息吗？')){
				window.location='<?php echo U('Customer/del',array('id'=>$userlist['id'],'uid'=>$userlist['uid']));?>';
			}">删除</a>
					</td>
				</tr><?php endforeach; endif; ?>


			</table>
			<br/>
			<br/>
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td>
                    	<table width="100%" cellpadding="0" cellspacing="0" border="0" align="center" bgcolor="#F9F9F9" class="index-3">
							<tr>
								<td width="300" align="center" class="bj-3">&nbsp;</td>
								<td width="410" align="left" class="bj-3">
									<button  style="cursor:pointer;" onclick="javascript:window.location.history.back();">   返回上一步  </button>
									 
								</td>
								<td width="190" align="center" class="bj-3">共<?php echo ($pages); ?>页&nbsp;&nbsp;<img id="pre" title="上一页" src="/Public/Consel/images/2_r2.jpg" width="15" height="15">&nbsp;&nbsp;
									<img id="next" title="下一页" src="/Public/Consel/images/2_r1.jpg" width="15" height="15">&nbsp;&nbsp;
								<select id="select7" name="select7" class="index-12">
                                  <option value="">跳转</option>
                                  <?php $__FOR_START_1388433608__=1;$__FOR_END_1388433608__=$pages+1;for($pageNum=$__FOR_START_1388433608__;$pageNum < $__FOR_END_1388433608__;$pageNum+=1){ ?><option value="<?php echo ($pageNum); ?>"><?php echo ($pageNum); ?></option><?php } ?>
                                </select>
								页</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>

</form>
</body>
<style type="text/css">
	#search{
		cursor:pointer;
	}
	#select7{
		cursor:pointer;
	}
	#pre{
		cursor:pointer;
	}
	#next{
		cursor:pointer;
	}
	input{
		border:1px solid #ABCDEF;
	}
</style>
<script type="text/javascript">
	$(function(){
		$('#province').change(function(){
		$.ajax({
			type:'POST',
			url:"<?php echo U('User/getcity');?>",
			data:'id='+$(this).val(),
			success:function(html)
			{
				$('#city option').remove();
				$('#city').show();
				$('#city').append(html);
			}
		});
	});

	});

	function user_check(m,n){
		// alert(m+"  "+n);
		$.ajax({
         type:'get',
          url:"<?php echo U('Customer/user_is_check');?>",
          data:'uid='+m+"&flag="+n,
          success:function(msg){
          	 
          	 msg = msg.replace(/<[^>]+>/g,"");
          	 msg = msg.replace("alert('","");
          	 msg = msg.replace("');window.history.back();","");	
          	 alert(msg);
          	// alert('1');
          	// return msg;
          }

		});
	}


</script>
</html>