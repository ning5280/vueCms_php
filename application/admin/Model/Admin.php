<?php
/**
 * Created by PhpStorm.
 * User: ning
 * Date: 17/5/11
 * Time: 下午4:38
 */

namespace app\admin\model;
use app\admin\model\Common;

class Admin extends Common
{
    protected $name = 'admin_admin';

    
    public function getAll(){
        return $this->field('cms_admin_role.name as rname,cms_admin_admin.username,cms_admin_admin.remark,cms_admin_admin.id,cms_admin_admin.realname,cms_admin_admin.status,cms_admin_admin.rid,cms_admin_admin.create_time,cms_admin_admin.update_time')->join("cms_admin_role","cms_admin_role.id = cms_admin_admin.rid","LEFT")->order('update_time', 'desc')->select();

    }
}