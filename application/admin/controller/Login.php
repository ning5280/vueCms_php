<?php
/**
 * Created by PhpStorm.
 * User: ning
 * Date: 17/5/9
 * Time: 上午9:30
 */


namespace app\admin\controller;

use app\common\controller\ConfigController;
use think\Cache;
use think\captcha\Captcha;
use think\Controller;
use think\Db;

class Login extends ConfigController
{
    public function index()
    {
        $data = input();
        $username = $data['username'];
        $password = md5($data['password']);
//        $vcode= $data['code'];
//        $captcha = new Captcha(config('captcha'));
//        if(!$captcha->check($vcode)){
//            echo json_encode(array('code'=>10,'message'=>'验证码错误'));die;
//        };

        $userInfo=Db::name('admin_user')->where('username',$username)->find();

        if($userInfo['password']==$password){
            $token = createId();
            Cache::set($token,$userInfo['id']);
            unset($userInfo['password']);
            $userInfo['token'] = $token;
            echo json_encode(array('code'=>1,'message'=>'登录成功','data'=>$userInfo));die;
        }else{
            echo json_encode(array('code'=>0,'message'=>'用户名或密码错误'));die;

        }
    }

    public function info()
    {

        return   $this->fetch();
    }

    /**
     * @return mixed
     */
    public function code()
    {
        $captcha = new Captcha(config('captcha'));
        return $captcha->entry();
    }
}
