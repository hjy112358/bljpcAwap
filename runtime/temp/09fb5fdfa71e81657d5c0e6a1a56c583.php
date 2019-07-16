<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:44:"./application/seller/new/admin\loginNew.html";i:1559266724;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="/public/assets/css/mypublic.css" type="text/css">
    <link rel="stylesheet" href="/public/assets/css/loginNew.css" type="text/css">
    <script src="/public/assets/js/jquery-3.1.1.min.js" type="text/javascript"></script>
    <script src="__PUBLIC__/static/js/layer/layer.js"></script>
    <title>登陆</title>
</head>

<body class="">
    <div class="headbox">
        <p class="font-26">必量家<span class="font-18">商户后台管理中心</span></p>
        <div class="loginmsg clearfix">
            <p class="font-14 fl">你好，请登录！</p>
            <img src="/public/assets/images/loginOutW.png" alt="" class="fl loginImgBtn">
        </div>
    </div>
    <div class="loginbox">
        <!--登陆 -->
        <form  method="post" id="form_login" action="<?php echo U('Admin/loginNew_do'); ?>" name='theForm' class="loginIn ">
            <div class="logbox ">
                <div class="formbox usernamebox">
                    <i class="formimg username"></i>
                    <input type="text" name="username" id="username" autocomplete="off" placeholder="用户名/手机号">
                </div>
                <div class="formbox">
                    <i class="formimg password"></i>
                <input name="password" type="password" id="password" autocomplete="off" class="text" placeholder="密码" />
                </div>
                <div class="formbox clearfix " style="margin-bottom:30px">
                <input type="text" name="vertify" id="captcha" autocomplete="off" class="text fl" style="width: 95px;"
                    maxlength="4" size="10" />
                    <div class="code fl">
                        <div class="code-img"><img src="<?php echo U('Admin/vertify'); ?>" title="换一张" name="codeimage" border="0"
                                id="imgVerify" /></div>
                        <a href="JavaScript:void(0);" id="hide" class="close" title=""><i></i></a>
                        <a href="JavaScript:void(0);" class="change" nctype="btn_change_seccode" title=""><i></i></a>
                    </div>
                    <p onclick="fleshVerify();" class="fl font-14">换一组</p>
                </div>
                <div class="formbox">
                    <input type="button" class="login-submit" onclick="checkLogin()" value="登 录">
                </div>
                <div class="clearfix">
                    <!-- <div class="formboxl fl ">
                    <input type="checkbox" class="loginimg">
                    <label for="" class="font-14">自动登陆</label>
                </div> -->
                    <div class="formboxr  fr">
                        <a href="javascript:void(0)" class="no_user">没有账号?</a>
                        <a href="javascript:void(0)" class="regNow">立即注册</a>
                    </div>
                </div>
                <!-- <div class="thirdparty">
                <p class="font-16">第三方登陆</p>
                <div class="thirdimg">
                    <img src="/public/assets/images/qq.png" alt="" class="imgqq">
                    <img src="/public/assets/images/wx.png" alt="">
                </div>
            </div> -->
            </div>
            <div class="regbox hidden">
                <p>扫一扫，注册必量家</p>
                <div class="regImg">
                    <img src="/public/assets/images/regimg.png" alt="">
                </div>
                <div class="loginrignt">
                    <a href="javascript:void(0)" class="no_user">已有账号?</a>
                    <a href="javascript:void(0)" class="loginNow">登录到必量家</a>
                </div>
            </div>
        </form>

        <!-- <form action="" class="register hidden">
            <div class="formbox usernamebox">
                <i class="formimg username"></i>
                <input type="text" name="username" id="username" autocomplete="off" placeholder="用户名/手机号">
            </div>
            <div class="formbox">
                <i class="formimg password"></i>
                <input name="password" type="password" id="password" autocomplete="off" class="text" placeholder="密码" />
            </div>
            <div class="formbox">
                <i class="formimg password"></i>
                <input name="password" type="password" id="password" autocomplete="off" class="text"
                    placeholder="再次密码" />
            </div>
            <div class="formbox clearfix ">
                <input type="text" autocomplete="off" class="text fl" style="width: 140px;" maxlength="4" size="10" />
                <a href="javascript:void(0)" class="getCode">获取验证码</a>

            </div>

            <div class="formbox">
                <input type="button" class="login-submit" value="立即注册">
            </div>


            <div class="thirdparty">
                <p class="font-16">第三方登陆</p>
                <div class="thirdimg">
                    <img src="/public/assets/images/qq.png" alt="" class="imgqq">
                    <img src="/public/assets/images/wx.png" alt="">
                </div>
            </div>
        </form> -->


    </div>
</body>
<script>

    function fleshVerify() {
        //重载验证码
        $('#imgVerify').attr('src', '/index.php?m=Seller&c=Admin&a=vertify&r=' + Math.floor(Math.random() * 100));
    }

    $(".loginimg").change(function () {
        var _this = $(this);
        var checkstatus = _this.prop("checked");
        if (checkstatus) {
            $(".loginimg").addClass("active")
        } else {
            $(".loginimg").removeClass("active")
        }
    });
    function checkLogin(){
        var username = $('#username').val();
        var password = $('#password').val();
        var vertify = $('input[name="vertify"]').val();
        if( username == '' || password ==''){
            layer.alert('用户名或密码不能为空', {icon: 2}); //alert('用户名或密码不能为空');
            return;
        }
        if(vertify ==''){
            layer.alert('验证码不能为空', {icon: 2});
            return;
        }
        if(vertify.length !=4){
            layer.alert('验证码错误', {icon: 2});
            fleshVerify();
            return;
        }
        $.ajax({
            url:'/index.php?m=Seller&c=Admin&a=loginNew_do&t='+Math.random(),
            type:'post',
            dataType:'json',
            data:{username:username,password:password,vertify:vertify},
            success:function(res){
                if(res.status==1){
                    top.location.href = res.url;
                }else{
                    layer.alert(res.msg, {icon: 2});
                    fleshVerify();
                }
            },
            error : function(XMLHttpRequest, textStatus, errorThrown) {
                layer.alert('网络失败，请刷新页面后重试', {icon: 2});
            }
        })
    }
    $(".regNow").on("click", function () {
        $(".regbox").removeClass("hidden")
        $(".logbox").addClass("hidden");
        
      
    })

    $(".loginNow").on("click", function () {
        $(".regbox").addClass("hidden")
        $(".logbox").removeClass("hidden")
        
    })

</script>

</html>