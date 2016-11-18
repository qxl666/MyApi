<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Session;
use Cookie;
use Storage;
use DB,Input,Redirect,url,Validator,Request;
use App\Http\Controllers\Controller;
class LoginController extends Controller
{
    public function index(){
        return view('login.login');
    }
    /**
     * 登录接口
     * @param Request $request
     * @return bool|string
     */
    public function login(){
        $callback=$_GET['callback'];
        $name = Request::get('username');
        $pwd = Request::get('pwd');
        $arr = DB::table('user')->where(['name'=>$name,'password'=>$pwd])->get();
        return $callback . '(' . json_encode($arr) . ')';

    }

  /*  public function login()
    {

        //接值
        $callback = $_GET['callback'];
        $name = Request::get('username');
        $pwd = Request::get('pwd');
        $arr = DB::table('user')->where(['name'=>$name,'password'=>$pwd])->get();

        if($arr){
            $token='';
            $token = $name."wang";
            $arr['token'] = $token;
           //ar_dump($arr);
            return $callback.'('.json_encode($arr).')';;
        }else{
            echo 123;
            return false;
        }
    }*/}