<?php
namespace Admin\Controller;
use Common\Controller\AdminbaseController;
class SocailController extends AdminbaseController{

	function _initialize() {
		parent::_initialize();
		$this->socail_model = M("socail");
		$this->city = M("areas");
	}


	public function index(){
		$this->display();
	}

	public function add()
	{
		$condition['parent_id'] = 0;
        $result = $this->city->where($condition)->select();
        $this->assign('province',$result);
		$this->display();	
	}

	public function add_post()
	{
		if (IS_POST) {
			$data['socail_name'] = $_POST['socail_name'];
			$data['stress_id'] = $_POST['stress'];
            $data['area_id'] = $_POST['area'];
            $data['city_id'] = $_POST['city'];
            $data['province_id'] = $_POST['province']; 
            $data['create_time'] = date('Y-m-d h:i:s',time());
            $result = $this->socail_model->add($data);
            if ($result) {
             	$this->success("添加成功！");
            }else{
                $this->error("添加失败！");
            }
		}
	}

	public function edit()
	{
       $id = I('get.id');
        $condition['id'] = $id;
        $result = $this->socail_model->where($condition)->find();

        //查询街道
        $stress_id = $result['stress_id'];
        $sttr = $this->city->where("parent_id=".$result['area_id'])->select();
        //查询区域
        $area_id = $result['area_id'];
        $area = $this->city->where("parent_id=".$result['city_id'])->select();
        //查询城市
        $city_id = $result['city_id'];
        $city = $this->city->where("parent_id=".$result['province_id'])->select();
        //查询省份
        $province_id = $result['province_id'];
        $province = $this->city->where("parent_id=0")->select();
        //街道
        $this->assign('area_id',$area_id);
        $this->assign('area',$area);
        //区域
        $this->assign('sttret_id',$stress_id);
        $this->assign('sttr',$sttr);
        //城市
        $this->assign('city_id',$city_id);
        $this->assign('city',$city);
        //省份
        $this->assign('province_id',$province_id);
        $this->assign('province',$province);

        $this->assign('result',$result);
        $this->display();
	}

	public function edit_post()
	{
		if (IS_POST) {
			$id = I('get.id');
			$data['socail_name'] = $_POST['socail_name'];
			$data['stress_id'] = $_POST['stress'];
            $data['area_id'] = $_POST['area'];
            $data['city_id'] = $_POST['city'];
            $data['province_id'] = $_POST['province']; 
            $data['update_time'] = date('Y-m-d h:i:s',time());
            $result = $this->socail_model->where("id=".$id)->save($data);
            if ($result) {
             	$this->success("修改成功！");
            }else{
                $this->error("修改失败！");
            }
		}
	}

	public function delete()
    {
       $id = I('get.id');
       $result = $this->socail_model->where("id=".$id)->delete();
       if ($result) {
           $this->success("删除成功");
       }else{
           $this->error("删除失败");
       }
    }

	public function main()
	{
		$result = $this->socail_model->select();
		$this->assign('result',$result);
		$this->display();
	}


}
