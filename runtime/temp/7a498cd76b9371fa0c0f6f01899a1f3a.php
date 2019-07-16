<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:46:"./template/mobile/new/partner\partner_all.html";i:1560323710;s:46:"./template/mobile/new/public\foot_partner.html";i:1559462286;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta name="Generator" content="TPshop v1.1" />
    <meta charset="UTF-8">
    <title>合伙人-全部宝贝</title>
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="__STATIC__/css/public.css" />
    <link rel="stylesheet" type="text/css" href="__STATIC__/css/index.css" />
    <link rel="stylesheet" href="__STATIC__/css/store.css">
    <link rel="stylesheet" href="__STATIC__/css/partner.css">
    <link rel="stylesheet" href="__STATIC__/css/iconfont/iconfont.css">
    <link rel="stylesheet" href="__STATIC__/css/swiper.min.css">
    <script type="text/javascript" src="__STATIC__/js/jquery.js"></script>
    <script type="text/javascript" src="__STATIC__/js/jquery.json.js"></script>
    <script type="text/javascript" src="__STATIC__/js/layer.js"></script>
    <script src="__PUBLIC__/js/global.js"></script>
    <script src="__PUBLIC__/js/mobile_common.js"></script>
    <script src="__STATIC__/js/swiper.min.js"></script>
    <script type="text/javascript" src="__STATIC__/js/TouchSlide.1.1.js"></script>
    <style>
        .ending {
            text-align: right;
            padding-top: 27px;
            position: relative;
            z-index: 2;
        }

        .endingimg {
            position: relative;
            z-index: 1;
        }

        .endingimg img {
            width: 100px;
            height: 100px;
            position: absolute;
            bottom: -32px;
            right: 0;
        }
    </style>

</head>

