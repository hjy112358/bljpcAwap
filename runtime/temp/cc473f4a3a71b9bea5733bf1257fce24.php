<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:80:"E:\phpStudy\PHPTutorial\WWW\biliangjia/application/ticket\view\ticket\login.html";i:1560072353;}*/ ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="/application/ticket/view/assets/css/layui.css">
    <link rel="stylesheet" href="/application/ticket/view/assets/css/login.css">
    <link rel="icon" href="/favicon.ico">
    <title>管理后台</title>
</head>
<body class="login-wrap">
    <div class="login-container">
        <form class="login-form">
            <div class="input-group">
                <input type="text" id="username" class="input-field">
                <label for="username" class="input-label">
                    <span class="label-title">用户名</span>
                </label>
            </div>
            <div class="input-group">
                <input type="password" id="password" class="input-field">
                <label for="password" class="input-label">
                    <span class="label-title">密码</span>
                </label>
            </div>
            <button type="button" id="submit" class="login-button">登录<i class="ai ai-enter"></i></button>
        </form>
    </div>
</body>
<script src="/application/ticket/view/assets/layui.js"></script>
<script src="/application/ticket/view/assets/js/index.js"></script>
<script src="/application/ticket/view/assets/js/login.js" data-main="login"></script>
<script src="/public/js/jquery-1.10.2.min.js"></script>
<script>
    $('#submit').click(function () {
        var username = $('#username').val();
        var password = $('#password').val();
        if (username == ''){
            alert('请输入用户名');
            return false;
        }
        if (password == ''){
            alert('请输入密码');
            return false;
        }
        $.ajax({
            url:"<?php echo U('ticket/login_do'); ?>",
            data:{username:username,password:password},
            type:"POST",
            success:function(res){
                if (res==1) {
                    alert('登录成功');
                    window.location.href='<?php echo U("ticket/index"); ?>';
                }
                if (res==2) {
                    alert('密码错误');
                    return false;
                }
                if (res==3) {
                    alert('用户不存在');
                    return false;
                }
                if (res==4) {
                    alert('提交出错');
                    return false;
                }
            },
            error:function () {
                alert('网络错误');
            }
        })
    })
</script>
</html>