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
<!-- logo--导航菜单 结束 -->
<div class="clear"></div>
<div id="main">
	<div class="maincon" style="border:0px solid red;">

	<form method="post" autocomplete="off" action="<?php echo U('User/update');?>">

        <div class="order_con" style="border:0px solid red;width:50%;">
        <table width="50%" cellspacing="1" cellpadding="1" border="0" style="border:0px solid blue;width:500px;">
			<tr style="border:1px solid red;">
           	  <th colspan="2" class="fs16" >个人资料：</th>
               
            </tr>
            <tr>
                <td>姓名：</td>
                <td><input type="text" name="uname" value="<?php echo ($userInfo["name"]); ?>" size="30" readonly/></td>
            </tr>
			<tr>
                <td>所在单位：</td>
                <td><input type="text" name="company" value="<?php echo ($userInfo["company"]); ?>" size="30" readonly/></td>
            </tr>
			<tr>
                <td>单位地址：</td>
                <td><input type="text" name="address" value="<?php echo ($userInfo["address"]); ?>" size="30" readonly/></td>
            </tr>
            
			
			<tr>
                <td>联系方式：</td>
                <td><input type="text" name="phone" value="<?php echo ($userInfo["phone"]); ?>" size="30" readonly /></td>
            </tr>
           <!-- 新增内容开始 -->
            <tr>
                <td>邮箱：</td>
                <td><input type="email" name="email" value="<?php echo ($uEmail); ?>" size="30" readonly/></td>
            </tr>
             <tr>
                <td>课题组：</td>
                <td><input type="text" name="subject" value="<?php echo ($userInfo["subject"]); ?>" size="30" readonly/></td>
            </tr>
             <tr>
                <td>实验室负责人：</td>
                <td><input type="text" name="dutyer" value="<?php echo ($userInfo["dutyer"]); ?>" size="30" readonly/></td>
            </tr>
             <tr>
                <td>发票抬头：</td>
                <td><input type="text" name="piao" value="<?php echo ($userInfo["piao"]); ?>" size="30"/></td>
            </tr>
             <tr>
                <td>发货地址：</td>
                <td><input type="text" name="tempaddress" value="<?php echo ($userInfo["tempaddress"]); ?>" size="30"/></td>
            </tr>
             
            <!-- 新增内容结束 -->


			<tr>
                <td>所在城市：</td>
                <td><select name="province" id="province">
					<option value="">选择</option>
					<?php foreach($proList as $k=>$PL) { ?>
						<?php if ($userInfo['province'] == $PL['id']){?>
						<option value="<?php echo $PL['id']?>" selected="selected">
							<?php echo $PL['name']?></option>
						<?php }else {?>
						<option value="<?php echo $PL['id']?>">
							<?php echo $PL['name']?>
						</option>
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
            </tr>
            <tr>
                <td colspan="2" align="center">
                	 <input type="image" src="/Public/Home/images/save_btn.gif" /></td>
            </tr>
        </table>
	  </div>
	 

  
   </form>

      <div class="order_con" style="border:0px solid red;width:48%;float:left;">
        <table width="50%" cellspacing="0" cellpadding="1" border="0" style="border:0px solid blue;width:500px;">
			<tr style="border:0px solid red;">
           	  <th colspan="2" class="fs16" >我的积分：</th>               
            </tr>
            <tr>
            	<td>会员等级：</td>
            	<td>普通会员</td>
            </tr>
            <tr>
            	<td>累计积分：</td>
            	<td>1000分</td>
            </tr>
            <tr>
            	<td>年内特权：</td>
            	<td>
            	  ①免费50个PCR扩增服务（测序相关）<br/>
                   ②免费的pfu酶，热启动酶各一支；<br/>
                  ③免费的引物设计（两条）<br/>
                   ①免费50个PCR扩增服务（测序相关）
                  

            	</td>
            </tr>


            <tr>
             <td colspan="2">

            <table style="border:5px inset #ABCDEF;margin-bottom:20px;-moz-border-radius:10px;-webkit-border-radius:10px;-o-border-radius:10px;border-radius:10px;box-shadow: 10px 15px 5px #888888;" cellspacing="0" >
            <td>
           		当前券数：第1张
           	</td>
            <tr>
            	<td>可用积分券：</td>
            	<td><input type="text" name="" id="" size="8"/>分</td>
            </tr>
            <tr>
            	<td>积分代码：</td>
            	<td><input type="text" name="" id="" size="40"/></td>
            </tr>
            <tr>
            	<td>生成日期：2015.10.09</td>
            	<td>剩余天数：59天</td>
            </tr>
            <tr>
            	<td>有效时间：6个月</td>
            	<td>
            		<input type="radio" name="fen_quan_date" id=""/>未用&nbsp;&nbsp;&nbsp;&nbsp;
            		<input type="radio" name="fen_quan_date" id=""/>已用&nbsp;&nbsp;&nbsp;&nbsp;
            		<input type="radio" name="fen_quan_date" id=""/>过期
            	</td>
            </tr>
            </table>

         <!--  <table style="border:5px inset #ABCDEF;margin-bottom:20px;-moz-border-radius:10px;-webkit-border-radius:10px;-o-border-radius:10px;border-radius:10px;box-shadow: 10px 15px 5px #888888;" cellspacing="0">
           <tr>
           	<td>
           		当前券数：第2张
           	</td>
           </tr>
            <tr>
            	<td>可用积分券：</td>
            	<td><input type="text" name="" id="" size="8"/>分</td>
            </tr>
            <tr>
            	<td>积分代码：</td>
            	<td><input type="text" name="" id="" size="40"/></td>
            </tr>
            <tr>
            	<td>生成日期：2015.10.09</td>
            	<td>剩余天数：59天</td>
            </tr>
            <tr>
            	<td>有效时间：6个月</td>
            	<td>
            		<input type="radio" name="fen_quan_date" id=""/>未用&nbsp;&nbsp;&nbsp;&nbsp;
            		<input type="radio" name="fen_quan_date" id=""/>已用&nbsp;&nbsp;&nbsp;&nbsp;
            		<input type="radio" name="fen_quan_date" id=""/>过期
            	</td>
            </tr>
            </table>
 -->

            </td>
           </tr> 

           <tr>
           	<td colspan="2" style="border:0px solid blue;text-align:center;">
           		此处分页
           	</td>
           </tr>	


         </table>   
     </div>


    
</div>
<script>
$(document).ready(function(){
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
</script>
</body>
</html>