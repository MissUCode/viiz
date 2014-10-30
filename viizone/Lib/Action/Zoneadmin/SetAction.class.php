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
class SetAction extends CommAction {
    public function postion(){
        $this->assign('position','set');
    }
    public function index(){
        $this->postion();
        $model=M('set');
        $sets=$model->find();
        $this->sets=$sets;
        $this->display();
    }
    public function set_act(){
        $model=M('set');
        $where['id']=1;
        $act=$_POST['type'];
        if($act=='basic'){
            $data['www']=trim($_POST['www']);
            $data['phone']=trim($_POST['phone']);
            $data['qq']=trim($_POST['qq']);
            $data['bei']=trim($_POST['bei']);
            $data['copyright']=trim($_POST['copyright']);
        }else{
            $data['title']=$_POST['title'];
            $data['keys']=$_POST['keys'];
            $data['desc']=$_POST['desc'];
        }
        if($model->where($where)->data($data)->save()){
            $this->success("设置成功！");
        }else{
            $this->error('设置失败！');
        }
    }
    public function comment(){
        $this->postion();
        $model=D('comment');
        import('ORG.Util.Page');// 导入分页类
        $count= $model->count();// 查询满足要求的总记录数
        $Page = new Page($count, 14);// 实例化分页类 传入总记录数和每页显示的记录数
        $show = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $all=$model->limit($Page->firstRow.','.$Page->listRows)->order("id DESC")->relation(true)->select();
        $this->comments=$all;
        $this->page=$show;
        $this->display();
    }
    public function shen(){
        $this->postion();
        $model=D('comment');
        $where['status']=0;
        import('ORG.Util.Page');// 导入分页类
        $count= $model->where($where)->count();// 查询满足要求的总记录数
        $Page = new  Page($count, 14);// 实例化分页类 传入总记录数和每页显示的记录数
        $show = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $all=$model->where($where)->limit($Page->firstRow.','.$Page->listRows)->order("id DESC")->relation(true)->select();
        $this->comments=$all;
        $this->page=$show;
        $this->display();
    }
    public function ajax(){
        $modle=M('comment');
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
}