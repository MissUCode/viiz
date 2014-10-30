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
        $this->uenter();
    }
    public function maylike(){
        $spc=M('spcate');
        $spread=M('spread');
        $weixin=M('weixin');
        $where_may['title']="May_like";
        $cat_id=$spc->where($where_may)->field('cat_id')->find();
        $where_mlike['cid']=$cat_id['cat_id'];
        $where_mlike['status']=1;
        $where_mlike['end']=array('gt',time());
        $where_mlike['_logic'] = 'and';
        $may_like=D('Index')->where($where_mlike)->relation(true)->order('price DESC')->limit(0,7)->select();
        if(count($may_like)<7){
            $limit=7-count($may_like);
            if(!empty($may_like)){
                foreach($may_like as $m){
                    $wxid[]=$m['weixin_id'];
                }
                $wxids='('.implode(',',$wxid).')';
                $where_meg['id']=array('not in',$wxids);
            }else{
                $where_meg=1;
            }
            $may_megs=$weixin->where($where_meg)->field('id as weixin_id,name as weixin_name,logo,code,clicks,like')->order('clicks DESC')->limit(0,$limit)->select();
            $may_meg=$may_megs;
            if(!empty($may_like)){
                $may_like=array_merge ($may_like,$may_meg);
            }else{
                $may_like= $may_meg;
            }
        }
        $this->may_like=$may_like;
    }
    public function uenter(){
        $this->maylike();
        $this->display('enter');
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

    public function login_action(){
        if(!IS_POST){
            $this->error('非法进入领空，射掉你！');
        }
        $modle=M('member');
        $uname=$_POST['login_name'];
        $is_emai=checkEmail($uname);
        $is_tel=checkTel($uname);
        $password=$_POST['login_password'];
        if($is_tel){
            $where['mobile_phone']=$uname;
        }else if($is_emai){
            $where['email']=$uname;
        }else{
            $where['member_name']=$uname;
        }
        $where['status']=1;
       $memberinfo=$modle->where($where)->find();
        if(empty($memberinfo)){
            $this->error("用户不存在或被禁用！");
        }else{

           if($memberinfo['password']==md5($password)){

               $_SESSION['member_id']=$memberinfo['id'];
               if($memberinfo['member_name']!=""){
                   $_SESSION['member_name']=$memberinfo['member_name'];
               }else if($is_tel){
                   $_SESSION['member_name']=$memberinfo['mobile_phone'];
               }else if($is_emai){
                   $_SESSION['member_name']=$memberinfo['email'];
               }
               $this->redirect('Users/index');

           }else{
               $this->error('密码错误！');
           }

        }
    }
    public function reg_action(){
        if(!IS_POST){
            $this->error('非法进入领空，射掉你！');
        }
        import('ORG.Util.Verify');// 导入验证码类
        $Verify = new Verify();
        $modle=M('member');
        $notice=M('notice');
       if($Verify->check($_POST['code'])){
           $uname=trim($_POST['reg_name']);
            if(!checkEmail($uname)&&!checkTel($uname)){
                $this->error("用户格式错误！");
            }
           if(checkEmail($uname)){
               $data['email']=trim($_POST['reg_name']);
               $where['email']=$data['email'];
               $emails=$modle->where($where)->find();
               if(!empty($emails)){
                   $this->error("该邮箱已被注册！");
               }
           }
           if(checkTel($uname)){
               $data['mobile_phone']=trim($_POST['reg_name']);
               $where['mobile_phone']=$data['mobile_phone'];
               $mobile_phone=$modle->where($where)->find();
               if(!empty($mobile_phone)){
                   $this->error("该手机号码已被注册！");
               }
           }
            $data['password']=md5(trim($_POST['reg_password']));
            $data['score']=500;
            $data['ctime']=time();
            $data['status']=1;
           if($m_id=$modle->data($data)->add()){
               $_SESSION['member_id']=$m_id;
               $_SESSION['member_name']=$uname;
               $data_n['uid']=$m_id;
               $data_n['status']=0;
               $data_n['content']="恭喜您注册成为微搜会员，感谢您的微搜的关注与支持，微搜网已赠送您500积分。<br>
               在微搜，您可以提交您的微信账号，并且可以根据实际需求在微搜推广您的账号。<br>
               您可以进入个人中心对您的资料进行修改，您还可以每天登陆微搜签到赚取积分，
               以便在微搜推广你的微信账户，增加您的微信账号的曝光度，还等什么，赶快行动吧！";
               $data_n['ctime']=time();
               $notice->data($data_n)->add();
               $this->success("恭喜您注册成功！",U('Home/Users/index'));
           }else{
               $this->error("注册失败！");
           }
        }else{
           $this->error("验证码错误！");
        }
    }

    public function check_user(){
        $m=M('member');
        $act=$_POST['act'];
        $uname=$_POST['reg_name'];
        if($act=='reg'){
            if(checkEmail($uname)){
                $where['email']=$uname;
            }
            if(checkTel($uname)){
                $where['mobile_phone']=$uname;
            }
            if(!checkEmail($uname) && !checkTel($uname)){
                echo 2;
                exit;
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
        $this->maylike();
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