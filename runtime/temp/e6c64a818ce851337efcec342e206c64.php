<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:38:"./template/mobile/new/index\index.html";i:1562847334;s:44:"./template/mobile/new/public\footer_nav.html";i:1560504668;s:42:"./template/mobile/new/public\wx_share.html";i:1556698550;}*/ ?>
<!DOCTYPE html >
<html>
<head>
  <meta name="Generator" content="TPshop v1.1" />
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width">
  <!-- <title>首页-<?php echo $tpshop_config['shop_info_store_title']; ?></title> -->
  <title></title>
  <meta http-equiv="keywords" content="<?php echo $tpshop_config['shop_info_store_keyword']; ?>" />
  <meta name="description" content="<?php echo $tpshop_config['shop_info_store_desc']; ?>" />
  <meta name="viewport"
    content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <link rel="stylesheet" type="text/css" href="__STATIC__/css/public.css?time=<?php echo time()?>" />
  <link rel="stylesheet" type="text/css" href="__STATIC__/css/index.css?time=<?php echo time()?>" />
  <link rel="stylesheet" href="__STATIC__/css/iconfont/iconfont.css">
  <script type="text/javascript" src="__STATIC__/js/jquery.js"></script>
  <script type="text/javascript" src="__STATIC__/js/TouchSlide.1.1.js"></script>
  <script type="text/javascript" src="__STATIC__/js/jquery.json.js"></script>
  <script type="text/javascript" src="__STATIC__/js/touchslider.dev.js"></script>
  <script type="text/javascript" src="__STATIC__/js/layer.js"></script>
  <script src="__PUBLIC__/js/global.js"></script>
  <script src="__PUBLIC__/js/mobile_common.js"></script>
  <script type="text/javascript" src="__STATIC__/js/mui.min.js"></script>
  <!-- <script>
    var height = window.innerHeight + "px";  //获取页面实际高度  
    var width = window.innerWidth + "px";
    document.getElementById("bcid").style.height = height;
    document.getElementById("bcid").style.width = width;
    scan = null;//扫描对象  
    mui.plusReady(function () {  //通过mui初始化扫描
      mui.init();
      startRecognize();
    });

    function startRecognize() {  //开启扫描
      try {
        var filter;
        //自定义的扫描控件样式  
        var styles = { frameColor: "#29E52C", scanbarColor: "#29E52C", background: "" }
        //扫描控件构造  
        scan = new plus.barcode.Barcode('bcid', filter, styles);
        scan.onmarked = onmarked;
        scan.onerror = onerror;  //扫描错误
        scan.start();
        //打开关闭闪光灯处理  
        var flag = false;
        document.getElementById("turnTheLight").addEventListener('tap', function () {
          if (flag == false) {
            scan.setFlash(true);
            flag = true;
          } else {
            scan.setFlash(false);
            flag = false;
          }
        });
      } catch (e) {
        alert("出现错误了:\n" + e);
      }
    };
    function onerror(e) {  //错误弹框
      alert(e);
    };
    function onmarked(type, result) {  //这个是扫描二维码的回调函数，type是扫描二维码回调的类型
      var text = '';
      switch (type) { //QR,EAN13,EAN8都是二维码的一种编码格式,result是返回的结果
        case plus.barcode.QR:
          text = 'QR: ';
          break;
        case plus.barcode.EAN13:
          text = 'EAN13: ';
          break;
        case plus.barcode.EAN8:
          text = 'EAN8: ';
          break;
      }
      alert(text + " : " + result);

    };

  </script> -->
  <style>
    .adverimg>div>a>img {
      width: 49%;
      float: left;
      margin-right: 1px;
      margin-bottom: 1px;
    }
    #scrollimg .bd li{
      height:205px;
    }
    .productimg{
      position:relative
    }
    .productlist ul li .productimg img{
      position:absolute;
      top:50%;
      left:50%;
      transform:translate(-50%,-50%)
    }

    .entry-list {
      padding-top: 10px;
    }

    .scrollimg .bd {
      height: 110px;
    }
    .location span{
      background: none !important;
      color: #6d6d6d !important;
    }
   #city #allmap{
      display: none !important
    }
    .index_search_mid input{
      background: rgba(255,255,255,.7);
    }
  </style>

