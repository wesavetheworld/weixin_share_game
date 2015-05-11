<!doctype html>

<head>

	<!-- Basics -->
	
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	
	<title>三果儿文章转发系统</title>

	<!-- CSS -->
	
	<link rel="stylesheet" href="/resources/css/reset.css">
	<link rel="stylesheet" href="/resources/css/animate.css">
	<link rel="stylesheet" href="/resources/css/styles.css">

	<link rel="stylesheet" href="/resources/css/framework7.min.css">

	<!-- ICON CSS -->
	<link href="/resources/font-awesome-4.2.0/css/font-awesome.min.css" rel="stylesheet">

	<style type="text/css">

		body{
			
			background-repeat: repeat-y;

		}
		#test{
			position: fixed;
			width: 100%;
			height: 100%;
			z-index: 0;
		}
		#test img{
			max-width: 100%;
		}

	</style>
</head>

<!-- Main HTML -->

<body>
	
	<!-- Begin Page Content -->
	<div id="test">
		<img src=" <?php echo '/resources/img/login_bc'.rand(1,7).'.jpg';?>">
	</div>
	
	<div id="container">
		
		<div>

			<label for="name">用户名:</label>

			<input id="name_input" type="name" placeholder="用户名">

			<label for="username">密码:</label>

			<p><a id="forget_pass" href="#">忘记密码?</a>

				<input id="password_input" type="password" placeholder="密码">

				<div id="lower">

					<input type="checkbox"><label class="check" for="checkbox">保持登录</label>

					<input id="submit_button" type="submit" value="登录">

				</div>

			</div>

		</div>


		<!-- End Page Content -->

	</body>
	<script type="text/javascript" src="/resources/js/framework7.js"></script>
	<script src='/resources/js/jquery.min.js'></script>

	<script type="text/javascript">
	// Initialize app and store it to myApp variable for futher access to its methods
	var myApp = new Framework7({
		modalTitle: '林海网络' ,
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


	$(function(){

		// 成功消息
		function msg_good (str) {
			myApp.alert('<p>'+str+'</p><i class="fa fa-check color-green" style="font-size:50px;"></i>');
		};
		// 失败消息
		function msg_bad (str) {
			myApp.alert('<p>'+str+'</p><i class="fa fa-remove color-red" style="font-size:50px;"></i>');
		};



		 $("body").keydown(function() {
             if (event.keyCode == "13") {//keyCode=13是回车键
                 $('#submit_button').click();
             }
         });


		$("#submit_button").click(function(){
			var name_input = $("#name_input").val();
			var password_input = $("#password_input").val();

			$.ajax({
         		// async: false,//这里必须取消异步处理，因为异步处理还未赋值
        		url: "/index.php/admin/login_admin",
        		type: "post",
        		dataType: "json",
        		data: {
            		name_input:name_input,
            		password_input:password_input
        		},  
       		 	success: function(data){
                    if (data==0) {
                    	window.location.reload();
                    }else{
                    	window.location.href="http://share.kejixi.com/index.php/admin/admin_main";
                    }
        		},
        		error: function(error1, error2, error3){
            		alert('failed');
        		}
    		});

		});


	});
</script>
</html>






