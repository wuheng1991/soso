<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>武汉金开瑞生物工程有限公司</title>
<link href="/Public/Consel/css/style.css" rel="stylesheet" type="text/css">
<script  src="/Public/Consel/js/jquery.js"></script>
<!-- <script  src="/Public/Consel/js/jquery-ui.min.js"></script>
<link href="/Public/Consel/js/jquery-ui.min.css" rel="stylesheet" type="text/css" /> -->
</head>
<script>
// $(document).ready(function(){
//     $( "#stime" ).datepicker({
//         dateFormat:'yy-mm-dd'
//     });
//     $( "#etime" ).datepicker({
//         dateFormat:'yy-mm-dd'
//     });
//     var p = <?php echo ($page); ?>;
//     var countP = <?php echo ($pages); ?>;
//     $('#next').click(function(){
//         var dang = p + 1;
//         if (p<countP){
//             $('#page').val(dang);
//         } else {
//             $('#page').val(countP);
//             return false;
//         }
//         $('#sequencingForm').submit();
//     });
//     $('#pre').click(function(){
//         if (p<2) return false;
//         var pdang = p - 1;
//         $('#page').val(pdang);
//         $('#sequencingForm').submit();
//     });
//     $('#select7').change(function(){
//         $('#page').val($(this).val());
//         $('#sequencingForm').submit();
//     });
//     $('#search').click(function(){
//         $('#page').val('');
//         $('#sequencingForm').submit();
//     });
// });
</script>
<body>
<table width="100%" border="0" cellpadding="0" cellspacing="0" background="/Public/Consel/images/hui.jpg">
    <tr>
        <td>&nbsp;</td>
    </tr>
