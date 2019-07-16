<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:84:"E:\phpStudy\PHPTutorial\WWW\biliangjia/application/adminb\view\adminb\adminlist.html";i:1563260253;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="/application/adminb/view/assets/css/layui.css">
    <link rel="stylesheet" href="/application/adminb/view/assets/css/view.css" />
    <link rel="stylesheet" href="/application/adminb/view/assets/css/style.css" />
    <script src="/application/adminb/view/assets/js/jquery-3.1.1.min.js"></script>
    <title>列表</title>

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
                                            <label class="layui-form-label">类型</label>
                                            <div class="layui-input-inline">
                                                <select class="" lay-search="">
                                                    <option value="">全部</option>
                                                    <option value="0">类型1</option>
                                                    <option value="1">类型2</option>
                                                </select>
                                            </div>
                                        </div>
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
                                        <div class="layui-inline">
                                            <label class="layui-form-label">时间范围</label>
                                            <div class="layui-input-inline">
                                                <input type="text" class="layui-input" id="test6" placeholder=" - ">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="layui-form-item">
                                        <div class="layui-inline">
                                            <label class="layui-form-label">金额范围</label>
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
                        { field: 'phone', title: '手机号', align: "center" }
                        , { field: 'time', title: '时间', align: "center" }
                        , { field: 'money', title: '金额', align: "center" }
                        , { field: 'img', title: '图片', align: "center",templet:function(d){
                            console.log(d.img)
                            return '<img src="'+d.img+'" alt="">'
                        } }

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


        });


        $(function(){
            $(".searchbtn").on("click",function(){
                var data=[{phone:'123',time:'2019-02-19',money:'123',img:'http://2019-05-31.oss-cn-shanghai.aliyuncs.com/59ffc3a53170ce3cbdbef990cf7175d7bd0a94fc.jpeg'},{phone:"1444",time:'2019-02-29',money:'12223',img:'http://2019-05-31.oss-cn-shanghai.aliyuncs.com/50832360d7f5747bb5aab596671b3515b9994fb4.jpeg'}]
                search(data)
            })

        })

    </script>
</body>

</html>