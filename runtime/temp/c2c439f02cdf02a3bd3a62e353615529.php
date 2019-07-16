<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:47:"./template/mobile/new/goods\goodsDetailNew.html";i:1562844323;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta name="Generator" content="TPshop v1.1" />
    <meta charset="UTF-8">
    <!-- <title>商品详情页</title> -->
    <title></title>
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="__STATIC__/css/public.css" />
    <link rel="stylesheet" type="text/css" href="__STATIC__/css/index.css" />
    <link rel="stylesheet" href="__STATIC__/css/goodsDetailNew.css?time=<?php echo time()?>">
    <link rel="stylesheet" href="__STATIC__/css/iconfont/iconfont.css">
    <script type="text/javascript" src="__STATIC__/js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="__STATIC__/js/TouchSlide.1.1.js"></script>
    <script type="text/javascript" src="__STATIC__/js/jquery.json.js"></script>
    <script type="text/javascript" src="__STATIC__/js/touchslider.dev.js"></script>
    <script type="text/javascript" src="__STATIC__/js/layer.js"></script>
    <script type="text/javascript" src="__STATIC__/js/clipboard.min.js"></script>
  
<!--    <script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.4.0.js"></script>-->
<!--    <script type="text/javascript" src="http://res2.wx.qq.com/open/js/jweixin-1.4.0.js"></script>-->



    <style>
        .detailsbox {
            width: 100%;
        }

        .detailsbox img {
            max-width: 100%;
        }
        .goodstype ul li{
            width:auto;
            padding:0 5px;
            margin-bottom:5px;
        }
        #copy{
            background:#fff;
            border:none;
            text-decoration:underline;
        }
    </style>
</head>

