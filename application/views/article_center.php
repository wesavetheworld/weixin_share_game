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
	<title>任务中心</title>
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
	.article-center-container{
		width: 100%;
		max-width: 780px;
		margin: 0px auto;
		background: #fff;
	}
	.li-label-y:after {
	position: absolute;
	content: "";
	right: 0;
	top: 0;
	z-index: -1;
	width: 0;
	height: 0;
	border-top: 0 solid transparent;
	border-right: 4em solid transparent;
	border-bottom: 4em solid transparent;
	border-left: 0 solid transparent;
	border-right-color: inherit;
	-webkit-transition: border-color .2s ease;
	transition: border-color .2s ease;
	}
	.li-label-g:after {
	position: absolute;
	content: "";
	right: 0;
	top: 0;
	z-index: -1;
	width: 0;
	height: 0;
	border-top: 0 solid transparent;
	border-right: 4em solid transparent;
	border-bottom: 4em solid transparent;
	border-left: 0 solid transparent;
	border-right-color: inherit;
	-webkit-transition: border-color .2s ease;
	transition: border-color .2s ease;
	}
	 .li-label-y {
	background-color: transparent;
	border-color: rgb(110,214,40);
	color: #fff;
	position: absolute;
	top: 0;
	right: 0;
	z-index: 10;
	margin: 0;
	font-size: .8125em;
	width: 3rem;
	height: 3rem;
	padding: 0;
	text-align: center;
	-webkit-transition: color .2s ease;
	transition: color .2s ease;
	}
	.li-label-g {
		background-color: transparent;
		border-color: rgb(239,239,244)!important;
		color:rgb(210,210,210)!important;
		position: absolute;
		top: 0;
		right: 0;
		z-index: 10;
		margin: 0;
		font-size: .8125em;
		width: 3rem;
		height: 3rem;
		padding: 0;
		text-align: center;
		-webkit-transition: color .2s ease;
		transition: color .2s ease;

	}
	.article-center-li{
		position:relative; 
	}
	.article-center-li .li-fl{
		float: left;
		width: 70px;
		padding:10px 0px 10px 15px;
	}
	.article-center-li .li-fl img {
		max-width: 100%;
		border-radius: 2px;
		display: block;
	}
	.article-center-li .li-fr{
		float: left;
		height: 70px;
		padding: 10px;
	}
	.article-center-baner {
		text-align: center;
	}
	.article-center-baner img {
		max-width: 100%;

	}
@media only screen  and (min-device-width : 220px)  and (max-device-width : 360px) {
		.article-center-title{
			max-width: 215px!important;
		}
		
}	
	.article-center-title{
		height: 40px;
		line-height: 40px;
		font-size: 1rem;
		font-size: 17px;
		max-width: 250px;
		margin-bottom: 5px;
		white-space: nowrap;
		text-overflow: ellipsis;
		-o-text-overflow: ellipsis;
		overflow: hidden;
	}
	.article-center-article-num{
		font-size: 13px;
		line-height: 35px;
		height: 35px;
		color: rgb(173,170,170);
		vertical-align: baseline;
	}
	.get_article{
		display: block;
	}
	.li-label-y .text,.li-label-g .text{
	margin: 0.5em 0 0 .8em;
	-webkit-transform: rotate(45deg);
	-ms-transform: rotate(45deg);
	transform: rotate(45deg);
	}
	.personal-center{
		width: 100%;
		background-color: #f3fafe;
		position: fixed;
		bottom: 0px;
	}
	.pc-left .my-box div{
		line-height: 20px;
		font-size: 1rem;
		white-space: nowrap;
		text-overflow: ellipsis;
		-o-text-overflow: ellipsis;
		overflow: hidden;
		font-weight: normal;
	}
	.my-avator{
		float: left;
		width: 65px;
		height: 65px;
		text-align: center;
		border-radius: 80px;
		margin-top: -10px;
		margin-left: 15px;
		background-color: #f3fafe;
	}
	.my-avator img{
		width: 55px;
		height: 55px;
		/*margin-left: 5px;*/
		margin-top: 8px;
		border-radius: 60px;
	}
	.my-box{
		display: block;
		float: left;
		margin-left: 5px;
	}
	.my-name{
		padding-top: 6px;
		color: #1194ce;
	}
	.my-money{
		padding-top: 4px;
		color: #999;
	}
	.pc-right{
		padding: 1rem;
		padding-right: 20px;
		background: url(/resources/frozenui/1.2.1/img/dt_more.png) no-repeat right 5px;
		background: url(/resources/frozenui/1.2.1/img/dt_more_2.png) no-repeat right\9;
		background-size: 1rem auto;
		background-position-y: 1.25rem;
		font-size: 1rem;
		
		margin-right: 10px;
	}
	.pc-right a{
		color:rgb(79,200,253)!important; 
	}
	.ab-left,.pc-left{
			float:left;
		}
	.pc-right{
			float: right;
		}
	</style>
	
