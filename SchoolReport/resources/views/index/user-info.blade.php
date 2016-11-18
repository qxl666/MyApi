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
  <title>个人信息</title>
	<body>
		<div class="header">
			<span>个人信息</span>
            <a href="javascript:history.go(-1)" class="back"><i class="iconfont icon-left"></i></a>
		</div>
		<div class="step">
            <form >
			<ul class="fs0">
				<li>
    			<span class="step-icon passbg">1</span>
    			<p class="step-txt">个人信息</p>
    		</li>
    		<li>
    		<span class="step-icon">2</span>
    			<p>宿舍预定</p>
    		</li>
    		<li>
    			<span class="step-icon">3</span>
    			<p>抵校登记</p>
    		</li>
    		<li>
    			<span class="step-icon">4</span>
    			<p>报到单</p>
    		</li>
    	</ul>
    	<span class="pro-line"><img src="img/pro-line4.png"></span>
		</div>
		<ul class="dorm-book">

			<li class="upload-head ta-center">
				<span>
					<img src="img/take-photo.png">
					<input type="file" />
				</span>
				<p>上传头像</p>
			</li>
			<li>
			    <span class="book-tit"><font color="red">*</font>姓名</span>
			    <input type="text" name="name"  id="name" placeholder="请输入姓名" required="required" />
			    <div class="sex">
                    {{--<input type="radio" value="男" name="sex[]" class="sex">男
                    <input type="radio" value="女" name="sex[]" class="sex">女--}}
			    	{{--<label class="sex-check"><input type="radio" value="男" name="sex[]">男</label>
			    	<label><input type="radio" value="男" name="sex[]">男</label>--}}
			    </div>
			</li>
			<li>
				<span class="book-tit"><font color="red">*</font>邮箱</span>
		        <input type="text" name="email" id="email" placeholder="请填写您的个人邮箱地址" required="required" />
			</li>
			<li>
				<span class="book-tit"><font color="red">*</font>手机</span>
		        <input type="text" name="phone" id="phone" placeholder="请填写您的个人手机号码" />
			</li>
			<li>
				<span class="book-tit"><font color="red">*</font>家庭主机</span>
		        <input type="text" name="telephone" id="telephone" placeholder="请填写您的家庭主机号码" />
			</li>
			{{--<li>
				<span class="book-tit">移动电话</span>
		        <input type="text" name="name" placeholder="请填写您的家庭移动电话号码" />  
			</li>--}}
			<li>
				<div class="show-btn">
					<span class="book-tit">户口迁移</span>
			        <input type="text" name="is-move" id="is_move" placeholder="请选择户口是否迁移" />
		       </div>
		        <span class="goin"><i class="iconfont icon-right"></i></span>
		        <div class="checkshow">
		        	<p class="checked">是</p>
		        	<p>否</p>
		        </div>
			</li>
			<li>
				<div class="show-btn">
				<span class="book-tit">党员关系</span>
		        <input type="text" name="status" id="status" placeholder="请选择您的政治面貌"  />
		       </div>
		        <span class="goin"><i class="iconfont icon-right"></i></span>
		        <div class="checkshow">
		        	<p class="checked">群众</p>
		        	<p>团员</p>
		        	<p>党员</p>
		        </div>
			</li>
		</ul>
		<ul class="contact-box">
			<li>
			    <span class="book-tit">紧急联系人1电话</span>
			    <input type="text" name="link_phone[]" class="link_phone1" placeholder="请输入姓名" />
			</li>
			<li>
				<span class="book-tit">与当事人关系</span>
		        <input type="text" name="raletion[]" class="raletion1" placeholder="请填写您与联系人1的关系" />
			</li>
		</ul>
		<ul class="contact-box">
			<li>
			    <span class="book-tit">紧急联系人1电话</span>
			    <input type="text" name="link_phone[]" class="link_phone2" placeholder="请输入姓名" />
			</li>
			<li>
				<span class="book-tit">与当事人关系</span>
		        <input type="text" name="raletion[]" class="raletion2" placeholder="请填写您与联系人1的关系" />
			</li>

		</ul>
		<ul class="contact-box">
			<li>
			    <span class="book-tit">所在地地址</span>
			    <input type="text" name="local" id="local" placeholder="所在地地址" />
			    <span class="goin"><i class="iconfont icon-right"></i></span>
			</li>
			<li>
				<span class="book-tit"><font color="red">*</font>详细地址</span>
		        <input type="text" name="address" id="address" placeholder="请填写您的详细地址" />
			</li>
		</ul>
        </form>
		<div class="step-btn">
            <a {{--href="{{URL('dormBook')}}"--}} class="ta-center db" id="next">下一步</a>
			{{--<a href="dorm-book.html" class="ta-center db">下一步</a>--}}
		</div>
        <script src="js/jquery.1.12.js"></script>
        <script src="js/jsonp.js"></script>
        <script src="js/jquery-1.10.2.min.js"></script>
        <script src="js/jquery-1.9.1.min.js"></script>
   <script type="text/javascript" src="js/basic.js"></script>
  <script type="text/javascript" src="js/rem.js"></script>
    <script>
        $(document).on('click','#next',function() {
            var name = $("#name").val();
            var email = $("#email").val();
            var phone = $("#phone").val();
            var telephone = $("#telephone").val();
            var is_move = $("#is_move").val();
            var status = $("#status").val();
            var local = $("#local").val();
            var address = $("#address").val();
            if (name == '' || email == '' || phone == '' || telephone == '' || address == "") {
                alert("请将必填信息完善")
            } else {
                var data={name: name, email: email, phone: phone, telephone: telephone, is_move: is_move, status: status, local: local, address: address};
                var result=$.fn.webx('addUserInfo',data);
                if(result){
                    location.href = "{{url('/dormBook')}}";
                }
            }
        });
    </script>
	</body>
</html>
