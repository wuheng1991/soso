<?php
function getUserInfo($id){
	if ($id > 0){
		$uInfo = M('MembersInfo')->where('uid = '.$id)->find();
		return $uInfo;
	} else {
		return '';
	}
}

function getUserEmail(){
	if (session('uid')){
		$uInfo = M('Members')->where('id = '.session('uid'))->find();
		return $uInfo['username'];
	} else {
		return '';
	}
}

function getClientName($id){
	if ($id >0){
		$uInfo = M('MembersInfo')->where('uid = '.$id)->find();
		return $uInfo['dutyer'];
	} else {
		return '';
	}
}

function getClientEmail($id){
	if ($id >0){
		$uInfo = M('Members')->where('id = '.$id)->find();
		return $uInfo['username'];
	} else {
		return '';
	}
}
function getClientPhone($id){
	if ($id >0){
		$uInfo = M('MembersInfo')->where('id = '.$id)->find();
		return $uInfo['phone'];
	} else {
		return '';
	}
}

function getClientCompany($id){
	if ($id >0){
		$uInfo = M('MembersInfo')->where('uid = '.$id)->find();
		return $uInfo['company'];
	} else {
		return '';
	}
}

function createProCode($length, $chars = '0123456789') {
	$hash = 'JKR-';
	$max = strlen($chars) - 1;
	for($i = 0; $i < $length; $i++) {
		$hash .= $chars[mt_rand(0, $max)];
	}
	return $hash;
}

function showOrderType($id){
	switch($id){
		case 1: $str = '测序订单';break;
		case 2: $str = '引物订单';break;
		case 3: $str = '基因订单';break;
		case 4: $str = 'PCR克隆及亚克隆';break;
		case 5: $str = '突变服务';break;
		case 6: $str = '质粒制备';break;
		default:
			$str = '';
	}
	return $str;
}
function showOrderStatus($id){
	switch($id){
		case 1: $str = '草稿';break;
		case 2: $str = '订单已提交';break;
		case 3: $str = '结果已更新';break;
		default:
			$str = '';
	}
	return $str;
}
function showSampletype($v){
	switch($v){
		case 1:$str = '菌液';break;
		case 2:$str = '质粒';break;
		case 3:$str = 'PCR未纯化';break;
		case 4:$str = 'PCR已纯化';break;
		default:$str = '';break;
	}
	return $str;
}
function showClaim($v){
	switch($v){
		case 1:$str = '正向';break;
		case 2:$str = '反向';break;
		case 3:$str = '双向';break;
		case 4:$str = '测通';break;
		default:$str = '';break;
	}
	return $str;
}
function showSpecialClaim($v){
	switch($v){
		case 1:$str = '高GC';break;
		case 2:$str = '特殊结构';break;
		default:$str = '';break;
	}
	return $str;
}
function shoWuniversalPrimers($id){
	if ($id == '') return '';
	if (!preg_match('/\d+/',$id)) return '';
	$info = M('Primers')->field('name')->where(' id = '.$id)->find();
	return $info['name'];
}


function getSequencingCountByID($orderID){
	$orders_sequencing = M('OrdersSequencing');
	$countNum = $orders_sequencing->where(' orderid = '.$orderID)->count();
	return $countNum;
}

function getCityList($id){
	if ($id == '') return '';
	if (!preg_match('/\d+/',$id)) return '';
	$info = M('Area')->where(' reid = '.$id)->select();
	return $info;
}

# 引物
function getPuremthod($v){
	switch($v){
		case 1: $str = 'PAGE';break;
		case 2: $str = 'DSL';break;
		case 3: $str = 'HPLC';break;
		case 4: $str = 'PAGE plus';break;
		case 5: $str = 'RPC';break;
		case 6: $str = 'OPC';break;
		case 7: $str = 'HAP';break;
		case 8: $str = 'ULTRAPAGE';break;
		default:
			$str = '';
	}
	return $str;
}

