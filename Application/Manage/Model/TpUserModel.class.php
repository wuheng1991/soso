<?php
namespace Manage\Model;
use Think\Model\RelationModel;
class TpUserModel extends RelationModel{
    protected $_link = array(
               'TpRole'=>array(
                    'mapping_type' => self::MANY_TO_MANY,                   
                    'foreign_key' => 'user_id',
                    'relation_foreign_key'=>'role_id',
                    'relation_table' => 'ge_tp_role_user',
                    'mapping_fields' => "id,name",                               
                  ),        
               );

}