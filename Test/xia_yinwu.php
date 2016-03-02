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

$status = intval(trim($_GET['status']));

$id = trim($_GET['id'],",");

$arr_id = explode(",",$id);
// var_dump($phpexcel);
// var_dump($status);
// exit;
 if($status == 0){
 foreach($arr_id as $v){
  $rel_id = intval($v);
  $con = mysql_connect('localhost',"geneorders","XF83T9eSYNKryAJr");

  // $con = mysql_connect('localhost',"root","root");
  mysql_set_charset("gb2312");
  // $select = mysql_select_db("geneorders");
  $select = mysql_select_db("cusabio_order");

  $sql = "update ge_orders_primers set status=1 where id = {$rel_id}";
  $query = mysql_query($sql);
  mysql_close($con);
 }
}



// $con = mysql_connect('localhost',"geneorders","XF83T9eSYNKryAJr");
$con_new = mysql_connect('localhost',"root","root");
mysql_set_charset("utf-8");
// $select = mysql_select_db("cusabio_order");
$select_new = mysql_select_db("geneorders");
// var_dump($con_new,$select_new);
// exit;
$search_id = "(".$id.")";
$code_sql = "select * from ge_orders_primers where id in $search_id";
// echo $code_sql;
// exit;
$code_query = mysql_query($code_sql);
// $code_row = mysql_fetch_assoc($code_query);
// $code_yw = $code_row['code_yw'];
// var_dump($code_yw);
// exit;
$code_title = "Genecreate-PrimerSequences";
 // var_dump($phpexcel);
 // exit;
//设置比标题
// $phpexcel->getProperties()->setTitle("Office 2007 XLSX Test Document");
$phpexcel->getActiveSheet()->setTitle($code_title);
// var_dump($phpexcel);
//  exit;  
// $phpexcel->getActiveSheet() ->setCellValue('A1','编号')
//                             ->setCellValue('B1','引物名称')
//                             ->setCellValue('C1','引物序列')
//                             ->setCellValue('D1','碱基数')
//                             ->setCellValue('E1','需求量OD值')
//                             ->setCellValue('F1','分装管数')
                            
//                             ->setCellValue('G1','纯化方式')
//                             ->setCellValue('H1',"5'修饰")
//                             ->setCellValue('I1',"3'修饰")
//                             ->setCellValue('J1','其他修饰')
//                             ->setCellValue('K1','备注');
                           