function getFModification($v){
	switch($v){
		case 1: $str = 'PO4';break;
		case 2: $str = 'NH2 C3';break;
		case 3: $str = 'NH2 C6';break;
		case 4: $str = 'NH2 C12';break;
		case 5: $str = 'NH2 C6 dT';break;
		case 6: $str = 'SH C6';break;
		case 7: $str = 'Biotin';break;
		case 8: $str = 'Biotin TEG';break;
		case 9: $str = 'Dual Biotin';break;
		case 10: $str = 'Digoxin';break;
		case 11: $str = 'Cy3';break;
		case 12: $str = 'Cy5';break;
		case 13: $str = 'FAM';break;
		case 14: $str = 'HEX';break;
		case 15: $str = 'TET';break;
		case 16: $str = '6-JOE';break;
		case 17: $str = 'Rox';break;
		case 18: $str = 'TAMRA';break;
		default:
			$str = '';
	}
	return $str;
}
function getTModification($v){
	switch($v){
		case 1: $str = 'PO4';break;
		case 2: $str = 'NH2 C3';break;
		case 3: $str = 'NH2 C7';break;
		case 4: $str = 'NH2 C6 dT';break;
		case 5: $str = 'SH C6';break;
		case 6: $str = 'Biotin';break;
		case 7: $str = 'Biotin TEG';break;
		case 8: $str = 'Digoxin';break;
		case 9: $str = 'Cy3';break;
		case 10: $str = 'Cy5';break;
		case 11: $str = 'FAM';break;
		case 12: $str = '6-JOE';break;
		case 13: $str = 'Rox';break;
		case 14: $str = 'TAMRA';break;
		case 15: $str = 'DABCYL';break;
		case 16: $str = 'BHQ 1';break;
		case 17: $str = 'BHQ 2';break;
		default:
			$str = '';
	}
	return $str;
}

function getOTModification($v){
	switch($v){
		case 1: $str = 'dI';break;
		case 2: $str = 'dU';break;
		case 3: $str = 'SPO3';break;
		default:
			$str = '';
	}
	return $str;
}

function getPrimersCountByID($id){
	if ($id == '') return '';
	$orders_primers = M('OrdersPrimers');
	$info = $orders_primers->where(' orderid = '.$id)->Sum('basenum');
	return $info;
}
function getGeneCountByID($id){
	if ($id == '') return '';
	$orders_gene = M('Gene');
	$info = $orders_gene -> where('orderid = '.$id)->select();
	$number = 0;
	$danwei = 0;

	foreach($info as $row){
		$danwei = intval($row['gene_serial_sel']);

		$content = trim($row['gene_contents']);
		$content = str_replace(" ","",$content);
        $content = str_replace("\n","",$content);
        $content = str_replace("\r","",$content);


	if($danwei == 1){
        
        
	     $number += strlen($content);

		}

		if($danwei == 2){
          

        
	     $number += intval(strlen($content)) * 3;

		}

     $danwei = 0;
		

	// if(intval($row['gene_serial_sel'])==2){
	// 	$number = $number - 1;
	// }

	}
	
	return $number;


}

function getPrimerSynthesis($v){
	switch($v){
		case 1: $str = '';break;
		case 2: $str = '已收到';break;
		case 3: $str = '已合成';break;
		case 4: $str = '已取消';break;
		case 5: $str = '已完成';break;
		case 6: $str = '已发货';break;
		case 7: $str = '已终止';break;
		default:
			$str = '';
	}
	return $str;
}
function getPrimersNum($id){
	if ($id == '') return '';
	$orders_primers = M('PrimerResults');
	$info = $orders_primers->where(' orderid = '.$id)->field('num')->find();
	return $info['num'];
}

function getSEQResultList($seqid){
	if ($seqid == '') return '';
	$Results = M('Results');
	$info = $Results->where(' seqID = '.$seqid)->find();
	return $info;
}

