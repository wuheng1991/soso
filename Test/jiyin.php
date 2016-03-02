<?php
header("content-type:text/html;charset=utf-8");
require "PHPEXCEL/Classes/PHPExcel.php";
require "PHPEXCEL/Classes/PHPExcel/IOFactory.php";
require "PHPEXCEL/Classes/PHPExcel/Reader/Excel5.php";
require "PHPEXCEL/Classes/PHPExcel/Reader/Excel2007.php";
require "PHPEXCEL/Classes/PHPExcel/Reader/Excel2003XML.php";
require "PHPEXCEL/Classes/PHPExcel/Writer/Excel2007.php";
require "PHPEXCEL/Classes/PHPExcel/Writer/Excel5.php";

$phpexcel = new PHPExcel();

$id = intval(trim($_GET['id']));
// echo $id;
// exit;

$con = mysql_connect('localhost',"root","root");
mysql_set_charset("utf-8");
$select = mysql_select_db("geneorders");

$code_sql = "select code_yw,uid,sale_name,gs_num,gs_he,addtime from ge_orders where id = {$id}";
$code_query = mysql_query($code_sql);
$code_row = mysql_fetch_assoc($code_query);
$code_yw = $code_row['code_yw']; //订单号
$uid = $code_row['uid']; //用户id 
$sale_name = $code_row['sale_name'];//销售名称
$gs_num = $code_row['gs_num'];//金凯瑞编号
$gs_he = $code_row['gs_he'];//合同编号
$addtime = $code_row['addtime'];//订购日期
$addtime = date("Y-m-d",$addtime);

// var_dump($code_yw);

$code_a = "select company,province,city,name,phone from ge_members_info where uid = {$uid}";
$code_a_query =  mysql_query($code_a);
$code_a_row = mysql_fetch_assoc($code_a_query);
$company = $code_a_row['company']; //所在单位
$province_a = $code_a_row['province'];
$province_a = intval($province_a);
$city_a = $code_a_row['city'];
$city_a = intval($city_a);
$name = $code_a_row['name']; //客户姓名
// echo $province_a;
// var_dump($code_a_row);
// echo "aa";
// exit;

$phone = $code_a_row['phone'];//客户电话

$code_ab = "select username from ge_members where id = {$uid}";
$code_ab_query = mysql_query($code_ab);
$code_ab_row = mysql_fetch_assoc($code_ab_query);
$username = $code_ab_row['username'];//客户邮箱


$code_aa = "select name from ge_area where id = {$province_a}";
// echo "<br/>";
// echo $code_aa;
// echo "<br/>";
$code_aa_query =  mysql_query($code_aa);
$code_aa_row = mysql_fetch_assoc($code_aa_query);
$province = $code_aa_row['name']; //省份
// var_dump($code_aa_row);
// exit;

$code_bb = "select name from ge_area where id = {$city_a}";
$code_bb_query =  mysql_query($code_bb);
$code_bb_row = mysql_fetch_assoc($code_bb_query);
$city = $code_bb_row['name']; //城市

$code_d = "select gene_name,gene_contents,gene_contents_num,gene_clone_ya,gene_serial_5,gene_serial_3,gene_clone_site,gene_clone_site_a,gene_clone_kx,gene_clone_cy from ge_gene where orderid = {$id}";
$code_d_query =  mysql_query($code_d);
$code_d_row = mysql_fetch_assoc($code_d_query);
$gene_name = $code_d_row['gene_name']; //基因名称
$gene_contents = $code_d_row['gene_contents']; //序列内容
$gene_contents_num = $code_d_row['gene_contents_num'];//碱基数
$gene_clone_ya = $code_d_row['gene_clone_ya'];//载体亚克隆名称
$gene_serial_5 = $code_d_row['gene_serial_5'];//5序列
$gene_serial_3 = $code_d_row['gene_serial_3'];//3序列
$gene_clone_site = $code_d_row['gene_clone_site'];//克隆位点5
$gene_clone_site_a = $code_d_row['gene_clone_site_a'];//克隆位点3
$gene_clone_kx = $code_d_row['gene_clone_kx'];//抗性
$gene_clone_cy = $code_d_row['gene_clone_cy'];//测序引物
$include = "";
$include .= "5'端序列：".$gene_serial_5." \n\t";
$include .= "3'端序列：".$gene_serial_3."\n\t";


