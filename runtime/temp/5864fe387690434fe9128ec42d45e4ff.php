<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:83:"E:\phpStudy\PHPTutorial\WWW\biliangjia/application/ticket\view\ticket\transfer.html";i:1562052819;}*/ ?>
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
    <title>转账查询</title>

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

                                        <div class="layui-inline">
                                            <label class="layui-form-label">转账类型</label>
                                            <div class="layui-input-inline">
                                                <select class="" lay-search="">
                                                    <option value="">全部</option>
                                                    <option value="0">转入</option>
                                                    <option value="1">转出</option>

                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="layui-form-item">

                                        <div class="layui-inline">
                                            <label class="layui-form-label">手机号</label>
                                            <div class="layui-input-inline">
                                                <input type="number" name="phone" id="mobile" autocomplete="off"
                                                    class="layui-input">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="layui-form-item">
                                        <div class="layui-inline">
                                            <label class="layui-form-label">用户名</label>
                                            <div class="layui-input-inline">
                                                <input type="text" name="" id="nickname" autocomplete="off"
                                                    class="layui-input">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="layui-form-item">
                                        <div class="layui-inline">
                                            <label class="layui-form-label">时间</label>
                                            <div class="layui-input-inline">
                                                <input type="text" class="layui-input" id="test6" placeholder=" - ">
                                            </div>
                                        </div>


                                    </div>
                                    <div class="layui-form-item">
                                        <div class="layui-inline">
                                            <label class="layui-form-label">金额</label>
                                            <div class="layui-input-inline" style="width: 100px;">
                                                <input type="text" id="ltnumber" name="price_min" placeholder="￥"
                                                    autocomplete="off" class="layui-input">
                                            </div>
                                            <div class="layui-form-mid">-</div>
                                            <div class="layui-input-inline" style="width: 100px;">
                                                <input type="text" id="gtnumber" name="price_max" placeholder="￥"
                                                    autocomplete="off" class="layui-input">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="searchwrap">
                                    <a href="javascript:void(0)" class="searchbtn">搜索</a>
                                </div>
                                <div class="layui-tab-item">
                                    <div class="productmsglist">
                                        <table id="searchlist" lay-filter="search"></table>
                                    </div>
                                </div>
                            </div>

                            <div class="productmsglist">
                                <table id="allCoupon" lay-filter="test"></table>
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
        function search(search) {
            layui.use('table', function () {
                var table = layui.table;

                table.render({
                    elem: '#allCoupon'
                    , even: true //开启隔行背景
                    , page: true //开启分页
                    , data: search
                    , cols: [[ //表头
                        { field: '', title: '手机号', align: "center" }
                        , { field: '', title: '时间', align: "center" }
                        , { field: '', title: '金额', align: "center" }

                    ]]
                });
            });
        }

        layui.use('table', function () {
            var laydate = layui.laydate;

            //日期范围
            laydate.render({
                elem: '#test6'
                , range: true
            });



            $(".searchbtn").on("click", function () {
                var mobile = $('#mobile').val();
                var nickname = $('#nickname').val();
                var date = $('#test6').val();
                var ltnumber = $('#ltnumber').val();
                var gtnumber = $('#gtnumber').val();
                $.ajax({
                    url: "<?php echo U('ticket/transfer'); ?>",
                    data: { ltnumber: ltnumber, gtnumber: gtnumber, date: date, mobile: mobile, nickname: nickname },
                    type: "POST",
                    success: function (res) {
                        alert(res);
                        // console.log(res)
                        // var resnew=JSON.parse(res)
                        // if (conpunsearch == 0) {
                        //     search0(resnew);
                        // }
                        // if (conpunsearch == 1) {
                        //     search1(resnew);
                        // }
                    }
                })

            })

        });



    </script>
</body>

</html>