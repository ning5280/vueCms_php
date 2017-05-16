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

class Admin extends Controller
{
    public function _initialize()
    {
        parent::_initialize();
        if(input('post.id')==1||is_array(input('post.id'))&&in_array(1,input('post.id'))){
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
        $roleModel = new AdminModel;
        $re=$roleModel->createData($data);
        if($re){
            echo json_encode(array('code'=>1,'message'=>'添加成功','data'=>$id));die;
        }else{
            echo json_encode(array('code'=>0,'message'=>$roleModel->getError()));die;
        }
    }


    public function edit()
    {

        $data = input();
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
        $roleModel = new AdminModel;
        if(is_array($data['id'])){
            $idList = $data['id'];
        }else{
            $idList = [$data['id']];
        }
        $re=$roleModel->delDatas($idList);
        if($re){
            echo json_encode(array('code'=>1,'message'=>'删除成功'));die;
        }else{
            echo json_encode(array('code'=>0,'message'=>$roleModel->getError()));die;
        }
    }


    public function info(){
        $data = input();
        $roleModel = new AdminModel;
        $re=$roleModel->getDataById($data['id']);
        echo json_encode(array('code'=>1,'data'=>$re));die;
    }
}