$include .= "克隆位点5'：".$gene_serial_3."\n\t";

$include .= "克隆位点3'：".$gene_serial_3."\n\t";



// exit;
$code_title = "genecreate-".$code_yw; //设置标题


// $sql = "select a.sale_money,c.company, from ge_orders as a, ge_gene as b,ge_members_info as c 
// where orderid = {$id}";
// $query = mysql_query($sql);

// $row = mysql_fetch_assoc($query);
//  var_dump($row);
//   exit;
//设置比标题
// $phpexcel->getProperties()->setTitle("Office 2007 XLSX Test Document");
// $phpexcel->getProperties()->setSubject("Office 2003 XLS Test Document");
$phpexcel->getActiveSheet()->setTitle($code_title);
$phpexcel->getActiveSheet() ->setCellValue('A1','销售名称')
                            ->setCellValue('B1','所在单位')
                            ->setCellValue('C1',"省份")
                            ->setCellValue('D1','城市')
                            ->setCellValue('E1','客户姓名')
                            ->setCellValue('F1',"客户电话")  
                            ->setCellValue('G1',"客户邮箱")

                            ->setCellValue('H1','金开瑞编号')
                            ->setCellValue('I1',"合同编号")
                            ->setCellValue('J1',"基因名称")
                            ->setCellValue('K1',"订购日期")
                            ->setCellValue('L1','交期')
                            ->setCellValue('M1','截止日期')
                            ->setCellValue('N1','DNA序列或蛋白质序列')

                            ->setCellValue('O1','碱基数')
                            ->setCellValue('P1','难度')

                            ->setCellValue('Q1',"订单类型")
                            ->setCellValue('R1',"小片段")
                            ->setCellValue('S1','载体')            
                            ->setCellValue('T1','载体酶切位点')
                            ->setCellValue('U1','抗性')
                            ->setCellValue('V1','酶切鉴定位点')
                            ->setCellValue('W1','测序引物')
                            ->setCellValue('X1','发货日期')
                            ->setCellValue('Y1','发货备注');
                            
                            
