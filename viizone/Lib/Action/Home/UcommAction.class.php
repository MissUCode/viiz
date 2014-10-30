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
        if (!isset($_SESSION['member_id'])||empty($_SESSION['member_id'])){
            //$this->error('请先登录！','login');
            $this->redirect('Uenter/uenter');
        }
        $model=M('cate');
        $weixin=M('weixin');
        $spc=M('spcate');
        $set=M('set');
        $where['pid']=0;
        $seo=$set->find();
        $navs=$model->where($where)->order('sort DESC')->select();
        $where_click['title']="Ucenter_hot";
        $cat_id=$spc->where($where_click)->field('cat_id')->find();
        $where_mlike['cid']=$cat_id['cat_id'];
        $where_mlike['status']=1;
        $where_mlike['end']=array('gt',time());
        $where_mlike['_logic'] = 'and';
        $cate_hots=D('Index')->where($where_mlike)->relation(true)->order('price DESC')->limit(0,10)->select();
        if(count($cate_hots)<5){
            $limit=5-count($cate_hots);
            if(!empty($cate_hots)){
                foreach($cate_hots as $m){
                    $wxid[]=$m['weixin_id'];
                }
                $wxids='('.implode(',',$wxid).')';
                $where_meg['id']=array('not in',$wxids);
            }else{
                $where_meg=1;
            }
            $cate_hots_megs=$weixin->where($where_meg)->field('id as weixin_id,name as weixin_name,logo,code,clicks,like')->order('clicks DESC')->limit(0,$limit)->select();
            $cate_hots_m=$cate_hots_megs;
        }
        if(!empty($cate_hots)){
            $cate_hots=array_merge ($cate_hots,$cate_hots_m);
        }else{
            $cate_hots=$cate_hots_m;
        }
        $this->navs=$navs;
        $this->uc_hot=$cate_hots;
        $this->seo=$seo;
    }
}