<?php
/**
 * Home控制器
 * Created by PhpStorm.
 * User: YangZhe
 * Date: 14-7-17
 * Time: 下午15:05
 */
class IndexAction extends IndexcomAction {
    // 首页
    public function index(){
        $spc=M('spcate');
        $spread=M('spread');
        $weixin=M('weixin');
        $wcate=M('cate');
        $ad=M('ad');
        //广告
        $where_ad['status']=1;
        $ads=$ad->where($where_ad)->select();
        /*唯一推荐start*/
        $where_index['title']="Index";
        $cat_id=$spc->where($where_index)->field('cat_id')->find();
        $where_one['cid']=$cat_id['cat_id'];
        $where_one['status']=1;
        $where_one['end']=array('gt',time());
        $where_one['_logic'] = 'and';
        $index_one=D('Index')->where($where_one)->relation(true)->order('price DESC')->limit(0,1)->select();
        /*唯一推荐end*/
        /*首页推荐start*/
        $where_tui['title']="Index_tuijian";
        $cat_id=$spc->where($where_tui)->field('cat_id')->find();
        $where_tuijian['cid']=$cat_id['cat_id'];
        $where_tuijian['status']=1;
        $where_tuijian['end']=array('gt',time());
        $where_tuijian['_logic'] = 'and';
        $index_tuijians=D('Index')->where($where_tuijian)->relation(true)->order('price DESC')->limit(0,15)->select();
        if(count($index_tuijians)<15){
            $limit=15-count($index_tuijians);
            if(!empty($index_tuijians)){
                foreach($index_tuijians as $m){
                    $wxid[]=$m['weixin_id'];
                }
                $wxids='('.implode(',',$wxid).')';
                $where_meg['id']=array('not in',$wxids);
            }else{
                $where_meg=1;
            }
            $meg_tui=$weixin->where($where_meg)->field('id as weixin_id,name as weixin_name,logo,code,clicks,like')->order('clicks DESC')->limit(0,$limit)->select();
            $meg_tuijians=$meg_tui;
            if(!empty($index_tuijians)){
                $index_tuijians=array_merge ($index_tuijians,$meg_tuijians);
            }else{
                $index_tuijians=$meg_tui;
            }
        }
        /*首页推荐end*/
        /*排行榜推荐start*/
        //月排行
        $where_hot['title']='Hot_month';
        $cat_id=$spc->where($where_hot)->field('cat_id')->find();
        $where_month['cid']=$cat_id['cat_id'];
        $where_month['status']=1;
        $where_month['end']=array('gt',time());
        $where_month['_logic'] = 'and';
        $index_month=D('Index')->where($where_month)->relation(true)->order('price DESC')->limit(0,8)->select();
        if(count($index_month)<8){
            $limit=8-count($index_month);
            if(!empty($index_month)){
                foreach($index_month as $m){
                    $wxid[]=$m['weixin_id'];
                }
                $wxids='('.implode(',',$wxid).')';
                $where_meg['id']=array('not in',$wxids);
            }else{
                $where_meg=1;
            }
            $meg_months=$weixin->where($where_meg)->field('id as weixin_id,name as weixin_name,logo,code,clicks,like')->order('clicks DESC')->limit(0,$limit)->select();
            $meg_month=$meg_months;
            if(!empty($index_month)){
//                foreach($meg_months as $key=>$t){
//                    foreach($index_month as $it){
//                        if($it['weixin_id']==$t['weixin_id']){
//                            unset($meg_month["$key"]);
//                        }
//
//                    }
//                }
                $index_month=array_merge ($index_month,$meg_month);
            }else{
                $index_month=$meg_month;
            }
        }
        //周排行
        $where_hot['title']='Hot_week';
        $cat_id=$spc->where($where_hot)->field('cat_id')->find();
        $where_week['cid']=$cat_id['cat_id'];
        $where_week['status']=1;
        $where_week['end']=array('gt',time());
        $where_week['_logic'] = 'and';
        $index_week=D('Index')->where($where_week)->relation(true)->order('price DESC')->limit(0,8)->select();
        if(count($index_week)<8){
            $limit=8-count($index_week);
            if(!empty($index_week)){
                foreach($index_week as $m){
                    $wxid[]=$m['weixin_id'];
                }
                $wxids='('.implode(',',$wxid).')';
                $where_meg['id']=array('not in',$wxids);
            }else{
                $where_meg=1;
            }
            $meg_weeks=$weixin->where($where_meg)->field('id as weixin_id,name as weixin_name,logo,code,clicks,like')->order('clicks DESC')->limit(0,$limit)->select();
            $meg_week=$meg_weeks;
            if(!empty($index_week)){
                $index_week=array_merge ($index_week,$meg_week);
            }else{
                $index_week=$meg_week;
            }

        }
        //历史排行
        $where_hot['title']='Hot_history';
        $cat_id=$spc->where($where_hot)->field('cat_id')->find();
        $where_history['cid']=$cat_id['cat_id'];
        $where_history['status']=1;
        $where_history['end']=array('gt',time());
        $where_history['_logic'] = 'and';
        $index_history=D('Index')->where($where_history)->relation(true)->order('price DESC')->limit(0,8)->select();
        if(count($index_history)<8){
            $limit=8-count($index_history);
            if(!empty($index_history)){
                foreach($index_history as $m){
                    $wxid[]=$m['weixin_id'];
                }
                $wxids='('.implode(',',$wxid).')';
                $where_meg['id']=array('not in',$wxids);
            }else{
                $where_meg=1;
            }
            $meg_historys=$weixin->where($where_meg)->field('id as weixin_id,name as weixin_name,logo,code,clicks,like')->order('clicks DESC')->limit(0,$limit)->select();
            $meg_history=$meg_historys;
            if(!empty($index_history)){
                $index_history=array_merge ($index_history,$meg_history);
            }else{
                $index_history=$meg_history;
            }
        }
        /*排行榜推荐end*/
        /*分类推荐start*/
        $top_cate=$wcate->where(array('pid'=>0))->order('sort DESC')->select();
        $where_cate['title']='Index_cate';
        $cat_id=$spc->where($where_cate)->field('cat_id')->find();
        $where_cate['cid']=$cat_id['cat_id'];
        $where_cate['status']=1;
        $where_cate['end']=array('gt',time());
        $where_cate['_logic'] = 'and';
        $index_cate=D('Index')->where($where_cate)->relation(true)->order('price DESC')->select();
        foreach($top_cate as $top){
            $where_meg=array();
            $t_weixin=array();
            $cate_ids=array();
            $cate_ids=$wcate->where(array('pid'=>$top['cat_id']))->field('cat_id')->order('sort DESC')->select();
            $old=$cate_ids;
            $child_cate=$wcate->where(array('pid'=>$top['cat_id']))->order('sort DESC')->select();
            //如果没有子类
            if(!$child_cate){
                $top['child_cate']=array();
                foreach($index_cate as $t){
                    if( $t['cat_id']==$top['cat_id']){
                        $t_weixin[]=$t;
                    }
                    if(count($t_weixin)>29){
                        break;
                    }
                }
                if(isset($t_weixin) && !empty($t_weixin)){
                    if(count($t_weixin)<30){
                        $limit=30-count($t_weixin);
                        $where_meg['cid']  =$top['cat_id'];
                        if(!empty($t_weixin)){
                            foreach($t_weixin as $m){
                                $wxid[]=$m['weixin_id'];
                            }
                            $wxids=implode(',',$wxid);
                            $where_meg['id']=array("not in",$wxids);
                            $where_meg['_logic'] = 'and';
                        }
                        $cids=array();
                        $meg_cates=$weixin->where($where_meg)->field('id as weixin_id,name as weixin_name,logo,code,clicks,like')->order('clicks DESC')->limit(0,$limit)->select();
                        $meg_cate=$meg_cates;
                        if(!empty($meg_cate)){
                            $t_weixin=array_merge($t_weixin,$meg_cate);
                        }else{
                            $t_weixin=$t_weixin;
                        }
                        $top['child_wx']=$t_weixin;
                    }
                }else{
                    $limit=30;
                    $where_meg['cid']  =$top['cat_id'];
                    $meg_cate=$weixin->where($where_meg)->field('id as weixin_id,name as weixin_name,logo,code,clicks,like')->order('clicks DESC')->limit(0,$limit)->select();
                    //$t_weixin=array_merge($t_weixin,$meg_cate);
                    $top['child_wx']=$meg_cate;
                }
                $cates[]=$top;
            }
            //有子类的情况
            else{
                //$cate_ids=$wcate->where(array('pid'=>$top['cat_id']))->field('cat_id')->order('sort DESC')->select();
                foreach($cate_ids as $id){
                    foreach($index_cate as $t){
                            if( $t['cat_id']==$id['cat_id']){
                                $t_weixin[]=$t;
                            }
                        if(count($t_weixin)>29){
                            break;
                        }
                    }
                }
                $top['child_cate'][]=$child_cate;
                if(isset($t_weixin) && !empty($t_weixin)){
                    if(count($t_weixin)<30){
                        $limit=30-count($t_weixin);
                        if(!empty($t_weixin)){
                            foreach($t_weixin as $m){
                                $wxid[]=$m['weixin_id'];
                            }
                            $wxids=implode(',',$wxid);
                            $where_meg['id']=array('not in',$wxids);
                        }
                        foreach($cate_ids as $v){
                            $cids[]=$v['cat_id'];
                        }
                        $cate_ids=implode(',',$cids);
                        $where_meg['cid']  = array("in",$cate_ids);
                        $where_meg['_logic'] = 'and';
                        $cids=array();
                        $meg_cate=$weixin->where($where_meg)->field('id as weixin_id,name as weixin_name,logo,code,clicks,like')->order('clicks DESC')->limit(0,$limit)->select();
                        if(!empty($meg_cate)){
                            $t_weixin=array_merge($t_weixin,$meg_cate);
                        }else{
                            $t_weixin=$t_weixin;
                        }
                        $top['child_wx']=$t_weixin;
                    }
                }else{
                    $limit=30;
                    foreach($old as $v){
                        $old_cids[]=$v['cat_id'];
                    }
                    $cate_ids=implode(',',$old_cids);
                    $where_meg['cid']  = array("in",$cate_ids);
                    $meg_cate=$weixin->where($where_meg)->field('id as weixin_id,name as weixin_name,logo,code,clicks,like')->order('clicks DESC')->limit(0,$limit)->select();
                    //$t_weixin=array_merge($t_weixin,$meg_cate);
                    $top['child_wx']=$meg_cate;
                    $old_cids=array();
                }
                $cates[]=$top;
            }

        }
        /*分类推荐end*/
        $this->ads=$ads;
        $this->index_one=$index_one;
        $this->index_tuijians=$index_tuijians;
        $this->index_month=$index_month;
        $this->index_week=$index_week;
        $this->index_history=$index_history;
        $this->index_cates=$cates;
//        print_r($cates);
//        exit;
	    $this->display();
    }
    //列表页
    public function lists(){
        $spc=M('spcate');
        $spread=M('spread');
        $weixin=M('weixin');
        $wcate=M('cate');
        $cat_id=$_GET['cate'];
        if(!is_numeric($cat_id)){
            $this->redirect("Index/index");
        }else{
            $where['cat_id']=$cat_id;
            $where_wx['cid']=$cat_id;
            $where_cate['pid']=$cat_id;
            $lists=$wcate->where($where)->find();
            $has_wx=$weixin->where($where_wx)->find();
            $has_cate=$wcate->where($where_cate)->order('sort DESC')->select();
            if(empty($has_wx)&&empty($has_cate)){
                $this->redirect("Index/index");
            }
            if(!empty($has_cate)){
                $lists['child_cate']=$has_cate;
            }else{
                $lists['child_cate']=array();
            }
            /*猜您喜欢-s*/
            $where_may['title']="May_like";
            $cat_id=$spc->where($where_may)->field('cat_id')->find();
            $where_mlike['cid']=$cat_id['cat_id'];
            $where_mlike['status']=1;
            $where_mlike['end']=array('gt',time());
            $where_mlike['_logic'] = 'and';
            $may_like=D('Index')->where($where_mlike)->relation(true)->order('price DESC')->limit(0,7)->select();
            if(count($may_like)<7){
                $limit=7-count($may_like);
                if(!empty($has_cate)){
                    foreach($has_cate as $cid){
                        $cids[]=$cid['cat_id'];
                    }
                    $cate_ids=implode(',',$cids);
                    $where_meg['cid']  = array("in","$cate_ids");
                    $may_megs=$weixin->where($where_meg)->field('id as weixin_id,name as weixin_name,logo,code,clicks,like')->order("clicks DESC")->limit(0,$limit)->select();
                    $may_meg=$may_megs;
                    if(!empty($may_like)){
                        foreach($may_megs as $key=>$t){
                            foreach($may_like as $it){
                                if($it['weixin_id']==$t['weixin_id']){
                                    unset($may_meg["$key"]);
                                }
                            }
                        }
                        $may_like=array_merge ($may_like,$may_meg);
                    }else{
                        $may_like=$may_meg;
                    }

                }
                if(!empty($has_wx)){
                    $may_megs=$weixin->where($where_wx)->field('id as weixin_id,name as weixin_name,logo,code,clicks,like')->order("clicks DESC")->limit(0,$limit)->select();
                    $may_meg=$may_megs;
                    if(!empty($may_like)){
                        foreach($may_megs as $key=>$t){
                            foreach($may_like as $it){
                                if($it['weixin_id']==$t['weixin_id']){
                                    unset($may_meg["$key"]);
                                }
                            }
                        }
                        $may_like=array_merge ($may_like,$may_meg);
                    }else{
                        $may_like=$may_meg;
                    }

                }
            }
            if(!empty($has_cate)){
                foreach($has_cate as $cid){
                    $cids[]=$cid['cat_id'];
                }
                $cate_ids=implode(',',$cids);
                $where_lists['cid']  = array("in","$cate_ids");
            }
            if(!empty($has_wx)){
                $where_lists=$where_wx;
            }
            import('ORG.Util.Page');// 导入分页类
            $count= $weixin->where($where_lists)->count();// 查询满足要求的总记录数
            $Page       = new Page($count,31);// 实例化分页类 传入总记录数和每页显示的记录数
            $show = $Page->vii_show();// 分页显示输出
            //进行分页数据查询 注意limit方法的参数要使用Page类的属性
            $lists_weixins=$weixin->field('id,name,logo,code,logo,clicks,like')->where($where_lists)->limit($Page->firstRow.','.$Page->listRows)->order("clicks DESC")->select();
            $lists['child_wx']=$lists_weixins;

        }

        $this->may_like=$may_like;
        $this->lists=$lists;
        $this->page=$show;
        $this->display();
    }
    //详情页
    public function detail(){
        $weixin=M('weixin');
        $wcate=M('cate');
        $member=M('member');
        $spread=M('spread');
        $spc=M('spcate');
        $chat=M('chat');
        $ip=M('ip');
        $comment=D('Comment');
        $where['id']=$_GET['detail_id'];
        $where_com['wx_id']=$_GET['detail_id'];
        $where_com['status']=1;
        //更新推广状态
        $detail=$weixin->where($where)->find();
        $where_user['id']=$detail['uid'];
        $userinfo=$member->where($where_user)->find();
        if($userinfo['member_name']){
            $username=$userinfo['member_name'];
        }elseif($userinfo['email']){
            $username=preg_replace("/(\d{4})(\d{3})/","$1***",$userinfo['email']);
        }else{
            $username=preg_replace("/(\d{4})(\d{3})/","$1***",$userinfo['mobile_phone']);
        }
        $where_status['wx_id']=$_GET['detail_id'];
        $where_status['end']=array('lt',time());
        $where_status['_logic'] = 'and';
        $has_status=$spread->where($where_status)->find();
        if(!empty($has_status)){
            $where_change['id']=$has_status['id'];
            $data_status['status']=2;
            $spread->where($where_change)->data($data_status)->save();
        }
        //评论
        $comments=$comment->where($where_com)->relation(true)->order("id DESC")->limit(0,10)->select();
        //同类火爆推荐start
        $where_click['title']="Cate_hot";
        $cat_id=$spc->where($where_click)->field('cat_id')->find();
        $where_mlike['cid']=$cat_id['cat_id'];
        $where_mlike['status']=1;
        $where_mlike['end']=array('gt',time());
        $where_mlike['_logic'] = 'and';
        $cate_hots=D('Index')->where($where_mlike)->relation(true)->order('price DESC')->limit(0,10)->select();
        if(count($cate_hots)<10){
            $limit=10-count($cate_hots);
        }
        $cate_hots_megs=$weixin->where(array('cid'=>$detail['cid']))->field('id as weixin_id,name as weixin_name,logo,code,clicks,like')->order('clicks DESC')->limit(0,$limit)->select();
        $cate_hots_m=$cate_hots_megs;
        if(!empty($cate_hots)){
            foreach($cate_hots_megs as $key=> $meg){
                foreach($cate_hots as $c){
                    if($meg['weixin_id']==$c['weixin_id']){
                        unset($cate_hots_m["$key"]);
                    }
                }
            }
            $cate_hots=array_merge ($cate_hots,$cate_hots_m);
        }else{
            $cate_hots= $cate_hots_m;
        }

        //同类火爆推荐end

        //更新点击量start
        $data['clicks']=$detail['clicks']+1;
        $weixin->where($where)->save($data);
        //更新点击量end
        //推广账号数据处理start
        $sp_cate=$spc->field('title')->select();
        foreach($sp_cate as $c){
            $sp_cates[]=$c['title'];
        }
        if(isset($_GET['click'])&&in_array($_GET['click'],$sp_cates)){

            $where_sp['wx_id']=$_GET['detail_id'];
            $where_sp['status']=1;
            $where_sp['end']=array('gt',time());
            $where_sp['_logic'] = 'and';
            $has_sp=$spread->where($where_sp)->find();
            if(!empty($has_sp)){
                $where_chat['wx_id']=$_GET['detail_id'];
                $where_chat['year']=date("Y",time());
                $where_chat['month']=date("m",time());
                $has_chat=$chat->where($where_chat)->find();
                //扣除推广积分start
                $where_ip['wx_id']=$_GET['detail_id'];
                $where_ip['sp_id']=$has_sp['id'];
                $where_ip['ip']=get_client_ip();
                $has_ip=$ip->where($where_ip)->find();
                if(empty($has_ip)){
                    if($has_sp['score']<=$has_sp['price']){
                        $data_sp['score']=0;
                        $data_sp['status']=4;
                    }else{
                        $data_sp['score']=$has_sp['score']-$has_sp['price'];
                    }
                    $data_ip['wx_id']=$_GET['detail_id'];
                    $data_ip['sp_id']=$has_sp['id'];
                    $data_ip['ip']=get_client_ip();
                    $spread->where(array('id'=>$has_sp['id']))->data($data_sp)->save();
                    $ip->data($data_ip)->add();
                }
                //扣除推广积分end
                //统计数据入库start
                if(!empty($has_chat)){
                    $data_chat['clicks']=$has_chat['clicks']+1;
                    $chat->where($where_chat)->data($data_chat)->save();
                }else{
                    $data_chat['uid']=$detail['uid'];
                    $data_chat['clicks']=1;
                    $data_chat['wx_id']=$_GET['detail_id'];
                    $data_chat['year']=date("Y",time());
                    $data_chat['month']=date("m",time());
                    $data_chat['type']=$_GET['click'];
                    $chat->data($data_chat)->add();
                }
               //统计数据入库end
            }
        }
//        print_r($sp_cates);
//        exit;
        //推广账号数据处理end
        $this->detail=$detail;
        $this->username=$username;
        $this->comments=$comments;
        $this->cate_hots=$cate_hots;
        $this->display();
    }
    //搜索页
    public function search(){
        if(!IS_POST){
            $this->redirect('Index/index');
        }
        $weixin=M('weixin');
        $keys=trim($_POST['keys']);
        $where['name']=array("like","%$keys%");
        $where['w_name']=array("like","%$keys%");
        $where['keys']=array("like","%$keys%");
        $where['_logic'] = 'or';
        import('ORG.Util.Page');// 导入分页类
        $count= $weixin->where($where)->count();// 查询满足要求的总记录数
        $Page = new Page($count,40);// 实例化分页类 传入总记录数和每页显示的记录数
        $show = $Page->vii_show();// 分页显示输出
        //进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $weixins=$weixin->field('id,name,logo,code,logo,clicks,like')->where($where)->limit($Page->firstRow.','.$Page->listRows)->order("clicks DESC")->select();
        $this->weixins=$weixins;
        $this->page=$show;
        $this->keys=$keys;
        $this->display();
    }
    //评论
    public function comment(){
        if(!IS_POST){
            echo 3;
            exit;
        }
        if(!$_POST['content']){
            echo 2;
            exit;
        }
        $time_id=$_POST['wx_id']."time";
        if(isset($_SESSION["$time_id"])&& time()-$_SESSION["$time_id"]<60){
            echo 4;
            exit;
        }
        $comment=M('comment');
        $data['wx_id']=$_POST['wx_id'];
        $data['content']=preg_replace ( "/(\<[^\<]*\>|\r|\n|\s|\[.+?\])/is", ' ', $_POST['content'] );
        $data['status']=0;
        $data['ctime']=time();
        if(isset($_SESSION['member_id'])&&$_SESSION['member_id']>0){
            $data['uid']=$_SESSION['member_id'];
        }
        if($comment->data($data)->add()){
            $_SESSION["$time_id"]=time();
            echo 1;
            exit;
        }else{
            echo 0;
            exit;
        }
    }
    //赞操作
    public function like(){
        if(!IS_POST){
            echo 3;
            exit;
        }
        $weixin=M('weixin');
        $action=M('action');
        $where['wx_id']=$_POST['id'];
        $where['ip']=get_client_ip();
        $where_wx['id']=$_POST['id'];
        $had_zan=$action->where($where)->find();
        $infos=$weixin->where($where_wx)->find();
        $data_wx['like']=$infos['like']+1;
        $data['wx_id']=$_POST['id'];
        $data['ip']=get_client_ip();
        $data['type']='like';
        $data['ctime']=time();
        if(!empty($had_zan)){
            echo 2;
            exit;
        }
        if($weixin->where($where_wx)->data($data_wx)->save()){
            $action->data($data)->add();
            echo 1;
            exit;
        }else{
           echo 0;
            exit;
        }
    }
    //测试分组
    public function gg(){
        $model=M('chat');
        $all=$model->where(array('id'=>16))->getField('type');
        echo$all;
        exit;
    }
}