<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Session;
use Cookie;
use DB,Input,Redirect,url,Validator,Request;
use App\Http\Controllers\Controller;

class CommonController extends Controller{
    public function __construct(){
        //parent::__construct();
        //判断管理员权限
        if(!$this->checkAcc())
        {
            echo "没有权限";
            //return redirect('login/index');
        }
    }
    /**
     * 判断权限
     */
    public function checkAcc(){
        //获取当前控制器 / 方法
        $action = \Route::current()->getActionName();
        list($class, $method) = explode('@', $action);
        $controller = substr(strrchr($class,'\\'),1);
        $power=session::get('power');
        foreach($power as $val)
        {
            if($controller==$val['pcontroller'] && $method==$val['paction'])
            {
                return true;
            }
        }
        return false;die;
        //var_dump($class);die;//string(36) "App\Http\Controllers\PowerController"
        //return ['controller' => $class, 'method' => $method];
    }
}