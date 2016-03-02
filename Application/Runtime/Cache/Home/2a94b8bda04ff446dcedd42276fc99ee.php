<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
<style type="text/css">
  /*  table tr td{
        text-align:center;
    }*/
</style>
<!-- logo--导航菜单 结束 -->
<div class="clear"></div>
<div id="main">
	<div class="maincon">
		<div class="lleft">
            <div class="con-div">
                <div class="bg-cs">
                	<span class="divider fs18"><a href="#" target="_blank">&nbsp;&nbsp;&nbsp;&nbsp;项目分类</a></span>
				</div>
                
            </div>
            
            <div id="product_l">
                <ul id="ul-type">
                    <li id="n01"><span ></span><a href="<?php echo U('Index/list_more/');?>">测序订单</a></li>
                    <li id="n02"><span></span><a href="<?php echo U('Primer/list_more/');?>">引物订单</a></li>
                    <li id="n03"><span></span><a href="<?php echo U('Gene/list_more/');?>">基因合成订单</a></li>
                  <!--  <li id="n04"><span></span><a href="<?php echo U('Clone/Create/');?>">PCR克隆及亚克隆</a></li> 
                    <li id="n05"><span></span><a href="<?php echo U('Server/Create/');?>">突变服务</a></li>
                    <li id="n06"><span></span><a href="<?php echo U('Zhili/Create/');?>">质粒制备</a></li>  --> 
                    <li id="n04"><span></span><a href="<?php echo U('Pro/fen_more/',array('type'=>1));?>">综合服务</a></li>
                    <li id="n05"><span></span><a href="<?php echo U('Pro/fen_more/',array('type'=>2));?>">蛋白组学</a></li>
                    <li id="n06"><span></span><a href="<?php echo U('Pro/fen_more/',array('type'=>3));?>">蛋白及抗体</a></li>
                    <li id="n07"><span></span><a href="<?php echo U('Pro/fen_more/',array('type'=>4));?>">分子生物学服务</a></li>
                    <li id="n08"><span></span><a href="<?php echo U('Pro/fen_more/',array('type'=>5));?>">病毒包装及检测服务</a></li>
                    <li id="n09"><span></span><a href="<?php echo U('Pro/fen_more/',array('type'=>6));?>">小分子抗原及ElisA开发</a></li>
                            
                    
				</ul>
			</div>
		</div>
        <div class="rright">
        	<div class="bg-cs01">
            	<span class="divider fs18">&nbsp;&nbsp;&nbsp;&nbsp;订单信息和状态</span>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:red;font-style:italic;">(温馨提示：可以点击"订单号"查看该订单的详情信息！)</span>
            </div>
            <div class="news_con">

            	<div class="lianxi_con" style="">
                    <div class="bread" style="margin-left:-10px;">
                        测序订单相关信息&nbsp;&nbsp;<a href="<?php echo U('Index/list_more');?>" class="more_link" style="color:green;text-decoration:underline;" title="点击查看更多测序订单信息">More+</a>
                       <!--  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:red;font-style:italic;">(温馨提示：可以点击"流水号"查看该订单的详情信息！)</span> -->
                    </div>
                    <table width="100%"  cellspacing="1" cellpadding="1" border="0">
                        <tr align="center">
                            <td style="background-color:#008C00; color:white;text-align:center;">订单日期</th>

                            <td style="background-color:#008C00; color:white;text-align:center;">订单号</th>

                            <td style="background-color:#008C00; color:white;text-align:center;">订单类型</th>

                            <td style="background-color:#008C00; color:white;text-align:center;">反应数</th>

                            <td style="background-color:#008C00; color:white;text-align:center;">碱基数</th>

                            <td style="background-color:#008C00; color:white;text-align:center;">订单状态</th>

                            <td style="background-color:#008C00; color:white;text-align:center;">合成状态</th>

                            <td style="background-color:#008C00; color:white;text-align:center;">快递单号</th>
                        </tr>
                        <?php if(is_array($orderList)): foreach($orderList as $key=>$OL): ?><tr align="center">
                            <td style="text-align:center;"><?php echo (date('Y-m-d',$OL["addtime"])); ?></td>
                            <?php if($OL['ordertype'] == 1): ?><td style="text-align:center;"><a href="<?php echo U("Index/info");?>?id=<?php echo ($OL["id"]); ?>">
                                <?php echo ($OL["code"]); ?></a></td>

							<?php elseif($OL['ordertype'] == 2): ?>
							<td style="text-align:center;"><a href="<?php echo U("Primer/info");?>?id=<?php echo ($OL["id"]); ?>">
                                <?php echo ($OL["code"]); ?></a></td>
                             <?php elseif($OL['ordertype'] == 3): ?>  
                                <td style="text-align:center;">
                                    <?php if(($OL["status"]) == "1"): ?><a href="<?php echo U("Gene/guodu");?>?id=<?php echo ($OL["id"]); ?>">
                                <?php echo ($OL["code"]); ?></a>
                                <?php else: ?>
                                <a href="<?php echo U("Gene/info");?>?id=<?php echo ($OL["id"]); ?>">
                                <?php echo ($OL["code"]); ?></a><?php endif; ?>
                            </td> 
                            <?php elseif($OL['ordertype'] == 4): ?>  
                            <td style="text-align:center;"><a href="<?php echo U("Clone/info");?>?id=<?php echo ($OL["id"]); ?>">
                            <?php echo ($OL["code"]); ?></a></td> 
                            <?php elseif($OL['ordertype'] == 5): ?>  
                                <td style="text-align:center;"><a href="<?php echo U("Server/info");?>?id=<?php echo ($OL["id"]); ?>">
                                <?php echo ($OL["code"]); ?></a></td> 
                            <?php elseif($OL['ordertype'] == 6): ?>       
                                <td style="text-align:center;"><a href="<?php echo U("Zhili/info");?>?id=<?php echo ($OL["id"]); ?>">
                                <?php echo ($OL["code"]); ?></a></td><?php endif; ?>
                           <!--   <td><?php echo ($OL["ordertype"]); ?></td> -->
                             
                            <td style="text-align:center;"><?php echo (showOrderType($OL["ordertype"])); ?></td>
                           </if>

                          
                            
                            
                              <td style="text-align:center;">
                                <?php echo ($OL["num_yinwu"]); ?>
                            </td>
                            

                             <?php if($OL['ordertype'] == 1): ?><td style="text-align:center;">
                              <!--   <?php echo (getSequencingCountByID($OL["id"])); ?> -->
                            </td>
                            <?php elseif($OL['ordertype'] == 2): ?>
							<td style="text-align:center;"><?php echo (getPrimersCountByID($OL["id"])); ?></td>
                            <?php elseif($OL['ordertype'] == 3): ?>
                             <td style="text-align:center;">
                                 <?php echo (getGeneCountByID($OL["id"])); ?>
                            </td>
                            <?php else: ?>
                            <td style="text-align:center;">0</td><?php endif; ?>
                          
                            <td align="center" style="text-align:center;"><?php echo (showOrderStatus($OL["status"])); ?></td>

                              <td style="text-align:center;"><?php echo (getPrimerSynthesis($OL["synthesis"])); ?></td>

                             <td align="center" style="text-align:center;">
                                <?php if(empty($OL["num"])): ?>暂无信息
                                    <?php else: ?>
                                     <span style="color:red;"><?php echo ($OL["num"]); ?></span><?php endif; ?>
                            </td>
                        </tr><?php endforeach; endif; ?>
                    </table>
            	</div>
               <!--  <hr/> -->
                <!-- a开始 -->
                <div class="lianxi_con" style="margin-top:50px;">
                    <div class="bread" style="margin-left:-10px;">引物订单相关信息&nbsp;&nbsp;
                        <a href="<?php echo U('Primer/list_more');?>" class="more_link" style="color:green;text-decoration:underline;" title="点击查看更多引物订单信息">More+</a>
                        <!-- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:red;font-style:italic;">(温馨提示：可以点击"流水号"查看该订单的详情信息！)</span> -->
                    </div>
                    <table width="100%"  cellspacing="1" cellpadding="1" border="0">
                        <tr align="center">
                             
                            <td style="background-color:#008C00; color:white;text-align:center;">订单日期</th>

                            <td style="background-color:#008C00; color:white;text-align:center;">订单号</th>

                            <td style="background-color:#008C00; color:white;text-align:center;">订单类型</th>

                            <td style="background-color:#008C00; color:white;text-align:center;">引物数</th>

                            <td style="background-color:#008C00; color:white;text-align:center;">碱基数</th>

                            <td style="background-color:#008C00; color:white;text-align:center;">订单状态</th>

                            <td style="background-color:#008C00; color:white;text-align:center;">合成状态</th>

                            <td style="background-color:#008C00; color:white;text-align:center;">快递单号</th>

                        </tr>
                        <?php if(is_array($orderList_a)): foreach($orderList_a as $key=>$OL): ?><tr align="center">
                            <td style="text-align:center;"><?php echo (date('Y-m-d',$OL["addtime"])); ?></td>
                            <?php if($OL['ordertype'] == 1): ?><td style="text-align:center;"><a href="<?php echo U("Index/info");?>?id=<?php echo ($OL["id"]); ?>">
                                <?php echo ($OL["code_yw"]); ?></a></td>

                            <?php elseif($OL['ordertype'] == 2): ?>
                            <td style="text-align:center;">
                                <a href="<?php echo U("Primer/info");?>?id=<?php echo ($OL["id"]); ?>">
                                <?php echo ($OL["code_yw"]); ?></a>
                            </td>
                             <?php elseif($OL['ordertype'] == 3): ?>  
                                <td style="text-align:center;">
                                    <?php if(($OL["status"]) == "1"): ?><a href="<?php echo U("Gene/guodu");?>?id=<?php echo ($OL["id"]); ?>">
                                <?php echo ($OL["code"]); ?></a>
                                <?php else: ?>
                                <a href="<?php echo U("Gene/info");?>?id=<?php echo ($OL["id"]); ?>">
                                <?php echo ($OL["code"]); ?></a><?php endif; ?>
                            </td> 
                            <?php elseif($OL['ordertype'] == 4): ?>  
                            <td style="text-align:center;"><a href="<?php echo U("Clone/info");?>?id=<?php echo ($OL["id"]); ?>">
                            <?php echo ($OL["code"]); ?></a></td> 
                            <?php elseif($OL['ordertype'] == 5): ?>  
                                <td style="text-align:center;"><a href="<?php echo U("Server/info");?>?id=<?php echo ($OL["id"]); ?>">
                                <?php echo ($OL["code"]); ?></a></td> 
                            <?php elseif($OL['ordertype'] == 6): ?>       
                                <td style="text-align:center;"><a href="<?php echo U("Zhili/info");?>?id=<?php echo ($OL["id"]); ?>">
                                <?php echo ($OL["code"]); ?></a></td><?php endif; ?>
                           <!--   <td><?php echo ($OL["ordertype"]); ?></td> -->
                             
                            <td style="text-align:center;"><?php echo (showOrderType($OL["ordertype"])); ?></td>
                           </if>

                          
                            
                            
                              <td style="text-align:center;">
                                <?php echo ($OL["num_yinwu"]); ?>
                            </td>
                            

                             <?php if($OL['ordertype'] == 1): ?><td style="text-align:center;">
                              <!--   <?php echo (getSequencingCountByID($OL["id"])); ?> -->
                            </td>
                            <?php elseif($OL['ordertype'] == 2): ?>
                            <td style="text-align:center;"><?php echo (getPrimersCountByID($OL["id"])); ?></td>
                            <?php elseif($OL['ordertype'] == 3): ?>
                             <td style="text-align:center;">
                                 <?php echo (getGeneCountByID($OL["id"])); ?>
                            </td>
                            <?php else: ?>
                            <td style="text-align:center;">0</td><?php endif; ?>
                          
                            <td align="center" style="text-align:center;"><?php echo (showOrderStatus($OL["status"])); ?></td>
                              <td style="text-align:center;"><?php echo (getPrimerSynthesis($OL["synthesis"])); ?></td>
                            <td align="center" style="text-align:center;">
                                <?php if(empty($OL["num"])): ?>暂无信息
                                    <?php else: ?>
                                     <span style="color:red;"><?php echo ($OL["num"]); ?></span><?php endif; ?>
                            </td>
                        </tr><?php endforeach; endif; ?>
                    </table>
                </div>
                <!-- a结束 -->
               <!--  <hr/> -->
                <!-- b开始 -->
                <div class="lianxi_con"  style="margin-top:50px;">
                    <div class="bread" style="margin-left:-10px;">基因订单相关信息&nbsp;&nbsp;
                        <a href="<?php echo U('Gene/list_more');?>" class="more_link" style="color:green;text-decoration:underline;" title="点击查看更多基因订单信息">More+</a>
                       <!--  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:red;font-style:italic;">(温馨提示：可以点击"流水号"查看该订单的详情信息！)</span> -->
                    </div>
                    <table width="100%"  cellspacing="1" cellpadding="1" border="0">
                        <tr align="center">
                            
                            <td style="background-color:#008C00; color:white;text-align:center;">订单日期</th>

                            <td style="background-color:#008C00; color:white;text-align:center;">订单号</th>

                            <td style="background-color:#008C00; color:white;text-align:center;">订单类型</th>

                            <td style="background-color:#008C00; color:white;text-align:center;">引物数</th>

                            <td style="background-color:#008C00; color:white;text-align:center;">碱基数</th>

                            <td style="background-color:#008C00; color:white;text-align:center;">订单状态</th>

                            <td style="background-color:#008C00; color:white;text-align:center;">合成状态</th>

                            <td style="background-color:#008C00; color:white;text-align:center;">快递单号</th>

                        </tr>
                        <?php if(is_array($orderList_b)): foreach($orderList_b as $key=>$OL): ?><tr align="center">
                            <td style="text-align:center;"><?php echo (date('Y-m-d',$OL["addtime"])); ?></td>
                            <?php if($OL['ordertype'] == 1): ?><td style="text-align:center;"><a href="<?php echo U("Index/info");?>?id=<?php echo ($OL["id"]); ?>">
                                <?php echo ($OL["code_yw"]); ?></a></td>

                            <?php elseif($OL['ordertype'] == 2): ?>
                            <td style="text-align:center;"><a href="<?php echo U("Primer/info");?>?id=<?php echo ($OL["id"]); ?>">
                                <?php echo ($OL["code_yw"]); ?></a></td>
                             <?php elseif($OL['ordertype'] == 3): ?>  
                                <td style="text-align:center;">
                                    <?php if(($OL["status"]) == "1"): ?><a href="<?php echo U("Gene/guodu");?>?id=<?php echo ($OL["id"]); ?>&can=0">
                                <?php echo ($OL["code_yw"]); ?></a>
                                <?php else: ?>
                                <a href="<?php echo U("Gene/info");?>?id=<?php echo ($OL["id"]); ?>">
                                <?php echo ($OL["code_yw"]); ?></a><?php endif; ?>
                            </td> 
                            <?php elseif($OL['ordertype'] == 4): ?>  
                            <td style="text-align:center;"><a href="<?php echo U("Clone/info");?>?id=<?php echo ($OL["id"]); ?>">
                            <?php echo ($OL["code"]); ?></a></td> 
                            <?php elseif($OL['ordertype'] == 5): ?>  
                                <td style="text-align:center;"><a href="<?php echo U("Server/info");?>?id=<?php echo ($OL["id"]); ?>">
                                <?php echo ($OL["code"]); ?></a></td> 
                            <?php elseif($OL['ordertype'] == 6): ?>       
                                <td style="text-align:center;"><a href="<?php echo U("Zhili/info");?>?id=<?php echo ($OL["id"]); ?>">
                                <?php echo ($OL["code"]); ?></a></td><?php endif; ?>
                           <!--   <td><?php echo ($OL["ordertype"]); ?></td> -->
                             
                            <td style="text-align:center;"><?php echo (showOrderType($OL["ordertype"])); ?></td>
                           </if>

                          
                            
                            
                              <td style="text-align:center;">
                                <?php echo ($OL["num_yinwu"]); ?>
                            </td>
                            

                             <?php if($OL['ordertype'] == 1): ?><td style="text-align:center;">
                              <!--   <?php echo (getSequencingCountByID($OL["id"])); ?> -->
                            </td>
                            <?php elseif($OL['ordertype'] == 2): ?>
                            <td style="text-align:center;"><?php echo (getPrimersCountByID($OL["id"])); ?></td>
                            <?php elseif($OL['ordertype'] == 3): ?>
                             <td style="text-align:center;">
                                 <?php echo (getGeneCountByID($OL["id"])); ?>
                                 <!-- aaa -->
                            </td>
                            <?php else: ?>
                            <td style="text-align:center;">0</td><?php endif; ?>
                          
                            <td align="center" style="text-align:center;"><?php echo (showOrderStatus($OL["status"])); ?></td>

                              <td style="text-align:center;">
                                <?php echo (getPrimerSynthesis($OL["synthesis"])); ?>
                                 <!-- <?php echo ($OL["sythesis"]); ?> -->
                            </td>

                             <td align="center" style="text-align:center;">
                                <?php if(empty($OL["num"])): ?>暂无信息
                                    <?php else: ?>
                                    <span style="color:red;"><?php echo ($OL["num"]); ?></span><?php endif; ?>
                            </td>
                        </tr><?php endforeach; endif; ?>
                    </table>
                </div>
                <!-- b结束 -->

                 <!-- c开始 -->
                 <!--
                <div class="lianxi_con"  style="margin-top:50px;">
                    <div class="bread" style="margin-left:-10px;">PCR克隆及亚克隆订单相关信息&nbsp;&nbsp;<a href="" class="more_link" style="color:green;text-decoration:underline;" title="点击查看更多PCR克隆及亚克隆订单信息">More+</a>
                        
                    </div>
                    <table width="100%"  style="border-collapse:collapse;" border="1">
                        <tr align="center">
                            <th>订单日期</th>
                            <th>订单号</th>
                            <th>订单类型</th>
                            <th>项目描述</th>
                            <th>引物数</th>
                            <th>碱基数</th>
                            <th>订单状态</th>
                            <th>快递单号</th>
                        </tr>
                        <?php if(is_array($orderList_c)): foreach($orderList_c as $key=>$OL): ?><tr align="center">
                            <td style="text-align:center;"><?php echo (date('Y-m-d',$OL["addtime"])); ?></td>
                            <?php if($OL['ordertype'] == 1): ?><td style="text-align:center;"><a href="<?php echo U("Index/info");?>?id=<?php echo ($OL["id"]); ?>">
                                <?php echo ($OL["code"]); ?></a></td>

                            <?php elseif($OL['ordertype'] == 2): ?>
                            <td style="text-align:center;"><a href="<?php echo U("Primer/info");?>?id=<?php echo ($OL["id"]); ?>">
                                <?php echo ($OL["code"]); ?></a></td>
                             <?php elseif($OL['ordertype'] == 3): ?>  
                                <td style="text-align:center;">
                                    <?php if(($OL["status"]) == "1"): ?><a href="<?php echo U("Gene/guodu");?>?id=<?php echo ($OL["id"]); ?>">
                                <?php echo ($OL["code"]); ?></a>
                                <?php else: ?>
                                <a href="<?php echo U("Gene/info");?>?id=<?php echo ($OL["id"]); ?>">
                                <?php echo ($OL["code"]); ?></a><?php endif; ?>
                            </td> 
                            <?php elseif($OL['ordertype'] == 4): ?>  

                            <td style="text-align:center;">
                                <?php if(($OL["status"]) == "1"): ?><a href="<?php echo U("Clone/guodu");?>?id=<?php echo ($OL["id"]); ?>">
                                <?php echo ($OL["code"]); ?>
                                </a>
                                <?php else: ?>
                                 <a href="<?php echo U("Clone/info");?>?id=<?php echo ($OL["id"]); ?>">
                                  <?php echo ($OL["code"]); ?>
                                 </a><?php endif; ?>

                           </td> 

                            <?php elseif($OL['ordertype'] == 5): ?>  
                                <td style="text-align:center;"><a href="<?php echo U("Server/info");?>?id=<?php echo ($OL["id"]); ?>">
                                <?php echo ($OL["code"]); ?></a></td> 
                            <?php elseif($OL['ordertype'] == 6): ?>       
                                <td style="text-align:center;"><a href="<?php echo U("Zhili/info");?>?id=<?php echo ($OL["id"]); ?>">
                                <?php echo ($OL["code"]); ?></a></td><?php endif; ?>
                           
                             
                            <td style="text-align:center;"><?php echo (showOrderType($OL["ordertype"])); ?></td>
                           </if>

                            <td style="text-align:center;"><?php echo ($OL["description"]); ?></td>
                            
                            
                              <td style="text-align:center;">
                                <?php echo ($OL["num_yinwu"]); ?>
                            </td>
                            

                             <?php if($OL['ordertype'] == 1): ?><td style="text-align:center;">
                              
                            </td>
                            <?php elseif($OL['ordertype'] == 2): ?>
                            <td style="text-align:center;"><?php echo (getPrimersCountByID($OL["id"])); ?></td>
                            <?php elseif($OL['ordertype'] == 3): ?>
                             <td style="text-align:center;">
                                 <?php echo (getGeneCountByID($OL["id"])); ?>
                            </td>
                            <?php else: ?>
                            <td style="text-align:center;">0</td><?php endif; ?>
                          
                            <td align="center" style="text-align:center;"><?php echo (showOrderStatus($OL["status"])); ?></td>
                             <td align="center" style="text-align:center;">
                                <?php if(empty($OL["num"])): ?>暂无信息
                                    <?php else: ?>
                                    <?php echo ($OL["num"]); endif; ?>
                            </td>
                        </tr><?php endforeach; endif; ?>
                    </table>
                </div>
            -->
                <!-- c结束 -->

                 <!-- d开始 -->
                 <!--
                <div class="lianxi_con"  style="margin-top:50px;">
                    <div class="bread" style="margin-left:-10px;">基因突变订单相关信息&nbsp;&nbsp;<a href="" class="more_link" style="color:green;text-decoration:underline;" title="点击查看更多基因突变订单信息">More+</a>
                      
                    </div>
                    <table width="100%"  style="border-collapse:collapse;" border="1">
                        <tr align="center">
                            <th>订单日期</th>
                            <th>订单号</th>
                            <th>订单类型</th>
                            <th>项目描述</th>
                            <th>引物数</th>
                            <th>碱基数</th>
                            <th>订单状态</th>
                            <th>快递单号</th>
                        </tr>
                        <?php if(is_array($orderList_d)): foreach($orderList_d as $key=>$OL): ?><tr align="center">
                            <td style="text-align:center;"><?php echo (date('Y-m-d',$OL["addtime"])); ?></td>
                            <?php if($OL['ordertype'] == 1): ?><td style="text-align:center;"><a href="<?php echo U("Index/info");?>?id=<?php echo ($OL["id"]); ?>">
                                <?php echo ($OL["code"]); ?></a></td>

                            <?php elseif($OL['ordertype'] == 2): ?>
                            <td style="text-align:center;"><a href="<?php echo U("Primer/info");?>?id=<?php echo ($OL["id"]); ?>">
                                <?php echo ($OL["code"]); ?></a></td>
                             <?php elseif($OL['ordertype'] == 3): ?>  
                                <td style="text-align:center;">
                                    <?php if(($OL["status"]) == "1"): ?><a href="<?php echo U("Gene/guodu");?>?id=<?php echo ($OL["id"]); ?>">
                                <?php echo ($OL["code"]); ?></a>
                                <?php else: ?>
                                <a href="<?php echo U("Gene/info");?>?id=<?php echo ($OL["id"]); ?>">
                                <?php echo ($OL["code"]); ?></a><?php endif; ?>
                            </td> 
                            <?php elseif($OL['ordertype'] == 4): ?>  

                            <td style="text-align:center;">
                                <?php if(($OL["status"]) == "1"): ?><a href="<?php echo U("Clone/guodu");?>?id=<?php echo ($OL["id"]); ?>">
                                <?php echo ($OL["code"]); ?>
                                </a>
                                <?php else: ?>
                                 <a href="<?php echo U("Clone/info");?>?id=<?php echo ($OL["id"]); ?>">
                                  <?php echo ($OL["code"]); ?>
                                 </a><?php endif; ?>

                           </td> 

                            <?php elseif($OL['ordertype'] == 5): ?>  
                                <td style="text-align:center;">
                                     <?php if(($OL["status"]) == "1"): ?><a href="<?php echo U("Server/guodu");?>?id=<?php echo ($OL["id"]); ?>">
                                      <?php echo ($OL["code"]); ?>
                                       </a>

                                      <?php else: ?>  
                                    <a href="<?php echo U("Server/info");?>?id=<?php echo ($OL["id"]); ?>">
                                      <?php echo ($OL["code"]); ?>
                                     </a><?php endif; ?>
                            </td> 
                            <?php elseif($OL['ordertype'] == 6): ?>       
                                <td style="text-align:center;"><a href="<?php echo U("Zhili/info");?>?id=<?php echo ($OL["id"]); ?>">
                                <?php echo ($OL["code"]); ?></a></td><?php endif; ?>
                           
                             
                            <td style="text-align:center;"><?php echo (showOrderType($OL["ordertype"])); ?></td>
                           </if>

                            <td style="text-align:center;"><?php echo ($OL["description"]); ?></td>
                            
                            
                              <td style="text-align:center;">
                                <?php echo ($OL["num_yinwu"]); ?>
                            </td>
                            

                             <?php if($OL['ordertype'] == 1): ?><td style="text-align:center;">
                            
                            </td>
                            <?php elseif($OL['ordertype'] == 2): ?>
                            <td style="text-align:center;"><?php echo (getPrimersCountByID($OL["id"])); ?></td>
                            <?php elseif($OL['ordertype'] == 3): ?>
                             <td style="text-align:center;">
                                 <?php echo (getGeneCountByID($OL["id"])); ?>
                            </td>
                            <?php else: ?>
                            <td style="text-align:center;">0</td><?php endif; ?>
                          
                            <td align="center" style="text-align:center;"><?php echo (showOrderStatus($OL["status"])); ?></td>

                             <td align="center" style="text-align:center;">
                                <?php if(empty($OL["num"])): ?>暂无信息
                                    <?php else: ?>
                                    <?php echo ($OL["num"]); endif; ?>
                            </td>
                        </tr><?php endforeach; endif; ?>
                    </table>
                </div>
            -->
                <!-- d结束 -->

                 <!-- e开始 -->
                <!--
                <div class="lianxi_con"  style="margin-top:50px;">
                    <div class="bread" style="margin-left:-10px;">质粒制备订单相关信息&nbsp;&nbsp;<a href="" class="more_link" style="color:green;text-decoration:underline;" title="点击查看更多质粒制备订单信息">More+</a>
                      
                    </div>
                    <table width="100%"  style="border-collapse:collapse;" border="1">
                        <tr align="center">
                            <th>订单日期</th>
                            <th>订单号</th>
                            <th>订单类型</th>
                            <th>项目描述</th>
                            <th>引物数</th>
                            <th>碱基数</th>
                            <th>订单状态</th>
                             <th>快递单号</th>
                        </tr>
                        <?php if(is_array($orderList_e)): foreach($orderList_e as $key=>$OL): ?><tr align="center">
                            <td style="text-align:center;"><?php echo (date('Y-m-d',$OL["addtime"])); ?></td>
                            <?php if($OL['ordertype'] == 1): ?><td style="text-align:center;"><a href="<?php echo U("Index/info");?>?id=<?php echo ($OL["id"]); ?>">
                                <?php echo ($OL["code"]); ?></a></td>

                            <?php elseif($OL['ordertype'] == 2): ?>
                            <td style="text-align:center;"><a href="<?php echo U("Primer/info");?>?id=<?php echo ($OL["id"]); ?>">
                                <?php echo ($OL["code"]); ?></a></td>
                             <?php elseif($OL['ordertype'] == 3): ?>  
                                <td style="text-align:center;">
                                    <?php if(($OL["status"]) == "1"): ?><a href="<?php echo U("Gene/guodu");?>?id=<?php echo ($OL["id"]); ?>">
                                <?php echo ($OL["code"]); ?></a>
                                <?php else: ?>
                                <a href="<?php echo U("Gene/info");?>?id=<?php echo ($OL["id"]); ?>">
                                <?php echo ($OL["code"]); ?></a><?php endif; ?>
                            </td> 
                            <?php elseif($OL['ordertype'] == 4): ?>  

                            <td style="text-align:center;">
                                <?php if(($OL["status"]) == "1"): ?><a href="<?php echo U("Clone/guodu");?>?id=<?php echo ($OL["id"]); ?>">
                                <?php echo ($OL["code"]); ?>
                                </a>
                                <?php else: ?>
                                 <a href="<?php echo U("Clone/info");?>?id=<?php echo ($OL["id"]); ?>">
                                  <?php echo ($OL["code"]); ?>
                                 </a><?php endif; ?>

                           </td> 

                            <?php elseif($OL['ordertype'] == 5): ?>  
                                <td style="text-align:center;">
                                     <?php if(($OL["status"]) == "1"): ?><a href="<?php echo U("Server/guodu");?>?id=<?php echo ($OL["id"]); ?>">
                                      <?php echo ($OL["code"]); ?>
                                       </a>

                                      <?php else: ?>  
                                    <a href="<?php echo U("Server/info");?>?id=<?php echo ($OL["id"]); ?>">
                                      <?php echo ($OL["code"]); ?>
                                     </a><?php endif; ?>
                            </td> 
                            <?php elseif($OL['ordertype'] == 6): ?>       
                                <td style="text-align:center;">

                                 <?php if(($OL["status"]) == "1"): ?><a href="<?php echo U("Zhili/guodu");?>?id=<?php echo ($OL["id"]); ?>">
                                      <?php echo ($OL["code"]); ?>
                                       </a>

                                      <?php else: ?>  
                                    <a href="<?php echo U("Zhili/info");?>?id=<?php echo ($OL["id"]); ?>">
                                      <?php echo ($OL["code"]); ?>
                                     </a><?php endif; ?>

                            </td><?php endif; ?>
                           
                             
                            <td style="text-align:center;"><?php echo (showOrderType($OL["ordertype"])); ?></td>
                           </if>

                            <td style="text-align:center;"><?php echo ($OL["description"]); ?></td>
                            
                            
                              <td style="text-align:center;">
                                <?php echo ($OL["num_yinwu"]); ?>
                            </td>
                            

                             <?php if($OL['ordertype'] == 1): ?><td style="text-align:center;">
                               
                            </td>
                            <?php elseif($OL['ordertype'] == 2): ?>
                            <td style="text-align:center;"><?php echo (getPrimersCountByID($OL["id"])); ?></td>
                            <?php elseif($OL['ordertype'] == 3): ?>
                             <td style="text-align:center;">
                                 <?php echo (getGeneCountByID($OL["id"])); ?>
                            </td>
                            <?php else: ?>
                            <td style="text-align:center;">0</td><?php endif; ?>
                          
                            <td align="center" style="text-align:center;"><?php echo (showOrderStatus($OL["status"])); ?></td>

                             <td align="center" style="text-align:center;">
                                <?php if(empty($OL["num"])): ?>暂无信息
                                    <?php else: ?>
                                    <?php echo ($OL["num"]); endif; ?>
                            </td>
                        </tr><?php endforeach; endif; ?>
                    </table>
                </div>
            -->
                <!-- e结束 -->






            </div>
			<?php if(!empty($resultList)): ?><div class="news_con">
            	<div class="nr">
                	<h1>最新的结果</h1>
				</div>
            	<div class="lianxi_con">
                    <table width="100%" cellspacing="1" cellpadding="1" border="0">
                        <tr>
                            <th>下单日期</th>
                            <th>订单号</th>
                            <th>订单类型</th>
                            <th>项目描述</th>
                            <th>反应/引物数</th>
                            <th>收费数</th>
                        </tr>
                        <?php if(is_array($resultList)): foreach($resultList as $key=>$RL): ?><tr>
                            <td><?php echo (date('Y-m-d',$RL["addtime"])); ?></td>
                            <?php if($RL['ordertype'] == 1): ?><td><a href="<?php echo U("Index/rsinfo");?>?id=<?php echo ($RL["id"]); ?>"><?php echo ($RL["code"]); ?></a></td>
							<?php else: ?>
							<td><a href="<?php echo U("Primer/rsinfo");?>?id=<?php echo ($RL["id"]); ?>"><?php echo ($RL["code"]); ?></a></td><?php endif; ?>
                            <td><?php echo (showOrderType($RL["ordertype"])); ?></td>
                            <td><?php echo ($RL["description"]); ?></td>
                             <?php if($RL['ordertype'] == 1): ?><td><?php echo (getSequencingCountByID($RL["id"])); ?></td>
							<?php else: ?>
							<td><?php echo (getPrimersCountByID($RL["id"])); ?></td><?php endif; ?>
                            <td><?php echo (showOrderStatus($RL["status"])); ?></td>
                        </tr><?php endforeach; endif; ?>
                    </table>
                </div>
            </div><?php endif; ?>
            <div class="news_con">
            	<div class="nr">
                	<h1>帮助信息</h1>
				</div>
            	<div class="problem">
                    <ul>
                        <li><a href="<?php echo U('Index/test_excel');?>" target="_self">测序订单格式 Execl下载</a></li>
                        <li><a href="<?php echo U('Primer/yinwu_excel');?>" target="_self">引物合成订单格式 Excel下载</a></li>
                    </ul>
                </div>
            </div>
		</div>
	</div>
</div>
</body>
<style>
    .lianxi_con{
        font-size:13px;
    }
    .more_link:hover{
    color:red;
   }
    a:hover{
    text-decoration:none;
  }
 </style>
</html>