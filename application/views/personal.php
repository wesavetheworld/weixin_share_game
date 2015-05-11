<!DOCTYPE html>
<html lang="zh">
<head>
	<meta charset="UTF-8">
	<meta name="author" content="三果儿 网络科技">
	<meta name="format-detection" content="telephone=no" />
	<meta name="viewport" content="width=device-width, user-scalable=no"/>
	<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="apple-mobile-web-app-status-bar-style" content="black" />
	<title>个人中心</title>
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
	.get-money-box{
		background-color: rgb(255,180,1);
	}
	.personal-container{
		width: 100%;
		max-width: 780px;
		margin: 0px auto;
	}
	.my-money-title{
		width: 60%;
		margin: 0px auto;
		padding: 20px 0px 5px 0px;
		font-size: 22px;
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
	.money-get-box{
		width: 100%;
		margin-top:10px;
		font-size: 14px;
		color:#ffffff;
	}
	.friend-get{
		width:49%;
		text-align: center;
		padding-bottom: 5px;
	}
	.self-get{
		width:50%;
		text-align: center;
		border-right:1px solid #ffffff;
		padding-bottom: 5px;
	}
	.get-detail{
		display: inline-block;
		margin:9px 15px;
		border-radius: 4px;
		width: 45px;
		padding: 3px 2px;
	    background-color: #ffffff;
	    color:rgb(255,180,1);
		line-height: 1.4rem;		
	}
	.get-detail:focus, [onclick] {
	-webkit-tap-highlight-color: inherit!important;
	}
	.self-get-num,.friend-get-num{
		font-size: 16px;
		font-weight: bolder;

	}
	.menu-action{
		font-size: 16px;
		width: 93%;
		color: black!important;
		/*font-weight: 600;*/
		height: 28px;
		line-height: 28px;
		padding: 8px;
		display: block;
		overflow: hidden;
		padding-right: 10px;
		background: url(/resources/frozenui/1.2.1/img/area_arrow.png) no-repeat right;
		background-size: 10px;
	}
	.menu-action:hover{
		background:rgb(235,235,235);
	}
	.menu-action img{
		width: 26px;
		margin-right: 10px;
		margin-left:10px;
		vertical-align: top;
	}
	.menu-box0,.menu-box1,.menu-box2{
		background-color: #ffffff;
		width: 100%;
	}
	
	.menu-box0,.menu-box2{
		margin: 15px 0px;
	}
	.fl{
		float: left;
	}
	.fr{float:right;}
	.clear{
		clear:both;
	}
	.personal-menu-box .hr{
		height: 1px;
		width: 100%;
	}

	a{
		text-decoration: none;
	}
	a:hover{
		text-decoration: none;
	}
	.notice_num{
		margin-left: 5px;
		vertical-align: inherit;
		min-height: 1em;
		max-height: 2em;
		font-size: 11px;
		padding: .15em .42em!important;
		line-height: 1em;
		text-align: center;
		border-radius: 500rem;
		background-color: #D95C5C!important;
		border-color: #D95C5C!important;
		color: #FFF!important;
		/*display: inline-block;*/
	}
	</style>
	
</head>
<body ontouchstart="">
	<div class="personal-container">
		<div class="get-money-box">
			<h2 class="my-money-title">我的收益总计</h2>
			<div class="my-money-num">
				&#65509;<span><?=$user_total_profit?></span>
			</div>
			<div class="money-get-box">
				<div class="self-get fl">
					<div class="self-get-num"><?=$article_total_profit?></div>
					<div class="self-get-note">分享累计收益</div>
					<div class="get-self-detail">
						<a href="/index.php/share/share_details" class="get-detail">明细</a>
					</div>
				</div>
				<div class="friend-get fr">
					<div class="friend-get-num"><?=$child_total_profit?></div>
					<div class="friend-get-note">邀请累计收益</div>
					<div class="friend-self-detail">
						<a href="/index.php/share/friend_details" class="get-detail">明细</a>
					</div>
				</div>
				<div class="clear"></div>
			</div>
		</div>
		<div class="personal-menu-box">
			<div class="menu-box0">
			<a href="/index.php/share/takemoney" class="menu-action take-money" >
				<img src="/resources/frozenui/1.2.1/img/area_icon_account.png"><span>我要提现</span>
			</a>
			</div>
			<div class="menu-box1">
			<a href="/index.php/share/notice" class="notice menu-action ui-border-b" >
				<img src="/resources/frozenui/1.2.1/img/area_icon_msg.png"><span>通知</span>
				<?php if (isset($notice_num) && $notice_num>0) {
					echo '<span class="notice_num">'.$notice_num.'</span>';
				}
				?>
				
			</a>
			<div class="hr ui-border-b"></div>
			<a href="/index.php/share/share_friends" class="menu-action send-friend " >
				<img src="/resources/frozenui/1.2.1/img/area_icon_invite.png"><span>邀请好友</span>
			</a>	
			</div>
			<div class="menu-box2">
			<a href="/index.php/share/myfrofile" class="menu-action my-profile ui-border-b" >
				<img src="/resources/frozenui/1.2.1/img/area_icon_profile.png"><span>我的资料</span>
			</a>
			<div class="hr ui-border-b"></div>
			<a href="" class="menu-action care-us " >
				<img src="/resources/frozenui/1.2.1/img/area_icon_review.png"><span>关注我们</span>
			</a>
			<div class="hr ui-border-b"></div>
			<a href="javascript:history.go(-1);" class="menu-action to-back" >
				<img src="/resources/frozenui/1.2.1/img/rightcc2x.png"><span>返回</span>
			</a>	
			</div>
		</div>
	</div>
	
</body>
</html>