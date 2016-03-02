<?php
namespace Manage\Controller;
use Think\Controller;
header("content-type:text/html;charset=utf-8");
date_default_timezone_set('PRC');
class IndexController extends Controller {
    public function index(){
		if (UserController::isLogin()){
			
			$this->display('Index/index');
		} else {
			redirect(U('/Manage/User/'));
		}
    }
	public function left(){
		$this->display();
	}
	public function main(){
		
		if (!UserController::isLogin()){
			redirect(U('/Manage/User/'));
		}
		$order = M('Orders');
        
        // $page_a = I('post.page_a',1,'int');//测序
        // $page_b = I('post.page_b',1,'int');//引物
        // $page_c = I('post.page_c',1,'int');//基因
		$pageNum = 5; //页面展示条数
		// $countNum_a = $order->where("ordertype = 1")->count(); //测序
		// $pages_a = ceil($countNum_a / $pageNum);
		// $this -> assign("pages_a",$pages_a);
		// $this -> assign("countNum_a",$countNum_a);

		// $countNum_b = $order->where("ordertype = 2")->count(); //引物
		// $pages_b = ceil($countNum_b / $pageNum);
		// $this -> assign("pages_b",$pages_b);
		// $this -> assign("countNum_b",$countNum_b);

		// $countNum_c = $order->where("ordertype = 3")->count(); //基因
		// $pages_c = ceil($countNum_c / $pageNum);

        # 查询最新测序订单

		// $sequencingList = $order->where(' ordertype = 1')->order('addtime desc')->page($_GET['p'].',2')->limit($pageNum)->select();
		$sequencingList = $order->where(' ordertype = 1')->order('addtime desc')->limit($pageNum)->select();
		$this->assign('se',$sequencingList);
        // $Page_a = new \Think\Page($countNum_a,$pageNum);

        // $Page_a->setConfig('header','个会员');
        //  $Page_a->setConfig('prev','上一页');
        //  $Page_a->setConfig('next','下一页');
        //  $Page_a->setConfig('last','末页');
        //  $Page_a->setConfig('first','首页');

        // $show_a = $Page_a->show();// 分页显示输出
        //  $this->assign('page_a',$show_a);// 赋值分页输出
		// $this->assign('countNum_a',$countNum_a);
		// $this->assign('pages_a',$pages_a);
		// $this->assign('page_a',$page_a);

		# 查询最新引物订单
		//$list = $User->where('status=1')->order('create_time')->page($_GET['p'].',25')->select();
		// $primersList = $order->where(' ordertype = 2')->order('addtime desc')->page($_GET['p'].',2')->limit($pageNum)->select();
		$primersList = $order->where(' ordertype = 2')->order('addtime desc')->limit($pageNum)->select();
		$this->assign('pr',$primersList);
		 
		// $Page_b = new \Think\Page($countNum_b,$pageNum);// 实例化分页类 传入总记录数和每页显示的记录数
		
        
  //        $Page_b->setConfig('header','个会员');
  //        $Page_b->setConfig('prev','上一页');
  //        $Page_b->setConfig('next','下一页');
  //        $Page_b->setConfig('last','末页');
  //        $Page_b->setConfig('first','首页');

  //        $show_b = $Page_b->show();// 分页显示输出
  //        $this->assign('page_b',$show_b);// 赋值分页输出
        # 查询最新基因订单
		// $orderList = $order->where(' ordertype = 3')->order('addtime desc')->page($page_c)->limit($pageNum)->select();
		 // var_dump($orderList);
		$orderList = $order->where(' ordertype = 3')->order('addtime desc')->limit($pageNum)->select();
		$this->assign('orders',$orderList);
		// $this->assign('countNum_c',$countNum_c);
		// $this->assign('pages_c',$pages_c);
		// $this->assign('page_c',$page_c);

		#PCR克隆及亚克隆订单相关信息
		$cloneList = $order->where(' ordertype = 4')->order('addtime desc')->limit($pageNum)->select();
		$this->assign('clones',$cloneList);

		#基因突变服务订单相关信息
		$serverList = $order->where(' ordertype = 5')->order('addtime desc')->limit($pageNum)->select();
		$this->assign('servers',$serverList);

		#质粒制备订单相关信息
		$zhiliList = $order->where(' ordertype = 6')->order('addtime desc')->limit($pageNum)->select();
		$this->assign('zhilis',$zhiliList);




		$this->display();
	}
	
