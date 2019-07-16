<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:44:"./template/mobile/new/goods\goodsDetail.html";i:1557322665;}*/ ?>
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
    <link rel="stylesheet" href="__STATIC__/css/order_detail.css">
    <script type="text/javascript" src="__STATIC__/js/jquery.js"></script>
    <script type="text/javascript" src="__STATIC__/js/TouchSlide.1.1.js"></script>
    <script type="text/javascript" src="__STATIC__/js/jquery.json.js"></script>
    <script type="text/javascript" src="__STATIC__/js/touchslider.dev.js"></script>
    <script type="text/javascript" src="__STATIC__/js/layer.js"></script>
</head>

<body class="goodsDetail">
    <div class="wrap">
        <div id="focus" class="focus">
            <div class="hd">
                <ul></ul>
            </div>
            <div class="bd">
                <ul>
                    <li><a href="#"><img src="__STATIC__/images/newimg/goods/goodsimg.png" /></a></li>
                    <li><a href="#"><img src="__STATIC__/images/newimg/goods/goodsimg2.png" /></a></li>
                    <li><a href="#"><img src="__STATIC__/images/newimg/goods/goodsimg3.png" /></a></li>
                </ul>
            </div>
            <div class="countDown flex jus-start align-c">
                <p class="font-13 margin-r10">距离结束还剩 </p>
                <p class="maincolor font-15"><span>11</span>:<span>29</span>:<span>20</span></p>
            </div>
        </div>
        <div class="goodshead  flex jus-between align-c">
            <img src="__STATIC__/images/newimg/goods/bakW.png" alt="" width="11" height="18">
            <img src="__STATIC__/images/newimg/goods/shopcarW.png" alt="" width="21" height="18">
        </div>

    </div>
    <div class="goodsPride">
        <p class="font-15">智能空气净化器</p>
        <p><span class="maincolor font-18 margin-r10">￥2300</span><span class="font-12 text-throuline">￥3000</span></p>
    </div>


    <div class="goodsInfo">
        <h3 class="font-14">商品介绍</h3>
        <p class="font-13">实时显示空气指数，颗粒物CADR:344立方米/h劲除雾霾，甲醛CADR:200立方米/h，多档风速可调，纳米级劲护滤网滤除多种污染物，三种智能模式贴心设计，优化净化效果。</p>
    </div>
    <div>
        <img src="__STATIC__/images/newimg/goods/goodsimg5.png" alt="" width="100%">
    </div>


    <div class="goodsbtn">
        <a href="javascript:void(0)" class="maincolorbg">立即购买</a>
        <a href="javascript:void(0)" class="maincolorbg hidden">加入购物车</a>
    </div>
    <div class="choosemodels">
        <div class="modelsbox">
            <div class="modelMsg flex jus-start align-c">
                <img src=" __STATIC__/images/newimg/product01.png" alt="">
                <div>
                    <p class="font-15 margin-t10">智能空气净化器</p>
                    <p class="font-13">请选择 型号</p>
                </div>
            </div>
            <!-- 型号 -->
            <div class="goodstype">
                <p>型号</p>
                <ul class="clearfix flex jus-between">
                    <li>xxx345</li>
                    <li class="on">xxx345</li>
                    <li>xxx345</li>
                    <li>xxx345</li>
                </ul>
            </div>
            <div class="goodsColor">
                <p>颜色</p>
                <ul class="clearfix flex jus-between">
                    <li>黑色</li>
                    <li class="on">黑色</li>
                    <li>黑色</li>
                    <li>黑色</li>
                    <li>黑色</li>
                </ul>
            </div>

            <div class="buycount flex jus-between align-c">
                <p class="font-14">购买数量</p>
                <div class="changeCount">
                    <a href="javascript:void(0)" class="font-15 subtractCount">-</a>
                    <input type="text" value="1" class="font-15 coutnum">
                    <a href="javascript:void(0)" class="font-15 addCount" >+</a>
                </div>
           </div>
        </div>
    </div>
</body>
<script type="text/javascript">
    TouchSlide({
        slideCell: "#focus",
        titCell: ".hd ul", //开启自动分页 autoPage:true ，此时设置 titCell 为导航元素包裹层
        mainCell: ".bd ul",
        effect: "left",
        autoPlay: true,//自动播放
        autoPage: true//自动分页
    });


    $(".addCount").on("click",function(){
      
        var num=parseInt($(".coutnum").val());
        var newnum=num+1;
        console.log(newnum)
        $(".coutnum").val(newnum);
    })
    $(".subtractCount").on("click",function(){
      
      var num=parseInt($(".coutnum").val());
      var newnum=0;
      if(num==1){
        newnum=1
      }else{
        newnum=num-1;
      }
      
      console.log(newnum)
      $(".coutnum").val(newnum);
  })



</script>

</html>