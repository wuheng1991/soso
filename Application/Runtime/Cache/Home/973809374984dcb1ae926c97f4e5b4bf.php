<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>武汉金开瑞生物工程有限公司</title>
<link href="/Public/Consel/css/style.css" rel="stylesheet" type="text/css">
<script  src="/Public/Consel/js/jquery.js"></script>
<!-- <script  src="/Public/Consel/js/jquery-ui.min.js"></script>
<link href="/Public/Consel/js/jquery-ui.min.css" rel="stylesheet" type="text/css" /> -->
</head>
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
		$('#page').val('');
		$('#sequencingForm').submit();
	});
});
</script>
<body>

<!-- <div id="toper">
	<div class="top">
    	<ul class="top_l">
			<li>欢迎<b id="f33"> <?php echo ($userInfo["name"]); ?></b>　单 位：<?php echo ($userInfo["company"]); ?>　电 话：<?php echo ($userInfo["phone"]); ?></li>
		</ul>
        <ul class="top_l right">
        	<li><i class="lgo"></i>欢迎<b id="f33"> <?php echo ($userInfo["name"]); ?></b>&nbsp;&nbsp;/&nbsp;&nbsp;<a href="<?php echo U('User/logout/');?>">退 出</a></li>
        </ul>
    </div>
</div> -->
<table width="100%" border="0" cellpadding="0" cellspacing="0" background="/Public/Consel/images/hui.jpg">
	<tr>
		<td>&nbsp;</td>
	</tr>
