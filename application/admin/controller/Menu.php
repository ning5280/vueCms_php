<?php
/**
 * Created by PhpStorm.
 * User: ning
 * Date: 17/5/9
 * Time: 上午9:30
 */


namespace app\admin\controller;

use app\common\controller\CommonController;
use com\Tree;
use think\Cache;
use think\captcha\Captcha;
use think\Controller;
use think\Db;
use app\admin\model\Menu as MenuModel;

class Menu extends Controller
{
    public function index()
    {
        $menuModel = new MenuModel;
        $id = input('post.id','0');
        $re=$menuModel->getAllChild($id);
        var_dump($re);
    }

    public function add()
    {

        $data = input();
        $id = createId();
        $data['id'] = $id;
        $menuModel = new MenuModel;
        $re=$menuModel->createData($data);
        if($re){
            echo json_encode(array('code'=>1,'message'=>'添加成功','data'=>$id));die;
        }else{
            echo json_encode(array('code'=>0,'message'=>$menuModel->getError()));die;
        }
    }


    public function edit()
    {

        $data = input();
        $menuModel = new MenuModel;
        $re=$menuModel->updateDataById($data,$data['id']);
        if($re){
            echo json_encode(array('code'=>1,'message'=>'编辑成功'));die;
        }else{
            echo json_encode(array('code'=>0,'message'=>$menuModel->getError()));die;
        }
    }

    public function del()
    {

        $data = input();
        $menuModel = new MenuModel;
        $re=$menuModel->delDataById($data['id']);
        if($re){
            echo json_encode(array('code'=>1,'message'=>'删除成功'));die;
        }else{
            echo json_encode(array('code'=>0,'message'=>$menuModel->getError()));die;
        }
    }

    public function tree(){
        $tree =  new Tree();
        $re=Db::name('admin_menu')->select();
        $treeData=$tree->toFormatTree($re);
        echo json_encode(array('code'=>1,'data'=>$treeData));die;

    }
}
