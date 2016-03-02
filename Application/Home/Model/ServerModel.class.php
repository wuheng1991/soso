<?php
namespace Home\Model;
use Think\Model;
class ServerModel extends Model{
	protected $_validate = array(
        //1.插入片段不能为空
			array('server_title','require','插入序列名称必须填写',1,'',3),
		//2.克隆位点不能为空
			array('server_site','require','克隆位点必须填写',1,'',3),
		//3.插入序列不能为空
			array('server_serial','require','插入序列必须填写',1,'',3),
	   //4.	载体名称不能为空
            array('server_name','require','载体名称必须填写',1,'',3),
	   //5. 载体大小不能为空
          //  array('server_size','require','载体大小必须填写',1,'',3),
	   //6. 抗性不能为空
          //  array('server_kangxing','require','抗性必须填写',1,'',3),
	   //7.  拷贝数不能为空
          //  array('server_copy','require','拷贝数必须填写',1,'',3),
	   //8.  克隆方法不能为空
            array('server_chg_name','require','突变后序列名称必须填写',1,'',3),
	   //9.  目标插入序列不能为空
            array('server_chg_content','require','突变后序列必须填写',1,'',3),
	   //10.  目标载体不能为空
            //array('server_way','require','克隆方式必须填写',1,'',3),
	   //11.  载体名称不能为空
           // array('server_moban_name','require','模板名称必须填写',1,'',3),
	   
		);
}


?>