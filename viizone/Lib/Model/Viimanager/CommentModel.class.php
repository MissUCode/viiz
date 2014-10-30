<?php
/**
 * Created by Yang.
 * User: Administrator
 * Date: 14-7-29
 * Time: 上午9:13
 */
//namespace Viimanager\Model;
//use Think\Model\RelationModel;
class CommentModel extends RelationModel{
    protected $_link = array(
        'weixin'=>array(
            'mapping_type' => BELONGS_TO,
            'class_name' => 'weixin',
            'foreign_key'=>'wx_id',
            'parent_key'=>'id',
            'mapping_name' => 'weixin',
            'mapping_fields'=>'name',
            'as_fields'=>'name:weixin_name'
        )
    );
}