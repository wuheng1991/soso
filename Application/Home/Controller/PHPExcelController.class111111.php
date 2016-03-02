<?php
namespace Home\Controller;
use Think\Controller;
class PHPExcelController extends Controller{
  
  public function __construct(){
    //$PHPReader = new PHPExcel_Reader_Excel2007();
    echo 'ssss';
  }
  public function a(){
	Vendor("PHPExcel.PHPExcel");
  	$PHPReader = new PHPExcel_Reader_Excel2007();
  }
}

?>