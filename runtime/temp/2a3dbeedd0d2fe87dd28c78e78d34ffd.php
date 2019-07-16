<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:42:"./template/mobile/new/user\forget_pwd.html";i:1558684928;s:40:"./template/mobile/new/public\footer.html";i:1556698550;s:44:"./template/mobile/new/public\footer_nav.html";i:1557372944;s:42:"./template/mobile/new/public\wx_share.html";i:1556698550;}*/ ?>
<!DOCTYPE html>
<html>

<head>
	<meta name="Generator" content="TPshop1.2" />
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width">
	<title>安全中心-<?php echo $tpshop_config['shop_info_store_title']; ?></title>
	<meta http-equiv="keywords" content="<?php echo $tpshop_config['shop_info_store_keyword']; ?>" />
	<meta name="description" content="<?php echo $tpshop_config['shop_info_store_desc']; ?>" />
	<meta name="viewport"
		content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" type="text/css" href="__STATIC__/css/public.css" />
	<link rel="stylesheet" href="__STATIC__/css/iconfont/iconfont.css">
	<link rel="stylesheet" type="text/css" href="__STATIC__/css/login.css" />
	<script type="text/javascript" src="__STATIC__/js/jquery.js"></script>
	<script type="text/javascript" src="__STATIC__/js/common.js"></script>
	<script type="text/javascript" src="__STATIC__/js/layer.js"></script>
	<script type="text/javascript" src="__PUBLIC__/js/global.js"></script>
	<style>
		.nextStep input {
			color: #fff;
			display: block;
			width: 100%;
			height: 40px;
			background: #ff4c4c;
			border-radius: 30px;
			border: 0
		}
	</style>
</head>

<body>
	<!-- <header id="header" class='header'>
    <div class="h-left"><a href="javascript:history.back(-1)"></a></div>
	<div class="h-mid">找回密码</div>
