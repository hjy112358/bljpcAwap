<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:35:"./template/mobile/new/user\reg.html";i:1562846437;s:40:"./template/mobile/new/public\footer.html";i:1556698550;}*/ ?>
<!DOCTYPE html>
<html>

<head>
	<meta name="Generator" content="tpshop" />
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width">
	<!-- <title>用户注册-必量家</title> -->
	<title></title>
	<meta http-equiv="keywords" content="<?php echo $tpshop_config['shop_info_store_keyword']; ?>" />
	<meta name="description" content="<?php echo $tpshop_config['shop_info_store_desc']; ?>" />
	<meta name="viewport"
		content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" type="text/css" href="__STATIC__/css/public.css" />
	<link rel="stylesheet" type="text/css" href="__STATIC__/css/login.css" />
	<link rel="stylesheet" href="__STATIC__/css/iconfont/iconfont.css">
	<script type="text/javascript" src="__STATIC__/js/jquery.js"></script>
	<script type="text/javascript" src="__STATIC__/js/layer.js"></script>
	<script src="__PUBLIC__/js/global.js"></script>
	<script src="__PUBLIC__/js/mobile_common.js"></script>
	<style>
		.nextStep input {
			color: #fff;
			display: block;
			width: 100%;
			background: #ff4c4c;
			border-radius: 30px;
			height: 40px;
			border:0;
		}
		
	</style>
</head>

<body>

	<div id="tbh5v0">
		<div class="log_reg_box">
			<div class="register">
				<!-- <div class="registerTitle flex jus-center align-c"> -->
					<div class="headbox">
							<!-- <div class=" flex jus-between align-c tophead regbg">
									<a href="javascript:history.back(-1)" class="iconfont icon-fanhui2"></a>
									<p class="font-18" style="margin-left: 30px">注册账号</p>
									<a href="https://dibaqu.com/UJFbb" style="color:#fff">下载APP</a>
								</div> -->
								<div class=" flex jus-between align-c tophead regbg">
									<a href="javascript:void(0)"></a>
									<p class="font-18" style="margin-left: 45px">注册账号</p>
									<a href="https://dibaqu.com/UJFbb" style="color:#fff">下载APP</a>
								</div>
					</div>
			


				<!-- <a href="javascript:history.back();">
						<img src="__STATIC__/images/newimg/return.png" alt="">
					</a>
					<p>注册账号</p>
					<a href="https://dibaqu.com/UJFbb" style="margin-left:70%">下载APP</a> -->
				<!-- </div> -->
				<div class="registerinput">
					<form action="" id="mobileForm" name="mobileForm" method="post" onsubmit="return check_submit()">
						<input type="hidden" name="scene" value="1">
						<div class="formbox">
							<input type="text" id="username" name="username" placeholder="输入手机号码"
								onBlur="checkMobilePhone(this.value);">
						</div>

						<div class="formbox">
							<input type="password" id="password" name="password" placeholder="设置密码"
								onBlur="check_password(this.value);">
						</div>
						<div class="formbox">
							<input type="password" id="password2" name="password2" placeholder="确认密码"
								onBlur="check_confirm_password(this.value);">
						</div>
						<div class="formbox">
							<input type="text" id="invitatecode"  name="invitatecode" placeholder="邀请码" value="<?php echo $invite_id; ?>"
								onBlur="check_invitatecode(this.value);">
						</div>
						<div class="formbox">
							<input type="text" name="nickname" placeholder="昵称(可选填)">
						</div>
						<div class="flex jus-between formbox">
							<input type="text" id="mobile_code" name="mobile_code" placeholder="验证码">
							<span class="sendCode font-12" id="zphone" onClick="sendcode(this)">发送验证码</span>
						</div>
						<div class="nextStep">
							<!-- <a href="javascript:void(0)"  >注册</a> -->
							<input type="submit" id="btn_submit" name="Submit" value="注 册" />
						</div>
					</form>
				</div>
			</div>
		</div>
		<!--
<div class="footer" >
	      <div class="links"  id="TP_MEMBERZONE"> 
	      		<?php if($user_id > 0): ?>
	      		<a href="<?php echo U('User/index'); ?>"><span><?php echo $user['nickname']; ?></span></a><a href="<?php echo U('User/logout'); ?>"><span>退出</span></a>
	      		<?php else: ?>
	      		<a href="<?php echo U('User/login'); ?>"><span>登录</span></a><a href="<?php echo U('User/reg'); ?>"><span>注册</span></a>
	      		<?php endif; ?>
	      		<a href="#"><span>反馈</span></a><a href="javascript:window.scrollTo(0,0);"><span>回顶部</span></a>
		  </div>
	      <ul class="linkss" >
		      <li>
		        <a href="#">
		        <i class="footerimg_1"></i>
		        <span>客户端</span></a></li>
		      <li>
		      <a href="javascript:;"><i class="footerimg_2"></i><span class="gl">触屏版</span></a></li>
		      <li><a href="<?php echo U('Home/Index/index'); ?>" class="goDesktop"><i class="footerimg_3"></i><span>电脑版</span></a></li>
	      </ul>
	  	 <p class="mf_o4">备案号:<?php echo $tpshop_config['shop_info_record_no']; ?><br/>&copy; 2005-2016 TPshop多商户V1.2 版权所有，并保留所有权利。</p>
</div>
-->
	</div>
	<script type="text/javascript">

		setCurrentForm($("#mobileForm"));
		var flag = false;


		function setCurrentForm(formObj) {
			currentForm = $(formObj);
		}


