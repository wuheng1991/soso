<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>武汉金开瑞生物工程有限公司---后台管理</title>
<link href="/Public/Consel/css/style.css" rel="stylesheet" type="text/css">
<script  src="/Public/Consel/js/jquery.js"></script>
<script language="javascript" type="text/javascript" src="/Public/DatePicker/WdatePicker.js"></script>
<!-- <script  src="/Public/Consel/js/jquery-ui.min.js"></script>
<link href="/Public/Consel/js/jquery-ui.min.css" rel="stylesheet" type="text/css" /> -->
</head>
<script>
 function checkAll(){
     flag = true;
    //地区位置 
    // alert(document.getElementById("fen_position_n").checked);
    s = document.getElementById("fen_position_s").checked;
    n = document.getElementById("fen_position_n").checked;
   if(s == false && n == false){
     flag = false;
     alert('地区位置必须选择！');
     $(".fen_position").focus();
     return false;
   }
   //地区名称
    fen_name = $.trim($("#fen_name").val());
    if(fen_name == ''){
     flag = false;
     alert('地区名称必须填写！');
     document.getElementById("fen_name").value='';
     $("#fen_name").focus();
     return false;
    }

     //销售员
    fen_sale = $.trim($("#fen_sale").val());
    if(fen_sale == ''){
     flag = false;
     alert('销售员名称必须填写！');
     document.getElementById("fen_sale").value='';
     $("#fen_sale").focus();
     return false;
    }

     //合  同  编  号
    fen_he = $.trim($("#fen_he").val());
    if(fen_he == ''){
     flag = false;
     alert('合同编号必须填写！');
     document.getElementById("fen_he").value='';
     $("#fen_he").focus();
     return false;
    }

     //客户单位
    fen_customer = $.trim($("#fen_customer").val());
    if(fen_customer == ''){
     flag = false;
     alert('客户单位必须填写！');
     document.getElementById("fen_customer").value='';
     $("#fen_customer").focus();
     return false;
    }

    //联系人
    fen_contact = $.trim($("#fen_contact").val());
    if(fen_contact == ''){
     flag = false;
     alert('联系人必须填写！');
     document.getElementById("fen_contact").value='';
     $("#fen_contact").focus();
     return false;
    }

    //客户Email
    fen_email = $.trim($("#fen_email").val());
    if(fen_email == ''){
     flag = false;
     alert('客户Email必须填写！');
     document.getElementById("fen_email").value='';
     $("#fen_email").focus();
     return false;
    }

     //PI
    fen_pi = $.trim($("#fen_pi").val());
    if(fen_pi == ''){
     flag = false;
     alert('实验室负责人必须填写！');
     document.getElementById("fen_pi").value='';
     $("#fen_pi").focus();
     return false;
    }

    //预计项目周期
    fen_date = $.trim($("#fen_date").val());
    if(fen_date == ''){
     flag = false;
     alert('预计项目周期必须填写！');
     document.getElementById("fen_date").value='';
     $("#fen_date").focus();
     return false;
    }

    //项目名称
    fen_pro = $.trim($("#fen_pro").val());
    if(fen_pro == ''){
     flag = false;
     alert('项目名称必须填写！');
     document.getElementById("fen_pro").value='';
     $("#fen_pro").focus();
     return false;
    }


    //项目状态
    fen_status = $.trim($("#fen_status").val());
    if(fen_status == '0'){
     flag = false;
     alert('项目状态必须选择！');
     document.getElementById("fen_status").value='';
     $("#fen_status").focus();
     return false;
    }

    //合同总金额
    fen_he_money = $.trim($("#fen_he_money").val());
    if(fen_he_money == ''){
     flag = false;
     alert('合同总金额必须填写！');
     document.getElementById("fen_he_money").value='';
     $("#fen_he_money").focus();
     return false;
    }


     //预付款情况
    fen_money = $.trim($("#fen_money").val());
    if(fen_money == ''){
     flag = false;
     alert('预付款情况必须填写！');
     document.getElementById("fen_money").value='';
     $("#fen_money").focus();
     return false;
    }

    //项目细分
    fen_xi = $.trim($("#fen_xi").val());
    if(fen_xi == ''){
     flag = false;
     alert('项目细分必须填写！');
     document.getElementById("fen_xi").value='';
     $("#fen_xi").focus();
     return false;
    }


    if(flag == true){

     return true;
    }
     
 }


 function checkInfo(){
      flag_a = true;

    //项目编号  fen_pro_num
    // fen_name = $.trim($("#fen_name").val());
    // if(fen_name == ''){
    //  flag = false;
    //  alert('地区名称必须填写！');
    //  document.getElementById("fen_name").value='';
    //  $("#fen_name").focus();
    //  return false;
    // }


    //子项目负责人  fen_pro_man
    fen_pro_man = $.trim($("#fen_pro_man").val());
    if(fen_pro_man == ''){
     flag_a = false;
     alert('子项目负责人必须填写！');
     document.getElementById("fen_pro_man").value='';
     $("#fen_pro_man").focus();
     return false;
    }

     //项目简介  fen_pro_js
    fen_pro_js = $.trim($("#fen_pro_js").val());
    if(fen_pro_js == ''){
     flag_a = false;
     alert('项目简介必须填写！');
     document.getElementById("fen_pro_js").value='';
     $("#fen_pro_js").focus();
     return false;
    }

     //样品信息说明  fen_pro_sm
    fen_pro_sm = $.trim($("#fen_pro_sm").val());
    if(fen_pro_sm == ''){
     flag_a = false;
     alert('样品信息说明必须填写！');
     document.getElementById("fen_pro_sm").value='';
     $("#fen_pro_sm").focus();
     return false;
    }

    //样品接收时间(启动时间)  fen_pro_date
    fen_pro_date = $.trim($("#fen_pro_date").val());
    if(fen_pro_date == ''){
     flag_a = false;
     alert('样品接收时间(启动时间)必须填写！');
     document.getElementById("fen_pro_date").value='';
     $("#fen_pro_date").focus();
     return false;
    }

     //样品说明  fen_pro_ys
    fen_pro_ys = $.trim($("#fen_pro_ys").val());
    if(fen_pro_ys == ''){
     flag_a = false;
     alert('样品说明必须填写！');
     document.getElementById("fen_pro_ys").value='';
     $("#fen_pro_ys").focus();
     return false;
    }

     //项目进度  fen_pro_jd

    fen_pro_jd = $.trim($("#fen_pro_jd").val());
    if(fen_pro_jd == ''){
     flag_a = false;
     alert('项目进度必须填写！');
     document.getElementById("fen_pro_jd").value='';
     $("#fen_pro_jd").focus();
     return false;
    }

     //相关文件上传  fen_pro_file

    // len = $(".pro_picture a").length; 
    

    // fen_pro_file = $.trim($("#fen_pro_file").val());

    // if(len == 0){
    
    //  if(fen_pro_file == ''){
    //  flag_a = false;
    //  alert('相关文件必须上传！');
    //  document.getElementById("fen_pro_file").value='';
    //  $("#fen_pro_file").focus();
    //  return false;
    // }

    // }

    if(flag == true){

     return true;
    }
     

 }
