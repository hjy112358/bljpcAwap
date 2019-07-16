<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:44:"./template/mobile/new/community\sendMsg.html";i:1560930909;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta name="Generator" content="TPshop v1.1" />
    <meta charset="UTF-8">
    <title>通知</title>
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="__STATIC__/css/css/layui.css">
    <link rel="stylesheet" type="text/css" href="__STATIC__/css/public.css" />
    <link rel="stylesheet" href="__STATIC__/css/community.css?time=<?php echo time()?>">
    <link rel="stylesheet" href="__STATIC__/css/iconfont/iconfont.css">
    <script type="text/javascript" src="__STATIC__/js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="__STATIC__/js/TouchSlide.1.1.js"></script>
    <script type="text/javascript" src="__STATIC__/js/touchslider.dev.js"></script>
    <script type="text/javascript" src="__STATIC__/js/layui.js"></script>



</head>

<body class="sendmsgwrap">
    <div class="wrap ">
        <div class="maincolorbg flex jus-between align-c tophead">
            <a href="javascript:history.back(-1)" class="iconfont icon-fanhui2"></a>
            <p class="font-18">我的消息</p>
            <a href="javascript:void(0)"></a>
        </div>
        <div class="bannerlistbg">
            <div class="bannerlist">
                <div id="scrollimgPost" class="scrollimg adverlsits">
                    <div class="bd">
                        <ul>
                            <?php $pid =5;$ad_position = M("ad_position")->cache(true,TPSHOP_CACHE_TIME)->column("position_id,position_name,ad_width,ad_height","position_id");$result = M("ad")->where("pid=$pid  and enabled = 1 and start_time < 1560927600 and end_time > 1560927600 ")->order("orderby desc")->cache(true,TPSHOP_CACHE_TIME)->limit("5")->select();
if(!in_array($pid,array_keys($ad_position)) && $pid)
{
  M("ad_position")->insert(array(
         "position_id"=>$pid,
         "position_name"=>CONTROLLER_NAME."页面自动增加广告位 $pid ",
         "is_open"=>1,
         "position_desc"=>CONTROLLER_NAME."页面",
  ));
  delFile(RUNTIME_PATH); // 删除缓存  
}