//基因状态
function getStatus($id){
	if ($id == '') return '';
	$note = M('Contents');
	$info = $note -> where("flag = 1 and id_order = ".$id)->order("id desc")->limit(1)->getField("status");
	return $info;
}
//引物状态
function getStatus_a($id){
	if ($id == '') return '0';
	$note = M('Contents');
	$info = $note -> where("flag = 1 and id_order = ".$id)->order("id desc")->limit(1)->getField("status");
	return $info;
}
//测序状态
function getStatus_b($id){
	if ($id == '') return '0';
	$note = M('Contents');
	$info = $note -> where("flag = 1 and id_order = ".$id)->order("id desc")->limit(1)->getField("status");
	return $info;
}
//克隆状态
function getStatus_c($id){
	if ($id == '') return '';
	$note = M('Contents');
	$info = $note -> where("flag = 1 and id_order = ".$id)->order("id desc")->limit(1)->getField("status");
	return $info;
}
//突变状态
function getStatus_d($id){
	if ($id == '') return '';
	$note = M('Contents');
	$info = $note -> where("flag = 1 and id_order = ".$id)->order("id desc")->limit(1)->getField("status");
	return $info;
}
//质粒制备状态
function getStatus_e($id){
	if ($id == '') return '';
	$note = M('Contents');
	$info = $note -> where("flag = 1 and id_order = ".$id)->order("id desc")->limit(1)->getField("status");
	return $info;
}
//得到省份
function getProvince($id){
	if ($id == '') return '0';
	$model = M("Area");
	$name = $model -> where("id = ".$id) -> getField("name");
	return $name;

}

//得到城市
function getCity($id){
	if ($id == '') return '0';
	$model = M("Area");
	$name = $model -> where("id = ".$id) -> getField("name");
	return $name;

}
//测序状态
function showSequencingStatus($v){
	switch($v){
		case 1:$str = '<font style="color:#F00;">待测序</font>';break;
		case 2:$str = '<font style="color:#0F0;">已测序</font>';break;
		case 3:$str = '重测序';break;
		default:$str = '';break;
	}
	return $str;
}

//得到clone的序列的长度
function serialength($id){
	if($id == '') return '0';
	$model = M("Clone");
	$str = $model -> where('id = '.$id)->getField('clone_serial');
	$str = trim($str);
	return strlen($str);


}

