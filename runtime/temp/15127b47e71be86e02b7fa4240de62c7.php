<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:84:"E:\phpStudy\PHPTutorial\WWW\biliangjia/application/adminb\view\adminb\adminForm.html";i:1563262875;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="/application/adminb/view/assets/css/layui.css">
    <link rel="stylesheet" href="/application/adminb/view/assets/css/view.css" />
    <link rel="stylesheet" href="/application/adminb/view/assets/css/style.css" />
    <script src="/application/adminb/view/assets/js/jquery-3.1.1.min.js"></script>
    <title>提交</title>

</head>

<body class="layui-view-body">
    <div class="layui-content">
        <div class="layui-row ">
            <div class="conponlist" style="padding-top:0">
                <div class="layui-tab">
                    <div class="layui-tab-content">
                        <div class="layui-tab-item layui-show">
                            <form class="layui-form" action="">
                                <div class="layui-form-item">
                                    <div class="layui-inline">
                                        <label class="layui-form-label">验证手机</label>
                                        <div class="layui-input-inline">
                                            <input type="tel" name="phone" lay-verify="required|phone"
                                                autocomplete="off" class="layui-input">
                                        </div>
                                    </div>
                                    <div class="layui-inline">
                                        <label class="layui-form-label">验证邮箱</label>
                                        <div class="layui-input-inline">
                                            <input type="text" name="email" lay-verify="email" autocomplete="off"
                                                class="layui-input">
                                        </div>
                                    </div>
                                </div>

                                <div class="layui-form-item">
                                    <div class="layui-inline">
                                        <label class="layui-form-label">数字</label>
                                        <div class="layui-input-inline">
                                            <input type="text" name="text" lay-verify="required|number"
                                                autocomplete="off" class="layui-input">
                                        </div>
                                    </div>
                                    <div class="layui-inline">
                                        <label class="layui-form-label">验证日期</label>
                                        <div class="layui-input-inline">
                                            <input type="text" name="date" id="date" lay-verify="date"
                                                placeholder="yyyy-MM-dd" autocomplete="off" class="layui-input">
                                        </div>
                                    </div>

                                </div>

                                <div class="layui-form-item">
                                    <label class="layui-form-label">联动选择框</label>
                                    <div class="layui-input-inline">
                                        <select name="quiz1">
                                            <option value="">请选择省</option>
                                            <option value="浙江" selected="">浙江省</option>
                                            <option value="你的工号">江西省</option>
                                            <option value="你最喜欢的老师">福建省</option>
                                        </select>
                                    </div>
                                    <div class="layui-input-inline">
                                        <select name="quiz2">
                                            <option value="">请选择市</option>
                                            <option value="杭州">杭州</option>
                                            <option value="宁波" disabled="">宁波</option>
                                            <option value="温州">温州</option>
                                            <option value="温州">台州</option>
                                            <option value="温州">绍兴</option>
                                        </select>
                                    </div>
                                    <div class="layui-input-inline">
                                        <select name="quiz3">
                                            <option value="">请选择县/区</option>
                                            <option value="西湖区">西湖区</option>
                                            <option value="余杭区">余杭区</option>
                                            <option value="拱墅区">临安市</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="layui-form-item">
                                    <label class="layui-form-label">自定义验证</label>
                                    <div class="layui-input-inline">
                                        <input type="password" name="password" lay-verify="pass" placeholder="请输入密码"
                                            autocomplete="off" class="layui-input">
                                    </div>
                                    <div class="layui-form-mid layui-word-aux">请填写6到12位密码</div>
                                </div>

                                <div class="layui-form-item">
                                    <label class="layui-form-label">单选框</label>
                                    <div class="layui-input-block">
                                        <input type="radio" name="sel" value="1" title="1" checked="">
                                        <input type="radio" name="sel" value="1" title="1">

                                    </div>
                                </div>
                                <div class="layui-form-item layui-form-text">
                                    <label class="layui-form-label">普通文本域</label>
                                    <div class="layui-input-block">
                                        <textarea placeholder="请输入内容" class="layui-textarea"></textarea>
                                    </div>
                                </div>
                                <div class="layui-upload">
                                    <button type="button" class="layui-btn" id="test1">上传图片</button>
                                    <div class="layui-upload-list">
                                        <img class="layui-upload-img" id="demo1">
                                    </div>
                                </div>

                                <div class="layui-form-item">
                                    <div class="layui-input-block">
                                        <button class="layui-btn" lay-submit="" lay-filter="demo1">立即提交</button>
                                        <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="/application/ticket/view/assets/layui.all.js"></script>
    <script>
        layui.use(['form', 'layedit', 'laydate'], function () {
            var form = layui.form
                , layer = layui.layer
                , layedit = layui.layedit
                , upload = layui.upload
                , laydate = layui.laydate;

            //日期
            laydate.render({
                elem: '#date'
            });


            //自定义验证规则
            form.verify({
                title: function (value) {
                    if (value.length < 5) {
                        return '标题至少得5个字符啊';
                    }
                }
                , pass: [
                    /^[\S]{6,12}$/
                    , '密码必须6到12位，且不能出现空格'
                ]
                , content: function (value) {
                    layedit.sync(editIndex);
                }
            });

            //监听指定开关
            form.on('switch(switchTest)', function (data) {
                layer.msg('开关checked：' + (this.checked ? 'true' : 'false'), {
                    offset: '6px'
                });
                layer.tips('温馨提示：请注意开关状态的文字可以随意定义，而不仅仅是ON|OFF', data.othis)
            });

            var uploadInst = upload.render({
                elem: '#test1'
                , url: '/upload/'
                , before: function (obj) {
                    //预读本地文件示例，不支持ie8
                    obj.preview(function (index, file, result) {
                        console.log(file)
                        $('#demo1').attr('src', result); //图片链接（base64）
                    });
                }
                , done: function (res) {
                    //如果上传失败
                    if (res.code > 0) {
                        return layer.msg('上传失败');
                    }
                    //上传成功
                }
                , error: function () {
                   
                }
            });

            //监听提交
            form.on('submit(demo1)', function (data) {
                layer.alert(JSON.stringify(data.field), {
                    title: '最终的提交信息'
                })
                return false;
            });


        });
    </script>
</body>

</html>