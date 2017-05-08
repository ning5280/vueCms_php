<?php
namespace app\index\controller;

use app\common\controller\CommonController;
use think\Db;
use think\Session;

class Login extends CommonController
{
    public function index()
    {
       $data = input();
        $username = $data['username'];
        $password = md5($data['password']);
        $userInfo=Db::name('user')->where('username',$username)->find();
        if(md5($userInfo['password'])==$password){
            unset($userInfo['passowrd']);
            Session::set('userInfo',$userInfo);
            echo json_encode(array('code'=>1,'message'=>'登录成功',data=>$userInfo));die;
        }else{
            echo json_encode(array('code'=>0,'message'=>'用户名或密码错误'));die;

        }
    }
}
