<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Session;
use Cookie;
use Storage;
use DB,Input,Redirect,url,Validator,Request;
use App\Http\Controllers\Controller;
header("content-type:text/html;charset=utf-8");
class PowerController extends CommonController{
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
                /*foreach($power as $key=>$val)
                {
                    //foreach($val as $v){
                        var_dump($val);
                        if($controller==$val['pcontroller'] && $method==$val['paction'])
                        {
                            var_dump($val);
                            //return true;
                        }
                   // }
                }die;*/
                Session::set('power',$power);
                return redirect('power/show');
                //判断角色
                $sql=DB::table('ur')->where('uid',$res[0]['uid'])->get();
                Session::set('rid',$sql[0]['rid']);
                if($sql[0]['rid']==1){
                    return redirect('show');
                }
                if($sql[0]['rid']==2){
                    return redirect('show2');
                }
                if($sql[0]['rid']==3){
                    return redirect('show3');
                }
            }else{
                echo "用户名或密码错误";
            }
        }else{
            return view('power.index');
        }
    }
    /**
     * 员工登陆后页面
     */
    public function show(){
        return view('power.show');
    }
    /**
     * 员工申请页面
     */
    public function apply(){
        $data=Request::input();
        $id=Session::get('id');
        $name=Session::get('name');
        unset($data['_token']);
        $data['uid']=$id;
        $data['uname']=$name;
        $data['time']=date('Y-m-d H:i:s');
        $res=DB::table('apply')->insert($data);
        if($res){
            return redirect('power/list1');
        }else{
            echo "no";
        }
    }
    /**
     * 员工申请列表
     */
    public function list1(){
        $id=Session::get('id');
        $list=DB::table('apply')->where('uid',$id)->get();
        return view('power.list')->with('list',$list);
    }
    /**
     * 主管登陆后页面
     */
    public function show2(){
        $res=DB::table('apply')->where('status',0)->get();
        if($res){
            return view('power.show2')->with('res',$res);
        }else{
            echo "没有申请";
        }

    }
    /**
     * 通过
     */
    public function yes(){
        $id=Request::get('id');
        $rid=Session::get('rid');
        if($rid==2){
            $res=DB::table('apply')->where('id',$id)->update(['status'=>1]);
            if($res){
                return redirect('power/show2');
            }
        }
        if($rid==3){
            $res=DB::table('apply')->where('id',$id)->update(['status'=>2]);
            if($res){
                return redirect('power/show3');
            }
        }
    }
    /**
     * 不通过
     */
    public function no(){
        $id=Request::get('id');
        $rid=Session::get('rid');
        if($rid==2) {
            $res=DB::table('apply')->where('id',$id)->update(['status'=>3]);
            return redirect('power/show2');
        }
        if($rid==3){
            $res=DB::table('apply')->where('id',$id)->update(['status'=>3]);
            return redirect('power/show3');
        }
    }
    /**
     * 经理登陆后页面
     */
    public function show3(){
        $res=DB::table('apply')->where('status',1)->get();
        if($res){
            return view('power.show2')->with('res',$res);
        }else{
            echo "没有申请";
        }

    }

}