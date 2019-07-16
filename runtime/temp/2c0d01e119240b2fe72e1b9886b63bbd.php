<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:42:"./template/mobile/new/patternb\myteam.html";i:1562898521;s:49:"./template/mobile/new/public\footer_patternb.html";i:1562742903;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta name="Generator" content="TPshop v1.1" />
    <meta charset="UTF-8">
    <!-- <title>我的团队</title> -->
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
            <p class="font-18" style="line-height:60px;margin-left: 0">我的团队</p>
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

        <div class="mypooldetailbox myteambox">
            <div class="mypoolorder">
                <div class="mypoolorderdetail">
                    <ul>
                        <li>
                            <div class="detailist">
                                <ul>
                                    <li class="flex jus-start align-c">
                                        <img src="__STATIC__/images/newimg/usr/userimg1.png" alt="">
                                        <div class="flex jus-between align-c detailbox">
                                            <p>ID：123456 </p>
                                            <p class="maincolor">$399.00</p>
                                        </div>
                                    </li>
                                    <li class="flex jus-start align-c">
                                        <img src="__STATIC__/images/newimg/usr/userimg1.png" alt="">
                                        <div class="flex jus-between align-c detailbox">
                                            <p>ID：123456 </p>
                                            <p class="maincolor">$399.00</p>
                                        </div>
                                    </li>
                                    <li class="flex jus-start align-c">
                                        <img src="__STATIC__/images/newimg/usr/userimg1.png" alt="">
                                        <div class="flex jus-between align-c detailbox">
                                            <p>ID：123456 </p>
                                            <p class="maincolor">$399.00</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="patternbfooter">
    <ul class="clearfix">
        <li>
            <a href="<?php echo url('patternb/index'); ?>">
                <img src="__STATIC__/images/newimg/homeNormal.png" alt="" width="17" height="17">
                <p class="font-12">首页</p>
            </a>
        </li>
        <li>
            <a href="<?php echo url('patternb/asselPool'); ?>">
                <img src="__STATIC__/images/newimg/page.png" alt="" width="17" height="17">
                <p class="font-12">资产包</p>
            </a>
        </li>
        <li>
            <a href="<?php echo url('patternb/myasselpool'); ?>">
                <img src="__STATIC__/images/newimg/personal.png" alt="" width="18" height="17">
                <p class="font-12">个人中心</p>
            </a>
        </li>
    </ul>
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