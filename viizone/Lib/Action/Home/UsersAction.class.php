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
            $s['desc']=faceToimg($s['desc']);
            $allshares[]=$s;
        }
        $this->shares=$allshares;
        $this->display();
    }
    //我的分享圈
    public function inShares(){
        $Model=M('share');
        $user_share=M('user_share');
        $comment=M('comment');
        $where['uid']=$_SESSION['users_id'];
        $shares_ids=$user_share->where($where)->field('sid')->select();
        foreach($shares_ids as $id){
            $ids[]=$id['sid'];
        }
        $where_share['sid']=array('in',$ids);
        $shares=$Model->where($where_share)->order('id DESC')->select();
        foreach($shares as $s){
            $where_comm['sid']=$s['id'];
            $s['comments']=$comment->where($where_comm)->count();
            $s['desc']=faceToimg($s['desc']);
            $allshares[]=$s;
        }
        $this->shares=$allshares;
        $this->display('inshares');
    }
    //我的帖子
    public function articles(){
        $Model=M('article');
        $comment=M('comment');
        $where['uid']=$_SESSION['users_id'];
        $shares=$Model->where($where)->order('is_top DESC,id DESC')->select();
        foreach($shares as $s){
            $where_comm['sid']=$s['id'];
            $s['comments']=$comment->where($where_comm)->count();
            $s['content']=faceToimg($s['content']);
            $allshares[]=$s;
        }
        $this->articles=$allshares;
        $this->display();
    }
    //我的通知
    public function notice(){
        $this->display();
    }
    //置顶
    public function setTop(){
        $this->display();
    }
    //会员
    public function members(){
        $this->display();
    }
    //帖子
    public function article(){
        $model=M('article');
        $share=M('share');
        $comment=M('comment');
        $where_share['id']=$_GET['sid'];
        $share_info=$share->where($where_share)->find();
        if($share_info['uid']!=$_GET['uid']){
            echo 'Oh,NO,Fuck You!';
            exit;
        }
        $where['sid']=$_GET['sid'];
        $article=$model->where($where)->order('id DESC')->select();
        foreach($article as $s){
            $where_comm['aid']=$s['id'];
            $s['comments']=$comment->where($where_comm)->count();
            $s['content']=faceToimg($s['content']);
            $articles[]=$s;
        }
        $this->articles=$articles;
        $this->infos=$share_info;
        $this->display();
    }
    //删除操作
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
                $where_del['uid']=$_SESSION['users_id'];
                $where_del['sid']=$id;
                $where_com['uid']=$_SESSION['users_id'];
                $where_com['sid']=$id;
                $del_arts=M('article')->where($where_del)->select();
                M('article')->where($where_del)->delete();
                M('comment')->where($where_com)->delete();
                @unlink('./'.$nowinfos['pic']);
                foreach($del_arts as $del){
                    @unlink('./'.$del['pics']);
                }
            }else if($act=='article'){
                $where_com['uid']=$_SESSION['users_id'];
                $where_com['aid']=$id;
                @unlink('./'.$nowinfos['pics']);
                M('comment')->where($where_com)->delete();
            }else{
                //删除评论预留接口
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