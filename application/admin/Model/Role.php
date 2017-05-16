<?php
/**
 * Created by PhpStorm.
 * User: ning
 * Date: 17/5/11
 * Time: 下午4:38
 */

namespace app\admin\model;
use app\admin\model\Common;

class Role extends Common
{
    protected $name = 'admin_role';

    
    public function getAll(){
        return $this->order("sort desc")->select();
    }
}