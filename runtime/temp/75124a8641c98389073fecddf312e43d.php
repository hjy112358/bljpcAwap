<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:46:"./template/mobile/new/user\exchangeTicket.html";i:1562900075;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta name="Generator" content="TPshop v1.1" />
    <meta charset="UTF-8">
    <!-- <title>兑换</title> -->
    <title></title>
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="__STATIC__/css/public.css?time=<?php echo time()?>" />
    <link rel="stylesheet" type="text/css" href="__STATIC__/css/index.css" />
    <link rel="stylesheet" href="__STATIC__/css/topdetail.css">
    <link rel="stylesheet" href="__STATIC__/css/iconfont/iconfont.css">
    <script type="text/javascript" src="__STATIC__/js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="__STATIC__/js/TouchSlide.1.1.js"></script>
    <script type="text/javascript" src="__STATIC__/js/jquery.json.js"></script>
    <script type="text/javascript" src="__STATIC__/js/touchslider.dev.js"></script>
    <script type="text/javascript" src="__STATIC__/js/layer.js"></script>
    <!-- <script src="__PUBLIC__/js/global.js"></script>
    <script src="__PUBLIC__/js/mobile_common.js"></script> -->
    <style>
        .datelist {
            padding: 10px 10px
        }

        .datelist>div {
            height: 38px;
            line-height: 38px;
            /* border-bottom: 1px solid #000; */
            margin-bottom: 10px
        }

        .datelist p {
            font-size: 14px;
            color: #999
        }

        .datelist select,
        .datelist input {
            width: 70%;
            height: 38px;
            line-height: 38px;
            color:#999
            /* border-bottom: 0; */
        }

        .datelist input {
            border: 1px solid #ccc;
            /* border-bottom: 0; */
            height: 43px;
            line-height: 43px;
            text-indent: 5px;
        }

        .nextStep {
            width: 70%;
            margin: 0 auto;
            margin-top: 60px;
        }
    </style>
</head>

<body class="">
    <div class="wrap">
        <!-- <div class="pubhead maincolorbg ">
            <a href="javascript:history.back(-1)">
                <p>兑换</p>
            </a>
        </div> -->
        <!-- <div class="maincolorbg flex jus-between align-c tophead">
            <a href="javascript:history.back(-1)" class="iconfont icon-fanhui2"></a>
            <p class="font-18">兑换</p>
            <a href=""></a>
        </div> -->
        <!-- <div class="maincolorbg tophead " id="topAnchor" style="text-align: center;">
            <p class="font-18" style="margin-left:0">兑换</p>
        </div> -->
        <div class="datelist">
            <div class="flex jus-between align-c">
                <p>兑换对象</p>
                <select name="" id="conversion">
                    <option value="1">自己</option>
                    <option value="2">他人</option>
                </select>
            </div>

            <div class="flex jus-between align-c">
                <p>兑换券类型</p>
                <div class="typebox" style="width:70%">
                    <select name="" id="type" style="width:100%">
                        <option value="1">注册券</option>
                        <option value="2">消费券</option>
                        <option value="4">挂售券</option>
                    </select>
                </div>
            </div>
            <div class="flex jus-between align-c">
                <p>兑换数量</p>
                <input type="text" id="number">
                <input type="hidden" name="has_yue" value="<?php echo $wanyong; ?>" id="max">
            </div>
            <div class="flex jus-between  otherId hidden">
                <p>手机号</p>
                <input type="text" placeholder="请填写对方手机号" id="other_id">
            </div>
            <div class="flex jus-between  ">
                <p>交易密码</p>
                <input type="password"  id="paypwd" placeholder="默认交易密码为手机号后六位">
            </div>
        </div>
        <div class="nextStep">
            <a id="submit" href="javascript:void(0)">确认</a>
        </div>
    </div>

</body>



<script>
    $("#conversion").change(function () {
        var sele = $(this).children('option:selected').val();
        if (sele == "2") {
            $(".otherId").removeClass("hidden");
            $(".typebox").html('<input type="text"  value="万用券" style="width:100%;margin-left:-2px" readonly>')
        } else {
            $(".otherId").addClass("hidden");
            var html='   <div class="typebox">'+
            ' <option value="1">注册券</option>' +
                '                    <option value="2">消费券</option>' +
                '                    <option value="4">挂售券</option>'+
                    '</div>';
            $("#type").html(html)
        }
    });
    $('#submit').click(function(){
        var max= parseFloat($("#max").val());
        var other_id= parseFloat($("#other_id").val());
        var number=$("#number").val();
        var type=parseFloat($("#type").val());
        var conversion = parseFloat($("#conversion").val());
        var paypwd = $("#paypwd").val();
        console.log(number);

            if (conversion==1) {
                if (type == 1) {
                    if(number > max*0.1){
                        alert("余额不足");
                    }else{
                        $.ajax({
                            url:"<?php echo U('User/exchangeTicket_self'); ?>",
                            data:{type:type,number:number,paypwd:paypwd},
                            type:"POST",
                            success:function(res){
                                if (res==1) {
                                    alert('兑换成功');
                                    window.history.back(-1);
                                }else{
                                    alert(res);
                                }
                            }
                        })
                    }
                }else{
                    if(number > max){
                        alert("不能超过自己拥有的余额数量！");
                    }else{
                        $.ajax({
                            url:"<?php echo U('User/exchangeTicket_self'); ?>",
                            data:{type:type,number:number,paypwd:paypwd},
                            type:"POST",
                            success:function(res){
                                if (res==1) {
                                    alert('兑换成功');
                                    window.history.back(-1);
                                }else{
                                    alert(res);
                                }
                            }
                        })
                    }
                }
            }else{
                $.ajax({
                    url:"<?php echo U('User/exchangeTicket_other'); ?>",
                    data:{number:number,paypwd:paypwd,other_id:other_id},
                    type:"POST",
                    success:function(res){
                        if (res==1) {
                            alert('兑换成功');
                            window.history.back(-1);
                        }else{
                            alert('兑换失败');
                        }
                    }
                })
            }
    })
</script>

</html>