<body class="teamrebate">
    <div class="wrap">
        <div class="maincolorbg tophead " id="topAnchor" style="text-align: center;">
            <p class="font-18" style="margin-left:0">商品详情页</p>
        </div>
        <!-- <div class="maincolorbg flex jus-between align-c tophead " id="topAnchor">
            <a href="javascript:history.back(-1)" class="iconfont icon-fanhui2"></a>
            <p class="font-18" style="margin-left:0">商品详情页</p>
            <a href="javascript:void(0)" class="share flex" style="width:23px;height: 23px;margin-top:5px">
                <img src="__STATIC__/images/newimg/goods/sharecode.png" alt="">
            </a>
        </div> -->
        <div id="focus" class="focus">
            <!-- <div class="hd">
                <ul>
                     <li class="on"></li>
                    <li class=""></li>
                    <li class=""></li> 
                </ul>
            </div> -->
            <div class="bd">
                <div class="tempWrap" style="overflow:hidden; position:relative;">
                    <ul
                        style=" position: relative; overflow: hidden; padding: 0px; margin: 0px; transition-duration: 200ms; transform: translate(0px, 0px) translateZ(0px);">
                        <?php if(is_array($goods_images) || $goods_images instanceof \think\Collection): $i = 0; $__LIST__ = $goods_images;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <li style="display: table-cell; vertical-align: top; width: 320px;">
                            <a href="javascript:void(0)">
                                <img src="<?php echo imgtransformation($vo['image_url']); ?>">
                            </a>
                        </li>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                        <!-- <li style="display: table-cell; vertical-align: top; width: 320px;">
                            <a href="javascript:void(0)">
                                <img src="__STATIC__/images/newimg/store/storeCarousel.png">
                            </a>
                        </li> -->
                        <!-- <div class="activitPrice">
                            <div class="rectangle">618全店满599-150</div>
                            <div class="roundness">
                                <span class="font-12">活动价：</span>
                                <p><i class="font-12">￥</i>499</p>
                            </div>
                        </div> -->
                    </ul>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            TouchSlide({
                slideCell: "#focus",
                // titCell: ".hd ul", //开启自动分页 autoPage:true ，此时设置 titCell 为导航元素包裹层
                mainCell: ".bd ul",
                effect: "left",
                autoPlay: true,//自动播放
                autoPage: false, //自动分页
                switchLoad: "_src" //切换加载，真实图片路径为"_src" 
            });
        </script>
        <!-- 产品详情 -->
        <div class="goodsdetail goodsbox">
            <?php if($goods_info['is_partner'] == 1): ?>
                <p class="maincolor font-16"><i class="font-12">￥</i><?php echo $goods_info['shop_price']; ?></p>
                <p class="font-15 goodstitle"><?php echo $goods_info['goods_name']; ?></p>
                <p class="font-10 goodstrait"><?php echo $goods_info['keywords']; ?></p>
                <?php else: ?>
                <p class="maincolor font-16"><i class="font-12">￥</i><?php echo $goods_attr[0]['attr_price']; ?></p>
                <p class="font-15 goodstitle"><?php echo $goods_info['goods_name']; ?></p>
                <p class="font-10 goodstrait"><?php echo $goods_attr[0]['attr_value']; ?></p>
            <?php endif; ?>



            <!-- <div class="flex jus-start align-c">
                <img src="__STATIC__/images/newimg/goods/praise.png" alt="">
                <p class="font-10 praises">563人赞过</p>
            </div> -->

        </div>

        <!-- 地址福利 -->
        <?php if($goods_info['is_zcoupon'] == 1): ?>
            <div class="welfare">
                <!-- <div class="flex jus-start align-c">
                <p>发货</p>
                <div class="flex jus-between align-c walfareml38 ">
                    <p class="location welfare2c pos-r">江苏南通</p>
                    <p class="welfare2c">快递：0.00</p>
                    <p>月销4.0万+</p>
                </div>

            </div> -->
                <!-- <div class="flex jus-between align-c">
                <div class="flex jus-start">
                    <p>优惠</p>
                    <p class="walfareml38">领取注册券</p>
                </div>
                <p>领券></p>
            </div> -->
                <div class="flex jus-between align-c " style="font-weight: 600">
                    <div class="flex jus-start">
                        <p class="maincolor font-13">Z券</p>
                        <p class="walfareml38 maincolor  font-13">赠送Z券</p>
                    </div>
                    <?php if($goods_info['is_partner'] == 1): ?>
                        <p class="maincolor  font-13"><?php echo $goods_info['zcoupon']; ?></p>
                        <?php else: ?>
                        <p class="maincolor  font-13">
                            <?php echo  floor($goods_attr[0]['attr_profit']/$coupon_price['coupon_price']) ?></p>
                    <?php endif; ?>
                </div>
                <!-- <div class="flex jus-start align-c">
                <p>积分</p>
                <p class="walfareml38">购买可得5积分</p>
            </div> -->
            </div>
        <?php endif; ?>
        <!-- 保障 -->
        <div class="safeguard flex jus-start align-c">
            <p class="font-12">保障</p>
            <div class="flexgrow1 flex jus-between align-c walfareml38">
                <p class="welfare2c font-12">正品保证 极速退货 七天退换</p>
                <p class="font-12">></p>
            </div>
        </div>

        <!-- 评价 -->
        <!-- <div class="evaluate">
            <div class="flex jus-between align-c evaluteTitle">
                <p class="font-12">宝贝评价（359798）</p>
                <p class="font-12 maincolor">查看全部></p>
            </div>

            <div id="leftTabBox" class="tabBox">
                <div class="hd">
                    <ul class="clearfix">
                        <li class="font-10 on">质量不错（2157）</li>
                        <li class="font-10">面料好（2157）</li>
                        <li class="font-10">便宜（2157）</li>
                    </ul>
                </div>
                <div class="bd">
                    <ul>
                        <li>
                            <div class="flex  jus-start align-c">
                                <img src="__STATIC__/images/newimg/usr/userimg.png" alt="">
                                <p class="font-10">我**8</p>
                            </div>
                            <p class="font-12">衣服收到了，非常满意！实物比图片更漂亮！价格实惠，比外边商场
                                便宜很多，薄薄的棉线，穿在身上透气性好！不会显得闷热</p>
                        </li>
                        <li>
                            <div class="flex  jus-start align-c">
                                <img src="__STATIC__/images/newimg/usr/userimg.png" alt="">
                                <p class="font-10">我**8</p>
                            </div>
                            <p class="font-12">衣服收到了，非常满意！实物比图片更漂亮！价格实惠，比外边商场
                                便宜很多，薄薄的棉线，穿在身上透气性好！不会显得闷热</p>
                        </li>
                    </ul>

                </div>
            </div>
        </div> -->

        <!-- 宝贝详情 -->
        <div class="details">
            <h3 class="font-12">宝贝详情</h3>
            <div class="detailsbox"><?php echo $goods_info['goods_content']; ?></div>
        </div>

    </div>
    <div class="goodsbtn ">
        <a href="javascript:void(0)" class="maincolorbg hidden butNowbtn" onclick="addcart(1)">立即购买</a>
        <a href="javascript:void(0)" class="maincolorbg hidden shopcarbtn hidden" onclick="addcart(2)">加入购物车</a>
    </div>

    <!-- 规格型号 -->
    <div class="choosemodels hidden">
        <div class="modelsbox">
            <div class="modelMsg flex jus-start align-c">
                <img src="<?php echo imgtransformation($goods_info['original_img']); ?>" alt="">
                <div>
                    <span class="maincolor font-17">￥</span>
                    <p class="font-15 " style="line-height:20px;display: -webkit-box;-webkit-box-orient: vertical;-webkit-line-clamp: 2;overflow: hidden;width: 100%;"><?php echo $goods_info['goods_name']; ?></p>
                    <!-- <p class="font-13">请选择 型号</p> -->
                </div>

            </div>
            <!-- 型号 -->
            <div class="goodstype">
                <p>规格</p>
                <ul class="clearfix">
                    <?php if(is_array($goods_attr) || $goods_attr instanceof \think\Collection): $i = 0; $__LIST__ = $goods_attr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;if($vo['attr_value'] == $goods_attr[0]['attr_value']): ?>
                            <li class="on" data-id="<?php echo $vo['goods_attr_id']; ?>"><?php echo $vo['attr_value']; ?></li>
                            <?php else: ?>
                            <li data-id="<?php echo $vo['goods_attr_id']; ?>"><?php echo $vo['attr_value']; ?></li>
                        <?php endif; endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
            <div class="buycount flex jus-between align-c">
                <p class="font-14">购买数量</p>
                <div class="changeCount">
                    <a href="javascript:void(0)" class="font-15 subtractCount">-</a>
                    <input type="text" value="1" class="font-15 coutnum" id="attr_num">
                    <a href="javascript:void(0)" class="font-15 addCount">+</a>
                </div>
            </div>

            <div class="closechoose">
                <img src="__STATIC__/images/newimg/quit.png" alt="" class="closeb">
            </div>
        </div>
    </div>

    <div class="footerlist  clearfix">
        <div class="flex jus-between align-c">
            <ul class="clearfix">
                <li>
                    <img src="__STATIC__/images/newimg/goods/storeFoot.png" alt="" width="13" height="13">
                    <p class="font-12">店铺</p>
                </li>
                <li>
                    <img src="__STATIC__/images/newimg/goods/serviceFoot.png" alt="" width="15" height="13">
                    <p class="font-12">客服</p>
                </li>
                <li onclick="collects();">
                    <img id="heart" <?php if(($is_collect == 1) and ($is_show == 1)): ?>
                    src="__STATIC__/images/newimg/goods/collectFootR.png"
                    <?php else: ?> src="__STATIC__/images/newimg/goods/collectFoot.png" <?php endif; ?> alt="" width="14" height="13">
                    <p class="font-12 iscollect">
                        <?php if(($is_collect == 1) and ($is_show == 1)): ?>已收藏
                            <?php else: ?>收藏<?php endif; ?>
                    </p>
                </li>
            </ul>
        </div>
        <?php if($goods_info['is_partner'] == 1): ?>
            <div class="flex jus-between align-c btnlist" style="text-align:right;">
                <!-- <a href="javascript:void(0)" class="font-12 shopcar">加入购物车</a> -->
                <a href="javascript:void(0)" class="maincolorbg  butNowbtn" onclick="addcart(1)"
                    style="margin-right:10px">立即购买</a>
            </div>

            <?php else: ?>
            <div class="flex jus-between align-c btnlist">
                <a href="javascript:void(0)" class="font-12 shopcar">加入购物车</a>
                <a href="javascript:void(0)" class="font-12 maincolorbg buyNow">立即购买</a>
            </div>

        <?php endif; ?>
    </div>


    <!-- 协议 -->
    <div class="agreement hidden">
        <div class="agreementbox">
            <div class="agreementmsg">
                <p>甲方：江苏必量家电子商务有限公司</p>
                <p>乙方：</p>
                <p>在签署本协议之前，请乙方仔细阅读本协议各条款，如有疑问请及时咨询。</p>
                <p>乙方在签署本协议后即视为完全理解并同意接受本协议的全部条款。</p>
                <p>根据《中华人民共和国合同法》相关法律、法规，甲乙双方在平等、自愿、公平、诚实、信用的基础上，就甲方为乙方提供产品服务的有关事宜，达成协议如下：</p>
                <p>一、乙方的权利及义务</p>
                <p>1、乙方参与本活动必须符合以下条件：年龄在22-60周岁内。</p>
                <p>2、乙方参与活动时，应向甲方提供乙方的真实且有效中华人民共和国居民身份证，中国建设银行或中国农业银行或中国银行储蓄卡，有效手机号码。</p>
                <p>3、乙方应配合甲方工作人员完成信用备案。</p>
                <p>4、乙方自愿参加甲方合约销售活动，并承诺：</p>
                <p>账户名称 </p>
                <p>自本协议签订之日起 （时间）内在平台完成推广任务</p>
                <p>账户下必量家本次活动所赠注册券每周释放余额不得低于 </p>
                <p>注册券释放到余额的释放方式，详见附则</p>
                <p>乙方支付产品费1元，在甲方平台购买产品。 </p>
                <p>产品名称 </p>
                <p>产品型号 </p>
                <p>产品总价值 </p>
                <p>产品赠送注册券 </p>
                <p>4、本协议生效后，乙方所选产品的售后服务由甲方指定的售后服务网点承担，按照国家标准享受“三包服务”。</p>
                <p>5、在本协议有效期内，乙方不得降低每周最低注册券转换余额标准，参与活动最低释放标准</p>
                <p>为 。</p>
                <p>若乙方实际注册券转换率达不到最低标准，由甲方进行督促：</p>
                <p>协议期第一周未完成任务，由甲方APP平台督促。</p>
                <p>协议期第二周未完成任务，由甲方客服专员督促。</p>
                <p>协议期第三周未完成任务，由甲方客服经理督促。</p>
                <div class="agreebox">

                    <p for="agree" class="font-12">同意签署本协议</p>
                </div>
            </div>
            <img src="__STATIC__/images/newimg/goods/close.png" alt="" class="closeAgree">
        </div>
    </div>


    <div>
        <a href="javascript:void(0)" class="iconfont icon-fanhuidingbu returnTop"></a>
    </div>


    <div class="sharewrap hidden">
        <div class="sharebox">
            <div class="shareimg">
                <img src="<?php echo imgtransformation($goods_images[0]['image_url']); ?>" alt="">
            </div>
            <div class="shareGoodmsg">
                <p class="shareMsg"><?php echo $goods_info['goods_name']; ?></p>
                <p class="sharePrice maincolor"><span>￥</span><?php echo $goods_info['shop_price']; ?></p>
                <div class="sharewx">
                    <img src="__STATIC__/images/newimg/goods/wx.png" alt="">
                   <button class="code-btn" id="copy" data-clipboard-target="#input">复制链接给微信好友</button>
                </div>
            </div>
            <div class="shareclose flex">
                <img src="__STATIC__/images/newimg/goods/closeshare.png">
            </div>
        </div>
    </div>
    <input type="text" value="我给你分享了来自必量家的商品，点击链接查看详情→abc.fyc365.cn/Mobile/Goods/goodsDetailNew/id/<?php echo $goods_id; ?>.html"  id="input" style="opacity:0"  readonly>

