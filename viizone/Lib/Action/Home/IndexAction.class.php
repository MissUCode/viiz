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
        import('ORG.Util.Page');// 导入分页类
        $count= $shareModel->count();// 查询满足要求的总记录数
        $Page = new  Page($count, 30);// 实例化分页类 传入总记录数和每页显示的记录数
        $show = $Page->vip_show();// 分页显示输出
        //进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $share=$shareModel->order("is_top DESC,click DESC")->limit($Page->firstRow.','.$Page->listRows)->select();
        foreach($share as $s){
            $where['sid']=$s['id'];
            $where_user['id']=$s['uid'];
            $s['comment']=$cModel->where($where)->count();
            $s['article']=$aModel->where($where)->count();
            $s['members']=$uModel->where($where)->count();
           // $s['userpic']=M('users')->where($where_user)->getField('pic');
            $userinfo=M('users')->where($where_user)->field('nickname,pic,lev')->find();
            $s['userpic']=$userinfo['pic'];
            $s['username']=$userinfo['nickname'];
            $s['lev']=$userinfo['lev']+1;
            $s['desc']=faceToimg($s['desc']);
            $shares[]=$s;
        }
        $this->shares=$shares;
        $this->page=$show;
	    $this->display();
    }
    //分享圈详情
    public function share(){
        if(isset($_GET['share_id'])){
            $_SESSION['share_id']=$_GET['share_id'];
        }
        $where['id']=$_SESSION['share_id'];
        $where_a['sid']=$_SESSION['share_id'];
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
        $data_update['click']=$shareinfo['click']+1;
        $shareModel->where($where)->data($data_update)->save();
        import('ORG.Util.Page');// 导入分页类
        $count= $articleModel->where($where_a)->count();// 查询满足要求的总记录数
        $Page = new  Page($count, 30);// 实例化分页类 传入总记录数和每页显示的记录数
        $show = $Page->vip_show();// 分页显示输出
        $article=$articleModel->where($where_a)->order('is_top DESC,click DESC')->limit($Page->firstRow.','.$Page->listRows)->select();
        foreach($article as $a){
            $where_user['id']=$a['uid'];
            $where_comm['aid']=$a['id'];
            $userinfo=$userModel->where($where_user)->field('nickname,pic,lev')->find();
            $a['userpic']=$userinfo['pic'];
            $a['username']=$userinfo['nickname'];
            $a['lev']=$userinfo['lev']+1;
            if($a['username']==''){
                $a['username']='weizhu_editer';
            }
            $a['comment']=$cModel->where($where_comm)->count();
            $a['content']=faceToimg($a['content']);
            $articles[]=$a;
        }
        $this->shareinfo=$shareinfo;
        $this->articles=$articles;
        $this->hot_users=$hot_users;
        $this->page=$show;
        $this->display();
    }
    //帖子详情
    public function article(){
        $where['id']=$_GET['article_id'];
        $aModel=M('article');
        $sModel=M('share');
        $cModel=D('Comment');
        $articleinfo=$aModel->where($where)->find();
        $articleinfo['content']=faceToimg($articleinfo['content']);
        $where_user['id']=$articleinfo['uid'];
        $userinfo=M('users')->where($where_user)->field('nickname,pic,lev')->find();
        $articleinfo['userpic']=$userinfo['pic'];
        $articleinfo['username']=$userinfo['nickname'];
        $articleinfo['lev']=$userinfo['lev']+1;
        $where_share['id']=$articleinfo['sid'];
        $where_comm['aid']=$_GET['article_id'];
        $shareinfo=$sModel->where($where_share)->find();
        $comments=$cModel->where($where_comm)->order('addtime DESC')->relation(true)->select();
        $commentCounts=$cModel->where($where_comm)->count();
        foreach($comments as $cc){
            $cc['content']=faceToimg($cc['content']);
            $cc['lev']=$cc['lev']+1;
            $comments_alls[]=$cc;
        }
        $comments_alls=to_tree($comments_alls);
//        print_r($comments_alls);
//        exit;
        $this->shareinfo=$shareinfo;
        $this->articleinfo=$articleinfo;
        $this->commentCounts=$commentCounts;
        $this->comments=$comments_alls;
        $this->display();
    }
    //添加分享圈
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
    //添加帖子
    public function addArticle(){
        $model=M('article');
        $user_share=M('user_share');
        $title=$_POST['title'];
        $desc=$_POST['desc'];
        $pic=$_POST['pic'];
        $sid=$_POST['sid'];
        if(!IS_POST){
            echo '您无操作权限！';
            exit;
        }
        if($title==''||$desc==''){
            echo 'no';
            exit;
        }
        //是否登录
        if(!isset($_SESSION['users_id'])||$_SESSION['users_id']==''){
            @unlink("./".$pic);
            $res['message']=110;
            $res['id']=0;
            $this->ajaxReturn($res,'JSON');
            exit;
        }else{
            //是否已加入分享圈
            $where_in['uid']=$_SESSION['users_id'];
            $where_in['sid']=$sid;
            $inshare=$user_share->where($where_in)->find();
            if(!$inshare){
                @unlink("./".$pic);
                $res['message']='no-in';
                $res['id']=0;
                $this->ajaxReturn($res,'JSON');
                exit;
            }
        }
        $data['sid']=$sid;
        $data['title']=$title;
        $data['content']=$desc;
        $data['pics']=$pic;
        $data['uid']=$_SESSION['users_id'];
        $data['addtime']=time();
        if($id=$model->data($data)->add()){
            //预留发帖奖励积分入口
//            $datas['uid']=$_SESSION['users_id'];
//            $datas['sid']=$id;
//            $datas['score']=3;
//            $user_share->data($datas)->add();
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
    //加入分享圈
    public function joinTo(){
        //目前未做防止连续点击加入造成服务器压力的处理，预留问题
        $model=M('share');
        $user_share=M('user_share');
        $sid=$_POST['sid'];
        if(!IS_POST){
            echo '您无操作权限！';
            exit;
        }
        //是否登录
        if(!isset($_SESSION['users_id'])||$_SESSION['users_id']==''){
            $res['message']=110;
            $res['id']=0;
            $this->ajaxReturn($res,'JSON');
            exit;
        }else{
            //是否已经是会员
            $where_in['uid']=$_SESSION['users_id'];
            $where_in['sid']=$sid;
            $inshare=$user_share->where($where_in)->find();
            if($inshare){
                $res['message']='had-in';
                $res['id']=0;
                $this->ajaxReturn($res,'JSON');
                exit;
            }
        }
        $data['sid']=$sid;
        $data['uid']=$_SESSION['users_id'];
       if($id=$user_share->data($data)->add()){
           $res['message']='success';
           $res['id']=$id;
           $this->ajaxReturn($res,'JSON');
           exit;
       } else{
           $res['message']='fail';
           $res['id']=0;
           $this->ajaxReturn($res,'JSON');
           exit;
       }
    }
    //评论帖子
    public function comment(){
        //目前未做防止连续点击加入造成服务器压力的处理，预留问题
        $model=M('comment');
        $user_share=M('user_share');
        $sid=$_POST['sid'];
        $aid=$_POST['aid'];
        $pid=$_POST['pid'];
        $toid=$_POST['toid'];
        $content=$_POST['desc'];
        if(!IS_POST){
            echo '您无操作权限！';
            exit;
        }
        //是否登录
        if(!isset($_SESSION['users_id'])||$_SESSION['users_id']==''){
            $res['message']=110;
            $res['id']=0;
            $this->ajaxReturn($res,'JSON');
            exit;
        }else{
            //是否已经是会员
            $where_in['uid']=$_SESSION['users_id'];
            $where_in['sid']=$sid;
            $inshare=$user_share->where($where_in)->find();
            if(!$inshare){
                $res['message']='no-in';
                $res['id']=0;
                $this->ajaxReturn($res,'JSON');
                exit;
            }
        }
        $data['sid']=$sid;
        $data['uid']=$_SESSION['users_id'];
        $data['aid']=$aid;
        $data['pid']=$pid;
        $data['toid']=$toid;
        $data['content']=$content;
        $data['addtime']=time();
        if($id=$model->data($data)->add()){
            $res['message']='success';
            $res['id']=$id;
            $this->ajaxReturn($res,'JSON');
            exit;
        } else{
            $res['message']='fail';
            $res['id']=0;
            $this->ajaxReturn($res,'JSON');
            exit;
        }
    }
    //异步上传图片
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
    //异步删除图片
    public function  delPic(){
        if(!IS_POST){
            echo '您无操作权限！';
            exit;
        }
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
    //赞
    public function like(){
        if(!IS_POST){
            echo '您无操作权限！';
            exit;
        }
        if(isset($_SESSION['time'])&& (time()-$_SESSION['time'])<60){
            $res['message']='wait';
            $res['rid']=0;
            $this->ajaxReturn($res,'JSON');
        }
        if(!isset($_SESSION['failtime'])){
            $_SESSION['failtime']=1;
        }else{
            $_SESSION['failtime']=$_SESSION['failtime']+1;
        }
        if($_SESSION['failtime']>5){
            $_SESSION['time']=time();
            $_SESSION['failtime']=0;
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
        $now_like=$Model->where($where)->getField('like');
        $like=$now_like+1;
        $data['like']=$like;
        if($Model->where($where)->data($data)->save()){
            $res['message']='success';
            $res['rid']=$like;
            $this->ajaxReturn($res,'JSON');
            exit;
        }else{
            $res['message']='fail';
            $res['rid']=0;
            $this->ajaxReturn($res,'JSON');
            exit;
        }

    }
    public function test(){
        $articleModel=M('article');
        $com=$articleModel->where(1)->field('id,title')->find();
        print_r($com);
        exit;
    }
}