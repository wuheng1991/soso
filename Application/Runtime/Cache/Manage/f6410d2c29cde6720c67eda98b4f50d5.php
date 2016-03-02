<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>武汉金开瑞生物工程有限公司---后台管理</title>
 <link href="/Public/Consel/css/style.css" rel="stylesheet" type="text/css">
<script  src="/Public/Consel/js/jquery.js"></script>
<script  src="/Public/Consel/js/jquery-ui.min.js"></script>
<link href="/Public/Consel/js/jquery-ui.min.css" rel="stylesheet" type="text/css" />
</head>
<style>
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
</style>
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
<form id="sequencingForm" method="post" action="<?php echo U('Primer/index');?>">
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
								<td width="73%" class="index-5" style="text-align:center;"><span class="index-7"><font style="color:#f57e20;"><?php echo session('admin-name');?></font>，您已登录成功！<a href="<?php echo U('User/logout');?>"  target=_top>退出</a></span></td>
								<td width="25%"><a href="http://www.jkrorder.com/index.php/Manage.html" target="top">后台主页</a>&nbsp;&nbsp;&nbsp;&nbsp;武汉金开瑞生物工程有限公司</td>
							</tr>
						</table>
				  	</td>
				</tr>
				<tr>
					<td>
                    	<table width="100%" cellpadding="4" cellspacing="0" border="0" align="center">
							<tr>
								<td>客户姓名：<input type="text" name="customer" value="<?php echo ($customer); ?>"/></td>	
								<td width="11%" align="right">订单号：</td>

								<td width="15%"><input type="text" name="code" value="<?php echo ($code); ?>" /></td>
								<td width="47%" align="left">时间：
								<input type="text" id="stime" name="stime" value="<?php echo ($stime); ?>" /> - <input id="etime" type="text" name="etime" value="<?php echo ($etime); ?>" />
								</td>
                                <td><img id="search" src="/Public/Consel/images/query_btn.gif" /></td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
			<table width="100%" cellpadding="0" cellspacing="1" border="0" class="bj-1">
				<tr align="center">
					 
					 <td>下单时间</td>
	<td>订单号</td>
	<td>客户姓名</td>
	<td>客户邮件</td>
	<td>客户电话</td>
	<td>订单状态</td>
	<td>订单提交方式</td>
	<td>订单查看</td>
	<td>是否查看</td>
	<td>订单文件下载</td>
	<td>报告单下载</td>
	<td>相关文件上传</td>
	<td>消息与留言</td>
				</tr>
				<?php if(is_array($orderList)): foreach($orderList as $key=>$PR): ?><tr align="center">
	<td><?php echo (date('Y-m-d/H:i:s',$PR["addtime"])); ?></td>
	<td><?php echo ($PR["code_yw"]); ?></td>
	<td><?php echo (getClientName($PR["uid"])); ?></td>
	<td><?php echo (getClientEmail($PR["uid"])); ?></td>
	<td><?php echo (getClientPhone($PR["uid"])); ?></td>
    <!-- <if condition=""> -->
	<td><?php echo (showOrderStatus($PR["status"])); ?></td>

   <td>
   	<?php if(empty($PR["excelurl"])): ?>在线填写
    <?php else: ?>
    上传excel表单<?php endif; ?>
</td>
    <!-- <td><?php echo ($PR["num_yinwu"]); ?></td> -->
   
  
  

	<td><a href="<?php echo U('primer/show','id='.$PR['id']);?>" title="点击查看详情">详情</a></td>

	 <td>
  	<?php if(($PR["flag_check"]) == "0"): ?>No
  		<?php else: ?>
  		Yes<?php endif; ?>
  </td>

	<td>
		 <?php if(empty($PR["excelurl"])): ?><a title="点击下载Excel文件" href="javascript:void();"
		 onclick="javascript:window.location='/Test/yinwu.php?id=<?php echo ($PR["id"]); ?>';">下载</a>
		 <?php else: ?>
		 <a href="<?php echo U('Index/file','oid='.$PR['id']);?>" title="点击下载Excel文件">下载</a><?php endif; ?>
	</td>
	<td>
		<a href="javascript:void();" onclick="javascript:window.location='/Test/baogao.php?id=<?php echo ($PR["id"]); ?>'" alt="下载报告单" title="下载报告单">下载</a>
	</td>
	<td>
		  <?php if(empty($PR["jia"])): ?>未上传
		  	<?php else: ?>
             已上传<?php endif; ?>	
	</td>
	<td> 
    <?php if((getStatus_a($PR["id"])) == "1"): ?><a href="<?php echo U('primer/ask','id='.$PR['id']);?>" title="点击查看详情" style="color:red;">
    	 新消息
    </a><?php endif; ?>
<?php if((getStatus_a($PR["id"])) == "2"): ?><a href="<?php echo U('primer/ask','id='.$PR['id']);?>" title="点击查看详情" style="color:green;">
    	  暂无消息
    </a><?php endif; ?>
<?php if((getStatus_a($PR["id"])) == ""): ?><a href="<?php echo U('primer/ask','id='.$PR['id']);?>" title="点击查看详情" style="color:green;">
    	  暂无消息
    </a><?php endif; ?>

	</td>
</tr><?php endforeach; endif; ?>
			</table>
			<br/>
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td>
                    	<table width="100%" cellpadding="0" cellspacing="0" border="0" align="center" bgcolor="#F9F9F9" class="index-3">
							<tr>
								<td width="300" align="center" class="bj-3">&nbsp;</td>
								<td width="410" align="center" class="bj-3">
		<!-- <button  style="cursor:pointer;" onclick="javascript:window.location.history.back();">   返回上一步  </button> -->
	</td>
								<td width="190" align="center" class="bj-3">共<?php echo ($pages); ?>页&nbsp;&nbsp;<img id="pre" src="/Public/Consel/images/2_r2.jpg" width="15" height="15" title="上一页">&nbsp;&nbsp;<img id="next" src="/Public/Consel/images/2_r1.jpg" width="15" height="15" 
									title="下一页">&nbsp;&nbsp;
								<select id="select7" name="select7" class="index-12">
                                  <option value="">跳转</option>
                                  <?php $__FOR_START_631201337__=1;$__FOR_END_631201337__=$pages+1;for($pageNum=$__FOR_START_631201337__;$pageNum < $__FOR_END_631201337__;$pageNum+=1){ ?><option value="<?php echo ($pageNum); ?>"><?php echo ($pageNum); ?></option><?php } ?>
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
</html>