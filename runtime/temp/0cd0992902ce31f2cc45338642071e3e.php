<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:48:"./application/seller/new/admin\sellerRegTwo.html";i:1560242971;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="/public/assets/css/layui.css" type="text/css">
    <link rel="stylesheet" href="/public/assets/css/mypublic.css" type="text/css">
    <link rel="stylesheet" href="/public/assets/css/view.css" type="text/css" />
    <link rel="stylesheet" href="/public/assets/css/setting/approve.css?time=<?php echo time()?>" type="text/css">
    <script src="/public/assets/js/jquery-3.1.1.min.js" type="text/javascript"></script>
    <title></title>
    <style>
        .loginOut {
            cursor: pointer;
        }
    </style>
</head>

<body class="">
    <div class="regHead ">
        <p class="font-20 ">必量家<span class="font-16">卖家申请中心</span></p>
        <div class="headmsg  clearfix">
            <p class="fl">你好,<?php echo $user_info['nickname']; ?></p>
            <p class="fl loginOut">退出</p>
            <img src="<?php echo $user_info['head_pic']; ?>" alt="">
            <input type="hidden" id="islogin" value="<?php echo $user_info['islogin']; ?>">
        </div>
    </div>
    <div class="rowrap">
        <div class=" rowbox">
            <div class="applybox">
                <h3>我要开店</h3>
                <div class="step ">
                    <ul class="clearfix">
                        <li class="">
                            <div class="stepWrap">
                                <div class=" font-36">1</div>
                                <div class="stepDetail">
                                    <p class=" font-13">阅读开店须知</p>
                                    <p class="font-13 stepmsg">确认自己符合规定</p>

                                </div>
                            </div>
                        </li>
                        <li class="on">
                            <div class="stepWrap">
                                <div class=" font-36">2</div>
                                <div class="stepDetail">
                                    <p class="font-13">入驻信息</p>
                                    <p class="font-13 stepmsg">企业店铺</p>
                                </div>
                            </div>
                        </li>
                        <li class="">
                            <div class="stepWrap">
                                <div class=" font-36">3</div>
                                <div class="stepDetail">
                                    <p class="font-13">公司信息</p>
                                    <p class="font-13 stepmsg">填写公司信息</p>
                                </div>
                            </div>
                        </li>
                        <li class="">
                            <div class="stepWrap">
                                <div class=" font-36">4</div>
                                <div class="stepDetail">
                                    <p class="font-13">店铺信息</p>
                                    <p class="font-13 stepmsg">填写店铺信息</p>
                                </div>
                            </div>
                        </li>
                        <li class="">
                            <div class="stepWrap">
                                <div class=" font-36">5</div>
                                <div class="stepDetail">
                                    <p class="font-13">审核</p>
                                    <p class="font-13 stepmsg">等待审核通过</p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <!-- 我要开店 -->
                <div class="authentication ">
                    <form class="layui-form" action="">

                        <div class="authenTitle" style="margin-bottom:25px;">
                            <span class="titleLeft lableleft font-16">卖家入驻联系人信息</span>
                            <span class="titleRight font-12">用于入驻过程中接收平台官方反馈的入驻通知</span>
                        </div>



                        <div class="layui-form-item">

                            <div class="layui-inline">
                                <label class="layui-form-label">联系人姓名</label>
                                <div class="layui-input-inline">
                                    <input type="text" name="" lay-verify="" autocomplete="off" class="layui-input"
                                        placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <div class="layui-inline">

                                <label class="layui-form-label">联系人电话</label>
                                <div class="layui-input-inline">
                                    <input type="tel" name="phone" lay-verify="required|phone" autocomplete="off"
                                        class="layui-input" placeholder="">
                                </div>
                            </div>

                        </div>
                        <div class="layui-form-item">

                            <div class="layui-inline">
                                <label class="layui-form-label">联系人邮箱</label>
                                <div class="layui-input-inline">
                                    <input type="text" name="email" lay-verify="email" autocomplete="off"
                                        class="layui-input" placeholder="">
                                </div>
                            </div>
                        </div>
                </div>


                <div class="authenticationbtn">
                    <a href="<?php echo url('admin/sellerReg'); ?>" style="margin-right: 155px" class="btnNO arthenbtn">上一步</a>
                    <a href="<?php echo url('admin/sellerRegThree'); ?>" class="nextStep">下一步</a>
                </div>
                </form>
            </div>

        </div>
    </div>
    </div>
    <script src="/public/assets/layui.all.js" type="text/javascript"></script>
    <script src="/public/assets/js/TouchSlide.1.1.js" type="text/javascript"></script>

</body>
<script>


    $(function () {
        $.ajax({
            url: "<?php echo U('admin/getloginstatus'); ?>",
            type: "POST",
            success: function (res) {
                if (res == false) {
                    $('.loginOut').html('');
                }
            }
        })
    })
    $('.loginOut').click(function () {
        $.ajax({
            url: "<?php echo U('admin/loginstatusout'); ?>",
            type: "POST",
            success: function (res) {
                if (res == true) {
                    alert('已退出账户');
                    window.location.reload();
                }
            }
        })
    })



    $(".nextStep").on("click", function () {
        // var islogin = $('#islogin').val();
        // if (islogin == 0) {
        //     alert('请先登录');
        //     window.location.href = 'loginNew.html';
        //     return false;
        // }


    })


</script>

</html>