	public function sequencing(){
		if (!UserController::isLogin()){
			redirect(U('/Manage/User/'));
		}
		$page = I('post.page',1,'int');
		$pageNum = 15;
		
		$code = I('post.code','');
        
         $customer = I('post.customer','','trim');
         $members = M('MembersInfo');
         $where['name']=array('LIKE','%'.$customer.'%');
         $uid_wh =  $members -> where($where) -> field("uid")->select();

		$stime = I('post.stime','');
		$etime = I('post.etime','');
		$map['ordertype'] = 1;
        
        $uid_all = "";
            if($customer != ''){
            	// $map['code'] = array('Like','%'.$code.'%');
            	foreach($uid_wh as $row){
                 $uid_all .= $row['uid'].","; 
            	}
            	$person = mb_substr($uid_all,0,mb_strlen($uid_all)-1);
            	$map['uid']=array("in","{$person}");
            }

		if ($code != ''){
			$map['code'] = array('Like','%'.$code.'%');
		}
		
		if ($stime != '' && $etime != ''){
			$starttime = $stime.' 00:00:00';
			$endtime = $etime.' 23:59:59';
			$map['addtime'] = array(array('gt',strtotime($starttime)),array('lt',strtotime($endtime)));
		}
		
		if ($stime != '' && $etime == ''){
			$starttime = $stime.' 00:00:00';
			$map['addtime'] = array('gt',strtotime($starttime));
		}
		if ($etime != '' && $stime == ''){
			$endtime = $etime.' 23:59:59';
			$map['addtime'] = array('lt',strtotime($endtime));
		}		
		$order = M('Orders');
		$result = $order->where($map)->order('id desc')->page($page)->limit($pageNum)->select();
		
		$countNum = $order->where($map)->count();
		$pages = ceil($countNum / $pageNum);
		$this->assign('orderList',$result);
		$this->assign('code',$code);
		$this->assign('countNum',$countNum);
		$this->assign('pages',$pages);
		$this->assign('stime',$stime);
		$this->assign('etime',$etime);
		$this->assign('page',$page);
		$this->display();
	}
	
	
	public function sequencingShow(){
		if (!UserController::isLogin()){
			redirect(U('/Manage/User/'));
		}
		$orderID = I('get.id','','int');
		if ($orderID == '') redirect(U('/Index/'));
		$order = M('Orders');
        
         //判断订单是否已查看
        $where['flag_check'] = 1;
        $order -> where(' id = '.$orderID) -> save($where);

		$orderInfo = $order->where(' id = '.$orderID)->find();
		$this->assign('orderInfo',$orderInfo);
		# 获取下级数据
		$orders_sequencing = M('OrdersSequencing');
		$countNum = $orders_sequencing->where(' orderid = '.$orderID)->count();
		$list = $orders_sequencing->where(' orderid = '.$orderID)->select();
		# 获取客户信息
		$clientInfo = getClientInfo($orderInfo['uid']);
		// echo $orderInfo['uid'];
		// var_dump($clientInfo);
		// exit;
		$this->assign('client',$clientInfo);
		// var_dump($clientInfo);
		$this->assign('list',$list);
		$this->assign('countNum',$countNum);
		$this->assign('id',$orderID);
		$this->display();
	}
	
	public function updateseq(){
		if (!UserController::isLogin()){
			redirect(U('/Manage/User/'));
		}
		$id = I('get.id','','/^\d+$/');
		if ($id == '') $this->error('参数错误！');
		$orderInfo = M('orders')->where(' id = '.$id)->find();
		$this->assign('order',$orderInfo);
		$this->display();
	}

