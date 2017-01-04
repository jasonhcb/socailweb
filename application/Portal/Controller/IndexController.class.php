<?php
// +----------------------------------------------------------------------
// | ThinkCMF [ WE CAN DO IT MORE SIMPLE ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013-2014 http://www.thinkcmf.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: Dean <zxxjjforever@163.com>
// +----------------------------------------------------------------------
namespace Portal\Controller;
use Common\Controller\HomebaseController; 
/**
 * 首页
 */
class IndexController extends HomebaseController {
	
	function _initialize()
    {
        parent::_initialize();
        $this->socail_model = M("socail");
        $this->adv = M("adv");
        $this->posts = M("posts");
    }

    //首页
	public function index() {
		//社区获取
		$socail = $this->socail_model->where("status = 1")->select();
		
		$id = I('get.id');
		if ( $id && $id!='all') {
			$condition['socail_id'] = I("get.id");
		}

		//社区公告
		$adv = $this->adv->where($condition)->limit(8)->select();

		//社区活动
		//社区新闻
		$posts = $this->posts->join('sys_term_relationships as a ON sys_posts.id = a.tid')->where($condition)->limit(8)->select();

		$this->assign('posts',$posts);
		$this->assign('adv',$adv);
		$this->assign('socail',$socail);
    	$this->display(":index");
    }


}


