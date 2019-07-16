<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:40:"./template/mobile/new/user\indexNew.html";i:1557376435;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta name="Generator" content="TPshop1.2" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <title>个人中心</title>
    <meta http-equiv="keywords" content="<?php echo $tpshop_config['shop_info_store_keyword']; ?>" />
    <meta name="description" content="<?php echo $tpshop_config['shop_info_store_desc']; ?>" />
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="__STATIC__/css/public.css" />
    <link rel="stylesheet" type="text/css" href="__STATIC__/css/topdetail.css" />
    <script type="text/javascript" src="__STATIC__/js/jquery.js"></script>
    <script type="text/javascript" src="__STATIC__/js/common.js"></script>
    <script type="text/javascript" src="__STATIC__/js/layer.js"></script>
</head>

<body id="">

    <div class="wrap settingwrap" id="signIn">
        <div class=" setting">
            <div class="registerTitlew flex jus-center align-c ">
                <a href="javascript:history.back();">
                    <img src="__STATIC__/images/newimg/order/backW.png" alt="">
                </a>
                <p>个人中心</p>
            </div>
            <div class="flex jus-between align-c usermsg">
                <div class="flex jus-start align-c">
                    <div class="userimg">
                        <img src="__STATIC__/images/newimg/usr/userimg.png" alt="">
                    </div>
                    <div class="editbox">
                        <span>HIao</span>
                        <a href="<?php echo U('User/setting'); ?>">
                            <img src="__STATIC__/images/newimg/usr/indexedit.png" alt="" class="editimg">
                        </a>
                    </div>
                </div>

                <div class="signin flex jus-start align-c">
                    <img src="__STATIC__/images/newimg/usr/signin.png" alt="">
                    <span class="maincolor">签到</span>
                </div>
            </div>
            <div class="classifylist clearfix">
                <ul>
                    <li>
                        <a href="<?php echo U('User/wallet'); ?>" style="color:#fff">
                            <p>我的钱包</p>
                            <span>5</span>
                        </a>
                    </li>
                    <li>
                        <p>我的收藏</p>
                        <span>5</span>
                    </li>
                    <li>
                        <p>我的关注</p>
                        <span>5</span>
                    </li>
                </ul>
            </div>
        </div>

        <div class="signMainbox">
            <div class="myorder">
                <div class="signinTitle flex jus-between align-c margin-t10">
                    <div class="flex jus-start align-c">
                        <i class="maincolorbg"></i>
                        <p>我的订单</p>
                    </div>
                    <span>查看全部订单</span>
                </div>
                <div class="orderStatus clearfix">
                    <ul>
                        <li>
                            <div>
                                <div class="statimg  pos-r">
                                    <img src="__STATIC__/images/newimg/usr/daifukuan.png" alt="" width="28px"
                                        height="20px">
                                    <i class="maincolorbg  pos-a">1</i>
                                </div>
                                <p class="maincolor">待付款</p>

                            </div>
                        </li>
                        <li>
                            <div>
                                <div class="statimg  pos-r">
                                    <img src="__STATIC__/images/newimg/usr/daifahuo.png" alt="" width="25px"
                                        height="20px">
                                    <i class="maincolorbg pos-a">1</i>
                                </div>
                                <p class="maincolor">待发货</p>

                            </div>
                        </li>
                        <li>
                            <div>
                                <div class="statimg  pos-r">
                                    <img src="__STATIC__/images/newimg/usr/qianshou.png" alt="" width="15px"
                                        height="15px">
                                    <i class="maincolorbg pos-a">1</i>
                                </div>

                                <p class="maincolor">待评价</p>

                            </div>
                        </li>
                        <li>
                            <div>
                                <div class="statimg pos-r">
                                    <img src="__STATIC__/images/newimg/usr/tuikuan.png" alt="" width="21px"
                                        height="21px">
                                    <i class="maincolorbg pos-a">1</i>
                                </div>
                                <p class="maincolor">退款/售后</p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="newlogistics ">
                    <div class="flex jus-between align-c">
                        <p>最新物流</p>
                        <p>4-28</p>
                    </div>
                    <div class="flex jus-start align-c" style="padding-top:15px;padding-bottom:13px">
                        <div class="goodsimg">
                            <img src="__STATIC__/images/newimg/goods/classifyPic.png" alt="">
                        </div>
                        <div class="distribution">
                            <p class="maincolor">配送中</p>
                            <span>【南通市】配送远小张 1885645645正在为你派送中</span>
                        </div>
                    </div>
                </div>
                <div class="signinTitle flex  align-c margin-t10">
                    <div class="flex jus-start align-c">
                        <i class="maincolorbg"></i>
                        <p>我的资产</p>
                    </div>
                </div>
                <div class="propertylist">
                    <ul>
                        <li class="flex align-c jus-start">
                            <div class="flex align-c">
                                <img src="__STATIC__/images/newimg/usr/iconfontredpacket.png" alt="">
                            </div>
                            <p>我的红包</p>
                            <span>老板购物车要满了，快来清空</span>
                        </li>
                        <li class="flex align-c jus-start">
                            <div class="flex align-c">
                                <img src="__STATIC__/images/newimg/usr/integral.png" alt="">
                            </div>
                            <p>我的积分</p>
                            <span>愿望还没实现？过来试试看</span>
                        </li>
                        <li class="flex align-c jus-start">
                            <div class="flex align-c">
                                <img src="__STATIC__/images/newimg/usr/balance.png" alt="">
                            </div>
                            <p>我的余额</p>
                            <span>满满的余额，满满的余额</span>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
        <div class="nextStep">
            <a href="javascript:void(0)">退出登录</a>
        </div>
    </div>

</body>

</html>