</head>

<body id="indexbox">
  <div id="page" class="showpage">
    <div>
      <div class="indexWrap" id="topAnchor">
        <div id="scrollimg" class="scrollimg" style="height:205px;">
          <div class="bd" style="height:205px">
            <ul>
              <li>
                <a href="<?php echo url('Goods/goodsList?id=1024'); ?>">
                  <img src="__STATIC__/images/newimg/usr/banner01-1.jpg" title="" width="100%" />
                </a>
              </li>
              <!-- <li>
                <a href="<?php echo url('Goods/goodsDetailNew?id=140'); ?>">
                  <img _src="__STATIC__/images/newimg/usr/banner4.jpg" title="" width="100%" />
                </a>
              </li> -->
              <li>
                <a href="<?php echo url('Goods/goodsDetailNew?id=922'); ?>">
                  <img _src="__STATIC__/images/newimg/usr/banner9-01.jpg" title="" width="100%" />
                </a>
              </li>
              <li>
                <a href="<?php echo url('Goods/goodsDetailNew?id=1131'); ?>">
                  <img _src="__STATIC__/images/newimg/usr/shan.jpg" title="" width="100%"  />
                </a>
              </li>
              <!-- <li>
                <a href="javascript:void(0)">
                  <img src="__STATIC__/images/newimg/usr/banner3.jpg" title="" width="100%" />
                </a>
              </li> -->
              <li>
                <a href="<?php echo url('Goods/goodsList?id=1039'); ?>">
                  <img _src="__STATIC__/images/newimg/usr/banner05-01.jpg" title="" width="100%" />
                </a>
              </li>
              <li>
                <a href="<?php echo url('Goods/goodsDetailNew?id=938'); ?>">
                  <img _src="__STATIC__/images/newimg/usr/banner8-01.jpg" title="" width="100%" />
                </a>
              </li>
            </ul>

          </div>
          <div class="hd">
            <ul></ul>
          </div>
        </div>
        
        <div class="searchbbox">
          <a href="<?php echo U('User/choosecity'); ?>">
            <div class="location" id="location">
              <span id="city"><?php echo $name; ?></span>
            </div>
          </a>
          
          <!-- <script type="text/javascript"
            src="https://webapi.amap.com/maps?v=1.4.14&key=4a66ce96cf75144d7cd27fbfa42429b6&plugin=AMap.CitySearch"></script> -->
          <script type="text/javascript"
            src="http://api.map.baidu.com/api?v=2.0&ak=ryUeCXuyh8oebZGclHCVYW4ffHHf2n7o"></script>
          <script type="text/javascript">

            $(function () {
              if ($('#city').html() == "") {
                // var citysearch = new AMap.CitySearch();
                // //自动获取用户IP，返回当前城市
                // citysearch.getLocalCity(function (status, result) {
                //   console.log(result);
                //   if (status === 'complete' && result.info === 'OK') {
                //     if (result && result.city && result.bounds) {
                //       var cityinfo = result.city;
                //       var citybounds = result.bounds;
                //       $('#city').html(cityinfo);
                //       //地图显示当前城市
                //     }
                //   } else {
                //     $('#city').html(result.info);
                //   }
                // });
                // 百度地图API功能
                // var map = new BMap.Map("city");
                // function myFun(result) {
                //   var cityName = result.name;
                //   map.setCenter(cityName);
                //   $('#city').html(cityName);
                // }
                // var myCity = new BMap.LocalCity();
                // myCity.get(myFun);

                var geolocation = new BMap.Geolocation();
                geolocation.getCurrentPosition(function (r) {
                  if (this.getStatus() == window.BMAP_STATUS_SUCCESS) {
                    //坐标
                    var cityName=r.address.city
                    $('#city').html(cityName);
                    }
                  })
              };
            });
          </script>
          <div id="fake-search " class="index_search ">
            <div class="index_search_mid">
                <form action="javascript:return true"> 
              <span><img src="__STATIC__/images/newimg/search.png"></span>
              <input type="search" id="search_text" class="search_text" placeholder="搜索商品" />
              </form>
            </div>
          </div> 
        </div>
      </div>
    </div>
    <script type="text/javascript">
      TouchSlide({
        slideCell: "#scrollimg",
        titCell: ".hd ul", //开启自动分页 autoPage:true ，此时设置 titCell 为导航元素包裹层
        mainCell: ".bd ul",
        effect: "leftLoop",
        switchLoad:"_src",
        autoPage: true,//自动分页
        autoPlay: true //自动播放
      });
    </script>

    <!-- 分类 -->
    <div class="entry-list clearfix">
      <nav>
        <ul>
          <li>
            <a href="<?php echo U('Goods/categoryList'); ?>">
              <img alt="全部分类" src="__STATIC__/images/newimg/allfind.png" />
              <span>全部分类</span>
            </a>
          </li>
          <li>
            <a href="<?php echo U('store/storelist'); ?>">
              <img alt="店铺街" src="__STATIC__/images/newimg/store.png">
              <span>店铺街</span>
            </a>
          </li>
          <li>
            <a href="<?php echo U('Index/brand'); ?>">
              <img alt="品牌街" src="__STATIC__/images/newimg/brand.png">
              <span>品牌街</span>
            </a>
          </li>
          <li>
            <a href="<?php echo U('index/oneBuy'); ?>">
              <img alt="一元购" src="__STATIC__/images/newimg/one.png">
              <span>合约消费</span>
            </a>
          </li>
          <li>
            <a href="<?php echo U('partner/partner_all'); ?>">
              <img alt="合伙人" src="__STATIC__/images/newimg/partner.png" />
              <span>合伙人</span>
            </a>
          </li>
          <li>
            <a href="<?php echo url('Goods/goodsList?id=1038'); ?>">
              <img alt="我的订单" src="__STATIC__/images/newimg/order.png">
              <span>VIP中心</span>
            </a>
          </li>
          <li>
            <a href="<?php echo url('Goods/goodsList?id=1043'); ?>">
              <img alt="B-VIP" src="__STATIC__/images/newimg/b-vip.png" />
              <span>B-VIP</span>
            </a>
          </li>
          <li>
            <a href="<?php echo U('User/indexnew'); ?>">
              <img alt="个人中心" src="__STATIC__/images/newimg/personCenter.png" />
              <span>一元销售</span>
            </a>
          </li>
          <li class="taobao">
            <a href="http://stork36.cn/index.html" >
              <!-- https://blj.ubaoliao.com/#/ -->
              <img alt="淘宝" src="__STATIC__/images/newimg/jdb.png" />
              <span>京多宝</span>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <img alt="社区" src="__STATIC__/images/newimg/associate.png" />
              <span>社区</span>
            </a>
          </li>
        </ul>
      </nav>
    </div> 

    <div class="mainbox">
      <!-- 头条 -->
      <div class="headline">
        <a href="<?php echo U('Index/notice'); ?>">
          <span class="headlineTitle">公告</span>
          <span class="headlinemain">爆品推荐 欢迎大家立即抢购</span>
          <span class="moreimg fr"><img src="__STATIC__/images/newimg/more.png" alt=""></span>
        </a>
      </div>

      <!-- 优惠 -->
      <div class="discounts">
        <div class="discoutlist  clearfix">
          <ul>
            <li class="margin-r10"><img src="__STATIC__/images/newimg/dis01.jpg" alt=""></li>

            <li>
              <a href="<?php echo url('Goods/goodsList?id=1029'); ?>"><img src="__STATIC__/images/newimg/dis002-2.jpg" alt=""></a>
            </li>
          </ul>
        </div>
        <div class="discoutlist  clearfix">
          <ul>
            <li class="margin-r10"><a href="<?php echo url('Goods/goodsList?id=615'); ?>"><img
                  src="__STATIC__/images/newimg/dis03-01.jpg" alt=""></a></li>
            <li><a href="<?php echo url('Goods/goodsList?id=993'); ?>"><img src="__STATIC__/images/newimg/dis04-01.jpg" alt=""></a>
            </li>
          </ul>
        </div>
        <div class="discoutlist clearfix">
          <ul>
            <li class="margin-r10"><a href="<?php echo url('Goods/goodsList?id=994'); ?>"><img
                  src="__STATIC__/images/newimg/dis05-02.jpg" alt=""></a></li>
            <li><a href="<?php echo url('Goods/goodsList?id=995'); ?>"><img src="__STATIC__/images/newimg/dis06-01.jpg" alt=""></a>
            </li>
          </ul>
        </div>
      </div>

      <!-- 海报 -->
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
                <a href="<?php echo url('Goods/goodsDetailNew?id=600'); ?>" target="_blank">
                  <img src="__STATIC__/images/newimg/index/01.jpg" title="" width="100%" />
                </a>
              </li>
              <li>
                <a href="<?php echo url('Goods/goodsDetailNew?id=152'); ?>" target="_blank">
                  <img _src="__STATIC__/images/newimg/index/2.jpg" title="" width="100%" />
                </a>
              </li>
              <li>
                <a href="<?php echo url('Goods/goodsDetailNew?id=184'); ?>" target="_blank">
                  <img _src="__STATIC__/images/newimg/index/3.jpg" title="" width="100%" />
                </a>
              </li>
              <li>
                <a href="<?php echo url('Goods/goodsList?id=1044'); ?>" target="_blank">
                  <img _src="__STATIC__/images/newimg/index/xiyinzhou.png" title="" width="100%" />
                </a>
              </li>
              <li>
                <a href="<?php echo url('Goods/goodsDetailNew?id=189'); ?>" target="_blank">
                  <img _src="__STATIC__/images/newimg/index/05.jpg" title="" width="100%" />
                </a>
              </li>
            <?php endforeach; ?>                        
          </ul>
        </div>
        <div class="hd">
          <ul></ul>
        </div>
      </div>


      <!-- 每日必逛 -->
      <div class="shopAround">
        <div class="indexTitle flex jus-start align-c">
          <img src="__STATIC__/images/newimg/goods/shopAround.png" alt="" width="15" height="15">
          <p class="font-17 maincolor">每日必逛</p>
        </div>
        <div class="adverimg">
          <div class="clearfix">
            <a href="<?php echo url('Goods/goodsList?id=979'); ?>">
            <img src="__STATIC__/images/newimg/index/advertise01-01.jpg" alt=""></a>
            <a href="<?php echo url('Goods/goodsList?id=980'); ?>">
            <img src="__STATIC__/images/newimg/index/advertise02-01.jpg" alt=""></a>
          </div>
          <div class="clearfix">
            <a href="<?php echo url('Goods/goodsList?id=981'); ?>">
            <img src="__STATIC__/images/newimg/index/advertise03-01.jpg" alt=""></a>
            <a href="<?php echo url('index/oneBuy'); ?>">
            <img src="__STATIC__/images/newimg/index/advertise04-01.jpg" alt=""></a>
          </div>
        </div>
      </div>


      <!-- 海报 -->
      <div id="scrollimgPost1" class="scrollimg adverlsits">
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
                <a href="<?php echo url('Goods/goodsDetailNew?id=133'); ?>" target="_blank">
                  <img src="__STATIC__/images/newimg/index/6.jpg" title="" width="100%" />
                </a>
              </li>
              <li>
                <a href="javascript:void(0)" target="_blank">
                  <img _src="__STATIC__/images/newimg/index/7.jpg" title="" width="100%" />
                </a>
              </li>
              <li>
                <a href="javascript:void(0)" target="_blank">
                  <img _src="__STATIC__/images/newimg/index/8.jpg" title="" width="100%" />
                </a>
              </li>
              <li>
                <a href="javascript:void(0)" target="_blank">
                  <img _src="__STATIC__/images/newimg/index/9.jpg" title="" width="100%" />
                </a>
              </li>
              <li>
                <a href="javascript:void(0)" target="_blank">
                  <img _src="__STATIC__/images/newimg/index/10.jpg" title="" width="100%" />
                </a>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>
        <div class="hd">
          <ul></ul>
        </div>
      </div>


      <!-- 酷玩潮流 -->
      <div class="shopAround">
        <div class="indexTitle flex jus-start align-c">
          <img src="__STATIC__/images/newimg/index/coldplay.png" alt="" width="15" height="15">
          <p class="font-17 maincolor">酷玩潮流</p>
        </div>
        <div class="adverimg">
          <div class="clearfix">
            <a href="<?php echo url('Goods/goodsList?id=293'); ?>">
            <img src="__STATIC__/images/newimg/index/advertise05-01.jpg" alt=""></a>
            <a href="<?php echo url('Goods/goodsList?id=365'); ?>">
            <img src="__STATIC__/images/newimg/index/advertise06-01.jpg" alt=""></a>
          </div>
          <div class="clearfix">
            <a href="<?php echo url('Goods/goodsList?id=697'); ?>">
            <img src="__STATIC__/images/newimg/index/advertise07-01.jpg" alt=""></a>
            <a href="<?php echo url('Goods/goodsList?id=987'); ?>">
            <img src="__STATIC__/images/newimg/index/advertise08-01.jpg" alt=""></a>
          </div>
        </div>
      </div>


      <!-- 海报 -->
      <div id="scrollimgPost2" class="scrollimg adverlsits">
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
                  <img src="__STATIC__/images/newimg/index/11.jpg" title="" width="100%" />
                </a>
              </li>
              <li>
                <a href="javascript:void(0)" target="_blank">
                  <img _src="__STATIC__/images/newimg/index/12.jpg" title="" width="100%" />
                </a>
              </li>
              <li>
                <a href="javascript:void(0)" target="_blank">
                  <img _src="__STATIC__/images/newimg/index/13.jpg" title="" width="100%" />
                </a>
              </li>
              <li>
                <a href="javascript:void(0)" target="_blank">
                  <img _src="__STATIC__/images/newimg/index/14.jpg" title="" width="100%" />
                </a>
              </li>
              <li>
                <a href="javascript:void(0)" target="_blank">
                  <img _src="__STATIC__/images/newimg/index/15.jpg" title="" width="100%" />
                </a>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>
        <div class="hd">
          <ul></ul>
        </div>
      </div>


      <!-- 生活品质 -->
      <div class="shopAround">
        <div class="indexTitle flex jus-start align-c">
          <img src="__STATIC__/images/newimg/goods/qualityLife.png" alt="" width="15" height="15">
          <p class="font-17 maincolor">生活品质</p>
        </div>
        <div class="adverimg">
          <div class="clearfix">
              <a href="<?php echo url('Goods/goodsList?id=96'); ?>">
            <img src="__STATIC__/images/newimg/index/advertise09-01.jpg" alt=""></a>
            <a href="<?php echo url('Goods/goodsList?id=142'); ?>">
            <img src="__STATIC__/images/newimg/index/advertise10-01.jpg" alt=""></a>
          </div>
          <div class="clearfix">
            <a href="<?php echo url('Goods/goodsList?id=856'); ?>">
            <img src="__STATIC__/images/newimg/index/advertise11-01.jpg" alt=""></a>
            <a href="<?php echo url('Goods/goodsList?id=588'); ?>">
            <img src="__STATIC__/images/newimg/index/advertise12-01.jpg" alt=""></a>
          </div>
          <div class="adverimglist">
            <ul>
              <li><a href="<?php echo url('Goods/goodsList?id=865'); ?>"><img src="__STATIC__/images/newimg/index/advertise13-01.jpg"
                    alt=""></a></li>
              <li><a href="<?php echo url('Goods/goodsList?id=167'); ?>"><img src="__STATIC__/images/newimg/index/advertise14-01.jpg"
                    alt=""></a> </li>
              <li><a href="<?php echo url('Goods/goodsList?id=150'); ?>"><img src="__STATIC__/images/newimg/index/advertise15-01.jpg"
                    alt=""></a></li>
              <!-- <li><img src="__STATIC__/images/newimg/index/advertise16.jpg" alt=""></li> -->
            </ul>
          </div>
        </div>
      </div>


      <!-- 产品推荐 -->
      <div class="productRec">
        <div class="productTitle">
          <p class="maincolor font-17">产品推荐<span>Product recommendation</span></p>
        </div>
        <div class="productlist">
          <div>
            <ul class="clearfix">
              <?php if(is_array($goods_list) || $goods_list instanceof \think\Collection): $i = 0; $__LIST__ = $goods_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <li>
                  <a href="<?php echo U('Mobile/Goods/goodsDetailNew',array('id'=>$vo[goods_id])); ?>">
                    <div class="productimg">
                      <img data-original="<?php echo imgtransformation($vo['original_img']); ?>" alt=""
                        src="__STATIC__/images/newimg/loading.gif" class="lazy">
                    </div>
                    <div class="productDetail">
                      <?php if($vo['goods_remark'] == ''): ?>
                          <p>
                              <span><?php echo $vo['goods_name']; ?></span>
                          </p>
                      <?php endif; if($vo['goods_remark'] != ''): ?>
                          <p>【<?php echo $vo['goods_remark']; ?>】
                              <span><?php echo $vo['goods_name']; ?></span>
                          </p>
                      <?php endif; ?>
                    </div>
                    <div class="productScale flex jus-between align-c" style="padding-right: 15px">
                      <p class="maincolor">￥<i><?php echo $vo['shop_price']; ?></i></p>
                      <span>库存:<?php echo $vo['store_count']; ?></span>
                    </div>
                  </a>
                </li>
              <?php endforeach; endif; else: echo "" ;endif; ?>

            </ul>
          </div>
        </div>
      </div>

      <div>
        <a href="#topAnchor"  class="iconfont icon-fanhuidingbu returnTop"></a>
    </div>

    </div>
    <script>
        $('#search_text').bind('search', function () {
          //coding
         var value=$("#search_text").val();
          if(value != ''){
            window.location.href = "/mobile/Goods/goodsList?name="+value;
          }

      });

    
    </script>
    <script type="text/javascript">
      TouchSlide({
        slideCell: "#scrollimgPost",
        titCell: ".hd ul", //开启自动分页 autoPage:true ，此时设置 titCell 为导航元素包裹层
        mainCell: ".bd ul",
        switchLoad:"_src",
        effect: "leftLoop",
        autoPage: true,//自动分页
        autoPlay: true //自动播放
      });
      TouchSlide({
        slideCell: "#scrollimgPost1",
        titCell: ".hd ul", //开启自动分页 autoPage:true ，此时设置 titCell 为导航元素包裹层
        mainCell: ".bd ul",
        switchLoad:"_src",
        effect: "leftLoop",
        autoPage: true,//自动分页
        autoPlay: true //自动播放
      });

      TouchSlide({
        slideCell: "#scrollimgPost2",
        titCell: ".hd ul", //开启自动分页 autoPage:true ，此时设置 titCell 为导航元素包裹层
        mainCell: ".bd ul",
        switchLoad:"_src",
        effect: "leftLoop",
        autoPage: true,//自动分页
        autoPlay: true //自动播放
      });
