<?php if (!defined('THINK_PATH')) exit();?> <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
<!-- logo--导航菜单 结束 -->

<div class="clear"></div>
<style type="text/css">
    #tijiao{
    	padding:5px;
    }
	#tijiao:hover{
		cursor:pointer;
		color:red;
	}
</style>
<script>
$(document).ready(function(){
	$('#tijiao').click(function(){
		// alert('aaa');
		var pass = $('#pass').val();
		var npass = $('#npass').val();
		var npass_re = $('#npass-re').val();
		var flag = true;
		a1 = /^[A-Za-z0-9]+$/.test(pass);
		if ( pass == '' || !a1){
			alert('请按要求填写原始密码');
			flag = false;
			return false;
			// break;
		}
		if (npass == '' || !/^[A-Za-z0-9]+$/.test(npass)){
			alert('请按要求填写新密码');
			flag = false;
			return false;
		}
		if (npass_re == '' || !/^[A-Za-z0-9]+$/.test(npass_re)){
			alert('请按要求重复新密码');
			flag = false;
			return false;
		}
		if (npass != npass_re){
			alert('新密码不一致!');
			flag = false;
		}
		if (flag==true){
			 $('#upForm').submit();
		}
	});
});
</script>
<div id="main">
	<div class="maincon">
	<form method="post" name="form1" autocomplete="off" action="<?php echo U('User/uppass');?>" id="upForm">
        <div class="order_con">
        <table width="100%" cellspacing="1" cellpadding="1" border="0">
			<tr>
           	  <th colspan="2" class="fs16">修改密码：</th>
                
            </tr>
            <tr>
           	  <th colspan="2" class="fs16">&nbsp;</th>
                
            </tr>
            <tr>
                <td>原密码：</td>
                <td><input type="password" id="pass" name="pass" size="30" /></td>
            </tr>
			<tr>
                <td>新密码：</td>
                <td><input type="password" id="npass" name="npass" size="30"/></td>
            </tr>
			<tr>
                <td>新密码确认：</td>
                <td><input type="password" id="npass-re" name="npass-re" size="30"/></td>
            </tr>
			
            <tr>
                <td colspan="2" align="center"><input type="button" title="点击提交" name="tijiao" id="tijiao" value="确认修改" /></td>
            </tr>
        </table>
	  </div>
	  </form>
  </div>
</div>

</body>
</html>