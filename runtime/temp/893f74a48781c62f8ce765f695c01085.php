<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:42:"./template/mobile/new/user\choosecity.html";i:1562899703;}*/ ?>
<!Doctype html>
<html lang="zh-CN">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no, width=device-width">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <!-- <link rel="stylesheet" type="text/css" href="__STATIC__/css/public.css?time=<?php echo time()?>" />
    <link rel="stylesheet" type="text/css" href="__STATIC__/css/index.css" /> -->
    <link rel="stylesheet" href="__STATIC__/css/iconfont/iconfont.css">
    <script type="text/javascript" src="__STATIC__/js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="__STATIC__/js/jquery.json.js"></script>
    <script type="text/javascript" src="__STATIC__/js/layer.js"></script>
    <title></title>
    <style>
        html,
        body {
            height: 100%;
        }

        #container {
            height: 50%;
            background: red;
        }

        #openBtn {
            margin: 10px;
        }

        .noti-tip {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            text-align: center;
            background: red;
            color: #fff;
            line-height: 150%;
        }

        .amap-ui-mobi-city-picker.red {
            background: #fff;

            color: #000;
        }

        .amap-ui-mobi-city-picker.red .top_group .citylist .item {
            border: 1px solid #b0adad;
        }

        .amap-ui-mobi-city-picker.red .listgroup .title,
        .amap-ui-mobi-city-picker.red .city_fixed_title {
            background-color: #521717;
        }

        .amap-ui-mobi-city-picker.red .letter_tip {
            background: #333;
        }

        .amap-ui-mobi-city-picker.red a:active {
            background: #eee;
        }

        .amap-ui-mobi-city-picker .closebtn {
            background: none !important;
            background-size: 28px 28px !important;
            top: 33px !important;
            left: 10px !important;
        }

        .amap-ui-mobi-city-picker .search-box {
            border-radius: 20px !important;
            margin-top: 0 !important
        }

        .topbar {
            background: #ff4c4c
        }

        .topbar .title {
            color: #fff;
            line-height: 60px;
            height: 60px;
            padding-top: 5px;
            font-size: 18px;
        }

        .amap-ui-mobi-city-picker.red .listgroup .title,
        .amap-ui-mobi-city-picker.red .city_fixed_title {
            background: #fff
        }

        .amap-ui-mobi-city-picker .topbar{
            height:46px  !important
        }
        .amap-ui-mobi-city-picker.red .top_group .citylist .item {
            background: #f8f8f8
        }
        .amap-ui-mobi-city-picker .city_anchor{
            top:120px !important
        }

        .amap-ui-mobi-city-picker.red .top_group .citylist .item {
            border: none !important
        }

        .amap-ui-mobi-city-picker .top_group .city_item_box {
            width: 32% !important;
            margin-bottom: 10px !important;
            padding: 2px 10px !important
        }
        .amap-ui-mobi-city-picker .city_fixed_title{
            top:46px !important;
        }
    </style>
</head>

<body>
    <!-- <div id="container">
    </div> -->
    <!-- <div class="pubhead maincolorbg ">
        <p>选择城市</p>
    </div> -->
    <!-- <input type="text" placeholder="南通" class="choosecity"> -->
    <!-- <button id="openBtn">选择城市</button> -->
    <div style="display: none">
        <pre id="selectedCityInfo" ></pre>
    </div>
    <script type="text/javascript"
        src='https://webapi.amap.com/maps?v=1.3&key=4a66ce96cf75144d7cd27fbfa42429b6'></script>
    <!-- UI组件库 1.0 -->
    <script src="https://webapi.amap.com/ui/1.0/main.js?v=1.0.11"></script>
    <!-- <script type='text/javascript' src='//g.alicdn.com/sj/lib/zepto/zepto.min.js' charset='utf-8'></script> -->
    <script src="https://webapi.amap.com/ui/1.0/ui/misc/MobiCityPicker/examples/common.js?v=1.0.11"></script>
    <script type="text/javascript">
        //AMapUI.setDomLibrary(Zepto);

        AMapUI.loadUI(['misc/MobiCityPicker'], function (MobiCityPicker) {

            //动态加载自定义的红色主题， 如果css已经写在当前页面中，可忽略此步骤
            AMapUI.loadCss('./red-theme.css', function () {

                var cityPicker = new MobiCityPicker({
                    //设置主题（同名的className会被添加到外层容器上）
                    theme: 'red'
                });

                cityPickerReady(cityPicker);

                cityPicker.show();
                //监听城市选中事件
                cityPicker.on('citySelected', function (cityInfo) {
                    //隐藏城市列表
                    // cityPicker.hide();

                    //选中的城市信息
                    console.log(cityInfo.name);
                    window.location.href="/mobile/index/index?name="+cityInfo.name;
                    return false;
                });
                $(".title").remove()
                $(".title.J_scroll_title").html("热门城市")
                $(".listgroup_A .title.J_scroll_title").html("")
                $(".listgroup_A .title.J_scroll_title").css("height", 0)
                $(".closebtn ").on("click",function(){
                    window.location.href="/mobile/index/index";
                    return false
                })
            });
        });
    </script>
</body>

</html>