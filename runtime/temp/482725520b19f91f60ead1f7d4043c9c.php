<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:42:"./template/mobile/new/goods\goodsList.html";i:1562896236;s:44:"./template/mobile/new/public\footer_nav.html";i:1560504668;s:42:"./template/mobile/new/public\wx_share.html";i:1556698550;}*/ ?>
<html>

<head>
	<meta name="Generator" content="tpshop" />
	<meta charset="utf-8">
	<meta name="format-detection" content="telephone=no">
	<meta name="viewport"
		content="minimal-ui=yes,width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- <title>商品列表-必量家</title> -->
	<title></title>
	<meta http-equiv="keywords" content="<?php echo $tpshop_config['shop_info_store_keyword']; ?>" />
	<meta name="description" content="<?php echo $tpshop_config['shop_info_store_desc']; ?>" />
	<link rel="stylesheet" type="text/css" href="__STATIC__/css/public.css?time=<?php echo time()?>" /> 
	<link rel="stylesheet" href="__STATIC__/css/iconfont/iconfont.css">
	<link rel="stylesheet" type="text/css" href="__STATIC__/css/category_list.css?time=<?php echo time()?>" />
	<script type="text/javascript" src="__STATIC__/js/jquery.js"></script>
	<script type="text/javascript" src="__STATIC__/js/layer.js"></script>
	<script src="__PUBLIC__/js/global.js"></script>
	<script src="__PUBLIC__/js/mobile_common.js"></script>
	<style>
			.inputbox:before {
				content: "";
				background: url("../images/newimg/store/searchW.png") no-repeat;
				background-size: 100%;
				position: absolute;
				top: 3px;
				left: 12px;
				width: 16px;
				height: 16px;
				z-index: 2;
			}
	
			.inputbox {
				width: 85%;
				margin: 0 auto
			}
	
			.inputbox input {
				width: 100%;
				height: 28px;
				line-height: 28px;
				border-radius: 20px;
				border: 0;
				margin-top: -4px;
				text-indent: 45px;
			}
	
			.inputbox input::-webkit-input-placeholder {
				color: #f2f2f2;
			}
	
			.inputbox:before {
				background: url(../images/newimg/store/searchR.png) no-repeat;
				top: 24px;
				background-size: 100%
			}
		</style>
</head>

