<?php
namespace Manage\Model;
use Think\Model;
class FenModel extends Model{
	protected $_validate = array(
        //1.插入片段不能为空
			array('fen_position','require','地区位置必须选择',1,'',3),
			array('fen_name','require','地区名称必须填写',1,'',3),
			array('fen_sale','require','销售员必须填写',1,'',3),
			array('fen_he','require','合同编号必须填写',1,'',3),
			array('fen_customer','require','客户单位必须填写',1,'',3),
			array('fen_contact','require','联系人必须填写',1,'',3),
			array('fen_date','require','预计项目周期必须填写',1,'',3),
			array('fen_date_xian','require','合同期限必须填写',1,'',3),
			array('fen_email','require','客户Email必须填写',1,'',3),
			array('fen_pi','require','实验室负责人必须填写',1,'',3),
			array('fen_pro','require','项目名称必须填写',1,'',3),
			array('fen_status','require','项目状态必须选择',1,'',3),
			array('fen_xi','require','项目细分必须填写',1,'',3),
			array('fen_he_money','require','合同总金额必须填写',1,'',3),
			array('fen_money','require','预付款情况必须填写',1,'',3),

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