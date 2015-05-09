<!doctype html>

<head>

	<!-- Basics -->
	
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no, minimal-ui">
	<title>三果儿文章转发系统</title>
	
	<link rel="stylesheet" href="/resources/js/dist/semantic.min.css">
	<link rel="stylesheet" href="/resources/css/framework7.min.css">
	<link href="/resources/font-awesome-4.2.0/css/font-awesome.min.css" rel="stylesheet">

	<link rel="stylesheet" href="/resources/css/admin_public.css">
</head>


<body>
	<div id="top_container">
		<div class="float_left">
			三果儿微信平台管理系统
		</div>
		<div class="float_right">
			<div class="ui dropdown">
				<a class="ui image label">
					<i class="fa fa-user"></i>
					Admin
					<i class="dropdown icon"></i>
				</a>
				<div class="menu">
					<div class="item">
						<a href="http://share.kejixi.com/index.php/admin/del_session">注销</a>
					</div>
				</div>
			</div>

		</div>
		<div class="clear"></div>
	</div>
	<div id="main_container">
		<div id="left_nav_container">
			<div class="ui large vertical menu">
				<a class="active item" data-nav-id="0">
					<div class="ui teal label">1</div>
					<i class="fa fa-area-chart"></i>
					统计信息
				</a>
				<!-- <a class="item" data-nav-id="1">
					<div class="ui label">51</div>
					<i class="fa fa-area-chart"></i>
					基本设置
				</a> -->
				<a class="item" data-nav-id="2">
					<div class="ui label">1</div>
					<i class="fa fa-area-chart"></i>
					管理员管理
				</a>

				<!-- <a class="item" data-nav-id="3">
					<div class="ui label">1</div>
					<i class="fa fa-area-chart"></i>
					会员管理
				</a> -->
				<a class="item" data-nav-id="4">
					<div class="ui label">1</div>
					<i class="fa fa-area-chart"></i>
					文章管理
				</a>
				<a class="item" data-nav-id="7">
					<div class="ui label">1</div>
					<i class="fa fa-area-chart"></i>
					提现申请
				</a>
				<a class="item" data-nav-id="8">
					<div class="ui label">1</div>
					<i class="fa fa-area-chart"></i>
					提现完成
				</a>  
				<!-- <a class="item" data-nav-id="5">
					<div class="ui label">1</div>
					<i class="fa fa-area-chart"></i>
					短信管理
				</a>
				<a class="item" data-nav-id="6" data-content="Add users to your feed">
					<div class="ui label">1</div>
					<i class="fa fa-area-chart"></i>
					黑名单
				</a> -->
				
			</div>
			<p id="hide_left" class=""><a  class="button button-big color-blue button-fill"><i class="fa fa-arrow-left right_fiv"></i>隐藏</a></p>
			<p id="show_left_con" class=""><a  class="button button-big color-blue button-fill"><i class="fa fa-arrow-right right_fiv"></i>显示菜单</a></p>
		</div>
		<iframe style="padding-bottom: 50px;" id="right_iframe" src="http://share.kejixi.com/index.php/admin/admin_admin_article"></iframe>
	</div>
</body>

<script src="/resources/js/framework7.js"></script>
<script src='/resources/js/jquery.min.js'></script>
<script type="text/javascript" src="/resources/js/dist/semantic.js"></script>
<!-- 插件 -->
<!-- <script type="text/javascript" src="/resources/js/dist/components/menu.min.js"></script> -->

<script type="text/javascript">
	// Initialize app and store it to myApp variable for futher access to its methods
	var myApp = new Framework7({
		modalTitle: '三果儿' ,
    // If it is webapp, we can enable hash navigation:
    pushState: true,
    
    // Hide and show indicator during ajax requests
    onAjaxStart: function (xhr) {
    	myApp.showIndicator();
    },
    onAjaxComplete: function (xhr) {
    	myApp.hideIndicator();
    }

});


	$(document).ready(function(){
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
		// 初始化下拉框
		$('.ui.dropdown').dropdown();
		var ww ;
		// 初始化Iframe窗口
		function initial_window () {
			ww = $(window).width() - $('#left_nav_container').width() -45;
			// hh = $(window).height() - $('#top_container').height() - 21;

			$('#right_iframe').css({ width: ww});
		}
		initial_window();
		$(window).resize(function(){
			initial_window();
		});
		var HIDE_LEFT = false;
		$('#hide_left').click(function(){
			$('#left_nav_container').animate({'left': '-300px'}, 500);
			$('#show_left_con').show();
			$('#right_iframe').animate({
				'left': 0,
				'width':(ww+300)
			}, 500);
		});
		$('#show_left_con').click(function(){

			$('#left_nav_container').animate({'left': '0'}, 500);
			$(this).hide();
			$('#right_iframe').animate({
				'left': 300,
				'width':ww
			}, 500);

		});
		var $right_iframe = $('#right_iframe');

		$('.menu a.item').on('click', function() {
			var nav_id = $(this).data('nav-id');
			var url = '';
			switch(nav_id){
				case 0:
				url = 'http://share.kejixi.com/index.php/admin/admin_tongji';
				break;
				case 1:
				url = 'http://share.kejixi.com/index.php/admin/admin_basic_set';
				break;
				case 2:
				url = 'http://share.kejixi.com/index.php/admin/admin_manager_set';
				break;
				case 3:
				url = 'http://share.kejixi.com/index.php/admin/admin_user_mana';
				break;
				case 4:
				url = 'http://share.kejixi.com/index.php/admin/admin_admin_article/1';
				break;
				case 5:
				url = 'http://share.kejixi.com/index.php/admin/admin_slider_list';
				break;
				case 7:
				url = 'http://share.kejixi.com/index.php/admin/applay_cash/1';
				break;
				case 8:
				url = 'http://share.kejixi.com/index.php/admin/ok_cash/1';
				break;
			};   

			$right_iframe.attr('src',url);

		});
		$right_iframe.attr('src','tongji.html');

	});



</script>
</html>






