<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:42:"./template/mobile/new/user\settingNew.html";i:1562895117;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta name="Generator" content="TPshop v1.1" />
    <meta charset="UTF-8">
    <!-- <title>我的-设置资料</title> -->
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

        .settinglist input {
            color: #3a3a3a;
            border: 0;
            text-align: right;
        }

        .setting {
            background-size: 100% 203px;
            height: 203px;
        }
        .test {
            font-size: 14px;
            color:#3a3a3a
        }
        .test input{
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
            <!-- <div class=" flex jus-between align-c tophead">
                <a href="javascript:history.back(-1)" class="iconfont icon-fanhui2"></a>
                <p class="font-18">设置</p>
                <span id="save" class="font-16">保存</span>
            </div> -->
            <div class=" flex jus-between align-c tophead">
                <a href="javascript:void(0)"></a>
                <p class="font-18">设置</p>
                <span id="save" class="font-16">保存</span>
            </div>


            <div class="flex jus-start align-c usermsg">
                <div class="userimg">
                    <img src="<?php echo $user_info['head_pic']; ?>" alt="" id="portrait">
                </div>
                <div class="editbox">
                    <div>
                        <span id="old_nickname"><?php echo $user_info['nickname']; ?></span>
                        <!-- <img src="__STATIC__/images/newimg/usr/edit.png" alt="" class="editimg"> -->
                    </div>
                    <!-- <p>这个人很懒，什么也没留下</p> -->
                </div>
            </div>
        </div>

        <div class="settinglist">
            <ul>

                <li class="flex jus-between align-c">
                    <p>我的昵称</p>
                    <input type="text" id="nickname" value="<?php echo $user_info['nickname']; ?>">
                </li>

                <li>
                    <a href="<?php echo U('User/bindPhone'); ?>" class="flex jus-between align-c">
                        <div class="flex jus-start align-c">
                            <p>修改手机号</p>
                        </div>
                        <div class="flex jus-start align-c">
                            <p><?php echo $user_info['mobile']; ?></p>
                            <img src="__STATIC__/images/newimg/usr/setback.png" alt="" width="5" height="12">
                        </div>
                    </a>
                </li>
                <li>
                    <a href="<?php echo U('User/editPass'); ?>" class="flex jus-between align-c">
                        <div class="flex jus-start align-c">
                            <p>修改密码</p>
                        </div>
                        <div class="flex jus-start align-c">

                            <img src="__STATIC__/images/newimg/usr/setback.png" alt="" width="5" height="12">
                        </div>
                    </a>
                </li>
                <li>
                    <a href="<?php echo U('User/editPayPass'); ?>" class="flex jus-between align-c">
                        <div class="flex jus-start align-c">
                            <p>修改支付密码</p>
                        </div>
                        <div class="flex jus-start align-c">

                            <img src="__STATIC__/images/newimg/usr/setback.png" alt="" width="5" height="12">
                        </div>
                    </a>
                </li>
                <!-- <li>
                    <a href="<?php echo U('User/choosecity'); ?>" class="flex jus-between align-c">
                        <div class="flex jus-start align-c">
                            <p>地区设置</p>
                        </div>
                        <div class="flex jus-start align-c">

                            <img src="__STATIC__/images/newimg/usr/setback.png" alt="" width="5" height="12">
                        </div>
                    </a>
                </li> -->
                <li>
                    <a href="<?php echo U('User/feedback'); ?>" class="flex jus-between align-c">
                        <div class="flex jus-start align-c">
                            <p>意见反馈</p>
                        </div>
                        <div class="flex jus-start align-c">

                            <img src="__STATIC__/images/newimg/usr/setback.png" alt="" width="5" height="12">
                        </div>
                    </a>
                </li>
              

                <p style="margin-top: 301px;color: #ccc;font-size: 12px;text-align: center;">Copyright©2004-2019
                    江苏必量家版权所有</p>
                

            </ul>
        </div>

        <!-- <div class="nextStep">
            <a href="<?php echo U('user/logout'); ?>">退出登录</a>
        </div> -->
    </div>
    <!--选择头像弹窗 -->
    <div class="uploadimg hidden">
        <div class="checklist">
            <ul>
                <li class="takePhoto">
                    从相册里选择
                    <input type="file" name="image_file" id="image_file">
                </li>
                <!-- <li class="album">从相册里选择</li> -->
                <li class="maincolor cancle">取消</li>
            </ul>
        </div>
    </div>
</body>

<script>
    $(function () {
        checkPlatform();

        $(".userimg").on("click", function () {
            $(".uploadimg").removeClass("hidden")
        })

        $(".cancle").on("click", function () {
            $(".uploadimg").addClass("hidden")
        })

        document.getElementById('image_file').addEventListener('change', function () {
            $(".uploadimg").addClass("hidden")
            console.log($("#image_file")[0].files)

        }, false);


      

    })


    function checkPlatform() {
        if (/android/i.test(navigator.userAgent)) {
            $("#image_file").attr('accept', 'image/*');

        }
    }

    $('#save').click(function () {
        var nickname = $('#nickname').val();
        var old_nickname = $('#old_nickname').html();
        if (nickname !== old_nickname && nickname !== '') {
            $.ajax({
                url: "<?php echo U('User/update_nickname'); ?>",
                data: { nickname: nickname },
                type: "POST",
                success: function (res) {
                    if (res == 1) {
                        alert('修改成功');
                        window.location.reload();
                    } else {
                        alert('修改失败');
                    }
                }
            });
        }
    })
</script>


</html>