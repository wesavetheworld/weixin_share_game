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
	<link rel="stylesheet" type="text/css" href="../frozenui/1.2.1/css/frozen.css">
	<link rel="stylesheet" type="text/css" href="../frozenui/1.2.1/css/global.css">
	<link rel="stylesheet" type="text/css" href="../frozenui/1.2.1/css/animate.css">
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

	.detail-container{
		max-width: 780px;
		margin: 0px auto;
		background-color: #FFF;
	}
	.clear{
		clear: both;
	}
	.top-banner{
		width: 100%;
		background-color: #f3fafe;
	}
	.tb-left{
		width: 60%;
		float: left;
		margin: 15px 0px 15px 15px;
		font-size: 15px;
		color: #666;
		line-height: 20px;
		white-space: nowrap;
		text-overflow: ellipsis;
		-o-text-overflow: ellipsis;
		overflow: hidden;
		font-weight: normal;
	}
	.tb-right{
		float: right;
		font-size: 15px;
		margin: 15px 0px;
		padding: 0px 20px; 
		background: url(../frozenui/1.2.1/img/rightcc2x.png) no-repeat;
		background: url(../frozenui/1.2.1/img/rightcc1x.png) no-repeat\9;
		color: #49b7e8;
		line-height: 20px;
		background-size: 16px 16px;
		background-position: 0px 2px;
	}
	.detail-title{
		padding: 10px 15px 10px 15px;
		text-align: left;
		color: #000;
		font-size: 18px;
		line-height: 28px;
	}
	.author-box span{
		font-size: 0.8125rem;
		font-size: 13px;
	}
	.ab-left,.pc-left{
		float:left;
	}
	.ab-right{
		/*width: 93.9%;*/
		float: right;
		height: 28px;
		margin-right: 15px;
		overflow: hidden;
	}
	.pc-right{
		float: right;
	}
	.ab-left,.ab-right{
		display: inline-block;
		line-height: 1!important;
	}
	.author-avatar{
		display: inline-block;
		width: 26px;
		/*height: 26px;*/
		margin-left:15px;
	}
	.author-avatar img{
		width:100%;
		border-radius: 26px;
	}
	.author-name-box{
		display: inline-block;
		vertical-align: middle;
		padding-bottom: 10px;
		height: 26px;
	}
	.author-name{
		color:#1194ce;
		padding: 2px 0px;
		max-width: 100px;
		display: inline-block;
		white-space: nowrap;
		/*line-height: 26px;*/
		margin-bottom: 5px;
		text-overflow: ellipsis;
		-o-text-overflow: ellipsis;
		overflow: hidden;
		font-weight: normal;
	}
	.publish-time{
		padding: 2px 0px;
		max-width: 66px;
		display: inline-block;
		margin-left:3px;
		white-space: nowrap;
		/*line-height: 26px;*/
		margin-bottom: 5px;
		text-overflow: ellipsis;
		-o-text-overflow: ellipsis;
		overflow: hidden;
		font-weight: normal;
	}
	.read-num{
		margin-right: 5px;
		color: rgb(102, 102, 102);
		padding: 2px 0px;
		display: inline-block;
		white-space: nowrap;
		line-height: 1.4rem;
		text-overflow: ellipsis;
		-o-text-overflow: ellipsis;
		overflow: hidden;
		font-weight: normal;
	}
	.share-num{
		/*padding: 2px 0px;*/
		/*margin-right: 15px;*/
		display: block;
		font-size: 15px;
		white-space: nowrap;
		line-height: 20px;
		text-overflow: ellipsis;
		-o-text-overflow: ellipsis;
		overflow: hidden;
		font-weight: normal;
	}
	.share-num a{
		/*color: #444!important;*/
		color: #49b7e8 !important;
	}
	@media only screen  and (min-device-width : 220px)  and (max-device-width : 360px) {
		.read-num{
			margin-right: 2px!important;		
		}
		.share-num{
		  margin-right: 5px!important;
		}
		.author-avatar{
			margin-left:5px!important;
		}
		.my-box{
			margin-left: 0px!important;
		}
		
}
	.detail-content{
		padding: 15px;
	}
	.i-like{
		margin-top: 20px;
	}
	.i-like-left{
		float: left;
		/*margin-left: 15px;*/
		font-size: 15px;
		margin-top:10px;
		padding-top: 7px;
	}
	.i-like-right{
		float:right;
		margin-top: 10px;
	}
	.i-like-img{
		display: inline-block;
		width: 14px;
		height: 14px;
		margin-top: 10px;
		_margin-top: 8px;
		overflow: hidden;
	}
	.i-like-img img{
		width: 14px;
		height: 28px;
	}
	.i-like-num{
		display: inline-block;
		vertical-align: text-bottom;
		color: #49b7e8;
		font-size: 15px;
	}
	.personal-center{
		background-color: #f3fafe;
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
		margin-left: 5px;
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
		background: url(../frozenui/1.2.1/img/dt_more.png) no-repeat right 5px;
		background: url(../frozenui/1.2.1/img/dt_more_2.png) no-repeat right\9;
		background-size: 1rem auto;
		background-position-y: 1.25rem;
		font-size: 1rem;
		
		margin-right: 10px;
	}
	.pc-right a{
		color:rgb(79,200,253)!important; 
	}
	.recommend{
		padding: 10px 15px;
		color: #444;
		font-size: 15px;
	}
	.recommend .fl{
		float: left;
	}
	.recommend .fr{
		/*color: #49b7e8;*/
		display: none;
		color: rgb(102, 102, 102);
		/*display: inline-block;*/
		background: url(../frozenui/1.2.1/img/dt_more.png) no-repeat right 5px;
		background: url(../frozenui/1.2.1/img/dt_more_2.png) no-repeat right\9;
		padding-right: 18px;
		background-size: 0.88rem auto;
		background-position-y: 0.3rem;
		float: right;
	}
	.recommend-list li{
		float: left;
		width: 100%;
		overflow: hidden;
		cursor: pointer;
		height: 44px;
	}
	.list-icon{
		display: inline-block;
		float: left;
		background : url(../frozenui/1.2.1/img/vote2x.png) no-repeat;
		background-size: 24px 24px;
		width: 24px;
		height: 24px;
		margin: 10px 5px 10px 15px;
	}
	.list-title {
	  float: left;
	  max-width: 65%;
      display: inline-block;
	  white-space: nowrap;
	  text-overflow: ellipsis;
	  -o-text-overflow: ellipsis;
	  overflow: hidden;
	  margin: 10px 0;
	  text-align: left;
	  width: 70%;
	  color: #000;
	  font-size: 15px;	
	}
	.list-read{
		color: #999;
  		display: inline-block;
  		float: right;
  		padding-top: 2px;
  		margin: 10px 15px 10px 0;
  		font-size: 14px;
	}
	.bottom-banner{
		background-color: #f3fafe;
		padding: 7% 0;
		margin-bottom: 57px;
		text-align: center;
	}
	.bottom-banner img{
		width: 180px;
		display: inline-block;
	}
	.bottom-box{
		position: fixed;
		bottom: 0;
		left: 0;
		text-align: center;	
		height: 57px;
		width: 100%;
	}
	.bottom-menu{
		background-color: #2a3138;
		margin: 0px auto;
		max-width: 780px;
		height: 57px;
		overflow: hidden;
	}
	.get-new{
		display: inline-block;
		  background: url(../frozenui/1.2.1/img/icon-addhd.png) no-repeat 5px center;
		  background-size: 20px 20px;
		  color: #FFF!important;
		  float: left;
		  height: 40px;
		  margin:10px;
		  line-height: 40px;
		  padding: 0 5px 0 28px;
		  border-radius: 5px;
		  font-size: 15px;
	}
	.share-friend{
		display: inline-block;
		float: right;
		margin:9px 15px;
		font-size: 15px;
		border-radius: 8px;
		width: 45%;
		height: 40px;
		background-color: #49b7e8;
		color: #FFF;
		line-height: 40px;
		 
	}
	.fanUp {
	  	display: none;
	  	width: 40px;
	  	height: 40px;
	  	position: fixed;
	  	bottom: 65px;
	  	right: 10px;
	}
	.fanUp img {
  		width: 40px;
	}
	</style>
