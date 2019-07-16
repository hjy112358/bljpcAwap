<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:44:"./template/mobile/new/user\shareCodeNew.html";i:1558499156;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta name="Generator" content="TPshop v1.1" />
    <meta charset="UTF-8">
    <title>分享二维码</title>
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="__STATIC__/css/public.css" />
    <link rel="stylesheet" type="text/css" href="__STATIC__/css/index.css" />
    <link rel="stylesheet" href="__STATIC__/css/iconfont/iconfont.css">
    <!-- <link rel="stylesheet" href="__STATIC__/css/topdetail.css"> -->
    <script type="text/javascript" src="__STATIC__/js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="__STATIC__/js/TouchSlide.1.1.js"></script>
    <script type="text/javascript" src="__STATIC__/js/jquery.json.js"></script>
    <script type="text/javascript" src="__STATIC__/js/touchslider.dev.js"></script>
    <script type="text/javascript" src="__STATIC__/js/layer.js"></script>
    <script type="text/javascript" src="__STATIC__/js/utf.js"></script>
    <script type="text/javascript" src="__STATIC__/js/jquery.qrcode.js"></script>
    <script src="__PUBLIC__/js/global.js"></script>
    <script src="__PUBLIC__/js/mobile_common.js"></script>
    <style>
        .bottombt a{
            color:#ccc;
            font-size: 44px;
        }
        .bottombt {
            position: fixed;
            width:95%;
            bottom:10px;
            left:0;
            padding:0 10px
        }
        .shareCode img{
            max-width: 100%
        }
        .codebox {
            width:128px;
            height:128px;
            border:4px solid #fff;
            border-radius: 10px;
            margin:0 auto;
            position: absolute;
            top:0;
            left:50%;
            margin-left:-64px;
        }
    </style>
</head>

<body id="wrapper">
    <div class="wrap">
        <div class="pubhead maincolorbg " style=" text-align: center">
                <!-- <a href="javascript:history.back(-1)" class="iconfont icon-fanhui"></a> -->
            <p>分享邀请码</p>
            <!-- <a href="<?php echo U('Index/index'); ?>" class="iconfont  icon-zhuyeclick" style="font-size:48px"></a> -->
        </div>

       <div class="shareCode">
           <img src="__STATIC__/images/newimg/usr/img01.png" alt="">
           <img src="__STATIC__/images/newimg/usr/img02.png" alt="">
           <div class="pos-r">
                <img src="__STATIC__/images/newimg/usr/img03.png" alt="">
                <div class="codebox">
                    <div class="codeimg"></div>
                </div>
           </div>
       </div>
       <!-- <div id="toImg" class="flex jus-start align-c"
            style="font-size: 14px;text-align: center;width: 100px;margin: 0 auto;">
            <img src="__STATIC__/images/newimg/down.png" alt="" style="width:20px;height:20px">
            <p>保存为图片</p>
        </div>-->


        <!-- <div class=" flex  jus-between align-c bottombt">
            <a href="javascript:history.back(-1)" class="iconfont icon-buoumaotubiao09"></a>
           
            <a href="<?php echo U('Index/index'); ?>" class="iconfont  icon-zhuyeclick" style="font-size:48px"></a>
        </div> -->
    </div>

</body>
<script src="__STATIC__/js/html2canvas.min.js"></script>
<script type="text/javascript">
    $(function () {

        $(".codeimg").qrcode({
            render: "canvas",    //设置渲染方式，有table和canvas，使用canvas方式渲染性能相对来说比较好
            text: "http://abc.fyc365.cn/mobile/User/reg.html?invite_id=" + '<?php echo $invitecode; ?>',    //扫描二维码后显示的内容,可以直接填一个网址，扫描二维码后自动跳向该链接
            width: "109",               //二维码的宽度
            height: "109",              //二维码的高度
            background: "#FFFFFF",       //二维码的后景色
            foreground: "#000000",        //二维码的前景色
            src: "<?php echo $head_pic; ?>"             //二维码中间的图片
        });
    });

    // function dataURLtoBlob(dataurl) {
    //     var arr = dataurl.split(','),
    //         mime = arr[0].match(/:(.*?);/)[1],
    //         bstr = atob(arr[1]),
    //         n = bstr.length,
    //         u8arr = new Uint8Array(n);
    //     while (n--) {
    //         u8arr[n] = bstr.charCodeAt(n);
    //     }
    //     return new Blob([u8arr], { type: mime });
    // }
    // //将blob转换为file
    // function blobToFile(theBlob, fileName) {
    //     theBlob.lastModifiedDate = new Date();
    //     theBlob.name = fileName;
    //     return theBlob;
    // }

    // $("#toImg").click(function () {
    //     html2canvas($(".shareCode"), {
    //         onrendered: function (canvas) {
    //             var url = canvas.toDataURL();
    //             console.log(url)
    //             //以下代码为下载此图片功能
    //             var triggerDownload = $("<a>").attr("href", url).attr("download", "必量家邀请码<?php echo $invitecode; ?>.png").appendTo("body");
    //             triggerDownload[0].click();
    //             triggerDownload.remove();
    //         }
    //     });
    // })


</script>



</html>