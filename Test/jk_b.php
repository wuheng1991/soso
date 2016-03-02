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
$phpexcel->getActiveSheet()->setTitle('B积分奖扣管理');
$phpexcel->getActiveSheet() ->setCellValue('A1','员工编号')
                            ->setCellValue('B1','员工姓名')
                            ->setCellValue('C1','部门名称')
                            ->setCellValue('D1','岗位职务')
                            ->setCellValue('E1','年份')
                            ->setCellValue('F1','月份')
                            ->setCellValue('G1','类型')
                            ->setCellValue('H1','明细名称')
                            
                            ->setCellValue('I1','奖或扣')
                            ->setCellValue('j1','原积分')
                            ->setCellValue('K1','本次积分')
                            ->setCellValue('L1','现积分')
                            ->setCellValue('M1','操作日期/时间')
                            ->setCellValue('N1','操作员')
                            ->setCellValue('O1','详情');
$phpexcel->getActiveSheet()->getStyle('A1:O1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);                            
//设置列的宽度
  $phpexcel->getActiveSheet()->getColumnDimension('A')->setWidth(12);
  $phpexcel->getActiveSheet()->getColumnDimension('B')->setWidth(12);
  $phpexcel->getActiveSheet()->getColumnDimension('C')->setWidth(16);
  $phpexcel->getActiveSheet()->getColumnDimension('D')->setWidth(16);
  $phpexcel->getActiveSheet()->getColumnDimension('E')->setWidth(6);
  $phpexcel->getActiveSheet()->getColumnDimension('F')->setWidth(6);
  $phpexcel->getActiveSheet()->getColumnDimension('G')->setWidth(18);
  $phpexcel->getActiveSheet()->getColumnDimension('H')->setWidth(18);
  $phpexcel->getActiveSheet()->getColumnDimension('i')->setWidth(8);
  $phpexcel->getActiveSheet()->getColumnDimension('j')->setWidth(8);
  $phpexcel->getActiveSheet()->getColumnDimension('k')->setWidth(8);
  $phpexcel->getActiveSheet()->getColumnDimension('l')->setWidth(8);
  $phpexcel->getActiveSheet()->getColumnDimension('m')->setWidth(20);
  $phpexcel->getActiveSheet()->getColumnDimension('n')->setWidth(12);
  $phpexcel->getActiveSheet()->getColumnDimension('o')->setWidth(36);
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
 
//  
//从数据库取得需要导出的数据
$con = mysql_connect('localhost',"root","root");
mysql_set_charset("utf-8");
$select = mysql_select_db("hmhr");

$sql = "SELECT * FROM toa_jk_b AS a,toa_jifen_yg AS b WHERE b.id = a.jk_b_uid ORDER BY b.id,b.yg_name,a.jk_b_date ASC";
 $query = mysql_query($sql);
//$list = mysql_fetch_assoc($query);
//  var_dump($list);
// exit;
// foreach($list as $val){
// }   
$i = 2;
while($row = mysql_fetch_assoc($query)){
  // var_dump($row);
  // exit;
	// if($row['yg-sex']=="1"){
 //     $row['yg_sex'] = '男';
	// }else{
	//  $row['yg_sex'] = '女';	
	// }

	 
	// 	if($row['yg_mz']=='1'){
	// 		$row['yg_mz'] = "汉族";
	//     }elseif($row['yg_mz']=='2'){
	//     	$row['yg_mz'] = "回族";
	//     }elseif($row['yg_mz']=='3'){
	//     	$row['yg_mz'] = "维吾尔族";
	//     }
	
  if($row['jk_b_flag']==1){
       $row['jk_b_flag'] = "奖";
      }else{
        $row['jk_b_flag'] = "扣";
      }

	$phpexcel->getActiveSheet() ->setCellValue('A'.$i,$row['yg_num'])
                            ->setCellValue('B'.$i, $row['yg_name'])
                            ->setCellValue('C'.$i, $row['yg_department'])
                            ->setCellValue('D'.$i, $row['yg_duty'])
                             ->setCellValue('E'.$i, $row['jk_b_nian'])
                              ->setCellValue('F'.$i, $row['jk_b_month'])
                           
                            ->setCellValue('G'.$i, $row['jk_b_type'])
                            ->setCellValue('H'.$i, $row['jk_b_name'])
                            ->setCellValue('I'.$i, $row['jk_b_flag'])
                            ->setCellValue('J'.$i, $row['jk_b_yj'])
                            ->setCellValue('K'.$i, $row['jk_b_bj'])
                            ->setCellValue('L'.$i, $row['jk_b_xj'])
                            ->setCellValue('M'.$i, $row['jk_b_date'])
                          
                            ->setCellValue('N'.$i, $row['jk_b_admin'])
                             ->setCellValue('O'.$i, $row['jk_b_say']);


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
 




// var_dump($row);
$i ++;                            
}

$obj_Writer = PHPExcel_IOFactory::createWriter($phpexcel,'Excel5');
$filename ='B积分奖扣管理——'. date('Y-m-d').".xls";//文件名

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