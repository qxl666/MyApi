<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Session;
use Cookie;
use Storage;
use DB,Input,Redirect,url,Validator,Request;
use App\Http\Controllers\Controller;
header("content-type:text/html;charset=utf-8");
class UserController extends Controller{
    /**
     * index
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){
        return view('index');
    }
    /**
     * add
     * @return Redirect
     */
    public function add(){
        $username=request::input('name');
        //文件上传
        $n_file = request::file('myfile');
        if($n_file->isValid()) {
            //获取文件名称
            $clientName = $n_file->getClientOriginalName();
            $realPath = $n_file->getRealPath();
            //获取图片格式
            $entension = $n_file->getClientOriginalExtension();
            //图片保存路径
            //$mimeTye = $n_file -> getMimeType();
            $path = $n_file->move( 'storage/uploads',$clientName);
            $res = DB::table('user')->insert(['uname' => $username, 'myfile' => $path]);
            if ($res) {
                return redirect('/show');
            }
        }
    }

    /**
     * show
     * @return $this
     */
    public function show(){
        $name=request::input('name');
        if($name){
            $arr=DB::table('user')->where('uname','like',"%$name%")->paginate(3);
            return view('show')->with('arr',$arr);
        }else
        {
            $arr=DB::table('user')->paginate(3);
            return view('show')->with('arr',$arr);
        }
    }

    /**
     * del
     * @return Redirect
     */
    public function del(){
        $id=request::get('id');
        $res=DB::table('user')->where('uid',$id)->delete();
        if($res)
        {
            return redirect('/show');
        }
    }

    /**
     * 修改页面
     * @return $this
     */
    public function edit(){
        $id=request::get('id');
        $res=DB::table('user')->where('uid',$id)->get();
        //var_dump($res);die;
        return view('edit')->with('res',$res);
    }
    /**
     * 执行修改
     */
    public function edit_to(){
        $username=request::input('name');
        $id=request::input('id');
        //文件上传
        $n_file = request::file('myfile');
        if($n_file->isValid()){
            //获取文件名称
            $clientName = $n_file -> getClientOriginalName();
            $realPath = $n_file -> getRealPath();
            //获取图片格式
            $entension = $n_file -> getClientOriginalExtension();
            //图片保存路径
            //$mimeTye = $n_file -> getMimeType();
            $newname="./storage/uploads/".$clientName;
            $path = $n_file -> move(base_path().'/storage/uploads',$clientName);
        }

        $res=DB::table('user')->where('uid',$id)->update(['uname'=>$username,'myfile'=>$path]);
        if($res){
            return redirect('/show');
        }
    }
    /**
     * search
     */
    public function search(){
        $name=request::input('name');
        $res=DB::table('user')->where('uname','like',"%$name%")->paginate(3);
        return view('show')->with('arr',$res);
    }
}
