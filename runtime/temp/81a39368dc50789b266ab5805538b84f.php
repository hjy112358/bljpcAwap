<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:45:"./application/seller/new/admin\sellerReg.html";i:1560321963;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="/public/assets/css/layui.css" type="text/css">
    <link rel="stylesheet" href="/public/assets/css/mypublic.css" type="text/css">
    <link rel="stylesheet" href="/public/assets/css/view.css" type="text/css" />
    <link rel="stylesheet" href="/public/assets/css/setting/approve.css?time=<?php echo time()?>" type="text/css">
    <script src="/public/assets/js/jquery-3.1.1.min.js" type="text/javascript"></script>
    <title></title>
    <style>
        .loginOut {
            cursor: pointer;
        }
    </style>
</head>

<body class="">
    <div class="regHead ">
        <p class="font-20 ">必量家<span class="font-16">卖家申请中心</span></p>
        <div class="headmsg  clearfix">
            <p class="fl">你好,<?php echo $user_info['nickname']; ?></p>
            <p class="fl loginOut">退出</p>
            <img src="<?php echo $user_info['head_pic']; ?>" alt="">
            <input type="hidden" id="islogin" value="<?php echo $user_info['islogin']; ?>">
        </div>
    </div>
    <div class="rowrap">
        <div class=" rowbox">
            <div class="applybox">
                <h3>我要开店</h3>
                <div class="step ">
                    <ul class="clearfix">
                        <li class="on ">
                            <div class="stepWrap">
                                <div class=" font-36">1</div>
                                <div class="stepDetail">
                                    <p class=" font-13">阅读开店须知</p>
                                    <p class="font-13 stepmsg">确认自己符合规定</p>

                                </div>
                            </div>
                        </li>
                        <li class="">
                            <div class="stepWrap">
                                <div class=" font-36">2</div>
                                <div class="stepDetail">
                                    <p class="font-13">入驻信息</p>
                                    <p class="font-13 stepmsg">企业店铺</p>
                                </div>
                            </div>
                        </li>
                        <li class="">
                            <div class="stepWrap">
                                <div class=" font-36">3</div>
                                <div class="stepDetail">
                                    <p class="font-13">公司信息</p>
                                    <p class="font-13 stepmsg">填写公司信息</p>
                                </div>
                            </div>
                        </li>
                        <li class="">
                            <div class="stepWrap">
                                <div class=" font-36">4</div>
                                <div class="stepDetail">
                                    <p class="font-13">店铺信息</p>
                                    <p class="font-13 stepmsg">填写店铺信息</p>
                                </div>
                            </div>
                        </li>
                        <li class="stepThree">
                            <div class="stepWrap">
                                <div class=" font-36">5</div>
                                <div class="stepDetail">
                                    <p class="font-13">审核</p>
                                    <p class="font-13 stepmsg">等待审核通过</p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <!-- 开店须知 -->
                <div class="noticebox ">
                    <p>用户使用“必量家商城商家在线入驻系统”前请认真阅读并理解本协议内容，本协议内容中以加粗方式显著标识的条款，请用户着重阅读、慎重考虑。
                    </p>
                    <p>1.本协议的订立 </p>
                    <p>在本网站（http://abc.fyc365.cn/）登记注册，且符合本网站商家入驻标准的用户（以下简称“商家”），在同意本协议全部条款后，方有资格使用“必量家商城商家在线入驻系统”（以下简称“入驻系统”）申请入驻。一经商家点击“同意以上协议，下一步”按键，即意味着商家同意与本网站签订本协议并同意受本协议约束。 </p>
                    <p>2.入驻系统使用说明</p>
                    <p>2.1 商家通过入驻系统提出入驻申请，并按照要求填写商家信息、提供商家资质资料后，由本网站审核并与有合作意向的商家联系协商合作相关事宜，经双方协商一致线下签订书面《必量家商城商家入驻协议》（以下简称“协议”）且商家按照“协议”约定充值相应押金及保证金等必要费用后，商家正式入驻本网站。本网站将为入驻商家开通商家后台系统（网址为:  http://abc.fyc365.cn/Seller/)，商家可通过商家后台系统在本网站运营自己的入驻店铺。 </p>
                    <p>2.2 商家以及本网站通过入驻系统做出的申请、资料提交及确认等各类沟通，仅为双方合作的意向以及本网站对商家资格审核的必备程序，除遵守本协议各项约定外，对双方不产生法律约束力。双方间最终合作事宜及运营规则均以“协议”的约定及商家后台系统公示的各项规则为准。 </p>
                    <p>3.商家权利义务 </p>
                    <p>3.1 商家应查看本网站公示的入驻商家标准，并确保资质符合本网站公示的基本要求，商家知悉并理解本网站将结合自身业务发展情况对商家进行选择。 </p>
                    <p>3.2 商家应按照本网站要求诚信提供入驻申请所需资料并如实填写相关信息，商家应确保提供的申请资料及信息真实、准确、完整、合法有效，经本网站审核通过后，商家不得擅自修改替换相应资料及主要信息。如商家提供的申请资料及信息不合法、不真实、不准确的，商家需承担因此引起的相应责任及后果，并且本网站有权立即终止商家使用入驻系统的权利。 </p>
                    <p>3.3 商家使用入驻系统提交的所有内容应不含有木马等软件病毒、政治宣传、或其他任何形式的“垃圾信息”、违法信息，且商家应按本网站规则使用入驻系统，不得从事影响或可能影响本网站或入驻系统正常运营的行为，否则，本网站有权清除前述内容，并有权立即终止商家使用入驻系统的权利。 </p>
                    <p>3.4 商家应注意查看入驻系统公示的入驻申请结果，如审核通过的商家，则按照本网站工作人员的通知按要求办理入驻的相关手续；如审批未通过的商家，则可自本网站通过入驻系统将审批结果告知商家（需商家登陆入驻系统查看）之日起15 日内提出异议并提供相应资料，如审批仍未通过的，则商家同意提交的申请资料及信息本网站无需返还，由本网站自行处理。</p>
                    <p>3.5 商家不得以任何形式擅自转让或授权他人使用自己在本网站的用户帐号使用入驻系统，否则由此产生的不利后果均由商家自行承担。</p>
                    <p>4.本网站权利义务 </p>
                    <p>4.1 本网站开发的入驻系统仅为商家申请入驻的平台，商家正式入驻后，将在商家后台系统中运营本网站的入驻店铺。 </p>
                    <p>4.2 本网站有权对商家提供的资料及信息进行审核，并有权结合自身业务情况对合作商家进行选择；本网站对商家提交资料及信息的审核均不代表本网站对审核内容的真实、合法、准确、完整性作出的确认，商家应对提供资料及信息承担相应的法律责任。 </p>
                    <p>4.3 无论商家是否通过本网站的审核，本网站有权对商家提供的资料及信息予以留存并随时查阅，同时，本网站有义务对商家提供的资料予以保密，但国家行政机关、司法机关等国家机构调取资料的除外。 </p>
                    <p>4.4 本网站会尽力维护本系统信息的安全，但法律规定的不可抗力，以及因为黑客入侵、计算机病毒侵入发作等原因造成商家资料泄露、丢失、被盗用、被篡改的，本网站不承担任何责任。 </p>
                    <p>4.5 本网站应在现有技术支持的基础上确保入驻系统的正常运营，尽量避免入驻系统服务的中断给商家带来的不便。</p>
                    <p>5.知识产权 </p>
                    <p>5.1 本网站开发的入驻系统及其包含的各类信息的知识产权归本网站所有者所有，受国家法律保护,本网站有权不时地对入驻系统的内容进行修改，并在入驻系统中公示，无须另行通知商家。 </p>
                    <p>5.2 在法律允许的最大限度范围内，本网站所有者对本协议及入驻系统涉及的内容拥有解释权。</p>
                    <p>5.3 商家未经本网站所有者书面许可，不得擅自使用、非法全部或部分的复制、转载、抓取入驻系统中的信息，否则由此给本网站造成的损失，商家应予以全部赔偿。 </p>
                    <p>6.入驻系统服务的终止</p>
                    <p>6.1 商家自行终止入驻申请，或商家经本网站审批未通过的，则入驻系统服务自行终止。 </p>
                    <p>6.2 商家使用本网站或入驻系统时，如违反相关法律法规或者违反本协议规定的，本网站有权随时终止商家使用入驻系统。</p>
                    <p>7.本协议的修改 </p>
                    <p>本协议可由本网站随时修订，并将修订后的协议公告于本网站及入驻系统，修订后的条款内容与本协议相冲突的，以补充、修改后的内容为准。</p>
                        <!-- <p style=" min-height: 200px; text-align: center; margin-top: 100px;font-size: 20px;">完善中</p> -->
                        <div class="noticeBtn">
                            <!-- <a href="javascript:void(0)" style="margin-right:120px;background:#fcb7b7"
                                class="lastStep">上一步</a> -->
                            <a href="<?php echo url('admin/sellerRegTwo'); ?>" class="nextStep">我已了解，继续开店</a>
                        </div>
                </div>


            </div>
        </div>
    </div>
    <script src="/public/assets/layui.all.js" type="text/javascript"></script>
    <script src="/public/assets/js/TouchSlide.1.1.js" type="text/javascript"></script>

</body>
<script>


    $(function () {
        $.ajax({
            url: "<?php echo U('admin/getloginstatus'); ?>",
            type: "POST",
            success: function (res) {
                if (res == false) {
                    $('.loginOut').html('');
                }
            }
        })
    })
    $('.loginOut').click(function () {
        $.ajax({
            url: "<?php echo U('admin/loginstatusout'); ?>",
            type: "POST",
            success: function (res) {
                if (res == true) {
                    alert('已退出账户');
                    window.location.reload();
                }
            }
        })
    })
    $(".newperson").on("click", function () {
        // var islogin = $('#islogin').val();
        // if (islogin == 0) {
        //     alert('请先登录');
        //     window.location.href = 'loginNew.html';
        //     return false;
        // }
      

    })


</script>

</html>