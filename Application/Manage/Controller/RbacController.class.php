<?php
namespace Manage\Controller;
use Think\Controller;
header("content-type:text/html;charset=utf-8");
date_default_timezone_set('PRC');
class RbacController extends CommonController{
    	 
	// 添加角色
	public function addRole(){
    if (!UserController::isLogin()){
      redirect(U('/Manage/User/'));
    }
     // echo "test2___access77";
		$this -> display();
	}
	//对添加角色表单的处理
	public function addRoleHandle(){
    if (!UserController::isLogin()){
      redirect(U('/Manage/User/'));
    }

	if($_POST){
			// echo "test";
		$rolemodel = M('Tp_role');
		// var_dump($rolemodel);	
		$name = I('post.name','','trim');
		$remark = I('post.remark','','trim');
		$status = I('post.status',0,'intval');
		$pid = I('post.pid',0,'intval');
        $data = array(
           'name' => $name,
           'status' => $status,
           'remark' => $remark,
           'pid' => $pid
        	);
		$add = $rolemodel -> data($data) -> add();
		if($add > 0){
         $this -> success('角色添加成功吧！');
		}else{
         $this -> error('角色添加失败');
		}

	  }

	}

	//角色管理列表
	public function roleList(){
    if (!UserController::isLogin()){
      redirect(U('/Manage/User/'));
    }
		$rolemodel = M('Tp_role');
		$roleList = $rolemodel -> select();
		$this -> assign('roleList',$roleList);
		$this -> display();
	}

	//添加权限(节点)
	public function addNode(){
    if (!UserController::isLogin()){
      redirect(U('/Manage/User/'));
    }
     // echo "test3";
		$nodemodel = M('tp_node');
		$nodeList = $nodemodel -> where('level != 3') -> order('sort') -> select();
		$this -> assign('nodeList',$nodeList);

		// dump($nodeList);
		// exit;
		$this -> display();
	}
	//对添加权限表单的处理 (节点)
	public function addNodeHandle(){
    if (!UserController::isLogin()){
      redirect(U('/Manage/User/'));
    }
       if($_POST){
         $name = I('post.name','','trim');
         $title = I('post.title','','trim');
         $status = I('post.status',0,'intval');         
         $level = I('post.level',0,'intval');
         $pid = I('post.pid',0,'intval');
         $sort = I('post.sort',0,'intval');

         $show = I('post.show',0,'intval'); //该项是否显示

         $nodemodel = M('tp_node');
         $data = array(
            'name' => $name,
            'title' => $title,
            'status' => $status,            
            'level' => $level,
            'pid' => $pid,
            'sort' => $sort,
            'show' => $show
         	);
        $add = $nodemodel -> data($data) -> add();
        if($add > 0){
         $this -> success('添加成功',U('Rbac/nodeList'));
        }else{
         $this -> error('添加失败');
        }
       }
	}
	//（节点）权限管理列表
	public function nodeList(){
    if (!UserController::isLogin()){
      redirect(U('/Manage/User/'));
    }
		$trees=new \Org\Util\Trees();

		// var_dump($trees);
     
	 $nodemodel = M('tp_node');

	 // import('Org.Util.Trees');//引用
	 // $trees = new \Org\Util\Trees(); 

	  $nodeList = $nodemodel -> order('sort') -> select();

      $nodeList=$trees::Create($nodeList);
      // var_dump($cate);
	  // $nodeList = Trees::Create($nodeList);

	 $this -> assign('nodeList',$nodeList);
     $this -> display();    
	}
	//删除单个权限
	public function delNode(){
    if (!UserController::isLogin()){
      redirect(U('/Manage/User/'));
    }

	  $nodemodel = M('tp_node');	
      $id = I('get.id',0,'intval');

      $del = $nodemodel -> where('id ='.$id) -> delete();
      if($del > 0){
         $this -> success('删除成功！',U('Rbac/nodeList'));        
      }else{
        $this -> error('删除失败！');
      }
      
	}

	//添加用户

	 public function addUser(){
    if (!UserController::isLogin()){
      redirect(U('/Manage/User/'));
    }

	 	$rolemodel = M('Tp_role');
    // dump($_SESSION);
	 	$roleList = $rolemodel -> select();
	 	$this -> assign('roleList',$roleList);
	 	$this -> display();
	 }

   //判断新用户是否存在
   public function userCheck(){
    if (!UserController::isLogin()){
      redirect(U('/Manage/User/'));
    }

    $userModel = M('Tp_user'); //后台登陆
    $membermodel = M('Members'); //前台登陆

    $username = I('get.username','','trim');
    $where = array(
      'username' => $username
      );

    $arr = $userModel -> where($where) -> select();

    $arr_a = $membermodel -> where($where) -> select();
    // echo $username."aaa";
    // var_dump($arr);
    if($arr == null && $arr_a == null){
    echo "abc";
    }else{
    echo "xyz";
    }

   }

