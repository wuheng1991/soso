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
 // var_dump($phpexcel);
 // exit;
//设置比标题
// $phpexcel->getProperties()->setTitle("Office 2007 XLSX Test Document");
$phpexcel->getActiveSheet()->setTitle('金开瑞测序合成在线订购单');
$phpexcel->getActiveSheet() ->setCellValue('A1','编号')
                            ->setCellValue('B1','样品名称')
                            ->setCellValue('C1','测序引物')
                            ->setCellValue('D1','样品类型')
                            ->setCellValue('E1','抗性')
                            ->setCellValue('F1','载体全称')
                            
                            ->setCellValue('G1','片段长度')
                            ->setCellValue('H1',"测序要求");
                             
                             
                            
$phpexcel->getActiveSheet()->getStyle('A1:H1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);                            
//设置列的宽度
  $phpexcel->getActiveSheet()->getColumnDimension('A')->setWidth(6);
  $phpexcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
  $phpexcel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
  $phpexcel->getActiveSheet()->getColumnDimension('D')->setWidth(16);
  $phpexcel->getActiveSheet()->getColumnDimension('E')->setWidth(16);
  $phpexcel->getActiveSheet()->getColumnDimension('F')->setWidth(16);
  $phpexcel->getActiveSheet()->getColumnDimension('G')->setWidth(16);
  $phpexcel->getActiveSheet()->getColumnDimension('H')->setWidth(18);
  // $phpexcel->getActiveSheet()->getColumnDimension('i')->setWidth(18);
  // $phpexcel->getActiveSheet()->getColumnDimension('j')->setWidth(18);
  // $phpexcel->getActiveSheet()->getColumnDimension('k')->setWidth(18);
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
// $phpexcel->getActiveSheet()->getStyle('I1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
// $phpexcel->getActiveSheet()->getStyle('J1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
// $phpexcel->getActiveSheet()->getStyle('K1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
// $phpexcel->getActiveSheet()->getStyle('L1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
// $phpexcel->getActiveSheet()->getStyle('M1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
 
//  
//从数据库取得需要导出的数据
//得到参数id值
$id = intval(trim($_GET['id']));


$con = mysql_connect('localhost',"geneorders","XF83T9eSYNKryAJr");
mysql_set_charset("utf-8");
$select = mysql_select_db("cusabio_order");
// echo $select;
// echo "<br/>";
$sql = "select * from ge_orders_sequencing where orderid = {$id} order by addtime desc";
$query = mysql_query($sql);
// $list = mysql_fetch_assoc($query);
// echo $sql;
// echo "<br/>";
// echo $id;
//  var_dump($list);
//  exit;
// foreach($list as $val){
// }   
$i = 2;
while($row = mysql_fetch_assoc($query)){
     $row['sampletype'] = intval(trim($row['sampletype']));
    if($row['sampletype']==1){
      $row['sampletype']="菌液";
    }elseif($row['sampletype']==2){
      $row['sampletype']="质粒";
    }elseif($row['sampletype']==3){
     $row['sampletype']="PCR未纯化";
    }elseif($row['sampletype']==4){
     $row['sampletype']="PCR已纯化";
    }else{
      $row['sampletype']="";
    }

    $row['claim'] = intval(trim($row['claim']));
    if($row['claim'] == 1){
    $row['claim']="正向";
    }elseif($row['claim']==2){
    $row['claim']="反向";
    }elseif($row['claim']==3){
     $row['claim']="双向";
    }elseif($row['claim']==4){
    $row['claim']="测通";
    }else{
      $row['claim']="";
    }



	$phpexcel->getActiveSheet() ->setCellValue('A'.$i,$i-1)
                            ->setCellValue('B'.$i, $row['samplename'])
                            ->setCellValue('C'.$i, $row['primername'])
                            ->setCellValue('D'.$i, $row['sampletype'])
                           
                            ->setCellValue('E'.$i, '')
                            ->setCellValue('F'.$i, $row['carrier'])
                            ->setCellValue('G'.$i, $row['length'])
                            ->setCellValue('H'.$i, $row['claim']);
                             

$phpexcel->getActiveSheet()->getStyle('A'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$phpexcel->getActiveSheet()->getStyle('B'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$phpexcel->getActiveSheet()->getStyle('C'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$phpexcel->getActiveSheet()->getStyle('D'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$phpexcel->getActiveSheet()->getStyle('E'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$phpexcel->getActiveSheet()->getStyle('F'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$phpexcel->getActiveSheet()->getStyle('G'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$phpexcel->getActiveSheet()->getStyle('H'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
// $phpexcel->getActiveSheet()->getStyle('I'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
// $phpexcel->getActiveSheet()->getStyle('J'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
// $phpexcel->getActiveSheet()->getStyle('K'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
// $phpexcel->getActiveSheet()->getStyle('L'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
// $phpexcel->getActiveSheet()->getStyle('M'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
 




 // var_dump($row);
 // exit;
$i ++;                            
}

$obj_Writer = PHPExcel_IOFactory::createWriter($phpexcel,'Excel5');
$filename ='金开瑞测序合成在线订购单——'. date('Y-m-d').".xls";//文件名

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