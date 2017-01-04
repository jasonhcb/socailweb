<?php

namespace Portal\Controller;
use Common\Controller\HomebaseController; 
/**
 * 首页
 */
class FixController extends HomebaseController {
	
	function _initialize()
    {
        parent::_initialize();
        $this->socail_model = M("socail");
        $this->adv = M("adv");
        $this->posts = M("posts");
        $this->term  = M("terms");
        $this->fix = M("fix");
    }

    //首页
	public function index() {
		//社区获取
		$socail = $this->socail_model->where("status = 1")->select();
		$term   = $this->term->where("parent=2")->select();
		$id = I('get.id');
		if (I('get.term_id')) {
			$condition['term_id'] = I('get.term_id');
		}
		$pages = I('get.page')? I('get.page'):0;
		if($pages < 0){
			$pages = 0;
		}
		if ( $id && $id!='all') {
			$condition['socail_id'] = I("get.id");
		}
		$fix = $this->fix->where($condition)->limit($pages*10,10)->select();
		$allc = $this->fix->where($condition)->select();
		$count = count($allc);
		$allpage = $count%10;
		// echo $allpage;
		foreach ($fix as $key => $value) {
			$where['area_id'] = array('in',array($value['province_id'],$value['city_id'],$value['area_id'],$value['stress_id']));
			$areas = M("areas")->where($where)->select();
			$arr[$key]  = $value;
			$arr[$key]['province'] = $areas[0]['area_name'];
			$arr[$key]['city'] = $areas[1]['area_name'];
			$arr[$key]['area'] = $areas[2]['area_name'];
			$arr[$key]['stress'] = $areas[3]['area_name'];
		}
		// dump($arr);
		// //社区公告
		// $adv = $this->adv->where($condition)->limit(8)->select();

		// //社区活动
		// //社区新闻
		// $posts = $this->posts->join('sys_term_relationships as a ON sys_posts.id = a.tid')->where($condition)->limit(8)->select();

		// $this->assign('posts',$posts);
		$this->assign('allpage',$allpage);
		$this->assign('fix',$arr);
		$this->assign('term',$term);
		$this->assign('socail',$socail);
    	$this->display();
    }


}


