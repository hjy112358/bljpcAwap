<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:40:"./template/mobile/new/user\evaluate.html";i:1558781955;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta name="Generator" content="TPshop v1.1" />
    <meta charset="UTF-8">
    <title>评价</title>
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="__STATIC__/css/public.css" />
    <link rel="stylesheet" type="text/css" href="__STATIC__/css/index.css" />
    <link rel="stylesheet" href="__STATIC__/css/topdetail.css">
    <link rel="stylesheet" href="__STATIC__/css/iconfont/iconfont.css">
    <link rel="stylesheet" href="__STATIC__/css/css/layui.css">
    <script src="__STATIC__/js/layui.js"></script>
    <link rel="stylesheet" href="__STATIC__/css/goodstyle.css">
    <script type="text/javascript" src="__STATIC__/js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="__STATIC__/js/TouchSlide.1.1.js"></script>
    <script type="text/javascript" src="__STATIC__/js/jquery.json.js"></script>
    <script type="text/javascript" src="__STATIC__/js/touchslider.dev.js"></script>
    <script type="text/javascript" src="__STATIC__/js/layer.js"></script>
    <!-- <script src="__PUBLIC__/js/global.js"></script>
    <script src="__PUBLIC__/js/mobile_common.js"></script> -->
    <style>
        .wrap {
            /* padding-top: 44px; */
            padding-bottom: 50px;

        }

        .pubheads {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            padding: 0;
        }

        .pubheads img {
            padding-left: 10px;
        }

        .pubheads span {
            padding-right: 10px
        }

        body {
            background: #e9e9e9
        }

        .wrap {
            background: #fff
        }

        .layui-upload .mark_button {
            position: absolute;
            right: 15px;
        }

        .upload-img {
            position: relative;
            display: inline-block;
            width: 21%;
            height: 80px;
            padding: 10px;
            margin-right: 5%;
        }

        .layui-upload-img {
            max-width: 100%;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 1
        }

        .upload-img input {
            position: absolute;
            left: 0px;
            top: 0px;
        }

        .upload-img button {
            position: absolute;
            right: 0px;
            top: 0px;
            border-radius: 6px;
        }

        .upload-img span {
            position: absolute;
            left: 0;
            top: 0;
            color: #ff4c4c;
            z-index: 3
        }
    </style>

</head>

<body class="orderDetail">
    <div class="wrap">
        <!-- <div class="pubheads maincolorbg flex jus-between align-c">
                <a  href="javascript:history.back(-1)"> <img src="__STATIC__/images/newimg/order/backW.png" alt=""></a>
            <p>订单评价</p>
            <span>发布</span>
        </div> -->

        <div class="maincolorbg flex jus-between align-c tophead">
            <a href="javascript:history.back(-1)" class="iconfont icon-fanhui2"></a>
            <p class="font-18">订单评价</p>
            <span class="font-18" onclick="fabu()">发布</span>
        </div>


        <div class="productgrade flex  jus-between align-c ">
            <div class="gradeimg">
                <img src="<?php echo $order_goods['original_img']; ?>" alt="">
            </div>
            <p class="font-14">满意度</p>
            <div class="gradelist">
                <ul class="clearfix">
                    <li data-id="1"></li>
                    <li data-id="2"></li>
                    <li data-id="3"></li>
                    <li data-id="4"></li>
                    <li data-id="5"></li>
                </ul>
            </div>
            <p class="font-14 badGrade">非常差</p>
        </div>


        <div class="evaluate">
            <div>
                <textarea name="content" id="content" rows="10" placeholder="产品用着还满意吗？请畅所欲言···"></textarea>
            </div>
            <div>
                <blockquote class="layui-elem-quote layui-quote-nm" style="margin-top: 10px;border:0">
                    <div class="layui-upload-list" id="imgs">
                    </div>
                </blockquote>
                <div class="cameraimg" id="sele_imgs">
                    <img src="__STATIC__/images/newimg/goods/camera.png" alt="" style="margin-top:10px">
                    <p>添加照片</p>
                </div>

            </div>
        </div>
        <script id="img_template" type="text/html">
            <div class="upload-img" filename="{{ d.index }}">
                <span class="iconfont icon-shanchu" id="delimg"></span>
                <img src="{{  d.result }}" alt="{{ d.name }}" class="layui-upload-img">
            </div>
        </script>



        <div class="storeEvalute" style="padding-top:10px">
            <div class="flex jus-start align-c ">
                <img src="__STATIC__/images/newimg/goods/storeimg.png" alt="" width="13" height="11">
                <p class="font-13">店铺评分</p>
            </div>
            <div class="evalutelist">
                <ul class="clearfix">
                    <li class="flex jus-start align-c ">
                        <p class="font-14">物流服务</p>
                        <div class="logisticslist">
                            <ul>
                                <li data-id="1"></li>
                                <li data-id="2"></li>
                                <li data-id="3"></li>
                                <li data-id="4"></li>
                                <li data-id="5"></li>
                            </ul>
                        </div>
                    </li>
                    <li class="flex jus-start align-c ">
                        <p class="font-14">服务态度</p>
                        <div class="servelist">
                            <ul>
                                <li data-id="1"></li>
                                <li data-id="2"></li>
                                <li data-id="3"></li>
                                <li data-id="4"></li>
                                <li data-id="5"></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <input type="hidden" name="goods_rank" value="">
    <input type="hidden" name="ship_rank" value="">
    <input type="hidden" name="fuwu_rank" value="">
    <input type="hidden" name="order_id" value="<?php echo $order_id; ?>">
    <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">

