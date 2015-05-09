<!DOCTYPE HTML>
<html>
<head>

    <meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
    <title>文章编辑器</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link href="http://share.kejixi.com/application/views/edit/themes/default/css/umeditor.css" type="text/css" rel="stylesheet">
    <script type="text/javascript" src="http://share.kejixi.com/application/views/edit/third-party/jquery.min.js"></script>
    <script type="text/javascript" charset="utf-8" src="http://share.kejixi.com/application/views/edit/umeditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="http://share.kejixi.com/application/views/edit/umeditor.min.js"></script>
    <script type="text/javascript" src="http://share.kejixi.com/application/views/edit/lang/zh-cn/zh-cn.js"></script>
    <style type="text/css">
        body{
            background-color: #ffffff;
            margin-bottom: 50px;
        }
        h1{     
            font-family: "微软雅黑";
            font-weight: normal;
        }
        .edit_img{
            float: left;
            width: 235px;
            margin-left: 4px;
            margin-top: 20px;
            font-size: 20px;
            margin-top: 50px;
        }
        .edit_img img{
            width: 100%;
            height: 270px;
            overflow: hidden;
        }
        .edit_img button{
            margin-left: 5px;
            float: left;
            margin-right: 10px;
        }
        .clear_shop_img{
             z-index: 9999;
            cursor: pointer;
            text-align: center;
            display: none;
            color: #f00;
            /*background-color: #ccc;*/
            padding: 2px;
            position: absolute;
        }
        .edit_img_name{
            margin-left: 5px;
            float: left;
            margin-right: 10px;
            margin-top: 5px;
            font-size: 30px;
            margin: 2px;
        }
        .btn {
            display: inline-block;
            *display: inline;
            padding: 4px 12px;
            margin-bottom: 0;
            *margin-left: .3em;
            font-size: 14px;
            line-height: 20px;
            color: #333333;
            text-align: center;
            text-shadow: 0 1px 1px rgba(255, 255, 255, 0.75);
            vertical-align: middle;
            cursor: pointer;
            background-color: #f5f5f5;
            *background-color: #e6e6e6;
            background-image: -moz-linear-gradient(top, #ffffff, #e6e6e6);
            background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#ffffff), to(#e6e6e6));
            background-image: -webkit-linear-gradient(top, #ffffff, #e6e6e6);
            background-image: -o-linear-gradient(top, #ffffff, #e6e6e6);
            background-image: linear-gradient(to bottom, #ffffff, #e6e6e6);
            background-repeat: repeat-x;
            border: 1px solid #cccccc;
            *border: 0;
            border-color: #e6e6e6 #e6e6e6 #bfbfbf;
            border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
            border-bottom-color: #b3b3b3;
            -webkit-border-radius: 4px;
            -moz-border-radius: 4px;
            border-radius: 4px;
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffffffff', endColorstr='#ffe6e6e6', GradientType=0);
            filter: progid:DXImageTransform.Microsoft.gradient(enabled=false);
            *zoom: 1;
            -webkit-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05);
            -moz-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05);
            box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05);
        }

        .btn:hover,
        .btn:focus,
        .btn:active,
        .btn.active,
        .btn.disabled,
        .btn[disabled] {
            color: #333333;
            background-color: #e6e6e6;
            *background-color: #d9d9d9;
        }

        .btn:active,
        .btn.active {
            background-color: #cccccc \9;
        }

        .btn:first-child {
            *margin-left: 0;
        }

        .btn:hover,
        .btn:focus {
            color: #333333;
            text-decoration: none;
            background-position: 0 -15px;
            -webkit-transition: background-position 0.1s linear;
            -moz-transition: background-position 0.1s linear;
            -o-transition: background-position 0.1s linear;
            transition: background-position 0.1s linear;
        }

        .btn:focus {
            outline: thin dotted #333;
            outline: 5px auto -webkit-focus-ring-color;
            outline-offset: -2px;
        }
        .main_pic{
            background-color: #21B24B;
            float: right;
            padding: 5px 13px;
            margin-right: 7px;
            cursor: pointer;
        }
        .btn.active,
        .btn:active {
            background-image: none;
            outline: 0;
            -webkit-box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.15), 0 1px 2px rgba(0, 0, 0, 0.05);
            -moz-box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.15), 0 1px 2px rgba(0, 0, 0, 0.05);
            box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.15), 0 1px 2px rgba(0, 0, 0, 0.05);
        }

        .btn.disabled,
        .btn[disabled] {
            cursor: default;
            background-image: none;
            opacity: 0.65;
            filter: alpha(opacity=65);
            -webkit-box-shadow: none;
            -moz-box-shadow: none;
            box-shadow: none;
        }

    </style>
