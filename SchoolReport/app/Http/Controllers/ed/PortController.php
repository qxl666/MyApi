<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Session;
use Cookie;
use Storage;
use app\libs\PHPExcel;
use IOFactory;
use DB,Input,Redirect,url,Validator,Request;
use App\Http\Controllers\Controller;

header("content-type:text/html;charset=utf-8");
class PortController extends Controller{
        /**
         * 登陆接口
         * @return mixed|string
         */
        public function login(){
            $name=Request::get('username');
            //var_dump($name);die;
            $pwd=Request::get('password');
            $time=Request::get('time');
            $sign=Request::get('sign');
            /*$arr=Request::get();
            unset($arr['sign']);
            //过滤空值
            $arr=$this->actionFilter($arr);
            //排序
            $arr=$this->actionSort($arr);
            //拼接
            $arr=$this->actionSign($arr);
            //md5加密
            $arr1=md5($arr);*/
            $time1=time();
            if($time1-$time>5*60){
                //返回json数据
                $msg="连接超时";
                $result=array('code'=>2,'msg'=>$msg);
                $arr=json_encode($result);
                return $arr;
            }
            $array="password=$pwd&username=$name&time=$time";
            $checksign=md5($array);
            if($checksign==$sign){
                $sql="select * from user10 where username=$name and password=$pwd";
                $db=DB::query($sql);
                if($db){
                    //返回json数据
                    $token=$name."token";
                    $result=array('code'=>1,'TOKEN'=>$token);
                    $arr=json_encode($result);
                    return $arr;
                }else{
                    //返回json数据
                    $msg="用户名或密码错误";
                    $result=array('code'=>0,'msg'=>$msg);
                    $arr=json_encode($result);
                    return $arr;
                }
            }else{
                //返回json数据
                $msg="用户名";
                $result=array('code'=>0,'msg'=>$msg);
                $arr=json_encode($result);
                return $arr;
            }

        }

    /**
     * 把数组所有元素，按照“参数=参数值”的模式用“&”字符拼接成字符串，并对字符串做urlencode编码
     * @param $para 需要拼接的数组
     * return 拼接完成以后的字符串
     */
    function actionSign($para) {
        $arg  = "";
        foreach($para as $key =>$val){
            $arg.=$key."=".$val."&";
        }
        //去掉最后一个&字符
        $arg = substr($arg,0,count($arg)-2);
        //如果存在转义字符，那么去掉转义
        //if(get_magic_quotes_gpc()){$arg = stripslashes($arg);}
        return $arg;
    }
    /**
     * 除去数组中的空值和签名参数
     * @param $para 签名参数组
     * return 去掉空值与签名参数后的新签名参数组
     */
    function actionFilter($para) {
        foreach($para as $key=>$val){
            if($val=='') {
                unset($para[$key]);
            }
        }
        return $para;
    }
    /**
     * 对数组排序
     * @param $para 排序前的数组
     * return 排序后的数组
     */
    function actionSort($para) {
        ksort($para);
        return $para;
    }
    /**
     * 写日志，方便测试（看网站需求，也可以改成把记录存入数据库）
     * 注意：服务器需要开通fopen配置
     * @param $word 要写入日志里的文本内容 默认值：空值
     */
    function actionLog($word='') {
        $fp = fopen("log.txt","a");
        flock($fp, LOCK_EX) ;
        fwrite($fp,"执行日期：".strftime("%Y%m%d%H%M%S",time())."\n".$word."\n");
        flock($fp, LOCK_UN);
        fclose($fp);
    }
}