<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<title>CallCenter呼叫系统</title>
<script>
function show(sid)
{   
	var i;
	for(i=1;i<=11;i++)
		{	if (i==sid) 
				{document.getElementById(sid).style.display="block";
				
				}
			else
				{document.getElementById(i).style.display="none";
				}
		}
}

function safe_out(){
	// alert("aaaa");
  if(window.confirm('您确定要安全退出吗？')){
    window.location = "<?php echo U('Safe/safe_out');?>";
  }	
}

</script>
<style type="text/css">
body {
	font-family:Verdana, Arial, Helvetica, sans-serif;
	font-size:14px;
	font-weight:bold;
	text-decoration:none;
	background-color:#F2FBEA;
	margin:0px;
	padding:0px;
        }
.zk:link,.zk:visited,.zk:active {
	color:#000000;
	text-decoration:none;
	background-image:url(/Public/Consel/images/bj.jpg);
	height:30px;
	width:170px;
	display:block;
	line-height:28px;
	padding-left:6px;
}
.zk:hover {
	text-decoration:none;
	display:block;
	background-image:url(/Public/Consel/images/bj.jpg);
	height:30px;
	width:170px;
	padding-left:6px;
}
.zk1:link,.zk1:visited,.zk1:active {
	color:#333333;
	text-decoration:none;
	width:170px;
	line-height:28px;
	padding-left:12px;
	display:block;
}
.zk1:hover {
	color:#000000;
	text-decoration:none;
	display:block;
	width:170px;
	line-height:28px;
	background-color:#C7E8AC;
	padding-left:12px;
}
		
/*- Menu sub--------------------------- */
.menusub{
	color:#000000;
	font-size:12px;
	text-decoration:none;
	line-height:22px;
	font-weight:normal;
	padding:0px;
	margin-top:0px;
	margin-right:0px;
	margin-bottom:0px;
	margin-left:0px;
	display:none;
	text-align:left;
}
</style>
</head>
<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
    	<td><img src="/Public/Consel/images/zbtop.jpg" /></td>
  	</tr>
</table>
<div id="menu">
	<?php if(is_array($node)): $k = 0; $__LIST__ = $node;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$row): $mod = ($k % 2 );++$k;?><a href="javascript:;" target="main" onclick="javascript:show('<?php echo ($k); ?>');" class="zk">
			 <?php echo ($row['title']); ?>
		</a>

		<div class="menusub" id="<?php echo ($k); ?>">
			
	       <table width="100%"  border="0" cellspacing="0" cellpadding="0" align="center">

	       	<!-- <?php if(($row["name"]) == "Pro"): else: endif; ?> -->		
	       		  <?php if(is_array($row['node'])): $i = 0; $__LIST__ = $row['node'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$row_sub): $mod = ($i % 2 );++$i;?><tr>
				       <td>

	                        <?php if(($row_sub['show']) == "0"): if(($row_sub['name']) == "safe_out"): ?><a href="javascript:void();" onclick="safe_out()" class="zk1" target="main"><?php echo ($row_sub["title"]); ?></a>
	                            <?php else: ?>	
						      	<a href="<?php echo U($row['name'].'/'.$row_sub['name'],array('type'=>$row_sub['type']));;?>" class="zk1" target="main">
						      		 <?php echo ($row_sub["title"]); ?>
						        </a><?php endif; endif; ?>

				       </td>
			       </tr><?php endforeach; endif; else: echo "" ;endif; ?>
	       	

		      
		 
	       </table>
		
        </div><?php endforeach; endif; else: echo "" ;endif; ?>


<!-- <a href="javascript:;" target="main" onclick="javascript:show('1');" class="zk">最新订单</a>
<div class="menusub" id="1">
<table width="100%"  border="0" cellspacing="0" cellpadding="0" align="center">
	<tr>
    	<td><a href="<?php echo U('Index/sequencing');?>" class="zk1" target="main">测序订单</a></td>
	</tr>
    <tr>
    	<td><a href="<?php echo U('Primer/index');?>" class="zk1" target="main">引物订单</a></td>
  	</tr> 

  	<tr>
    	<td><a href="<?php echo U('Gene/index');?>" class="zk1" target="main">基因订单</a></td>
  	</tr>  	 
</table>
</div>
 -->
 
<!-- <a href="javascript:;" target="main" onclick="javascript:show('2');"  class="zk">客户信息</a>
<div class="menusub" id="2">
<table width="100%"  border="0" cellspacing="0" cellpadding="0" align="center">
	<tr>
		<td><a href="<?php echo U('Customer/searchlist');?>" class="zk1" target="main">查询与修改</a></td>
	</tr>
	 
</table>
</div> -->

<!-- 其他模块 -->
<!-- <a href="<?php echo U('Pro/fen',array('type'=>1));?>" target="main"   class="zk" >综合服务</a>
<a href="<?php echo U('Pro/fen',array('type'=>2));?>" target="main"   class="zk" >蛋白组学</a>
<a href="<?php echo U('Pro/fen',array('type'=>3));?>" target="main"   class="zk" >蛋白及抗体</a>
<a href="<?php echo U('Pro/fen',array('type'=>4));?>" target="main"   class="zk" >分子生物学服务</a>
<a href="<?php echo U('Pro/fen',array('type'=>5));?>" target="main"   class="zk" >病毒包装及检测服务</a>
<a href="<?php echo U('Pro/fen',array('type'=>6));?>" target="main"   class="zk" >小分子抗原及ElisA开发</a> -->


<!-- <a href="javascript:;" target="main" onclick="javascript:show('3');"  class="zk" >权限管理</a>
<div class="menusub" id="3">
<table width="100%"  border="0" cellspacing="0" cellpadding="0" align="center">
     	
	<tr>
    	<td><a href="<?php echo U('Rbac/addRole');?>" class="zk1" target="main">添加角色</a></td>
	</tr>
    <tr>
    	<td><a href="<?php echo U('Rbac/roleList');?>" class="zk1" target="main">角色管理</a></td>
	</tr>
	<tr>
    	<td><a href="<?php echo U('Rbac/addNode');?>" class="zk1" target="main">添加权限</a></td>
	</tr>
	<tr>
		<td><a href="<?php echo U('Rbac/nodeList');?>" class="zk1" target="main">权限管理</a></td>
	</tr>
	<tr>
    	<td><a href="<?php echo U('Rbac/addUser');?>" class="zk1" target="main">添加用户</a></td>
	</tr>
	<tr>
    	<td><a href="<?php echo U('Rbac/userList');?>" class="zk1" target="main">用户管理</a></td>
	</tr>   
</table>
</div>
 -->

</div>
</body>
</html>