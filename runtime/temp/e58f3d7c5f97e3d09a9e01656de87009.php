<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:41:"./template/mobile/new/user\storelist.html";i:1562846666;s:44:"./template/mobile/new/public\foot_store.html";i:1558922128;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta name="Generator" content="TPshop v1.1" />
    <meta charset="UTF-8">
    <!-- <title>我的店铺</title> -->
    <title></title>
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="__STATIC__/css/public.css" />
    <link rel="stylesheet" type="text/css" href="__STATIC__/css/index.css" />
    <link rel="stylesheet" href="__STATIC__/css/store.css">
    <link rel="stylesheet" href="__STATIC__/css/iconfont/iconfont.css">
    <link rel="stylesheet" href="__STATIC__/css/swiper.min.css">
    <script type="text/javascript" src="__STATIC__/js/jquery.js"></script>
    <script type="text/javascript" src="__STATIC__/js/jquery.json.js"></script>
    <script type="text/javascript" src="__STATIC__/js/layer.js"></script>
    <script src="__PUBLIC__/js/global.js"></script>
    <script src="__PUBLIC__/js/mobile_common.js"></script>
    <script src="__STATIC__/js/swiper.min.js"></script>
    <script type="text/javascript" src="__STATIC__/js/TouchSlide.1.1.js"></script>


</head>

<body>
    <div class="wrap storelist">
        <!-- <div class="pubheads maincolorbg flex jus-start align-c">
            <a href="javascript:history.back(-1)"><img src="__STATIC__/images/newimg/order/backW.png" alt=""></a>
            <div class="inputbox  pos-r">
                <input type="text" placeholder="搜索店铺内宝贝" class="font-15">
            </div>
        </div> -->
        <div class="maincolorbg flex jus-between align-c tophead">
            <!-- <a href="javascript:history.back(-1)" class="iconfont icon-fanhui2"></a> -->
            <div class="inputbox  pos-r">
                <input type="text" placeholder="搜索店铺内宝贝" class="font-15">
            </div>
            <a href=""></a>
        </div>



        <div id="nav" class="swiper-container ">
            <ul class="swiper-wrapper clearfix">
                <li class="swiper-slide active-nav">
                    <p class="font-13">全部</p>
                </li>
                <li class="swiper-slide">
                    <p class="font-13">精选</p>
                </li>
                <li class="swiper-slide">
                    <p class="font-13">女人</p>
                </li>
                <li class="swiper-slide">
                    <p class="font-13">男人</p>
                </li>
                <li class="swiper-slide">
                    <p class="font-13">家装</p>
                </li>
                <li class="swiper-slide">
                    <p class="font-13">母婴</p>
                </li>
                <li class="swiper-slide">
                    <p class="font-13">美妆</p>
                </li>
                <li class="swiper-slide">
                    <p class="font-13">美食</p>
                </li>
                <li class="swiper-slide">
                    <p class="font-13">数码</p>
                </li>
            </ul>
        </div>
        <div id="page" class="swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide slidepage">
                    <div class="storesbox ">
                        <ul>
                            <li>
                                <div class=" flex jus-between align-c">
                                    <div class="flex jus-start">
                                        <div class="storeimg">
                                            <img src="__STATIC__/images/newimg/usr/userimg.png" alt="">
                                        </div>
                                        <div>
                                            <p class="font-14">周大福官方旗舰店</p>
                                            <p class="font-10 col8f">9年老店 | 收藏人数498万 | 好评率100%</p>
                                        </div>
                                    </div>
                                    <div>
                                        <a class="font-12 goIn" href="<?php echo U('User/store'); ?>">进店</a>
                                    </div>
                                </div>
                                <div class="storegoodsimg flex jus-between align-c">
                                    <div>
                                        <img src="__STATIC__/images/newimg/store/goods08.png" alt="">
                                    </div>
                                    <div>
                                        <img src="__STATIC__/images/newimg/store/goods08.png" alt="">
                                    </div>
                                    <div>
                                        <img src="__STATIC__/images/newimg/store/goods08.png" alt="">
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class=" flex jus-between align-c">
                                    <div class="flex jus-start">
                                        <div class="storeimg">
                                            <img src="__STATIC__/images/newimg/usr/userimg.png" alt="">
                                        </div>
                                        <div>
                                            <p class="font-14">周大福官方旗舰店</p>
                                            <p class="font-10 col8f">9年老店 | 收藏人数498万 | 好评率100%</p>
                                        </div>
                                    </div>
                                    <div>
                                        <a class="font-12 goIn" href="<?php echo U('User/store'); ?>">进店</a>
                                    </div>
                                </div>
                                <div class="storegoodsimg flex jus-between align-c">
                                    <div>
                                        <img src="__STATIC__/images/newimg/store/goods08.png" alt="">
                                    </div>
                                    <div>
                                        <img src="__STATIC__/images/newimg/store/goods08.png" alt="">
                                    </div>
                                    <div>
                                        <img src="__STATIC__/images/newimg/store/goods08.png" alt="">
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class=" flex jus-between align-c">
                                    <div class="flex jus-start">
                                        <div class="storeimg">
                                            <img src="__STATIC__/images/newimg/usr/userimg.png" alt="">
                                        </div>
                                        <div>
                                            <p class="font-14">周大福官方旗舰店</p>
                                            <p class="font-10 col8f">9年老店 | 收藏人数498万 | 好评率100%</p>
                                        </div>
                                    </div>
                                    <div>
                                        <a class="font-12 goIn" href="<?php echo U('User/store'); ?>">进店</a>
                                    </div>
                                </div>
                                <div class="storegoodsimg flex jus-between align-c">
                                    <div>
                                        <img src="__STATIC__/images/newimg/store/goods08.png" alt="">
                                    </div>
                                    <div>
                                        <img src="__STATIC__/images/newimg/store/goods08.png" alt="">
                                    </div>
                                    <div>
                                        <img src="__STATIC__/images/newimg/store/goods08.png" alt="">
                                    </div>
                                </div>
                            </li>
                        </ul>

                    </div>
                </div>
                <div class="swiper-slide slidepage">
                </div>
                <div class="swiper-slide slidepage">
                </div>
                <div class="swiper-slide slidepage">
                </div>
                <div class="swiper-slide slidepage">
                </div>
                <div class="swiper-slide slidepage">
                </div>
                <div class="swiper-slide slidepage">
                </div>
                <div class="swiper-slide slidepage">
                </div>
                <div class="swiper-slide slidepage">
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


    var myNav = new Swiper('#nav', {
        spaceBetween: 10,
        slidesPerView: 4,
        watchSlidesProgress: true,
        watchSlidesVisibility: true,
        on: {
            tap: function () {
                myPage.slideTo(myNav.clickedIndex)
            }
        }
    })
    var myPage = new Swiper('#page', {
        on: {
            slideChangeTransitionStart: function () {
                updateNavPosition()
            }
        }
    })
    function updateNavPosition() {
        $('#nav .active-nav').removeClass('active-nav');
        var activeNav = $('#nav .swiper-slide').eq(myPage.activeIndex).addClass('active-nav');
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




</script>

</html>