function checkMobilePhone(mobile){
	if(mobile == ''){
		layer.open({
		    content: '手机号码不能为空'
		    ,skin: 'msg'
		    ,time: 2 //2秒后自动关闭
		  });
		flag = false;
	}else if(checkMobile(mobile)){
		$.ajax({
				type : "GET",
				url:"/index.php?m=Home&c=Api&a=issetMobile",
				data :{mobile:mobile},// 你的formid 搜索表单 序列化提交
				success: function(data)
				{
					if(data == '0')
					{
						flag = true;
					}else{
						layer.open({
						    content: '手机号已存在'
						    ,skin: 'msg'
						    ,time: 2 //2秒后自动关闭
						  });
						flag = false;
					}
					
				}
			});

	}else{
		layer.open({
			content: '手机号码格式不正确'
			,skin: 'msg'
			,time: 2 //2秒后自动关闭
		});
		flag = false;
	}

}

function check_invitatecode(invitatecode){
	if(invitatecode == ''){
		layer.open({
			content:'邀请码不能为空'
			,skin:'msg'
			,time:2
		});
		flag = false;
	}else if(checkinvitatecode(invitatecode)){
		$.ajax({
				type : "GET",
				url:"/index.php?m=Home&c=Api&a=issetinvitatecode",
				data :{invitatecode:invitatecode},// 你的formid 搜索表单 序列化提交
				success: function(data)
				{
					console.log(data);
					if(data == '0')
					{
						flag = true;
					}else{
						layer.open({
						    content: '邀请码不存在'
						    ,skin: 'msg'
						    ,time: 2 //2秒后自动关闭
						  });
						flag = false;
					}
				}
			});

		
	}else{
		layer.open({
			content: '邀请码格式不正确'
			,skin: 'msg'
			,time: 2 //2秒后自动关闭
		});
		flag = false;
	}
}

function checkinvitatecode(invitatecode) {
    var reg = /^\d{6}$/;
    if (reg.test(invitatecode)) {
        return true;
    }else{
        return false;
    };
}

function check_password(password) {
	if (password.indexOf(" ") != -1) {
		layer.open({
		    content: '登录密码不能包含空格'
		    ,skin: 'msg'
		    ,time: 2 //2秒后自动关闭
		  });
		flag = false;
	} else if (password.length < 6) {
		layer.open({
		    content: '- 登录密码不能少于 6 个字符。'
		    ,skin: 'msg'
		    ,time: 2 //2秒后自动关闭
		  });
		flag = false;
	} else {
		flag = true;
	}
}

function check_confirm_password(confirm_password) {
	var password = $(currentForm).find('#password').val();
	if (password.indexOf(" ") != -1) {
		layer.open({
		    content: '确认密码不能包含空格'
		    ,skin: 'msg'
		    ,time: 2 //2秒后自动关闭
		  });
		flag = false;
		return false;
	}
	if (confirm_password.length < 6) {
		layer.open({
		    content: '- 登录密码不能少于 6 个字符。'
		    ,skin: 'msg'
		    ,time: 2 //2秒后自动关闭
		  });
		flag = false;
		return false;
	}
	if (confirm_password != password) {
		layer.open({
		    content: '两次密码不一致'
		    ,skin: 'msg'
		    ,time: 2 //2秒后自动关闭
		  });
		flag = false;
	} else {

		flag = true;
	}
}

 
function check_submit()
{
	var username = $.trim($(currentForm).find('#username').val()); //手机号码
	var password = $(currentForm).find('#password').val(); //密码
	var password2= $(currentForm).find('#password2').val();
	var invitatecode = $(currentForm).find("#invitatecode").val();
	var sms_code = $(currentForm).find('#mobile_code').val();

	if(username == ""){
		layer.open({content:'请输入手机号码',time:2});
		return (false);
	}
	if(password == "" || password2 == ""){
		layer.open({content:'请输入密码',time:2});
		return (false);
	}

	if(invitatecode == ""){
		layer.open({content:'请输入邀请码',time:2});
		return (false);
	}

	if(sms_code ==""){
		layer.open({content:'请输入短信验证码',time:2});
		return (false);
	}

	if(username.length >0 && password.length > 0 && password2.length > 0 && invitatecode.length>0  && flag)
	{
		return (true);
	} else{
		layer.open({content:'请将信息填写完	',time:2});
		return (false);
	}

}

function sendcode(o){
	if(flag || $(currentForm).find('#mobile_code').val() != "" ){
		$.ajax({
			url:  '/index.php?m=Home&c=Api&a=send_validate_code&t='+Math.random(),
			type:'post',
			dataType:'json',
			data:{type:$(o).attr('rel'),send:$.trim($(currentForm).find('#username').val()) , scene:1},
			success:function(res){	 
				if(res.status==1){
					layer.open({content:res.msg,time:1});
					countdown(o);
				}else{
					layer.open({content:res.msg,time:2});
				}
			}
		})
	}
}

var wait = 150;
		function countdown(obj, msg) {
			obj = $(obj);
			if (wait == 0) {
				//obj.removeAttr("disabled");
				//obj.removeAttr("onclick");
				obj.attr("onclick", "sendcode(this)");
				obj.html(msg);
				wait = 150;
			} else {
				if (msg == undefined || msg == null) {
					msg = obj.html();
				}
				//obj.attr("disabled", "disabled");
				obj.removeAttr("onclick");
				obj.html(wait + "秒后重新获取");
				wait--;
				setTimeout(function () {
					countdown(obj, msg)
				}, 1000)
			}
		}



// $(function(){
// 	var url=window.location.search;
// 	if(url.indexOf("?")!=-1){
// 		var id=url.split("=")[1];
// 		$("#invitatecode").val(id)
// 	}
// })
	</script>
</body>

</html>