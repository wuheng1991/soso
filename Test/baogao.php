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
mysql_set_charset("gb2312");
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
$phpexcel->getActiveSheet()->getStyle('A1')->getAlignment()->setWrapText(true); //该语句用于换行
$phpexcel->getActiveSheet()->getStyle('B1')->getAlignment()->setWrapText(true); //该语句用于换行
$phpexcel->getActiveSheet()->getStyle('C1')->getAlignment()->setWrapText(true); //该语句用于换行
$phpexcel->getActiveSheet()->getStyle('D1')->getAlignment()->setWrapText(true); //该语句用于换行
$phpexcel->getActiveSheet()->getStyle('E1')->getAlignment()->setWrapText(true); //该语句用于换行
$phpexcel->getActiveSheet()->getStyle('F1')->getAlignment()->setWrapText(true); //该语句用于换行
$phpexcel->getActiveSheet()->getStyle('G1')->getAlignment()->setWrapText(true); //该语句用于换行
$phpexcel->getActiveSheet()->getStyle('H1')->getAlignment()->setWrapText(true); //该语句用于换行
$phpexcel->getActiveSheet()->getStyle('I1')->getAlignment()->setWrapText(true); //该语句用于换行
$phpexcel->getActiveSheet()->getStyle('J1')->getAlignment()->setWrapText(true); //该语句用于换行
// $phpexcel->getActiveSheet()->getStyle('K1')->getAlignment()->setWrapText(true); //该语句用于换行
$phpexcel->getActiveSheet()->getStyle('K1')->getAlignment()->setWrapText(true); //该语句用于换行
$phpexcel->getActiveSheet()->getStyle('L1')->getAlignment()->setWrapText(true); //该语句用于换

// $phpexcel->getProperties()->setTitle("Office 2007 XLSX Test Document");
$phpexcel->getActiveSheet()->setTitle($code_title);
$phpexcel->getActiveSheet() ->setCellValue('A1',"")
                            ->setCellValue('B1',"Genecreate ID")
                            ->setCellValue('C1','Primer Name')
                            ->setCellValue('D1','Sequence')
                            ->setCellValue('E1',"Length")
                            ->setCellValue('F1',"Package OD")
                            ->setCellValue('G1',"Package Number")                            
                            ->setCellValue('H1',"Purification")

                            ->setCellValue('I1',"MW")
                            ->setCellValue('J1',"TM")
                            // ->setCellValue('J1',"ug/OD")
                            ->setCellValue('K1',"nmole")
                            ->setCellValue('L1',"To Make 100uM stock,add TE buffer(ul)");
                            // ->setCellValue('L1',"\"你好\r\nhello\"");

                            // ->setCellValue('M1',"GC%")
                            // ->setCellValue('N1',"nmole/OD")
                            // ->setCellValue('O1',"nmol/管")
                            // ->setCellValue('P1',"OD/管");
                            
