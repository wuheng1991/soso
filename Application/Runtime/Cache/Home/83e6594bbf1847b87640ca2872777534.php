<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>武汉金开瑞生物工程有限公司</title>
<!-- <link href="/Public/Home/js/jquery.autocomplete.css" rel="stylesheet" type="text/css" /> -->
<link href="/Public/Home/css/login.css" rel="stylesheet" type="text/css" />
<!-- <script type="text/javascript" src="/Public/Home/js/jquery.js"></script> -->

<script type="text/javascript" src="/Public/Home/js/tab.js"></script>

<script type="text/javascript" src="/Public/Home/js/1.11.js"></script>
<!-- <script type="text/javascript" src="/Public/Home/js/2.1.js"></script> -->
<!-- <script type="text/javascript" src="/Public/Home/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="/Public/Home/js/jquery.datePicker.js"></script> -->
<!-- <link href="/Public/Home/js/jquery-ui.min.css" rel="stylesheet" type="text/css" /> -->
</head>

<body>
<div id="toper">
	<div class="top">
    	<ul class="top_l">
			<li>欢迎<b id="f33"> <?php echo ($userInfo["name"]); ?></b>　单 位：<?php echo ($userInfo["company"]); ?>　电 话：<?php echo ($userInfo["phone"]); ?></li>
		</ul>
        <ul class="top_l right">
        	<li><i class="lgo"></i>欢迎<b id="f33"> <?php echo ($userInfo["name"]); ?></b>&nbsp;&nbsp;/&nbsp;&nbsp;<a href="<?php echo U('User/logout/');?>">退 出</a></li>
        </ul>
    </div>
</div>
<div class="clear"></div>
<div id="header">
	<div class="head">
		<div class="logo"><a href="#"><img src="/Public/Home/images/logo.gif" /></a></div>
        <div class="menu">
                <ul class="menu">
                	<li class="menu-item select"><a class="menu-item" href="<?php echo U('Index/index');?>">我的帐户</a></li>
                    
                    <li class="menu-item"><a class="menu-item" >创建新订单</a>
                        <div class="menu-div" style="display:none;">
                            <ul style="border:0px solid red;width:119px;">
                                <li><a href="<?php echo U('Index/Create/');?>">创建测序订单</a></li>
                                <li><a href="<?php echo U('Primer/Create/');?>">创建引物订单</a></li>
                                <li><a href="<?php echo U('Gene/Create/');?>">基因合成订单</a></li> 
                              <!--  <li style="border:0px solid red;width:119px;"><a href="<?php echo U('Clone/Create/');?>">PCR克隆及亚克隆</a></li> 
                                
                                <li><a href="<?php echo U('Server/Create/');?>">突变服务订单</a></li> 
                                <li><a href="<?php echo U('Zhili/Create/');?>">质粒制备订单</a></li>  -->
                             
                            </ul>
                        </div>
                    </li>
                    <li class="menu-item big"><a class="menu-item" href="<?php echo U('Index/search');?>">订单状态和结果</a></li>
                    <li class="menu-item"><a class="menu-item" >帐户信息</a>
                        <div class="menu-div" style="display:none;">
                            <ul>
                                <li><a href="<?php echo U('User/userinfo');?>">帐户信息</a></li>
                                <li><a href="<?php echo U('User/uppass');?>">修改密码</a></li>
                               
                            </ul>
                        </div>
                    </li>
                    
				</ul>
                <script type="text/javascript">
				$('.menu-item').hover(
					function(){
						$(this).find("div.menu-div").show();
						$(this).addClass("select");
					},
					function(){
						$(this).find("div.menu-div").hide();
						$(this).removeClass("select");
					}
				);
				$('.first-nav').hover(
					function(){
						$(this).find("ul.menu-div-child").show();
						$(this).addClass('select');
					},
					function(){
						$(this).find("ul.menu-div-child").hide();
						$(this).removeClass('select');
					}
				);
				
					
			</script>
		</div>
	</div>
</div>
<!-- logo--导航菜单 结束 -->
<div class="clear"></div>
<div id="main">
	<div class="maincon">
		<div class="bread">提交订单 - 步骤 1 / 2：填写订单信息</div>
        <div class="order_con">
		<form method="post" action="<?php echo U('Primer/step');?>" autocomplete="off" id="stepForm">
        <table width="100%" cellspacing="1" cellpadding="1" border="0">
			<tr>
           	  <th class="fs16">创建新订单：</th>
                <th>
                    <label style="margin-right:50px;"><input id="zai_send" type="radio" class="radio"/><span class="fs16"><b>在线填写表单</b></span></label>
                    <label><input id="jianli_send" type="radio" class="radio"/><span class="fs16"><b>上传Excel表单</b></span></label>
                </th>
            </tr>
			<tr>
                <td colspan="2"><div id="zai" style="display:none;">
				
				<table>
				<tr>
					<td>创建在线表单：</td>
						<td><input type="text" id="zai_wh" name="num" size="4" style="border:1px solid black;" /> (1 到 10000条)引物数量 <input type="image" src="/Public/Home/images/form_btn.gif" /> </td>
					</tr>
				</table>
				
				</div>
				<div id="jianli" style="display:none;">
				
				<table>
				<tr>
					<td>下载表格</td>
						<td><a href="<?php echo U('Primer/yinwu_excel');?>" style="color:red;" title="点击此处下载">引物订单Excel下载</a></td>
					</tr>
					<tr>
						<td></td>
						<td>注意： 请使用 (A-z, 0-9,+, _, -) 填写 "样品名称" 和 "自备引物名称 " 栏的 空位。 </td>
					</tr>
					<tr>
						<td>上传表格</td>
						<td>
							<input type="file" name="excel" size="2" />
							<span style="color:red;font-style:italic;">(如果Excel订购表无法上传或者上传错误,请检查是否使用最新的Excel订购表
								)</span>
						 </td>
					</tr>
				</table>
				
				</div>
				</td>
            </tr>
			
            
			
            <tr>
                <td colspan="2" align="center">　　　　　　　　　　　　　　　　　　　　　　　　　　　
                  <input type="image" src="/Public/Home/images/save_btn.gif" />&nbsp;&nbsp;<input type="image" src="/Public/Home/images/cancel_btn.gif" /></td>
            </tr>
        </table>

		</form>
	  </div>
  </div>
</div>
<script type="text/javascript">
$(document).ready(function(){
	$('#zai_send').click(function(){
		$('#zai').show();
		$("#zai_wh").focus();
		$('#jianli').hide();
		$('#jianli_send').attr('checked',false);
		$('#stepForm').attr('enctype','');
	});
	$('#jianli_send').click(function(){
		$('#jianli').show();
		$('#zai').hide();
		$('#zai_send').attr('checked',false);
		$('#stepForm').attr('enctype','multipart/form-data');
	});
});
</script>
</body>
</html>