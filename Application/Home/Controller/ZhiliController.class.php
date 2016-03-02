<?php
namespace Home\Controller;
use Think\Controller;
header("content-type:text/html;charset=utf-8");
class ZhiliController extends Controller{


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

		$zhilimodel = M('zhili_content');
		$zhili_content = $zhilimodel -> select();
		$this -> assign('list_content',$zhili_content);
		# 客户信息
		//echo "aaaa";
		$userInfo = getUserInfo(session('uid'));
		$this->assign('userInfo',$userInfo);
		$this->display('Zhili/step');
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
		// echo $orderID;
		// exit;
		if ($orderID == '') redirect(U('/Index/'));

		$order = M('Orders');
		$note = M('Contents');

		$orderInfo = $order->where(' id = '.$orderID)->find();
		$this->assign('orderInfo',$orderInfo);  //获取订单信息

		$this -> assign("orderid",$orderID);
		
		//dump($orderInfo);
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
		$this -> assign("id_user",session('uid'));
         

		#基因合成信息
		if($orderID != ''){
          //得到基因表关联的ID
			// $gid = M('Orders')->where('orderid = '.$orderID)->getField('zhili_id');
			//$orderCode = 
			//echo $gid;
			$zhilimodel = M('Zhili');
			//获取该基因的信息
			$zhili_info = $zhilimodel -> where('orderid = '.$orderID) -> select();
			$this -> assign("zhililist",$zhili_info);
			 // dump($zhili_info);
			// //exit;
			// echo "aaa";
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

	//编辑提交的订单
	public function editors(){
		if (!UserController::isLogin()){
			//echo "aaaa";
			redirect(U('/Home/User/'));

		}

		$userInfo = getUserInfo(session('uid'));
		$this->assign('userInfo',$userInfo);
		 // echo "aaa";
		// exit;
		// var_dump(I("get."));
		// exit;
		//得到id值
		$id = intval(I('get.id','0','intval'));
		$zhilimodel = M('Zhili');

		$zhilimodel_con = M('zhili_content');

		$zhiliinfo = $zhilimodel -> where('id = '.$id)->select();
	
		$this -> assign("zhiliinfo",$zhiliinfo);

		  // var_dump($zhiliinfo);

		$zhili_content = $zhiliinfo[0]['zhili_content'];
		$zhili_content = trim($zhili_content);
		// dump($zhili_content);

		// $arr = explode(',',$zhili_content);

		// $this -> assign('options',$arr);
		$where_a['id'] = array('in',$zhili_content);
		$option_a = $zhilimodel_con -> where($where_a) -> select();
		$this -> assign('option_a',$option_a);
		// dump($option_a);
		$where_b['id'] = array('not in',$zhili_content);
		$option_b = $zhilimodel_con -> where($where_b) -> select();
		$this -> assign('option_b',$option_b);
		// dump($option_b);

		  

		$this -> display('Zhili/info');
	}

  /*
   1.获取表单提交有效的数据
   2.压入数
   3.针对相关的字段执行验证
   4.验证成功，执行添加
   5.验证失败，给予提示信息
*/
	public function forms(){


		# 生成订单
		//$code = createProCode(10);
		//echo $code;
		// exit;
		// dump($_POST);
		//  exit; 
         //var_dump($zhiliModel);

		if(!empty($_POST)){


			//对必填字段的逻辑处理
			$zhili_title = I("post.zhili_title",'','trim');
			if($zhili_title==''){
				echo "<script type='text/javascript'>alert('对不起,模板名称不能为空！');</script>";
                echo "<script type='text/javascript'>window.location='".$_SERVER['HTTP_REFERER']."';</script>";
                exit;

			}

			$zhili_serial = I("post.zhili_serial",'','trim');
			if($zhili_serial != ""){

				if(preg_match('/[^ATCG]/i',$zhili_serial)){
			    echo "<script type='text/javascript'>alert('对不起，您输入序列内容有非法字符。请重新输入！');</script>";
                echo "<script type='text/javascript'>window.location='".$_SERVER['HTTP_REFERER']."';</script>";
                exit;
			     }


			}

			$zhili_size = I("post.zhili_size",'','trim');
			if($zhili_size == ''){
                echo "<script type='text/javascript'>alert('对不起,质粒大小(kb)不能为空！');</script>";
                echo "<script type='text/javascript'>window.location='".$_SERVER['HTTP_REFERER']."';</script>";
                exit;
			}

			$zhili_kangxing = I('post.zhili_kangxing');
			if($zhili_kangxing == '0'){
                echo "<script type='text/javascript'>alert('对不起,抗性不能为空！');</script>";
                echo "<script type='text/javascript'>window.location='".$_SERVER['HTTP_REFERER']."';</script>";
                exit;
			}

			 // var_dump(I('post.'));
			 $arr_box = I('post.zhili_box');
			 $arr_str = implode(',',$arr_box);
			  // var_dump($arr_str);
			// var_dump($_FILES);
			// exit;
			 $aaa = I('post.content_hid_a','','trim');
			 // dump($aaa);
			 $arr_a = explode(',',$aaa);

			 $bbb = I('post.content_hid_b','','trim');
			 // dump($bbb);
			 $arr_b = explode(',',$bbb);
			 // dump($arr_a);
			 // dump($arr_b);
			 $a_b = array_diff($arr_a,$arr_b);
			 // dump($a_b);

			 $ab = implode(',',$a_b);

			 // dump($ab);



			 global $ids;
			//1.创建对象
				$zhilimodel = D("Zhili");

				$order = M('Orders');
				//2.编写规则
				//3.压入数据并且验证
				//dump($zhilimodel);
				//dump($zhilimodel->create());
			  if($zhilimodel->create()){

                   //对数据执行逻辑判断
			  	  $ids = $zhilimodel->add();
			  	  
			  	  // $_SESSION['zhili_id']= $ids;



			  	    //对文件上传的处理
			  	  // $upload = new \Think\Upload();// 实例化上传类
        //           $upload->maxSize = 3145728 ;// 设置附件上传大小
        //           $upload->exts = array('xls', 'xlsx','pdf','doc','txt','html','htm');// 设置附件上传类型
        //           $upload->rootPath = './Uploads/'; // 设置附件上传根目录
        //           $upload->savePath = 'Zhili/'; // 设置附件上传（子）目录
        //         // 上传单个文件 
        //             $info=$upload->uploadOne($_FILES['zhili_file']);
        //              if(!$info) {// 上传错误提示错误信息
        //                    $this->error($upload->getError());
        //              }else{// 上传成功 获取上传文件信息
        //                  $file_address = $info['savepath'].$info['savename'];
        //                  $data['zhili_file'] = $file_address;
        //                  $zhilimodel -> where('id = '.$ids) -> save($data);
        //               }
			  if ($_FILES['zhili_file']['name'] != ''){
               $upload = new \Think\Upload();// 实例化上传类
               $upload->maxSize = 3145728000 ;// 设置附件上传大小
               $upload->exts = array('rar','zip','xls','xlsx','pdf','doc','txt');// 设置附件上传类型
               $upload->rootPath  = './Uploads/'; // 设置附件上传根目录
               $upload->savePath  =  'Zhili/'; // 设置附件上传（子）目录
               // 上传文件 
               $info = $upload->upload();
               if(!$info){// 上传错误提示错误信息
                  $this->error($upload->getError());
                }else{// 上传成功
                 foreach($info as $file){
					$url = $file['savepath'].$file['savename'];
				}
                }
                 $url = $upload->rootPath.$url; 

                 $orderData = array(
				 'id' => $ids,
				'zhili_file' => $url
				 );
		           $zhilimodel -> data($orderData) -> save();  


		         }

		          #order方法开始
			  	   $code = createProCode(10);
		         # 检测code唯一
		    
		        $checkOrder = $order->where(" code = '".$code."' ")->find();
		      if($checkOrder){
				$code = createProCode(10);
		       }

		        $orderData = array(
				'code' => $code,
				'uid' => intval(session('uid')),
				'addtime' => time(),
				'status' => 1,
				'ordertype' => 6,
				'cloneid'=> $ids,
				'num_yinwu' => 1
				 
                );
		// dump($orderData);
		// exit;
		     //将新的订单加入到“gege_orders”表当中  
			 $orderID = $order->add($orderData);  //得到订单的id,又是关联的id

            // $_SESSION['gene_lian_order']= $orderID;

            $zhili_order['orderid'] = $orderID;
            $zhili_order['zhili_content'] = $ab;
            $zhili_order['zhili_box'] = $arr_str;

            $zhilimodel -> where('id = '.$ids) -> save($zhili_order);  //

            #order方法结束

            #guodu方法开始
             $userInfo = getUserInfo(session('uid'));
		     $this->assign('userInfo',$userInfo);

		     $arr = $zhilimodel -> where("orderid = ".$orderID)->select();

		     $this -> assign("zhililist",$arr);
		        // var_dump($arr);

		     $count = count($arr);
       
		    $guoData = array(
			'num_yinwu' => $count
				);
		    $order -> where('id = '.$orderID) -> save($guoData);
             #guodu方法结束





			  	   //exit;
			  	   if($ids > 0 && $orderID > 0){
                // $this->success('恭喜您，数据提交成功。。。',U('Zhili/order'));
			  	   	$this -> display('Zhili/guodu');
			  	   }else{
                     $this->error('对不起，数据提交失败。。。');
			  	   }
				}else{
					//5.验证失败，显示错误
					$this->error($zhilimodel->getError());
				}

		}


		 
	}

	//形成订单的操作

	public function order(){
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
		  $ordermodel = M('Orders');
		  $checkOrder = $ordermodel->where(" code = '".$code."' ")->find();
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
				'ordertype' => 6,
				'zhili_id'=>$_SESSION['zhili_id']
				 

			);
		// dump($orderData);
		// exit;
			$orderID = $ordermodel->add($orderData);
			//echo $orderID;
			//exit;

			if($orderID){
				
				$this ->redirect("Index/index");

			}else{
				$this ->redirect("Index/index");

			}


	}