$phpexcel->getActiveSheet()->getStyle('A1:L1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);                            
//设置列的宽度
  // $phpexcel->getActiveSheet()->getColumnDimension('A')->setWidth(2.8);   
  // $phpexcel->getActiveSheet()->getColumnDimension('B')->setWidth(10.7);
  // $phpexcel->getActiveSheet()->getColumnDimension('C')->setWidth(17.5);
  // $phpexcel->getActiveSheet()->getColumnDimension('D')->setWidth(25.22);
  // $phpexcel->getActiveSheet()->getColumnDimension('E')->setWidth(4.22);
  // $phpexcel->getActiveSheet()->getColumnDimension('F')->setWidth(7.6);
  // $phpexcel->getActiveSheet()->getColumnDimension('G')->setWidth(7.6);
  // $phpexcel->getActiveSheet()->getColumnDimension('H')->setWidth(6.5);
  // $phpexcel->getActiveSheet()->getColumnDimension('i')->setWidth(8.5);
  // $phpexcel->getActiveSheet()->getColumnDimension('j')->setWidth(6.5);
  // $phpexcel->getActiveSheet()->getColumnDimension('K')->setWidth(6.5);
  // $phpexcel->getActiveSheet()->getColumnDimension('L')->setWidth(13);


  $phpexcel->getActiveSheet()->getColumnDimension('A')->setWidth(2.8);
  $phpexcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
  $phpexcel->getActiveSheet()->getColumnDimension('C')->setWidth(25);
  $phpexcel->getActiveSheet()->getColumnDimension('D')->setWidth(70);
  $phpexcel->getActiveSheet()->getColumnDimension('E')->setWidth(12);
  $phpexcel->getActiveSheet()->getColumnDimension('F')->setWidth(12);
  $phpexcel->getActiveSheet()->getColumnDimension('G')->setWidth(12);
  $phpexcel->getActiveSheet()->getColumnDimension('H')->setWidth(12);
  $phpexcel->getActiveSheet()->getColumnDimension('i')->setWidth(12);
  $phpexcel->getActiveSheet()->getColumnDimension('j')->setWidth(12);
  $phpexcel->getActiveSheet()->getColumnDimension('K')->setWidth(12);
  $phpexcel->getActiveSheet()->getColumnDimension('L')->setWidth(35);
  
  
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
// $phpexcel->getActiveSheet()->getStyle('M1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
// $phpexcel->getActiveSheet()->getStyle('N1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
// $phpexcel->getActiveSheet()->getStyle('O1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
// $phpexcel->getActiveSheet()->getStyle('P1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
// $phpexcel->getActiveSheet()->getStyle('M1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
 
 $phpexcel->getActiveSheet()->getStyle('A1')->getFont()->setSize(8);//设置字体大小
 $phpexcel->getActiveSheet()->getStyle('B1')->getFont()->setSize(8);//设置字体大小
 $phpexcel->getActiveSheet()->getStyle('C1')->getFont()->setSize(8);//设置字体大小
 $phpexcel->getActiveSheet()->getStyle('D1')->getFont()->setSize(8);//设置字体大小
 $phpexcel->getActiveSheet()->getStyle('E1')->getFont()->setSize(8);//设置字体大小
 $phpexcel->getActiveSheet()->getStyle('F1')->getFont()->setSize(8);//设置字体大小
 $phpexcel->getActiveSheet()->getStyle('G1')->getFont()->setSize(8);//设置字体大小
 $phpexcel->getActiveSheet()->getStyle('H1')->getFont()->setSize(8);//设置字体大小
 $phpexcel->getActiveSheet()->getStyle('I1')->getFont()->setSize(8);//设置字体大小
 $phpexcel->getActiveSheet()->getStyle('J1')->getFont()->setSize(8);//设置字体大小
 $phpexcel->getActiveSheet()->getStyle('K1')->getFont()->setSize(8);//设置字体大小
 $phpexcel->getActiveSheet()->getStyle('L1')->getFont()->setSize(8);//设置字体大小


//  
//从数据库取得需要导出的数据
//得到参数id值

// echo $select;
// echo "<br/>";
$sql = "select * from ge_orders_primers where orderid = {$id} order by id asc";
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


   // 总量(O.D)
  $demand = intval($row['demand']);
  //分装管数
  $guan = intval($row['tubenum']);

  $panage_od = ($demand/$guan);

  //A，T，C，G的个数
  $sequence = strtoupper(trim($row['sequence']));
  $sequence = str_replace(" ","",$sequence);

  // var_dump($sequence);
  // echo "<br/>";
 //  $seq_br = ceil(strlen($sequence)/25);
 //  // echo $seq_br;
 //  // echo "<br/>";
 //  $sequence_br="";
 //  $sequence_end = "";
 //  if($seq_br >= 2){
 //  for($kk = 0;$kk < $seq_br;$kk ++){
 //  $sequence_br = substr($sequence,$kk*25,25);
 //  $sequence_br = $sequence_br." \n ";
 //  $sequence_end = $sequence_end.$sequence_br;
 //  // echo "<br/>";

  
 //  }
 //  $phpexcel->getActiveSheet()->getStyle('D'.$i)->getAlignment()->setWrapText(true); //该语句用于换行
 // }else{
 //  $sequence_end = $sequence;
 // }
 // var_dump($sequence_end);
 //  exit;


  $num_a = substr_count($sequence,'A');
  $num_t = substr_count($sequence,'T');
  $num_c = substr_count($sequence,'C');
  $num_g = substr_count($sequence,'G');

  $num_u = substr_count($sequence,'U');
  $num_m = substr_count($sequence,'M');
  $num_r = substr_count($sequence,'R');
  $num_w = substr_count($sequence,'W');
  $num_s = substr_count($sequence,'S');
  $num_y = substr_count($sequence,'Y');
  $num_k = substr_count($sequence,'K');
  $num_v = substr_count($sequence,'V');
  $num_h = substr_count($sequence,'H');
  $num_d = substr_count($sequence,'D');
  $num_b = substr_count($sequence,'B');
  $num_n = substr_count($sequence,'N');

  $num_atcg = $num_a + $num_t + $num_c + $num_g + $num_u + $num_m+ $num_r+ $num_w+ $num_s+ $num_y+ $num_k+ $num_v+ $num_h+ $num_d+ $num_b+ $num_n;
  //MW = A*343.21 + G*359.21 + C*319.18 +T*304.2+ U*320.2 + M*331.2 +R*351.21 + W*331.71 + S*339.2 +Y*319.69 + K*339.71 + V*340.53 + H*327.53 + D*340.87 + B*332.86 + N*335.45- 61.96
  $mw = ($num_a * 313.21)+($num_g * 329.21)+($num_c * 289.18)+($num_t * 304.2)+($num_u * 320.2)+($num_m * 331.2)+($num_r * 351.21)+($num_w * 331.71)+($num_s * 339.2)+($num_y * 319.69)+($num_k * 339.71)+($num_v * 340.53)+($num_h * 327.53)+($num_d * 340.87)+($num_b * 332.86)+($num_n * 335.45)-61.96;   
  //  E 260 = (E GT + E TA + E AA + E AA + E AA + E AC + E CG + E GA + E AC + E CG + E GG + E GC + E CC +E CA + E AG + E GT + E TG ) - (E T + E A + E A + E A + E A + E C + E G + E A + E C + E G + E G+ E C + E C + E A + E G + E T )                                   
  // $e =  
  // echo  $num_atcg;
  // exit;
  // echo $mw;
  // echo "<br/>";
  $count =  $num_atcg -1;
  // $j = 0;
  $rel_str = "";
  $str_two_sum = 0;
  for($j=0;$j < $count;$j++){
   $rel_str = substr($sequence,$j,2);

   $str_a = substr($rel_str,0,1);
   $str_b = substr($rel_str,1,1);
   // echo $str_a."___".$str_b."___".$rel_str."<br/>";
   $sql = "select * from ge_primer_report where word = '{$str_a}'";
   $query_str = mysql_query($sql);
   $row_str = mysql_fetch_assoc($query_str);
   // var_dump($row_str);
   // echo "<br/>";
  
   foreach($row_str as $key=>$value){
    if($key == $str_b){
       $value = intval($value);
       // echo $value."<br/>";
       // var_dump($value);
       $str_two_sum = $str_two_sum + $value;
    }
   }
   
   $rel_str = "";
   // exit;
  }
  // echo $str_two_sum;
 
  $new_sequence = substr($sequence,1,$num_atcg-2);
  $new_count = $num_atcg - 2;
  // var_dump($new_sequence,$new_count);
   
  $str_one_sum = 0;
  for($k=0;$k < $new_count;$k ++){
  $str_new = substr($new_sequence,$k,1);

  $sql_new = "select num from ge_primer_report_two where word_two = '{$str_new}'";
  $query_new = mysql_query($sql_new);
  $row_new = mysql_fetch_assoc($query_new);
  // var_dump($row_new);
  foreach($row_new as $key_new => $value_new){
   $value_one = intval($value_new);
   // echo "<br/>".$value_one."<br/>";
   $str_one_sum = $str_one_sum + $value_one;
  }

  }
  // echo $str_one_sum;(1/182,600)* 106=5.48

  // exit;
  $eee = $str_two_sum - $str_one_sum;
  // echo $eee."<br/>";
  $nmole_od = (1/$eee)*1000000;
  $nmole_guan = $nmole_od * $panage_od;
  $nmole_od = round($nmole_od,2);
  $nmole_guan = round($nmole_guan,2);
  $nmole_guan_end = $nmole_guan * 10;
  // echo $nmole_od;
  // echo "<br/>";
  // $ss = (1/182600)* 1000000;
  // echo $ss;
   $ug_od = (1/$eee) * ($mw * 1000);
   $ug_od = round($ug_od,2);
  //  echo $ug_od;
  // exit;
  // var_dump($num_a,$num_t,$num_c,$num_g);
 
  // exit;
  // $v = ($num_a * 15.3) + ($num_c * 7.4) + ($num_g * 11.8) + ($num_t * 9.3);
  
  // MW
  // $aa = ($num_a * 313.21) + ($num_g * 329.21) + ($num_c * 289.18) + ($num_t * 304.20) - 61.96;
  // $aa = round($aa,1);
  // nmole
  // $bb = 1000/$v;
  // $bb = round($bb,2);
  // $end = $bb * 10;
  // TM1
  $cc = 0.41 * (($num_c + $num_g)/$num_atcg) - (675/$num_atcg) + 81.5;  
  // // TM1-1
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


 $primer_name = iconv('gb2312','utf-8',$row['primername']);

  $phpexcel->getActiveSheet() ->setCellValue('A'.$i,"")
                              ->setCellValue('B'.$i,$row['primer_shui'])
                              ->setCellValue('C'.$i, $primer_name)
                              ->setCellValue('D'.$i, $sequence)
                              ->setCellValue('E'.$i, $num_atcg)                           
                              ->setCellValue('F'.$i, $panage_od)
                              ->setCellValue('G'.$i, $guan)
                              ->setCellValue('H'.$i, $row['puremthod'])

                              ->setCellValue('I'.$i, $mw)
                              ->setCellValue('J'.$i, $cd)
                              // ->setCellValue('J'.$i, $ug_od)
                              ->setCellValue('K'.$i, $nmole_guan)
                              ->setCellValue('L'.$i, $nmole_guan_end);
                            // ->setCellValue('M'.$i, $ee)
                            // ->setCellValue('N'.$i, $ff)
                            // ->setCellValue('O'.$i, $gg)
                            // ->setCellValue('P'.$i, $hh);
                            // ->setCellValue('L'.$i, $row['jk_a_say']);


$phpexcel->getActiveSheet()->getStyle('A'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$phpexcel->getActiveSheet()->getStyle('B'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$phpexcel->getActiveSheet()->getStyle('C'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
$phpexcel->getActiveSheet()->getStyle('D'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
$phpexcel->getActiveSheet()->getStyle('E'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$phpexcel->getActiveSheet()->getStyle('F'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$phpexcel->getActiveSheet()->getStyle('G'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$phpexcel->getActiveSheet()->getStyle('H'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$phpexcel->getActiveSheet()->getStyle('I'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$phpexcel->getActiveSheet()->getStyle('J'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$phpexcel->getActiveSheet()->getStyle('K'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$phpexcel->getActiveSheet()->getStyle('L'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
// $phpexcel->getActiveSheet()->getStyle('M'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
// $phpexcel->getActiveSheet()->getStyle('N'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
// $phpexcel->getActiveSheet()->getStyle('O'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
// $phpexcel->getActiveSheet()->getStyle('P'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
// $phpexcel->getActiveSheet()->getStyle('M'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
 $phpexcel->getActiveSheet()->getStyle('A'.$i)->getFont()->setSize(8);//设置字体大小
 $phpexcel->getActiveSheet()->getStyle('B'.$i)->getFont()->setSize(8);//设置字体大小
 $phpexcel->getActiveSheet()->getStyle('C'.$i)->getFont()->setSize(8);//设置字体大小
 $phpexcel->getActiveSheet()->getStyle('D'.$i)->getFont()->setSize(8);//设置字体大小
 $phpexcel->getActiveSheet()->getStyle('E'.$i)->getFont()->setSize(8);//设置字体大小
 $phpexcel->getActiveSheet()->getStyle('F'.$i)->getFont()->setSize(8);//设置字体大小
 $phpexcel->getActiveSheet()->getStyle('G'.$i)->getFont()->setSize(8);//设置字体大小
 $phpexcel->getActiveSheet()->getStyle('H'.$i)->getFont()->setSize(8);//设置字体大小
 $phpexcel->getActiveSheet()->getStyle('I'.$i)->getFont()->setSize(8);//设置字体大小
 $phpexcel->getActiveSheet()->getStyle('J'.$i)->getFont()->setSize(8);//设置字体大小
 $phpexcel->getActiveSheet()->getStyle('K'.$i)->getFont()->setSize(8);//设置字体大小
 $phpexcel->getActiveSheet()->getStyle('L'.$i)->getFont()->setSize(8);//设置字体大小
  



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