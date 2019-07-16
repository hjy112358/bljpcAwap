<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:45:"./template/mobile/new/user\goodsClassify.html";i:1558773595;s:44:"./template/mobile/new/public\foot_store.html";i:1558751798;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta name="Generator" content="TPshop v1.1" />
    <meta charset="UTF-8">
    <title>我的店铺-全部宝贝</title>
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


</head>

<body>
    <div class="wrap">
        <!-- <div class="pubheads maincolorbg flex jus-between align-c">
            <a href="javascript:history.back(-1)"><img src="__STATIC__/images/newimg/order/backW.png" alt=""></a>
            <p>我的店铺</p>
            <img src="__STATIC__/images/newimg/usr/searchEc.png" alt="" style="width:16px; height:16px">
        </div> -->
        <div class="maincolorbg flex jus-between align-c tophead">
            <a href="javascript:history.back(-1)" class="iconfont icon-fanhui2"></a>
            <p class="font-18">我的店铺</p>
            <img src="__STATIC__/images/newimg/usr/searchEc.png" alt="" style="width:16px; height:16px">
        </div>


        <div class="storemsg maincolorbg flex jus-between align-c">
            <div class="flex jus-start  ">
                <div class="storeimgs pos-r">
                    <img src="__STATIC__/images/newimg/usr/userimg.png" alt="" class="storeimg">
                    <img src="__STATIC__/images/newimg/usr/storeFocus.jpg" alt="" class="storelogo pos-a">
                </div>
                <div class="storename">
                    <p class="font-15">Hlao遇见你的美丽</p>
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
                        <p class="font-10">粉丝数227万</p>
                    </div>

                </div>
            </div>
            <p class="attention font-13">已关注</p>
        </div>

        <div class="searchbox maincolorbg ">
            <div class="inputbox  pos-r">
                <input type="text" placeholder="搜索店铺内宝贝" class="font-15">
            </div>

        </div>

        <div class="classifylist">
            <ul>
                <li>
                    <div class="classifyTitle flex jus-between">
                        <p class="font-14">2019 NEW</p>
                    </div>
                    <div class="classifydetails">
                        <ul class="clearfix">
                            <li class="font-12">5月20日新品 </li>
                            <li class="font-12">5月22日新品 </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="<?php echo U('user/classifyGoods'); ?>">
                        <div class="classifyTitle flex jus-between">
                            <p class="font-14">上装</p>
                            <p class="font-14">></p>
                        </div>
                        <div class="classifydetails">
                            <ul class="clearfix">
                                <li class="font-12">T恤</li>
                                <li class="font-12">衬衫</li>
                                <li class="font-12">卫衣</li>
                                <li class="font-12">毛呢外套</li>
                                <li class="font-12">背心/马甲/吊带</li>
                                <li class="font-12">羽绒服</li>
                                <li class="font-12">蕾丝/雪纺</li>
                                <li class="font-12">外套</li>
                            </ul>
                        </div>
                    </a>
                </li>
                <li> <a href="<?php echo U('user/classifyGoods'); ?>">
                        <div class="classifyTitle flex jus-between">
                            <p class="font-14">下装</p>
                            <p class="font-14">></p>
                        </div>
                        <div class="classifydetails">
                            <ul class="clearfix">
                                <li class="font-12">牛仔裤</li>
                                <li class="font-12">短裤</li>
                                <li class="font-12">休闲裤</li>
                            </ul>
                        </div>
                    </a>
                </li>
                <li><a href="<?php echo U('user/classifyGoods'); ?>">
                        <div class="classifyTitle flex jus-between">
                            <p class="font-14">裙装</p>
                            <p class="font-14">></p>
                        </div>
                        <div class="classifydetails">
                            <ul class="clearfix">
                                <li class="font-12">连衣裙</li>
                                <li class="font-12">半身裙</li>
                                <li class="font-12">短裙</li>
                            </ul>
                        </div>
                    </a>
                </li>
                <li><a href="<?php echo U('user/classifyGoods'); ?>">
                        <div class="classifyTitle flex jus-between">
                            <p class="font-14">套装</p>
                            <p class="font-14">></p>
                        </div>
                    </a>
                </li>
                <li><a href="<?php echo U('user/classifyGoods'); ?>">
                        <div class="classifyTitle flex jus-between">
                            <p class="font-14">配饰</p>
                            <p class="font-14">></p>
                        </div>
                    </a>
                </li>
                <li><a href="<?php echo U('user/classifyGoods'); ?>">
                        <div class="classifyTitle flex jus-between">
                            <p class="font-14">鞋子</p>
                            <p class="font-14">></p>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="storefooter">
    <ul class="clearfix">
        <li>
            <a href="<?php echo U('User/store'); ?>">
                <img src="__STATIC__/images/newimg/store/storeindex.png" alt="" width="17" height="17">
                <p class="font-12">首页</p>
            </a>
        </li>
        <li>
            <a href="<?php echo U('User/allgoods'); ?>">
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


</html>