	public function copy_zhili_order(){
		if (!UserController::isLogin()){
			redirect(U('/Home/User/'));
		}
		// var_dump(I('get.'));
		// exit;
		//得到id值
		$id = intval(I('get.id',0,'intval'));
		$zhilimodel = D('Zhili');

		$zhiliinfo = $zhilimodel -> where('id = '.$id)->find();
		unset($zhiliinfo['id']);

		// dump($serverinfo);
		// exit;
		
		$orderbyid = $zhiliinfo['orderid'];


		// 对信息的判断开始
		// $where['orderid'] = $orderbyid;
		
         
 
		// 对信息的判断结束
        $orderID = $zhilimodel->data($zhiliinfo)->add();

		 // var_dump($geneinfo);
        if($orderID){
          $this -> success("该订单复制成功！",U('Zhili/guodu','id='.$orderbyid));
        }else{
          $this -> error("该订单复制失败！");
        }


	}

	//删除初次gene订单
	public function del_zhili_order(){
		if (!UserController::isLogin()){
			//echo "aaaa";
			redirect(U('/Home/User/'));

		}
		 // var_dump(I('get.'));
		 // exit;
		$id = I('get.id',0,'intval');
		$zhilimodel = D('Zhili');
		$order = M("Orders");
        //得到orderid
		 $orderbyid = $zhilimodel -> where('id = '.$id) -> getField('orderid');

		$del = $zhilimodel -> where('id = '.$id) -> delete();
		//start

		//end
		//判断该订单数量。。。
		$num = $zhilimodel -> where("orderid = ".$orderbyid)->count();

		if($num > 0){
			$guoData = array(
			'num_yinwu' => $num
				);
		 $order -> where('id = '.$orderbyid) -> save($guoData);

         $this ->success("删除该质粒制备信息成功！",U('Zhili/guodu','id='.$orderbyid));
		}else{
			$order -> where("id = ".$orderbyid) -> delete();
         $this ->error("删除该质粒制备信息成功!",U('Zhili/Create'));
		}
	}



