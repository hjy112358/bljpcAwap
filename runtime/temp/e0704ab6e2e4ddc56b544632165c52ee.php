<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:44:"./template/mobile/new/cart\shoppingCart.html";i:1558511213;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta name="Generator" content="TPshop v1.1" />
    <meta charset="UTF-8">
    <title>购物车</title>
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="__STATIC__/css/public.css" />
    <link rel="stylesheet" type="text/css" href="__STATIC__/css/index.css" />
    <link rel="stylesheet" href="__STATIC__/css/iconfont/iconfont.css">
    <link rel="stylesheet" href="__STATIC__/css/orderlist.css">
    <script type="text/javascript" src="__STATIC__/js/jquery.js"></script>
    <script type="text/javascript" src="__STATIC__/js/TouchSlide.1.1.js"></script>
    <script type="text/javascript" src="__STATIC__/js/jquery.json.js"></script>
    <script type="text/javascript" src="__STATIC__/js/touchslider.dev.js"></script>
    <script type="text/javascript" src="__STATIC__/js/layer.js"></script>
    <!-- <script src="../public/js/global.js"></script> -->
    <!-- <script src="../public/js/mobile_common.js"></script> -->
    <style>
        .wrap {
            padding-bottom: 50px
        }
    </style>

</head>

<body>
    <div class="wrap">
        <!-- <div class="pubheads maincolorbg flex jus-between align-c">
                <a  href="javascript:history.back(-1)">  <img src="__STATIC__/images/newimg/order/backW.png" alt=""></a>
            <p>我的购物车</p>
            <span>编辑</span>
        </div> -->
        <div class="maincolorbg flex jus-between align-c tophead">
            <a href="javascript:history.back(-1)" class="iconfont icon-fanhui2"></a>
            <p class="font-18">我的购物车</p>
            <span class="font-18">编辑</span>
        </div>
        <div class="tablist">
            <div id="leftTabBox" class="tabBox">
                <div class="bd">
                    <!-- 全部 -->
                    <ul>
                        <li>
                            <div class="productmsglist">
                                <ul>
                                    <li>
                                        <div class="productmsg">
                                            <div class="flex  jus-between align-c">
                                                <div class="flex  jus-start align-c">
                                                    <img src="__STATIC__/images/newimg/usr/waitcheck.png" alt=""
                                                        class="checkimg">
                                                    <img src="__STATIC__/images/newimg/order/store.png" alt=""
                                                        class="store">
                                                    <p>小天才儿童智能电话手表防水 <i>></i></p>
                                                </div>
                                                <span class="maincolor">领券</span>
                                            </div>
                                            <div class="flex  jus-start margin-t10 margin-b20"
                                                style="padding-bottom:10px">
                                                <div class=" flex   align-c">
                                                    <img src="__STATIC__/images/newimg/usr/waitcheck.png" alt=""
                                                        class="checkimg">
                                                </div>
                                                <div class="goodsimg flex  jus-start align-c">
                                                    <img src="__STATIC__/images/newimg/order/orderprouct.png" alt="">
                                                </div>
                                                <div style="max-width: 200px;margin-left:15px;">
                                                    <p class="goodsdetail">儿童智能电话手表防水定位拍照多功能儿童智能电话手表防</p>
                                                    <div class="goodproceAnum flex jus-between align-c"
                                                        style="max-width: 200px;margin-top:10px">
                                                        <span class="maincolor">￥89.00</span>
                                                        <div class="flex  jus-between align-c shopNum">
                                                            <a href="javascript:void(0)" onclick="switch_num(-1,this)">-</a>
                                                            <input type="text" value="1">
                                                            <a href="javascript:void(0)" onclick="switch_num(1,this)">+</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="productmsg">
                                            <div class="flex  jus-between align-c">
                                                <div class="flex  jus-start align-c">
                                                    <img src="__STATIC__/images/newimg/usr/waitcheck.png" alt=""
                                                        class="checkimg">
                                                    <img src="__STATIC__/images/newimg/order/store.png" alt=""
                                                        class="store">
                                                    <p>小天才儿童智能电话手表防水 <i>></i></p>
                                                </div>
                                                <span class="maincolor">领券</span>
                                            </div>
                                            <div class="flex  jus-start margin-t10 margin-b20"
                                                style="padding-bottom:10px">
                                                <div class=" flex   align-c">
                                                    <img src="__STATIC__/images/newimg/usr/waitcheck.png" alt=""
                                                        class="checkimg">
                                                </div>
                                                <div class="goodsimg flex  jus-start align-c">
                                                    <img src="__STATIC__/images/newimg/order/orderprouct.png" alt="">
                                                </div>
                                                <div style="max-width: 200px;margin-left:15px;">
                                                    <p class="goodsdetail">儿童智能电话手表防水定位拍照多功能儿童智能电话手表防</p>
                                                    <div class="goodproceAnum flex jus-between align-c"
                                                        style="max-width: 200px;margin-top:10px">
                                                        <span class="maincolor">￥89.00</span>
                                                        <div class="flex  jus-between align-c shopNum">
                                                            <a href="javascript:void(0)" onclick="switch_num(-1,this)">-</a>
                                                            <input type="text" value="2">
                                                            <a href="javascript:void(0)" onclick="switch_num(1,this)">+</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex  jus-start margin-t10 margin-b20"
                                                style="padding-bottom:10px">
                                                <div class=" flex   align-c">
                                                    <img src="__STATIC__/images/newimg/usr/waitcheck.png" alt=""
                                                        class="checkimg">
                                                </div>
                                                <div class="goodsimg flex  jus-start align-c">
                                                    <img src="__STATIC__/images/newimg/order/orderprouct.png" alt="">
                                                </div>
                                                <div style="max-width: 200px;margin-left:15px;">
                                                    <p class="goodsdetail">儿童智能电话手表防水定位拍照多功能儿童智能电话手表防</p>
                                                    <div class="goodproceAnum flex jus-between align-c"
                                                        style="max-width: 200px;margin-top:10px">
                                                        <span class="maincolor">￥89.00</span>
                                                        <div class="flex  jus-between align-c shopNum">
                                                            <a href="javascript:void(0)" onclick="switch_num(-1,this)">-</a>
                                                            <input type="text" value="1">
                                                            <a href="javascript:void(0)" onclick="switch_num(1,this)">+</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="settle flex jus-between align-c">
            <div class="flex jus-start align-c">
                <img src="__STATIC__/images/newimg/usr/waitcheck.png" alt="">
                <p class="font-12">全选</p>
            </div>
            <div class="flex jus-start align-c">
                <p class="font-12">合计：<span class="maincolor font-14">￥400</span></p>
                <p class="accounts font-15 maincolorbg">结算(1)</p>
            </div>
        </div>
    </div>
</body>
<script>
    function switch_num(num, _this) {
        var num2 =parseInt($(_this).prev().val())
        num2 += num;
        if (num2 < 1) num2 = 1; 
        console.log(num2)
        $(_this).prev().val(num2);
    }
</script>

</html>