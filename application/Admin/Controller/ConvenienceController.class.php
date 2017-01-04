<?php
namespace Admin\Controller;
use Common\Controller\AdminbaseController;
class ConvenienceController extends AdminbaseController {
	
    function _initialize()
    {
        parent::_initialize();
        $this->convention_model =  M("Convenience");
        $this->term = M("terms");
        $this->city = M("areas");
    }

    /*
     餐饮管理
     */
    public function food()
    {
        // if (get_current_admin_id()!=0) {
        //     $user = M("users")->where("id=".get_current_admin_id())->find();
        //     $condition['socail_id'] = $user['socail_id'];
        // }
        if (get_current_admin_id() != '1') {
            $condition['creator_id'] = get_current_admin_id();
        }
            $condition['parent_id'] = '25';
        if (IS_POST && $_POST['tid']!='') {
            $cid = $_POST['tid'];
            $where['term_id'] = $_POST['tid'];
            $result = $this->convention_model->where($where)->select();
        }else{
            $result = $this->convention_model->where($condition)->order('sort ASC')->select();
        }
        //分类
        $term = $this->term->where("parent=25")->select();
        $this->assign('term',$term);
        $this->assign('cid',$cid);
        $this->assign('result',$result);
        $this->display();
    }

    /*
     装修管理
     */
    public function renovation()
    {
        // if (get_current_admin_id()!=0) {
        //     $user = M("users")->where("id=".get_current_admin_id())->find();
        //     $condition['socail_id'] = $user['socail_id'];
        // }
        if (get_current_admin_id() != '1') {
            $condition['creator_id'] = get_current_admin_id();
        }
            $condition['parent_id'] = '26';
        if (IS_POST && $_POST['tid']!='') {
            $cid = $_POST['tid'];
            $where['term_id'] = $_POST['tid'];
            $result = $this->convention_model->where($where)->select();
        }else{
            $result = $this->convention_model->where($condition)->order('sort ASC')->select();
        }
        //分类
        $term = $this->term->where("parent=26")->select();
        $this->assign('term',$term);
        $this->assign('cid',$cid);
        $this->assign('result',$result);
        $this->display();
    }

    /*
     租赁管理
     */
    public function lease()
    {
        // if (get_current_admin_id()!=0) {
        //     $user = M("users")->where("id=".get_current_admin_id())->find();
        //     $condition['socail_id'] = $user['socail_id'];
        // }
        if (get_current_admin_id() != '1') {
            $condition['creator_id'] = get_current_admin_id();
        }
            $condition['parent_id'] = '27';
        if (IS_POST && $_POST['tid']!='') {
            $cid = $_POST['tid'];
            $where['term_id'] = $_POST['tid'];
            $result = $this->convention_model->where($where)->select();
        }else{
            $result = $this->convention_model->where($condition)->order('sort ASC')->select();
        }
        //分类
        $term = $this->term->where("parent=27")->select();
        $this->assign('term',$term);
        $this->assign('cid',$cid);
        $this->assign('result',$result);
        $this->display();
    }

    /*
     其他管理
     */
     public function other()
     {
        // if (get_current_admin_id()!=0) {
        //     $user = M("users")->where("id=".get_current_admin_id())->find();
        //     $condition['socail_id'] = $user['socail_id'];
        // }
        if (get_current_admin_id() != '1') {
            $condition['creator_id'] = get_current_admin_id();
        }
            $condition['parent_id'] = '28';
        if (IS_POST && $_POST['tid']!='') {
            $cid = $_POST['tid'];
            $where['term_id'] = $_POST['tid'];
            $result = $this->convention_model->where($where)->select();
        }else{
            $result = $this->convention_model->where($condition)->order('sort ASC')->select();
        }
        //分类
        $term = $this->term->where("parent=28")->select();
        $this->assign('term',$term);
        $this->assign('cid',$cid);
        $this->assign('result',$result);
        $this->display();
     }

     /*
      添加服务
      */
    public function addserver()
    {
        if (get_current_admin_id()!=0) {
            $user = M("users")->where("id=".get_current_admin_id())->find();
            $condition['socail_id'] = $user['socail_id'];
        }
        $condition['parent_id'] = 0;
        $result = $this->city->where($condition)->select();
        $term = $this->term->where("parent=4")->select();
        $this->assign('province',$result);
        $this->assign('term',$term);
        $this->display();
    }

    /*
     获得详细
     */
    public function getdetail()
    {
        if (IS_POST) {
            $term_id = $_POST['term_id'];
            $detail = $this->term->where("parent=".$term_id)->select();
            echo json_encode($detail);
        }
    }

    /*
     * 添加数据
     */
    public function add_post()
    {
        if (IS_POST) {
            if (!empty($_POST['hos_img'])) {
                $data['con_img'] = sp_asset_relative_url($_POST['hos_img']);
            }
                $data['con_name'] = $_POST['hos_name'];
                $data['con_mobile'] = $_POST['hos_mobile'];
                $data['con_description'] = htmlspecialchars_decode($_POST['hos_des']);
                $data['stress_id'] = $_POST['stress'];
                $data['area_id'] = $_POST['area'];
                $data['city_id'] = $_POST['city'];
                $data['parent_id'] = $_POST['term_id'];
                $data['term_id'] = $_POST['detail_id'];
                $data['province_id'] = $_POST['province']; 
                $data['con_address'] = $_POST['hos_add'];
                $data['create_time'] = date('Y-m-d h:i:s',time());
                $data['sort'] = $_POST['sort'];
                $data['creator_id']  = get_current_admin_id();
                if ($_POST['socail_id']) {
                    $data['socail_id'] = $_POST['socail_id'];
                }else{
                    $user = M("users")->where("id=".get_current_admin_id())->find();
                    $data['socail_id'] = $user['socail_id'];
                }
                $result = $this->convention_model->add($data);
                if ($result) {
                    $this->success("添加成功！");
                }else{
                    $this->error("添加失败！");
                }

        }
    }

        /*
     * 详细数据
     */
    public function edit()
    {
        $id = I('get.id');
        $condition['id'] = $id;
        $result = $this->convention_model->where($condition)->find();

        $term = $this->term->where("parent=4")->select();
        $detail = $this->term->where("parent=".$result['parent_id'])->select();
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
        $this->assign('detail',$detail);
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
                $data['con_img'] = sp_asset_relative_url($_POST['hos_img']);
            }
                $data['con_name'] = $_POST['hos_name'];
                $data['con_mobile'] = $_POST['hos_mobile'];
                $data['con_description'] = htmlspecialchars_decode($_POST['hos_des']);
                $data['stress_id'] = $_POST['stress'];
                $data['area_id'] = $_POST['area'];
                $data['city_id'] = $_POST['city'];
                $data['parent_id'] = $_POST['term_id'];
                $data['term_id'] = $_POST['detail_id'];
                $data['province_id'] = $_POST['province']; 
                $data['con_address'] = $_POST['hos_add'];
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
                $result = $this->convention_model->where($condition)->save($data);
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
       $result = $this->convention_model->where("id=".$id)->delete();
       if ($result) {
           $this->success("删除成功");
       }else{
           $this->error("删除失败");
       }
    }

    public function ban()
    {
        $id = I('get.id');
        $falg = $this->convention_model->where("id=".$id)->find();
        if ($falg['status']== 0) {
           $result = $this->convention_model->where("id=".$id)->setField('status',1);
        }else{
             $result = $this->convention_model->where("id=".$id)->setField('status',0);
        }
        if ($result) {
            $this->success("修改成功");
        }else{
            $this->error("修改失败");
        }
    }
}