	public function forms_do(){

     	if(!UserController::isLogin()){
			//echo "aaaa";
			redirect(U('/Home/User/'));

		}


		$zhilimodel = D("zhili");
		$ordermodel = M("orders");
		// dump($_POST);
		// dump(implode(',',$_POST['zhili_box']));
		// exit;
		$box = implode(',',$_POST['zhili_box']);
		$content = rtrim($_POST['content_hid_ab'],',');
		// dump($content);
		//根据基因的ID进行修改
		$zhili_id = intval($_POST['content_hid_id']);
		$order_id = intval($_POST['content_hid_orderid']);
		// content_hid_orderid
		// exit;




		$where['zhili_title'] = $_POST['zhili_title'];
		$where['zhili_material'] = $_POST['zhili_material'];
		$where['zhili_serial'] = $_POST['zhili_serial'];
		// $where['zhili_file'] = $_POST['zhili_file'];
		$where['zhili_size'] = $_POST['zhili_size'];
		$where['zhili_copy'] = $_POST['zhili_copy'];
		$where['zhili_pro'] = $_POST['zhili_pro'];
		$where['zhili_kangxing'] = $_POST['zhili_kangxing'];
		$where['zhili_content'] = $content;
		$where['zhili_quantity'] = $_POST['zhili_quantity'];
		$where['zhili_num'] = $_POST['zhili_num'];
		$where['zhili_num_size'] = $_POST['zhili_num_size'];
		$where['zhili_level'] = $_POST['zhili_level'];
		$where['zhili_box'] = $box;
		$where['zhili_storage'] = $_POST['zhili_storage'];
		$where['zhili_cache'] = $_POST['zhili_cache'];
		$where['zhili_demand'] = $_POST['zhili_demand'];
		$where['zhili_pipe'] = $_POST['zhili_pipe'];
		$where['zhili_other'] = $_POST['zhili_other'];

		if($_POST['zhili_title']=='' || $_POST['zhili_size']=='' || $_POST['zhili_kangxing']=='0'){
			$this->error($zhilimodel->getError());
		}


		 
		$zhiliSave = $zhilimodel ->where('id = '.$zhili_id) -> save($where);
		//echo $zhiliSave;

		//处理文件修改
		     if ($_FILES['zhili_file']['name'] != ''){
               $upload = new \Think\Upload();// 实例化上传类
               $upload->maxSize = 3145728000 ;// 设置附件上传大小
               $upload->exts = array('rar','zip','xls','xlsx','pdf','doc','txt');// 设置附件上传类型
               $upload->rootPath  = './Uploads/'; // 设置附件上传根目录
               $upload->savePath  =  'Zhili/'; // 设置附件上传（子）目录
               // 上传文件 
               $info = $upload->upload();
               if(!$info){// 上传错误提示错误信息
                  $this->error($upload->getError());
                }else{// 上传成功
                 foreach($info as $file){
					$url = $file['savepath'].$file['savename'];
				}
                }
                 $url = $upload->rootPath.$url; 

                 $orderData = array(
				 'id' => $zhili_id,
				'zhili_file' => $url
				 );
		           $zhilimodel -> data($orderData) -> save();  

                }



	 
		
			//得到当前的状态：1，草稿,点击订单号对样品信息进行修改后，状态变为2，即下订单
			// $status = intval($ordermodel->where("zhili_id = ".$zhili_id)->getField('status'));
			 
			// $status = $status + 1;//下单状态：2
			// $data['status']=$status;
			// $orderSave = $ordermodel ->where("zhili_id = ".$zhili_id)->save($data);
			//exit;

            // $this -> success("订单修改成功。。",U('Index/index'));
            
            #如果当前的状态为：2，点击订单号跳到客户信息,订购信息与样品信息页面
         if($zhiliSave){   
           // $this -> success("您已经对订单信息编辑。。",U('Index/index'));
         	 $this -> success("您已经对订单信息编辑。。",U('Zhili/guodu','id='.$order_id));

		}else{

            // $this -> success("您没有对订单信息编辑。。",U('Index/index'));
            $this -> success("您没有对订单信息编辑。。",U('Zhili/guodu','id='.$order_id));
		}

	}

