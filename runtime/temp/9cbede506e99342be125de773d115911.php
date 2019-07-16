<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:42:"./template/mobile/new/user\receiveMsg.html";i:1557359789;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta name="Generator" content="TPshop v1.1" />
    <meta charset="UTF-8">
    <title>收货人信息</title>
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="__STATIC__/css/public.css" />
    <link rel="stylesheet" type="text/css" href="__STATIC__/css/index.css" />
    <link rel="stylesheet" href="__STATIC__/css/topdetail.css">
    <link rel="stylesheet" href="__STATIC__/css/goodstyle.css">
    <link rel="stylesheet" href="__STATIC__/css/LArea.min.css">
    <script type="text/javascript" src="__STATIC__/js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="__STATIC__/js/TouchSlide.1.1.js"></script>
    <script type="text/javascript" src="__STATIC__/js/jquery.json.js"></script>
    <script type="text/javascript" src="__STATIC__/js/touchslider.dev.js"></script>
    <script type="text/javascript" src="__STATIC__/js/layer.js"></script>

    <!-- <script src="__PUBLIC__/js/global.js"></script>
    <script src="__PUBLIC__/js/mobile_common.js"></script> -->

</head>

<body class="">
    <div class="wrap">
        <div class="pubheads maincolorbg flex jus-between align-c">
                <a  href="javascript:history.back(-1)"><img src="__STATIC__/images/newimg/order/backW.png" alt=""></a>
            <p>收货人信息</p>
            <span>保存</span>
        </div>
        <div class="datelist">
            <div class="flex jus-start dateone nickname align-c">
                <label for="">收货人姓名</label>
                <input type="text" value="">
            </div>
            <div class="flex jus-start dateone nickname align-c">
                <label for="">手机号码</label>
                <input type="text" value="">
            </div>
            <div class="flex jus-start dateone nickname align-c">
                <label for="">邮政编码</label>
                <input type="text" value="">
            </div>
            <div class="flex jus-start dateone nickname align-c">
                <label for="">省、市、区</label>
                <div class="content-block">
                    <input id="demo2" type="text" readonly="" placeholder=""  style="line-height:20px"/>
                    <input id="value2" type="hidden" />
                </div>
            </div>
            <div class="flex jus-start dateone nickname adressDetail">
                <label for="">详细地址</label>
                <textarea name="" id="" rows="5"></textarea>
            </div>


        </div>
    </div>

</body>


<script src="__STATIC__/js/adress/LAreaData1.js"></script>
<script src="__STATIC__/js/adress/LAreaData2.js"></script>
<script src="__STATIC__/js/adress/LArea.js"></script>
<script>
    
  var area2 = new LArea();
    area2.init({
        'trigger': '#demo2',
        'valueTo': '#value2',
        'keys': {
            id: 'value',
            name: 'text'
        },
        'type': 2,
        'data': [provs_data, citys_data, dists_data]
    });
</script>
</html>