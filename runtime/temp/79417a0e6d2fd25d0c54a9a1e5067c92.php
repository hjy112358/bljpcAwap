<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:41:"./template/mobile/new/patternb\buyIn.html";i:1562898505;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta name="Generator" content="TPshop v1.1" />
    <meta charset="UTF-8">
    <!-- <title>买入</title> -->
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

<body class="myteam scalebody">
    <div class="wrap">
        <!-- <div class="maincolorbg flex jus-between align-c tophead">
            <a href="javascript:history.back(-1)" class="iconfont icon-fanhui2"></a>
            <p class="font-18">买入</p>
            <a href="javascript:void(0)"></a>
        </div> -->
        <!-- <div class="maincolorbg  tophead" style="text-align: center">
            <a href="javascript:history.back(-1)" class="iconfont icon-fanhui2"></a>
            <p class="font-18" style="line-height:60px;margin-left: 0">买入</p>
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

        <div class="scaleOrderbox">
            <ul>
                <li class="flex jus-start align-c">
                    <div class="checkimg">
                        <input type="checkbox" class="inputcheck" onclick="checkinput(this)">
                    </div>
                    <div class="scaleimg">
                        <img src="__STATIC__/images/newimg/patternb/storeimg.png" alt="">
                    </div>
                    <div class="scaledetail">
                        <p class="scalegoods">399资产包</p>
                        <p class="scaleout">已有200人购买</p>
                        <div class="priceAnum flex jus-between align-c">
                            <p><span>￥</span>399</p>
                            <div class="shopcount flex  align-c">
                                <span onclick="subnum(this)">-</span>
                                <input type="number" onkeyup="value=value.replace(/^(0+)|[^\d]+/g,'')" value="1"
                                    class="shopnum">
                                <span onclick="plusnum(this)">+</span>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="flex jus-start align-c">
                    <div class="checkimg">
                        <input type="checkbox" class="inputcheck" onclick="checkinput(this)">
                    </div>
                    <div class="scaleimg">
                        <img src="__STATIC__/images/newimg/patternb/storeimg.png" alt="">
                    </div>
                    <div class="scaledetail">
                        <p class="scalegoods">399资产包</p>
                        <p class="scaleout">已有200人购买</p>
                        <div class="priceAnum flex jus-between align-c">
                            <p><span>￥</span>399</p>
                            <div class="shopcount flex  align-c">
                                <span onclick="subnum(this)">-</span>
                                <input type="number" onkeyup="value=value.replace(/^(0+)|[^\d]+/g,'')" value="1"
                                    class="shopnum">
                                <span onclick="plusnum(this)">+</span>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>

        <div class="scalebottom flex jus-between align-c ">
            <div>
                <input type="checkbox" id="checkall">
                <label for="checkall">全选</label>
            </div>
            <div class="paymsg flex jus-start align-c">
                <p>买入总计：￥2000</p>
                <a href="<?php echo url('patternb/seAccout'); ?>">结算</a>
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

        $("#checkall").on("click", function () {
            var _this = $(this);
            var checkstatu = $(this).prop("checked");
            if (checkstatu) {
                $(".scaleOrderbox ul li").each(function (i, v) {
                    $(v).find(".inputcheck").prop("checked", true)
                })
            } else {
                $(".scaleOrderbox ul li").each(function (i, v) {
                    $(v).find(".inputcheck").prop("checked", false)
                })
            }
        })
    })
    function checkinput(index){
        var _this=$(this);
        $(".scaleOrderbox ul li").each(function(i,v){
            var checkstatu=$(v).find(".inputcheck").prop("checked");
            if(!checkstatu){
                $("#checkall").prop("checked",false);
                return false;
            }else{
                $("#checkall").prop("checked",true)
            }
        })
    }
    function subnum(index) {
        var _this = $(index)
        var numNow = parseInt(_this.next("input").val())
        if (numNow <= 1) {
            _this.next("input").val(1)
        } else {
            --numNow
            _this.next("input").val(numNow)
        }
    }
    function plusnum(index) {
        var _this = $(index)
        var now = parseInt(_this.prev("input").val())
        _this.prev("input").val(++now)
    }
    
</script>

</html>