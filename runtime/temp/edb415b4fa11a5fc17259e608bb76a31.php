<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:38:"./template/mobile/new/user\wallet.html";i:1562850325;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta name="Generator" content="TPshop v1.1" />
    <meta charset="UTF-8">
    <!-- <title>我的钱包</title> -->
    <title></title>
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="__STATIC__/css/public.css?time=<?php echo time()?>" />
    <link rel="stylesheet" type="text/css" href="__STATIC__/css/index.css" />
    <link rel="stylesheet" href="__STATIC__/css/wallet.css?v=1">
    <link rel="stylesheet" href="__STATIC__/css/iconfont/iconfont.css">
    <script type="text/javascript" src="__STATIC__/js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="__STATIC__/js/TouchSlide.1.1.js"></script>
    <script type="text/javascript" src="__STATIC__/js/jquery.json.js"></script>
    <script type="text/javascript" src="__STATIC__/js/touchslider.dev.js"></script>
    <script type="text/javascript" src="__STATIC__/js/layer.js"></script>
    <!-- <script src="__PUBLIC__/js/global.js"></script>
    <script src="__PUBLIC__/js/mobile_common.js"></script> -->


</head>

<body class="">
    <div class="wrap ">
        <div class="walletTop">
            <!-- <div class=" pubhead">
                <a href="javascript:history.back(-1)">
                    <p>我的钱包</p>
                </a>
            </div> -->
            <!-- <div class=" flex jus-between align-c tophead">
                <a href="javascript:history.back(-1)" class="iconfont icon-fanhui2"></a>
                <p class="font-18">我的钱包</p>
                <a href=""></a>
            </div> -->
            <div class=" tophead " id="topAnchor" style="text-align: center;">
                <p class="font-18" style="margin-left:0">我的钱包</p>
            </div>
            <div class="walletclassify clearfix">
                <ul>
                    <li>
                        <p>余额（元）</p>
                        <?php if($yue < 0): ?>
                            <span>0</sapn>
                        <?php endif; if($yue > 0): ?>
                        <span><?php echo $yue; ?></sapn>
                        <?php endif; ?>
                    </li>
                    <li>
                        <p>Z券</p>
                        <?php if($zquan < 0): ?>
                            <span>0</sapn>
                        <?php endif; ?>
                        <if condition="$zquan gt 0">
                        <span><?php echo $zquan; ?></sapn>
                        </span>
                    </li>
                </ul>
            </div>
        </div>


        <div class="transaction">
            <ul class="clearfix">
                <li class="bor-l0">
                    <a href="<?php echo U('User/couponew'); ?>">
                        <img src="__STATIC__/images/newimg/usr/change.png" alt="" width="29" height="26">
                        <p class="font-12">转化</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo U('User/tradingFloor'); ?>">
                        <img src="__STATIC__/images/newimg/usr/tradingfloor.png" alt="" width="27" height="24">
                        <p class="font-12">交易大厅</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo U('User/teamReturn'); ?>">
                        <img src="__STATIC__/images/newimg/usr/teamreturn.png" alt="" width="28" height="26">
                        <p class="font-12">分享收益</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo U('User/tradeFloorZ'); ?>">
                        <img src="__STATIC__/images/newimg/usr/record.png" alt="" width="28" height="26">
                        <p class="font-12">交易记录</p>
                    </a>
                </li>
            </ul>
        </div>


        <div class="walletdate">
            <div class="walletdatebox">
                <ul class="percent clearfix ">
                    <li>
                        <span class="maincolor">1%</span>
                        <p class="maincolor">今日总增长</p>
                    </li>
                    <li>
                        <span class="maincolor">1%</span>
                        <p class="maincolor">昨日总增长</p>
                    </li>
                    <li>
                        <span class="maincolor">7%</span>
                        <p class="maincolor">7天总增长</p>
                    </li>
                </ul>
            </div>

            <div class="walletdatebox">
                <div class="todayDate">
                    <h3>今日券值</h3>
                    <!-- <div id="echartbox" style="width:100%;height:115px"></div> -->
                    <div id="box" style="width: 310px;height:200px;margin:0 auto"></div>
                </div>

                <div class="todayDate" style="margin-top:-20px">
                    <h3>昨日券值</h3>
                    <!-- <div id="echartbox" style="width:100%;height:115px"></div> -->
                    <div id="box2" style="width: 310px;height:200px;margin:0 auto"></div>
                </div>

                <div class="todayDate" style="margin-top:-20px;height:215px">
                    <h3 style="margin-bottom:-40px">过去7天Z券的劵值</h3>
                    <!-- <div id="echartbox" style="width:100%;height:115px"></div> -->
                    <div id="box3" style="width: 310px;height:200px;margin:0 auto"></div>
                </div>
                <p class="summarize pos-r">
                        本周完成订单量增长，同比上涨20%。
                    </p>
            </div>
           
        </div>
    </div>
