<?php
namespace Home\Controller;
use Think\Controller;
header("content-type:text/html;charset=utf-8");
date_default_timezone_set('PRC');

class PrimerController extends Controller {
    public function index(){
		if (UserController::isLogin()){
			$order = M('Orders');
			$result = $order->field('id,code,uid,description,info,addtime,ordertype,status')->where(" uid = '".session('uid')."' ")->order('id desc')->limit(10)->select();
			$this->assign('orderList',$result);
			$this->display();
		} else {
			redirect(U('/Home/User/'));
		}
    }
	
	#
	public function Create(){
		if (!UserController::isLogin()){
			redirect(U('/Home/User/'));
		}
		# 客户信息
		$userInfo = getUserInfo(session('uid'));
		$this->assign('userInfo',$userInfo);
		$this->display();
	}
	
	public function step(){
		if (!UserController::isLogin()){
			redirect(U('/Home/User/'));
		}


		# 客户信息
		$userInfo = getUserInfo(session('uid'));
		$this->assign('userInfo',$userInfo);
		if ($_FILES){
			$upload = new \Think\Upload();// 实例化上传类
			$upload->maxSize = 3145728000 ;// 设置附件上传大小
			$upload->exts = array('xls', 'xlsx');// 设置附件上传类型
			$upload->rootPath = './Uploads/'; // 设置附件上传根目录
			$upload->savePath = 'Excel/'; // 设置附件上传（子）目录
			// 上传文件
			$info = $upload->upload();
			if(!$info) {// 上传错误提示错误信息
				$this->error($upload->getError());
			}else{// 上传成功 获取上传文件信息
				foreach($info as $file){
					$url = $file['savepath'].$file['savename'];
				}
			}
			$url = $upload->rootPath.$url;
			
			# 生成订单
			$code = createProCode(10);


		

			# 检测code唯一
			$order = M('Orders');
			$checkOrder = $order->where(" code = '".$code."' ")->find();
			if($checkOrder){
				$code = createProCode(10);
			}


				//生产引物新订单 
		// 订单号命名为YW-15（年）08（月）0001（第几个订单）
		$head = "YW-";

		$date = substr(date("Ym",time()),2,4);
		$he = $head.$date;  //前半
	    $where['code_yw'] = array('like',$he."%");
	    $num = $order ->where($where) -> count();
        
        $her = "" ; //后半


	    //得到当前的数量
	    $current = intval($num) + 1;
	    $length = strlen($current);
	    if($length == 1){
	    	$her = "000".$current;
	    }elseif($length == 2){
            $her = "00".$current;
	    }elseif($length == 3){
            $her = "0".$current;
	    }else{
	    	$her = "".$current;
	    }


	    $zero = $he.$her;
			#对于上传excel表单，订单状态为：订单已提交
			$orderData = array(
				'code' => $code,
				'code_yw' => $zero,
				'uid' => session('uid'),
				'addtime' => time(),
				'excelurl' => $url,
				'ordertype'=>2,
				'status' =>2
			);
			$orderID = $order->data($orderData)->add();

            //excel文件读取开始
	     $PHPExcel = new \Think\PHPExcel();
	    // $filePath = $flag_type;
	     $flag_type = $order -> field("excelurl") -> where('id = '.$orderID)->find();
          $filePath = $flag_type['excelurl'];
         
          $arr = explode('.',$filePath);
          
           //得到后缀
          $exts =  trim($arr[2]);
          // echo $exts;
          // exit;
            if($exts == 'xls'){
            // import("Org.Util.PHPExcel.Reader.Excel5");
            $PHPReader=new \PHPExcel_Reader_Excel5();
        }else if($exts == 'xlsx'){
            // import("Org.Util.PHPExcel.Reader.Excel2007");
            $PHPReader=new \PHPExcel_Reader_Excel2007();
        }

	        // $PHPReader=new \PHPExcel_Reader_Excel5();
	         // $PHPReader=new \PHPExcel_Reader_Excel2007();
         if(!$PHPReader->canRead($filePath)){   
            $PHPReader = new PHPExcel_Reader_Excel5(); //如果不成功的时候用以前的版本来读取  
            if(!$PHPReader->canRead($filePath)){   
                echo 'no Excel';   
                return ;   
            }   
        }   
	   
	        // exit;
	     $PHPExcel=$PHPReader->load($filePath);
	      //获取表中的第一个工作表，如果要获取第二个，把0改为1，依次类推
        $currentSheet=$PHPExcel->getSheet(0);
         //获取总列数
        $allColumn=$currentSheet->getHighestColumn();
        //获取总行数
        $allRow=$currentSheet->getHighestRow();
        // var_dump($allColumn, $allRow);
        // exit;
         for($currentRow=14;$currentRow<=$allRow;$currentRow++){
            //从哪列开始，A表示第一列
            for($currentColumn='A';$currentColumn<='K';$currentColumn++){
                //数据坐标
                $address=$currentColumn.$currentRow;
                //读取到的数据，保存到数组$arr中
                $data[$currentRow][$currentColumn]=$currentSheet->getCell($address)->getValue();
                 
            }

            if($data[14]['B'] != "Primer名称" && $data[14]['D'] != "碱基数"){

           $order -> where('id = '.$orderID) -> delete(); //删除该订单信息 	
         echo "<script>alert('sorry,该文件上传失败。请使用金开瑞提供的订购表单！');</script>";
         echo "<script>window.history.back();</script>";
         exit;
            }
            //判断数组原始是否为空。如果为空，跳出循环
            if(empty($data[$currentRow]['C']) && empty($data[$currentRow]['B'])){
            	unset($data[$currentRow]);
            	break;
            }

        }

         $yinwu_num = count($data) - 1;
        $sum = 0;



        // 形成订单开始

        // 形成订单合适
  //       echo $yinwu_num;
		// echo '<pre>';
  //                print_r($data);
		// 		 exit;
       // var_dump($data);
       // echo "<hr/>";
         for($ii = 15; $ii < (15+$yinwu_num); $ii++){
         	
              $primers_info = array();
         	

         	// exit;
         	 //插入primaer_order表开始
                   //名称，序列，碱基数，需求量，分管数，纯化方式，5修饰，3修饰，其他修饰,备注
                  $a = trim($data[$ii]['B']);//名称
                  $b = trim($data[$ii]['C']);//序列
                  // $num_c = strlen($b);
                  // $c = $b;//碱基数
                  $c = trim($b);
                  $c = str_replace(" ","",$c);
                  $c = strlen($c);
                   
                  $d = trim($data[$ii]['E']);//需求量
                  if($d == ''){
                  $d = 2;
                  }
                  $e = trim($data[$ii]['F']);//分管数
                  if($e == ''){
                   $e = 2;
                  }
                  //对数据的判断
                  $f = strtoupper(trim($data[$ii]['G']));//纯化方式
                  if($f == 'PAGE'){
                    $f = 1;
                  }elseif($f == 'DSL'){
                    $f = 2;
                  }elseif($f == 'HPLC'){
                     $f = 3;
                  }elseif($f == 'PAGE plus'){
                     $f = 4;
                  }elseif($f == 'RPC'){
                    $f = 5;
                  }elseif($f == 'OPC'){
                    $f = 6;
                  }elseif($f == 'HAP'){
                    $f = 7;
                  }elseif($f == 'ULTRAPAGE'){
                    $f = 8;
                  }else{
                     $f = 2;
                  }

                  $g = strtolower(trim($data[$ii]['H']));//5修饰
                  if($g == strtolower("PO4")){
                   $g=1;
                  }elseif($g == strtolower("NH2 C3")){
                   $g=2;
                  }elseif($g == strtolower("NH2 C6")){
                   $g=3;
                  }elseif($g == strtolower("NH2 C12")){
                   $g=4;
                  }elseif($g == strtolower("NH2 C6 dT")){
                   $g=5;
                  }elseif($g == strtolower("SH C6")){
                   $g=6;
                  }elseif($g == strtolower("Biotin")){
                   $g=7;
                  }elseif($g == strtolower("Biotin TEG")){
                   $g=8;
                  }elseif($g == strtolower("Dual Biotin")){
                   $g=9;
                  }elseif($g == strtolower("Digoxin")){
                   $g=10;
                  }elseif($g == strtolower("Cy3")){
                   $g=11;
                  }elseif($g == strtolower("Cy5")){
                   $g=12;
                  }elseif($g == strtolower("FAM")){
                   $g=13;
                  }elseif($g == strtolower("HEX")){
                   $g=14;
                  }elseif($g == strtolower("TET")){
                   $g=15;
                  }elseif($g == strtolower("6-JOE")){
                   $g=16;
                  }elseif($g == strtolower("Rox")){
                   $g=17;
                  }elseif($g == strtolower("TAMRA")){
                   $g=18;
                  }else{
                   $g=0;
                  }

                  $h = strtolower(trim($data[$ii]['I']));//3修饰
                  if($h == strtolower("PO4")){
                   $h=1;
                  }elseif($h == strtolower("NH2 C3")){
                   $h=2;
                  }elseif($h == strtolower("NH2 C7")){
                  	$h=3;
                  }elseif($h == strtolower("NH2 C6 dT")){
                  	$h=4;
                  }elseif($h == strtolower("SH C6")){
                  	$h=5;
                  }elseif($h == strtolower("Biotin")){
                  	$h=6;
                  }elseif($h == strtolower("Biotin TEG")){
                  	$h=7;
                  }elseif($h == strtolower("Digoxin")){
                  	$h=8;
                  }elseif($h == strtolower("Cy3")){
                  	$h=9;
                  }elseif($h == strtolower("Cy5")){
                  	$h=10;
                  }elseif($h == strtolower("FAM")){
                  	$h=11;
                  }elseif($h == strtolower("6-JOE")){
                  	$h=12;
                  }elseif($h == strtolower("Rox")){
                  	$h=13;
                  }elseif($h == strtolower("TAMRA")){
                  	$h=14;
                  }elseif($h == strtolower("DABCYL")){
                    $h=15;
                  }elseif($h == strtolower("BHQ 1")){
                    $h=16;
                  }elseif($h == strtolower("BHQ 2")){
                    $h=17;
                  }else{
                    $h=0;
                  }

                  
                  $i = strtolower(trim($data[$ii]['J']));//其他修饰
                  if($i == strtolower("dI")){
                   $i=1;
                  }elseif($i == strtolower("dU")){
                   $i=2;
                  }elseif($i == strtolower("SPO3")){
                  $i=3;
                  }else{
                  $i=0;
                  }

                  $j = trim($data[$ii]['K']);//备注 

                  // $boy = "";
                  // 流水号开始
                    $orders_primer = M('OrdersPrimers');
                  // 订单号命名为A15（年）08（月）0001（第几个订单）
		$header = "A";

		$date_new = substr(date("Ym",time()),2,4);
		$boy = $header.$date_new;  //前半
	    $where['primer_shui'] = array('like',$boy."%");

	    $num_new = $orders_primer ->where($where) -> count();
        
        $girl = "" ; //后半


	    //得到当前的数量
	    $curr = intval($num_new) + 1;
	    $leng = strlen($curr);
	    if($leng == 1){
	    	$girl = "000".$curr;
	    }elseif($leng == 2){
            $girl = "00".$curr;
	    }elseif($leng == 3){
            $girl = "0".$curr;
	    }else{
	    	$girl = "".$curr;
	    }


	    $one = $boy.$girl;
                  // 流水号结束


                 $primers_info = array(
				'orderid' =>$orderID,
				'primer_shui'=>$one,
				'primername' =>$a,
				'sequence' =>$b,
				'basenum' =>$c,
				'demand' =>$d,
				'tubenum' =>$e,
				'puremthod' =>$f,
				'fmodification' =>$g,
				'tmodification' =>$h,
				'othermod' =>$i,
				'isreserve' =>1,
				'addtime' => time()
			   );
			    // echo '<pre>';
                //  var_dump($a,$b,$c) ;
                // print_r($primers_info);
                //  exit;
               
                  $orders_primer -> data($primers_info)->add();



                  //插入primaer_order表结束
                // if($i == (5 + $yinwu_num)){
                // 	break;
                // }
         	   // break;
         }
         // exit;
       
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;
       
         

         //执行更新操作
         // if($filePath != ''){
         	$orders = M('Orders');
         	$where['id'] = $orderID;
         	$where['num_yinwu'] = $yinwu_num;
         	$orders -> data($where)->save();
         // }
        
        // $arr = $data;
        
        // exit;
			
			$this->success('下单成功',U('/Index/'));
			exit;
			
			/* import("PHPExcel.PHPExcel",'','.php');
			//创建PHPExcel对象，注意，不能少了\
			$PHPExcel=new \PHPExcel();
			$exts = 'xls';
			//如果excel文件后缀名为.xls，导入这个类
			if($exts == 'xls'){
				import("PHPExcel.PHPExcel.Reader.Excel5",'','.php');
				$PHPReader=new \PHPExcel_Reader_Excel5();
			}else if($exts == 'xlsx'){
				import("PHPExcel.PHPExcel.Reader.Excel2007",'','.php');
				$PHPReader=new \PHPExcel_Reader_Excel2007();
			} 


			//载入文件
			$PHPExcel=$PHPReader->load($url);
			//获取表中的第一个工作表，如果要获取第二个，把0改为1，依次类推
			$currentSheet=$PHPExcel->getSheet(0);
			//获取总列数
			$allColumn=$currentSheet->getHighestColumn();
			//获取总行数
			$allRow=$currentSheet->getHighestRow();
			//循环获取表中的数据，$currentRow表示当前行，从哪行开始读取数据，索引值从0开始
			for($currentRow=4;$currentRow<=$allRow;$currentRow++){
				//从哪列开始，A表示第一列
				for($currentColumn='A';$currentColumn<=$allColumn;$currentColumn++){
					//数据坐标
					$address=$currentColumn.$currentRow;
					//读取到的数据，保存到数组$arr中
					$data[$currentRow][$currentColumn]=$currentSheet->getCell($address)->getValue();
				}

			}
			foreach($data as $dk=>$dv){
				if ($dv['B'] != ''){
					echo $dv['A'].'---'.$dv['B'];
					echo '<br>';
				}
			}
			 */
			
		} else {
			$num = I('num',1,'int');
			$this->assign('num',$num);
			#$result = M('Primers')->where('ptype = 1')->select();
			#$this->assign('primers',$result);
			$this->display();
		}
	}