</script>
<!-- <div id="bcid">盛放扫描控件的div</div>   -->
<!-- <div style="height:50px; line-height:50px; clear:both;"></div> -->
<style>
.vf_3{ background:url("__STATIC__/images/newimg/scan01.png") no-repeat}
</style>
<div class="v_nav">
	<div class="vf_nav">
		<ul>
			<li> <a href="<?php echo U('Index/index'); ?>">
			    <i class="vf_1"></i>
			    <span class="maincolor">首页</span></a></li>
			<li><a href="<?php echo U('Goods/categoryList'); ?>">
			    <i class="vf_2"></i>
			    <span>分类</span></a></li>
			<li class="scan" ><a href="<?php echo U('User/tradingFloor'); ?>">
			    <i class="vf_3"></i>
			   
			<li><a href="<?php echo U('Cart/cart'); ?>">
			   <i class="vf_4"></i>
			   <span>购物车</span>
			   </a>
			</li>
			<li><a href="<?php echo U('User/indexnew'); ?>">
			    <i class="vf_5"></i>
			    <span>我的</span></a>
			</li>
		</ul>
	</div>
</div> 
<script type="text/javascript">
$(document).ready(function(){
	  var cart_cn = getCookie('cn');
	  if(cart_cn == ''){
		$.ajax({
			type : "GET",
			url:"/index.php?m=Home&c=Cart&a=header_cart_list",//+tab,
			success: function(data){								 
				cart_cn = getCookie('cn');
				$('#cart_quantity').html(cart_cn);						
			}
		});	
	  }
	  $('#cart_quantity').html(cart_cn);
});
</script>
<!-- 微信浏览器 调用微信 分享js-->
<script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script type="text/javascript">

