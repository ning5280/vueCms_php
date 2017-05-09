<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/13
 * Time: 12:35
 */
namespace app\common\model;

use think\Model;

class User extends Model
{
    protected $table = 'user';

    public function add($data){
        return $this->save($data);
    }

    public function edit($data){
        return $this->save($data,['openid'=>$data['openid']]);
    }

    public function info($data){
        return $this->where($data)->find();
    }


}