<?php
namespace Home\Model;
use Think\Model;
class ZhiliModel extends Model{
	protected $_validate = array(
        //1.插入片段不能为空
			array('zhili_title','require','模板名称必须填写',1,'',3),
		//2.克隆位点不能为空
			// array('zhili_material','require','起始材料必须填写',1,'',3),
		//3.插入序列不能为空
			array('zhili_size','require','质粒大小必须填写',1,'',3),
	   //4.	载体名称不能为空
            // array('zhili_copy','require','拷贝数必须填写',1,'',3),
	   //5. 载体大小不能为空
            array('zhili_kangxing','require','抗性必须选择',1,'',3),
	   //6. 抗性不能为空
            // array('zhili_quantity','require','质粒抽提量必须填写',1,'',3),
	   //7.  拷贝数不能为空
            // array('zhili_level','require','质量级别必须填写',1,'',3),
       
	   
		);
}


?>