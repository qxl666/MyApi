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
  <title>抵校登记</title>
	<body>
		<div class="header">
			<span>抵校登记</span>
			<a href="javascript:history.go(-1)" class="back"><i class="iconfont icon-left"></i></a>
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
    			<span class="step-icon">4</span>
    			<p>报到单</p>
    		</li>
    	</ul>
    	<span class="pro-line"><img src="img/pro-line1.png"></span>
		</div>
		<ul class="dorm-book">
			<li>
			<div class="show-btn">
			    <span class="book-tit">交通方式</span>
			    <input type="text" name="name" id="traffic" placeholder="请选择您到达学校的交通工具" />
		   </div>
		    <span class="goin"><i class="iconfont icon-right"></i></span>
		    <div class="checkshow">
	        	<p class="checked">飞机</p>
	        	<p>火车</p>
	        	<p>汽车</p>
	       </div>
			</li>
			<li>
				<span class="book-tit">接站站点</span>
		        <input type="text" name="name" id="last_stop" placeholder="请选择您目的地的站点位置" />
		        <span class="goin"><i class="iconfont icon-right"></i></span>
			</li>
			<li>
				<span class="book-tit">出发时间</span>
		        <input type="text" name="name" id="start_time" placeholder="请填写您的出发时间" />
		        <span class="goin"><i class="iconfont icon-right"></i></span>
			</li>
			<li>
				<span class="book-tit">到达时间</span>
		        <input type="text" name="name" id="arrive_time" placeholder="请选择您的预计到达时间" />
		        <span class="goin"><i class="iconfont icon-right"></i></span>
			</li>
			<li>
				<div class="show-btn">					
					<span class="book-tit">是否陪同</span>
			        <input type="text" name="name" id="is_accompany" placeholder="请选择是否有人陪同" />
		        </div>
		        <span class="goin"><i class="iconfont icon-right"></i></span>
		        <div class="checkshow">
	        	<p class="checked">是</p>
	        	<p>否</p>
	       </div>
			</li>
			<li>
				<span class="book-tit">陪同人数</span>
		        <input type="text" name="name" id="accompany_num" placeholder="请填写您的陪同人数" />
			</li>
		</ul>
		<div class="step-btn">
			    <a href="javascript:history.go(-1)">上一步</a>
				<a  id="next">下一步</a>
		</div>
	  <script src="js/jquery-1.10.2.min.js"></script>
	  <script type="text/javascript" src="js/basic.js"></script>	
      <script type="text/javascript" src="js/rem.js"></script>
        <script src="js/jquery.1.12.js"></script>
        <script src="js/jsonp.js"></script>
        <script>
            $(document).on('click','#next',function(){
                var traffic=$("#traffic").val();
                var last_stop=$("#last_stop").val();
                var arrive_time=$("#arrive_time").val();
                var start_time=$("#start_time").val();
                var is_accompany=$("#is_accompany").val();
                var accompany_num=$("#accompany_num").val();
                var result=$.fn.webx('arrive');
                if(result){
                    location.href="{{url('/reportCard')}}";
                }
            });
        </script>
	</body>
</html>
