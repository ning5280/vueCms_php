<?php
/**
 * Created by PhpStorm.
 * User: ning
 * Date: 17/5/9
 * Time: 上午9:30
 */


namespace app\admin\controller;

use think\Cache;
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
//        $vcode= $data['code'];
//        $captcha = new Captcha(config('captcha'));
//        if(!$captcha->check($vcode)){
//            echo json_encode(array('code'=>10,'message'=>'验证码错误'));die;
//        };

        $userInfo=Db::name('admin_admin')->where('username',$username)->find();

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

    public function upload(){
        // 获取表单上传文件 例如上传了001.jpg
        $file = request()->file('image');
        // 移动到框架应用根目录/public/uploads/ 目录下
        $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');

        if($info){
            // 成功上传后 获取上传信息
            // 输出 jpg
//            echo $info->getExtension();
            // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
            echo $info->getSaveName();die;
            // 输出 42a79759f284b767dfcb2a0197904287.jpg
//            echo $info->getFilename();
        }else{
            // 上传失败获取错误信息
            echo $file->getError();die;
        }
    }
}
