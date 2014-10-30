<?php
//namespace Viimanager\Model;
//use Think\Model\RelationModel;
class UserModel extends RelationModel{
    protected $_link = array(
        'weixin'=>array(
            'mapping_type' => HAS_MANY,
            'class_name' => 'weixin',
            'foreign_key'=>'uid',
            'parent_key'=>'id',
            'relation_table' => 'vii_weixin'
        )
    );
 }