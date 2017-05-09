<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/13
 * Time: 12:35
 */
namespace app\common\model;

use think\Model;

class Notepad extends Model
{
    protected $table = 'notepad';

    public function add($data){
        return $this->save($data);
    }

    public function getAll($data=array()){
        return $this->where($data)->order('update_time', 'desc')->select();
    }

    public function edit($data){
        return $this->save($data,['id'=>$data['id']]);
    }

    public function getInfo($id){
        return $this->where('id',$id)->find();
    }
    public function del($id){
        return $this->where('id',$id)->delete();
    }
}