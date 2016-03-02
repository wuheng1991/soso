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

<style>
    .order_con span span{
    cursor:pointer;
    }
</style>
<!-- <script type="text/javascript" src="./Public/Home/js/jquery.datePicker.js"></script> -->
<script type="text/javascript" src="/Public/Home/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="/Public/Home/js/jquery.datePicker.js"></script>
<link href="/Public/Home/js/jquery-ui.min.css" rel="stylesheet" type="text/css" />
<script>
$(document).ready(function(){
  // alert("aaa");
	$( "#FromDate" ).datepicker({
		dateFormat:'yy-mm-dd'
	});
	$( "#ToDate" ).datepicker({
		dateFormat:'yy-mm-dd'
	});
	$('#next').click(function(){
		$('#page').val($(this).attr('data'));
		$('#searchdForm').submit();
	});
	$('#pre').click(function(){
		$('#page').val($(this).attr('data'));
		$('#searchdForm').submit();
	});
});
</script>
<div class="clear"></div>
<div id="main">
	<div class="maincon">
		<div class="bread">搜索条件</div>
        <div class="order_con">

        <form id="searchdForm" method="post" autocomplete="off" action="<?php echo U('Index/search');?>">

		<input type="hidden" id="page" name="p" value="" />
		<table cellspacing="0" cellpadding="2" bgcolor="#fff" border="0" style="width:1000px;">
            <tr bgcolor="#eaeaea">
                <td align="right" bgcolor="#eaeaea" width="90px">订单日期从</td>
                <td bgcolor="#eaeaea"><input name="FromDate" type="text" value="<?php echo ($fromDate); ?>" id="FromDate" class="Wdate" /></td>
                <td align="right" bgcolor="#eaeaea">到</td>
                <td bgcolor="#eaeaea"><input name="ToDate" type="text" value="<?php echo ($toDate); ?>" 
                	id="ToDate" class="Wdate" /></td>
                <td align="right"><input type="submit" name="btnSearch" value="搜索订单" onclick="return CheckOrderId();" id="btnSearch" style="color:#336699;" /></td>
            </tr>
            <tr bgcolor="#eaeaea"  >
                <td  align="right" bgcolor="#eaeaea">订单类型</td>

                <td bgcolor="#eaeaea" width="160"> <span class="chkSequece">
        				<?php if( $ordertype1 == 'on' ): ?><input id="chkOrderType1" type="checkbox" name="chkOrderType1" checked="checked" /><label for="chkOrderType1">DNA测序订单</label></span>
        				<?php else: ?>
        				<input id="chkOrderType1" type="checkbox" name="chkOrderType1" /><label for="chkOrderType1">DNA测序订单</label></span><?php endif; ?>
        				</td>
        
                <td bgcolor="#eaeaea" width="160" ><span class="chkSequece">
        				<?php if( $ordertype2 == 'on' ): ?><input id="chkOrderType3" type="checkbox" name="chkOrderType3" checked="checked" /><label for="chkOrderType3">引物合成订单</label></span>
        				<?php else: ?>
        				<input id="chkOrderType3" type="checkbox" name="chkOrderType3" /><label for="chkOrderType3">引物合成订单</label></span><?php endif; ?>
        				</td>

                <td bgcolor="#eaeaea"  >
                <?php if( $ordertype4 == 'on' ): ?><span class="chkSequece">
                <input id="chkOrderType4" type="checkbox" name="chkOrderType4" checked="checked" /><label for="chkOrderType4">基因合成订单</label></span>
                <?php else: ?>
                <input id="chkOrderType4" type="checkbox" name="chkOrderType4" /><label for="chkOrderType4">基因合成订单</label></span><?php endif; ?>
                </td>

                <td bgcolor="#eaeaea">
                  &nbsp;
                </td>

            </tr>
            <tr bgcolor="#eaeaea">
                <td align="right" bgcolor="#eaeaea" width="90px">订单号</td>
                <td><input name="txtOrderId" type="text" id="txtOrderId" value="<?php echo ($ordercode); ?>" style="width:120px;" size="30" /></td>
                <td align="right" bgcolor="#eaeaea" width="90px"></td>
                <td colspan="3"></td>
            </tr>
        </table>

		</form>
    
		</div>
			<br/>	
		
		<div class="order_con" style="margin-top:20px;margin-bottom:50px;">
            <span>温馨提示：<br/>(1)若该订单提交状态为<span style="color:red;">"草稿"</span>，点击相应的"详情"可以<span title="预览初次提交的订单信息" style="text-decoration:underline;border-bottom:1px double red;">预览</span>初次提交的订单信息，也可以进行<span style="text-decoration:underline;border-bottom:1px double red;" title="修改初次提交的订单信息">修改</span>处理。
                <br/>
                (2)若该订单提交状态为<span style="color:green;">"订单已提交"</span>，点击相应的"详情"可以<span style="text-decoration:underline;border-bottom:1px double red;" title="预览最终的订单信息">预览</span>最终的订单信息</span>
                <br/>
                <br/>

      <!-- 	<table cellspacing="0" border="1" style="border-color:DarkGray;border-collapse:collapse;margin-top:10px;width:100%;" > -->
        <table width="100%" cellspacing="1" cellpadding="1" border="0">
			<tr style="color:White;" align="center">
				<td style="background-color:#008C00; color:white;">提交日期</td>
                <td style="background-color:#008C00; color:white;">订单号</td>
                <td style="background-color:#008C00; color:white;">订单类型</td>
               <!--  <td>项目描述</td> -->
                <td style="background-color:#008C00; color:white;">引物条数</td>
                <td style="background-color:#008C00; color:white;">碱基数</td>
                <td style="background-color:#008C00; color:white;">提交状态</td>
                <!-- <td>PI/实验室负责人</td> -->
                <!-- <td>单位名称</td> -->
                <td style="background-color:#008C00; color:white;">提交方式</td>
                <td style="background-color:#008C00; color:white;">结果</td>
                <td style="background-color:#008C00; color:white;">订购状态</td>
                <td style="background-color:#008C00; color:white;">操作</td>
                <td style="background-color:#008C00; color:white;">快递查询</td>
                <td style="background-color:#008C00; color:white;">留言咨询</td>
			</tr>
            <?php if(is_array($list)): foreach($list as $key=>$L): ?><tr>
				<td align="center"><?php echo (date('Y-m-d',$L["addtime"])); ?></td>
                <td align="center"><?php echo ($L["code_yw"]); ?></td>
                <td align="center"><?php echo (showOrderType($L["ordertype"])); ?></td>
               <!--  <td><?php echo ($L["description"]); ?></td> -->
                 
                 <?php if($L["ordertype"] == 1): ?><td align="center"> <?php echo (getSequencingCountByID($L["id"])); ?></td>
                <?php else: ?>
                 <td align="center"><?php echo ($L["num_yinwu"]); ?></td><?php endif; ?>
                
                <!-- <td align="center">&nbsp;</td> -->
                <?php if($L["ordertype"] == 1): ?><td align="center">
          <!-- <?php echo (getSequencingCountByID($L["id"])); ?> -->
          &nbsp;
        </td>
				<?php elseif($L["ordertype"] == 2): ?>
			 
				<td align="center"><?php echo (getPrimersCountByID($L["id"])); ?></td>
                <?php elseif($L["ordertype"] == 3): ?>
                <td align="center"> 
                   <?php echo (getGeneCountByID($L["id"])); ?>

                </td>
                <?php else: ?>
                <td align="center">0</td><?php endif; ?>
                <!-- <td><?php echo ($L["ordertype"]); ?></td> -->

                 <?php if($L["status"] == 1): ?><td align="center"  style="color:red;"><?php echo (showOrderStatus($L["status"])); ?></td>
                <?php else: ?>
                 <td align="center" style="color:green;"><?php echo (showOrderStatus($L["status"])); ?></td><?php endif; ?>

                <!-- <td align="center"><?php echo (getClientName($L["uid"])); ?></td> -->
                <!-- <td align="center"><?php echo (getClientCompany($L["uid"])); ?></td> -->
                <?php if($L["excelurl"] == ''): ?><td align="center" style="white-space:nowrap;">
                	在线填写

                </td>
                <?php else: ?>
                <td align="center" style="white-space:nowrap;">
                	 上传excel表单

                </td><?php endif; ?>
                <?php if($L["ordertype"] == 1): ?><td align="center"><a href="<?php echo U('Index/info','id='.$L['id']);?>" 
					title="点击查看详情">详情</a></td>
				<td align="center">
         <?php if(($L["synthesis"]) == "1"): ?>&nbsp;<?php endif; ?>
          <?php if(($L["synthesis"]) == "2"): ?>已收到<?php endif; ?>
           <?php if(($L["synthesis"]) == "3"): ?>已合成<?php endif; ?>
            <?php if(($L["synthesis"]) == "4"): ?>已取消<?php endif; ?>
             <?php if(($L["synthesis"]) == "5"): ?>已完成<?php endif; ?>
              <?php if(($L["synthesis"]) == "6"): ?>已发货<?php endif; ?>
               <?php if(($L["synthesis"]) == "7"): ?>已终止<?php endif; ?>
          
        </td>
                <td align="center">
                  
 <a href="javascript:if(window.confirm('您确定要执行删除操作码？')){window.location='<?php echo U('Index/del_order',array('id'=>$L['id']));?>'}" title="点击删除" style="text-decoration:none;">删除</a>                  
                  <!-- <a href="<?php echo U('Index/del_order','id='.$L['id']);?>" 
					title="点击删除">删除</a> -->
        </td>
                <td align="center">
                  <a href="http://www.kuaidi100.com/all/sf.shtml?from=openv" target="_blank" style="color:red;">顺丰快递</a>
                </td>

                <td align="center">

                      <?php if(($L["status"]) == "2"): if((getStatus_b($L["id"])) == "2"): ?><a  href="<?php echo U('Index/info','id='.$L['id']);?>"
                    title="点击查看详情" style="color:green;">暂无信息 </a><?php endif; ?>
                   
                  <?php if((getStatus_b($L["id"])) == "1"): ?><a  href="<?php echo U('Index/info','id='.$L['id']);?>"
                    title="点击查看详情" style="color:red;">新信息 </a><?php endif; ?>
                    
                   <?php if((getStatus_b($L["id"])) == ""): ?><a  href="<?php echo U('Index/info','id='.$L['id']);?>"
                    title="点击查看详情" style="color:green;">暂无信息 </a><?php endif; ?>

                  <?php else: ?>
                   暂无信息<?php endif; ?>


                </td>


				<?php elseif($L["ordertype"] == 2): ?>
				<td align="center"><a href="<?php echo U('Primer/info','id='.$L['id']);?>"
					title="点击查看详情">详情</a></td>
				<td align="center">
            <?php if(($L["synthesis"]) == "1"): ?>&nbsp;<?php endif; ?>
          <?php if(($L["synthesis"]) == "2"): ?>已收到<?php endif; ?>
           <?php if(($L["synthesis"]) == "3"): ?>已合成<?php endif; ?>
            <?php if(($L["synthesis"]) == "4"): ?>已取消<?php endif; ?>
             <?php if(($L["synthesis"]) == "5"): ?>已完成<?php endif; ?>
              <?php if(($L["synthesis"]) == "6"): ?>已发货<?php endif; ?>
               <?php if(($L["synthesis"]) == "7"): ?>已终止<?php endif; ?>
        
        </td>
                <td align="center">

    <a href="javascript:if(window.confirm('您确定要执行删除操作码？')){window.location='<?php echo U('Primer/del_order',array('id'=>$L['id']));?>'}" title="点击删除" style="text-decoration:none;">删除</a>            
                <!--   <a href="<?php echo U('Primer/del_order','id='.$L['id']);?>"
					title="点击删除">删除</a> -->
        </td>
                <td align="center">
                  <a href="http://www.kuaidi100.com/all/sf.shtml?from=openv" target="_blank" style="color:red;">顺丰快递</a>
                </td>
                <td align="center">

                    <?php if(($L["status"]) == "2"): if((getStatus_a($L["id"])) == "2"): ?><a  href="<?php echo U('Primer/info','id='.$L['id']);?>"
                    title="点击查看详情" style="color:green;">暂无信息 </a><?php endif; ?>
                   
                  <?php if((getStatus_a($L["id"])) == "1"): ?><a  href="<?php echo U('Primer/info','id='.$L['id']);?>"
                    title="点击查看详情" style="color:red;">新信息 </a><?php endif; ?>
                    
                   <?php if((getStatus_a($L["id"])) == ""): ?><a  href="<?php echo U('Primer/info','id='.$L['id']);?>"
                    title="点击查看详情" style="color:green;">暂无信息 </a><?php endif; ?>
                   
                   <?php else: ?>
                   暂无信息<?php endif; ?>

                </td>

                <?php elseif($L["ordertype"] == 3): ?>
				<td align="center">
                    <?php if(($L["status"]) == "1"): ?><a href="<?php echo U('Gene/guodu','id='.$L['id']);?>"
					title="点击查看详情">详情</a><?php endif; ?>

                    <?php if(($L["status"]) == "2"): ?><a href="<?php echo U('Gene/info','id='.$L['id']);?>"
                    title="点击查看详情">详情</a><?php endif; ?>
                   

                </td>

				<td align="center">
       <?php if(($L["synthesis"]) == "1"): ?>&nbsp;<?php endif; ?>
          <?php if(($L["synthesis"]) == "2"): ?>已收到<?php endif; ?>
           <?php if(($L["synthesis"]) == "3"): ?>已合成<?php endif; ?>
            <?php if(($L["synthesis"]) == "4"): ?>已取消<?php endif; ?>
             <?php if(($L["synthesis"]) == "5"): ?>已完成<?php endif; ?>
              <?php if(($L["synthesis"]) == "6"): ?>已发货<?php endif; ?>
               <?php if(($L["synthesis"]) == "7"): ?>已终止<?php endif; ?>
        </td>

                <td align="center">

        <a href="javascript:if(window.confirm('您确定要执行删除操作码？')){window.location='<?php echo U('Gene/del_order',array('id'=>$L['id']));?>'}" title="点击删除" style="text-decoration:none;">删除</a> 

         <!--  <a href="<?php echo U('Gene/del_order','id='.$L['id']);?>"
					     title="点击删除">删除</a>
 -->
        </td>
                <td align="center">
                  <a href="http://www.kuaidi100.com/all/sf.shtml?from=openv" target="_blank" style="color:red;">顺丰快递</a>
                </td>

                <td align="center">

                   <?php if(($L["status"]) == "2"): if((getStatus($L["id"])) == "2"): ?><a href="<?php echo U('Gene/info','id='.$L['id']);?>"
                    title="点击查看详情" style="color:green;">暂无信息</a><?php endif; ?>
                  <?php if((getStatus($L["id"])) == "1"): ?><a href="<?php echo U('Gene/info','id='.$L['id']);?>"
                    title="点击查看详情" style="color:red;">新信息 </a><?php endif; ?>
                  <?php if((getStatus($L["id"])) == ""): ?><a href="<?php echo U('Gene/info','id='.$L['id']);?>"
                    title="点击查看详情" style="color:green;">暂无信息</a><?php endif; ?>

                  <?php else: ?>
                  暂无信息<?php endif; ?>
                    
                </td>

                <?php elseif($L["ordertype"] == 4): ?>
				<td align="center">

          <?php if(($L["status"]) == "1"): ?><a href="<?php echo U('Clone/guodu','id='.$L['id']);?>"
          title="点击查看详情">详情</a><?php endif; ?>

                    <?php if(($L["status"]) == "2"): ?><a href="<?php echo U('Clone/info','id='.$L['id']);?>"
                    title="点击查看详情">详情</a><?php endif; ?>

         <!--  <a href="<?php echo U('Clone/info','id='.$L['id']);?>"
					title="点击查看详情">详情</a> -->

        </td>
				<td align="center">
          <?php if(($L["synthesis"]) == "1"): ?>&nbsp;<?php endif; ?>
          <?php if(($L["synthesis"]) == "2"): ?>已收到<?php endif; ?>
           <?php if(($L["synthesis"]) == "3"): ?>已合成<?php endif; ?>
            <?php if(($L["synthesis"]) == "4"): ?>已取消<?php endif; ?>
             <?php if(($L["synthesis"]) == "5"): ?>已完成<?php endif; ?>
              <?php if(($L["synthesis"]) == "6"): ?>已发货<?php endif; ?>
               <?php if(($L["synthesis"]) == "7"): ?>已终止<?php endif; ?>
        </td>
                <td align="center">
   <a href="javascript:if(window.confirm('您确定要执行删除操作码？')){window.location='<?php echo U('Clone/del_order',array('id'=>$L['id']));?>'}" title="点击删除" style="text-decoration:none;">删除</a> 
       
                 <!--  <a href="<?php echo U('Clone/del_order','id='.$L['id']);?>"
					title="点击删除">删除</a> -->

        </td>
                <td align="center">
                  <a href="http://www.kuaidi100.com/all/sf.shtml?from=openv" target="_blank" style="color:red;">顺丰快递</a>
                </td>
                <td align="center">
                   <?php if(($L["status"]) == "2"): if((getStatus_c($L["id"])) == "2"): ?><a href="<?php echo U('Clone/info','id='.$L['id']);?>"
                    title="点击查看详情" style="color:green;">暂无信息</a><?php endif; ?>
                  <?php if((getStatus_c($L["id"])) == "1"): ?><a href="<?php echo U('Clone/info','id='.$L['id']);?>"
                    title="点击查看详情" style="color:red;">新信息 </a><?php endif; ?>
                  <?php if((getStatus_c($L["id"])) == ""): ?><a href="<?php echo U('Clone/info','id='.$L['id']);?>"
                    title="点击查看详情" style="color:green;">暂无信息</a><?php endif; ?>

                  <?php else: ?>
                    暂无信息<?php endif; ?>

                </td>

                <?php elseif($L["ordertype"] == 5): ?>

				<td align="center">

            <?php if(($L["status"]) == "1"): ?><a href="<?php echo U('Server/guodu','id='.$L['id']);?>"
          title="点击查看详情">详情</a><?php endif; ?>

                    <?php if(($L["status"]) == "2"): ?><a href="<?php echo U('Server/info','id='.$L['id']);?>"
                    title="点击查看详情">详情</a><?php endif; ?>


        </td>
				<td align="center">
         <?php if(($L["synthesis"]) == "1"): ?>&nbsp;<?php endif; ?>
          <?php if(($L["synthesis"]) == "2"): ?>已收到<?php endif; ?>
           <?php if(($L["synthesis"]) == "3"): ?>已合成<?php endif; ?>
            <?php if(($L["synthesis"]) == "4"): ?>已取消<?php endif; ?>
             <?php if(($L["synthesis"]) == "5"): ?>已完成<?php endif; ?>
              <?php if(($L["synthesis"]) == "6"): ?>已发货<?php endif; ?>
               <?php if(($L["synthesis"]) == "7"): ?>已终止<?php endif; ?>

        </td>
                <td align="center">

      <a href="javascript:if(window.confirm('您确定要执行删除操作码？')){window.location='<?php echo U('Server/del_order',array('id'=>$L['id']));?>'}" title="点击删除" style="text-decoration:none;">删除</a>              


       <!--  <a href="<?php echo U('Server/del_order','id='.$L['id']);?>"
					title="点击删除">删除</a>
 -->
        </td>
                <td align="center">
                  <a href="http://www.kuaidi100.com/all/sf.shtml?from=openv" target="_blank" style="color:red;">顺丰快递</a>
                </td>
               <td align="center"> 
                <?php if(($L["status"]) == "2"): if((getStatus_d($L["id"])) == "2"): ?><a href="<?php echo U('Server/info','id='.$L['id']);?>"
                    title="点击查看详情" style="color:green;">暂无信息</a><?php endif; ?>
                  <?php if((getStatus_d($L["id"])) == "1"): ?><a href="<?php echo U('Server/info','id='.$L['id']);?>"
                    title="点击查看详情" style="color:red;">新信息 </a><?php endif; ?>
                  <?php if((getStatus_d($L["id"])) == ""): ?><a href="<?php echo U('Server/info','id='.$L['id']);?>"
                    title="点击查看详情" style="color:green;">暂无信息</a><?php endif; ?>

                  <?php else: ?>
                   暂无信息<?php endif; ?>


               </td>

                <?php else: ?>

				<td align="center">

            <?php if(($L["status"]) == "1"): ?><a href="<?php echo U('Zhili/guodu','id='.$L['id']);?>"
          title="点击查看详情">详情</a><?php endif; ?>

                    <?php if(($L["status"]) == "2"): ?><a href="<?php echo U('Zhili/info','id='.$L['id']);?>"
                    title="点击查看详情">详情</a><?php endif; ?>

          <!-- <a href="<?php echo U('Zhili/info','id='.$L['id']);?>"
					title="点击查看详情">详情</a> -->

        </td>
				<td align="center">
          <?php if(($L["synthesis"]) == "1"): ?>&nbsp;<?php endif; ?>
          <?php if(($L["synthesis"]) == "2"): ?>已收到<?php endif; ?>
           <?php if(($L["synthesis"]) == "3"): ?>已合成<?php endif; ?>
            <?php if(($L["synthesis"]) == "4"): ?>已取消<?php endif; ?>
             <?php if(($L["synthesis"]) == "5"): ?>已完成<?php endif; ?>
              <?php if(($L["synthesis"]) == "6"): ?>已发货<?php endif; ?>
               <?php if(($L["synthesis"]) == "7"): ?>已终止<?php endif; ?>
        </td>

        <td align="center"><a href="<?php echo U('Zhili/del_order','id='.$L['id']);?>"
					   title="点击删除">删除</a>
        </td>
                <td align="center">
                   <a href="http://www.kuaidi100.com/all/sf.shtml?from=openv" target="_blank" style="color:red;">顺丰快递</a>
                </td>
                <td align="center"> 

                   <?php if(($L["status"]) == "2"): if((getStatus_e($L["id"])) == "2"): ?><a href="<?php echo U('Zhili/info','id='.$L['id']);?>"
                    title="点击查看详情" style="color:green;">暂无信息</a><?php endif; ?>
                  <?php if((getStatus_e($L["id"])) == "1"): ?><a href="<?php echo U('Zhili/info','id='.$L['id']);?>"
                    title="点击查看详情" style="color:red;">新信息 </a><?php endif; ?>
                  <?php if((getStatus_e($L["id"])) == ""): ?><a href="<?php echo U('Zhili/info','id='.$L['id']);?>"
                    title="点击查看详情" style="color:green;">暂无信息</a><?php endif; ?>

                  <?php else: ?>
                   暂无信息<?php endif; ?>
                
                </td><?php endif; ?>
                
			</tr><?php endforeach; endif; ?>
		</table>
        </div>
        <br/>

		<div style="margin-bottom:50px;margin-top:20px;">

      <?php if($page != 1): ?><a id="pre" data="<?php echo ($page-1); ?>" href="javascript:;">上一页</a><?php endif; ?>
      <?php if(count($list) == $pageNum): ?><a id="next" data="<?php echo ($page+1); ?>" href="javascript:;">下一页</a><?php endif; ?>

  </div>

	</div>
</div>
</body>
</html>