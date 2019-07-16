<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:46:"./application/admin/view2/partner\addimgs.html";i:1559094373;s:44:"./application/admin/view2/public\layout.html";i:1491382650;}*/ ?>
<!doctype html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<!-- Apple devices fullscreen -->
<meta name="apple-mobile-web-app-capable" content="yes">
<!-- Apple devices fullscreen -->
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<link href="__PUBLIC__/static/css/main.css" rel="stylesheet" type="text/css">
<link href="__PUBLIC__/static/css/page.css" rel="stylesheet" type="text/css">
<link href="__PUBLIC__/static/font/css/font-awesome.min.css" rel="stylesheet" />
<!--[if IE 7]>
  <link rel="stylesheet" href="__PUBLIC__/static/font/css/font-awesome-ie7.min.css">
<![endif]-->
<link href="__PUBLIC__/static/js/jquery-ui/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
<link href="__PUBLIC__/static/js/perfect-scrollbar.min.css" rel="stylesheet" type="text/css"/>
<style type="text/css">html, body { overflow: visible;}</style>
<script type="text/javascript" src="__PUBLIC__/static/js/jquery.js"></script>
<script type="text/javascript" src="__PUBLIC__/static/js/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/static/js/layer/layer.js"></script><!-- 弹窗js 参考文档 http://layer.layui.com/-->
<script type="text/javascript" src="__PUBLIC__/static/js/admin.js"></script>
<script type="text/javascript" src="__PUBLIC__/static/js/flexigrid.js"></script>
<script type="text/javascript" src="__PUBLIC__/static/js/jquery.validation.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/static/js/perfect-scrollbar.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/static/js/jquery.mousewheel.js"></script>
<script src="__PUBLIC__/js/myFormValidate.js"></script>
<script src="__PUBLIC__/js/myAjax2.js"></script>
<script src="__PUBLIC__/js/global.js"></script>
<script type="text/javascript">
function delfunc(obj){
	layer.confirm('确认删除？', {
		  btn: ['确定','取消'] //按钮
		}, function(){
			$.ajax({
				type : 'post',
				url : $(obj).attr('data-url'),
				data : {act:'del',del_id:$(obj).attr('data-id')},
				dataType : 'json',
				success : function(data){
					if(data==1){
						layer.msg('操作成功', {icon: 1});
						$(obj).parent().parent().parent().remove();
					}else{
						layer.msg(data, {icon: 2,time: 2000});
					}
				}
			})
		}, function(index){
			layer.close(index);
			return false;// 取消
		}
	);
}

function delAll(obj,name){
	var a = [];
	$('input[name*='+name+']').each(function(i,o){
		if($(o).is(':checked')){
			a.push($(o).val());
		}
	})
	if(a.length == 0){
		layer.alert('请选择删除项', {icon: 2});
		return;
	}
	layer.confirm('确认删除？', {btn: ['确定','取消'] }, function(){
			$.ajax({
				type : 'get',
				url : $(obj).attr('data-url'),
				data : {act:'del',del_id:a},
				dataType : 'json',
				success : function(data){
					if(data == 1){
						layer.msg('操作成功', {icon: 1});
						$('input[name*='+name+']').each(function(i,o){
							if($(o).is(':checked')){
								$(o).parent().parent().remove();
							}
						})
					}else{
						layer.msg(data, {icon: 2,time: 2000});
					}
					layer.closeAll();
				}
			})
		}, function(index){
			layer.close(index);
			return false;// 取消
		}
	);	
}

//表格列表全选反选
$(document).ready(function(){
	$('.hDivBox .sign').click(function(){
	    var sign = $('#flexigrid > table>tbody>tr');
	   if($(this).parent().hasClass('trSelected')){
	       sign.each(function(){
	           $(this).removeClass('trSelected');
	       });
	       $(this).parent().removeClass('trSelected');
	   }else{
	       sign.each(function(){
	           $(this).addClass('trSelected');
	       });
	       $(this).parent().addClass('trSelected');
	   }
	})
});

