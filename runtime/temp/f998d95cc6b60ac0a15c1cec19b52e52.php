<?php /*a:3:{s:63:"D:\laragon\www\stutests\application\index\view\grade\index.html";i:1592761802;s:65:"D:\laragon\www\stutests\application\index\view\public\header.html";i:1592569204;s:65:"D:\laragon\www\stutests\application\index\view\public\bottom.html";i:1592545332;}*/ ?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="Bookmark" href="/favicon.ico" >
    <link rel="Shortcut Icon" href="/favicon.ico" />
    <!--[if lt IE 9]>
    <script type="text/javascript" src="/static/lib/html5shiv.js"></script>
    <script type="text/javascript" src="/static/lib/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="/static/h-ui/css/H-ui.min.css" />
    <link rel="stylesheet" type="text/css" href="/static/h-ui.admin/css/H-ui.admin.css" />
    <link rel="stylesheet" type="text/css" href="/static/lib/Hui-iconfont/1.0.8/iconfont.css" />
    <link rel="stylesheet" type="text/css" href="/static/h-ui.admin/skin/green/skin.css" id="skin" />
    <link rel="stylesheet" type="text/css" href="/static/h-ui.admin/css/style.css"/>
    <!--[if IE 6]>
    <script type="text/javascript" src="/static/lib/DD_belatedPNG_0.0.8a-min.js" ></script>
    <script>DD_belatedPNG.fix('*');</script>
    <![endif]-->
    <title>学生管理系统</title>
    <meta name="keywords" content="H-ui.admin v3.1,H-ui网站后台模版,后台模版下载,后台管理系统模版,HTML后台模版下载">
    <meta name="description" content="H-ui.admin v3.1，是一款由国人开发的轻量级扁平化网站后台模板，完全免费开源的网站后台管理系统模版，适合中小型CMS后台系统。">
</head>
<script type="text/javascript" src="/static/lib/laypage/1.2/skin/laypage.css"></script>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 班级管理 <span class="c-gray en">&gt;</span> 班级列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="pd-20">
  <div class="cl pd-5 bg-1 bk-gray mt-20">
    <a href="javascript:;" onclick='grade_add("添加班级","<?php echo url('index/grade/add'); ?>","550","")' class="btn btn-primary radius"><i class="icon-plus"></i> 添加班级</a></span>
  </div>
  <table class="table table-border table-bordered table-hover table-bg table-sort">
    <thead>
      <tr class="text-c">
        <th width="25"><input type="checkbox" name="" value=""></th>
        <th width="80">序号</th>
        <th width="100">班级</th>
        <th width="40">班级人数</th>
        <th width="100">操作</th>
      </tr>
    </thead>
    <tbody>
    <?php if(is_array($grade) || $grade instanceof \think\Collection || $grade instanceof \think\Paginator): $i = 0; $__LIST__ = $grade;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
        <tr class="text-c">
          <td><input type="checkbox" value="<?php echo htmlentities($v['gid']); ?>" name=""></td>
          <td><?php echo htmlentities($v['gid']); ?></td>
          <td><?php echo htmlentities($v['g_name']); ?></td>
          <td><?php echo htmlentities($v['c']); ?></td>
          <td class="f-14 user-manage"><a title="编辑" href="javascript:;" onclick='grade_edit("编辑","<?php echo url('index/grade/edit',['gid'=>$v['gid']]); ?>","550","")' class="ml-5" style="text-decoration:none"><i class="Hui-iconfont Hui-iconfont-edit"></i></a>
            <a title="删除" href="javascript:;" onclick='grade_del(this,"<?php echo htmlentities($v['gid']); ?>")' class="ml-5" style="text-decoration:none"><i class="Hui-iconfont Hui-iconfont-del2"></i></a>
          </td>
        </tr>
    <?php endforeach; endif; else: echo "" ;endif; ?>
    </tbody>
  </table>
  <div id="pageNav" class="pageNav"></div>
</div>

<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/static/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/static/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->



<!--此乃百度统计代码，请自行删除-->
<script>
    var _hmt = _hmt || [];
    (function() {
        var hm = document.createElement("script");
        hm.src = "https://hm.baidu.com/hm.js?080836300300be57b7f34f4b3e97d911";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
    })();
</script>
<!--/此乃百度统计代码，请自行删除-->
</body>
</html>
<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/static/lib/datatables/1.10.0/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="/static/lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript">
  $(function () {
    $(".table-sort").DataTable({
      // 分页,默认打开
      // paging: true,
    });
  });
    /*班级-添加*/
    function grade_add(title,url,w,h){
        layer_show(title,url,w,h);
    }
    /*班级-编辑*/
    function grade_edit(title,url,w,h) {
      layer_show(title,url, w, h);
    }
    /*班级-删除*/
    function grade_del(obj,id){
      layer.confirm('确认要删除吗？',function(index){
        $.ajax({
          type: 'get',
          url: "<?php echo url('index/grade/delete'); ?>",
          dataType: 'json',
          data:{
            gid:id,
          },
          success: function(data){
            console.log(data)
            if(data.code=1){
              $(obj).parents("tr").remove();
              layer.msg(data.msg,{icon:1,time:1000});
            }else{
              layer.msg(data.msg,{icon:5,time:1000});
            }

          },
          error:function(data) {
            console.log(data.msg);
          },
        });
      });
    }
</script>