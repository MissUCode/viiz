<?php
/**
 * Users控制器
 * Created by PhpStorm.
 * User: YangZhe
 * Date: 14-7-17
 * Time: 下午15:05
 */
//namespace Home\Controller;
//use Think\Controller;
//use Think\Upload;
class UsersAction extends UcommAction {
    /*
     * 首页
     * */
    public function index(){
       $this->position="index";
	   $this->display();
    }
    //修改个人信息
    public function profile(){
        $this->position="profile";
        $modle=M("member");
        $where['id']=$_SESSION['member_id'];
        $mem_info=$modle->where($where)->find();
        $this->infos=$mem_info;
        $this->display();
    }
    //我的账号
    public function account(){
        $this->position="account";
        $model=M('weixin');
        $where['uid']=$_SESSION['member_id'];
        import('ORG.Util.Page');// 导入分页类
        $count= $model->where($where)->count();// 查询满足要求的总记录数
        $Page       = new Page($count,6);// 实例化分页类 传入总记录数和每页显示的记录数
        $show = $Page->vii_show();// 分页显示输出
        //进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $weixins=$model->field('id,name,status,ctime,clicks')->where($where)->limit($Page->firstRow.','.$Page->listRows)->order("id DESC")->select();
        $this->page=$show;
        $this->weixins=$weixins;
        $this->display();
    }
    //我的推广
    public function spread(){
        $this->position="spread";
        $model=D('Spread');
        $where['uid']=$_SESSION['member_id'];
        import('ORG.Util.Page');// 导入分页类
        $count= $model->where($where)->count();// 查询满足要求的总记录数
        $Page       = new Page($count,6);// 实例化分页类 传入总记录数和每页显示的记录数
        $show = $Page->vii_show();// 分页显示输出
        $mysp=$model->field('id,cid,status,ctime,start,end,wx_id')->where($where)->limit($Page->firstRow.','.$Page->listRows)->order("id DESC")->relation(true)->select();
        $this->page=$show;
        $this->spreads=$mysp;
        $this->display();
    }
    //我的积分
    public function score(){
        $member=M('member');
        $check=M('check');
        $score=M('score');
        $where['id']=$_SESSION['member_id'];
        $member_infos=$member->where($where)->find();
        $check_where['uid']=$_SESSION['member_id'];
        $check_where['time']=date('Y-m-d',time());
        $is_check=$check->where($check_where)->find();
        if(!empty($is_check)){
            $had_check=1;
        }else{
            $had_check=0;
        }
        $where_get['type']=1;
        $where_get['uid']=$_SESSION['member_id'];
        import('ORG.Util.Page');// 导入分页类
        $count_get= $score->where($where_get)->count();// 查询满足要求的总记录数
        $Page_get = new Page($count_get, 10);// 实例化分页类 传入总记录数和每页显示的记录数
        $show_get = $Page_get->vii_show();// 分页显示输出
        $gets=$score->where($where_get)->limit($Page_get->firstRow.','.$Page_get->listRows)->order("id DESC")->select();
        $where_use['type']=0;
        $where_use['uid']=$_SESSION['member_id'];
        $count_use= $score->where($where_use)->count();// 查询满足要求的总记录数
        $Page_use = new Page($count_use, 10);// 实例化分页类 传入总记录数和每页显示的记录数
        $show_use = $Page_get->vii_show();// 分页显示输出
        $uses=$score->where($where_use)->limit($Page_use->firstRow.','.$Page_use->listRows)->order("id DESC")->select();
        $this->page_get=$show_get;
        $this->page_use=$show_use;
        $this->gets=$gets;
        $this->uses=$uses;
        $this->position="score";
        $this->userinfo=$member_infos;
        $this->had_check=$had_check;
        $this->display();
    }
    //系统通知
    public function notice(){
        $notice=M('notice');
        $where['uid']=$_SESSION['member_id'];
        import('ORG.Util.Page');// 导入分页类
        $count= $notice->where($where)->count();// 查询满足要求的总记录数
        $Page = new Page($count, 6);// 实例化分页类 传入总记录数和每页显示的记录数
        $show = $Page->vii_show();// 分页显示输出
        $notices=$notice->where($where)->limit($Page->firstRow.','.$Page->listRows)->order("id DESC")->select();
        $this->page=$show;
        $this->notices=$notices;
        $this->position="notice";
        $this->display();
    }
    //删除通知
    public function del_notice(){
        $notice=M('notice');
        $where['id']=$_POST['id'];
        $where['uid']=$_SESSION['member_id'];
        if($notice->where($where)->delete()){
            echo 1;
            exit;
        }else{
            echo 0;
            exit;
        }

    }
    //读取系统通知
    public function read(){
        $notice=M('notice');
        $where['id']=$_GET['id'];
        $where['uid']=$_SESSION['member_id'];
        $data['status']=1;
        $detail=$notice->where($where)->find();
        $notice->where($where)->data($data)->save();
        $this->detail=$detail;
        $this->display();
    }
    //全部删除系统消息
    public function deleteall(){
        $notice=M('notice');
        $id=implode(',',$_POST['notice_id']);
        $where['uid']  = $_SESSION['member_id'];
        $where['id']  = array("in","$id");
        $where['_logic'] = 'and';
        if($notice->where($where)->delete()){
            $this->success("数据删除成功！");
        }else{
            $this->error("数据删除失败！");
        }
    }
    //签到
    public function check(){
        $member=M('member');
        $check=M('check');
        $score=M('score');
        $where['uid']=$_SESSION['member_id'];
        $where['time']=date('Y-m-d',time());
        $had_check=$check->where($where)->find();
        if(!empty($had_check)){
            echo 0;
            exit;
        }

        $where_mem['id']=$_SESSION['member_id'];
        $mem_info=$member->where($where_mem)->find();
        $data['uid']=$_SESSION['member_id'];
        $data['time']=date('Y-m-d',time());
        $data_mem['score']=$mem_info['score']+2;
        $data_sc['type']=1;
        $data_sc['score']=2;
        $data_sc['uid']=$_SESSION['member_id'];
        $data_sc['remark']="签到获取积分";
        $data_sc['ctime']=time();
        if($check->data($data)->add()){
            $member->where($where_mem)->data($data_mem)->save();
            $score->data($data_sc)->add();
            echo 1;
            exit;
        }else{
            echo 0;
            exit;
        }
    }
    //添加微信账号
    public function add(){
        $this->position="index";
        $cate=M('cate');
        $cates=$cate->select();
        $cates=tree($cates,0,0);
        $this->cates=$cates;
        $this->display();
    }
    //添加、编辑、删除微信账号表单处理
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
        $cate=M('cate');
        if(!IS_POST){
            $this->error('非法提交数据');
        }
        //分类子类查询ajax
        if(isset($_POST['cid'])){
            $c['pid']=$_POST['cid'];
            $has_sons=$cate->where($c)->find();
            if(!empty($has_sons)){
                echo 1;
                exit;
            }else{
                echo 0;
                exit;
            }
        }

