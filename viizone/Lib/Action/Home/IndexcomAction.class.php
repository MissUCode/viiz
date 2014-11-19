<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-8-15
 * Time: 上午9:13
 */
class IndexcomAction extends Action {
    public function _initialize(){
        $visitModel=M('visit');
        $activeModel=M('share');
        $where_visit['title']='visit';
        $visitcount=$visitModel->where($where_visit)->getField('counts');
        $activeShare=$activeModel->order('is_tj DESC,click DESC')->limit(0,4)->select();
        $sharecount=$activeModel->count();
        $data['counts']=$visitcount+1;
        $visitModel->where($where_visit)->data($data)->save();
        for($i=1;$i<32;$i++){
            $faces[$i]['name']=$i.'.gif';
        }
        $this->faces=$faces;
        $this->visitcount=$visitcount;
        $this->sharecount=$sharecount;
        $this->activeShare=$activeShare;
    }

}