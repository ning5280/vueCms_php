<?php
/**
 * Created by PhpStorm.
 * User: ning
 * Date: 17/5/9
 * Time: 上午9:30
 */


namespace app\admin\controller;

use think\captcha\Captcha;
use think\Controller;
use think\Db;

class Login extends Controller
{
    public function index()
    {
        
        $data = input();
        $username = $data['username'];
        $password = md5($data['password']);
        $vcode= $data['code'];
        $captcha = new Captcha();
        $re=$captcha->check($vcode);
        if(!$re){
            echo json_encode(array('code'=>0,'message'=>'验证码错误'));die;
        };
        $userInfo=Db::name('user')->where('username',$username)->find();
        if(md5($userInfo['password'])==$password){
            unset($userInfo['passowrd']);
//            Session::set('userInfo',$userInfo);
            echo json_encode(array('code'=>1,'message'=>'登录成功',data=>$userInfo));die;
        }else{
            echo json_encode(array('code'=>0,'message'=>'用户名或密码错误'));die;

        }
    }

    public function code()
    {
//        captcha_img();
        $captcha = new Captcha();
        return $captcha->entry();
//        print_r(input('session.'));exit;

    }

}
