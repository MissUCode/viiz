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
    //我的分享圈
    public function shares(){
        $Model=M('share');
        $comment=M('comment');
        $where['uid']=$_SESSION['users_id'];
        $shares=$Model->where($where)->order('id DESC')->select();
        foreach($shares as $s){
            $where_comm['sid']=$s['id'];
            $s['comments']=$comment->where($where_comm)->count();
            $allshares[]=$s;
        }
        $this->shares=$allshares;
        $this->display();
    }
    //我的帖子
    public function articles(){
        $Model=M('article');
        $comment=M('comment');
        $where['uid']=$_SESSION['users_id'];
        $shares=$Model->where($where)->order('id DESC')->select();
        foreach($shares as $s){
            $where_comm['sid']=$s['id'];
            $s['comments']=$comment->where($where_comm)->count();
            $allshares[]=$s;
        }
        $this->articles=$allshares;
        $this->display();
    }
    //我的通知
    public function notice(){
        $this->display();
    }

    public function delete(){
        if(!IS_POST){
            echo '您无操作权限！';
            exit;
        }
        $id=$_POST['id'];
        $act=$_POST['act'];
        if($act=='share'){
            $Model=M('share');
        }else if($act=='article'){
            $Model=M('article');
        }else{
            $Model=M('comment');
        }
        $where['id']=$id;
        $where['uid']=$_SESSION['users_id'];
        $nowinfos=$Model->where($where)->find();
        if($Model->where($where)->delete()){
            if($act=='share'){
                @unlink('./'.$nowinfos['pic']);
            }else{
                @unlink('./'.$nowinfos['pics']);
            }
            $res['message']='success';
            $res['rid']=0;
            $this->ajaxReturn($res,'JSON');
            exit;
        }else{
            $res['message']='fail';
            $res['rid']=0;
            $this->ajaxReturn($res,'JSON');
            exit;
        }

    }
    public function a(){
        $this->display();
    }





}