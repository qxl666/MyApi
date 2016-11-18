<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <link rel="stylesheet" type="text/css" href="css/base.css"/>
  <link rel="stylesheet" type="text/css" href="css/style.css"/>
  <link rel="stylesheet" type="text/css" href="css/iconfont/iconfont.css"/>
  <title>用户登录</title>
	</head>
	<body>
		<div class="header">
			<span>用户登录</span>
			<!--<a href="#" class="back"><i class="iconfont icon-left"></i></a>-->
		</div>
		<ul class="login-box">
			<li>
				    <span class="login-name"><i class="iconfont icon-user"></i></span>
		        <input type="text" name="username" id="username" placeholder="请输入用户名" />   
			</li>
			<li>
				<span class="login-psw"><i class="iconfont icon-psw"></i></span>
		        <input type="password" name="pwd" id="pwd" placeholder="请输入密码" />   
			</li>
		</ul>
		</div>
		<div class="confirm">
			<a href="javascript:void(0)" id="denglu">登录</a>
			<p class="foget-psw"><a href="#">忘记密码</a></p>
		</div>
	</body>
	<script src="js/jquery-1.10.2.min.js"></script>
     <script type="text/javascript" src="js/rem.js"></script>	
</html>
<script src="js/jquery.1.12.js"></script>
<script src="js/jsonp.js"></script>
<script type="text/javascript" src="js/jquery.md5.js"></script>	
<script type="text/javascript" src="js/jquerysession.js"></script>	
<script type="text/javascript">
				$("#denglu").click(function(){
				   var username=$('#username').val();
				   var pwd=$('#pwd').val();
				   var qq="pwd="+pwd+"&username="+username;
				   var sign = $.md5(qq);
				   if(username==''||pwd==''){
				   		alert("选项不能为空");
				   		return false;
				   }else{
                       var data={username:username,pwd:pwd,sign:sign};
                       var result=$.fn.webx('askList',data);
                       if(result){
                           //存储session
                            $.session.set('uid', json['uid'])
                            location.href="{{url('/')}}";
                        }
					}
			})
</script>