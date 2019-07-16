<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:43:"./template/mobile/new/community\inform.html";i:1560500275;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta name="Generator" content="TPshop v1.1" />
    <meta charset="UTF-8">
    <title>通知</title>
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="__STATIC__/css/public.css" />
    <link rel="stylesheet" href="__STATIC__/css/community.css">
    <link rel="stylesheet" href="__STATIC__/css/iconfont/iconfont.css">
    <script type="text/javascript" src="__STATIC__/js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="__STATIC__/js/TouchSlide.1.1.js"></script>
    <script type="text/javascript" src="__STATIC__/js/touchslider.dev.js"></script>
    <script type="text/javascript" src="__STATIC__/js/layer.js"></script>


</head>

<body class="">
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
                            <?php $pid =5;$ad_position = M("ad_position")->cache(true,TPSHOP_CACHE_TIME)->column("position_id,position_name,ad_width,ad_height","position_id");$result = M("ad")->where("pid=$pid  and enabled = 1 and start_time < 1560499200 and end_time > 1560499200 ")->order("orderby desc")->cache(true,TPSHOP_CACHE_TIME)->limit("5")->select();
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
                <li class="bol-0 on">
                    <a href="<?php echo U('community/inform'); ?>" class="font-13">通知</a>
                    <span></span>
                </li>
                <li class="bol-0"> <a href="<?php echo U('community/comment'); ?>" class="font-13">评论</a></li>
                <li class="bol-0"> <a href="<?php echo U('community/sendMsg'); ?>" class="font-13">发帖</a></li>
            </ul>
        </div>

        <div class="informText">
            <!-- 无消息 -->
            <div class="nowtext hidden">
                <p>暂无消息</p>
            </div>
            <!-- 消息列表 -->
            <div class="informlist">
                <ul>
                    <li>
                        <a href="<?php echo U('community/informdetail'); ?>">
                            <div class="informimg">
                                <img src="__STATIC__/images/newimg/community/inform.png" alt="">
                            </div>
                            <div class="informsg">
                                <p>春季保健养生必备园 | 滋补驱寒 增加免疫 告别虚弱</p>
                            </div>
                            <div class="participation flex jus-between align-c">
                                <p># 参与人数 82 人</p>
                                <div class="likeimg flex" data-like="0" onclick="cheklike(this)">
                                    <img src="__STATIC__/images/newimg/community/like.png" alt="" class="like">
                                    <img src="__STATIC__/images/newimg/community/likeOn.png" alt=""
                                        class="likeon hidden">
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo U('community/informdetail'); ?>">
                            <div class="informimg">
                                <img src="__STATIC__/images/newimg/community/inform.png" alt="">
                            </div>
                            <div class="informsg">
                                <p>春季保健养生必备园 | 滋补驱寒 增加免疫 告别虚弱</p>
                            </div>
                            <div class="participation flex jus-between align-c">
                                <p># 参与人数 82 人</p>
                                <div class="likeimg flex" data-like="0" onclick="cheklike(this)">
                                    <img src="__STATIC__/images/newimg/community/like.png" alt="" class="like">
                                    <img src="__STATIC__/images/newimg/community/likeOn.png" alt=""
                                        class="likeon hidden">
                                </div>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
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
    function cheklike(_this) {
        var thisnow = $(_this)
        var like = thisnow.attr("data-like")
        if (like == '0') {
            thisnow.find(".likeon").removeClass("hidden")
            thisnow.find(".like").addClass("hidden")
            thisnow.attr("data-like", "1")
        } else {
            thisnow.find(".likeon").addClass("hidden")
            thisnow.find(".like").removeClass("hidden")
            thisnow.attr("data-like", "0")
        }
    }

</script>

</html>