define(function(require, exports, module) {
    var $ = require('./fx');
    var r = 542, offsetX = 20, x = [30,122,214,292], y =[0,0,0,0], flag = true,
        width = document.documentElement.clientWidth,
        scale = (width/320).toString().substring(0, 6),popSpace = $('.pop-box').width()/2+7,
        currentIndex = $('.vip-icon-list').data('index');
    module.exports ={
        days: [],
        init: function (days,isLight) {
            this.days = days;
            $('.mod-speed-box').css('height',  Math.round(130 * scale) + 142 + 115 + 'px');
            $('.line').css({
                'width': Math.round(r*2*scale) +'px',
                'height': Math.round(r*2*scale) +'px',
                'left' :  Math.round(-(offsetX+r)*scale) +'px'
            });
            for(var i = 0; i<4;i++){
                y[i] = this.getY(x[i]);
                $('.vip-icon-list li').eq(i).css({
                    'left': x[i]*scale - $('.vip-icon-list li').width()/2 + 'px',
                    'bottom': y[i]*scale - $('.vip-icon-list li').height() + $('.vip-icon-list li i').width()/2 + 'px'
                });
                $('#day p').text(days[currentIndex]); 
                if(currentIndex==i){
                    this.loc(x[i],y[i]);
                    $('.pop-info').css('-webkit-transform','translate3d(0,' + - Math.round(y[i]*scale) + 'px,0)');
                    $('.pop-info-cnt').css('-webkit-transform','translate3d(' +  Math.round(x[i]*scale) + 'px,0,0)');
                }
            }
            $('.vip-icon-list').css('opacity','1');
            $('.pop-box-cnt').addClass('animated bounceIn');
            if(currentIndex < 3&&isLight){
                setTimeout(function() {
                    $('.vip-icon-list li').eq(currentIndex+1).addClass('animateZoom');
                    $('.pop-box-cnt').removeClass('animated bounceIn');
                }, 600);
            }
        },

        bind: function (days,callback) {
            //点击事件
            var that = this;
            $('.vip-icon-list li').tap(function(e) {
                //动画完了才能再点
                if(!flag) return;
                flag = false;
                var index = $(this).index(),day0 = days[currentIndex],day1 = days[index];
                if(currentIndex == index) return;
                $('.vip-icon-list li').eq(currentIndex+1).removeClass('animateZoom');
                $('.pop-box').css('opacity','0');
                that.popMove(currentIndex,index,500,function(){
                    that.setDay(300,index,day0,day1,days[0]);
                });
                $('.vip-icon-list').data('index',index);
                var trend = true; //默认是向上
                if(currentIndex>index)
                    trend = false;
                currentIndex = index;
                callback($(this),trend);
            });
        },

        getY : function (x) {
            return r - (Math.sqrt(Math.pow(r,2) - Math.pow(offsetX + x,2)));
        },

        popMove : function (currentIndex,index,t,callback) {
            var x0 = Math.round(x[index]*scale),
            y0 = - Math.round(y[index]*scale);
            var cubic = 'cubic-bezier(.45,.55,.45,.55)';
            switch(index - currentIndex)
            {
            case -1:
              cubic = 'cubic-bezier(.45,.55,.45,.55)';  
              break;
            case -2:
              cubic = 'cubic-bezier(.4,.6,.4,.6)';
              break;
            case -3:
              cubic = 'cubic-bezier(.36,.64,.36,.64)';
              break;
            case 1:
              cubic = 'cubic-bezier(.55,.45,.55,.45)';  
              break;
            case 2:
              cubic = 'cubic-bezier(.6,.4,.6,.4)';
              break;
            case 3:
              cubic = 'cubic-bezier(.64,.36,.64,.36)';
              break;
            default:
              break;
            }
            $('.pop-info').animate({translate3d: '0,' + y0 + 'px,0'},t,cubic,callback);
            $('.pop-info-cnt').animate({translate3d: x0 + 'px,0,0'},t,'linear');
        },
        loc: function( x, y){
            //浮层的定位
            if(popSpace > x*scale || popSpace > width - x*scale){
                var left;
                if(popSpace > x*scale){
                    left = popSpace - x*scale;
                }else{
                    left = width - popSpace - x*scale;
                }
                $('.pop-box').css('-webkit-transform','translate(' + left + 'px,0)');
            }else{
                $('.pop-box').css('-webkit-transform','translate3d(0,0,0)');
            }
            if(currentIndex == 0){
                $('.pop-box .arrow').css({'left':'27px','top':'92px'});
            }else if(currentIndex == 3){
                $('.pop-box .arrow').css({'left':'96px','top':'92px'});
            }else{
                $('.pop-box .arrow').css({'left':'50%','top':'92px'});
            }
        },
        setDay : function(t,index,day0,day1,baseday) {
            var that = this;
            $('.pop-box').css('opacity','1');
            $('.pop-box-cnt').addClass('animated bounceIn');
            // that.loc(x[index],y[index]);
            var diff = Math.abs(day1 - day0);
            var mult = 1;
            if(diff > 150){
                mult = 3;
            }else if(diff > 100){
                mult = 2;
            }
            var t2 = 100*diff/mult + 100;
            if(diff < 5){
                t2 = t2 * 2;
            }
            if(day1 > day0){
                for(var i = 1;i < diff/mult;i ++){
                    $("#day div").append('<p>'+ (day0 + i*mult) + '</p>');
                }
            }
            else if(day1 < day0){
                for(var i = 1;i < diff/mult;i ++){
                    $("#day div").append('<p>'+ (day0 - i*mult) + '</p>');
                }
            }
            $("#day div").append('<p>'+ day1 + '</p>');
            $("#day div").animate({
                    translate3d: '0,' + -20 * Math.ceil(diff/mult) + 'px,0'
                },t2,'linear',function(){
                    flag = true;
                    $('.pop-box-cnt').removeClass('animated bounceIn');
                    $("#day div").attr('style','');
                    $("#day").html('<div><p>' + day1 + '</p></div>');
            },t + 100);
        }

    }
});