//得到server的序列的长度
function serialength_a($id){
	if($id == '') return '0';
	$model = M("Server");
	$str = $model -> where('id = '.$id)->getField('server_serial');
	$str = trim($str);
	return strlen($str);


}
//得到clone_name的值
function clone_name($id){
	 
switch($id){
case 0:$str = '';break;
case 1:$str = 'pBC-SK+';break;
case 2:$str = 'pBluescript II KS+';break; 
case 3:$str = 'pCEP4';break;
case 4:$str = 'pCMV-Myc';break;
case 5:$str = 'pCR2.1';break;   
case 6:$str = 'pDsRed2-1';break; 
case 7:$str = 'pEcoli-Cterm 6xHN';break;
case 8:$str = 'pET-11a';break;
case 9:$str = 'pET-11b';break;
case 10:$str = 'pET-11d';break;
case 11:$str = 'pET-12a';break;
case 12:$str = 'pET-14b';break;
case 13:$str = 'pET-15b';break;
case 14:$str = 'pET-16b';break;  
case 15:$str = 'pET-17b';break;
case 16:$str = 'pET-20b(+)';break;
case 17:$str = 'pET-21a(+)';break;
case 18:$str = 'pET-21b(+)';break;
case 19:$str = 'pET-21d(+)';break;
case 20:$str = 'pET-22b(+)';break;
case 21:$str = 'pET-23a(+)';break;
case 22:$str = 'pET-23d(+)';break;
case 23:$str = 'pET-24a(+)';break;
case 24:$str = 'pET-24b(+)';break;
case 25:$str = 'pET-24c';break;
case 26:$str = 'pET-25b(+)';break;
case 27:$str = 'pET-26b+';break;
case 28:$str = 'pET-27b(+)';break;
case 29:$str = 'pET-28a(+)';break;
case 30:$str = 'pET-28b(+)';break;
case 31:$str = 'pET-29b+';break;
case 32:$str = 'pET-29a(+)';break;
case 33:$str = 'pET-3a';break; 
case 34:$str = 'PET-30a(+)';break;
case 35:$str = 'pET-30b(+)';break;
case 36:$str = 'pET-32a(+)';break;
case 37:$str = 'pET-32b+';break;
case 38:$str = 'pET-39b';break;
case 39:$str = 'pET-3c';break;
case 40:$str = 'pET-3d';break;
case 41:$str = 'pET-41a(+)';break;
case 42:$str = 'pET-41b(+)';break;
case 43:$str = 'pET-43.1a(+)';break;
case 44:$str = 'pET-44b(+)';break;
case 45:$str = 'pET-45b+';break;
case 46:$str = 'pET-49b+';break;
case 47:$str = 'pET-52b';break;
case 48:$str = 'pET-9a';break;  
case 49:$str = 'pET-9d';break;
case 50:$str = 'pPIC3.5K';break; 
case 51:$str = 'pUC18';break;
case 52:$str = 'pUC19';break;
case 53:$str = 'pUC57';break;
case 54:$str = 'pDream 2.1';break;
case 55:$str = 'Other';break; 
default:$str = '';
}
return $str;

}


function zhili_kang($id){
switch($id){	
case 0: $str = '';break;
case 1: $str = 'Ampicillin';break; 
case 2: $str = 'Blasticidin';break;
case 3: $str = 'Chloramphenicol';break;
case 4: $str = 'Clarithromycin';break;
case 5: $str = 'Kanamycin';break;
case 6: $str = 'Streptomycin';break;
case 7: $str = 'Tetracyclin';break; 
case 8: $str = 'Other';break;
default:$str = '';
}
return $str;	
}

function zhili_quantity($id){
switch($id){
	case 1:$str = '100 μg';break;
    case 2:$str = '200 μg';break;
    case 3:$str = '500 μg';break;
    case 4:$str = '1 mg';break;
    case 5:$str = '2 mg';break;
    case 6:$str = '10 mg';break; 
    case 7:$str = '20 mg';break; 
    case 8:$str = '50 mg';break; 
    case 9:$str = '100 mg';break; 
    case 10:$str = '200 mg';break;
    case 11:$str = '500 mg';break;
    case 12:$str = '1000 mg';break;
    case 13:$str = '1500 mg';break;
    case 14:$str = '2000 mg';break;
    case 15:$str = 'Other';break;
    default:$str = '';
}
return $str;
}


function zhili_cache($id){
switch($id){	
case 0: $str = '';break;
case 1: $str = 'TE';break; 
case 2: $str = 'ddH2O';break;
case 3: $str = 'Tris';break;
case 4: $str = 'PBS';break;
case 5: $str = 'Other';break; 
default:$str = '';
}
return $str;	
}

//读取复选框的内容
function fu_check($id){
if($id == '') return '';
$model = M("Zhili");
$str = $model -> where('id = '.$id)->getField('zhili_box');
$length = strlen($str);
if($length == 3){
	$str = "&nbsp;&nbsp; Bioburden assay&nbsp;,&nbsp;Custom Sequencing";
}
if($length == 1){
	 if($str == '1'){
       $str = "&nbsp;,&nbsp; Bioburden assay&nbsp;";
	 }
	 if($str == '2'){
       $str = "&nbsp;,&nbsp;Custom Sequencing";
	 }
}

if($length == 0){
	$str = '';
}

return $str;

}

