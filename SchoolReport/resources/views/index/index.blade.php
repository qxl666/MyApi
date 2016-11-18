<!DOCTYPE html>
<html lang="zh-CN">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
		<meta name="description" content="">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/slick.css') }}" />
        {{--<link rel="stylesheet" type="text/css" href="css/slick.css" />--}}
		<link rel="stylesheet" type="text/css" href="css/base.css" />
		<link rel="stylesheet" type="text/css" href="css/style.css" />
		<link rel="stylesheet" type="text/css" href="css/all.css"/>
		<link rel="stylesheet" type="text/css" href="css/swiper.min.css"/>
		<link rel="stylesheet" type="text/css" href="css/iconfont/iconfont.css" />
		<title>首页</title>
	</head>
	<body>
		<div class="header">
			<span>优智源</span>
			<a href="user-center.html"><span class="user"><i class="iconfont icon-person"></i></span></a>
		</div>
       {{-- 首页banner--}}
		<div class="banner swiper-container">
            <div class="swiper-wrapper" id="banner">
                  <?php foreach($banner as $val){?>
                             <div class="swiper-slide"><a href="javascript:void(0)"><img  class="swiper-lazy" data-src="{{$val['img']}}" alt=""></a></div>
                  <?php }?>
            </div>
            <div class="swiper-pagination"></div>
        </div>
		<div class="menu">
			<ul class="clearfix">
				<li>
					<a href="{{URL('report')}}">
						<img src="img/icon1.png">
						<p class="menu-txt">自助报到</p>
					</a>
				</li>
				<li>
					<a href="{{URL('green')}}">
						<img src="img/icon2.png">
						<p class="menu-txt">绿色通道</p>
					</a>
				</li>
				<li>
					<a href="{{URL('arrive')}}">
						<img src="img/icon3.png">
						<p class="menu-txt">抵校登记</p>
					</a>
				</li>
				<li>
					<a href="{{URL('delay')}}">
						<img src="img/icon4.png">
						<p class="menu-txt">推迟报到</p>
					</a>
				</li>
			</ul>
			<ul class="clearfix">
				<li>
					<a href="{{URL('mustknow')}}">
						<img src="img/icon5.png">
						<p class="menu-txt">入学须知</p>
					</a>
				</li>
				<li>
					<a href="{{URL('notice')}}">
						<img src="img/icon6.png">
						<p class="menu-txt">通知公告</p>
				</li>
				</a>
				<li>
					<a href="{{URL('data')}}">
						<img src="img/icon7.png">
						<p class="menu-txt">资料下载</p>
					</a>
				</li>
				<li>
					<a href="{{URL('ask')}}">
						<img src="img/icon8.png">
						<p class="menu-txt">咨询帮助</p>
					</a>
				</li>
			</ul>
		</div>

		<div class="brief">
            <?php foreach($desc as $val){?>
			<h3 class="brief-tit">校园简介</h3>
			<div class="brirf-content clearfix">
				<div class="bc-left fl">
					<img src="{{$val['img']}}">
				</div>
				<div class="bc-right fr">
                    <a class="ncr-top">{{$val['title']}}</a>
				</div>
			</div>
        <?php }?>
        </div>
		<dl class="news">
			<dt class="news-tit">校园资讯</dt>
            <?php foreach($news as $val){?>
			<dd class="news-content clearfix">
				<div class="nc-left fl">
					<img src="{{$val['img']}}">
				</div>
				<div class="nc-right fr">
					<a class="ncr-top">{{$val['title']}}
					</a>
					<span class="nc-time">{{$val['add_time']}}</span>
				</div>
			</dd>
            <?php }?>
		</dl>
       {{-- 底部导航开始--}}
        {{--@include('footer')--}}
        {{--@yield('footer')--}}
		<div class="footer">
			<ul class="footer-page clearfix">
				<li class="page-item active">
					<a href="{{URL('/')}}">
						<i class="iconfont icon-index"></i>
						<p>首页</p>
					</a>
				</li>
				<li class="page-item">
					<a href="{{URL('entrance')}}">
						<i class="iconfont icon-computer"></i>
						<p>自助入学</p>
					</a>
				</li>
				<li class="page-item">
					<a href="{{URL('ask')}}">
						<i class="iconfont icon-ask"></i>
						<p>咨询帮助</p>
					</a>
				</li>
				<li class="page-item">
					<a href="{{URL('userCenter')}}">
						<i class="iconfont icon-person1"></i>
						<p>个人中心</p>
					</a>
				</li>
			</ul>
		</div>
        {{-- 底部导航结束--}}
		<script src="js/jquery.min.js"></script>
	    <script src="js/fastclick.js"></script>
		<script src="js/slick.min.js"></script>
		<script src="js/rem.js"></script>
		<script src="js/basic.js"></script>
		<script src="js/swiper.jquery.min.js"></script>
		<script>
			$(function() {
				$('.autoplay').slick({
				  slidesToScroll: 1,
				  autoplay: true,
				  autoplaySpeed: 2000,
				   dots:true
				});
			});
		</script>
		<script >
		    $(function () {
		        var banner = new Swiper('.banner',{
		            autoplay: 5000,
		            pagination : '.swiper-pagination',
		            paginationClickable: true,
		            lazyLoading : true,
		            loop:true
		        });		
		    });
		</script>
    <script>

    </script>
	</body>
</html>