<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:48:"./template/mobile/new/user\teamReturnRebate.html";i:1558937042;}*/ ?>
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
        .earningL p {
                width:150px;
            overflow:hidden;
        text-overflow:ellipsis;
        white-space:nowrap;

        }
    </style>
</head>

<body class="teamrebate">
    <div class="wrap">
        <!-- <div class="pubhead maincolorbg ">
            <a href="javascript:history.back(-1)">
                <p>返利权益</p>
            </a>
        </div> -->

        <div class="maincolorbg flex jus-between align-c tophead">
            <a href="javascript:history.back(-1)" class="iconfont icon-fanhui2"></a>
            <p class="font-18">代理收益</p>
            <a href=""></a>
        </div>

        <div class="teamreturnmsg flex jus-start">
            <div class='returnimg'>
                <img src="<?php echo $user_info['head_pic']; ?>" alt="">
            </div>
            <div>
                <p class="font-15"><?php echo $user_info['nickname']; ?></p>
                <span class="font-12">这个人很懒，什么都没留下</span>
            </div>
        </div>

        <div class="earnings">
            <div>
                <ul class="clearfix">
                    <li class="returnNum pos-r">
                        <p class="font-12">分享收益/数量</p>
                        <span class="font-15 maincolor">￥<?php echo $yidai_sum+$self_number+$erdai_sum; ?></span>
                    </li>
                    <li>
                        <p class="font-12">一代/二代</p>
                        <span class="font-15 maincolor"><?php echo $yierdai_count; ?></span>
                    </li>
                </ul>
            </div>
        </div>


        <div class="earninglist">
            <p class="fong-17">类型分布</p>
            <div id="box3" style="width: 310px;height:200px;margin:0 auto"></div>
            <div class="earninglistdetailBox">
                <ul>
                    <li>
                        <div class="earninglistdetail flex jus-between align-c">
                            <div class="earningL flex jus-start align-c">
                                <img src="<?php echo $user_info['head_pic']; ?>" alt="">
                                <p class="font-14"><?php echo $user_info['nickname']; ?></p>
                            </div>
                            <p class="font-14 maincolor">￥<?php echo $self_number; ?></p>
                            <p class="font-14  earningr">自己</p>
                        </div>
                    </li>

                    <?php if(is_array($yierdai_info) || $yierdai_info instanceof \think\Collection): if( count($yierdai_info)==0 ) : echo "" ;else: foreach($yierdai_info as $key=>$val): ?>
                        <li>
                            <div class="earninglistdetail flex jus-between align-c">
                                <div class="earningL flex jus-start align-c">
                                    <img src="<?php echo $val['head_pic']; ?>" alt="">
                                    <p class="font-14"><?php echo $val['nickname']; ?></p>
                                </div>
                                <p class="font-14 maincolor">￥<?php echo $val['lirun_number']; ?></p>
                                <p class="font-14  earningr">
                                    <?php if($val['dai'] == 1): ?>
                                        一代
                                    <?php endif; if($val['dai'] == 2): ?>
                                        二代
                                <?php endif; ?>
                                </p>
                            </div>
                        </li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>

                </ul>
            </div>

        </div>
    </div>

</body>

<script src="__STATIC__/js/jquery.lineProgressbar.js"></script>
<script src="__STATIC__/js/echarts.js"></script>
<script type="text/javascript">
    $(function () {
        $('#progressbar1').LineProgressbar({
            percentage: 78
        });

        var myChart3 = echarts.init(document.getElementById("box3"));
        option1 = {
            tooltip: {
                trigger: 'item',
                formatter: "{a} <br/>{b}: {c} ({d}%)"
            },
            legend: {
                orient: 'vertical',
                x: 'right',
                data: ['我的收益', '一代收益', '二代收益']
            },
            color: ['#0088ff', '#00b775', '#ff4c4c'],

            series: [
                {
                    name: '访问来源',
                    type: 'pie',
                    radius: ['50%', '70%'],
                    avoidLabelOverlap: false,
                    label: {
                        normal: {
                            show: false,
                            position: 'center'
                        },
                        emphasis: {
                            show: true,
                            textStyle: {
                                fontSize: '30',
                                fontWeight: 'bold'
                            }
                        }
                    },
                    labelLine: {
                        normal: {
                            show: false
                        }
                    },
                    data: [
                        { value: <?php echo $self_number; ?>, name: '我的收益' },
                        { value: <?php echo $yidai_sum; ?>, name: '一代收益' },
                        { value: <?php echo $erdai_sum; ?>, name: '二代收益' }

                    ]
                }
            ]
        };

        myChart3.setOption(option1);

    })
</script>

</html>