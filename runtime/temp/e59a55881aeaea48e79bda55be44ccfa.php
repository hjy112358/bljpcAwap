<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:87:"E:\phpStudy\PHPTutorial\WWW\biliangjia/application/ticket\view\ticket\CouponManage.html";i:1560239464;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="/application/ticket/view/assets/css/layui.css">
    <link rel="stylesheet" href="/application/ticket/view/assets/css/mypublic.css">
    <link rel="stylesheet" href="/application/ticket/view/assets/css/view.css" />
    <link rel="stylesheet" href="/application/ticket/view/assets/css/CouponMan/CouponMan.css" />
    <script src="/application/ticket/view/assets/js/echarts.js"></script>
    <script src="/application/ticket/view/assets/js/jquery-3.1.1.min.js"></script>
    <title></title>

</head>

<body class="layui-view-body">
    <div class="layui-content">
        <div class="layui-row ">
            <div class="conponlist">
                <div class="layui-tab">
                    <p class="">今日券流水</p>
                    <ul class="tabtitle layui-tab-title">
                        <li class="maincolor layui-this">Z券</li>
                        <li class="maincolor">余额券</li>
                        <li class="maincolor">万用券</li>
                        <li class="maincolor">注册券</li>
                        <li class="maincolor">挂售券</li>
                        <li class="maincolor">消费券</li>
                    </ul>
                    <div class="layui-tab-content">
                        <div class="layui-tab-item layui-show">
                            <div class="productmsglist">
                                <table id="allCouponZ" lay-filter="test"></table>
                            </div>

                        </div>
                        <div class="layui-tab-item">
                            <div class="productmsglist">
                                <table id="allCouponBalance" lay-filter="test"></table>
                            </div>
                        </div>
                        <div class="layui-tab-item">
                            <div class="productmsglist">
                                <table id="allCouponUtility" lay-filter="test"></table>
                            </div>
                        </div>
                        <div class="layui-tab-item">
                            <div class="productmsglist">
                                <table id="allCouponRegister" lay-filter="test"></table>
                            </div>
                        </div>
                        <div class="layui-tab-item">
                            <div class="productmsglist">
                                <table id="allCouponHang" lay-filter="test"></table>
                            </div>
                        </div>
                        <div class="layui-tab-item">
                            <div class="productmsglist">
                                <table id="allCoupoSale" lay-filter="test"></table>
                            </div>
                        </div>
                    

                    </div>
                </div>
            </div>


        </div>



    </div>

    <script src="/application/ticket/view/assets/layui.all.js"></script>
    <script src="/application/ticket/view/assets/js/TouchSlide.1.1.js"></script>


    <script>
        layui.use('table', function () {
            var table = layui.table;
            //Z券
            table.render({
                elem: '#allCouponZ'
                , even: true //开启隔行背景
                , data: <?php echo $zcoupon; ?>
                , page: true //开启分页
                , cols: [[ //表头
                    { field: 'user_id', title: 'ID', align: "center" }
                    , { field: 'mobile', title: '手机号', align: "center" }
                    , { field: 'nickname', title: '姓名', align: "center" }
                    , { field: 'ticket_change_number', title: '券变化量', align: "center" }
                    , { field: 'ticket_change_time', title: '变化时间', align: "center" }
                    , { field: 'ticket_change_type', title: '变化原因', align: "center" }

                ]]
            });

            //余额券
            table.render({
                elem: '#allCouponBalance'
                , even: true //开启隔行背景
                , data: <?php echo $yue; ?>
                , page: true //开启分页
                , cols: [[ //表头
                    { field: 'user_id', title: 'ID', align: "center" }
                    , { field: 'mobile', title: '手机号', align: "center" }
                    , { field: 'nickname', title: '姓名', align: "center" }
                    , { field: 'ticket_change_number', title: '券变化量', align: "center" }
                    , { field: 'ticket_change_time', title: '变化时间', align: "center" }
                    , { field: 'ticket_change_type', title: '变化原因', align: "center" }

                ]]
            });

            //万用券
            table.render({
                elem: '#allCouponUtility'
                , even: true //开启隔行背景
                , data: <?php echo $wanyong; ?>
                , page: true //开启分页
                , cols: [[ //表头
                    { field: 'user_id', title: 'ID', align: "center" }
                    , { field: 'mobile', title: '手机号', align: "center" }
                    , { field: 'nickname', title: '姓名', align: "center" }
                    , { field: 'ticket_change_number', title: '券变化量', align: "center" }
                    , { field: 'ticket_change_time', title: '变化时间', align: "center" }
                    , { field: 'ticket_change_type', title: '变化原因', align: "center" }

                ]]
            });


            //注册券
            table.render({
                elem: '#allCouponRegister'
                , even: true //开启隔行背景
                , data: <?php echo $zhuce; ?>
                , page: true //开启分页
                , cols: [[ //表头
                    { field: 'user_id', title: 'ID', align: "center" }
                    , { field: 'mobile', title: '手机号', align: "center" }
                    , { field: 'nickname', title: '姓名', align: "center" }
                    , { field: 'ticket_change_number', title: '券变化量', align: "center" }
                    , { field: 'ticket_change_time', title: '变化时间', align: "center" }
                    , { field: 'ticket_change_type', title: '变化原因', align: "center" }
                ]]
            });

            //挂售券
            table.render({
                elem: '#allCouponHang'
                , even: true //开启隔行背景
                , data: <?php echo $guashou; ?>
                , page: true //开启分页
                , cols: [[ //表头
                    { field: 'user_id', title: 'ID', align: "center" }
                    , { field: 'mobile', title: '手机号', align: "center" }
                    , { field: 'nickname', title: '姓名', align: "center" }
                    , { field: 'ticket_change_number', title: '券变化量', align: "center" }
                    , { field: 'ticket_change_time', title: '变化时间', align: "center" }
                    , { field: 'ticket_change_type', title: '变化原因', align: "center" }
                ]]
            });


            //消费券
            table.render({
                elem: '#allCoupoSale'
                , even: true //开启隔行背景
                , data: <?php echo $xiaofei; ?>
                , page: true //开启分页
                , cols: [[ //表头
                    { field: 'user_id', title: 'ID', align: "center" }
                    , { field: 'mobile', title: '手机号', align: "center" }
                    , { field: 'nickname', title: '姓名', align: "center" }
                    , { field: 'ticket_change_number', title: '券变化量', align: "center" }
                    , { field: 'ticket_change_time', title: '变化时间', align: "center" }
                    , { field: 'ticket_change_type', title: '变化原因', align: "center" }
                ]]
            });


        });



        $(function () {
            var element = layui.element;
            TouchSlide({ slideCell: "#addmodule" });
            $(".addModule").on("click", function () {
                $(".addmoduleWrap").removeClass("hidden");
                $(".addtitle").val("");
                $(".addContent").val("");

            })

            $(".cancel").on("click", function () {
                $(".addmoduleWrap").addClass("hidden");
                $(".addtitle").val("");
                $(".addContent").val("");
            })


            $(".sure").on("click", function () {
                var name = $(".addtitle").val();
                $(".modulelist .addModule").before('<li>' + name + '</li>')
                $(".addmoduleWrap").addClass("hidden");
                $(".addtitle").val("");
                $(".addContent").val("");
            })
        })
    </script>
</body>

</html>