<?php
/**
 * Weixin控制器
 * Created by PhpStorm.
 * User: YangZhe
 * Date: 14-7-17
 * Time: 下午15:05
 */
//namespace Viimanager\Controller;
//use Think\Controller;
//use Think\Upload;
class WeixinAction extends CommAction {
    public function postion(){
        $this->assign('position','wx');
    }
    public function index(){
        $this->lists();
    }
    /*
     * 账号列表
     * */
    public function lists(){
        $this->postion();
        $modle=M('weixin');
        $user=M('member');
        $cate=M('cate');
        $where=array();
        if(isset($_POST['keys']) && $_POST['keys']!=""){
            $keys=$_POST['keys'];
            $where['name']  = array("like", "%$keys%");
            $where['w_name']  = array("like","%$keys%");
            $where['_logic'] = 'or';
        }
        if(isset($_POST['cid']) && $_POST['cid']!="N"){
            $where['cid'] = $_POST['cid'];
        }
        if(isset($_POST['status']) && $_POST['status']!="N"){
            $where['status'] = $_POST['status'];
        }
        $cates=$cate->select();
        $cates=tree($cates,0,0);
        import('ORG.Util.Page');// 导入分页类
        $count= $modle->where($where)->count();// 查询满足要求的总记录数
        $Page = new  Page($count, 14);// 实例化分页类 传入总记录数和每页显示的记录数
        $show = $Page->show();// 分页显示输出
        //进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $allweixins = $modle->where($where)->limit($Page->firstRow.','.$Page->listRows)->order("id DESC")->select();//getField('id,name,w_name,uid,status,ctime');//->select();
        foreach($allweixins as $wx){
            $wx['uname']=$user->where('id='.$wx['uid'])->getField('member_name');
            switch($wx['status']){
                case 1:
                    $wx['status_desc']='审核通过';
                    break;
                case 2:
                    $wx['status_desc']='等待审核';
                    break;
                case 3:
                    $wx['status_desc']='审核未通过';
                    break;
                case 0:
                    $wx['status_desc']='已禁用';
                    break;
            }
            $weixins[]=$wx;
        }
        $this->cates=$cates;
        $this->weixins=$weixins;
        $this->page=$show;
        $this->display('lists');
    }
    /*
     * 分类列表
     * */
    public function cate_lists(){
        $this->postion();
        $modle=M('cate');
        import('ORG.Util.Page');// 导入分页类
        $count= $modle->count();// 查询满足要求的总记录数
        $Page = new  Page($count, 35);// 实例化分页类 传入总记录数和每页显示的记录数
        $show = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $cates = $modle->order("sort DESC")->limit($Page->firstRow.','.$Page->listRows)->select();
        $cates=tree($cates,0,0);
        $category=array();
        foreach($cates as $c){
            if($c['pid']==0){
                $c['pname']="<b>一级分类</b>";
            }else{
                $pname=$modle->where("cat_id=".$c['pid'])->getField('cat_name');
                $c['pname']=$pname;
            }
            $category[]=$c;
        }
//        print_r($category);
//        exit;
        $this->page=$show;
        $this->cates=$category;
        $this->display();
    }
    /*
     * 添加分类
     * */
    public function add_cate(){
        $this->postion();
        $modle=M('cate');
        if(isset($_GET['cat_id'])){
           $where['cat_id']=$_GET['cat_id'];
           $cate=$modle->where($where)->find();
        }
        $cates=$modle->select();
        //$cates=Find_sons($cates,0,0);
        $cates=tree($cates,0,0);
        $this->cate=$cate;
        $this->cates=$cates;
        $this->display();
    }

