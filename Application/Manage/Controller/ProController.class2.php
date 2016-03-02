<?php
namespace Manage\Controller;
use Think\Controller;
header("content-type:text/html;charset=utf-8");
date_default_timezone_set('PRC');
class ProController extends Controller {
    
	//分子生物学服务
	public function fen(){
	if (!UserController::isLogin()){
		redirect(U('/Manager/User/'));
	}
	$fenmodel = M('Fen');
	$fen_info = $fenmodel -> order('addtime desc') -> limit(3)-> select();

	$this -> assign('fen_info',$fen_info);
	// var_dump($fen_info);
     $this -> display('Pro/fen_list');
	}
    
    //添加信息
	public function fen_add(){
	if (!UserController::isLogin()){
		redirect(U('/Manager/User/'));
	}

	$feninfo = D('Fen');

	if($_POST){
     $fen_position = I('post.fen_position',0,'intval');
     if($fen_position == 0){
     	$this->error($feninfo->getError());
     }

     $fen_name = I('post.fen_name','','trim');
     if($fen_name == ''){
     	$this->error($feninfo->getError());
     }

     $fen_sale = I('post.fen_sale','','trim');
     if($fen_sale == ''){
     	$this->error($feninfo->getError());
     }

     $fen_he = I('post.fen_he','','trim');
     if($fen_he == ''){
     	$this->error($feninfo->getError());  
     }

     $fen_customer = I('post.fen_customer','','trim');
     if($fen_customer == ''){
     	$this->error($feninfo->getError());  
     }

     $fen_contact = I('post.fen_contact','','trim');
     if($fen_contact == ''){
     	$this->error($feninfo->getError());

     }

     $fen_date = I('post.fen_date','','trim');
     if($fen_date == ''){
     	$this->error($feninfo->getError());
     }

    $fen_date_xian = I('post.fen_date_xian','','trim');
     if($fen_date_xian == ''){
      $this->error($feninfo->getError());
     }



     $fen_pro = I('post.fen_pro','','trim');
     if($fen_pro == ''){
     	$this->error($feninfo->getError());
     }

     $fen_status = I('post.fen_status',0,'intval');
     if($fen_status == 0){
     	$this->error($feninfo->getError());
     }

     $fen_xi = I('post.fen_xi','','trim');
     if($fen_xi == ''){
     	$this->error($feninfo->getError());
     }

     $data = array(
         'fen_position' => $fen_position,
         'fen_name' => $fen_name,
         'fen_sale' => $fen_sale,
         'fen_he' => $fen_he,
         'fen_customer' => $fen_customer,
         'fen_contact' => $fen_contact,
         'fen_date' => $fen_date,
         'fen_date_xian'=>$fen_date_xian,
         'fen_pro' => $fen_pro,
         'fen_status' => $fen_status,
         'fen_xi' => $fen_xi,
         'addtime' => time()

     	);

     $fen_id = $feninfo -> data($data) -> add();

     if($fen_id > 0){
       // echo "";
      $this -> success("改项目跟踪基本信息添加成功!",U('Pro/fen'));	
     }else{
      $this -> error("改项目跟踪基本信息添加失败！");
     }

	} 
	 
	 
	}