	public function update(){
		if (!UserController::isLogin()){
			redirect(U('/Manage/User/'));
		}
		// var_dump(I("post."));
		$orders = M('Orders');
		$status = I("post.status",'','intval');
		$sale_name = I('post.yw_name','','trim');
		$sale_money = I('post.yw_money','','trim');
		$orderID = I("post.orderid",'0','intval');
       
       if($status == 1){
			#未合成
			
         	$where['id'] = $orderID;
         	$where['synthesis'] = $status;
         	$where['sale_name'] = $sale_name;
         	$where['sale_money'] = $sale_money;
         	$num = $orders -> data($where)->save();
         	if($num){
         		$this -> success("该状态修改成功！");
         	}else{
         		$this -> error("该状态修改失败！");
         	}

		}elseif($status == 2){
			#终止
			$where['id'] = $orderID;
         	$where['synthesis'] = $status;
            $where['sale_name'] = $sale_name;
            $where['sale_money'] = $sale_money;
         	$num = $orders -> data($where)->save();
         	if($num){
         		$this -> success("该状态修改成功！");
         	}else{
         		$this -> error("该状态修改失败！");
         	}

		}elseif($status == 3){
			#终止
			$where['id'] = $orderID;
         	$where['synthesis'] = $status;
            $where['sale_name'] = $sale_name;
            $where['sale_money'] = $sale_money;
         	$num = $orders -> data($where)->save();
         	if($num){
         		$this -> success("该状态修改成功！");
         	}else{
         		$this -> error("该状态修改失败！");
         	}

		}elseif($status == 4){
			#终止
			$where['id'] = $orderID;
         	$where['synthesis'] = $status;
            $where['sale_name'] = $sale_name;
            $where['sale_money'] = $sale_money;
         	$num = $orders -> data($where)->save();
         	if($num){
         		$this -> success("该状态修改成功！");
         	}else{
         		$this -> error("该状态修改失败！");
         	}

		}elseif($status == 5){
			#终止
			$where['id'] = $orderID;
         	$where['synthesis'] = $status;
            $where['sale_name'] = $sale_name;
            $where['sale_money'] = $sale_money;
         	$num = $orders -> data($where)->save();
         	if($num){
         		$this -> success("该状态修改成功！");
         	}else{
         		$this -> error("该状态修改失败！");
         	}

		}elseif($status == 6){
			#已发货
			$express = I('post.express','','/^\d+$/');
			// if($express == ''){
			// 	$this->error('订单号错误！');
			// }
			if($orderID == '0'){
				$this->error('参数错误！');
			}
			// var_dump($express);
			// exit;
			$where['num'] = trim($express);
			$where['id'] = $orderID;
         	$where['synthesis'] = $status;
         	$where['sale_name'] = $sale_name;
         	$where['sale_money'] = $sale_money;
         	$num = $orders -> data($where)->save();
         	if($num){
         		$this -> success("该状态修改成功！");
         	}else{
         		$this -> error("该状态修改失败！");
         	}

		}elseif($status == 7){
			#终止
			$where['id'] = $orderID;
         	$where['synthesis'] = $status;
            $where['sale_name'] = $sale_name;
            $where['sale_money'] = $sale_money;
         	$num = $orders -> data($where)->save();
         	if($num){
         		$this -> success("该状态修改成功！");
         	}else{
         		$this -> error("该状态修改失败！");
         	}

		}else{
			echo "<script>alert(\"该状态不存在\");</script>";
		}

		 

		 
		 
			  
	}

	//样品信息
	public function seqres(){

		if (!UserController::isLogin()){
			redirect(U('/Manage/User/'));
		}
		// echo "test";
		// var_dump(I("post."));
		$model = M("OrdersSequencing");
		//orderid
		$orderID = I("post.seqid",'0','intval');  //primerID
		$status = I("post.st","0","intval");   //测序状态
		$content = I("post.bz",'','trim');   //备注内容

		$where['id'] = $orderID;
		$where['status'] = $status;
		$where['content'] = $content;

		$num = $model -> data($where) -> save(); 
		if($num){
			$this -> success("测序相关属性信息修改成功！");
		}else{
			$this -> error("测序相关属性信息修改失败！");
		}




	}
	
	#
	public function sequencinginfo(){
		if (!UserController::isLogin()){
			redirect(U('/Manage/User/'));
		}
		$id = I('get.id','','/^\d+$/');

		

		if ($id == '') $this->error('参数错误！');
		$info = M('OrdersSequencing')->where(' id = '.$id)->find();
		$this -> assign("id",$id);
		$this->assign('info',$info);
		$this->display('Index/sequencinginfo');
	}
	
