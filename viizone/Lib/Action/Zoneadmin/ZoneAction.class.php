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
    //管理员列表
    public function shareLists(){
        $this->postion();
        $modle=M('share');
        if(isset($_POST['where']) && $_POST['where']!=""){
            $keys=$_POST['where'];
            $where['title']  = array("like", "%$keys%");
//            $where['email']  = array("like","%$keys%");
//            $where['mobile_phone']  = array("like","%$keys%");
//            $where['_logic'] = 'or';
        }
        import('ORG.Util.Page');// 导入分页类
        $count= $modle->where($where)->count();// 查询满足要求的总记录数
        $Page = new  Page($count, 20);// 实例化分页类 传入总记录数和每页显示的记录数
        $show = $Page->zone_show();// 分页显示输出
        //进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $shares = $modle->where($where)->order("id DESC")->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->page=$show;
        $this->shares=$shares;
        $this->display();
    }
    //添加管理员
    public function addshare(){
        $this->postion();
        $this->display('add');
    }

    //编辑管理员
//    public function edit(){
//        $this->postion();
//        $model=M('ad');
//        $where['id']=$_GET['id'];
//        $detail=$model->where($where)->find();
//        $this->detail=$detail;
//        $this->display();
//    }
    //管理员表单处理
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
            if($modle->where($where)->data($data)->save()){
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
    //ajax操作管理员状态、删除管理员
    public function ajax(){
        $modle=M('users');
        $act=$_POST['act'];
        $where['id']=$_POST['id'];
        switch($act){
            case'on':
                $data['lock']=0;
                break;
            case'off':
                $data['lock']=1;
                break;
        }
        if($act=='del'){
            if($modle->where($where)->delete()){
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
    public function delall(){
        $model=M('users');
        $conf=implode(',', $_POST['ids']);
        $config="(".$conf.")";
        if ($model->where("id in ".$config)->delete()){
            $this->success('批量删除成功！');
        }else {
            $this->error('批量删除失败！');
        }
    }
    public function edit(){
        $where['id']=$_GET['id'];
        $info=M('users')->where($where)->find();
        $this->info=$info;
        $this->display();
    }

}