<?php
namespace Manage\Controller;
use Think\Controller;
header("content-type:text/html;charset=utf-8");
date_default_timezone_set('PRC');
// date_default_timezone_set('Asia/Shanghai');

class UserController extends Controller{
    public function index(){
    	$flag = I('get.flag','','trim');
    	$this -> assign('flag',$flag);
		$this->display('Public/login');
    }
	
	public function isLogin(){
		if (session('admin-uid') != ''){
			# 检测是否为真实用户
			// $User = M('Admins');
			$User = M('Tp_user');

			$data = $User->where(" id = '".session('admin-uid')."' ")->find();
			if ($data){
				return true;
			} else return false;
		} else return false;
	}
	# 用户登录
	public function login(){
		if (IS_POST){
			$code = I('post.checkCode');
			$verify = new \Think\Verify();
			if (!$verify->check($code)){
				$this->error('验证码错误');
			}
			
			$username = I('post.username');
			// $User = M('admins');
			$User = D('Tp_user'); 

			$data = $User->relation(true)->where("username = '".$username."' ")->find();
			  // var_dump($data);
			  // var_dump($_POST);
			
			if($data && $data['password'] == md5(I('post.password','','trim'))){
				// echo "aaaaaaa";
               // exit;
				session('admin-uid',$data['id']);
				session('admin-username',$data['username']);//英文名称
				
                session('role-id',$data['TpRole'][0]['id']); //获取角色id

				session('admin-name',$data['TpRole'][0]['name']." : ".$data['username']); //中文名称
				// session('admin-name',$data['name']);
				session(C('USER_AUTH_KEY'),$data['id']);

				if($_SESSION['admin-username']==C('RBAC_SUPERADMIN')){
                 session(C('ADMIN_AUTH_KEY'),true);
				}
				//RBAC 引用
				$rbac=new \Org\Util\Rbac();
				$saveAccessList = $rbac::saveAccessList();
				// var_dump($saveAccessList);
				// exit;
                // var_dump($_SESSION);

				$udata = array('logintime'=>time(),'loginip'=>get_client_ip());
				$User->where("id = ".$data['id'])->save($udata);
				
				$this->success('登录成功！',U('/Manage/'));
			}else{
				$this -> error('用户名或者密码错误！');
			}
		} else {
			$this->error('非法请求');
		}
	}
	
	public function logout(){
		session('admin-uid','');
		session('admin-name','');
		session(null); //// 清空当前的session
		redirect(U('/Manage/User/'));
	}
	
	
	public function verify(){
		ob_clean();
		$verify = new \Think\Verify();
		$verify->__set('imageW',150);
		$verify->__set('imageH',40);
		$verify->__set('fontSize',15);
		$verify->__set('useCurve',false);
		$verify->__set('useNoise',false);
		
		$verify->entry();
	}

