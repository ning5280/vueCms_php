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

class ConfigController extends Controller
{
    public function  _initialize(){
        parent::_initialize();
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
        header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, authKey, sessionId");
    }
    public function index()
    {
        return '111';
    }
}
