<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:40:"./template/mobile/new/user\couponew.html";i:1562900007;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta name="Generator" content="TPshop v1.1" />
    <meta charset="UTF-8">
    <!-- <title>我的-我的优惠券</title> -->
    <title></title>
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="__STATIC__/css/public.css?time=<?php echo time()?>" />
    <link rel="stylesheet" type="text/css" href="__STATIC__/css/index.css" />
    <link rel="stylesheet" href="__STATIC__/css/topdetail.css">
    <link rel="stylesheet" href="__STATIC__/css/iconfont/iconfont.css">
    <script type="text/javascript" src="__STATIC__/js/jquery.js"></script>
    <script type="text/javascript" src="__STATIC__/js/TouchSlide.1.1.js"></script>
    <script type="text/javascript" src="__STATIC__/js/jquery.json.js"></script>
    <script type="text/javascript" src="__STATIC__/js/touchslider.dev.js"></script>
    <script type="text/javascript" src="__STATIC__/js/layer.js"></script>
    <!-- <script src="__PUBLIC__/js/global.js"></script>
    <script src="__PUBLIC__/js/mobile_common.js"></script> -->
    <style>
        .pubhead p:before {
            top: 20px
        }
    </style>
</head>

<body class="couponwrap">
    <div class="wrap">
        <!-- <div class="pubhead maincolorbg ">
            <a href="javascript:history.back(-1)">
                <p>券管理</p>
            </a>
        </div> -->
        <!-- <div class="pubhead maincolorbg ">
            <a href="javascript:history.back(-1)">
            <p>券管理</p>
        </a> -->
        <!-- <div class="maincolorbg flex jus-between align-c tophead">
            <a href="javascript:history.back(-1)" class="iconfont icon-fanhui2"></a>
            <p class="font-18">券管理</p>
            <a href=""></a>
        </div> -->
        <!-- <div class="maincolorbg tophead " id="topAnchor" style="text-align: center;">
            <p class="font-18" style="margin-left:0">券管理</p>
        </div> -->
        <!-- <span class="shifang">释放</span>-->
    </div>
    <div class="advertise">
        <img src="__STATIC__/images/newimg/usr/tickchangeBg.png" alt="" class="conponbg">
    </div>
    <div class="couponlist">
        <!-- 未失效 -->
        <div class="valid">
            <ul>
                <!-- Z券 -->
                <li class="flex  jus-between align-c">
                    <div class="flex jus-start align-c">
                        <img src="__STATIC__/images/newimg/usr/ticketZ.png" alt="" class="ticketzimg">
                        <div class="ticketmsg">
                            <span>Z券</span>
                            <p>凡推荐一次用户注册即可获取</p>
                        </div>
                    </div>
                    <div class="price">
                    <?php if($quan[0] <= 0): ?>
                        <p>0</p>
                    <?php endif; if($quan[0] > 0): ?>
                        <p><?php echo $quan[0]; ?></p>
                    <?php endif; ?>


                    </div>
                </li>
                <!-- 余额券 -->
                <li class="flex  jus-between align-c">
                    <div class="flex jus-start align-c">
                        <img src="__STATIC__/images/newimg/usr/balanceT.png" alt="" class="ticketzimg">
                        <div class="ticketmsg">
                            <span>余额券</span>
                            <p>凡推荐一次用户注册即可获取</p>
                        </div>
                    </div>

                        <div class="price">
                            <?php if($quan[5] <= 0): ?>
                            <p>0</p>
                            <?php endif; if($quan[5] > 0): ?>
                                <p><?php echo $quan[5]; ?></p>
                            <?php endif; ?>
                           <!-- <a href="javasrcipt:void(0)" class="conversion">去兑换</a>-->
                            <a href="<?php echo U('User/accounts'); ?>" style="margin-top:10px">去转账</a>
                        </div>
                    </li>
                    <!-- 万用券 -->
                    <li class="flex  jus-between align-c">
                        <div class="flex jus-start align-c">
                            <img src="__STATIC__/images/newimg/usr/general.png" alt="" class="ticketzimg">
                            <div class="ticketmsg">
                                <span>万用券</span>
                                <p>凡推荐一次用户注册即可获取</p>
                            </div>
                        </div>

                        <div class="price">
                            <?php if($quan[3] <= 0): ?>
                            <p>0</p>
                        <?php endif; if($quan[3] > 0): ?>
                                <p><?php echo $quan[3]; ?></p>
                            <?php endif; ?>
                            <a href="<?php echo U('User/exchangeTicket'); ?>" class="conversion " style="margin-top:10px">去兑换</a>
                            <!--<a href="javascript:void(0)">去转账</a>-->
                        </div>
                    </li>
                    <!-- 荣誉券 -->
                    <li class="flex  jus-between align-c">
                        <div class="flex jus-start align-c">
                            <img src="__STATIC__/images/newimg/usr/honor.png" alt="" class="ticketzimg">
                            <div class="ticketmsg">
                                <span>荣誉券</span>
                                <p>凡推荐一次用户注册即可获取</p>
                            </div>
                        </div>

                        <div class="price">
                            <?php if($quan[6] <= 0): ?>
                                <p>0</p>
                            <?php endif; if($quan[6] > 0): ?>
                                <p><?php echo $quan[6]; ?></p>
                            <?php endif; ?>
                        </div>
                    </li>
                    <!-- 注册券 -->
                    <li class="flex  jus-between align-c">
                        <div class="flex jus-start align-c">
                            <img src="__STATIC__/images/newimg/usr/register.png" alt="" class="ticketzimg">
                            <div class="ticketmsg">
                                <span>注册券</span>
                                <p>凡推荐一次用户注册即可获取</p>
                            </div>
                        </div>

                        <div class="price">
                            <?php if($quan[1] <= 0): ?>
                            <p>0</p>
                        <?php endif; if($quan[1] > 0): ?>
                                <p><?php echo $quan[1]; ?></p>
                            <?php endif; ?>
                        </div>
                    </li>
                    <!-- 挂售券 -->
                    <li class="flex  jus-between align-c">
                        <div class="flex jus-start align-c">
                            <img src="__STATIC__/images/newimg/usr/attached.png" alt="" class="ticketzimg">
                            <div class="ticketmsg">
                                <span>挂售券</span>
                                <p>凡推荐一次用户注册即可获取</p>
                            </div>
                        </div>

                        <div class="price">
                            <?php if($quan[4] <= 0): ?>
                                <p>0</p>
                            <?php endif; if($quan[4] > 0): ?>
                                <p><?php echo $quan[4]; ?></p>
                            <?php endif; ?>
                        </div>
                    </li>
                    <!-- 消费券 -->
                    <li class="flex  jus-between align-c">
                        <div class="flex jus-start align-c">
                            <img src="__STATIC__/images/newimg/usr/consume.png" alt="" class="ticketzimg">
                            <div class="ticketmsg">
                                <span>消费券</span>
                                <p>凡推荐一次用户注册即可获取</p>
                            </div>
                        </div>
                        <div class="price">
                            <?php if($quan[2] <= 0): ?>
                                <p>0</p>
                            <?php endif; if($quan[2] > 0): ?>
                                <p><?php echo $quan[2]; ?></p>
                            <?php endif; ?>
                        </div>
                    </li>
                </ul>
            </div>
            <!-- 失效 -->
            <div class="efficacy valid">
                <h3>已回收</h3>
                <ul>
                    <!-- 挂售券 -->
                    <li class="flex  jus-between align-c">
                        <div class="flex jus-start align-c">
                            <img src="__STATIC__/images/newimg/usr/attached.png" alt="" class="ticketzimg">
                            <div class="ticketmsg">
                                <span>挂售券</span>
                                <p>每天24点系统自动收回</p>
                            </div>
                        </div>
                        <div class="price">
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</body>
<script>
//    $('.shifang').click(function () {
//        $.ajax({
//           url: 'http://abc.fyc365.cn/index.php?m=api&c=Ticket&a=do_release' ,
//        })
//		alert('释放成功');
//        window.location.reload();
//    })
</script>

</html>