<?php
namespace Admin\Controller;
use Common\Controller\AdminbaseController;
class PropertyController extends AdminbaseController{

	function _initialize() {

		parent::_initialize();
		$this->adv_model = M("adv");
		$this->wyuser_model = M("wyuser");
	}

	function index(){
		$this->display();
	}

	/*
		公告添加
	 */
	public function ads_add()
	{
        $this->display();
	}

	public function money()
	{
		$this->display();
	}

	public function user()
	{
		$this->display();
	}

	public function user_add()
	{
		$term = M("terms")->where("parent=5")->select();
        $this->assign('term',$term);
		$this->display();
	}

	public function user_admin()
	{

        if (get_current_admin_id() != '1') {
            $condition['creator_id'] = get_current_admin_id();
        }
        if (IS_POST && $_POST['tid']!='') {
            $cid = $_POST['tid'];
            $where['term_id'] = $_POST['tid'];
            $result = $this->wyuser_model->where($where)->select();
        }else{
            $result = $this->wyuser_model->where($condition)->order('sort ASC')->select();
        }
        //分类
        $term = M("terms")->where("parent=5")->select();
        $this->assign('term',$term);
        $this->assign('cid',$cid);
        $this->assign('result',$result);
		$this->display();
	}

	public function user_edit()
	{
		$id = I('get.id');
        $condition['id'] = $id;
        $result = $this->wyuser_model->where($condition)->find();
        $term = M("terms")->where("parent=5")->select();
        $this->assign('result',$result);
        $this->assign('term',$term);
		$this->display();
	}

	public function user_epost()
	{
		if (IS_POST) {
			if (!empty($_POST['hos_img'])) {
                $data['user_img'] = sp_asset_relative_url($_POST['hos_img']);
            }
			$data['user_name'] = $_POST['adv_name'];
			$data['term_id'] = $_POST['term_id'];
			$data['sort'] = '0';
			$data['user_content'] = htmlspecialchars_decode($_POST['adv_content']);
			$data['update_time'] = date('y-m-d h:i:s',time());
			$data['creator_id']  = get_current_admin_id();
			$data['user_mobile'] = $_POST['hos_mobile'];
			if ($_POST['socail_id']) {
                    $data['socail_id'] = $_POST['socail_id'];
                }else{
                    $user = M("users")->where("id=".get_current_admin_id())->find();
                    $data['socail_id'] = $user['socail_id'];
                }
			$condition['id'] = I('get.id');
			$result = $this->wyuser_model->where($condition)->save($data);
			if ($result) {
				$this->success("添加成功！");
			}else{
				$this->error("添加失败！");
			}
		}
	}

	public function user_delete()
	{
	   $id = I('get.id');
       $result = $this->wyuser_model->where("id=".$id)->delete();
       if ($result) {
           $this->success("删除成功");
       }else{
           $this->error("删除失败");
       }
	}

	public function user_ban()
    {
        $id = I('get.id');
        $falg = $this->wyuser_model->where("id=".$id)->find();
        if ($falg['status']== 0) {
           $result = $this->wyuser_model->where("id=".$id)->setField('status',1);
        }else{
             $result = $this->wyuser_model->where("id=".$id)->setField('status',0);
        }
        if ($result) {
            $this->success("修改成功");
        }else{
            $this->error("修改失败");
        }
    }

	public function user_post()
	{
		if (IS_POST) {
			if (!empty($_POST['hos_img'])) {
                $data['user_img'] = sp_asset_relative_url($_POST['hos_img']);
            }
			$data['user_name'] = $_POST['adv_name'];
			$data['term_id'] = $_POST['term_id'];
			$data['sort'] = '0';
			$data['user_content'] = htmlspecialchars_decode($_POST['adv_content']);
			$data['create_time'] = date('y-m-d h:i:s',time());
			$data['creator_id']  = get_current_admin_id();
			$data['user_mobile'] = $_POST['hos_mobile'];
			if ($_POST['socail_id']) {
                    $data['socail_id'] = $_POST['socail_id'];
                }else{
                    $user = M("users")->where("id=".get_current_admin_id())->find();
                    $data['socail_id'] = $user['socail_id'];
            }
			$result = $this->wyuser_model->add($data);
			if ($result) {
				$this->success("添加成功！");
			}else{
				$this->error("添加失败！");
			}
		}
	}	

	public function ads_main()
	{
		$condition['creator'] = get_current_admin_id();
		$result = $this->adv_model->where($condition)->select();
		$this->assign('posts',$result);
		$this->display();
	}

	/*
		添加数据
	 */
	public function ads_post()
	{
		if (IS_POST) {
			$data['adv_name'] = $_POST['adv_name'];
			$data['sort'] = $_POST['sort'];
			$data['adv_content'] = htmlspecialchars_decode($_POST['adv_content']);
			$data['create_time'] = date('y-m-d h:i:s',time());
			$data['creator_id']  = get_current_admin_id();
			if ($_POST['socail_id']) {
                    $data['socail_id'] = $_POST['socail_id'];
            }else{
                    $user = M("users")->where("id=".get_current_admin_id())->find();
                    $data['socail_id'] = $user['socail_id'];
            }
			$result = $this->adv_model->add($data);
			if ($result) {
				$this->success("添加成功！");
			}else{
				$this->error("添加失败！");
			}

		}
	}

	public function edit()
	{
		$id = intval(I("get.id"));
		$post = $this->adv_model->where("id=".$id)->find();
		$this->assign('post',$post);
		$this->display();
	}

	public function ads_edits()
	{
		$id = I("get.id");
		if (IS_POST) {
			$data['adv_name'] = $_POST['adv_name'];
			$data['sort'] = $_POST['sort'];
			$data['adv_content'] = htmlspecialchars_decode($_POST['adv_content']);
			$data['update_time'] = date('y-m-d h:i:s',time());
			$data['creator_id']  = get_current_admin_id();
			if ($_POST['socail_id']) {
                    $data['socail_id'] = $_POST['socail_id'];
                }else{
                    $user = M("users")->where("id=".get_current_admin_id())->find();
                    $data['socail_id'] = $user['socail_id'];
                }
			$result = $this->adv_model->where("id=".$id)->save($data);
			if ($result) {
				$this->success("修改成功！");
			}else{
				$this->error("修改失败！");
			}

		}
	}

	public function delete()
	{
		$id = I("get.id");
		$result = $this->adv_model->where("id=".$id)->delete();
		if ($result) {
			$this->success("删除成功");
        }else{
            $this->error("删除失败");
       	}
	}


}
