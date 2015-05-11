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
	<title>我的资料</title>
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
	.profile-container{
		width: 100%;
		max-width: 780px;
		margin: 0px auto;
	}
	.pro-menu-action{
		font-size: 16px;
		width: 93%;
		color: black!important;
		/*font-weight: 600;*/
		height: 28px;
		line-height: 28px;
		padding: 9px;
		display: block;
		overflow: hidden;
		padding-right: 10px;
		background: url(/resources/frozenui/1.2.1/img/area_arrow.png) no-repeat right;
		background-size: 13px;
	}
	.pro-menu-action:hover{
		background:rgb(235,235,235);
	}
	.pro-menu-box0,.pro-menu-box1{
		background-color: #ffffff;
		width: 100%;
	}
	.pro-menu-box1{
		margin-top: 15px;
	}
	.profile-box .hr{
		width:100%;
		height: 1px;
		/*border-bottom: 1px solid #e0e0e0;*/
	}
	.profile-box input{
		color:rgb(189, 177, 177)!important;
		text-align: right!important;

	}
	.profile-box label{
		color:black!important;
	}
	.myavatar-l{
		float: left;
		font-size: 16px;
		line-height: 60px;
		padding-left: 15px;
		padding-top: 8px;
		color: black;
	}
	.myavatar-r{
		float: right;
		padding-top: 8px;
	}
	.myavatar-r img{
		width: 60px;
		border-radius: 6px;
		margin-right: 30px;
	}
	.pro-menu-box0{
		margin-top: 15px;
	}
	.save-profile{
		width: 80%;
		margin:15px auto;
	}
	.save-profile-btn{
		display: block;
		text-align: center;
		margin:9px 15px;
		font-size: 16px;
		border-radius: 8px;
		height: 40px;
		background-color: rgb(244,164,33);
		color: #FFF;
		line-height: 40px;	
	}
	.set-pass,.do-change-pass{
		background-color: #ffffff;
		width: 100%;
		margin-top: 15px;
	}
	.clear{
		clear: both;
	}
	</style>
</head>
<body ontouchstart="">
	<div class="profile-container">
	<div class="profile-box">
		<div class="pro-menu-box0">
		<a href="javascript:;" class=" my-avatar" >
			<div class="myavatar-l">头像</div>
			<div class="myavatar-r">
				<img src="<?=$users['headimgurl']?>">
			</div>
			<div class="clear"></div>
		</a>
		<div class="hr ui-border-b"></div>
		<a href="javascript:;" class=" my-avatar" >
			<div class="ui-form ">
			    <form action="#" >
			        <div class="ui-form-item ui-form-item-show ui-form-item-link ">
			            <label for="#">昵称</label>
			            <input type="text" value="<?=$users['u_name']?>" readonly>
			        </div>
			    </form>
			</div>

		</a>
		<div class="hr ui-border-b"></div>
		<a href="javascript:;" class=" my-avatar" >
			<div class="ui-form ">
						    <form action="#" >
						        <div class="ui-form-item ui-form-item-show ui-form-item-link ">
						            <label for="#">手机号</label>
						            <input type="text" placeholder="11位身手机号码" readonly>
						        </div>
						    </form>
			</div>
		</a>
		<div class="hr ui-border-b"></div>
		<a href="javascript:;" class=" my-avatar" >
			<div class="ui-form ">
			    <form action="#" >
			        <div class="ui-form-item ui-form-item-show ui-form-item-link ">
			            <label for="#">邮箱</label>
			            <input type="text" value="" >
			        </div>
			    </form>
			</div>
		</a>
		</div>
		<!-- <div class="pro-menu-box1">
		<a href="javascript:;"  >
			<div class="ui-form ui-border-t">
			    <form action="#" >
			        <div class="ui-form-item ui-form-item-show ui-form-item-link ui-border-b">
			            <label for="#">修改密码</label>
			            <input type="text"  readonly>
			        </div>
			    </form>
			</div>
		</a>
		</div> -->
		<!-- <div class="save-profile">
			<a href="javascript:void(0)" id="save-profile" class="save-profile-btn">保存</a>
		</div> -->
	</div>	
	</div>
	<!-- <div class="change-pass-box">
	<div class="set-pass-wrap">
		<div class="set-pass">
			<div class="ui-form ui-border-t">
			    <form action="#" >
			        <div class="ui-form-item ui-form-item-pure ui-border-b">
			            <input type="text" placeholder="输入密码">
			            <a href="#" class="ui-icon-close"></a>
			        </div>
			        <div class="ui-form-item ui-form-item-pure ui-border-b">
			            <input type="password" placeholder="重复密码">
			            <a href="#" class="ui-icon-close"></a>
			        </div>
			    </form>
			</div>
			
		</div>
		<div class="save-profile">
			<a href="javascript:void(0)" id="save-profile" class="save-profile-btn">保存</a>
		</div>
	</div>
		<div class="do-change-wrap">
		<div class="do-change-pass">
			<div class="ui-form ui-border-t">
			    <form action="#" >
			    <div class="ui-form-item ui-form-item-pure ui-border-b">
			            <input type="text" placeholder="输入旧密码">
			            <a href="#" class="ui-icon-close"></a>
			        </div>
			        <div class="ui-form-item ui-form-item-pure ui-border-b">
			            <input type="text" placeholder="输入新密码">
			            <a href="#" class="ui-icon-close"></a>
			        </div>
			        <div class="ui-form-item ui-form-item-pure ui-border-b">
			            <input type="password" placeholder="重复新密码">
			            <a href="#" class="ui-icon-close"></a>
			        </div>
			    </form>
			</div>
			
		</div>
		<div class="save-profile">
			<a href="javascript:void(0)" id="save-profile" class="save-profile-btn">保存</a>
		</div>
		</div>
	</div> -->
	
</body>
</html>