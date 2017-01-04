<?php

/**
 * 后台首页
 */
namespace Admin\Controller;
use Common\Controller\AdminbaseController;
class HospitalController extends AdminbaseController {
	
    function _initialize()
    {
        parent::_initialize();
        $this->hospital_model = M("hospital");
        $this->city = M("areas");
        $this->term = M("terms");
    }
    /**
     * 后台框架首页
     */
    public function index() {

       	$this->display();

    }
    
    /*
     * 添加医疗机构
     */
    public function addserver()
    {
        $condition['parent_id'] = 0;
        if (get_current_admin_id()!=0) {
            $user = M("users")->where("id=".get_current_admin_id())->find();
            $condition['socail_id'] = $user['socail_id'];
        }
        $result = $this->city->where($condition)->select();
        $term = $this->term->where("parent=1")->select();
        $this->assign('province',$result);
        $this->assign('term',$term);
        $this->display();
    }

    /**
     * 获得城市列表
     */
    public function getcity()
    {
       if (IS_POST) {
           $parent_id = $_POST['parent_id'];
           $condition['parent_id'] = $parent_id;
           $result = M("areas")->where($condition)->select();
           // dump($result);
           echo json_encode($result);
           // exit;
       }
    }

    // /**
    //  * 获得城市列表
    // */
    // public function getprovince()
    // {
    //    if (IS_POST) {
    //        $province_id = $_POST['province_id'];
    //        $condition['parent_id'] = $province_id;
    //        $province = $this->city->where($condition)->select();
    //        echo json_encode($province);
    //    }
    // }

    /*
     * 添加数据
     */
    public function add_post()
    {
        if (IS_POST) {
            if (!empty($_POST['hos_img'])) {
                $data['hos_img'] = sp_asset_relative_url($_POST['hos_img']);
            }
                $data['socail_id'] = 
                $data['hos_name'] = $_POST['hos_name'];
                $data['hos_mobile'] = $_POST['hos_mobile'];
                $data['hos_description'] = htmlspecialchars_decode($_POST['hos_des']);
                $data['stress_id'] = $_POST['stress'];
                $data['area_id'] = $_POST['area'];
                $data['city_id'] = $_POST['city'];
                $data['term_id'] = $_POST['term_id'];
                $data['province_id'] = $_POST['province']; 
                $data['hos_address'] = $_POST['hos_add'];
                $data['create_time'] = date('Y-m-d h:i:s',time());
                $data['sort'] = $_POST['sort'];
                $data['creator_id']  = get_current_admin_id();
                 if ($_POST['socail_id']) {
                    $data['socail_id'] = $_POST['socail_id'];
                }else{
                    $user = M("users")->where("id=".get_current_admin_id())->find();
                    $data['socail_id'] = $user['socail_id'];
                }
                $result = $this->hospital_model->add($data);
                if ($result) {
                    $this->success("添加成功！");
                }else{
                    $this->error("添加失败！");
                }

        }
    }

    /*
     * 显示数据
     */
    public function allfind()
    {
        // echo get_current_admin_id();
        if (get_current_admin_id() != '1') {
            $condition['creator_id'] = get_current_admin_id();
        }
        if (IS_POST && $_POST['tid']!='') {
            $cid = $_POST['tid'];
            $where['term_id'] = $_POST['tid'];
            if (get_current_admin_id() != '1') {
                 $where['creator_id'] = get_current_admin_id();
            }
            $result = $this->hospital_model->where($where)->select();
        }else{
            $result = $this->hospital_model->where($condition)->order('sort ASC')->select();
        }
        //分类
        $term = $this->term->where("parent=1")->select();
        $this->assign('term',$term);
        $this->assign('cid',$cid);
        $this->assign('result',$result);
        $this->display();
    }

    /*
     * 详细数据
     */
    public function edit()
    {
        $id = I('get.id');
        $condition['id'] = $id;
        $result = $this->hospital_model->where($condition)->find();

        $term = $this->term->where("parent=1")->select();

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
        $this->assign('term',$term);
        $this->display();
    }

    /**
     * 修改数据
     * @return [type] [description]
     */
    public function edit_post()
    {
        if (IS_POST) {
            if (!empty($_POST['hos_img'])) {
                $data['hos_img'] = sp_asset_relative_url($_POST['hos_img']);
            }
                $data['hos_name'] = $_POST['hos_name'];
                $data['hos_mobile'] = $_POST['hos_mobile'];
                $data['hos_description'] = htmlspecialchars_decode($_POST['hos_des']);
                $data['stress_id'] = $_POST['stress'];
                $data['area_id'] = $_POST['area'];
                $data['city_id'] = $_POST['city'];
                $data['term_id'] = $_POST['term_id'];
                $data['province_id'] = $_POST['province']; 
                $data['hos_address'] = $_POST['hos_add'];
                $data['update_time'] = date('Y-m-d h:i:s',time());
                $data['sort'] = $_POST['sort'];
                $data['creator_id']  = get_current_admin_id();
                if ($_POST['socail_id']) {
                    $data['socail_id'] = $_POST['socail_id'];
                }else{
                    $user = M("users")->where("id=".get_current_admin_id())->find();
                    $data['socail_id'] = $user['socail_id'];
                }
                $condition['id'] = I('get.id');
                $result = $this->hospital_model->where($condition)->save($data);
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
       $result = $this->hospital_model->where("id=".$id)->delete();
       if ($result) {
           $this->success("删除成功");
       }else{
           $this->error("删除失败");
       }
    }

    public function ban()
    {
        $id = I('get.id');
        $falg = $this->hospital_model->where("id=".$id)->find();
        if ($falg['status']== 0) {
           $result = $this->hospital_model->where("id=".$id)->setField('status',1);
        }else{
             $result = $this->hospital_model->where("id=".$id)->setField('status',0);
        }
        if ($result) {
            $this->success("修改成功");
        }else{
            $this->error("修改失败");
        }
    }




}

