<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:79:"E:\phpStudy\PHPTutorial\WWW\biliangjia/application/ticket\view\ticket\form.html";i:1560160521;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="/application/ticket/view/assets/css/layui.css">
    <link rel="stylesheet" href="/application/ticket/view/assets/css/view.css"/>
    <link rel="stylesheet" href="/application/ticket/view/assets/css/CouponMan/CouponMan.css" />
    <title></title>
    <style>
        #submit{
            background:#ff4c4c
        }
    </style>
</head>
<body class="layui-view-body">
    <div class="layui-content">
        <div class="layui-row">

            <div class="layui-card conponlist">
                <div class="layui-tab-item layui-show">
                    <div class="productmsglist">
                        <table id="allCouponZ" lay-filter="test"></table>
                    </div>
                </div>
                <div class="layui-card-header" style="margin-bottom:15px">修改券价</div>
                  <div class="layui-form-item">
                    <label class="layui-form-label">券价</label>
                    <div class="layui-input-inline">
                      <input type="text" placeholder="" id="price" autocomplete="off" value="<?php echo $now; ?>" class="layui-input">
                    </div>
                  </div>
                  <div class="layui-form-item">
                    <label class="layui-form-label">密码</label>
                    <div class="layui-input-inline">
                      <input type="password" name="password" id="password" placeholder="请输入密码" class="layui-input">
                    </div>
                    <div class="layui-form-mid layui-word-aux"></div>
                  </div>

                  <div class="layui-form-item">
                    <div class="layui-input-block">
                      <button class="layui-btn " id="submit" >立即提交</button>
                      <!-- <button type="reset" class="layui-btn layui-btn-primary">重置</button> -->
                    </div>
                  </div>
            </div>
        </div>
    </div>
    <script src="/application/ticket/view/assets/layui.all.js"></script>
    <script src="/public/js/jquery-1.10.2.min.js"></script>
    <script>
        $('#submit').click(function () {
            var price = $('#price').val();
            var pwd   = $('#password').val();
            var patt1 = /^\d+$/;
            var patt2 = /^\d+\.\d+$/;

            if (!(patt1.test(price)||patt2.test(price))) {
                alert("券价格式错误");
                return false
            }
            if (pwd == ''){
                alert('请输入密码');
                return false
            }

            $.ajax({
                url:"<?php echo U('ticket/form_do'); ?>",
                data:{price:price,pwd:pwd},
                type:"POST",
                success:function(res){
                    if (res==1) {
                        alert('修改成功');
                    }
                    if (res==2) {
                        alert('密码错误');
                    }
                    if (res==3){
                        alert('请注意规范');
                    }
                },
                error:function () {
                    alert(1);
                }
            })
        })



        layui.use('table', function () {
            var table = layui.table;
            table.render({
                elem: '#allCouponZ'
                , even: true //开启隔行背景
                , data: <?php echo $ticket_price_change; ?>
                , page: true //开启分页
                , cols: [[ //表头
                    { field: 'ticket_price_id', title: '券价ID', align: "center" },
                    { field: 'ticket_price', title: '券价', align: "center" },
                    { field: 'ticket_price_change_time', title: '变化时间', align: "center" }
                      
                ]]
            });

            
        });
    </script>
</body>
</html>