<?php
/**
 * Adm控制器
 * Created by PhpStorm.
 * User: YangZhe
 * Date: 14-7-17
 * Time: 下午15:05
 * 版权所有 青椒
 */
//namespace Viimanager\Controller;
//use Think\Controller;
class ZoneAction extends CommAction {
    public function postion(){
        $this->assign('position','zone');
    }
    public function index(){
        $this->lists();
    }
    //分享圈列表
    public function shareLists(){
        $this->postion();
        $modle=M('share');
        $user=M('users');
        $varcount=0;
        if(isset($_POST['title']) && $_POST['title']!=""){
            $keys=$_POST['title'];
            $where['title']  = array("like", "%$keys%");
            $varcount=$varcount+1;
//            $where['email']  = array("like","%$keys%");
//            $where['mobile_phone']  = array("like","%$keys%");
//            $where['_logic'] = 'or';
        }
        if(isset($_POST['is_check']) && $_POST['is_check']<2){
            $where['is_check']=$_POST['is_check'];
            $varcount=$varcount+1;
        }
        if(isset($_POST['status']) && $_POST['status']<2){
            $where['status']=$_POST['status'];
            $varcount=$varcount+1;
        }
        if($varcount>1){
            $where['_logic'] = 'and';
        }
        import('ORG.Util.Page');// 导入分页类
        $count= $modle->where($where)->count();// 查询满足要求的总记录数
        $Page = new  Page($count, 20);// 实例化分页类 传入总记录数和每页显示的记录数
        $show = $Page->zone_show();// 分页显示输出
        //进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $share = $modle->where($where)->order("id DESC")->limit($Page->firstRow.','.$Page->listRows)->select();
        foreach($share as $s){
            $m_where['id']=$s['uid'];
            if($s['member']){
                $arr=explode(',',$s['member']);
                $count=count($arr);
                $s['member']=$count;
            }else{
                $s['member']=0;
            }
            $uname=$user->where($m_where)->getField('nickname');
            if(!$uname){
                $s['uid']='小青椒';
            }else{
                $s['uid']=$uname;
            }
            $shares[]=$s;
        }
        $this->page=$show;
        $this->shares=$shares;
        $this->display();
    }
    //添加分享圈
    public function addshare(){
        $this->postion();
        $this->display('add');
    }

    //分享圈表单处理
    public function add_action(){
        $setting = array(
            'mimes' => '', //允许上传的文件MiMe类型
            'maxSize' => 1 * 1024 * 1024, //上传的文件大小限制 (0-不做限制)
            'exts' => "jpg,png,jpeg", //允许上传的文件后缀
            'autoSub' => true, //自动子目录保存文件
            'subName' => array('date', 'Ymd'), //子目录创建方式，[0]-函数名，[1]-参数，多个参数使用数组
            'rootPath' => './Public/Uploads/', //保存根路径
            'savePath' => '', //保存路径
        );
        $modle=M('share');
        $data['title']=trim($_POST['title']);
        if(isset($_POST['is_tj'])){
            $data['is_tj']=$_POST['is_tj'];
        }
        if(isset($_POST['is_hot'])){
            $data['is_hot']=$_POST['is_hot'];
        }
        if(isset($_POST['is_top'])){
            $data['is_top']=$_POST['is_top'];
        }
        $data['desc']=$_POST['desc'];
        $data['remark']=$_POST['remark'];
        $data['ctime']=time();
        import('ORG.Util.Upload');
        if($_FILES['pic']['error']!=4 && $_FILES['pic']['error']!=4){
            $this->uploader = new Upload($setting, 'Local');
            $info = $this->uploader->upload($_FILES);
            if($info){
                $data['pic']="Public/Uploads/".$info['pic']['savepath'].$info['pic']['savename'];
                //$data['code']="Public/Uploads/".$info['code']['savepath'].$info['code']['savename'];
            }else{
                //exit($this->uploader->getError());
                $this->error($this->uploader->getError());
            }
        }
        if($_POST['id']){
            $where['id']=$_POST['id'];
            $info=$modle->where($where)->find();
            if($modle->where($where)->data($data)->save()){
                if($data['pic']){
                    @unlink("./".$info['pic']);
                }
                $this->success('编辑成功！');
            }else{
                @unlink("./".$data['pic']);
                $this->error('编辑失败！');
            }
        }else{
            if($modle->data($data)->add()){
                $this->success('添加成功！');
            }else{
                @unlink("./".$data['pic']);
                $this->error('添加失败！');
            }
        }


    }
    //ajax操作分享圈状态、删除分享圈
    public function ajax(){
        $modle=M('share');
        $act=$_POST['act'];
        $where['id']=$_POST['id'];
        switch($act){
            case'on':
            $data['lock']=0;
            break;
            case'off':
                $data['lock']=1;
                break;
            case'pass':
                $data['is_check']=1;
                $data['status']=1;
                break;
            case'nopass':
                $data['is_check']=1;
                $data['status']=0;
                break;
            case'top_on':
                $data['is_top']=1;
                break;
            case'top_off':
                $data['is_top']=0;
                break;
            case'hot_on':
                $data['is_hot']=1;
                break;
            case'hot_off':
                $data['is_hot']=0;
                break;
            case'tj_on':
                $data['is_tj']=1;
                break;
            case'tj_off':
                $data['is_tj']=0;
                break;
        }
        if($act=='del'){
            $info=$modle->where($where)->find();
            if($modle->where($where)->delete()){
                @unlink("./".$info['pic']);
                echo 1;
                exit;
            }else{
                echo 0;
                exit;
            }
        }
        if($modle->where($where)->data($data)->save()){
            echo 1;
            exit;
        }else{
            echo 0;
            exit;
        }
    }

