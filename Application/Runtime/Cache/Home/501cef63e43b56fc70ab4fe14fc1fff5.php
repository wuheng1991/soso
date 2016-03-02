<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html lang="zh-cn">
  <head>
    <title>金开瑞引物测序网络系统</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="renderer" content="webkit">
    <link rel="stylesheet" href="/Public/Logo/css/pintuer.css">
	<link rel="stylesheet" type="text/css" href="/Public/Logo/css/login.css">
    
  </head>
  <body>
      <div id="viploginbg" class="login-bg">
        <img id="login-bg-img" src="" alt=""/>
      </div>


  		<div class="login radius fadein-top">
        	<div class="logo">
            <img src="/Public/Logo/images/logo.png" alt="logo" />
          </div>
            <h1 class="text-big"><strong>金开瑞引物测序网络系统</strong></h1>
            <div class="form">
				<form method="post" autocomplete="off"  action="<?php echo U('User/login/');?>">
                	<input type="text" name="username" class="input" id="account"  value="输入用户名"  onfocus="if (value =='输入用户名'){value ='';}" onblur="if (value ==''){value='输入用户名';}"/>
               
                    <input type="password" name="password" class="input" id="password" value="输入用户密码" onfocus="if (value =='输入用户密码'){value ='';}" onblur="if (value ==''){value='输入用户密码';}">
                  
                  <input class="button button-block bc" type="submit" id="botton" value="登陆" />			
                                   <input class="button button-block bc" type="button" onclick="window.location.href='<?php echo U('User/register');?>' " value="注册" />			
         
              
  				</form>
            </div>
			
            <div class="bt"><strong>Copyright © 2014-2015  All Rights Reserved.</strong></div>
            
        </div>


  </body>
</html>

<script>

  window.onload=roll;
  function roll(){
    var menu = document.getElementById("login-bg-img");
	 var rnd=Math.floor(Math.random()*6)+1;
   menu.src = "/Public/Logo/images/"+"3.jpg";

   }


</script>