</script>
<body>
<table width="100%" border="0" cellpadding="0" cellspacing="0" background="/Public/Consel/images/hui.jpg">
    <tr>
        <td>&nbsp;</td>
    </tr>
</table>
<!-- <form id="sequencingForm" method="post" autocomplete="off" action="<?php echo U('User/searchlist');?>"> -->
<input type="hidden" name="page" id="page" value="<?php echo ($page); ?>" />

<table width="97%" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
        <td width="100%" align="center" valign="top" bgcolor="#FFFFFF">
            <table width="100%" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <td>
                        <table width="100%" cellpadding="0" cellspacing="0" border="0" align="center" style="border-bottom:#ccc solid 1px; margin-bottom:10px;">
                            <tr>
                                <td width="2%" height="30"><img src="/Public/Consel/images/2_r1.jpg" /></td>
                                <td width="73%" class="index-5"><span class="index-7"><font style="color:#f57e20;"><?php echo session('admin-name');?></font>，您已登录成功！<a href="<?php echo U('User/logout');?>"  target=_top>退出</a></span></td>
                                <td width="25%"><a href="http://www.jkrorder.com/index.php/Manage.html" target="top">后台主页</a>&nbsp;&nbsp;&nbsp;&nbsp;
                                    武汉金开瑞生物工程有限公司
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>

                
                    </td>
                </tr>
            </table>
           <!-- 基本信息修改开始 -->
             <form id="form_fen" action="<?php echo U('Pro/fen_mod_ji');?>" onsubmit="return checkAll();" method="post" autocomplete="off">

                <table class="fen_list" width="100%" cellpadding="4" cellspacing="0" border="0" align="center">
                <legend><h3><center><span style="color:green;">
                   
                     <?php if(($type) == "1"): ?>综合服务<?php endif; ?>
                     <?php if(($type) == "2"): ?>蛋白组学<?php endif; ?>
                     <?php if(($type) == "3"): ?>蛋白及抗体<?php endif; ?>
                     <?php if(($type) == "4"): ?>分子生物学服务<?php endif; ?>
                     <?php if(($type) == "5"): ?>病毒包装及检测服务<?php endif; ?>
                     <?php if(($type) == "6"): ?>小分子抗原及ElisA开发<?php endif; ?>项目跟踪基本信息
                </span></center></h3></legend>
                    <input type="hidden" name="hid_id" value="<?php echo ($fen_info["id"]); ?>" />

                    <tr>
                        <td width="38%"><label for="fen_position">地区位置：</label> 
                         
                        <input type="radio"  id="fen_position_s" value="1" name="fen_position"  
                        <?php if(($fen_info['fen_position']) == "1"): ?>checked<?php endif; ?>/>南
                            <input type="radio"  id="fen_position_n" value="2" name="fen_position" 
                            <?php if(($fen_info['fen_position']) == "2"): ?>checked<?php endif; ?>/>北
                        </td>
                    </tr>

                    <tr>
                         
                        <td width="38%">
                         <label for="fen_name">地区名称：</label>
                         <input type="text" style="border-left:0px;border-right:0px;border-top:0px;" id="fen_name" size="45" name="fen_name" value="<?php echo ($fen_info["fen_name"]); ?>" />
                        </td>

                        <td align="left" width="31%">
                        <label for="">销售员：</label>
                        <input type="text"  style="border-left:0px;border-right:0px;border-top:0px;" id="fen_sale" size="38" name="fen_sale" value="<?php echo ($fen_info["fen_sale"]); ?>"/>
                        </td>

                        <td width="31%"> 
                        <label for="fen_he">合&nbsp;&nbsp;同&nbsp;&nbsp;编&nbsp;&nbsp;号：</label>
                        <input type="text"  style="border-left:0px;border-right:0px;border-top:0px;" id="fen_he" size="32" name="fen_he" value="<?php echo ($fen_info["fen_he"]); ?>"/>
                        </td>
                                
                 
            </tr>
            <tr>
                    <td>
                        <label for="fen_customer">客户单位：  </label> 
                        <input type="text"  style="border-left:0px;border-right:0px;border-top:0px;" id="fen_customer" size="45" name="fen_customer" value="<?php echo ($fen_info["fen_customer"]); ?>"/>           
                     </td>

                        <td>
                         <label for="fen_contact">联系人：</label>
                         <input type="text"  style="border-left:0px;border-right:0px;border-top:0px;" id="fen_contact" size="38" name="fen_contact" value="<?php echo ($fen_info["fen_contact"]); ?>"/>
                        </td>


                        <td > 
                        <label for="fen_date_xian">合&nbsp;&nbsp;同&nbsp;&nbsp;期&nbsp;&nbsp;限：</label>
                        <input type="text"  style="border-left:0px;border-right:0px;border-top:0px;" id="fen_date_xian" size="32" name="fen_date_fen" disabled value="<?php echo ($fen_info["fen_date_xian"]); ?>"/>
                        </td>
                                
                 
            </tr>
            <tr>
                <td align="left"> 
                        <label for="fen_email">客户Email：</label>   
                        <input type="text"  style="border-left:0px;border-right:0px;border-top:0px;" id="fen_email" size="45" name="fen_email" value="<?php echo ($fen_info["fen_email"]); ?>"/>
                    </td>
                        <td align="left"> 
                        <label for="fen_pi">实验室负责人：</label>    
                     
                         <input type="text"  style="border-left:0px;border-right:0px;border-top:0px;" id="fen_pi" size="33" name="fen_pi" value="<?php echo ($fen_info["fen_pi"]); ?>"  />
                    </td>

                    <td > 
                        <label for="fen_date">预计项目周期：</label>
                        <input type="text"  style="border-left:0px;border-right:0px;border-top:0px;" id="fen_date" size="32" name="fen_date"  value="<?php echo ($fen_info["fen_date"]); ?>"/>
                    </td>
            </tr>
            <tr>
                 <td align="left"> 
                        <label for="fen_pro">项目名称：</label>   
                        <input type="text"  style="border-left:0px;border-right:0px;border-top:0px;" id="fen_pro" size="45" name="fen_pro" value="<?php echo ($fen_info["fen_pro"]); ?>"/>
                    </td>
                        <td align="left"> 
                        <label for="fen_status">项目状态：</label>    
                     
                        
                        <select name="fen_status" id="fen_status">
                             <option value="0" <?php if(($fen_info["fen_status"]) == "0"): ?>selected<?php endif; ?>>请选择状态</option>
                             <option value="1" <?php if(($fen_info["fen_status"]) == "1"): ?>selected<?php endif; ?>>正常状态</option>
                             <option value="2" <?php if(($fen_info["fen_status"]) == "2"): ?>selected<?php endif; ?>>停止状态</option>
                             <option value="3" <?php if(($fen_info["fen_status"]) == "3"): ?>selected<?php endif; ?>>延期状态</option>
                             <option value="4" <?php if(($fen_info["fen_status"]) == "4"): ?>selected<?php endif; ?>>准备发货状态</option>
                             <option value="5" <?php if(($fen_info["fen_status"]) == "5"): ?>selected<?php endif; ?>>项目结束状态</option>
                        </select>

                    </td>

                    <td > 
                         <label for="fen_he_money">合&nbsp;&nbsp;同&nbsp;&nbsp;总金额：</label>    
                        <input type="text"   style="border-left:0px;border-right:0px;border-top:0px;" 
                        id="fen_he_money" size="32" name="fen_he_money" value="<?php echo ($fen_info["fen_he_money"]); ?>" placeholder="只填数字即可"/>
                    </td>


            </tr>

            <tr>
                <td align="left">
                     <label for="fen_money">预付款情况：</label>
                       <input type="text"   style="border-left:0px;border-right:0px;border-top:0px;" 
                        id="fen_money" size="44" name="fen_money" value="<?php echo ($fen_info["fen_money"]); ?>" placeholder="" /> 
                </td>
            </tr>

            <tr>
                 
                    <td  colspan="4" align="left">
                        <label for="fen_xi" style="vertical-align:top;">项目细分：</label>
                      
                        <textarea style="border:1px solid #ABCDEF;" name="fen_xi" id="fen_xi" cols="120" rows="2"><?php echo ($fen_info["fen_xi"]); ?></textarea>
                  </td>
 
            </tr>

            <tr>
                <td colspan="4" align="center">
                    <input type="submit" style="padding:5px;background:#FF6633;color:white;font-weight:normal;font-size:12px;cursor:pointer;" onclick="" value=" 修  改 "  />
                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="reset" style="padding:5px;background:#FF6633;color:white;font-weight:normal;font-size:12px;cursor:pointer;" onclick="" value=" 取  消 "  />
                </td>
            </tr>
        </table>

        </form>
        <br>
        <br>
           <!-- 基本信息修改结束 -->

            <!-- 新增预付款详情开始 -->
          <table width="100%" style="border-collapse:collapse;margin-bottom:50px;" cellpadding="4" cellspacing="0" border="1" class="bj-1" id="fen_jieduan_table">
                <legend><h3>金开瑞<?php echo ($fen_info["fen_he"]); ?>服务—实验阶段付款情况</h3></legend>

                 <!--    <input type="hidden" name="fen_guan_id" value="<?php echo ($fen_info["id"]); ?>" />
                    <input type="hidden" name="trace_pro_id" value="<?php echo ($trace_pro_id); ?>" /> -->
                <tr>
                    <td colspan="3">
                        <!-- test -->
                        <div style="text-align:center;width:100%;">合同 总金额:<span style="color:red;font-style:italic;"><?php echo ($fen_info["fen_he_money"]); ?>元</span>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        预付款情况:<span style="color:red;font-style:italic;"><?php echo ($fen_info["fen_money"]); ?></span>
                       </div>
                    </td>
                </tr>   
                   
                <tr class="jieduan_header">
                    <!-- <td width="140" align="center" class="bj-3">编号</td> -->
                    <td align="center" class="bj-3">
                     项目阶段付款日期
                    </td>

                    <td align="center"  class="bj-3">项目阶段付款数目(单位：元)</td>

                    <td align="center" class="bj-3">
                       操作  
                    </td>

                </tr>
                
                <?php if(is_array($jieduan_list)): foreach($jieduan_list as $key=>$rows): ?><tr class="jieduan_content">
                    <!-- <td width="140" align="center" class="bj-3">1</td> -->
                    <td align="center" class="bj-3">
                        <?php echo (date("Y-m-d",$rows["jieduan_date"])); ?>
                    </td>
                    <td align="center"  class="bj-3">

                        <?php echo ($rows["jieduan_money"]); ?>
                    </td>

                    <td align="center" class="bj-3">
                       <!--  <a href="">编辑</a>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp; --><a href="javascript:void(0);" class="" onclick="jieduan_del(<?php echo ($rows['id']); ?>);" >删除</a>

                    </td>
                  </tr><?php endforeach; endif; ?>
                  
                  <!--  <tr>
                    <td    align="center" class="bj-3">
                     使用说明：
                    </td>
                    <td colspan="2"   align="left" class="bj-3">
                        <br/>
                       a.若要编辑某个<span style="color:red;font-style:italic;">"项目阶段付款日期"</span>或者<span style="color:red;font-style:italic;">"项目阶段付款数目"</span>时，只需要在当前的列表中直接修改，修改完后，单击操作中对应的<span style="color:red;font-style:italic;">"编辑"</span>即可。
                       <br/>
                       b.若要删除某一列，只需单击操作中对应的<span style="color:red;font-style:italic;">"删除"</span>即可。
                    </td>
                  </tr> -->

                    <tr>
                       

                            <td    align="center" class="bj-3">
                             添加阶段付款信息：   
                            </td>

                            <td colspan="2"   align="left" class="bj-3">

                        <!--  <form  action="<?php echo U('Pro/fen_jieduan',array('type'=>$type));?>" onsubmit="return check_jieduan();" method="post" autocomplete="off" >  --> 

                              <input type="hidden" id="hid_jieduan_id" name="hid_jieduan_id" value="<?php echo ($fen_info["id"]); ?>" />

                            日期: &nbsp;<input type="text" name="jieduan_date" id="jieduan_date" size="30" onClick="WdatePicker();" />
                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
                            阶段付款: &nbsp;<input type="text" name="jieduan_money" id="jieduan_money" size="30" placeholder="只填数目即可,不需加单位" />
                             &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                             <input type="button" name="" id="jieduan_add" style="padding:5px;background:#FF6633;color:white;font-weight:normal;font-size:12px;cursor:pointer;" value="增 添" />

                          <!--  </form> -->

                            </td>                    
                  </tr>
    
     </table>
           <!-- 新增预付款详情结束 -->
        <!-- <br/> -->
        <br/>

           
      <form id="form_fen_a" action="<?php echo U('Pro/fen_trace_editor',array('type'=>$type));?>" onsubmit="return checkInfo();" method="post" autocomplete="off" enctype="multipart/form-data">
 
        <table width="100%" style="border-collapse:collapse;" cellpadding="4" cellspacing="0" border="1" class="bj-1">
                <legend><h3>金开瑞<?php echo ($fen_info["fen_he"]); ?>服务项目任务跟进单</h3></legend>

                    <input type="hidden" name="fen_guan_id" value="<?php echo ($fen_info["id"]); ?>" />
                    <input type="hidden" name="trace_pro_id" value="<?php echo ($trace_pro_id); ?>" />
                    

                <tr>
                    <td width="140" align="center" class="bj-3">项目编号</td>
                    <td align="left" class="bj-3">
                         
                        <input type="text" size="60" value="<?php echo ($fen_info["fen_he"]); ?>" id="fen_pro_num" readonly/>
                    </td>
                    <td align="center"  class="bj-3">子项目负责人</td>
                    <td align="left" class="bj-3">
                        <input type="text" size="52" name="fen_pro_man" value="<?php echo ($fen_arr['fen_pro_man']); ?>" id="fen_pro_man" />
                    </td>
                </tr>

                 <tr>
                    <td align="center" class="bj-3">项目名称</td>
                    <td align="left" colspan="3" class="bj-3">
                         <input type="text" size="138" value = "<?php echo ($fen_info["fen_pro"]); ?>" readonly/>
                     </td>
                   
                </tr>

                 <tr>
                    <td align="center" class="bj-3">项目简介</td>
                    <td align="left" colspan="3" class="bj-3">
                         <input type="text" size="138" name="fen_pro_js" value="<?php echo ($fen_arr['fen_pro_js']); ?>" id="fen_pro_js" />
                    </td>
                   
                </tr>

                 <tr>
                    <td align="center" class="bj-3">样品信息说明</td>
                    <td align="left" colspan="3" class="bj-3">
                         <input type="text" size="138" name="fen_pro_sm" value="<?php echo ($fen_arr['fen_pro_sm']); ?>" id="fen_pro_sm" />
                    </td>
                   
                </tr>
                
                  <tr>
                    <td width="140" align="center" class="bj-3">样品接收时间(启动时间)</td>
                    <td align="left" class="bj-3">
                        <!-- PB1-1508005 -->
                        <input type="text" size="60" name="fen_pro_date" value="<?php echo ($fen_arr['fen_pro_date']); ?>"  id="fen_pro_date" />
                    </td>
                    <td align="center" class="bj-3">样品说明</td>
                    <td align="left" class="bj-3">
                        <input type="text" size="52" name="fen_pro_ys" value="<?php echo ($fen_arr['fen_pro_ys']); ?>" 
                        id="fen_pro_ys" />
                      <!-- <textarea name="" id="" cols="30" rows="2"> -->

                    </td>
                </tr>
                 <!-- <tr>
                    <td align="center" class="bj-3">样品验收时间及说明</td>
                    <td align="left" colspan="3" class="bj-3">
                         <input type="text" size="120" name="fen_pro_ts" id="fen_pro_ts"/>
                    </td>
                  
                </tr> -->
                <?php if(is_array($pro_arr)): foreach($pro_arr as $key=>$fen_row): ?><tr class="pro_add">
                      
                      <input type="hidden" name="trace_hid_id" value="<?php echo ($fen_arr['id']); ?>" disabled/>



                    <td align="center" width="140" class="bj-3">
                        项目进度（第<?php echo (get_status($fen_row[0]?$fen_row[0]:1)); ?>周）
                    

                       <input type="hidden" name="hide_status" value="<?php echo ($fen_row['status']?$fen_row['status']:1); ?>">
                    </td>

                    <td align="left" width="250" class="bj-3"> 

                  <textarea style="border:0px;"  name="" id="" cols="50" rows="6" readonly><?php echo (get_content($fen_row[0])); ?>