	//基本信息的修改
	public function fen_mod_ji(){
	if (!UserController::isLogin()){
		redirect(U('/Manager/User/'));
	}

	$feninfo = D('Fen');
    // var_dump("expression");
    // exit;

	if($_POST){

	 $id = I('post.hid_id',0,'intval');
	 	
     $fen_position = I('post.fen_position',0,'intval');
     $fen_name = I('post.fen_name','','trim');
     $fen_sale = I('post.fen_sale','','trim');
     $fen_he = I('post.fen_he','','trim');
     $fen_customer = I('post.fen_customer','','trim');
     $fen_contact = I('post.fen_contact','','trim');
     $fen_date = I('post.fen_date','','trim');
     $fen_pro = I('post.fen_pro','','trim');
     $fen_status = I('post.fen_status',0,'intval');
     $fen_xi = I('post.fen_xi','','trim');

    if($fen_position == 0 || $fen_name == '' || $fen_sale == '' || $fen_he == '' || $fen_customer == '' || $fen_contact == '' || $fen_pro == '' || $fen_status == 0 || $fen_xi == '' || $fen_date == ''){

     	$this->error($feninfo->getError());  	
     }

      $data = array(
         'fen_position' => $fen_position,
         'fen_name' => $fen_name,
         'fen_sale' => $fen_sale,
         'fen_he' => $fen_he,
         'fen_customer' => $fen_customer,
         'fen_contact' => $fen_contact,
         'fen_date' => $fen_date,
         'fen_pro' => $fen_pro,
         'fen_status' => $fen_status,
         'fen_xi' => $fen_xi,
         'addtime' => time()

     	);

      // var_dump($data);
      // exit;

      $fen_id = $feninfo -> where('id = '.$id) -> data($data) -> save();
      if($fen_id > 0){
      $this -> success("改项目跟踪基本信息修改成功!",U('Pro/fen_editor',array('id' => $id)));	
        
      }else{
      $this -> success("改项目跟踪基本信息修改失败!",U('Pro/fen_editor',array('id' => $id)));	
      
      }

	  } 

	}

	//项目跟踪具体信息