</head>
<body>
    <?php
        if ($style == 0 ) {
            $title = '';
            $content = $article;
            $remark = '';
            $ar_author = '';
            $ar_author_pic = '';
            $total_limit = '';
            $one_limit = '';
        }else{
            foreach ($article as $key => $value) {
                $title = $value['ar_title'];
                $content = $value['ar_content'];
                $remark = $value['ar_remark'];
                $ar_author = $value['ar_author'];
                $ar_author_pic = $value['ar_author_pic'];
            }
            $total_limit = $limit['limit_total_price'];
            $one_limit = $limit['limit_person_price'];
        }
        // var_dump($ar_author_pic);
    ?>
    <div style="margin: 0 10px;">
        <span style="font-size: 28px;">标&nbsp&nbsp&nbsp&nbsp题:</span>
        <span><input style="width: 60%;font-size: 25px;" type="text" id="titel_id" value="<?=$title?>"></span>
    </div>
    <div style="margin: 0 10px;">
        <span style="font-size: 28px;">备&nbsp&nbsp&nbsp&nbsp注:</span>
        <span><input style="width: 60%;font-size: 25px;" type="text" id="remark_id" value="<?=$remark?>"></span>  
    </div>
    <div style="margin: 0 10px;">
        <span style="font-size: 28px;">作&nbsp&nbsp&nbsp&nbsp者:</span>
        <span><input style="width: 60%;font-size: 25px;" type="text" id="author_id" value="<?=$ar_author?>"></span>  
    </div>
    <div style="margin: 0 10px;">
        <span style="font-size: 28px;">总 金 额:</span>
        <span><input style="width: 60%;font-size: 25px;" type="text" id="total_limit" value="<?=$total_limit?>"></span>  
    </div>
    <div style="margin: 0 10px;">
        <span style="font-size: 28px;">个人金额:</span>
        <span><input style="width: 60%;font-size: 25px;" type="text" id="one_limit" value="<?=$one_limit?>"></span>  
    </div>

    <div id="shou_pic">
        <div id="altContent"></div>
        <a id="clear_up" class="button button-big color-red button-fill" style="width: 118px; display:none;">取消上传</a>
    </div>

    <div class="edit_img">
            <div id="logo_img" class="img">
                <!-- <div class="clear_shop_img">删除</div> -->
                <div class="clear_shop_img">
                    <a class="button button-big color-red button-fill"><i class="fa fa-remove right_fiv"></i>移除</a>
                </div>

                <img src="<?=$ar_author_pic?>">  
            </div>
            <div class="edit_img_name">LOGO：</div>
           
                <!-- <div class="main_pic" name="1">点击上传</div> -->
            <div class="main_pic" name="1">
                <i class="fa fa-image right_fiv"></i>上传
            </div>
            
    </div>
<div style="clear:both;"></div>
<!-- <h1>UMEDITOR 完整demo</h1> -->
<div style="text-align: left;margin: 10px 10px;">
<!--style给定宽度可以影响编辑器的最终宽度-->
<script type="text/plain" id="myEditor" style="width:100%;height:240px;text-align: left;margin: auto;">
    <p><?=$content?></p>
</script>
</div>
<div class="clear"></div>
<div id="btns" style="margin: 0 10px;">
    <table>
        <tr>
            <td>
                
                <button style="font-size: 25px;line-height: 45px;padding: 0 32px;" class="btn" onclick="get_cotent()">
                    <?php
                    if ($style > 0) {
                        echo "提交修改";
                    }else{
                        echo"添加";
                    }
                    ?>
                </button>
            </td>
        </tr>
    </table>
</div>
<table>
    
</table>

<div>
    <h3 id="focush2"></h3>
</div>
<script src="http://open.web.meitu.com/sources/xiuxiu.js" type="text/javascript"></script> <!-- 美图秀秀js -->
<script type="text/javascript">
    function get_cotent(){
        var style = <?php echo $style;?>;
        var title = $("#titel_id").val();
        var article = getContent();
        var remark = $("#remark_id").val();
        var logo=$("#logo_img").has('img').length;
        var author_id = $("#author_id").val();
        var one_limit = $("#one_limit").val();
        var total_limit = $("#total_limit").val();
        var src_logo = '';
        if (style>0) {
            src_logo=$("#logo_img").find("img").attr("src");
        }else{
            if (logo) {
                src_logo=$("#logo_img").find("img").attr('name');
            }else{
                src_logo='';
            }
        }
        

        
        // alert(article);
        $.ajax({
                // async: false,//这里必须取消异步处理，因为异步处理还未赋值
                url: "http://share.kejixi.com/index.php/admin/add_article",
                type: "post",
                dataType: "json",
                data: {
                    style:style,
                    title:title,
                    article:article,
                    remark:remark,
                    src_logo:src_logo,
                    author_id:author_id,
                    one_limit:one_limit,
                    total_limit:total_limit
                },  
                success: function(data){
                    // alert(data);
                    alert('操作成功');
                    // history.go(-1);
                    window.location.href=document.referrer;
                },
                error: function(error1, error2, error3){
                    alert('failed');
                }
        });

    }

    var meitu=$("#shou_pic");