        $where_c['pid']=$_POST['cat_id'];
        $has_son=$cate->where($where_c)->find();
        if(!empty($has_son)){
            $this->error("所属分类选择有误");
        }
        $act=$_POST['act'];
        //删除账号ajax
        if($act=='delete'){
            $where['id']=$_POST['id'];
            $sp=M('spread');
            $chat=M('caht');
            $where_sp['wx_id']=$_POST['id'];
            $where_ch['wx_id']=$_POST['id'];
            $wx_info=$modle->where($where)->find();
            if($modle->where($where)->delete()){
                @unlink("./".$wx_info['logo']);
                @unlink("./".$wx_info['code']);
                $sp->where($where_sp)->delete();
                $chat->where($where_ch)->delete();
                echo 1;
                exit;
            }else{
                echo 0;
                exit;
            }
        }
        $data['name']=trim($_POST['name']);
        $data['w_name']=trim($_POST['wx_name']);
        $data['cid']=trim($_POST['cat_id']);
        $data['keys']=trim($_POST['keysword']);
        $data['desc']=trim($_POST['description']);
        $data['remark']=trim($_POST['remark']);
        $data['uid']=$_SESSION['member_id'];
        $data['ctime']=time();
        import('ORG.Util.Upload');
        if($_FILES['logo_pic']['error']!=4 || $_FILES['code_pic']['error']!=4){
            $this->uploader = new Upload($setting, 'Local');
            $info = $this->uploader->upload($_FILES);
            if($info){
                if($info['code_pic']){
                    $data['code']="Public/Uploads/".$info['code_pic']['savepath'].$info['code_pic']['savename'];
                }
                if($info['logo_pic']){
                    $data['logo']="Public/Uploads/".$info['logo_pic']['savepath'].$info['logo_pic']['savename'];
                }
            }else{
                //exit($this->uploader->getError());
                $this->error($this->uploader->getError());
            }
        }
        if($act=='add'){
            $data['status']=2;
            if($modle->data($data)->add()){
                $this->success("添加成功,耐心等待审核！");
            }else{
                $this->error("添加失败！");
            }
        }
       if($act=='edit'){
           $where['id']=$_POST['id'];
           $detail=$modle->where($where)->find();
           $data['status']=$detail['status'];
           if($modle->where($where)->data($data)->save()){
               if(isset($data['logo'])){
                   @unlink("./".$detail['logo']);
               }
               if(isset($data['code'])){
                   @unlink("./".$detail['code']);
               }
               $this->success("编辑成功！");
           }else{
              $this->error("编辑失败！");
           }
       }

    }
    //编辑微信账号
    public function edit(){
        $this->position="index";
        $cate=M('cate');
        $weixin=M('weixin');
        $where['id']=$_GET['id'];
        $cates=$cate->select();
        $cates=tree($cates,0,0);
        $infos=$weixin->where($where)->find();
        if($infos['uid']!=$_SESSION['member_id']){
            $this->error('非法侵入钓鱼岛！',U('Home/Users/index'));
        }
        $this->infos=$infos;
        $this->cates=$cates;
        $this->display();
    }
    //修改个人信息表单处理
    public function profile_action(){
        if(!IS_POST){
            $this->error('非法进入领空，射掉你！');
        }
        $modle=M('member');
        $act=$_POST['act'];
        $where['id']=$_SESSION['member_id'];
        if($act=="edit"){
           $mem_name=trim($_POST['uname']);
           $email=trim($_POST['email']);
           $mobile_phone=trim($_POST['phone']);
           $company=trim($_POST['company']);
           $is_in_username=$modle->where("member_name='".$mem_name."' AND id<>".$_SESSION['member_id'])->find();
           $is_in_email=$modle->where("email='".$email."' AND id<>".$_SESSION['member_id'])->find();
           $is_in_phone=$modle->where("mobile_phone='".$mobile_phone."' AND id<>".$_SESSION['member_id'])->find();
           if(!empty($is_in_username)){
               $this->error("用户名已被注册！");
           }
            if(!empty($is_in_email)){
                $this->error("邮箱已被注册！");
            }
            if(!empty($is_in_phone)){
                $this->error("手机号码已被注册！");
            }
            $data['member_name']=$mem_name;
            $data['email']=$email;
            $data['mobile_phone']=$mobile_phone;
            $data['company']=$company;
            if($modle->where($where)->data($data)->save()){
                $this->success('资料修改成功!');
            }else{
                $this->error("资料修改失败！");
            }
        }
        if($act=='reset'){
            $pass=trim($_POST['new']);
            $repass=trim($_POST['renew']);
            $old=trim($_POST['old']);
            if($pass!=$repass){
                $this->error("新密码输入不一致！");
            }
            $user=$modle->where($where)->find();
            if($user['password']==md5($old)){
                $data_reset['password']=md5($pass);
                if($modle->where($where)->data($data_reset)->save()){
                    $this->success('密码修改成功！');
                }else{
                    $this->error('密码修改失败！');
                }
            }else{
                $this->error("原密码不正确！");
            }
        }

    }
    //添加推广
    public function addsp(){
        $modle=M('spcate');
        if(isset($_GET['id'])){
            $id=$_GET['id'];
        }
        $cates=$modle->select();
        //$cates=Find_sons($cates,0,0);
        $cates=tree($cates,0,0);
        $this->id=$id;
        $this->cates=$cates;
        $this->display();
    }
    //编辑推广
    public function editsp(){
        $modle=M('spcate');
        $sp=M('spread');
        if(isset($_GET['sp_id'])){
            $where['id']=$_GET['sp_id'];
        }
        $cates=$modle->select();
        $detail=$sp->where($where)->find();
        $cates=tree($cates,0,0);
        $this->cates=$cates;
        $this->detail=$detail;
        $this->display();
    }

    //编辑推广-处理表单
    public function edit_sp_action(){
        if(!IS_POST){
            $this->error("非法进入钓鱼岛！");
        }
        $model=M('spread');
        $cate=M('spcate');
        $member=M('member');
        $sc=M('score');
        $chats=M('chat');
        $mem_info=$member->where(array('id'=>$_SESSION['member_id']))->find();
        if(isset($_POST['id'])&& $_POST['id']){
            $where['id']=$_POST['id'];
            $detai=$model->where($where)->find();
            if(empty($detai)){
                $this->error('不存在该条信息！');
            }
            if($detai['uid']!==$_SESSION['member_id']){
                $this->error('您没有权限操作！');
            }
            $son_where['pid']=$_POST['cid'];
            $has_son=$cate->where($son_where)->find();
            if(!empty($has_son)){
                $this->error("推广类型选择有误!");
            }
            if(strtotime($_POST['end'])<time()){
                $this->error("时间设置有误!");
            }
            if(trim($_POST['price'])<10){
                $this->error("最低点击积分为10！");
            }
            if(trim($_POST['score'])<trim($_POST['price'])){
                $this->error("投入积分不能小于单次点击积分！");
            }
            $cid=$_POST['cid'];
            $score=trim($_POST['score']);
            $price=trim($_POST['price']);
            $start=strtotime(trim($_POST['start']));
            $end=strtotime(trim($_POST['end']));
            if($score>=$detai['score']){
                $chat=$score-$detai['score'];
                $m_data['score']=$mem_info['score']-$chat;
                $data_sc['type']=0;
                $data_sc['remark']="增加推广总投入，扣取积分。";
            }else{
                $chat=$detai['score']-$score;
                $data_sc['type']=1;
                $m_data['score']=$mem_info['score']+$chat;
                $data_sc['remark']="减少推广总投入，积分回流。";
            }
            $data_sc['uid']=$_SESSION['member_id'];
            $data_sc['score']=$chat;
            $data_sc['ctime']=time();
            $data['cid']=$cid;
            $data['score']=$score;
            $data['status']=1;
            $data['price']=$price;
            $data['start']=$start;
            $data['end']=$end;
            $cat_name=$cate->where(array('cat_id'=>$_POST['cid']))->getField('title');
            $wx_id=$model->where($where)->getField('wx_id');
            $where_chat['wx_id']=$wx_id;
            $where_chat['uid']=$_SESSION['member_id'];
            $where_chat['yeat']=date("Y",time());
            $where_chat['month']="0";
            $data_chat['type']=$cat_name;
//            print_r($where_chat);
//            print_r($data_chat);
//            exit;
            if($model->where($where)->data($data)->save()){
                $member->where(array('id'=>$_SESSION['member_id']))->data($m_data)->save();
                $chats->where($where_chat)->data($data_chat)->save();
               if($chat>0){
                   $sc->data($data_sc)->add();
               }
                $this->success('编辑成功！');
            }else{
                $this->error('编辑失败！');
            }

        }else{
            $this->error('未知错误！');
        }
    }

    //推广详情
    public function detail(){
        $model=D('Spread');
        $id=$_GET['id'];
        $where['id']=$id;
        $detail=$model->where($where)->relation(true)->find();
        $this->detail=$detail;
        $this->display();
    }
    //删除推广操作
    public function del_action(){
        $model=M('spread');
        $member=M('member');
        $sc=M('score');
        $where['id']=$_POST['id'];
        $m_where['id']=$_SESSION['member_id'];
        $info=$model->where($where)->find();
        $member_info=$member->where($m_where)->find();
        $data_mem['score']=$member_info['score']+$info['score'];
        $data_sc['type']=1;
        $data_sc['score']=$info['score'];
        $data_sc['ctime']=time();
        $data_sc['uid']=$_SESSION['member_id'];
        $data_sc['remark']="删除推广，积分回流";
        if($model->where($where)->delete()){
            if($info['score']>0){
                $member->where($m_where)->data($data_mem)->save();
                $sc->data($data_sc)->add();
            }
            echo 1;
            exit;
        }else{
            echo 0;
            exit;
        }
    }
    //添加推广-处理表单
    public function addsp_act(){
       if(!IS_POST){
           $this->error("非法进入钓鱼岛！");
       }
        $weixin=M('weixin');
        $model=M('spread');
        $cate=M('spcate');
        $member=M('member');
        $score=M('score');
        $notice=M('notice');
        $chat=M('chat');
        $mem_info=$member->where(array('id'=>$_SESSION['member_id']))->find();
        $where['wx_id']=$_POST['id'];
        $where['status']=1;
        $weixin_info=$weixin->where(array('id'=>$_POST['id']))->find();
        $weixin_in=$model->where($where)->find();
        $son_where['pid']=$_POST['cid'];
        $has_son=$cate->where($son_where)->find();
        if(!empty($weixin_in)){
            $this->error("该账号已在推广!");
        }
        if(!empty($has_son)){
            $this->error("推广类型选择有误!");
        }
        if($mem_info['score']<trim($_POST['score'])){
            $this->error("您的积分不够!");
        }
        $data['start']=strtotime(trim($_POST['start']));
        $data['end']=strtotime(trim($_POST['end']));
        if($data['end']<time()){
            $this->error("时间设置有误!");
        }
        if(trim($_POST['price'])<10){
            $this->error("最低点击积分为10！");
        }
        if(trim($_POST['score'])<trim($_POST['price'])){
            $this->error("投入积分不能小于单次点击积分！");
        }
        $data['wx_id']=$_POST['id'];
        $data['cid']=$_POST['cid'];
        $data['score']=trim($_POST['score']);
        $data['price']=trim($_POST['price']);
        $data['uid']=$_SESSION['member_id'];
        $data['status']=1;
        $data['ctime']=time();
        $cat_name=$cate->where(array('cat_id'=>$_POST['cid']))->getField('title');
        $data_chat['wx_id']=$_POST['id'];
        $data_chat['uid']=$_SESSION['member_id'];
        $data_chat['clicks']=0;
        $data_chat['year']=date("Y",time());
        $data_chat['month']="0";
        $data_chat['type']=$cat_name;
        if($model->data($data)->add()){
            $data_member['score']=$mem_info['score']-$data['score'];
            if($member->where(array('id'=>$_SESSION['member_id']))->data($data_member)->save()){
                $data_notice['uid']=$_SESSION['member_id'];
                $data_notice['status']=0;
                $data_notice['ctime']=time();
                $data_notice['content']="您为 ‘".$weixin_info['name']."’添加了推广，推广投入总积分为".$data['score']."，单次点击投入积分为".$data['price']."。<br>
                感谢您对微搜的信任与支持，谢谢！";
                $data_sc['uid']=$_SESSION['member_id'];
                $data_sc['type']=0;
                $data_sc['score']=$data['score'];
                $data_sc['remark']="添加推广预扣积分";
                $data_sc['ctime']=time();
                $notice->data($data_notice)->add();
                $score->data($data_sc)->add();
                $chat->data($data_chat)->add();
                $this->success("添加成功！");
            }else{
                $this->error('积分扣取出错！');
            }
        }else{
            $this->error('添加失败！');
        }

    }
    //数据统计
    public function chat(){
        $where['wx_id']=$_GET['id'];
        $where['uid']=$_SESSION['member_id'];
        $where['year']=date('Y',time());
        $model=M('chat');
        $chats=$model->field('month,clicks')->where($where)->order("month ASC")->select();
        foreach($chats as $c){
            $month[]='"'.$c['month'].'月份"';
            $click[]=$c['clicks'];
        }
        $month_data=implode(',',$month);
        $month_data="[".$month_data."]";
        $click_data=implode(',',$click);
        $click_data="[".$click_data."]";
        $this->month_data=$month_data;
        $this->click_data=$click_data;
        $this->display();
    }
    //关于推广
    public function about(){
        $this->position="about";
        $this->display();
    }
}