<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-8-15
 * Time: 上午9:13
 */
class IndexcomAction extends Action {
    public function _initialize(){
        $model=M('cate');
        $set=M('set');
        $where['pid']=0;
        $navs=$model->where($where)->order('sort DESC')->select();
        $seo=$set->find();
        $this->navs=$navs;
        $this->seo=$seo;
        //$this->display();
    }

}