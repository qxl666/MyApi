<!DOCTYPE html>
<html lang="zh-CN">

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
		<meta name="description" content="">
		<link rel="stylesheet" type="text/css" href="css/slick.css" />
		<link rel="stylesheet" type="text/css" href="css/base.css" />
		<link rel="stylesheet" type="text/css" href="css/style.css" />
		<link rel="stylesheet" type="text/css" href="css/iconfont/iconfont.css" />
		<title>我的提问</title>

		<body>
			<div class="header">
				<span>我的提问</span>
				<a href="ask.html" class="back"><i class="iconfont icon-left"></i></a>
			</div>
			<div class="banner">
				<img src="img/self-report.png">
			</div>
			<div class="contain">
				<div class="myanswer-box">
						<ul class="myanswer" id="ul">
							{{--<a href="#">
							<li>
								<span class="route-icon"><i class="iconfont icon-zixun"></i></span>
								<span class="route-word">请问怎样才能申请助学贷款？</span>
								<span class="goin">2016-08-25</span>
							</li>
							</a>--}}

						</ul>
					</div>
				</div>
			</div>


            <script src="js/jquery.1.12.js"></script>
			<script src="js/jquery-1.10.2.min.js"></script>
			<script type="text/javascript" src="js/basic.js"></script>
			<script type="text/javascript" src="js/rem.js"></script>
            <script src="js/jsonp.js"></script>
            <script>
                //加载数据
                $(document).ready(function(){
                    var result=$.fn.webx('questionList');
                    var str="";
                    $.each(result,function(name,value){
                        str+='<a href="{{URL('uploaDate')}}?id='+value['id']+'"><li><span class="route-icon"><i class="iconfont icon-zixun"></i></span><span class="route-word">'+value['question']+'</span><span class="goin">'+value['add_time']+'</span></li></a>';
                    })
                    $("#ul").html(str);
                });
            </script>
		</body>

</html>