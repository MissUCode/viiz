<?php
/**
 * Admin控制器
 * Created by PhpStorm.
 * User: YangZhe
 * Date: 14-7-17
 * Time: 下午15:05
 */
//namespace Viimanager\Controller;
//use Think\Controller;
class EnterAction extends Action {
    /*
     * 登陆
     * */
    public function login(){
	   $this->display();
    }
    /*
     * 登陆验证
     * */
    public function login_act(){
        if(!IS_POST){
            $this->error('非法操作');
        }
        $modle=M('admin');
        $where['admin_name']=trim($_POST['username']);
        $where['lock']=0;
        $password=md5(trim($_POST['password']));
        if($_POST['username']==''||$_POST['password']==''){
            $this->error('用户名和密码均不能为空！');
        }
        $in_user=$modle->where($where)->find();
        if(!empty($in_user)){
            if($in_user['password']==$password){
                $_SESSION['admin_id']=$in_user['id'];
                $_SESSION['admin_name']=$in_user['admin_name'];
                $_SESSION['lever']=$in_user['lev'];
                $this->redirect('Index/index');
            }else{
                $this->error('密码不正确！');
            }
        }else{
            $this->error('用户不存在或被禁用！');
        }


    }
    public function logout(){
        session_destroy();
        $this->display('login');
    }

}