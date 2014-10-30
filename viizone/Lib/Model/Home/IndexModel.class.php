<?php
/**
 * Created by Yang.
 * User: Administrator
 * Date: 14-7-29
 * Time: 上午9:13
 */
class IndexModel extends RelationModel{
    protected $tableName='spread';
    protected $_link = array(
        'weixin'=>array(
            'mapping_type' =>BELONGS_TO,
            'class_name' => 'weixin',
            'foreign_key'=>'wx_id',
            'parent_key'=>'id',
            'mapping_name' => 'weixin',
            'mapping_fields'=>'id,name,logo,code,clicks,like,cid',
            'as_fields'=>'id:weixin_id,name:weixin_name,logo:logo,code:code,clicks:clicks,like:like,cid:cat_id'
        )
    );
}