<body>
	<section class="_pre">
		<header id="head_search_box " style="position: fixed; top: 0px; width: 100%;z-index:9999">
			<!-- <div class="search_header maincolorbg">
				<a href="javascript:history.back(-1)" class="back search_back"></a>
				<div class="search">
					<form name="sourch_form" id="sourch_form2" method="post" action="<?php echo U(" Goods/search"); ?>"> <form
						name="sourch_form" id="sourch_form2" method="post">
						<div class="text_box" name="list_search_text_box" onClick="return 1;">
							<input type="text" class="text" name="q" id="keyword" value="<?php echo I('q'); ?>" placeholder="搜索关键字" />
						</div>
						<input type="button" value="" class="submit"
							onclick="if($.trim($('#keyword').val()) != '') $('#sourch_form2').submit();" />
					</form>
				</div>
				<a class="menu filtrate" name="list_go_filter" style=" color:#666"></a>
			</div> -->
			<div class="maincolorbg flex jus-between align-c tophead" >
				<!-- <a href="javascript:history.back(-1)" class="iconfont icon-fanhui2"></a>-->
					<div class="inputbox  pos-r">
						<input type="search" id="search_text" placeholder="搜索关键字" class="font-15">
					</div>
					<img src="__STATIC__/images/newimg/goods/goodscar.png" alt="" width="20">
				</div>
		</header>
		<div style="height:77px;" class="empty_div">&nbsp;</div>
		<section class="filtrate_term" id="product_sort" style="width: 100%; background:#FFF;">
			<ul>
				<li class="<?php if(($_GET[sort] == '' ) or ($_GET[sort] == 'goods_id' )): ?>on<?php endif; ?>"><a
						href="<?php echo url('Goods/goodsList',array('sort'=>'goods_id','id'=>$id,'name'=>$name)); ?>">综合</a>
				</li>
				<li class="<?php if($_GET[sort] == 'sales_sum'): ?>on<?php endif; ?>"><a
						href="<?php echo url('Goods/goodsList',array('sort'=>'sales_sum','id'=>$id,'name'=>$name)); ?>">销量</a>
				</li>
				<li class="<?php if($_GET[sort] == 'shop_price'): ?>on<?php endif; ?>"><a
						href="<?php echo url('Goods/goodsList',array('sort'=>'shop_price','sort_asc'=>$sort_asc,'id'=>$id,'name'=>$name)); ?>">价格<span
							class="arrow_up"></span><span class="arrow_down"></span></a></li>
				

			
			</ul>
		</section>
		<section>
			<div class="touchweb-com_searchListBox openList" id="goods_list">
				<?php if(empty($goods_list) || ($goods_list instanceof \think\Collection && $goods_list->isEmpty())): ?>
					<p class="goods_title">抱歉暂时没有相关结果，换个筛选条件试试吧</p>
					<?php else: if(is_array($goods_list) || $goods_list instanceof \think\Collection): if( count($goods_list)==0 ) : echo "" ;else: foreach($goods_list as $k=>$vo): ?>
						<li>
							<a href="<?php echo U('Mobile/Goods/goodsDetailNew',array('id'=>$vo[goods_id])); ?>" class="item flex jus-start">
								<div class="pic_box" style="width:25%;margin-right: 15px">
									<!-- <div class="active_box">
										<span style=" background-position:0px -36px">新品</span>
									</div> -->
									<img src="<?php echo goods_thum_images($vo['goods_id'],400,400); ?>">
									<!-- <img src="<?php echo $vo['original_img']; ?>" style="width: 30px;height: 30px"> -->
								</div>
								<div style="width:75%">
									<div class="title_box"><?php echo $vo['goods_name']; ?></div>
									<div class="price_box" style="line-height:56px">
										<span class="new_price"><i style="font-size:14px">￥<?php echo $vo['shop_price']; ?>元</i></span>
										<span style="font-size:12px;color:#ccc;margin-left:14px">库存:<?php echo $vo['store_count']; ?></span>
									</div>
									<div class="flex jus-start align-c" style="margin-top: -15px;font-size: 12px;color: #ccc;">
										<?php if($vo['is_own_shop'] == 1): ?>
										<img src="__STATIC__/images/autarky.png" alt="" width="50" height="20" style="margin-right:8px">
										<?php endif; ?>
										<p style="margin-right: 26px;">1000条好评</p>
										<p>100%好评率</p>
									</div>
									<!-- <div class="comment_box">库存100 /已上架66</div> -->
								</div>

							</a>
							<!-- <div class="ui-number b">
								<a class="decrease" onClick="goods_cut(<?php echo $vo['goods_id']; ?>);">-</a>
								<input class="num" id="number_<?php echo $vo['goods_id']; ?>" type="text" onBlur="changePrice();"
									value="1" onFocus="if(value=='1') {value=''}" size="4" maxlength="5">
								<a class="increase" onClick="goods_add(<?php echo $vo['goods_id']; ?>);">+</a>
							</div> -->
							<!-- <span class="bug_car"
								onClick="AjaxAddCart(<?php echo $vo[goods_id]; ?>,1,0);"><i
									class="icon-shop_cart"></i></span> -->
						</li>
					<?php endforeach; endif; else: echo "" ;endif; endif; ?>
			</div>
			<!-- <?php if(!(empty($goods_list) || ($goods_list instanceof \think\Collection && $goods_list->isEmpty()))): ?>
				<div id="getmore"
					style="font-size:.24rem;text-align: center;color:#888;padding:.25rem .24rem .4rem; clear:both">
					<a href="javascript:void(0)" onClick="ajax_sourch_submit()">点击加载更多</a>
				</div>
			<?php endif; ?> -->
		</section>
	</section>





	
	<script type="text/javascript" src="__STATIC__/js/zepto.min.js"></script>
	<script type="text/javascript" src="__STATIC__/js/filter.min.js"></script>
	<script>
		$(document).ready(function () {
			//筛选浮层显示控制
			var filtrate = $(".filtrate"), submit = $(".submit,.back,.reset");
			filtrate.bind("click", function () {
				$("._next").show();
				$("._pre").hide();
				window.scrollTo(0, 0);
			});
			submit.bind("click", function () {
				$("._next").hide();
				$("._pre").show();
			});
			//初始化筛选浮层
			bizFilter.init();
		});

		function goods_cut($val) {
			var num_val = document.getElementById('number_' + $val);
			var new_num = num_val.value;
			var Num = parseInt(new_num);
			if (Num > 1) Num = Num - 1;
			num_val.value = Num;
		}

		function goods_add($val) {
			var num_val = document.getElementById('number_' + $val);
			var new_num = num_val.value;
			var Num = parseInt(new_num);
			Num = Num + 1;
			num_val.value = Num;
		}
	</script>
	<script>
		$(function () {
			//搜索浮层显示逻辑
			var sbox = $("#head_search_box"),
				sort = $('#product_sort'),
				g_list = $("#goods_list"),
				g_m1 = "0", g_m2 = "96px";
			var initCss = function (type) {
				if (type == 1) {
					sort.css({ "position": "static", "width": "100%" });
					g_list.css("margin-top", g_m1);
				} else {
					sort.attr("style", "");
					g_list.css("margin-top", g_m2);
				}
			};
			var m = {
				input: $("#keyword"),
				rawAll: '',
				dd: $(".text_box"),
				cancel: $(".mix_back"),
				rawKey: '请输入商品名称 货号',
				main: function () {
					this.init();
					this.be();
				},
				init: function () {
					this.rawAll = this.input.val();
				},
				be: function () {
					var _this = this;
					this.input.focus(function () {
						var mix_search = $("#mix_search_div");
						if (mix_search.length > 0) {
							$("._pre").hide();
							mix_search.show();
							$("#keyword1").focus();
							return;
						}
						var newKey = _this.input.val();
						if (newKey != _this.rawKey && newKey != _this.rawAll) {
							$(this).val(newKey);
						} else {
							$(this).val(_this.rawKey);
						}
						if ($(window).scrollTop() > 0) {
							initCss(1);
							window.scrollTo(0, 0);
							_this.dd.trigger("click");  //for ddclick
						}
					})
						.blur(function () {
							var newKey = _this.input.val();
							if (newKey === _this.rawKey) {
								$(this).val(_this.rawAll);
							} else {
								$(this).val(newKey);
							}
						});
					this.cancel.bind("click", function () {
						$("#mix_search_div").hide();
						$("._pre").show();
					});
					document.getElementById("clear_input").onclick = function () {
						$("#mix_search_div").hide();
						$("._pre").show();
					}
				}
			};
			m.main();
			$(window).resize(function () {
				sbox.css("width", "100%");
				sort.css("width", "100%");
			});
			//顶部sticky效果
			setTimeout(function () {
				var sboxH = sbox.height();
				var sortH = sort.height();
				var sortStart = sort.offset().top - sboxH;
				var showEnd = sort.offset().top;
				var init = function () {
					sbox.css({ "position": "fixed", "top": "0" });
					window.scrollTo(0, 0);
				};
				var rawScroll = 0, nowScroll = 0;
				var upOrDown = function () {
					var delta = 30;
					if (nowScroll > rawScroll + delta) {
						return 1;
					} else if (nowScroll < rawScroll - delta) {
						return 2;
					} else {
						return 0;
					}
				};
				var sticky = function () {
					nowScroll = $(window).scrollTop();
					if (nowScroll >= sortStart) {
						sort.css({ "position": "fixed", "top": sboxH });
						g_list.css({ "margin-top": sortH });
					} else {
						sort.attr("style", "");
						g_list.attr("style", "");
					}
					if (nowScroll > showEnd + sortH) {
						var up = upOrDown();
						if (up == 1) {
							if (sbox.css("display") != "none") {
								sbox.hide();
								sort.hide();
							}
							rawScroll = nowScroll;
						} else if (up == 2) {
							if (sbox.css("display") == "none") {
								sbox.show();
								sort.show();
							}
							rawScroll = nowScroll;
						}
					} else {
						if (sbox.css("display") == "none") {
							sbox.show();
							sort.show();
						}
					}
				};
				init();
				$(document).on("touchmove", sticky);
				$(window).on("scroll", sticky);
			}, 500);

		});

		$('.show_type').bind("click", function () {
			if ($('#goods_list').hasClass('openList')) {
				$('#goods_list').removeClass('openList');
				$(this).removeClass('show_list');
			}
			else {
				$('#goods_list').addClass('openList');
				$(this).addClass('show_list');
			}
		});    
	</script>
	<script type="text/javascript">
		function get_brand(brand_id) {
			document.getElementById('brand').value = brand_id;
			var obj = document.getElementById('brands').getElementsByTagName('li');
			for (var i = 0; i < obj.length; i++) {
				obj[i].className = '';
			}
			document.getElementById('brand_' + brand_id).className = 'on';
		}
		function get_price(price_min, price_max) {
			document.getElementById('price_min').value = price_min;
			document.getElementById('price_max').value = price_max;
			var obj = document.getElementById('prices').getElementsByTagName('a');
			for (var i = 0; i < obj.length; i++) {
				obj[i].className = '';
			}
			document.getElementById('price_' + price_min).className = 'on';
		}

		function checkSearchForm() {
			if (document.getElementById('keywords').value) {
				//var frm  = document.getElementById('searchForm');
				//var type = parseInt(document.getElementById('searchtype').value);
				//frm.action = type==0 ? 'search.php' : 'stores.php';
				return true;
			}
			else {
				alert("请输入关键词！");
				return false;
			}
		}
	</script>
	<script type="Text/Javascript" language="JavaScript">
