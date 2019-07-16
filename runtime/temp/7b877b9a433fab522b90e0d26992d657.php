<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:37:"./template/mobile/new/cart\cart2.html";i:1558679967;s:40:"./template/mobile/new/public\footer.html";i:1556698550;}*/ ?>
<!DOCTYPE html>
<html>

<head>
  <meta name="Generator" content="tpshop" />
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width">
  <title>购物流程-<?php echo $tpshop_config['shop_info_store_title']; ?></title>
  <meta http-equiv="keywords" content="<?php echo $tpshop_config['shop_info_store_keyword']; ?>" />
  <meta name="description" content="<?php echo $tpshop_config['shop_info_store_desc']; ?>" />
  <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
  <link rel="stylesheet" href="__STATIC__/css/public.css">
  <link rel="stylesheet" href="__STATIC__/css/flow.css">
  <link rel="stylesheet" href="__STATIC__/css/style_jm.css">
  <link rel="stylesheet" href="__STATIC__/css/iconfont/iconfont.css">
  <script type="text/javascript" src="__STATIC__/js/jquery.js"></script>
  <script src="__PUBLIC__/js/global.js"></script>
  <script src="__PUBLIC__/js/mobile_common.js"></script>
</head>

<body style="background: rgb(235, 236, 237);position:relative;">
  <div class="tab_nav">
    <!-- <div class="header">
    <div class="h-left"> <a class="sb-back" href="javascript:history.back(-1)" title="返回"></a> </div>
    <div class="h-mid"> 确认订单 </div>
  </div> -->
    <div class="maincolorbg flex jus-between align-c tophead">
      <a href="javascript:history.back(-1)" class="iconfont icon-fanhui2"></a>
      <p class="font-18">确认订单</p>
      <a href=""></a>
    </div>


  </div>
  <div class="screen-wrap fullscreen login">
    <form name="cart2_form" id="cart2_form" method="post">
      <section class="content" style="min-height: 294px;">
        <div class="wrap">
          <div class="active" style="min-height: 294px;">
            <div class="content-buy">
              <div class="wrap order-buy">
                <a href="<?php echo U('User/address_list',array('source'=>'cart2')); ?>">
                  <section class="address">
                    <div class="address-info">收货人:
                      <p class="address-name"><?php echo $address['consignee']; ?></p>
                      <p class="address-phone"><?php echo $address['mobile']; ?></p>
                    </div>
                    <div class="address-details">收货地址：<?php echo $address['address']; ?></div>
                    <input type="hidden" value="<?php echo $address['address_id']; ?>" name="address_id" />
                  </section>
                </a>
                <section class="order " id="order4">

                  <section class="order-info" style=" margin-top:0px;">
                    <div class="order-list">
                      <ul class="order-list-info">
                        <!--商品列表-->
                        <?php if(is_array($storeList) || $storeList instanceof \think\Collection): if( count($storeList)==0 ) : echo "" ;else: foreach($storeList as $key=>$v): ?>

                          <div class="goods-list-title"> <?php echo $v[store_name]; ?></div>
                          <?php if(is_array($v['cartlist']) || $v['cartlist'] instanceof \think\Collection): if( count($v['cartlist'])==0 ) : echo "" ;else: foreach($v['cartlist'] as $k=>$v2): if(($v2[selected] == '1') and ($v2[store_id] == $v[store_id])): ?>
                              <li class="item">
                                <div class="itemPay list-price-nums" id="itemPay17">
                                  <p class="price">￥<?php echo $v2['goods_price']; ?>元</p>
                                  <p class="nums">x<?php echo $v2['goods_num']; ?></p>
                                </div>
                                <div class="itemInfo list-info" id="itemInfo12">
                                  <div class="list-img"> <a
                                      href="<?php echo U('Mobile/Goods/goodsInfo',array('id'=>$v2[goods_id])); ?>"> <img
                                        src="<?php echo goods_thum_images($v2['goods_id'],200,200); ?>"></a> </div>
                                  <div class="list-cont">
                                    <h5 class="goods-title"><?php echo $v2['goods_name']; ?> </h5>
                                    <p class="godds-specification"><?php echo $v2['attr_value']; ?></p>
                                  </div>
                                </div>
                              </li>
                            <?php endif; endforeach; endif; else: echo "" ;endif; ?>
                          <li class="flow_youhui_no">
                            <div class="checkout_other">
                              <div class="jmbag" href="javascript:void(0);" onClick="showCheckoutOther(this);"><span
                                  class="right_arrow_flow"></span>赠送Z券：<?php echo $v['zcoupon_num']; ?></div>


                            </div>
                          </li>
                        <?php endforeach; endif; else: echo "" ;endif; ?>


                      </ul>
                    </div>
                  </section>
                </section>


                <!-- <section class="order-info">
                  <div class="order-list">
                    <div class="content ptop0">
                      <div class="panel panel-default info-box">
                        <div class="orderInfo ">
                          <h4 class="seller-name"> <img src="__STATIC__/images/flow/dingdan.png" width="28"> 其他选项 </h4>
                        </div>
                        <table border=0 cellpadding=0 cellspacing=0 width="100%" class="checkgoods">
                          <tr>
                            <td colspan=4 class="tdother2" style="border-top:none;">
                              <div class="checkout_other">
                                <div class="jmbag" href="javascript:void(0);" onClick="showCheckoutOther(this);"><span
                                    class="right_arrow_flow"></span>开发票和缺货处理</div>
                                <div class="subbox_other" width="100%">
                                  <table id='normal_invoice_tbody' width="100%">
                                    <tr>
                                      <td align=right style="vertical-align:top" width="84">发票抬头：</td>
                                      <td colspan="2">
                                        <input class="txt1" style='vertical-align:middle' type="text"
                                          name="invoice_title" placeholder="XXX单位 或 XX个人" />
                                      </td>
                                    </tr>
                                  </table>
                                </div>
                              </div>
                            </td>
                          </tr>
                        </table>
                        <div style="height:10px; line-height:10px; clear:both;"></div>
                      </div>
                    </div>
                  </div>
                </section> -->
                <section class="order-info">
                  <div class="order-list">
                    <div class="content ptop0">
                      <div class="panel panel-default info-box">
                        <div class="con-ct fo-con">
                          <ul class="ct-list order_total_ul" id="ECS_ORDERTOTAL">
                            <li class="order_total_li">
                              *该订单完成后，您将获得 <span class="price">相应的</span> Z券<br />
                            </li>
                            <li>
                              <div class="subtotal">
                                <span class="total-text">商品总额：</span><em class="price">￥<?php echo $total_price; ?>元</em><br />

                                <span class="total-text">应付金额：</span>￥<strong class="price_total"
                                  id="payables"><?php echo $total_price; ?></strong>元
                                <span class="total-text" style=""></span>
                              </div>
                            </li>
                          </ul>
                        </div>
                        <div class="panel panel-default info-box">
                          <div class="pay-btn">
                            <input onClick="submit_order();" type="button" class="sub-btn btnRadius" value="提交订单" />
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </section>
              </div>
            </div>
          </div>
        </div>
      </section>
    </form>
  </div>
  <section class="f_mask" style="display: none;"></section>
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
  <script type="text/javascript">

    function submit_order() {
      console.log($('#cart2_form').serialize());
      $.ajax({
        type: "POST",
        url: "<?php echo U('Mobile/Cart/ajaxorder'); ?>",//+tab,
        data: $('#cart2_form').serialize() + "&act=submit_order",// 你的formid
        dataType: "json",
        success: function (data) {
          if (data['status'] == '1') {
            alert('订单提交成功，跳转支付页面!');
            if (data['master_order_sn'] == '') {
              location.href = "/index.php?m=Mobile&c=Cart&a=cart4&order_id=" + data.order_id + "&zcoupon=" + data.zcoupon; // 跳转到结算页			
            } else {
              location.href = "/index.php?m=Mobile&c=Cart&a=cart4&master_order_sn=" + data.master_order_sn + "&zcoupon=" + data.zcoupon; // 跳转到结算页	
            }
          } else {
            alert(data['msg']);
          }
        }
      });
    }
  </script>
</body>

</html>