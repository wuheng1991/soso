<?php
namespace Manage\Controller;
use Think\Controller;
header("content-type:text/html;charset=utf-8");
date_default_timezone_set('PRC');
class PrimerController extends CommonController{
    public function index(){
		if (UserController::isLogin()){


			// var_dump($_SESSION);

			 $tprole = M('Tp_role');
			//得到role-id
			$role_id = session('role-id');
			$admin_username = session('admin-username');
			$remark = $tprole -> where('id ='.$role_id) -> getField('remark');
		    if($remark == '3,4,5'){
	        // var_dump($admin_username);
	        $map['sale_name'] = $admin_username;
			}

			$page = I('post.page',1,'int');
			$pageNum = 15;
			// echo "aaa";
			$code = I('post.code','');

			$customer = I('post.customer','','trim');
            $members = M('MembersInfo');
            $where['name']=array('LIKE','%'.$customer.'%');
            $uid_wh =  $members -> where($where) -> field("uid")->select();

			$stime = I('post.stime','');
			$etime = I('post.etime','');
			$map['ordertype'] = 2;

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
				$map['code_yw'] = array('Like','%'.$code.'%');
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
			$map['status']=2;		
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
		} else {
			redirect(U('/Manage/User/'));
		}
    }
	
	public function show(){
		if (!UserController::isLogin()){
			redirect(U('/Manager/User/'));
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
		$orders_primers = M('OrdersPrimers');
		$countNum = $orders_primers->where(' orderid = '.$orderID)->count();
		$list = $orders_primers->where(' orderid = '.$orderID)->select();

		// $basenum = $orders_primers->where(' orderid = '.$orderID)->Sum('basenum');
		// $basenum = trim($basenum);
		// $basenum = str_replace(" ","",$basenum);

		$this->assign('basenum',$orderID);
		$this->assign('list',$list);
		$this->assign('countNum',$countNum);
		# 获取客户信息
		$clientInfo = getClientInfo($orderInfo['uid']);
		$this->assign('client',$clientInfo);
		$this->assign('list',$list);
		$this->assign('countNum',$countNum);
		$this->assign('id',$orderID);
		$this->display();
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
			$orderInfo = $order->where(' id = '.$id.' and status =1')->find();
			if ($orderInfo){
				$data = array(
					'id' => $orderInfo['id'],
					'status' => 2
				);
				if ($order->data($data)->save()){
					$this->success('确认订单成功！',U('Primer/show','id='.$id));
				} else $this->error('确认订单错误！');
			} else $this->error('订单信息错误！');
		} else $this->error('参数错误！');
	}
	
	# 更新订单状态
	public function update(){

		if (!UserController::isLogin()){
			redirect(U('/Manager/User/'));
		}

		// var_dump(I("post."));
		// exit;
		// 对三中状态分别判断
		#status = 1,2,3
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


		// $num = I('post.express','','/^\d+$/');
		// $s = I('post.status','','/^\d+$/');
		// $orderid = I('post.orderid','','int');
		// $flag = true;
		// if ($s > 0){
		// 	if ($s == 3 && $num == ''){
		// 		$this->error('订单号错误！');
		// 	}
		// 	if($orderid == ''){
		// 		$this->error('参数错误！');
		// 	}
		// 	$order = M('Orders');
		// 	$orderData = array(
		// 		'synthesis' => $s,
		// 		'id' => $orderid
		// 	);
		// 	if ($order->data($orderData)->save() && $s == 3){
		// 		$resultData = array(
		// 			'orderid' => $orderid,
		// 			'num' => $num,
		// 			'addtime' => time(),
		// 			'uid' => session('admin-uid')
		// 		);
		// 		if (M('PrimerResults')->data($resultData)->add()){
		// 			$flag = true;
		// 		} else {
		// 			$flag = false;
		// 		}
		// 	} else {
		// 		$flag = false;
		// 	}
		// 	$this->success('更新订单状态成功！',U('Primer/show','id='.$orderid));
		// } else {
		// 	$this->error('参数错误！');
		// }
	}
	//留言消息
	public function ask(){
		if (!UserController::isLogin()){
			redirect(U('/Manager/User/'));
		}
		$note = M('Contents');
		$order = M('Orders');
		$orderID = I('get.id','0','intval');
        // var_dump($orderID);
        //表头信息查找
        $header = $order -> where("id = ".$orderID) -> field("code,code_yw,uid,addtime,synthesis,num,sale_money") -> find();
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

	//相关文件上传
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
    // echo "aaa";
		// echo "aaa";
		// var_dump(I("get."));
		// var_dump(I("post."));
		// var_dump($_FILES);
	}

	public function liuyan(){
		if (!UserController::isLogin()){
			redirect(U('/Manager/User/'));
		}
		$note = M('Contents');
		$id_order = I('get.id_order','0','intval');
		$id_user = I('get.id_user','0','intval');
		$content = I('get.content','','trim');

		$info['content']=$content;
		$info['id_order']=$id_order;
		$info['id_member']=$id_user;
		$info['addtime']=time();
		$info['flag']=1;
		$info['status'] = 1;
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
    
    //留言（公共）
	public function liuyan_all(){
		if (!UserController::isLogin()){
			redirect(U('/Manager/User/'));
		}
		$note = M('Contents');
		$id_order = I('get.id_order','0','intval');
		 
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
		 
			 echo $all;
		 

	}



}