</body>


<script src="__STATIC__/js/echarts.js"></script>
<!-- <script>
     var myChart = echarts.init(document.getElementById('echartbox'));
var symbolSize = 20;
var data = [[15, 0], [-50, 10], [-56.5, 20]];

option = {
    
    tooltip: {
        triggerOn: 'none',
        formatter: function (params) {
            return 'X: ' + params.data[0].toFixed(2) + '<br>Y: ' + params.data[1].toFixed(2);
        }
    },
 
    xAxis: {
        min: -100,
        max: 80,
        type: 'value',
        axisLine: {onZero: false}
    },
    yAxis: {
        min: -30,
        max: 60,
        type: 'value',
        axisLine: {onZero: false}
    },
    dataZoom: [
        {
            type: 'slider',
            xAxisIndex: 0,
            filterMode: 'empty'
        },
        {
            type: 'slider',
            yAxisIndex: 0,
            filterMode: 'empty'
        },
        {
            type: 'inside',
            xAxisIndex: 0,
            filterMode: 'empty'
        },
        {
            type: 'inside',
            yAxisIndex: 0,
            filterMode: 'empty'
        }
    ],
    series: [
        {
            id: 'a',
            type: 'line',
            smooth: true,
            symbolSize: symbolSize,
            data: data,
            itemStyle : { normal: {label : {show: true}}}
        }
    ]
};


myChart.setOption(option);


</script> -->


<script>
    var myChart = echarts.init(document.getElementById("box"));
    var myChart1 = echarts.init(document.getElementById("box2"));

    // option 里面的内容基本涵盖你要画的图表的所有内容
    var option = {
        backgroundColor: '#FBFBFB',
        tooltip: {
            trigger: 'axis'
        },
        // legend: {
        //     data: ['充值', '消费']
        // },

        calculable: true,


        xAxis: [
            {
                axisLabel: {
                    rotate: 30,
                    interval: 0
                },
                axisLine: {
                    lineStyle: {
                        color: '#CECECE'
                    }
                },
                type: 'category',
                boundaryGap: false

            }
        ],
        yAxis: [
            {

                type: 'value',
                axisLine: {
                    lineStyle: {
                        color: '#CECECE'
                    }
                }
            }
        ],
        series: [
            {
                name: '',
                type: 'line',
                // symbol: 'none',
                smooth: 0.01,
                color: ['#ff4c4c'],
                data: [0.1, 0.101, 0.102, 0.103, 0.104, 0.105, 0.106],
                itemStyle: { normal: { label: { show: true } } }
            }
        ]
    };


    myChart.setOption(option);
    myChart1.setOption(option);




    var myChart3 = echarts.init(document.getElementById("box3"));
    var option1 = {
        xAxis: {
            type: 'category',
            boundaryGap: false,
            data: ['星期一', '星期二', '星期三', '星期四', '星期五', '星期六', '星期日']
        },
        yAxis: {
            type: 'value'
        },
        series: [{
            data: [0.1, 0.101, 0.102, 0.103, 0.104, 0.105, 0.106],
            type: 'line',
            areaStyle: {},
            color: ['#ff4c4c', '#f00']
        }]
    };

    myChart3.setOption(option1);

</script>

</html>