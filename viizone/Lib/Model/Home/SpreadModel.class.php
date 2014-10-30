<?php
/**
 * Created by Yang.
 * User: Administrator
 * Date: 14-7-29
 * Time: 上午9:13
 */
//namespace Home\Model;
//use Think\Model\RelationModel;
class SpreadModel extends RelationModel{
    protected $_link = array(
        'weixin'=>array(
            'mapping_type' => BELONGS_TO,
            'class_name' => 'weixin',
            'foreign_key'=>'wx_id',
            'parent_key'=>'id',
            'mapping_name' => 'weixin',
            'mapping_fields'=>'id,name',
            'as_fields'=>'id:weixin_id,name:weixin_name'
        ),
        'spcate'=>array(
            'mapping_type' => BELONGS_TO,
            'class_name' => 'spcate',
            'foreign_key'=>'cid',
            'parent_key'=>'id',
            'mapping_name' => 'cate',
            'mapping_fields'=>'cat_id,name',
            'as_fields'=>'cat_id:cat_id,name:cat_name'
        ),
    );
}