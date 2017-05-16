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
class AdminAdmin extends Validate{

    protected $rule = array(
        'username'      		=> 'require',
        'password'      	=> 'require',
        'rid'      		=> 'require',
    );
    protected $message = array(
        'username.require'    		=> '用户名必须填写',
        'password.require'    	=> '密码必须填写',
        'rid.require'    	=> '角色不能为空',
    );

    protected  $scene = [
        'add' => ['username', 'password','rid'],// 添加
        'edit' =>['username','id', 'rid'],
//        'listorder' => ['id', 'listorder'], //排序
//        'status' => ['id', 'status'],
    ];
}