	public function fen_trace_editor(){
	 if (!UserController::isLogin()){
		redirect(U('/Manager/User/'));
	}

    $fen_info = D('Feninfo');
    $pro_trace = M('pro_trace');
    // var_dump($fen_info);
    // var_dump(I('post.'));
    //  var_dump($_FILES);
    //  exit;
    $fen_guan_id = I('post.fen_guan_id',0,'intval');  // fen 与feninfo关联的id

    $trace_hid_id = I('post.trace_hid_id',0,'intval');
    //查找是否存在该信息
    $fen_guan_arr = $fen_info -> where('fen_guan_id = '.$fen_guan_id) -> order('id desc') -> find();


    $trace_pro_id = I('post.trace_pro_id',0,'intval');//ge_pro_trace的 guan_id
    $hide_status = I('post.hide_status',0,'intval');//项目进度
    // var_dump($hide_status);
    // exit;

    $fen_pro_man = I('post.fen_pro_man','','trim');
    $fen_pro_js = I('post.fen_pro_js','','trim');
    $fen_pro_sm = I('post.fen_pro_sm','','trim');
    $fen_pro_date = I('post.fen_pro_date','','trim');
    $fen_pro_ys = I('post.fen_pro_ys','','trim');

    if($fen_pro_man == '' || $fen_pro_js == '' || $fen_pro_sm == '' || $fen_pro_date == '' || $fen_pro_ys == ''){
        $this->error($fen_info->getError());     
    }

      $data = array(
         'fen_guan_id' => $fen_guan_id,
         'fen_pro_man' => $fen_pro_man,
         'fen_pro_js' => $fen_pro_js,
         'fen_pro_sm' => $fen_pro_sm,
         'fen_pro_date' => $fen_pro_date,
         'fen_pro_ys' => $fen_pro_ys,        
         'addtime' => time()
        );

     //$fen_guan_arr 为null，，，执行添加（id自增），否则执行修改（id不变）
    if($fen_guan_arr == null){
     $fen_id = $fen_info -> data($data) -> add(); //项目进度内容信息，关联的id
    }else{
      $fen_id = intval($fen_guan_arr['id']);

      $fen_info ->where('id = '.$fen_id) -> data($data) -> save(); 
     
      // var_dump($fen_id);
      // exit;
    }

     // var_dump($fen_id);
     // exit;


     $fen_pro_jd = I('post.fen_pro_jd','','trim');  //项目进度内容

     $fen_pro_jd = str_replace(" ","",$fen_pro_jd);
     $fen_pro_jd = str_replace("\n","",$fen_pro_jd);
     $fen_pro_jd = str_replace("\r","",$fen_pro_jd); 

    //上传的文件信息
     $url = '';
     $nums = 0;

     // var_dump($fen_pro_jd);
     // var_dump($_FILES);
     // exit;
    if ($_FILES['fen_pro_file']['error'][0] != '4'){
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize = 31457280000 ;// 设置附件上传大小
        $upload->exts = array('jpg','jpeg','png','gif','pdf','doc','docx','xls','xlsx','html','xml','rar','zip','txt','htmlx','htm');// 设置附件上传类型
        $upload->rootPath = './Uploads/'; // 设置附件上传根目录
        $upload->savePath = 'wh/'; // 设置附件上传（子）目录
        // 上传文件
        $info = $upload->upload();
        if(!$info) {// 上传错误提示错误信息
            // echo "<script>alert('aaa');</script>";
            $this->error($upload->getError());
        }else{// 上传成功 获取上传文件信息
            // echo '<pre>';
            // print_r($info);
            // exit;
            foreach($info as $file){
                $url = '';
                $url = $file['savepath'].$file['savename'];
                // echo $url;
                $url = $upload->rootPath.$url;
                $url = substr($url,1);
                $data_info = array();
                $data_info = array(
                    'content' => $fen_pro_jd,
                    'file' => $url,
                    'guan_id' => $fen_id,
                    'addtime' => time(),
                    'status' => $hide_status
                    );

                // print_r( $data_info);
                  $num = $pro_trace -> data($data_info) -> add(); //项目进度上传信息 
                  $nums += $num;
                  

                  // echo $url;
                  // echo "<br/>";


            }
        }
            // $url = $upload->rootPath.$url;
	   
	}else{

         // if($fen_guan_arr != null){
         

         // }
          $data_infos = array(
                    'content' => $fen_pro_jd,                   
                    'guan_id' => $fen_id,
                    'addtime' => time(),
                    'status' => $hide_status
                    );
          // var_dump($data_infos);
         // exit;
      $where = array(
        'status'=>$hide_status,
        'guan_id'=>$trace_pro_id
        );
      //查找表：ge_pro_trace 是否存在该条信息，不能存在：添加，否则修改
      $trace_arr = $pro_trace -> where($where) ->order('id desc')->find();
      // var_dump($trace_arr);
      // exit;
      if($trace_arr == null){
        // echo "aaa";
        // exit;
        $pro_trace -> data($data_infos) -> add();

      }else{
        // echo "bbb";
        // exit;
       $pro_trace -> where($where) -> data($data_infos) -> save();

      }
      // $trace_id = intval($trace_arr['id']);
      // $
      // var_dump($trace_id);
      // exit;

      // if($trace_arr == null){
      // $count = $pro_trace -> data($data_infos) -> add();
      
      // }else{
      // $count = $pro_trace ->where('status = '.$hide_status)->data($data_infos) -> save();

      // }

     
      // var_dump($count);
      // exit;
    }

    //读取之前已经编辑好的进度内容开始
    // $row_all = $pro_trace -> where('status')
    //读取之前已经编辑好的进度内容结束
     // exit;
    if($fen_id > 0){
     $this -> success('改项目跟踪内容信息编辑成功！',U('Pro/fen_index',array('id' => $fen_guan_id,'flag'=>'flag')));
    }else{
     $this -> error('改项目跟踪内容信息编辑失败!');
    }

     

   }


	
	//删除信息
	public function fen_del(){
	if (!UserController::isLogin()){
		redirect(U('/Manager/User/'));
	}
	var_dump(I('get.'));	
	}
    //删除缩略图信息
    public function fen_row_del(){
    if (!UserController::isLogin()){
        redirect(U('/Manager/User/'));
    }

    $id = I('get.id',0,'intval');
    $pro_trace = M('pro_trace');
    // var_dump($pro_trace);
    $data = array(
      'file'=>''
      );
    $del_id = $pro_trace -> where('id = '.$id)->data($data) -> save();
    if($del_id > 0){
    echo "该缩略图删除成功！";
    }else{
    echo "该缩略图删除成功！";
    
    }
    


    }