	public function save(){
		if (!UserController::isLogin()){
			redirect(U('/Home/User/'));
		}

		
		$primerNum = I('post.num','1','int');
		// echo "1234";
		// exit;
		// echo "aa";
		// var_dump($primerNum);
		// exit;
		
		for($i=1;$i<=$primerNum;$i++){
			 $primername = I('post.primername'.$i,'','trim');
			 $primername = str_replace("'","",$primername);
			 $primername = addslashes($primername);
			 
			 $primername = str_replace("\'","",$primername);
			 $primername = str_replace(";","",$primername);
			 $primername = str_replace("%","",$primername);
			 $primername = str_replace("?","",$primername);
			 $primername = str_replace("@","",$primername);
			 $primername = str_replace("/","",$primername);
			 $primername = str_replace("#","",$primername);
			 $primername = str_replace("*","",$primername);
			 $primername = str_replace("&","",$primername);
			 $primername = str_replace("^","",$primername);
			 $primername = str_replace("(","",$primername);
			 $primername = str_replace(")","",$primername);
			 $primername = str_replace("-","",$primername);
			 $primername = str_replace("||","",$primername);
			 $primername = str_replace('\"',"",$primername);
			 $primername = str_replace("{","",$primername);
			 $primername = str_replace("}","",$primername);
			 $primername = str_replace("+","",$primername);
			 $primername = str_replace("=","",$primername);
			 $primername = str_replace("!","",$primername);
			 $primername = str_replace(":","",$primername);
			 $primername = str_replace("`","",$primername);
			 $primername = str_replace("|","",$primername);
			 $primername = str_replace("[","",$primername);
			 $primername = str_replace("]","",$primername);
			 $primername = str_replace("<","",$primername);
			 $primername = str_replace(">","",$primername);
			 $primername = str_replace(".","",$primername);
			 $primername = str_replace("~","",$primername);
			 $primername = str_replace("_","",$primername);
			 $primername = str_replace("\\","",$primername);
			$primers[$i] = array(
				'id' => I('post.pid'.$i,'','int'),

				'primername' => $primername,
				'sequence' => I('post.sequence'.$i,''),
				'basenum' => strlen(I('post.sequence'.$i,'')),
				'demand' => I('post.demand'.$i,'','int'),
				'tubenum' => I('post.tubenum'.$i,'','int'),
				'puremthod' => I('post.puremthod'.$i,'','int'),
				'fmodification' => I('post.fmodification'.$i,'','int'),
				'tmodification' => I('post.tmodification'.$i,'','int'),
				'othermod' => I('post.othermod'.$i,'','int'),
				'isreserve' => I('post.isreserve'.$i,'1','int'),
				'addtime' => time(),
				'note' => I('post.note'.$i,'')
			);
		}

		// var_dump($primers);
		// exit;
		
		# 检测参数
		foreach ($primers as $sk=>$sv){
			if ($sv['primername'] == ''){
				unset($primers[$sk]);
			}
			foreach($sv as $kk=>$kv){
				if ($kv==''){
					switch( $kk){
						case 'primername':$this->error('第'.$sk.'行引物名称错误！');break;
						case 'sequence':$this->error('第'.$sk.'行引物序列错误！');break;
						case 'demand':$this->error('第'.$sk.'行引物需求量错误！');break;
						case 'tubenum':$this->error('第'.$sk.'行引物分装管数错误！');break;
						case 'puremthod':$this->error('第'.$sk.'行引物纯化方式错误！');break;
						default:
							continue;
					}
				}
			}
		}
		# 生成订单
		$code = createProCode(10);
		# 检测code唯一
		$order = M('Orders');
		$checkOrder = $order->where(" code = '".$code."' ")->find();
		if($checkOrder){
			$code = createProCode(10);
		}

		//生产引物新订单 
		// 订单号命名为YW-15（年）08（月）0001（第几个订单）
		$head = "YW-";

		$date = substr(date("Ym",time()),2,4);
		$he = $head.$date;  //前半
	    $where['code_yw'] = array('like',$he."%");
	    $num = $order ->where($where) -> count();
        
        $her = "" ; //后半


	    //得到当前的数量
	    $current = intval($num) + 1;
	    $length = strlen($current);
	    if($length == 1){
	    	$her = "000".$current;
	    }elseif($length == 2){
            $her = "00".$current;
	    }elseif($length == 3){
            $her = "0".$current;
	    }else{
	    	$her = "".$current;
	    }


	    $zero = $he.$her;

	    // echo $zero;
	    // exit;





		$orderData = array(
			'code' => $code,
			'code_yw' => $zero,
			'uid' => session('uid'),
			'addtime' => time(),
			'description' => I('post.desc'),
			'info' => I('post.info'),
			'ordertype' => 2,
			'num_yinwu' => $primerNum
		);
		$orderID = $order->data($orderData)->add();
		
		if ($orderID){
			$orders_primers = M('OrdersPrimers');
			$recodeIDStr = '';
			foreach($primers as $pk=>$pv){
				$pv['orderid'] = $orderID;
				$primersID = $orders_primers->data($pv)->add();
				if ($primersID){
					if ($recodeIDStr != '') $recodeIDStr .= ',';
					$recodeIDStr .= $primersID;
				} else {
					# 删除已经写入数据库信息
					$laseSql = $orders_primers->getLastSql();
					$rs = $orders_primers->where(" id IN(".$recodeIDStr.")")->delete();
					$this->error($laseSql);
				}
			}
			$this->success('下单成功',U('/Primer/info','id='.$orderID));
		} else {
			$this->error('下单错误！');
		}
	}




	
	public function info(){
		if (!UserController::isLogin()){
			redirect(U('/Home/User/'));
		}
		// echo "aaa";

		$orderID = I('get.id','','int');
		if ($orderID == '') redirect(U('/Index/'));
		$this -> assign("orderid",$orderID);
		$this -> assign("id_user",session('uid'));
		$order = M('Orders');
		$note = M('Contents');
		//判断引物信息是在线提交，还是上传的excel表单
		$flag_type = $order -> field("excelurl") -> where('id = '.$orderID)->find();
		// if($flag_type == '')
		  // var_dump($flag_type);
		  // exit;
 		$orderInfo = $order->where(' id = '.$orderID)->find();
		$this->assign('orderInfo',$orderInfo);

		// var_dump($orderInfo);
		# 获取下级数据
		$orders_primers = M('OrdersPrimers');
		$countNum = $orders_primers->where(' orderid = '.$orderID)->count();
		$list = $orders_primers->where(' orderid = '.$orderID)->select();

		// $basenum = $orders_primers->where(' orderid = '.$orderID)->Sum('basenum');


		$this->assign('basenum',$orderID);
		
		$this->assign('list',$list);
		$this->assign('num',$countNum);


	     	    // else{
	    // 	echo "aaaaa";
	    // 	exit;
	      //留言信息
		     $note = M('Contents');
		     $notes = $note -> where("id_order = ".$orderID)->field('content,addtime,flag')->order("addtime ASC")->select();
		     $this -> assign("notes",$notes);

		     $note_infos['status']=2;
		     $note -> where('id_order = '.$orderID)->data($note_infos)->save();
        
  
		# 客户信息
		$userInfo = getUserInfo(session('uid'));
		$this->assign('userInfo',$userInfo);
		// echo '<pre>';
		// print_r($list);
		if($orderInfo['status'] == 2){
			$this->display();
		} else {
			$this->display('infoupdate');
			// echo "<hr/>";
		//	var_dump($orderInfo);
			// echo "<hr/>";
		//	var_dump($list);
		}
	}
	# 订单确认
	public function Confirm(){
		if (!UserController::isLogin()){
			redirect(U('/Home/User/'));
		}
		# 检测订单信息
		$oid = I('post.orderid','','int');
		if ($oid == ''){
			$this->error('订单信息错误');
		}
		$order = M('Orders');
		$orderInfo = $order->where(' id = '.$oid)->find();
		if ($orderInfo){
			if ($orderInfo['uid'] != session('uid')){
				$this->error('订单信息错误');
			}
		} else {
			$this->error('订单信息错误');
		}
		$primerNum = I('post.num','0','int');
		if ($primerNum == 0){
			$this->error('参数错误！');
		}
		for($i=1;$i<=$primerNum;$i++){
			 $primername = I('post.primername'.$i,'','trim');
             $primername = addslashes($primername);
             $primername = str_replace("'","",$primername);
			 $primername = str_replace("\'","",$primername);
			 $primername = str_replace(";","",$primername);
			 $primername = str_replace("%","",$primername);
			 $primername = str_replace("?","",$primername);
			 $primername = str_replace("@","",$primername);
			 $primername = str_replace("/","",$primername);
			 $primername = str_replace("#","",$primername);
			 $primername = str_replace("*","",$primername);
			 $primername = str_replace("&","",$primername);
			 $primername = str_replace("^","",$primername);
			 $primername = str_replace("(","",$primername);
			 $primername = str_replace(")","",$primername);
			 $primername = str_replace("-","",$primername);
			 $primername = str_replace("||","",$primername);
			 $primername = str_replace('\"',"",$primername);
			 $primername = str_replace("{","",$primername);
			 $primername = str_replace("}","",$primername);
			 $primername = str_replace("+","",$primername);
			 $primername = str_replace("=","",$primername);
			 $primername = str_replace("!","",$primername);
			 $primername = str_replace(":","",$primername);
			 $primername = str_replace("`","",$primername);
			 $primername = str_replace("|","",$primername);
			 $primername = str_replace("[","",$primername);
			 $primername = str_replace("]","",$primername);
			 $primername = str_replace("<","",$primername);
			 $primername = str_replace(">","",$primername);
			 $primername = str_replace(".","",$primername);
			 $primername = str_replace("~","",$primername);
			 $primername = str_replace("_","",$primername);
			 $primername = str_replace("\\","",$primername);


			$primers[$i] = array(
				'id' => I('post.pid'.$i,'','int'),
				'orderid' => $orderInfo['id'],
				'primername' => $primername,
				'sequence' => I('post.sequence'.$i,''),
				'basenum' => strlen(I('post.sequence'.$i,'')),
				'demand' => I('post.demand'.$i,'','int'),
				'tubenum' => I('post.tubenum'.$i,'','int'),
				'puremthod' => I('post.puremthod'.$i,'','int'),
				'fmodification' => I('post.fmodification'.$i,'','int'),
				'tmodification' => I('post.tmodification'.$i,'','int'),
				'othermod' => I('post.othermod'.$i,'','int'),
				'isreserve' => I('post.isreserve'.$i,'1','int'),
				'addtime' => time(),
				'note' => I('post.note'.$i,'')
			);
		}
		$orders_primers = M('OrdersPrimers');
		
		# 检测参数
		foreach ($primers as $sk=>$sv){
			foreach($sv as $kk=>$kv){
				if ($kv==''){
					switch( $kk){
						case 'primername':$this->error('第'.$sk.'行引物名称错误！');break;
						case 'sequence':$this->error('第'.$sk.'行引物序列错误！');break;
						case 'demand':$this->error('第'.$sk.'行引物需求量错误！');break;
						case 'tubenum':$this->error('第'.$sk.'行引物分装管数错误！');break;
						case 'puremthod':$this->error('第'.$sk.'行引物纯化方式错误！');break;
						default:
							continue;
					}
				}
			}
		}
		foreach ($primers as $pk=>$pv){
			if ($pv['id'] > 0){
				$orders_primers->data($pv)->save();
			} else {
				$orders_primers->data($pv)->add();
			}
		}
		# 更新订单信息
		$primerNum = I('post.num','1','int');
		$orderData = array(
			'id' => $orderInfo['id'],
			'status' => 2,
			'num_yinwu' => $primerNum
		);
		if ($order->data($orderData)->save()){

			//得到客户信息
			$uInfo = M('MembersInfo')->where(' uid = '.session('uid'))->find();
			$uEmail = M('Members') -> where('id ='.session('uid'))->find();
			$this -> assign("uEmail",$uEmail['username']);
			$this->assign('userInfo',$uInfo);
			#订单成功
			$this->success('订单确认成功',U('/Primer/info','id='.$orderID));
		}
	}



