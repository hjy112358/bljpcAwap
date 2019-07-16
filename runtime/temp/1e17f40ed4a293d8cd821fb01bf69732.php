<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:41:"./template/mobile/new/user\mycollect.html";i:1559008677;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta name="Generator" content="TPshop v1.1" />
    <meta charset="UTF-8">
    <title>我的收藏</title>
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="__STATIC__/css/public.css" />
    <link rel="stylesheet" type="text/css" href="__STATIC__/css/index.css" />
    <link rel="stylesheet" href="__STATIC__/css/orderlist.css">
    <link rel="stylesheet" href="__STATIC__/css/myInterset.css">
    <link rel="stylesheet" href="__STATIC__/css/iconfont/iconfont.css">
    <script type="text/javascript" src="__STATIC__/js/jquery.js"></script>
    <script type="text/javascript" src="__STATIC__/js/jquery.json.js"></script>
    <script type="text/javascript" src="__STATIC__/js/layer.js"></script>
    <script src="__PUBLIC__/js/global.js"></script>
    <script src="__PUBLIC__/js/mobile_common.js"></script>
    <script type="text/javascript" src="__STATIC__/js/TouchSlide.1.1.js"></script>
    <style>
        .spnbtn.spnDel {
            height: 112px;
            line-height: 112px;
        }
    </style>

</head>

<body>
    <div class="wrap">
        <!-- <div class="pubheads maincolorbg flex jus-between align-c">
            <a href="javascript:history.back(-1)"><img src="__STATIC__/images/newimg/order/backW.png" alt=""></a>
            <p>我的收藏</p>
            <img src="__STATIC__/images/newimg/usr/searchEc.png" alt="" style="width:16px; height:16px">
        </div> -->

        <div class="maincolorbg flex jus-between align-c tophead">
            <a href="javascript:history.back(-1)" class="iconfont icon-fanhui2"></a>
            <p class="font-18">我的收藏</p>
            <img src="__STATIC__/images/newimg/usr/searchEc.png" alt="" style="width:16px; height:16px">
        </div>

        <div class="tablist classify">
            <div id="leftTabBox" class="tabBox">
                <div class="bd">
                    <!-- 全部类目 -->
                    <div class=" typebox">
                        <div class="productmsglist">
                            <ul>
                                <?php if(is_array($goods_list) || $goods_list instanceof \think\Collection): $i = 0; $__LIST__ = $goods_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                    <li class="edit" data-id="<?php echo $vo['collect_id']; ?>">
                                        <div class="productmsg">
                                            <div class="flex  jus-start margin-t10 margin-b20">
                                                <div class="collectimg flex  jus-start align-c">
                                                    <img src="<?php echo $vo['original_img']; ?>" alt="" class="">
                                                </div>
                                                <div class="collectdetail  ">
                                                    <p class="collectmsg font-12"><?php echo $vo['goods_name']; ?></p>
                                                    <p class="collectnum font-10"><?php echo $vo['collect_sum']; ?>人收藏</p>
                                                    <p class="collectprice  maincolor font-12">￥<?php echo $vo['shop_price']; ?></p>
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
    </div>
</body>
<script type="text/javascript" src="__STATIC__/js/mycollectLeft.js"></script>
<script>
    var slideEle = $(".productmsglist").slideEle({ //绑定插件所需要的作用域
        parentBox: $("ul"),//被编辑标签的直接父元素标签
        slideBars: $("li"),//需要滑动删除、编辑的标签组
        alterTag: $(".edit"),//需要修改内容的标签，必须单独用一个标签包裹
        tagWidth: 60,//右侧按钮宽度,默认80
        editBtn: true,//是否需要编辑按钮 true/false
    });
</script>



</html>