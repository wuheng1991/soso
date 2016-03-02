<?php
namespace Home\Controller;
use Think\Controller;
header("content-type:text/html;charset=utf-8");


class TestController extends Controller {
	public function index(){
		  //excel文件读取开始
	     $PHPExcel = new \Think\PHPExcel();
	     // var_dump($PHPExcel);
	     $filePath = "./Uploads/Test/test.xlsx";
	      $PHPReader=new \PHPExcel_Reader_Excel2007();
	      // var_dump($PHPReader);
	      if(!$PHPReader->canRead($filePath)){   
            $PHPReader = new PHPExcel_Reader_Excel5(); //如果不成功的时候用以前的版本来读取  
            if(!$PHPReader->canRead($filePath)){   
                echo 'no Excel';   
                return ;   
            }   
        }  

         $PHPExcel=$PHPReader->load($filePath);
	      //获取表中的第一个工作表，如果要获取第二个，把0改为1，依次类推
        $currentSheet=$PHPExcel->getSheet(0);
         //获取总列数
        $allColumn=$currentSheet->getHighestColumn();
        //获取总行数
        $allRow=$currentSheet->getHighestRow(); 
        // var_dump($allColumn,$allRow);
         for($currentRow=5;$currentRow<=$allRow;$currentRow++){
            //从哪列开始，A表示第一列
            for($currentColumn='A';$currentColumn<='G';$currentColumn++){
                //数据坐标
                $address=$currentColumn.$currentRow;
                //读取到的数据，保存到数组$arr中
                $data[$currentRow][$currentColumn]=$currentSheet->getCell($address)->getValue();
                 
            }
            //判断数组原始是否为空。如果为空，跳出循环
            // if(empty($data[$currentRow]['C']) && empty($data[$currentRow]['B'])){
            // 	unset($data[$currentRow]);
            // 	break;
            // }

        }
        var_dump($data);

	}
}


?>