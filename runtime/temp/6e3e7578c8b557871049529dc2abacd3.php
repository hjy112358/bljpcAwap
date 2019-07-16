<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:83:"E:\phpStudy\PHPTutorial\WWW\biliangjia/application/ticket\view\ticket\recharge.html";i:1560157589;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="/application/ticket/view/assets/css/layui.css">
    <link rel="stylesheet" href="/application/ticket/view/assets/css/mypublic.css">
    <link rel="stylesheet" href="/application/ticket/view/assets/css/view.css" />
    <link rel="stylesheet" href="/application/ticket/view/assets/css/CouponMan/CouponMan.css" />
    <link rel="stylesheet" href="/application/ticket/view/assets/iconfont/iconfont.css">
    <script src="/application/ticket/view/assets/js/echarts.js"></script>
    <script src="/application/ticket/view/assets/js/jquery-3.1.1.min.js"></script>
    <title>券充值</title>

</head>

<body class="layui-view-body">
    <div class="layui-content">
        <div class="layui-row ">
            <div class="conponlist" style="padding-top:0">
                <div class="layui-tab">
                    <div class="layui-tab-content">
                        <div class="layui-tab-item layui-show">

                            <div class="searchCris">
                                <div class="cris layui-form">
                                    <div class="layui-form-item">
                                        <div class="layui-block" style="margin-right:0">
                                            <label class="layui-form-label">券类型</label>
                                            <div class="layui-input-inline">
                                                <select class="conpons" lay-search="conpons">
                                                    <option value="">全部</option>
                                                    <option value="0">Z券</option>
                                                    <option value="1">余额券</option>
                                                    <option value="2">万用券</option>
                                                    <option value="3">注册券</option>
                                                    <option value="4">挂售券</option>
                                                    <option value="5">消费券</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="layui-form-item">
                                        <div class="layui-block" style="margin-right:0">
                                            <label class="layui-form-label">手机号</label>
                                            <div class="layui-input-inline">
                                                <input type="number" name="phone" id="mobile" autocomplete="off" class="layui-input">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="layui-form-item">
                                        <div class="layui-block" style="margin-right:0">
                                            <label class="layui-form-label">用户名</label>
                                            <div class="layui-input-inline">
                                                <input type="text"  class="layui-input" readonly >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="layui-form-item">
                                        <div class="layui-block" style="margin-right:0">
                                            <label class="layui-form-label">充值金额</label>
                                            <div class="layui-input-inline">
                                                <input type="number"  autocomplete="off" class="layui-input">
                                            </div>
                                        </div>
                                    </div>
                                    <a href="javascipt:void(0)" class="rechargebtn">确定</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="/application/ticket/view/assets/layui.all.js"></script>

</body>

</html>