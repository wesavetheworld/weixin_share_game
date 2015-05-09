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

	<div id="">
		<div class="ui raised segment">
			<a class="ui teal  ribbon label">会员管理</a>
			<br/><br/>
			<div class="clear"></div>
			<p id="liang_add_new_user" class="width_200 fl"><a  class="button button-big color-green button-fill"><i class="fa fa-plus right_fiv"></i>添加</a></p>
			<p id="liang_send_mes" class="width_200 fr"><a  class="button button-big color-green button-fill"><i class="fa fa-paper-plane right_fiv"></i>发消息</a></p>
			<div class="clear"></div>

			<div id="send_user_mess_container" class="ui piled segment">
				<h4 class="ui dividing header">发送系统消息</h4>
				<div class="ui selection dropdown system_mess">
					<div class="default text">选择类别</div>
					<i class="dropdown icon"></i>
					<div class="menu">
						<div class="item" data-value="1">类别一</div>
						<div class="item" data-value="0">类别二</div>
					</div>
				</div>
				<br/><br/>
				<div class="ui form">
					<div class="required field">
						<label>消息标题</label>
						<input id="sms_title" type="text" placeholder="消息标题">
					</div>
				</div>
				<div class="ui form">
					<div class="required field">
					<label>消息内容</label>
						<textarea id="sms_desc" placeholder="消息内容"></textarea>
					</div>
				</div>
				
				<p id="sumit_send_user_mess" class="width_200 fl"><a  class="button button-big color-green button-fill"><i class="fa fa-paper-plane right_fiv"></i>发消息</a></p>
				<p id="cancel_send_user_mess" class="width_200 fl" style="margin-left:10px;"><a  class="button button-big color-red button-fill">取消</a></p>
				<div class="clear"></div>
			</div>
			<table id="user_list_table" class="ui teal  table">
				<thead>
					<tr>
						<th>编号</th>
						<th>手机</th>
						<th>类别</th>
						<th>线上VIP</th>
						<th>线下VIP</th>
						<th>注册时间</th>
						<th>操作</th>
					</tr>
				</thead>
				<tbody >

					<tr id="add_new_user">
						<td>#</td>
						<td><input id="new_user_tel" type="text" placeholder="手机号" class="under_edit telephone" ></td>
						<td>
							<div class="ui selection dropdown add_cate">
								<div class="default text">选择类别</div>
								<i class="dropdown icon"></i>
								<div class="menu">
									<div class="item" data-value="1">类别一</div>
									<div class="item" data-value="0">类别二</div>
								</div>
							</div>
						</td>
						<td>
							<i class="fa fa-ban color-red"> </i>
						</td>
						<td><input type="text" placeholder="线下VIP" class="under_edit off_vip" ></td>
						<td>Y-M-D HH:MM:SS</td>
						<td>
						<a id="confirm_add_user_button" class="button button-small button-fill">确定添加</a>
						</td>
					</tr>

					<tr>
						<td>1</td>
						<td>18638838747</td>
						<td><a class="ui teal tag label">类别名</a></td>
						<td>11111118</td>
						<td>空</td>
						<td>2014-12-21 12:00</td>
						<td>
							<div class="ui toggle checkbox">
								<input type="checkbox" checked>
								<label>启用</label>
							</div>
						</td>
					</tr>
					<tr>
						<td>1</td>
						<td>18638838747</td>
						<td><a class="ui teal tag label">类别名</a></td>
						<td>11111118</td>
						<td>空</td>
						<td>2014-12-21 12:00</td>
						<td>
							<div class="ui toggle checkbox">
								<input type="checkbox" checked>
								<label>启用</label>
							</div>
						</td>
					</tr>
					<tr>
						<td>1</td>
						<td>18638838747</td>
						<td><a class="ui teal tag label">类别名</a></td>
						<td>11111118</td>
						<td>空</td>
						<td>2014-12-21 12:00</td>
						<td>
							<div class="ui toggle checkbox">
								<input type="checkbox" checked>
								<label>启用</label>
							</div>
						</td>
					</tr>
					
				</tbody>
			</table>

			<div class="ui pagination menu fl">
				<a class="icon item">
					<i class="left arrow icon"></i>
				</a>
				<a class="active item">
					1
				</a>
				<div class="disabled item">
					...
				</div>
				<a class="item">
					10
				</a>
				<a class="item">
					11
				</a>
				<a class="item">
					12
				</a>
				<a class="icon item">
					<i class="right arrow icon"></i>
				</a>
			</div>

			<div class="ui form fl " style="margin-left:30px;">
				<input type="text" placeholder="页码" style="width:100px;float:left;margin-right:10px;height: 39px;padding-left: 5px;" class="">
				<a class="button button-big color-blue button-fill" style="
				height: 38px;
				width: 100px;
				"><i class="fa fa-paper-plane right_fiv"></i>跳转</a>
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
		$('.ui.checkbox')
		.checkbox()
		;
		
	});

	$(function(){


		function msg_good (str) {
			myApp.alert('<p>'+str+'</p><i class="fa fa-check color-green" style="font-size:50px;"></i>');
		};
		function msg_bad (str) {
			myApp.alert('<p>'+str+'</p><i class="fa fa-remove color-red" style="font-size:50px;"></i>');
		};
		// 添加新分类

		$('#liang_add_new_user').on('click',function(){
			$('#add_new_user').show();
			$('#new_user_tel').focus();
		});

		$('#liang_send_mes').on('click',function(){
			$('#send_user_mess_container').show();
			$('#liang_add_new_user').hide();
			$(this).hide();
		});
		$('#cancel_send_user_mess').on('click',function(){
			$('#send_user_mess_container').hide();
			$('#liang_add_new_user').show();
			$('#liang_send_mes').show();
		});
		// 选择分类
		var global_cate_id ;
		$('.add_cate .item').on('click',function(){
			global_cate_id = $(this).data('value');
		});
		// 确定添加
		$('#confirm_add_user_button').on('click',function(){
			var telephone = $(this).parent().parent().find('.telephone').val();
			var off_vip = $(this).parent().parent().find('.off_vip').val();
			var cate_id = global_cate_id;
			alert(telephone+'##'+off_vip+'##'+cate_id);
			$(this).parent().parent().hide();
		});
		var global_sms_cate_id ;
		$('.system_mess .item').on('click',function(){
			global_sms_cate_id = $(this).data('value');
		});
		// 提交发送系统消息
		$('#sumit_send_user_mess').on('click',function(){
			var cate_id = global_sms_cate_id;
			var title= $('#sms_title').val();
			var content= $('#sms_desc').val();

			alert(cate_id+'##'+title+'##'+content);
			$('#send_user_mess_container').hide();
			$('#liang_add_new_user').show();
			$('#liang_send_mes').show();
		});

	});



</script>
</html>






