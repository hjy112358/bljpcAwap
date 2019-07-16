<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:37:"./template/mobile/new/order\test.html";i:1558315667;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta name="Generator" content="TPshop v1.1" />
    <meta charset="UTF-8">
    <title>兑换</title>
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="__STATIC__/css/public.css" />
    <link rel="stylesheet" type="text/css" href="__STATIC__/css/index.css" />
    <link rel="stylesheet" href="__STATIC__/css/css/layui.css">
    <link rel="stylesheet" href="__STATIC__/css/topdetail.css">
    <script type="text/javascript" src="__STATIC__/js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="__STATIC__/js/TouchSlide.1.1.js"></script>
    <script type="text/javascript" src="__STATIC__/js/jquery.json.js"></script>
    <script type="text/javascript" src="__STATIC__/js/touchslider.dev.js"></script>
    <script type="text/javascript" src="__STATIC__/js/layer.js"></script>
    <!-- <script src="__PUBLIC__/js/global.js"></script>
    <script src="__PUBLIC__/js/mobile_common.js"></script> -->

    <script src="__STATIC__/js/layui.js"></script>
    <style>
        .datelist {
            padding: 10px 10px
        }

        .datelist>div {
            height: 44px;
            line-height: 44px;
            /* border-bottom: 1px solid #000; */
            margin-bottom: 10px
        }

        .datelist p {
            font-size: 16px
        }

        .datelist select,
        .datelist input {
            width: 70%;
            height: 44px;
            line-height: 44px;
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
        <div class="pubhead maincolorbg ">
            <a href="javascript:history.back(-1)">
                <p>兑换</p>
            </a>
        </div>
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
                <select name="" id="type">
                    <option value="1">注册券</option>
                    <option value="2">消费券</option>
                    <option value="4">挂售券</option>
                </select>
            </div>
            <div class="flex jus-between align-c">
                <p>兑换数量</p>
                <input type="text" id="number">
                <input type="hidden" name="has_yue" value="<?php echo $wanyong; ?>" id="max">
            </div>
            <div class="flex jus-between  otherId hidden">
                <p>ID</p>
                <input type="text" placeholder="请填写对方ID" id="other_id">
            </div>
        </div>
        <div class="nextStep">
            <a id="submit" href="javascript:void(0)">确认</a>
        </div>
    </div>

</body>



<!-- <script>
    $("#conversion").change(function () {
        var sele = $(this).children('option:selected').val();
        if (sele == "2") {
            $(".otherId").removeClass("hidden")
        } else {
            $(".otherId").addClass("hidden")
        }
    });
    $('#submit').click(function(){
        var max= parseFloat($("#max").val());
        var other_id= parseFloat($("#other_id").val());
        var number=$("#number").val();
        var type=parseFloat($("#type").val());
        var conversion = parseFloat($("#conversion").val());
        console.log(number);
        if(number > max){
            alert("不能超过自己拥有的余额数量！");
        }else{
            if (conversion==1) {
                $.ajax({
                    url:"<?php echo U('User/exchangeTicket_self'); ?>",
                    data:{type:type,number:number},
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
            }else{
                $.ajax({
                    url:"<?php echo U('User/exchangeTicket_other'); ?>",
                    data:{type:type,number:number,other_id:other_id},
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

        }
    })
</script> -->

</html>