</table>
<form id="sequencingForm" method="post" autocomplete="off" action="<?php echo U('Pro/fen_more');?>">
<input type="hidden" name="page" id="page" value="<?php echo ($page); ?>" />
<table width="80%" border="0" align="center" cellpadding="0" cellspacing="0">
	<tr>
		<td width="100%" align="center" valign="top" bgcolor="#FFFFFF">
        	<table width="100%" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<table width="100%" cellpadding="0" cellspacing="0" border="0" align="center" style="border-bottom:#ccc solid 1px; margin-bottom:10px;">
							<tr>
								<td width="2%" height="30">
									<img src="/Public/Consel/images/2_r1.jpg" />

								</td>
								<td width="73%" class="index-5"><span class="index-7">
									欢迎<font style="color:#f57e20;font-weight:bold;">
									<!-- <?php echo session('admin-name');?> -->
									 <?php echo ($user); ?>
								</font>
								您已登录成功！<a href="<?php echo U('User/logout');?>"  target=_top>退出</a>
							</span>

							</td>
								<td width="25%"><a href="/index.php/Index.html" target="_self">
									前台主页
								</a>&nbsp;&nbsp;&nbsp;&nbsp;
									武汉金开瑞生物工程有限公司
								</td>
							</tr>
						</table>
				  	</td>
				</tr>
				<tr>
					<td>
               <table width="100%" style="border-collapse:collapse;" cellspacing="0" border="0" align="center">
					 <tr>
					       <td>
						   地区： <input type="text" size="20" name="fen_name" value="<?php echo ($fen_name); ?>"/>
						  </td>	

						   <td  >
						   销售员： <input type="text" name="fen_sale" size="20" value="<?php echo ($fen_sale); ?>" />
					       </td>
						   <td   align="left">
						   	项目状态：
								  <select name="fen_status" id="fen_status">
									<option value="0">请选择状态</option>
									 <option value="1" <?php if(($fen_status) == "1"): ?>selected<?php endif; ?>>正常状态</option>
									 <option value="2"  <?php if(($fen_status) == "2"): ?>selected<?php endif; ?>>停止状态</option>
									 <option value="3"  <?php if(($fen_status) == "3"): ?>selected<?php endif; ?>>延期状态</option>
									 <option value="4"  <?php if(($fen_status) == "4"): ?>selected<?php endif; ?>>准备发货状态</option>
									 <option value="5"  <?php if(($fen_status) == "5"): ?>selected<?php endif; ?>>项目结束状态</option>
						         </select>
						  </td>
                            <td>
                            	<img id="search" src="/Public/Consel/images/query_btn.gif" />

                           </td>
					</tr>
			   </table>
					</td>
				</tr>
			</table>

			<!-- <table width="100%" style="border-collapse:collapse;" cellpadding="0" cellspacing="1" 
			 
			</table> -->
			<table width="100%" style="border-collapse:collapse;" cellpadding="0" cellspacing="0" border="1" class="bj-1">
				<legend><h3>项目跟踪情况列表</h3></legend>
				<!-- <legend style="text-align:right;"><h4>
					<a class="fen_more" href="<?php echo U('Pro/fen_more');?>" title="查看更多项目跟踪情况">点击查看更多>></a>
				</h4></legend> -->
				<tr>
					<td width="65"  rowspan="2" align="center" class="index-7">地&nbsp;&nbsp;&nbsp;区<br></td>
					<td width="60"   rowspan="2" align="center" class="index-7">销售员</td>
					<td width="85"  rowspan="2"  align="center" class="index-7">合同编号</td>
					<td width="200"  rowspan="2"  align="center" class="index-7">项目名称<br></td>
		            <td width="100"   colspan="2" align="center" class="index-7">客户信息</td>
		            <td width="105"  rowspan="2"  align="center" class="index-7">客户Email</td>
					<td width="90"  rowspan="2" align="center" class="index-7">预计项目周期</td>
					<td width="100"  rowspan="2" align="center" class="index-7">合同期限</td>
					<td width="110"  rowspan="2" align="center" class="index-7">项目状态</td>
					<td width="87"  rowspan="2" align="center" class="index-7">PI/实验室<br/>负责人</td>
					<td width="87"  rowspan="2" align="center" class="index-7">最新更新<br/>时间</td>

					<td width="40"  rowspan="2" align="center" class="index-7">操&nbsp;&nbsp;&nbsp;作</td>



				</tr>
			 
				<tr>
					<td width="180" align="center" style="background:#DBDBDB;" class="bj-3 index-7">单&nbsp;&nbsp;&nbsp;位</td>
					<td width ="70" align="center" style="background:#DBDBDB;" class="bj-3 index-7">联系人</td>
					 
					 
					 
				</tr>

               <?php if(($fen_info) == ""): ?><tr align="center">
                	<td colspan="13"><span style="color:red;"><br/>暂无任何数据信息！<br/><br/></span></td>
                </tr>
               	<?php else: ?>
               
             
				<?php if(is_array($fen_info)): foreach($fen_info as $key=>$fen_row): ?><tr>
					<td  align="center" class="bj-3">
						 <?php echo ($fen_row['fen_name']); ?>
					</td>
					<td  align="center" class="bj-3"> 
                        <?php echo ($fen_row['fen_sale']); ?>
					</td>
					<td  align="center" class="bj-3">
						 <?php echo ($fen_row['fen_he']); ?>
					</td>
					<td  align="left" class="bj-3">
						 <?php echo ($fen_row['fen_pro']); ?>
					</td>
					<td  align="left" class="bj-3">
						<?php echo ($fen_row['fen_customer']); ?>
					</td>
					<td  align="center" class="bj-3">
						<?php echo ($fen_row['fen_contact']); ?>
					</td>
					<td  align="center" class="bj-3"> 
						<?php echo ($fen_row['fen_email']); ?>

					</td>
					<td  align="center" class="bj-3">
						<?php echo ($fen_row['fen_date']); ?>
						
					</td>
					<td  align="center" class="bj-3">
						<?php echo ($fen_row['fen_date_xian']); ?>
						
					</td>
					<td  align="center" class="bj-3">
						<?php echo (pro_status($fen_row['fen_status'])); ?>
					   
					</td>
					<td  align="center" class="bj-3">
						<?php echo ($fen_row['fen_pi']); ?>
						 
					</td>

					<td align="center" class="bj-3">
						 <?php echo (getTime($fen_row['id'])); ?>
					</td>
				 
				 
					<td align="center" class="bj-3">
						 &nbsp;
						<a href="<?php echo U('Pro/fen_index',array('id'=>$fen_row['id'],'commom_type'=>$commom_type));?>">查看</a>&nbsp;  

						<!-- <?php echo ($commom_type); ?> -->
						<!-- &nbsp;|&nbsp;&nbsp;
					 	<a href="<?php echo U('Pro/fen_editor',array('id'=>$fen_row['id']));?>">编辑</a>&nbsp;&nbsp;|&nbsp;&nbsp;
						 
					 
						<a href="javascript:if(confirm('您确定要删除该条信息吗？')){
						window.location='<?php echo U('Pro/fen_del',array('id'=>$fen_row['id']));?>';}">删除</a>&nbsp; -->
					</td>

				</tr><?php endforeach; endif; endif; ?>		

				 				 
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
									<!-- <button  style="cursor:pointer;" onclick="javascript:window.location.history.back();">   返回上一步  </button> -->
									 
								</td>
								<td width="190" align="center" class="bj-3">共<?php echo ($pages); ?>页&nbsp;&nbsp;<img id="pre" title="上一页" src="/Public/Consel/images/2_r2.jpg" width="15" height="15">&nbsp;&nbsp;
									<img id="next" title="下一页" src="/Public/Consel/images/2_r1.jpg" width="15" height="15">&nbsp;&nbsp;
								<select id="select7" name="select7" class="index-12">
                                  <option value="">跳转</option>
                                  <?php $__FOR_START_65231566__=1;$__FOR_END_65231566__=$pages+1;for($pageNum=$__FOR_START_65231566__;$pageNum < $__FOR_END_65231566__;$pageNum+=1){ ?><option value="<?php echo ($pageNum); ?>"><?php echo ($pageNum); ?></option><?php } ?>
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

<br>
<br>
<br>
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
	// 	$('#province').change(function(){
	// 	$.ajax({
	// 		type:'POST',
	// 		url:"<?php echo U('User/getcity');?>",
	// 		data:'id='+$(this).val(),
	// 		success:function(html)
	// 		{
	// 			$('#city option').remove();
	// 			$('#city').show();
	// 			$('#city').append(html);
	// 		}
	// 	});
	// });

	})
</script>
</html>