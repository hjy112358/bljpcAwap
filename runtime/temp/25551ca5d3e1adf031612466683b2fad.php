<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:43:"./template/mobile/new/store\storegoods.html";i:1559006590;s:44:"./template/mobile/new/public\foot_store.html";i:1558922128;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta name="Generator" content="TPshop v1.1" />
    <meta charset="UTF-8">
    <title>我的店铺</title>
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="__STATIC__/css/public.css" />
    <link rel="stylesheet" type="text/css" href="__STATIC__/css/index.css" />
    <link rel="stylesheet" href="__STATIC__/css/store.css">
    <link rel="stylesheet" href="__STATIC__/css/swiper.min.css">
    <link rel="stylesheet" href="__STATIC__/css/iconfont/iconfont.css">
    <script type="text/javascript" src="__STATIC__/js/jquery.js"></script>
    <script type="text/javascript" src="__STATIC__/js/jquery.json.js"></script>
    <script type="text/javascript" src="__STATIC__/js/layer.js"></script>
    <script src="__PUBLIC__/js/global.js"></script>
    <script src="__PUBLIC__/js/mobile_common.js"></script>
    <script src="__STATIC__/js/swiper.min.js"></script>
    <script type="text/javascript" src="__STATIC__/js/TouchSlide.1.1.js"></script>
    <style>
        #nav ul li {
            width: 50%;
        }

        #nav ul li a {
            color: #fff
        }
    </style>

</head>

