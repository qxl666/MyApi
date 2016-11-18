<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Session;
use Cookie;
use Memcache;
use DB,Input,Redirect,url,Validator,Request;
use App\Http\Controllers\Controller;

class CommonController extends Controller{
    public function __construct(){
    }
    //接口返回的json 数据
    public function result($code,$msg='',$content='')
    {
        $result=array(
            'code'=>$code,
            'msg'=>$msg,
            'content'=>$content
        );
        return json_encode($result);
    }
    /**
     * 添加
     * @param $tableName
     * @param $data
     * @param $callback
     */
    public function add($tableName,$data,$callback)
    {
        if($callback) {
            unset($data['callback']);
            unset($data['_']);
            $result = DB::table($tableName)->insert($data);
            return  $callback.'('.json_encode($result).')';
        }
    }
    /**
     * 查询
     * @param $tableName
     * @param $callback
     * @return string
     */
    public function select($tableName,$callback)
    {
        if($callback) {
            $result = DB::table($tableName)->get();
            return $callback . '(' . json_encode($result) . ')';
        }
            /* $html="../html/".$tableName.".html";
             if(!file_exists($html))
             {
                 ob_start();
                 if($callback) {
                     $result = DB::table($tableName)->get();
                     return $callback . '(' . json_encode($result) . ')';
                 }
                 $content=ob_get_contents();
                 file_put_contents($html,$content);
                 ob_clean();
                 //echo $content;
             }else
             {
                 echo file_get_contents($html);
             }*/
       /* $memcache=new Memcache();
        $memcache->connect('loaclhost',11211);
        if($callback) {
            if (!$memcache->get($tableName)) {
                $result = DB::table($tableName)->get();
                $memcache->set($tableName,$result,0,0);
                return $callback . '(' . json_encode($result) . ')';
            } else {
                return $memcache->get($tableName);
            }
        }*/
    }

    /**
     * 条件查询
     * @param $tableName
     * @param $where
     * @param string $data
     * @param $callback
     * @return string
     */
    public function getWhere($tableName,$where,$data='',$callback)
    {
        if($callback) {
            $result = DB::table($tableName)->where($where,$data)->get();
            return  $callback.'('.json_encode($result).')';
            exit;
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