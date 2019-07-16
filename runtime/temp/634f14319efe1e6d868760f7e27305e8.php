<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:41:"./template/mobile/new/user\shareCode.html";i:1559477351;}*/ ?>
<!DOCTYPE html>
<html>

<head>
	<meta name="Generator" content="TPshop v1.1" />
	<meta charset="UTF-8">
	<title>分享二维码</title>
	<meta name="viewport"
		content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" type="text/css" href="__STATIC__/css/public.css" />
	<link rel="stylesheet" type="text/css" href="__STATIC__/css/index.css" />
	<link rel="stylesheet" href="__STATIC__/css/iconfont/iconfont.css">
	<!-- <link rel="stylesheet" href="__STATIC__/css/topdetail.css"> -->
	<script type="text/javascript" src="__STATIC__/js/jquery-3.1.1.min.js"></script>
	<script type="text/javascript" src="__STATIC__/js/TouchSlide.1.1.js"></script>
	<script type="text/javascript" src="__STATIC__/js/jquery.json.js"></script>
	<script type="text/javascript" src="__STATIC__/js/touchslider.dev.js"></script>
	<script type="text/javascript" src="__STATIC__/js/layer.js"></script>
	<script type="text/javascript" src="__STATIC__/js/utf.js"></script>
	<script type="text/javascript" src="__STATIC__/js/jquery.qrcode.js"></script>
	<script src="__PUBLIC__/js/global.js"></script>
	<script src="__PUBLIC__/js/mobile_common.js"></script>
	<style>
		.bottombt a {
			color: #ccc;
			font-size: 44px;
		}

		.bottombt {
			position: fixed;
			width: 95%;
			bottom: 10px;
			left: 0;
			padding: 0 10px
		}

		.shareCode img {
			max-width: 100%
		}

		.codebox {
			width: 135px;
			height: 135px;
			border: 4px solid #fff;
			border-radius: 10px;
			margin: 0 auto;
			/* position: absolute;
            top: 0;
            left: 50%; */
			margin-left: -64px;
		}

		.codeimg {
			width: 109px;
			height: 109px;
			margin: 0 auto;
			margin-top: 10px;
		}

		.codemsg {
			width: 186px;
			height: 20px;
			line-height: 20px;
			text-align: center;
			margin: 0 auto;
			margin-top: 8px;
			background: #fff;
			border-radius: 10px;
			/* position: absolute;
            top: 140px;
            left: 50%; */
			margin-left: -82px;
			box-shadow: 2px 4px 9px 1px rgba(0, 0, 0, .3);
		}

		.codemsg p:before {
			content: '';
			background: url("__STATIC__/images/newimg/usr/left.png") no-repeat;
			/*background: url("img/left.png") no-repeat;*/
			width: 10px;
			height: 10px;
			position: absolute;
			left: 10px;
			top: 50%;
			background-size: 100%;
			margin-top: -5px;
		}

		.codemsg p:after {
			content: '';
			background: url("__STATIC__/images/newimg/usr/left.png") no-repeat;
			/*background: url("img/left.png") no-repeat;*/
			width: 10px;
			height: 10px;
			position: absolute;
			right: 10px;
			top: 50%;
			background-size: 100%;
			margin-top: -5px;
		}

		.codewrap {
			position: absolute;
			bottom: 57px;
			left: 46.3%;
		}

		.iconfont.icon-fanhui2 {
			color: #fff;
			font-size: 28px
		}

		/* .tophead {
			height: 60px;
			line-height: 60px;
			color: #fff;
			padding: 0 10px;
		} */

		#canvasImg {
			width: 100%;
			height: 100%;
			background: #fff;
			overflow: hidden;
			display: block !important;
			position: absolute;
			top: 0;
			left: 0;
		}

		#canvas {
			width: 100%;
			height: 100%;
			border-radius: 10px;
		}

		.shareCode {
			background: url("__STATIC__/images/newimg/usr/codebgnew.png") no-repeat;
			background-size: 100% 100%;
			position: relative;
		}

		.shareCode>img {
			display: none;
		}

		#codeimg {
			display: none;
		}
	</style>
</head>

