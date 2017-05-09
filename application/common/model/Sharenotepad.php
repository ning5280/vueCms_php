<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/13
 * Time: 12:35
 */
namespace app\common\model;

use think\Model;

class Sharenotepad extends Model
{
    protected $table = 'share_notepad';

    public function index(){
        return false;
    }

    public function add($data){
        return $this->save($data);
    }

    public function getAll($data){
        return $this->where($data)->select();
    }
    public function del($id){
        return $this->where('id',$id)->delete();
    }

    public function getInfo($id){
        return $this->where('id',$id)->find();
    }
}