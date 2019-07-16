layui.use('table', function () {
  var table = layui.table;
  //Z券
  table.render({
    elem: '#allCouponZ'
    , even: true //开启隔行背景
    , data: [{
      "id": "123456"
      , "userimg": ""
      , "phone": "12345678912"
      , "name": "z券01"
      , "number": "3200"
      , "experience": "20"
      , "score": "20"
    }, {
      "id": "123456"
      , "userimg": ""
      , "phone": "12345678912"
      , "name": "z券02"
      , "number": "3200"
      , "experience": "20"
      , "score": "20"
    }, {
      "id": "10008"
      , "userimg": ""
      , "phone": "12345678912"
      , "name": "z券03"
      , "number": "3200"
      , "experience": "20"
      , "score": "20"
    }]
    , page: false //开启分页
    , cols: [[ //表头
      { field: 'id', title: 'ID', align: "center" }
      , { field: 'userimg', title: '头像', align: "center" }
      , { field: 'phone', title: '手机号', align: "center" }
      , { field: 'name', title: '姓名', align: "center" }
      , { field: 'number', title: '券总量', align: "center" }
      , { field: 'experience', title: '送多少', align: "center" }
      , { field: 'score', title: '剩多少', align: "center" }
      , {
        field: '', title: '操作', align: "center", templet: function () {
          return '<a href="javascript:void(0)">查看</a>'
        }
      }
    ]]
  });

  //余额券
  table.render({
    elem: '#allCouponBalance'
    , even: true //开启隔行背景
    , data: [{
      "id": "123456"
      , "userimg": ""
      , "phone": "12345678912"
      , "name": "余额券01"
      , "number": "3200"
      , "experience": "20"
      , "score": "20"
    }, {
      "id": "123456"
      , "userimg": ""
      , "phone": "12345678912"
      , "name": "余额券02"
      , "number": "3200"
      , "experience": "20"
      , "score": "20"
    }, {
      "id": "10008"
      , "userimg": ""
      , "phone": "12345678912"
      , "name": "余额券03"
      , "number": "3200"
      , "experience": "20"
      , "score": "20"
    }]
    , page: false //开启分页
    , cols: [[ //表头
      { field: 'id', title: 'ID', align: "center" }
      , { field: 'userimg', title: '头像', align: "center" }
      , { field: 'phone', title: '手机号', align: "center" }
      , { field: 'name', title: '姓名', align: "center" }
      , { field: 'number', title: '券总量', align: "center" }
      , { field: 'experience', title: '送多少', align: "center" }
      , { field: 'score', title: '剩多少', align: "center" }
      , {
        field: '', title: '操作', align: "center", templet: function () {
          return '<a href="javascript:void(0)">查看</a>'
        }
      }
    ]]
  });

  //万用券
  table.render({
    elem: '#allCouponUtility'
    , even: true //开启隔行背景
    , data: [{
      "id": "123456"
      , "userimg": ""
      , "phone": "12345678912"
      , "name": "万用券01"
      , "number": "3200"
      , "experience": "20"
      , "score": "20"
    }, {
      "id": "123456"
      , "userimg": ""
      , "phone": "12345678912"
      , "name": "万用券02"
      , "number": "3200"
      , "experience": "20"
      , "score": "20"
    }, {
      "id": "10008"
      , "userimg": ""
      , "phone": "12345678912"
      , "name": "万用券03"
      , "number": "3200"
      , "experience": "20"
      , "score": "20"
    }]
    , page: false //开启分页
    , cols: [[ //表头
      { field: 'id', title: 'ID', align: "center" }
      , { field: 'userimg', title: '头像', align: "center" }
      , { field: 'phone', title: '手机号', align: "center" }
      , { field: 'name', title: '姓名', align: "center" }
      , { field: 'number', title: '券总量', align: "center" }
      , { field: 'experience', title: '送多少', align: "center" }
      , { field: 'score', title: '剩多少', align: "center" }
      , {
        field: '', title: '操作', align: "center", templet: function () {
          return '<a href="javascript:void(0)">查看</a>'
        }
      }
    ]]
  });

  //荣誉券
  table.render({
    elem: '#allCouponHonor'
    , even: true //开启隔行背景
    , data: [{
      "id": "123456"
      , "userimg": ""
      , "phone": "12345678912"
      , "name": "荣誉券01"
      , "number": "3200"
      , "experience": "20"
      , "score": "20"
    }, {
      "id": "123456"
      , "userimg": ""
      , "phone": "12345678912"
      , "name": "荣誉券02"
      , "number": "3200"
      , "experience": "20"
      , "score": "20"
    }, {
      "id": "10008"
      , "userimg": ""
      , "phone": "12345678912"
      , "name": "荣誉券03"
      , "number": "3200"
      , "experience": "20"
      , "score": "20"
    }]
    , page: false //开启分页
    , cols: [[ //表头
      { field: 'id', title: 'ID', align: "center" }
      , { field: 'userimg', title: '头像', align: "center" }
      , { field: 'phone', title: '手机号', align: "center" }
      , { field: 'name', title: '姓名', align: "center" }
      , { field: 'number', title: '券总量', align: "center" }
      , { field: 'experience', title: '送多少', align: "center" }
      , { field: 'score', title: '剩多少', align: "center" }
      , {
        field: '', title: '操作', align: "center", templet: function () {
          return '<a href="javascript:void(0)">查看</a>'
        }
      }
    ]]
  });


  //注册券
  table.render({
    elem: '#allCouponRegister'
    , even: true //开启隔行背景
    , data: [{
      "id": "123456"
      , "userimg": ""
      , "phone": "12345678912"
      , "name": "注册券01"
      , "number": "3200"
      , "experience": "20"
      , "score": "20"
    }, {
      "id": "123456"
      , "userimg": ""
      , "phone": "12345678912"
      , "name": "注册券02"
      , "number": "3200"
      , "experience": "20"
      , "score": "20"
    }, {
      "id": "10008"
      , "userimg": ""
      , "phone": "12345678912"
      , "name": "注册券03"
      , "number": "3200"
      , "experience": "20"
      , "score": "20"
    }]
    , page: false //开启分页
    , cols: [[ //表头
      { field: 'id', title: 'ID', align: "center" }
      , { field: 'userimg', title: '头像', align: "center" }
      , { field: 'phone', title: '手机号', align: "center" }
      , { field: 'name', title: '姓名', align: "center" }
      , { field: 'number', title: '券总量', align: "center" }
      , { field: 'experience', title: '送多少', align: "center" }
      , { field: 'score', title: '剩多少', align: "center" }
      , {
        field: '', title: '操作', align: "center", templet: function () {
          return '<a href="javascript:void(0)">查看</a>'
        }
      }
    ]]
  });

  //挂售券
  table.render({
    elem: '#allCouponHang'
    , even: true //开启隔行背景
    , data: [{
      "id": "123456"
      , "userimg": ""
      , "phone": "12345678912"
      , "name": "挂售券01"
      , "number": "3200"
      , "experience": "20"
      , "score": "20"
    }, {
      "id": "123456"
      , "userimg": ""
      , "phone": "12345678912"
      , "name": "挂售券02"
      , "number": "3200"
      , "experience": "20"
      , "score": "20"
    }, {
      "id": "10008"
      , "userimg": ""
      , "phone": "12345678912"
      , "name": "挂售券03"
      , "number": "3200"
      , "experience": "20"
      , "score": "20"
    }]
    , page: false //开启分页
    , cols: [[ //表头
      { field: 'id', title: 'ID', align: "center" }
      , { field: 'userimg', title: '头像', align: "center" }
      , { field: 'phone', title: '手机号', align: "center" }
      , { field: 'name', title: '姓名', align: "center" }
      , { field: 'number', title: '券总量', align: "center" }
      , { field: 'experience', title: '送多少', align: "center" }
      , { field: 'score', title: '剩多少', align: "center" }
      , {
        field: '', title: '操作', align: "center", templet: function () {
          return '<a href="javascript:void(0)">查看</a>'
        }
      }
    ]]
  });


  //消费券
  table.render({
    elem: '#allCoupoSale'
    , even: true //开启隔行背景
    , data: [{
      "id": "123456"
      , "userimg": ""
      , "phone": "12345678912"
      , "name": "消费券01"
      , "number": "3200"
      , "experience": "20"
      , "score": "20"
    }, {
      "id": "123456"
      , "userimg": ""
      , "phone": "12345678912"
      , "name": "消费券02"
      , "number": "3200"
      , "experience": "20"
      , "score": "20"
    }, {
      "id": "10008"
      , "userimg": ""
      , "phone": "12345678912"
      , "name": "消费券03"
      , "number": "3200"
      , "experience": "20"
      , "score": "20"
    }]
    , page: false //开启分页
    , cols: [[ //表头
      { field: 'id', title: 'ID', align: "center" }
      , { field: 'userimg', title: '头像', align: "center" }
      , { field: 'phone', title: '手机号', align: "center" }
      , { field: 'name', title: '姓名', align: "center" }
      , { field: 'number', title: '券总量', align: "center" }
      , { field: 'experience', title: '送多少', align: "center" }
      , { field: 'score', title: '剩多少', align: "center" }
      , {
        field: '', title: '操作', align: "center", templet: function () {
          return '<a href="javascript:void(0)">查看</a>'
        }
      }
    ]]
  });



});



$(function(){
  var element = layui.element;
        TouchSlide({ slideCell: "#addmodule" });
  $(".addModule").on("click",function(){
    $(".addmoduleWrap").removeClass("hidden");
    $(".addtitle").val("");
    $(".addContent").val("");

  })

  $(".cancel").on("click",function(){
    $(".addmoduleWrap").addClass("hidden");
    $(".addtitle").val("");
    $(".addContent").val("");
  })


  $(".sure").on("click",function(){
    var name=$(".addtitle").val();
    $(".modulelist .addModule").before('<li>'+name+'</li>')
    $(".addmoduleWrap").addClass("hidden");
    $(".addtitle").val("");
    $(".addContent").val("");
  })


  
  
})