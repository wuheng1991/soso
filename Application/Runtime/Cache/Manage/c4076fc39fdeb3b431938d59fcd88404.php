<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link href="/Public/Home/css/login.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/Public/Home/js/jquery.js"></script>
<!-- <script type="text/javascript" src="/Public/Home/js/tab.js"></script>
<script type="text/javascript" src="/Public/Home/js/jquery-ui.min.js"></script> -->
<link href="/Public/Home/js/jquery-ui.min.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="toper">
	<div class="top">
    	<ul class="top_l">
			<li><a href="<?php echo U('Cexu/sequencing');?>">返回列表</a></li>
              <li><a href="/index.php/Manage.html" target="top">后台主页</a></li>
		</ul>
        <ul class="top_l right">
        	<li><i class="lgo"></i>欢迎<b id="f33"><?php echo session('admin-name');?></b>&nbsp;&nbsp;/&nbsp;&nbsp;<a href="<?php echo U('User/logout/');?>"  target=_top>退 出</a></li>
        </ul>
    </div>
</div>
<div class="clear"></div>
<!-- logo--导航菜单 结束 -->
<div class="clear"></div>
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
                <td width="300" style="border-bottom:#000 1px solid"><span id="lblUserName"><?php echo ($client["name"]); ?></span></td>
            </tr>
            <tr>
                <td align="left">所在单位：</td>
                <td style="border-bottom:#000 1px dotted; word-break:break-all; word-wrap:break-word;"><span id="lblUserCompanyName"><?php echo ($client["company"]); ?></span></td>
            </tr>
              <tr>
                <td align="left">单位地址：</td>
                <td style="border-bottom:#000 1px dotted; word-break:break-all; word-wrap:break-word;"><span id="lblUserCompanyName"><?php echo ($client["address"]); ?></span></td>
            </tr>
            <!-- 新增内容结束 -->
            <tr>
                <td align="left">电 话：</td>
                <td style="border-bottom:#000 1px dotted"><span id="lblUserPhone"><?php echo ($client["phone"]); ?></span></td>
            </tr>
            <tr>
                <td align="left">PI/实验室负责人：</td>
                <td style="border-bottom:#000 1px dotted; word-break:break-all; word-wrap:break-word;"><span id="lblUserPI"><?php echo ($client["dutyer"]); ?></span></td>
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
                <td style="border-bottom:#000 1px dotted; word-break:break-all; word-wrap:break-word;"><span id="lblUserCompanyName"><?php echo ($client["subject"]); ?></span></td>
            </tr>
             <tr>
                <td align="left">发票抬头：</td>
                <td style="border-bottom:#000 1px dotted; word-break:break-all; word-wrap:break-word;"><span id="lblUserCompanyName"><?php echo ($client["piao"]); ?></span></td>
            </tr>
             <tr>
                <td align="left">发票邮寄地址：</td>
                <td style="border-bottom:#000 1px dotted; word-break:break-all; word-wrap:break-word;"><span id="lblUserCompanyName"><?php echo ($client["tempaddress"]); ?></span></td>
            </tr>

            <tr>
                <td align="left">所在城市/地区：</td>
                <td style="border-bottom:#000 1px dotted; word-break:break-all; word-wrap:break-word;"><span id="lblUserCompanyName">
                    <?php echo (getProvince($client["province"])); ?> / 
                    <?php echo (getCity($client["city"])); ?>
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
              <tr>
                <td width="80" align="left">订单类型：</td>
                <td width="340" style="border-bottom:#000 1px dotted"><span id="lblOrderID"><?php echo (showOrderType($orderInfo["ordertype"])); ?></span></td>
            </tr>
            <tr>
                <td align="left">反应数：</td>
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
                <td align="left" style="font-weight:bold;">状态：</td>
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

    <?php if($orderInfo["synthesis"] != 8): ?><script type="text/javascript">
        $(document).ready(function(){
            $('#status').change(function(){
                $('#status').attr("selected","selected");
                var val = $(this).val();
                // if(var == $()){

                // }
                if (val == 6){
                    var html = "   &nbsp;&nbsp;快递单号：<input type=\"text\" size=\"25\" name=\"express\" />";
                    $('#input').append(html);
                }else{
                   $('#input').empty();  
                }
            });
        });
    </script>
    <form method="post" action="<?php echo U('Cexu/update');?>">
    <input type="hidden" name="orderid" value="<?php echo ($orderInfo["id"]); ?>" />
    <div class="order_con" style="border-bottom:1px solid #CCCCCC;">
        <div class="bread" style="margin:16px 0 10px -8px;">
            订单状态及其他&nbsp;&nbsp;<span style="color:red;font-style:italic;">(根据该订单的合成信息更改状态，让客户及时掌握最新信息)</span>
        </div>
    <select name="status" id="status">
        <option value="1" <?php if(($orderInfo["synthesis"]) == "1"): ?>selected<?php endif; ?>></option>
        <option value="2" <?php if(($orderInfo["synthesis"]) == "2"): ?>selected<?php endif; ?>>已收到</option>
        <option value="3" <?php if(($orderInfo["synthesis"]) == "3"): ?>selected<?php endif; ?>>已合成</option>
        <!-- <option value="2">已完成</option> -->
        
        <option value="4" <?php if(($orderInfo["synthesis"]) == "4"): ?>selected<?php endif; ?>>已取消</option>
        <option value="5" <?php if(($orderInfo["synthesis"]) == "5"): ?>selected<?php endif; ?>>已完成</option>
        <option value="6" <?php if(($orderInfo["synthesis"]) == "6"): ?>selected<?php endif; ?>>已发货</option>
        <option value="7" <?php if(($orderInfo["synthesis"]) == "7"): ?>selected<?php endif; ?>>已终止</option>

    </select>
    <span id="input"></span>&nbsp;&nbsp;
      <span>销售名称：<input type="text" name="yw_name" value="<?php echo ($orderInfo["sale_name"]); ?>"/></span>
    &nbsp;&nbsp;
    <span>总金额：<input type="text" name="yw_money" value="<?php echo ($orderInfo["sale_money"]); ?>"/></span>
    &nbsp;&nbsp;<input type="submit" value="  Submit  " style="cursor:pointer;">
    </form>
    <br />
    </div><?php endif; ?>


    <div class="order_con" style="margin-bottom:50px;">
    <div class="bread" style="margin:16px 0 10px -10px;">测序订单信息<span style="padding-left:680px;"><?php if($orderInfo["status"] == 2): ?><a href="<?php echo U('Index/Serialall','id='.$orderInfo['id']);?>">批量生成流水号</a> | <a href="<?php echo U('Index/getresult','id='.$orderInfo['id']);?>">更新结果</a><?php endif; ?></span></div>
    <?php if(!empty($list)): ?><table   width="100%" border="1" style="text-align:center;border-collapse:collapse;">
        <tr>
            <td>编号</td>
            <td>流水号</td>
            <td>样品名称</td>
            <td>样品类型</td>
            <td>载体名称及抗性</td>
            <td>片段或插<br />入序列长<br />度(bp)</td>
           <!--  <td>DNA浓度<br />(ng/&micro;l)</td> -->
            <td>测序引物<br />名称</td>
            <td>抗性<br /></td>
           <!--  <td>通用引物</td> -->
            <td>测序要求</td>
            <td>特殊要求</td>
			<td>测序状态</td>
            <td>备注</td>
			<td>操作</td>
        </tr>
        <?php if(is_array($list)): foreach($list as $key=>$L): ?><tr>
            <td><?php echo ($key+1); ?></td>
            <td><?php echo ($L["number"]); ?></td>
            <td><?php echo ($L["samplename"]); ?></td>
            <td><?php echo (showSampletype($L["sampletype"])); ?></td>
            <td><?php echo ($L["carrier"]); ?></td>
            <td><?php echo ($L["length"]); ?></td>
         <!--    <td><?php echo ($L["concentration"]); ?></td> -->
            <td><?php echo ($L["primername"]); ?></td>
            <td><?php echo ($L["primercon"]); ?></td>
           <!--  <td><?php echo (shoWuniversalPrimers($L["universalprimers"])); ?></td> -->
            <td><?php echo (showClaim($L["claim"])); ?></td>
            <td><?php echo (showSpecialClaim($L["specialclaim"])); ?></td>
			<td><?php echo (showSequencingStatus($L["status"])); ?></td>
            <td><?php echo ($L["content"]); ?></td>
			<td><a href="<?php echo U('Index/sequencingInfo','id='.$L['id']);?>">查看</a><?php if($orderInfo["status"] == 2): ?>|<a href="<?php echo U('Index/Serial','id='.$L['id']);?>">生成流水号</a><?php endif; ?></td>
        </tr><?php endforeach; endif; ?>
    </table>
	<?php else: ?>
	暂无样品信息<?php endif; ?>
</div>
</body>
</html>