	public function searchlist(){
		if (UserController::isLogin()){

		 //地区
        $area = M('Area');
        $proList = $area->where(' reid = 0')->select();
	    $this->assign('proList',$proList);	
     
		 $page = I('post.page',1,'int');
		 $pageNum = 12;
		 
         $phone = I('post.phone','');
          // var_dump(I("post."));
         // echo "aaa";

          //得到省，市
         $province = I("post.province","",'intval');
         // echo $province;
         
         // else{
         // 	echo "yyy";
         // }
        // var_dump(I('post.'));

        // if($province != ''){
        // 	if(isset($_POST['city'])){
        //  	$city = intval($_POST['city']);
        //  	// echo "xxx";
        //  }else{

        //  }
        // }

         // exit;
        
		 
         $customer = I('post.customer','','trim');
         $members = M('MembersInfo');
         $where['name']=array('LIKE','%'.$customer.'%');
         $uid_wh = $members -> where($where) -> field("uid")->select();
            
         $stime = I('post.stime','');
		 $etime = I('post.etime','');

		  if($customer != ''){
            	 
            	foreach($uid_wh as $row){
                 $uid_all .= $row['uid'].","; 
            	}
            	$person = mb_substr($uid_all,0,mb_strlen($uid_all)-1);
            	$map['uid']=array("in","{$person}");
            }

            //对地区的处理
            if(IS_POST){
            if($province != '0'){
               $province = intval($province);
              $map['province'] = $province;
            }
           if(isset($_POST['city']) && $_POST['city'] != "0"){
            $city = intval($_POST['city']);
            $map['city'] = $city;
		  }	
		}

          if($phone != ''){
				$map['phone'] = array('Like','%'.$phone.'%');
				// echo $map['code'];
				// exit;
			}
		  
		   
		   if($stime != '' && $etime != ''){
				$starttime = $stime.' 00:00:00';
				$endtime = $etime.' 23:59:59';
				$map['addtime'] = array(array('gt',strtotime($starttime)),array('lt',strtotime($endtime)));
			}
			
			if($stime != '' && $etime == ''){
				$starttime = $stime.' 00:00:00';
				$map['addtime'] = array('gt',strtotime($starttime));
			}
			if($etime != '' && $stime == ''){
				$endtime = $etime.' 23:59:59';
				$map['addtime'] = array('lt',strtotime($endtime));
			}			  

		 // $members = M('MembersInfo');
		 $userlist = $members->where($map)->order('id desc')->page($page)->limit($pageNum)->select();
		 $countNum = $members->count();
		 $pages = ceil($countNum / $pageNum);
		 $this->assign('countNum',$countNum);

		 $this->assign('pages',$pages);
		 // $this->assign('stime',$stime);
		 // $this->assign('etime',$etime);
		 $this->assign('page',$page);
		 $this -> assign("userlist",$userlist);
		 // var_dump($members);
		$this -> display();
	  }else{
	  	redirect(U('/Manage/User/'));
	  }
   }
   //得到city
   public function getcity(){
		$id = I('post.id','','int');
		$html = '';
		if ($id > 0){
			$area = M('Area');
			$cityList = $area->where(' reid = '.$id)->select();
			$html = "<option value='0'>选择城市</option>";
			foreach($cityList as $k=>$v){
				$html .= "<option value=\"".$v['id']."\">".$v['name']."</option>";
			}
		}
		echo $html;
	}
   public function show_kan(){
   	if(UserController::isLogin()){
      $id = I('get.id','0','intval');
      $members = M('MembersInfo');
      $xiang = $members -> where('id = '.$id) ->find();
      $this -> assign("client",$xiang);
      $this -> display();
   	 }else{
	  	redirect(U('/Manage/User/'));
	  }
   	// var_dump(I('get.'));
   }
   public function change(){
   		if(UserController::isLogin()){
   	  $id = I('get.id','0','intval');
      $members = M('MembersInfo');
      $xiang = $members -> where('id = '.$id) ->find();
      $this -> assign("client",$xiang);
      $this -> display();  


   	 }else{
	  	redirect(U('/Manage/User/'));
	  }
   }

   public function updates(){
   	if(UserController::isLogin()){
    // var_dump(I('post.'));

    $id = I('post.key','0','intval');
    $info['phone'] = I('post.phone','','trim');
	$info['name']= I('post.uname','','trim');
	$info['company']= I('post.company','','trim');
	$info['address']= I('post.address','','trim');
	$info['subject']= I('post.subject','','trim');
	$info['dutyer']= I('post.dutyer','','trim');
	$info['piao']= I('post.piao','','trim');
	$info['tempaddress']= I('post.tempaddress','','trim');
	$info['addtime'] = time();
	$info['note'] = I('post.note','','trim');
	$info['sale_name'] = I('post.sale_name','','trim');
	$num = M('MembersInfo')->where('id = '.$id)->data($info)->save();
    if($num){
	$this->success("客户信息修改成功！",U('Customer/searchlist'));
   }else{
   	$this -> error("客户信息修改失败！");
   }

   	}else{
	  	redirect(U('/Manage/User/'));
	  }
   }
   public function del(){
   		if(UserController::isLogin()){
   			$id = I('get.id','0','intval');
   			$members = M('MembersInfo');
   			$mem = M('Members');
            $del = $members -> where('id = '.$id) ->delete();
            $del_pre = $mem -> where('id = '.$id) ->delete();
            if($del > 0 && $del_pre > 0){
             $this -> success("该用户及其信息已删除成功!");
            }else{
              $this -> error("该用户信息删除失败！");
            }


   	 }else{
	  	redirect(U('/Manage/User/'));
	  }
   }
}