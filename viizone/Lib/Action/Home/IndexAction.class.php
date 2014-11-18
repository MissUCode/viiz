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
    public function upImg(){
        $setting = array(
            'mimes' => '', //允许上传的文件MiMe类型
            'maxSize' => 1 * 1024 * 1024, //上传的文件大小限制 (0-不做限制)
            'exts' => "jpg,png,jpeg", //允许上传的文件后缀
            'autoSub' => true, //自动子目录保存文件
            'subName' => array('date', 'Ymd'), //子目录创建方式，[0]-函数名，[1]-参数，多个参数使用数组
            'rootPath' => './Public/Uploads/', //保存根路径
            'savePath' => '', //保存路径
        );
        import('ORG.Util.Upload');
        if($_FILES['pic']['error']!=4 && $_FILES['pic']['error']!=4){
            $this->uploader = new Upload($setting, 'Local');
            $info = $this->uploader->upload($_FILES);
            if($info){
                $data['pic']="Public/Uploads/".$info['pic']['savepath'].$info['pic']['savename'];
                $result['message']='ok';
                $result['name']=$data['pic'];
                $this->ajaxReturn($result,'JSON');
                exit;
                //$data['code']="Public/Uploads/".$info['code']['savepath'].$info['code']['savename'];
            }else{
                $result['message']='wrong';
                $this->ajaxReturn($result,'JSON');
                exit;
                //exit($this->uploader->getError());
                //$this->error($this->uploader->getError());
            }
        }
    }
    public function test(){
        $this->display();
    }
    public function addshare(){
        $model=M('share');
        $user_share=M('user_share');
        $title=$_POST['title'];
        $desc=$_POST['desc'];
        $pic=$_POST['pic'];
        if(!IS_POST){
            echo '您无操作权限！';
            exit;
        }
        if($title==''||$desc==''){
            echo 'no';
            exit;
        }
        if(!isset($_SESSION['users_id'])||$_SESSION['users_id']==''){
            @unlink("./".$pic);
            $res['message']=110;
            $res['id']=0;
            $this->ajaxReturn($res,'JSON');
            exit;
        }
        $data['title']=$title;
        $data['desc']=$desc;
        $data['pic']=$pic;
        $data['uid']=$_SESSION['users_id'];
        $data['member']=$_SESSION['users_id'];
        $data['ctime']=time();
        if($id=$model->data($data)->add()){
            $datas['uid']=$_SESSION['users_id'];
            $datas['sid']=$id;
            $datas['score']=3;
            $user_share->data($datas)->add();
            $res['message']='success';
            $res['id']=$id;
            $this->ajaxReturn($res,'JSON');
            exit;
        }else{
            @unlink("./".$pic);
            $res['message']='fail';
            $res['id']=0;
            $this->ajaxReturn($res,'JSON');
            exit;
        }
    }
    public function  delPic(){
        $pic=$_POST['pic'];
        if(isset($_POST['act'])){
            @unlink("./".$pic);
            echo 1;
            exit;
        }else{
            @unlink("./".$pic);
            exit;
        }
       exit;
    }
}