<?php if (!defined('THINK_PATH')) exit();?> <html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>武汉金开瑞生物工程有限公司---后台管理</title>
<link href="/Public/Consel/css/style.css" rel="stylesheet" type="text/css">
<script  src="/Public/Consel/js/jquery.js"></script>
<!-- <script  src="/Public/Consel/js/jquery-ui.min.js"></script>
<link href="/Public/Consel/js/jquery-ui.min.css" rel="stylesheet" type="text/css" /> -->
</head>
<script>
// $(document).ready(function(){
// 	$( "#stime" ).datepicker({
// 		dateFormat:'yy-mm-dd'
// 	});
// 	$( "#etime" ).datepicker({
// 		dateFormat:'yy-mm-dd'
// 	});
// 	var p = <?php echo ($page); ?>;
// 	var countP = <?php echo ($pages); ?>;
// 	$('#next').click(function(){
// 		var dang = p + 1;
// 		if (p<countP){
// 			$('#page').val(dang);
// 		} else {
// 			$('#page').val(countP);
// 			return false;
// 		}
// 		$('#sequencingForm').submit();
// 	});
// 	$('#pre').click(function(){
// 		if (p<2) return false;
// 		var pdang = p - 1;
// 		$('#page').val(pdang);
// 		$('#sequencingForm').submit();
// 	});
// 	$('#select7').change(function(){
// 		$('#page').val($(this).val());
// 		$('#sequencingForm').submit();
// 	});
// 	$('#search').click(function(){
// 		$('#page').val('');
// 		$('#sequencingForm').submit();
// 	});
// });

 function checkAll(){
 	 flag = true;
 	//地区位置 
 	// alert(document.getElementById("fen_position_n").checked);
 	s = document.getElementById("fen_position_s").checked;
 	n = document.getElementById("fen_position_n").checked;
   if(s == false && n == false){
   	 flag = false;
     alert('地区位置必须选择！');
     $(".fen_position").focus();
     return false;
   }
   //地区名称
    fen_name = $.trim($("#fen_name").val());
    if(fen_name == ''){
     flag = false;
     alert('地区名称必须填写！');
     document.getElementById("fen_name").value='';
     $("#fen_name").focus();
     return false;
    }

     //销售员
    fen_sale = $.trim($("#fen_sale").val());
    if(fen_sale == ''){
     flag = false;
     alert('销售员名称必须填写！');
     document.getElementById("fen_sale").value='';
     $("#fen_sale").focus();
     return false;
    }

     //合  同  编  号
    fen_he = $.trim($("#fen_he").val());
    if(fen_he == ''){
     flag = false;
     alert('合同编号必须填写！');
     document.getElementById("fen_he").value='';
     $("#fen_he").focus();
     return false;
    }

     //客户单位
    fen_customer = $.trim($("#fen_customer").val());
    if(fen_customer == ''){
     flag = false;
     alert('客户单位必须填写！');
     document.getElementById("fen_customer").value='';
     $("#fen_customer").focus();
     return false;
    }

    //联系人
    fen_contact = $.trim($("#fen_contact").val());
    if(fen_contact == ''){
     flag = false;
     alert('联系人必须填写！');
     document.getElementById("fen_contact").value='';
     $("#fen_contact").focus();
     return false;
    }

    //合同期限
    fen_date_xian = $.trim($("#fen_date_xian").val());
    if(fen_date_xian == ''){
     flag = false;
     alert('合同期限必须填写且不可更改！');
     document.getElementById("fen_date_xian").value='';
     $("#fen_date_xian").focus();
     return false;
    }


     //客户Email
    fen_email = $.trim($("#fen_email").val());
    if(fen_email == ''){
     flag = false;
     alert('客户Email必须填写！');
     document.getElementById("fen_email").value='';
     $("#fen_email").focus();
     return false;
    }

     //PI
    fen_pi = $.trim($("#fen_pi").val());
    if(fen_pi == ''){
     flag = false;
     alert('实验室负责人必须填写！');
     document.getElementById("fen_pi").value='';
     $("#fen_pi").focus();
     return false;
    }

    //预计项目周期
    fen_date = $.trim($("#fen_date").val());
    if(fen_date == ''){
     flag = false;
     alert('预计项目周期必须填写！');
     document.getElementById("fen_date").value='';
     $("#fen_date").focus();
     return false;
    }

    //项目名称
    fen_pro = $.trim($("#fen_pro").val());
    if(fen_pro == ''){
     flag = false;
     alert('项目名称必须填写！');
     document.getElementById("fen_pro").value='';
     $("#fen_pro").focus();
     return false;
    }


    //项目状态
    fen_status = $.trim($("#fen_status").val());
    if(fen_status == '0'){
     flag = false;
     alert('项目状态必须选择！');
     document.getElementById("fen_status").value='';
     $("#fen_status").focus();
     return false;
    }


    //合同总金额
    fen_he_money = $.trim($("#fen_he_money").val());
    if(fen_he_money == ''){
     flag = false;
     alert('合同总金额必须填写！');
     document.getElementById("fen_he_money").value='';
     $("#fen_he_money").focus();
     return false;
    }

     //预付款情况
    fen_money = $.trim($("#fen_money").val());
    if(fen_money == ''){
     flag = false;
     alert('预付款情况必须填写！');
     document.getElementById("fen_money").value='';
     $("#fen_money").focus();
     return false;
    }

     
    //项目细分
    fen_xi = $.trim($("#fen_xi").val());
    if(fen_xi == ''){
     flag = false;
     alert('项目细分必须填写！');
     document.getElementById("fen_xi").value='';
     $("#fen_xi").focus();
     return false;
    }


    if(flag == true){

     return true;
    }
 	 
 }
