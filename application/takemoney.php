<!DOCTYPE html>
<html lang="zh">
<head>
	<meta charset="UTF-8">
	<meta name="author" content="三果儿 网络科技">
	<meta name="format-detection" content="telephone=no" />
	<meta name="viewport" content="width=device-width, user-scalable=no"/>
	<meta name="viewport" content="initial-scale=1.0">
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="apple-mobile-web-app-status-bar-style" content="black" />
	<title>用户提现</title>
	<link rel="stylesheet" type="text/css" href="/resources/frozenui/1.2.1/css/frozen.css">
	<link rel="stylesheet" type="text/css" href="/resources/frozenui/1.2.1/css/global.css">
	<link rel="stylesheet" type="text/css" href="/resources/frozenui/1.2.1/css/animate.css">
	<style>
	/*重置 开始*/
	html,body,div,span,object,iframe,h1,h2,h3,h4,h5,h6,p,a,blockquote,pre,abbr,address,cite,code,del,dfn,em,img,ins,kbd,q,samp,small,strong,sub,sup,var,b,i,dl,dt,dd,ol,ul,li,fieldset,form,label,legend,textarea,table,caption,tbody,tfoot,thead,tr,th,td,article,aside,canvas,details,figcaption,figure,footer,header,hgroup,menu,nav,section,summary,time,mark,audio,video {margin:0; padding:0; border:0; outline:0; vertical-align:baseline; background:transparent; font-size:100%;}
	article,aside,details,figcaption,figure,footer,header,hgroup,menu,nav,section, button {display:block;}
	input,select,button {margin:0; border:none; padding:0; outline:none; vertical-align:middle; background:transparent; font-size:100%;}
	ul,ol {list-style:none;}
	blockquote,q {quotes:none;}
	blockquote:before,blockquote:after,q:before,q:after {content:' '; content:none;}
	del {text-decoration:line-through;}
	ins {background-color:#ff9; color:#000; text-decoration:none;}
	mark {background-color:#ff9; color:#000; font-style:italic; font-weight:bold;}
	abbr[title],dfn[title] {border-bottom:1px dotted; cursor:help;}
	table {border-collapse:collapse; border-spacing:0;}
	/*重置 结束*/
	html{-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;font-family:"Microsoft YaHei", "宋体", Verdana, Arial, Helvetica, sans-serif;}
	body{
		-webkit-backface-visibility: hidden;
		font: 14px/1.5 arial,"Microsoft Yahei","Hiragino Sans GB",sans-serif;
		min-width: 296px;
		-webkit-text-size-adjust: none;
		background:rgb(235,235,235);
	}
	.take-money-box{
		background-color: rgb(255,180,1);
	}
	.takemoney-container{
		width: 100%;
		max-width: 780px;
		margin: 0px auto;
	}
	.my-money-title{
		width: 60%;
		margin: 0px auto;
		padding: 20px 0px 5px 0px;
		font-size: 20px;
		color: #ffffff;
		text-align: center;
	}
	.my-money-num{
		width: 80%;
		font-size: 26px;
		font-weight: 700;
		color: #ffffff;
		text-align: center;
		margin:20px auto;
	}
	.money-take-tip{
		padding: 10px 15px;
	}
	.do-take{
		background-color: #ffffff;
		width: 100%;
		margin-top:15px;
	}
	.save-take-num{
		display: block;
		text-align: center;
		margin:30px;
		font-size: 16px;
		border-radius: 8px;
		height: 40px;
		background-color: rgb(244,164,33);
		color: #FFF;
		line-height: 40px;	
	}
	.take-tip p{
		padding:8px 15px;
	}
	.take-money-notes{
		width: 88%;
		margin: 25px auto;
		padding:15px;
		color: rgb(194,199,217);
		border-radius: 6px;
		border:1px  dashed  rgb(174,177,193);
		background-color: rgb(255,255,255);
	}
	.take-money-notes ul{
		
		padding-left: 10px;
	}
	.take-btn{
		margin-top: 40px;
	}
	.take-money-notes li
	{
		list-style:initial;
	}
	</style>
</head>
<body ontouchstart="">
	<div class="takemoney-container">
		<div class="take-money-box">
			<h2 class="my-money-title">我的可用余额</h2>
			<div class="my-money-num">
				&#65509;<span><?=$user_total_profit;?></span>
			</div>
			<div class="money-take-tip">
				注：账户余额>100元即可提现！
			</div>
		</div>
		<div class="do-take-box">
			<div class="take-tip do-take">
				<p>
					提现系统内测中，本次提现将以微信红包形式发放！
				</p>
				
			</div>
			<div class="take-num do-take">
				<div class="ui-form ui-border-t">
				    <form action="#" >
				        <div class="ui-form-item ui-border-b">
				            <label for="#">金额</label>
				            <input type="tel" placeholder="提现金额" id="take-num" value="0.20" readonly>
				            <a href="#" class="ui-icon-close"></a>
				        </div>
				        <div class="ui-form ">
				            <form action="#" >
				                <div class="ui-form-item ui-form-item-l ui-border-b">
				                    <label class="ui-border-r"> +86</label>
				                    <input type="tel" id="phone-num" placeholder="请输入手机号码">
				                    <a href="#" class="ui-icon-close"></a>
				                </div>
				            </form>
				        </div>
				        <div class="ui-form ">
				            <form action="#" >
				                <div class="ui-form-item ui-form-item-r ui-border-b">
				                    <input type="tel" id="phone-code" placeholder="请输入验证码">
				                    <!-- 若按钮不可点击则添加 disabled 类 -->
				                    <button type="button" class="ui-border-l get-s-code " >获取验证码</button>
				                    <a href="#" class="ui-icon-close"></a>
				                </div>
				            </form>
				        </div>
				      <!--   <div class="ui-form-item  ui-border-b">
				            <label for="#">提现密码</label>
				            <input type="text" placeholder="提现密码">
				            <a href="#" class="ui-icon-close"></a>
				        </div> -->
				    </form>
				</div>
			</div>
			<div class="take-btn">
				<a href="javascript:void(0)" id="save-take-num" class="save-take-num">申请</a>
			</div>
			<div class="take-money-notes">
				<ul>
					<li>
						<p>提现申请后需添加个人微信号：“fanfan”为好友，方可领取红包</p>
					</li>
					<li>
						<p>本次提现为体验测试，提现金额为0.02元</p>
					</li>
					<li>
						<p>提交申请后48小时内完成受理</p>
					</li>
					<li>
						<p>每天最多提现一次</p>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>

	<script type="text/javascript">
	var wait=60;
	function time(o) {
	  if (wait == 0) {
	   o.removeClass("disabled");   
	   o.text("免费获取验证码");
	   wait = 60;
	  } else {
	   o.addClass('disabled');
	   // o.setAttribute("disabled", true);
	   o.text("重新发送(" + wait + ")");
	   wait--;
	   setTimeout(function() {
	    time(o);
	   },
	   1000);
	  }

	 }
	 // function MathRand(){
	 //     var Num="";
	 //     for(var i=0;i<6;i++)
	 //     {
	 //     Num+=Math.floor(Math.random()*10);
	 //     }
	 //     return Num;
	 // }
	 var take_num =$('#take-num');
	 var phone_num = $('#phone-num');
	 var phone_code = $('#phone-code');
	 var total_num = 1.00;
	 var tip;
	 function checkform(){
	 	if (take_num.val()=="") {
	 		alert('请输入提现金额');
	 		tip = '提现金额不能为空';
	 		return false;
	 	}
	 	if (phone_code.val()==""){
	 		
	 		alert('验证码不能为空');
	 		tip = '不能为空';
	 		return false;
	 	}
	 	if (take_num.val()=="") {
	 		alert('请输入手机号码');
	 		tip = '手机号不能为空';
	 		return false;
		}
	 	if (isNaN(take_num.val())){
	 		alert('金额格式错误');
	 		tip = '金额格式错误';
	 		return false;
	 	}
	 	var total_num_value =parseFloat(total_num).toFixed(2);
	 	var take_num_value = parseFloat(total_num.val()).toFixed(2);
	 	if (total_num_value<take_num_value) {
	 		alert('金额不足');
	 		tip = '金额不足';
	 		return false;
	 	};
	 	if (isNaN(take_num.val()) || take_num.val().length != 11) { 
	 				alert('手机格式不正确');
	 				tip = '手机格式不正确';
	 				return false;
            	
        }
        var isMobile=/^(?:13\d|15\d|18\d)\d{5}(\d{3}|\*{3})$/;
	 			if(!isMobile.test(take_num.val())){
	 				alert('您填的不是手机号');
	 				tip = '您填的不是手机号';
	 				return false;		
	 	}
	 	if (isNaN(phone_code.val()) || phone_code.val().length != 11) { 
	 				alert('验证码格式不正确');
	 				tip = '验证码格式不正确';
	 				return false;
            	
        }
    }
    function isphone(){
    	if (take_num.val().length==0) {
	 		alert('请输入手机号码');
	 		tip = '手机号不能为空';
	 		return false;
		}
		if (isNaN(take_num.val())) {
			alert(1);
			return false;
		};
		if (take_num.val().length != 11) {
			alert(2);
			return false;
		};
		if (phone_num.val().length != 11) { 
	 				alert('手机格式不正确');
	 				tip = '手机格式不正确';
	 				return false;
            	
        }
        var isMobile=/^(?:13\d|15\d|18\d)\d{5}(\d{3}|\*{3})$/;
	 			if(!isMobile.test(phone_num.val())){
	 				alert('您填的不是手机号');
	 				tip = '您填的不是手机号';
	 				return false;		
	 	}

	 	return true;
    }
	$(document).ready(function(){
		// $('#save-take-num').click(function(){
		// 	checkform();
		// });
		$('.get-s-code').click(function(){
			var that = $(this);
			alert($('#phone-num').val());
			console.log(num,$('#phone-num').val());
			// isphone();
			// if (isphone()) {
			// 	alert($('#phone-num').val());
			// };
			
				// $.post("http://share.kejixi.com/index.php/admin/send_msm_verify",{tel:15537922825},function(result){
				//    	time(that);
				//  });
			// time($(this));
		});
		$('#save-take-num').click(function(){
			// var that = $(this);
			alert($('#phone-num').val());
				$.post("http://share.kejixi.com/index.php/admin/accept_applay",{u_id:<?=$uid?>,phone_code:$('#phone-code').val(),take_num:$('#take-num').val(),tel:$('#phone-num').val()},function(result){
				   	time(that);
				 });
			// time($(this));
		});
	});
   
  </script>

</body>
</html>