</textarea>
                      
                 
                    </td>
                    <!-- 相关文件上传 -->
                    <td align="center" width="150" class="bj-3">
                       相关文件信息
                     
                    </td>

                    <td class="pro_picture" style="text-align:justify;" class="bj-3">
                        <span><h4><center>点击(缩略图,文件)查看详情</center></h5></span>
                        
                         <?php echo (get_file($fen_row[0])); ?>
                      
                    </td>
                </tr><?php endforeach; endif; ?> 

                <!-- 开始。。。 -->
                  <tr class="pro_add">
                      
                      <input type="hidden" name="trace_hid_id" value="<?php echo ($fen_arr['id']); ?>" />



                    <td align="center" width="140" class="bj-3">
                        项目进度（第<?php echo ($pang?$pang:1); ?>周）  
                 
                       <input type="hidden" name="hide_status" value="<?php echo ($pang?$pang:1); ?>">
                      </td>

                    <td align="left" width="250" class="bj-3"> 

                     <textarea data_id ="<?php echo ($fen_row['id']); ?>" name="fen_pro_jd" id="fen_pro_jd" cols="50" rows="6"><?php echo ($pro_content?$pro_content:''); ?></textarea> 
                    </td>  
                    <!-- 相关文件上传 -->
                    <td align="center" width="150" class="bj-3">
                         
                        <input  type="file" value="开始上传" name="fen_pro_file[]" id="fen_pro_file" style="border:0px solid red;width:150px;" size="5" multiple /><br/>
                        <span style="color:red;font-style:italic;">(附件上传)</span>
                    </td>

                    <td class="pro_picture" style="text-align:justify;" class="bj-3">  
                          <span><h4><center>点击(缩略图,文件)查看详情</center></h5></span>  
                  
                           <?php echo (curr_file($pang_a?$pang_a:1)); ?>                   
                      
                    </td>
                </tr>  

               <!-- 结束。。。 -->

                <tr class="fen_info">
                   <td colspan="4" align="center">
                    <br>
                    <input type="submit" style="padding:5px;background:#FF6633;color:white;font-weight:normal;font-size:12px;cursor:pointer;" onclick="" value=" 编  辑 "  />
                     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="reset" style="padding:5px;background:#FF6633;color:white;font-weight:normal;font-size:12px;cursor:pointer;" onclick="" value=" 取  消 "  />
                  </td>
                </tr>

            </form>


            <tr >
                <td colspan="4" align="left">
                    <input class="pro_jd_wh" type="button" style="padding:5px;background:green;color:white;font-weight:normal;font-size:12px;cursor:pointer;" onclick="" value=" 添加新项目进度>> "  /> 
                </td>
            </tr>

           <!--  <tr style="border-bottom:0px;">
                <td colspan="4" align="left" style="border-bottom:0px;">
                    &nbsp;
                </td>    
            </tr> -->
            <tr>
                <td colspan="3">
                    &nbsp;&nbsp;&nbsp;&nbsp;输入发送者邮箱：<input type="text" name="send_email" 
                    id="send_email" size="36" list="wh"/>
                    
                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    输入发送者密码：<input type="password" name="send_password" id="send_password" size="36"/>
                </td>
                <td   align="center">
                    <br/>
                    <span style="vertical-align:top;font-style:italic;color:red;">(点击下面图标发送邮箱！)</span><br/>
                      <img id="email_send" src="/Public/Logo/images/email.png" style="cursor:pointer;" title="点击发送邮件!" width="50" height="50" alt="点击发送邮件!" />
                      <!--  <br/>发送时间：<span class="datatime"> </span> -->
                    <!-- <input type="button" style="cursor:pointer;" value="  发送邮件  " /> -->
                    <br/>
                </td>    
                
            </tr>

             <tr>
                <td colspan="4" align="right">
                    <br/><br/>
                    <input class="pro_jd_back" type="button" style="padding:5px;background:#FF6633;color:white;font-weight:normal;font-size:12px;cursor:pointer;" onclick="" value=" 返回>> "  /> 
                </td>    
            </tr>
              



                
             
             
           
     