    //增添进度信息
    public function fen_row_add(){
     if (!UserController::isLogin()){
        redirect(U('/Manager/User/'));
    }
    
    $data_id = I('get.id',0,'intval');

    $status_id = I('get.status_id','','trim');//项目进度
    $status_id = intval($status_id) - 1;

    $trace_id = I('get.trace_id',0,'intval');//表ge_pro_trace中的guan_id  

    $pro_trace = M('pro_trace');

    // $hide_status = I('post.hide_status',0,'intval');//项目进度

    
    // 根据$data_id查找guan_id
    $guan_id = $pro_trace -> where('id = '.$data_id) -> getField('guan_id');
    $guan_id = intval($guan_id);

     $data = array(
        'status' => $status_id,
        'guan_id'=>$trace_id
     );

    $haha = $pro_trace -> where($data) ->order('id desc') -> find();
    if($haha == null){

     echo "123";
    exit;
    }

    $guan_arr = $pro_trace -> where($data) ->order('id desc') -> select();
    
    $daye = "<span><h4><center>点击(缩略图,文件)查看详情</center></h5></span>";

    foreach($guan_arr as $row){
      $pro_trace -> where('id ='.intval($row['id'])) -> save($data);
       //得到文件的路径
      $file_path = $row['file'];

      if($file_path != ""){
      //得到后缀
      $arr = explode('.', $file_path);
      $exrt = $arr[1];

      if($exrt == 'jpg'){
      
      $daye .= "<a class=\"fen_row_a\" href='".$file_path."' data_value='".$row['id']."' target=\"_blank\" title=\"点击预览该图\"> <img src='".$file_path."' style=\"display:block;margin:5px;float:left;\" width=60 height=50/> </a>";
      }

      if($exrt == 'jpeg'){
      
      $daye .= "<a class=\"fen_row_a\" href='".$file_path."' data_value='".$row['id']."' target=\"_blank\" title=\"点击预览该图\"> <img src='".$file_path."' style=\"display:block;margin:5px;float:left;\" width=60 height=50/> </a>";
      }

      if($exrt == 'png'){
      
      $daye .= "<a class=\"fen_row_a\" href='".$file_path."' data_value='".$row['id']."' target=\"_blank\" title=\"点击预览该图\"> <img src='".$file_path."' style=\"display:block;margin:5px;float:left;\" width=60 height=50/> </a>";
      }

      if($exrt == 'gif'){
      
      $daye .= "<a class=\"fen_row_a\" href='".$file_path."' data_value='".$row['id']."' target=\"_blank\" title=\"点击预览该图\"> <img src='".$file_path."' style=\"display:block;margin:5px;float:left;\" width=60 height=50/> </a>";
      }

      if($exrt == 'html'){
      $daye .= "<a class=\"fen_row_a\" href='".$file_path."' data_value='".$row['id']."' target=\"_blank\" title=\"点击预览或下载\"> ";
      $daye .="<img src=\"/Public/Picutue/html.png\" style=\"display:block;margin:5px;float:left;\" width=60 height=50/> </a>";
      }

      if($exrt == 'txt'){
      $daye .= "<a class=\"fen_row_a\" href='".$file_path."' data_value='".$row['id']."' target=\"_blank\" title=\"点击预览或下载\"> ";
      $daye .="<img src=\"/Public/Picutue/txt.png\" style=\"display:block;margin:5px;float:left;\" width=60 height=50/> </a>";
      }

       if($exrt == 'doc'){
      $daye .= "<a class=\"fen_row_a\" href='".$file_path."' data_value='".$row['id']."' target=\"_blank\" title=\"点击预览或下载\"> ";
      $daye .="<img src=\"/Public/Picutue/doc.png\" style=\"display:block;margin:5px;float:left;\" width=60 height=50/> </a>";
      }


       if($exrt == 'docx'){
      $daye .= "<a class=\"fen_row_a\" href='".$file_path."' data_value='".$row['id']."' target=\"_blank\" title=\"点击预览或下载\"> ";
      $daye .="<img src=\"/Public/Picutue/docx.png\" style=\"display:block;margin:5px;float:left;\" width=60 height=50/> </a>";
      }

       if($exrt == 'xls'){
      $daye .= "<a class=\"fen_row_a\" href='".$file_path."' data_value='".$row['id']."' target=\"_blank\" title=\"点击预览或下载\"> ";
      $daye .="<img src=\"/Public/Picutue/xls.png\" style=\"display:block;margin:5px;float:left;\" width=60 height=50/> </a>";
      }

      if($exrt == 'xlsx'){
      $daye .= "<a class=\"fen_row_a\" href='".$file_path."' data_value='".$row['id']."' target=\"_blank\" title=\"点击预览或下载\"> ";
      $daye .="<img src=\"/Public/Picutue/xlsx.png\" style=\"display:block;margin:5px;float:left;\" width=60 height=50/> </a>";
      }

       if($exrt == 'pdf'){
      $daye .= "<a class=\"fen_row_a\" href='".$file_path."' data_value='".$row['id']."' target=\"_blank\" title=\"点击预览或下载\"> ";
      $daye .="<img src=\"/Public/Picutue/pdf.png\" style=\"display:block;margin:5px;float:left;\" width=60 height=50/> </a>";
      }

       if($exrt == 'rar'){
      $daye .= "<a class=\"fen_row_a\" href='".$file_path."' data_value='".$row['id']."' target=\"_blank\" title=\"点击预览或下载\"> ";
      $daye .="<img src=\"/Public/Picutue/rar.png\" style=\"display:block;margin:5px;float:left;\" width=60 height=50/> </a>";
      }

       if($exrt == 'zip'){
      $daye .= "<a class=\"fen_row_a\" href='".$file_path."' data_value='".$row['id']."' target=\"_blank\" title=\"点击预览或下载\"> ";
      $daye .="<img src=\"/Public/Picutue/zip.png\" style=\"display:block;margin:5px;float:left;\" width=60 height=50/> </a>";
      }

    }

    }
      
    // $number = $pro_trace -> where('id = '.$data_id) -> save($data);
    // $row_all = $pro_trace -> where('id = '.$data_id) ->order('id desc') -> select();

     $str = "<tr class=\'pro_add\'><td align=\"center\" width=\"140\" class=\"bj-3\"> ";
     $str .="项目进度（第".$status_id."周）";
     $str .="</td><td align=\"left\" width=\"250\" class=\"bj-3\"> ";
     $str .="<textarea style=\"border:0px;\"   cols=\"50\" rows=\"6\" readonly>";
     $str .= $guan_arr[0]['content'];
     $str .= "</textarea>";
     $str .= "</td><td align=\"center\" width=\"150\" class=\"bj-3\">";
     
     $str .= "相关文件信息";
    
     $str .= "</td><td class=\"pro_picture\" style=\"text-align:justify;\" class=\"bj-3\">";
     $str .= "<span>".$daye."</span></td></tr>";   
         // $(".pro_add:last").after(str);
     echo $str;        
     
    }
    //more
	public function fen_more(){
	if (!UserController::isLogin()){
			redirect(U('/Manager/User/'));
		}	
     $this -> display('Pro/fen_more');
    
	}
	//查看单条信息
	public function fen_index(){
	if (!UserController::isLogin()){
			redirect(U('/Manager/User/'));
		}
	     $fenmodel = D('Fen');

       $feninfo_model = D('Feninfo');

       $pro_model = M('pro_trace');

	      $id = I('get.id',0,'intval');
        $flag = I('get.flag','flag_aa','trim');
        
        $this -> assign('id',$id);
        $this -> assign('flag',$flag);
        // var_dump($fen_pro);
        // exit;
	      $fen_info = $fenmodel -> where('id = '.$id) ->order('id desc') -> find();

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
     
          // var_dump($num);
          // var_dump($pro_arr_a);
          // $where = array(
             
          //   );
          //得到最新进度的信息
          $pro_arr = $pro_model -> where('guan_id = '.$pro_id) ->order('id asc')->select();

          // var_dump($pro_arr);
          // $num_a = count($pro_arr);

          // $end_id = $pro_arr[$num_a-1]['id'];

          // $end_status = $pro_arr[$num_a-1]['status'];
          // $end_content = $pro_arr[$num_a-1]['content'];
          // $end_file = $pro_arr[$num_a-1]['file'];
          // $end_guan_id = $pro_arr[$num_a-1]['guan_id'];


          
          // $end_status_guan = $end_status.",".$end_guan_id;

           //得到最新进度之前的所有的信息
           // $pro_arr_a = $pro_model -> where('guan_id = '.$pro_id) ->limit($num_a-1)-> order('id asc')->select();
          // $trace_info = array();
          // $where = array(

          //   );
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

          // $this -> assign('pro_content', $end_content);
          // $this -> assign('pro_file',$end_file);
          // $this -> assign('pro_id',$end_id);
          // var_dump($end_status);
          // var_dump($num);
          // var_dump($pro_arr_a);
          }
         // var_dump($pro_arr);
           
