<?php if (!defined('THINK_PATH')) exit();?>﻿<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>武汉金开瑞生物工程有限公司---后台管理</title>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.tt {
	background-image:url(images/t1.gif);
}
-->
</style>
</head>
<SCRIPT>
function BarMove(){
 if (AtMovePic2.style.display==""){
  document.all("AtMovePic2").style.display="none"
  document.all("AtMovePic").style.display=""
  document.all("frmTitle").style.display="none"
 }
 else{
  document.all("AtMovePic2").style.display=""
  document.all("AtMovePic").style.display="none"
  document.all("frmTitle").style.display=""
 }
}


// function clear(){
//     Source=document.body.firstChild.data;
//     document.open();
//     document.close();
//     document.title="看不到源代码";
//     document.body.innerHTML=Source;
// }
</SCRIPT>
<body style="overflow:hidden" >
<table border="0" cellPadding="0" cellSpacing="0" height="100%" width="100%">
	<tr>
		<td align="middle" noWrap vAlign="center" id="frmTitle">
        <iframe frameBorder="0" id="carnoc" name="carnoc" scrolling="no" src="<?php echo U('Index/left');?>" style="height:100%; visibility:inherit; width:170px; z-index:2"></iframe>
        </td>
		<td style="width:9pt">
			<table width="1" height="100%" cellPadding=0 cellSpacing=0  background="/Public/Consel/images/t1.gif">
				<tr>
					<td width="1" valign="middle" id=AtMovePic style=" display:none;" onclick=BarMove() name="AtMovePic"><span style="cursor:hand"><img src="/Public/Consel/images/tt-1.gif"></span></td>
					<td width="1" valign="middle" id=AtMovePic2 onclick=BarMove() name="AtMovePic2"><span style="cursor:hand"><img src="/Public/Consel/images/tt-2.gif"></span></td>
				</tr>
			</table>
		</td>
		<td style="width:100%"><iframe frameBorder="0" id="main" name="main" scrolling="yes" src="<?php echo U('Index/main');?>" style="height:100%; visibility:inherit; width:100%; z-index:1"></iframe>
		</td>
	</tr>
</table>
</body>
</html>