$phpexcel->getActiveSheet()->getStyle('A1:K1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);                            
//设置列的宽度
  $phpexcel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
  $phpexcel->getActiveSheet()->getColumnDimension('B')->setWidth(25);
  $phpexcel->getActiveSheet()->getColumnDimension('C')->setWidth(62);
  $phpexcel->getActiveSheet()->getColumnDimension('D')->setWidth(8);
  $phpexcel->getActiveSheet()->getColumnDimension('E')->setWidth(16);
  $phpexcel->getActiveSheet()->getColumnDimension('F')->setWidth(16);
  $phpexcel->getActiveSheet()->getColumnDimension('G')->setWidth(16);
  $phpexcel->getActiveSheet()->getColumnDimension('H')->setWidth(18);
  $phpexcel->getActiveSheet()->getColumnDimension('i')->setWidth(18);
  $phpexcel->getActiveSheet()->getColumnDimension('j')->setWidth(18);
  $phpexcel->getActiveSheet()->getColumnDimension('k')->setWidth(18);
  // $phpexcel->getActiveSheet()->getColumnDimension('l')->setWidth(35);
  
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
// $phpexcel->getActiveSheet()->getStyle('L1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
// $phpexcel->getActiveSheet()->getStyle('M1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
 
 
$i = 1;
$sequence = "";
$sequence_num = 0;
// var_dump($phpexcel);
// exit;
while($row = mysql_fetch_assoc($code_query)){
   
$row['puremthod'] = intval(trim($row['puremthod']));
if($row['puremthod']==1){
 $row['puremthod']="PAGE";
}elseif($row['puremthod']==2){
 $row['puremthod']="DSL";
}elseif($row['puremthod']==3){
 $row['puremthod']="HPLC";
}elseif($row['puremthod']==4){
   $row['puremthod']="PAGE plus";
}elseif($row['puremthod']==5){
   $row['puremthod']="RPC";
}elseif($row['puremthod']==6){
   $row['puremthod']="OPC";
}elseif($row['puremthod']==7){
   $row['puremthod']="HAP";
}elseif($row['puremthod']==8){
  $row['puremthod']="ULTRAPAGE";
}else{
 $row['puremthod']="DSL";
}

$row['fmodification'] = intval(trim($row['fmodification']));
if($row['fmodification'] == 1){
$row['fmodification'] = "PO4";
}elseif($row['fmodification']==2){
$row['fmodification']="NH2 C3";
}elseif($row['fmodification'] == 3){
$row['fmodification']="NH2 C6";
}elseif($row['fmodification'] == 4){
$row['fmodification']="NH2 C12";
}elseif($row['fmodification'] == 5){
$row['fmodification']="NH2 C6 dT";
}elseif($row['fmodification'] == 6){
$row['fmodification']="SH C6";
}elseif($row['fmodification'] == 7){
  $row['fmodification']="Biotin";
}elseif($row['fmodification'] == 8){
$row['fmodification']="Biotin TEG";
}elseif($row['fmodification'] == 9){
$row['fmodification']="Dual Biotin";
}elseif($row['fmodification'] == 10){
$row['fmodification']="Digoxin";
}elseif($row['fmodification'] == 11){
$row['fmodification']="Cy3";
}elseif($row['fmodification'] == 12){
$row['fmodification']="Cy5";
}elseif($row['fmodification'] == 13){
$row['fmodification']="FAM";
}elseif($row['fmodification'] == 14){
$row['fmodification']="HEX";
}elseif($row['fmodification'] == 15){
$row['fmodification']="TET";
}elseif($row['fmodification'] == 16){
$row['fmodification']="6-JOE";
}elseif($row['fmodification'] == 17){
$row['fmodification']="Rox";
}elseif($row['fmodification'] == 18){
$row['fmodification']="TAMRA";
}else{
$row['fmodification']="";
}

$row['tmodification']=intval(trim($row['tmodification']));
  if($row['tmodification'] == 1){
$row['tmodification']="PO4";
}elseif($row['tmodification'] == 2){
$row['tmodification']="NH2 C3";
}elseif($row['tmodification'] == 3){
 $row['tmodification']="NH2 C7";
}elseif($row['tmodification'] == 4){
  $row['tmodification']="NH2 C6 dT";
}elseif($row['tmodification'] == 5){
 $row['tmodification']="SH C6";
}elseif($row['tmodification'] == 6){
   $row['tmodification']="Biotin";
}elseif($row['tmodification'] == 7){
 $row['tmodification']="Biotin TEG";
}elseif($row['tmodification'] == 8){
 $row['tmodification']="Digoxin";
}elseif($row['tmodification'] == 9){
  $row['tmodification']="Cy3";
}elseif($row['tmodification'] == 10){
 $row['tmodification']="Cy5";
}elseif($row['tmodification'] == 11){
 $row['tmodification']="FAM";
}elseif($row['tmodification'] == 12){
  $row['tmodification']="6-JOE";
}elseif($row['tmodification'] == 13){
  $row['tmodification']="Rox";
}elseif($row['tmodification'] == 14){
  $row['tmodification']="TAMRA";
}elseif($row['tmodification'] == 15){
 $row['tmodification']="DABCYL";
}elseif($row['tmodification'] == 16){
 $row['tmodification']="BHQ 1";
}elseif($row['tmodification'] == 17){
$row['tmodification']="BHQ 2";
}else{
$row['tmodification']="";
}

$row['othermod']=intval(trim($row['othermod']));
 if($row['othermod'] == 1){
$row['othermod']="dI";
}elseif($row['othermod']== 2){
  $row['othermod']="dU";
}elseif($row['othermod'] == 3){
$row['othermod']="SPO3";
}else{
$row['othermod']="";
}

  $sequence = trim($row['sequence']);
  $sequence = str_replace(" ","",$sequence);
  $sequence_num = strlen($sequence);
   
  $primer_name = iconv('gb2312','utf-8',$row['primername']);

  $phpexcel->getActiveSheet() ->setCellValue('A'.$i,$row['primer_shui'])
                              ->setCellValue('B'.$i, $primer_name)
                              ->setCellValue('C'.$i, $sequence)
                              ->setCellValue('D'.$i, $sequence_num)
                             
                              ->setCellValue('E'.$i, $row['demand'])
                              ->setCellValue('F'.$i, $row['tubenum'])
                              ->setCellValue('G'.$i, $row['puremthod'])
                              ->setCellValue('H'.$i, $row['fmodification'])
                              ->setCellValue('I'.$i, $row['tmodification'])
                              ->setCellValue('J'.$i, $row['othermod'])
                              ->setCellValue('K'.$i, $row['note']);
                            
                            // ->setCellValue('L'.$i, $row['jk_a_say']);


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
// $phpexcel->getActiveSheet()->getStyle('L'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
// $phpexcel->getActiveSheet()->getStyle('M'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

 // var_dump($row);
 // exit;
$i ++;                            
}

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