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
        $this->display('profile');
    }
    //我的分享圈 羁绊浅尝辄止污染
    public function shares(){
        $this->display();
    }
    //我的帖子
    public function articles(){
        $this->display();
    }
    //我的通知
    public function notice(){
        $this->display();
    }
    public function a(){
        $this->display();
    }





}