    //批量操作
    public function delall(){
        $model=M('share');
        $conf=implode(',', $_POST['ids']);
        $act=$_POST['act'];
        $config="(".$conf.")";
        switch($act){
            case'del':
                $infos=$model->where("id in ".$config)->select();
                if ($model->where("id in ".$config)->delete()){
                    foreach($infos as $info){
                        @unlink("./".$info['pic']);
                    }
                    $this->success('批量删除成功！');
                }else {
                    $this->error('批量删除失败！');
                }
                break;
            case'pass':
                $data['status']=1;
                $data['is_check']=1;
                if($model->where("id in ".$config)->data($data)->save()){
                    $this->success('已经批量通过！');
                }else{
                    $this->error('批量审核失败！');
                }
                break;
            case'nopass':
                $data['status']=0;
                $data['is_check']=1;
                if($model->where("id in ".$config)->data($data)->save()){
                    $this->success('已经批量不通过！');
                }else{
                    $this->error('批量审核失败！');
                }
                break;
        }



    }
    //编辑分享圈
    public function edit(){
        $where['id']=$_GET['id'];
        $info=M('share')->where($where)->find();
        $this->info=$info;
        $this->display();
    }
    //帖子列表
    public function  articleLists(){
        $this->postion();
        $modle=M('article');
        $sh=M('share');
        $users=M('users');
        $varcount=0;
        if(isset($_POST['title']) && $_POST['title']!=""){
            $keys=$_POST['title'];
            $where['title']  = array("like", "%$keys%");
            $varcount=$varcount+1;
//            $where['email']  = array("like","%$keys%");
//            $where['mobile_phone']  = array("like","%$keys%");
//            $where['_logic'] = 'or';
        }
        if(isset($_POST['is_check']) && $_POST['is_check']<2){
            $where['is_check']=$_POST['is_check'];
            $varcount=$varcount+1;
        }
        if(isset($_POST['status']) && $_POST['status']<2){
            $where['status']=$_POST['status'];
            $varcount=$varcount+1;
        }
        if($varcount>1){
            $where['_logic'] = 'and';
        }
        import('ORG.Util.Page');// 导入分页类
        $count= $modle->where($where)->count();// 查询满足要求的总记录数
        $Page = new  Page($count, 20);// 实例化分页类 传入总记录数和每页显示的记录数
        $show = $Page->zone_show();// 分页显示输出
        //进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $share = $modle->where($where)->order("id DESC")->limit($Page->firstRow.','.$Page->listRows)->select();
        foreach($share as $s){
            $m_where['id']=$s['sid'];
            $u_where['id']=$s['uid'];
            $catename=$sh->where($m_where)->getField('title');
            $uname=$users->where($u_where)->getField('nickname');
            if(!$catename){
                $s['sid']='无分类';
            }else{
                $s['sid']=$catename;
            }
            if(!$uname){
                $s['uid']='系统添加';
            }else{
                $s['uid']=$uname;
            }
            $shares[]=$s;
        }
        $this->page=$show;
        $this->shares=$shares;
        $this->display();
    }
    //添加帖子
    public function  addArticle(){
        $this->postion();
        $shareModel=M('share');
        $shares=$shareModel->field('id,title')->select();
        $this->shares=$shares;
        $this->display();
    }
    //帖子表单处理
    public function article_action(){
        $setting = array(
            'mimes' => '', //允许上传的文件MiMe类型
            'maxSize' => 1 * 1024 * 1024, //上传的文件大小限制 (0-不做限制)
            'exts' => "jpg,png,jpeg", //允许上传的文件后缀
            'autoSub' => true, //自动子目录保存文件
            'subName' => array('date', 'Ymd'), //子目录创建方式，[0]-函数名，[1]-参数，多个参数使用数组
            'rootPath' => './Public/Uploads/', //保存根路径
            'savePath' => '', //保存路径
        );
        $modle=M('article');
        if($_POST['title']==''|| $_POST['content']==''|| $_POST['sid']<1){
            $this->error('请填写完整的信息！');
        }
        $data['title']=trim($_POST['title']);
        if(isset($_POST['is_tj'])){
            $data['is_tj']=$_POST['is_tj'];
        }
        if(isset($_POST['is_hot'])){
            $data['is_hot']=$_POST['is_hot'];
        }
        if(isset($_POST['is_top'])){
            $data['is_top']=$_POST['is_top'];
        }
        $data['content']=$_POST['content'];
        $data['sid']=$_POST['sid'];
        $data['addtime']=time();
        import('ORG.Util.Upload');
        if($_FILES['pic']['error']!=4 && $_FILES['pic']['error']!=4){
            $this->uploader = new Upload($setting, 'Local');
            $info = $this->uploader->upload($_FILES);
            if($info){
                $data['pics']="Public/Uploads/".$info['pic']['savepath'].$info['pic']['savename'];
                //$data['code']="Public/Uploads/".$info['code']['savepath'].$info['code']['savename'];
            }else{
                //exit($this->uploader->getError());
                $this->error($this->uploader->getError());
            }
        }
        if($_POST['id']){
            $where['id']=$_POST['id'];
            $info=$modle->where($where)->find();
            if($modle->where($where)->data($data)->save()){
                if($data['pics']){
                    @unlink("./".$info['pics']);
                }
                $this->success('编辑成功！');
            }else{
                @unlink("./".$data['pics']);
                $this->error('编辑失败！');
            }
        }else{
            if($modle->data($data)->add()){
                $this->success('添加成功！');
            }else{
                @unlink("./".$data['pics']);
                $this->error('添加失败！');
            }
        }
    }
    //查找分享圈ajax
    public function find(){
        $model=M('share');
        $keys=trim($_POST['thesid']);
        $where['title']  = array("like", "%$keys%");
        $select=$model->where($where)->field('id,title')->select();
        $this->ajaxReturn($select,'json');
    }
    //ajax操作帖子状态、删除帖子
    public function article_ajax(){
        $modle=M('article');
        $act=$_POST['act'];
        $where['id']=$_POST['id'];
        switch($act){
            case'on':
                $data['lock']=0;
                break;
            case'off':
                $data['lock']=1;
                break;
            case'pass':
                $data['is_check']=1;
                $data['status']=1;
                break;
            case'nopass':
                $data['is_check']=1;
                $data['status']=0;
                break;
            case'top_on':
                $data['is_top']=1;
                break;
            case'top_off':
                $data['is_top']=0;
                break;
            case'hot_on':
                $data['is_hot']=1;
                break;
            case'hot_off':
                $data['is_hot']=0;
                break;
            case'tj_on':
                $data['is_tj']=1;
                break;
            case'tj_off':
                $data['is_tj']=0;
                break;
        }
        if($act=='del'){
            $info=$modle->where($where)->find();
            if($modle->where($where)->delete()){
                @unlink("./".$info['pics']);
                echo 1;
                exit;
            }else{
                echo 0;
                exit;
            }
        }
        if($modle->where($where)->data($data)->save()){
            echo 1;
            exit;
        }else{
            echo 0;
            exit;
        }
    }
    //批量操作帖子
    public function article_delall(){
        $model=M('article');
        $conf=implode(',', $_POST['ids']);
        $act=$_POST['act'];
        $config="(".$conf.")";
        switch($act){
            case'del':
                $infos=$model->where("id in ".$config)->select();
                if ($model->where("id in ".$config)->delete()){
                    foreach($infos as $info){
                        @unlink("./".$info['pics']);
                    }
                    $this->success('批量删除成功！');
                }else {
                    $this->error('批量删除失败！');
                }
                break;
            case'pass':
                $data['status']=1;
                $data['is_check']=1;
                if($model->where("id in ".$config)->data($data)->save()){
                    $this->success('已经批量通过！');
                }else{
                    $this->error('批量审核失败！');
                }
                break;
            case'nopass':
                $data['status']=0;
                $data['is_check']=1;
                if($model->where("id in ".$config)->data($data)->save()){
                    $this->success('已经批量不通过！');
                }else{
                    $this->error('批量审核失败！');
                }
                break;
        }
    }
    //编辑帖子
    public function editArticle(){
        $where['id']=$_GET['id'];
        $info=M('article')->where($where)->find();
        $shareModel=M('share');
        $shares=$shareModel->field('id,title')->select();
        $this->shares=$shares;
        $this->info=$info;
        $this->display();
    }
    //添加评论
    public function addComment(){
        $aid=$_GET['aid'];
        $where['id']=$aid;
        $Model=M('article');
        $sid=$Model->where($where)->getField('sid');
        $this->aid=$aid;
        $this->sid=$sid;
        $this->display();
    }

