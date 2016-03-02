<?php
namespace Manage\Controller;
use Think\Controller;
header("content-type:text/html;charset=utf-8");
date_default_timezone_set('PRC');
// date_default_timezone_set('Asia/Shanghai');

class CustomerController extends CommonController{
    
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

               $this -> assign('customer',$customer);
            }

            //对地区的处理
    if(IS_POST){
    if($province != '0'){
       $province = intval($province);
      $map['province'] = $province;

      $this -> assign('province',$province);
    }
     if(isset($_POST['city']) && $_POST['city'] != "0"){
      $city = intval($_POST['city']);
      $map['city'] = $city;

      $this -> assign('city',$city);
		  }	
		}

          if($phone != ''){
			 	$map['phone'] = array('Like','%'.$phone.'%');
           $this -> assign('phone',$phone);
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
	$num = M('MembersInfo')->where('id = '.$id)->data($info)->save();
    if($num){
	$this->success("客户信息修改成功！",U('User/searchlist'));
   }else{
   	$this -> error("客户信息修改失败！");
   }

   	}else{
	  	redirect(U('/Manage/User/'));
	  }
   }

   public function del(){
   		if(UserController::isLogin()){

   			$id = I('get.id',0,'intval');
        $uid = I('get.uid',0,'intval');
        // var_dump(I('get.'));
        // exit;
   			$members = M('MembersInfo');
   			$mem = M('Members');

       
            $del = $members -> where('id = '.$id) ->delete();
            $del_pre = $mem -> where('id = '.$uid) ->delete();
            if($del > 0 && $del_pre > 0){
             $this -> success("该用户及其信息已删除成功!");
            }else{
              $this -> error("该用户信息删除失败！");
            }


   	 }else{
	  	redirect(U('/Manage/User/'));
	  }
   }

   //对用户的审核
  public function user_is_check(){


    // var_dump($_SESSION);
    // exit;

    $uid = I('get.uid',0,'intval');  //用户id
    $flag = I('get.flag',1,'intval'); //判断用户是否通过审核
    $con = '';
    if($flag == 1){
    $con = '关闭';
    }
    if($flag == 2){
    $con = '开启';
    }
    // echo $uid."  ".$flag;
    $membermodel = M('Members');
    $where = array(
      'id' => $uid,
      'isCheck' => $flag
      );
    //执行修改操作
    $mod_id = $membermodel -> data($where) -> save();
    if($mod_id > 0){
     echo "已审核 ! 当前状态：".$con;
    }else{
     echo "未修改审核状态！";
    }

  }
}