$c = 5- count($result); //  如果要求数量 和实际数量不一样 并且编辑模式
if($c > 0 && I("get.edit_ad"))
{
    for($i = 0; $i < $c; $i++) // 还没有添加广告的时候
    {
      $result[] = array(
          "ad_code" => "/public/images/not_adv.jpg",
          "ad_link" => "/index.php?m=Admin&c=Ad&a=ad&pid=$pid",
          "title"   =>"暂无广告图片",
          "not_adv" => 1,
          "target" => 0,
      );  
    }
}
foreach($result as $key=>$v):       
    
    $v[position] = $ad_position[$v[pid]]; 
    if(I("get.edit_ad") && $v[not_adv] == 0 )
    {
        $v[style] = "filter:alpha(opacity=50); -moz-opacity:0.5; -khtml-opacity: 0.5; opacity: 0.5"; // 广告半透明的样式
        $v[ad_link] = "/index.php?m=Admin&c=Ad&a=ad&act=edit&ad_id=$v[ad_id]";        
        $v[title] = $ad_position[$v[pid]][position_name]."===".$v[ad_name];
        $v[target] = 0;
    }
    ?>
                                <li>
                                    <a href="javascript:void(0)" target="_blank">
                                        <img src="__STATIC__/images/newimg/community/banner.jpg" title=""
                                            width="100%" />
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)" target="_blank">
                                        <img _src="__STATIC__/images/newimg/community/banner.jpg" title=""
                                            width="100%" />
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)" target="_blank">
                                        <img _src="__STATIC__/images/newimg/community/banner.jpg" title=""
                                            width="100%" />
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)" target="_blank">
                                        <img _src="__STATIC__/images/newimg/community/banner.jpg" title=""
                                            width="100%" />
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)" target="_blank">
                                        <img _src="__STATIC__/images/newimg/community/banner.jpg" title=""
                                            width="100%" />
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="hd">
                        <ul></ul>
                    </div>
                </div>
                <div class="bannermark">
                    <img src="__STATIC__/images/newimg/community/bannerimgBg.png" alt="">
                </div>
            </div>
        </div>

        <div class="commutype">
            <ul class="clearfix">
                <li class="">
                    <a href="<?php echo U('community/aboutMe'); ?>" class="font-13">@我</a>
                </li>
                <li class="bol-0 "><a href="<?php echo U('community/inform'); ?>" class="font-13">通知</a></li>
                <li class="bol-0"> <a href="<?php echo U('community/comment'); ?>" class="font-13">评论</a></li>
                <li class="bol-0 on">
                    <a href="<?php echo U('community/sendMsg'); ?>" class="font-13">发帖</a>
                    <span></span>
                </li>
            </ul>
        </div>

        <div class="sendmsgbox">
            <p class="sendmsgHead maincolor">发表帖子</p>
            <div class="antistop">
                <input type="text" value="#皇的新衣家的衣服好好看#">

            </div>
            <div class="issuebox">
                <textarea name="" id="issuemsg" cols="30" autoHeight="true"></textarea>
                <div class="normaltext">发布你的帖子</div>
                <div class="imglist">
                    <blockquote class="layui-elem-quote layui-quote-nm">
                        <div class="layui-upload-list clearfix" id="previewimg">

                        </div>
                    </blockquote>
                </div>
                <div class="addimg">
                    <div class="layui-upload">
                        <a href="javascript:void(0)" class="layui-btn upfile" id="upimg">
                            <img src="__STATIC__/images/newimg/icon/xiangji.png" alt="" width="18" height="16">
                            <p>添加图片</p>
                        </a>
                        <a href="javascript:void(0)" class="layui-btn upfile" id="upvideo">
                            <img src="__STATIC__/images/newimg/icon/xiangji.png" alt="" width="18" height="16">
                            <p>添加视频</p>
                        </a>
                    </div>
                </div>

            </div>
            <script id="img_template" type="text/html">
                <div class="upload-img" filename="{{ d.index }}">
                    <span class="iconfont icon-shanchu" id="delimg"></span>
                    <img src="{{  d.result }}" alt="{{ d.name }}" class="layui-upload-img">
                </div>
            </script>
            <script id="video_template" type="text/html">
                <div class="upload-img"  filename="{{ d.index }}" style="width:48%;height:200px;margin-right:1%">
                    <span class="iconfont icon-shanchu" id="delimgv"></span>
                    <video  src="{{  d.objurl }}" class="layui-upload-img" base-url="{{d.result}}" controls="controls"></video>
                </div>
            </script>
            <a href="javascript:void(0)" class="publish">发布</a>
        </div>
    </div>

