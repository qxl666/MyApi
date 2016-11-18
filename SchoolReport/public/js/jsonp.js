
$(function(){
    $.fn.webx = function(url,data='') {
        var result='';
        $.ajax({
            type : "get",
            url : 'http://www.xiao.com/practical/SchoolReport/public/'+url,
            dataType : 'jsonp',
            data:data,
            async:false,
            jsonp: "callback",//传递给请求处理程序或页 面的，用以获得jsonp回调函数名的参数名(默认为:callback)
            jsonpCallback:"success_jsonpCallback",//自定义的jsonp回调函数名称，默认为jQuery自动生成的随机函数名
            success : function(json){
                result = json
            },
            error:function(){
                alert('fail');
            }
        });
        return result;
    };

})