function zhili_content($id){
 if($id == '') return '';
 $model = M("Zhili");
 $str = $model -> where('id = '.$id)->getField('zhili_content');
 $arr = explode(',',$str);
 // $str = $arr;
 $num = count($arr);
 $new = '';
 for($i = 0; $i < $num ; $i ++){
 	if($arr[$i] == '1'){
 	$new .= "&nbsp;Apal,";	

 	}elseif($arr[$i] == '2'){
    $new .= "&nbsp;BamHI,";
 	}elseif($arr[$i] == '3'){
     $new .= "&nbsp;Bglll,";
 	}elseif($arr[$i] == '4'){
     $new .= "&nbsp;Clal,";
 	}elseif($arr[$i] == '5'){
      $new .= "&nbsp;EcoRl,";
 	}elseif($arr[$i] == '6'){
      $new .= "&nbsp;Agel,";
 	}elseif($arr[$i] == '7'){
      $new .= "&nbsp;EcoRV,";
 	}elseif($arr[$i] == '8'){
      $new .= "&nbsp;NdeI,";
 	}elseif($arr[$i] == '9'){
      $new .= "&nbsp;NheI,";
 	}elseif($arr[$i] == '10'){
       $new .= "&nbsp;NotI,";
 	}elseif($arr[$i] == '11'){
       $new .= "&nbsp;PstI,";
 	}else{
       $new .= "&nbsp;";
 	}

 }

 return $new;
}

//其他模块中---项目状态
function pro_status($id){
switch($id){	
case 0: $str = '';break;
case 1: $str = '正常状态';break; 
case 2: $str = '停止状态';break;
case 3: $str = '延期状态';break;
case 4: $str = '准备发货状态';break;
case 5: $str = '项目结束状态';break; 
default:$str = '';
}
return $str;	
}

//得到进度的值
function get_status($id){
if($id == '') return '';
$model = M("pro_trace");
$arr = explode(',',$id);
$guan_id = $arr[0];
$status = $arr[1];
// return "aaa";
return $status;
}

//得到进度内容
function get_content($id){
if($id == '') return '';
$model = M("pro_trace");
$arr = explode(',',$id);
$guan_id = $arr[0];
$status = $arr[1];
$where=array(
	'status'=>$status,
	'guan_id'=>$guan_id
	);
$contents = $model -> where($where) -> order('id desc')->getField('content');
return $contents;	
}


