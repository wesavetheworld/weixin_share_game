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
	<title>文章详情</title>
	<link rel="stylesheet" type="text/css" href="/resources/frozenui/1.2.1/css/frozen.css">
	<link rel="stylesheet" type="text/css" href="/resources/frozenui/1.2.1/css/global.css">
	<link rel="stylesheet" type="text/css" href="/resources/frozenui/1.2.1/css/animate.css">
	
	<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<!-- 	// <script src="http://api.map.baidu.com/components?ak=V3uP6shwN37QW70gPZGCsfGy&v=1.0"></script> -->
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
		max-width: 780px;
		margin: 0px auto;
	}

	.detail-container{
		max-width: 100%;
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
		background: url(/resources/frozenui/1.2.1/img/rightcc2x.png) no-repeat;
		background: url(/resources/frozenui/1.2.1/img/rightcc1x.png) no-repeat\9;
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
		max-width: 100px;
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
	
	.detail-content{
		padding: 15px;
	}
	.i-like{
		padding: 10px 15px;
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
		background: url(/resources/frozenui/1.2.1/img/dt_more.png) no-repeat right 5px;
		background: url(/resources/frozenui/1.2.1/img/dt_more_2.png) no-repeat right\9;
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
		background : url(/resources/frozenui/1.2.1/img/vote2x.png) no-repeat;
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
		  background: url(/resources/frozenui/1.2.1/img/icon-addhd.png) no-repeat 5px center;
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

	.detail-content img,.detail-content p,.detail-content div,.detail-content span,.detail-content section{
		max-width: 100%!important;
		overflow: hidden!important;
	}
	.share-img-box{
		display: none;
		 position: fixed;
    	text-align: right;
    	background: rgba(0,0,0,.8);
    	width: 100%;
    	height: 100%;
    	z-index: 100;
    	display: none;
	}
	.share-img-box img{
		width:90%;
	}
	</style>
</head>
<body ontouchstart="">
	<div class="share-img-box">
		<img src="/resources/frozenui/1.2.1/img/share-bg.png">
	</div>
	<div class="detail-container">
		<div class="top-banner">
			<div class="tb-left">随时随地转发，轻轻松松赚钱！</div>
			<div class="tb-right"><a href="/index.php">我也参加</a></div>
			<div class="clear"></div>
		</div>
		<div class="detail-title">
		<!-- 当别人说你胖时，什么神回复最给力？ -->
		<?=$article['ar_title']?>
		</div>
		<div class="author-box">
			<div class="ab-left">
				<div class="author-avatar">
					<img src="<?=$article['ar_author_pic']?>">
				</div>
				<div class="author-name-box">
					<span class="author-name">
					<!-- 三果儿网络科技 -->
					<?=$article['ar_author']?>
					</span>
					<span class="publish-time">
					<!-- 4月29日 -->
					<?=$article['time']?>
					</span>
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
			<?=$article['ar_content']?>
		</div>
		<div class="i-like">
			<div class="i-like-left">
				<span class="share-num"><a href="#">分享&nbsp12000+</a></span>	
				
			</div>
			<div class="i-like-right">
				<!-- <p class="i-like-img"><img src="/resources/frozenui/1.2.1/img/dt_like_yes.png"></p>
				<p class="i-like-num">&nbsp;赞(<span>1</span>)</p> -->
			</div>
			<div class="clear"></div>
		</div>
		<!-- <div class="personal-center">
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
				<a href="/index.php/share/personal_center?o='<?=$o;?>'">个人中心</a>
			</div>
			<div class="clear"></div>
		</div> -->
		<!-- <div class="recommend">
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
		</ul> -->
		<div class="bottom-banner">
			<img src="/resources/frozenui/1.2.1/img/ba_Zi2.png">
		</div>
		<div class="bottom-box">
			<div class="bottom-menu">
				<?php
				if ($is_get=='yes') {
					echo'<div class="self-menu">
					<a href="javascript:;" class="get-new">已收益'.$profit.'元</a>
					<a href="javascript:void(0)" class="share-friend ">分享好友</a>
					</div>';
				}else{
					echo '<div class="other-menu">
						<a href="/index.php/share/article_center/" class="get-new" style="background-img:none;">轻轻松松赚钱</a>
						<a href="/index.php/share/article_center/" class="share-friend ">我也要赚钱</a>
						</div>';	
				}
				
				?>
			</div>
		</div>
		<a class="fanUp"  href="javascript:void(0);" ontouchstart="">
			<img src="http://img1.hudongba.cn/images3/detail/up.png">
		</a>
	</div>
	<script type="text/javascript" src="http://182.92.218.16/wv/resources/js/jquery.min.js"></script>
	<script type="text/javascript">
	    //动态自定义分享内容
	    //获取浏览器版本
	    function get_broswer_info(){
	    var ua = navigator.userAgent.toLowerCase();
	    if(ua.match(/weibo/i) == "weibo"){
	      return 1;
	    }else if(ua.indexOf('qq/')!= -1){
	      return 2;
	    }else if(ua.match(/MicroMessenger/i)=="micromessenger"){
	      var v_weixin = ua.split('micromessenger')[1];
	      v_weixin = v_weixin.substring(1,6);
	      v_weixin = v_weixin.split(' ')[0];
	      if(v_weixin.split('.').length == 2){
	        v_weixin = v_weixin + '.0';
	      }
	      if(v_weixin < '6.0.2'){
	        return 3;
	      }else{
	        return 4;
	      }
	    }else{
	      return 0;
	    }
	  }
	  //重置微信自定义分享
	  function reset_weixin_share(){
	    wx.ready(function () {  
	      wx.onMenuShareTimeline({ // 分享到朋友圈
	        title: window.ShareData.TimelineTitle, // 分享标题
	        link: window.ShareData.link, // 分享链接
	        imgUrl: window.ShareData.img, // 分享图标
	        success: function () { 
	          // 用户确认分享后执行的回调函数
	          window.ShareData.TimelineSuccess();
	        },
	        cancel: function () { 
	          // 用户取消分享后执行的回调函数
	        }
	      });
	      
	      wx.onMenuShareAppMessage({ // 分享给朋友
	        title: window.ShareData.FriendTitle, // 分享标题
	        desc: window.ShareData.FriendDesc, // 分享描述
	        link: window.ShareData.link, // 分享链接
	        imgUrl: window.ShareData.img, // 分享图标
	        type: '', // 分享类型,music、video或link，不填默认为link
	        dataUrl: '', // 如果type是music或video，则要提供数据链接，默认为空
	        success: function () { 
	          // 用户确认分享后执行的回调函数
	          window.ShareData.NormalSuccess();
	        },
	        cancel: function () { 
	          // 用户取消分享后执行的回调函数
	        }
	      });
	      
	      wx.onMenuShareQQ({ // 分享到QQ
	        title: window.ShareData.QQTitle, // 分享标题
	        desc: window.ShareData.QQDesc, // 分享描述
	        link: window.ShareData.link, // 分享链接
	        imgUrl: window.ShareData.img, // 分享图标
	        success: function () { 
	           // 用户确认分享后执行的回调函数
	           window.ShareData.NormalSuccess();
	        },
	        cancel: function () { 
	           // 用户取消分享后执行的回调函数
	        }
	      });
	      
	      wx.onMenuShareWeibo({ // 分享到腾讯微博
	        title: window.ShareData.WeiboTitle, // 分享标题
	        desc: window.ShareData.WeiboDesc, // 分享描述
	        link: window.ShareData.link, // 分享链接
	        imgUrl: window.ShareData.img, // 分享图标
	        success: function () { 
	           // 用户确认分享后执行的回调函数
	           window.ShareData.NormalSuccess();
	        },
	        cancel: function () { 
	          // 用户取消分享后执行的回调函数
	        }
	      });
	      
	      // wx.hideOptionMenu(); // 隐藏右上角菜单接口
	      
	      wx.showOptionMenu(); // 显示右上角菜单接口
	    });
	  }
	  //配置验证，生成自定义内容
	  function set_weixin_share(){
	    if(broswer == 3){
	      function onBridgeReady(){
	        WeixinJSBridge.call('showOptionMenu');  // 显示右上角菜单
	        // WeixinJSBridge.call('hideOptionMenu'); // 隐藏右上角菜单
	      }

	      if (typeof WeixinJSBridge == "undefined"){
	        if( document.addEventListener ){
	          document.addEventListener('WeixinJSBridgeReady', onBridgeReady, false);
	        }else if (document.attachEvent){
	          document.attachEvent('WeixinJSBridgeReady', onBridgeReady); 
	          document.attachEvent('onWeixinJSBridgeReady', onBridgeReady);
	        }
	      }else{
	        onBridgeReady();
	      }

	      document.addEventListener('WeixinJSBridgeReady', function onBridgeReady() {
	        
	        WeixinJSBridge.on('menu:share:appmessage', function(argv) { // 分享给朋友
	          WeixinJSBridge.invoke('sendAppMessage', {
	            "img_url": window.ShareData.img,
	            "link": window.ShareData.link,
	            "desc": window.ShareData.FriendDesc,
	            "title": window.ShareData.FriendTitle
	          }, function(res) {
	            window.ShareData.NormalSuccess();
	          })
	        });

	        WeixinJSBridge.on('menu:share:timeline', function(argv) { // 分享到朋友圈
	          WeixinJSBridge.invoke('shareTimeline', {
	            "img_url": window.ShareData.img,
	            "link": window.ShareData.link,
	            "desc": window.ShareData.TimelineTitle,
	            "title": window.ShareData.TimelineTitle
	          }, function(res) {   
	            window.ShareData.TimelineSuccess();
	          });
	        });
	        
	        WeixinJSBridge.on('menu:share:weibo', function(argv) { // 分享到腾讯微博
	          WeixinJSBridge.invoke('shareWeibo', {
	            "content": window.ShareData.WeiboDesc,
	            "url": window.ShareData.link
	          }, function(res) {
	            window.ShareData.NormalSuccess();
	          });
	        });
	      }, false);
	    }else if(broswer == 4){
	      wx.config({
	        debug: true, // 开启调试模式,调用的所有api的返回值会在客户端alert出来，若要查看传入的参数，可以在pc端打开，参数信息会通过log打出，仅在pc端时才会打印。
	        appId: config_info.appId,// 必填，公众号的唯一标识
	        timestamp: config_info.timestamp,// 必填，生成签名的时间戳
	        nonceStr: config_info.nonceStr,// 必填，生成签名的随机串
	        signature: config_info.signature,// 必填，签名，见附录1
	        jsApiList: [
	        // 所有要调用的 API 都要加到这个列表中
	        'checkJsApi',
	      'onMenuShareTimeline',
	      'onMenuShareAppMessage',
	      'onMenuShareQQ',
	      'onMenuShareWeibo',
	      'hideMenuItems',
	      'showMenuItems',
	      'hideAllNonBaseMenuItem',
	      'showAllNonBaseMenuItem',
	      'translateVoice',
	      'startRecord',
	      'stopRecord',
	      'onRecordEnd',
	      'playVoice',
	      'pauseVoice',
	      'stopVoice',
	      'uploadVoice',
	      'downloadVoice',
	      'chooseImage',
	      'previewImage',
	      'uploadImage',
	      'downloadImage',
	      'getNetworkType',
	      'openLocation',
	      'getLocation',
	      'hideOptionMenu',
	      'showOptionMenu',
	      'closeWindow',
	      'scanQRCode',
	      'chooseWXPay',
	      'openProductSpecificView',
	      'addCard',
	      'chooseCard',
	      'openCard'
	      ]
	      });
	      
	      reset_weixin_share();
	    }
	  }

	  var broswer = get_broswer_info();

	  var config_info = {
	    appId: '<?php echo $signPackage["appId"];?>',// 必填，公众号的唯一标识
	    timestamp: '<?php echo $signPackage["timestamp"];?>',// 必填，生成签名的时间戳
	    nonceStr: '<?php echo $signPackage["nonceStr"];?>',// 必填，生成签名的随机串
	    signature: '<?php echo $signPackage["signature"];?>'// 必填，签名，见附录1
	  };

	  window.ShareData = {
	    link : window.location.href, // 链接地址
	    img : "<?=$article['ar_author_pic']?>", // 分享图标
	    TimelineTitle : "<?=$article['ar_title']?>", // 朋友圈标题
	    FriendTitle : "<?=$article['ar_title']?>", // 朋友标题
	    FriendDesc : "<?=$article['thumb']?>", // 朋友描述
	    QQTitle : "<?=$article['ar_title']?>", // QQ标题
	    QQDesc : "<?=$article['thumb']?>", // QQ描述
	    WeiboTitle : "<?=$article['ar_title']?>", // Weibo标题
	    WeiboDesc : "<?=$article['thumb']?>", // Weibo描述
	    TimelineSuccess : function(){ // 朋友圈分享成功
	      alert('朋友圈分享成功！');
	    },
	    NormalSuccess : function(){ // 其它分享成功
	      alert('其它分享成功！');
	    }
	  };
	  set_weixin_share();
	</script>

	<script type="text/javascript">
	function change_sharedata(_share_img, _share_title,_share_content){
	   window.ShareData.link= 'http://www.kejixi.com/worldventures/?part=home', // 链接地址'                     var rand_num = Math.floor(Math.random() * ( 1000 + 1));
	   window.ShareData.img=_share_img,                      
	  window.ShareData.TimelineTitle = _share_title; // 朋友圈标题
	  window.ShareData.FriendTitle = _share_title; // 朋友标题
	 window.ShareData.FriendDesc = _share_content; // 朋友描述
	 window.ShareData.QQTitle = _share_title; // QQ标题
	 window.ShareData.QQDesc = _share_content; // QQ描述
	 window.ShareData.WeiboTitle = _share_title; // Weibo标题
	 window.ShareData.WeiboDesc = _share_content; // Weibo描述
	 reset_weixin_share();
	}
	</script>
	<script src="http://static.hudongba.cn/static3/jquery-1.9.1_01.min.js"></script>
	<script type="text/javascript">
	// 	var lbsGeo = document.createElement('lbs-geo');
	// 	lbsGeo.addEventListener("geosuccess",function(evt){ //注册
	// 		var addr = evt.detail.coords;
	// 		var address = evt.detail.address;
	// 		var x = addr.lng;
	// 		var y = addr.lat;
	// 		if (<?=$is_get?>=='no') {
	// 			// 具体位置
	// 			alert("地址："+address);
	// 			// 横纵坐标
	// 			alert("地理坐标："+x+','+y);
	// 		};
			
	// 	});
	// </script>
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
		var document_height = $(document).height();
		$('.share-img-box').height(document_height);
		$('.share-friend').click(function(){
			$('.share-img-box').show();
		});
		$('.share-img-box').click(function(){
			$(this).hide();
		})
	});
	</script>
</body>
</html>