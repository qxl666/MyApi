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
		<title>我要提问</title>

		<body>
			<div class="header">
				<span>我要提问</span>
				<a href="ask.html" class="back"><i class="iconfont icon-left"></i></a>
			</div>
			<div class="banner">
				<img src="img/self-report.png">
			</div>
			<div class="contain"  style="padding-top:3%;">
				 <div class="reason">	
				<textarea  placeholder="请您在此输入您的申请原因，以便通过审核" maxlength="50" id="content"></textarea>
                     <span><font size="-1" color="#a9a9a9" >不超过50字</font> </span>
			</div>
                <div class="step-btn">
                    <a id="submit"  class="ta-center db" >提交</a>
                </div>
			</div>
			<script src="js/jquery-1.10.2.min.js"></script>
			<script type="text/javascript" src="js/basic.js"></script>
			<script type="text/javascript" src="js/rem.js"></script>
            <script src="js/jquery.1.12.js"></script>
            <script src="js/jsonp.js"></script>
            <script>
                $(document).on('click','#submit',function(){
                    var content=$("#content").val();
                    var data={question:content};
                    var msg=$.fn.webx('addQuiz',data);
                    if(msg){
                        location.href="{{url('/myQuestion')}}";
                    }
                });
            </script>
		</body>

</html>