    //帖子表单处理
    public function comment_action(){
        $setting = array(
            'mimes' => '', //允许上传的文件MiMe类型
            'maxSize' => 1 * 1024 * 1024, //上传的文件大小限制 (0-不做限制)
            'exts' => "jpg,png,jpeg", //允许上传的文件后缀
            'autoSub' => true, //自动子目录保存文件
            'subName' => array('date', 'Ymd'), //子目录创建方式，[0]-函数名，[1]-参数，多个参数使用数组
            'rootPath' => './Public/Uploads/', //保存根路径
            'savePath' => '', //保存路径
        );
        $modle=M('comment');
        if($_POST['content']==''|| $_POST['sid']<1){
            $this->error('请填写评论内容！');
        }
        $data['content']=$_POST['content'];
        $data['sid']=$_POST['sid'];
        $data['aid']=$_POST['aid'];
        $data['addtime']=time();
        import('ORG.Util.Upload');
        if($_FILES['pic']['error']!=4 && $_FILES['pic']['error']!=4){
            $this->uploader = new Upload($setting, 'Local');
            $info = $this->uploader->upload($_FILES);
            if($info){
                $data['pics']="Public/Uploads/".$info['pic']['savepath'].$info['pic']['savename'];
                //$data['code']="Public/Uploads/".$info['code']['savepath'].$info['code']['savename'];
            }else{
                //exit($this->uploader->getError());
                $this->error($this->uploader->getError());
            }
        }
        if($_POST['id']){
            $where['id']=$_POST['id'];
            $info=$modle->where($where)->find();
            if($modle->where($where)->data($data)->save()){
                if($data['pics']){
                    @unlink("./".$info['pics']);
                }
                $this->success('编辑成功！');
            }else{
                @unlink("./".$data['pics']);
                $this->error('编辑失败！');
            }
        }else{
            if($modle->data($data)->add()){
                $this->success('添加成功！');
            }else{
                @unlink("./".$data['pics']);
                $this->error('添加失败！');
            }
        }
    }

