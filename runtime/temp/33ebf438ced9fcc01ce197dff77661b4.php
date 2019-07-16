<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:42:"./template/mobile/new/user\myInterest.html";i:1562849962;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta name="Generator" content="TPshop v1.1" />
    <meta charset="UTF-8">
    <!-- <title>我的关注</title> -->
    <title></title>
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="__STATIC__/css/public.css?time=<?php echo time()?>" />
    <link rel="stylesheet" type="text/css" href="__STATIC__/css/index.css" />
    <link rel="stylesheet" href="__STATIC__/css/orderlist.css">
    <link rel="stylesheet" href="__STATIC__/css/myInterset.css">
    <link rel="stylesheet" href="__STATIC__/css/iconfont/iconfont.css">
    <script type="text/javascript" src="__STATIC__/js/jquery.js"></script>
    <script type="text/javascript" src="__STATIC__/js/TouchSlide.1.1.js"></script>
    <script type="text/javascript" src="__STATIC__/js/jquery.json.js"></script>
    <script type="text/javascript" src="__STATIC__/js/touchslider.dev.js"></script>
    <script type="text/javascript" src="__STATIC__/js/layer.js"></script>
    <script src="__PUBLIC__/js/global.js"></script>
    <script src="__PUBLIC__/js/mobile_common.js"></script>
    <script type="text/javascript" src="__STATIC__/js/TouchSlide.1.1.js"></script>
    <style>
        .tabBox .hd ul li {
            width: 27%
        }
    </style>

</head>

<body>
    <div class="wrap">
        <!-- <div class="pubheads maincolorbg flex jus-between align-c">
            <a href="javascript:history.back(-1)"><img src="__STATIC__/images/newimg/order/backW.png" alt=""></a>
            <p>我的关注</p>
            <img src="__STATIC__/images/newimg/usr/searchEc.png" alt="" style="width:16px; height:16px">
        </div> -->
        
        <div class="maincolorbg flex jus-between align-c tophead">
            <a href="javascript:void(0)" ></a>
            <p class="font-18">我的关注</p>
            <img src="__STATIC__/images/newimg/usr/searchEc.png" alt="" style="width:16px; height:16px">
        </div>


        <div class="tablist">
            <div id="leftTabBox" class="tabBox">
                <!-- <div class="hd">
                    <ul>
                        <li class=" on font-15">全部</li>
                        <li class=" font-15">店铺</li>
                        <li class=" font-15">其他</li>
                    </ul>
                </div> -->
                <div class="bd margin-t10">

                    <!-- <div class="update flex  jus-between align-c ">
                        <p class="font-12 maincolor ">68个关注店铺的宝贝上新了</p>
                        <img src="__STATIC__/images/newimg/goods/backR.png" alt="">
                    </div> -->

                    <div class="productmsglist">
                        <ul>
                            <?php if(is_array($store_list) || $store_list instanceof \think\Collection): $i = 0; $__LIST__ = $store_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                <li class="edit" data-id="<?php echo $vo['log_id']; ?>">
                                    <div class="productmsg">
                                        <div class="flex  jus-between margin-t10 margin-b20">
                                            <div class="storeimg flex  jus-start align-c">
                                                <img src="<?php echo $vo['store_log']; ?>" alt="" class="storeimgs">
                                                <img src="__STATIC__/images/newimg/usr/storeFocus.jpg" alt=""
                                                    class="storeicon">
                                            </div>
                                            <div class="flex jus-between storemsg align-c">
                                                <p class="goodsdetail"><?php echo $vo['store_name']; ?></p>
                                                <div class="goodproceAnum ">
                                                    <span class="font-12 maincolor">收藏人数</span>
                                                    <span class="font-12 maincolor"><?php echo $vo['store_collect']; ?></span>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            <?php endforeach; endif; else: echo "" ;endif; ?>

                          
                        </ul>
                    </div>




                </div>
            </div>
        </div>
    </div>
</body>

<script type="text/javascript" src="__STATIC__/js/myinterLeft.js"></script>
<script>
    var slideEle = $(".productmsglist").slideEle({ //绑定插件所需要的作用域
        parentBox: $("ul"),//被编辑标签的直接父元素标签
        slideBars: $("li"),//需要滑动删除、编辑的标签组
        alterTag: $(".edit"),//需要修改内容的标签，必须单独用一个标签包裹
        tagWidth: 80,//右侧按钮宽度,默认80
        editBtn: true,//是否需要编辑按钮 true/false
    });
</script>

</html>