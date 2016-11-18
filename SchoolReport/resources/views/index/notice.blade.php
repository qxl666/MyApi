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
  <title>通知公告</title>
	<body >
		<div class="header">
				<span>通知公告</span>
				<a href="javascript:history.go(-1)" class="back"><i class="iconfont icon-left"></i></a>
			</div>
		<div class="banner">
			<img src="img/self-report.png">
		</div>
		<div class="notice-box" id="inform">
			<ul class="notice-content">
				<a href="noticeDetail.html">
				<li class="notice-list">
					<h3 class="list-tit">2016-08-01</h3>
				    <p class="list-txt">
                                               根据录取通知书附带的新生入学交通指引到学校报到。
				    </p>
				</li>
				<span class="goin"><i class="iconfont icon-right"></i></span>
				</a>
				<a href="noticeDetail.html">
				<li class="notice-list">
					<h3 class="list-tit">2016-08-02</h3>
				    <p class="list-txt">
                                               根据录取通知书附带的新生入学交通指引到学校报到。
				    </p>
				</li>
				<span class="goin"><i class="iconfont icon-right"></i></span>
				</a>
				<a href="noticeDetail.html">
				<li class="notice-list">
					<h3 class="list-tit">2016-08-03</h3>
				    <p class="list-txt">
                                               根据录取通知书附带的新生入学交通指引到学校报到,根据录取通知书附带的新生入学交通指引到学校报到,根据录取通知书附带的新生入学交通指引到学校报到。
				    </p>
				</li>
				<span class="goin"><i class="iconfont icon-right"></i></span>
				</a>
				<a href="noticeDetail.html">
				<li class="notice-list">
					<h3 class="list-tit">2016-08-04</h3>
				    <p class="list-txt">
                                               根据录取通知书附带的新生入学交通
				    </p>
				</li>
				<span class="goin"><i class="iconfont icon-right"></i></span>
				</a>
				<a href="noticeDetail.html">
				<li class="notice-list">
					<h3 class="list-tit">2016-08-05</h3>
				    <p class="list-txt">
                                               根据录取通知书附带的新生入学交通指引到学校报到。
				    </p>
				</li>
				<span class="goin"><i class="iconfont icon-right"></i></span>
				</a>
			</ul>
		</div>
        <script src="js/jquery.1.12.js"></script>
        <script src="js/jsonp.js"></script>
	  <script src="js/jquery-1.10.2.min.js"></script>
	  <script type="text/javascript" src="js/basic.js"></script>	
      <script type="text/javascript" src="js/rem.js"></script>
        <script>
            //加载数据
            $(document).ready(function(){

                var result=$.fn.webx('inform');
                var str="";
                $.each(result,function(name,value){
                    str +='<a href="{{URL('noticeDetail')}}?id='+value['id']+'"><li class="notice-list"><h3 class="list-tit"><font size="-1">'+value['time']+'</font></h3><p class="list-txt"><font size="-1">'+value['content']+'</font></p></li><span class="goin"><i class="iconfont icon-right"></i></span></a>';
                })
                $("#inform").html(str);
            });
        </script>
	</body>
</html>