</head>
<body ontouchstart="">
	<div class="detail-container">
		<div class="top-banner">
			<div class="tb-left">随时随地转发，轻轻松松赚钱！</div>
			<div class="tb-right">我也参加</div>
			<div class="clear"></div>
		</div>
		<div class="detail-title">当别人说你胖时，什么神回复最给力？</div>
		<div class="author-box">
			<div class="ab-left">
				<div class="author-avatar">
					<img src="../frozenui/1.2.1/img/face_default.png">
				</div>
				<div class="author-name-box">
					<span class="author-name">三果儿网络科技</span>
					<span class="publish-time">4月29日</span>
				</div>
			</div>
			<div class="ab-right">
				<div class="read-num-box">
					<span class="read-num">阅读&nbsp10000</span>
				</div>
			</div>
			<div class="clear"></div>

		</div>
		<div class="detail-content">
			<p>
    <span style="margin: 0px; padding: 0px; border: 0px; font-family: &#39;Microsoft YaHei&#39;; line-height: 26px; vertical-align: baseline; word-break: break-all; background-color: rgb(255, 255, 255);">一个优秀的家庭、一个优秀的父母亲，并不是给你的孩子留10栋房子、10辆轿车、10个百万元的存款，而是培养他们的</span><span style="margin: 0px; padding: 0px; border: 0px; font-family: &#39;Microsoft YaHei&#39;; font-weight: bold; line-height: 26px; vertical-align: baseline; word-break: break-all; background-color: rgb(255, 255, 255); color: rgb(254, 98, 15);">10个生命气质</span><span style="margin: 0px; padding: 0px; border: 0px; font-family: &#39;Microsoft YaHei&#39;; line-height: 26px; vertical-align: baseline; word-break: break-all; background-color: rgb(255, 255, 255);">。这10个气质，孩子一生会受用不尽！</span><span style="margin: 0px; padding: 0px; border: 0px; font-family: &#39;Microsoft YaHei&#39;; line-height: 26px; vertical-align: baseline; word-break: break-all; background-color: rgb(255, 255, 255);"><br style="margin: 0px; padding: 0px;"/></span><span style="margin: 0px; padding: 0px; border: 0px; font-family: &#39;Microsoft YaHei&#39;; font-weight: bold; line-height: 26px; vertical-align: baseline; word-break: break-all; background-color: rgb(255, 255, 255); color: rgb(254, 98, 15);">第一，</span><span style="margin: 0px; padding: 0px; border: 0px; font-family: &#39;Microsoft YaHei&#39;; line-height: 26px; vertical-align: baseline; word-break: break-all; background-color: rgb(255, 255, 255);">要训练孩子会耐心地倾听；</span><span style="margin: 0px; padding: 0px; border: 0px; font-family: &#39;Microsoft YaHei&#39;; line-height: 26px; vertical-align: baseline; word-break: break-all; background-color: rgb(255, 255, 255);"><br style="margin: 0px; padding: 0px;"/></span><span style="margin: 0px; padding: 0px; border: 0px; font-family: &#39;Microsoft YaHei&#39;; font-weight: bold; line-height: 26px; vertical-align: baseline; word-break: break-all; background-color: rgb(255, 255, 255); color: rgb(254, 98, 15);">第二，</span><span style="margin: 0px; padding: 0px; border: 0px; font-family: &#39;Microsoft YaHei&#39;; line-height: 26px; vertical-align: baseline; word-break: break-all; background-color: rgb(255, 255, 255);">非常勤快地阅读；</span><span style="margin: 0px; padding: 0px; border: 0px; font-family: &#39;Microsoft YaHei&#39;; line-height: 26px; vertical-align: baseline; word-break: break-all; background-color: rgb(255, 255, 255);"><br style="margin: 0px; padding: 0px;"/></span><span style="margin: 0px; padding: 0px; border: 0px; font-family: &#39;Microsoft YaHei&#39;; font-weight: bold; line-height: 26px; vertical-align: baseline; word-break: break-all; background-color: rgb(255, 255, 255); color: rgb(254, 98, 15);">第三，</span><span style="margin: 0px; padding: 0px; border: 0px; font-family: &#39;Microsoft YaHei&#39;; line-height: 26px; vertical-align: baseline; word-break: break-all; background-color: rgb(255, 255, 255);">可以和任何人沟通；</span><span style="margin: 0px; padding: 0px; border: 0px; font-family: &#39;Microsoft YaHei&#39;; line-height: 26px; vertical-align: baseline; word-break: break-all; background-color: rgb(255, 255, 255);"><br style="margin: 0px; padding: 0px;"/></span><span style="margin: 0px; padding: 0px; border: 0px; font-family: &#39;Microsoft YaHei&#39;; font-weight: bold; line-height: 26px; vertical-align: baseline; word-break: break-all; background-color: rgb(255, 255, 255); color: rgb(254, 98, 15);">第四，</span><span style="margin: 0px; padding: 0px; border: 0px; font-family: &#39;Microsoft YaHei&#39;; line-height: 26px; vertical-align: baseline; word-break: break-all; background-color: rgb(255, 255, 255);">会写；</span><span style="margin: 0px; padding: 0px; border: 0px; font-family: &#39;Microsoft YaHei&#39;; line-height: 26px; vertical-align: baseline; word-break: break-all; background-color: rgb(255, 255, 255);"><br style="margin: 0px; padding: 0px;"/></span><span style="margin: 0px; padding: 0px; border: 0px; font-family: &#39;Microsoft YaHei&#39;; font-weight: bold; line-height: 26px; vertical-align: baseline; word-break: break-all; background-color: rgb(255, 255, 255); color: rgb(254, 98, 15);">第五，</span><span style="margin: 0px; padding: 0px; border: 0px; font-family: &#39;Microsoft YaHei&#39;; line-height: 26px; vertical-align: baseline; word-break: break-all; background-color: rgb(255, 255, 255);">自己能解决生活问题；</span><span style="margin: 0px; padding: 0px; border: 0px; font-family: &#39;Microsoft YaHei&#39;; line-height: 26px; vertical-align: baseline; word-break: break-all; background-color: rgb(255, 255, 255);"><br style="margin: 0px; padding: 0px;"/></span><span style="margin: 0px; padding: 0px; border: 0px; font-family: &#39;Microsoft YaHei&#39;; font-weight: bold; line-height: 26px; vertical-align: baseline; word-break: break-all; background-color: rgb(255, 255, 255); color: rgb(254, 98, 15);">第六，</span><span style="margin: 0px; padding: 0px; border: 0px; font-family: &#39;Microsoft YaHei&#39;; line-height: 26px; vertical-align: baseline; word-break: break-all; background-color: rgb(255, 255, 255);">养成孩子严谨的性情；</span><span style="margin: 0px; padding: 0px; border: 0px; font-family: &#39;Microsoft YaHei&#39;; line-height: 26px; vertical-align: baseline; word-break: break-all; background-color: rgb(255, 255, 255);"><br style="margin: 0px; padding: 0px;"/></span><span style="margin: 0px; padding: 0px; border: 0px; font-family: &#39;Microsoft YaHei&#39;; font-weight: bold; line-height: 26px; vertical-align: baseline; word-break: break-all; background-color: rgb(255, 255, 255); color: rgb(254, 98, 15);">第七，</span><span style="margin: 0px; padding: 0px; border: 0px; font-family: &#39;Microsoft YaHei&#39;; line-height: 26px; vertical-align: baseline; word-break: break-all; background-color: rgb(255, 255, 255);">懂得彼此尊重，懂得自我反省；</span><span style="margin: 0px; padding: 0px; border: 0px; font-family: &#39;Microsoft YaHei&#39;; line-height: 26px; vertical-align: baseline; word-break: break-all; background-color: rgb(255, 255, 255);"><br style="margin: 0px; padding: 0px;"/></span><span style="margin: 0px; padding: 0px; border: 0px; font-family: &#39;Microsoft YaHei&#39;; font-weight: bold; line-height: 26px; vertical-align: baseline; word-break: break-all; background-color: rgb(255, 255, 255); color: rgb(254, 98, 15);">第八，</span><span style="margin: 0px; padding: 0px; border: 0px; font-family: &#39;Microsoft YaHei&#39;; line-height: 26px; vertical-align: baseline; word-break: break-all; background-color: rgb(255, 255, 255);">有环保的观念；</span><span style="margin: 0px; padding: 0px; border: 0px; font-family: &#39;Microsoft YaHei&#39;; line-height: 26px; vertical-align: baseline; word-break: break-all; background-color: rgb(255, 255, 255);"><br style="margin: 0px; padding: 0px;"/></span><span style="margin: 0px; padding: 0px; border: 0px; font-family: &#39;Microsoft YaHei&#39;; font-weight: bold; line-height: 26px; vertical-align: baseline; word-break: break-all; background-color: rgb(255, 255, 255); color: rgb(254, 98, 15);">第九，</span><span style="margin: 0px; padding: 0px; border: 0px; font-family: &#39;Microsoft YaHei&#39;; line-height: 26px; vertical-align: baseline; word-break: break-all; background-color: rgb(255, 255, 255);">教育并培养周围的人；</span><span style="margin: 0px; padding: 0px; border: 0px; font-family: &#39;Microsoft YaHei&#39;; line-height: 26px; vertical-align: baseline; word-break: break-all; background-color: rgb(255, 255, 255);"><br style="margin: 0px; padding: 0px;"/></span><span style="margin: 0px; padding: 0px; border: 0px; font-family: &#39;Microsoft YaHei&#39;; font-weight: bold; line-height: 26px; vertical-align: baseline; word-break: break-all; background-color: rgb(255, 255, 255); color: rgb(254, 98, 15);">第十，</span><span style="margin: 0px; padding: 0px; border: 0px; font-family: &#39;Microsoft YaHei&#39;; line-height: 26px; vertical-align: baseline; word-break: break-all; background-color: rgb(255, 255, 255);">与外界友好地接触。</span><span style="margin: 0px; padding: 0px; border: 0px; font-family: &#39;Microsoft YaHei&#39;; line-height: 26px; vertical-align: baseline; word-break: break-all; background-color: rgb(255, 255, 255);"><br style="margin: 0px; padding: 0px;"/></span><span style="margin: 0px; padding: 0px; border: 0px; font-family: &#39;Microsoft YaHei&#39;; line-height: 26px; vertical-align: baseline; word-break: break-all; background-color: rgb(255, 255, 255);"><br style="margin: 0px; padding: 0px;"/></span><span style="margin: 0px; padding: 0px; border: 0px; font-family: &#39;Microsoft YaHei&#39;; line-height: 26px; vertical-align: baseline; word-break: break-all; background-color: rgb(255, 255, 255);">互动吧上的许多亲子活动，都能对培养孩子这10个生命气质起到很大帮助作用，下面就为您推荐一些五一期间的亲子活动，您可以带上你的萌娃一起去参加哦！</span><span style="margin: 0px; padding: 0px; border: 0px; font-family: &#39;Microsoft YaHei&#39;; line-height: 26px; vertical-align: baseline; word-break: break-all; background-color: rgb(255, 255, 255);"></span><span style="margin: 0px; padding: 0px; border: 0px; font-family: &#39;Microsoft YaHei&#39;; line-height: 26px; vertical-align: baseline; word-break: break-all; background-color: rgb(255, 255, 255);"></span>