<?php if(ACTION_NAME == 'goodsInfo'): ?>
   var ShareLink = "http://<?php echo $_SERVER[HTTP_HOST]; ?>/index.php?m=Mobile&c=Goods&a=goodsInfo&id=<?php echo $goods[goods_id]; ?>"; //默认分享链接
   var ShareImgUrl = "http://<?php echo $_SERVER[HTTP_HOST]; ?><?php echo goods_thum_images($goods[goods_id],400,400); ?>"; // 分享图标
<?php else: ?>
   var ShareLink = "http://<?php echo $_SERVER[HTTP_HOST]; ?>/index.php?m=Mobile&c=Index&a=index"; //默认分享链接
   var ShareImgUrl = "http://<?php echo $_SERVER[HTTP_HOST]; ?><?php echo $tpshop_config['shop_info_store_logo']; ?>"; //分享图标
<?php endif; ?>

var is_distribut = getCookie('is_distribut'); // 是否分销代理
var user_id = getCookie('user_id'); // 当前用户id
//alert(is_distribut+'=='+user_id);
// 如果已经登录了, 并且是分销商
if(parseInt(is_distribut) == 1 && parseInt(user_id) > 0)
{									
	ShareLink = ShareLink + "&first_leader="+user_id;									
}	

$(function() {
	if(isWeiXin() && parseInt(user_id)>0 ||1){
		$.ajax({
			type : "POST",
			url:"/index.php?m=Mobile&c=Index&a=ajaxGetWxConfig&t="+Math.random(),
			data:{'askUrl':encodeURIComponent(location.href.split('#')[0])},		
			dataType:'JSON',
			success: function(res)
			{
				//微信配置
				wx.config({
				    debug: false, 
				    appId: res.appId,
				    timestamp: res.timestamp, 
				    nonceStr: res.nonceStr, 
				    signature: res.signature,
				    jsApiList: ['onMenuShareTimeline', 'onMenuShareAppMessage','onMenuShareQQ','onMenuShareQZone','hideOptionMenu'] // 功能列表，我们要使用JS-SDK的什么功能
				});
			},
			error:function(){
				return false;
			}
		}); 

		// config信息验证后会执行ready方法，所有接口调用都必须在config接口获得结果之后，config是一个客户端的异步操作，所以如果需要在 页面加载时就调用相关接口，则须把相关接口放在ready函数中调用来确保正确执行。对于用户触发时才调用的接口，则可以直接调用，不需要放在ready 函数中。
		wx.ready(function(){
		    // 获取"分享到朋友圈"按钮点击状态及自定义分享内容接口
		    wx.onMenuShareTimeline({
		        title: "<?php echo $tpshop_config['shop_info_store_title']; ?>", // 分享标题
		        link:ShareLink,
		        imgUrl:ShareImgUrl // 分享图标
		    });

		    // 获取"分享给朋友"按钮点击状态及自定义分享内容接口
		    wx.onMenuShareAppMessage({
		        title: "<?php echo $tpshop_config['shop_info_store_title']; ?>", // 分享标题
		        desc: "<?php echo $tpshop_config['shop_info_store_desc']; ?>", // 分享描述
		        link:ShareLink,
		        imgUrl:ShareImgUrl // 分享图标
		    });
			// 分享到QQ
			wx.onMenuShareQQ({
		        title: "<?php echo $tpshop_config['shop_info_store_title']; ?>", // 分享标题
		        desc: "<?php echo $tpshop_config['shop_info_store_desc']; ?>", // 分享描述
		        link:ShareLink,
		        imgUrl:ShareImgUrl // 分享图标
			});	
			// 分享到QQ空间
			wx.onMenuShareQZone({
		        title: "<?php echo $tpshop_config['shop_info_store_title']; ?>", // 分享标题
		        desc: "<?php echo $tpshop_config['shop_info_store_desc']; ?>", // 分享描述
		        link:ShareLink,
		        imgUrl:ShareImgUrl // 分享图标
			});

		   <?php if(CONTROLLER_NAME == 'User'): ?> 
				wx.hideOptionMenu();  // 用户中心 隐藏微信菜单
		   <?php endif; ?>	
		});
	}
});

