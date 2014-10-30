<?php
/**
 * Created by Yang.
 * User: Administrator
 * Date: 14-7-29
 * Time: 上午9:13
 */
//namespace Home\Model;
//use Think\Model\RelationModel;
class CommentModel extends RelationModel{
    //protected $tableName='spread';
    protected $_link = array(
        'member'=>array(
            'mapping_type' => BELONGS_TO,
            'class_name' => 'member',
            'foreign_key'=>'uid',
            'parent_key'=>'id',
            'mapping_name' => 'weixin',
            'mapping_fields'=>'member_name,mobile_phone,email,pic',
            'as_fields'=>'member_name:member_name,mobile_phone:mobile_phone,email:email,pic:pic'
        )
    );
}