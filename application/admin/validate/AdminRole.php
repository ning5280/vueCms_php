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
class AdminRole extends Validate{

    protected $rule = array(
        'name'      	=> 'require',
    );
    protected $message = array(
        'name.require'    	=> '定义名必须填写',
    );

    protected  $scene = [
        'add' => ['name'],// 添加
        'edit' =>['name'],
//        'listorder' => ['id', 'listorder'], //排序
//        'status' => ['id', 'status'],
    ];
}