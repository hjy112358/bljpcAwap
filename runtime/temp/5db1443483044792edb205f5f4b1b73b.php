<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:49:"./application/admin/view2/partner\goods_list.html";i:1559051654;s:44:"./application/admin/view2/public\layout.html";i:1491382650;}*/ ?>
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

<body style="background-color: rgb(255, 255, 255); overflow: auto; cursor: default; -moz-user-select: inherit;">
    <div id="append_parent"></div>
    <div id="ajaxwaitid"></div>
    <div class="page">
        <div class="fixed-bar">
            <div class="item-title">
                <div class="subject">
                    <h3>合伙人商品管理</h3>
                    <h5>网站系统合伙人索引与管理</h5>
                </div>
            </div>
        </div>
        <!-- 操作说明 -->

        <div class="flexigrid">
            <div class="mDiv">
                <div class="ftitle">
                    <h3>合伙人商品列表</h3>
                    <!-- <h5>(共10000条记录)</h5> -->
                </div>
                <!-- <div title="刷新数据" class="pReload"><i class="fa fa-refresh"></i></div> -->
            </div>
            <div class="hDiv">
                <div class="hDivBox">
                    <table cellspacing="0" cellpadding="0">
                        <thead>
                            <tr>
                                <th class="sign" axis="col0">
                                    <div style="width: 24px;"><i class="ico-check"></i></div>
                                </th>
                                <th align="left" abbr="article_title" axis="col3" class="">
                                    <div style="text-align: left; width: 100px;" class="">商品编号</div>
                                </th>
                                <th align="center" abbr="ac_id" axis="col4" class="">
                                    <div style="text-align: center; width: 100px;" class="">商品名称</div>
                                </th>
                                <th align="center" abbr="article_show" axis="col5" class="">
                                    <div style="text-align: center; width: 100px;" class="">商品价格</div>
                                </th>
                                <th align="center" abbr="article_show" axis="col5" class="">
                                    <div style="text-align: center; width: 100px;" class="">库存</div>
                                </th>
                                <th align="center" axis="col1" class="handle">
                                    <div style="text-align: center; width: 150px;">操作</div>
                                </th>
                                <th style="width:100%" axis="col7">
                                    <div></div>
                                </th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
            <div class="tDiv">
			<div class="tDiv2">
				<div class="fbutton"> <a href="<?php echo url('partner/addgoods'); ?>">
					<div class="add" title="新增商品">
						<span><i class="fa fa-plus"></i>新增商品</span>
					</div>
                </a> </div>
                
                <div class="fbutton"> <a href="<?php echo url('partner/addimgs'); ?>">
					<div class="add" title="新增图片">
						<span><i class="fa fa-plus"></i>新增图片</span>
					</div>
				</a> </div>
			</div>
			<div style="clear:both"></div>
		</div>
            <div class="bDiv" style="height: auto;">
                <div id="flexigrid" cellpadding="0" cellspacing="0" border="0">
                    <table>
                        <tbody>
                            <!-- <?php if(is_array($list) || $list instanceof \think\Collection): if( count($list)==0 ) : echo "" ;else: foreach($list as $k=>$vo): ?> -->
                                <tr>
                                    <td class="sign">
                                        <div style="width: 24px;"><i class="ico-check">111</i></div>
                                    </td>
                                    <td align="left" class="">
                                        <div style="text-align: left; width: 100px;">1111</div>
                                    </td>
                                    <td align="center" class="">
                                        <div style="text-align: center; width:100px;">111</div>
                                    </td>
                                    <td align="center" class="">
                                        <div style="text-align: center; width:100px;">1111</div>
                                    </td>
                                    <td align="center" class="">
                                        <div style="text-align: center; width: 100px;">
                                            111
                                        </div>
                                    </td>
                                    <td align="center" class="">
                                        <div style="text-align: center; width: 100px;">
                                            111
                                        </div>
                                    </td>
                                    <td align="center" class="handle">
                                        <div style="text-align: center; width: 170px; max-width:170px;">
                                            <a href="" class="btn blue"><i class="fa fa-pencil-square-o"></i>编辑</a>
                                            <a class="btn red" href="javascript:void(0)" data-url="" data-id=""
                                                onClick=""><i class="fa fa-trash-o"></i>删除</a>
                                        </div>
                                    </td>
                                    <td align="" class="" style="width: 100%;">
                                        <div>&nbsp;</div>
                                    </td>
                                </tr>
                            <!-- <?php endforeach; endif; else: echo "" ;endif; ?> -->
                        </tbody>
                    </table>
                </div>
                <div class="iDiv" style="display: none;"></div>
            </div>
            <!--分页位置-->
            <!-- <?php echo $page; ?> -->
        </div>
    </div>
    <script>
    
    </script>
</body>

</html>