<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:39:"./template/mobile/new/user\setting.html";i:1558510365;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta name="Generator" content="TPshop v1.1" />
    <meta charset="UTF-8">
    <title>我的-设置资料</title>
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="__STATIC__/css/public.css" />
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
        .takePhoto {
            position: relative;
            padding: 3px 5px;
            overflow: hidden;
            color: #fff;
            background-color: #ccc;
        }

        .takePhoto input {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            outline: none;
            background-color: transparent;
            filter: alpha(opacity=0);
            -moz-opacity: 0;
            -khtml-opacity: 0;
            opacity: 0;
        }
    </style>
</head>

<body class="">
    <div class="wrap settingwrap">
        <div class=" setting">
            <!-- <div class="flex jus-between align-c backimg">
                <a href="javascript:history.back(-1)"><img src="__STATIC__/images/newimg/order/backW.png" alt=""></a>
                <p>设置</p>
                <span>保存</span>
            </div> -->
            <div class=" flex jus-between align-c tophead">
                <a href="javascript:history.back(-1)" class="iconfont icon-fanhui2"></a>
                <p class="font-18">设置</p>
                <span class="font-16">保存</span>
            </div>


            <div class="flex jus-start align-c usermsg">
                <div class="userimg">
                    <img src="<?php echo $user_info['head_pic']; ?>" alt="" id="portrait">
                </div>
                <div class="editbox">
                    <div>
                        <span><?php echo $user_info['nickname']; ?></span>
                        <img src="__STATIC__/images/newimg/usr/edit.png" alt="" class="editimg">
                    </div>
                    <p>这个人很懒，什么也没留下</p>
                </div>
            </div>
        </div>

        <div class="settinglist">
            <ul>
                <!-- 我的账户 -->
                <li class="flex jus-between align-c">
                    <div class="flex jus-start align-c">
                        <img src="__STATIC__/images/newimg/usr/account.png" alt="">
                        <p>我的账户</p>
                    </div>
                    <img src="__STATIC__/images/newimg/usr/setback.png" alt="">
                </li>
                <!-- 我的收藏 -->
                <li class="flex jus-between align-c">
                    <div class="flex jus-start align-c">
                        <img src="__STATIC__/images/newimg/usr/collect.png" alt="">
                        <p>我的收藏</p>
                    </div>
                    <img src="__STATIC__/images/newimg/usr/setback.png" alt="">
                </li>
                <!-- 我的卡券 -->
                <li class="flex jus-between align-c">
                    <div class="flex jus-start align-c">
                        <img src="__STATIC__/images/newimg/usr/coupon.png" alt="">
                        <p>我的卡券</p>
                    </div>
                    <img src="__STATIC__/images/newimg/usr/setback.png" alt="">
                </li>
                <!-- 今日限免 -->
                <li class="flex jus-between align-c">
                    <div class="flex jus-start align-c">
                        <img src="__STATIC__/images/newimg/usr/free.png" alt="">
                        <p>今日限免</p>
                    </div>
                    <img src="__STATIC__/images/newimg/usr/setback.png" alt="">
                </li>
                <!-- 邀请好友 -->
                <!-- <li>
                    <a href="<?php echo U('User/shareCode'); ?>" class="flex jus-between align-c">
                        <div class="flex jus-start align-c">
                            <img src="__STATIC__/images/newimg/usr/invite.png" alt="">
                            <p>邀请好友</p>
                        </div>
                        <img src="__STATIC__/images/newimg/usr/setback.png" alt="" width="5" height="12">
                    </a>
                </li> -->
                <!-- <li class="flex jus-between align-c">
                    <div class="flex jus-start align-c">                        <img src="__STATIC__/images/newimg/usr/1.png" alt="">
                        <p>邀请码</p>
                    </div>
                    <p>123456</p>
                </li> -->
            </ul>
        </div>

        <div class="nextStep">
            <a href="<?php echo U('user/logout'); ?>">退出登录</a>
        </div>
    </div>
    <!--选择头像弹窗 -->
    <div class="uploadimg hidden">
        <div class="checklist">
            <ul>
                <li class="takePhoto">
                    拍照
                    <!-- <input type="file" capture="camera" ref="filetest" accept="image/*" id="filetest" name="filetest"
                        class=""> -->
                </li>
                <li class="album">从相册里选择</li>
                <li class="maincolor cancle">取消</li>
            </ul>
        </div>
    </div>
</body>

<script>
    $(".userimg").on("click", function () {
        $(".uploadimg").removeClass("hidden")
    })

    $(".cancle").on("click", function () {
        $(".uploadimg").addClass("hidden")
    })

    document.getElementById('filetest').addEventListener('change', function () {
        var reader = new FileReader();
        reader.onload = function (e) {
            document.getElementById("portrait").src = e.target.result;
            $(".uploadimg").addClass("hidden")
            // $("#uploadvideoid").ajaxSubmit(); //这个是ajax提交表单记得加上
        };
        // reader.readAsDataURL(this.files[0]);
        // var fileSize = Math.round(this.files[0].size / 1024 / 1024);
    }, false);


    // function compress(res, fileSize) { //res代表上传的图片，fileSize大小图片的大小
    //     var img = new Image(),
    //         maxW = 640; //设置最大宽度

    //     img.onload = function () {
    //         var cvs = document.createElement('canvas'),
    //             ctx = cvs.getContext('2d');

    //         if (img.width > maxW) {
    //             img.height *= maxW / img.width;
    //             img.width = maxW;
    //         }

    //         cvs.width = img.width;
    //         cvs.height = img.height;

    //         ctx.clearRect(0, 0, cvs.width, cvs.height);
    //         ctx.drawImage(img, 0, 0, img.width, img.height);

    //         var compressRate = getCompressRate(1, fileSize);

    //         var dataUrl = cvs.toDataURL('image/jpeg', compressRate);

    //         document.body.appendChild(cvs);
    //         console.log(dataUrl);
    //     }

    //     img.src = res;
    // }

    // function getCompressRate(allowMaxSize, fileSize) { //计算压缩比率，size单位为MB
    //     var compressRate = 1;

    //     if (fileSize / allowMaxSize > 4) {
    //         compressRate = 0.5;
    //     } else if (fileSize / allowMaxSize > 3) {
    //         compressRate = 0.6;
    //     } else if (fileSize / allowMaxSize > 2) {
    //         compressRate = 0.7;
    //     } else if (fileSize > allowMaxSize) {
    //         compressRate = 0.8;
    //     } else {
    //         compressRate = 0.9;
    //     }

    //     return compressRate;
    // }

</script>


</html>