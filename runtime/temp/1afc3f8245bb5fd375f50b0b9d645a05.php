<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:48:"./application/seller/new/freight\newfreight.html";i:1562664245;}*/ ?>
<link rel="stylesheet" href="/public/assets/css/freight.css?time=<?php echo time()?>" type="text/css">
<div class="afreightbox">
    <p class="afreightitle">新增运费模板</p>
    <form action="">
        <div class="formbox">
            <label for="">模板名称：</label>
            <input type="text">
            <span class="errmsg">错误提示</span>
        </div>
        <div class="formbox">
            <label for=""><i>*</i>宝贝地址：</label>
            <select name="" id="">
                <option value="">江苏省</option>
            </select>
            <select name="" id="">
                <option value="">南通市</option>
            </select>
            <span class="errmsg"></span>
        </div>

        <div class="formbox formboxradio1">
            <input type="hidden" id="isfred" value="0">
            <label for=""><i>*</i>是否包邮：</label>
            <div class="radio-inline">
                <input type="radio" name="freight" value="0" id="userDefind" checked />
                <label for="userDefind">自定义运费</label>
            </div>
            <div class="radio-inline">
                <input type="radio" name="freight" value="1" id="sellerTake" />
                <label for="sellerTake">卖家承担运费</label>
            </div>
            <span class="errmsg"></span>
        </div>
        <div class="formbox  formboxradio2">
            <input type="hidden" data-type="0" class="feitypes" value="0">
            <label for=""><i>*</i>计价方式：</label>
            <div class="radio-inline">
                <input type="radio" name="valuation" value="0" id="cout" checked />
                <label for="cout">按件数</label>
            </div>
            <div class="radio-inline">
                <input type="radio" name="valuation" value="1" id="weight" />
                <label for="weight">按重量</label>
            </div>
            <div class="radio-inline">
                <input type="radio" name="valuation" value="2" id="volume" />
                <label for="volume">按体积</label>
            </div>
            <span class="errmsg"></span>
        </div>
        <div class='formbox formboxbottom'>
            <label for="" class="formboxleft">运送方式：</label>
            <div class="formboxright">
                <p>除指定地区外，其余地区的运费采用“默认运费”</p>
                <div class="checkbox-inline">
                    <input type="checkbox" id="express">
                    <label for="express">快递</label>
                    <div class="addcondition addcondite hidden">
                        <div class="addconditionbox">
                            <div class="basecondition">
                                <p>默认运费
                                    <input type="text" value="1">
                                    <span class="changeUnit">件</span>内
                                    <input type="text"> 元
                                    , 每增加
                                    <input type="text" value="1">
                                    <span class="changeUnit">件</span>
                                    , 增加运费
                                    <input type="text">
                                    元
                                </p>
                            </div>
                            <div class="conditionlist">
                                <table cellspacing="0" class="expresstable">
                                    <thead>
                                        <tr>
                                            <th width="100" style="text-align: left">运送到</th>
                                            <th width="30"></th>
                                            <th width="75">首<span class="changetext">件</span>(<span
                                                    class="changeUnit">件</span>)</th>
                                            <th width="75">首费(元)</th>
                                            <th width="75">续<span class="changetext">件</span>(<span
                                                    class="changeUnit">件</span>)</th>
                                            <th width="75">续费(元)</th>
                                            <th width="25">操作</th>
                                        </tr>
                                    </thead>
                                    <tbody id="expresstablebody">
                                        <tr>
                                            <td style="text-align: left;" class="arealist">未添加地区</td>
                                            <td><a href="javascript:void(0)" onclick="edit(this)">编辑</a></td>
                                            <td><input type="text"></td>
                                            <td><input type="text"></td>
                                            <td><input type="text"></td>
                                            <td><input type="text"></td>
                                            <td><a href="javascript:void(0)" onclick="del(this)">删除</a></td>
                                        </tr>
                                    </tbody>

                                </table>
                            </div>
                        </div>
                        <p class="opabtn">
                            <span class="appoint">为指定地区城市设置运费</span>
                            <!-- <span class="batch">批量操作</span> -->
                        </p>
                    </div>
                </div>


            </div>
        </div>

        <div class='formbox formapoint' style="margin-top:15px;overflow: hidden;">
            <div class="formboxright">
                <div class="checkbox-inline">
                    <input type="checkbox" id="apoint">
                    <label for="apoint">指定条件包邮(可选)</label>
                    <div class="addcondition addapoint hidden">
                        <div class="addconditionbox">
                            <div class="conditionlist">
                                <table cellspacing="0" class="apointable">
                                    <thead>
                                        <tr>
                                            <th width="150" style="text-align: left">选择地区</th>
                                            <th width="30"></th>
                                            <th width="100">选择运送方式</th>
                                            <th width="100">设置包邮条件</th>
                                            <th width="100">操作</th>
                                        </tr>
                                    </thead>
                                    <tbody id="apointable">
                                        <tr>
                                            <td style="text-align: left;" class="arealist">未添加地区</td>
                                            <td><a href="javascript:void(0)" onclick="edit(this)">编辑</a></td>
                                            <td>快递</td>
                                            <td>
                                                <select name="" id="" class="onetype" onchange="changesele(this)">
                                                    <option value="0">件</option>
                                                    <option value="1">金额</option>
                                                    <option value="2">件+金额</option>
                                                </select>
                                                <p class="apontype01">满 <input type="text"><span
                                                        class="changeUnit">件</span>包邮</p>
                                                <p class="apontype02 hidden">满 <input type="text">元包邮</p>
                                                <p class="apontype03 hidden">在<input type="text"><span
                                                        class="changeUnit">件</span>内，<input type="text">元以上</span>包邮</p>
                                            </td>

                                            <td class="apointbtn">
                                                <a href="javascript:void(0)" onclick="delpoint(this)">删除</a>
                                            </td>
                                        </tr>
                                    </tbody>

                                </table>
                            </div>
                        </div>
                        <p class="opabtn">
                            <span class="addpoint" onclick="addpoint()">为指定地区城市设置运费</span>
                            <!-- <span class="batch">批量操作</span> -->
                        </p>
                    </div>
                </div>


            </div>
        </div>
        <div class="addnewbtn">
            <a href="javascript:void(0)">保存</a>
        </div>
    </form>

    <div class="mark hidden">
        <form action="" class="markform">
            <div class="chooseCity">
                <div class="cityTitle">
                    <span>选择区域</span>
                    <a href="javascript:void(0)" class="close">
                        <span>X</span>
                    </a>
                </div>
                <div class="citybox">
                    <ul>
                        <li data-check="none">
                            <div class="affiliatte checkinput">
                                <div class="affiliattewrap">
                                    <input type="checkbox" id="sh" data-name="上海" data-nameid="01"
                                        onclick="checkchange(this)">
                                    <label for="sh">上海<span class="checkcout"></span></label>
                                </div>
                                <div class="showlistbtn" onclick="showopen(this)" data-type="down">
                                    <img src="/public/static/images/btndown.png" alt="" width="15" height="10"
                                        class="showlist showdown">
                                    <img src="/public/static/images/btnup.png" alt="" width="15" height="10"
                                        class="showlist showup hidden">
                                </div>
                            </div>
                            <div class="affiliattelist hidden">
                                <div class="checkinput">
                                    <input type="checkbox" id="shs" data-name="上海市">
                                    <label for="shs">上海市</label>
                                </div>
                            </div>
                        </li>
                        <li data-check="none">
                            <div class="affiliatte checkinput">
                                <div class="affiliattewrap">
                                    <input type="checkbox" id="js" data-name="江苏省" data-nameid="02"
                                        onclick="checkchange(this)">
                                    <label for="js">江苏省<span class="checkcout"></span></label>
                                </div>
                                <div class="showlistbtn" onclick="showopen(this)" data-type="down">
                                    <img src="/public/static/images/btndown.png" alt="" width="15" height="10"
                                        class="showlist showdown">
                                    <img src="/public/static/images/btnup.png" alt="" width="15" height="10"
                                        class="showlist showup hidden">
                                </div>
                            </div>
                            <div class="affiliattelist hidden">
                                <div class="checkinput">
                                    <input type="checkbox" id="njs" data-name="南京市">
                                    <label for="njs">南京市</label>
                                </div>
                                <div class="checkinput">
                                    <input type="checkbox" id="nts" data-name="南通市">
                                    <label for="nts">南通市</label>
                                </div>
                            </div>
                        </li>
                        <li data-check="none">
                            <div class="affiliatte checkinput">
                                <div class="affiliattewrap">
                                    <input type="checkbox" id="zjs" data-name="浙江省" data-nameid="03"
                                        onclick="checkchange(this)">
                                    <label for="zjs">浙江省<span class="checkcout"></span></label>
                                </div>
                                <div class="showlistbtn" onclick="showopen(this)" data-type="down">
                                    <img src="/public/static/images/btndown.png" alt="" width="15" height="10"
                                        class="showlist showdown">
                                    <img src="/public/static/images/btnup.png" alt="" width="15" height="10"
                                        class="showlist showup hidden">
                                </div>
                            </div>
                            <div class="affiliattelist hidden">
                                <div class="checkinput">
                                    <input type="checkbox" id="hzs" data-name="杭州市">
                                    <label for="hzs">杭州市</label>
                                </div>
                                <div class="checkinput">
                                    <input type="checkbox" id="nbs" data-name="宁波市">
                                    <label for="nbs">宁波市</label>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="btnlist">
                    <a href="javascript:void(0)" class="save">保存</a>
                    <a href="javascript:void(0)" class="cancle">取消</a>
                </div>

            </div>
        </form>
    </div>
    <input type="hidden" id="namelist">


