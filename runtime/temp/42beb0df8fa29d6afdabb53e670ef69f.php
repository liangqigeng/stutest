<?php /*a:1:{s:63:"D:\laragon\www\stutests\application\index\view\login\index.html";i:1592736014;}*/ ?>
﻿<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
  <!--[if lt IE 9]>
  <script type="text/javascript" src="/static/lib/html5shiv.js"></script>
  <script type="text/javascript" src="/static/lib/respond.min.js"></script>
<![endif]-->
<link href="/static/h-ui/css/H-ui.min.css" rel="stylesheet" type="text/css" />
<link href="/static/h-ui.admin/css/H-ui.login.css" rel="stylesheet" type="text/css" />
<link href="/static/h-ui.admin/css/style.css" rel="stylesheet" type="text/css" />
<link href="/static/lib/Hui-iconfont/1.0.8/iconfont.css" rel="stylesheet" type="text/css" />
  <!--[if IE 6]>
  <script type="text/javascript" src="/static/lib/DD_belatedPNG_0.0.8a-min.js" ></script>
  <script>DD_belatedPNG.fix('*');</script>
  <script type="text/javascript" src="/static/lib/jquery/1.9.1/jquery.min.js"></script>
<![endif]-->
<title>学生管理系统</title>
<meta name="keywords" content="H-ui.admin v3.1,H-ui网站后台模版,后台模版下载,后台管理系统模版,HTML后台模版下载">
<meta name="description" content="H-ui.admin v3.1，是一款由国人开发的轻量级扁平化网站后台模板，完全免费开源的网站后台管理系统模版，适合中小型CMS后台系统。">
</head>
<body>
<input type="hidden" id="TenantId" name="TenantId" value="" />
<div class="header"></div>
<div class="loginWraper">
  <div id="loginform" class="loginBox">
    <form class="form form-horizontal" action="" method="post">
      <div class="row cl">
        <label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe60d;</i></label>
        <div class="formControls col-xs-8">
          <input id="username" name="" type="text" placeholder="账户" class="input-text size-L">
        </div>
      </div>
      <div class="row cl">
        <label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe60e;</i></label>
        <div class="formControls col-xs-8">
          <input id="password" name="" type="password" placeholder="密码" class="input-text size-L">
        </div>
      </div>
<!--      <div class="row cl">-->
<!--        <div class="formControls col-xs-8 col-xs-offset-3">-->
<!--          <input class="input-text size-L" type="text" placeholder="验证码" onblur="if(this.value==''){this.value='验证码:'}" onclick="if(this.value=='验证码:'){this.value='';}" value="验证码:" style="width:150px;">-->
<!--          <img src=""> <a id="kanbuq" href="javascript:;">看不清，换一张</a> </div>-->
<!--      </div>-->
      <div class="row cl">
        <div class="formControls col-xs-8 col-xs-offset-3">
          <label for="online">
            <input type="checkbox" name="online" id="online" value="">
            使我保持登录状态</label>
        </div>
      </div>
      <div class="row cl">
        <div class="formControls col-xs-8 col-xs-offset-3">
          <input name="" type="button" onclick="checkLogin(this)" class="btn btn-success radius size-L" value="&nbsp;登&nbsp;&nbsp;&nbsp;&nbsp;录&nbsp;">
          <input name="" type="reset"   class="btn btn-default radius size-L" value="&nbsp;取&nbsp;&nbsp;&nbsp;&nbsp;消&nbsp;">
        </div>
      </div>
    </form>
  </div>
</div>
<div class="footer">Copyright 你的公司名称 by H-ui.admin v3.1</div>

<script type="text/javascript" src="/static/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="/static/lib/layer/2.4/layer.js"></script>
<script>
    function checkLogin(){
        var username = $('#username').val();
        var password = $('#password').val();
        if (username == '' || password == '') {
            layer.alert('账号名或密码不能为空', {
                icon: 2
            });
            return;
        }
        $.ajax({
            url: "<?php echo url('index/login/check'); ?>",
            type: 'post',
            dataType: 'json',
            data:  {
                username: username,
                password: password,
            },
            success: function(res) {
                console.log(res);
                if (res.code == 0) {
                    layer.msg(res.msg, {
                        offset: '15px',
                        icon: 5,
                        time:2000
                    });
                }else {
                    layer.msg(res.msg, {
                        offset: '20px',
                        icon: 6,
                        time:1000
                    },function(){
                        location.href = "<?php echo URL('index/index/index'); ?>"; //首页
                    })

                }
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                layer.alert('网络失败，请刷新页面后重试', {
                    icon: 2
                });
            }
        })
    }
    document.onkeydown = function(event) {
        e = event ? event : (window.event ? window.event : null);
        if (e.keyCode == 13) {
            checkLogin();
        }
    }
</script>
</body>
</html>