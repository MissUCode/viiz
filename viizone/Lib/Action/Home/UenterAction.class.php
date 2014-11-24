<?php
/**
 * 会员公共入口控制器
 * Created by PhpStorm.
 * User: YangZhe
 * Date: 14-7-17
 * Time: 下午15:05
 */
//namespace Home\Controller;
//use Think\Controller;
class UenterAction extends IndexcomAction {
    /*
     * 首页
     * */
    public function index(){
        $this->login();
    }
    public function login(){
        $this->display('login');
    }
    public function reg(){
        $this->display('reg');
    }
    public function verycode(){
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

    public function loginAction(){
        if(!IS_POST){
            echo '110';
            exit;
        }
        if(isset($_SESSION['time'])&& (time()-$_SESSION['time'])<60){
            echo 'wait';
            exit;
        }
        if(!isset($_SESSION['failtime'])){
            $_SESSION['failtime']=1;
        }else{
            $_SESSION['failtime']=$_SESSION['failtime']+1;
        }
        if($_SESSION['failtime']>5){
            echo 'failtime';
            $_SESSION['time']=time();
            $_SESSION['failtime']=0;
            exit;
        }
        $modle=M('users');
        $uname=$_POST['username'];
        $is_emai=checkEmail($uname);
        $is_tel=checkTel($uname);
        $password=$_POST['password'];
        if($is_tel){
            $where['phone']=$uname;
        }else if($is_emai){
            $where['email']=$uname;
        }else{
            $where['nickname']=$uname;
        }
        $where['lock']=0;
       $memberinfo=$modle->where($where)->find();
        if(empty($memberinfo)){
            echo 'no-in';
            exit;
        }else{
           if($memberinfo['password']==md5($password)){
               $_SESSION['users_id']=$memberinfo['id'];
               $_SESSION['users_lev']=$memberinfo['lev']+1;
               $_SESSION['users_pic']=$memberinfo['pic'];
               if($memberinfo['nickname']!=""){
                   $_SESSION['users_name']=$memberinfo['nickname'];
               }else if($is_tel){
                   $_SESSION['users_name']=$memberinfo['phone'];
               }else if($is_emai){
                   $_SESSION['users_name']=$memberinfo['email'];
               }
              // $this->redirect('Users/index');
               echo 'ok';
               exit;

           }else{
               echo'wrong';
               exit;
           }

        }
    }
    public function regAction(){
            if(!IS_POST){
                echo 110;
                exit;
            }
            if(isset($_SESSION['time'])&& (time()-$_SESSION['time'])<60){
                echo 'wait';
                exit;
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
            $modle=M('users');
            $uname=$_POST['username'];
            $where_n['nickname']=$_POST['nickname'];
            if($_POST['nickname']==''||$_POST['username']==''||$_POST['password']==''){
                echo 'lost';
                exit;
            }
            $has_nickname=$modle->where($where_n)->find();
            if(!empty($has_nickname)){
                echo 'n-had';
                exit;
            }
            if(!checkEmail($uname)&&!checkTel($uname)){
                echo 'a-wrong';
                exit;
            }
           if(checkEmail($uname)){
               $data['email']=trim($_POST['username']);
               $where['email']=$data['email'];
               $emails=$modle->where($where)->find();
               if(!empty($emails)){
                   echo 'a-had';
                   exit;
               }
           }
           if(checkTel($uname)){
               $data['phone']=$_POST['username'];
               $where['phone']=$data['phone'];
               $mobile_phone=$modle->where($where)->find();
               if(!empty($mobile_phone)){
                   echo 'a-had';
                   exit;
               }
           }
            $data['nickname']=$_POST['nickname'];
            $data['password']=md5($_POST['password']);
            $data['score']=500;
            $data['reg_time']=time();
            $data['lock']=0;
           if($m_id=$modle->data($data)->add()){
               echo 'ok';
               exit;
           }else{
               echo 'fail';
               exit;
           }
    }

    public function checkUser(){
            $m=M('users');
            $uname=$_POST['keys'];
            $type=$_POST['type'];
            if(checkEmail($uname)){
                $where['email']=$uname;
            }else if(checkTel($uname)){
                $where['phone']=$uname;
            }else{
                $where['nickname']=$uname;
            }
            if($type=='account'){
                if(!checkEmail($uname) && !checkTel($uname)){
                    echo 2;
                    exit;
                }
            }
            $info=$m->where($where)->find();
            if(!empty($info)){
                echo 0;
                exit;
            }else{
                echo 1;
                exit;
            }
    }
    public function logout(){
        session_destroy();
        $this->redirect('Index/index');
    }
    public function printvar(){
        echo md5('verycode');
        echo "<br>";
        print_r($_SESSION);
        exit;
    }
    public function getpass(){
        $this->display();
    }
    public function email(){
        if(!IS_POST){
            echo 110;
            exit;
        }
        session_start();
        if(isset($_SESSION['time'])){
            $maxtime=time()-$_SESSION['time'];
            if($maxtime<60){
                echo 4;
                exit;
            }
        }
        $email=trim($_POST['email']);
        if(!checkEmail($email)){
            echo 2;
            exit;
        }
        $model=M('member');
        $where['email']=$email;
        $userinfo=$model->where($where)->find();
        if(empty($userinfo)){
            echo 3;
            exit;
        }
        $_SESSION['code']=rand(1000,9999);
        $_SESSION['email']=$email;
        $code=$_SESSION['code'];
        $zhuti="微搜网找回密码服务验证邮件";
        $time=date("Y-m-d",time());
        $content="尊敬的微搜网用户，您的验证码是:$code,请记住您的验证码，如非本人操作，请您及时联系网站管理员，避免造成不必要的损失。<br><br><br>";
        $content.="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;微搜网,专业的微信搜索平台！<br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$time<br>";
        $other="Nothing!";
        $username=$email;
        $ok=smtp_mail($email,$zhuti,$content,$other,$username);
        $_SESSION['time']=time();
        if($ok){
            echo 1;
            exit;
        }else{
            echo 0;
            exit;
        }
    }
    public function reset(){
       if(!IS_POST){
           $this->error('非法提交');
       }
        if(!isset($_SESSION['code']) || !isset($_SESSION['email'])){
            $this->error('请先验证您的有效邮箱，谢谢！');
        }
        $password=trim($_POST['password']);
        $repass=trim($_POST['repassword']);
        $code=trim($_POST['code']);
        if($password!=$repass){
            $this->error('密码输入不一致');
        }
        if($code!=$_SESSION['code']){
            $this->error('输入的验证码不正确！');
        }
        $model=M('member');
        $where['email']=$_SESSION['email'];
        $data['password']=md5($password);
        if($model->where($where)->data($data)->save()){
            session_destroy();
            $this->success('密码重设成功！','Uenter/index');
        }
    }
    public function  send(){
        $zhuti="密码重设验证邮件！！";
        $content="验证码：987654";
        $other="Nothing!";
        $username="yang";
        $to="451436241@qq.com";
        $ok=smtp_mail($to,$zhuti,$content,$other,$username);
        if($ok){
            echo '1111';
            exit;
        }else{
            echo '0000';
            exit;
        }
    }
}
?>