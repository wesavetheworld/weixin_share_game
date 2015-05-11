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
	<title><?=$users['u_name']?>邀请你加入好享赚！</title>
	<link rel="stylesheet" type="text/css" href="/resources/frozenui/1.2.1/css/frozen.css">
	<link rel="stylesheet" type="text/css" href="/resources/frozenui/1.2.1/css/global.css">
	<link rel="stylesheet" type="text/css" href="/resources/frozenui/1.2.1/css/animate.css">
	<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
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
	.share-container{
		width: 100%;
		max-width: 780px;
		margin: 0px auto;
	}
	.share-top-banner{
		width:55%; 
		padding-top: 20px;
		margin: 0px auto;
	}
	.share-top-banner img{
		width: 100%;
	}
	.share-top-box{
		width: 100%;
		background-color: rgb(238,87,17);
	}
	.share-top-btn{
		width: 130px;
		margin: 15px auto;
		background-color: rgb(235,235,235);
		border-radius: 4px;
		color: block;
	}
	.fl{
		float: left;
		width: 24px;
		height: 24px;
		padding: 10px;
		line-height: 24px;
	}
	.fl img{
		width: 100%;
	}
	.fr{
		float: right;
		font-size: 16px;
		height: 22px;
		margin: 2px 0px;
		padding: 9px 10px;
		line-height: 22px;
	}
	.share-top-tip{
		color: #ffffff;
		padding-bottom: 10px;
	}
	.inline{
		display: inline-block;
		margin-left: 8px;
	}
	.tip1,.tip2{
		padding: 5px 20px;
	}
	.tip2{
		margin-left: 8px;
	}
	.share-code{
		width: 150px;
		margin:20px auto;
	}
	.share-bottom-box h2{
		text-align: center;
		margin: 20px auto;
	}
	.share-code img{
		width: 100%;
	}
	.clear{
		clear:both;
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
	<div class="share-container">
		<div class="share-top-box">
			<div class="share-top-banner">
				<img src="/resources/frozenui/1.2.1/img/topbanerb.png">
			</div>
			<div class="share-top-btn">
					<div class="fl">
						<img src="/resources/frozenui/1.2.1/img/share.png">
					</div>
					<?php 
						if($is_self=='yes'){
							echo '<div class="fr ui-border-l share-friends">
									立即分享
								</div>';
						}else{
							echo '<a href='.$accept_invite_url.' class="fr ui-border-l " style="display:block;">
									立即体验
								  </a>';
						} 
					?>
						
					
					<div class="clear"></div>
			</div>
			<div class="share-top-tip">
				<div class="tip1">
					<div class="inline">邀请成功可得</div>
					<div class="inline" style="font-size:24px;">{</div>
					<div class="inline">
					<p>1元奖励</p>
					<p style="margin-top:3px;">小伙伴所有收益永久分成</p>
					</div>
				</div>
				<div class="tip2">
				1.分享此链接 -> 2.好友进入 = 成功邀请
				</div>
			</div>
		</div>
		<div class="share-bottom-box">
			<h2>您也可以让好友直接扫描</h2>
			<div class="share-code">
				<img id="lazy_img" data-url="<?=$code_url?>">
			</div>
		</div>
	</div>
	<script type="text/javascript" src="http://182.92.218.16/wv/resources/js/jquery.min.js"></script>
	<script type="text/javascript">
		$(function(){
			$('#lazy_img').attr('src',$('#lazy_img').data('url'));
		});
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
	    link : '<?=$share_url?>', // 链接地址
	    img : 'http://share.kejixi.com/resources/frozenui/1.2.1/img/topbaner.png', // 分享图标
	    TimelineTitle : "<?=$users['u_name']?>邀请你加入好享赚",// 朋友圈标题
	    FriendTitle : "<?=$users['u_name']?>邀请你加入好享赚", // 朋友标题
	    FriendDesc : '随时随地转发，轻轻松松赚钱！', // 朋友描述
	    QQTitle : "<?=$users['u_name']?>邀请你加入好享赚！", // QQ标题
	    QQDesc : '随时随地转发，轻轻松松赚钱！', // QQ描述
	    WeiboTitle :"<?=$users['u_name']?>邀请你加入好享赚！", // Weibo标题
	    WeiboDesc : '随时随地转发，轻轻松松赚钱！', // Weibo描述
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
	$(document).ready(function(){
		 reset_weixin_share();
		 var document_height = $(document).height();
		 $('.share-img-box').height(document_height);
		 $('.share-friends').click(function(){
		 	$('.share-img-box').show();
		 });
		 $('.share-img-box').click(function(){
		 	$(this).hide();
		 })
	})
	</script>
</body>
</html>