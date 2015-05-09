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
	<title>通知</title>
	<link rel="stylesheet" type="text/css" href="../frozenui/1.2.1/css/frozen.css">
	<link rel="stylesheet" type="text/css" href="../frozenui/1.2.1/css/global.css">
	<link rel="stylesheet" type="text/css" href="../frozenui/1.2.1/css/animate.css">
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
	.notice-container{
		width: 100%;
		max-width: 780px;
		margin: 0px auto;
	}
	.no-notice{
		width: 88%;
		margin: 25px auto;
		padding:15px;
		color: rgb(194,199,217);
		border-radius: 6px;
		border:1px  dashed  rgb(174,177,193);
		background-color: rgb(255,255,255);
	}
	.no-notice section{
		position: static!important;
	}
	.notice-lists{
		width: 100%;
		margin: 0px auto;
		padding-left: 0px;
		padding-right: 0px;
	}
	.notice-list{
		width: 94%;
		color: rgb(194,199,217);
		font-size: 13px;
		background-color: rgb(255,255,255);
		border-radius: 4px;
		margin: 15px auto;
		/*padding: 10px;*/

	}
	.list-title{
		font-size: 16px;
		padding: 5px 15px;
		color: black;
	}
	.notice-conten-box{
		padding: 10px 15px;
	}
	.notice-content{
		padding: 10px 0px;
		color: black;
	}
	</style>
</head>
<body ontouchstart="">
	<div class="notice-container">
		<div class="no-notice">
			<section class="ui-notice ui-notice-news">
			    <i></i>
			    <p>暂时没有通知</p>
			</section>
		</div>
		<div class="notice-list-box">
			<ul class="notice-lists">
				<li class="notice-list">
					<div class="list-title ui-border-b">
						提现通知
					</div>
					<div class="notice-conten-box">
						<div class="notice-banner">
							随时随地转发，轻轻松松赚钱！
						</div>
						<div class="notice-content">
							<div>您已成功提现！</div>
							<div>提现金额：<span style="color: rgb(255,180,1);">11元</span></div>
						</div>
						<div class="notice-time">
							提现时间：5月1日
						</div>
					</div>
				</li>
				<li class="notice-list">
					<div class="list-title ui-border-b">
						提现通知
					</div>
					<div class="notice-conten-box">
						<div class="notice-banner">
							随时随地转发，轻轻松松赚钱！
						</div>
						<div class="notice-content">
							<div>您已成功提现！</div>
							<div>提现金额：<span style="color: rgb(255,180,1);">11元</span></div>
						</div>
						<div class="notice-time">
							提现时间：5月1日
						</div>
					</div>
				</li>
				<li class="notice-list">
					<div class="list-title ui-border-b">
						提现通知
					</div>
					<div class="notice-conten-box">
						<div class="notice-banner">
							随时随地转发，轻轻松松赚钱！
						</div>
						<div class="notice-content">
							<div>您已成功提现！</div>
							<div>提现金额：<span style="color: rgb(255,180,1);">11元</span></div>
						</div>
						<div class="notice-time">
							提现时间：5月1日
						</div>
					</div>
				</li>
			</ul>
		</div>
	</div>
	
</body>
</html>