<?php
/**
 * Created by PhpStorm.
 * User: ning
 * Date: 17/5/11
 * Time: 下午4:38
 */

namespace app\admin\model;

use think\Db;
use app\admin\model\Common;

class Article extends Common
{
    protected $name = 'admin_article';
    protected  $relationModel = ['admin_menu'];
    protected $fk = 'id';
    public function pageList($where = array(),$pageNo,$pageSize){
       $count= $this->join("cms_admin_menu","cms_admin_menu.id = cms_admin_article.mid","LEFT")->where($where)->count();
        $startNo = ($pageNo-1)*$pageSize;
        $list=  $this->field('cms_admin_menu.title as mtitle,cms_admin_article.*')->join("cms_admin_menu","cms_admin_menu.id = cms_admin_article.mid","LEFT")->where($where)->order('update_time', 'desc')->limit($startNo,$pageSize)->select();
        return array('list'=>$list,'count'=>$count,'pageNo'=>$pageNo);
    }

}