    public function comment(){
        $where['aid']=$_GET['aid'];
        if(isset($_GET['is_check'])&&$_GET['is_check']==0){
            $where['is_check']=0;
        }
        $model=M('comment');
        import('ORG.Util.Page');// 导入分页类
        $count= $model->where($where)->count();// 查询满足要求的总记录数
        $Page = new  Page($count, 10);// 实例化分页类 传入总记录数和每页显示的记录数
        $show = $Page->zone_show();// 分页显示输出
        //进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $comments = $model->where($where)->order("id DESC")->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->page=$show;
        $this->comments=$comments;
        $this->postion();
        $this->display();
    }
    public function commentLists(){
        $where['is_check']=0;
        $model=M('comment');
        import('ORG.Util.Page');// 导入分页类
        $count= $model->where($where)->count();// 查询满足要求的总记录数
        $Page = new  Page($count, 10);// 实例化分页类 传入总记录数和每页显示的记录数
        $show = $Page->zone_show();// 分页显示输出
        //进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $comments = $model->where($where)->order("id DESC")->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->page=$show;
        $this->comments=$comments;
        $this->postion();
        $this->display();
    }
    //ajax操作评论状态、删除评论
    public function comment_ajax(){
        $modle=M('comment');
        $act=$_POST['act'];
        $where['id']=$_POST['id'];
        switch($act){
            case'on':
                $data['status']=1;
                $data['is_check']=1;
                break;
            case'off':
                $data['status']=0;
                $data['is_check']=1;
                break;
            case'pass':
                $data['is_check']=1;
                $data['status']=1;
                break;
            case'nopass':
                $data['is_check']=1;
                $data['status']=0;
                break;
            case'good':
                $infos=$modle->where($where)->getField('aid');
                $where_info['aid']=$infos;
                $data_info['is_good']=0;
                $modle->where($where_info)->data($data_info)->save();
                $data['is_good']=1;
                break;
            case'top_on':
                $data['is_top']=1;
                break;
            case'top_off':
                $data['is_top']=0;
                break;
            case'hot_on':
                $data['is_hot']=1;
                break;
            case'hot_off':
                $data['is_hot']=0;
                break;
            case'tj_on':
                $data['is_tj']=1;
                break;
            case'tj_off':
                $data['is_tj']=0;
                break;
        }
        if($act=='del'){
            $info=$modle->where($where)->find();
            if($modle->where($where)->delete()){
                @unlink("./".$info['pics']);
                echo 1;
                exit;
            }else{
                echo 0;
                exit;
            }
        }
        if($modle->where($where)->data($data)->save()){
            echo 1;
            exit;
        }else{
            echo 0;
            exit;
        }
    }
    //批量操作评论
    public function comment_delall(){
        $model=M('comment');
        $conf=implode(',', $_POST['ids']);
        $act=$_POST['act'];
        $config="(".$conf.")";
        switch($act){
            case'del':
                $infos=$model->where("id in ".$config)->select();
                if ($model->where("id in ".$config)->delete()){
                    foreach($infos as $info){
                        @unlink("./".$info['pics']);
                    }
                    $this->success('批量删除成功！');
                }else {
                    $this->error('批量删除失败！');
                }
                break;
            case'pass':
                $data['status']=1;
                $data['is_check']=1;
                if($model->where("id in ".$config)->data($data)->save()){
                    $this->success('已经批量通过！');
                }else{
                    $this->error('批量审核失败！');
                }
                break;
            case'nopass':
                $data['status']=0;
                $data['is_check']=1;
                if($model->where("id in ".$config)->data($data)->save()){
                    $this->success('已经批量不通过！');
                }else{
                    $this->error('批量审核失败！');
                }
                break;
        }
    }

    //留言管理
    public function feedback(){
        $model=M('feedback');
        import('ORG.Util.Page');// 导入分页类
        $count= $model->count();// 查询满足要求的总记录数
        $Page = new  Page($count, 10);// 实例化分页类 传入总记录数和每页显示的记录数
        $show = $Page->zone_show();// 分页显示输出
        //进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $comments = $model->order("id DESC")->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->page=$show;
        $this->comments=$comments;
        $this->postion();
        $this->display();
    }

}