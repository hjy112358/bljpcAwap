<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:80:"E:\phpStudy\PHPTutorial\WWW\biliangjia/application/ticket\view\ticket\index.html";i:1562032783;}*/ ?>
<!DOCTYPE>
<html lang="zh-CN">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="/application/ticket/view/assets/css/layui.css">
    <link rel="stylesheet" href="/application/ticket/view/assets/css/admin.css">
    <link rel="stylesheet" href="/application/ticket/view/assets/iconfont/iconfont.css">
    <link rel="stylesheet" href="/application/ticket/view/assets/css/mypublic.css">
    <link rel="icon" href="/favicon.ico">
    <title>管理后台</title>
    <style>
        .icon-xin {
            color: #fff
        }

        .layui-nav-itemed .icon-xin , .layui-nav-itemed .icon-3{
            color: #ff4c4c
        }
    </style>
</head>

<body class="layui-layout-body">
    <div class="layui-layout layui-layout-admin">
        <div class="layui-header custom-header">

            <ul class="layui-nav layui-layout-left">
                <li class="layui-nav-item slide-sidebar" lay-unselect>
                    <a href="javascript:" class="icon-font"><i class="ai ai-menufold"></i></a>
                </li>
            </ul>

            <div class="layui-nav layui-layout-right clearfix">
                <div class="userName maincolor font-14 fl">您好,管理员！</div>
                <img src="/application/ticket/view/assets/images/loginOut.png" alt="" width="25" height="26" class="loginOut fl">
            </div>
        </div>

        <div class="layui-side custom-admin">
            <div class="layui-side-scroll">

                <div class="custom-logo">
                    <!-- <img src="assets/images/logo.png" alt=""/>
                    <h1>Admin Pro</h1> -->
                </div>
                <ul id="Nav" class="layui-nav layui-nav-tree">
                    <!-- 三级 -->
                    <!-- <li class="layui-nav-item">
                        <a href="javascript:;">
                            <i class="layui-icon">&#xe857;</i>
                            <em>组件</em>
                        </a>
                        <dl class="layui-nav-child">
                            <dd><a href="views/form.html">表单</a></dd>
                            <dd>
                                <a href="javascript:;">页面</a>
                                <dl class="layui-nav-child">
                                    <dd>
                                        <a href="login.html">登录页</a>
                                    </dd>
                                </dl>
                            </dd>
                        </dl>
                    </li> -->
<!--                    <li class="layui-nav-item">-->
<!--                        <a href="javascript:">-->
<!--                            <i class="layui-icon">-->
<!--                                <img src="/application/ticket/view/assets/images/commodity.png" alt="">-->
<!--                            </i>-->
<!--                            <em>商品管理</em>-->
<!--                        </a>-->

<!--                    </li>-->
                    <li class="layui-nav-item">
                        <a href="javascript:;">
                            <i class="iconfont icon-xin">
                                <!-- <img src="/application/ticket/view/assets/images/ticket.png" alt="">
                                <p class="iconfont icon-xin"></p> -->
                            </i>
                            <em>券管理</em>
                        </a>
                        <dl class="layui-nav-child">
                            <dd><a href="<?php echo U('ticket/CouponManage'); ?>">券流水</a></dd>
                            <dd><a href="<?php echo U('ticket/console'); ?>">券量</a></dd>
                            <dd><a href="<?php echo U('ticket/form'); ?>">券价</a></dd>
                            <dd><a href="<?php echo U('ticket/couponList'); ?>">用户券列表</a></dd>
                            <dd><a href="<?php echo U('ticket/couponSearchList'); ?>">搜索</a></dd>
                            <dd><a href="<?php echo U('ticket/transfer'); ?>">转账查询</a></dd>
                        </dl>
                    </li>
                    <li class="layui-nav-item">
                        <a href="javascript:;">
                            <i class="iconfont icon-3">
                                <!-- <img src="/application/ticket/view/assets/images/ticket.png" alt="">
                                <p class="iconfont icon-xin"></p> -->
                            </i>
                            <em>后台充值</em>
                        </a>
                        <dl class="layui-nav-child">
                            <dd><a href="<?php echo U('ticket/recharge'); ?>">券充值</a></dd>
                            <dd><a href="<?php echo U('ticket/rechargedetail'); ?>">券充值明细</a></dd>
                        </dl>
                    </li>

                    <!--                    <li class="layui-nav-item">-->
                    <!--                        <a href="javascript:">-->
                    <!--                            <i class="layui-icon">-->
                    <!--                                <img src="/application/ticket/view/assets/images/logistics.png" alt="">-->
                    <!--                            </i>-->
                    <!--                            <em>物流管理</em>-->
                    <!--                        </a>-->
                    <!--                    </li>-->
                    <!--                    <li class="layui-nav-item">-->
                    <!--                        <a href="javascript:">-->
                    <!--                            <i class="layui-icon">-->
                    <!--                                <img src="/application/ticket/view/assets/images/install.png" alt="">-->
                    <!--                            </i>-->
                    <!--                            <em>安装管理</em>-->
                    <!--                        </a>-->
                    <!--                    </li>-->
                    <!--                    <li class="layui-nav-item">-->
                    <!--                        <a href="javascript:">-->
                    <!--                            <i class="layui-icon">-->
                    <!--                                <img src="/application/ticket/view/assets/images/finance.png" alt="">-->
                    <!--                            </i>-->
                    <!--                            <em>财务管理</em>-->
                    <!--                        </a>-->
                    <!--                    </li>-->
                    <!--                    <li class="layui-nav-item">-->
                    <!--                        <a href="javascript;">-->
                    <!--                            <i class="layui-icon">-->
                    <!--                                <img src="/application/ticket/view/assets/images/statement.png" alt="">-->
                    <!--                            </i>-->
                    <!--                            <em>报表管理</em>-->
                    <!--                        </a>-->
                    <!--                    </li>-->
                    <!--                    <li class="layui-nav-item">-->
                    <!--                        <a href="javascript;">-->
                    <!--                            <i class="layui-icon">-->
                    <!--                                <img src="/application/ticket/view/assets/images/set.png" alt="">-->
                    <!--                            </i>-->
                    <!--                            <em>系统设置</em>-->
                    <!--                        </a>-->
                    <!--                        <dl class="layui-nav-child">-->
                    <!--                            <dd><a href="approve.html">卖家申请中心</a></dd>-->
                    <!--                          -->
                    <!--                        </dl>-->
                    <!--                    </li>-->
                </ul>
            </div>
        </div>

        <div class="layui-body">
            <div class="layui-tab app-container" lay-allowClose="true" lay-filter="tabs">
                <ul id="appTabs" class="layui-tab-title custom-tab"></ul>
                <div id="appTabPage" class="layui-tab-content"></div>
            </div>
        </div>

        <div class="layui-footer">
        </div>

        <div class="mobile-mask"></div>
    </div>
    <script src="/application/ticket/view/assets/layui.js"></script>
    <script src="/application/ticket/view/assets/js/index.js"></script>
</body>

</html>