	# 文件下载
	public function file(){
		if (!UserController::isLogin()){
			redirect(U('/Home/User/'));
		}
		$id = I('get.oid','','int');
		if ($id > 0){
			$order = M('Orders');
			$info = $order->where('id = '.$id)->find();
			if ($info){
				if (is_file($info['excelurl'])){
					$a=new \Org\Net\Http();
					$a->download($info['excelurl']);
				} else {
					$this->error('文件不存在！',U('Index/index'));
				}
				exit;
			} else $this->error('参数错误！');
		}else $this->error('参数错误！');
	}
	
	public function ajax(){
		$datastr = I('post.data','');
		$resutl['status'] = true;
		if ($datastr != ''){
			$data = explode('|',$datastr);
			$html = '';
			if (count($data) ==2){
				if ($data[0] == $data[1]) {
					$resutl['biao'] = array(1,2);
					$resutl['html'] = '第1行与第2行的序列相同';
					$resutl['status'] = false;
				}
			} else {
				$str = '';
				foreach($data as $k=>$v){
					foreach($data as $dk=>$dv){
						if ($dv==$v && $dk!=$k){
							if ($str != '') $str .= ",";
							$str .= ($k+1).','.($dk+1);
							$html .= '第'.($k+1).'行与第'.($dk+1).'行的序列相同';
							$resutl['status'] = false;
						}
					}
				}
				$resutl['biao'] = array_unique(explode(',',$str));
				$resutl['html'] = $html;
			}
		} else {
			$resutl['status'] = false;
		}
		echo json_encode($resutl);
	}

