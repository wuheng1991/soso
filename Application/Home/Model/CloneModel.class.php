<?php
namespace Home\Model;
use Think\Model;
class CloneModel extends Model{
	protected $_validate = array(
        //1.插入片段不能为空
			array('clone_title','require','插入片段必须填写',1,'',3),
		//2.克隆位点不能为空
			array('clone_site','require','克隆位点必须填写',1,'',3),
		//3.插入序列不能为空
			array('clone_serial','require','插入序列必须填写',1,'',3),
	   //4.	载体名称不能为空
            array('clone_name','require','载体名称必须填写',1,'',3),
	   //5. 载体大小不能为空
    //         array('clone_size','require','载体大小必须填写',1,'',3),
	   // //6. 抗性不能为空
    //         array('clone_kangxing','require','抗性必须填写',1,'',3),
	   // //7.  拷贝数不能为空
    //         array('clone_copy','require','拷贝数必须填写',1,'',3),
	   // //8.  克隆方法不能为空
            array('clone_zhili_way','require','克隆方法必须填写',1,'',3),
	   // //9.  目标插入序列不能为空
           array('clone_zhili_serial','require','目标插入序列必须填写',1,'',3),
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