<body id="wrapper">
	<div class="wrap">
		<div class="maincolorbg flex jus-between align-c tophead">
			<a href="javascript:history.back(-1)" class="iconfont icon-fanhui2"></a>
			<p class="font-18">分享邀请码</p>
			<a href=""></a>
		</div>

		<div class="shareCode pos-r">
			<canvas id="canvas">请升级浏览器</canvas>
			<img id="canvasImg" src="" alt="">
			<img id="user_imgs" src="" alt="">
			<div id="qrcodeCanvas"></div>
			<img id="base" src="" alt="">
			<img src="" alt="" id="code">
			<img id="invitation_back" src="__STATIC__/images/newimg/usr/codebgnew.png" style="width: 100%;" />
			<div class="codewrap">
				<div id="codeimg"></div>
				<div class="codemsg hidden" id="codemsg">
					<p class="font-12  maincolor pos-r">你的邀请码： <span><?php echo $invitecode; ?></span></p>
				</div>
			</div>
		</div>
	</div>

</body>
<script type="text/javascript" src="__STATIC__/js/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="__STATIC__/js/TouchSlide.1.1.js"></script>
<script type="text/javascript" src="__STATIC__/js/jquery.json.js"></script>
<script type="text/javascript" src="__STATIC__/js/touchslider.dev.js"></script>
<script type="text/javascript" src="__STATIC__/layer/layer.js"></script>
<script type="text/javascript" src="__STATIC__/js/utf.js"></script>
<script type="text/javascript" src="__STATIC__/js/jquery.qrcode.js"></script>
<script src="__PUBLIC__/js/global.js"></script>
<script src="__PUBLIC__/js/mobile_common.js"></script>
<script src="__STATIC__/js/html2canvas.min.js"></script>
<script type="text/javascript">

	window.onload = function () {
		$("#codeimg").qrcode({
			render: "canvas", //设置渲染方式，有table和canvas，使用canvas方式渲染性能相对来说比较好
			text: "http://abc.fyc365.cn/mobile/User/reg.html?invite_id=" + '<?php echo $invitecode; ?>', //扫描二维码后显示的内容,可以直接填一个网址，扫描二维码后自动跳向该链接
			width: "109", //二维码的宽度
			height: "109", //二维码的高度
			background: "#FFFFFF", //二维码的后景色
			foreground: "#000000", //二维码的前景色
			src: "<?php echo $head_pic; ?>" //二维码中间的图片
		});
		var loding = layer.load(0, {
			offset: '35%'
		});
		var codeImg = '';
		var code='';
		setTimeout(function () {
			html2canvas(document.getElementById('codemsg')).then(function (canvas) {
                var imgUri = canvas.toDataURL("image/png").replace("image/png", "image/octet-stream"); // 获取生成的图片的url 　
				console.log(imgUri)
                $('#code').attr('src', imgUri)
            });
			
			var imgData = document.getElementById("codeimg").children[0].toDataURL("image/jpeg");
			$('#base').attr('src', imgData)
			code=document.getElementById('code');
			document.documentElement.style.fontSize = (document.documentElement.clientWidth / 750) * 100 + 'px';
			var height = $(this).height();
			$('.shareCode').css('height', height + 'px');
			codeImg = document.getElementById('base');
			var invitation_back = document.getElementById('invitation_back');
			$(".codemsg").removeClass("hidden")
		}, 500)

		function draw() {
			var canvas = document.getElementById('canvas');
			var ctx = canvas.getContext('2d');
			//  计算画布的宽度
			width = canvas.offsetWidth,
				//  计算画布的高度
				height = canvas.offsetHeight,
				//  设置宽高
				canvas.width = width;
			canvas.height = height;

			ctx.fillStyle = '#ffffff';
			ctx.fillRect(0, 0, width, height);
			ctx.drawImage(invitation_back, 0, 0, width, height);
			ctx.drawImage(codeImg, (width / 2) - (height * .2 / 2), height * .65, height * .18, height * .18);
			ctx.drawImage(code, (width / 2) - (height * .2 / 2), height * .65, height * .18, height * .18);
			ctx.font = '13px Arial';
			ctx.fillStyle = '#fff';
			ctx.fillText('长按识别二维码', (width / 2) - 52, height * .88);
			layer.close(loding);
		}

		setTimeout(function () {
			draw();
			var type = 'jpg';
			download(type);
		}, 1000)

		//图片下载操作,指定图片类型
		function download(type) {
			var canvas = document.getElementById('canvas');
			//设置保存图片的类型
			var imgdata = canvas.toDataURL(type);
			//将mime-type改为image/octet-stream,强制让浏览器下载
			var fixtype = function (type) {
				type = type.toLocaleLowerCase().replace(/jpg/i, 'jpeg');
				var r = type.match(/png|jpeg|bmp|gif/)[0];
				return 'image/' + r;
			}
			imgdata = imgdata.replace(fixtype(type), 'image/octet-stream')
			$('#canvasImg').attr('src', imgdata).css('display', 'block')
		}
	}


</script>

</html>