         $this -> assign('fen_arr',$fen_arr);

           
         }

  // var_dump($fen_info);
	    $this -> assign("fen_info",$fen_info);



		$this -> display('Pro/fen_index');
	}
	 
	//编辑信息
	public function fen_editor(){
	if (!UserController::isLogin()){
			redirect(U('/Manager/User/'));
	 }

	     $fenmodel = D('Fen');

       $feninfo_model = D('Feninfo');

       $pro_model = M('pro_trace');

	     $id = I('get.id',0,'intval');
       // echo "aaa";
       // exit;

       // $pang = I('get.count',1,'intval');
       // $this -> assign('pang',$pang);
	     // var_dump($id);
        $fen_info = $fenmodel -> where('id = '.$id) ->order('id desc') -> find();

        //通过$id 查找 是否存在表ge_feninfo信息 
        $fen_arr = $feninfo_model -> where('fen_guan_id = '.$id) ->order('id desc') -> find();


        if($fen_arr != null){

         $pro_id = intval($fen_arr['id']);

         $this -> assign('trace_pro_id',$pro_id);
        //通过$pro_id 查找 是否存在表ge_pro_trace信息 
         //得到项目进度的个数值
          $pro_arr_aa = $pro_model -> distinct(true)-> where('guan_id = '.$pro_id) ->order('id asc')->field('status')->select();
          $num = count($pro_arr_aa);
     

          // var_dump($num);
          // var_dump($pro_arr_a);
          // $where = array(
             
          //   );
          //得到最新进度的信息
          $pro_arr = $pro_model -> where('guan_id = '.$pro_id) ->order('id asc')->select();

          // var_dump($pro_arr);
          $num_a = count($pro_arr);

          $end_id = $pro_arr[$num_a-1]['id'];

          $end_status = $pro_arr[$num_a-1]['status'];
          $end_content = $pro_arr[$num_a-1]['content'];
          $end_file = $pro_arr[$num_a-1]['file'];
          $end_guan_id = $pro_arr[$num_a-1]['guan_id'];


          
          $end_status_guan = $end_status.",".$end_guan_id;

            

           //得到最新进度之前的所有的信息
           // $pro_arr_a = $pro_model -> where('guan_id = '.$pro_id) ->limit($num_a-1)-> order('id asc')->select();
          // $trace_info = array();
          // $where = array(

          //   );
          $pro_arr_a= $pro_model -> distinct(true)-> where('guan_id = '.$pro_id) ->order('id asc')->limit($num -1)->field('guan_id,status')->select();

        //   echo "aaa1166888";
        //   var_dump($pro_arr_a);
        // exit;
          
          $array = array();
          foreach($pro_arr_a as $row){
           $array[][] = $row['guan_id'].",".$row['status'];
          }
           

          if($pro_arr != null){
          
          if($num==1){
            $array = '';
          }
          // var_dump($array);
          // var_dump($pro_arr_a);
          $this -> assign('pro_arr',$array);
          // $this -> assign('pro_arr',$pro_arr_a);

          // $this -> assign('','');
          $this -> assign('pang',$end_status);

          $this -> assign('pang_a',$end_status_guan);

          $this -> assign('pro_content', $end_content);
          $this -> assign('pro_file',$end_file);
          $this -> assign('pro_id',$end_id);
          // var_dump($end_status);
          // var_dump($num);
          // var_dump($pro_arr_a);
          }
         // var_dump($pro_arr);
           
         $this -> assign('fen_arr',$fen_arr);
         }

         //end


	   $this -> assign("fen_info",$fen_info);  	

       // $status_arr = $pro_model


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