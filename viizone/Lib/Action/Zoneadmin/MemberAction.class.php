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
class MemberAction extends CommAction {
    public function postion(){
        $this->assign('position','member');
    }
    public function index(){
        $this->lists();
    }
    //管理员列表
    public function lists(){
        $this->postion();
        $modle=M('users');
        if(isset($_POST['where']) && $_POST['where']!=""){
            $keys=$_POST['where'];
            $where['nickname']  = array("like", "%$keys%");
//            $where['email']  = array("like","%$keys%");
//            $where['mobile_phone']  = array("like","%$keys%");
//            $where['_logic'] = 'or';
        }
        import('ORG.Util.Page');// 导入分页类
        $count= $modle->where($where)->count();// 查询满足要求的总记录数
        $Page = new  Page($count, 20);// 实例化分页类 传入总记录数和每页显示的记录数
        $show = $Page->zone_show();// 分页显示输出
        //进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $adms = $modle->where($where)->order("id DESC")->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->page=$show;
        $this->admins=$adms;
        $this->display();
    }
    //添加管理员
    public function add(){
        $this->postion();
        $this->display();
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

        if(!IS_POST){
            $this->error('非法操作！');
        }
        $modle=M('users');
        if($_POST['nick_name']==''){
            $this->error('昵称不能为空！');
        }
        if(isset($_POST['password'])){
            if($_POST['password']==''){
                $this->error('密码不能为空！');
            }
            if($_POST['password']!=$_POST['repassword']){
                $this->error('两次输入的密码不一致！');
            }
        }
        $data['nickname']=trim($_POST['nick_name']);
        if(isset($_POST['password'])){
            $data['password']=md5(trim($_POST['password']));
        }
        $data['phone']=trim($_POST['phone']);
        $data['email']=trim($_POST['email']);
        $data['remark']=trim($_POST['remark']);
        $data['score']=trim($_POST['score']);
        $data['lev']=trim($_POST['lev']);
        $data['reg_time']=time();
        if($_POST['id']){
            $where['id']=$_POST['id'];
            if($modle->where($where)->data($data)->save()){
                $this->success('编辑成功！');
            }else{
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