	//此处下载引物excel表单
	public function yinwu_excel(){
		if (!UserController::isLogin()){
			redirect(U('/Home/User/'));
		}
		// echo "aaa";
		$path = "./Uploads/Download/yinwu.xlsx";
		// file_get_contents($path);
		//下载的文件名
		//用以解决中文不能显示出来的问题
         // $haha = "金开瑞引物合成在线订购单模版-";
         // echo iconv('UTF-8','gbk',$haha); 
         // echo iconv("GBK//IGNORE","UTF-8",$haha); 
         // // echo $haha;

         //  exit;
		// $name = "金开瑞引物合成在线订购单模版—".date("Y-m-d",time()).".xlsx";
         $name = "genecreate-oligo-order".".xlsx";
		// echo $path;
		$file = fopen($path,"r"); // 打开文件
		// 输入文件标签

      header("Content-type: application/octet-stream");
      header("Accept-Ranges: bytes");
      header("Accept-Length: ".filesize($path));
      header("Content-Disposition: attachment; filename=".$name);
      // 输出文件内容
        echo fread($file,filesize($path));
        fclose($file);
        exit();
	}

	//此处删除某行
	public function delRow(){
		if (!UserController::isLogin()){
			redirect(U('/Home/User/'));
		}
	 // var_dump($_GET);
	 // var_dump($_POST);
	//得到id
	$id = I('get.str','','intval');	
	 // echo $id;
	 // exit;
	//执行删除操作
	// $sql ="delete from ";
	$orders_primers = M('OrdersPrimers');
	//判断$id的值是否存在
	$flag = $orders_primers -> where('id = '.$id)->find();
	if($flag == NULL){
		echo "该新增项删除成功！";
	}else{
	$num = $orders_primers -> where('id = '.$id)->delete();
	if($num){
     echo "删除成功！";
     // exit;
	}else{
     echo "删除失败！";
     // exit;
	}
    }
	  
	}

