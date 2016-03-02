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
$phpexcel->getActiveSheet()->setTitle('金开瑞基因突变在线订购单');
$phpexcel->getActiveSheet() ->setCellValue('A1','编号')
                            ->setCellValue('B1','模板信息-插入片段名称')
                            ->setCellValue('C1','模板信息-大小（kb）')
                            ->setCellValue('D1','模板信息-突变前的序列')
                            ->setCellValue('E1','模板信息-载体名称')

                            ->setCellValue('F1','突变说明-突变后的名称')
                            ->setCellValue('G1','突变说明-突变后序列')
                            ->setCellValue('H1','突变说明-载体名称')
                            ->setCellValue('I1','突变说明-克隆方法')
                            ->setCellValue('J1','突变说明-基因用途')

                            ->setCellValue('K1','质粒制备')
                            ->setCellValue('L1','质粒制备-模板名称')
                            ->setCellValue('M1','质粒制备-质量级别');

                            
                            // ->setCellValue('V1','质量级别');
                            
$phpexcel->getActiveSheet()->getStyle('A1:M1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);                            
//设置列的宽度
  $phpexcel->getActiveSheet()->getColumnDimension('A')->setWidth(6);
  $phpexcel->getActiveSheet()->getColumnDimension('B')->setWidth(26);
  $phpexcel->getActiveSheet()->getColumnDimension('C')->setWidth(26);
  $phpexcel->getActiveSheet()->getColumnDimension('D')->setWidth(26);
  $phpexcel->getActiveSheet()->getColumnDimension('E')->setWidth(26);
  $phpexcel->getActiveSheet()->getColumnDimension('F')->setWidth(26);
  $phpexcel->getActiveSheet()->getColumnDimension('G')->setWidth(26);
  $phpexcel->getActiveSheet()->getColumnDimension('H')->setWidth(26);
  $phpexcel->getActiveSheet()->getColumnDimension('i')->setWidth(26);
  $phpexcel->getActiveSheet()->getColumnDimension('j')->setWidth(26);
  $phpexcel->getActiveSheet()->getColumnDimension('k')->setWidth(32);
  $phpexcel->getActiveSheet()->getColumnDimension('L')->setWidth(36);
  $phpexcel->getActiveSheet()->getColumnDimension('M')->setWidth(50);
  // $phpexcel->getActiveSheet()->getColumnDimension('N')->setWidth(55);
  // $phpexcel->getActiveSheet()->getColumnDimension('O')->setWidth(24);
  // $phpexcel->getActiveSheet()->getColumnDimension('P')->setWidth(24);
  // $phpexcel->getActiveSheet()->getColumnDimension('Q')->setWidth(18);
  // $phpexcel->getActiveSheet()->getColumnDimension('R')->setWidth(20);
  // $phpexcel->getActiveSheet()->getColumnDimension('S')->setWidth(18);
  // $phpexcel->getActiveSheet()->getColumnDimension('T')->setWidth(18);
  // $phpexcel->getActiveSheet()->getColumnDimension('U')->setWidth(18);
  // $phpexcel->getActiveSheet()->getColumnDimension('V')->setWidth(22);
  // $phpexcel->getActiveSheet()->getColumnDimension('W')->setWidth(12);
   
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
$phpexcel->getActiveSheet()->getStyle('L1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$phpexcel->getActiveSheet()->getStyle('M1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
// $phpexcel->getActiveSheet()->getStyle('N1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
// $phpexcel->getActiveSheet()->getStyle('O1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
// $phpexcel->getActiveSheet()->getStyle('P1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
// $phpexcel->getActiveSheet()->getStyle('Q1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
// $phpexcel->getActiveSheet()->getStyle('R1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
// $phpexcel->getActiveSheet()->getStyle('S1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
// $phpexcel->getActiveSheet()->getStyle('T1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
// $phpexcel->getActiveSheet()->getStyle('U1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
// $phpexcel->getActiveSheet()->getStyle('V1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
// $phpexcel->getActiveSheet()->getStyle('W1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
 
// $phpexcel->getActiveSheet()->getStyle('L1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
// $phpexcel->getActiveSheet()->getStyle('M1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
 
//  
//从数据库取得需要导出的数据
//得到参数id值
$id = intval(trim($_GET['id']));
// echo $id;
// exit;

$con = mysql_connect('localhost',"root","root");
mysql_set_charset("utf-8");
$select = mysql_select_db("geneorders");
// echo $select;
// echo "<br/>";
$sql = "select * from ge_server where orderid = {$id}";
$query = mysql_query($sql);


//  $list = mysql_fetch_assoc($query);
// echo $sql;
// echo "<br/>";
//  var_dump($list);
//  exit;
//start
function clone_name($id){
   
switch($id){
case 0:$str = '';break;
case 1:$str = 'pBC-SK+';break;
case 2:$str = 'pBluescript II KS+';break; 
case 3:$str = 'pCEP4';break;
case 4:$str = 'pCMV-Myc';break;
case 5:$str = 'pCR2.1';break;   
case 6:$str = 'pDsRed2-1';break; 
case 7:$str = 'pEcoli-Cterm 6xHN';break;
case 8:$str = 'pET-11a';break;
case 9:$str = 'pET-11b';break;
case 10:$str = 'pET-11d';break;
case 11:$str = 'pET-12a';break;
case 12:$str = 'pET-14b';break;
case 13:$str = 'pET-15b';break;
case 14:$str = 'pET-16b';break;  
case 15:$str = 'pET-17b';break;
case 16:$str = 'pET-20b(+)';break;
case 17:$str = 'pET-21a(+)';break;
case 18:$str = 'pET-21b(+)';break;
case 19:$str = 'pET-21d(+)';break;
case 20:$str = 'pET-22b(+)';break;
case 21:$str = 'pET-23a(+)';break;
case 22:$str = 'pET-23d(+)';break;
case 23:$str = 'pET-24a(+)';break;
case 24:$str = 'pET-24b(+)';break;
case 25:$str = 'pET-24c';break;
case 26:$str = 'pET-25b(+)';break;
case 27:$str = 'pET-26b+';break;
case 28:$str = 'pET-27b(+)';break;
case 29:$str = 'pET-28a(+)';break;
case 30:$str = 'pET-28b(+)';break;
case 31:$str = 'pET-29b+';break;
case 32:$str = 'pET-29a(+)';break;
case 33:$str = 'pET-3a';break; 
case 34:$str = 'PET-30a(+)';break;
case 35:$str = 'pET-30b(+)';break;
case 36:$str = 'pET-32a(+)';break;
case 37:$str = 'pET-32b+';break;
case 38:$str = 'pET-39b';break;
case 39:$str = 'pET-3c';break;
case 40:$str = 'pET-3d';break;
case 41:$str = 'pET-41a(+)';break;
case 42:$str = 'pET-41b(+)';break;
case 43:$str = 'pET-43.1a(+)';break;
case 44:$str = 'pET-44b(+)';break;
case 45:$str = 'pET-45b+';break;
case 46:$str = 'pET-49b+';break;
case 47:$str = 'pET-52b';break;
case 48:$str = 'pET-9a';break;  
case 49:$str = 'pET-9d';break;
case 50:$str = 'pPIC3.5K';break; 
case 51:$str = 'pUC18';break;
case 52:$str = 'pUC19';break;
case 53:$str = 'pUC57';break;
case 54:$str = 'pDream 2.1';break;
case 55:$str = 'Other';break; 
default:$str = '';
}
return $str;

}


function zhili($id){
   
switch($id){
 
case 1:$str = '100 μg';break;
case 2:$str = '200 μg';break; 
case 3:$str = '500 μg';break;
case 4:$str = '1 mg';break;
case 5:$str = '2 mg';break;   
case 6:$str = '10 mg';break; 
case 7:$str = '20 mg';break;
case 8:$str = '50 mg';break;
case 9:$str = '100 mg';break;
case 10:$str = '200 mg';break;
case 11:$str = '500 mg';break;
case 12:$str = '1000 mg';break;
case 13:$str = '1500 mg';break;
case 14:$str = '2000 mg';break;  
default:$str = 'Other';
}
return $str;
}

//end
// foreach($list as $val){
// }   
$i = 2;
while($row = mysql_fetch_assoc($query)){

  //长度
  $length = '';
  $length = strlen(trim($row['server_serial']));
  //模板-载体名称  clone_zhili_title
  // if(trim($row['clone_zhili_title']) != ""){
  //  $row["clone_zhili_title"] = trim($row['clone_zhili_title']);
  // }else{
  // $row["clone_zhili_title"] = trim($row['clone_title']);
  // }
  //用途
 // $row['server_use']
  if(intval($row['server_use'])==1){
  $row['server_use']=" Protein expression/analysis";
  }elseif(intval($row['server_use'])==2){
  $row['server_use']="Promoter assay";
  }elseif(intval($row['server_use'])==3){
  $row['server_use']="RNAi, epigenetics &amp; gene regulation";
  }elseif(intval($row['server_use'])==4){
  $row['server_use']="Cloning";
  }elseif(intval($row['server_use'])==5){
  $row['server_use']="DNA vaccines";
  }elseif(intval($row['server_use'])==6){
  $row['server_use']="Recombinant antibodies";
  }elseif(intval($row['server_use'])==7){
  $row['server_use']="others";
  }else{
  $row['server_use']=" others";
  }

  if(intval($row['server_help'])==0){
  $row['server_help']="Research Grade(Predominantly supercoiled, animal free)";
  }elseif(intval($row['server_help'])==1){
  $row['server_help']="SC Grade (≥95% Supercoilded, ≤0.03 EU/ug Endotoxin)";
  }elseif(intval($row['server_help'])==2){
  $row['server_help']="Advanced SC Grade(≥95% Supercoilded, ≤0.005 EU/ug Endotoxin)";
  }else{
    $row['server_help']="";
  }
//zhili 
  // $zhili_con = "";
  if($row['server_zhili']=="2"){
   $zhili_con = "定制质粒制备: ".zhili($row['server_zhili_sel']);
  }else{
    $zhili_con="标准交付: 4 μg (免费)";
    $row['server_moban_name']="";
    $row['server_help']="";
  }

  if($row['server_way']=='0'){
    $zai_name = "Same as template";
    $row['server_zaiti_site']="";
    $row['server_use']="";

  }else{
    $zai_name = clone_name($row['server_zaiti_name']);
    // $row['server_zaiti_site']
    // $row['server_use']
  }




  
	 
	$phpexcel->getActiveSheet() ->setCellValue('A'.$i,$i-1)
                            ->setCellValue('B'.$i,$row['server_title'])
                            ->setCellValue('C'.$i,$length)
                            ->setCellValue('D'.$i,$row['server_serial'])
                            ->setCellValue('E'.$i,clone_name($row['server_name']))

                            ->setCellValue('F'.$i,$row['server_chg_name'])

                            ->setCellValue('G'.$i,$row['server_chg_content'])

                            ->setCellValue('H'.$i,$zai_name)

                            ->setCellValue('I'.$i,$row['server_zaiti_site'])

                            ->setCellValue('J'.$i,$row['server_use'])
                            // ->setCellValue('K'.$i, $row['gene_seo_end'])
                            ->setCellValue('K'.$i,$zhili_con)
                            ->setCellValue('L'.$i,$row['server_moban_name'])
                            ->setCellValue('M'.$i,$row['server_help']);
                            // ->setCellValue('N'.$i, $row['server_help']);
                            


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
// $phpexcel->getActiveSheet()->getStyle('N'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
// $phpexcel->getActiveSheet()->getStyle('O'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
// $phpexcel->getActiveSheet()->getStyle('P'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
// $phpexcel->getActiveSheet()->getStyle('Q'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
// $phpexcel->getActiveSheet()->getStyle('R'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
// $phpexcel->getActiveSheet()->getStyle('S'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
// $phpexcel->getActiveSheet()->getStyle('T'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
// $phpexcel->getActiveSheet()->getStyle('U'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
// $phpexcel->getActiveSheet()->getStyle('V'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
// $phpexcel->getActiveSheet()->getStyle('W'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
 
// $phpexcel->getActiveSheet()->getStyle('L'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
// $phpexcel->getActiveSheet()->getStyle('M'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
 




 // var_dump($row);
 // exit;
$i ++;                            
}

$obj_Writer = PHPExcel_IOFactory::createWriter($phpexcel,'Excel5');
$filename ='金开瑞基因突变在线订购单——'. date('Y-m-d').".xls";//文件名

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