</body>
<script type="text/javascript">
 
        var clipboard = new ClipboardJS('#copy')
        // 显示用户反馈/捕获复制/剪切操作后选择的内容
        clipboard.on('success', function (e) {
            console.info('Action:', e.action)//触发的动作/如：copy,cut等
            console.info('Text:', e.text);//触发的文本
            console.info('Trigger:', e.trigger);//触发的DOm元素
            e.clearSelection();//清除选中样式（蓝色）
            alert("复制成功，即将前往微信")

            var time=setInterval(function(){
                window.location.href = "weixin://";
                // window.location.href = "https://weixin.qq.com";
                clearInterval(time)
            },1000);
        })
        clipboard.on('error', function (e) {
        });


    // onclick="wx.updateAppMessageShareData()"
    // wx.config({
    //     debug: true, // 开启调试模式,调用的所有api的返回值会在客户端alert出来，若要查看传入的参数，可以在pc端打开，参数信息会通过log打出，仅在pc端时才会打印。
    //     appId: "<?php echo $config['appId']; ?>", // 必填，公众号的唯一标识
    //     timestamp:"<?php echo $config['timestamp']; ?>" , // 必填，生成签名的时间戳
    //     nonceStr: "<?php echo $config['nonceStr']; ?>", // 必填，生成签名的随机串
    //     signature: "<?php echo $config['signature']; ?>",// 必填，签名
    //     jsApiList:"<?php echo $config['jsApiList']; ?>" // 必填，需要使用的JS接口列表
    // });
    // wx.ready(function(){
    //
    // });
    // wx.error(function(res){
    //
    // });
    // var sharetitle  = "<?php echo $goods_info['goods_name']; ?>";
    // var sharedesc   = "来自必量家商城的分享";
    // var sharelink   = "url=abc.fyc365.cn/Mobile/Goods/goodsDetailNew/id/"+<?php echo $goods_id; ?>+".html";
    // var shareimgUrl = "<?php echo imgtransformation($goods_images[0]['image_url']); ?>";
    // var shareGid = "";
    // wx.ready(function(){
    //     wx.updateAppMessageShareData({
    //         title :  sharetitle, // 分享标题
    //         desc :   sharedesc, // 分享描述
    //         link :   sharelink, // 分享链接，该链接域名或路径必须与当前页面对应的公众号JS安全域名一致
    //         imgUrl : shareimgUrl, // 分享图标
    //         success: function (res) {
    //             shared(shareLink, "friend", shareGid);
    //         },
    //         fail: function (res) {
    //             alert(JSON.stringify(res));
    //         }
    //     })
    // });
    function collects() {
        var is_show = "<?php echo $is_show; ?>";
        var goods_id = "<?php echo $goods_id; ?>";
        var is_collect = "<?php echo $is_collect; ?>";
        if (is_show == "0") {
            layer.open({
                content: '请先登录!',
                time: 1
            });
            return false;
        }
        $.ajax({
            type: "POST",
            url: "<?php echo url('goods/add_goodscollect'); ?>",
            data: { goods_id: goods_id, is_collect: is_collect },
            success: function (data) {
                if (data['status'] == 1) {
                    layer.open({
                        content: data['msg'],
                        time: 1
                    })
                    if (data['type'] == '1') {
                        $("#heart").attr("src", "__STATIC__/images/newimg/goods/collectFootR.png");
                        $(".iscollect").html("已收藏")
                    } else {
                        $("#heart").attr("src", "__STATIC__/images/newimg/goods/collectFoot.png");
                        $(".iscollect").html("收藏")
                    }

                } else {

                    layer.open({
                        content: data['msg'],
                        time: 1
                    });
                    return false;
                }
            }
        })
    }


    TouchSlide({
        slideCell: "#scrollimg",
        titCell: ".hd ul", //开启自动分页 autoPage:true ，此时设置 titCell 为导航元素包裹层
        // mainCell:".bd ul", 
        effect: "leftLoop",
        autoPage: false,//自动分页
        autoPlay: false //自动播放
    });


    TouchSlide({ slideCell: "#leftTabBox" });


    $(function () {
        $(".addCount").on("click", function () {

            var num = parseInt($(".coutnum").val());
            var newnum = num + 1;
            console.log(newnum)
            $(".coutnum").val(newnum);
        })
        $(".subtractCount").on("click", function () {

            var num = parseInt($(".coutnum").val());
            var newnum = 0;
            if (num == 1) {
                newnum = 1
            } else {
                newnum = num - 1;
            }

            console.log(newnum)
            $(".coutnum").val(newnum);
        })

        $(".shopcar").on("click", function () {
            $(".choosemodels").removeClass("hidden");
            $(".shopcarbtn").removeClass("hidden");
            $(".shopcarbtn").on("click", function () {
                $(".choosemodels").addClass("hidden");
                $(".shopcarbtn").addClass("hidden");
            })
        })


        $(".buyNow").on("click", function () {
            $(".choosemodels").removeClass("hidden");
            $(".butNowbtn").removeClass("hidden")
            $(".butNowbtn").on("click", function () {
                $(".choosemodels").addClass("hidden");
                $(".butNowbtn").addClass("hidden");
            })
        })

        $(".goodstype ul li").each(function () {
            var _this = $(this);
            _this.on("click", function () {
                $(this).addClass("on").siblings().removeClass("on")
            })
        })


        $(".closeAgree").on("click", function () {
            $(".agreement").addClass("hidden")
        })

        $(".closechoose").on("click", function () {
            $(".choosemodels").addClass("hidden");
            $(".butNowbtn").addClass("hidden")
            $(".shopcarbtn").addClass("hidden");
        })

        $(".returnTop").on("click",function(){
            window.scrollTo(0, 0);
        })

        $(".shareclose").on("click", function () {
            $(".sharewrap").addClass("hidden")
        })
        $(".share").on("click", function () {
            $(".sharewrap").removeClass("hidden")
        })

    })


