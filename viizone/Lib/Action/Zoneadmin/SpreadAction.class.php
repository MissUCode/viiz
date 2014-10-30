<?php
/**
 * SpreadController
 * Created by PhpStorm.
 * User: YangZhe
 * Date: 14-7-17
 * Time: 下午15:05
 */
//namespace Viimanager\Controller;
//use Think\Controller;
class SpreadAction extends CommAction{
    public function postion(){
        $this->assign('position','sp');
    }
    public function index(){
        $this->lists();
    }
    /*
     * 推广类型列表
     * */
    public function lists(){
        $this->postion();
        $modle=M('spcate');
        import('ORG.Util.Page');// 导入分页类
        $count= $modle->count();// 查询满足要求的总记录数
        $Page = new Page($count, 35);// 实例化分页类 传入总记录数和每页显示的记录数
        $show = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $cates = $modle->order("sort DESC")->limit($Page->firstRow.','.$Page->listRows)->select();
        $cates=tree($cates,0,0);
        $category=array();
        foreach($cates as $c){
            if($c['pid']==0){
                $c['pname']="<b>一级分类</b>";
            }else{
                $pname=$modle->where("cat_id=".$c['pid'])->getField('name');
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
    public function wx_lists(){
        $this->postion();
        $cate=M('spcate');
        $cates=$cate->select();
        $cates=tree($cates,0,0);
        $this->cates=$cates;
        $where=array();
        if(isset($_POST['cid'])&&$_POST['cid']!="N"){
            $where['cid']=$_POST['cid'];
        }
        if(isset($_POST['status'])&&$_POST['status']!="N"){
            $where['status']=$_POST['status'];
        }
        if(isset($_POST['keys'])&&$_POST['keys']!=""){
            $keys=$_POST['keys'];
            $wwhere['name']  = array("like", "%$keys%");
            $wwhere['w_name']  = array("like","%$keys%");
            $wwhere['_logic'] = 'or';
            $uwhere['member_name']  = array("like", "%$keys%");
            $uwhere['mobile_phone']  = array("like","%$keys%");
            $uwhere['email'] = array("like","%$keys%");
            $uwhere['_logic'] = 'or';
            $member=M('member');
            $weixn=M('weixin');
            $mid=$member->where($uwhere)->field('id')->select();
            $wid=$weixn->where($wwhere)->field('id')->select();
            foreach($mid as $uid){
                $mids[]=$uid['id'];
            }
            foreach($wid as $w_id){
                $wids[]=$w_id['id'];
            }
            $mids=implode(',',$mids);
            $wids=implode(',',$wids);
            $where['uid']  = array("in", "$mids");
            $where['wx_id']  = array("in","$wids");
            $where['_logic'] = 'or';
        }
        $Spre=D("Spread");
        import('ORG.Util.Page');// 导入分页类
        $count= $Spre->count();// 查询满足要求的总记录数
        $Page = new  Page($count, 14);// 实例化分页类 传入总记录数和每页显示的记录数
        $show = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $all=$Spre->where($where)->order("ctime DESC")->limit($Page->firstRow.','.$Page->listRows)->relation(true)->select();
        $this->spreads=$all;
        $this->page=$show;
        $this->display();
    }
    public function reset(){
        $this->postion();
        $spcate=M('spcate');
        $sp=M('spread');
        $where['id']=$_GET['id'];
        $cate=$sp->where($where)->find();
        $cates=$spcate->select();
        $cates=tree($cates,0,0);
        $this->cates=$cates;
        $this->cate=$cate;
        $this->display();
    }

    public function reset_action(){
       if(!IS_POST){
           $this->error('请勿非法操作！');
       }
       $model=M('spread');
       $sp=M('spcate');
       $where['id']=$_POST['id'];
        if($_POST['cid']=='N'){
            $this->error('请选择推广类型！');
        }
        $where1['pid']=$_POST['cid'];
        $has_son=$sp->where($where1)->find();
        if(!empty($has_son)){
            $this->error('请选择该类型的子类型！');
        }

       $data['cid']=$_POST['cid'];
       $data['start']=strtotime($_POST['start']);
       $data['end']=strtotime($_POST['end']);
       $detail=$model->where($where)->find();
        if($detail['status']==0){
            $data['status']=1;
        }
        if(time()>$data['end'] || $data['end']< $data['start']){
            $this->error('时间设置不合适！');
        }
       if($model->where($where)->data($data)->save()){
           $this->success('设置成功！');
       }else{
           $this->error('设置失败！');
       }
    }
    public function turn_status(){
        $where['id']=$_POST['id'];
        $act=$_POST['act'];
        $modle=M('spread');
        switch($act){
            case 'on':
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

    public function delete(){
        $where['id']=$_POST['id'];
        $model=M('spread');
        if($model->where($where)->delete()){
            echo 1;
            exit;
        }else{
            echo 0;
            exit;
        }
    }
    public function add_cate(){
        $this->postion();
        $modle=M('spcate');
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
    public function cate_action(){
        if(!IS_POST){
            $this->error('非法操作！');
        }
        $modle=M('spcate');
        if(isset($_POST['act'])){
            $where['cat_id']=$_POST['id'];
            $where_sons['pid']=$_POST['id'];
            $sons=$modle->where($where_sons)->find();
            $weixin=M('sread')->where("cid=".$_POST['id'])->find();
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
        if(!$_POST['title']){
            $this->error('标识符不为空！');
        }
        $data['name']=trim($_POST['cat_name']);
        $data['pid']=$_POST['pid'];
        $data['title']=$_POST['title'];
        $data['sort']=$_POST['sort'];
        $data['counts']=$_POST['counts'];
        $data['remark']=$_POST['remark'];
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
    public function rel(){
        $User = D("User");
        $user = $User->relation('weixin')->select();
        print_r($user);
        exit;
    }
}