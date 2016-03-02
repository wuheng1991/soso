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
<!-- <meta http-equiv="refresh" content="5;url=http://www.jkrorder.com/index.php/Home/Index/info.html?id=<?php echo ($orderInfo["id"]); ?>"/> -->
<!-- logo--导航菜单 结束 -->
<div class="clear"></div>
<div id="main">
	<div class="maincon">
        <div class="order_con">
        <div class="left">
        <div class="bread">客户信息</div>
        <table width="50%" cellspacing="0" cellpadding="0" border="0">
            <tr>
                <td width="120" align="left">姓 名：</td>
                <td width="300" style="border-bottom:#000 1px solid"><span id="lblUserName"><?php echo ($userInfo["name"]); ?></span></td>
            </tr>
            <tr>
                <td align="left">所在单位：</td>
                <td style="border-bottom:#000 1px dotted; word-break:break-all; word-wrap:break-word;"><span id="lblUserCompanyName"><?php echo ($userInfo["company"]); ?></span></td>
            </tr>
              <tr>
                <td align="left">单位地址：</td>
                <td style="border-bottom:#000 1px dotted; word-break:break-all; word-wrap:break-word;"><span id="lblUserCompanyName"><?php echo ($userInfo["address"]); ?></span></td>
            </tr>
            <!-- 新增内容结束 -->
            <tr>
                <td align="left">电 话：</td>
                <td style="border-bottom:#000 1px dotted"><span id="lblUserPhone"><?php echo ($userInfo["phone"]); ?></span></td>
            </tr>
            <tr>
                <td align="left">PI/实验室负责人：</td>
                <td style="border-bottom:#000 1px dotted; word-break:break-all; word-wrap:break-word;"><span id="lblUserPI"><?php echo ($userInfo["dutyer"]); ?></span></td>
            </tr>
            <!-- <tr>
                <td align="right">单位部门：</td>
                <td style="border-bottom:#000 1px dotted; word-break:break-all; word-wrap:break-word;"><span id="lblUserCompanyName"><?php echo ($userInfo["company"]); ?></span></td>
            </tr> -->
            <tr>
                <td align="left">电子邮件：</td>
                <td style="border-bottom:#000 1px dotted; word-break:break-all; word-wrap:break-word;"><span id="lblUserLoginName"><?php echo getUserEmail();?></span></td>
            </tr>
            <!-- 新增内容开始 -->
            <tr>
                <td align="left">课题组：</td>
                <td style="border-bottom:#000 1px dotted; word-break:break-all; word-wrap:break-word;"><span id="lblUserCompanyName"><?php echo ($userInfo["subject"]); ?></span></td>
            </tr>
             <tr>
                <td align="left">发票抬头：</td>
                <td style="border-bottom:#000 1px dotted; word-break:break-all; word-wrap:break-word;"><span id="lblUserCompanyName"><?php echo ($userInfo["piao"]); ?></span></td>
            </tr>
             <tr>
                <td align="left">发货地址：</td>
                <td style="border-bottom:#000 1px dotted; word-break:break-all; word-wrap:break-word;"><span id="lblUserCompanyName"><?php echo ($userInfo["tempaddress"]); ?></span></td>
            </tr>
             <tr>
                <td align="left">所在城市/地区：</td>
                <td style="border-bottom:#000 1px dotted; word-break:break-all; word-wrap:break-word;"><span id="lblUserCompanyName">
                    <?php echo (getProvince($userInfo["province"])); ?> / 
                    <?php echo (getCity($userInfo["city"])); ?>
                </span></td>
            </tr>
            
        </table>
        </div>
		<div class="right">
        <div class="bread">定购信息</div>
		<table width="50%" cellspacing="0" cellpadding="0" border="0">
			      <tr>
                <td width="80" align="left">订单号：</td>
                <td width="340" style="border-bottom:#000 1px dotted"><span id="lblOrderID"><?php echo ($orderInfo["code"]); ?></span></td>
            </tr>

            <!--  <tr>
                <td width="90" align="right">金开瑞编号：</td>
                <td width="330" style="border-bottom:#000 1px dotted">
                    <span id="lblOrderID"><?php echo ($orderInfo["code"]); ?></span>
                </td>
            </tr>
 -->
             <tr>
                <td width="80" align="left">订单类型：</td>
                <td width="340" style="border-bottom:#000 1px dotted"><span id="lblOrderID"><?php echo (showOrderType($orderInfo["ordertype"])); ?></span></td>
            </tr>

            <tr>
                <td align="left">反应数目：</td>
                <td style="border-bottom:#000 1px dotted"><span id="lblOrderSmaplsCount"><?php echo ($countNum); ?></span></td>
            </tr>
            <tr>
                <td align="left">日 期：</td>
                <td style="border-bottom:#000 1px dotted"><span id="lblOrderDate"><?php echo (date('Y-m-d',$orderInfo["addtime"])); ?></span></td>
            </tr>
            <tr>
                <td align="left">销售名称：</td>
                <td style="border-bottom:#000 1px dotted"><span id="lbSalesName">
                   <?php echo ($orderInfo["sale_name"]); ?>
                </span></td>
            </tr>
            <tr>
                <td align="left" style="font-weight:bold">项目描述：</td>
                <td style="border-bottom:#000 1px dotted; word-break:break-all; word-wrap:break-word;"><span id="lblOrderDescription"><?php echo ($orderInfo["description"]); ?></span></td>
            </tr>
            <tr>
                <td align="left" style="font-weight:bold;">其他备注：</td>
                <td style="border-bottom:#000 1px dotted; word-break:break-all; word-wrap:break-word;"><span id="lblOrderComments"><?php echo ($ordrInfo["info"]); ?></span></td>
            </tr>
            <tr>
                <td align="left" style="font-weight:bold;">状 态：</td>
                <td style="border-bottom:#000 1px dotted; word-break:break-all; word-wrap:break-word;"><span id="lblOrderComments">
                     <?php if($orderInfo["synthesis"] == 1): ?><span style="color:black;"><?php echo (getPrimerSynthesis($orderInfo["synthesis"])); ?> </span>
                         <?php elseif($orderInfo["synthesis"] == 2): ?>
                    <span style="color:green;"><?php echo (getPrimerSynthesis($orderInfo["synthesis"])); ?> </span>
                    <?php elseif($orderInfo["synthesis"] == 3): ?>
                      <span style="color:green;"><?php echo (getPrimerSynthesis($orderInfo["synthesis"])); ?> </span>
                      <?php elseif($orderInfo["synthesis"] == 4): ?>
                      <span style="color:red;"><?php echo (getPrimerSynthesis($orderInfo["synthesis"])); ?> </span> 

                    <?php elseif($orderInfo["synthesis"] == 5): ?>
                      <span style="color:green;"><?php echo (getPrimerSynthesis($orderInfo["synthesis"])); ?> </span>

                     <?php elseif($orderInfo["synthesis"] == 6): ?>
                      <span style="color:green;"><?php echo (getPrimerSynthesis($orderInfo["synthesis"])); ?> </span> 

                    <?php elseif($orderInfo["synthesis"] == 7): ?>
                      <span style="color:red;"><?php echo (getPrimerSynthesis($orderInfo["synthesis"])); ?> </span> 


                       <?php else: ?>
                      <span style="color:green;">

                      <!-- <?php echo (getPrimerSynthesis($orderInfo["synthesis"])); ?>  -->

                      </span><?php endif; ?>
                   
                   
                    
                </span></td>


            </tr>

             <tr>
                <td align="left" style="font-weight:bold;">快递单号：</td>
                <td style="border-bottom:#000 1px dotted; word-break:break-all; word-wrap:break-word;"><span id="lblOrderComments">
                     <?php if(($orderInfo["num"]) == ""): ?>暂无快递单号
                         <?php else: ?>
                          <?php echo ($orderInfo["num"]); endif; ?>
            </span></td>
            </tr>
		</table>
		</div>
	</div>
     <!-- start -->
        <div class="order_con" style="border:0px solid black;width:1000px;height:350px;margin-bottom:20px;">
           <div class="bread" style="margin:16px 0 10px -8px;">在线咨询</div> 
           <table border="1" class="wuhan">
                <tr align="center"   class="wbd" bgcolor="#276CC7" style="background:red;height:10px;">
                    <td style="background:green;color:#cccccc;height:10px;">订单号</td>

                     <td style="background:green;color:#cccccc;height:10px;">订购日期</td>
                      <td style="background:green;color:#cccccc;height:10px;">订单状态</td>

                       <td style="background:green;color:#cccccc;height:10px;">快递单号</td>

                       <td style="background:green;color:#cccccc;height:10px;">总金额(￥)</td>
                        <td style="background:green;color:#cccccc;height:10px;" colspan="2">
                          
                            相关文件下载
                          
                        </td>
                </tr>
                <tr align="center" class="wbd"  style="height:30px;">
                     <td  >
                      <?php echo ($orderInfo["code"]); ?>
                       
                    </td>
                     <td  >
                    <?php echo (date('Y-m-d / H:i:s',$orderInfo["addtime"])); ?>
                     </td>
                      <td  >
                          
                    <?php if($orderInfo["synthesis"] == 1): ?><span style="color:black;"><?php echo (getPrimerSynthesis($orderInfo["synthesis"])); ?> </span>
                          <br/><span style="color:red;">(您的订单已发送,请等待最新消息！)</span>
                    
                    <?php elseif($orderInfo["synthesis"] == 2): ?>
                         <span style="color:red;"><?php echo (getPrimerSynthesis($orderInfo["synthesis"])); ?> </span>
                         <br/><span style="color:red;">(您的订单已收到,请等待最新消息！)</span>
                    
                    <?php elseif($orderInfo["synthesis"] == 3): ?>
                        <span style="color:green;"><?php echo (getPrimerSynthesis($orderInfo["synthesis"])); ?> </span>
                        <br/><span style="color:red;">(您的订单已合成,请等待最新消息！)</span>

                    <?php elseif($orderInfo["synthesis"] == 4): ?>
                        <span style="color:green;"><?php echo (getPrimerSynthesis($orderInfo["synthesis"])); ?> </span>
                        <br/><span style="color:red;">(您的订单已取消,请等待最新消息！)</span>

                    <?php elseif($orderInfo["synthesis"] == 5): ?>
                        <span style="color:green;"><?php echo (getPrimerSynthesis($orderInfo["synthesis"])); ?> </span>
                        <br/><span style="color:red;">(您的订单已完成,请等待最新消息！)</span>

                    <?php elseif($orderInfo["synthesis"] == 6): ?>
                        <span style="color:green;"><?php echo (getPrimerSynthesis($orderInfo["synthesis"])); ?> </span>
                        <br/><span style="color:red;">(您的订单已经发货，注意使用'顺丰快递'查收)</span>

                   <?php elseif($orderInfo["synthesis"] == 7): ?>
                        <span style="color:green;"><?php echo (getPrimerSynthesis($orderInfo["synthesis"])); ?> </span>
                        <br/><span style="color:red;">(您的订单已终止,请等待最新消息！)</span><?php endif; ?>
                      </td>
                      <td>
                         <?php if($orderInfo["num"] == ''): ?>暂无快递单号
                       <?php else: ?>
                      <?php echo ($orderInfo["num"]); endif; ?> 
                      </td>
                       <td  > 
                         <?php echo ($orderInfo["sale_money"]); ?>
                       </td>
                      <!--   <td  >
                            <a href="">文件1下载</a>
                        </td> -->
                         <td colspan="2" >

                          <?php if(empty($orderInfo["jia"])): ?>暂无文件下载
                            <?php else: ?>
                          <a href="<?php echo U('Index/xiazai','id='.$orderid);?>" title="点击下载">文件(夹)下载</a><?php endif; ?>

                          
                         </td>
                </tr>
                </tr>
           </table>
            <table border="1" class="wuhan">
               <!--  <tr align="center"   class="wbd" bgcolor="#276CC7"  
                </tr> -->
                <tr>
                    <td align="center" valign="middle" rowspan="2">留言</td>
                    <td align="left"  colspan="5" id="notes" class="xialan">
    <span style="color:red;font-family:微软雅黑;">系统消息：尊敬的客户，您好！ 有什么服务需要咨询吗？
        <br/></span>
        <hr/>
       <!--  <textarea> -->
        <?php if(is_array($notes)): foreach($notes as $key=>$info): if(($info["flag"]) == "0"): ?><span style="color:green;">提问:</span>【<?php echo (date('Y-m-d / H:i:s',$info["addtime"])); ?>】<span style="color:green;"><?php echo (trim($info["content"])); ?></span><br/>
            <?php else: ?>
            <span style="color:red;">解答:</span>【<?php echo (date('Y-m-d / H:i:s',$info["addtime"])); ?>】<span style="color:red;"><?php echo (trim($info["content"])); ?></span><br/><?php endif; endforeach; endif; ?>
        <!-- </textarea> -->
    </td>
                </tr>
                <form action="<?php echo U('Gene/liuyan','oid='.$orderid);?>" method="post" autocomplete="off"> 
                <tr >
                    <td colspan="4">
                        <textarea name="contents" style="word-wrap:break-word;" id="hahaha" placeholder="我要留言..." cols="100" rows="1"></textarea>
                    </td>
                    <td>
                        <input type="button" style="cursor:pointer;" id="liuyan_order" value="  提 交  " />
                    </td>
                </tr>
                </form>
                
            </table>
        </div>
        <!-- end -->


    <div class="order_con" style="margin-top:80px;margin-bottom:50px;">
	<?php if ($orderInfo['excelurl'] != ''){?>
	<a href="<?php echo U('Index/file','oid='.$orderInfo['id']);?>" style="color:red;">查看订单文件</a>
	<?php } else {?>
    <div class="bread" style="margin:16px 0 10px -10px;">测序订单信息</div>
    <?php if(!empty($list)): ?><table style="border-collapse:collapse;"  width="100%" border="1" style="text-align:center;">
        <tr align="center">
            <td>编号</td>
            <td>管壁标签</td>
            <td>样品名称</td>
            <td>样品类型</td>
            <td>载体名称</td>
            <td>片段或插<br />入序列长<br />度(bp)</td>
            <!-- <td>DNA浓度<br />(ng/&micro;l)</td> -->
            <td>测序引物<br />名称</td>
            <td>抗性<br /> </td>
            <!-- <td>通用引物名称</td> -->
            <td>测序要求</td>
            <td>特殊要求</td>
            <td>测序状态</td>
            <td>备注</td>
        </tr>
        <?php if(is_array($list)): foreach($list as $key=>$L): ?><tr align="center">
            <td><?php echo ($key+1); ?></td>
            <td><?php echo ($L["id"]); ?></td>
            <td><?php echo ($L["samplename"]); ?></td>
            <td><?php echo (showSampletype($L["sampletype"])); ?></td>
            <td><?php echo ($L["carrier"]); ?></td>
            <td><?php echo ($L["length"]); ?></td>
            <!-- <td><?php echo ($L["concentration"]); ?></td> -->
            <td><?php echo ($L["primername"]); ?></td>
            <td><?php echo ($L["primercon"]); ?></td>
            <!-- <td><?php echo (shoWuniversalPrimers($L["universalprimers"])); ?></td> -->
            <td><?php echo (showClaim($L["claim"])); ?></td>
            <td><?php echo (showSpecialClaim($L["specialclaim"])); ?></td>
            <td><?php echo (showSequencingStatus($L["status"])); ?></td>
            <td><?php echo ($L["content"]); ?></td>
        </tr><?php endforeach; endif; ?>
    </table>
	<?php else: ?>
	暂无样品信息<?php endif; ?>
	<?php }?>
