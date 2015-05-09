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
	<title>乐享</title>
	<link rel="stylesheet" type="text/css" href="../frozenui/1.2.1/css/frozen.css">
	<link rel="stylesheet" type="text/css" href="../frozenui/1.2.1/css/global.css">
	<link rel="stylesheet" type="text/css" href="../frozenui/1.2.1/css/animate.css">
	<style type="text/css">
	body{
		
		background-size:100%;
		background-image: url(../frozenui/1.2.1/img/banner2.jpg);
		background-repeat: no-repeat;
		color: #666;
		font: 300 14px/1.5 "Helvetica Neue","Marmelad","Lucida Grande",'Hiragino Sans GB',Georgia,"Microsoft YaHei", sans-serif;
	}
	.index-container{
		padding-top: 20px;
		/*background-image: url(../frozenui/1.2.1/img/banner2.jpg);
		background-repeat: no-repeat;*/
		max-width: 780px;
		margin: 0px auto;
	}
		
	.index-container .baner-pic img{
		width: 100%;
	}
	.baner-pic{
		width:55%;
		margin:0px auto;
	}
	.index-container h1{
		width:80%;
		text-align: center;
		margin:10px auto;
	}
	.index-container img{
		width:100%;
	}
	.index-container h4{
		color:#ffffff;
		width: 80%;
		font-size: 18px;
		padding-left: 8px;
		text-align: center;
		letter-spacing:2px;
		margin:20px auto;
	}
	.join-number{
		width: 60%;
		margin: 20px auto 20px auto;
	}
	.join-number img{
		width: 100%;
	}
	#start-share{
	width:160px;
	height: 50px;
	margin:20px auto;
	overflow: hidden;
	cursor: pointer;
	}
	#start-share a{
		display: block;
		width:160px;
	    height: 50px;
	}
	#start-share img{
		width: 100%;
	}
	.copy-right{
		color: #E6DADA;
		text-align: center;
		padding-top: 20px;
	}
	.rule{
		text-align: center;
		color:#D3E4EB;
	}
	/*.num{
		display: none;
	}*/
	</style>
</head>
<body ontouchstart="">
	<div class="index-container">
		<div class="baner-pic">
			<img src="../frozenui/1.2.1/img/banner1-1.png">
		</div>
		<h1><img src="../frozenui/1.2.1/img/banner1-2.png"></h1>
		<h4>随时随地转发，轻轻松松赚钱！</h4>
		<div class="join-number"><img src="../frozenui/1.2.1/img/banner3-1.png"><span class="num">100</span></div>
		<div id="day"><div></div></div>
		<div id="start-share">
			<a href=""><img src="../frozenui/1.2.1/img/tiyan1.png" id="start-share-img"></a>
		</div>
		<div class="rule"><a href="">活动规则</a></div>
		<div class="copy-right">
			<p>©乐享&nbsp2015</p>
			<p><a href="http://dwz.cn/HNVPN">三果儿科技</a>&nbsp版权所有</p>
		</div>
	</div>
    <script src="../frozenjs/lib/sea.js"></script>
    <script type="text/javascript">
 //     window.onload=function(){
 //     	document.getElementById('start-share').onmouseenter=function(){
 //    		document.getElementById('start-share-img').style.marginTop="-50px";
 //   	}; 
 //    	document.getElementById('start-share').onmouseleave=function(){
 //    		document.getElementById('start-share-img').style.marginTop="0px";
 //    };
 // }
    </script>
    <script type="text/javascript">
  // var  NumTo= function(el,to,step){
  //   var step=step?step:3;
  //   var nowStep=parseInt($(el).html());
  //   if(nowStep>to){
  //     step=-step;
  //   }
  //   console.log(step)
  //   var timmer = function(){
  //       setTimeout(function(){
  //           nowStep+=step;
  //           $(el).html(parseInt(nowStep));
  //           if(step<0){
  //             if( nowStep >= to){
  //               timmer();
  //             }else{
  //               $(el).append(to);
  //             }
  //           }else{
  //             if( nowStep <= to){
  //               timmer();
  //             }else{
  //               $(el).append(to);
  //               $(el).animate({
  //                   translate3d: '0,' + -20 * Math.ceil(1) + 'px,0'
  //               },100,'linear',function(){
  //                   $(el).html(to);
  //           }, 100);
  //             }
  //           }
           
  //       },30);
  //     }
  //     timmer();
  // }
</script>
<script type="text/javascript">
	// $("#start-share-img").tap(function(){
 //      	var myNum=$(".num");
 //      	var mymileage=parseInt(myNum.html());
 //        var allmileage=2000;
 //        NumTo(myNum,allmileage+mymileage,parseInt(mymileage/5));
 //    });
</script>
<script type="text/javascript">
    seajs.config({
        base: '../frozenjs/',
        charset: 'utf-8',
        debug: 0,
        alias: {
        	'zepto': 'frozen/zepto1',
        	'./fx':'frozen/fx'
        },
        paths: {'frozen': 'lib'},
        map: [
            [ '.js', '.js' ]
        ]
    });
    </script>
    <script type="text/javascript">
    // seajs.use("../frozenjs/lib/animatex1",function(Animatex) {
    //     //需要传的数据
    //     var days = [30,20,13,10];
    //     // Animatex.init(days,1);
    //     var callback = function(){}
    //     Animatex.bind(days,callback);
    // });
    </script>
</body>
</html>