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
//设置比标题
// $phpexcel->getProperties()->setTitle("Office 2007 XLSX Test Document");
$phpexcel->getActiveSheet()->setTitle('华美员工信息');
$phpexcel->getActiveSheet() ->setCellValue('A1','员工编号')
                            ->setCellValue('B1','员工姓名')
                            ->setCellValue('C1','性别')
                            ->setCellValue('D1','出生日期')
                            ->setCellValue('E1','职务')
                            ->setCellValue('F1','入职日期')
                            
                            ->setCellValue('G1','部门名称')
                            ->setCellValue('H1','联系电话')
                            ->setCellValue('I1','身份证号')
                            ->setCellValue('J1','家庭地址')
                            ->setCellValue('K1','学历')
                            ->setCellValue('L1','名族')
                            ->setCellValue('M1','职务');
$phpexcel->getActiveSheet()->getStyle('A1:M1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);                            
//设置列的宽度
  $phpexcel->getActiveSheet()->getColumnDimension('A')->setWidth(12);
  $phpexcel->getActiveSheet()->getColumnDimension('B')->setWidth(12);
  $phpexcel->getActiveSheet()->getColumnDimension('C')->setWidth(6);
  $phpexcel->getActiveSheet()->getColumnDimension('D')->setWidth(16);
  $phpexcel->getActiveSheet()->getColumnDimension('E')->setWidth(18);
  $phpexcel->getActiveSheet()->getColumnDimension('F')->setWidth(18);
  $phpexcel->getActiveSheet()->getColumnDimension('G')->setWidth(12);
  $phpexcel->getActiveSheet()->getColumnDimension('H')->setWidth(20);
  $phpexcel->getActiveSheet()->getColumnDimension('i')->setWidth(30);
  $phpexcel->getActiveSheet()->getColumnDimension('j')->setWidth(35);
  $phpexcel->getActiveSheet()->getColumnDimension('k')->setWidth(12);
  $phpexcel->getActiveSheet()->getColumnDimension('l')->setWidth(12);
  $phpexcel->getActiveSheet()->getColumnDimension('m')->setWidth(12);
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
 
//  
//从数据库取得需要导出的数据
$con = mysql_connect('localhost',"root","root");
mysql_set_charset("utf-8");
$select = mysql_select_db("hmhr");

$sql = "select * from toa_jifen_yg";
$query = mysql_query($sql);
// $list = mysql_fetch_assoc($query);
// var_dump($list);
// exit;
// foreach($list as $val){
// }   
$i = 2;
while($row = mysql_fetch_assoc($query)){
	if($row['yg_sex']=="1"){
     $row['yg_sex'] = '男';
	}else{
	 $row['yg_sex'] = '女';	
	}

	 
		if($row['yg_mz']=='1'){
			$row['yg_mz'] = "汉族";
	    }elseif($row['yg_mz']=='2'){
	    	$row['yg_mz'] = "回族";
	    }elseif($row['yg_mz']=='3'){
	    	$row['yg_mz'] = "维吾尔族";
	    }
	

	$phpexcel->getActiveSheet() ->setCellValue('A'.$i,$row['yg_num'])
                            ->setCellValue('B'.$i, $row['yg_name'])
                            ->setCellValue('C'.$i, $row['yg_sex'])
                            ->setCellValue('D'.$i, $row['yg_date'])
                           
                            ->setCellValue('E'.$i, $row['yg_duty'])
                            ->setCellValue('F'.$i, $row['yg_enter'])
                            ->setCellValue('G'.$i, $row['yg_department'])
                            ->setCellValue('H'.$i, $row['yg_tel'])
                            ->setCellValue('I'.$i, $row['yg_identify'])
                            ->setCellValue('J'.$i, $row['yg_address'])
                            ->setCellValue('K'.$i, $row['yg_edu'])
                          
                            ->setCellValue('L'.$i, $row['yg_mz'])
                             ->setCellValue('M'.$i, $row['yg_duty_pre']);


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
 




// var_dump($row);
$i ++;                            
}

$obj_Writer = PHPExcel_IOFactory::createWriter($phpexcel,'Excel5');
$filename ='华美员工信息——'. date('Y-m-d').".xls";//文件名

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