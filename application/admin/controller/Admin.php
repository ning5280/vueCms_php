<?php
/**
 * Created by PhpStorm.
 * User: ning
 * Date: 17/5/9
 * Time: 上午9:30
 */


namespace app\admin\controller;

use app\common\controller\CommonController;
use think\Controller;
use think\Db;
use app\admin\model\Admin as AdminModel;

class Admin extends CommonController
{
    public function _initialize()
    {
        parent::_initialize();
        $id = input('post.id/a',0);
        if($id==1||is_array($id)&&in_array(1,$id)){
            echo json_encode(array('code'=>0,'message'=>'无法操作admin相关'));die;
        }
    }

    public function index()
    {
        $adminModel = new AdminModel;
        $re = $adminModel->getAll();
        echo json_encode(array('code'=>1,'data'=>$re));die;
    }

    public function add()
    {

        $data = input();
        $id = createId();
        $data['id'] = $id;
        $data['password'] = md5($data['password']);
        $adminModel = new AdminModel;
        $re=$adminModel->createData($data);
        if($re){
            echo json_encode(array('code'=>1,'message'=>'添加成功','data'=>$id));die;
        }else{
            echo json_encode(array('code'=>0,'message'=>$adminModel->getError()));die;
        }
    }


    public function edit()
    {

        $data = input();
        if(input('post.password',0)){
            $data['password'] = md5($data['password']);
        }
        $roleModel = new AdminModel;
        $re=$roleModel->updateDataById($data,$data['id']);
        if($re){
            echo json_encode(array('code'=>1,'message'=>'编辑成功'));die;
        }else{
            echo json_encode(array('code'=>0,'message'=>$roleModel->getError()));die;
        }
    }

    public function del()
    {

        $data = input();
        $adminModel = new AdminModel;
        if(is_array($data['id'])){
            $idList = $data['id'];
        }else{
            $idList = [$data['id']];
        }
        $re=$adminModel->delDatas($idList);
        if($re){
            echo json_encode(array('code'=>1,'message'=>'删除成功'));die;
        }else{
            echo json_encode(array('code'=>0,'message'=>$adminModel->getError()));die;
        }
    }


    public function info(){
        $data = input();
        $roleModel = new AdminModel;
        $re=$roleModel->getDataById($data['id']);
        echo json_encode(array('code'=>1,'data'=>$re));die;
    }

    //根据菜单id进行显示隐藏
    public function changestatus(){
        $id = input('id',0);
        $status = input('status',1);
        $adminModel = new AdminModel;
//        $idList =$menuModel->getAllChild($id);
//        array_push($idList,$id);
//        $re=Db::name('admin_menu')->where('id','in',$idList)->update(array('status'=>$status));
        $re=$adminModel->enableDatas([$id],$status);
        if($re){
            echo json_encode(array('code'=>1,'message'=>'状态更新成功'));die;
        }else{
            echo json_encode(array('code'=>0,'message'=>'状态更新失败'));die;

        }
    }
}
