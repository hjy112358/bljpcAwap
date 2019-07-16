<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:47:"./template/mobile/new/patternb\myasselPool.html";i:1562573282;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta name="Generator" content="TPshop v1.1" />
    <meta charset="UTF-8">
    <title>我的资产包</title>
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="__STATIC__/css/public.css" />
    <link rel="stylesheet" type="text/css" href="__STATIC__/css/index.css" />
    <link rel="stylesheet" href="__STATIC__/css/iconfont/iconfont.css">
    <link rel="stylesheet" type="text/css" href="__STATIC__/css/patternb.css" />
    <script type="text/javascript" src="__STATIC__/js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="__STATIC__/js/rem.js"></script>
    <script type="text/javascript" src="__STATIC__/js/TouchSlide.1.1.js"></script>

</head>

<body class="mypool">
    <div class="wrap">
        <div class="maincolorbg flex jus-between align-c tophead">
            <a href="javascript:history.back(-1)" class="iconfont icon-fanhui2"></a>
            <p class="font-18">我的资产包</p>
            <a href="javascript:void(0)"></a>
        </div>
        <div class="mypoolmsgbox">
            <div class="mypoolmsg">
                <div class="mypoolimg">
                    <img src="__STATIC__/images/newimg/usr/userimg.png" alt="">
                </div>
                <div class="mypoolid">
                    <p>你喜欢大白兔奶糖吗</p>
                    <p>ID：123456789121</p>
                </div>
                <div>
                    <div class="gradeclass flex jus-between">
                        <span>0</span>
                        <span>50</span>
                        <span>100</span>
                    </div>
                    <div id="progressbar1">
                    </div>
                </div>
            </div>
        </div>

        <div class="mypooldetailbox">
            <div class="mypooltype clearfix">
                <div class="shortype bor-r">
                    <a href="<?php echo url('patternb/myteam'); ?>">
                        <img src="__STATIC__/images/newimg/patternb/team.png" alt="" style="width:2.35rem;height:2rem">
                        <p>我的团队</p>
                    </a>
                </div>
                <div class="shortype">
                    <a href="<?php echo url('patternb/myasselpool'); ?>">
                        <img src="__STATIC__/images/newimg/patternb/poolticket.png" alt=""
                            style="width:2.75rem;height:2.35rem">
                        <p>我的资产包</p>
                    </a>
                </div>
                <div class="hightype bor-r">
                    <a href="<?php echo url('patternb/buyIn'); ?>">
                        <img src="__STATIC__/images/newimg/patternb/scalin.png" alt=""
                            style="width:2.3rem;height:2.2rem">
                        <p>买入</p>
                    </a>
                </div>
                <div class="hightype">
                    <a href="<?php echo url('patternb/scaleOut'); ?>">
                        <img src="__STATIC__/images/newimg/patternb/scaleout.png" alt=""
                            style="width:2.25rem;height:2.15rem">
                        <p>卖出</p>
                    </a>
                </div>
            </div>

            <div class="mypoolorder">
                <div class="poolordertop flex jus-between align-c">
                    <p>我的订单</p>
                    <p class="allorder">全部订单<span>></span></p>
                </div>
                <div class="mypoolorderdetail">
                    <ul>
                        <li>
                            <div class="detailhead  flex jus-between align-c">
                                <p>2019.7.30-星期四</p>
                                <p>总计：<span>2000</span></p>
                            </div>
                            <div class="detailist">
                                <ul>
                                    <li class="flex jus-start align-c">
                                        <img src="__STATIC__/images/newimg/patternb/scalin.png" alt="">
                                        <div class="flex jus-between align-c detailbox">
                                            <p>买入资产包</p>
                                            <p class="maincolor">399.00</p>
                                        </div>
                                    </li>
                                    <li class="flex jus-start align-c">
                                        <img src="__STATIC__/images/newimg/patternb/scalin.png" alt="">
                                        <div class="flex jus-between align-c detailbox">
                                            <p>买入资产包</p>
                                            <p class="maincolor">399.00</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <div class="detailhead  flex jus-between align-c">
                                <p>2019.7.30-星期四</p>
                                <p>总计：<span>2000</span></p>
                            </div>
                            <div class="detailist">
                                <ul>
                                    <li class="flex jus-start align-c">
                                        <img src="__STATIC__/images/newimg/patternb/scalin.png" alt="">
                                        <div class="flex jus-between align-c detailbox">
                                            <p>买入资产包</p>
                                            <p class="maincolor">399.00</p>
                                        </div>
                                    </li>
                                    <li class="flex jus-start align-c">
                                        <img src="__STATIC__/images/newimg/patternb/scalin.png" alt="">
                                        <div class="flex jus-between align-c detailbox">
                                            <p>买入资产包</p>
                                            <p class="maincolor">399.00</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
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