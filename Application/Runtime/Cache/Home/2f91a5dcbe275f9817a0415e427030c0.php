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
<style type="text/css">
    #main{
      filter:alpha(opacity=100);
      opacity:1;
    }

    #op:hover{
      cursor:pointer;
      color:red;
    }
    .xingxing{
        color:red;
    }
    .dianji:hover{
        cursor:pointer;
        color:red;
    }
    .close_window:hover{
      cursor:pointer;
    }
    table{
      border:0px solid red;
    }
    option{
      padding:2.7px;
    }
    .closeBtn_a:hover{
      cursor:pointer;
    }
    .dianji_a:hover{
      cursor:pointer;
    }
     .dianji_b:hover{
      cursor:pointer;
    }
    .close-btn:hover{
      cursor:pointer;
    }
    .ok-bnt:hover{
      cursor:pointer;
    }
    .seo_edit:hover{
     cursor:pointer;
    }


</style>


<script type="text/javascript">
    // function show(){
    //     alert("nn");
    // }
//var t=0;
$(document).ready(function(){

  // 是否需要亚克隆开始
   $("#gene_clone_ya").attr("disabled","true");
   $("#gene_clone_site").attr("disabled","true");
   $("#gene_clone_site_a").attr("disabled","true");
   // gene_clone_kx,gene_clone_cy,gene_clone_zx
   $("#gene_clone_kx").attr("disabled","true");
   $("#gene_clone_cy").attr("disabled","true");
   $("#gene_clone_zx").attr("disabled","true");


   $("#gene_other_aa").click(function(){
   $("#gene_clone_ya").attr("disabled","true");
   $("#gene_clone_site").attr("disabled","true");
   $("#gene_clone_site_a").attr("disabled","true");
   $("#gene_clone_kx").attr("disabled","true");
   $("#gene_clone_cy").attr("disabled","true");
   $("#gene_clone_zx").attr("disabled","true");

    $("#divThink").hide();
 });

    $("#gene_other_bb").click(function(){
    $("#gene_clone_ya").removeAttr("disabled");
   $("#gene_clone_site").removeAttr("disabled");
   $("#gene_clone_site_a").removeAttr("disabled");
   $("#gene_clone_kx").removeAttr("disabled");
   $("#gene_clone_cy").removeAttr("disabled");
   $("#gene_clone_zx").removeAttr("disabled");

    $("#divThink").hide();
 });

  // 是否需要亚克隆结束

  // 是否要终止密码子优化开始
   // $("#stop_sequence").attr("disabled","true"); //默认态

   $("#gene_seo_result_aa").click(function(){
    document.getElementById("gene_seo_result_aa").checked="true";
     // $("#stop_sequence").removeAttr("disabled");


      $("#divThink").hide();
    // alert("aaa");
   });

    $("#gene_seo_result_bb").click(function(){
      document.getElementById("gene_seo_result_bb").checked="true";
     // $("#stop_sequence").attr("disabled","true");

      $("#divThink").hide();
   })

     $("#gene_seo_result_cc").click(function(){
      document.getElementById("gene_seo_result_cc").checked="true";
     // $("#stop_sequence").attr("disabled","true");

      $("#divThink").hide();
   })

      $("#gene_seo_result_dd").click(function(){
      document.getElementById("gene_seo_result_dd").checked="true";
     // $("#stop_sequence").attr("disabled","true");

      $("#divThink").hide();
   })


  // 是否要终止密码子优化结束
var t=0;
  $(".serial_b").click(function(){
      $(".serial_sel").html("<font color='red'>(使用*作为结束符号)</font>");
      $(".gene_seo").html("<font color='red'>(请选择密码子优化服务: 是)</font>");
      document.getElementById("all_content").innerHTML="";


      if($(".gene_contents").attr('w') == "aaa" || $(".gene_contents").attr('w') == ""){
        // alert("aaa");
     
        document.getElementById("gene_contents").value = "";

       document.getElementById("gene_contents_num").value = "";
       $(".gene_contents").focus();
       $("#gene_contents_num").attr("readonly","true");
  }
  
    $(".gene_contents").attr("w","bbb"); 
   // $(".serial_b").attr("checked","checked");
   document.getElementById("serial_b").checked="true";

    $("#divThink").hide();


  });

   $(".serial_a").click(function(){
      $(".serial_sel").html("");
      $(".gene_seo").html("");

      document.getElementById("all_content").innerHTML='';

       if($(".gene_contents").attr('w') == "bbb"){
    
      document.getElementById("gene_contents").value = "";
       document.getElementById("gene_contents_num").value = "";
        $(".gene_contents").focus();

  }

   $(".gene_contents").attr("w","aaa"); 
    document.getElementById("serial_a").checked="true";
     $("#gene_contents_num").attr("readonly","true");

     $("#divThink").hide();

  });

$("#a_1").click(function(){
   // $(".zhili_sel_wh").removeAttr("disabled"); 
 // alert("aaa");
 $(".gene_zhili_content").removeAttr("disabled");
 $(".gene_zhili_level").removeAttr("disabled");
 $(".gene_zhili_name").removeAttr("disabled");


 w = $.trim($("#gene_name").val());
h = $("#gene_clone_method option:selected").text();
// alert(h);

//  if(w == ''){
//   alert("基因名称不能为空！");
//   $("#gene_name").focus();
//   return false;
//  }else if(h == ''){
//    alert("克隆方式不能为空！");
//   $("#gene_clone_method").focus();
//   return false;

//  }else{

//  wh = w+"_"+h;
  
//  document.getElementById("gene_zhili_name").value=wh; 
// }
 
  $("#divThink").hide();
 
});

$("#b_1").click(function(){
   // $(".zhili_sel_wh").removeAttr("disabled"); 
 // alert("aaa");
 $(".gene_zhili_content").attr("disabled","true");
 $(".gene_zhili_level").attr("disabled","true");
 $(".gene_zhili_name").attr("disabled","true");
document.getElementById("gene_zhili_name").value='';

  $("#divThink").hide();
});

//gene_zhili_name  的值


// 密码自由化
$(".password_seo").click(function(){

  // if($(".gene_contents").attr('w') == "aaa" || $(".gene_contents").attr('w') == ''){
  //       // alert("aaa");
  //    alert("选择序列为：'蛋白质',才能进行密码子优化！否则失败。");
  //    return false;
        
  // }
  


    

     // $("#main,#header,#toper").css("opacity","0.5");
     // $("#main,#header,#toper").css("-moz-opacity","0.5");
     // $("#main,#header,#toper").css("-o-opacity","0.5");
     // $("#main,#header,#toper").css("-webkit-opacity","0.5");
     // $("#main,#header,#toper").css("-ms-opacity","0.5");

     
      // $("#main").css("opacity","0.5");
      //   $("#coden_opt").css("opacity","1");
      
     // $("#coden_opt").css("opacity","1").css("border","1px solid red").css("z-index","1000");
      $("#coden_opt").show();

       $("#divThink").hide();

     
     // alert('aa');
    // $("#main").hide();
});

$(".close_window").click(function(){
$(".password_seo").removeAttr("checked");
$(".pwd_seo").attr("checked","true");
$(".seo_edit").hide();
$("#coden_opt").hide();
document.getElementById('pwd_seo').checked="checked";
// document.getElementById('pwd_seo').checked="true";
//$(".pwd_seo").attr("checked","checked");
//alert($(".pwd_seo").attr("checked"));

 $("#divThink").hide();

});

$(".close-btn").click(function(){
   $(".password_seo").removeAttr("checked");
  $(".pwd_seo").attr("checked",true);
  document.getElementById("pwd_seo").checked="true";
$("#coden_opt").hide();
$(".seo_edit").hide();

 $("#divThink").hide();
})

$(".ok-bnt").click(function(){
   document.getElementById("host").value = $("#host").val();

   if(document.getElementById("host").value == "0"){
    $(".tixing").html("<span color='red;'>表达宿主不能为空！</span>");

    return false;

   }
// alert($("#host").val());
  // document.getElementById("opt_start_position").value=$("#opt_start_position").val();
  // alert($("#opt_start_position").val());
  
// document.getElementById("opt_start_position_unit").value=$("#opt_start_position_unit").val();

// document.getElementById("opt_end_position").value=$("#opt_end_position").val();

// document.getElementById("opt_end_position_unit").value=$("#opt_end_position_unit").val();

// document.getElementById("orf_start_position").value=$("#orf_start_position").val();

// document.getElementById("orf_end_position").value=$("#orf_end_position").val();

document.getElementById("restriction_void").value=$("#restriction_void").val();

document.getElementById("restriction_keep").value=$("#restriction_keep").val();

// document.getElementById("stop_position").value=$("#stop_position").val();

document.getElementById("comments").value=$("#comments").val();
document.getElementById("stop_sequence").value=$("#stop_sequence").val();





  $(".seo_edit").show();
  $("#coden_opt").hide();

   $("#divThink").hide();
})

$(".pwd_seo").click(function(){
  $(".seo_edit").hide();
  $("#coden_opt").hide();

   $("#divThink").hide();
})

$(".seo_edit").click(function(){
   $("#coden_opt").show();

    $("#divThink").hide();
})



$(".dianji_a").click(function(){
  $("#divThink").show();
  var m=5;
  $('#www').attr('s',m);


   
})

$(".dianji_b").click(function(){
  $("#divThink").show();
  var n=3;
   $('#www').attr('s',n);

   
})



$(".closeBtn_a").click(function(){
  $("#divThink").hide();
})


$("#box_5").click(function(){
    document.getElementById('gene_serial_5').value="";

     $("#divThink").hide();
})

$("#box_3").click(function(){
    document.getElementById('gene_serial_3').value="";

     $("#divThink").hide();
})

// alert(t);
//判断序列DNA与蛋白质
$(".serial_b").click(function(){

  if($(".gene_contents").attr('w') == "aaa"){
     
        document.getElementById("gene_contents").value = "";

       document.getElementById("gene_contents_num").value = "";
  }
  
    $(".gene_contents").attr("w","bbb"); 
   $(".serial_b").attr("checked","checked");
   document.getElementById("serial_b").checked="true";
  
 $("#divThink").hide();

});
$(".serial_a").click(function(){

  if($(".gene_contents").attr('w') == "bbb"){
      $(".gene_contents").val() = "";
      // $("#gene_contents_num").val() ="";
        document.getElementById("gene_contents").value = "";
       document.getElementById("gene_contents_num").value = "";

  }

   $(".gene_contents").attr("w","aaa"); 
    document.getElementById("serial_a").checked="true";

     $("#divThink").hide();

})

//序列失去焦距
$(".gene_contents").blur(function(){

  $("#divThink").hide();

  var ab = $(".gene_contents").attr("w");
  if(ab =='aaa' || document.getElementById("serial_a").checked){
    var content_a = $(".gene_contents").val();

     content_a = content_a.replace(/\s/ig,"");
      content_a =  content_a.toUpperCase();
    //document.write(content);
    // alert('提示：只能有A、T、C、G四种，否则提交失败！');
    // alert(content_a);
    var length = content_a.length;
    if(length > 0){
      $("#gene_contents_num").removeAttr("disabled");
      document.getElementById("gene_contents_num").value = length + " bp";
    }
    // alert(length);
    var num = Math.ceil(length/10);
    // sub = content_a.substr(0,10);
    // alert(sub);
     var arr=new Array();
     var flag = 0;
     document.getElementById("gene_contents").value = '';
    for(ii=0;ii < num;ii ++){
      // alert(ii);
      sub = content_a.substr(ii * 10,10);
       // $(".gene_contents").val() += sub + " ";

       document.getElementById("gene_contents").value += sub + " ";
       flag = flag + 1;

       if(flag % 5 == 0){
          document.getElementById("gene_contents").value =  document.getElementById("gene_contents").value + "\n";
       }
      // arr[ii] = sub;
      // alert(sub);
    }
    // alert(arr.length);
    // alert(num);
          
  } 
  if(ab=='bbb' || document.getElementById("serial_b").checked){
    var content_b = $(".gene_contents").val();
     content_b = content_b.replace(/\s/ig,"");
      content_b =  content_b.toUpperCase();

      var length = content_b.length;
    if(length > 0){
      $("#gene_contents_num").removeAttr("disabled");
      document.getElementById("gene_contents_num").value = length + " aa";
    }

     var num = Math.ceil(length/10);
    // sub = content_a.substr(0,10);
    // alert(sub);
     var arr=new Array();
     var flag = 0;
     document.getElementById("gene_contents").value = '';

     for(jj=0;jj < num;jj ++){
      // alert(ii);
      sub = content_b.substr(jj * 10,10);
       // $(".gene_contents").val() += sub + " ";

       document.getElementById("gene_contents").value += sub + " ";
       flag = flag + 1;

       if(flag % 5 == 0){
          document.getElementById("gene_contents").value =  document.getElementById("gene_contents").value + "\n";
       }
      // arr[ii] = sub;
      // alert(sub);
    }




    // alert("提示：只能包含F、L、I、M、V、S、P、T、A、Y、H、Q、N、K、D、E、C、W、R、G\n且必须以*(星号)结束，否则提交失败！Bfjouxz");
  }
})

 //序列获得焦距
 $(".gene_contents").focus(function(){
     var content_ab = $(".gene_contents").val();
     // alert(content_b); replace(/(^\s+)|(\s+$)/g, ""); 
     content_ab = content_ab.replace(/\s/ig,"");
      content_ab =  content_ab.toUpperCase();

     document.getElementById("gene_contents").value = content_ab;
 });




 $("#pls_grade_a").click(function(){
  document.getElementById("pls_grade_a").checked="true";

   $("#divThink").hide();
 })
 $("#pls_grade_b").click(function(){
  document.getElementById("pls_grade_b").checked="true";

   $("#divThink").hide();
 })


 $("#www").change(function(){
   var aa = $("#www").attr("s");
   $("#box_"+aa).attr("checked","true");

   aaa = $("#www option:selected").text();
   bbb = $("#www option:selected").val();
   aabb = aaa + " " +bbb;

   document.getElementById('gene_serial_'+aa).value=aabb;
   $("#divThink").hide();

 })

 $("#gene_name,#gene_contents").focus(function(){
  $("#divThink").hide();
 })
 $("#gene_name").blur(function(){
   $("#divThink").hide();
 })

   

});
  
  
  
  // function check(value){
  //   $(function(){
  //     var aa = $("#www").attr("s");
  //     $("#box_"+aa).attr("checked","true");
       
  //     document.getElementById('gene_serial_'+aa).value=value;
  //     $("#divThink").hide();

  //   })
   
  // }

  function checkAll(){
      //判断带有星号的是否填写
      aa = document.getElementById("gene_name").value;
       aa = aa.replace(/(^\s*)|(\s*$)/g, ""); 
       // alert(aa.length);
       if(aa.length==0){
        alert("基因名称不能为空！");
        document.form_wh.gene_name.value='';
         document.form_wh.gene_name.focus();
        return false;
       }      

     //atcg
      ss = document.getElementById("gene_contents").value;
        ss = ss.replace(/(^\s*)|(\s*$)/g, "");
        if(ss.length==0){
        alert("序列内容不能为空！");
         ss = document.getElementById("gene_contents").value='';
         document.form_wh.gene_contents.focus();
        return false;
       }      
      // ss= ss.toUpperCase();
      // alert(ss);
  re_a=/[BDEFHIJKLMNOPQRSUVWXYZ0123456789\~\`\!\@\#\$\%\^\&\*\(\)\_\+\-\=\[\]|{};':",./<>?]+/i;//[]匹配指定范围内的任意字符,这里将匹配英文字母,不区分大小写
     // str="variableName";//变量名必须以字母开
     re_b = /[BJOUZ0123456789~`!@#$%^&*()_+-=[]|{}\;\'\:\"\,\.\/\<\>\?]+/i;
    // alert(re.test(ss));
    if(document.getElementById("serial_a").checked){
    if(re_a.test(ss)){
      //alert(re.test(ss));
      document.getElementById("all_content").innerHTML="<font color='red'>提示：只能有A、T、C、G四种字符，否则提交失败！</font>";
      // document.form_wh.gene_contents.value='';
      document.form_wh.gene_contents.focus();
    return false;
    }
  }else{
    document.getElementById("serial_b").checked="checked";
     // var num = ss.length;
     //  var end = ss.charAt(num-1);
      // alert(num+","+end);
      // if(end != "*"){
      //   alert("必须以*(星号)结束，否则提交失败！");
      //    document.form_wh.gene_contents.focus();
      //   return false;
      // }
    // alert("aaa");
    // alert(ss);
    if(re_b.test(ss)){

       // if(end != '*'){
      document.getElementById("all_content").innerHTML="<font color='red'>提示：只能包含F、L、I、M、V、S、P、T、A、Y、H、Q、N、K、D、E、C、W、R、G等字符，否则提交失败！</font>";
        // document.form_wh.gene_contents.value='';
       document.form_wh.gene_contents.focus();
    return false;
  // }
    }

  
    // if(end != '*'){
    //   alert("必须以*(星号)结束，否则提交失败！");
    //   return false;
    // }


  }

  if(document.getElementById("serial_b").checked){
  
   if(document.getElementById("pwd_seo").checked){
     alert("提示：当前序列为蛋白质，密码子优化必须选择是，否则无法提交！");
     $(".password_seo").focus();
   return false;

   }
  }


    

     
   
   
  }


  //判断序列DNA与蛋白质
  // if(document.getElementById("serial_a").checked){


  // }


 
  /**自动搜索开始**/
     
  
  /**自动搜索结束**/

</script>
 
<div id="main">
    <div class="maincon">
    <div class="order_con">
        <div class="bread b33" style="margin:16px 0 10px 0;">
            基因合成服务(<span class="xingxing"><span class="xingxing">*</span></span> 必填项)</div>
         
         <!--表单开始-->
        <form action="<?php echo U('Gene/forms');?>" name="form_wh" autocomplete="off" onsubmit="return checkAll();" method="post">
        
        <table cellspacing="0" cellpadding="0" width="100%" border="0">
            <tr>
                <td><span class="xingxing"><span class="xingxing">*</span>
                </span>基因名称：<input type="text" name="gene_name" size="30" required="required"  placeholder="基因名称必填"  id="gene_name" />　点击 <a id="f66" target="_blank" href="http://www.ncbi.nlm.nih.gov">此处</a> 在NCBI上搜索序列.</td>
            </tr>

            <tr>

                <script type="application/javascript">
                /*
                */
                </script>
                <td><input type="checkbox" name="box_5" id="box_5"/> 
                    5' 端序列：<input type="text" size="50" id="gene_serial_5" class="gene_serial_5" name="gene_serial_5" />
                    　<input type="button" id="dianji_a" class="dianji_a" name="search_enzyme"  value="点击搜索酶" >
                </td>
             </tr>
            <tr>
                <td><span class="xingxing">*</span>
                    序列：<input type="radio" class="serial_a" value="1" checked="checked" name="gene_serial_sel" id="serial_a" required="required">DNA &nbsp;&nbsp;<input type="radio"  value="2" 
                    name="gene_serial_sel" id="serial_b" class="serial_b" onclick="serial();">蛋白质&nbsp;&nbsp;&nbsp;&nbsp;
                    <span>碱基/氨基酸数量:</span>&nbsp;<input type="text" name="gene_contents_num" id="gene_contents_num"    disabled/>
                   <!--  <span class="serial_sel"></span> -->

                </td>
            </tr>
            <tr>
                <td><textarea name="gene_contents" w="" id="gene_contents" class="gene_contents" style="width:986px; height:60px;" required="required" placeholder="序列内容必填"></textarea><br/>
                <span id="all_content"></span>
                </td>
            </tr>
            <tr>
                <td><input type="checkbox"  name="box_3" id="box_3"> 
                    3'  端序列：<input  type="text" 
                    name="gene_serial_3" id="gene_serial_3" class="gene_serial_3" style="width:253px;">　<input type="button" name="search_enzyme" class="dianji_b" value="点击搜索酶"></td>
            </tr>
            <tr>
                <td><strong>密码子优化：</strong> <span class="gene_seo"></span><br />
                    是否需要密码子优化 (此项免费)?<br/>
                    <input type="radio" class="password_seo" value="1" name="gene_seo">是&nbsp;&nbsp;&nbsp;&nbsp;<span class="seo_edit" style="color:#3385CF;display:none;">编辑</span>
                    <br/><input type="radio" value="2" id="pwd_seo" class="pwd_seo" checked="checked"  name="gene_seo">否
            </td>
            </tr>


           


             
            <tr>
                <td><strong>克隆载体：</strong></td>
            </tr>
            <tr>
                <td><input type="radio" checked="checked" />
               我们提供以下默认载体：
               <a href="<?php echo U('Gene/gene_pdf',array('id'=>1));?>" title="载体：pUC57-simple PDF文档查看" style="color:green;text-decoration:underline;">pUC57-simple</a>&nbsp;,&nbsp;
               <a href="<?php echo U('Gene/gene_pdf',array('id'=>2));?>" title="载体：pUC57-Amp PDF文档查看" style="color:green;text-decoration:underline;">pUC57-Amp</a>&nbsp;,&nbsp;
               <a href="<?php echo U('Gene/gene_pdf',array('id'=>3));?>" title="载体：pUC57-Kana PDF文档查看" style="color:green;text-decoration:underline;">pUC57-Kana</a>&nbsp;,&nbsp;
               <a href="<?php echo U('Gene/gene_pdf',array('id'=>4));?>" title="载体：pUC57-Kana-MCS free PDF文档查看" style="color:green;text-decoration:underline;">pUC57-Kana-MCS free</a>&nbsp;,&nbsp;
               <a href="<?php echo U('Gene/gene_pdf',array('id'=>5));?>" title="载体：pUC19-MCS free PDF文档查看" style="color:green;text-decoration:underline;">pUC19-MCS free</a>&nbsp;.&nbsp;
               <br/>
               系统会根据您的订单性质优化选择。
             <!--  <select name="gene_clone_method" id="gene_clone_method">
                <option value="0"></option>
                <option value="1">pUC57-Amp</option>
                <option value="2">pUC57-Kana</option>
                <option value="3" selected="true">pUC57-Simple</option>
                <option value="4">pUC19-Amp(短基因默认)</option>
              </select> -->

              
             
              <!--
              <a id="f66" target="_blank" href="#">pUC57</a>,              
              <a id="f66" target="_blank" href="#">pUC57-Kan</a> ,
              <a id="f66" target=_blank href="#">   pUC57-Simple </a> 载体图谱
             -->
              </td>
            </tr>
            <!-- <tr>
                <td>(例如：BamHI-HindIII，EcoRV；注意：如果不填，GenScript默认选择EcoRV )</td>
            </tr> -->
         <!--    <tr>
                <td>
                  <input type="radio" value="other" onclick="b.show();" /> 

                  其 他
                </td>
            </tr> -->
            <script type="application/javascript">
            /*
            */
            </script>
            <tr>
                <td>是否需要亚克隆:</td>
            </tr>
            <tr>
                <td>
                  <input type="radio" name="gene_other" id="gene_other_aa" value="1" checked/>否<br/>
                  <input type="radio" name="gene_other" id="gene_other_bb" value="2"/>是
                  &nbsp;&nbsp;<br/>亚克隆载体名称：<input type="text" name="gene_clone_ya" id="gene_clone_ya">
                   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <!--  </td>
              <td> -->
                   克隆位点：5'<input type="text" 
                   size="30" name="gene_clone_site" id="gene_clone_site"/>
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                 3'<input type="text" size="30" 
              name="gene_clone_site_a" id="gene_clone_site_a"/>
                 <!--  <textarea name="gene_other" style="width:986px; height:50px;"></textarea>
 -->
                </td>
            </tr>

            <tr>
              <td class="wu_h">
                抗性 : <input type="text" name="gene_clone_kx" id="gene_clone_kx"   size="30">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                测序引物 : <input type="text" name="gene_clone_cy" id="gene_clone_cy"   size="30">&nbsp;&nbsp;&nbsp;
              </td>
            </tr>
            <tr>
              <td class="wu_h">载体序列 ：<input type="text" name="gene_clone_zx" id="gene_clone_zx"   size="100"></td>
            </tr>



            <tr>
                <td><strong>质粒制备：</strong></td>
            </tr>
            <tr>
                <td><input type="radio" name="gene_zhili_sel"  value="1" id="b_1" checked="checked"/> 准备交付: 2-4 μg (免费)</td>
            </tr>
            <tr>
                <td><input type="radio" name="gene_zhili_sel" value="2" id="a_1" 
                     class="zhili_sel_wh"/> 自定义质粒制备: 
                <select name="gene_zhili_content" class="gene_zhili_content" disabled="disabled">
                  <option value="0"></option>
                  <option value="1" selected="selected">100 μg</option>
                  <option value="2">200 μg</option>
                  <option value="3">300 μg</option>
                  <option value="4">400 μg</option>
                  <option value="5">500 μg</option>
                   <option value="6">1 mg</option>
                  
              </select></td>
            </tr>

            <tr style="display:none;">
                <td><span class="xingxing">*</span>模板名称: <input type="text" 
                    name="gene_zhili_name" id="gene_zhili_name" class="gene_zhili_name" disabled="disabled"  placeholder="模板名称必填"/></td>
            </tr>

            <tr>
                <td>质量级别: </td>
            </tr>
            <tr>
                <td>
    <input id="pls_grade_a" name="gene_zhili_level" class="gene_zhili_level" type="radio" checked disabled="disabled" value="1"/>普通转化级
    <br>
      <input id="pls_grade_b" name="gene_zhili_level" class="gene_zhili_level" type="radio" disabled="disabled" value="2"/>细胞转染级(去内毒素)

      
            </tr>
           
           
            
            <tr>
                <td><strong>批量订购或寻求基因合成技术支持？</strong></td>
            </tr>
            <tr>
                <td>您可以发送批量FASTA格式的基因序列到 <a id="f66" href="#"><u>order@genecreate.com</u></a>邮箱，或者电话<font id="f66">027-88189683</font><br>
        我们经验丰富的技术支持将帮助管理您的项目，从序列设计、优化、合成到克隆，无需收取任何额外收费</td>
            </tr>
            <tr align="center">
                <!-- <td><input type="button" onclick="check_data()" value="提交" name="op"></td> -->
                <td><input type="submit" style="padding:8px;background:#FF6633;color:white;font-weight:bold;font-size:16px;" onclick="" value=" 提  交 " name="op" id="op"></td>
          </tr>
        </table>

   <!--密码子优化 alert div --start -->
<div   class="modal container hide" id="coden_opt" style="margin-left: 330px; width: 600px;border:1px solid gray;display:none;
position:relative;z-index:10000;top:-700px;border-radius:10px;-moz-border-radius:10px;-webkit-border-radius:10px;-o-border-radius:10px;-ms-border-radius:10px;">  

    <div style="margin-top:8px;">    
    <span  class="close_window" style="border:0px solid red;margin-right:3px;display:block;width:22px;float:right;margin-top:3px;
        font-size:20px;" type="button">X</span>  <h3><span style="color:red;padding:8px;">密码子优化</span> <font class="normal">(*必填项)</font></h3>  </div> 
      <div style="max-height:400px"  >    
        <div class="row-fluid box-father">     
          <!-- <div class="span12 box-b"> -->
<!--[if lte IE 6.5]><iframe></iframe><![endif]-->
        <!-- <div class="closeBtn" style="display: none;">
          <a onclick="CloseGenepop1('divCodOpti','need_codon_no','edit_condon')">
    <img border="0" src="/gsfiles/new/images/close_btn.gif"></a>
    </div> -->

         
      <div id="geneMain" style="">
      <table style="padding:4px;border:0px solid red;width:600px;">
                <tbody>
                  <tr>
                    <td height="25">* 表达宿主:</td>
                    <td>
        <select name="gene_seo_host" id="host"  style="width:250px;">

        <option value="0"></option>
        <option value="1">Arabidopsis thaliana</option>
        <option value="2">Bacillus subtilis</option> 
        <option value="3">Bos taurus</option> 
        <option value="4">Brassica napus</option> 
        <option value="5">Caenorhabditis elegans</option> 
        <option value="6">Chlamydomonas reinhardtii</option> 
        <option value="7">Cricetulus griseus</option> 
        <option value="8">Drosophila melanogaster</option> 
        <option value="9">Escherichia coli</option> 
        <option value="10">Homo sapiens</option>
        <option value="11">Mus musculus</option> 
        <option value="12">Nicotiana tabacum</option> 
        <option value="13">Oryza sativa</option>
        <option value="14">Pichia pastoris</option> 
        <option value="15">Saccharomyces cerevisiae</option> 
        <option value="16">Zea mays</option> 
        <option value="17">Other</option> 

       </select>
                    </td>
                    <td>
                      <span class="tixing" style="color:red;"></span>
                    </td>
                </tr>
                <tr>
                  <td>其他</td>
                  <td>
                    <input type="text" name="gene_seo_host_aa" id="gene_seo_host_aa" size="34">
                  <!--   <span style="color:red;font-style:italic;">(表达宿主)</span> -->
                  </td>
                </tr>

            </tbody>
          </table> 
                
            <table style="padding:4px;border:0px solid red;display:none;">
                <tbody><tr>
                  <td><span name="start_grey">优化的起始位点:</span>
                  </td>
                  <td><input type="text" name="gene_seo_start" id="opt_start_position" size="5">
                  </td>
                  <td><select id="opt_start_position_unit" name="gene_start">
                <option value="1">bp</option>
                <option value="2">aa</option>
            </select><span name="start_grey">,</span>
                  </td>
                  <td><span name="start_grey">结束位点:</span>
                  </td>
                  <td><input type="text" name="gene_seo_end" id="opt_end_position" size="5">
                  </td>
                  <td><select id="opt_end_position_unit" name="gene_end">
                <option value="1">bp</option>
                <option value="2">aa</option>
            </select>
                  </td>
                </tr>
                <tr>
                <td><span name="start_grey">ORF 开始位点:</span>
                  </td>
                  <td><input type="text" name="gene_orf_start" id="orf_start_position" size="5" style=" margin-top:2px;">
                  </td>
                  <td><span name="start_grey">bp</span>
                  </td>
                  <td><span name="start_grey">结束位点:</span>
                  </td>
                  <td> <input type="text" name="gene_orf_end" id="orf_end_position" size="5">
                  </td>
                  <td><span name="start_grey">bp</span>
                  </td>
                </tr>
            </tbody></table>
      
      <table style="padding:4px;border:0px solid red;">
        <tbody>
          <tr>
          <td class="wu_h" style="width:50%;">避免的酶切位点:</td>

          <td ><input type="text"   name="gene_avoid_site" id="restriction_void" class="mInput" style=" margin-top:2px;">
                (例如: HindIII(AAGCTT))<br></td>
        </tr>
        <tr>
          <td class="wu_h">保留的酶切位点:</td>
          <td><input type="text"   name="gene_save_site" id="restriction_keep" class="mInput" style=" margin-top:2px;">
    (例如: HindIII(AAGCTT))</td>
        </tr>

        <tr style="border:1px solid red;">
          <td style="width:400px;border:0px solid red;">
            <!-- 是否要终止密码子优化: -->
            起始密码子
          </td>
          <td style="border:0px solid red;width:60%;">
            <input  type="radio" value="1" name="gene_seo_result" id="gene_seo_result_aa" >  
            需要，ATG.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="radio" value="2" name="gene_seo_result" id="gene_seo_result_bb"  > 不需要
          </td>
        </tr>

          <tr style="border:1px solid red;">
          <td style="width:400px;border:0px solid red;">
            <!-- 是否要终止密码子优化: -->
            终止密码子
          </td>
          <td style="border:0px solid red;width:60%;">
            <input  type="radio" value="1" name="gene_seo_result_a" id="gene_seo_result_cc" >
             需要，TAG 或者 TAA 或者 TGA.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="radio" value="2" name="gene_seo_result_a" id="gene_seo_result_dd"  > 不需要
          </td>
        </tr>

        <tr>
          <td>指定终止的序列</td>
          <td><input type="text" name="gene_rel_serial" size="35" id="stop_sequence" class="mInput"></td>
        </tr>

        <tr>
          <td>备注:</td>
          <td>
            <input type="text" name="gene_seo_note" id="comments" style="width:430px">
          </td>
        </tr>
        <tr>
          <td colspan="2" align="center">
             <button class="btn close-btn" style="padding:4px;" data-dismiss2="modal" type="button"> 取 消 </button> &nbsp;&nbsp;&nbsp;&nbsp;   
          <button class="btn btn-primary ok-bnt" style="padding:4px;" type="button"> 确 定 </button>  
          </td>
        </tr>
      </tbody>

    </table>
     <!--  &nbsp;&nbsp;&nbsp;&nbsp;是否要终止密码子优化: <br>
    &nbsp;&nbsp;&nbsp;&nbsp;<input id=id_002 type="radio" value="1" name="gene_seo_result" checked=""> 是.&nbsp;&nbsp;
    序列为: <input type="text" name="gene_rel_serial" id="stop_sequence" class="mInput">&nbsp;
                <!<span style="display:none;">Position: <input type="text" id="stop_position" class="mInput"></span> -->
               <!--  <br>
    &nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" value="2" name="gene_seo_result"> 否<br> -->
     <!--  &nbsp;&nbsp;&nbsp;&nbsp;备注: <input type="text" name="gene_seo_note" id="comments" style="width:430px"> --> 
            </div>


 <!-- </div>           -->


</div>  </div>   

                 <!--  <div  style="border:0px solid red;margin:15px 0px;
                  text-align:right;z-index:100000;">    
                 
          <button class="btn close-btn" style="padding:4px;" data-dismiss2="modal" type="button"> 取 消 </button> &nbsp;&nbsp;&nbsp;&nbsp;   
          <button class="btn btn-primary ok-bnt" style="padding:4px;" type="button"> 确 定 </button>  
                  &nbsp;&nbsp;&nbsp;&nbsp;
                </div> -->
</div>
<!--密码子优化 alert div --end -->

    

    </form>


    <!--表单结束-->
    </div>
</div>
</div>

 







<!--搜索酶开始-->
 <div class="select-free" id="divThink" 
 style="border:2px solid #636D61;width:240px;margin:-880px auto;position:relative;z-index:2000;margin-left:830px;display:none;">
        <!--[if lte IE 6.5]><iframe></iframe><![endif]-->
        <div class="closeBtn_a" style="border:0px solid red;width:18px;height:18px;float:right;
        margin-right:15px;margin-top:4px;">
        <img border="0" src="/Public/Home/images/close_btn.gif"/></div>
        <div class="title" style="color:#0057B1;font-weight:bold;border:0px solid red;width:60px;float:left;margin-left:18px;margin-top:0px;">搜索酶</div><br>

        <div id="geneMain">
          <table style="margin-top:5px;" align="center">
            <tbody>
              <tr>
                <td align="center">
                
                  <input type="text" id="wh_aa" plaecholder="123456" style="width:200px;margin:0 auto;margin-left:18px;">
                </td>
              </tr>
              <tr style="">
                <td>
                  <div style="width:200px;border:solid #000 1px;display:block;height:300px;margin-left:18px;" id="think_pop_div"> 
                   <select id="www" size="11"  s="" style="width:100%;font-size:18px;">
                    <option value="GACGTC">AtaII</option>
 <option value="GGTACC">Acc65I</option>
 <option value="CCGG">AciI</option>
 <option value="AAGCTT">AclI</option>
 <option value="AGCGCT">AfeI</option>
 <option value="CTTAAG">AflII</option>
 <option value="ACCGGT">AgeI</option>
 <option value="AGCT">AluI</option>
 <option value="GGGCCC">ApaI</option>
 <option value="GTGCAC">ApaLI</option>
 <option value="GGCGCGCC">AscI</option>
 <option value="ATTAAT">AseI</option>
 <option value="GCGATCGC">AsiSI</option>
 <option value="CCTAGG">AvrII</option>
 <option value="GGATCC">BamHI</option>
 <option value="CCTCAGC">BbvCI</option>
 <option value="TGATCA">BclI</option>
 <option value="CTAG">BfaI</option>
 <option value="GATC">BfuCI</option>
 <option value="AGATCT">BglII</option>
 <option value="CACGTC">BmgBI</option>
 <option value="GCTAGC">BmtI</option>
 <option value="CCCAGC">BseYI</option>
 <option value="CGTACG">BsiWI</option>
 <option value="ATCGAT">BspDI</option>
 <option value="TCCGGA">BspEI</option>
 <option value="TCATGA">BspHI</option>
 <option value="CCGCTC">BsrBI</option>
 <option value="TGTACA">BsrGI</option>
 <option value="GCGCGC">BssHII</option>
 <option value="CACGAG">BssSI</option>
 <option value="TTCGAA">BstBI</option>
 <option value="CGCG">BstUI</option>
 <option value="GTATAC">BstZ17I</option>
 <option value="ATCGAT">ClaI</option>
 <option value="CATG">CviAII</option>
 <option value="GTAC">CviQI</option>
 <option value="GATC">DpnI</option>
 <option value="GATC">DpnII</option>
 <option value="TTTAAA">DraI</option>
 <option value="CGGCCG">EagI</option>
 <option value="GAGCTC">Eco53kI</option>
 <option value="GAATTC">EcoRI</option>
 <option value="GATATC">EcoRV</option>
 <option value="CATG">FatI</option>
 <option value="GGCCGGCC">FseI</option>
 <option value="TGCGCA">FspI</option>
 <option value="GGCC">HaeIII</option>
 <option value="GCGC">HhaI</option>
 <option value="AAGCTT">HindIII</option>
 <option value="GCGC">HinP1I</option>
 <option value="GTTAAC">HpaI</option>
 <option value="CCGG">HpaII</option>
 <option value="ACGT">HpyCH4IV</option>
 <option value="TGCA">HpyCH4V</option>
 <option value="GGCGCC">KasI</option>
 <option value="GGTACC">KpnI</option>
 <option value="GATC">MboI</option>
 <option value="CAATTG">MfeI</option>
 <option value="ACGCGT">MluI</option>
 <option value="AATT">MluCI</option>
 <option value="TGGCCA">MscI</option>
 <option value="TTAA">MseI</option>
 <option value="CCGG">MspI</option>
 <option value="GCCGGC">NaeI</option>
 <option value="GGCGCC">NarI</option>
 <option value="CCATGG">NcoI</option>
 <option value="CATATG">NdeI</option>
 <option value="GCCGGC">NgoMIV</option>
 <option value="GCTAGC">NheI</option>
 <option value="CATG">NlaIII</option>
 <option value="GCGGCCGC">NotI</option>
 <option value="TCGCGA">NruI</option>
 <option value="ATGCAT">NsiI</option>
 <option value="TTAATTAA">PacI</option>
 <option value="CTCGAG">PaeR7I</option>
 <option value="ACATGT">PciI</option>
 <option value="GGCC">PhoI</option>
 <option value="GGCGCC">PluTI</option>
 <option value="GTTTAAAC">PmeI</option>
 <option value="CACGTG">PmlI</option>
 <option value="TTATAA">PsiI</option>
 <option value="GGGCCC">PspOMI</option>
 <option value="CTGCAG">PstI</option>
 <option value="CGATCG">PvuI</option>
 <option value="CAGCTG">PvuII</option>
 <option value="GTAC">RsaI</option>
 <option value="GAGCTC">SacI</option>
 <option value="CCGCGG">SacII</option>
 <option value="GTCGAC">SalI</option>
 <option value="GATC">Sau3AI</option>
 <option value="CCTGCAGG">SbfI</option>
 <option value="AGTACT">ScaI</option>
 <option value="GGCGCC">SfoI</option>
 <option value="CCCGGG">SmaI</option>
 <option value="TACGTA">SnaBI</option>
 <option value="ACGAGT">SpeI</option>
 <option value="GCATGC">SphI</option>
 <option value="AATATT">SspI</option>
 <option value="AGGCCT">StuI</option>
 <option value="ATTTAAAT">SwaI</option>
 <option value="CCCGGG">TspMI</option>
 <option value="TCTAGA">XbaI</option>
 <option value="CTCGAG">XhoI</option>
 <option value="CCCGGG">XmaI</option>
 <option value="GACGTC">ZraI</option>


                   </select>
                </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
<!--搜索酶结束-->



</body>

<script type="text/javascript">
  // $(function(){
  //   $(".wu_h input").focus(function(){
  //     $(this).css("border","0px solid white").css("border-bottom","1px solid gray");
  //   })
  // })

</script>
</html>