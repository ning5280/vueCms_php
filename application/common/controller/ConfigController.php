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
use think\Request;
use think\Session;

class ConfigController extends Controller
{
    public function  _initialize(){
        parent::_initialize();
        $header = Request::instance()->header();
      
    }
    public function index()
    {
        return '111';
    }
}
