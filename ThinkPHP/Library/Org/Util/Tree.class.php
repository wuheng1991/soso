<?php
namespace Org\Util;
//无限分类
class Tree{
	static public $treeList = array();//存放无限级分类的结果
	public function Create($data,$pid = 0){
      foreach($data as $key => $value){
          if($value['pid'] == $pid){
            self::$treeList[] = $value;
            unset($data[$key]);
            self::Create($data,$value['id']);
          }
      }
	}
}

?>