//得到进度的附加
function get_file($id){
if($id == '') return '';
$model = M("pro_trace");
$arr = explode(',',$id);
$guan_id = $arr[0];
$status = $arr[1];
$where=array(
	'status'=>$status,
	'guan_id'=>$guan_id
	);

$files = $model -> where($where) -> order('id desc')->select();

foreach($files as $row){
// $link .= $row['file'];

	  // $daye = '';
      $file_path = $row['file'];

      if($file_path != ""){
      //得到后缀
      $arr = explode('.', $file_path);
      $exrt = $arr[1];
      $exrt = strtolower($exrt);
      

       if($exrt == 'jpg'){
      
      $daye .= "<a class=\"fen_row_a\" href='".$file_path."' data_value='".$row['id']."' target=\"_blank\" title=\"点击预览该图\"> <img src='".$file_path."' style=\"display:block;margin:5px;float:left;\" width=60 height=60/> </a>";
      }

      if($exrt == 'jpeg'){
      
      $daye .= "<a class=\"fen_row_a\" href='".$file_path."' data_value='".$row['id']."' target=\"_blank\" title=\"点击预览该图\"> <img src='".$file_path."' style=\"display:block;margin:5px;float:left;\" width=60 height=60/> </a>";
      }

      if($exrt == 'png'){
      
      $daye .= "<a class=\"fen_row_a\" href='".$file_path."' data_value='".$row['id']."' target=\"_blank\" title=\"点击预览该图\"> <img src='".$file_path."' style=\"display:block;margin:5px;float:left;\" width=60 height=60/> </a>";
      }

      if($exrt == 'gif'){
      
      $daye .= "<a class=\"fen_row_a\" href='".$file_path."' data_value='".$row['id']."' target=\"_blank\" title=\"点击预览该图\"> <img src='".$file_path."' style=\"display:block;margin:5px;float:left;\" width=60 height=60/> </a>";
      }

      if($exrt == 'html'){
      $daye .= "<a class=\"fen_row_a\" href='".$file_path."' data_value='".$row['id']."' target=\"_blank\" title=\"点击预览或下载\"> ";
      $daye .="<img src=\"/Public/Picutue/html.png\" style=\"display:block;margin:5px;float:left;\" width=60 height=60/> </a>";
      }

      if($exrt == 'txt'){
      $daye .= "<a class=\"fen_row_a\" href='".$file_path."' data_value='".$row['id']."' target=\"_blank\" title=\"点击预览或下载\"> ";
      $daye .="<img src=\"/Public/Picutue/txt.png\" style=\"display:block;margin:5px;float:left;\" width=60 height=60/> </a>";
      }

       if($exrt == 'doc'){
      $daye .= "<a class=\"fen_row_a\" href='".$file_path."' data_value='".$row['id']."' target=\"_blank\" title=\"点击预览或下载\"> ";
      $daye .="<img src=\"/Public/Picutue/doc.png\" style=\"display:block;margin:5px;float:left;\" width=60 height=60/> </a>";
      }


       if($exrt == 'docx'){
      $daye .= "<a class=\"fen_row_a\" href='".$file_path."' data_value='".$row['id']."' target=\"_blank\" title=\"点击预览或下载\"> ";
      $daye .="<img src=\"/Public/Picutue/docx.png\" style=\"display:block;margin:5px;float:left;\" width=60 height=60/> </a>";
      }

       if($exrt == 'xls'){
      $daye .= "<a class=\"fen_row_a\" href='".$file_path."' data_value='".$row['id']."' target=\"_blank\" title=\"点击预览或下载\"> ";
      $daye .="<img src=\"/Public/Picutue/xls.png\" style=\"display:block;margin:5px;float:left;\" width=60 height=60/> </a>";
      }

      if($exrt == 'xlsx'){
      $daye .= "<a class=\"fen_row_a\" href='".$file_path."' data_value='".$row['id']."' target=\"_blank\" title=\"点击预览或下载\"> ";
      $daye .="<img src=\"/Public/Picutue/xlsx.png\" style=\"display:block;margin:5px;float:left;\" width=60 height=60/> </a>";
      }

       if($exrt == 'pdf'){
      $daye .= "<a class=\"fen_row_a\" href='".$file_path."' data_value='".$row['id']."' target=\"_blank\" title=\"点击预览或下载\"> ";
      $daye .="<img src=\"/Public/Picutue/pdf.png\" style=\"display:block;margin:5px;float:left;\" width=60 height=60/> </a>";
      }

       if($exrt == 'rar'){
      $daye .= "<a class=\"fen_row_a\" href='".$file_path."' data_value='".$row['id']."' target=\"_blank\" title=\"点击预览或下载\"> ";
      $daye .="<img src=\"/Public/Picutue/rar.png\" style=\"display:block;margin:5px;float:left;\" width=60 height=60/> </a>";
      }

       if($exrt == 'zip'){
      $daye .= "<a class=\"fen_row_a\" href='".$file_path."' data_value='".$row['id']."' target=\"_blank\" title=\"点击预览或下载\"> ";
      $daye .="<img src=\"/Public/Picutue/zip.png\" style=\"display:block;margin:5px;float:left;\" width=60 height=60/> </a>";
      }

  }


}

     // $str .= "</td><td class=\"pro_picture\" style=\"text-align:justify;\" class=\"bj-3\">";
     // $str .= "<span>".$daye."</span></td></tr>";  
     return $daye;

}


