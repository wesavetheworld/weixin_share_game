define(function(require, exports, module) {
    var $ = require('./fx');
    var flag =true;
    module.exports ={
        days: [],
        bind: function (days,callback) {
            //点击事件
            var that = this;
            if(!flag) return;
                flag = false;
                that.setDay(300,0,1000,100,0);
        },

        setDay : function(t,index,day0,day1,baseday) {
            var that = this;
            // $('.pop-box').css('opacity','1');
            // $('.pop-box-cnt').addClass('animated bounceIn');
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
