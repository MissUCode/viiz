<?php
/**
 * Home控制器
 * Created by PhpStorm.
 * User: YangZhe
 * Date: 14-11-12
 * Time: 下午15:05
 */
class IndexAction extends IndexcomAction {
    // 首页
    public function index(){
        $shareModel=M('share');
        $aModel=M('article');
        $cModel=M('comment');
        $uModel=M('user_share');
        $share=$shareModel->order('is_top DESC,click DESC')->select();
        foreach($share as $s){
            $where['sid']=$s['id'];
            $where_user['id']=$s['uid'];
            $s['comment']=$cModel->where($where)->count();
            $s['article']=$aModel->where($where)->count();
            $s['members']=$uModel->where($where)->count();
            $s['userpic']=M('users')->where($where_user)->getField('pic');
            $shares[]=$s;
        }
        $this->shares=$shares;
	    $this->display();
    }
    public function share(){
        $where['id']=$_GET['share_id'];
        $where_a['sid']=$_GET['share_id'];
        $where_a['status']=1;
        $shareModel=M('share');
        $articleModel=M('article');
        $cModel=M('comment');
        $userModel=M('users');
        $user_share=M('user_share');
        $user_ids=$user_share->where($where_a)->field('uid')->order('score DESC')->limit(0,4)->select();
        foreach($user_ids as $ids){
            $uids[]=$ids['uid'];
        }
        $where_hot['id']=array('in',$uids);
        $hot_users=$userModel->where($where_hot)->field('id,nickname,pic')->select();
        $shareinfo=$shareModel->where($where)->find();
        $article=$articleModel->where($where_a)->order('is_top DESC,click DESC')->select();
        foreach($article as $a){
            $where_user['id']=$a['uid'];
            $where_comm['aid']=$a['id'];
            $a['userpic']=$userModel->where($where_user)->getField('pic');
            $a['username']=$userModel->where($where_user)->getField('nickname');
            if($a['username']==''){
                $a['username']='weizhu_editer';
            }
            $a['comment']=$cModel->where($where_comm)->count();
            $articles[]=$a;
        }
        $this->shareinfo=$shareinfo;
        $this->articles=$articles;
        $this->hot_users=$hot_users;
        $this->display();
    }
    public function article(){
        $where['id']=$_GET['article_id'];
        $aModel=M('article');
        $sModel=M('share');
        $cModel=D('Comment');
        $articleinfo=$aModel->where($where)->find();
        $where_share['id']=$articleinfo['sid'];
        $where_comm['aid']=$_GET['article_id'];
        $shareinfo=$sModel->where($where_share)->find();
        $comments=$cModel->where($where_comm)->order('addtime DESC')->relation(true)->select();
        $commentCounts=$cModel->where($where_comm)->count();
        $comments=to_tree($comments);
//        print_r($comments);
//        exit;
        $this->shareinfo=$shareinfo;
        $this->articleinfo=$articleinfo;
        $this->commentCounts=$commentCounts;
        $this->comments=$comments;
        $this->display();
    }

}