	 //对用户表单的处理
	 public function addUserHandle(){
    if (!UserController::isLogin()){
      redirect(U('/Manage/User/'));
    }

	 	if($_POST){
           $username = I('post.username','','trim');
           $password = I('post.password','','trim');
           $role_id = I('post.role_id',0,'intval');//所属用户组

           $data = array(
            'username' => $username,
            'password' => md5($password),
            'logintime' => time(),
            'loginip' => get_client_ip(),
            'status' => 1
            );

           $usermodel = M('Tp_user');
           $add = $usermodel -> data($data) -> add();
           // var_dump($usermodel);
           if($add > 0){
           //用户添加后添加用户角色表内容
           $role['role_id'] = $role_id;
           $role['user_id'] = $add;
           $role_user = M('Tp_role_user');
           $uadd = $role_user -> data($role) -> add();

           $this -> success('用户添加成功！',U('Rbac/addUser'));
           }else{
           $this -> error('用户添加失败！');
           }
	 	}
	 }

	 //用户管理列表

	 public function userList(){
    if (!UserController::isLogin()){
      redirect(U('/Manage/User/'));
    }

      $page = I('post.page',1,'int');
      $pageNum = 10;
      // $this -> assign('page',$page);
      $username_se = I('post.username_se','','trim');

      if($username_se != ''){
        // $map['username'] = $username_se; 
        $map['username'] = array('Like','%'.$username_se.'%');
      }
      
      $group_se = I('post.group_se',0,'intval');

      if($group_se != 0){
      $map['TpRole'][0]['id'] = $group_se;        
      }
      // var_dump(I('post.'));

	 	 $usermodel = D('Tp_user');

     $roleModel = M('Tp_role');

     //对查询条件判断
     // var_dump($group_se,$map);

     $roleArr = $roleModel -> select();

     $this -> assign('roleList',$roleArr);
	 	 // var_dump($usermodel);
	 	 // exit;
      $userList = $usermodel->relation(true)->where($map)->order('id desc')->page($page)->limit($pageNum)->select();
       // dump($userList);
      $countNum = $usermodel->where($map)->count();
      $pages = ceil($countNum / $pageNum);
         // exit;
      $this -> assign('userList',$userList);
      $this->assign('username_se',$username_se);
       $this->assign('group_se',$group_se);
      $this->assign('countNum',$countNum);
      $this->assign('pages',$pages);     
      $this->assign('page',$page);
	 	 $this -> display();
	 }

   //删除用户信息
   public function delUser(){
     if (!UserController::isLogin()){
      redirect(U('/Manage/User/'));
    }
    $id = I('get.id',0,'intval');
     $usermodel = M('Tp_user');
     $del_id = $usermodel -> where('id ='.$id) -> delete();
     if($del_id > 0){
     $this -> success('该用户信息删除成功！');
     }else{
      $this -> error('该用户信息删除失败！');
     }
    // var_dump(I('get.'));
   }

	 //权限配置
	 public function access(){
    if (!UserController::isLogin()){
      redirect(U('/Manage/User/'));
    }

	 	$trees=new \Org\Util\Trees();

	 	$rid = I('get.rid',0,'intval');
	 	$this -> assign('rid',$rid);
	 	// echo $rid;
	 	$nodemodel = M('Tp_node');
	 	$roelmodel = M('Tp_role');
	 	$accessmodel = M('Tp_access');
	 	$name = $roelmodel -> where('id ='.$rid) -> getField('name'); //角色名称
        
        $nodeList = $nodemodel -> order('sort') -> select();
        $nodeList=$trees::Create($nodeList);

        $data = array();//存放最新的数组，里面包含当前用户组是否包含权限
        foreach($nodeList as $value){
         $count = $accessmodel -> where('role_id ='.$rid.' and node_id='.$value['id'])-> count();
         if($count){
           $value['access'] = 1;
         }else{
           $value['access'] = 0;
         }
         $data[] = $value;
        }
        $nodeList = $data;
        // dump($nodeList);
        $this -> assign('nodeList',$nodeList);

	 	$this -> assign('name',$name);
	 	$this -> display();
	 }

	 //权限配置处理
	 public function accessHandle(){

    if (!UserController::isLogin()){
      redirect(U('/Manage/User/'));
    }
	 	// var_dump($_POST);
	 	if($_POST){
	 		$rid = I('post.rid',0,'intval');
	 		$accessmodel = M('Tp_access');
	 		// var_dump($accessmodel);
	 		//清空当前的所有权限
            $delete_id = $accessmodel -> where('role_id ='.$rid) -> delete();
            if(isset($_POST['access'])){
             // dump($_POST['access']);
            	$data = array();
            	foreach($_POST['access'] as $value){
                  $tmp = explode('_',$value);
                  $data[] = array(
                     'role_id' => $rid,
                     'node_id' => $tmp[0],
                     'level' => $tmp[1]
                  	);
            	}
            	if($accessmodel -> addAll($data)){
                  $this -> success('修改成功！',U('Rbac/addRole'));
            	}else{
            	$this -> error("修改失败！");
            	  
            	}
            }else{
            	$this -> error("修改失败！");
            }

	 	}

	 }
		 
	 



}