</p>
<p>
    <img src="http://img2.hudongba.cn/upload/_cos/userarticleimg/201504/27/01430119005610_article0.png" suffix_360="7e8ea74b8ab1236f1806e1eff3e7d6cf" suffix_src="http://img2.hudongba.cn/upload/_cos/userarticleimg/201504/27/01430119005610_article0.png" style="margin: 0px; padding: 0px; border: none; font-family: inherit; font-style: inherit; font-variant: inherit; font-weight: inherit; line-height: inherit; vertical-align: top; max-width: 100%; display: inline;"/>
</p>
<p style="text-align: justify;">
    <span style="margin: 0px; padding: 0px; border: 0px; font-family: &#39;Microsoft YaHei&#39;; font-weight: bold; line-height: 26px; vertical-align: baseline; word-break: break-all; background-color: rgb(255, 255, 255); color: rgb(14, 106, 193);">PS:</span><span style="margin: 0px; padding: 0px; border: 0px; font-family: &#39;Microsoft YaHei&#39;; line-height: 26px; vertical-align: baseline; word-break: break-all; background-color: rgb(255, 255, 255);">不管你是年轻的粑粑麻麻，还是亲子教育机构，还是户外活动机构，点击链接<a class="dt_hdb_support" href="http://www.hudongba.mobi/post/party" style="margin: 0px; padding: 0px; border: 0px; font-family: inherit; font-style: inherit; font-variant: inherit; font-weight: inherit; line-height: inherit; vertical-align: baseline; color: rgb(73, 183, 232); background-color: transparent; text-decoration: none; cursor: pointer;">http://www.hudongba.mobi/post/party</a>即可发起亲子活动，召集更多萌娃一起在玩耍中成长！</span><span style="margin: 0px; padding: 0px; border: 0px; font-family: &#39;Microsoft YaHei&#39;; line-height: 26px; vertical-align: baseline; word-break: break-all; background-color: rgb(255, 255, 255);"><br style="margin: 0px; padding: 0px;"/></span><span style="margin: 0px; padding: 0px; border: 0px; font-family: &#39;Microsoft YaHei&#39;; line-height: 26px; vertical-align: baseline; word-break: break-all; background-color: rgb(255, 255, 255);"><br style="margin: 0px; padding: 0px;"/></span><span style="margin: 0px; padding: 0px; border: 0px; font-family: &#39;Microsoft YaHei&#39;; font-weight: bold; line-height: 26px; font-size: 18px; vertical-align: baseline; word-break: break-all; background-color: rgb(255, 255, 255); color: rgb(240, 52, 66);">▷“爱心小报童”大型亲子体验活动</span><span style="margin: 0px; padding: 0px; border: 0px; font-family: &#39;Microsoft YaHei&#39;; line-height: 26px; vertical-align: baseline; word-break: break-all; background-color: rgb(255, 255, 255);"></span><span style="margin: 0px; padding: 0px; border: 0px; font-family: &#39;Microsoft YaHei&#39;; line-height: 26px; vertical-align: baseline; word-break: break-all; background-color: rgb(255, 255, 255);"><p>
        <img src="http://img2.hudongba.cn/upload/_cos/userarticleimg/201504/27/91430119111631_article9.png" suffix_360="c8346329768afbbd82a79ff23663a664" suffix_src="http://img2.hudongba.cn/upload/_cos/userarticleimg/201504/27/91430119111631_article9.png" style="margin: 0px; padding: 0px; border: none; font-family: inherit; font-style: inherit; font-variant: inherit; font-weight: inherit; line-height: inherit; vertical-align: top; max-width: 100%; display: inline;"/>
    </p></span><span style="margin: 0px; padding: 0px; border: 0px; font-family: &#39;Microsoft YaHei&#39;; font-weight: bold; line-height: 26px; vertical-align: baseline; word-break: break-all; background-color: rgb(255, 255, 255); color: rgb(240, 52, 66);">活动时间：</span><span style="margin: 0px; padding: 0px; border: 0px; font-family: &#39;Microsoft YaHei&#39;; line-height: 26px; vertical-align: baseline; word-break: break-all; background-color: rgb(255, 255, 255);">5月2-3日</span><span style="margin: 0px; padding: 0px; border: 0px; font-family: &#39;Microsoft YaHei&#39;; line-height: 26px; vertical-align: baseline; word-break: break-all; background-color: rgb(255, 255, 255);"><br style="margin: 0px; padding: 0px;"/></span><span style="margin: 0px; padding: 0px; border: 0px; font-family: &#39;Microsoft YaHei&#39;; font-weight: bold; line-height: 26px; vertical-align: baseline; word-break: break-all; background-color: rgb(255, 255, 255); color: rgb(240, 52, 66);">活动地点：</span><span style="margin: 0px; padding: 0px; border: 0px; font-family: &#39;Microsoft YaHei&#39;; line-height: 26px; vertical-align: baseline; word-break: break-all; background-color: rgb(255, 255, 255);">浙江义乌</span><span style="margin: 0px; padding: 0px; border: 0px; font-family: &#39;Microsoft YaHei&#39;; line-height: 26px; vertical-align: baseline; word-break: break-all; background-color: rgb(255, 255, 255);"><br style="margin: 0px; padding: 0px;"/></span><span style="margin: 0px; padding: 0px; border: 0px; font-family: &#39;Microsoft YaHei&#39;; font-weight: bold; line-height: 26px; vertical-align: baseline; word-break: break-all; background-color: rgb(255, 255, 255); color: rgb(240, 52, 66);">推荐理由：</span><span style="margin: 0px; padding: 0px; border: 0px; font-family: &#39;Microsoft YaHei&#39;; line-height: 26px; vertical-align: baseline; word-break: break-all; background-color: rgb(255, 255, 255);">利用周末或节假日期间，组织孩子参加“卖报”活动,给孩子一个充分接触社会的机会，在活动中充分锻炼孩子的沟通能力，在实践中体验工作的艰辛，懂得尊重劳动、珍惜生活，感恩父母，传承中华民族传统美德。<a class="dt_hdb_support" href="http://www.hudongba.mobi/party/kiw6" style="margin: 0px; padding: 0px; border: 0px; font-family: inherit; font-style: inherit; font-variant: inherit; font-weight: inherit; line-height: inherit; vertical-align: baseline; color: rgb(73, 183, 232); background-color: transparent; text-decoration: none; cursor: pointer;">http://www.hudongba.mobi/party/kiw6</a></span><span style="margin: 0px; padding: 0px; border: 0px; font-family: &#39;Microsoft YaHei&#39;; line-height: 26px; vertical-align: baseline; word-break: break-all; background-color: rgb(255, 255, 255);"><br style="margin: 0px; padding: 0px;"/></span><span style="margin: 0px; padding: 0px; border: 0px; font-family: &#39;Microsoft YaHei&#39;; line-height: 26px; vertical-align: baseline; word-break: break-all; background-color: rgb(255, 255, 255);"><br style="margin: 0px; padding: 0px;"/></span><span style="margin: 0px; padding: 0px; border: 0px; font-family: &#39;Microsoft YaHei&#39;; font-weight: bold; line-height: 26px; vertical-align: baseline; word-break: break-all; background-color: rgb(255, 255, 255); color: rgb(240, 52, 66);">▷ “大手牵小手，快乐致童年”跳蚤市场</span><span style="margin: 0px; padding: 0px; border: 0px; font-family: &#39;Microsoft YaHei&#39;; line-height: 26px; vertical-align: baseline; word-break: break-all; background-color: rgb(255, 255, 255);"></span><span style="margin: 0px; padding: 0px; border: 0px; font-family: &#39;Microsoft YaHei&#39;; line-height: 26px; vertical-align: baseline; word-break: break-all; background-color: rgb(255, 255, 255);"><p>
        <img src="http://img2.hudongba.cn/upload/_cos/userarticleimg/201504/27/21430119156535_article2.png" suffix_360="6e562dfa7994a5bf61b240833b7bb962" suffix_src="http://img2.hudongba.cn/upload/_cos/userarticleimg/201504/27/21430119156535_article2.png" style="margin: 0px; padding: 0px; border: none; font-family: inherit; font-style: inherit; font-variant: inherit; font-weight: inherit; line-height: inherit; vertical-align: top; max-width: 100%; display: inline;"/>
    </p></span><span style="margin: 0px; padding: 0px; border: 0px; font-family: &#39;Microsoft YaHei&#39;; font-weight: bold; line-height: 26px; vertical-align: baseline; word-break: break-all; background-color: rgb(255, 255, 255); color: rgb(240, 52, 66);">活动时间：</span><span style="margin: 0px; padding: 0px; border: 0px; font-family: &#39;Microsoft YaHei&#39;; line-height: 26px; vertical-align: baseline; word-break: break-all; background-color: rgb(255, 255, 255);">5月2日</span><span style="margin: 0px; padding: 0px; border: 0px; font-family: &#39;Microsoft YaHei&#39;; line-height: 26px; vertical-align: baseline; word-break: break-all; background-color: rgb(255, 255, 255);"><br style="margin: 0px; padding: 0px;"/></span><span style="margin: 0px; padding: 0px; border: 0px; font-family: &#39;Microsoft YaHei&#39;; font-weight: bold; line-height: 26px; vertical-align: baseline; word-break: break-all; background-color: rgb(255, 255, 255); color: rgb(240, 52, 66);">活动地点：</span><span style="margin: 0px; padding: 0px; border: 0px; font-family: &#39;Microsoft YaHei&#39;; line-height: 26px; vertical-align: baseline; word-break: break-all; background-color: rgb(255, 255, 255);">江苏盐城</span><span style="margin: 0px; padding: 0px; border: 0px; font-family: &#39;Microsoft YaHei&#39;; line-height: 26px; vertical-align: baseline; word-break: break-all; background-color: rgb(255, 255, 255);"><br style="margin: 0px; padding: 0px;"/></span><span style="margin: 0px; padding: 0px; border: 0px; font-family: &#39;Microsoft YaHei&#39;; font-weight: bold; line-height: 26px; vertical-align: baseline; word-break: break-all; background-color: rgb(255, 255, 255); color: rgb(240, 52, 66);">推荐理由：</span><span style="margin: 0px; padding: 0px; border: 0px; font-family: &#39;Microsoft YaHei&#39;; line-height: 26px; vertical-align: baseline; word-break: break-all; background-color: rgb(255, 255, 255);">倡导环保低碳生活，推进文明城市建设，发扬勤俭节约的传统美德，将社会资源价值最大化，避免闲置物品随意丢弃造成资源浪费。丰富广大小朋友课余生活，锻炼小朋友语言表达能力以及和他人沟通的技巧，通过自我努力获得成就感和理财观，亲身体验生活中的辛苦与快乐。<a class="dt_hdb_support" href="http://www.hudongba.mobi/party/jz2o" style="margin: 0px; padding: 0px; border: 0px; font-family: inherit; font-style: inherit; font-variant: inherit; font-weight: inherit; line-height: inherit; vertical-align: baseline; color: rgb(73, 183, 232); background-color: transparent; text-decoration: none; cursor: pointer;">http://www.hudongba.mobi/party/jz2o</a></span><span style="margin: 0px; padding: 0px; border: 0px; font-family: &#39;Microsoft YaHei&#39;; line-height: 26px; vertical-align: baseline; word-break: break-all; background-color: rgb(255, 255, 255);"><br style="margin: 0px; padding: 0px;"/></span><span style="margin: 0px; padding: 0px; border: 0px; font-family: &#39;Microsoft YaHei&#39;; line-height: 26px; vertical-align: baseline; word-break: break-all; background-color: rgb(255, 255, 255);"><br style="margin: 0px; padding: 0px;"/></span><span style="margin: 0px; padding: 0px; border: 0px; font-family: &#39;Microsoft YaHei&#39;; font-weight: bold; line-height: 26px; vertical-align: baseline; word-break: break-all; background-color: rgb(255, 255, 255); color: rgb(240, 52, 66);">▷【亲子野外拓展营】波浪谷徒步穿越</span><span style="margin: 0px; padding: 0px; border: 0px; font-family: &#39;Microsoft YaHei&#39;; line-height: 26px; vertical-align: baseline; word-break: break-all; background-color: rgb(255, 255, 255);"></span><span style="margin: 0px; padding: 0px; border: 0px; font-family: &#39;Microsoft YaHei&#39;; line-height: 26px; vertical-align: baseline; word-break: break-all; background-color: rgb(255, 255, 255);"><p>
        <img src="http://img2.hudongba.cn/upload/_cos/userarticleimg/201504/27/41430119198796_article4.png" suffix_360="0bcd4f2a80c978b7e721c9e306779d70" suffix_src="http://img2.hudongba.cn/upload/_cos/userarticleimg/201504/27/41430119198796_article4.png" style="margin: 0px; padding: 0px; border: none; font-family: inherit; font-style: inherit; font-variant: inherit; font-weight: inherit; line-height: inherit; vertical-align: top; max-width: 100%; display: inline;"/>
    </p></span><span style="margin: 0px; padding: 0px; border: 0px; font-family: &#39;Microsoft YaHei&#39;; font-weight: bold; line-height: 26px; vertical-align: baseline; word-break: break-all; background-color: rgb(255, 255, 255); color: rgb(240, 52, 66);">活动时间：</span><span style="margin: 0px; padding: 0px; border: 0px; font-family: &#39;Microsoft YaHei&#39;; line-height: 26px; vertical-align: baseline; word-break: break-all; background-color: rgb(255, 255, 255);">5月2-3日</span><span style="margin: 0px; padding: 0px; border: 0px; font-family: &#39;Microsoft YaHei&#39;; line-height: 26px; vertical-align: baseline; word-break: break-all; background-color: rgb(255, 255, 255);"><br style="margin: 0px; padding: 0px;"/></span><span style="margin: 0px; padding: 0px; border: 0px; font-family: &#39;Microsoft YaHei&#39;; font-weight: bold; line-height: 26px; vertical-align: baseline; word-break: break-all; background-color: rgb(255, 255, 255); color: rgb(240, 52, 66);">活动地点：</span><span style="margin: 0px; padding: 0px; border: 0px; font-family: &#39;Microsoft YaHei&#39;; line-height: 26px; vertical-align: baseline; word-break: break-all; background-color: rgb(255, 255, 255);">陕西靖边波浪谷！</span><span style="margin: 0px; padding: 0px; border: 0px; font-family: &#39;Microsoft YaHei&#39;; line-height: 26px; vertical-align: baseline; word-break: break-all; background-color: rgb(255, 255, 255);"><br style="margin: 0px; padding: 0px;"/></span><span style="margin: 0px; padding: 0px; border: 0px; font-family: &#39;Microsoft YaHei&#39;; font-weight: bold; line-height: 26px; vertical-align: baseline; word-break: break-all; background-color: rgb(255, 255, 255); color: rgb(240, 52, 66);">推荐理由：</span><span style="margin: 0px; padding: 0px; border: 0px; font-family: &#39;Microsoft YaHei&#39;; line-height: 26px; vertical-align: baseline; word-break: break-all; background-color: rgb(255, 255, 255);">拓展亲子活动寓教于乐，寓知识于游戏中，同时开发孩子的智力，提高其动手能力、反应力、创造力，使孩子能在德、智、体、美、劳各方面得到全面发展！同时邀请父母和孩子一起玩游戏，增进了孩子和父母之间的亲密关系，更让家长、孩子们尽情的体验了一次回归大自然的美好感觉！<a class="dt_hdb_support" href="http://www.hudongba.mobi/party/q5b6" style="margin: 0px; padding: 0px; border: 0px; font-family: inherit; font-style: inherit; font-variant: inherit; font-weight: inherit; line-height: inherit; vertical-align: baseline; color: rgb(73, 183, 232); background-color: transparent; text-decoration: none; cursor: pointer;">http://www.hudongba.mobi/party/q5b6</a></span><span style="margin: 0px; padding: 0px; border: 0px; font-family: &#39;Microsoft YaHei&#39;; line-height: 26px; vertical-align: baseline; word-break: break-all; background-color: rgb(255, 255, 255);"><br style="margin: 0px; padding: 0px;"/></span><span style="margin: 0px; padding: 0px; border: 0px; font-family: &#39;Microsoft YaHei&#39;; line-height: 26px; vertical-align: baseline; word-break: break-all; background-color: rgb(255, 255, 255);"><br style="margin: 0px; padding: 0px;"/></span><span style="margin: 0px; padding: 0px; border: 0px; font-family: &#39;Microsoft YaHei&#39;; font-weight: bold; line-height: 26px; font-size: 18px; vertical-align: baseline; word-break: break-all; background-color: rgb(255, 255, 255); color: rgb(240, 52, 66);">▷爱心淘集市，陪孩子过个不一样的五一</span><span style="margin: 0px; padding: 0px; border: 0px; font-family: &#39;Microsoft YaHei&#39;; line-height: 26px; vertical-align: baseline; word-break: break-all; background-color: rgb(255, 255, 255);"></span><span style="margin: 0px; padding: 0px; border: 0px; font-family: &#39;Microsoft YaHei&#39;; line-height: 26px; vertical-align: baseline; word-break: break-all; background-color: rgb(255, 255, 255);"><p>
        <img src="http://img2.hudongba.cn/upload/_cos/userarticleimg/201504/27/01430119254181_article0.png" suffix_360="fbad2e02d418f5e0103c7c486e7d9fa1" suffix_src="http://img2.hudongba.cn/upload/_cos/userarticleimg/201504/27/01430119254181_article0.png" style="margin: 0px; padding: 0px; border: none; font-family: inherit; font-style: inherit; font-variant: inherit; font-weight: inherit; line-height: inherit; vertical-align: top; max-width: 100%; display: inline;"/>
    </p></span><span style="margin: 0px; padding: 0px; border: 0px; font-family: &#39;Microsoft YaHei&#39;; font-weight: bold; line-height: 26px; vertical-align: baseline; word-break: break-all; background-color: rgb(255, 255, 255); color: rgb(240, 52, 66);">活动时间：</span><span style="margin: 0px; padding: 0px; border: 0px; font-family: &#39;Microsoft YaHei&#39;; line-height: 26px; vertical-align: baseline; word-break: break-all; background-color: rgb(255, 255, 255);">5月1日</span><span style="margin: 0px; padding: 0px; border: 0px; font-family: &#39;Microsoft YaHei&#39;; line-height: 26px; vertical-align: baseline; word-break: break-all; background-color: rgb(255, 255, 255);"><br style="margin: 0px; padding: 0px;"/></span><span style="margin: 0px; padding: 0px; border: 0px; font-family: &#39;Microsoft YaHei&#39;; font-weight: bold; line-height: 26px; vertical-align: baseline; word-break: break-all; background-color: rgb(255, 255, 255); color: rgb(240, 52, 66);">活动地点：</span><span style="margin: 0px; padding: 0px; border: 0px; font-family: &#39;Microsoft YaHei&#39;; line-height: 26px; vertical-align: baseline; word-break: break-all; background-color: rgb(255, 255, 255);">江苏盐城</span><span style="margin: 0px; padding: 0px; border: 0px; font-family: &#39;Microsoft YaHei&#39;; line-height: 26px; vertical-align: baseline; word-break: break-all; background-color: rgb(255, 255, 255);"><br style="margin: 0px; padding: 0px;"/></span><span style="margin: 0px; padding: 0px; border: 0px; font-family: &#39;Microsoft YaHei&#39;; font-weight: bold; line-height: 26px; vertical-align: baseline; word-break: break-all; background-color: rgb(255, 255, 255); color: rgb(240, 52, 66);">推荐理由：</span><span style="margin: 0px; padding: 0px; border: 0px; font-family: &#39;Microsoft YaHei&#39;; line-height: 26px; vertical-align: baseline; word-break: break-all; background-color: rgb(255, 255, 255);">“爱心淘集市”陪孩子过一个不一样的五一，倡导环保低碳生活，避免物品闲置或丢弃，还可以提高孩子的独立和沟通交流能力，从小培养孩子的爱心与耐心，让孩子看到自己努力的价值，创造孩子积极开朗的个性，给孩子一个积极向上的欢乐童年记忆。<a class="dt_hdb_support" href="http://www.hudongba.mobi/party/9kz6" style="margin: 0px; padding: 0px; border: 0px; font-family: inherit; font-style: inherit; font-variant: inherit; font-weight: inherit; line-height: inherit; vertical-align: baseline; color: rgb(73, 183, 232); background-color: transparent; text-decoration: none; cursor: pointer;">http://www.hudongba.mobi/party/9kz6</a></span><span style="margin: 0px; padding: 0px; border: 0px; font-family: &#39;Microsoft YaHei&#39;; line-height: 26px; vertical-align: baseline; word-break: break-all; background-color: rgb(255, 255, 255);"><br style="margin: 0px; padding: 0px;"/></span><span style="margin: 0px; padding: 0px; border: 0px; font-family: &#39;Microsoft YaHei&#39;; line-height: 26px; vertical-align: baseline; word-break: break-all; background-color: rgb(255, 255, 255);"><br style="margin: 0px; padding: 0px;"/></span><span style="margin: 0px; padding: 0px; border: 0px; font-family: &#39;Microsoft YaHei&#39;; font-weight: bold; line-height: 26px; font-size: 18px; vertical-align: baseline; word-break: break-all; background-color: rgb(255, 255, 255); color: rgb(240, 52, 66);">▷徒步中坡毅行亲子游</span><span style="margin: 0px; padding: 0px; border: 0px; font-family: &#39;Microsoft YaHei&#39;; line-height: 26px; vertical-align: baseline; word-break: break-all; background-color: rgb(255, 255, 255);"></span><span style="margin: 0px; padding: 0px; border: 0px; font-family: &#39;Microsoft YaHei&#39;; line-height: 26px; vertical-align: baseline; word-break: break-all; background-color: rgb(255, 255, 255);"><p>
        <img src="http://img2.hudongba.cn/upload/_cos/userarticleimg/201504/27/61430119342231_article6.png" suffix_360="c7f04d54b1a85be67309eef788c738f6" suffix_src="http://img2.hudongba.cn/upload/_cos/userarticleimg/201504/27/61430119342231_article6.png" style="margin: 0px; padding: 0px; border: none; font-family: inherit; font-style: inherit; font-variant: inherit; font-weight: inherit; line-height: inherit; vertical-align: top; max-width: 100%; display: inline;"/>
    </p></span><span style="margin: 0px; padding: 0px; border: 0px; font-family: &#39;Microsoft YaHei&#39;; font-weight: bold; line-height: 26px; vertical-align: baseline; word-break: break-all; background-color: rgb(255, 255, 255); color: rgb(240, 52, 66);">活动时间：</span><span style="margin: 0px; padding: 0px; border: 0px; font-family: &#39;Microsoft YaHei&#39;; line-height: 26px; vertical-align: baseline; word-break: break-all; background-color: rgb(255, 255, 255);">5月2日</span><span style="margin: 0px; padding: 0px; border: 0px; font-family: &#39;Microsoft YaHei&#39;; line-height: 26px; vertical-align: baseline; word-break: break-all; background-color: rgb(255, 255, 255);"><br style="margin: 0px; padding: 0px;"/></span><span style="margin: 0px; padding: 0px; border: 0px; font-family: &#39;Microsoft YaHei&#39;; font-weight: bold; line-height: 26px; vertical-align: baseline; word-break: break-all; background-color: rgb(255, 255, 255); color: rgb(240, 52, 66);">活动地点：</span><span style="margin: 0px; padding: 0px; border: 0px; font-family: &#39;Microsoft YaHei&#39;; line-height: 26px; vertical-align: baseline; word-break: break-all; background-color: rgb(255, 255, 255);">湖南怀化</span><span style="margin: 0px; padding: 0px; border: 0px; font-family: &#39;Microsoft YaHei&#39;; line-height: 26px; vertical-align: baseline; word-break: break-all; background-color: rgb(255, 255, 255);"><br style="margin: 0px; padding: 0px;"/></span><span style="margin: 0px; padding: 0px; border: 0px; font-family: &#39;Microsoft YaHei&#39;; font-weight: bold; line-height: 26px; vertical-align: baseline; word-break: break-all; background-color: rgb(255, 255, 255); color: rgb(240, 52, 66);">推荐理由：</span><span style="margin: 0px; padding: 0px; border: 0px; font-family: &#39;Microsoft YaHei&#39;; line-height: 26px; vertical-align: baseline; word-break: break-all; background-color: rgb(255, 255, 255);">在这十几公里的路上，孩子们会品尝到欢乐、痛苦、甚至是眼泪，真正能走完的孩子们越来越多，收获也会越来越多，完成这一样场毅行的孩子肯定是很坚强的，能完成这样一场毅行的孩子肯定能获得成长。毅行徒步增添亲子间的趣味，更加融洽亲子关系，同时增进家长对孩子的沟通及教育，让您的孩子在本次活动中获得“体验，快乐，收获，及情感的交流”。</span><span style="margin: 0px; padding: 0px; border: 0px; font-family: &#39;Microsoft YaHei&#39;; line-height: 26px; vertical-align: baseline; word-break: break-all; background-color: rgb(255, 255, 255);"><br style="margin: 0px; padding: 0px;"/></span><span style="margin: 0px; padding: 0px; border: 0px; font-family: &#39;Microsoft YaHei&#39;; line-height: 26px; vertical-align: baseline; word-break: break-all; background-color: rgb(255, 255, 255);"><a class="dt_hdb_support" href="http://www.hudongba.mobi/party/6l6o" style="margin: 0px; padding: 0px; border: 0px; font-family: inherit; font-style: inherit; font-variant: inherit; font-weight: inherit; line-height: inherit; vertical-align: baseline; color: rgb(73, 183, 232); background-color: transparent; text-decoration: none; cursor: pointer;">http://www.hudongba.mobi/party/6l6o</a></span><span style="margin: 0px; padding: 0px; border: 0px; font-family: &#39;Microsoft YaHei&#39;; line-height: 26px; vertical-align: baseline; word-break: break-all; background-color: rgb(255, 255, 255);"><p>
        <img src="http://img2.hudongba.cn/upload/_cos/userarticleimg/201504/28/91430219929907_article9.jpg" suffix_360="c797179b554a90f8606cab14408ee061" suffix_src="http://img2.hudongba.cn/upload/_cos/userarticleimg/201504/28/91430219929907_article9.jpg" style="margin: 0px; padding: 0px; border: none; font-family: inherit; font-style: inherit; font-variant: inherit; font-weight: inherit; line-height: inherit; vertical-align: top; max-width: 100%; display: inline;"/>
    </p></span>
