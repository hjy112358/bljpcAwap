<?php if (!defined('THINK_PATH')) exit(); /*a:6:{s:44:"./template/mobile/new/user\message_list.html";i:1558681132;s:40:"./template/mobile/new/public\header.html";i:1556698550;s:38:"./template/mobile/new/public\menu.html";i:1556698550;s:40:"./template/mobile/new/public\footer.html";i:1556698550;s:44:"./template/mobile/new/public\footer_nav.html";i:1557372944;s:42:"./template/mobile/new/public\wx_share.html";i:1556698550;}*/ ?>
<!DOCTYPE html >
<html>
<head>
<meta name="Generator" content="TPSHOP v1.1" />
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<meta name="format-detection" content="telephone=no" />
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-touch-fullscreen" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="applicable-device" content="mobile">
<title><?php echo $tpshop_config['shop_info_store_title']; ?></title>
<meta http-equiv="keywords" content="<?php echo $tpshop_config['shop_info_store_keyword']; ?>" />
<meta name="description" content="<?php echo $tpshop_config['shop_info_store_desc']; ?>" />
<meta name="Keywords" content="TPshop触屏版  TPshop 手机版" />
<meta name="Description" content="TPshop触屏版   TPshop商城 "/>
<link rel="stylesheet" href="__STATIC__/css/public.css">
<link rel="stylesheet" href="__STATIC__/css/user.css">
<script type="text/javascript" src="__STATIC__/js/jquery.js"></script>
<script src="__PUBLIC__/js/global.js"></script>
<script src="__PUBLIC__/js/mobile_common.js"></script>
<script type="text/javascript" src="__STATIC__/js/modernizr.js"></script>
<script type="text/javascript" src="__STATIC__/js/layer.js" ></script>
</head>

<link rel="stylesheet" href="__STATIC__/css/iconfont/iconfont.css">
<body>
	<header>
		<div class="tab_nav">
			<!-- <div class="header">
          <div class="h-left"><a class="sb-back" href="javascript:history.back(-1)" title="返回"></a></div>
          <div class="h-mid">我的留言</div>
          <div class="h-right">
            <aside class="top_bar">
              <div onClick="show_menu();$('#close_btn').addClass('hid');" id="show_more"><a href="javascript:;"></a> </div>
            </aside>
          </div>
				</div> -->
			<div class="maincolorbg flex jus-between align-c tophead">
				<a href="javascript:history.back(-1)" class="iconfont icon-fanhui2"></a>
				<p class="font-18">我的留言</p>
				<a href=""></a>
			</div>
      </div>
</header>
<script type="text/javascript" src="__STATIC__/js/mobile.js" ></script>
<div class="goods_nav hid" id="menu">
      <div class="Triangle">
        <h2></h2>
      </div>
      <ul>
        <li><a href="<?php echo U('Index/index'); ?>"><span class="menu1"></span><i>首页</i></a></li>
        <li><a href="<?php echo U('Goods/categoryList'); ?>"><span class="menu2"></span><i>分类</i></a></li>
        <li><a href="<?php echo U('Cart/cart'); ?>"><span class="menu3"></span><i>购物车</i></a></li>
        <li style=" border:0;"><a href="<?php echo U('User/index'); ?>"><span class="menu4"></span><i>我的</i></a></li>
   </ul>
 </div> 