// 美图秀秀部分 
$(".main_pic").mouseover(function(){
    $(this).css("color","#fff");
});
$(".main_pic").mouseout(function(){
    $(this).css("color","#000");
});
$(".main_pic").click(function(){
    meitu.show();
    var num= $(this).attr('name');
    var obj= $(this).parent().find(".img");
    xiuxiu.setLaunchVars("uploadBtnLabel", "确定上传");
    // if ($(this).attr('name')==1) {
    //     xiuxiu.setLaunchVars("maxFinalWidth", 500);
    // }else{
        xiuxiu.setLaunchVars("maxFinalWidth", 300);
    // }
      
   /*第1个参数是加载编辑器div容器，第2个参数是编辑器类型，第3个参数是div容器宽，第4个参数是div容器高*/
  xiuxiu.embedSWF("altContent",5,"100%","600px");
  //修改为您自己的图片上传接口
  xiuxiu.setUploadURL("http://share.kejixi.com/upload.php");
  xiuxiu.setUploadType(2);
  xiuxiu.setUploadDataFieldName("Filedata");
  xiuxiu.onInit = function ()
  {
    xiuxiu.loadPhoto("http://open.web.meitu.com/sources/images/1.jpg");//修改为要处理的图片url
  }
  xiuxiu.onUploadResponse = function (data)
  {
    var img='<img src="'+data+'" >';
    obj.html('<img src="'+data+'" name="'+data+'">');
    meitu.fadeOut();
  }
});

    //实例化编辑器
    var um = UM.getEditor('myEditor');
    um.addListener('blur',function(){
        $('#focush2').html('')
    });
    um.addListener('focus',function(){
        $('#focush2').html('')
    });
    //按钮的操作
    function insertHtml() {
        var value = prompt('插入html代码', '');
        um.execCommand('insertHtml', value)
    }
    function isFocus(){
        alert(um.isFocus())
    }
    function doBlur(){
        um.blur()
    }
    function createEditor() {
        enableBtn();
        um = UM.getEditor('myEditor');
    }
    function getAllHtml() {
        alert(UM.getEditor('myEditor').getAllHtml())
    }
    function getContent() {
        var arr = [];
        // arr.push("使用editor.getContent()方法可以获得编辑器的内容");
        // arr.push("内容为：");   
        arr.push(UM.getEditor('myEditor').getContent());
        return arr.join("\n");
    }
    function getPlainTxt() {
        var arr = [];
        arr.push("使用editor.getPlainTxt()方法可以获得编辑器的带格式的纯文本内容");
        arr.push("内容为：");
        arr.push(UM.getEditor('myEditor').getPlainTxt());
        alert(arr.join('\n'))
    }
    function setContent(isAppendTo) {
        var arr = [];
        arr.push("使用editor.setContent('欢迎使用umeditor')方法可以设置编辑器的内容");
        UM.getEditor('myEditor').setContent('欢迎使用umeditor', isAppendTo);
        alert(arr.join("\n"));
    }
    function setDisabled() {
        UM.getEditor('myEditor').setDisabled('fullscreen');
        disableBtn("enable");
    }

    function setEnabled() {
        UM.getEditor('myEditor').setEnabled();
        enableBtn();
    }

    function getText() {
        //当你点击按钮时编辑区域已经失去了焦点，如果直接用getText将不会得到内容，所以要在选回来，然后取得内容
        var range = UM.getEditor('myEditor').selection.getRange();
        range.select();
        var txt = UM.getEditor('myEditor').selection.getText();
        alert(txt)
    }

    function getContentTxt() {
        var arr = [];
        // arr.push("使用editor.getContentTxt()方法可以获得编辑器的纯文本内容");
        // arr.push("编辑器的纯文本内容为：");
        arr.push(UM.getEditor('myEditor').getContentTxt());
        alert(arr.join("\n"));
    }
    function hasContent() {
        var arr = [];
        arr.push("使用editor.hasContents()方法判断编辑器里是否有内容");
        arr.push("判断结果为：");
        arr.push(UM.getEditor('myEditor').hasContents());
        alert(arr.join("\n"));
    }
    function setFocus() {
        UM.getEditor('myEditor').focus();
    }
    function deleteEditor() {
        disableBtn();
        UM.getEditor('myEditor').destroy();
    }
    function disableBtn(str) {
        var div = document.getElementById('btns');
        var btns = domUtils.getElementsByTagName(div, "button");
        for (var i = 0, btn; btn = btns[i++];) {
            if (btn.id == str) {
                domUtils.removeAttributes(btn, ["disabled"]);
            } else {
                btn.setAttribute("disabled", "true");
            }
        }
    }
    function enableBtn() {
        var div = document.getElementById('btns');
        var btns = domUtils.getElementsByTagName(div, "button");
        for (var i = 0, btn; btn = btns[i++];) {
            domUtils.removeAttributes(btn, ["disabled"]);
        }
    }
</script>

</body>
</html>