</p>
<p></p>	
		<div class="i-like">
			<div class="i-like-left">
				<span class="share-num"><a href="#">分享&nbsp12000+</a></span>	
				
			</div>
			<div class="i-like-right">
				<p class="i-like-img"><img src="../frozenui/1.2.1/img/dt_like_yes.png"></p>
				<p class="i-like-num">&nbsp;赞(<span>1</span>)</p>
			</div>
			<div class="clear"></div>
		</div>
		</div>
		<div class="personal-center">
			<div class="pc-left">
				<div class="my-avator">
					<img src="../frozenui/1.2.1/img/face_default.png">
				</div>
				<div class="my-box">
					<div class="my-name">龙猫猫的乐享</div>
					<div class="my-money">我已经收益100元</div>
				</div>
				
			</div>
			<div class="pc-right">
				<a href="">个人中心</a>
			</div>
			<div class="clear"></div>
		</div>
		<div class="recommend">
			<p class="fl">精品推荐</p>
			<p class="fr">更多精彩</p>
			<div class="clear"></div>
		</div>
		<ul class="recommend-list">
			<li>
				<div class="list-icon">
				</div>
				<div class="list-title">帮主5城路演-跨境电商创业速成(免费)</div>
				<div class="list-read">1800阅读</div>
				<div class="clear"></div>
			</li>
			<div class="clear"></div>
		</ul>
		<div class="bottom-banner">
			<img src="../frozenui/1.2.1/img/ba_Zi2.png">
		</div>
		<div class="bottom-box">
			<div class="bottom-menu">
				<div class="self-menu">
					<a href="" class="get-new">领取新任务</a>
					<a href="javascript:void(0)" class="share-friend ">分享好友</a>
				</div>
				<!-- <div class="other-menu">
					<a href="" class="get-start">轻轻松松赚钱</a>
					<a href="javascript:void(0)" class="share-friend ui-btn ui-btn-primary">开始赚钱</a>
				</div> -->
			</div>
		</div>
		<a class="fanUp"  href="javascript:void(0);" ontouchstart="">
			<img src="http://img1.hudongba.cn/images3/detail/up.png">
		</a>
	</div>
	<script src="http://static.hudongba.cn/static3/jquery-1.9.1_01.min.js"></script>
	<script type="text/javascript">

	var _scroollTop={
	    _top:function(id,delay,move){
	        setTimeout(function(){
	            var scroll_offset = $(id).offset();
	            $("body,html").animate({
	                scrollTop:scroll_offset.top
	            },move);
	        },delay);
	    }
	};
	/*返回顶部*/
	var _backTop = function(){
	    $(".fanUp").click(function(){
	        _scroollTop._top(".detail-content",500,500);
	    });
	    window.onscroll=function(){
	        if(document.documentElement.scrollTop > 200 || document.body.scrollTop > 200) {
	            $(".fanUp").fadeIn(500);
	        }
	        else {
	            $(".fanUp").fadeOut(500);
	        }
	    };
	};
	$(document).ready(function(){
		_backTop();
	});
	</script>
</body>
</html>