	public function Serial(){
		if (!UserController::isLogin()){
			redirect(U('/Manage/User/'));
		}
		$id = I('get.id','','int');
		if ($id > 0){
			$orders_sequencing = M('OrdersSequencing');
			$sequencinginfo = $orders_sequencing->where(' id = '.$id)->find();
			if ($sequencinginfo){
				# 检测订单是否确认
				$order = M('Orders');
				$orderInfo = $order->where(' id = '.$sequencinginfo['orderid'])->find();
				if ($orderInfo && $orderInfo['status'] == 2){
					if ($sequencinginfo['number'] == ''){
						# 生成流水号
						$numcode = date('Ymd',time());
						# 确定num
						$list = $orders_sequencing->where(" number REGEXP '".$numcode."-[0-9]{5}' ")->field('number')->order('number desc')->limit(1)->select();
						if ($list){
							$arr = explode('-',$list[0]['number']);
							$key = intval($arr[1])+1;
						} else {
							$key = 1;
						}
						$keystr = createNum($key,5);
						$data = array(
							'number' => $numcode.'-'.$keystr,
							'id' => $sequencinginfo['id']
						);
						if ($orders_sequencing->data($data)->save()){
							$this->success('生成成功',U('Index/sequencingShow','id='.$sequencinginfo['orderid']));
						}
					} else {
						$this->error('已生成！');
					}
				} else $this->error('订单未确认，请先确认订单！');
			} else $this->error('参数错误！');
		} else {
			$this->error('参数错误！');
		}
	}
	
	public function Serialall(){
		if (!UserController::isLogin()){
			redirect(U('/Manage/User/'));
		}
		$id = I('get.id','','int');
		if ($id > 0){
			# 检测订单是否确认
			$order = M('Orders');
			$orderInfo = $order->where(' id = '.$id)->find();
			if ($orderInfo && $orderInfo['status'] == 2){
				$orders_sequencing = M('OrdersSequencing');
				$numcode = date('Ymd',time());
				$list = $orders_sequencing->where(" number REGEXP '".$numcode."-[0-9]{5}' ")->field('number')->order('number desc')->limit(1)->select();
				if ($list){
					$arr = explode('-',$list[0]['number']);
					$key = intval($arr[1])+1;
				} else {
					$key = 1;
				}

				$sequencingList = $orders_sequencing->where(" number = '' and orderid = ".$id)->field('id')->order('id asc')->select();
				if (!empty($sequencingList)){
					foreach($sequencingList as $k=>$v){
						$keystr = createNum($key,5);
						$key++;
						$data = array(
							'number' => $numcode.'-'.$keystr,
							'id' => $v['id']
						);
						$orders_sequencing->data($data)->save();
					}
					$this->success('生成成功',U('Index/sequencingShow','id='.$id));
				} else {
					$this->error('无测序信息或已经生成');
				}
			} else $this->error('订单未确认，请先确认订单！');
		} else {
			$this->error('参数错误！');
		}
	}
	
