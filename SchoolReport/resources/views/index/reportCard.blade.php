<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <link rel="stylesheet" type="text/css" href="css/slick.css"/>
  <link rel="stylesheet" type="text/css" href="css/base.css"/>
  <link rel="stylesheet" type="text/css" href="css/style.css"/>
  <link rel="stylesheet" type="text/css" href="css/iconfont/iconfont.css"/>
  <title>报到单</title>
	<body>
		<div class="header">
			<span>报到单</span>
			<a href="index.html" class="back"><i class="iconfont icon-left"></i></a>
		</div>
		<div class="banner">
			<img src="img/self-report.png">
		</div>
		<div class="step">
			<ul class="fs0">
				<li>
    			<span class="step-icon passbg">1</span>
    			<p class="step-txt">个人信息</p>
    		</li>
    		<li>
    		<span class="step-icon passbg">2</span>
    			<p class="step-txt">宿舍预定</p>
    		</li>
    		<li>
    			<span class="step-icon passbg">3</span>
    			<p class="step-txt">抵校登记</p>
    		</li>
    		<li>
    			<span class="step-icon  passbg">4</span>
    			<p class="step-txt">报到单</p>
    		</li>
    	</ul>
    	<span class="pro-line"><img src="img/pro-line2.png"></span>
		</div>
		<ul class="dorm-book mt3">
			<li class="info-top clearfix">
				<span class="heade-img">
					<img src="img/person.png">
				</span>
			    <span class="stu-name">江静静</span>
			    <span class="code"><img src="img/code.png"></span>
			</li>
			<li class="basic-tit">
			    宿舍基本信息
			</li>
			<li>
				<span class="book-tit">姓名</span>
		        <span class="info-middle">
		        <?php foreach($result as $key=>$val){?>
		        <?php echo $val['name']?>
		        <?php }?>
		        </span>  
			</li>
			<li>
				<span class="book-tit">性别</span>
		        <span class="info-middle">男</span>
			</li>
			<li>
				<span class="book-tit">身份证号</span>
		        <span class="info-middle">
		        <?php foreach($result as $key=>$val){?>
		        <?php echo $val['idcard']?>
		        <?php }?></span>  
			</li>
			<li>
				<span class="book-tit">考生号</span>
		    <span class="info-middle">
			4564556
		        </span>  
			</li>
			<li>
				<span class="book-tit">学院</span>
		    <span class="info-middle">
		    <?php foreach($result as $key=>$val){?>
		    <?php echo $val['college']?>
		    <?php }?>
		        </span>
		          
			</li>
			<li>
				<span class="book-tit">专业</span>
		        <span class="info-middle">
		        <?php foreach($result as $key=>$val){?>
		        <?php echo $val['major']?>
		        <?php }?>
		        </span>  
			</li>
			<li>
				<span class="book-tit">宿舍号</span>
		        <span class="info-middle">
		        <?php foreach($result as $key=>$val){?>
		        <?php echo $val['room_num']?>
		        <?php }?>
		        </span>  
			</li>
			<li>
				<span class="book-tit">铺位</span>
		        <span class="info-middle">
		        <?php foreach($result as $key=>$val){?>
		        <?php echo $val['bad_num']?>
		        <?php }?>
		        </span>  
			</li>
		</ul>
		<ul class="dorm-book mt3">
			<li class="basic-tit">
			    学校费用
			</li>
			<li class="cost clearfix first">
				<span>类别</span>
				<span>属性</span>
				<span>费用</span>
			</li>
			<li class="cost clearfix">
				<span>2016秋季服装</span>
				<span>尺码：小号</span>
				<span>360:00</span>
			</li>
			<li class="cost clearfix">
				<span>学杂费</span>
				<span>尺码：小号</span>
				<span>360:00</span>
			</li>
			<li class="cost clearfix">
				<span>住宿费</span>
				<span>尺码：小号</span>
				<span>360:00</span>
			</li>
		</ul>
		<div class="reportcard">
			    <a href="#" class="db ta-center print">打印预览</a>
				<a href="#" class="db ta-center">保存到手机</a>
		</div>
	  <script src="js/jquery-1.10.2.min.js"></script>
	  <script type="text/javascript" src="js/basic.js"></script>
        <script src="js/jquerysession.js"></script>
      <script type="text/javascript" src="js/rem.js"></script>
        <script>
            //加载数据
            /*$(document).ready(function(){
                var id= $.session.get('uid')
                $.ajax({
                    type:"GET",
                    url:"http://www.xiao.com/practical/SchoolReport/public/reportcard",
                    data:{ id:id},
                    dataType:"jsonp",
                    jsonp:"callback",
                    jsonpCallback:"success_jsonpCallback",
                    success:function(msg){
                        var str="";
                        $.each(msg,function(name,value){
                            str +="<a id='uploaDate'value="+value['id']+" href='{{URL('/uploaDate')}}?id="+value['id']+"'><li class='answer-list'><h3 class='list-tit'>"+value['question']+"</h3> <p class='list-txt'>"+value['answer']+"</p></li></a>";
                        })
                        $("#ul").html(str);
                    }
                });
            });*/
        </script>
	</body>
</html>