	// 此处删除订单
	public function del_order(){
		if (!UserController::isLogin()){
			redirect(U('/Home/User/'));
		}
		// var_dump(I('get.'));
		// 得到删除的id
		$id = I('get.id','0','intval');
		$order = M('Orders');
		$num = $order -> where('id = '.$id) -> delete();
		if($num){
			$this -> success("该订单删除成功！");
		}else{
			$this -> error("该订单是无效订单！");
		}
	}

	//此处留言信息
	public function liuyan(){
		if (!UserController::isLogin()){
			redirect(U('/Home/User/'));
		}
		$note = M('Contents');
		$id_order = I('get.id_order','0','intval');
		$id_user = I('get.id_user','0','intval');
		$content = I('get.content','','trim');

		$info['content']=$content;
		$info['id_order']=$id_order;
		$info['id_member']=$id_user;
		$info['addtime']=time();
		$info['flag']=0;
		$info['status']=1;
		$num = $note -> data($info) -> add();
        
        $all = "<span style=\"color:red;font-family:微软雅黑;\">系统消息：尊敬的客户，您好！ 有什么服务需要咨询吗？
        <br/></span><hr/>";
		//查找所有的发表留言信息
		$liu = $note -> where("id_order =".$id_order)->field('content,addtime,flag')->order('addtime ASC')->select();
		foreach($liu as $row){
             if($row['flag']==0){
			 $aaaa = "<span style='color:green'>提问:</span>【".date("Y-m-d / H:i:s",$row['addtime'])."】<span style='color:green;'>".$row['content']."</span><br/>";
			}else{
			  $aaaa = "<span style='color:red'>解答:</span>【".date("Y-m-d / H:i:s",$row['addtime'])."】<span style='color:red;'>".$row['content']."</span><br/>";	
			}
			 $all .= $aaaa;
		}
		if($num){
			 echo $all;
		}

	}

