<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:43:"./template/mobile/new/user\tradeFloorZ.html";i:1558508833;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta name="Generator" content="TPshop v1.1" />
    <meta charset="UTF-8">
    <title>钱包-交易记录-Z券</title>
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="__STATIC__/css/public.css" />
    <link rel="stylesheet" type="text/css" href="__STATIC__/css/index.css" />
    <link rel="stylesheet" href="__STATIC__/css/topdetail.css">
    <link rel="stylesheet" href="__STATIC__/css/iconfont/iconfont.css">
    <script type="text/javascript" src="__STATIC__/js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="__STATIC__/js/TouchSlide.1.1.js"></script>
    <script type="text/javascript" src="__STATIC__/js/jquery.json.js"></script>
    <script type="text/javascript" src="__STATIC__/js/touchslider.dev.js"></script>
    <script type="text/javascript" src="__STATIC__/js/layer.js"></script>
    <script src="__PUBLIC__/js/global.js"></script>
    <script src="__PUBLIC__/js/mobile_common.js"></script>

</head>

<body class="tradez">
    <div class="wrap tradewrap">
        <!-- <div class="pubhead maincolorbg">
            <a href="javascript:history.back(-1)">
                <p>交易记录</p>
            </a>
        </div> -->
        <div class="maincolorbg flex jus-between align-c tophead">
            <a href="javascript:history.back(-1)" class="iconfont icon-fanhui2"></a>
            <p class="font-18">交易记录</p>
            <a href=""></a>
        </div>


        <div class="setting">
            <div class="flex jus-start align-c tradezSetting">
                <div class="userimg">
                    <img src="<?php echo $user_info['head_pic']; ?>" alt="">
                </div>
                <div class="editbox">
                    <span><?php echo $user_info['nickname']; ?></span>
                    <p>这个人很懒，什么也没留下</p>

                </div>
            </div>
            <p class="recycle">*24点挂售券未售出，系统将自动收回</p>
            <div class="transtype">
                <div class="tickets clearfix">
                    <ul>
                        <li>
                            <p>Z券</p>
                            <span class="maincolor"><?php echo $zquan; ?></span>
                        </li>
                        <li>
                            <p>余额</p>
                            <span class="maincolor"><?php echo $yue; ?></span>
                        </li>
                    </ul>
                </div>
                <!-- <div class="transbtn">
                    <a href="javascript:void(0)">买入</a>
                    <a href="javascript:void(0)" class="saleout">卖出</a>
                </div> -->

            </div>

            <div class="tradecode">
                <ul>
                    <li>
                        <?php if(is_array($arr_time1) || $arr_time1 instanceof \think\Collection): if( count($arr_time1)==0 ) : echo "" ;else: foreach($arr_time1 as $key=>$val): ?>
                            <div class="tradecodeTitle flex align-c jus-between">
                                <p><?php echo $key; ?></p>
                                <p>交易记录：<span class="maincolor"><?php echo $arr_count[$key]; ?>条</span></p>
                            </div>
                            <div class="tradecodelist">
                                <ul>
                                    <?php if(is_array($val) || $val instanceof \think\Collection): if( count($val)==0 ) : echo "" ;else: foreach($val as $k=>$v): ?>
                                        <li class="flex align-c">
                                            <?php if($v['ticket_change_type'] == 1): ?>
                                                <img src="__STATIC__/images/newimg/usr/ticketZ.png" alt="">
                                                <div class="tradedetail flex  align-c jus-between">
                                                    <p>我通过购买商品获得了<?php echo $v['ticket_change_number']; ?>张Z券</p>
                                                    <span>+<?php echo $v['ticket_change_number']; ?>张</span>
                                                </div>
                                            <?php endif; if($v['ticket_change_type'] == 2): ?>
                                                <img src="__STATIC__/images/newimg/usr/ticketZ.png" alt="">
                                                <div class="tradedetail flex  align-c jus-between">
                                                    <p>我通过后台添加获得了<?php echo $v['ticket_change_number']; ?>张Z券</p>
                                                    <span>+<?php echo $v['ticket_change_number']; ?>张</span>
                                                </div>
                                            <?php endif; if($v['ticket_change_type'] == 3): ?>
                                                <img src="__STATIC__/images/newimg/usr/ticketZ.png" alt="">
                                                <div class="tradedetail flex  align-c jus-between">
                                                    <p>我通过后台自动释放消耗了<?php echo $v['ticket_change_number']; ?>张Z券</p>
                                                    <span>-<?php echo $v['ticket_change_number']; ?>张</span>
                                                </div>
                                            <?php endif; if($v['ticket_change_type'] == 4): if($v['ticket_change_add'] == 1): ?>
                                                    <img src="__STATIC__/images/newimg/usr/buy.png" alt="">
                                                    <div class="tradedetail flex  align-c jus-between">
                                                        <p>我通过交易获得了<?php echo $v['ticket_change_number']; ?>张挂售券</p>
                                                        <span>+<?php echo $v['ticket_change_number']; ?>张</span>
                                                    </div>
                                                <?php endif; if($v['ticket_change_add'] == 0): ?>
                                                    <img src="__STATIC__/images/newimg/usr/scaleOut.png" alt="">
                                                    <div class="tradedetail flex  align-c jus-between">
                                                        <p>我通过交易消耗了<?php echo $v['ticket_change_number']; ?>张挂售券</p>
                                                        <span>-<?php echo $v['ticket_change_number']; ?>张</span>
                                                    </div>
                                                <?php endif; endif; if($v['ticket_change_type'] == 5): ?>
                                                <img src="__STATIC__/images/newimg/usr/balanceT.png" alt="">
                                                <div class="tradedetail flex  align-c jus-between">
                                                    <p>我通过推荐用户消费获得了<?php echo $v['ticket_change_number']; ?>张余额券</p>
                                                    <span>+<?php echo $v['ticket_change_number']; ?>张</span>
                                                </div>
                                            <?php endif; if($v['ticket_change_type'] == 6): ?>
                                                <img src="__STATIC__/images/newimg/usr/general.png" alt="">
                                                <div class="tradedetail flex  align-c jus-between">
                                                    <p>我通过自动挂售获得了<?php echo $v['ticket_change_number']; ?>张万用券</p>
                                                    <span>+<?php echo $v['ticket_change_number']; ?>张</span>
                                                </div>
                                            <?php endif; if($v['ticket_change_type'] == 9): ?>
                                                <img src="__STATIC__/images/newimg/usr/attached.png" alt="">
                                                <div class="tradedetail flex  align-c jus-between">
                                                    <p>我通过自动挂售消耗了<?php echo $v['ticket_change_number']; ?>张挂售券</p>
                                                    <span>-<?php echo $v['ticket_change_number']; ?>张</span>
                                                </div>
                                            <?php endif; if($v['ticket_change_type'] == 7): ?>
                                                <img src="__STATIC__/images/newimg/usr/general.png" alt="">
                                                <div class="tradedetail flex  align-c jus-between">
                                                    <p>我通过交易所出售获得了<?php echo $v['ticket_change_number']; ?>张万用券</p>
                                                    <span>+<?php echo $v['ticket_change_number']; ?>张</span>
                                                </div>
                                            <?php endif; if($v['ticket_change_type'] == 8): ?>
                                                <img src="__STATIC__/images/newimg/usr/attached.png" alt="">
                                                <div class="tradedetail flex  align-c jus-between">
                                                    <p>我通过交易所出售消耗了<?php echo $v['ticket_change_number']; ?>张挂售券</p>
                                                    <span>-<?php echo $v['ticket_change_number']; ?>张</span>
                                                </div>
                                            <?php endif; ?>

                                        </li>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>

                                </ul>
                            </div>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </li>

                </ul>
            </div>
        </div>
    </div>


    <!-- <div class="successBg">
        <div class="succpup">
            <div class="saleBg">
                <p>卖出5张</p>
            </div>
            <a href="javascript:void(0)" class="sureBtn">
                <img src="__STATIC__/images/newimg/usr/suebtn.png" alt="">
            </a>
            <a href="javascript:void(0)" class="closeBtn">
                <img src="__STATIC__/images/newimg/usr/closetrade.png" alt="">
            </a>
        </div>

    </div> -->
</body>

</html>