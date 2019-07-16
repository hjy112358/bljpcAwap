<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:42:"./template/mobile/new/index\oneBuypay.html";i:1558058731;}*/ ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>商品分类</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="__STATIC__/css/public.css" />
    <link rel="stylesheet" type="text/css" href="__STATIC__/css/onebuypay.css" />
    <link rel="stylesheet" type="text/css" href="__STATIC__/css/css/layui.css" />
    <link rel="stylesheet" href="__STATIC__/css/swiper.min.css">
    <script type="text/javascript" src="__STATIC__/js/jquery.js"></script>
    <script src="__STATIC__/js/swiper.min.js"></script>
    <script type="text/javascript" src="__STATIC__/js/layer.js"></script>
    <script src="__PUBLIC__/js/global.js"></script>
    <script src="__PUBLIC__/js/mobile_common.js"></script>
    <script type="text/javascript" src="__STATIC__/js/TouchSlide.1.1.js"></script>

</head>

<body>
    
    <div class="msgTtile">
        <h3 class="font-20 col2f">填写个人信息</h3>
        <p class="font-15 col82">Fill in personal information</p>
    </div>


    <div class="msgform">
        <form action="">
            <div class="formbox">
                <label for="" class="font-14">银行卡号：</label>
                <input type="text" placeholder="请输入你的银行卡号" class="font-14">
            </div>
            <div class="formbox">
                <label for="" class="font-14">手机号码：</label>
                <input type="text" placeholder="请输入你的手机号码" class="font-14">
            </div>
            <div class="formbox1 clearfix">
                <label for="" class="font-14">身份证：</label>
                <div class="form-item flex jus-between">
                    <div class="forminline">
                        <div class="upload input-inline" id="imgbtn">
                            <div class="upimgbox upimg1">
                                <img src="" alt="" id="demo1">
                            </div>
                            <div class="imgbox ">
                                <img src="__STATIC__/images/newimg/onebuy/cam.png" alt="">
                                <p class="font-12 col6c">身份证正面</p>
                            </div>
                        </div>
                    </div>
                    <div class="forminline">
                        <div class="upload input-inline" id="imgbtn1">
                            <div class="upimgbox upimg2">
                                <img src="" alt="" id="demo2">
                            </div>
                            <div class="imgbox">
                                <img src="__STATIC__/images/newimg/onebuy/cam.png" alt="">
                                <p class="font-12 col6c">身份证反面</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a href="javascript:void(0)" id="buynow" class="font-17">立即去购买</a>
        </form>
    </div>


    <div class="mark hidden">
        <div class="upimg">
            <img src="__STATIC__/images/newimg/onebuy/up.png" alt="">
            <a href="javascript:void(0)"></a>
        </div>
        <img src="__STATIC__/images/newimg/onebuy/close.png" alt="" class="closebtn">
    </div>
</body>
<script src="__STATIC__/js/layui.js"></script>
<script>
 layui.use('upload', function () {
        var $ = layui.jquery
            , upload = layui.upload;
        var uploadInst = upload.render({
            elem: '#imgbtn'
            , url: '/upload/'
            // , auto: false
            , before: function (obj) {
                //预读本地文件示例，不支持ie8
                obj.preview(function (index, file, result) {
                    $('.upimg1').css("z-index", 1)
                    $('#demo1').attr('src', result); //图片链接（base64）
                });
            }
            , done: function (res) {}
            , error: function () {}
        });
        //普通图片上传
        var uploadInst = upload.render({
            elem: '#imgbtn1'
            , url: '/upload/'
            // , auto: false
            , before: function (obj) {
                //预读本地文件示例，不支持ie8
                obj.preview(function (index, file, result) {
                    $('.upimg2').css("z-index", 1)
                    $('#demo2').attr('src', result); //图片链接（base64）
                });
            }
            , done: function (res) {}
            , error: function () {}
        });
    })


    $(".closebtn").on("click",function(){
        $(".mark").addClass("hidden")
    })
    $("#buynow").on("click",function(){
        $(".mark").removeClass("hidden")
    })
</script>
</html>