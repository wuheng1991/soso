 <?php
 header("content-type:text/html;charset=utf-8");
//   header("Content-type:application/vnd.ms-excel");
//  header("Content-Disposition:filename=test.xls");
//  echo "test1\t";
//  echo "test2\t\n";
//  echo "test1\t";
//  echo "test2\t\n";
//  echo "test1\t";
//  echo "test2\t\n";
// echo "test1\t";
// echo "test2\t\n";
// echo "test1\t";
// echo "test2\t\n";
// echo "test1\t";
// echo "test2\t\n";

// 

 require_once './Classes/PHPExcel.php';  

$objExcel = new PHPExcel();  
$objWriter = new PHPExcel_Writer_Excel5($objExcel);     // 用于其他版本格式  
$objExcel->setActiveSheetIndex(0);  
$objActSheet = $objExcel->getActiveSheet();  
//设置当前活动sheet的名称  

$objActSheet->setTitle('sheet1');  

$objActSheet->setCellValue('A2', '中国11');  // 设置Excel中的内容  A2表示坐标

//生成excel到文件  
//$objWriter->save('./test.xls');  
//或者直接浏览器下载   (任选其一)
$outputFileName = "output.xls";
header("Content-Type:application/octet-stream;charset=utf-8");
header('Content-Disposition: attachment; filename=' . $outputFileName);
$objWriter->save('php://output');
?>