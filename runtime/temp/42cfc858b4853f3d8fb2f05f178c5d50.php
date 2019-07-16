<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:42:"./template/mobile/new/order\orderlist.html";i:1558506298;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta name="Generator" content="TPshop v1.1" />
    <meta charset="UTF-8">
    <title>订单详情</title>
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="__STATIC__/css/public.css" />
    <link rel="stylesheet" type="text/css" href="__STATIC__/css/index.css" />
    <link rel="stylesheet" href="__STATIC__/css/orderlist.css">
    <link rel="stylesheet" href="__STATIC__/css/iconfont/iconfont.css">
    <script type="text/javascript" src="__STATIC__/js/jquery.js"></script>
    <script type="text/javascript" src="__STATIC__/js/TouchSlide.1.1.js"></script>
    <script type="text/javascript" src="__STATIC__/js/jquery.json.js"></script>
    <script type="text/javascript" src="__STATIC__/js/touchslider.dev.js"></script>
    <script type="text/javascript" src="__STATIC__/js/layer.js"></script>
    <script src="__PUBLIC__/js/global.js"></script>
    <script src="__PUBLIC__/js/mobile_common.js"></script>
    <script type="text/javascript" src="__STATIC__/js/TouchSlide.1.1.js"></script>

</head>

<body>
    <div class="wrap">
        <!-- <div class="orderlisthead maincolorbg ">
            <p>我的订单</p>
        </div> -->
        <div class="maincolorbg flex jus-between align-c tophead">
            <a href="javascript:history.back(-1)" class="iconfont icon-fanhui2"></a>
            <p class="font-18">我的订单</p>
            <a href=""></a>
        </div>
        <div class="tablist">
            <div id="leftTabBox" class="tabBox">
                <div class="hd">
                    <ul>
                        <li class="maincolor on">全部</li>
                        <li class="maincolor">待付款</li>
                        <li class="maincolor">待收货</li>
                        <li class="maincolor">待评价</li>
                    </ul>
                </div>
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
                                                    <img src="__STATIC__/images/newimg/order/store.png" alt=""
                                                        class="store">
                                                    <p>小天才儿童智能电话手表防水0 <i>></i></p>
                                                </div>
                                                <span class="maincolor">待发货</span>
                                            </div>
                                            <div class="flex  jus-between margin-t10 margin-b20">
                                                <div class="goodsimg flex  jus-start align-c">
                                                    <img src="__STATIC__/images/newimg/order/orderprouct.png" alt="">
                                                </div>
                                                <p class="goodsdetail">儿童智能电话手表防水定位拍照多功能儿童智能电话手表防</p>
                                                <div class="goodproceAnum ">
                                                    <span>￥89.00</span>
                                                    <span class="goodsnum">x 1</span>
                                                </div>
                                            </div>
                                            <p class="total ">共1件商品 合计：￥89.00</p>
                                        </div>

                                    </li>
                                    <li>
                                        <div class="productmsg">
                                            <div class="flex  jus-between align-c">
                                                <div class="flex  jus-start align-c">
                                                    <img src="__STATIC__/images/newimg/order/store.png" alt=""
                                                        class="store">
                                                    <p>小天才儿童智能电话手表防水 <i>></i></p>
                                                </div>
                                                <span class="maincolor">待评价</span>
                                            </div>
                                            <div class="flex  jus-between margin-t10 margin-b20">
                                                <div class="goodsimg flex  jus-start align-c">
                                                    <img src="__STATIC__/images/newimg/order/orderprouct.png" alt="">
                                                </div>
                                                <p class="goodsdetail">儿童智能电话手表防水定位拍照多功能儿童智能电话手表防</p>
                                                <div class="goodproceAnum ">
                                                    <span>￥89.00</span>
                                                    <span class="goodsnum">x 1</span>
                                                </div>
                                            </div>
                                            <div class="flex  jus-between margin-t10 margin-b20">
                                                <div class="goodsimg flex  jus-start align-c">
                                                    <img src="__STATIC__/images/newimg/order/orderprouct.png" alt="">
                                                </div>
                                                <p class="goodsdetail">儿童智能电话手表防水定位拍照多功能儿童智能电话手表防</p>
                                                <div class="goodproceAnum ">
                                                    <span>￥89.00</span>
                                                    <span class="goodsnum">x 1</span>
                                                </div>
                                            </div>


                                            <p class="total ">共2件商品 合计：￥89.00</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                    <!-- 待付款 -->
                    <ul>
                        <li>
                            <div class="productmsglist">
                                <ul>
                                    <li>
                                        <div class="productmsg">
                                            <div class="flex  jus-between align-c">
                                                <div class="flex  jus-start align-c">
                                                    <img src="__STATIC__/images/newimg/order/store.png" alt=""
                                                        class="store">
                                                    <p>小天才儿童智能电话手表防水 1<i>></i></p>
                                                </div>
                                                <span class="maincolor">待付款</span>
                                            </div>
                                            <div class="flex  jus-between margin-t10 margin-b20">
                                                <div class="goodsimg flex  jus-start align-c">
                                                    <img src="__STATIC__/images/newimg/order/orderprouct.png" alt="">
                                                </div>
                                                <p class="goodsdetail">儿童智能电话手表防水定位拍照多功能儿童智能电话手表防</p>
                                                <div class="goodproceAnum ">
                                                    <span>￥89.00</span>
                                                    <span class="goodsnum">x 1</span>
                                                </div>
                                            </div>
                                            <p class="total ">共1件商品 合计：￥89.00</p>
                                        </div>

                                    </li>
                                    <li>
                                        <div class="productmsg">
                                            <div class="flex  jus-between align-c">
                                                <div class="flex  jus-start align-c">
                                                    <img src="__STATIC__/images/newimg/order/store.png" alt=""
                                                        class="store">
                                                    <p>小天才儿童智能电话手表防水 <i>></i></p>
                                                </div>
                                                <span class="maincolor">待付款</span>
                                            </div>
                                            <div class="flex  jus-between margin-t10 margin-b20">
                                                <div class="goodsimg flex  jus-start align-c">
                                                    <img src="__STATIC__/images/newimg/order/orderprouct.png" alt="">
                                                </div>
                                                <p class="goodsdetail">儿童智能电话手表防水定位拍照多功能儿童智能电话手表防</p>
                                                <div class="goodproceAnum ">
                                                    <span>￥89.00</span>
                                                    <span class="goodsnum">x 1</span>
                                                </div>
                                            </div>
                                            <div class="flex  jus-between margin-t10 margin-b20">
                                                <div class="goodsimg flex  jus-start align-c">
                                                    <img src="__STATIC__/images/newimg/order/orderprouct.png" alt="">
                                                </div>
                                                <p class="goodsdetail">儿童智能电话手表防水定位拍照多功能儿童智能电话手表防</p>
                                                <div class="goodproceAnum ">
                                                    <span>￥89.00</span>
                                                    <span class="goodsnum">x 1</span>
                                                </div>
                                            </div>


                                            <p class="total ">共2件商品 合计：￥89.00</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                    <!-- 待收货 -->
                    <ul>
                        <li>
                            <div class="productmsglist">
                                <ul>
                                    <li>
                                        <div class="productmsg">
                                            <div class="flex  jus-between align-c">
                                                <div class="flex  jus-start align-c">
                                                    <img src="__STATIC__/images/newimg/order/store.png" alt=""
                                                        class="store">
                                                    <p>小天才儿童智能电话手表防水2 <i>></i></p>
                                                </div>
                                                <span class="maincolor">待收货</span>
                                            </div>
                                            <div class="flex  jus-between margin-t10 margin-b20">
                                                <div class="goodsimg flex  jus-start align-c">
                                                    <img src="__STATIC__/images/newimg/order/orderprouct.png" alt="">
                                                </div>
                                                <p class="goodsdetail">儿童智能电话手表防水定位拍照多功能儿童智能电话手表防</p>
                                                <div class="goodproceAnum ">
                                                    <span>￥89.00</span>
                                                    <span class="goodsnum">x 1</span>
                                                </div>
                                            </div>
                                            <p class="total ">共1件商品 合计：￥89.00</p>
                                        </div>

                                    </li>
                                    <li>
                                        <div class="productmsg">
                                            <div class="flex  jus-between align-c">
                                                <div class="flex  jus-start align-c">
                                                    <img src="__STATIC__/images/newimg/order/store.png" alt=""
                                                        class="store">
                                                    <p>小天才儿童智能电话手表防水 <i>></i></p>
                                                </div>
                                                <span class="maincolor">待收货</span>
                                            </div>
                                            <div class="flex  jus-between margin-t10 margin-b20">
                                                <div class="goodsimg flex  jus-start align-c">
                                                    <img src="__STATIC__/images/newimg/order/orderprouct.png" alt="">
                                                </div>
                                                <p class="goodsdetail">儿童智能电话手表防水定位拍照多功能儿童智能电话手表防</p>
                                                <div class="goodproceAnum ">
                                                    <span>￥89.00</span>
                                                    <span class="goodsnum">x 1</span>
                                                </div>
                                            </div>
                                            <div class="flex  jus-between margin-t10 margin-b20">
                                                <div class="goodsimg flex  jus-start align-c">
                                                    <img src="__STATIC__/images/newimg/order/orderprouct.png" alt="">
                                                </div>
                                                <p class="goodsdetail">儿童智能电话手表防水定位拍照多功能儿童智能电话手表防</p>
                                                <div class="goodproceAnum ">
                                                    <span>￥89.00</span>
                                                    <span class="goodsnum">x 1</span>
                                                </div>
                                            </div>


                                            <p class="total ">共2件商品 合计：￥89.00</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                    <!-- 待评价 -->
                    <ul>
                        <li>
                            <div class="productmsglist">
                                <ul>
                                    <li>
                                        <div class="productmsg">
                                            <div class="flex  jus-between align-c">
                                                <div class="flex  jus-start align-c">
                                                    <img src="__STATIC__/images/newimg/order/store.png" alt=""
                                                        class="store">
                                                    <p>小天才儿童智能电话手表防水3 <i>></i></p>
                                                </div>
                                                <span class="maincolor">待评价</span>
                                            </div>
                                            <div class="flex  jus-between margin-t10 margin-b20">
                                                <div class="goodsimg flex  jus-start align-c">
                                                    <img src="__STATIC__/images/newimg/order/orderprouct.png" alt="">
                                                </div>
                                                <p class="goodsdetail">儿童智能电话手表防水定位拍照多功能儿童智能电话手表防</p>
                                                <div class="goodproceAnum ">
                                                    <span>￥89.00</span>
                                                    <span class="goodsnum">x 1</span>
                                                </div>
                                            </div>
                                            <p class="total ">共1件商品 合计：￥89.00</p>
                                        </div>

                                    </li>
                                    <li>
                                        <div class="productmsg">
                                            <div class="flex  jus-between align-c">
                                                <div class="flex  jus-start align-c">
                                                    <img src="__STATIC__/images/newimg/order/store.png" alt=""
                                                        class="store">
                                                    <p>小天才儿童智能电话手表防水 <i>></i></p>
                                                </div>
                                                <span class="maincolor">待评价</span>
                                            </div>
                                            <div class="flex  jus-between margin-t10 margin-b20">
                                                <div class="goodsimg flex  jus-start align-c">
                                                    <img src="__STATIC__/images/newimg/order/orderprouct.png" alt="">
                                                </div>
                                                <p class="goodsdetail">儿童智能电话手表防水定位拍照多功能儿童智能电话手表防</p>
                                                <div class="goodproceAnum ">
                                                    <span>￥89.00</span>
                                                    <span class="goodsnum">x 1</span>
                                                </div>
                                            </div>
                                            <div class="flex  jus-between margin-t10 margin-b20">
                                                <div class="goodsimg flex  jus-start align-c">
                                                    <img src="__STATIC__/images/newimg/order/orderprouct.png" alt="">
                                                </div>
                                                <p class="goodsdetail">儿童智能电话手表防水定位拍照多功能儿童智能电话手表防</p>
                                                <div class="goodproceAnum ">
                                                    <span>￥89.00</span>
                                                    <span class="goodsnum">x 1</span>
                                                </div>
                                            </div>


                                            <p class="total ">共2件商品 合计：￥89.00</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</body>

<script type="text/javascript">
    TouchSlide({
        slideCell: "#leftTabBox", defaultIndex: 1
    });
</script>

</html>