	# 更新测序结果
	public function getresult(){
		if (!UserController::isLogin()){
			redirect(U('/Manage/User/'));
		}
		$id = I('get.id','','int');
		if ($id > 0){
			# 检测订单是否确认
			$order = M('Orders');
			$orderInfo = $order->where(' id = '.$id)->find();
			if ($orderInfo && $orderInfo['status'] == 2){
				$orders_sequencing = M('OrdersSequencing');
				$list = $orders_sequencing->where("orderid = ".$id." and number != '' ")->select();
				if ($list){
					foreach($list as $v){
						# 判断是否已经更新
						if ($v['status'] == 1) $flag = false;
						$str = $v['number'].'-'.$v['samplename'].'('.shoWuniversalPrimers($v['universalprimers']).')';
						$narr = explode('-',$v['number']);
						$arr = glob('./Uploads/'.$narr[0].'/*.ab1');
						if(!empty($arr)){
							foreach($arr as $k=>$n){
								if (preg_match("/".str_replace(array('(',')'),array('\(','\)'),$str)."/",$n)){
							
									$url = str_replace('./','/',$n);
									$data = array(
										'seqID' => $v['id'],
										'txturl' => str_replace('.ab1','.txt',$url),
										'ab1url' => $url,
										'addtime' => time(),
										'uid' => session('uid'),
									);
									$r = M('Results');
									# 检测是否已经更新了结果
									$checkResult = $r->where('seqID = '.$v['id'])->find();
									if ($checkResult){
										$updateDate = array(
											'id' => $checkResult['id'],
											'txturl' => str_replace('.ab1','.txt',$url),
											'ab1url' => $url,
											'addtime' => time(),
										);
										# 更新结果信息
										$r->data($updateDate)->save();
									} else {
										if ($r->data($data)->add()){
											# 更新测序序列状态
											$sdata = array(
												'id' => $v['id'],
												'status' => 2,
											);
											M('OrdersSequencing')->data($sdata)->save();
										}
									}
								}
							}
						} else {
							$this->error('暂未上传结果');
						}
					}
					# 检测该订单下属测序是否更新结果 如果全部都已经更新结果，则更新订单状态信息 3
					$checkInfo = M('OrdersSequencing')->where('orderid = '.$id.' and status = 1')->select();
					if (empty($checkInfo)){
						$oData = array(
							'status' => 3,
							'id' => $id
						);
						$order->data($oData)->save();
					}
					$this->success('更新结果成功',U('Index/sequencingShow','id='.$id));
				} else{
					$this->error('参数错误！');
				}
			} else $this->error('订单未确认，请先确认订单！');
		} else {
			$this->error('参数错误！');
		}
	}
	# 确认订单
	public function confirmOrder(){
		if (!UserController::isLogin()){
			redirect(U('/Manage/User/'));
		}
		$id = I('get.id','','int');
		if ($id > 0){
			# 检测订单
			$order = M('Orders');
			$orderInfo = $order->where(' id = '.$id)->find();
			if ($orderInfo){
				$data = array(
					'id' => $orderInfo['id'],
					'status' => 2
				);
				if ($order->data($data)->save()){
					$this->success('确认订单成功！',U('Index/sequencingShow','id='.$id));
				} else $this->error('确认订单错误！');
			} else $this->error('订单信息错误！');
		} else $this->error('参数错误！');
	}

	public function file(){
		if (!UserController::isLogin()){
			redirect(U('/Manage/User/'));
		}
		$id = I('get.oid','','int');
		if ($id > 0){
        $order = M('Orders');
			$info = $order->where('id = '.$id)->find();
			$code_yw = $info['code_yw'];

			// 开始
			$path = $info['excelurl'];
			// var_dump($path);
			// exit;
		 
		$name = "genecreate-".$code_yw.".xlsx";
	 
		$file = fopen($path,"r"); // 打开文件
		 

      header("Content-type: application/octet-stream");
      header("Accept-Ranges: bytes");
      header("Accept-Length: ".filesize($path));
      header("Content-Disposition: attachment; filename=".$name);
      // 输出文件内容
        echo fread($file,filesize($path));
        fclose($file);
        exit();
		}else{ 
			$this->error('文件下载失败！');
		}
		 
	}

	public function file_a(){
		if (!UserController::isLogin()){
			redirect(U('/Manage/User/'));
		}
		$id = I('get.oid','','int');
		if ($id > 0){
        $order = M('Orders');
			$info = $order->where('id = '.$id)->find();

			// 开始
			$path = $info['excelurl'];
			// var_dump($path);
			// exit;
		 
		$name = "金开瑞测序合成在线提交订购单—".date("Y-m-d",time()).".xlsx";
	 
		$file = fopen($path,"r"); // 打开文件
		 

      header("Content-type: application/octet-stream");
      header("Accept-Ranges: bytes");
      header("Accept-Length: ".filesize($path));
      header("Content-Disposition: attachment; filename=".$name);
      // 输出文件内容
        echo fread($file,filesize($path));
        fclose($file);
        exit();
		}else{ 
			$this->error('文件下载失败！');
		}
		 
	}

