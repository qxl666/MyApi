{{-- 底部导航开始--}}
{{--<div class="footer">
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
</div>--}}
{{-- 底部导航结束--}}
@extends('index')
@section('footer')

    <!-- 页面内容 -->
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
@stop
