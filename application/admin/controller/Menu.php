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
use think\Controller;
use think\Db;
use app\admin\model\Menu as MenuModel;

class Menu extends CommonController
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
        if(is_array($data['id'])){
            $idList = $data['id'];
        }else{
            $idList = [$data['id']];
        }
        $re=$menuModel->delDatas($idList,true);
        if($re){
            echo json_encode(array('code'=>1,'message'=>'删除成功'));die;
        }else{
            echo json_encode(array('code'=>0,'message'=>$menuModel->getError()));die;
        }
    }
    //查询菜单属性结构图
    public function tree(){
        $tree =  new Tree();
        $re=Db::name('admin_menu')->order('sort')->select();
        $treeData=$tree->toFormatTree($re);
        echo json_encode(array('code'=>1,'data'=>$treeData));die;

    }

    //根据菜单id进行显示隐藏
    public function changestatus(){
        $id = input('id',0);
        $status = input('status',1);
        $menuModel = new MenuModel;
//        $idList =$menuModel->getAllChild($id);
//        array_push($idList,$id);
//        $re=Db::name('admin_menu')->where('id','in',$idList)->update(array('status'=>$status));
        $re=$menuModel->enableDatas([$id],$status,true);
        if($re){
            echo json_encode(array('code'=>1,'message'=>'状态更新成功'));die;
        }else{
            echo json_encode(array('code'=>0,'message'=>'状态更新失败'));die;

        }
    }
}
