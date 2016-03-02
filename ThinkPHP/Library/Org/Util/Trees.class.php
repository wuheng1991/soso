<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2009 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
namespace Org\Util;
class Trees {
   static public $treeList = array();//存放无限级分类的结果
    public function Create($data,$pid = 0){
      foreach($data as $key => $value){
          if($value['pid'] == $pid){
            self::$treeList[] = $value;
            unset($data[$key]);
            self::Create($data,$value['id']);
          }

      }
       return self::$treeList;
    }
    
    
    

}