function isWeiXin(){
    var ua = window.navigator.userAgent.toLowerCase();
    if(ua.match(/MicroMessenger/i) == 'micromessenger'){
        return true;
    }else{
        return false;
    }
}
</script>
<!--微信关注提醒 start-->
<?php if(\think\Session::get('subscribe') == 0 AND $wechat_config['qr'] != ''): ?>
<button class="guide" onclick="follow_wx()">关注公众号</button>
<style type="text/css">
.guide{width:20px;height:100px;text-align: center;border-radius: 8px ;font-size:12px;padding:8px 0;border:1px solid #adadab;color:#000000;background-color: #fff;position: fixed;right: 6px;bottom: 200px;}
#cover{display:none;position:absolute;left:0;top:0;z-index:18888;background-color:#000000;opacity:0.7;}
#guide{display:none;position:absolute;top:5px;z-index:19999;}
#guide img{width: 70%;height: auto;display: block;margin: 0 auto;margin-top: 10px;}
</style>
<script type="text/javascript">
  // 关注微信公众号二维码	 
function follow_wx()
{
	layer.open({
		type : 1,  
		title: '关注公众号',
		content: '<img src="<?php echo $wechat_config['qr']; ?>" width="200">',
		style: ''
	});
}
</script> 
<?php endif; ?>
<!--微信关注提醒  end-->
<!-- 微信浏览器 调用微信 分享js  end-->

    <script src="__PUBLIC__/js/jqueryUrlGet.js"></script>
    <script src="__STATIC__/js/jquery.lazyload.js"></script>
    <script>
      
     $(function(){
        
        $("img.lazy").lazyload({ threshold : 200 });
        // $(".taobao").on("click",function(){
        //   alert("升级中")
        // })
      })
    </script>
    <!--获取get参数插件-->
    <script> set_first_leader(); //设置推荐人 </script>

</body>
</html>