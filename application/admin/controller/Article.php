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

class Article extends Controller
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
        $menuModel = new ArticleModel;
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
        $menuModel = new ArticleModel;
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

    public function upload(){
        // 获取表单上传文件 例如上传了001.jpg
        $file = request()->file('image');
        // 移动到框架应用根目录/public/uploads/ 目录下
        $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');

        if($info){
            // 成功上传后 获取上传信息
            // 输出 jpg
//            echo $info->getExtension();
            // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
            echo $info->getSaveName();die;
            // 输出 42a79759f284b767dfcb2a0197904287.jpg
//            echo $info->getFilename();
        }else{
            // 上传失败获取错误信息
            echo $file->getError();die;
        }
    }
}
