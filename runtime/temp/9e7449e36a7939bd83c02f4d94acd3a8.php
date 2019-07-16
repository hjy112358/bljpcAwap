<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:80:"E:\phpStudy\PHPTutorial\WWW\biliangjia/application/adminb\view\adminb\index.html";i:1563248364;}*/ ?>
<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="/application/adminb/view/assets/css/layui.css">
    <link rel="stylesheet" href="/application/adminb/view/assets/css/admin.css">
    <title>管理后台</title>
</head>

<body class="layui-layout-body">
    <div class="layui-layout layui-layout-admin">
        <div class="layui-header custom-header">

            <ul class="layui-nav layui-layout-left">
                <li class="layui-nav-item slide-sidebar" lay-unselect>
                    <a href="javascript:;" class="icon-font"><i class="ai ai-menufold"></i></a>
                </li>
            </ul>

            <ul class="layui-nav layui-layout-right">
                <li class="layui-nav-item">
                    <a href="javascript:;">BieJun</a>
                    <dl class="layui-nav-child">
                        <dd><a href="">帮助中心</a></dd>
                        <dd><a href="login.html">退出</a></dd>
                    </dl>
                </li>
            </ul>
        </div>

        <div class="layui-side custom-admin">
            <div class="layui-side-scroll">
                <ul id="Nav" class="layui-nav layui-nav-tree">
                    <li class="layui-nav-item">
                        <a href="javascript:;">
                            <i class="layui-icon">&#xe609;</i>
                            <em>主页</em>
                        </a>
                        <dl class="layui-nav-child">
                            <dd><a href="adminlist.html">列表</a></dd>
                            <dd><a href="adminForm.html">提交</a></dd>
                        </dl>
                    </li>

                </ul>

            </div>
        </div>

        <div class="layui-body">
            <div class="layui-tab app-container" lay-allowClose="true" lay-filter="tabs">
                <ul id="appTabs" class="layui-tab-title custom-tab"></ul>
                <div id="appTabPage" class="layui-tab-content"></div>
            </div>
        </div>



        <div class="mobile-mask"></div>
    </div>
    <script src="/application/adminb/view/assets/layui.js"></script>
    <script src="/application/adminb/view/assets/js/index.js"></script>
</body>

</html>