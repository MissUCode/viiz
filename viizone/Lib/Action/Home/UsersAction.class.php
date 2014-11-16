<?php
/**
 * Users控制器
 * Created by PhpStorm.
 * User: YangZhe
 * Date: 14-7-17
 * Time: 下午15:05
 */
//namespace Home\Controller;
//use Think\Controller;
//use Think\Upload;
class UsersAction extends UcommAction {
    /*
     * 首页
     * */
    public function index(){
       $this->profile();
	   //$this->display();
    }
    //修改个人信息
    public function profile(){
        $this->position="profile";
        $modle=M("member");
        $where['id']=$_SESSION['member_id'];
        $mem_info=$modle->where($where)->find();
        $this->infos=$mem_info;
        $this->display();
    }
    //我的账号
    public function shares(){

        $this->display();
    }
    public function articles(){

        $this->display();
    }



}