</table>
<!-- <form id="sequencingForm" method="post" autocomplete="off" action="<?php echo U('User/searchlist');?>"> -->
<input type="hidden" name="page" id="page" value="<?php echo ($page); ?>" />
<table width="80%" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
        <td width="100%" align="center" valign="top" bgcolor="#FFFFFF">
            <table width="100%" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <td>
                        <table width="100%" cellpadding="0" cellspacing="0" border="0" align="center" style="border-bottom:#ccc solid 1px; margin-bottom:10px;">
                            <tr>
                                <td width="2%" height="30"><img src="/Public/Consel/images/2_r1.jpg" /></td>
                                <td width="73%" class="index-5"><span class="index-7">欢迎<font style="color:#f57e20;">
                                  <!--   <?php echo session('admin-name');?> -->
                                   <?php echo ($user); ?>
                                </font>，您已登录成功！
                                    <a href="<?php echo U('User/logout');?>"  target=_top>退出</a></span></td>
                                <td width="25%">
                                    <a href="/index.php/Index.html" target="_self">前台主页</a>&nbsp;&nbsp;&nbsp;&nbsp;
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
           <!--  <br>
            <br> -->
            <!-- <br> -->
            <!-- <hr> -->
              

               <table class="fen_list" width="100%" cellpadding="4" cellspacing="0" border="0" align="center">
                <legend><h3><center><span style="color:green;">
                     <?php if(($commom_type) == "1"): ?>综合服务<?php endif; ?>
                     <?php if(($commom_type) == "2"): ?>蛋白组学<?php endif; ?>
                     <?php if(($commom_type) == "3"): ?>蛋白及抗体<?php endif; ?>
                     <?php if(($commom_type) == "4"): ?>分子生物学服务<?php endif; ?>
                     <?php if(($commom_type) == "5"): ?>病毒包装及检测服务<?php endif; ?>
                     <?php if(($commom_type) == "6"): ?>小分子抗原及ElisA开发<?php endif; ?>项目跟踪基本信息</span></center></h3></legend>
                    <input type="hidden" name="hid_id" value="<?php echo ($fen_info["id"]); ?>" />

                    <tr>
                        <td width="38%"><label for="fen_position">地区位置：</label> 
                         
                        <input type="radio"  id="fen_position_s" value="2" name="fen_position" disabled 
                        <?php if(($fen_info['fen_position']) == "2"): ?>checked<?php endif; ?>/>南
                            <input type="radio"  id="fen_position_n" value="1" name="fen_position" disabled
                            <?php if(($fen_info['fen_position']) == "1"): ?>checked<?php endif; ?>/>北
                        </td>
                    </tr>

                    <tr>
                         
                        <td width="38%">
                         <label for="fen_name">地区名称：</label>
                         <input type="text" style="border-left:0px;border-right:0px;border-top:0px;" id="fen_name" size="45" name="fen_name" value="<?php echo ($fen_info["fen_name"]); ?>" readonly/>
                        </td>

                        <td align="left" width="31%">
                        <label for="">销售员：</label>
                        <input type="text"  style="border-left:0px;border-right:0px;border-top:0px;" id="fen_sale" size="30" name="fen_sale" value="<?php echo ($fen_info["fen_sale"]); ?>" readonly/>
                        </td>

                        <td width="31%"> 
                        <label for="fen_he">合&nbsp;&nbsp;同&nbsp;&nbsp;编&nbsp;&nbsp;号：</label>
                        <input type="text"  style="border-left:0px;border-right:0px;border-top:0px;" id="fen_he" size="32" name="fen_he" value="<?php echo ($fen_info["fen_he"]); ?>" readonly/>
                        </td>
                                
                 
            </tr>
            <tr>
                    <td>
                        <label for="fen_customer">客户单位：  </label> 
                        <input type="text"  style="border-left:0px;border-right:0px;border-top:0px;" id="fen_customer" size="45" name="fen_customer" value="<?php echo ($fen_info["fen_customer"]); ?>" readonly/>           
                     </td>

                        <td>
                         <label for="fen_contact">联系人：</label>
                         <input type="text"  style="border-left:0px;border-right:0px;border-top:0px;" id="fen_contact" size="30" name="fen_contact" value="<?php echo ($fen_info["fen_contact"]); ?>" readonly/>
                        </td>


                        <td > 
                        <label for="fen_date_xian">合&nbsp;&nbsp;同&nbsp;&nbsp;期&nbsp;&nbsp;限：</label>
                        <input type="text"  style="border-left:0px;border-right:0px;border-top:0px;" id="fen_date_xian" size="32" name="fen_date_fen" disabled value="<?php echo ($fen_info["fen_date_xian"]); ?>"/>
                        </td>
                                
                 
            </tr>
            <tr>
                <td align="left"> 
                        <label for="fen_Email">客户Email：</label>   
                        <input type="text"  style="border-left:0px;border-right:0px;border-top:0px;" id="fen_Email" size="44" name="fen_Email" value="<?php echo ($fen_info["fen_email"]); ?>" readonly/>
                    </td>
                        <td align="left"> 
                        <label for="fen_pi">实验室负责人：</label>    
                                   
                        <input type="text"  style="border-left:0px;border-right:0px;border-top:0px;" id="fen_pi" size="25" name="fen_pi" value="<?php echo ($fen_info["fen_pi"]); ?>" readonly/>
                    </td>

                    <td > 
                        <label for="fen_date">预计项目周期：</label>
                        <input type="text"  style="border-left:0px;border-right:0px;border-top:0px;" id="fen_date" size="32" name="fen_date"  value="<?php echo ($fen_info["fen_date"]); ?>" readonly/>
                    </td>
            </tr>
            <tr>
                <td align="left"> 
                        <label for="fen_pro">项目名称：</label>   
                        <input type="text"  style="border-left:0px;border-right:0px;border-top:0px;" id="fen_pro" size="45" name="fen_pro" value="<?php echo ($fen_info["fen_pro"]); ?>" readonly/>
                    </td>
                        <td align="left"> 
                        <label for="fen_status">项目状态：</label>    
                     
                        
                        <select name="fen_status" id="fen_status" disabled>
                             <option value="0" <?php if(($fen_info["fen_status"]) == "0"): ?>selected<?php endif; ?>>请选择状态</option>
                             <option value="1" <?php if(($fen_info["fen_status"]) == "1"): ?>selected<?php endif; ?>>正常状态</option>
                             <option value="2" <?php if(($fen_info["fen_status"]) == "2"): ?>selected<?php endif; ?>>停止状态</option>
                             <option value="3" <?php if(($fen_info["fen_status"]) == "3"): ?>selected<?php endif; ?>>延期状态</option>
                             <option value="4" <?php if(($fen_info["fen_status"]) == "4"): ?>selected<?php endif; ?>>准备发货状态</option>
                             <option value="5" <?php if(($fen_info["fen_status"]) == "5"): ?>selected<?php endif; ?>>项目结束状态</option>
                        </select>

                    </td>
            </tr>
            <tr>
                 
                    <td  colspan="4" align="left">
                        <label for="fen_xi" style="vertical-align:top;">项目细分：</label>
                      
                        <textarea style="border:1px solid #ABCDEF;" name="fen_xi" id="fen_xi" cols="120" rows="2" readonly><?php echo ($fen_info["fen_xi"]); ?></textarea>
                  </td>
 
            </tr>

         <!--    <tr>
                <td colspan="4" align="center">
                    <input type="submit" style="padding:5px;background:#FF6633;color:white;font-weight:normal;font-size:12px;cursor:pointer;" onclick="" value=" 修  改 "  />
                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="reset" style="padding:5px;background:#FF6633;color:white;font-weight:normal;font-size:12px;cursor:pointer;" onclick="" value=" 取  消 "  />
                </td>
            </tr> -->
        </table>
              <br>

              <br>  

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

                   

                </tr>
                
                <?php if(is_array($jieduan_list)): foreach($jieduan_list as $key=>$rows): ?><tr class="jieduan_content">
                    <!-- <td width="140" align="center" class="bj-3">1</td> -->
                    <td align="center" class="bj-3">
                        <?php echo (date("Y-m-d",$rows["jieduan_date"])); ?>
                    </td>

                    <td align="center"  class="bj-3">

                        <?php echo ($rows["jieduan_money"]); ?>
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

                    
    
       </table>
           <!-- 新增预付款详情结束 -->
        <!-- <br/> -->
        <br/>

        <table width="100%" style="border-collapse:collapse;" cellpadding="4" cellspacing="0" border="1" class="bj-1">
                <legend><h3>金开瑞<?php echo ($fen_info['fen_he']); ?>服务项目任务跟进单</h3></legend>
                <tr>
                    <td width="140" align="center" class="bj-3">项目编号</td>
                    <td align="center" width="420" class="bj-3"><?php echo ($fen_info['fen_he']); ?></td>
                    <td align="center" class="bj-3">子项目负责人</td>
                    <td align="center" class="bj-3"><?php echo ($fen_arr['fen_pro_man']); ?></td>
                </tr>
                 <tr>
                    <td align="center" class="bj-3">项目名称</td>
                    <td align="left" colspan="3" class="bj-3"><?php echo ($fen_info["fen_pro"]); ?></td>
                   
                </tr>
                 <tr>
                    <td align="center" class="bj-3">项目简介</td>
                    <td align="left" colspan="3" class="bj-3"><?php echo ($fen_arr['fen_pro_js']); ?></td>
                   
                </tr>
                 <tr>
                    <td align="center" class="bj-3">样品信息说明</td>
                    <td align="left" colspan="3" class="bj-3"><?php echo ($fen_arr['fen_pro_sm']); ?></td>
                   
                </tr>

                 <tr>
                    <td width="140" align="center" class="bj-3">样品接收时间(启动时间)</td>
                    <td align="left" class="bj-3">
                        <!-- PB1-1508005 -->
                        <?php echo ($fen_arr['fen_pro_date']); ?>
                    </td>
                    <td align="center" class="bj-3">样品说明</td>
                    <td align="left" class="bj-3">
                       <?php echo ($fen_arr['fen_pro_ys']); ?>
                      <!-- <textarea name="" id="" cols="30" rows="2"> -->

                    </td>
                </tr>

                <!--  <tr>
                    <td align="center" class="bj-3">样品验收时间及说明</td>
                    <td align="center" colspan="3" class="bj-3"></td>
                  
                </tr> -->
                <?php if(is_array($pro_arr)): foreach($pro_arr as $key=>$fen_row): ?><tr class="pro_add">
                      
                      <input type="hidden" name="trace_hid_id" value="<?php echo ($fen_arr['id']); ?>" disabled/>



                    <td align="center" width="140" class="bj-3">
                        项目进度（第<?php echo (get_status($fen_row[0]?$fen_row[0]:1)); ?>周）
                    

                       <input type="hidden" name="hide_status" value="<?php echo ($fen_row['status']?$fen_row['status']:1); ?>">
                    </td>

                    <td align="left" width="250" class="bj-3"> 

