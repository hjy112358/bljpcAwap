<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:42:"./template/mobile/new/store\storelist.html";i:1558701270;s:44:"./template/mobile/new/public\foot_store.html";i:1558922128;}*/ ?>
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
            <a href="<?php echo url('index/index'); ?>" class="iconfont icon-fanhui2"></a>
            <div class="inputbox  pos-r">
                <input type="text" placeholder="搜索店铺内宝贝" class="font-15">
            </div>
            <a href=""></a>
        </div>


        <div id="nav" class="swiper-container ">
            <ul class="swiper-wrapper clearfix">
                <?php if($sc_id == ''): ?>
                <li class="swiper-slide active-nav">
                <?php else: ?>
                <li class="swiper-slide ">
                <?php endif; ?>
                    <a href="<?php echo url('store/storelist'); ?>">
                    <p class="font-13">全部</p>
                    </a>
                </li>
                <?php if(is_array($store_cate) || $store_cate instanceof \think\Collection): $i = 0; $__LIST__ = $store_cate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;if($vo['sc_id'] == $sc_id): ?>   
                <li class="swiper-slide active-nav">
                <?php else: ?>
                <li class="swiper-slide">
                <?php endif; ?>
                    <a href="<?php echo url('store/storelist?sc_id='.$vo['sc_id']); ?>">
                    <p class="font-13"><?php echo $vo['sc_name']; ?></p>
                    </a>
                </li>   
                <?php endforeach; endif; else: echo "" ;endif; ?>
               
            </ul>
        </div>
        <div id="page" class="swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide slidepage">
                    <div class="storesbox ">
                        <ul>
                            <?php if(is_array($storelist) || $storelist instanceof \think\Collection): $i = 0; $__LIST__ = $storelist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                            <li>
                                <div class=" flex jus-between align-c">
                                    <div class="flex jus-start">
                                        <div class="storeimg">
                                            <?php if($vo['store_avatar'] != ''): ?>
                                            <img src="<?php echo $vo['store_avatar']; ?>" alt="">
                                            <?php else: ?>
                                            <img src="__STATIC__/images/newimg/usr/userimg.png" alt="">
                                            <?php endif; ?>
                                        </div>
                                        <div>
                                            <p class="font-14"><?php echo $vo['store_name']; ?></p>
                                            <p class="font-10 col8f"><?php echo $vo['tag_first']; ?> | <?php echo $vo['tag_second']; ?> | <?php echo $vo['tag_third']; ?></p>
                                        </div>
                                    </div>
                                    <div>
                                        <a class="font-12 goIn" href="<?php echo U('store/store?store_id='.$vo['store_id']); ?>">进店</a>
                                    </div>
                                </div>
                                <div class="storegoodsimg flex jus-between align-c">
                                    <?php if(is_array($vo['goods_hot']) || $vo['goods_hot'] instanceof \think\Collection): $i = 0;$__LIST__ = is_array($vo['goods_hot']) ? array_slice($vo['goods_hot'],0,3, true) : $vo['goods_hot']->slice(0,3, true); if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                                    <div>
                                        <a href="<?php echo url('goods/goodsDetailNew?id='.$v['goods_id']); ?>">
                                        <img src="<?php echo $v['original_img']; ?>" alt="">
                                        </a>
                                    </div>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                    
                                </div>
                            </li>   
                            <?php endforeach; endif; else: echo "" ;endif; ?>


                            
                        </ul>

                    </div>
                </div>
               
            </div>
        </div>
    </div>

    <input type="hidden"  name="count" value="<?php echo $count; ?>">
    <input type="hidden"  name="sc_id" value="<?php echo $sc_id; ?>">

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

   
    



</script>

</html>