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
        'user'=>array(
            'mapping_type' => BELONGS_TO,
            'class_name' => 'user',
            'foreign_key'=>'uid',
            'parent_key'=>'id',
            'mapping_name' => 'comment',
            'mapping_fields'=>'nickname,pic',
            'as_fields'=>'nickname:nickname,pic:pic'
        )
    );
}