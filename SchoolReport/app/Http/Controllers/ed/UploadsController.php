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
class UploadsController extends Controller{
    public function index(){
       /* $arr1=array('黑色','白色','红色');
        $arr2=array('40','41','42','43');
        $arr3=array('帆布鞋','运动鞋','皮鞋');
        $arr4=array('阿迪达斯','耐克','乔丹');
        foreach($arr1 as $v1){
            foreach($arr2 as $v2){
                foreach($arr3 as $v3){
                    foreach($arr4 as $v4){
                        $arr=array('color'=>$v1,'num'=>$v2,'type'=>$v3,'brand'=>$v4);
                        $res=DB::table('product')->insert($arr);  //√
                    }
                }
            }
        }*/
        //return view('uploads.index');
    }
    public function add(){
        echo "123";
        //$files = request::file('myfile');
        $arr1=array('黑色','白色','红色');
        $arr2=array('40','41','42','43');
        $arr3=array('帆布鞋','运动鞋','皮鞋');
        $arr4=array('阿迪达斯','耐克','乔丹');
        foreach($arr1 as $v1){
            foreach($arr2 as $v2){
                foreach($arr3 as $v3){
                    foreach($arr4 as $v4){
                        $arr=array('color'=>$v1,'num'=>$v2,'type'=>$v3,'brand'=>$v4);
                        $res=DB::table('product')->insert($arr);
                    }
                }
            }
        }
    }
    public function excel()
    {
       /* $objPHPExcel = new PHPExcel();
        print_r($objPHPExcel);die;*/

        $query =DB::table('shop')->get();

        if(!$query){
            return false;
        }

            //StartingthePHPExcellibrary

            //加载PHPExcel类

            //$this->load->library('PHPExcel');

            //$this->load ->library('PHPExcel/IOFactory');

        $objPHPExcel= new PHPExcel();

        include_once('../app/libs/PHPExcel/IOFactory.php');

        $objPHPExcel->getProperties()-> setTitle("export") ->setDescription("none");

        $objPHPExcel-> setActiveSheetIndex(0);

            //Fieldnamesinthefirstrow

        $fields = DB::select("select COLUMN_NAME from information_schema.COLUMNS where table_name = 'shop';");

            //print_r($fields);die;

        $col = 0;

        foreach($fields as $field){

        $field =$field['COLUMN_NAME'];

        $objPHPExcel-> getActiveSheet() -> setCellValueByColumnAndRow($col, 1,$field);

        $col++;

        }

        // die;
        //Fetchingthetabledata

        $row = 2;

        foreach($query as $data)
        {

            $col =0;

            foreach($fields as $field)

            {

                //print_r($data);

                $field =$field['COLUMN_NAME'];

                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col,$row,!empty($data["$field"])?$data["$field"]:'');

                $col++;

            }

            $row++;

        }

        //die;

        $objPHPExcel-> setActiveSheetIndex(0);

        $objWriter =IOFactory :: createWriter($objPHPExcel, 'Excel5');

        //Sendingheaderstoforcetheusertodownloadthefile

        header('Content-Type:application/vnd.ms-excel');

        //header('Content-Disposition:attachment;filename="Products_' .date('dMy') . '.xls"');

        header('Content-Disposition:attachment;filename="Brand_' .date('Y-m-d') . '.xls"');

        header('Cache-Control:max-age=0');

        $objWriter-> save('php://output');

    }
    /**
     * 数组处理
     */
    public function show(){
        $arr1=array('黑色','白色','红色');
        $arr2=array('40','41','42','43');
        $arr3=array('帆布鞋','运动鞋','皮鞋');
        $arr4=array('阿迪达斯','耐克','乔丹');
        foreach($arr1 as $v1){
            foreach($arr2 as $v2){
                foreach($arr3 as $v3){
                    foreach($arr4 as $v4){
                        $arr[]=array('color'=>$v1,'num'=>$v2,'type'=>$v3,'brand'=>$v4);
                    }
                }
            }
        }
        foreach($arr as $val){
            $res=DB::table('product')->insert($val);
        }

    }

    //导出
    public function out()
    {
        header("Content-type:application/vnd.ms-excel");
        header("Content-Disposition:attchment;filrname=member-user.xls");
        $qw=DB::table('book')->get();
        $str="id\tname\tpwd\temail\n";
        foreach($qw as $val)
        {
            $str.=$val['id']."\t".$val['name']."\t".$val['desc']."\t".$val['author']."\t".$val['price']."\t".$val['time']."\n";
        }
        echo "$str";
    }
    //导入
    public function memberInput(){
        $upload = new \Think\Upload();
        // 实例化上传类
        $upload->maxSize   =     3145728 ;
        // 设置附件上传大小
        $upload->exts      =     array('xls');
        // 设置附件上传类型
        $upload->savePath  =      './Public/Uploads/excel'; // 设置附件上传目录
        $upload->rootPath  =      './';
        // 上传文件
        $info   =   $upload->upload();
        $url=$info['excel']['savepath'].$info['excel']['savename'];
        $str = file_get_contents($url);
        $arr = explode("\n", $str);
        //dump($arr);die;
        $data= Array();
        $j=0;
        for($i=1;$i<count($arr);$i++)
        {
            $arr[$i]=explode("\t", $arr[$i]);
            //dump($arr);die;
            //$data[$j]['user_id']=$arr[$i][0];
            $data[$j]['member_name']=$arr[$i][1];
            $data[$j]['member_pwd']=$arr[$i][2];
            $data[$j]['email']=$arr[$i][3];
            $j++;
        }
        array_pop($data);
        $res=M('member')->addall($data);
        if(!$res)
        {
            // 上传错误提示错误信息
            $this->error('导入失败');
        }
        else
        {
            //上传成功
            $this->success('导入成功');
        }
    }
}
//http://blog.csdn.net/cswfe/article/details/52748046