<textarea style="border:0px;"  name="" id="" cols="50" rows="6" readonly><?php echo (get_content($fen_row[0])); ?></textarea>
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

                
             
                
                
               <tr>
                <td align="center" colspan="4">
                    <br>
                    <button id="fen_index" onclick="flag();" style="padding:8px;background:#FF6633;color:white;font-weight:bold;font-size:16px;cursor:pointer;">返回上一步</button>
                </td>
                
               </tr>

               
                 
            </table>
            <br/>
            <br/>
           
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
</style>
<script>
    // $(function(){
        // alert('aa');
        // $("#fen_index").click(function(){
            // window.location='<?php echo U("Pro/fen_more");?>';
            // window.history.back();
            // http = <?php echo $_SERVER["HTTP_REFERER"];?> ;
            // alert(http);
            // alert(<?php echo ($flag); ?>);
            // aaa = 'aaaaaaa';
            // alert(aaa);
            // if(aaa == ''){
              // window.location.href="<?php echo U('Pro/fen_editor',array('id'=>$id));?>";
              // window.history.back();

              
    //         }else{
    //           alert('aaa');
    //         }
    //     })
    // })
  function flag(){
    // alert('xx');
    xx = "<?php echo $flag;?>";
    // alert(xx);
    if(xx == 'flag'){
     window.location = "<?php echo U('Pro/fen_editor',array('id'=>$id));?>";
    }else{
    window.history.back();
    }
  }
</script>


</html>