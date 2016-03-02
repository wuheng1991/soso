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
 // var_dump($phpexcel);
// exit;

$con = mysql_connect('localhost',"geneorders","XF83T9eSYNKryAJr");
// $con = mysql_connect('localhost',"root","root");
mysql_set_charset("utf-8");
$select = mysql_select_db("cusabio_order");
// $select = mysql_select_db("geneorders");

// var_dump($con,$select);
// exit;

$code_sql = "select code_yw from ge_orders where id = {$id}";
$code_query = mysql_query($code_sql);
$code_row = mysql_fetch_assoc($code_query);
$code_yw = $code_row['code_yw'];
// var_dump($code_yw);
// exit;
$code_title = "genecreate-".$code_yw."-Report";
 //  var_dump($code_title);
 // exit;
//设置比标题
// $phpexcel->getProperties()->setTitle("Office 2007 XLSX Test Document");
$phpexcel->getActiveSheet()->setTitle($code_title);
$phpexcel->getActiveSheet() ->setCellValue('A1','Genecreate ID')
                            ->setCellValue('B1','Primer Name')
                            ->setCellValue('C1','Sequence')
                            ->setCellValue('D1','Length')
                            ->setCellValue('E1','Package OD')
                            ->setCellValue('F1','Package Number')                            
                            ->setCellValue('G1','Purification')

                            ->setCellValue('H1',"MW")
                            ->setCellValue('I1',"TM")
                            ->setCellValue('J1',"nmol")
                            ->setCellValue('K1',"To Make 100uM stock,add TE buffer(ul)");
                            // ->setCellValue('L1',"TM1-1")
                            // ->setCellValue('M1',"GC%")
                            // ->setCellValue('N1',"nmole/OD")
                            // ->setCellValue('O1',"nmol/管")
                            // ->setCellValue('P1',"OD/管");
                            
$phpexcel->getActiveSheet()->getStyle('A1:K1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);                            
//设置列的宽度
  $phpexcel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
  $phpexcel->getActiveSheet()->getColumnDimension('B')->setWidth(32);
  $phpexcel->getActiveSheet()->getColumnDimension('C')->setWidth(50);
  $phpexcel->getActiveSheet()->getColumnDimension('D')->setWidth(8);
  $phpexcel->getActiveSheet()->getColumnDimension('E')->setWidth(16);
  $phpexcel->getActiveSheet()->getColumnDimension('F')->setWidth(16);
  $phpexcel->getActiveSheet()->getColumnDimension('G')->setWidth(16);
  $phpexcel->getActiveSheet()->getColumnDimension('H')->setWidth(18);
  $phpexcel->getActiveSheet()->getColumnDimension('i')->setWidth(18);
  $phpexcel->getActiveSheet()->getColumnDimension('j')->setWidth(18);
  $phpexcel->getActiveSheet()->getColumnDimension('k')->setWidth(40);
  // $phpexcel->getActiveSheet()->getColumnDimension('L')->setWidth(18);
  // $phpexcel->getActiveSheet()->getColumnDimension('M')->setWidth(18);
  // $phpexcel->getActiveSheet()->getColumnDimension('N')->setWidth(18);
  // $phpexcel->getActiveSheet()->getColumnDimension('O')->setWidth(18);
  // $phpexcel->getActiveSheet()->getColumnDimension('P')->setWidth(18);
  
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
// $phpexcel->getActiveSheet()->getStyle('N1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
// $phpexcel->getActiveSheet()->getStyle('O1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
// $phpexcel->getActiveSheet()->getStyle('P1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
// $phpexcel->getActiveSheet()->getStyle('M1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
 
//  
//从数据库取得需要导出的数据
//得到参数id值

// echo $select;
// echo "<br/>";
$sql = "select * from ge_orders_primers where orderid = {$id} order by addtime desc";
$query = mysql_query($sql);
// $list = mysql_fetch_assoc($query);
// echo $sql;
// echo "<br/>";
//  var_dump($list);
//   exit;
// foreach($list as $val){
// }   
$i = 2;
while($row = mysql_fetch_assoc($query)){
   
  $row['puremthod'] = intval(trim($row['puremthod']));
  if($row['puremthod']==1){
   $row['puremthod']="PAGE";
  }elseif($row['puremthod']==2){
   $row['puremthod']="DSL";
  }elseif($row['puremthod']==3){
   $row['puremthod']="HPLC";
  }else{
  $row['puremthod']="";
  }

  //A，T，C，G的个数
  $sequence = strtoupper(trim($row['sequence']));


  // var_dump($sequence);

  $num_a = substr_count($sequence,'A');
  $num_t = substr_count($sequence,'T');
  $num_c = substr_count($sequence,'C');
  $num_g = substr_count($sequence,'G');

  $num_atcg = $num_a + $num_t + $num_c + $num_g;
  // var_dump($num_a,$num_t,$num_c,$num_g);
  // 总量(O.D)
  $demand = intval($row['demand']);
  //分装管数
  $guan = intval($row['tubenum']);
  // exit;
  $v = ($num_a * 15.3) + ($num_c * 7.4) + ($num_g * 11.8) + ($num_t * 9.3);
  
  // MW
  $aa = ($num_a * 313.21) + ($num_g * 329.21) + ($num_c * 289.18) + ($num_t * 304.20) - 61.96;
  $aa = round($aa,1);
  // nmole
  $bb = 1000/$v;
  $bb = round($bb,2);
  $end = $bb * 10;
  // TM1
  $cc = 0.41 * (($num_c + $num_g)/$num_atcg) - (675/$num_atcg) + 81.5;  
  // TM1-1
  $dd = 4 * ($num_g + $num_c) + 2 * ($num_a + $num_t);
  if($num_atcg > 20){
  $cd = $cc;
  }else{
  $cd = $dd;
  }

  $cd = round($cd,2);
  // $cc = round($cc,1);
  // $dd = round($dd,1);
  //GC%
  // $ee = ($num_g + $num_c)/$num_atcg;
  // $ee = round($ee,1);
  // $ee = ($ee * 100)."%";
  //nmole/OD
  // $ff =1000/$v;
  // $ff = round($ff,1);
  // nmol/管
  // $gg = $bb * $demand / $guan;
  // $gg = round($gg,1);
  //OD/管
  // $hh = $demand / $guan;
  // $hh = round($hh,1);


 

  $phpexcel->getActiveSheet() ->setCellValue('A'.$i,$i-1)
                            ->setCellValue('B'.$i, $row['primername'])
                            ->setCellValue('C'.$i, $sequence)
                            ->setCellValue('D'.$i, $num_atcg)                           
                            ->setCellValue('E'.$i, $demand)
                            ->setCellValue('F'.$i, $guan)
                            ->setCellValue('G'.$i, $row['puremthod'])

                            ->setCellValue('H'.$i, $aa)
                            ->setCellValue('I'.$i, $cd)
                            ->setCellValue('J'.$i, $bb)
                            ->setCellValue('K'.$i, $end);
                            // ->setCellValue('L'.$i, $dd)
                            // ->setCellValue('M'.$i, $ee)
                            // ->setCellValue('N'.$i, $ff)
                            // ->setCellValue('O'.$i, $gg)
                            // ->setCellValue('P'.$i, $hh);
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
// $phpexcel->getActiveSheet()->getStyle('N'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
// $phpexcel->getActiveSheet()->getStyle('O'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
// $phpexcel->getActiveSheet()->getStyle('P'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
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