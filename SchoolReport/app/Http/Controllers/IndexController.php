<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Cache;
use memcache;
use Session;
use Cookie;
use Storage;
use DB,Input,Redirect,url,Validator,Request;
use App\Http\Controllers\Controller;

class IndexController extends CommonController
{
    /**
     * 首页
     */
    public function index()
    {
        $token=file_get_contents('token.txt');
        $time=time();
        //调用接口完成页面展示
        $url="http://www.xiao.com/practical/SchoolReport/public/homePage?token=$token&time=$time";
        $result=file_get_contents($url);
        $result=json_decode($result,true);
        //判断信息
        if ( $result['code'] == 1){
            $banner=$result['content'][0]['banner'];
            $news=$result['content'][0]['news'];
            $desc=$result['content'][0]['desc'];
            return view('index.index')->with(['banner'=>$banner,'news'=>$news,'desc'=>$desc]);
        } else {
            //输出错误信息
            echo $result['msg'];
        }
    }
    /**
     * 首页接口
     */
    public function homePage()
    {
        $token=Request::get('token');
        $time=Request::get('time');
        $nowtime=time();
        //验证时间
        if($nowtime-$time>2*60){
            //返回json数据
            $msg="连接超时";
            $code=2;
            return $this->result($code,$msg);
        }else{
            $banner=DB::table('banner')->get();
            $news=DB::table('news')->get();
            $desc=DB::table('desc')->get();
            $localtoken=file_get_contents('token.txt');
            if($localtoken==$token){
                //返回json数据
                $msg="请求成功";
                $code=1;
                $content=array(['banner'=>$banner,'news'=>$news,'desc'=>$desc]);
                return $this->result($code,$msg,$content);
            }else{
                //返回json数据
                $msg="请求失败";
                $code=0;
                return $this->result($code,$msg);
            }
        }
    }
    public function img(){
        $callback = $_GET['callback'];
        $tableName = 'banner';
        $banner = $this->select($tableName, $callback);
        echo $banner;
    }
    public function desc(){
        $callback = $_GET['callback'];
        $tableName1 = 'desc';
        $desc = $this->select($tableName1, $callback);
        echo $desc;
    }
    public function news(){
        $callback = $_GET['callback'];
        $tableName1 = 'news';
        $news = $this->select($tableName1, $callback);
        echo $news;
    }
//https://open.weixin.qq.com/connect/oauth2/authorize?appid=".APPID."&redirect_uri=http%3a%2f%2fwww.lliujingwei.com%2fgroup1%2fxiaoxiao%2findex.php&response_type=code&scope=SCOPE&state=STATE#wechat_redirect
    /**
     *self-report自助报道
     */
    public function report()
    {
        return view('index.self-report');
    }
    /**
     *绿色通道
     */
    public function green()
    {
        return view('index.green');
    }
    /**
     *抵校登记
     */
    public function arrive()
    {
        $data = Request::input();
        if($data) {
            $tableName='arrive_report';
            $callback=Request::get('callback');
            $result=$this->add($tableName,$data,$callback);
            echo $result;
        } else {
            return view('index.arrive');
        }
    }
    /**
     *推迟报到
     */
    public function delay()
    {
        return view('index.delay');
    }
    /**
     *入学须知
     */
    public function mustknow()
    {
        return view('index.must-know');
    }
    /**
     *通知公告
     */
    public function notice()
    {
        return view('index.notice');
    }
    /**
     *资料下载
     */
    public function data()
    {
        return view('index.data');
    }
    /**
     *咨询帮助
     */
    public function ask()
    {
        return view('consult.ask');
    }
    /**
     *常见问题
     * @return jsonp
     */
    public function question()
    {
        return view('consult.commonQuestion');
    }
    /**
     *问题详情
     * @return jsonp
     */
    public function uploaDate()
    {
        return view('consult.uploaDate');
    }
    /**
     *展示问题详情
     * @return jsonp
     */
    public function uploadDate()
    {
        $callback=$_GET['callback'];
        $tableName='ask';
        $where='id';
        $data=Request::get('id');
        $result=$this->getWhere($tableName,$where,$data,$callback);
        echo $result;

    }
    /**
     *常见问题列表
     * @return jsonp
     */
    public function askList()
    {
        $callback=$_GET['callback'];
        $tableName='ask';
        $result=$this->select($tableName,$callback);
        echo $result;

    }
    /**
     *自助入学
     */
    public function entrance()
    {
        return view('index.entrance');
    }
    /**
     *个人中心
     */
    public function userCenter()
    {
        return view('index.user-center');
    }
    /**
     *路线
     */
    public function route()
    {
        return view('index.route');
    }
    /**
     *个人信息
     */
    public function userInfo()
    {
        return view('index.user-info');
    }
    /**
     *添加个人信息
     */
    public function addUserInfo()
    {
        $data=Request::input();
        $tableName='user';
        $callback=Request::get('callback');
        $result=$this->add($tableName,$data,$callback);
        echo $result;
    }
    /**
     *修改密码
     */
    public function changepsw()
    {
        return view('index.changepsw');
    }
    /**
     *宿舍信息
     */
    public function dormBook()
    {
        return view('index.dorm-book');
    }
    /**
     *报到单
     */
    public function reportCard()
    {
        $sql="select * from user inner join dormitory on dormitory.user_id=user.id inner join delay on delay.user_id=user.id where user.id=1";
        $result=DB::select($sql);
        return view('index.reportCard')->with('result',$result);
    }
    /**
     *添加宿舍信息
     */
    public function addDormInfo()
    {
        $data=Request::input();
        $data['user_id']='1';
        $tableName='dormitory';
        $callback=Request::get('callback');
        $result=$this->add($tableName,$data,$callback);
        echo $result;
    }
    /**
     * 绿色通道 的添加
     */
    public function addGreen()
    {
        $data = Request::input();
        $tableName ='green';
        $callback=Request::get('callback');
        $result=$this->add($tableName,$data,$callback);
        echo $result;
    }
    /**
     * 推迟报道的添加
     */
    public function addDelay()
    {
        $data = Request::input();
        $tableName ='delay';
        $callback=Request::get('callback');
        $result=$this->add($tableName,$data,$callback);
        echo $result;
    }
    /**
     * 问题提问
     */
    public function quiz()
    {
        return view('consult.tiwen');
    }
    /**
     * 添加问题提问
     */
    public function addQuiz()
    {
        $data = Request::input();
        $tableName ='ask';
        $data['add_time']=date('Y-m-d H:i:s');
        $data['user_id']=1;
        $callback=Request::get('callback');
        $result=$this->add($tableName,$data,$callback);
        echo $result;
    }
    /**
     * 我的提问
     */
    public function myQuestion()
    {
        return view('consult.myQuestion');
    }
    /**
     * 提问列表
     */
    public function questionList()
    {
        $user_id='1';
        $callback=$_GET['callback'];
        $tableName='ask';
        $where='user_id';
        $result=$this->getWhere($tableName,$where,$user_id,$callback);
        echo $result;
    }
    /**
     * 咨询解答
     */
    public function answer()
    {
        return view('consult.commonQuestion');
    }
    /**
     * 修改密码
     */
    public function change()
    {
        $old=Request::get('old');
        $user_id=Request::get('id');
        $pwd=Request::get('password');
        $callback=$_GET['callback'];
        if($callback) {
            $same=DB::table('user')->where(['id'=>$user_id,'password'=>$old])->get();
            if($same){
                $result = DB::table('user')->where('id',$user_id)->update(['password'=>$pwd]);
                return  $callback.'('.json_encode($result).')';
            }else{
                $result=array('msg'=>0,'result'=>"旧密码不对");
                return  $callback.'('.json_encode($result).')';
            }
        }
    }
    /**
     * 入学须知
     */
    public function mustList()
    {
        $callback=$_GET['callback'];
        $tableName='must';
        $result=$this->select($tableName,$callback);
        echo $result;
    }
    /**
     * 通知公告
     */
    public function inform()
    {
        $callback=$_GET['callback'];
        $tableName='inform';
        $result=$this->select($tableName,$callback);
        echo $result;
    }

    /**
     * 通知详情
     */
    public function noticeDetail()
    {
        return view('index.noticeDetail');
    }
    public function message()
    {
        $callback=$_GET['callback'];
        $tableName='inform';
        $where='id';
        $data=Request::get('id');
        $result=$this->getWhere($tableName,$where,$data,$callback);
        echo $result;
    }


}