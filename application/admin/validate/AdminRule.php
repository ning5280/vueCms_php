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
class AdminRule extends Validate{

    protected $rule = array(
        'title'      		=> 'require',
        'name'      	=> 'require',
        'type'      		=> 'require',
        'pid'       => 'require',
    );
    protected $message = array(
        'title.require'    		=> '名称必须填写',
        'name.require'    	=> '定义名必须填写',
        'type.require'    	=> '级别类型必须填写',
        'pid.require'    	=> '所属规则不能为空',
    );

    protected  $scene = [
        'add' => ['title', 'name','type','pid'],// 添加
        'edit' =>['title', 'name','type','pid','id'],
//        'listorder' => ['id', 'listorder'], //排序
//        'status' => ['id', 'status'],
    ];
}