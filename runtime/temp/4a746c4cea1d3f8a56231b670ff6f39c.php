<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:40:"./template/mobile/new/user\transfor.html";i:1558439905;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta name="Generator" content="TPshop v1.1" />
    <meta charset="UTF-8">
    <title>转账</title>
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="__STATIC__/css/public.css" />
    <link rel="stylesheet" type="text/css" href="__STATIC__/css/index.css" />
    <link rel="stylesheet" href="__STATIC__/css/transfor.css">
    <script type="text/javascript" src="__STATIC__/js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="__STATIC__/js/TouchSlide.1.1.js"></script>
    <script type="text/javascript" src="__STATIC__/js/jquery.json.js"></script>
    <script type="text/javascript" src="__STATIC__/js/touchslider.dev.js"></script>
    <script type="text/javascript" src="__STATIC__/js/layer.js"></script>

</head>

<body>
    <div class="wrap">
        <div class="topbox">
            <div class="tophead">
                <a href="javascript:history.back(-1)">
                    <img src="__STATIC__/images/newimg/usr/backBlack.png" alt="">
                </a>
            </div>
            <div class="usrhead">
                <img src="__STATIC__/images/newimg/usr/userimg.png" alt="">
            </div>
            <div class="usrphone flex jus-start align-c">
                <label for="">用户手机号：</label>
                <input type="number" name="tel" id="tel">
            </div>
        </div>

        <div class="usrPrice">
            <p class="font-12">转账金额</p>
            <div class="pricebox flex jus-start align-c">
                <label for="">￥</label>
                <input type="hidden" name="has_yue" value="<?php echo $yue; ?>" id="max">
                <input type="number" name="yue" id="yue">
            </div>

            <p class="maincolor font-12">添加转账说明</p>
            <a href="javascript:void(0)" class="tranforBtn" id="submit">转账</a>
        </div>

    </div>
</body>
<script>
        $('#submit').click(function(){
             var max=$("#max").val();
             var yue=$("#yue").val();
             var tel=$("#tel").val();
             if(yue>max){
                 alert("不能超过自己拥有的余额数量！")
             }else{
                 $.ajax({
                     url:"<?php echo U('User/accounts_do'); ?>",
                     data:{tel:tel,yue:yue},
                     type:"POST",
                     success:function(res){
                         if (res==1) {
                             alert('转账成功');
                             window.history.back(-1);
                         }else{
                             alert('转账失败');
                         }
                     }
                 })
             }
        })
    </script>
    
</html>