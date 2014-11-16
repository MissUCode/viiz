<?php
/**
 * UsersComm控制器
 * Created by PhpStorm.
 * User: YangZhe
 * Date: 14-7-17
 * Time: 下午15:05
 */
//namespace Home\Controller;
//use Think\Controller;
class UcommAction extends Action {
    public function _initialize(){
        if (!isset($_SESSION['users_id'])||empty($_SESSION['users_id'])){
            $this->redirect('Uenter/login');
        }
        $visitModel=M('visit');
        $activeModel=M('share');
        $where_visit['title']='visit';
        $visitcount=$visitModel->where($where_visit)->getField('counts');
        $sharecount=$activeModel->count();
        $data['counts']=$visitcount+1;
        $visitModel->where($where_visit)->data($data)->save();
        $this->visitcount=$visitcount;
        $this->sharecount=$sharecount;
    }
}