<body>
    <div class="wrap storelist partnerlist">
        <div class="maincolorbg flex jus-between align-c tophead">
            <a href="javascript:history.back(-1)" class="iconfont icon-fanhui2"></a>
            <p class="font-18">优选套装</p>
            <a href="javascript:void(0)"></a>
        </div>

        <div class="tablist">
            <div id="leftTabBox" class="tabBox ">
                <div class="bigGoods flex jus-between">
                    <div class="bigGoodsimg">
                        <img src="<?php echo $goods['original_img']; ?>" alt="">
                    </div>
                    <div class="goodmsg">
                        <p class="font-11 colb3" style='line-height: 15px;text-align:left'><?php echo $goods['goods_name']; ?></p>
                        <p class="font-13 colb3"><?php echo $goods['keywords']; ?></p>
                        <div class="discoutmsg flex jus-between align-c">
                            <p class="price font-10">￥<span class="font-15 font-bold"><?php echo $goods['shop_price']; ?></span></p>
                            <p class="inventory">库存<?php echo $goods['store_count']; ?></p>
                            <a href="javascript:void(0)" class="font-10 battle" data-id="<?php echo $goods['goods_id']; ?>">马上抢</a>
                            <span class="triangle"></span>
                        </div>
                    </div>
                </div>
                <div class="bd">
                    <!-- 综合 -->
                    <ul class="clearfix">

                        <?php if(is_array($goods_list) || $goods_list instanceof \think\Collection): $i = 0; $__LIST__ = $goods_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                            <li>
                                <div class="sgoodsimg">
                                    <img src="<?php echo $vo['original_img']; ?>" alt="">
                                </div>
                                <div class="discoutmsg flex jus-between align-c">
                                    <p class="price font-10">￥<span class="font-15 font-bold"><?php echo $vo['shop_price']; ?></span>
                                    </p>
                                    <p class="inventory">库存<?php echo $vo['store_count']; ?></p>
                                    <a href="javascript:void(0)" class="font-10 battle" data-id="<?php echo $vo['goods_id']; ?>">马上抢</a>
                                    <span class="triangle"></span>
                                </div>
                            </li>
                        <?php endforeach; endif; else: echo "" ;endif; ?>


                    </ul>

                </div>
            </div>
        </div>
    </div>

    <input type="hidden" name="is_partner" value="<?php echo $user_info['is_partner']; ?>">
    <input type="hidden" name="partner_goodsid" value="<?php echo $user_info['partner_goodsid']; ?>">
    <input type="hidden" name="is_agree" value="<?php echo $user_info['is_agree']; ?>">
    <input type="hidden" name="goods_id" value="">
    <div class="mark hidden">
        <div class="agreementbox">
            <div class="agreement">
                <p>订立协议合伙人： 　　</p>
                <p>甲方：（企业）江苏必量家电子商务有限公司</p>
                <p>法人代表：王迎宾</p>
                <p>乙方（普通合伙人）：</p>
                <p>第一条合伙宗旨：推广必量家品牌，互利互惠，共同创业; 　　</p>
                <p>第二条合伙人企业名称：江苏必量家电子商务有限公司　　　</p>
                <p>第三条合伙期限，电子订单签订之日起；</p>
                <p>第四条合伙方式：　　</p>
                <p>（一）乙方出资，共计人民币壹万元整；甲方一次性提供等额产品给予乙方；　</p>
                <p>第五条 加入合伙、退出合伙； 　　</p>
                <p>（一）加入合伙。 　　</p>
                <p>1. 新合伙人加入合伙，必须经董事会同意； 　　</p>
                <p>2. 承认并签署本合伙协议； 　　 　　</p>
                <p>(二）退出合伙。　　</p>
                <p>1. 被动退出合伙：合伙期限内，有下列情形之一时，乙方自动退出合伙：</p>
                <p>①乙方未能准时参与甲方企业季度总结会议，超过2次，含2次；</p>
                <p>②乙方未能完成合伙人义务；　</p>
                <p>第六条 甲方的权利和义务</p>
                <p>（一）甲方的权利：</p>
                <p>1.拥有合伙实体的所有权，合伙事务的决定权和一票否决权；</p>
                <p>2.拥有合伙利益的分配权；</p>
                <p>3.甲方分配合伙利益应以出资额比例或者按协议的约定进行；</p>
                <p>4.拥有制定企业所有制度的权利；</p>
                <p>5.拥有企业所有人该享有的法定权利。</p>
                <p>（二）甲方的义务：</p>
                <p>1.保证乙方的合法权利不受侵犯；</p>
                <p>2.为乙方提供发展的平台；</p>
                <p>3.按时分配合伙人收益；</p>
                <p>4.保证乙方在本协议中规定的权利和义务不受损害。</p>
                <p>第七条 乙方的权利和义务： 　　</p>
                <p>（一）乙方的权利：</p>
                <p>①享有公司季度利润5%加权分红，季度发放；利润奖励涉及税额部分由乙方承担；</p>
                <p>②优先拿地区代理权；</p>
                <p>③优先进入地面超市和移动超市的经营权；</p>
                <p>④优先享有公司活动资源分配权以及担保权；</p>
                <p>⑤优先享有上市公司原始股权配售；</p>
                <p>⑥享受公司其他一切政策的优先权；</p>
                <p>（二）乙方的义务：</p>
                <p>①每个月分享不少于20个新会员加入平台；</p>
                <p>②每月团队总消费业绩不少于3万元；</p>
                <p>③按时参加甲方企业季度总结会。</p>
                <p>第八条 禁止行为： 　　</p>
                <p>（一）未经甲方同意，禁止乙方私自以合伙名义进行业务活动；如其业务获得利益归甲方，造成的损失按实际损失进行赔偿； 　　</p>
                <p>（二）禁止乙方参与和本企业存在竞争关系的平台； </p>
                <p>（三）乙方不得从事损害甲方企业利益的活动。</p>
                <p>第九条 违约责任：　　</p>
                <p>（一）乙方私自转让其在甲方企业中合伙份额的，其行为无效，或者作为退出合伙处理；由此给其他合伙人造成损失的，承担赔偿责任； 　 　　 　　</p>
                <p>第十条 合同争议解决方式：</p>
                <p>1、凡因本协议或与本协议有关的一切争议，甲乙双方之间共同协商，如协商不成，提交甲方所在地仲裁委员会仲裁。</p>
                <p>2、仲裁裁决是终局的，对双方均有约束力。</p>
                <p>3、仲裁费用由败诉方承担。</p>
                <p>4、在仲裁过程中除了正在仲裁的部分外，合同的其他条款继续履行。</p>
                <p>第十一条 其他： 　　</p>
                <p>（一） 经协商一致，甲乙双方可以修改本协议或对未尽事宜进行补充；补充、修改内容与本协议相冲突的，以补充、修改后的内容为准；　</p>
                <p class="ending">江苏必量家电子商务有限公司 </p>
                <div class="endingimg">
                    <img src="__STATIC__/images/newimg/index/chapter.jpg" alt="">
                </div>
            </div>
            <form action="" class="agreeform">
                <div class="checkinput">
                    <input type="checkbox" class="ischeck " onclick="agreements()">
                    <label for="" class="font-12">同意签署本协议</label>
                </div>
            </form>

        </div>
        <img src="__STATIC__/images/newimg/onebuy/close.png" alt="" class="closemark" onclick="agreeno()">
    </div>


    <div class="contact hidden">
        <div class="contactimg">
            <p class="font-14">拨打电话<span>(0513)5588 5526</span></p>
            <a href="tel:0513-5588-5526" class="contactus"></a>
            <img src="__STATIC__/images/newimg/onebuy/close.png" alt="" class="closeimg">
        </div>
    </div>

    <div class="storefooter partner">
        <ul class="clearfix">
            <li>
                <a href="<?php echo U('index/index'); ?>">
                    <img src="__STATIC__/images/newimg/store/storeindex.png" alt="" width="17" height="17">
                    <p class="font-12">首页</p>
                </a>
            </li>
            <li>
                <a href="<?php echo U('partner/partner_all'); ?>">
                    <img src="__STATIC__/images/newimg/store/allgoods.png" alt="" width="15" height="17">
                    <p class="font-12">全部宝贝</p>
                </a>
            </li>
             <!-- <li>
                <a href="<?php echo U('order/partnerClassify'); ?>">
                    <img src="__STATIC__/images/newimg/store/storeClassify.png" alt="" width="15" height="14">
                    <p class="font-12">宝贝分类</p>
                </a>
            </li>  -->
           
            <li class="contractCus">
                <a href="javascript:void(0)">
                    <img src="__STATIC__/images/newimg/store/contact.png" alt="" width="18" height="17">
                    <p class="font-12">联系客服</p>
                </a>
            </li>
        </ul>
    </div>
</body>
<!-- <script type="text/javascript" src="__STATIC__/js/contact.js"></script> -->
<script type="text/javascript">
    // TouchSlide({ slideCell: "#leftTabBox" });


    $(function () {
        // $(".checkinput input").change(function () {
        //     var _this = $(this);
        //     var checkstatus = _this.attr('checked');
        //     if (checkstatus == 'checked') {
        //         _this.addClass("checknow");
        //         $(".mark").addClass("hidden");
        //         $('input:checkbox').attr('checked', false);
        //         _this.removeClass("checknow")

        //     } else {
        //         _this.removeClass("checknow")
        //     }
        // });


        $(".closemark").on("click", function () {
            $(".mark").addClass("hidden");
            $("input[name='goods_id']").val() = '';

        })


    })

    $(function () {
        $(".contractCus").on("click", function () {
            $(".contact").removeClass("hidden");
        })

        $(".closeimg").on("click", function () {
            $(".contact").addClass("hidden");
        })


        $(document).on("click", ".battle", function () {
            var is_partner = $("input[name='is_partner']").val();
            var partner_goodsid = $("input[name='partner_goodsid']").val();
            var is_agree = $("input[name='is_agree']").val();
            var goods_id = $(this).attr("data-id");
            if ((partner_goodsid != '') && (is_partner == '2')) {
                layer.open({
                    content: '您的合伙人身份已被撤销,如需重新加入,请联系客服',
                });
                return false;
            }

            if ((partner_goodsid != '') && (is_partner == '1')) {
                layer.open({
                    content: '只能买一次商品',
                });
                return false;
            }
            $(".mark").removeClass("hidden");
            $("input[name='goods_id']").val(goods_id);
        })


    })


    function agreements() {
        var goods_id = $("input[name='goods_id']").val();
        var is_agree = $("input[name='is_agree']").val();
        var user_id = "<?php echo $user_info['user_id']; ?>";

        if (is_agree == '1') {
            window.location.href = "/mobile/goods/goodsDetailNew?id=" + goods_id + "&user_id=" + user_id;
        } else {
            $(".ischeck").addClass("checknow");
            $.ajax({
                url: "<?php echo url('partner/ajaxagree'); ?>",
                type: "post",
                data: { user_id: user_id },
                success: function (data) {
                    if (data['status'] == 1) {
                        $("input[name='is_agree']").val(1);
                        window.location.href = "/mobile/goods/goodsDetailNew?id=" + goods_id + "&user_id=" + user_id;
                    } else {
                        layer.open({
                            content: '请同意协议',
                        });
                        return false;
                    }

                }


            })

        }





    }









</script>


</html>