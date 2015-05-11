<!doctype html>

<head>

	<!-- Basics -->
	
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no, minimal-ui">
	<title>商城后台管理系统</title>

	
	<link rel="stylesheet" href="/resources/js/dist/semantic.min.css">
	<link rel="stylesheet" href="/resources/css/framework7.min.css">
	<link href="/resources/font-awesome-4.2.0/css/font-awesome.min.css" rel="stylesheet">
	
	<link rel="stylesheet" href="/resources/css/admin_public.css">


	<style type="text/css">
		body{
			padding: 20px;
			overflow: auto;
		}
	</style>
</head>


<body>
	<div id="tongji_top">
		<div class="ui compact menu">
			<a class="item">
				<i class="fa fa-eye"></i>
				今日访问
				<div class="floating ui blue label">2112</div>
			</a>
			<a class="item">
				<i class="fa fa-clock-o"></i>
				累计访问
				<div class="floating ui teal label">2222</div>
			</a>
			<a class="item">
				<i class="fa fa-users"></i>
				总用户数
				<div class="floating ui purple label">2222</div>
			</a>
			<a class="item">
				<i class="fa fa-users"></i>
				总商户数
				<div class="floating ui red label">2222</div>
			</a>
		</div>
		
	</div>

	<div id="tongji_chart">
		<div class="ui raised segment">
			<a class="ui ribbon label">用户访问统计图</a>
			<div class="ui segment">
				<img src="/resources/img/chart.png">
			</div>
			<a class="ui teal ribbon label">用户类别图</a>
			<div class="ui segment">
				<img src="/resources/img/chart.png">
			</div>
			<a class="ui red ribbon label">商家类别图</a>
			<div class="ui segment">
				<img src="/resources/img/chart.png">
			</div>
			<a class="ui purple ribbon label">商家地域图</a>
			<div class="ui segment">
				<img src="/resources/img/chart.png">
			</div>
			<a class="ui blue ribbon label">商家排行</a>
			<div class="ui segment">
				<img src="/resources/img/chart.png">
			</div>
			
		</div>
	</div>
</body>

<script src="/resources/js/framework7.js"></script>
<script src='/resources/js/jquery.min.js'></script>
<script type="text/javascript" src="/resources/js/dist/semantic.js"></script>
<!-- 插件 -->
<!-- <script type="text/javascript" src="/resources/js/dist/components/menu.min.js"></script> -->

<script type="text/javascript">
	// Initialize app and store it to myApp variable for futher access to its methods
	var shop_name = '林海网络' ;
	var myApp = new Framework7({
		modalTitle: shop_name,
    // If it is webapp, we can enable hash navigation:
    pushState: true,
    modalButtonOk:'确定',
    modalButtonCancel:'取消',
    
    // Hide and show indicator during ajax requests
    onAjaxStart: function (xhr) {
    	myApp.showIndicator();
    },
    onAjaxComplete: function (xhr) {
    	myApp.hideIndicator();
    }

});


	$(document).ready(function(){
		// 初始化下拉框
		$('.ui.dropdown').dropdown();
		// 左侧目录初始化
		$('.menu a.item').on('click', function() {
			if(!$(this).hasClass('dropdown')) {
				$(this)
				.addClass('active')
				.closest('.ui.menu')
				.find('.item')
				.not($(this))
				.removeClass('active')
				;
			}
		});
		
	});

	$(function(){


		function msg_good (str) {
			myApp.alert('<p>'+str+'</p><i class="fa fa-check color-green" style="font-size:50px;"></i>');
		};
		function msg_bad (str) {
			myApp.alert('<p>'+str+'</p><i class="fa fa-remove color-red" style="font-size:50px;"></i>');
		};
		// 添加新分类



	});



</script>
</html>






