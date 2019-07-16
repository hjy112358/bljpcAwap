<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:40:"./template/mobile/new/user\indexnew.html";i:1562849865;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta name="Generator" content="TPshop1.2" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <!-- <title>个人中心</title> -->
    <title></title>
    <meta http-equiv="keywords" content="<?php echo $tpshop_config['shop_info_store_keyword']; ?>" />
    <meta name="description" content="<?php echo $tpshop_config['shop_info_store_desc']; ?>" />
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="__STATIC__/css/public.css?time=<?php echo time()?>" />
    <link rel="stylesheet" type="text/css" href="__STATIC__/css/topdetail.css" />
    <link rel="stylesheet" href="__STATIC__/css/iconfont/iconfont.css">
    <script type="text/javascript" src="__STATIC__/js/jquery.js"></script>
    <script type="text/javascript" src="__STATIC__/js/common.js"></script>
    <script type="text/javascript" src="__STATIC__/js/layer.js"></script>
</head>

<body id="personCenter">

    <div class="wrap settingwrap" id="signIn">
        <div class=" setting" style="padding:0 15px;">
            <!-- <div class=" flex jus-between align-c tophead">
                <a href="<?php echo url('index/index'); ?>" class="iconfont icon-fanhui2"></a>
                <p class="font-18">个人中心</p>
                <a href=""></a>
            </div> -->
            <div class=" tophead " id="topAnchor" style="text-align: center;">
                <p class="font-18" style="margin-left:0">个人中心</p>
            </div>
            <div class="flex jus-between align-c usermsg">
                <div class="flex jus-between align-c" style="width:100%">
                    <div class="flex jus-start align-c">
                        <div class="userimg">
                            <img src="<?php echo $user_info['head_pic']; ?>" alt="">
                        </div>
                        <div class="editbox ">
                            <a href="<?php echo U('User/settingNew'); ?>">
                                <span><?php echo $user_info['nickname']; ?></span>
                                <img src="__STATIC__/images/newimg/usr/indexedit.png" alt="" class="editimg">
                            </a>
                        </div>
                    </div>
                    <!-- <div class="signin flex jus-start align-c">
                        <img src="__STATIC__/images/newimg/usr/signin.png" alt="">
                        <span class="maincolor">签到</span>
                    </div> -->
                    <!-- <div class="editbtn">
                        <img src="__STATIC__/images/newimg/usr/menu.png" alt="" width="19" height="19">
                    </div> -->
                </div>
            </div>
            <!-- <div class="classifylist clearfix">
                <ul>
                    <li>
                        <a href="<?php echo U('User/wallet'); ?>" style="color:#fff">
                            <p>我的钱包</p>
                            <span>5</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo U('User/mycollect'); ?>" style="color:#fff">
                            <p>我的收藏</p>
                            <span>5</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo U('User/myInterest'); ?>" style="color:#fff">
                            <p>我的关注</p>
                            <span>5</span>
                        </a>
                    </li>
                </ul>
            </div> -->
        </div>


        <div class="personClassify">
            <div>
                <ul class="clearfix spantop">
                    <li>
                        <a href="<?php echo U('User/wallet'); ?>">
                            <img src="__STATIC__/images/newimg/usr/perWallet.png" alt="" width="21" height="18">
                            <p class="font-12">我的钱包</p>
                            <a href="">

                    </li>
                    <li class="pos-r">
                        <a href="<?php echo U('User/mycollect'); ?>">
                            <img src="__STATIC__/images/newimg/usr/perCollect.png" alt="" width="20" height="17">
                            <p class="font-12">我的收藏</p>
                            <span>10</span>
                        </a>
                    </li>
                    <li class="pos-r">
                        <a href="<?php echo U('User/myInterest'); ?>">
                            <img src="__STATIC__/images/newimg/usr/perStore.png" alt="" width="23" height="19">
                            <p class="font-12">关注店铺</p>
                            <span>10</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div style="margin-top:15px;">
                <ul class="clearfix">
                    <li>
                        <a href="<?php echo U('User/teamReturn'); ?>">
                            <img src="__STATIC__/images/newimg/usr/perStar.png" alt="" width="19" height="19">
                            <p class="font-12">我的星级</p>
                        <span class="font-14"><?php echo $star; ?></span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo U('User/couponew'); ?>">
                            <img src="__STATIC__/images/newimg/usr/perZ.png" alt="" width="21" height="15">
                            <p class="font-12">我的Z券</p>
						<?php if($zquan < 0): ?>
                            <span class="font-14">0</span>
                        <?php endif; if($zquan > 0): ?>
                        <span class="font-14"><?php echo $zquan; ?></span>
						<?php endif; ?>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo U('User/teamReturnRebate'); ?>">
                            <img src="__STATIC__/images/newimg/usr/perRecommend.png" alt="" width="20" height="20">
                            <p class="font-12">推荐人数</p>
                        <span class="font-14"><?php echo $yidai; ?></span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="signMainbox">
            <div class="myorder">
                <div class="signinTitle " style="margin-top:20px">
                    <p class="font-17">我的<span style="color:#fdfecb">订单</span></p>
                    <span class="allorder"><a href="<?php echo url('order/orderlist_all'); ?>">查看全部订单</a></span>
                </div>
                <div class="orderStatus clearfix">
                    <div class="orderstatusbox">
                        <ul class="clearfix">
                            <li>
                                <a href="<?php echo url('order/orderlist_daifu'); ?>">
                                    <div>
                                        <div class="statimg  pos-r">
                                            <img src="__STATIC__/images/newimg/usr/daifukuan.png" alt="" width="28px"
                                                height="20px">
                                            <i class="maincolorbg  pos-a"><?php echo $daifu; ?></i>
                                        </div>
                                        <p class="maincolor">待付款</p>

                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo url('order/orderlist_weifa'); ?>">
                                    <div>
                                        <div class="statimg  pos-r">
                                            <img src="__STATIC__/images/newimg/usr/daishou.png" alt="" width="23px"
                                                height="23px">
                                            <i class="maincolorbg pos-a"><?php echo $weifa; ?></i>
                                        </div>
                                        <p class="maincolor">待发货</p>

                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo url('order/orderlist_daishou'); ?>">
                                    <div>
                                        <div class="statimg  pos-r">
                                            <img src="__STATIC__/images/newimg/usr/daifahuo.png" alt="" width="25px"
                                                height="20px">
                                            <i class="maincolorbg pos-a"><?php echo $daishou; ?></i>
                                        </div>
                                        <p class="maincolor">待收货</p>

                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo url('order/allevaluate'); ?>">
                                    <div>
                                        <div class="statimg  pos-r">
                                            <img src="__STATIC__/images/newimg/usr/qianshou.png" alt="" width="18px"
                                                height="19px">
                                            <!-- <i class="maincolorbg pos-a"><?php echo $daiping; ?></i> -->
                                        </div>

                                        <p class="maincolor">评价</p>

                                    </div>
                                </a>
                            </li>
                            <li>
                                <!-- <a href="<?php echo url('user/afterScale'); ?>"> -->
                                <a href="javascript:void(0)" id="contact">
                                    <div>
                                        <div class="statimg pos-r">
                                            <img src="__STATIC__/images/newimg/usr/tuikuan.png" alt="" width="21px"
                                                height="21px">
                                            <!-- <i class="maincolorbg pos-a"><?php echo $shouhou; ?></i> -->
                                        </div>
                                        <p class="maincolor">退款/售后</p>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>

                </div>
                <!-- <div class="newlogistics ">
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
                            <span>【南通市】配送员小张 1885645645正在为你派送中</span>
                        </div>
                    </div>
                </div> -->
                <div class="signinTitle" style="margin-top:20px">
                    <p class="font-17">我的<span style="color:#fdfecb">资产</span></p>
                </div>
                <div class="propertylist pos-r">
                    <ul>
                        <li class="flex align-c jus-start">
                            <a href="<?php echo U('User/shareCode'); ?>" class="flex align-c jus-start">
                                <div class="flex align-c">
                                    <img src="__STATIC__/images/newimg/usr/friend.png" alt="">
                                </div>
                                <p>邀请好友</p>
                                <span>快邀请好友加入必量家吧！</span>
                            </a>
                        </li>
                        <li class="">
                            <a href="<?php echo U('User/memberRegistrate'); ?>" class="flex align-c jus-start">
                                <div class="flex align-c">
                                    <img src="__STATIC__/images/newimg/usr/member.png" alt="">
                                </div>
                                <p>会员注册</p>
                                <span>协助好友注册，快速开通账号</span>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)" class="flex align-c jus-start">
                                <div class="flex align-c">
                                    <img src="__STATIC__/images/newimg/usr/balance.png" alt="">
                                </div>
                                <p>我的余额</p>
                                <span>满满的余额，满满的余额</span>
                            </a>
                        </li>
                        <li class="">
                            <a href="javascript:void(0)" class="flex align-c jus-start">
                                <div class=" flex align-c">
                                    <img src="__STATIC__/images/newimg/usr/joinin.png" alt="">
                                </div>
                                <p>申请店铺</p>
                                <span>注册店铺，一起暴富</span>
                            </a>
                        </li>

                    </ul>



                    <img src="__STATIC__/images/newimg/usr/img001.png" alt="" class="pos-a property">
                </div>
            </div>
            <div class="nextStep">
                <a href="<?php echo U('user/logout'); ?>">退出登录</a>
            </div>
        </div>

    </div>

    <div class="contact hidden">
        <div class="contactimg">
            <p class="font-14">拨打电话<span>(0513) 5588 5526</span></p>
            <a href="tel:0513-5588-5526" class="contactus"></a>
            <img src="__STATIC__/images/newimg/onebuy/close.png" alt="" class="closeimg">
        </div>
    </div>
</body>

<!--选择头像弹窗 -->
<div class="uploadimg hidden">
    <div class="checklist">
        <ul>
            <li class="takePhoto">
                拍照
                <!-- <input type="file" capture="camera" ref="filetest" accept="image/*" id="filetest" name="filetest"
                    class=""> -->
            </li>
            <li class="album">从相册里选择</li>
            <li class="maincolor cancle">取消</li>
        </ul>
    </div>
</div>
<script>

    $(".userimg").on("click", function () {
        $(".uploadimg").removeClass("hidden")
    })

    $(".cancle").on("click", function () {
        $(".uploadimg").addClass("hidden")
    })


    $("#contact").on("click", function () {
        $(".contact").removeClass("hidden")
    })

    $(".closeimg").on("click", function () {
        $(".contact").addClass("hidden")
    })

</script>

</html>