	public function liuyan_all(){
		if (!UserController::isLogin()){
			redirect(U('/Home/User/'));
		}
		$note = M('Contents');
		$id_order = I('get.id_order','0','intval');
		 
        
        $all = "<span style=\"color:red;font-family:微软雅黑;\">系统消息：尊敬的客户，您好！ 有什么服务需要咨询吗？
        <br/></span><hr/>";
		//查找所有的发表留言信息
		$liu = $note -> where("id_order =".$id_order)->field('content,addtime,flag')->order('addtime ASC')->select();
		foreach($liu as $row){
             if($row['flag']==0){
			 $aaaa = "<span style='color:green'>提问:</span>【".date("Y-m-d / H:i:s",$row['addtime'])."】<span style='color:green;'>".$row['content']."</span><br/>";
			}else{
			  $aaaa = "<span style='color:red'>解答:</span>【".date("Y-m-d / H:i:s",$row['addtime'])."】<span style='color:red;'>".$row['content']."</span><br/>";	
			}
			 $all .= $aaaa;
		}
		 
			 echo $all;
		 

	}

	//下载文件（夹）
	public function xiazai(){
		if (!UserController::isLogin()){
			redirect(U('/Home/User/'));
		}
		// var_dump(I("get."));
		// exit;
		$order = M('Orders');
		
		$id = I("get.id",'0','intval');
		$path = $order -> where('id = '.$id) -> getField("jia");


		 // var_dump($path);
		 // exit;
		$path = trim($path);
		//判断是否有文件夹
		if($path == ""){
         echo "<script>alert('sorry,暂时没有文件可下载！');</script>";
         echo "<script>window.history.back();</script>";
         exit;
		}

         $arr = explode('.',$path);
          
           //得到后缀
          $exts =  trim($arr[2]);
          if($exts == "rar"){
          $name = "金开瑞引物合成相关文件下载—".date("Y-m-d",time()).".rar";
		  // echo $path;
	 
          }
          if($exts == "zip"){
          $name = "金开瑞引物合成相关文件下载—".date("Y-m-d",time()).".zip";
		   // echo $path;
		 
          }

          $file = fopen($path,"r"); // 打开文件
		// 输入文件标签

      header("Content-type: application/octet-stream");
      header("Accept-Ranges: bytes");
      header("Accept-Length: ".filesize($path));
      header("Content-Disposition: attachment; filename=".$name);
      // 输出文件内容
        echo fread($file,filesize($path));
        fclose($file);
        exit();


	}

	//对于列表的分页

	public function list_more(){
	  if (!UserController::isLogin()){
			redirect(U('/Home/User/'));
		}

		$order = M('Orders');
		$page = I('post.page',1,'int');
        $pageNum = 5; //页面展示条数
		//引物
			
			$result_a = $order->field('id,code,code_yw,uid,description,info,addtime,ordertype,status,num_yinwu,gid,num,synthesis')->where(" uid = '".session('uid')."' and status != 3 and ordertype = 2")->order('id desc')->page($page)->limit($pageNum)->select();
			$this->assign('orderList_a',$result_a);
            
            $map['ordertype'] = 2;
            $map['uid'] = session('uid');

			$countNum = $order->where($map)->count();
			// echo $countNum;
			// exit;
			$pages = ceil($countNum / $pageNum); //总页数

			$this->assign('countNum',$countNum);
			$this->assign('pages',$pages);
			 
			$this->assign('page',$page);
            //用户信息
			$userInfo = getUserInfo(session('uid'));
			$this->assign('userInfo',$userInfo);

			$this -> display("Index/primer_list");
			// var_dump($result_a);
		// echo "text";
	}






	
}