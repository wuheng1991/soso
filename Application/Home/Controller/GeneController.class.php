<?php
namespace Home\Controller;
use Think\Controller;
header("content-type:text/html;charset=utf-8");
date_default_timezone_set('PRC');
class GeneController extends Controller{


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
			//echo "aaaa";
			redirect(U('/Home/User/'));

		}
		# 客户信息
		//echo "aaaa";
		$userInfo = getUserInfo(session('uid'));
		$this->assign('userInfo',$userInfo);
		$this->display('Gene/step');
	}

	public function step(){
		//echo "aaaaa";
		if (!UserController::isLogin()){
			redirect(U('/Home/User/'));
		}
		# 客户信息
		$userInfo = getUserInfo(session('uid'));
		$this->assign('userInfo',$userInfo);
		if ($_FILES){
			$upload = new \Think\Upload();// 实例化上传类
			$upload->maxSize = 3145728 ;// 设置附件上传大小
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
			$orderData = array(
				'code' => $code,
				'uid' => session('uid'),
				'addtime' => time(),
				'excelurl' => $url
			);
			$orderID = $order->data($orderData)->add();
			
			$this->success('下单成功',U('/Index/'));
			
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
		
		
		for($i=1;$i<=$primerNum;$i++){
			$primers[$i] = array(
				'id' => I('post.pid'.$i,'','int'),
				'primername' => I('post.primername'.$i,''),
				'sequence' => I('post.sequence'.$i,''),
				'basenum' => strlen(I('post.sequence'.$i,'')),
				'demand' => I('post.demand'.$i,'','int'),
				'tubenum' => I('post.tubenum'.$i,'','int'),
				'puremthod' => I('post.puremthod'.$i,'','int'),
				'fmodification' => I('post.fmodification'.$i,'','int'),
				'tmodification' => I('post.tmodification'.$i,'','int'),
				'othermod' => I('post.othermod'.$i,'','int'),
				'isreserve' => I('post.isreserve'.$i,'1','int'),
				'addtime' => time()
			);
		}
		
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
		$orderData = array(
			'code' => $code,
			'uid' => session('uid'),
			'addtime' => time(),
			'description' => I('post.desc'),
			'info' => I('post.info'),
			'ordertype' => 2
		);
		$orderID = $order->data($orderData)->add();
		if ($orderID){
			$orders_primers = M('OrdersPrimers');
			$recodeIDStr = '';
			foreach($primers as $pk=>$pv){
				$pv['orderid'] = $orderInfo['id'];
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
			$this->success('下单成功',U('/Index/'));
		} else {
			$this->error('下单错误！');
		}
	}


    public function info(){
		if (!UserController::isLogin()){
			redirect(U('/Home/User/'));
		}
		$orderID = I('get.id','','int');//订单id
		//echo $orderID;
		//exit;
		if ($orderID == '') redirect(U('/Index/'));

		$order = M('Orders');
		$note = M('Contents');
		$orderInfo = $order->where(' id = '.$orderID)->find();
		$this->assign('orderInfo',$orderInfo);  //获取订单信息
		
		$this -> assign("orderid",$orderID);

		//更新状态并判断用户是否读取信息

		// dump($orderInfo);
		# 获取下级数据
		$note_info['status'] = 2;
       $note -> where('id_order ='.$orderID)->data($note_info)->save();
		// $orders_primers = M('OrdersPrimers');
		// $countNum = $orders_primers->where(' orderid = '.$orderID)->count();
		// $list = $orders_primers->where(' orderid = '.$orderID)->select();
		// $basenum = $orders_primers->where(' orderid = '.$orderID)->Sum('basenum');
		// $this->assign('basenum',$basenum);
		// $this->assign('list',$list);
		// $this->assign('num',$countNum);
		
		# 客户信息
		$userInfo = getUserInfo(session('uid'));
		//dump($userInfo);
		$this->assign('userInfo',$userInfo);
        // $id_user = session('uid');
        $this -> assign("id_user",session('uid'));
		#基因合成信息
		if($orderID != ''){
          //得到基因表关联的ID
			$gid = M('Orders')->where('id = '.$orderID)->getField('gid');
			//$orderCode = 
			//echo $gid;
			 $geneorder = D("Gene");
		     $arr = $geneorder -> where("orderid = ".$orderID)->select();
		     $this -> assign("genelist",$arr);
			//dump($geneinfo);
			//exit;
		     //留言信息
		     $note = M('Contents');
		     $notes = $note -> where("id_order = ".$orderID)->field('content,addtime,flag')->order("addtime ASC")->select();
		     $this -> assign("notes",$notes);

			 
         /*
          status = 1,表示草稿
          status = 2,表示已下单
         */

		if($orderInfo['status'] == 1){ 
			$this->display();
		} else {
			$this->display('infoupdate');
		}

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
			$primers[$i] = array(
				'id' => I('post.pid'.$i,'','int'),
				'orderid' => $orderInfo['id'],
				'primername' => I('post.primername'.$i,''),
				'sequence' => I('post.sequence'.$i,''),
				'basenum' => strlen(I('post.sequence'.$i,'')),
				'demand' => I('post.demand'.$i,'','int'),
				'tubenum' => I('post.tubenum'.$i,'','int'),
				'puremthod' => I('post.puremthod'.$i,'','int'),
				'fmodification' => I('post.fmodification'.$i,'','int'),
				'tmodification' => I('post.tmodification'.$i,'','int'),
				'othermod' => I('post.othermod'.$i,'','int'),
				'isreserve' => I('post.isreserve'.$i,'1','int'),
				'addtime' => time()
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
		$orderData = array(
			'id' => $orderInfo['id'],
			'status' => 2
		);
		if ($order->data($orderData)->save()){
			$this->success('订单确认成功',U('/Primer/info','id='.$orderID));
		}
	}

	public function confirm_order(){
		if (!UserController::isLogin()){
			redirect(U('/Home/User/'));
		}

		$order = M('Orders');
		$orderid = I('get.id','0','intval');
		// var_dump($orderid);
       $orderstatus = array(
       	    'id' => $orderid,
			'status' => 2,
			'addtime'=>time()
			);
       $num = $order -> data($orderstatus) -> save();
       if($num > 0){
        $this -> success("确认订单已经提交！<br/> 订单提交后无法修改，2小时后无法取消订单。");
           
       }else{
         $this -> error("确认订单提交失败！");
        
       }


	}


	//确认最后订单
	public function confirm_order_test(){
		if (!UserController::isLogin()){
			redirect(U('/Home/User/'));
		}

		$orderid = I('get.orderid','0','intval');
		$can = I('get.can',0,'intval');
		// var_dump(I('get.'));
		// exit;

		$order = M('Orders');

		$addtime = $order -> where('id = '.$orderid) -> getField('addtime');

		$count = $order -> where('addtime = '.$addtime) -> count();

		$arr = $order ->  where('addtime = '.$addtime) -> select();

		$genemodel = D('Gene');
		$count = $genemodel -> where('orderid = '.$orderid) -> count();
		// var_dump(I('get.'));
		$arr_a = $genemodel ->  where('addtime = '.$addtime) -> select();

		// exit;
		// echo "111";
		

		 
		$orderstatus = array(
			'status' => 2,
			'num_yinwu'=>$count
			);

		$gene_name = "";
		$gene_contents = "";
		foreach($arr as $row){
		  // $gene_name = $row['gene_name'];
		  // $gene_contents = $row['gene_contents'];
		  // if($gene_name == '' && $gene_contents == ""){
    //        $order -> where('id = '.$row['id']) -> delete();
		  // }	
		  // $gene_name = "";
		  // $gene_contents = "";
          $order -> where('id = '.$row['id']) -> save($orderstatus);
		}

		foreach($arr_a as $row_a){
           $gene_name = $row_a['gene_name'];
		   $gene_contents = $row_a['gene_contents'];
		  if($gene_name == '' && $gene_contents == ""){
           $genemodel -> where('id = '.$row_a['id']) -> delete();
           $order -> where('id = '.$row_a['orderid']) -> delete();
		  }	
		  $gene_name = "";
		  $gene_contents = "";

		}

		// $num = $order -> where('id = '.$orderid) -> save($orderstatus);
		if($count){

		// echo "<script type='text/javascript'>alert('确认订单已经提交！\n 订单提交后无法修改，2小时后无法取消订单。');</script>";	
         $this -> success("确认订单已经提交！<br/> 订单提交后无法修改，2小时后无法取消订单。",U('Index/index'),'10');
		// $this -> display('Index/index');
		}else{
         $this -> error("确认订单提交失败！");
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

  /*
   1.获取表单提交有效的数据
   2.压入数
   3.针对相关的字段执行验证
   4.验证成功，执行添加
   5.验证失败，给予提示信息
*/
	public function forms(){
		if (!UserController::isLogin()){
			//echo "aaaa";
			redirect(U('/Home/User/'));

		}

   // echo session('uid');
   // exit;
		# 生成订单
		//$code = createProCode(10);
		//echo $code;
		// exit;
		 //dump($_POST);

		// exit;
		 
         //var_dump($geneModel);
		if(!empty($_POST)){

           // exit;
            #对DNA,蛋白质序列内容的判断开始
            $gene_serial_sel=$_POST['gene_serial_sel'];
            $gene_serial_sel = intval($gene_serial_sel);

            $gene_contents=trim($_POST['gene_contents']);
            // $gene_contents = str_replace('/\s/ig','',$gene_contents);
            $gene_contents = str_replace(" ","",$gene_contents);
            $gene_contents = str_replace("\n","",$gene_contents);
            $gene_contents = str_replace("\r","",$gene_contents);
            // $gene_contents = str_replace("<br/>","",$gene_contents);
            // var_dump($gene_contents);
            // exit;

            //var_dump($gene_contents,$gene_serial_sel);
            //exit;
            if($gene_serial_sel == 1){
              // preg_match_all('/[^ATCG]/',$gene_contents,$arr);
               //var_dump($arr);
               if(preg_match('/[^ATCGatcg]/i',$gene_contents)){
               	echo "<script type='text/javascript'>alert('对不起，您输入DNA序列内容有非法字符。请重新输入！');</script>";
                echo "<script type='text/javascript'>window.location='".$_SERVER['HTTP_REFERER']."';</script>";
                exit;	
               } 
            }elseif($gene_serial_sel == 2){
            	if(preg_match('/[^FLIMVSPTAYHQNKDECWRGflimvsptayhqnkdecwrg]/i',$gene_contents)){
                  	echo "<script type='text/javascript'>alert('对不起，您输入的蛋白质序列内容有非法字符。请重新输入！');</script>";
                  	echo "<script type='text/javascript'>window.location='".$_SERVER['HTTP_REFERER']."';</script>";
                exit;
            	}
            	// $flag = substr($gene_contents,strlen($gene_contents)-1,1);
            	// if($flag != "*"){
             //    echo "<script type='text/javascript'>alert('对不起，您输入的蛋白质序列内容必须以*结尾，否则报错！');</script>";
             //    echo "<script type='text/javascript'>window.location='".$_SERVER['HTTP_REFERER']."';</script>";
             //    exit;
            	// }
            }else{
               echo "<script type='text/javascript'>alert('对不起，请选择序列蛋白质或者DNA！');</script>";
               echo "<script type='text/javascript'>window.location='".$_SERVER['HTTP_REFERER']."';</script>";
               exit;
          }
             #对DNA,蛋白质序列内容的判断结束



          #对密码子优化的处理开始
           $gene_seo=$_POST['gene_seo'];
           // var_dump($gene_seo);
           // exit;
           //是，弹出对话框

           if($gene_serial_sel == 2){
           //否，则“序列”部分输入的一定是DNA序列
           	   if($gene_seo != 1){
 echo "<script type='text/javascript'>alert('提示：当前序列为蛋白质，密码子优化必须选择是，否则无法提交！');</script>";
               echo "<script type='text/javascript'>window.location='".$_SERVER['HTTP_REFERER']."';</script>";
               exit;

           	   }
           }

          
          #对密码子优化的处理结束
      

            //exit; 
              //判断是否进行密码子优化
             if($_POST['gene_seo']=='2'){
             	$_POST['gene_seo_host']='';
             	$_POST['gene_seo_host_aa']='';
             	$_POST['gene_seo_start']='';
             	$_POST['gene_start']='';
             	$_POST['gene_seo_end']='';
             	$_POST['gene_end']='';
             	$_POST['gene_orf_start']='';
             	$_POST['gene_orf_end']='';
             	$_POST['gene_avoid_site']='';
             	$_POST['gene_save_site']='';
             	$_POST['gene_seo_result']='';
             	$_POST['gene_seo_result_a']='';
             	$_POST['gene_rel_serial']='';
             	$_POST['gene_seo_note']='';

             }

			 global $ids;
			//1.创建对象
				$genemodel = D("Gene");

				$order = M('Orders');
				//2.编写规则
				//3.压入数据并且验证
				//dump($genemodel);


				// dump($genemodel->create());
				//exit;

			  if($genemodel->create()){

                   //对数据执行逻辑判断
			  	  $ids = $genemodel->add();  //得到基因的id号
               //判断是否进行密码子优化
                // echo $ids;
                // exit;



			  	  // $_SESSION['gid']= $ids;

			  	  //session过多造成的调用错误

			  	  #order方法开始
			  	   $code = createProCode(10);
		         # 检测code唯一
		     //  $order = M('Orders');
		     // $geneorder = D('Gene');
		      $checkOrder = $order->where(" code = '".$code."' ")->find();
		      if($checkOrder){
				$code = createProCode(10);
		       }


		       //生产引物新订单 
		// 订单号命名为GS-15（年）08（月）0001（第几个订单）
		$head = "GS-";

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
	    $time = time();
	    // exit;

		       $orderData = array(
				'code' => $code,
				'code_yw' => $zero,
				'uid' => intval(session('uid')),
				'addtime' => $time,
				'status' => 1,
				'ordertype' => 3,
				'gid'=> $ids,
				'num_yinwu' => 1
				 

			);
		// dump($orderData);
		// exit;
		     //将新的订单加入到“gege_orders”表当中  
			$orderID = $order->data($orderData)->add();  //得到订单的id,又是关联的id

            // $_SESSION['gene_lian_order']= $orderID;

            $gene_order['orderid'] = $orderID;
            $gene_order['addtime'] = $time;

            $genemodel -> where('id = '.$ids) -> save($gene_order);  //

            #order方法结束

			#guodu方法开始
             $userInfo = getUserInfo(session('uid'));
		     $this->assign('userInfo',$userInfo);

		     $arr = $genemodel -> where("orderid = ".$orderID)->select();

		     $this -> assign("genelist",$arr);
		     // var_dump($arr);

		     $count = count($arr);
       
		    $guoData = array(
			'num_yinwu' => $count
				);
		    $order -> where('id = '.$orderID) -> save($guoData);
             #guodu方法结束
		    // $can = 0;
		    // $this -> assign
			 //exit;
			  	   if($ids > 0 && $orderID > 0){

			  	   	// echo "<script>alert('初次订单提交成功！');</script>";
			  	   	// $this -> display('Gene/guodu');
                $this->success('恭喜您,订单已经提交！',U('Gene/guodu',array('id'=>$orderID)));
			  	   }else{
                $this->error('对不起,订单失败！');
			  	   }
				}else{
					//5.验证失败，显示错误
					$this->error($genemodel->getError());
				}

		}


		 
	}

	public function forms_add(){
		if (!UserController::isLogin()){
			//echo "aaaa";
			redirect(U('/Home/User/'));

		}

   // echo session('uid');
   // exit;
		# 生成订单
		//$code = createProCode(10);
		//echo $code;
		// exit;
		 //dump($_POST);

		// exit;
		 
         //var_dump($geneModel);
		if(!empty($_POST)){

           // exit;
			$addtime = I('get.addtime',0,'intval');
            #对DNA,蛋白质序列内容的判断开始
            $gene_serial_sel=$_POST['gene_serial_sel'];
             $gene_serial_sel = intval($gene_serial_sel);
            $gene_contents=trim($_POST['gene_contents']);
            // $gene_contents = str_replace('/\s/ig','',$gene_contents);
            $gene_contents = str_replace(" ","",$gene_contents);
            $gene_contents = str_replace("\n","",$gene_contents);
            $gene_contents = str_replace("\r","",$gene_contents);
            // $gene_contents = str_replace("<br/>","",$gene_contents);
            // var_dump($gene_contents);
            // exit;

            //var_dump($gene_contents,$gene_serial_sel);
            //exit;
            if($gene_serial_sel == 1){
              // preg_match_all('/[^ATCG]/',$gene_contents,$arr);
               //var_dump($arr);
               if(preg_match('/[^ATCGatcg]/i',$gene_contents)){
               	echo "<script type='text/javascript'>alert('对不起，您输入DNA序列内容有非法字符。请重新输入！');</script>";
                echo "<script type='text/javascript'>window.location='".$_SERVER['HTTP_REFERER']."';</script>";
                exit;	
               } 
            }elseif($gene_serial_sel == 2){
            	if(preg_match('/[^FLIMVSPTAYHQNKDECWRGflimvsptayhqnkdecwrg]/i',$gene_contents)){
                  	echo "<script type='text/javascript'>alert('对不起，您输入的蛋白质序列内容有非法字符。请重新输入！');</script>";
                  	echo "<script type='text/javascript'>window.location='".$_SERVER['HTTP_REFERER']."';</script>";
                exit;
            	}
            	// $flag = substr($gene_contents,strlen($gene_contents)-1,1);
            	// if($flag != "*"){
             //    echo "<script type='text/javascript'>alert('对不起，您输入的蛋白质序列内容必须以*结尾，否则报错！');</script>";
             //    echo "<script type='text/javascript'>window.location='".$_SERVER['HTTP_REFERER']."';</script>";
             //    exit;
            	// }
            }else{
               echo "<script type='text/javascript'>alert('对不起，请选择序列蛋白质或者DNA！');</script>";
               echo "<script type='text/javascript'>window.location='".$_SERVER['HTTP_REFERER']."';</script>";
               exit;
          }
             #对DNA,蛋白质序列内容的判断结束



          #对密码子优化的处理开始
           $gene_seo=$_POST['gene_seo'];
           // var_dump($gene_seo);
           // exit;
           //是，弹出对话框

            if($gene_serial_sel == 2){
           //否，则“序列”部分输入的一定是DNA序列
           	   if($gene_seo != 1){
 echo "<script type='text/javascript'>alert('提示：当前序列为蛋白质，密码子优化必须选择是，否则无法提交！');</script>";
               echo "<script type='text/javascript'>window.location='".$_SERVER['HTTP_REFERER']."';</script>";
               exit;

           	   }
           }
          
          #对密码子优化的处理结束
      

            //exit; 
              //判断是否进行密码子优化
             if($_POST['gene_seo']=='2'){
             	$_POST['gene_seo_host']='';
             	$_POST['gene_seo_host_aa']='';
             	$_POST['gene_seo_start']='';
             	$_POST['gene_start']='';
             	$_POST['gene_seo_end']='';
             	$_POST['gene_end']='';
             	$_POST['gene_orf_start']='';
             	$_POST['gene_orf_end']='';
             	$_POST['gene_avoid_site']='';
             	$_POST['gene_save_site']='';
             	$_POST['gene_seo_result']='';
             	$_POST['gene_seo_result_a']='';
             	$_POST['gene_rel_serial']='';
             	$_POST['gene_seo_note']='';

             }

			 global $ids;
			//1.创建对象
				$genemodel = D("Gene");

				$order = M('Orders');
				//2.编写规则
				//3.压入数据并且验证
				//dump($genemodel);


				// dump($genemodel->create());
				//exit;

			  if($genemodel->create()){

                   //对数据执行逻辑判断
			  	  $ids = $genemodel->add();  //得到基因的id号
               //判断是否进行密码子优化
                // echo $ids;
                // exit;



			  	  // $_SESSION['gid']= $ids;

			  	  //session过多造成的调用错误

			  	  #order方法开始
			  	   $code = createProCode(10);
		         # 检测code唯一
		     //  $order = M('Orders');
		     // $geneorder = D('Gene');
		      $checkOrder = $order->where(" code = '".$code."' ")->find();
		      if($checkOrder){
				$code = createProCode(10);
		       }


		       //生产引物新订单 
		// 订单号命名为GS-15（年）08（月）0001（第几个订单）
		$head = "GS-";

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
	    $time = time();
	    // exit;

		       $orderData = array(
				'code' => $code,
				'code_yw' => $zero,
				'uid' => intval(session('uid')),
				'addtime' => $time,
				'status' => 1,
				'ordertype' => 3,
				'gid'=> $ids,
				'num_yinwu' => 1
				 

			);
		// dump($orderData);
		// exit;
		     //将新的订单加入到“gege_orders”表当中  
			$orderID = $order->data($orderData)->add();  //得到订单的id,又是关联的id

            // $_SESSION['gene_lian_order']= $orderID;

            $gene_order['orderid'] = $orderID;
            $gene_order['addtime'] = $addtime;

            $genemodel -> where('id = '.$ids) -> save($gene_order);  //

            #order方法结束

			#guodu方法开始
             $userInfo = getUserInfo(session('uid'));
		     $this->assign('userInfo',$userInfo);

		     $arr = $genemodel -> where("orderid = ".$orderID)->select();

		     $this -> assign("genelist",$arr);
		     // var_dump($arr);

		     $count = count($arr);
       
		    $guoData = array(
			'num_yinwu' => $count
				);
		    $order -> where('id = '.$orderID) -> save($guoData);
             #guodu方法结束
		    // $can = 0;
		    // $this -> assign
			 //exit;
			  	   if($ids > 0 && $orderID > 0){

			  	   	// echo "<script>alert('该复制订单已编辑,提交成功！');</script>";
			  	   	// $this -> display('Gene/guodu');
                $this->success('该复制订单已编辑,提交成功！',U('Gene/guodu',array('id'=>$orderID,'can'=> 1)));
			  	   }else{
                $this->error('对不起,订单失败！');
			  	   }
				}else{
					//5.验证失败，显示错误
					$this->error($genemodel->getError());
				}

		}


		 
	}
	//过渡也
	public function guodu(){
		if (!UserController::isLogin()){
			//echo "aaaa";
			redirect(U('/Home/User/'));

		}


        $userInfo = getUserInfo(session('uid'));
		$this->assign('userInfo',$userInfo);
        
        $order = M("Orders");
		$geneorder = D("Gene");

		// var_dump(I("get."));
		$orderID = I('get.id',0,'intval');  // 订单id  也是orderid
		// echo $orderID;

		 
		$can = I('get.can',0,'intval');  //对于过渡页面的参数

		if($can == 1){

	     $addtime = $geneorder -> where('orderid = '.$orderID)->getField('addtime');
			// var_dump($geneorder ->where('id = 565')-> select());
	  //   var_dump($addtime);

		 
        $where['addtime'] = $addtime;

     

		$arr = $geneorder -> where($where)->order('id desc')->select();
		$this -> assign("genelist",$arr);
		// var_dump($arr);

		}else{

	   // $addtime = $geneorder -> where('orderid = '.$orderID)->getField('addtime');
	    // var_dump($addtime);
        
		 
        // $where['addtime'] = $addtime;
        $where['orderid'] = $orderID;
     

		$arr = $geneorder -> where($where)->order('id desc')->select();
		$this -> assign("genelist",$arr);



  //       $addtime = $order -> where('id = '.$orderID)->getField('addtime');
		// // echo $orderID;
  //        $where['addtime'] = $addtime;
  //        $where['orderid'] = $orderID;

		// $arr = $geneorder -> where($where)->order('id desc')->limit(1)->select();
		// $this -> assign("genelist",$arr);
	   }

		// var_dump($arr[0]['gene_contents']);

  //       //$count = $geneorder -> where('orderid = '.intval(session('gene_lian_order'))) -> count();
		//  $count = count($arr);
       
		// $guoData = array(
		// 	'num_yinwu' => $count
		// 		);
		//  $order -> where('id = '.intval(session('gene_lian_order'))) -> save($guoData);
		 // var_dump($arr);
		$this->display();
		
		// exit;
    // echo "1234";
    // exit;
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
        
        $num = $order -> where('id = '.$id) -> getField("code_yw");

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
          $name = "genecreate-".$num.".rar";
		  // echo $path;
	 
          }
          if($exts == "zip"){
          $name = "genecreate-".$num.".zip";
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


	//形成订单的操作

	public function order(){
		if (!UserController::isLogin()){
			//echo "aaaa";
			redirect(U('/Home/User/'));

		}
		/*
         a.订单要求
         1.订单日期
         2.订单号或项目号
         3.订单类型
         4.项目描述
         5.反应/引物数
         6.订单状态
         */
         #1.addtime   time()
         #2. 生成订单
		 $code = createProCode(10);
		 # 检测code唯一
		 $order = M('Orders');
		 $geneorder = D('Gene');

		 $checkOrder = $order->where(" code = '".$code."' ")->find();
		 if($checkOrder){
				$code = createProCode(10);
		}
		 #3. 订单类型：基因订单   id=3
		 #4. 项目描述  默认
		 #5.  反应物    默认
		 #6.  订单状态   草稿
		$orderData = array(
				'code' => $code,
				'uid' => intval(session('uid')),
				'addtime' => time(),
				'status' => 1,
				'ordertype' => 3,
				'gid'=>$_SESSION['gid'],
				'num_yinwu' => 1
				 

			);
		// dump($orderData);
		// exit;
			$orderID = $order->data($orderData)->add();

            $_SESSION['gene_lian_order']= $orderID;
			//更新orderid
			// $gene_order = array(
   //            'orderid' => $orderID
			// 	);
			  $gene_order['orderid'] = $orderID;
              $geneorder -> where('id = '.$_SESSION['gid']) -> save($gene_order);
			

			if($orderID){
			// 	var_dump($orderData);
			// echo $orderID."888";
			// exit;
				// echo "aaaaaaaaaaaaaaaa";
				
				$this ->redirect("Gene/guodu");

			}else{
				echo "test";
			}
			// else{
			// 	$this ->redirect("Index/index");

			// }


	}
	//留言
	public function liuyan(){
		if (!UserController::isLogin()){
			redirect(U('/Home/User/'));
		}
		// echo session('uid');
		// var_dump(I('post.'));
		// var_dump(I('get.'));
		// $orderid = I('get.oid','0','intval');
		// $contents = I('post.contents','','trim');
		// echo "123456";
		// var_dump(I("get."));
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
		// echo session('uid');
		// var_dump(I('post.'));
		// var_dump(I('get.'));
		// $orderid = I('get.oid','0','intval');
		// $contents = I('post.contents','','trim');
		// echo "123456";
		// var_dump(I("get."));
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


	//编辑提交的订单
	public function editors(){
		if (!UserController::isLogin()){
			//echo "aaaa";
			redirect(U('/Home/User/'));

		}

		$userInfo = getUserInfo(session('uid'));
		$this->assign('userInfo',$userInfo);
		// var_dump(I("get."));
		//得到id值
		$id = intval(I('get.id','0','intval'));

		$genemodel = D('Gene');
		$geneinfo = $genemodel -> where('id = '.$id)->select();
		// $orderid = $geneinfo[0]['orderid'];
		// var_dump($geneinfo);
		// exit;
		$this -> assign("geneinfo",$geneinfo);
		$this -> display('Gene/info');
	}

	public function copy_gene_order(){
		if (!UserController::isLogin()){
			redirect(U('/Home/User/'));
		}

		$userInfo = getUserInfo(session('uid'));
		$this->assign('userInfo',$userInfo);

		$can = 1; //对于当前页面的复制
		$id = intval(I('get.id','0','intval'));  //订单id

		$order  = M('Orders');
		$genemodel = D('Gene');

		$orderinfo = $order -> where('id = '.$id)->find();

        $geneinfo = $genemodel -> where('orderid = '.$id)->select();
        $geneinfo[0]['gene_name'] = '';
        $geneinfo[0]['gene_contents'] = '';
        $geneinfo[0]['gene_contents_num'] = '';

        $this -> assign('geneinfo',$geneinfo);

        // $this -> success("该订单复制成功！",U(''));
        echo "<script>alert('该订单复制成功！若不编辑复制订单，则复制订单视为无效。');</script>";
		$this -> display('Gene/info_add');





	}

	public function copy_gene_order_test(){
		if (!UserController::isLogin()){
			redirect(U('/Home/User/'));
		}

		$can = 1; //对于当前页面的复制

		// var_dump(I('get.'));
		//得到id值
		$id = intval(I('get.id','0','intval'));  //订单id

		$order  = M('Orders');
		$genemodel = D('Gene');

		$orderinfo = $order -> where('id = '.$id)->find();

		// var_dump($orderinfo);
		// echo "<br/>";
		// echo "<br/>";
        
        $geneinfo = $genemodel -> where('orderid = '.$id)->find();
        unset($geneinfo['id']);
        $geneinfo['orderid'] = 0;

		// $orderbyid = $genemodel -> where('orderid = '.$id) -> getField('id');
		// var_dump($orderinfo);
		// exit;
		// $orderid = $orderinfo['orderid'];

		unset($orderinfo['id']);
		// unset($orderinfo['orderid']);
		$orderinfo['code_yw'] = '';
		
		// $orderbyid = $geneinfo['orderid'];
        //start
    //     $code = createProCode(10);
		        
		  //     $checkOrder = $order->where(" code = '".$code."' ")->find();
		  //     if($checkOrder){
				// $code = createProCode(10);
		  //      }

		   //生产引物新订单 
		// 订单号命名为GS-15（年）08（月）0001（第几个订单）
		$head = "GS-";

		$date = substr(date("Ym",time()),2,4);
		$he = $head.$date;  //前半
	    $where['code_yw'] = array('like',$he."%");
	    // $where['uid'] = intval(session('uid'));
	    $num = 0;
	    $zero = "";
	    $num = $order ->where($where) -> count();
	    // echo $num;
	    // echo "<br/>";
        
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

	     $orderinfo['code_yw'] = $zero;

        // var_dump( $orderinfo);
        // exit;
	    // echo $zero;
        //end

		// 对信息的判断开始
		// $where['orderid'] = $orderbyid;

  //       $where['gene_name'] = $geneinfo['gene_name'];

		// $where['gene_serial_5'] = $geneinfo['gene_serial_5'];
		// $where['gene_serial_sel'] = $geneinfo['gene_serial_sel'];
		// $where['gene_contents'] = $geneinfo['gene_contents'];
		// $where['gene_serial_3'] = $geneinfo['gene_serial_3'];
		// $where['gene_seo'] = $geneinfo['gene_seo'];
		// $where['gene_clone_method'] = $geneinfo['gene_clone_method'];
		// $where['gene_clone_site'] = $geneinfo['gene_clone_site'];
		// $where['gene_other'] = $geneinfo['gene_other'];
		// $where['gene_zhili_sel'] = $geneinfo['gene_zhili_sel'];
		// $where['gene_zhili_content'] = $geneinfo['gene_zhili_content'];
		// $where['gene_zhili_name'] = $geneinfo['gene_zhili_name'];
		// $where['gene_zhili_level'] = $geneinfo['gene_zhili_level'];
		// $where['gene_seo_host'] = $geneinfo['gene_seo_host'];
		// $where['gene_seo_start'] = $geneinfo['gene_seo_start'];
		// $where['gene_start'] = $geneinfo['gene_start'];
		// $where['gene_seo_end'] = $geneinfo['gene_seo_end'];
		// $where['gene_end'] = $geneinfo['gene_end'];
		// $where['gene_orf_start'] = $geneinfo['gene_orf_start'];
		// $where['gene_orf_end'] = $geneinfo['gene_orf_end'];
		// $where['gene_avoid_site'] = $geneinfo['gene_avoid_site'];
		// $where['gene_save_site'] = $geneinfo['gene_save_site'];
		// $where['gene_seo_result'] = $geneinfo['gene_seo_result'];
		// $where['gene_rel_serial'] = $geneinfo['gene_rel_serial'];
		// $where['gene_seo_note'] = $geneinfo['gene_seo_note'];
		// 对信息的判断结束
        $orderID = $order->data($orderinfo)->add(); //新增的order的id

        $geneinfo['orderid'] = $orderID;
        $geneinfo['gene_name'] = "";
        $geneinfo['gene_contents'] = "";
        $geneinfo['gene_contents_num'] = "";

        $newID = $genemodel -> data($geneinfo) -> add();


         $num = 0;
	    $zero = "";



		 // var_dump($geneinfo);
        if($orderID && $newID){
          $this -> success("该订单复制成功！",U('Gene/guodu',array('id'=>$id,'can'=>$can)));
          

          // $this -> success("该订单复制成功！",U('Gene/guodu','id='.$id));
        }else{
          $this -> error("该订单复制失败！");
        }


	}
	//删除订单
	public function del_order(){
		if (!UserController::isLogin()){
			//echo "aaaa";
			redirect(U('/Home/User/'));

		}
		$id = I('get.id','0','intval');
		$order = M('Orders');
		$num = $order -> where('id = '.$id) -> delete();
		if($num){
			$this -> success("该订单删除成功！");
		}else{
			$this -> error("该订单是无效订单！");
		}
	}


	public function del_gene_order(){
		if (!UserController::isLogin()){
			 
			redirect(U('/Home/User/'));
          }

          $id = I('get.id','0','intval');
		  $genemodel = D('Gene');
		  $order = M("Orders");

		  $addtime = $genemodel -> where('id = '.$id) -> getField('addtime');  //复制的关联时间
		  $orderid = $genemodel -> where('id = '.$id) -> getField('orderid'); //关联orderide
		  //删除gege
		  $genemodel -> where('id = '.$id) -> delete();
		  //删除orders
		  $order -> where('id = '.$orderid) -> delete();

		  $num = $genemodel -> where('addtime = '.intval($addtime)) -> count();
		  if($num > 0){

		  $new_id = $genemodel -> where('addtime = '.intval($addtime))-> order('id desc')->limit(1)->getField('orderid');

         // $this->success('该复制订单已编辑,提交成功！',U('Gene/guodu',array('id'=>$orderID,'can'=> 1)));

		  $this -> success('删除该基因合成服务成功!',U('Gene/guodu',array('id'=>$new_id,'can'=> 1)));

		  }else{
		  $this -> error('删除该基因合成服务成功!',U('Gene/list_more'));
          
		  }


 

	}

	//删除初次gene订单
	public function del_gene_order_test(){
		if (!UserController::isLogin()){
			//echo "aaaa";
			redirect(U('/Home/User/'));

		}
		// var_dump(I('get.'));
		$id = I('get.id','0','intval');
		 

		$genemodel = D('Gene');
		 $order = M("Orders");
		 //得到addtime
		 $where['id'] = $id;
		 // $where['uid'] = intval(session('uid'));
		 $addtime = $genemodel -> where($where) -> getField('addtime');


         $curr_gene_name = $genemodel -> where('id = '.$id) -> getField('gene_name');
         $curr_gene_contents = $genemodel -> where('id = '.$id) -> getField('gene_contents');

         // $arr = $order -> where('addtime = '.$addtime) -> order('id desc')->select();  //order
         // $count = count($arr);
         $arr_a = $genemodel -> where('addtime = '.$addtime) -> order('id desc')->select(); //gene
         $orderid = 0;

         $num = 0;

         foreach($arr_a as $row_a){


            $orderid = intval($row_a['orderid']);
         	if($row_a['gene_name'] == '' && $row_a['gene_contents'] == ''){
             $genemodel -> where('orderid = '.$orderid) -> delete();
             $order -> where('id = '.$orderid) -> delete();
             $num ++;

         	}
         	//判断复制的订单的有多少是有效，多少是无效的
            if($row_a['id'] == $id){
            	if($curr_gene_name != '' && $curr_gene_contents != ''){
                  $genemodel -> where('orderid = '.$orderid) -> delete();
                  $order -> where('id = '.$orderid) -> delete();
                  $num ++;
            	}
            
            }

            $orderid = 0;

         }
         

        //得到orderid
		//  $orderbyid = $genemodel -> where('id = '.$id) -> getField('orderid');

		// $del = $genemodel -> where('id = '.$id) -> delete();
		//start

		//end
		//判断该订单数量。。。
		// $num = $genemodel -> where("orderid = ".$orderbyid)->count();

		if($num > 0){
			// $guoData = array(
			// 'num_yinwu' => $num
			// 	);
		 // $order -> where('id = '.$orderbyid) -> save($guoData);
         $this ->error("删除该基因合成服务成功!",U('Gene/list_more'));
        
         // $this ->success("删除该基因合成服务成功！",U('Gene/guodu','id='.$orderbyid));
		}else{
			$order -> where("id = ".$orderbyid) -> delete();
            $this ->error("删除该基因合成服务成功!",U('Gene/list_more'));
		}
	}


	public function forms_do(){
		if (!UserController::isLogin()){
			//echo "aaaa";
			redirect(U('/Home/User/'));

		}
		$genemodel = D("Gene");
		// $ordermodel = M("orders");
		// dump($_POST);
		// exit;
		 	$gene_id = intval($_POST['gene_id']);

		 	$order_id = intval($_POST['order_id']); //订单id,orderid

		 	$gene_contents=trim($_POST['gene_contents']);
            // $gene_contents = str_replace('/\s/ig','',$gene_contents);
            $gene_contents = str_replace(" ","",$gene_contents);
            $gene_contents = str_replace("\n","",$gene_contents);
            $gene_contents = str_replace("\r","",$gene_contents);
		 	// echo $gene_id;
		 	// exit;
		//根据基因的ID进行修改
		if($_POST['gene_seo'] == "2"){
		if($_POST['gene_zhili_sel'] == "2"){
	
		$where['gene_name'] = $_POST['gene_name'];
		$where['gene_serial_5'] = $_POST['gene_serial_5'];
		$where['gene_serial_sel'] = $_POST['gene_serial_sel'];
		$where['gene_contents'] = $gene_contents;
		$where['gene_contents_num'] = $_POST['gene_contents_num'];
		$where['gene_serial_3'] = $_POST['gene_serial_3'];
		$where['gene_seo'] = $_POST['gene_seo'];
		$where['gene_clone_method'] = $_POST['gene_clone_method'];
		$where['gene_clone_site'] = $_POST['gene_clone_site'];
		$where['gene_other'] = $_POST['gene_other'];

		$where['gene_clone_ya'] = $_POST['gene_clone_ya'];
		$where['gene_clone_site_a'] = $_POST['gene_clone_site_a'];

		$where['gene_zhili_sel'] = $_POST['gene_zhili_sel'];
		$where['gene_zhili_content'] = $_POST['gene_zhili_content'];
		$where['gene_zhili_name'] = $_POST['gene_zhili_name'];
		$where['gene_zhili_level'] = $_POST['gene_zhili_level'];

		// if($_POST['gene_zhili_name'] == ''){
		// 	$this->error($genemodel->getError());
		// }
		 
	}else{
		//$gene_id = intval($_POST['gene_id']);
		$where['gene_name'] = $_POST['gene_name'];
		$where['gene_serial_5'] = $_POST['gene_serial_5'];
		$where['gene_serial_sel'] = $_POST['gene_serial_sel'];
		$where['gene_contents'] = $gene_contents;
		$where['gene_contents_num'] = $_POST['gene_contents_num'];
		$where['gene_serial_3'] = $_POST['gene_serial_3'];
		$where['gene_seo'] = $_POST['gene_seo'];
		$where['gene_clone_method'] = $_POST['gene_clone_method'];
		$where['gene_clone_site'] = $_POST['gene_clone_site'];
		$where['gene_other'] = $_POST['gene_other'];
		$where['gene_clone_ya'] = $_POST['gene_clone_ya'];
		$where['gene_clone_site_a'] = $_POST['gene_clone_site_a'];
		$where['gene_zhili_sel'] = $_POST['gene_zhili_sel'];
	} 
		
	}else{
		if($_POST['gene_zhili_sel'] == "2"){
		//$gene_id = intval($_POST['gene_id']);
		$where['gene_name'] = $_POST['gene_name'];
		$where['gene_serial_5'] = $_POST['gene_serial_5'];
		$where['gene_serial_sel'] = $_POST['gene_serial_sel'];
		$where['gene_contents'] = $gene_contents;
		$where['gene_contents_num'] = $_POST['gene_contents_num'];
		$where['gene_serial_3'] = $_POST['gene_serial_3'];
		$where['gene_seo'] = $_POST['gene_seo'];
		$where['gene_clone_method'] = $_POST['gene_clone_method'];
		$where['gene_clone_site'] = $_POST['gene_clone_site'];
		$where['gene_other'] = $_POST['gene_other'];
		$where['gene_clone_ya'] = $_POST['gene_clone_ya'];
		$where['gene_clone_site_a'] = $_POST['gene_clone_site_a'];
		$where['gene_zhili_sel'] = $_POST['gene_zhili_sel'];
		$where['gene_zhili_content'] = $_POST['gene_zhili_content'];
		$where['gene_zhili_name'] = $_POST['gene_zhili_name'];
		$where['gene_zhili_level'] = $_POST['gene_zhili_level'];
		$where['gene_seo_host'] = $_POST['gene_seo_host'];
		$where['gene_seo_host_aa'] = $_POST['gene_seo_host_aa'];

		$where['gene_seo_start'] = $_POST['gene_seo_start'];
		$where['gene_start'] = $_POST['gene_start'];
		$where['gene_seo_end'] = $_POST['gene_seo_end'];
		$where['gene_end'] = $_POST['gene_end'];
		$where['gene_orf_start'] = $_POST['gene_orf_start'];
		$where['gene_orf_end'] = $_POST['gene_orf_end'];
		$where['gene_avoid_site'] = $_POST['gene_avoid_site'];
		$where['gene_save_site'] = $_POST['gene_save_site'];
		$where['gene_seo_result'] = $_POST['gene_seo_result'];

		$where['gene_rel_serial'] = $_POST['gene_rel_serial'];
		$where['gene_seo_note'] = $_POST['gene_seo_note'];
		// if($_POST['gene_zhili_name'] == ''){
		// 	$this->error($genemodel->getError());
		// }
             
		}else{


		//$gene_id = intval($_POST['gene_id']);
		$where['gene_name'] = $_POST['gene_name'];
		$where['gene_serial_5'] = $_POST['gene_serial_5'];
		$where['gene_serial_sel'] = $_POST['gene_serial_sel'];
		$where['gene_contents'] = $gene_contents;
		$where['gene_contents_num'] = $_POST['gene_contents_num'];
		$where['gene_serial_3'] = $_POST['gene_serial_3'];
		$where['gene_seo'] = $_POST['gene_seo'];
		$where['gene_clone_method'] = $_POST['gene_clone_method'];
		$where['gene_clone_site'] = $_POST['gene_clone_site'];
		$where['gene_other'] = $_POST['gene_other'];
		$where['gene_clone_ya'] = $_POST['gene_clone_ya'];
		$where['gene_clone_site_a'] = $_POST['gene_clone_site_a'];
		$where['gene_zhili_sel'] = $_POST['gene_zhili_sel'];
		$where['gene_seo_host'] = $_POST['gene_seo_host'];
		$where['gene_seo_host_aa'] = $_POST['gene_seo_host_aa'];

		$where['gene_seo_start'] = $_POST['gene_seo_start'];
		$where['gene_start'] = $_POST['gene_start'];
		$where['gene_seo_end'] = $_POST['gene_seo_end'];
		$where['gene_end'] = $_POST['gene_end'];
		$where['gene_orf_start'] = $_POST['gene_orf_start'];
		$where['gene_orf_end'] = $_POST['gene_orf_end'];
		$where['gene_avoid_site'] = $_POST['gene_avoid_site'];
		$where['gene_save_site'] = $_POST['gene_save_site'];
		$where['gene_seo_result'] = $_POST['gene_seo_result'];

		$where['gene_rel_serial'] = $_POST['gene_rel_serial'];
		$where['gene_seo_note'] = $_POST['gene_seo_note'];
             

		}
	} 

	//end

		if($_POST['gene_name'] == '' || $_POST['gene_contents'] == ''){
			$this->error($genemodel->getError());
		}


		 
		$geneSave = $genemodel ->where('id = '.$gene_id) -> save($where);
		// echo $geneSave;
		// exit;
		
			//得到当前的状态：1，草稿,点击订单号对样品信息进行修改后，状态变为2，即下订单
			// $status = intval($ordermodel->where("gid = ".$gene_id)->getField('status'));
			 
			// $status = $status + 1;//下单状态：2
			// $data['status']=$status;
			// $orderSave = $ordermodel ->where("gid = ".$gene_id)->save($data);
			// echo $status;
			// exit;

            // $this -> success("订单修改成功。。",U('Index/index'));
            
            #如果当前的状态为：2，点击订单号跳到客户信息,订购信息与样品信息页面
            
       if($geneSave){
             $this -> success("您已经对订单信息进行编辑。。",U('Gene/guodu',array('id'=>$order_id,'can'=>1)));
		}else{


             $this -> success("您没有对订单信息进行编辑。。",U('Gene/guodu','id='.$order_id));
		}

	}


	//对于分页的处理
	public function list_more(){
	  if (!UserController::isLogin()){
			redirect(U('/Home/User/'));
		}

		$order = M('Orders');
		$page = I('post.page',1,'int');
        $pageNum = 5; //页面展示条数
		//引物
			
			$result_a = $order->field('id,code,code_yw,uid,description,info,addtime,ordertype,status,num_yinwu,gid,num,synthesis')->where(" uid = '".session('uid')."' and status != 3 and ordertype = 3")->order('id desc')->page($page)->limit($pageNum)->select();
			$this->assign('orderList',$result_a);
            
            $map['ordertype'] = 3;
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

			$this -> display("Index/gene_list");
			// var_dump($result_a);
		// echo "text";
	}


	//下载pdf
	public function gene_pdf(){
		if (!UserController::isLogin()){
			redirect(U('/Home/User/'));
		}
		// var_dump(I("get."));
		// exit;
		$id = I('get.id',0,'intval');
		if($id == 1){
		$path = "./Uploads/Download/pdf/pUC57-simple.pdf";
		}elseif($id == 2){
        $path = "./Uploads/Download/pdf/pUC57-Amp.pdf";
		}elseif($id == 3){
        $path = "./Uploads/Download/pdf/pUC57-Kana.pdf";
		}elseif($id == 4){
        $path = "./Uploads/Download/pdf/pUC57-Kana-MCS-free.pdf";
		}elseif($id == 5){
        $path = "./Uploads/Download/pdf/pUC19-MCS-free.pdf";
		}
		// var_dump($id);
		// exit;pUC19-MCS free
		// echo "aaa";
		// $path = "./Uploads/Download/yinwu.xlsx";
		// file_get_contents($path);
		//下载的文件名
		//用以解决中文不能显示出来的问题
         // $haha = "金开瑞引物合成在线订购单模版-";
         // echo iconv('UTF-8','gbk',$haha); 
         // echo iconv("GBK//IGNORE","UTF-8",$haha); 
         // // echo $haha;

         //  exit;
		// $name = "金开瑞引物合成在线订购单模版—".date("Y-m-d",time()).".xlsx";
		if($id == 1){
         $name = "genecreate-pUC57-simple".".pdf";
		 
		}elseif($id == 2){
         $name = "genecreate-pUC57-Amp".".pdf";
        
		}elseif($id == 3){
         $name = "genecreate-pUC57-Kana".".pdf";
         
		}elseif($id == 4){
         $name = "genecreate-pUC57-Kana-MCS-free".".pdf";
        
		}elseif($id == 5){
         $name = "genecreate-pUC19-MCS-free".".pdf";
        
		}
         
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






}


?>