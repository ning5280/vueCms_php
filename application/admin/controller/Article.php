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
use app\admin\model\Article as ArticleModel;

class Article extends CommonController
{
    public function index()
    {
        $pageNo = input('post.pageNo','1'); //当前页码
        $pageSize = input('post.pageSize','10'); //一页条数
        $where = array(); //筛选条件 暂无
        $articleModel = new ArticleModel;
        $re=$articleModel->pageList($where,$pageNo,$pageSize);
        echo json_encode(array('code'=>1,'data'=>$re));die;
    }

    public function add()
    {

        $data = input();
        $id = createId();
        $data['id'] = $id;
        $articleModel = new ArticleModel;
        $re=$articleModel->createData($data);
        if($re){
            echo json_encode(array('code'=>1,'message'=>'添加成功','data'=>$id));die;
        }else{
            echo json_encode(array('code'=>0,'message'=>$articleModel->getError()));die;
        }
    }


    public function edit()
    {

        $data = input();
        $articleModel = new ArticleModel;
        $re=$articleModel->updateDataById($data,$data['id']);
        if($re){
            echo json_encode(array('code'=>1,'message'=>'编辑成功'));die;
        }else{
            echo json_encode(array('code'=>0,'message'=>$articleModel->getError()));die;
        }
    }

    public function del()
    {
        $data = input();
        $menuModel = new ArticleModel;
        if(is_array($data['id'])){
            $idList = $data['id'];
        }else{
            $idList = [$data['id']];
        }
        $re=$menuModel->delDatas($idList);
        if($re){
            echo json_encode(array('code'=>1,'message'=>'删除成功'));die;
        }else{
            echo json_encode(array('code'=>0,'message'=>$menuModel->getError()));die;
        }
    }
    //查询菜单属性结构图
    public function tree(){
        $tree =  new Tree();
        $re=Db::name('admin_menu')->select();
        $treeData=$tree->toFormatTree($re);
        echo json_encode(array('code'=>1,'data'=>$treeData));die;

    }

    //根据菜单id进行显示隐藏
    public function changestatus(){
        $id = input('id',0);
        $status = input('status',1);
        $menuModel = new ArticleModel;

        $re=$menuModel->enableDatas([$id],$status);
        if($re){
            echo json_encode(array('code'=>1,'message'=>'状态更新成功'));die;
        }else{
            echo json_encode(array('code'=>0,'message'=>'状态更新失败'));die;

        }
    }


    //根据id获取文章详情

    public function info(){
        $data = input();
        $articleModel = new ArticleModel;
        $re=$articleModel->getDataById($data['id']);
        echo json_encode(array('code'=>1,'data'=>$re));die;
    }
}
