<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:41:"./template/mobile/new/user\scaleList.html";i:1558508528;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta name="Generator" content="TPshop v1.1" />
    <meta charset="UTF-8">
    <title>挂售列表</title>
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
    <style>
        .tradecodelist ul li {
            line-height: 50px;
        }

        .tradecodelist {
            margin-top: 15px;
        }
    </style>

</head>

<body class="tradez">
    <div class="wrap tradewrap">
        <!-- <div class="pubhead maincolorbg">
            <a href="javascript:history.back(-1)">
                <p>挂售列表</p>
            </a>
        </div> -->
        <div class="maincolorbg flex jus-between align-c tophead">
            <a href="javascript:history.back(-1)" class="iconfont icon-fanhui2"></a>
            <p class="font-18">挂售列表</p>
            <a href=""></a>
        </div>


        <div class="setting" style="background:none">

            <div class="transtype">
                <div class="tickets clearfix">
                    <ul>
                        <li>
                            <p>数量</p>
                            <span class="maincolor">8640</span>
                        </li>
                        <li>
                            <p>今日券值</p>
                            <span class="maincolor">0.1</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="tradecode">
                <ul>
                    <li>
                        <div class="tradecodelist">
                            <ul>
                                <?php if(is_array($sell_all) || $sell_all instanceof \think\Collection): if( count($sell_all)==0 ) : echo "" ;else: foreach($sell_all as $k=>$v): ?>
                                    <li class="flex align-c">
                                        <img src="__STATIC__/images/newimg/usr/buy.png" alt="">
                                        <div class="tradedetail flex  align-c jus-between">
                                            <p><?php echo $v['sell_number']; ?>张挂售券</p>
                                            <!--                                        <input type="hidden" id="hid" value="<?php echo $v['sell_user_id']; ?>">-->
                                            <span data-num="<?php echo $v['sell_number']; ?>" data-id="<?php echo $v['sell_id']; ?>">买入</span>
                                        </div>
                                    </li>
                                <?php endforeach; endif; else: echo "" ;endif; ?>

                            </ul>
                        </div>
                    </li>

                </ul>
            </div>
        </div>
    </div>
</body>
<script>
    $(".tradecodelist ul li").each(function () {
        var _this = $(this);
        _this.find("span").on("click", function () {
            var sellNum = $(this).attr("data-num");
            var sellId = $(this).attr("data-id");

            $.ajax({
                url: "<?php echo U('User/scaleList_do'); ?>",
                data: { sellNum: sellNum, sellId: sellId },
                type: "POST",
                success: function (res) {
                    if (res == 1) {
                        alert('购买成功');
                        window.location.reload();
                        return false;
                    } else {
                        alert('购买失败');
                    }
                }
            })
            return false
        })
    })

</script>

</html>