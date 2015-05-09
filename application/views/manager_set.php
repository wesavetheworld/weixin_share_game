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

	<div id="basic_set_main">
		<div class="ui raised segment">
			<a class="ui purple  ribbon label">管理员管理</a>
			<br/><br/>
			<p id="liang_add_new_manager" class="width_200"><a  class="button button-big color-green button-fill"><i class="fa fa-plus right_fiv"></i>添加</a></p>
			<table class="ui   purple table">
				<thead>
					<tr>
						<th>编号</th>
						<th>用户名</th>
						<th>加密后密码</th>
						<th>操作</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>1</td>
						<td ><input type="text" placeholder="用户名" class="order_num name" value="用户名"></td>
						<td ><input type="password" placeholder="密码" class="order_num pass" value="12345"></td>
						<td><span class="color-green"><i class="fa fa-pencil"></i>编辑</span><span class="color-red"><i class="fa fa-remove"></i>删除</span><span class="color-blue"><i class="fa fa-pencil"></i>确定</span></td>
					</tr>
					<tr>
						<td>1</td>
						<td ><input type="text" placeholder="用户名" class="order_num name" value="用户名"></td>
						<td ><input type="password" placeholder="密码" class="order_num pass" value="12345"></td>
						<td><span class="color-green"><i class="fa fa-pencil"></i>编辑</span><span class="color-red"><i class="fa fa-remove"></i>删除</span><span class="color-blue"><i class="fa fa-pencil"></i>确定</span></td>
					</tr>
					

					
				</tbody>
			</table>
			
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

		$('#liang_add_new_manager').on('click',function(){
			myApp.modalLogin('添加管理员',
				function(name, password) {
					alert(name+password);
				});
		});
		$('.order_num').on('focus',function(){

			if ( $(this).parent().parent().find('.color-blue').is(":hidden") ) {
				$(this).blur();	
			};
			
		});
		$('table .color-green').on('click',function(){
			$(this).parent().parent().find('.color-blue').show();
			$(this).parent().parent().find('.color-red').hide();
			$(this).hide();
			$(this).parent().parent().find('input').addClass('under_edit');
		});
		$('.color-blue').on('click',function(){
			var username = $(this).parent().parent().find('.name').val();
			var password = $(this).parent().parent().find('.pass').val();

			alert(username+'——'+password);

			$(this).parent().parent().find('.color-green').show();
			$(this).parent().parent().find('.color-red').show();
			$(this).hide();
			$(this).parent().parent().find('input').removeClass('under_edit');
		});

		$('.color-red').on('click',function(){
			alert('删除');
			var username = $(this).parent().parent().hide(500);
		});

	});



</script>
</html>