//得到积分客户姓名
function getJiName($id){
if($id == '') return '';
$members = M('Members');
$where = array(
    'username'=>trim($id)
	);
$id = $members -> where($where) -> getField('id');
// return $id;	
$members_info = M('Members_info');
$name = $members_info -> where('uid ='.$id)->getField('name');
return trim($name);
}

//得到积分会员最新的积分
function getJinew($id){
if($id == '') return '';
$createModel = M('Ji_create');
$where = array(
    'customer_name'=>trim($id)
	);
$curr = $createModel -> where($where)->order('id desc') -> getField('curr_stamps');	
return trim($curr);
}
//得到积分会员累计的积分
function getJiend($id){
if($id == '') return '';
$createModel = M('Ji_create');
$where = array(
    'customer_name'=>trim($id),
    'stamps_status'=>1
	);
$result = $createModel -> where($where) -> field('curr_stamps') -> select();
$count=0;
foreach($result as $row){
$count += intval($row['curr_stamps']);
}
return $count;	

}

//得到会员积分剩余的天数
function getJidate($id){
if($id == '') return '';
$createModel = M('Ji_create');
$arr = $createModel -> where('id ='.$id) -> field('id,stamps_date,date,end_date')->find();
$date = intval($arr['date']);
$end_date = intval($arr['end_date']);

$stamps_date = intval($arr['stamps_date']);
$curr_date = time();
$cha_date = ceil(($end_date - $curr_date)/(3600 * 24));
 
// $day = ($end)
return $cha_date;
}

//得到当前会员积分的等级
function getJirank($id){
if($id == '') return '';
$createModel = M('Ji_create');
$where = array(
    'customer_name'=>trim($id)
	);
$ji_rank = $createModel -> where($where)->order('id desc') -> getField('ji_rank');
$ji_rank = intval($ji_rank);
switch($ji_rank){	
case 0: $str = '';break;
case 1: $str = '普通会员';break; 
case 2: $str = '银卡会员';break;
case 3: $str = '金卡会员';break;
case 4: $str = '白金会员';break;
case 5: $str = 'VIP会员';break; 
default:$str = '';
}
return $str;	
 
}

//得到项目更新时间
function getTime($id){
if($id == '') return '';
// return "aaa";
$feninfo = M("Feninfo");
$pro_trace = M("Pro_trace");
$fen_id = $feninfo -> where("fen_guan_id =".$id)->getField("id");
if($fen_id > 0){

$addtime = $pro_trace -> where("guan_id =".$fen_id) ->order("id desc")-> getField("addtime");
$time = date("Y-m-d H:i:s",$addtime);
return $time;
}else{
 return "<span style=\"color:red;font-style:italic;\">暂无项目进度信息</span>";	
}
}

//得到序列的内容
function getSequence($id){
if($id == '') return '';
$orders_primers = M('OrdersPrimers');
$sequence = $orders_primers -> where("id =".$id) -> getField("sequence");	
$sequence = trim($sequence);
$sequence = str_replace(" ","",$sequence);
$sequence = strtoupper($sequence);
return $sequence;
}
//得到序列的内容的长度
function getSequenceNum($id){
if($id == '') return '';
$orders_primers = M('OrdersPrimers');
$sequence_num = $orders_primers -> where("id =".$id) -> getField("sequence");	
$sequence_num = trim($sequence_num);
$sequence_num = str_replace(" ","",$sequence_num);
$sequence_num = strlen($sequence_num);
return $sequence_num;
}


//得到该订单序列的总长度
function getSequenceAll($id){
if($id == '') return '';
$orders_primers = M('OrdersPrimers');
$number = 0;
$sequenceAll = $orders_primers -> where("orderid =".$id) -> field("sequence")-> select();
foreach($sequenceAll as $row){
  $number += intval(strlen(str_replace(" ","",trim($row['sequence']))));
 // $num = trim($row['sequence']);
 // $num = str_replace()
}
return $number;
}