</table>
<!-- </form> -->
</body>
<style type="text/css">
    #search{
        cursor:pointer;
    }
    #select7{
        cursor:pointer;
    }
    #pre{
        cursor:pointer;
    }
    #next{
        cursor:pointer;
    }
    input{
        border:1px solid #ABCDEF;
    }
    .fen_more:hover{
        color:red;
    }
    textarea{
        border:1px solid #ABCDEF;
    }
    .fen_info{
        border-left:0px solid white;
        border-right:0px solid white;
        border-bottom:0px solid white;


    }
    .pro_del:hover{
        color:red;
        cursor:pointer;
    }

</style>
<script>
    function jieduan_del(mm){
        // alert("dsadasd");
        
        if(confirm('您确定要删除该条信息吗？')){
            // alert(mm);

             $.ajax({
               type: "post",
               url: "/index.php/Manage/Pro/jieduan_del",
               data:"id="+mm,
               success: function(msg){
               // alert(msg);
               if(msg == '222'){
                alert('删除失败！');
               }
               if(msg == '111'){
                // alert('删除成功！');
                window.location.reload();
               }
           }
          });

        }
    }

    $(function(){

        // 新增预付款详情开始 
         $("#jieduan_add").unbind('click').click(function(){

         var jieduan_date = $.trim($("#jieduan_date").val());

        if(jieduan_date == ''){
          
         alert('实验阶段付款日期必须填写！');
         document.getElementById("jieduan_date").value='';
         $("#jieduan_date").focus();
         return false;
        }

         var jieduan_money = $.trim($("#jieduan_money").val());
        if(jieduan_money == ''){
         
         alert('实验阶段付款数必须填写！');
         document.getElementById("jieduan_money").value='';
         $("#jieduan_money").focus();
         return false;
        }

        var jieduan_id = $("#hid_jieduan_id").val();

        // alert("aaaaa");
         $.ajax({
           type: "post",
           url: "/index.php/Manage/Pro/fen_jieduan",
           data:"jieduan_id="+jieduan_id+"&jieduan_date="+jieduan_date+"&jieduan_money="+jieduan_money,
           success: function(msg){
              // alert(msg);
              // if(msg == '123'){

              // }

              if(msg == '456'){
               alert("添加失败！");
              }else{
                $(".jieduan_content").remove();
                $(".jieduan_header").after(msg);
                 document.getElementById("jieduan_date").value='';
                  document.getElementById("jieduan_money").value='';


              }
           }

          });




         });       

        // 新增预付款详情结束
        //发送者信息


        //发送邮件
        $("#email_send").click(function(){
         send_email = $("#send_email").val();//发送者邮箱
         send_email = $.trim(send_email);
         send_password = $("#send_password").val();//发送者密码
         send_password = $.trim(send_password);

         if(send_email==''){
          alert('发送者邮箱不能为空！');
          document.getElementById('send_email').value='';
          $("#send_email").focus();
          return false;
         }

         if(send_password==''){
          alert('发送者邮箱密码不能为空！');
          document.getElementById('send_password').value='';
          $("#send_password").focus();
          return false;
         }

         email = $("#fen_email").val();
         email = $.trim(email); //接收人邮箱

         pro_name = $("#fen_pro").val();
         pro_name = $.trim(pro_name);
          // alert(pro_name); 
            // alert("aaaaa");
         $.ajax({
           type: "GET",
           url: "/index.php/Manage/Pro/fen_email",
    data:"email="+email+"&pro_name="+pro_name+"&send_email="+send_email+"&send_password="+send_password,
           success: function(msg){
             msg = msg.replace(/<[^>]+>/g,"");
             msg = msg.replace("alert('","");
             msg = msg.replace("');window.history.back();",""); 
            alert(msg);
            // var myDate = new Date();
            // $(".datatime").html(myDate.toLocaleString());
         }

        });

            // window.location = "<?php echo U('Pro/fen_email');?>";


        });

        $(".pro_jd_back").click(function(){
          window.history.back();
        });
        // alert('aa');
        // $("#fen_index").click(function(){
            
        //     window.history.back();
        // });
          count = <?php echo ($pang); ?>+1; 

        $(".pro_jd_wh").click(function(){

           // haha = "<?php echo ($pro_content); ?>";
           // alert(count-1);
           // if(haha == ''){
           //  alert('aaaa');
           //  return false;
           // } 

          if(window.confirm('您确定要执行下一进度吗?\n如果是，则上一进度信息无法修改。')){


         str = "<tr class=\'pro_add\'><td align=\"center\" width=\"140\" class=\"bj-3\"> ";
         str +="项目进度（第"+count+"周）";
         str +="<input type=\"hidden\" name=\"hide_status\" value="+count+">";
         str +="</td><td align=\"left\" width=\"250\" class=\"bj-3\"> ";
         str += "<textarea name=\"fen_pro_jd\" id=\"fen_pro_jd\" cols=\"50\" rows=\"6\"> </textarea> ";
         str += "</td><td align=\"center\" width=\"150\" class=\"bj-3\">";
         str += "<input  type=\"file\" value=\"开始上传\" name=\"fen_pro_file[]\" id=\"fen_pro_file\" ";
         str += "style=\"border:0px solid red;width:150px;\" size=\"5\" multiple /><br/> ";
         str += "<span style=\"color:red;font-style:italic;\">(附件上传)</span>";
         str += "</td><td class=\"pro_picture\" style=\"text-align:justify;\" class=\"bj-3\">";
         str += "<span><h4><center>点击缩略图查看详情</center></h5></span></td></tr>";   
         // $(".pro_add:last").after(str);
          
          // alert($(".pro_add textarea:last").attr('data_id'));
          data_id = $(".pro_add textarea:last").attr('data_id');
           
           $.ajax({
           type: "GET",
           url: "/index.php/Manage/Pro/fen_row_add",
           data:"id="+data_id+"&status_id="+count+"&trace_id="+<?php echo ($trace_pro_id); ?>,
           success: function(msg){

            if(msg == '123'){
                alert('上一进度的内容不能为空！');
                $(".pro_add textarea:last").focus();
                return false;
            }
             // alert(msg);
             // $("#fen_row_"+data_id).before(msg);
             $(".pro_add:last").before(msg);
             $(".pro_add:last").before(str);
             $(".pro_add:last").remove();
             
           }

        });

            // $("#fen_pro_jd_"+count).focus();
            // alert("#fen_pro_jd_"+count);
         // switch(count){
         // case 2: str = "二";break;
         // }   

        
         // alert("aaa");

           }else{
            return false;
          }  
          count ++;
        });

        $(".pro_del").click(function(){
            // $(this).remove();
            alert('aaaa')
        })

        $(".fen_row_del").click(function(){
         // alert('aaa');
         id = $(this).attr("value");
         // alert(id);
         // ip = $(".fen_row_a").attr("data_value");
          if(window.confirm('您确定要删除吗？')){
          $.ajax({
           type: "GET",
           url: "/index.php/Manage/Pro/fen_row_del",
           data:"id="+id,
           success: function(msg){
             // alert(msg);
             // window.location.reload();
           
               $("#fen_row_"+id).remove();

            
           }

        });
          return true;
      }else{
        return false;
      }


        });
    });

</script>


</html>