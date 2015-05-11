<!doctype html>

<head>

	<!-- Basics -->
	
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no, minimal-ui">
	<title>商城后台管理系统</title>

	
	<link rel="stylesheet" href="/resources/js/dist/semantic.min.css">
	<link rel="stylesheet" href="/resources/css/framework7.min.css">
	<link href="/resources/font-awesome-4.2.0/css/font-awesome.min.css" rel="stylesheet">
	
	<link rel="stylesheet" href="/resources/css/admin_public.css">


	<style type="text/css">
		body{
			padding: 20px;
			overflow: auto;
			margin-bottom: 50px;
		}
	</style>
</head>


<body>

	<div id="">
		<div class="ui raised segment">
			<a class="ui teal  ribbon label">提现申请</a>
			<br/><br/>
			<div class="clear"></div>
			<!-- <p id="liang_add_new_user" class="width_200 fl"><a  class="button button-big color-green button-fill"><i class="fa fa-plus right_fiv"></i>添加</a></p> -->



			<div class="fr" style="width:100px;margin-left:10px;">
          <a id="select_data" class="button button-big color-blue button-fill">搜索</a> 
        </div>
        <div class="ui search fr">
          <div class="ui icon input">
  <?php
  if ($words!=-1) {
    echo'<input id="s_search_input" class="prompt" type="text" value='.$words.' placeholder="搜索..." >';
  }else{
    echo'<input id="s_search_input" class="prompt" type="text" placeholder="搜索..." >';
  }
  ?>
          </div>
        </div>

			<div class="clear"></div>

			<div id="send_user_mess_container" class="ui piled segment">
				
				<div class="clear"></div>
			</div>
			<table id="user_list_table" class="ui teal  table">
				<thead>
					<tr>
						<th>编号</th>
						<th>用户ID</th>
						<th>用户名</th>  
						<th>手机号</th> 
						<th>邮箱</th>       
						<th>金额</th>
						<th>提现时间</th>
						<th>操作</th>
					</tr>
				</thead>
				<tbody >
					<?php foreach ($applay_info as $key => $value) { ?>
					<tr>
						<td><?=$value['id']?></td>
						<td><?=$value['u_id']?></td>
						<td><?=$value['u_name']?></td>
						<td><?=$value['u_tel']?></td>
						<td><?=$value['u_email']?></td>
						<td><?=$value['u_cash']?></td>
						<td><?=$value['time']?></td>  
						<td class="finsh_cash" style="color:#DF1F1F;cursor: pointer;" data-id ="<?=$value['id']?>" data-uid="<?=$value['u_id']?>" data-tel="<?=$value['u_tel']?>" data-name = "<?=$value['u_name']?>" data-cash="<?=$value['u_cash']?>" data-email="<?=$value['u_email']?>" >
							完成<i class="fa fa-question"></i>
						</td>
					</tr>
					<?php } ?>

				</tbody>
			</table>

			<div class="ui pagination menu fl">
				<?php
    $total=count($total_item);//总条数
    $page_toatl=ceil($total/20);//总页数
    if ($thispage>=$page_toatl) {
        $thispage=$page_toatl;
      }

    if ($thispage<=1) { 
      echo'<a class="icon item" href="#"><i class="left arrow icon"></i></a>';
    }else{
      echo'<a class="icon item" href="http://share.kejixi.com/index.php/admin/applay_cash/'.($thispage*1-1*1).'?words='.$words.'"><i class="left arrow icon"></i></a>';
    }

if ($page_toatl>9) {

      if ($thispage>=6) {
        $starpage= $thispage*1-4*1;
        if ($thispage*1+1*4 > $page_toatl) {
          $endpage=$page_toatl;
        }else{
          $endpage=$thispage*1+1*4;
        }
      }else{
        $starpage= 1;
        $endpage=9;
      }

    }else{
      $starpage=1;
      $endpage=$page_toatl;
    }
 
    for ($i = $starpage; $i <= $endpage; $i++) {
      if ($i==$thispage) {
        echo'<a class="active item" href="http://share.kejixi.com/index.php/admin/applay_cash/'.$i.'?words='.$words.'">'.$i.'</a>';
      }else{
        echo'<a class="item" href="http://share.kejixi.com/index.php/admin/applay_cash/'.$i.'?words='.$words.'">'.$i.'</a>';
      }
    };

    if ($thispage<$page_toatl) {
      echo'<a class="icon item" href="http://share.kejixi.com/index.php/admin/applay_cash/'.($thispage*1+1).'?words='.$words.'"><i class="right arrow icon"></i></a>';
    }else{
      echo'<a class="icon item" href="#"><i class="right arrow icon"></i></a>';
    }

