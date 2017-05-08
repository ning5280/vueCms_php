<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/12
 * Time: 22:55
 */

namespace app\common\controller;
use think\Cache;
use think\Controller;
use think\Db;
use think\Session;

class CommonController extends Controller
{
    public function  _initialize(){

        if(empty(Session::get('user'))) {
            echo json_encode(array('code' => 2, 'message' => '请先登录'));
            die;
        }
    }
    public function index()
    {
        return '111';
    }
}
