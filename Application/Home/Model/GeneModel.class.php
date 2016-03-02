<?php
namespace Home\Model;
use Think\Model;
class GeneModel extends Model{
	protected $_validate = array(
        //1.基因名称不能为空
			array('gene_name','require','基因名称必须填写',1,'',3),
		//2.基因序列内容不能为空
			array('gene_contents','require','基因序列内容必须填写',1,'',3),
		//3.模板名称不能为空
			//array('gene_zhili_name','require','模板名称必须填写',1,'',3),
	   //4.		gene_serial_sel
			array('gene_serial_sel','require','基因序列必须填写',1,'',3),

		);
}


?>