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
class AdminMenu extends Validate{

    protected $rule = array(
        'title'      		=> 'require',
        'pid'      	=> 'require',
        'sort'      		=> 'require',
        'id'      		=> 'require',

    );
    protected $message = array(
        'title.require'    		=> '标题必须填写',
        'pid.require'    	=> '父级id必须填写',
        'sort.require'    	=> '排序必须填写',
        'id.require'    	=> 'id不能为空',
    );

    protected  $scene = [
        'add' => ['title', 'pid', 'sort'],// 添加
        'edit' =>['id'],
//        'listorder' => ['id', 'listorder'], //排序
//        'status' => ['id', 'status'],
    ];
}