</div>
</body>
<style>
    .wuhan,tr,td{
        border-collapse:collapse;
    }
    .wbd{
        height:30px;
    }
    .xialan{
        display:block;
        height:180px;
        overflow:auto;
        word-wrap:break-word;
    }
</style>
<script>
  $(function(){
      // $(".xialan").animate({scrollTop:$(".xialan").offset().top+10000},1000);
    $("#liuyan_order").click(function(){
        content = $("#hahaha").val();
        content = content.replace(/(^\s*)|(\s*$)/g, "");
        // alert("111");
         $.ajax({
           type: "GET",
           // url: "http://www.jkrorder.com/index.php/Home/Index/liuyan",
           url: "/index.php/Home/Index/liuyan",
           data:"id_order="+<?php echo ($orderid); ?>+"&id_user="+<?php echo ($id_user); ?>+"&content="+content,
           success: function(msg){
              $('#notes').empty();
              $('#notes').html(msg);
               
               $(".xialan").animate({scrollTop:$(".xialan").offset().top+10000},1000);
               $("#hahaha").select();
              // alert(msg);

           }
        });
         document.getElementById("hahaha").value="";
    })
    // $("html,body").animate({scrollTop:$("#qy_name").offset().top},1000);//1000是ms,也可以用slow代替
  
    })

  function go(){
    // window.location.reload();
    $.ajax({
      type:'GET',
      url: "/index.php/Home/Index/liuyan_all",
      data:"id_order="+<?php echo ($orderid); ?>,
      success: function(msg){
              $('#notes').empty();
              $('#notes').html(msg);
               
               $(".xialan").animate({scrollTop:$(".xialan").offset().top+10000},120000);
               $("#hahaha").focus();
              // alert(msg);

           }

    });
     // document.getElementById("hahaha").value="";
  }
     setInterval("go()",60000);

   


</script>
</html>