<?php
namespace Manage\Controller;
use Think\Controller;
header("content-type:text/html;charset=utf-8");
date_default_timezone_set('PRC');
class SafeController extends  CommonController{
	//修改密码
    public function index(){
     if (!UserController::isLogin()){
			redirect(U('/Manage/User/'));
		}

		$uid = session('admin-uid');//用户UI的
		$uid = intval($uid);
		$usermodel = M('Tp_user');
		$arr = $usermodel -> where('id ='.$uid) -> find();
        $this -> assign('arr',$arr);
        // var_dump($arr);
		$this -> display();
    }

    //对密码的处理
    public function passwordHandle(){
    	 if (!UserController::isLogin()){
			redirect(U('/Manage/User/'));
		}
		$userModel = M('Tp_user');
		$uId = I('post.uId',0,'intval');
		$password = I('post.password','','trim');
		$rePassword = I('post.rePassword','','trim');
		if($password == '' || $rePassword == '' || $password != $rePassword){
        echo "<script>alert('密码有误，请检查！');</script>";
        echo "<script>window.history.back();</script>";
        exit;
		}

		 // var_dump($_POST);
		$password = md5($password);
		$data = array(
            'id' => $uId,
            'password' => $password
			);
		$mod_id = $userModel -> data($data) -> save();
		if($mod_id){
	    session('admin-uid','');
		session('admin-name','');
		session(null); //// 清空当前的session		
        $this -> success('该用户密码修改成功！',U('User/index',array('flag'=>'123')));
		}else{
        $this -> success('该用户密码修改失败！');
		}



    }

    //安全退出
    public function safe_out(){
      if (!UserController::isLogin()){
			redirect(U('/Manage/User/'));
		}
		
		 
		session('admin-uid','');
		session('admin-name','');
		session(null); //// 清空当前的session
		redirect(U('/Manage/User/index',array('flag'=>'123')));	
	 
    }
}