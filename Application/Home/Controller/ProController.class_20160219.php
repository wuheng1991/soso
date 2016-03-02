<?php
namespace Home\Controller;
use Think\Controller;
header("content-type:text/html;charset=utf-8");
date_default_timezone_set('PRC');
class ProController extends Controller {
    
	//分子生物学服务
	public function fen(){
     $this -> display('Pro/fen_list');
	}
    //more
	public function fen_more(){
	if (!UserController::isLogin()){
		redirect(U('/Home/User/'));
	}

  $fen_type = I('get.type',0,'intval'); //得到项目类型
  $map['fen_type'] = $fen_type;

  
  // var_dump($fen_type);
	// echo "aaa";
	 // echo session('uid');
	 $member_model = M('Members');
	 $member_info = M('Members_info');

	 $fen_model = M('Fen');
	 // var_dump($member_info);
	 // exit;

	  $page = I('post.page',1,'int');
    $pageNum = 10;

    $fen_name = I('post.fen_name','','trim');
    $fen_sale = I('post.fen_sale','','trim');
    $fen_status = I('post.fen_status',0,'intval');

    if($fen_name != ""){
    $map['fen_name'] = array('like',"%".$fen_name."%");
    }

    if($fen_sale != ""){
    $map['fen_sale'] = array('like',"%".$fen_sale."%");
    }

    if($fen_status != 0){
    $map['fen_status'] = $fen_status;
    }

	 $id = session('uid');

	 $user = $member_info -> where('uid ='.$id)->getField('name');
	 $this -> assign('user',$user);

	 $username = $member_model -> where('id ='.$id)->getField('username');
	 $username = trim($username);
	 // echo $username;
	 // $where = array(
  //       'fen_email'=>$username
	 // 	);
	 $map['fen_email'] = $username;

     $fen_arr = $fen_model -> where($map) ->order('addtime desc') -> page($page) -> limit($pageNum)->select();
     // var_dump($fen_arr);

      $countNum = $fen_model -> where($map)->count();
      $pages = ceil($countNum / $pageNum);


     $this -> assign("fen_info",$fen_arr);

      $this -> assign('fen_name',$fen_name);
      $this -> assign('fen_sale',$fen_sale);
      $this -> assign('fen_status',$fen_status);
      

      $this -> assign('countNum',$countNum);
      $this -> assign('pages',$pages);     
      $this -> assign('page',$page);

      $this -> assign('commom_type',$fen_type);

     $this -> display('Pro/fen_more');
    
	}
	//查看单条信息
	public function fen_index(){
	if (!UserController::isLogin()){
		redirect(U('/Home/User/'));
	}

	    $fenmodel = D('Fen');

       $feninfo_model = D('Feninfo');

       $pro_model = M('pro_trace');

        $member_info = M('Members_info');

	     $id = I('get.id',0,'intval');
       $commom_type = I('get.commom_type',0,'intval');
       $this -> assign('commom_type',$commom_type);
        $flag = I('get.flag','flag_aa','trim');

      $id_user = session('uid');

	 $user = $member_info -> where('uid ='.$id_user)->getField('name');
	 $this -> assign('user',$user);
        
        $this -> assign('id',$id);
        $this -> assign('flag',$flag);
        // var_dump($fen_pro);
        // exit;
	      $fen_info = $fenmodel -> where('id = '.$id) ->order('id desc') -> find();
        // var_dump($fen_info);

        //通过$id 查找 是否存在表ge_feninfo信息 
         $fen_arr = $feninfo_model -> where('fen_guan_id = '.$id) ->order('id desc') -> find();
         // var_dump($fen_arr);
         if($fen_arr != null){

           $pro_id = intval($fen_arr['id']);

         $this -> assign('trace_pro_id',$pro_id);
        //通过$pro_id 查找 是否存在表ge_pro_trace信息 
         //得到项目进度的个数值
          $pro_arr_aa = $pro_model -> distinct(true)-> where('guan_id = '.$pro_id) ->order('id asc')->field('status')->select();
          $num = count($pro_arr_aa);
     
        
          //得到最新进度的信息
          $pro_arr = $pro_model -> where('guan_id = '.$pro_id) ->order('id asc')->select();

         
          $pro_arr_a= $pro_model -> distinct(true)-> where('guan_id = '.$pro_id) ->order('id asc')->limit($num)->field('guan_id,status')->select();
          
          $array = array();
          foreach($pro_arr_a as $row){
           $array[][] = $row['guan_id'].",".$row['status'];
          }
           
          if($pro_arr != null){
          
          if($num==1){
            $pro_arr_a = '';
          }
          // var_dump($array);
          // var_dump($pro_arr_a);
          $this -> assign('pro_arr',$array);
          // $this -> assign('pro_arr',$pro_arr_a);

          // $this -> assign('','');
          $this -> assign('pang',$end_status);

          $this -> assign('pang_a',$end_status_guan);

           
          }
        
         $this -> assign('fen_arr',$fen_arr);

           
         }

   
	    $this -> assign("fen_info",$fen_info);
		$this -> display('Pro/fen_index');
	}
	//修改单条信息
	public function fen_mod(){
		$this -> display('Pro/fen_mod');

	}
	//编辑信息
	public function fen_editor(){
		$this -> display('Pro/fen_editor');

	}
	// 蛋白及抗体
	public function dankang(){
     echo "test2";
	}
	//病毒包装及检测服务
	public function virtus(){
     echo "test3";
	}
	//综合服务
	public function service(){
     echo "test4";
	}
	//蛋白组学
	public function danxue(){
     echo "test5";
	}
	//小分子抗原及ElisA开发
	public function elisa(){
     echo "test6";
	}
	 
		 
	 



}