</head>
<body ontouchstart="">
	<div class="article-center-container">
	<div class="article-center-baner">
		<img src="/resources/frozenui/1.2.1/img/banner_enpei.png">
	</div>
	<div class="article-center-lists">
		<ul class="article-center-ul">
			<li class="article-center-li ui-border-b">
				<a href="<?=$url?>" class="get-article">
					<div class="li-fl">
						<img src="<?=$article['ar_author_pic']?>">
					</div>
					<div class="li-fr ">
						<div class="article-center-title">
							<?=$article['ar_title']?>
						</div>
						<div class="article-center-article-num">
							本篇金额1000元
						</div>
					</div>
					<div style="clear:left;"></div>
				</a>
				<?php if ($is_get=='no') {
					echo '<div class="li-label-y ">	
						<div class="text">
						未领
						</div>' ;
				}else{
					echo '<div class="li-label-g">	
						<div class="text">
							已领
						</div>';
				}
				?>
				
				</div>	
			</li>
			<!-- <li class="article-center-li">
				<div class="li-fl">
					<img src="/resources/frozenui/1.2.1/img/face_default.png">
				</div>
				<div class="li-fr ui-border-b">
					<div class="article-center-title">
						安全出行安全出行安全出行安全出行安全出行安全出行安全出行安全出行安全出行
					</div>
					<div class="article-center-article-num">
						本篇金额1000元
					</div>
				</div>
				<div style="clear:left;"></div>
			</li>
			<li class="article-center-li">
				<div class="li-fl">
					<img src="/resources/frozenui/1.2.1/img/face_default.png">
				</div>
				<div class="li-fr ui-border-b">
					<div class="article-center-title">
						安全出行安全出行安全出行安全出行安全出行安全出行安全出行安全出行安全出行
					</div>
					<div class="article-center-article-num">
						本篇金额1000元
					</div>
				</div>
				<div style="clear:left;"></div>
			</li>
			<li class="article-center-li">
				<div class="li-fl">
					<img src="/resources/frozenui/1.2.1/img/face_default.png">
				</div>
				<div class="li-fr ui-border-b">
					<div class="article-center-title">
						安全出行安全出行安全出行安全出行安全出行安全出行安全出行安全出行安全出行
					</div>
					<div class="article-center-article-num">
						本篇金额1000元
					</div>
				</div>
				<div style="clear:left;"></div>
			</li> -->
		</ul>
	</div>
	</div>
	<div class="personal-center">
		<div class="pc-left">
			<div class="my-avator">
				<img src='<?=$users['headimgurl']?>'>
			</div>
			<div class="my-box">
				<div class="my-name"><?=$users['u_name']?></div>
				<div class="my-money">
				已获益<?=$user_total_profit;?>元
				</div>
			</div>
			
		</div>
		<div class="pc-right">
			<a href="/index.php/share/personal_center?">个人中心</a>
		</div>
		<div class="clear"></div>
	</div>
</body>
</html>