?>
			</div>

			<div class="ui form fl " style="margin-left:30px;">
				<input id="page_num" type="text" placeholder="页码" style="width:100px;float:left;margin-right:10px;height: 39px;padding-left: 5px;" class="">
				<a id="spage_button" data-words="<?=$words?>" class="button button-big color-blue button-fill" style="
				height: 38px;
				width: 100px;
				"><i class="fa fa-paper-plane right_fiv"></i>跳转</a>
			</div>
		</div>
	</div>
</body>

<script src="/resources/js/framework7.js"></script>
<script src='/resources/js/jquery.min.js'></script>
<script type="text/javascript" src="/resources/js/dist/semantic.js"></script>
<!-- 插件 -->
<!-- <script type="text/javascript" src="/resources/js/dist/components/menu.min.js"></script> -->

<script type="text/javascript">
	// Initialize app and store it to myApp variable for futher access to its methods
	var shop_name = '林海网络' ;
	var myApp = new Framework7({
		modalTitle: shop_name,
    // If it is webapp, we can enable hash navigation:
    pushState: true,
    modalButtonOk:'确定',
    modalButtonCancel:'取消',
    
    // Hide and show indicator during ajax requests
    onAjaxStart: function (xhr) {
    	myApp.showIndicator();
    },
    onAjaxComplete: function (xhr) {
    	myApp.hideIndicator();
    }

});


	$(document).ready(function(){
		// 初始化下拉框
		$('.ui.dropdown').dropdown();
		// 左侧目录初始化
		$('.menu a.item').on('click', function() {
			if(!$(this).hasClass('dropdown')) {
				$(this)
				.addClass('active')
				.closest('.ui.menu')
				.find('.item')
				.not($(this))
				.removeClass('active')
				;
			}
		});
		$('.ui.checkbox')
		.checkbox()
		;
		
	});


	$("#select_data").click(function(){
  		var words=$.trim($("#s_search_input").val());
  		if (words=='') {
   		 	words=-1;
  		};
 		window.location.href="http://share.kejixi.com/index.php/admin/applay_cash/1?words="+words+"";
	});

	$("#spage_button").click(function(){
    var num= Math.ceil($.trim($("#page_num").val()));
    var max=<?php echo $page_toatl;?>;
    var words=$(this).data('words');
    // alert(num);
    if (!isNaN(num)) {
        if (num*1 >= max*1) {
            num=max;
        };
        if (num*1 <=0) {
            num=1;
        };
    }else{
        num=1;
    }
    window.location.href='http://share.kejixi.com/index.php/admin/applay_cash/'+num+'?&words='+words+'';   
}); 


	$(function(){


		function msg_good (str) {
			myApp.alert('<p>'+str+'</p><i class="fa fa-check color-green" style="font-size:50px;"></i>');
		};
		function msg_bad (str) {
			myApp.alert('<p>'+str+'</p><i class="fa fa-remove color-red" style="font-size:50px;"></i>');
		};
		// 添加新分类

		$('#liang_add_new_user').on('click',function(){
			$('#add_new_user').show();
			$('#new_user_tel').focus();
		});

		
		// 选择分类
		var global_cate_id ;
		$('.add_cate .item').on('click',function(){
			global_cate_id = $(this).data('value');
		});
		// 确定添加
		$('#confirm_add_user_button').on('click',function(){
			var telephone = $(this).parent().parent().find('.telephone').val();
			var off_vip = $(this).parent().parent().find('.off_vip').val();
			var cate_id = global_cate_id;
			alert(telephone+'##'+off_vip+'##'+cate_id);
			$(this).parent().parent().hide();
		});
		var global_sms_cate_id ;
		$('.system_mess .item').on('click',function(){
			global_sms_cate_id = $(this).data('value');
		});
		// 提交发送系统消息
		$('#sumit_send_user_mess').on('click',function(){
			var cate_id = global_sms_cate_id;
			var title= $('#sms_title').val();
			var content= $('#sms_desc').val();

			alert(cate_id+'##'+title+'##'+content);
			$('#send_user_mess_container').hide();
			$('#liang_add_new_user').show();
			$('#liang_send_mes').show();
		});

		$(".finsh_cash").click(function(){
			var tel = $(this).data('tel');
			var email = $(this).data('email');
			var uid = $(this).data('uid');
			var id = $(this).data('id');  
			var cash = $(this).data('cash'); 
			var name = $(this).data('name'); 
			var obj = $(this).parent();
			// alert(tel+email+uid);
			$.ajax({
                // async: false,//这里必须取消异步处理，因为异步处理还未赋值
                url: "/index.php/admin/tell_user_ok",
                type: "post",
                dataType: "json",
                data: {
                    tel:tel,
                    email:email,
                    uid:uid,
                    id:id,  
                    cash:cash,
                    name:name
                },  
                success: function(data){
                    alert('操作成功');
                    obj.remove();
                    
                },
                error: function(error1, error2, error3){
                    alert('failed');
                }
        	});

		});

	});



</script>
</html>






