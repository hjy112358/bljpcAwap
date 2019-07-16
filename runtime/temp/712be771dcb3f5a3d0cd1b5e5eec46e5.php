<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:50:"./application/seller/new/admin\sellerRegAudit.html";i:1560307132;}*/ ?>
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
                            <li class=" ">
                                <div class="stepWrap">
                                    <div class=" font-36">1</div>
                                    <div class="stepDetail">
                                        <p class=" font-13">阅读开店须知</p>
                                        <p class="font-13 stepmsg">确认自己符合规定</p>
    
                                    </div>
                                </div>
                            </li>
                            <li class="">
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
                            <li class="on">
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


                    <div class="auditbox">
                        <p style="font-size: 20px;">入驻申请已经提交，请等待管理员审核</p>
                       
                        <div class="authenticationbtn" style="margin-top:200px">
                            <a href="<?php echo url('admin/login'); ?>" class="nextStep">进入商家后台</a>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    <script src="/public/assets/layui.all.js" type="text/javascript"></script>
    <script src="/public/assets/js/TouchSlide.1.1.js" type="text/javascript"></script>

</body>
<script>
    layui.use('upload', function () {
        var $ = layui.jquery
            , upload = layui.upload
            , laydate = layui.laydate;
        //日期范围
        laydate.render({
            elem: '#validity'
            , range: true 
        });
        //普通图片上传
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
            , done: function (res) {
                //   //如果上传失败
                //   if(res.code > 0){
                //     return layer.msg('上传失败');
                //   }
                //上传成功
            }
            , error: function () {
                //演示失败状态，并实现重 传
                //   var demoText = $('#demoText');
                //   demoText.html('<span style="color: #FF5722;">上传失败</span> <a class="layui-btn layui-btn-xs demo-reload">重试</a>');
                //   demoText.find('.demo-reload').on('click', function(){
                //     uploadInst.upload();
                //   });
            }
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
            , done: function (res) {
                //   //如果上传失败
                //   if(res.code > 0){
                //     return layer.msg('上传失败');
                //   }
                //上传成功
            }
            , error: function () {
                //演示失败状态，并实现重 传
                //   var demoText = $('#demoText');
                //   demoText.html('<span style="color: #FF5722;">上传失败</span> <a class="layui-btn layui-btn-xs demo-reload">重试</a>');
                //   demoText.find('.demo-reload').on('click', function(){
                //     uploadInst.upload();
                //   });
            }
        });
    })

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