</body>
<script>
    $(function () {
        $(".servelist ul li").on("click", function () {
            var _this = $(this);
            $("input[name='fuwu_rank']").val(_this.data('id'));
            _this.addClass("active");
            _this.prevAll().addClass("active");
            _this.nextAll().removeClass("active")
        })
        $(".logisticslist ul li").on("click", function () {
            var _this = $(this);
            $("input[name='ship_rank']").val(_this.data('id'));
            _this.addClass("active");
            _this.prevAll().addClass("active");
            _this.nextAll().removeClass("active");
        })
        $(".gradelist ul li").on("click", function () {
            var _this = $(this);
            $("input[name='goods_rank']").val(_this.data('id'));
            if (_this.data('id') == '1') {
                $(".badGrade").html('很差');
            }
            if (_this.data('id') == '2') {
                $(".badGrade").html('差');
            }
            if (_this.data('id') == '3') {
                $(".badGrade").html('一般');
            }
            if (_this.data('id') == '4') {
                $(".badGrade").html('好');
            }
            if (_this.data('id') == '5') {
                $(".badGrade").html('很好');
            }
            _this.addClass("active");
            _this.prevAll().addClass("active");
            _this.nextAll().removeClass("active");

        })


        layui.use(['upload', 'laytpl', 'form'], function () {
            var $ = layui.jquery
                , upload = layui.upload
                , laytpl = layui.laytpl
                , form = layui.form;


            var imgFiles;
            var imgfiles = []
            var files
            //多图片上传
            var uploadInst = upload.render({
                elem: '#sele_imgs'  //开始
                , acceptMime: 'image/*'
                , url: '/upload/'
                , auto: false
                , bindAction: '#upload_imgs'
                , multiple: true
                , size: 1024 * 12
                , choose: function (obj) {  //选择图片后事件
                    files = this.files = obj.pushFile(); //将每次选择的文件追加到文件队列
                    imgFiles = files;
                    console.log(imgFiles);
                    $('#upload_imgs').prop('disabled', false);
                    console.log(obj)
                    //预读本地文件示例，不支持ie8
                    obj.preview(function (index, file, result) {
                        var data = {
                            index: index,
                            name: file.name,
                            result: result
                        };

                        //将预览html 追加
                        laytpl(img_template.innerHTML).render(data, function (html) {
                            $('#imgs').append(html);
                        });

                        //绑定单击事件
                        $('#imgs div:last-child>img').click(function () {
                            var isChecked = $(this).siblings("input").prop("checked");
                            $(this).siblings("input").prop("checked", !isChecked);
                            return false;
                        });

                        imgfiles.push(file)





                    });
                }
                , before: function (obj) { //上传前回函数
                    layer.load(); //上传loading
                }
                , done: function (res, index, upload) {    //上传完毕后事件

                    layer.closeAll('loading'); //关闭loading
                    //上传完毕

                    $('#imgs').html("");//清空操作

                    top.layer.msg("上传成功！");

                    return delete imgFiles[index]; //删除文件队列已经上传成功的文件
                    console.log(res)

                }
                , error: function (index, upload) {

                    layer.closeAll('loading'); //关闭loading

                    top.layer.msg("上传失败！");

                }
            });



            $(document).on("click", "#delimg", function () {
                var _this = $(this)
                var index = _this.parent().attr("filename")
                var index01 = _this.parent().index()
                _this.parent().remove();
                delete files[index]; //删除对应的文件
                imgFiles = files;
                imgfiles.splice(index01, 1)
                console.log(imgfiles)

            });


        });






    })
</script>

</html>