<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:82:"E:\phpStudy\PHPTutorial\WWW\biliangjia/application/ticket\view\ticket\console.html";i:1560241484;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="/application/ticket/view/assets/css/layui.css">
    <link rel="stylesheet" href="/application/ticket/view/assets/css/mypublic.css">
    <link rel="stylesheet" href="/application/ticket/view/assets/css/view.css" />
    <link rel="stylesheet" href="/application/ticket/view/assets/css/CouponMan/CouponMan.css" />
    <script src="/application/ticket/view/assets/js/echarts.js"></script>
    <script src="/application/ticket/view/assets/js/jquery-3.1.1.min.js"></script>
    <title>券量</title>
</head>

<body class="layui-view-body " id="couponNum">
    <div class="layui-content">
        <div class="layui-row ">
            <div class="layui-col-space20 clearfix ">
                <div class="layui-col-sm6 layui-col-md4">
                    <div class="layui-card">
                        <div class="layui-card-body chart-card">
                            <div class="chart-header">
                                <div class="metawrap">
                                    <div class="meta">
                                        <span><?php echo $all_coupon[0]['ticket_name']; ?></span>
                                    </div>
                                    <div class="total"><?php echo $all_coupon[0]['all_number']; ?></div>
                                </div>
                            </div>
                            <div class="chart-body">
                                <div class="contentwrap">
                                    市场上的<?php echo $all_coupon[0]['ticket_name']; ?>量
                                </div>
                            </div>
                            <div class="chart-footer">
                                <div class="field">
                                    <span>今日券量变化</span>
                                    <?php echo $all_coupon[0]['ticket_change']; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><div class="layui-col-sm6 layui-col-md4">
                <div class="layui-card">
                    <div class="layui-card-body chart-card">
                        <div class="chart-header">
                            <div class="metawrap">
                                <div class="meta">
                                    <span><?php echo $all_coupon[1]['ticket_name']; ?></span>
                                </div>
                                <div class="total"><?php echo $all_coupon[1]['all_number']; ?></div>
                            </div>
                        </div>
                        <div class="chart-body">
                            <div class="contentwrap">
                                市场上的<?php echo $all_coupon[1]['ticket_name']; ?>量
                            </div>
                        </div>
                        <div class="chart-footer">
                            <div class="field">
                                <span>今日券量变化</span>
                                <?php echo $all_coupon[1]['ticket_change']; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div><div class="layui-col-sm6 layui-col-md4">
                <div class="layui-card">
                    <div class="layui-card-body chart-card">
                        <div class="chart-header">
                            <div class="metawrap">
                                <div class="meta">
                                    <span><?php echo $all_coupon[2]['ticket_name']; ?></span>
                                </div>
                                <div class="total"><?php echo $all_coupon[2]['all_number']; ?></div>
                            </div>
                        </div>
                        <div class="chart-body">
                            <div class="contentwrap">
                                市场上的<?php echo $all_coupon[2]['ticket_name']; ?>量
                            </div>
                        </div>
                        <div class="chart-footer">
                            <div class="field">
                                <span>今日券量变化</span>
                                <?php echo $all_coupon[2]['ticket_change']; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div><div class="layui-col-sm6 layui-col-md4">
                <div class="layui-card">
                    <div class="layui-card-body chart-card">
                        <div class="chart-header">
                            <div class="metawrap">
                                <div class="meta">
                                    <span><?php echo $all_coupon[3]['ticket_name']; ?></span>
                                </div>
                                <div class="total"><?php echo $all_coupon[3]['all_number']; ?></div>
                            </div>
                        </div>
                        <div class="chart-body">
                            <div class="contentwrap">
                                市场上的<?php echo $all_coupon[3]['ticket_name']; ?>量
                            </div>
                        </div>
                        <div class="chart-footer">
                            <div class="field">
                                <span>今日券量变化</span>
                                <?php echo $all_coupon[3]['ticket_change']; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div><div class="layui-col-sm6 layui-col-md4">
                <div class="layui-card">
                    <div class="layui-card-body chart-card">
                        <div class="chart-header">
                            <div class="metawrap">
                                <div class="meta">
                                    <span><?php echo $all_coupon[4]['ticket_name']; ?></span>
                                </div>
                                <div class="total"><?php echo $all_coupon[4]['all_number']; ?></div>
                            </div>
                        </div>
                        <div class="chart-body">
                            <div class="contentwrap">
                                市场上的<?php echo $all_coupon[4]['ticket_name']; ?>量
                            </div>
                        </div>
                        <div class="chart-footer">
                            <div class="field">
                                <span>今日券量变化</span>
                                <?php echo $all_coupon[4]['ticket_change']; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div><div class="layui-col-sm6 layui-col-md4">
                <div class="layui-card">
                    <div class="layui-card-body chart-card">
                        <div class="chart-header">
                            <div class="metawrap">
                                <div class="meta">
                                    <span><?php echo $all_coupon[5]['ticket_name']; ?></span>
                                </div>
                                <div class="total"><?php echo $all_coupon[5]['all_number']; ?></div>
                            </div>
                        </div>
                        <div class="chart-body">
                            <div class="contentwrap">
                                市场上的<?php echo $all_coupon[5]['ticket_name']; ?>量
                            </div>
                        </div>
                        <div class="chart-footer">
                            <div class="field">
                                <span>今日券量变化</span>
                                <?php echo $all_coupon[5]['ticket_change']; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <div class="modulelist clearfix">
                <div id="addmodule" class=" ">
                    <div class="hd clearfix">
                        <ul class="clearfix">
                            <li class="on">市场利润总量</li>
                            <li>市场券量比例</li>
                        </ul>
                    </div>
                    <div class="bd">
                        <!-- 发售总量 -->
                        <ul>
                            <li>
                                <div class="echartsbox clearfix">
                                    <div class="chartsnum fl">
                                        <p>发售总量</p>
                                        <p><?php echo $all_lirun; ?></p>
                                    </div>
                                    <div id="container" style="width: 310px;height:200px;" class="fr"></div>
                                </div>
                            </li>
                        </ul>
                        <!-- 市场券量比例 -->
                        <ul>
                            <li>
                                <div class="echartsbox clearfix">
                                    <div class="chartsnum fl">
                                        <p>市场券量比例</p>
                                        <p><?php echo $all_lirun; ?></p>
                                    </div>
                                    <div id="container1" style="width: 310px;height:200px;" class="fr"></div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="/application/ticket/view/assets/layui.all.js"></script>
    <script src="/application/ticket/view/assets/js/TouchSlide.1.1.js"></script>



    <script>

        $(function () {
            var element = layui.element;
            TouchSlide({ slideCell: "#addmodule" });
            $(".addModule").on("click", function () {
                $(".addmoduleWrap").removeClass("hidden");
                $(".addtitle").val("");
                $(".addContent").val("");

            })

            $(".cancel").on("click", function () {
                $(".addmoduleWrap").addClass("hidden");
                $(".addtitle").val("");
                $(".addContent").val("");
            })


            $(".sure").on("click", function () {
                var name = $(".addtitle").val();
                $(".modulelist .addModule").before('<li>' + name + '</li>')
                $(".addmoduleWrap").addClass("hidden");
                $(".addtitle").val("");
                $(".addContent").val("");
            })




        })
        $(document).ready(function () {
            var dom = document.getElementById("container");
            var dom1 = document.getElementById("container1");
            // var dom2 = document.getElementById("container2");
            var myChart = echarts.init(dom);
            var myChart1 = echarts.init(dom1);
            // var myChart2 = echarts.init(dom2);
            option = null;
            option1 = null;
            // option2 = null;
            option = {
                tooltip: {
                    trigger: 'item',
                    formatter: "{a} <br/>{b}: {c} ({d}%)"
                },
                legend: {
                    orient: 'vertical',
                    x: 'left',
                    data: ['']
                },
                series: [
                    {
                        name: '',
                        type: 'pie',
                        radius: ['50%', '70%'],
                        itemStyle: { normal: { label: { show: true } } },     
                        avoidLabelOverlap: false,
                        color: ["#ff4c4c", '#ff6868'],
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
                            { value: <?php echo $all_lirun; ?>, name: '已放出' },
                            { value: 30000000, name: '总券量' }

                        ]
                    }
                ]
            };
            option1 = {
                tooltip: {
                    trigger: 'item',
                    formatter: "{a} <br/>{b}: {c} ({d}%)"
                },
                legend: {
                    orient: 'vertical',
                    x: 'left',
                    data: ['']
                },
                series: [
                    {
                        name: '',
                        type: 'pie',
                        radius: ['50%', '70%'],
                        itemStyle: { normal: { label: { show: true } } },
                        avoidLabelOverlap: false,
                        color: ["#ff4c4c", '#ff6868', '#f1b2ba', '#f79287', '#e97881', '#eb8ba7'],
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
                        data: <?php echo $ticket_price; ?>

                    }
                ]
            };

            myChart.setOption(option);
            myChart1.setOption(option1);
            // myChart2.setOption(option2);
            //

        })
    </script>
</body>

</html>