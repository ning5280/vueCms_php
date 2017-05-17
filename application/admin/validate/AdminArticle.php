<?php
/**
 * Created by PhpStorm.
 * User: ning
 * Date: 17/5/11
 * Time: 下午4:52
 */
namespace app\admin\validate;
use think\Validate;
/**
 * 设置模型
 */
class AdminArticle extends Validate{

    protected $rule = array(
        'title'      		=> 'require',
        'mid'      	=> 'require',
        'id'      		=> 'require',
    );
    protected $message = array(
        'title.require'    		=> '标题必须填写',
        'mid.require'    	=> '菜单id必须填写',
        'id.require'    	=> 'id不能为空',
    );

    protected  $scene = [
        'add' => ['title', 'mid', 'id'],// 添加
        'edit' =>['id'],
//        'listorder' => ['id', 'listorder'], //排序
//        'status' => ['id', 'status'],
    ];
}