</header> -->
	<div id="tbh5v0">
		<div class="find">
			<!-- <section class="innercontent">
	<form action="<?php echo U('User/forget_pwd'); ?>" method="post" id="fpForm" name="fpForm" class="c-form login-form">
		<div class="yonghu">
			<input type="text" id="username" name="username" placeholder="请输入邮箱/手机号" value="" />
		</div>  
	    <div class="yanzheng" style=" margin-top:10px;">
			<div class="codeTxt">
				<input type="text" id="captcha" name="verify_code" placeholder="验证码" />
			</div>
			<div class="codePhoto">
				<img class="check-code-img" src="/index.php?m=Mobile&c=User&a=verify&type=forget" alt="验证码" id="verify_code_img" onClick="verify()" height="35"/>
			</div>
		</div>                                    
		<div class="submit-btn">
			<input type="button" id="btn_submit" class="btn_big1" value="下一步" />
		</div>
	</form>
   </section> -->
			<div class="register">
				<!-- <div class=" forgetpas flex jus-center align-c">
					<a href="javascript:history.back();">
						<img src="__STATIC__/images/newimg/return.png" alt="">
					</a>
					<p>忘记密码</p>
				</div> -->
				<!-- <div class="maincolorbg flex jus-between align-c tophead">
					<a href="javascript:history.back(-1)" class="iconfont icon-fanhui2"></a>
					<p class="font-18">忘记密码</p>
					<a href=""></a>
				</div> -->

				<div class="headbox">
					<div class=" flex jus-between align-c tophead regbg">
						<a href="javascript:history.back(-1)" class="iconfont icon-fanhui2"></a>
						<p class="font-18">忘记密码</p>
						<a href="javascript:void(0)" ></a>
					</div>
				</div>



				<div class="registerinput">
					<form action="<?php echo U('User/forget_pwd'); ?>" method="post" id="fpForm" name="fpForm"
						class="c-form login-form">
						<div class="formbox">
							<input type="text" id="username" name="username" placeholder="输入手机号码">
						</div>
						<div class="flex jus-between formbox">
							<input type="text" id="mobile_code" name="mobile_code" placeholder="验证码">
							<span class="sendCode font-12" id="zphone" onClick="sendcode(this)">发送验证码</span>
						</div>
						<div class="lastInput formbox">
							<input type="password" id="password" name="password" placeholder="设置密码">
						</div>

						<div class="nextStep" style="margin-top:120px;">
							<input type="button" id="btn_submit" style="font-size: 16px;" value="确认" />
						</div>
					</form>
				</div>
			</div>
			<script type="text/javascript">
				$(document).ready(function () {
					$("#btn_submit").click(function () {
						var username = $('#username').val();
						if (username == '') {
							layer.open({ content: '手机号不能为空', time: 2 });
							return false;
						}
						if ($('#mobile_code').val() == '') {
							layer.open({ content: '验证码不能为空', time: 2 });
							return false;
						}
						if (!checkMobile(username)) {
							layer.open({ content: '手机号格式不匹配!', time: 2 });
							return false;
						}
						$("#fpForm").submit();
					});
				});


				function sendcode(o) {
					$.ajax({
						url: '/index.php?m=Home&c=Api&a=send_validate_code&t=' + Math.random(),
						type: 'post',
						dataType: 'json',
						data: { type: $(o).attr('rel'), send: $('#username').val(), scene: 1 },
						success: function (res) {
							if (res.status == 1) {
								layer.open({ content: res.msg, time: 1 });
								countdown(o);
							} else {
								layer.open({ content: res.msg, time: 2 });
							}
						}
					})

				}

				var wait = 150;
				function countdown(obj, msg) {
					obj = $(obj);
					if (wait == 0) {
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





				//验证码切换

				function verify() {
					$('#verify_code_img').attr('src', '/index.php?m=Mobile&c=User&a=verify&type=forget&r=' + Math.random());
				}
			</script>
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
	</div>
	<div style="height:50px; line-height:50px; clear:both;"></div>
<div class="v_nav">
	<div class="vf_nav">
		<ul>
			<li> <a href="<?php echo U('Index/index'); ?>">
			    <i class="vf_1"></i>
			    <span class="maincolor">首页</span></a></li>
			<li><a href="<?php echo U('Goods/categoryList'); ?>">
			    <i class="vf_2"></i>
			    <span>分类</span></a></li>
			<li class="scan"><a href="javascript:void(0)">
			    <i class="vf_3"></i>
			   
			<li><a href="<?php echo U('Cart/cart'); ?>">
			   <i class="vf_4"></i>
			   <span>购物车</span>
			   </a>
			</li>
			<li><a href="<?php echo U('User/indexnew'); ?>">
			    <i class="vf_5"></i>
			    <span>我的</span></a>
			</li>
		</ul>
	</div>
</div> 
<script type="text/javascript">
$(document).ready(function(){
	  var cart_cn = getCookie('cn');
	  if(cart_cn == ''){
		$.ajax({
			type : "GET",
			url:"/index.php?m=Home&c=Cart&a=header_cart_list",//+tab,
			success: function(data){								 
				cart_cn = getCookie('cn');
				$('#cart_quantity').html(cart_cn);						
			}
		});	
	  }
	  $('#cart_quantity').html(cart_cn);
});
</script>
<!-- 微信浏览器 调用微信 分享js-->
<script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script type="text/javascript">

<?php if(ACTION_NAME == 'goodsInfo'): ?>
   var ShareLink = "http://<?php echo $_SERVER[HTTP_HOST]; ?>/index.php?m=Mobile&c=Goods&a=goodsInfo&id=<?php echo $goods[goods_id]; ?>"; //默认分享链接
   var ShareImgUrl = "http://<?php echo $_SERVER[HTTP_HOST]; ?><?php echo goods_thum_images($goods[goods_id],400,400); ?>"; // 分享图标
<?php else: ?>
   var ShareLink = "http://<?php echo $_SERVER[HTTP_HOST]; ?>/index.php?m=Mobile&c=Index&a=index"; //默认分享链接
   var ShareImgUrl = "http://<?php echo $_SERVER[HTTP_HOST]; ?><?php echo $tpshop_config['shop_info_store_logo']; ?>"; //分享图标
<?php endif; ?>

var is_distribut = getCookie('is_distribut'); // 是否分销代理
var user_id = getCookie('user_id'); // 当前用户id
//alert(is_distribut+'=='+user_id);
// 如果已经登录了, 并且是分销商
if(parseInt(is_distribut) == 1 && parseInt(user_id) > 0)
{									
	ShareLink = ShareLink + "&first_leader="+user_id;									
}	

$(function() {
	if(isWeiXin() && parseInt(user_id)>0 ||1){
		$.ajax({
			type : "POST",
			url:"/index.php?m=Mobile&c=Index&a=ajaxGetWxConfig&t="+Math.random(),
			data:{'askUrl':encodeURIComponent(location.href.split('#')[0])},		
			dataType:'JSON',
			success: function(res)
			{
				//微信配置
				wx.config({
				    debug: false, 
				    appId: res.appId,
				    timestamp: res.timestamp, 
				    nonceStr: res.nonceStr, 
				    signature: res.signature,
				    jsApiList: ['onMenuShareTimeline', 'onMenuShareAppMessage','onMenuShareQQ','onMenuShareQZone','hideOptionMenu'] // 功能列表，我们要使用JS-SDK的什么功能
				});
			},
			error:function(){
				return false;
			}
		}); 

		// config信息验证后会执行ready方法，所有接口调用都必须在config接口获得结果之后，config是一个客户端的异步操作，所以如果需要在 页面加载时就调用相关接口，则须把相关接口放在ready函数中调用来确保正确执行。对于用户触发时才调用的接口，则可以直接调用，不需要放在ready 函数中。
		wx.ready(function(){
		    // 获取"分享到朋友圈"按钮点击状态及自定义分享内容接口
		    wx.onMenuShareTimeline({
		        title: "<?php echo $tpshop_config['shop_info_store_title']; ?>", // 分享标题
		        link:ShareLink,
		        imgUrl:ShareImgUrl // 分享图标
		    });

		    // 获取"分享给朋友"按钮点击状态及自定义分享内容接口
		    wx.onMenuShareAppMessage({
		        title: "<?php echo $tpshop_config['shop_info_store_title']; ?>", // 分享标题
		        desc: "<?php echo $tpshop_config['shop_info_store_desc']; ?>", // 分享描述
		        link:ShareLink,
		        imgUrl:ShareImgUrl // 分享图标
		    });
			// 分享到QQ
			wx.onMenuShareQQ({
		        title: "<?php echo $tpshop_config['shop_info_store_title']; ?>", // 分享标题
		        desc: "<?php echo $tpshop_config['shop_info_store_desc']; ?>", // 分享描述
		        link:ShareLink,
		        imgUrl:ShareImgUrl // 分享图标
			});	
			// 分享到QQ空间
			wx.onMenuShareQZone({
		        title: "<?php echo $tpshop_config['shop_info_store_title']; ?>", // 分享标题
		        desc: "<?php echo $tpshop_config['shop_info_store_desc']; ?>", // 分享描述
		        link:ShareLink,
		        imgUrl:ShareImgUrl // 分享图标
			});

		   <?php if(CONTROLLER_NAME == 'User'): ?> 
				wx.hideOptionMenu();  // 用户中心 隐藏微信菜单
		   <?php endif; ?>	
		});
	}
});

function isWeiXin(){
    var ua = window.navigator.userAgent.toLowerCase();
    if(ua.match(/MicroMessenger/i) == 'micromessenger'){
        return true;
    }else{
        return false;
    }
}
</script>
<!--微信关注提醒 start-->
<?php if(\think\Session::get('subscribe') == 0 AND $wechat_config['qr'] != ''): ?>
<button class="guide" onclick="follow_wx()">关注公众号</button>
<style type="text/css">
.guide{width:20px;height:100px;text-align: center;border-radius: 8px ;font-size:12px;padding:8px 0;border:1px solid #adadab;color:#000000;background-color: #fff;position: fixed;right: 6px;bottom: 200px;}
#cover{display:none;position:absolute;left:0;top:0;z-index:18888;background-color:#000000;opacity:0.7;}
#guide{display:none;position:absolute;top:5px;z-index:19999;}
#guide img{width: 70%;height: auto;display: block;margin: 0 auto;margin-top: 10px;}
</style>
<script type="text/javascript">
  // 关注微信公众号二维码	 
function follow_wx()
{
	layer.open({
		type : 1,  
		title: '关注公众号',
		content: '<img src="<?php echo $wechat_config['qr']; ?>" width="200">',
		style: ''
	});
}
</script> 
<?php endif; ?>
<!--微信关注提醒  end-->
<!-- 微信浏览器 调用微信 分享js  end-->
</body>

</html>