</script>
<body>
<table width="100%" border="0" cellpadding="0" cellspacing="0" background="/Public/Consel/images/hui.jpg">
	<tr>
		<td>&nbsp;</td>
	</tr>
</table>
 
<input type="hidden" name="page" id="page" value="<?php echo ($page); ?>" />
<table width="97%" border="0" align="center" cellpadding="0" cellspacing="0">
	<tr>
		<td width="100%" align="center" valign="top" bgcolor="#FFFFFF">
        	<table width="100%" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<!-- <table width="100%" cellpadding="0" cellspacing="0" border="0" align="center" style="border-bottom:#ccc solid 1px; margin-bottom:10px;">
							<tr>
								<td width="2%" height="30">
									<img src="/Public/Consel/images/2_r1.jpg" />
								</td>

								<td width="80%" class="index-5">
									<span class="index-7">
										<font style="color:#f57e20;">
											<?php echo session('admin-name');?>
										</font>，您已登录成功！<a href="<?php echo U('User/logout');?>"  target=_top>退出</a>
									</span>
								</td>

								<td width="25%"><a href="http://www.jkrorder.com/index.php/Manage.html" target="top">后台主页</a>&nbsp;&nbsp;&nbsp;&nbsp;
									武汉金开瑞生物工程有限公司
								</td>

							</tr>
						</table> -->
						<table width="100%" cellpadding="0" cellspacing="0" border="0" align="center" style="border-bottom:#ccc solid 1px; margin-bottom:10px;">
							<tr>
								<td width="2%" height="30">
									<img src="/Public/Consel/images/2_r1.jpg" />
								</td>

								<td width="80%" class="index-5"><span class="index-7">
									<font style="color:#f57e20;">
										<?php echo session('admin-name');?>
									</font>，您已登录成功！<a href="<?php echo U('User/logout');?>"  target=_top>退出</a>
								</td>
							</td>
								<td width="25%">武汉金开瑞生物工程有限公司</td>
							</td>
						</table>
						
				  	</td>
				</tr>
				<tr>
					<td>
                
                <form id="form_fen" action="<?php echo U('Pro/fen_add');?>" onsubmit="return checkAll();" method="post" autocomplete="off">

                <table class="fen_list" width="100%" cellpadding="4" cellspacing="0" border="0" align="center">
				<legend><h3><center><span style="color:green;">
                    <?php if(($type) == "1"): ?>综合服务<?php endif; ?>
				     <?php if(($type) == "2"): ?>蛋白组学<?php endif; ?>
				     <?php if(($type) == "3"): ?>蛋白及抗体<?php endif; ?>
				     <?php if(($type) == "4"): ?>分子生物学服务<?php endif; ?>
				     <?php if(($type) == "5"): ?>病毒包装及检测服务<?php endif; ?>
				     <?php if(($type) == "6"): ?>小分子抗原及ElisA开发<?php endif; ?>项目跟踪基本信息</span></center></h3></legend>

				<!-- 项目跟踪基本信息 ——类型 -->
				<input type="hidden" name="fen_type" value="<?php echo ($type); ?>"/>

                	<tr>
                		<td width="38%"><label for="fen_position">地区位置：</label> 
						 
							<input type="radio" class="fen_position"  id="fen_position_s" value="1" name="fen_position" />南
							<input type="radio" class="fen_position"  id="fen_position_n" value="2" name="fen_position" />北
						</td>
                	</tr>

                	<!-- <input type="hidden" name="fen_position" id="fen_position" value="<?php echo ($position); ?>" /> -->

					<tr>
						 
						<td width="38%">
                         <label for="fen_name">地区名称：</label>
				         <input type="text" style="border-left:0px;border-right:0px;border-top:0px;" id="fen_name" size="45" name="fen_name" />
						</td>

						<td align="left" width="31%">
                        <label for="">销售员：</label>
                        <input type="text"  style="border-left:0px;border-right:0px;border-top:0px;" id="fen_sale" size="38" name="fen_sale"/>
						</td>

						<td width="31%"> 
                        <label for="fen_he">合&nbsp;&nbsp;同&nbsp;&nbsp;编&nbsp;&nbsp;号：</label>
                        <input type="text"  style="border-left:0px;border-right:0px;border-top:0px;" id="fen_he" size="32" name="fen_he"/>
						</td>
								
				 
			</tr>
			<tr>
				    <td>
                        <label for="fen_customer">客户单位：  </label> 
                        <input type="text"  style="border-left:0px;border-right:0px;border-top:0px;" 
                        id="fen_customer" size="45" name="fen_customer"/>       	 
                     </td>

						<td>
                         <label for="fen_contact">联系人：</label>
				         <input type="text"  style="border-left:0px;border-right:0px;border-top:0px;" id="fen_contact" size="38" name="fen_contact" />
						</td>


						<td > 
                        <label for="fen_date_xian">合&nbsp;&nbsp;同&nbsp;&nbsp;期&nbsp;&nbsp;限：</label>
                        <input type="text"  style="border-left:0px;border-right:0px;border-top:0px;" id="fen_date_xian" size="32" name="fen_date_xian"/>
						</td>
								
				 
			</tr>
			<tr>
				<td align="left"> 
						<label for="fen_email">客户Email：</label>	 
						<input type="text"  style="border-left:0px;border-right:0px;border-top:0px;" id="fen_email" size="44" name="fen_email"/>
					</td>
						<td  align="left"> 
						<label for="fen_pi">实验室负责人：</label>	 
					      <input type="text"  style="border-left:0px;border-right:0px;border-top:0px;" id="fen_pi" size="33" name="fen_pi"/>
						<!-- <input type="file"  style="border:0px;" id="fen_report" name="fen_report"/> -->
						<!-- <select name="fen_status" id="fen_status">
							<option value="0">请选择状态</option>
							 <option value="1">正常状态</option>
							 <option value="2">停止状态</option>
							 <option value="3">延期状态</option>
							 <option value="4">准备发货状态</option>
							 <option value="5">项目结束状态</option>
						</select> -->

					</td>

					<td > 
                        <label for="fen_date">预计项目周期：</label>
                        <input type="text"  style="border-left:0px;border-right:0px;border-top:0px;" id="fen_date" size="32" name="fen_date"/>
					</td>
			</tr>

			<tr>
				<td align="left"> 
						<label for="fen_pro">项目名称：</label>	 
						<input type="text"  style="border-left:0px;border-right:0px;border-top:0px;" id="fen_pro" size="45" name="fen_pro"/>
					</td>
						<td  align="left"> 
						<label for="fen_status">项目状态：</label>	 
					 
						<!-- <input type="file"  style="border:0px;" id="fen_report" name="fen_report"/> -->
						<select name="fen_status" id="fen_status">
							<option value="0">请选择状态</option>
							 <option value="1">正常状态</option>
							 <option value="2">停止状态</option>
							 <option value="3">延期状态</option>
							 <option value="4">准备发货状态</option>
							 <option value="5">项目结束状态</option>
						</select>

					</td>

					<td > 
                         <label for="fen_he_money">合&nbsp;&nbsp;同&nbsp;&nbsp;总金额：</label>	 
						<input type="text"   style="border-left:0px;border-right:0px;border-top:0px;" 
						id="fen_he_money" size="32" name="fen_he_money" placeholder="只填数字即可"/>
					</td>
			</tr>

			<tr>
				<td align="left">
					 <label for="fen_money">预付款情况：</label>
                       <input type="text"   style="border-left:0px;border-right:0px;border-top:0px;" 
						id="fen_money" size="44" name="fen_money" placeholder="" /> 
				</td>
			</tr>



			<tr>
				 
					<td  colspan="4" align="left">
                        <label for="fen_xi" style="vertical-align:top;">项目细分：</label>
                      
                        <textarea style="border:1px solid #ABCDEF;" name="fen_xi" id="fen_xi" cols="120" rows="2"></textarea>
				  </td>
 
			</tr>

			<tr>
				<td colspan="4" align="center">
					<input type="submit" style="padding:5px;background:#FF6633;color:white;font-weight:normal;font-size:12px;cursor:pointer;"  value=" 提  交 "  />
                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<input type="reset" style="padding:5px;background:#FF6633;color:white;font-weight:normal;font-size:12px;cursor:pointer;"   value=" 重  置 "  />
				</td>
			</tr>
		</table>

		</form>
					</td>
				</tr>
			</table>
			<br>
			<!-- <br> -->
			<!-- <br> -->
			<!-- <hr> -->
			<table width="100%" style="border-collapse:collapse;" cellpadding="0" cellspacing="0" border="1" class="bj-1">
				<legend><h3>项目跟踪情况列表</h3></legend>
				<legend style="text-align:right;"><h4>
					<a class="fen_more" href="<?php echo U('Pro/fen_more',array('type'=>$type));?>" title="查看更多项目跟踪情况">点击查看更多>></a>
				</h4></legend>
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
					<td width="140"  rowspan="2" align="center" class="index-7">操&nbsp;&nbsp;&nbsp;作</td>



				</tr>
			 
				<tr>
					<td width="180" align="center" style="background:#DBDBDB;" class="bj-3 index-7">单&nbsp;&nbsp;&nbsp;位</td>
					<td width ="70" align="center" style="background:#DBDBDB;" class="bj-3 index-7">联系人</td>
					 
					 
					 
				</tr>

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
						<a href="<?php echo U('Pro/fen_index',array('id'=>$fen_row['id'],'type'=>$type));?>">查看</a>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;
					 	<a href="<?php echo U('Pro/fen_editor',array('id'=>$fen_row['id'],'type'=>$type));?>">编辑</a>
					 	<!-- &nbsp;&nbsp;|&nbsp;&nbsp; -->
						 
					 <br/>
						<a href="javascript:if(confirm('您确定要删除该条信息吗？')){
						window.location='<?php echo U('Pro/fen_del',array('id'=>$fen_row['id']));?>';}">删除</a>&nbsp;
					</td>

				</tr><?php endforeach; endif; ?>
				 				 
			</table>
			<br/>
			<br/>
			<!-- <table width="100%" border="0" cellspacing="0" cellpadding="0" style="display:none;">
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
                                  <?php $__FOR_START_377165298__=1;$__FOR_END_377165298__=$pages+1;for($pageNum=$__FOR_START_377165298__;$pageNum < $__FOR_END_377165298__;$pageNum+=1){ ?><option value="<?php echo ($pageNum); ?>"><?php echo ($pageNum); ?></option><?php } ?>
                                </select>
								页</td>
							</tr>
						</table>
					</td>
				</tr>
			</table> -->

		</td>
	</tr>
</table>
 
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
	.fen_more:hover{
		color:red;
	}
	 
</style>

</html>