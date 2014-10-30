<?php
/**
 * Created by Yang.
 * User: Administrator
 * Date: 14-7-29
 * Time: 上午9:13
 */
//namespace Viimanager\Model;
//use Think\Model\RelationModel;
class SpreadModel extends RelationModel{
    protected $_link = array(
        'weixin'=>array(
            'mapping_type' => BELONGS_TO,
            'class_name' => 'weixin',
            'foreign_key'=>'wx_id',
            'parent_key'=>'id',
            'mapping_name' => 'weixin',
            'mapping_fields'=>'id,name,w_name,clicks',
            'as_fields'=>'id:weixin_id,name:weixin_name,w_name:w_name,clicks:clicks'
        ),
        'spcate'=>array(
            'mapping_type' => BELONGS_TO,
            'class_name' => 'spcate',
            'foreign_key'=>'cid',
            'parent_key'=>'id',
            'mapping_name' => 'cate',
            'mapping_fields'=>'cat_id,name',
            'as_fields'=>'cat_id:user_id,name:cat_name'
        ),
        'member'=>array(
            'mapping_type' => BELONGS_TO,
            'class_name' => 'member',
            'foreign_key'=>'uid',
            'parent_key'=>'id',
            'mapping_name' => 'member',
            'mapping_fields'=>'id,member_name,mobile_phone,email',
            'as_fields'=>'id:user_id,member_name:member,mobile_phone:phone,email:email'
        ),
    );
}