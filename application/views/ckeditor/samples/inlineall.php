<!DOCTYPE html>

<html>
<head>
	<meta charset="utf-8">
	<title>Massive inline editing &mdash; CKEditor Sample</title>
	<script src="http://share.kejixi.com/application/views/ckeditor/ckeditor.js"></script>  
	<script>

		CKEDITOR.on( 'instanceCreated', function( event ) {
			var editor = event.editor,
				element = editor.element;
			if ( element.is( 'h1', 'h2', 'h3' ) || element.getAttribute( 'id' ) == 'taglist' ) {

				editor.on( 'configLoaded', function() {

					editor.config.removePlugins = 'colorbutton,find,flash,font,' +
						'forms,iframe,image,newpage,removeformat,' +
						'smiley,specialchar,stylescombo,templates';

					editor.config.toolbarGroups = [
						{ name: 'editing',		groups: [ 'basicstyles', 'links' ] },
						{ name: 'undo' },
						{ name: 'clipboard',	groups: [ 'selection', 'clipboard' ] },
						{ name: 'about' }
					];
				});
			}
		});

	</script>
	<link href="http://share.kejixi.com/application/views/ckeditor/samples/sample.css" rel="stylesheet">c
	
</head>
<body>
		<div>标题</div>
		<div id="title" style="width:300px;" contenteditable="true">
			title
		</div>
		<div>内容</div>
		<div id="content" style="width:300px;" contenteditable="true">
			中国
		</div>

		<div>作者</div>
		<div id="author" style="width:300px;" contenteditable="true">
			author
		</div>
		<div>头像</div>
		<div id="pic" style="width:300px;" contenteditable="true">
			headpic
		</div>

		
<button id = "click">click</button>


<script type="text/javascript" src="http://182.92.218.16/bishe/baiduedit/third-party/jquery.min.js"></script>
<script type="text/javascript">
$("#click").click(function(){
	var title = $("#title").html();
	var content = $("#content").html();
	var author = $("#author").html();
	var pic = $("#pic").html();

	$.ajax({
                // async: false,//这里必须取消异步处理，因为异步处理还未赋值
                url: "http://share.kejixi.com/index.php/admin/visual_add_article",
                type: "post",
                dataType: "json",
                data: {
                    title:title,
                    content:content,
                    author:author,
                    pic:pic
                },  
                success: function(data){
                    // alert(data);
                    alert('操作成功');
                    // history.go(-1);
                },
                error: function(error1, error2, error3){
                    alert('failed');
                }
        });



})

</script>
</body>
</html>
