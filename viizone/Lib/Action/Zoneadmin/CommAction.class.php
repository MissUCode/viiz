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
class CommAction extends Action {
    /*
     * 后台公共控制器
     * */
    public function _initialize(){
        if (!isset($_SESSION['admin_id'])||empty($_SESSION['admin_id'])){
            //$this->error('请先登录！','login');
            $this->redirect('Enter/login');
        }

    }
}