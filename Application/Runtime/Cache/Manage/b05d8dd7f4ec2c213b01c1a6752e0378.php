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
<table width="100%" border="0" cellpadding="0" cellspacing="0" background="/Public/Consel/images/hui.jpg">
	<tr>
		<td>&nbsp;</td>
	</tr>
</table>
<form id="sequencingForm" method="post" action="<?php echo U('Primer/sequence_all');?>">
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
								<td>
									<!-- 引物编号：
									<input type="text" name="customer" value="<?php echo ($customer); ?>"/> -->
								</td>	
								<td width="11%" align="right">引物名称：</td>

								<td width="15%"><input type="text" name="sequence" value="<?php echo ($sequence); ?>" size="40" /></td>
								<td width="47%" align="center">
									状态： 
								    <select name="status" id="xulie_status">
								    	<!-- <option value="">---请选择---</option> -->
								    	<option value="0" <?php if(($status) == "0"): ?>selected<?php endif; ?>>
								   ---未下载---</option>
								    	<option value="1" <?php if(($status) == "1"): ?>selected<?php endif; ?>>
								    		---已下载---</option>
								    </select>
								</td>
                                <td><img id="search" src="/Public/Consel/images/query_btn.gif" /></td>
							</tr>
							<tr>
								<td colspan="3">
								<input type="checkbox" name="xia_all" id="xia_all" />全选
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="button" id="xia_excel" value="下载" style="cursor:pointer;" /><span style="color:red;font-style:italic;">(对勾选上的序列下载)</span>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
			<table width="100%" cellpadding="0" cellspacing="1" border="0" class="bj-1">
				<tr align="center">
					<td>选项</td>
					<td>流水号</td>          
		            <td>引物名称</td>
		            <td>引物序列</td>
		            <td>碱基数</td>
		            <td>需求量OD值</td>
		            <td>分装管数</td>
		            <td>纯化方式</td>
		            <td>5'修饰</td>
		            <td>3'修饰</td>
		            <td>其他修饰</td>
		            <td>备注信息</td>
				</tr>

				<?php if(is_array($sequence_info)): foreach($sequence_info as $k=>$L): ?><tr align="center">
				 	<td><input type="checkbox" name="xia[]" data="<?php echo ($k); ?>" id="xia_<?php echo ($k); ?>" value="<?php echo ($L["id"]); ?>" 
				 		class="xia_common"/></td>
				 	<td><?php echo ($L["primer_shui"]); ?></td>        
		            <td><?php echo ($L["primername"]); ?></td>            
		            <td><?php echo (getSequence($L["id"])); ?></td>
		            <td><?php echo (getSequenceNum($L["id"])); ?></td>
		            <td><?php echo ($L["demand"]); ?></td>
		            <td><?php echo ($L["tubenum"]); ?></td>
		            <td><?php echo (getPuremthod($L["puremthod"])); ?></td>
		            <td><?php echo (getFModification($L["fmodification"])); ?></td>
		            <td><?php echo (getTModification($L["tmodification"])); ?></td>
		            <td><?php echo (getOTModification($L["othermod"])); ?></td>
                    <td><?php echo ($L["note"]); ?></td>
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
                                  <?php $__FOR_START_1598613821__=1;$__FOR_END_1598613821__=$pages+1;for($pageNum=$__FOR_START_1598613821__;$pageNum < $__FOR_END_1598613821__;$pageNum+=1){ ?><option value="<?php echo ($pageNum); ?>"><?php echo ($pageNum); ?></option><?php } ?>
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

<script type="text/javascript">
	$(function(){
      $("#xia_all").click(function(){
      	// alert("aaaa");
      	if($("#xia_all").prop("checked")==true){
         $(".xia_common").prop("checked",true);
      	}else{
      	 $(".xia_common").prop("checked",false);
      	}
      	 
      });

      // start

      $(".xia_common").click(function(){
            
            // num = 0;
      	 // $(".xia_common").each(function(x,y){
            if($(this).prop("checked")==true){
              // alert("a");
              newData = $(this).attr("data");
              // alert(newData);
              $(".xia_common").each(function(x,y){
               if(x <= newData){
                $(this).prop("checked",true);
               }else{
               	$(this).prop("checked",false);
               }
              });
              // num = num + 1;
              }
          // });

      });
     
      // end



      $("#xia_excel").click(function(){
       if(window.confirm("提示：当勾选的引物序列下载后,该序列状态为'已下载'。您确定要执行吗？")){
      	//得到当前的状态
      	sta = $("#xulie_status").val();
      	// alert(sta);
      	// exit;

      	ss = "";
        // alert("aaaaa");
        $(".xia_common").each(function(m,n){
        if($("#xia_"+m).prop("checked") == true){
        	 data = $("#xia_"+m).val();
        	 ss += data + ",";
         // alert(data);
        }	
        
        });
        // alert(ss.length);
        if(ss.length > 0){
         window.location = "/Test/xia_yinwu.php?id="+ss+"&status="+sta;
        }else{
         alert("引物项必须勾选，否则下载内容为空！");
        }
       return true;
       }
       
      });




	});
</script>