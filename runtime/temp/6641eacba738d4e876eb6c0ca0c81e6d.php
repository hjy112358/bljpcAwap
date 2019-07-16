<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:89:"E:\phpStudy\PHPTutorial\WWW\biliangjia/application/ticket\view\ticket\rechargedetail.html";i:1560158112;}*/ ?>
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
    <title>搜索</title>

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
                                        <div class="layui-inline" style="margin-right:0">
                                            <label class="layui-form-label">券</label>
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
                                        <div class="layui-inline">
                                            <label class="layui-form-label">时间</label>
                                            <div class="layui-input-inline">
                                                <input type="text" class="layui-input" id="test6" placeholder=" - ">
                                            </div>
                                        </div>
                                       
                                    </div>
                                    <div class="layui-form-item">
                                        <div class="layui-inline" style="margin-right:0">
                                            <label class="layui-form-label">操作对象</label>
                                            <div class="layui-input-inline">
                                                <input type="text" name="" id="" autocomplete="off" class="layui-input">
                                            </div>
                                        </div>
                                      
                                        <div class="layui-inline" style="margin-right:0">
                                            <label class="layui-form-label">手机号</label>
                                            <div class="layui-input-inline">
                                                <input type="number" name="phone" id="mobile" autocomplete="off" class="layui-input">
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
        function search0(search){
            layui.use('table', function () {
                var table = layui.table;

                table.render({
                    elem: '#allCoupon'
                    , even: true //开启隔行背景
                    , page: true //开启分页
                    , data: search
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
        }
        
        layui.use('table', function () {
            var laydate = layui.laydate;

            //日期范围
            laydate.render({
                elem: '#test6'
                , range: true
            });


    
            $(".searchbtn").on("click",function(){
                // 券
                var contype  = $(".conpons option:selected").val()
              

            })

        });



    </script>
</body>

</html>