<!--
function selectPage(sel)
{
  sel.form.submit();
}
//-->
</script>
	<script type="text/javascript">
		$('#search_text').bind('search', function () {
          //coding
         var value=$("#search_text").val();
          if(value != ''){
            window.location.href = "/mobile/Goods/goodsList?name="+value;
          }

      });


		window.onload = function () {
			//  Compare.init();
			//fixpng();
		}
	</script>
	<footer>
		<!-- <div id="bcid">盛放扫描控件的div</div>   -->
<!-- <div style="height:50px; line-height:50px; clear:both;"></div> -->
<style>
.vf_3{ background:url("__STATIC__/images/newimg/scan01.png") no-repeat}
</style>
<div class="v_nav">
	<div class="vf_nav">
		<ul>
			<li> <a href="<?php echo U('Index/index'); ?>">
			    <i class="vf_1"></i>
			    <span class="maincolor">首页</span></a></li>
			<li><a href="<?php echo U('Goods/categoryList'); ?>">
			    <i class="vf_2"></i>
			    <span>分类</span></a></li>
			<li class="scan" ><a href="<?php echo U('User/tradingFloor'); ?>">
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
	</footer>
	<script>
		function goTop() {
			$('html,body').animate({ 'scrollTop': 0 }, 600);
		}
	</script>
	<a href="javascript:goTop();" class="gotop" style=" z-index:9999"><img src="__STATIC__/images/topup.png"></a>
</body>

</html>