<body>
    <div class="wrap">
        <!-- <div class="pubheads maincolorbg flex jus-between align-c">
            <a href="javascript:history.back(-1)"><img src="__STATIC__/images/newimg/order/backW.png" alt=""></a>
            <p>我的店铺</p>
            <img src="__STATIC__/images/newimg/usr/searchEc.png" alt="" style="width:16px; height:16px">
        </div> -->

        <div class="maincolorbg flex jus-between align-c tophead">
            <a href="<?php echo U('index/index'); ?>" class="iconfont icon-fanhui2"></a>
            <p class="font-18">我的店铺</p>
            <img src="__STATIC__/images/newimg/usr/searchEc.png" alt="" style="width:16px; height:16px">
        </div>
        <div class="storemsg maincolorbg flex jus-between align-c">
            <div class="flex jus-start  ">
                <div class="storeimgs pos-r">
                    <?php if($store_detail['store_avatar'] != ''): ?>
                        <img src="<?php echo $store_detail['store_avatar']; ?>" alt="" class="storeimg">
                        <?php else: ?>
                        <img src="__STATIC__/images/newimg/usr/userimg.png" alt="" class="storeimg">
                    <?php endif; ?>
                    <img src="__STATIC__/images/newimg/usr/storeFocus.jpg" alt="" class="storelogo pos-a">
                </div>
                <div class="storename">
                    <p class="font-15"><?php echo $store_detail['store_name']; ?></p>
                    <div class="flex jus-start ">
                        <div class="crownlist ">
                            <ul class="clearfix">
                                <li>
                                    <img src="__STATIC__/images/newimg/store/crown.png" alt="">
                                </li>
                                <li>
                                    <img src="__STATIC__/images/newimg/store/crown.png" alt="">
                                </li>
                                <li>
                                    <img src="__STATIC__/images/newimg/store/crown.png" alt="">
                                </li>
                                <li>
                                    <img src="__STATIC__/images/newimg/store/crown.png" alt="">
                                </li>
                                <li>
                                    <img src="__STATIC__/images/newimg/store/crown.png" alt="">
                                </li>
                            </ul>
                        </div>
                        <p class="font-10">粉丝数<?php echo $store_detail['store_detail']; ?></p>
                    </div>

                </div>
            </div>
            <p class="attention font-13" onclick="collects()" id="guanzhu" ><?php if(($is_collect == 1) and ($is_show == 1)): ?>已关注<?php else: ?>关注<?php endif; ?></p>
        </div>



        <div id="nav" class="swiper-container maincolorbg">
            <ul class="swiper-wrapper clearfix">
                <li class="swiper-slide ">
                    <a href="<?php echo U('store/store?store_id='.$store_id); ?>">
                        <p class="font-15">首页</p>
                    </a>
                </li>
                <li class="swiper-slide active-nav">
                    <p class="font-15"> 宝贝</p>
                </li>
            </ul>
        </div>
        <div id="page" class="swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide slidepage hidden">

                    <div class="indexlit">
                        <img src="__STATIC__/images/newimg/store/store01.png" alt="">
                        <div class="classifybox">
                            <div class="newgoods flex jus-between align-c">
                                <p class="font-14">新品首发</p>
                                <p class="font-14">></p>
                            </div>

                            <div class="levelSec">
                                <div id="nav1" class="swiper-container navbox">
                                    <ul class="swiper-wrapper">
                                        <li class="swiper-slide active-nav ">
                                            <img src="__STATIC__/images/newimg/store/storeCarousel.png" alt="">
                                        </li>
                                        <li class="swiper-slide">
                                            <img src="__STATIC__/images/newimg/store/storeCarousel.png" alt="">
                                        </li>
                                        <li class="swiper-slide">
                                            <img src="__STATIC__/images/newimg/store/storeCarousel.png" alt="">
                                        </li>
                                        <li class="swiper-slide">
                                            <img src="__STATIC__/images/newimg/store/storeCarousel.png" alt="">
                                        </li>
                                    </ul>
                                </div>


                            </div>
                        </div>
                        <div class="goodsimgs">
                            <!-- <img src="__STATIC__/images/newimg/store/store02.png" alt="">
                            <img src="__STATIC__/images/newimg/store/store03.png" alt="">
                            <img src="__STATIC__/images/newimg/store/store04.png" alt=""> -->
                            <?php echo $store_detail['store_detail']; ?>
                        </div>
                    </div>

                </div>

                <div class="swiper-slide slidepage">
                    <div id="nav3" class="swiper-container maincolorbg">
                        <ul class="swiper-wrapper">
                            <li class="swiper-slide active-nav ">
                                <p class="font-13">综合</p>
                            </li>
                            <li class="swiper-slide">
                                <p class="font-13">销量</p>
                            </li>
                            <li class="swiper-slide">
                                <p class="font-13">新品</p>
                            </li>
                            <li class="swiper-slide">
                                <p class="font-13">价格</p>
                            </li>

                        </ul>
                    </div>
                    <div id="page3" class="swiper-container">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide slidepage ">
                                <div class="goodslist">
                                    <ul class="clearfix">
                                        <li>
                                            <div class="googsimg">
                                                <img src="__STATIC__/images/newimg/store/goods01.png" alt="">
                                            </div>
                                            <p class="font-14">2019夏季新款很仙女裙</p>
                                            <div class="  padding0-10">
                                                <div class="flex  jus-between align-c">
                                                    <p class="font-12 maincolor ">￥66.69</p>
                                                    <p class="font-10 goodpay">1325人付款</p>
                                                </div>
                                                <!-- <img src="__STATIC__/images/newimg/store/shopcarR.png" alt="" width="13"
                                                    height="12"> -->
                                            </div>
                                        </li>
                                        <li>
                                            <div class="googsimg">
                                                <img src="__STATIC__/images/newimg/store/goods01.png" alt="">
                                            </div>
                                            <p class="font-14">2019夏季新款很仙女裙</p>
                                            <div class="  padding0-10">
                                                <div class="flex  jus-between align-c">
                                                    <p class="font-12 maincolor ">￥66.69</p>
                                                    <p class="font-10 goodpay">1325人付款</p>
                                                </div>
                                                <!-- <img src="__STATIC__/images/newimg/store/shopcarR.png" alt="" width="13"
                                                        height="12"> -->
                                            </div>
                                        </li>
                                        <li>
                                            <div class="googsimg">
                                                <img src="__STATIC__/images/newimg/store/goods01.png" alt="">
                                            </div>
                                            <p class="font-14">2019夏季新款很仙女裙</p>
                                            <div class="  padding0-10">
                                                <div class="flex  jus-between align-c">
                                                    <p class="font-12 maincolor ">￥66.69</p>
                                                    <p class="font-10 goodpay">1325人付款</p>
                                                </div>
                                                <!-- <img src="__STATIC__/images/newimg/store/shopcarR.png" alt="" width="13"
                                                        height="12"> -->
                                            </div>
                                        </li>
                                        <li>
                                            <div class="googsimg">
                                                <img src="__STATIC__/images/newimg/store/goods01.png" alt="">
                                            </div>
                                            <p class="font-14">2019夏季新款很仙女裙</p>
                                            <div class="  padding0-10">
                                                <div class="flex  jus-between align-c">
                                                    <p class="font-12 maincolor ">￥66.69</p>
                                                    <p class="font-10 goodpay">1325人付款</p>
                                                </div>
                                                <!-- <img src="__STATIC__/images/newimg/store/shopcarR.png" alt="" width="13"
                                                        height="12"> -->
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="swiper-slide slidepage ">
                                <div class="goodslist">
                                    <ul class="clearfix">
                                        <li>
                                            <div class="googsimg">
                                                <img src="__STATIC__/images/newimg/store/goods01.png" alt="">
                                            </div>
                                            <p class="font-14">2019夏季新款很仙女裙</p>
                                            <div class="  padding0-10">
                                                <div class="flex  jus-between align-c">
                                                    <p class="font-12 maincolor ">￥66.69</p>
                                                    <p class="font-10 goodpay">1325人付款</p>
                                                </div>
                                                <!-- <img src="__STATIC__/images/newimg/store/shopcarR.png" alt="" width="13"
                                                        height="12"> -->
                                            </div>
                                        </li>
                                        <li>
                                            <div class="googsimg">
                                                <img src="__STATIC__/images/newimg/store/goods01.png" alt="">
                                            </div>
                                            <p class="font-14">2019夏季新款很仙女裙</p>
                                            <div class="  padding0-10">
                                                <div class="flex  jus-between align-c">
                                                    <p class="font-12 maincolor ">￥66.69</p>
                                                    <p class="font-10 goodpay">1325人付款</p>
                                                </div>
                                                <!-- <img src="__STATIC__/images/newimg/store/shopcarR.png" alt="" width="13"
                                                        height="12"> -->
                                            </div>
                                        </li>
                                        <li>
                                            <div class="googsimg">
                                                <img src="__STATIC__/images/newimg/store/goods01.png" alt="">
                                            </div>
                                            <p class="font-14">2019夏季新款很仙女裙</p>
                                            <div class="  padding0-10">
                                                <div class="flex  jus-between align-c">
                                                    <p class="font-12 maincolor ">￥66.69</p>
                                                    <p class="font-10 goodpay">1325人付款</p>
                                                </div>
                                                <!-- <img src="__STATIC__/images/newimg/store/shopcarR.png" alt="" width="13"
                                                        height="12"> -->
                                            </div>
                                        </li>
                                        <li>
                                            <div class="googsimg">
                                                <img src="__STATIC__/images/newimg/store/goods01.png" alt="">
                                            </div>
                                            <p class="font-14">2019夏季新款很仙女裙</p>
                                            <div class="  padding0-10">
                                                <div class="flex  jus-between align-c">
                                                    <p class="font-12 maincolor ">￥66.69</p>
                                                    <p class="font-10 goodpay">1325人付款</p>
                                                </div>
                                                <!-- <img src="__STATIC__/images/newimg/store/shopcarR.png" alt="" width="13"
                                                        height="12"> -->
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="swiper-slide slidepage ">
                                <div class="goodslist">
                                    <ul class="clearfix">
                                        <li>
                                            <div class="googsimg">
                                                <img src="__STATIC__/images/newimg/store/goods01.png" alt="">
                                            </div>
                                            <p class="font-14">2019夏季新款很仙女裙</p>
                                            <div class="  padding0-10">
                                                <div class="flex  jus-between align-c">
                                                    <p class="font-12 maincolor ">￥66.69</p>
                                                    <p class="font-10 goodpay">1325人付款</p>
                                                </div>
                                                <!-- <img src="__STATIC__/images/newimg/store/shopcarR.png" alt="" width="13"
                                                        height="12"> -->
                                            </div>
                                        </li>
                                        <li>
                                            <div class="googsimg">
                                                <img src="__STATIC__/images/newimg/store/goods01.png" alt="">
                                            </div>
                                            <p class="font-14">2019夏季新款很仙女裙</p>
                                            <div class="  padding0-10">
                                                <div class="flex  jus-between align-c">
                                                    <p class="font-12 maincolor ">￥66.69</p>
                                                    <p class="font-10 goodpay">1325人付款</p>
                                                </div>
                                                <!-- <img src="__STATIC__/images/newimg/store/shopcarR.png" alt="" width="13"
                                                        height="12"> -->
                                            </div>
                                        </li>
                                        <li>
                                            <div class="googsimg">
                                                <img src="__STATIC__/images/newimg/store/goods01.png" alt="">
                                            </div>
                                            <p class="font-14">2019夏季新款很仙女裙</p>
                                            <div class="  padding0-10">
                                                <div class="flex  jus-between align-c">
                                                    <p class="font-12 maincolor ">￥66.69</p>
                                                    <p class="font-10 goodpay">1325人付款</p>
                                                </div>
                                                <!-- <img src="__STATIC__/images/newimg/store/shopcarR.png" alt="" width="13"
                                                        height="12"> -->
                                            </div>
                                        </li>
                                        <li>
                                            <div class="googsimg">
                                                <img src="__STATIC__/images/newimg/store/goods01.png" alt="">
                                            </div>
                                            <p class="font-14">2019夏季新款很仙女裙</p>
                                            <div class="  padding0-10">
                                                <div class="flex  jus-between align-c">
                                                    <p class="font-12 maincolor ">￥66.69</p>
                                                    <p class="font-10 goodpay">1325人付款</p>
                                                </div>
                                                <!-- <img src="__STATIC__/images/newimg/store/shopcarR.png" alt="" width="13"
                                                        height="12"> -->
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="swiper-slide slidepage ">
                                <div class="goodslist">
                                    <ul class="clearfix">
                                        <li>
                                            <div class="googsimg">
                                                <img src="__STATIC__/images/newimg/store/goods01.png" alt="">
                                            </div>
                                            <p class="font-14">2019夏季新款很仙女裙</p>
                                            <div class="  padding0-10">
                                                <div class="flex  jus-between align-c">
                                                    <p class="font-12 maincolor ">￥66.69</p>
                                                    <p class="font-10 goodpay">1325人付款</p>
                                                </div>
                                                <!-- <img src="__STATIC__/images/newimg/store/shopcarR.png" alt="" width="13"
                                                        height="12"> -->
                                            </div>
                                        </li>
                                        <li>
                                            <div class="googsimg">
                                                <img src="__STATIC__/images/newimg/store/goods01.png" alt="">
                                            </div>
                                            <p class="font-14">2019夏季新款很仙女裙</p>
                                            <div class="  padding0-10">
                                                <div class="flex  jus-between align-c">
                                                    <p class="font-12 maincolor ">￥66.69</p>
                                                    <p class="font-10 goodpay">1325人付款</p>
                                                </div>
                                                <!-- <img src="__STATIC__/images/newimg/store/shopcarR.png" alt="" width="13"
                                                        height="12"> -->
                                            </div>
                                        </li>
                                        <li>
                                            <div class="googsimg">
                                                <img src="__STATIC__/images/newimg/store/goods01.png" alt="">
                                            </div>
                                            <p class="font-14">2019夏季新款很仙女裙</p>
                                            <div class="  padding0-10">
                                                <div class="flex  jus-between align-c">
                                                    <p class="font-12 maincolor ">￥66.69</p>
                                                    <p class="font-10 goodpay">1325人付款</p>
                                                </div>
                                                <!-- <img src="__STATIC__/images/newimg/store/shopcarR.png" alt="" width="13"
                                                        height="12"> -->
                                            </div>
                                        </li>
                                        <li>
                                            <div class="googsimg">
                                                <img src="__STATIC__/images/newimg/store/goods01.png" alt="">
                                            </div>
                                            <p class="font-14">2019夏季新款很仙女裙</p>
                                            <div class="  padding0-10">
                                                <div class="flex  jus-between align-c">
                                                    <p class="font-12 maincolor ">￥66.69</p>
                                                    <p class="font-10 goodpay">1325人付款</p>
                                                </div>
                                                <!-- <img src="__STATIC__/images/newimg/store/shopcarR.png" alt="" width="13"
                                                        height="12"> -->
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>



            </div>
        </div>

    </div>

    <div class="storefooter">
    <ul class="clearfix">
        <li>
            <a href="<?php echo U('store/store?store_id='.$store_id); ?>">
                <img src="__STATIC__/images/newimg/store/storeindex.png" alt="" width="17" height="17">
                <p class="font-12">首页</p>
            </a>
        </li>
        <li>
            <a href="<?php echo U('store/storegoods?store_id='.$store_id); ?>">
                <img src="__STATIC__/images/newimg/store/storeindex.png" alt="" width="15" height="17">
                <p class="font-12">全部宝贝</p>
            </a>
        </li>
        <!-- <li>
            <a href="<?php echo U('User/goodsClassify'); ?>">
                <img src="__STATIC__/images/newimg/store/storeClassify.png" alt="" width="15" height="14">
                <p class="font-12">宝贝分类</p>
            </a>
        </li> -->
       
        <li>
            <a href="javascript:void(0)">
                <img src="__STATIC__/images/newimg/store/contact.png" alt="" width="18" height="17">
                <p class="font-12">联系客服</p>
            </a>
        </li>
    </ul>
