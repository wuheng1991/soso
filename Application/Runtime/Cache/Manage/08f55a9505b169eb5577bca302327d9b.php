<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link href="/Public/Home/css/login.css" rel="stylesheet" type="text/css" />
<!-- <script type="text/javascript" src="/Public/Home/js/jquery.js"></script> -->
<!-- <script type="text/javascript" src="/Public/Home/js/tab.js"></script> -->
<!-- <script type="text/javascript" src="/Public/Home/js/jquery-ui.min.js"></script> -->
<link href="/Public/Home/js/jquery-ui.min.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="toper">
    <div class="top">
        <ul class="top_l">
            <li><a href="<?php echo U('Customer/searchlist');?>">返回列表</a></li>
              <li><a href="/index.php/Manage.html" target=_top>后台主页</a></li>
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
                <td align="left">电 话：</td>
                <td style="border-bottom:#000 1px dotted"><span id="lblUserPhone"><?php echo ($client["phone"]); ?></span></td>
            </tr>
            <tr>
                <td align="left">PI/实验室负责人：</td>
                <td style="border-bottom:#000 1px dotted; word-break:break-all; word-wrap:break-word;"><span id="lblUserPI"><?php echo ($client["dutyer"]); ?></span></td>
            </tr>
           <!--  <tr>
                <td align="right">单位部门：</td>
                <td style="border-bottom:#000 1px dotted; word-break:break-all; word-wrap:break-word;"><span id="lblUserCompanyName"><?php echo ($client["company"]); ?></span></td>
            </tr> -->
            <tr>
                <td align="left">电子邮件：</td>
                <td style="border-bottom:#000 1px dotted; word-break:break-all; word-wrap:break-word;"><span id="lblUserLoginName"><?php echo (getClientEmail($client["uid"])); ?></span></td>
            </tr>
            <!-- 新增内容开始 -->
               <tr>
                <td align="left">所在单位：</td>
                <td style="border-bottom:#000 1px dotted; word-break:break-all; word-wrap:break-word;"><span id="lblUserLoginName"><?php echo ($client["company"]); ?></span></td>
            </tr>
               <tr>
                <td align="left">单位地址：</td>
                <td style="border-bottom:#000 1px dotted; word-break:break-all; word-wrap:break-word;"><span id="lblUserLoginName"><?php echo ($client["address"]); ?></span></td>
            </tr>
               <tr>
                <td align="left">课题组：</td>
                <td style="border-bottom:#000 1px dotted; word-break:break-all; word-wrap:break-word;"><span id="lblUserLoginName"><?php echo ($client["subject"]); ?></span></td>
            </tr>
               <tr>
                <td align="left">发票抬头：</td>
                <td style="border-bottom:#000 1px dotted; word-break:break-all; word-wrap:break-word;"><span id="lblUserLoginName"><?php echo ($client["piao"]); ?></span></td>
            </tr>
            <tr>
                <td align="left">发票邮寄地址：</td>
                <td style="border-bottom:#000 1px dotted; word-break:break-all; word-wrap:break-word;"><span id="lblUserLoginName"><?php echo ($client["tempaddress"]); ?></span></td>
            </tr>
             <tr>
                <td align="left">所在城市/地区：</td>
                <td style="border-bottom:#000 1px dotted; word-break:break-all; word-wrap:break-word;"><span id="lblUserCompanyName">
                    <?php echo (getProvince($client["province"])); ?> 
                    <?php echo (getCity($client["city"])); ?>
                </span></td>
            </tr>

             <tr>
                <td align="left">销售联系人：</td>
                <td style="border-bottom:#000 1px dotted; word-break:break-all; word-wrap:break-word;"><span id="lblUserLoginName"><?php echo ($client["sale_name"]); ?></span></td>
            </tr>
            <!-- 新增内容结束 -->
        </table>
        </div>
        <div class="right">
        <div class="bread">备注信息</div>
        <table width="50%" cellspacing="0" cellpadding="0" border="0">
            <tr>
                 
                <td width="340" style="border-bottom:#000 1px dotted">
                    <!-- <span id="lblOrderID"><?php echo ($orderInfo["code"]); ?></span> -->
    <textarea name="" id="" cols="30" rows="14" readonly="readonly"><?php echo ($client["note"]); ?></textarea>
                </td>
            </tr>
            
             
        </table>
        </div>
    </div>
    
     
</body>
</html>