//获取选中项
function getSelected(){
	var selectobj = $('.trSelected');
	var selectval = [];
    if(selectobj.length > 0){
        selectobj.each(function(){
        	selectval.push($(this).attr('data-id'));
        });
    }
    return selectval;
}
</script>
</head>
<link rel="stylesheet" href="/public/assets/css/layui.css" type="text/css">
<script src="/public/assets/js/jquery-3.1.1.min.js" type="text/javascript"></script>
<script src="/public/assets/layui.all.js" type="text/javascript"></script>
<script src="/public/assets/js/TouchSlide.1.1.js" type="text/javascript"></script>
<style>
    .layui-upload .mark_button {
        position: absolute;
        right: 15px;
    }

    .upload-img {
        position: relative;
        display: inline-block;
        width: 300px;
        height: 200px;
        margin: 0 10px 10px 0;
        transition: box-shadow .25s;
        border-radius: 4px;
        box-shadow: 0px 10px 10px -5px rgba(0, 0, 0, 0.1);
        transition: 0.25s;
        -webkit-transition: 0.25s;
        margin-top: 15px;
        overflow: hidden;
        position: relative;
    }

    .layui-upload-img {
        max-width: 100%;
        border-radius: 4px;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%)
    }

    .upload-img input {
        position: absolute;
        left: 0px;
        top: 0px;
        z-index: 999;
    }

    .upload-img button {
        position: absolute;
        right: 0px;
        top: 0px;
        border-radius: 6px;
    }
</style>

<body style="background-color: #FFF; overflow: auto;">
    <div class="page">
        <div class="fixed-bar">
            <div class="item-title"><a class="back" href="javascript:history.back();" title="返回列表"><i
                        class="fa fa-arrow-circle-o-left"></i></a>
                <div class="subject">
                    <h3>商品图片</h3>
                    <h5>上传商品图片</h5>
                </div>
            </div>
        </div>
        <!--表单数据-->
        <form method="post" id="" enctype="multipart/form-data">
            <div class="layui-upload ">
                <blockquote class="layui-elem-quote layui-quote-nm" style="margin-top: 10px;">
                    预览图：
                    <div class="layui-upload-list" id="imgs">
                    </div>
                </blockquote>
                <div class="mark_button">
                    <button type="button" class="layui-btn layui-btn-normal" id="sele_imgs">选择文件</button>
                    <button type="button" class="layui-btn" id="upload_imgs" disabled>开始上传</button>
                    <button type="button" class="layui-btn layui-btn-danger" id="dele_imgs">删除选中图片</button>
                </div>

            </div>
        </form>
    </div>


    <script id="img_template" type="text/html">
        <div class="upload-img" filename="{{ d.index }}">
            <input type="checkbox" name="" lay-skin="primary">
            <img src="{{  d.result }}" alt="{{ d.name }}" class="layui-upload-img">
        </div>
    </script>


    <script>

        layui.use(['upload', 'laytpl', 'form'], function () {
            var $ = layui.jquery
                , upload = layui.upload
                , laytpl = layui.laytpl
                , form = layui.form;

            //批量删除 单击事件
            $('#dele_imgs').click(function () {
                $('input:checked').each(function (index, value) {
                    var filename = $(this).parent().attr("filename");
                    delete imgFiles[filename];
                    var index_two = $(this).parent().index();
                    imgfiles.splice(index_two, 1);
                    $(this).parent().remove()
                });
            });
            var imgfiles = [];
            $("#upload_imgs").on("click", function () {

                for (var i = 0; i < imgfiles.length; i++) {
                    var nums = i;
                    var formData = new FormData();
                    formData.append('comment_img', imgfiles[i]);
                }
                console.log(imgfiles)

            })



            var imgFiles;

            //多图片上传
            var uploadInst = upload.render({
                elem: '#sele_imgs'  //开始
                , acceptMime: 'image/*'
                // , url: '/upload/'
                , auto: false
                // , bindAction: '#upload_imgs'
                , multiple: true
                , size: 1024 * 12
                , choose: function (obj) {  //选择图片后事件
                    var files = this.files = obj.pushFile(); //将每次选择的文件追加到文件队列
                    imgFiles = files;

                    $('#upload_imgs').prop('disabled', false);

                    //预读本地文件示例，不支持ie8
                    obj.preview(function (index, file, result) {
                        var data = {
                            index: index,
                            name: file.name,
                            result: result
                        };
                        imgfiles.push(file)
                        //将预览html 追加
                        laytpl(img_template.innerHTML).render(data, function (html) {
                            $('#imgs').append(html);
                        });

                        //绑定单击事件
                        $('#imgs div:last-child>img').click(function () {
                            var isChecked = $(this).siblings("input").prop("checked");
                            $(this).siblings("input").prop("checked", !isChecked);
                            return false;
                        });

                    });
                }
                , before: function (obj) { //上传前回函数
                    layer.load(); //上传loading
                }
                , done: function (res, index, upload) {    //上传完毕后事件

                    layer.closeAll('loading'); //关闭loading
                    //上传完毕                          

                    $('#imgs').html("");//清空操作

                    top.layer.msg("上传成功！");

                    return delete imgFiles[index]; //删除文件队列已经上传成功的文件

                }
                , error: function (index, upload) {

                    layer.closeAll('loading'); //关闭loading

                    top.layer.msg("上传失败！");

                }
            });

        });
    </script>
</body>

</html>