</body>
<script>
    TouchSlide({
        slideCell: "#scrollimgPost",
        titCell: ".hd ul", //开启自动分页 autoPage:true ，此时设置 titCell 为导航元素包裹层
        mainCell: ".bd ul",
        switchLoad: "_src",
        effect: "leftLoop",
        autoPage: true,//自动分页
        autoPlay: true //自动播放
    });


    $(function () {
        $.fn.autoHeight = function () {
            function autoHeight(elem) {
                elem.style.height = 'auto';
                elem.scrollTop = 0; //防抖动
                elem.style.height = elem.scrollHeight + 'px';
            }
            this.each(function () {
                autoHeight(this);
                $(this).on('keyup', function () {
                    autoHeight(this);
                });
            });
        }
        $('textarea[autoHeight]').autoHeight();
       
    })

    layui.use(['upload', 'laytpl', 'form'], function () {

        var $ = layui.jquery
            , upload = layui.upload
            , laytpl = layui.laytpl
            ,layer = layui.layer
            , form = layui.form;
        var imgFiles,imgFilesv;
        var imgfiles = [],imgfilesv = [];
        var files,filesv;

        //多图片上传
        var uploadInst = upload.render({
            elem: '#upimg'  //开始
            , acceptMime: 'image/*'
            , url: '/upload/'
            , auto: false
            , bindAction: '#upload_imgs'
            , multiple: true
            , choose: function (obj) {  //选择图片后事件
                files = this.files = obj.pushFile(); //将每次选择的文件追加到文件队列
                imgFiles = files;
                $(".normaltext").html("")
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
                        $('#previewimg').append(html);
                    });

                    //绑定单击事件
                    $('#previewimg div:last-child>img').click(function () {
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

                $('#previewimg').html("");//清空操作

                top.layer.msg("上传成功！");

                return delete imgFiles[index]; //删除文件队列已经上传成功的文件

            }
            , error: function (index, upload) {

                layer.closeAll('loading'); //关闭loading

                top.layer.msg("上传失败！");

            }
        });
        // 上传视频
       var upvideo= upload.render({
            elem: '#upvideo'
            ,url: '/upload/'
            , auto: false
            , bindAction: '#upload_imgs'
            ,accept: 'video' //视频
            ,exts: 'MOV|mp4' 
            , choose: function (obj) {  //选择图片后事件
                layer.load(); //上传loading
                filesv = this.file = obj.pushFile(); //将每次选择的文件追加到文件队列
                imgFilesv = filesv;
                $(".normaltext").html("")
                console.log(imgFilesv);
                $('#upload_imgs').prop('disabled', false);

                //预读本地文件示例，不支持ie8
                obj.preview(function (index, file, result) {
                      var objUrl = null ;
                     if (window.createObjectURL!=undefined) { // basic
                         objUrl = window.createObjectURL(file) ;
                     } else if (window.URL!=undefined) { // mozilla(firefox)
                         objUrl = window.URL.createObjectURL(file) ;
                     } else if (window.webkitURL!=undefined) { // webkit or chrome
                         objUrl = window.webkitURL.createObjectURL(file) ;
                     }
                        
                    var data = {
                        index: index,
                        name: file.name,
                        result: result,
                        objurl:objUrl
                    };
                    imgfilesv.push(file)
                    console.log(imgfilesv)
                    //将预览html 追加
                    laytpl(video_template.innerHTML).render(data, function (html) {
                        $('#previewimg').append(html);
                    });

                    //绑定单击事件
                    $('#previewimg div:last-child>img').click(function () {
                        var isChecked = $(this).siblings("input").prop("checked");
                        $(this).siblings("input").prop("checked", !isChecked);
                        return false;
                    });

                    layer.closeAll('loading'); //关闭loading

                });
            }
            , before: function (obj) { //上传前回函数
                layer.load(); //上传loading
            }
            , done: function (res, index, upload) {    //上传完毕后事件

                layer.closeAll('loading'); //关闭loading
                //上传完毕

                $('#previewimg').html("");//清空操作

                top.layer.msg("上传成功！");

                return delete imgFiles[index]; //删除文件队列已经上传成功的文件

            }
            , error: function (index, upload) {

                layer.closeAll('loading'); //关闭loading

                top.layer.msg("上传失败！");

            }
        });

        $(document).on("click", "#delimg", function () {
            var index = $(this).parent().attr("filename");
            var index_two = $(this).parent().index();
            $(this).parent().remove();
            delete files[index]; //删除对应的文件
            uploadInst.config.elem.next()[0].value = '';
            imgFiles = files;
            imgfiles.splice(index_two, 1);
            console.log(imgfiles);

        });
        $(document).on("click", "#delimgv", function () {
            var index = $(this).parent().attr("filename");
            var index_two = $(this).parent().index();
            $(this).parent().remove();
            delete filesv[index]; //删除对应的文件
            upvideo.config.elem.next()[0].value = '';
            imgFilesv = filesv;
            imgfilesv.splice(index_two, 1);
            console.log(imgfilesv);

        });

        

        $('#issuemsg').focus(function () {  //兼容 他浏览器
            $(".normaltext").html("")
        })

    });




</script>

</html>