$phpexcel->getActiveSheet()->getStyle('A1:Y1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);                            
//设置列的宽度
  $phpexcel->getActiveSheet()->getColumnDimension('A')->setWidth(18);
  $phpexcel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
  $phpexcel->getActiveSheet()->getColumnDimension('C')->setWidth(16);
  $phpexcel->getActiveSheet()->getColumnDimension('D')->setWidth(16);
  $phpexcel->getActiveSheet()->getColumnDimension('E')->setWidth(18);
  $phpexcel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
  $phpexcel->getActiveSheet()->getColumnDimension('G')->setWidth(26);
  $phpexcel->getActiveSheet()->getColumnDimension('H')->setWidth(28);
  $phpexcel->getActiveSheet()->getColumnDimension('i')->setWidth(28);
  $phpexcel->getActiveSheet()->getColumnDimension('j')->setWidth(22);
  $phpexcel->getActiveSheet()->getColumnDimension('k')->setWidth(16);
  $phpexcel->getActiveSheet()->getColumnDimension('L')->setWidth(16);
  $phpexcel->getActiveSheet()->getColumnDimension('M')->setWidth(16);
  $phpexcel->getActiveSheet()->getColumnDimension('N')->setWidth(40);
  $phpexcel->getActiveSheet()->getColumnDimension('O')->setWidth(12);
  $phpexcel->getActiveSheet()->getColumnDimension('P')->setWidth(12);
  $phpexcel->getActiveSheet()->getColumnDimension('Q')->setWidth(16);
  $phpexcel->getActiveSheet()->getColumnDimension('R')->setWidth(24);
  $phpexcel->getActiveSheet()->getColumnDimension('S')->setWidth(24);
  $phpexcel->getActiveSheet()->getColumnDimension('T')->setWidth(100);
  $phpexcel->getActiveSheet()->getColumnDimension('U')->setWidth(25);
  $phpexcel->getActiveSheet()->getColumnDimension('V')->setWidth(30);
  $phpexcel->getActiveSheet()->getColumnDimension('W')->setWidth(30);
  $phpexcel->getActiveSheet()->getColumnDimension('X')->setWidth(16);
  $phpexcel->getActiveSheet()->getColumnDimension('Y')->setWidth(35);
  
  //设置水平居中  
// $objPHPExcel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
$phpexcel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$phpexcel->getActiveSheet()->getStyle('B1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$phpexcel->getActiveSheet()->getStyle('C1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$phpexcel->getActiveSheet()->getStyle('D1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$phpexcel->getActiveSheet()->getStyle('E1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$phpexcel->getActiveSheet()->getStyle('F1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$phpexcel->getActiveSheet()->getStyle('G1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$phpexcel->getActiveSheet()->getStyle('H1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$phpexcel->getActiveSheet()->getStyle('I1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$phpexcel->getActiveSheet()->getStyle('J1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$phpexcel->getActiveSheet()->getStyle('K1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$phpexcel->getActiveSheet()->getStyle('L1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$phpexcel->getActiveSheet()->getStyle('M1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$phpexcel->getActiveSheet()->getStyle('N1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$phpexcel->getActiveSheet()->getStyle('O1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$phpexcel->getActiveSheet()->getStyle('P1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$phpexcel->getActiveSheet()->getStyle('Q1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$phpexcel->getActiveSheet()->getStyle('R1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$phpexcel->getActiveSheet()->getStyle('S1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$phpexcel->getActiveSheet()->getStyle('T1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$phpexcel->getActiveSheet()->getStyle('U1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$phpexcel->getActiveSheet()->getStyle('V1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$phpexcel->getActiveSheet()->getStyle('W1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$phpexcel->getActiveSheet()->getStyle('X1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$phpexcel->getActiveSheet()->getStyle('Y1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
 
//  
//从数据库取得需要导出的数据
//得到参数id值

// echo $select;
// echo "<br/>";

 
 // exit;
// foreach($list as $val){
// }   
$i = 2;
// while($row = mysql_fetch_assoc($query)){
//   if(intval($row['gene_serial_sel'])==1){
//    $row['gene_serial_sel'] = "DNA序列";
//   }else{
//    $row['gene_serial_sel'] = "蛋白质序列";
//   }

//   if(intval($row['gene_seo'])==1){
//    $row['gene_seo']="yes";

//    if(intval($row['gene_seo_host'])==0){
//    $row['gene_seo_host']="";
//    }elseif(intval($row['gene_seo_host'])==1){
//     $row['gene_seo_host']="Arabidopsis thaliana";
     
//    }elseif(intval($row['gene_seo_host'])==2){
//      $row['gene_seo_host']="Bacillus subtilis";
//    }elseif(intval($row['gene_seo_host'])==3){
//      $row['gene_seo_host']="Bos taurus";
//    }elseif(intval($row['gene_seo_host'])==4){
//      $row['gene_seo_host']="Brassica napus";
//    }elseif(intval($row['gene_seo_host'])==5){
//      $row['gene_seo_host']="Caenorhabditis elegans";
//    }elseif(intval($row['gene_seo_host'])==6){
//      $row['gene_seo_host']="Chlamydomonas reinhardtii";
//    }elseif(intval($row['gene_seo_host'])==7){
//      $row['gene_seo_host']="Cricetulus griseus";
//    }elseif(intval($row['gene_seo_host'])==8){
//      $row['gene_seo_host']="Drosophila melanogaster";
//    }elseif(intval($row['gene_seo_host'])==9){
//      $row['gene_seo_host']="Escherichia coli";
//    }elseif(intval($row['gene_seo_host'])==10){
//      $row['gene_seo_host']="Homo sapiens";
//    }elseif(intval($row['gene_seo_host'])==11){
//      $row['gene_seo_host']="Mus musculus";
//    }elseif(intval($row['gene_seo_host'])==12){
//      $row['gene_seo_host']="Nicotiana tabacum";
//    }elseif(intval($row['gene_seo_host'])==13){
//      $row['gene_seo_host']="Oryza sativa";
//    }elseif(intval($row['gene_seo_host'])==14){
//      $row['gene_seo_host']="Pichia pastoris";
//    }elseif(intval($row['gene_seo_host'])==15){
//      $row['gene_seo_host']="Saccharomyces cerevisiae";
//    }elseif(intval($row['gene_seo_host'])==16){
//      $row['gene_seo_host']="Zea mays";
//    }elseif(intval($row['gene_seo_host'])==17){
//      $row['gene_seo_host']="Other";
//    }else{
//      $row['gene_seo_host']="";
//    }

    
//   }else{
//    $row['gene_seo']="no";
//    $row['gene_seo_host']="";
//    $row['gene_seo_host_aa']="";
 
//    $row['gene_avoid_site']="";
//    $row['gene_save_site']="";
//    $row['gene_seo_result']="";
//    $row['gene_seo_result_a']="";
//    $row['gene_rel_serial']="";
//    $row['gene_seo_note']="";
   
//   }
  
//   $gene_clone = "";
//   if($row['gene_clone_method']=="0"){
//    $gene_clone ="";
//   }elseif($row['gene_clone_method']=="1"){

//    $gene_clone ="pUC57-Amp";

//   }elseif($row['gene_clone_method']=="2"){

//    $gene_clone ="pUC57-Kana";

//   }elseif($row['gene_clone_method']=="3"){

//    $gene_clone ="pUC57-Simple";

//   }elseif($row['gene_clone_method']=="4"){

//    $gene_clone ="pUC19-Amp(短基因默认)";

//   } 

//   if(intval($row['gene_other'])==2){
//   $row['gene_other']="是";
//   }else{
//     $row['gene_other']="否";
//   }

  

//   if(intval($row['gene_zhili_sel'])==2){

//     if(intval($row['gene_zhili_content'])==0){
//       $row['gene_zhili_content']="";
//     }elseif(intval($row['gene_zhili_content'])==1){
//       $row['gene_zhili_content']="100 μg";
//     }elseif(intval($row['gene_zhili_content'])==2){
//       $row['gene_zhili_content']="200 μg";
//     }elseif(intval($row['gene_zhili_content'])==3){
//       $row['gene_zhili_content']="300 μg";
//     }elseif(intval($row['gene_zhili_content'])==4){
//       $row['gene_zhili_content']="400 μg";
//     }elseif(intval($row['gene_zhili_content'])==5){
//       $row['gene_zhili_content']="500 μg";
//     }elseif(intval($row['gene_zhili_content'])==6){
//       $row['gene_zhili_content']="1 mg";
//     }else{
//       $row['gene_zhili_content']="";
//     }

//      $row['gene_zhili_content'] = "自定义质粒制备:".$row['gene_zhili_content'];

//     if(intval($row['gene_zhili_level'])==1){
//     $row['gene_zhili_level']="普通转化级";
//     }else{
//     $row['gene_zhili_level']="细胞转染级(去内毒素)";
    
//   } 
// }

// if(intval($row['gene_zhili_sel'])==1 || intval($row['gene_zhili_sel'])==0){
//    $row['gene_zhili_content']="准备交付: 2-4 μg (免费)";
 
//    $row['gene_zhili_level']="";
// }

// if(intval($row['gene_seo_result'])==1){
//  $row['gene_seo_result'] = "需要，ATG";
// }elseif(intval($row['gene_seo_result'])==2){
//    $row['gene_seo_result'] = "不需要";
  
// }else{
//   $row['gene_seo_result']="";
// }

// if(intval($row['gene_seo_result_a'])==1){
//  $row['gene_seo_result_a'] = "需要，TAG 或者 TAA 或者 TGA";
// }elseif(intval($row['gene_seo_result_a'])==2){
//    $row['gene_seo_result_a'] = "不需要";
    
// }else{
//   $row['gene_seo_result_a']="";
// }






	 
	$phpexcel->getActiveSheet() ->setCellValue('A'.$i,$sale_name)
                              ->setCellValue('B'.$i,$company)
                              ->setCellValue('C'.$i,$province)
                              ->setCellValue('D'.$i,$city)
                              ->setCellValue('E'.$i,$name)
                              ->setCellValue('F'.$i,$phone)
                              ->setCellValue('G'.$i,$username)


                              ->setCellValue('H'.$i,$gs_num)
                              ->setCellValue('I'.$i,$gs_he)
                              ->setCellValue('J'.$i,$gene_name)
                              ->setCellValue('K'.$i,$addtime)
                              ->setCellValue('L'.$i,'')
                              ->setCellValue('M'.$i,'')
                              ->setCellValue('N'.$i,$gene_contents)


                              ->setCellValue('O'.$i,$gene_contents_num)
                              ->setCellValue('P'.$i,'')


                              ->setCellValue('Q'.$i,'')
                              ->setCellValue('R'.$i,'')
                              ->setCellValue('S'.$i,$gene_clone_ya)
                              ->setCellValue('T'.$i,$include)
                              ->setCellValue('U'.$i,$gene_clone_kx)
                              ->setCellValue('V'.$i,'')
                              ->setCellValue('W'.$i,$gene_clone_cy)
                              ->setCellValue('X'.$i,'')
                              ->setCellValue('Y'.$i,'');


$phpexcel->getActiveSheet()->getStyle('A'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$phpexcel->getActiveSheet()->getStyle('B'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$phpexcel->getActiveSheet()->getStyle('C'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$phpexcel->getActiveSheet()->getStyle('D'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$phpexcel->getActiveSheet()->getStyle('E'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$phpexcel->getActiveSheet()->getStyle('F'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$phpexcel->getActiveSheet()->getStyle('G'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$phpexcel->getActiveSheet()->getStyle('H'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$phpexcel->getActiveSheet()->getStyle('I'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$phpexcel->getActiveSheet()->getStyle('J'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$phpexcel->getActiveSheet()->getStyle('K'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$phpexcel->getActiveSheet()->getStyle('L'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$phpexcel->getActiveSheet()->getStyle('M'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$phpexcel->getActiveSheet()->getStyle('N'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$phpexcel->getActiveSheet()->getStyle('O'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$phpexcel->getActiveSheet()->getStyle('P'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$phpexcel->getActiveSheet()->getStyle('Q'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$phpexcel->getActiveSheet()->getStyle('R'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$phpexcel->getActiveSheet()->getStyle('S'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$phpexcel->getActiveSheet()->getStyle('T'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$phpexcel->getActiveSheet()->getStyle('U'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$phpexcel->getActiveSheet()->getStyle('V'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$phpexcel->getActiveSheet()->getStyle('W'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$phpexcel->getActiveSheet()->getStyle('X'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$phpexcel->getActiveSheet()->getStyle('Y'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
 




  
// $i ++;                            
// }

$obj_Writer = PHPExcel_IOFactory::createWriter($phpexcel,'Excel5');
$filename = $code_title.".xls";//文件名

//设置header
header("Content-Type: application/force-download"); 
header("Content-Type: application/octet-stream"); 
header("Content-Type: application/download"); 
header('Content-Disposition:inline;filename="'.$filename.'"'); 
header("Content-Transfer-Encoding: binary"); 
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); 
header("Cache-Control: must-revalidate, post-check=0, pre-check=0"); 
header("Pragma: no-cache"); 
$obj_Writer->save('php://output');//输出
die();//种植执行                        

?>