    /*
     * 分类表单处理
     * */
    public function cate_action(){
        if(!IS_POST){
            $this->error('非法操作！');
        }
        $modle=M('cate');
        if(isset($_POST['act'])){
            $where['cat_id']=$_POST['id'];
            $where_sons['pid']=$_POST['id'];
            $sons=$modle->where($where_sons)->find();
            $weixin=M('weixin')->where("cid=".$_POST['id'])->find();
            if(!empty($sons)){
                echo 2;
                exit;
            }
            if(!empty($weixin)){
                echo 3;
                exit;
            }
            if($modle->where($where)->delete()){
                echo 1;
                exit;
            }else{
                echo 0;
                exit;
            }
        }
        if(!$_POST['cat_name']){
            $this->error('分类名称不为空！');
        }
        $data['cat_name']=trim($_POST['cat_name']);
        $data['pid']=$_POST['pid'];
        $data['remark']=$_POST['remark'];
        $data['sort']=$_POST['sort'];
        $data['ctime']=time();
        if($_POST['cat_id']){
                $where['cat_id']=$_POST['cat_id'];
                if($modle->where($where)->save($data)){
                    $this->success('修改成功！');
                }else{
                    $this->error('修改失败！');
                }
        }else{
                if($modle->data($data)->add()){
                    $this->success('添加成功！');
                }else{
                    $this->error('添加失败！');
                }
        }

        //$this->display();
    }
    /*
     * 添加账号
     * */
    public function add(){
        $this->postion();
        $modle=M('cate');
//        if(isset($_GET['cat_id'])){
//            $where['cat_id']=$_GET['cat_id'];
//            $cate=$modle->where($where)->find();
//        }
        $cates=$modle->select();
        $cates=tree($cates,0,0);
        $this->cates=$cates;
        $this->display();
    }
    /*
     * 微信账号表单处理
     * */
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
        $modle=M('weixin');
        $data['name']=trim($_POST['name']);
        $data['w_name']=trim($_POST['w_name']);
        $data['cid']=$_POST['cid'];
        if(isset($_POST['is_recom'])){
            $data['is_recom']=$_POST['is_recom'];
        }
        if(isset($_POST['is_hot'])){
            $data['is_hot']=$_POST['is_hot'];
        }
        if(isset($_POST['is_index'])){
            $data['is_index']=$_POST['is_index'];
        }
        if(isset($_POST['is_spread'])){
            $data['is_spread']=$_POST['is_spread'];
        }
        $data['desc']=$_POST['desc'];
        $data['remark']=$_POST['remark'];
        $data['status']=$_POST['status'];
        $data['ctime']=time();
        import('ORG.Util.Upload');
        if($_FILES['logo']['error']!=4 && $_FILES['code']['error']!=4){
            $this->uploader = new Upload($setting, 'Local');
            $info = $this->uploader->upload($_FILES);
            if($info){
                    $data['logo']="Public/Uploads/".$info['logo']['savepath'].$info['logo']['savename'];
                    $data['code']="Public/Uploads/".$info['code']['savepath'].$info['code']['savename'];
            }else{
                //exit($this->uploader->getError());
                $this->error($this->uploader->getError());
            }
        }
        if($_POST['id']){
            $where['id']=$_POST['id'];
            if($modle->where($where)->data($data)->save()){
                $this->success('编辑成功！');
            }else{
                @unlink("./".$data['logo']);
                @unlink("./".$data['code']);
                $this->error('编辑失败！');
            }
        }else{
            if($modle->data($data)->add()){
                $this->success('添加成功！');
            }else{
                @unlink("./".$data['logo']);
                @unlink("./".$data['code']);
                $this->error('添加失败！');
            }
        }

    }
   /*
    * 账号审核
    * */
    public function review(){
        $this->postion();
        $modle=M('weixin');
        $user=M('user');
        $cate=M('cate');
        $where['status']=2;
        import('ORG.Util.Page');// 导入分页类
        $count= $modle->where($where)->count();// 查询满足要求的总记录数
        $Page = new  Page($count, 14);// 实例化分页类 传入总记录数和每页显示的记录数
        $show = $Page->show();// 分页显示输出
        //进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $allweixins = $modle->where($where)->limit($Page->firstRow.','.$Page->listRows)->order("id DESC")->select();//getField('id,name,w_name,uid,status,ctime');//->select();
        foreach($allweixins as $wx){
            $wx['uname']=$user->where('id='.$wx['uid'])->getField('username');
            $wx['status_desc']="等待审核";
            $weixins[]=$wx;
        }
        $this->weixins=$weixins;
        $this->page=$show;
        $this->display();
    }
    /*
     * 查看账号，账号详细
     * */
    public function detail(){
        $this->postion();
        $modle=M('weixin');
        $cate=M('cate');
        $where['id']=$_GET['id'];
        $detail=$modle->where($where)->find();
        switch($detail['status']){
            case 1:
                $detail['status_desc']="审核通过";
                break;
            case 2:
                $detail['status_desc']="等待审核";
                break;
            case 3:
                $detail['status_desc']="审核未通过";
                break;
            case 0:
                $detail['status_desc']="已禁用";
                break;
        }
        $detail['cat_name']=$cate->where("cat_id=".$detail['cid'])->getField("cat_name");
        $detail['username']=M('member')->where("id=".$detail['uid'])->getField("member_name");
        $weixin=$modle->where('uid='.$detail['uid'])->limit(5)->getField("name,w_name,ctime");
        $this->detail=$detail;
        $this->weixin=$weixin;
        $this->display();
    }

    /*
     * 账号状态改变
     * */
    public function change_status(){
        $where['id']=$_POST['id'];
        $act=$_POST['act'];
        $modle=M('weixin');
        switch($act){
            case 'on':
                $data['status']=1;
                break;
            case 'off':
                $data['status']=0;
                break;
            case 'wait':
                $data['status']=2;
                break;
            case 'not':
                $data['status']=3;
                break;
        }
        if($modle->where($where)->data($data)->save()){
            echo 1;
            exit;
        }else{
            echo 0;
            exit;
        }
    }

    public function review_action(){
        $modle=M('weixin');
        $where['id']=$_POST['id'];
        $act=$_POST['act'];
        switch($act){
            case 'no-pass':
                $data['status']=3;
                break;
            case 'pass':
                $data['status']=1;
                break;
            case 'off':
                $data['status']=0;
                break;
        }
        if($modle->where($where)->data($data)->save()){
            echo 1;
            exit;
        }else{
            echo 0;
            exit;
        }
    }
    public function change_is(){
        $where['id']=$_POST['id'];
        $val=$_POST['value'];
        $field=$_POST['field'];
        $modle=M('weixin');
        switch($field){
            case 'is_index':
                $data['is_index']=$val;
                break;
            case 'is_hot':
                $data['is_hot']=$val;
                break;
            case 'is_recom':
                $data['is_recom']=$val;
                break;
        }
        if($modle->where($where)->data($data)->save()){
            echo 1;
            exit;
        }else{
            echo 0;
            exit;
        }
    }

    public function edit(){
        $this->postion();
        $weixin=M('weixin');
        $modle=M('cate');
        $where['id']=$_GET['id'];
        $detail=$weixin->where($where)->find();
        $cates=$modle->select();
        $cates=tree($cates,0,0);
        $this->cates=$cates;
        $this->detail=$detail;
        $this->display();
    }
    public function delete_wx(){
        $where['id']=$_POST['id'];
        $modle=M('weixin');
        $weixin=$modle->where($where)->find();
        if($modle->where($where)->delete()){
            @unlink("./".$weixin['logo']);
            @unlink("./".$weixin['code']);
            echo 1;
            exit;
        }else{
            echo 0;
            exit;
        }
    }
    public function t(){
        $config = array(
            'fontSize' => 18, // 验证码字体大小
            'length' => 4, // 验证码位数
            'imageH' => 34,
            'imageW' => 140,
        );
        import('ORG.Util.Verify');// 导入验证码类
        $Verify = new Verify($config);
        $Verify->entry();

    }
}