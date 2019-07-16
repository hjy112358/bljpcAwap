<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:80:"E:\phpStudy\PHPTutorial\WWW\biliangjia/application/adminb\view\adminb\login.html";i:1563246576;}*/ ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="/application/adminb/view/assets/css/layui.css">
    <link rel="stylesheet" href="/application/adminb/view/assets/css/login.css">
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
            <button type="button" class="login-button">登录<i class="ai ai-enter"></i></button>
        </form>
    </div>
</body>
<script src="/application/adminb/view/assets/layui.js"></script>
<script src="/application/adminb/view/assets/js/login.js" ></script>
</html>