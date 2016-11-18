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
		<title>下载中心</title>
		<body>
			<div class="header">
				<span>下载中心</span>
				<a href="data.html" class="back"><i class="iconfont icon-left"></i></a>
			</div>
			<div class="banner">
				<img src="img/self-report.png">
			</div>
			<div class="noticeDtail" id="noticeDtail">
	{{--				<p class="detail-tit">2016年大学生贫困助学金申请表2016年大学生贫困助学金申请表.
					<span>2016-06-25</span>
					</p>
				    <p class="detail-txt">
                                              时请持大学录取通知书且按照录取通知书报到时间到校报到，为保证报到工作顺利进行， 请勿提前或者延期报到，逾期一周不报到者，取消入学资格。
					持录取通知书可购买半价火车票。来校期间费用自理。 时请持大学录取通知书且按照录取通知书报到时间到校报到，为保证报到工作顺利进行， 请勿提前或者延期报到，
					逾期一周不报到者，取消入学资格。持录取通知书可购买半价火车票。来校期间费用自理 时请持大学录取通知书且按照录取通知书报到时间到校报到，为保证报到工作顺利进行，

				    </p>--}}
			</div>

            <script src="js/jquery.1.12.js"></script>
			<script src="js/jquery-1.10.2.min.js"></script>
			<script type="text/javascript" src="js/basic.js"></script>
			<script type="text/javascript" src="js/rem.js"></script>
            <script src="js/jsonp.js"></script>
            <script>

                $(document).ready(function(){
                    //获取参数id
                    var str=location.href; //取得整个地址栏
                    var num=str.indexOf("=");
                    id=str.substr(num+1); //取得所有参数
                    var data={id:id};
                    var msg=$.fn.webx('uploadDate',data);
                    var str="";
                    var str='<p class="detail-tit">'+msg[0]['question']+'<span>'+msg[0]['add_time']+'</span></p><p class="detail-txt">'+msg[0]['answer']+'</p>';
                    $("#noticeDtail").html(str);
                });
            </script>
		</body>

</html>