	public function ask(){
		if (!UserController::isLogin()){
			redirect(U('/Manage/User/'));
		}
		// var_dump(I('get.'));
		$note = M('Contents');
		$order = M('Orders');
		$orderID = I('get.id','0','intval');

		//表头信息查找
        $header = $order -> where("id = ".$orderID) -> field("code,uid,addtime,synthesis,num,sale_money") -> find();
        // var_dump($header);
        $this -> assign("header",$header);
        $this -> assign("orderID",$orderID);

		//对当前的状态进行修改
		$content_info['status'] = 2;
		$note ->where('id_order = '.$orderID)->data($content_info)->save();

		$id_user = $order -> where("id = ".$orderID)->getField("uid");

		$this -> assign('orderid',$orderID);
		$this -> assign('id_user',$id_user);

		$notes = $note -> where("id_order = ".$orderID)->field('content,addtime,flag')->order("addtime ASC")->select();
		$this -> assign("notes",$notes);
		$this -> display();

	}
	//上传文件
	public function shangchuan(){
		if (!UserController::isLogin()){
			redirect(U('/Manager/User/'));
		}
		if ($_FILES){
               $upload = new \Think\Upload();// 实例化上传类
               $upload->maxSize = 3145728000 ;// 设置附件上传大小
               $upload->exts = array('rar','zip');// 设置附件上传类型
               $upload->rootPath  = './Uploads/'; // 设置附件上传根目录
               $upload->savePath  =  'jia/'; // 设置附件上传（子）目录
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

		}

		$order = M('Orders');
		$orderData = array(
				 'id' => intval(I('get.id')),
				'jia' => $url
				 );
		$order -> data($orderData) -> save();
		$this->success('文件(夹)上传成功！');
	}
	public function liuyan(){
		if (!UserController::isLogin()){
			redirect(U('/Manage/User/'));
		}
		// var_dump(I("get."));
		$note = M('Contents');
		$id_order = I('get.id_order','0','intval');
		$id_user = I('get.id_user','0','intval');
		$content = I('get.content','','trim');

		$info['content']=$content;
		$info['id_order']=$id_order;
		$info['id_member']=$id_user;
		$info['addtime']=time();
		$info['flag']=1;
		$info['status']=1;
		$num = $note -> data($info) -> add();
		 $all = "<span style=\"color:red;font-family:微软雅黑;\">系统消息：尊敬的管理员先生/女士，您好！请耐心解答相关专业问题。
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
			redirect(U('/Manage/User/'));
		}
		// var_dump(I("get."));
		$note = M('Contents');
		$id_order = I('get.id_order','0','intval');
		 
		 
		 $all = "<span style=\"color:red;font-family:微软雅黑;\">系统消息：尊敬的管理员先生/女士，您好！请耐心解答相关专业问题。
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
	/* public function save(){
		if (!UserController::isLogin()){
			redirect(U('/Home/User/'));
		}
		$sequencingNum = I('post.num','1','int');
		
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
			for($i=1;$i<=$sequencingNum;$i++){
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
		$this->display('Index/info');
	}
	
	public function search(){
		$fromDate = I('post.FromDate','');
		$toDate = I('post.ToDate','');
		$ordertype1 = I('post.chkOrderType1','');
		$ordertype2 = I('post.chkOrderType3','');
		$samplename = I('post.txtSampleName','');
		$ordercode = I('post.txtOrderId','');
		$primerName = I('post.txtPrimerName','');
		$page = I('post.p',1,'int');
		$pageNum = 5;
		$where = '';
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
		
		if ($ordertype1 != '' && $ordertype2 != ''){
			$where['ordertype'] = array('IN','1,2');
		}
		
		if ($ordercode != ''){
			$where['code'] = array( 'Like','%'.$ordercode.'%');
		} 
		
		$order = M('Orders');
		$list = $order->where( $where )->page($page)->limit($pageNum)->select();
		$this->assign('list',$list);
		
		# 参数
		$this->assign('fromDate',$fromDate);
		$this->assign('toDate',$toDate);
		$this->assign('ordertype1',$ordertype1);
		$this->assign('ordertype2',$ordertype2);
		$this->assign('samplename',$samplename);
		$this->assign('ordercode',$ordercode);
		$this->assign('primerName',$primerName);
		$this->assign('page',$page);
		$this->assign('pageNum',$pageNum);
		
		$this->display('Index/search');
	} */
	
}