</div>
</body>
<script type="text/javascript">


    // var myNav = new Swiper('#nav', {
    //     spaceBetween: 10,
    //     slidesPerView: 4,
    //     watchSlidesProgress: true,
    //     watchSlidesVisibility: true,
    //     on: {
    //         tap: function () {
    //             myPage.slideTo(myNav.clickedIndex)
    //         }
    //     }
    // })
    // var myPage = new Swiper('#page', {
    //     on: {
    //         slideChangeTransitionStart: function () {
    //             updateNavPosition()
    //         }
    //     }
    // })
    // function updateNavPosition() {
    //     $('#nav .active-nav').removeClass('active-nav');
    //     var activeNav = $('#nav .swiper-slide').eq(myPage.activeIndex).addClass('active-nav');
    //     if (!activeNav.hasClass('swiper-slide-visible')) {
    //         if (activeNav.index() > myNav.activeIndex) {
    //             var thumbsPerNav = Math.floor(myNav.width / activeNav.width()) - 1
    //             myNav.slideTo(activeNav.index() - thumbsPerNav)
    //         }
    //         else {
    //             myNav.slideTo(activeNav.index())
    //         }
    //     }
    // }



    function navbox(id, num) {
        var myNav = new Swiper('#nav' + id, {
            spaceBetween: 10,
            slidesPerView: num,
            watchSlidesProgress: true,
            watchSlidesVisibility: true,
            on: {
                tap: function () {
                    myPage.slideTo(myNav.clickedIndex)
                }
            }
        })
        var myPage = new Swiper('#page' + id, {
            on: {
                slideChangeTransitionStart: function () {
                    updateNavPosition()
                }
            }
        })
        function updateNavPosition() {
            $('#nav' + id + ' .active-nav').removeClass('active-nav');
            var activeNav = $('#nav' + id + ' .swiper-slide').eq(myPage.activeIndex).addClass('active-nav');
            if (!activeNav.hasClass('swiper-slide-visible')) {
                if (activeNav.index() > myNav.activeIndex) {
                    var thumbsPerNav = Math.floor(myNav.width / activeNav.width()) - 1
                    myNav.slideTo(activeNav.index() - thumbsPerNav)
                }
                else {
                    myNav.slideTo(activeNav.index())
                }
            }
        }

    }

    // navbox(1, 1)
    navbox(3, 5)



    function collects() {
        var is_show = "<?php echo $is_show; ?>";
        var store_id = "<?php echo $store_id; ?>";
        var is_collect = "<?php echo $is_collect; ?>";
        if (is_show == "0") {
            layer.open({
                content: '请先登录!',
            });
            return false;
        }
        $.ajax({
            type: "POST",
            url: "<?php echo url('store/add_storecollect'); ?>",
            data: { store_id: store_id, is_collect: is_collect },
            success: function (data) {
                if (data['status'] == 1) {
                    layer.open({
                        content: data['msg'],

                    })
                    if (data['type'] == '1') {
                        $("#guanzhu").html('已关注');
                    } else {
                        $("#guanzhu").html('关注');
                    }

                } else {
                    layer.open({
                        content: data['msg'],
                    });
                    return false;
                }
            }


        })


    }

</script>

</html>