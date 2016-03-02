<?php
namespace Manage\Model;
use Think\Model;
class FeninfoModel extends Model{
	protected $_validate = array(
        //1.插入片段不能为空
			array('fen_pro_man','require','子项目负责人必须填写',1,'',3),
			array('fen_pro_js','require','项目简介必须填写',1,'',3),
			array('fen_pro_sm','require','样品信息说明必须填写',1,'',3),
			array('fen_pro_date','require','样品接收时间(启动时间)必须填写',1,'',3),
			array('fen_pro_ys','require','样品说明必须填写',1,'',3),
			// array('fen_contact','require','联系人必须填写',1,'',3),
			// array('fen_date','require','预计项目周期必须填写',1,'',3),
			// array('fen_pro','require','项目名称必须填写',1,'',3),
			// array('fen_status','require','项目状态必须选择',1,'',3),
			// array('fen_xi','require','项目细分必须填写',1,'',3),

		//2.克隆位点不能为空
			// array('clone_site','require','克隆位点必须填写',1,'',3),
		//3.插入序列不能为空
			// array('clone_serial','require','插入序列必须填写',1,'',3),
	   //4.	载体名称不能为空
            // array('clone_name','require','载体名称必须填写',1,'',3),
	   //5. 载体大小不能为空
    //         array('clone_size','require','载体大小必须填写',1,'',3),
	   // //6. 抗性不能为空
    //         array('clone_kangxing','require','抗性必须填写',1,'',3),
	   // //7.  拷贝数不能为空
    //         array('clone_copy','require','拷贝数必须填写',1,'',3),
	   // //8.  克隆方法不能为空
            // array('clone_zhili_way','require','克隆方法必须填写',1,'',3),
	   // //9.  目标插入序列不能为空
           // array('clone_zhili_serial','require','目标插入序列必须填写',1,'',3),
	   // //10.  目标载体不能为空
    //         array('clone_zaiti','require','目标载体必须填写',1,'',3),
	   // //11.  载体名称不能为空
    //         array('clone_zhili_name','require','载体名称必须填写',1,'',3),
	   // //12.  载体大小bp不能为空
    //         //array('clone_zaiti','require','载体大小bp必须填写',1,'',3),
	   // //13.  抗性不能为空
    //         array('clone_zaiti_size','require','载体大小bp必须填写',1,'',3),
	   // //14.   拷贝数不能为空
    //         array('clone_zaiti_kangxing','require','抗性必须填写',1,'',3),
	   // //15.   阅读框不能为空
    //         array('clone_zaiti_copy','require','拷贝数必须填写',1,'',3),
	   // //16.  模板名称不能为空	
    //         array('clone_read','require','阅读框必须填写',1,'',3),
    //          array('clone_moban','require','模板必须填写',1,'',3),
		);
}


?>