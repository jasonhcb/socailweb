<?php
/**
 * 搜索结果页面
 */
namespace Portal\Controller;
use Common\Controller\HomebaseController;
class ApointController extends HomebaseController {
   

    public function index()
    {
    	// $term_id = I("get.term_id");
    	// $server_id = I("get.server_id");
    	// $socail_id =  I("get.id") ? I("get.id"):1;
    	// M("terms")->where("")
    	$this->display();
    }

    public function add()
    {
    	if(sp_is_user_login()){ //已经登录时直接跳到首页
	      	if(!sp_check_verify_code()){
            	$this->error("验证码错误！");
        	}
        	if (IS_POST) {
        		$data['user_id'] = get_current_admin_id();
                $data['server_name'] = $_POST['server_name'];
        		$data['user_name'] = $_POST['user_name'];
        		$data['user_mobile'] = $_POST['user_mobile'];
        		$data['apoint_time'] = $_POST['apoint_time'];
        		$data['term_id'] = $_POST['term_id'];
        		$data['server_id'] =$_POST['server_id'];
        		$data['appoint_id'] = "Soc".$_POST['term_id'].$_POST['server_id'];
        		$data['from_table'] = $_POST['from_table'];
                $user = M("users")->where("id=".get_current_admin_id())->find();
                $data['socail_id'] = $user['socail_id'];
                $data['apoint_content'] = $_POST['apoint_content'];
        		// dump($data);
        		// exit;
        	}
        	$result = M("apoint")->add($data);
        	if ($result) {
        		$this->success("预约成功",U("user/center/index"));
        	}else{
        		$this->error("预约失败",U("user/portal/index"));
        	}
	    }else{
	      $this->error("您好没有登陆，请登录");
	    }
    }
    
}