<div id="tbh5v0">
<div class="liuyan">
    <div class="liuyan_list">
      <?php if(empty($message) || ($message instanceof \think\Collection && $message->isEmpty())): ?>
      <div id="list_0_0" class="font12">您现在还没有留言！</div>
      <?php else: if(is_array($message) || $message instanceof \think\Collection): if( count($message)==0 ) : echo "" ;else: foreach($message as $key=>$vo): ?>
	      <dl>
	        <dt><span class="title"><?php echo $msg_type[$vo[msg_type]]; ?></span><?php echo $vo['msg_title']; ?></dt>
	        <dd></dd>
	        <dd><span><?php echo $vo['msg_content']; ?></span><font></font></dd>
	        <span class="liuyan_time"><?php echo date('Y-m-d H:i:s',$vo['msg_time']); ?></span>  
	      </dl>   
	  <?php endforeach; endif; else: echo "" ;endif; ?> 
	  <!--     
	      <section class="list-pagination">
		    <div style="" class="pagenav-wrapper" id="J_PageNavWrap">
		      <div class="pagenav-content">
		        <div class="pagenav" id="J_PageNav">
		          <div class="p-prev p-gray" > <a href="">上一页</a> </div>
		          <div class="pagenav-cur" style="vertical-align:bottom">
		            <div class="pagenav-text" ><span>1/1</span> <i></i> </div>
				        <select class="pagenav-select"  onchange="location.href=this.options[this.selectedIndex].value;">
				  			<option selected="selected" value="user.php?act=message_list&page=1">第1页</option>
				  		</select>
		          </div>
		       	<div class="p-next" > <a href="">下一页</a> </div>
				</div>
		      </div>
		    </div>
		  </section>
	  -->
      <?php endif; ?>
    </div>
    
    <div class="liuyandom"> 
      <section class="innercontent1">
        <form action="" method="post" enctype="multipart/form-data" name="formMsg" onSubmit="return submitMsg()">
          <div>
            <div class="form_search"><span>留言类型：</span>
            <div class="anniu">
	            <ul>
	              <li class="on">
	              	<label for="msg_type0"><input type="radio" name="msg_type" value="0" checked="checked" class="radio" id="msg_type0"> 留言</label>
	              </li>
	              <li>
	              	<label for="msg_type1"><input type="radio" name="msg_type" value="1" class="radio" id="msg_type1">投诉</label>
	              </li>
	              <li>
	              	<label for="msg_type2"> <input type="radio" name="msg_type" value="2" class="radio" id="msg_type2">询问</label>
	              </li>
	              <li>
	              	<label for="msg_type3"><input type="radio" name="msg_type" value="3" class="radio" id="msg_type3">售后</label>
	              </li>
	              <li>
	              	<label for="msg_type4"> <input type="radio" name="msg_type" value="4" class="radio" id="msg_type4">求购</label>
	              </li>
	             </ul>
             </div>
            </div>
          </div>
          <label for="msg_title">
          <div class="field_else">
          <span>留言主题：</span>
              <input type="text" name="msg_title" id="msg_title" placeholder="*主题"/>
          </div>
          </label>
          <div class="field_else">
              <label for="msg_content"> 
              <span>留言内容：</span>
               <textarea name="msg_content" id="msg_content" style="height:100px;"></textarea>
              </label>
          </div>
          <div class="field_else">
          <span>验证码：</span>
          <img class="po-ab to0" id="verify_code_img" width="120" height="40" src="<?php echo U('Home/User/verify',array('type'=>'message')); ?>"  onclick="verify(this)" />
          <input style="margin-top:20px" type="text" name="verify_code" id="verify_code" placeholder="验证码"/>
                            
          </div>          
          <div style=" padding-bottom:10px;">
            <input type="submit" value="提交留言" class="btn_big1"/>
          </div>
        </form>
      </section>
    </div>
</div>

		<script>

			function verify() {
				$('#verify_code_img').attr('src', '/index.php?m=Mobile&c=User&a=verify&type=message&r=' + Math.random());
			}

			$('.anniu ul li').click(function () {
				$(this).find("input").attr("checked", "checked");
				$('.anniu ul li').removeClass("on");
				$(this).addClass("on");
			})

			function submitMsg() {
				var frm = document.forms['formMsg'];
				var msg_title = frm.elements['msg_title'].value;
				var msg_content = frm.elements['msg_content'].value;
				var msg = '';
				if (msg_title.length == 0) {
					alert('留言标题不能为空');
					return false
				}
				if (msg_content.length == 0) {
					alert('留言内容不能为空');
					return false
				}
				if (msg_title.length > 100) {
					alert('标题不能超过100字符');
					return false
				}
				if ($.trim($('#verify_code').val()).length == 0) {
					alert('验证码不能为空');
					return false
				}


				return true;
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