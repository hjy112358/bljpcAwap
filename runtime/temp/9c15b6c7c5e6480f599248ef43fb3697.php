<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:41:"./template/mobile/new/user\logistics.html";i:1558602780;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta name="Generator" content="TPshop v1.1" />
    <meta charset="UTF-8">
    <title>物流信息</title>
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="__STATIC__/css/public.css" />
    <link rel="stylesheet" type="text/css" href="__STATIC__/css/index.css" />
    <link rel="stylesheet" href="__STATIC__/css/logistics.css">
    <link rel="stylesheet" href="__STATIC__/css/iconfont/iconfont.css">
    <script type="text/javascript" src="__STATIC__/js/jquery.js"></script>
    <script type="text/javascript" src="__STATIC__/js/layer.js"></script>
    <script src="__PUBLIC__/js/global.js"></script>
    <script src="__PUBLIC__/js/mobile_common.js"></script>
    <style>
        .logisticmsg ul li .time {
            position: absolute;
            left: -52px;
            top: 27px;
            color: #333;
            font-size: 12px;
        }

        .logisticmsg ul li .time span {
            display: block;
            line-height: initial
        }
    </style>

</head>

<body class="afterscale afterscaledetail">
    <div class="wrap ">
        <!-- <div class="pubhead maincolorbg ">
            <p>物流信息</p>
        </div> -->
        <div class="maincolorbg flex jus-between align-c tophead">
            <a href="javascript:history.back(-1)" class="iconfont icon-fanhui2"></a>
            <p class="font-18">物流信息</p>
            <a href=""></a>
        </div>


        <a href="" id="aToMap"> </a>
        <div class="map" id="map-container" style="width:100%;height:400px;margin:0 auto;">
            &nbsp;</div>


        <div class="logisticmsg">
            <ul>
                <li class="now reveice">
                    <i></i>
                    <div>
                        <p class="font-12">[收货地址]江苏省南通市开发区 文峰街道 益兴大
                            厦23层 技术部</p>
                    </div>
                    <div class="time">
                        <span>05-23</span>
                        <span>17:09</span>
                    </div>

                </li>
                <li class="receiveg now">
                    <i></i>
                    <div>
                        <p class="font-14">已签收</p>
                        <p class="font-12">[自提柜]已签收，签收人凭取货码签收。感谢使用
                            丰巢自提柜，期待再次为您服务。</p>
                    </div>
                    <div class="time">
                        <span>05-23</span>
                        <span>17:09</span>
                    </div>
                </li>
                <li class="waitTake ">
                    <i></i>
                    <div>
                        <p class="font-14">待取件</p>
                        <p class="font-12">[自提柜]您的快件已存放在丰巢[自提柜]，请及时
                            取件。有问题请联系快递员<span class="maincolor">132456789</span></p>
                    </div>
                    <div class="time">
                        <span>05-23</span>
                        <span>17:09</span>
                    </div>
                </li>
                <li class="waitDeli ">
                    <i></i>
                    <div>
                        <p class="font-14">派送中</p>
                        <p class="font-12">[南通市]配送员小张<span class="maincolor">132456789</span>正在为您派送，感
                            谢您的耐心等待</p>
                    </div>
                    <div class="time">
                        <span>05-23</span>
                        <span>17:09</span>
                    </div>
                </li>
                <li class="waitde ">
                    <i></i>
                    <div>
                        <p class="font-14">运输中</p>
                        <p class="font-12">[南通市]你的包裹已到达[狼山站]，准备分配派送员</p>
                    </div>
                    <div class="time">
                        <span>05-23</span>
                        <span>17:09</span>
                    </div>
                </li>
                <li class="waitpress ">
                    <i></i>
                    <div>
                        <p class="font-14">已揽件</p>
                        <p class="font-12">[南通市]你的包裹已到由物流公司揽收</p>
                    </div>
                    <div class="time">
                        <span>05-23</span>
                        <span>17:09</span>
                    </div>
                </li>
                <li class="waitship ">
                    <i></i>
                    <div>
                        <p class="font-14">已发货</p>
                        <p class="font-12">包裹正在等待揽收</p>
                    </div>
                    <div class="time">
                        <span>05-23</span>
                        <span>17:09</span>
                    </div>
                </li>
                <li class="waitremoval ">
                    <i></i>
                    <div>
                        <p class="font-14">已出库</p>
                        <p class="font-12">包裹已出库</p>
                    </div>
                    <div class="time">
                        <span>05-23</span>
                        <span>17:09</span>
                    </div>
                </li>
                <li class="waitentrepot ">
                    <i></i>
                    <div>
                        <p class="font-14">仓库已接单</p>
                        <p class="font-12">仓库已接单</p>
                    </div>
                    <div class="time">
                        <span>05-23</span>
                        <span>17:09</span>
                    </div>
                </li>



            </ul>
        </div>
    </div>

    <script charset="utf-8" src="http://map.qq.com/api/js?v=2.exp&key=6F2BZ-7G7R4-FJKUJ-XMMQ7-WZQFF-H4FJX"></script>
    <script>

        var citylocation, map, marker = null;
        //给外层的a标签加上url，方便一会点击小地图的时候直接跳转。
        function newMapGo(id, lat, lng) {
            var markUrl = 'https://apis.map.qq.com/tools/poimarker' +
                '?marker=coord:' + lat + ',' + lng +
                '&key=6F2BZ-7G7R4-FJKUJ-XMMQ7-WZQFF-H4FJX&referer=程序开发';
            //给位置展示组件赋值
            document.getElementById(id).href = markUrl;
        }
        //需要外层元素id和对应地址的经纬度
        function newMap(id, lat, lng) {
            var center = new qq.maps.LatLng(lat, lng);
            var map = new qq.maps.Map(document.getElementById(id), {
                center: center,
                zoom: 18
            });
            //调用城市服务信息
            citylocation = new qq.maps.CityService({
                complete: function (results) {
                    map.setCenter(results.detail.latLng);
                    if (marker != null) {
                        // marker.setMap(null);
                    }
                    //设置marker标记
                    marker = new qq.maps.Marker({
                        map: map,
                        position: results.detail.latLng
                    });
                }
            });
            citylocation.searchCityByLatLng(center);
            newMapGo('aToMap', lat, lng);
        }
        //给id,经纬度
        newMap('map-container', 31.931574, 120.957268)

    </script>
</body>

</html>