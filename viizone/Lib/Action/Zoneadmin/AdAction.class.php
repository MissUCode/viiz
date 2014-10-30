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
class AdAction extends CommAction {
    public function postion(){
        $this->assign('position','ad');
    }
    public function index(){
        $this->lists();
    }
    //广告列表
    public function lists(){
        $this->postion();
        $modle=M('ad');
        $ads=$modle->select();
        $this->ads=$ads;
        $this->display();
    }
    //添加广告
    public function add(){
        $this->postion();
        $this->display();
    }
    //编辑广告
    public function edit(){
        $this->postion();
        $model=M('ad');
        $where['id']=$_GET['id'];
        $detail=$model->where($where)->find();
        $this->detail=$detail;
        $this->display();
    }
    //广告表单处理
    public function add_action(){
        if(!IS_POST){
            $this->error('非法操作！');
        }
        $setting = array(
            'mimes' => '', //允许上传的文件MiMe类型
            'maxSize' => 1 * 1024 * 1024, //上传的文件大小限制 (0-不做限制)
            'exts' => "jpg,png,jpeg", //允许上传的文件后缀
            'autoSub' => true, //自动子目录保存文件
            'subName' => array('date', 'Ymd'), //子目录创建方式，[0]-函数名，[1]-参数，多个参数使用数组
            'rootPath' => './Public/Uploads/', //保存根路径
            'savePath' => '', //保存路径
        );
        $modle=M('ad');
        if($_POST['title']==''){
            $this->error('广告名称不能为空！');
        }
        if($_POST['url']==''){
            $this->error('广告链接不能为空！');
        }
        $data['title']=trim($_POST['title']);
        $data['url']=trim($_POST['url']);
        $data['sort']=trim($_POST['sort']);
        $data['status']=1;
        $data['remark']=trim($_POST['remark']);
        import('ORG.Util.Upload');
        if($_FILES['pic']['error']!=4){
            $this->uploader = new Upload($setting, 'Local');
            $info = $this->uploader->upload($_FILES);
            if($info){
                $data['pic']="Public/Uploads/".$info['pic']['savepath'].$info['pic']['savename'];
            }else{
                $this->error($this->uploader->getError());
            }
        }
        if($_POST['id']){
            $where['id']=$_POST['id'];
            $info=$modle->where($where)->find();
            if($modle->where($where)->data($data)->save()){
                if(isset($data['pic'])){
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
                    $this->error('添加失败！');
            }
        }

    }
    //ajax操作广告状态、删除广告
    public function ajax(){
        $modle=M('ad');
        $act=$_POST['act'];
        $where['id']=$_POST['id'];
        switch($act){
            case'on':
                $data['status']=1;
                break;
            case'off':
                $data['status']=0;
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
    public function t(){

    }
}