<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:42:"./template/mobile/new/user\teamReturn.html";i:1562750025;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta name="Generator" content="TPshop v1.1" />
    <meta charset="UTF-8">
    <title>团队收益</title>
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="__STATIC__/css/public.css" />
    <link rel="stylesheet" type="text/css" href="__STATIC__/css/index.css" />
    <link rel="stylesheet" href="__STATIC__/css/swiper.min.css">
    <link rel="stylesheet" href="__STATIC__/css/teamReturn.css">
    <link rel="stylesheet" href="__STATIC__/css/iconfont/iconfont.css">
    <script type="text/javascript" src="__STATIC__/js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="__STATIC__/js/TouchSlide.1.1.js"></script>
    <script type="text/javascript" src="__STATIC__/js/jquery.json.js"></script>
    <script type="text/javascript" src="__STATIC__/js/touchslider.dev.js"></script>
    <script type="text/javascript" src="__STATIC__/js/layer.js"></script>
    <!-- <script src="__PUBLIC__/js/global.js"></script>
    <script src="__PUBLIC__/js/mobile_common.js"></script> -->
    <style>
        .swiper-container {
            width: 100%;
            height: 100%;
        }

        .swiper-slide {
            text-align: center;
            font-size: 18px;
            background: #fff;
            display: -webkit-box;
            display: -ms-flexbox;
            display: -webkit-flex;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            -webkit-justify-content: center;
            justify-content: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            -webkit-align-items: center;
            align-items: center;
        }
    </style>
</head>

