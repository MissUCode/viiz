<?php
/**
 * Home控制器
 * Created by PhpStorm.
 * User: YangZhe
 * Date: 14-7-17
 * Time: 下午15:05
 */
//namespace Viimanager\Controller;
//use Think\Controller;
class IndexAction extends CommAction {
    /*
     * 首页
     * */
    public function index(){
      $this->username="Donkeyman";
      $this->display();
    }





}