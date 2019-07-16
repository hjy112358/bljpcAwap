<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:44:"./template/mobile/new/patternb\seAccout.html";i:1562898540;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta name="Generator" content="TPshop v1.1" />
    <meta charset="UTF-8">
    <!-- <title>结算</title> -->
    <title></title>
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="__STATIC__/css/public.css?time=<?php echo time()?>" />
    <link rel="stylesheet" type="text/css" href="__STATIC__/css/index.css" />
    <link rel="stylesheet" type="text/css" href="__STATIC__/css/animate.css" />
    <link rel="stylesheet" href="__STATIC__/css/iconfont/iconfont.css">
    <link rel="stylesheet" type="text/css" href="__STATIC__/css/patternb.css?time=<?php echo time()?>" />
    <script type="text/javascript" src="__STATIC__/js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="__STATIC__/js/rem.js"></script>
    <script type="text/javascript" src="__STATIC__/js/TouchSlide.1.1.js"></script>

</head>

<body class="myteam">
    <div class="wrap">
        <!-- <div class="maincolorbg  tophead" style="text-align: center">
            <a href="javascript:history.back(-1)" class="iconfont icon-fanhui2"></a>
            <p class="font-18" style="line-height:60px;margin-left: 0">结算</p>
            <a href="javascript:void(0)"></a>
          </div> -->
        <div class="mypoolmsgbox ">
            <div class="mypoolmsg">
                <div class="mypoolimg">
                    <img src="__STATIC__/images/newimg/usr/userimg.png" alt="">
                </div>
                <div class="mypoolid">
                    <p>你喜欢大白兔奶糖吗</p>
                    <p>ID：123456789121</p>
                    <p>资产包：399资产包</p>
                </div>
                <div>
                    <div class="gradeclass flex jus-between">
                        <span>0</span>
                        <span>50</span>
                        <span>100</span>
                    </div>
                    <div id="progressbar1">
                    </div>
                    <div class="starnow">
                            <ul class="clearfix">
                                <li>
                                    <img src="__STATIC__/images/newimg/patternb/star.png" alt=""  class="hidden ">
                                    <img src="__STATIC__/images/newimg/patternb/starb.png" alt="" class="animated tada">
                                </li>
                                <li>
                                    <img src="__STATIC__/images/newimg/patternb/star.png" alt="" >
                                    <img src="__STATIC__/images/newimg/patternb/starb.png" alt=""  class="hidden animated tada">
                                </li>
                                <li>
                                    <img src="__STATIC__/images/newimg/patternb/star.png" alt="">
                                    <img src="__STATIC__/images/newimg/patternb/starb.png" alt=""  class="hidden animated tada">
                                </li>
                            </ul>
                        </div>
                </div>
            </div>
        </div>

        <div class="accountbox">
            <div class="accoutitle flex jus-start align-c ">
                <img src="__STATIC__/images/newimg/patternb/store.png" alt="">
                <p>我的资产包结算</p>
            </div>
            <div class="accoutlist">
                <ul>
                    <li class=" flex jus-start align-c ">
                        <div class="accoutimg">
                            <img src="__STATIC__/images/newimg/patternb/storeimg.png" alt="">
                        </div>
                        <div class="accoutdetail">
                            <p class="accoutype">399资产包</p>
                            <p class="maincolor">￥399</p>
                            <p class="accoutnum">x2</p>
                        </div>
                    </li>
                    <li class=" flex jus-start align-c ">
                        <div class="accoutimg">
                            <img src="__STATIC__/images/newimg/patternb/storeimg.png" alt="">
                        </div>
                        <div class="accoutdetail">
                            <p class="accoutype">2000资产包</p>
                            <p class="maincolor">￥2000</p>
                            <p class="accoutnum">x2</p>
                        </div>
                    </li>
                    <li class=" flex jus-start align-c ">
                        <div class="accoutimg">
                            <img src="__STATIC__/images/newimg/patternb/storeimg.png" alt="">
                        </div>
                        <div class="accoutdetail">
                            <p class="accoutype">20000资产包</p>
                            <p class="maincolor">￥20000</p>
                            <p class="accoutnum">x2</p>
                        </div>
                    </li>

                </ul>
            </div>
            <div class="truepay flex jus-between align-c paybox">
                <p>实付总额：</p>
                <p class="maincolor">￥13330</p>
            </div>
            <div class=" flex jus-between align-c paybox yuepay">
                <p>余额支付：</p>
                <p class="maincolor">￥13330</p>
            </div>
        </div>
        <div class="paybtn">
            <a href="javascript:void(0)">提交订单</a>
        </div>
    </div>
</body>
<script src="__STATIC__/js/jquery.lineProgressbar.js"></script>
<script>
    $(function () {
        $('#progressbar1').LineProgressbar({
            percentage: '40'
        });

    })
</script>

</html>