	//过渡也
	public function guodu(){
		if (!UserController::isLogin()){
			//echo "aaaa";
			redirect(U('/Home/User/'));

		}
		// echo "hahha";
		// exit;
        $userInfo = getUserInfo(session('uid'));

		$this->assign('userInfo',$userInfo);
        
        $order = M("Orders");
		$zhiliorder = M("zhili");

		$orderID = I('get.id',0,'intval');  // 订单id  也是orderid
		 // echo $orderID;
		 // exit;

		// $hd_clone_name = I('get.hd_clone_name','','trim');
	 //    $hd_clone_zaiti_name = I('get.hd_clone_zaiti_name','','trim');
  //       $this -> assign('hd_clone_name',$hd_clone_name);
	 //    $this -> assign('hd_clone_zaiti_name',$hd_clone_zaiti_name);

		// exit;

		$arr = $zhiliorder -> where("orderid = ".$orderID)->order('id desc')->select();

		$this -> assign("zhililist",$arr);

		// var_dump($arr);
		// exit;

		 
		 // var_dump($arr);
		$this->display();
	 
	}

	//确认最后订单
	public function confirm_order(){
		if (!UserController::isLogin()){
			redirect(U('/Home/User/'));
		}

		$orderid = I('get.orderid','0','intval');
		$order = M('Orders');
		$zhilimodel = D('Zhili');
		$count = $zhilimodel -> where('orderid = '.$orderid) -> count();
		// var_dump(I('get.'));
		// exit;
		// echo "111";
		

		 
		$orderstatus = array(
			'status' => 2,
			'num_yinwu'=>$count
			);
		$num = $order -> where('id = '.$orderid) -> save($orderstatus);
		if($num){
         $this -> success("确认订单已经提交！",U('Index/index'));
		}else{
         $this -> error("确认订单提交失败！");
		}
	}

	//删除订单
	public function del_order(){
		if (!UserController::isLogin()){
			//echo "aaaa";
			redirect(U('/Home/User/'));

		}

		$id = I('get.id','0','intval');
		// echo $id;
		// exit;
		$order = M('Orders');
		$num = $order -> where('id = '.$id) -> delete();
		if($num){
			$this -> success("该订单删除成功！");
		}else{
			$this -> error("该订单是无效订单！");
		}
	}

	//留言
	public function liuyan(){
		if (!UserController::isLogin()){
			redirect(U('/Home/User/'));
		}
		// echo session('uid');
		// var_dump(I('post.'));
		// var_dump(I('get.'));
		// exit;
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
          $name = "金开瑞质粒制备相关文件下载—".date("Y-m-d",time()).".rar";
		  // echo $path;
	 
          }
          if($exts == "zip"){
          $name = "金开瑞质粒制备相关文件下载—".date("Y-m-d",time()).".zip";
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




   

}


?>