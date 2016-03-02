<?php
namespace Home\Controller;
use Think\Controller;
header("content-type:text/html;charset=utf-8");
date_default_timezone_set('PRC');
class IndexController extends Controller{
    public function index(){
    	// var_dump(UserController::isLogin());
    	// exit;
		if (UserController::isLogin()){

			// echo "aaaa";
			// exit;
			$order = M('Orders');
			//测序
			$result = $order->field('id,code,code_yw,uid,description,info,addtime,ordertype,status,num_yinwu,gid,num,synthesis')->where(" uid = '".session('uid')."' and status != 3 and ordertype = 1")->order('id desc')->limit(3)->select();
			$this->assign('orderList',$result);

            //引物
			$result_a = $order->field('id,code,code_yw,uid,description,info,addtime,ordertype,status,num_yinwu,gid,num,synthesis')->where(" uid = '".session('uid')."' and status != 3 and ordertype = 2")->order('id desc')->limit(3)->select();
			$this->assign('orderList_a',$result_a);

            //基因
			$result_b = $order->field('id,code,code_yw,uid,description,info,addtime,ordertype,status,num_yinwu,gid,num,synthesis')->where(" uid = '".session('uid')."' and status != 3 and ordertype = 3")->order('id desc')->limit(3)->select();
			$this->assign('orderList_b',$result_b);

			//克隆
			$result_c = $order->field('id,code,uid,description,info,addtime,ordertype,status,num_yinwu,gid,num')->where(" uid = '".session('uid')."' and status != 3 and ordertype = 4")->order('id desc')->limit(3)->select();
			$this->assign('orderList_c',$result_c);
			// var_dump($result_c);
			// exit;

			//基因突变
			$result_d = $order->field('id,code,uid,description,info,addtime,ordertype,status,num_yinwu,gid,num')->where(" uid = '".session('uid')."' and status != 3 and ordertype = 5")->order('id desc')->limit(3)->select();
			$this->assign('orderList_d',$result_d);

			//质粒制备
			$result_e = $order->field('id,code,uid,description,info,addtime,ordertype,status,num_yinwu,gid,num')->where(" uid = '".session('uid')."' and status != 3 and ordertype = 6")->order('id desc')->limit(3)->select();
			$this->assign('orderList_e',$result_e);

			# 订单结果
			$resultList = $order->where(' uid = '.session('uid').' and status = 3')->limit(5)->select();
			$this->assign('resultList',$resultList);
			# 客户信息
			$userInfo = getUserInfo(session('uid'));
			$this->assign('userInfo',$userInfo);
			$this->display('Index/index');
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
		$this->display('Index/order');
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
				'excelurl' => $url,
				'ordertype' => 1,
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

         $PHPExcel=$PHPReader->load($filePath);
	      //获取表中的第一个工作表，如果要获取第二个，把0改为1，依次类推
        $currentSheet=$PHPExcel->getSheet(0);
         //获取总列数
        $allColumn=$currentSheet->getHighestColumn();
        //获取总行数
        $allRow=$currentSheet->getHighestRow();
        for($currentRow=2;$currentRow<=$allRow;$currentRow++){
            //从哪列开始，A表示第一列
            for($currentColumn='A';$currentColumn<='G';$currentColumn++){
                //数据坐标
                $address=$currentColumn.$currentRow;
                //读取到的数据，保存到数组$arr中
                $data[$currentRow][$currentColumn]=$currentSheet->getCell($address)->getValue();
                 
            }
            //判断数组原始是否为空。如果为空，跳出循环
            if(empty($data[$currentRow]['C']) && empty($data[$currentRow]['B'])){
            	unset($data[$currentRow]);
            	break;
            }

        }



          // var_dump($data);
          // exit;
          //将数据信息插入到order_sequencing表当中
        foreach($data as $row){
        	 $primers_info = array();

        	 $a = trim($row['A']); //样品名称  samplename
        	 $b = trim($row['B']); //测序引物  primername
        	 $c = trim($row['C']); //样品类型  sampletype
        	 $d = trim($row['D']); //抗性      primercon
        	 $e = trim($row['E']); //载体全称  carrier
        	 $f = trim($row['F']); //片段长度   length
        	 $g = trim($row['G']); //测序要求  claim

        	 if($c == "菌样"){
        	 	$c = 1;
        	 }elseif($c == '质粒'){
                $c = 2;
        	 }elseif($c="PCR未纯化"){
                $c = 3;
        	 }elseif($c="PCR已纯化"){
                $c = 4;
        	 }else{
        	 	$c=0;
        	 }

        	 if($g =="正向"){
                 $g=1;
        	 }elseif($g =="反向"){
                  $g=2;
        	 }elseif($g =="双向"){
                  $g=3;
        	 }elseif($g =="测通"){
                  $g=4;
        	 }else{
        	 	 $g=0;
        	 }



        	  $primers_info = array(
				'orderid' =>$orderID,
				'samplename' =>$a,
				'sampletype' =>$c,
				'carrier' =>$e,
				'primername' =>$b,
				'claim' =>$g,
				'length' =>$f,
				'primercon' => $d,
				// 'specialclaim' =>$g, 
				'addtime' => time()
			   );
        	      $orders_sequencing = M('OrdersSequencing');
                   $orders_sequencing -> data($primers_info)->add();

        }

        $orders = M('Orders');
         	$where['id'] = $orderID;
         	$where['num_yinwu'] = count($data);
         	$orders -> data($where)->save();
			
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
			$result = M('Primers')->where('ptype = 1')->select();
			$this->assign('primers',$result);
			$this->display('Index/step');
		}
	}
	public function save(){
		if (!UserController::isLogin()){
			redirect(U('/Home/User/'));
		}
		$sequencingNum = I('post.num','1','int');
		

		// var_dump($_POST);
		// exit;
		# 生成参数
		for($i=1;$i<=$sequencingNum;$i++){
				$sequencing[$i] = array(
					'samplename' => I('post.samplename'.$i),
					'sampletype' => I('post.sampletype'.$i,'','int'),
					'carrier' => I('post.carrier'.$i),
					'length' => I('post.length'.$i,'','int'),
					// 'concentration' => I('post.concentration'.$i,'','int'),
					'primername' => I('post.primername'.$i),
					'primercon' => I('post.primercon'.$i,''),
					// 'universalprimers' => I('post.universalprimers'.$i,'','int'),
					'claim' => I('post.claim'.$i,'','int'),
					'specialclaim' => I('post.specialclaim'.$i,'','int'),
					'addtime' => time()
				);
		}
		# 检测参数
		foreach ($sequencing as $sk=>$sv){
			foreach($sv as $kk=>$kv){
				if ($kv==''){
					switch( $kk){
						case 'samplename':$this->error('第'.$sk.'行样品名称错误！');
                         // echo "<script>window.history.back();</script>";
						break;
						case 'sampletype':$this->error('第'.$sk.'行样品类型错误！');
                         // echo "<script>window.history.back();</script>";
						break;
						case 'carrier':$this->error('第'.$sk.'行样品载体名称及抗性错误！');
                         // echo "<script>window.history.back();</script>";
						break;
						case 'length':$this->error('第'.$sk.'行样品片段或插入序列长度( bp)错误！');
                         // echo "<script>window.alert('aaa');</script>";
						break;
						// case 'concentration':$this->error('第'.$sk.'行样品DNA 浓度(ng/µl)错误！');break;
						case 'primername':$this->error('第'.$sk.'行样品测序引物名称错误！');
                         // echo "<script>window.history.back();</script>";
						break;
						// case 'primercon':$this->error('第'.$sk.'行样品抗性错误aa！');break;
						// case 'universalprimers':$this->error('第'.$sk.'行样品通用引物错误！');break;
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
			'info' => I('post.info')
		);
		$orderID = $order->data($orderData)->add();
		if ($orderID){
			$orders_sequencing = M('OrdersSequencing');
			$recodeIDStr = '';
			foreach($sequencing as $ik=>$iv){
				$iv['orderid'] = $orderID;
				$sequencingID = $orders_sequencing->data($iv)->add();
				if ($sequencingID){
					if ($recodeIDStr != '') $recodeIDStr .= ',';
					$recodeIDStr .= $sequencingID;
				} else {
					# 删除已经写入数据库信息
					$laseSql = $orders_sequencing->getLastSql();
					if ($recodeIDStr != '') $rs = $orders_sequencing->where(" id IN(".$recodeIDStr.")")->delete();
					$this->error($laseSql);
				}
			}
			
			/* for($i=1;$i<=$sequencingNum;$i++){
				$sequencing[$i] = array(
					'orderid' => $orderID,
					'samplename' => I('post.samplename'.$i),
					'sampletype' => I('post.sampletype'.$i,'','int'),
					'carrier' => I('post.carrier'.$i),
					'length' => I('post.length'.$i,'','int'),
					'concentration' => I('post.concentration'.$i,'','int'),
					'primername' => I('post.primername'.$i),
					'primercon' => I('post.primercon'.$i,'','int'),
					'universalprimers' => I('post.universalprimers'.$i,'','int'),
					'claim' => I('post.claim'.$i,'','int'),
					'specialclaim' => I('post.specialclaim'.$i,'','int'),
					'addtime' => time()
				);
				$sequencingID = $orders_sequencing->data($sequencing[$i])->add();
				if ($sequencingID){
					if ($recodeIDStr != '') $recodeIDStr .= ',';
					$recodeIDStr .= $sequencingID;
				} else {
					# 删除已经写入数据库信息
					$laseSql = $orders_sequencing->getLastSql();
					$rs = $orders_sequencing->where(" id IN(".$recodeIDStr.")")->delete();
					$this->error($laseSql);
				}
				
			} */
			$this->success('下单成功',U('/Index/info','id='.$orderID));
		} else {
			$this->error('下单错误！');
		}
	}
	
	public function info(){
		if (!UserController::isLogin()){
			redirect(U('/Home/User/'));
		}
		# 客户信息
		$userInfo = getUserInfo(session('uid'));
		$this->assign('userInfo',$userInfo);
		// var_dump($userInfo);
		
		$orderID = I('get.id','','int');

		$this -> assign("orderid",$orderID);
		$this -> assign("id_user",session('uid'));



		if ($orderID == '') redirect(U('/Index/'));
		$order = M('Orders');
		$note = M('Contents');
		$orderInfo = $order->where(' id = '.$orderID)->find();
		$this->assign('orderInfo',$orderInfo);

		 $notes = $note -> where("id_order = ".$orderID)->field('content,addtime,flag')->order("addtime ASC")->select();
		     $this -> assign("notes",$notes);

        //改变状态
	   $note_info['status'] = 2;
       $note -> where('id_order ='.$orderID)->data($note_info)->save();
		# 获取下级数据
		$orders_sequencing = M('OrdersSequencing');
		$countNum = $orders_sequencing->where(' orderid = '.$orderID)->count();
		$list = $orders_sequencing->where(' orderid = '.$orderID)->select();
		$this->assign('list',$list);
		$this->assign('countNum',$countNum);
		if($orderInfo['status'] == 2){
			# 展示结果
			$this->display('Index/info');
		} else {
			#
			$result = M('Primers')->where('ptype = 1')->select();
			$this->assign('primers',$result);
			$this->assign('num',$countNum);
			$this->display('Index/infoupdate');
		}
	}
	
	# 更新订单信息
	public function updateorder(){
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
		
		$sequencingNum = I('post.num','1','int');
		$orders_sequencing = M('OrdersSequencing');
		# 检测参数
		for($i=1;$i<=$sequencingNum;$i++){
			$sequencing[$i] = array(
				'id' => I('post.seqid'.$i,''),
				'orderid' => $orderInfo['id'],
				'samplename' => I('post.samplename'.$i,''),
				'sampletype' => I('post.sampletype'.$i,'','int'),
				'carrier' => I('post.carrier'.$i,''),
				'length' => I('post.length'.$i,'','int'),
				'concentration' => I('post.concentration'.$i,'','int'),
				'primername' => I('post.primername'.$i,''),
				'primercon' => I('post.primercon'.$i,''),
				'universalprimers' => I('post.universalprimers'.$i,'','int'),
				'claim' => I('post.claim'.$i,'','int'),
				'specialclaim' => I('post.specialclaim'.$i,'','int'),
				'addtime' => time()
			);
		}
		# 检测参数
		foreach ($sequencing as $sk=>$sv){
			foreach($sv as $kk=>$kv){
				if ($kv==''){
					switch( $kk){
						case 'samplename':$this->error('第'.$sk.'行样品名称错误！');
                        // echo "<script>window.history.back();</script>";
						break;
						case 'sampletype':$this->error('第'.$sk.'行样品类型错误！');
                         // echo "<script>window.history.back();</script>";
						break;
						case 'carrier':$this->error('第'.$sk.'行样品载体名称及抗性错误！');
                         // echo "<script>window.history.back();</script>";
						break;
						case 'length':$this->error('第'.$sk.'行样品片段或插入序列长度( bp)错误！');
                        // echo "<script>window.history.back();</script>";
						break;
						// case 'concentration':$this->error('第'.$sk.'行样品DNA 浓度(ng/µl)错误！');break;
						case 'primername':$this->error('第'.$sk.'行样品测序引物名称错误！');
                        // echo "<script>window.history.back();</script>";
						break;
						// case 'primercon':$this->error('第'.$sk.'行样品抗性错误aa！');break;
						// case 'universalprimers':$this->error('第'.$sk.'行样品通用引物错误！');break;
						default:
							continue;
					}
				}
			}
		}
		foreach($sequencing as $sk=>$sv){
			if ($sv['id'] > 0){
				$orders_sequencing->data($sv)->save();
			} else {
				$orders_sequencing->data($sv)->add();
			}
		}
		$primerNum = I('post.num','1','int');
		// var_dump($primerNum);
		// exit;
		# 更新订单信息
		$orderData = array(
			'id' => $orderInfo['id'],
			'status' => 2,
			'num_yinwu' => $primerNum
		);
		if ($order->data($orderData)->save()){
			$this->success('订单确认成功',U('/Index/info','id='.$orderID));
		}
		exit;
	}
	
	public function search(){
		// echo "test";
		// exit;
		if (!UserController::isLogin()){
			redirect(U('/Home/User/'));
		}
		# 客户信息
		$userInfo = getUserInfo(session('uid'));
		$this->assign('userInfo',$userInfo);
		$fromDate = I('post.FromDate','');
		$toDate = I('post.ToDate','');
		$ordertype1 = I('post.chkOrderType1','');
		$ordertype2 = I('post.chkOrderType3','');

		$ordertype4 = I('post.chkOrderType4','');

		$samplename = I('post.txtSampleName','');

		$ordercode = I('post.txtOrderId','');

		$primerName = I('post.txtPrimerName','');
		$page = I('post.p',1,'int');
		$pageNum = 10;
		$where = '';
		//用户的id   //  ' uid = '.session('uid')
		$where['uid'] = session('uid');
		if (strtotime($toDate) < strtotime($fromDate)){
			$this->error('时间范围不对');
		}
		if ($fromDate != ''){
			$nfromdate = strtotime($fromDate.' 00:00:00');
			$where['addtime'] = array(array('gt',$nfromdate));
		}
		if ($toDate != ''){
			$ntodate = strtotime($toDate.' 23:59:59');
			$where['addtime'] = array(array('lt',$ntodate));
		}
		if ($toDate != '' && $fromDate != ''){
			$where['addtime'] = array(array('gt',$nfromdate),array('lt',$ntodate));
		}
		
		if ($ordertype1 != ''){
			$where['ordertype'] = 1;
		}
		
		if ($ordertype2 != ''){
			$where['ordertype'] = 2;
		}

		if ($ordertype4 != ''){
			$where['ordertype'] = 3;
		}
		
		if ($ordertype1 != '' && $ordertype2 != ''){
			$where['ordertype'] = array('IN','1,2');
		}

		if ($ordertype1 != '' && $ordertype4 != ''){
			$where['ordertype'] = array('IN','1,4');
		}

		if ($ordertype2 != '' && $ordertype4 != ''){
			$where['ordertype'] = array('IN','2,4');
		}

		if ($ordertype1 != '' && $ordertype2 != '' && $ordertype4 != ''){
			$where['ordertype'] = array('IN','1,2,4');
		}

		// if ($ordertype1 == '' && $ordertype2 == ''){
		// 	$where['ordertype'] = 3;
		// }
		
		if ($ordercode != ''){
			$where['code_yw'] = array( 'Like','%'.$ordercode.'%');
		} 
		
		$order = M('Orders');
		$list = $order->where( $where )->page($page)->limit($pageNum)->order("id desc")->select();
		$this->assign('list',$list);
		//  var_dump($list);
		// echo count($list);
		// exit;
        // echo $ordercode;
		
		# 参数
		$this->assign('fromDate',$fromDate);
		$this->assign('toDate',$toDate);
		$this->assign('ordertype1',$ordertype1);
		$this->assign('ordertype2',$ordertype2);
		$this->assign('ordertype4',$ordertype4);
		$this->assign('samplename',$samplename);
		$this->assign('ordercode',$ordercode);
		$this->assign('primerName',$primerName);
		$this->assign('page',$page);
		$this->assign('pageNum',$pageNum);
		
		$this->display('Index/search');
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

			// 开始
			$path = $info['excelurl'];
			// var_dump($path);
			// exit;
		 
		$name = "金开瑞引物合成在线提交订购单—".date("Y-m-d",time()).".xlsx";
	 
		$file = fopen($path,"r"); // 打开文件
		 

      header("Content-type: application/octet-stream");
      header("Accept-Ranges: bytes");
      header("Accept-Length: ".filesize($path));
      header("Content-Disposition: attachment; filename=".$name);
      // 输出文件内容
        echo fread($file,filesize($path));
        fclose($file);
        exit();
			// 结束
			// if ($info){
			// 	if (is_file($info['excelurl'])){
			// 		$a=new \Org\Net\Http();

			// 		$a->download($info['excelurl']);
			// 	} else {
			// 		$this->error('文件不存在！',U('Index/index'));
			// 	}
			// 	exit;
			// } else $this->error('参数错误！');
		}else $this->error('文件下载失败！');
	}
	
	# 结果展示
	public function rsinfo(){
		if (!UserController::isLogin()){
			redirect(U('/Home/User/'));
		}
		# 客户信息
		$userInfo = getUserInfo(session('uid'));
		$this->assign('userInfo',$userInfo);
		
		$orderID = I('get.id','','int');
		if ($orderID == '') redirect(U('/Index/'));
		$order = M('Orders');
		$orderInfo = $order->where(' id = '.$orderID)->find();
		$this->assign('orderInfo',$orderInfo);
		# 获取下级数据
		$orders_sequencing = M('OrdersSequencing');
		$countNum = $orders_sequencing->where(' orderid = '.$orderID)->count();
		$list = $orders_sequencing->where(' orderid = '.$orderID)->select();
		$this->assign('list',$list);
		$this->assign('countNum',$countNum);
		$this->display();
	}
	
	# 下载结果
	public function down(){
		if (!UserController::isLogin()){
			redirect(U('/Home/User/'));
		}
		$url = I('get.url','');
		if ($url == ''){
			redirect(U('/Index/'));
		}
		$url = ".".$url;
		if (is_file($url)){
			$a=new \Org\Net\Http();
			$a->download($url);
		} else {
			#echo '文件不存在';
			$this->error('文件不存在！',U('Index/index'));
		}
	}

	//test_excel
	public function test_excel(){
		if (!UserController::isLogin()){
			redirect(U('/Home/User/'));
		}
		$path = "./Uploads/Download/test_wh.xlsx";
		// file_get_contents($path);
		//下载的文件名
		//用以解决中文不能显示出来的问题
        // $name = iconv("gb2312","utf-8","金开瑞引物合成在线订购单模版");
		$name = "金开瑞测序在线订购单模版—".date("Y-m-d",time()).".xlsx";
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
	//下载后台上传的文件
	public function xiazai(){
		// var_dump(I("get."));
		if (!UserController::isLogin()){
			redirect(U('/Home/User/'));
		}

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
          $name = "金开瑞测序合成相关文件下载—".date("Y-m-d",time()).".rar";
		  // echo $path;
	 
          }
          if($exts == "zip"){
          $name = "金开瑞测序合成相关文件下载—".date("Y-m-d",time()).".zip";
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
	//del_order
	public function del_order(){
		if (!UserController::isLogin()){
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
	//留言信息
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

	//局部刷新留言内容

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
		// var_dump($liu);
		// exit;
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

	//对于分页的处理
	public function list_more(){
	  if (!UserController::isLogin()){
			redirect(U('/Home/User/'));
		}

		$order = M('Orders');
		$page = I('post.page',1,'int');
        $pageNum = 5; //页面展示条数
		//引物
			
			$result_a = $order->field('id,code,code_yw,uid,description,info,addtime,ordertype,status,num_yinwu,gid,num,synthesis')->where(" uid = '".session('uid')."' and status != 3 and ordertype = 1")->order('id desc')->page($page)->limit($pageNum)->select();
			$this->assign('orderList',$result_a);
            
            $map['ordertype'] = 1;
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

			$this -> display("Index/index_list");
			// var_dump($result_a);
		// echo "text";
	}



}