</div>
<script type="text/javascript" src="__PUBLIC__/static/js/jquery-3.1.1.min.js"></script>
<script>

    // 运送方式input
    $("#express").on("click", function () {
        var _this = $(this)
        var type = $("#isfred").val()
        if (_this.prop("checked") == true) {
            if (type == 0) {
                $(".addcondite").removeClass("hidden")
            }
        } else {
            $(".addcondite").addClass("hidden")
        }
    })
    // 运送方式删除
    function del(index) {
        var _this = $(index);
        console.log(_this)
        _this.parent().parent("tr").remove()
    }
    // 运送方式 添加指定条件
    $(document).on("click", ".appoint", function () {
        var html = '<tr>' +
            '<td style="text-align: left;" class="arealist">未添加地区</td>' +
            '<td><a href="javascript:void(0)" onclick="edit(this)">编辑</a></td>' +
            '<td><input type="text"></td>' +
            '<td><input type="text"></td>' +
            '<td><input type="text"></td>' +
            '<td><input type="text"></td>' +
            '<td><a href="javascript:void(0)" onclick="del(this)">删除</a></td>' +
            '</tr>';
        $(".expresstable tbody").append(html)
    })

    // 指定条件input
    $("#apoint").on("click", function () {
        var _this = $(this)
        if (_this.prop("checked") == true) {
            $(".addapoint").removeClass("hidden")
        } else {
            $(".addapoint").addClass("hidden")
        }
    })
    // 指定包邮 添加指定条件
    function addpoint() {
        var text = $(".feitypes").val();
        var nowtext = '', nowunit = ''
        if (text == '0') {
            nowtext = "件"
            nowunit="件"
        } else if (text == '1') {
            nowtext = "重量"
            nowunit = "kg"
        } else if (text == '2') {
            nowtext = "体积"
            nowunit = "m3"
        }
        var html = '<tr>' +
            '<td style="text-align: left;"  class="arealist">未添加地区</td>' +
            '<td><a href="javascript:void(0)" onclick="edit(this)">编辑</a></td>' +
            '<td>快递</td>' +
            '<td>' +
            '<select name="" id="" class="onetype" onchange="changesele(this)">' +
            '<option value="0">' + nowtext + '</option>' +
            '<option value="1">金额</option>' +
            '<option value="2">' + nowtext + '+金额</option>' +
            '</select>' +
            '<p class="apontype01 ">满 <input type="text"><span class="changeUnit">' + nowunit + '</span>包邮</p>' +
            '<p class="apontype02 hidden">满 <input type="text">元包邮</p>' +
            '<p class="apontype03 hidden">在<input type="text"><span class="changeUnit">' + nowunit + '</span>内，<input type="text">元以上</span>包邮</p>' +
            '</td>' +
            '<td class="apointbtn">' +
            '<a href="javascript:void(0)" onclick="delpoint(this)">删除</a>' +
            '</td>' +
            '</tr>';
        $(".apointable tbody").append(html)

    }
    // 指定包邮 删除指定条件
    function delpoint(index) {
        var _this = $(index);
        console.log(_this)
        _this.parent().parent("tr").remove()
    }

    //计价方式切换    
    $(".formboxradio2 input").on("click", function () {
        var _this = $(this);
        var freitype = _this.val();
        $(".feitypes").val(freitype)
        if (freitype == '0') {
            $(".changetext").html("件");
            var html = '<option value="0">件</option>' +
                '<option value="1">金额</option>' +
                '<option value="2">件+金额</option>';
            $(".onetype").html(html)
        } else if (freitype == '1') {
            $(".changetext").html("重量")
            $(".changeUnit").html("kg")
            var html = '<option value="0">重量</option>' +
                '<option value="1">金额</option>' +
                '<option value="2">重量+金额</option>';
            $(".onetype").html(html)
        } else if (freitype == '2') {
            $(".changetext").html("体积")
            $(".changeUnit").html("m3")
            var html = '<option value="0">体积</option>' +
                '<option value="1">金额</option>' +
                '<option value="2">体积+金额</option>';
            $(".onetype").html(html)
        }
        $("#expresstablebody").load(location.href + " #expresstablebody")
        $("#apointable").load(location.href + " #expresstablebody")
        $("#express").prop("checked", false)
        $(".addcondite").addClass("hidden")
        $("#apoint").prop("checked", false)
        $(".addapoint").addClass("hidden")

    })
    // 是否包邮切换
    $(".formboxradio1 input").on("click", function () {
        var _this = $(this);
        var freitype = _this.val();
        $("#isfred").val(freitype)
        if (freitype == '0') {
            $(".formapoint").removeClass("hidden")
        } else if (freitype == '1') {
            $(".formapoint").addClass("hidden")
        }
        $("#expresstablebody").load(location.href + " #expresstablebody")
        $("#apointable").load(location.href + " #expresstablebody")
        $("#express").prop("checked", false)
        $(".addcondite").addClass("hidden")
        $("#apoint").prop("checked", false)
        $(".addapoint").addClass("hidden")

    })
    // 弹窗关闭
    $(document).on("click", ".close", function () {
        $(".mark").addClass("hidden")
        markreload()
    })
    // 弹窗关闭
    $(document).on("click", ".cancle", function () {
        $(".mark").addClass("hidden")
        markreload()
    })
    // 选择城市
    function edit(index) {
        var _thisbox = $(index)
        console.log(_thisbox)
        $(".mark").removeClass("hidden");
        // 确认选择的城市
        $(document).one('click', ".save", function () {
            var namelist = [], names = '';
            $(".citybox ul li").each(function () {
                var _this = $(this);
                var ischeckall = _this.find(".affiliattewrap input").prop('checked');
                if (ischeckall == true) {
                    var name = _this.find(".affiliattewrap input").attr("data-name")
                    namelist.push(name)
                    _this.attr("data-check", "all")
                } else {
                    _this.find('.checkinput').each(function () {
                        var _this1 = $(this);
                        var checkall = _this.attr("data-check")
                        var ischecked = _this1.find("input").prop('checked');
                        if (ischecked == true) {
                            var name1 = _this1.find("input").attr("data-name")
                            namelist.push(name1)
                        }
                    })
                }
            })
            $(".mark").addClass("hidden")
            markreload()
            names = namelist.join(",")
            $("#namelist").val(names)
            _thisbox.parent("td").prev(".arealist").html(names)
        })
    }
    // 显示市级
    function showopen(index) {
        var _this = $(index);
        var datatype = _this.attr("data-type");
        if (datatype == 'down') {
            _this.attr("data-type", "up");
            _this.prev(".affiliattewrap").addClass("active")
            _this.parent().next().removeClass("hidden")
        } else {
            _this.attr("data-type", "down");
            _this.prev(".affiliattewrap").removeClass("active")
            _this.parent().next().addClass("hidden")
        }
    }
    // 省级
    function checkchange(index) {
        var _this = $(index);
        var checkstatus = _this.prop("checked")
        if (checkstatus == true) {
            _this.closest("li").find(".affiliattelist input").prop("checked", true)
        } else {
            _this.closest("li").find(".affiliattelist input").prop("checked", false)
        }
    }

    function markreload() {
        $(".citybox input").prop('checked', false);
        $(".citybox ul li").each(function (i, v) {
            $(v).find(".affiliattewrap").removeClass("active")
            $(v).find(".affiliattelist").addClass("hidden")
        })
    }


    function changesele(index){
        var _this = $(index)
            if (_this.val() == '0') {
                _this.parent().find(".apontype01").removeClass("hidden")
                _this.parent().find(".apontype02").addClass("hidden")
                _this.parent().find(".apontype03").addClass("hidden")
            } else if (_this.val() == '1') {
                _this.parent().find(".apontype01").addClass("hidden")
                _this.parent().find(".apontype02").removeClass("hidden")
                _this.parent().find(".apontype03").addClass("hidden")
            } else {
                _this.parent().find(".apontype01").addClass("hidden")
                _this.parent().find(".apontype02").addClass("hidden")
                _this.parent().find(".apontype03").removeClass("hidden")
            }
    }
    
</script>