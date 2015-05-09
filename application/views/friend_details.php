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
	<title>文章详情</title>
	<link rel="stylesheet" type="text/css" href="/resources/frozenui/1.2.1/css/frozen.css">
	<link rel="stylesheet" type="text/css" href="/resources/frozenui/1.2.1/css/global.css">
	<link rel="stylesheet" type="text/css" href="/resources/frozenui/1.2.1/css/animate.css">
	<style type="text/css">
	/*重置 开始*/
	html,body,div,span,object,iframe,h1,h2,h3,h4,h5,h6,p,a,blockquote,pre,abbr,address,cite,code,del,dfn,em,img,ins,kbd,q,samp,small,strong,sub,sup,var,b,i,dl,dt,dd,ol,ul,li,fieldset,form,label,legend,textarea,table,caption,tbody,tfoot,thead,tr,th,td,article,aside,canvas,details,figcaption,figure,footer,header,hgroup,menu,nav,section,summary,time,mark,audio,video {margin:0; padding:0; border:0; outline:0; vertical-align:baseline; background:transparent; font-size:100%;}
	article,aside,details,figcaption,figure,footer,header,hgroup,menu,nav,section,img,button {display:block;}
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
		font-family: "Microsoft YaHei", "宋体", Verdana, Arial, Helvetica, sans-serif;
		min-width: 296px;
		-webkit-text-size-adjust: none;
		background: #eee;
	}

	.share-details-container{
		max-width: 780px;
		margin: 0px auto;
		background-color: #FFF;
	}
	.share-details-container ul{
		padding: 0px;
		margin: 0px;
	}
	.share-details-container ul li{
		padding: 5px 15px;
	}
	.details-total-num {
		font-size: 15px;
		color: rgb(203,203,204);
		text-align: center;
		padding:12px!important;
	}
	.details-list-fl,.details-list-fl img{
		float: left;
	}
	.details-list-fr,.details-list-detail{
		float: right;
	}
	.details-list-fl img{
		width: 50px;
		border-radius: 3px;
		display: block;
	}
	.details-list-detail{
		margin-left: 10px;
	}
	.details-list-num{
		font-size: 15px;
		margin-top:5px;
		color: rgb(153,153,153);
	}
	.details-list-fr{
		height: 50px;
	}
	.details-list-title{
		font-size: 16px;
		white-space: nowrap;
		text-overflow: ellipsis;
		-o-text-overflow: ellipsis;
		overflow: hidden;
		color: block;
	}
	.sum-time{
		margin-top: 9px;
		color: rgb(153,153,153);
		font-size: 15px;
		vertical-align: -webkit-baseline-middle;
		white-space: nowrap;
		text-overflow: ellipsis;
		-o-text-overflow: ellipsis;
		overflow: hidden;
	}
	.loading-all{
		text-align: center;
		padding: 10px;
		color: rgb(153,153,153);
		font-size: 15px;

	}
	.clear{
		clear: both;

	}
	</style>
</head>
<body ontouchstart="">
	<div class="share-details-container">
		<ul class="share-details-ul">
			<li class="details-total-num ui-border-b">
				您的邀请收益总计<?=$child_total_profit?>元
			</li>
			<?php 
			foreach ($friend_work  as $value) {
				$value['time'] = date("m-d",$value['time']);
				echo '<li class="details-list ui-border-b">
				<div class="details-list-fl">
					<img src='.$value['headimgurl'].' alt="" class="details-list-img">
					<div class="details-list-detail">
						<div class="details-list-title">
							'.$value['child_name'].'
						</div>
						<div class="details-list-num">
							通过该好友获益'.$value['child_profit'].'元
						</div>
					</div>
					<div class="clear"></div>
				</div>
				<div class="details-list-fr">
					<div class="sum-time">
						'.$value['time'].'
					</div>
				</div>
				<div class="clear"></div>
			</li>';
			}
			?>
			<!-- <li class="details-list ui-border-b">
				<div class="details-list-fl">
					<img src="/resources/frozenui/1.2.1/img/face_default.png" alt="" class="details-list-img">
					<div class="details-list-detail">
						<div class="details-list-title">
							龙猫猫
						</div>
						<div class="details-list-num">
							通过该好友获益3.00元
						</div>
					</div>
					<div class="clear"></div>
				</div>
				<div class="details-list-fr">
					<div class="sum-time">
						5-05
					</div>
				</div>
				<div class="clear"></div>
			</li>
			<li class="details-list ui-border-b">
				<div class="details-list-fl">
					<img src="/resources/frozenui/1.2.1/img/face_default.png" alt="" class="details-list-img">
					<div class="details-list-detail">
						<div class="details-list-title">
							龙猫猫
						</div>
						<div class="details-list-num">
							通过该好友获益3.00元
						</div>
					</div>
					<div class="clear"></div>
				</div>
				<div class="details-list-fr">
					<div class="sum-time">
						5-05
					</div>
				</div>
				<div class="clear"></div>
			</li>
			<li class="details-list ui-border-b">
				<div class="details-list-fl">
					<img src="/resources/frozenui/1.2.1/img/face_default.png" alt="" class="details-list-img">
					<div class="details-list-detail">
						<div class="details-list-title">
							龙猫猫
						</div>
						<div class="details-list-num">
							通过该好友获益3.00元
						</div>
					</div>
					<div class="clear"></div>
				</div>
				<div class="details-list-fr">
					<div class="sum-time">
						5-05
					</div>
				</div>
				<div class="clear"></div>
			</li>
			<li class="details-list ui-border-b">
				<div class="details-list-fl">
					<img src="/resources/frozenui/1.2.1/img/face_default.png" alt="" class="details-list-img">
					<div class="details-list-detail">
						<div class="details-list-title">
							龙猫猫
						</div>
						<div class="details-list-num">
							通过该好友获益3.00元
						</div>
					</div>
					<div class="clear"></div>
				</div>
				<div class="details-list-fr">
					<div class="sum-time">
						5-05
					</div>
				</div>
				<div class="clear"></div>
			</li>
			<li class="details-list ui-border-b">
				<div class="details-list-fl">
					<img src="/resources/frozenui/1.2.1/img/face_default.png" alt="" class="details-list-img">
					<div class="details-list-detail">
						<div class="details-list-title">
							龙猫猫
						</div>
						<div class="details-list-num">
							通过该好友获益3.00元
						</div>
					</div>
					<div class="clear"></div>
				</div>
				<div class="details-list-fr">
					<div class="sum-time">
						5-05
					</div>
				</div>
				<div class="clear"></div>
			</li> -->
			<li class="loading-all">
				已加载所有数据
			</li>
		</ul>
	</div>
</body>
</html>