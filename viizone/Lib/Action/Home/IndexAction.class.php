<?php
/**
 * Home控制器
 * Created by PhpStorm.
 * User: YangZhe
 * Date: 14-11-12
 * Time: 下午15:05
 */
class IndexAction extends IndexcomAction {
    // 首页
    public function index(){
        $shareModel=M('share');
        $aModel=M('article');
        $cModel=M('comment');
        $uModel=M('user_share');
        $share=$shareModel->order('is_top DESC,click DESC')->select();
        foreach($share as $s){
            $where['sid']=$s['id'];
            $where_user['id']=$s['uid'];
            $s['comment']=$cModel->where($where)->count();
            $s['article']=$aModel->where($where)->count();
            $s['members']=$uModel->where($where)->count();
            $s['userpic']=M('users')->where($where_user)->getField('pic');
            $shares[]=$s;
        }
//        print_r($shares);
//        exit;
        $this->shares=$shares;
	    $this->display();
    }

}