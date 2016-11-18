<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Session;
use Cookie;
use Storage;
use DB,Input,Redirect,url,Validator,Request;
use App\Http\Controllers\Controller;
header("content-type:text/html;charset=utf-8");
class LoginController extends Controller{
    /**
     * 登陆页面
     */
    public function index(){
        $data=Request::input();
        if($data){
            $res=DB::table('user')->where(['uname'=>$data['username'],'upwd'=>$data['password']])->get();
            if($res){
                Session::set('name',$data['username']);
                Session::set('id',$res[0]['uid']);
                $id=$res[0]['uid'];
                //查权限
                $power=DB::select("select pcontroller,paction from ur,power,rp where ur.rid=rp.rid and  rp.pid=power.pid and ur.uid=$id");
                Session::set('power',$power);
                return redirect('power/show');
            }else{
                echo "用户名或密码错误";
            }
        }else{
            return view('power.index');
        }
    }


}