<body class="">
    <div class="wrap">
        <!-- <div class="pubhead maincolorbg ">
            <a href="javascript:history.back(-1)">
                <p>团队收益</p>
            </a>
        </div> -->
        <div class="maincolorbg flex jus-between align-c tophead">
            <a href="javascript:history.back(-1)" class="iconfont icon-fanhui2"></a>
            <p class="font-18">分享收益</p>
            <a href=""></a>
        </div>
        <div class="grade">
            <div class="grade01">
                <div class="gradeonebox">
                    <div class="gradeoneMsg flex jus-start">
                        <div class="gradeoneimg">
                            <img src="<?php echo $user_info['head_pic']; ?>" alt="">
                        </div>
                        <div class="gradeoneline">
                            <p><?php echo $user_info['nickname']; ?></p>
                            <span class="font-10">还有<?php echo $cha; ?>点升级</span>
                            <div id="progressbar1">
                            </div>
                            <div class="gradeclass flex jus-between">
                                <span>v<?php echo $star; ?></span>
                                <span>v<?php echo $star+1; ?></span>
                            </div>

                        </div>

                    </div>
                    <div class="gradetext">
                        <p class="font-13"><?php echo $all_money; ?></p>
                        <p class="font-10">我的团队收益</p>
                    </div>
                </div>

            </div>
            <div class="grade02">
                <div class="grade02Class">
                    <ul class="clearfix">
                        <li>
                            <a href="#myteam">
                                <img src="__STATIC__/images/newimg/usr/team.png" alt="" width="23" height="21">
                                <p class="font-12">团队人数</p>
                            </a>
                        </li>
                        <li>
                            <a href="#myteam">
                                <img src="__STATIC__/images/newimg/usr/privilege.png" alt="" width="23" height="21">
                                <p class="font-12">我的特权</p>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo U('user/teamReturnRebate'); ?>">
                                <img src="__STATIC__/images/newimg/usr/rebate.png" alt="" width="21" height="21">
                                <p class="font-12">代理收益</p>
                            </a>
                        </li>
                        <li>
                            <a href="#growth">
                                <img src="__STATIC__/images/newimg/usr/graph.png" alt="" width="18" height="18">
                                <p class="font-12">成长周</p>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- 我的团队人数 -->
                <div class="myteam" id="myteam">
                    <div class="flex jus-between align-c">
                        <p class="maintitle">我的团队人数</p>
                        <p class="font-15 maincolor" style="padding-top:10px"><?php echo $all_count; ?>人</p>
                    </div>

                    <div class="teamlist">
                        <ul class="clearfix">
                            <li>
                                <div>
                                    <img src="<?php echo $user_info['head_pic']; ?>" alt="">
                                </div>
                                <p class="font-12"><?php echo $user_info['nickname']; ?></p>
                            </li>
                            <?php if(is_array($yierdai_info) || $yierdai_info instanceof \think\Collection): if( count($yierdai_info)==0 ) : echo "" ;else: foreach($yierdai_info as $k=>$v): ?>
                                <li>
                                    <div>
                                        <img src="<?php echo $v['head_pic']; ?>" alt="">
                                    </div>
                                    <p class="font-12"><?php echo $v['nickname']; ?></p>
                                </li>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                            <li>
                                <div>
                                    <img src="__STATIC__/images/newimg/usr/addteam.png" alt="">
                                </div>
                            </li>

                        </ul>
                    </div>
                </div>

                <!-- 我的特权 -->
                <div class="privilege" id="myteam">
                    <p class="maintitle">我的特权</p>
                    <div class="prilist">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <a href="<?php echo U('user/teamReturnRebate'); ?>">
                                        <div>
                                            <img src="__STATIC__/images/newimg/usr/pri02.png" alt="">
                                        </div>
                                        <p class="font-12">代理收益</p>
                                    </a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="<?php echo U('user/teamReturnOther'); ?>">
                                        <div>
                                            <img src="__STATIC__/images/newimg/usr/pri04.png" alt="">
                                        </div>
                                        <p class="font-12">合伙人收益</p>
                                    </a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="<?php echo U('user/teamReturnOther'); ?>">
                                        <div>
                                            <img src="__STATIC__/images/newimg/usr/pri05.png" alt="">
                                        </div>
                                        <p class="font-12">商家收益</p>
                                    </a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="<?php echo U('user/teamReturnOther'); ?>">
                                        <div>
                                            <img src="__STATIC__/images/newimg/usr/pri05.png" alt="">
                                        </div>
                                        <p class="font-12">市代收益</p>
                                    </a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="<?php echo U('user/teamReturnOther'); ?>">
                                        <div>
                                            <img src="__STATIC__/images/newimg/usr/pri05.png" alt="">
                                        </div>
                                        <p class="font-12">县代收益</p>
                                    </a>
                                </div>
                                <?php if($star > 1): ?>
                                    <div class="swiper-slide">
                                        <a href="javascript:void(0)">
                                            <div>
                                                <img src="__STATIC__/images/newimg/usr/pri01.png" alt="">
                                            </div>
                                            <p class="font-12">加速释放</p>
                                        </a>
                                    </div>
                                <?php endif; if($star == 16): ?>
                                    <div class="swiper-slide">
                                        <a href="javascript:void(0)"></a>
                                        <div>
                                            <img src="__STATIC__/images/newimg/usr/pri03.png" alt="">
                                        </div>
                                        <p class="font-12">收益分红</p>
                                        </a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="growth" id="growth">
                    <div class="todayDate">
                        <h3>过去7天成长周</h3>
                        <div id="box3" style="width: 310px;height:200px;margin:0 auto"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

<script src="__STATIC__/js/jquery.lineProgressbar.js"></script>
<script src="__STATIC__/js/echarts.js"></script>
<script src="__STATIC__/js/swiper.min.js"></script>
<script type="text/javascript">
    $(function () {
        $('#progressbar1').LineProgressbar({
            percentage: 40
        });

        var myChart3 = echarts.init(document.getElementById("box3"));
        var option1 = {
            xAxis: {
                type: 'category',
                boundaryGap: false,
                data: ['星期一', '星期二', '星期三', '星期四', '星期五', '星期六', '星期日']
            },
            yAxis: {
                type: 'value',
                axisLabel: {
                    margin: 10,

                }

            },
            grid: {
                left: 50
            },
            series: [{
                data: '{ $days }',
                type: 'line',
                areaStyle: {},
                color: ['#ff4c4c', '#f00']
            }]
        };

        myChart3.setOption(option1);



        var swiper = new Swiper('.swiper-container', {
            slidesPerView: 5,
            spaceBetween: 7,
            freeMode: true,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
        });

    })
</script>

</html>