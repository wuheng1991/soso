<?php
namespace Manage\Model;
use Think\Model\RelationModel;
class TpNodeModel extends RelationModel{
    protected $_link = array(
               'Tp_node'=>array(
                  'mapping_type'=> self::HAS_MANY, 
                  'parent_key'=>'pid',
                   // 'class_name'=> 'Article',
                    'foreign_key'=> 'id',
                   'mapping_name'  => 'node',
                   //  'mapping_order' => 'create_time desc',
                     
                                                  
                  ),        
               );

}

?>