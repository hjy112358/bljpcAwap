<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:36:"./template/mobile/new/user\test.html";i:1560223076;}*/ ?>
<!DOCTYPE html>
<html>

<head lang="en">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport">
    <meta content="black" name="apple-mobile-web-app-status-bar-style">
    <meta content="false" name="twcClient" id="twcClient">
    <meta content="no-cache,must-revalidate" http-equiv="Cache-Control">
    <meta content="no-cache" http-equiv="pragma">
    <meta content="0" http-equiv="expires">
    <!--允许全屏模式-->
    <meta content="yes" name="apple-mobile-web-app-capable" />
    <!--指定sari的样式-->
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta content="telephone=no" name="format-detection" />
    <title>扫一扫</title>
    <script type="text/javascript" src="__STATIC__/js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="__STATIC__/js/qrcode.js"></script>
    <style>
        input[node-type=jsbridge] {
            display: none;
        }
    </style>
</head>

<body>
    <div>
        <div class="qr-btn" node-type="qr-btn" style="margin-top:100px">扫描二维码1
            <input node-type="jsbridge" type="file" name="myPhoto" value="扫描二维码1" />
        </div>
    </div>

</body>

<script type="text/javascript">
   //初始化扫描二维码按钮，传入自定义的 node-type 属性
   $(function() {
        Qrcode.init($('[node-type=qr-btn]'));
    });


    (function($) {
    var Qrcode = function(tempBtn) {
        var _this_ = this;
        var isWeiboWebView = /__weibo__/.test(navigator.userAgent);
 
        if (isWeiboWebView) {
            if (window.WeiboJSBridge) {
                _this_.bridgeReady(tempBtn);
            } else {
                document.addEventListener('WeiboJSBridgeReady', function() {
                    _this_.bridgeReady(tempBtn);
                });
            }
        } else {
            _this_.nativeReady(tempBtn);
        }
    };
 
    Qrcode.prototype = {
        nativeReady: function(tempBtn) {
            $('[node-type=jsbridge]',tempBtn).on('click',function(e){
                e.stopPropagation();
            });
 
            $(tempBtn).bind('click',function(e){
                $(this).find('input[node-type=jsbridge]').trigger('click');
            });
 
            $(tempBtn).bind('change', this.getImgFile);
        },
        bridgeReady: function(tempBtn) {
            $(tempBtn).bind('click', this.weiBoBridge);
        },
        weiBoBridge: function() {
            window.WeiboJSBridge.invoke('scanQRCode', null, function(params) {
                //得到扫码的结果
                $('.result-qrcode').append(params.result + '<br/>');
            });
        },
        getImgFile: function() {
            var _this_ = this;
            var inputDom = $(this).find('input[node-type=jsbridge]');
            var imgFile = inputDom[0].files;
            var oFile = imgFile[0];
            var oFReader = new FileReader();
            var rFilter = /^(?:image\/bmp|image\/cis\-cod|image\/gif|image\/ief|image\/jpeg|image\/jpeg|image\/jpeg|image\/pipeg|image\/png|image\/svg\+xml|image\/tiff|image\/x\-cmu\-raster|image\/x\-cmx|image\/x\-icon|image\/x\-portable\-anymap|image\/x\-portable\-bitmap|image\/x\-portable\-graymap|image\/x\-portable\-pixmap|image\/x\-rgb|image\/x\-xbitmap|image\/x\-xpixmap|image\/x\-xwindowdump)$/i;
 
            if (imgFile.length === 0) {
                return;
            }
 
            if (!rFilter.test(oFile.type)) {
                alert("选择正确的图片格式!");
                return;
            }
 
            oFReader.onload = function(oFREvent) {
 
                qrcode.decode(oFREvent.target.result);
                qrcode.callback = function(data) {
                    //得到扫码的结果
                    $('.result-qrcode').append(data + '<br/>');
                };
            };
 
            oFReader.readAsDataURL(oFile);
        },
        destory: function() {
            $(tempBtn).off('click');
        }
    };
 
    Qrcode.init = function(tempBtn) {
        var _this_ = this;
 
        tempBtn.each(function() {
            new _this_($(this));
        });
    };
    window.Qrcode = Qrcode;
})(window.Zepto ? Zepto : jQuery);

</script>

</html>