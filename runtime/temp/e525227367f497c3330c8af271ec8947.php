<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:44:"./template/mobile/new/community\aboutMe.html";i:1562847334;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta name="Generator" content="TPshop v1.1" />
    <meta charset="UTF-8">
    <!-- <title>@我</title> -->
    <title></title>
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="__STATIC__/css/public.css?time=<?php echo time()?>" />
    <link rel="stylesheet" href="__STATIC__/css/community.css?time=<?php echo time()?>">
    <link rel="stylesheet" href="__STATIC__/css/iconfont/iconfont.css">
    <script type="text/javascript" src="__STATIC__/js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="__STATIC__/js/TouchSlide.1.1.js"></script>
    <script type="text/javascript" src="__STATIC__/js/touchslider.dev.js"></script>
    <script type="text/javascript" src="__STATIC__/js/layer.js"></script>


</head>

<body class="">
    <div class="wrap ">
        <!-- <div class="maincolorbg flex jus-between align-c tophead">
            <a href="javascript:history.back(-1)" class="iconfont icon-fanhui2"></a>
            <p class="font-18">我的消息</p>
            <a href="javascript:void(0)"></a>
        </div> -->
        <div class="maincolorbg tophead " id="topAnchor" style="text-align: center;">
            <p class="font-18" style="margin-left:0">我的消息</p>
        </div>
        <div class="bannerlistbg">
            <div class="bannerlist">
                <div id="scrollimgPost" class="scrollimg adverlsits">
                    <div class="bd">
                        <ul>
                            <?php $pid =5;$ad_position = M("ad_position")->cache(true,TPSHOP_CACHE_TIME)->column("position_id,position_name,ad_width,ad_height","position_id");$result = M("ad")->where("pid=$pid  and enabled = 1 and start_time < 1562846400 and end_time > 1562846400 ")->order("orderby desc")->cache(true,TPSHOP_CACHE_TIME)->limit("5")->select();
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
                <li class="on">
                    <a href="<?php echo U('community/aboutMe'); ?>" class="font-13">@我</a>
                    <span></span>
                </li>
                <li class="bol-0"> <a href="<?php echo U('community/inform'); ?>" class="font-13">通知</a></li>
                <li class="bol-0"> <a href="<?php echo U('community/comment'); ?>" class="font-13">评论</a></li>
                <li class="bol-0"> <a href="<?php echo U('community/sendMsg'); ?>" class="font-13">发帖</a></li>
            </ul>
        </div>

        <div class="aboutText">
            <ul>
                <li>
                    <div class="aboutmg">
                        <div class="aboutHead flex  jus-start align-c">
                            <div class="headimg">
                                <img src="__STATIC__/images/newimg/usr/userimg.png" alt="">
                            </div>
                            <p>Hlao</p>
                        </div>
                        <p>评论：<span class="maincolor">@漂亮姐姐的小白猫</span> 这家店的衣服好好看</p>
                    </div>

                    <div class="aboutimg">
                        <ul class="clearfix">
                            <li>
                                <img src="__STATIC__/images/newimg/community/img01.png" alt="">
                            </li>
                            <li>
                                <img src="__STATIC__/images/newimg/community/img02.png" alt="">
                            </li>
                            <li>
                                <img src="__STATIC__/images/newimg/community/img03.png" alt="">
                            </li>

                        </ul>
                    </div>
                </li>
                <li>
                    <div class="aboutmg">
                        <div class="aboutHead flex  jus-start align-c">
                            <div class="headimg">
                                <img src="__STATIC__/images/newimg/usr/userimg.png" alt="">
                            </div>
                            <p>Hlao</p>
                        </div>
                        <p>评论：<span class="maincolor">@漂亮姐姐的小白猫</span> 这家店的衣服好好看</p>
                    </div>

                    <div class="aboutimg">
                        <ul class="clearfix">
                            <li>
                                <img src="__STATIC__/images/newimg/community/img01.png" alt="">
                            </li>
                            <li>
                                <img src="__STATIC__/images/newimg/community/img02.png" alt="">
                            </li>
                            <li>
                                <img src="__STATIC__/images/newimg/community/img03.png" alt="">
                            </li>

                        </ul>
                    </div>
                </li>
            </ul>
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
</script>

</html>