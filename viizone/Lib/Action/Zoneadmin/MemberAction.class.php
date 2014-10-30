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
class MemberAction extends CommAction {
    public function postion(){
        $this->assign('position','mb');
    }
    public function index(){
        $this->lists();
    }
    //用户列表
    public function lists(){
        $this->postion();
        $modle=M('member');
        if(isset($_POST['keys']) && $_POST['keys']!=""){
            $keys=$_POST['keys'];
            $where['member_name']  = array("like", "%$keys%");
            $where['email']  = array("like","%$keys%");
            $where['mobile_phone']  = array("like","%$keys%");
            $where['_logic'] = 'or';
        }
        if(isset($_POST['status'])&&$_POST['status']!=""){
            switch($_POST['status']){
                case 0:
                    $where['status']=0;
                    break;
                case 1:
                    $where['status']=1;
                    break;
                case 2:
                    $where['is_very']=1;
                    break;
                case 3:
                    $where['is_very']=0;
                    break;
            }
        }
        import('ORG.Util.Page');// 导入分页类
        $count= $modle->where($where)->count();// 查询满足要求的总记录数
        $Page = new  Page($count, 14);// 实例化分页类 传入总记录数和每页显示的记录数
        $show = $Page->show();// 分页显示输出
        //进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $members = $modle->where($where)->limit($Page->firstRow.','.$Page->listRows)->order("id DESC")->select();
        $this->page=$show;
        $this->members=$members;
        $this->display();
    }
    //用户详细信息
    public function getinfo(){
        $where['id']=$_GET['id'];
        $modle=M('member');
        $detail=$modle->where($where)->find();
        $weixin=M('weixin')->where('uid='.$detail['id'])->limit(5)->getField("name,w_name,ctime");
        $this->detail=$detail;
        $this->weixin=$weixin;
        $this->display('info');
    }
    //ajax操作用户状态、删除用户
    public function ajax(){
        $modle=M('member');
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
    public function customer(){
        $this->postion();
        $this->display();
    }
    public function find(){
        $model=M('member');
        $num=trim($_POST['num']);
        if(checkEmail($num)){
            $where['email']  = $num;
        }else if(checkTel($num)){
            $where['mobile_phone']  = $num;
        }else{
            $where['member_name']  = $num;
        }
        $select=$model->where($where)->select();
        foreach($select as $s){
            if(checkTel($num)){
                $s['title']=$s['mobile_phone'];
            }else if(checkEmail($num)){
                $s['title']=$s['email'];
            }else{
                $s['title']=$s['member_name'];
            }
            $selects[]=$s;
        }
        $this->ajaxReturn($selects,'json');
    }
    public function chong(){
         if(!IS_POST){
             $this->error('非法操作！');
         }
        $pays=M('pays');
        $member=M('member');
        $notice=M('notice');
        $score=M('score');
        $core=trim($_POST['score']);
        if(!$core){
            $this->error('充值积分不能为空！');
        }
        $time=trim($_POST['time']);
        $member_id=$_POST['member_id'];
        $where['id']=$member_id;
        $member_infos=$member->where($where)->find();
        if(empty($member_infos)){
            $this->error('不存在该用户！');
        }
        $data_mem['score']=$member_infos['score']+$core;
        $data_pays['member_id']=$member_id;
        $data_pays['score']=$core;
        $data_pays['user_id']=$_SESSION['admin_id'];
        $data_pays['admin_name']=$_SESSION['admin_name'];
        $data_pays['uname']=trim($_POST['member_name']);
        $data_pays['remark']=$_POST['remark'];//"充值账号为：".trim($_POST['member_name']).",充值积分：".$core.",操作管理员：".$_SESSION['admin_name']."。";
        if(!$time){
            $data_pays['time']=time();
        }else{
            $data_pays['time']=strtotime($time);
        }
        $data_notice['uid']=$member_id;
        $data_notice['content']="您的微搜账号：".trim($_POST['member_name']).",已经成功充值".$core."的积分,请您及时查看积分是否到账，有任何问题，请直接联系本站管理员处理，谢谢您对微搜的支持与信任。";
        $data_notice['status']=0;
        $data_notice['ctime']=time();
        $data_sc['uid']=$member_id;
        $data_sc['type']=1;
        $data_sc['score']=$core;
        $data_sc['remark']="充值获得积分。";
        $data_sc['ctime']=time();
        if($member->where($where)->data($data_mem)->save()){
            $pays->data($data_pays)->add();
            $notice->data($data_notice)->add();
            $score->data($data_sc)->add();
            $this->success("充值成功！");
        }else{
            $this->error("充值失败！");
        }
    }
    public function log(){
        $this->postion();
        if(isset($_POST['keys'])){
            $keys=$_POST['keys'];
            $where['uname']=array("like","%$keys%");
        }else{
            $where=1;
        }
        $model=M('pays');
        import('ORG.Util.Page');// 导入分页类
        $count= $model->where($where)->count();// 查询满足要求的总记录数
        $Page = new  Page($count, 14);// 实例化分页类 传入总记录数和每页显示的记录数
        $show = $Page->show();// 分页显示输出
        //进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $logs = $model->where($where)->limit($Page->firstRow.','.$Page->listRows)->order("id DESC")->select();
        $this->page=$show;
        $this->logs=$logs;
        $this->display();
    }
}