</script>
<script>
    function addcart(type) {
        //整理数据
        var attr_id;
        var is_partner = "<?php echo $goods_info['is_partner']; ?>";

        if (is_partner == '1') {
            var attr_num = 1;
        } else {
            var attr_num = $("#attr_num").val();
        }

        var goods_id = "<?php echo $goods_info['goods_id']; ?>";
        if (is_partner == '1') {
            attr_id = "<?php echo $goods_attr[0]['goods_attr_id']; ?>";

        } else {
            $(".goodstype ul li").each(function () {
                var _this = $(this);
                if (_this.hasClass("on")) {
                    attr_id = _this.attr("data-id")
                }
            })
        }

        $.ajax({
            type: "POST",
            url: "/index.php?m=Mobile&c=Cart&a=ajaxAddCart",
            data: { goods_id: goods_id, attr_id: attr_id, goods_num: attr_num },// 你的formid 搜索表单 序列化提交
            dataType: 'json',
            success: function (data) {
                if (data.status < 0) {
                    layer.open({ content: data.msg, time: 2 });
                    return false;
                }
                if (type == 1)  //直接购买
                {
                    location.href = "/index.php?m=Mobile&c=Cart&a=cart";
                }

                layer.open({
                    content: '添加成功！',
                    btn: ['再逛逛', '去购物车'],
                    shadeClose: false,
                    yes: function () {
                        layer.closeAll();
                    }, no: function () {
                        location.href = "/index.php?m=Mobile&c=Cart&a=cart";
                    }
                });
            }


        })







    }


</script>

</html>