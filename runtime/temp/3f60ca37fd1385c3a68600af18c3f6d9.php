<?php /*a:4:{s:52:"C:\wamp\www\tp5\application\admin\view\cate\lst.html";i:1544330042;s:56:"C:\wamp\www\tp5\application\admin\view\public\_head.html";i:1544194530;s:56:"C:\wamp\www\tp5\application\admin\view\public\_menu.html";i:1544365675;s:54:"C:\wamp\www\tp5\application\admin\view\public\_js.html";i:1544243376;}*/ ?>
<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>梦中程序员管理后台--QQ:305530751</title>
    <link rel="shortcut icon" href="/static/admin/img/logo.jpg" type="image/x-icon">
    <link href="/static/admin/css/bootstrap.min.css" rel="stylesheet" />
    <link href="/static/admin/css/font-awesome.min.css" rel="stylesheet" />
    <link href="/static/admin/css/weather-icons.min.css" rel="stylesheet" />
    <link href="/static/admin/css/beyond.min.css" rel="stylesheet" type="text/css" />
</head>
<body>
<!-- Loading Container -->
<div class="loading-container">
    <div class="loader"></div>
</div>
<!--  /Loading Container -->
<!-- Navbar -->
<div class="navbar">
    <div class="navbar-inner">
        <div class="navbar-container">
            <!-- Navbar Barnd -->
            <div class="navbar-header pull-left">
                <a href="#" class="navbar-brand">
                    <small style="line-height: 40px;">梦中程序员管理后台</small>
                </a>
            </div>
            <!-- /Navbar Barnd -->
            <!-- Sidebar Collapse -->
            <div class="sidebar-collapse" id="sidebar-collapse">
                <i class="collapse-icon fa fa-bars"></i>
            </div>
            <!-- /Sidebar Collapse -->
            <!-- Account Area and Settings --->
            <div class="navbar-header pull-right">
                <div class="navbar-account">
                    <ul class="account-area">
                        <li>
                            <a class="login-area dropdown-toggle" data-toggle="dropdown">
                                <div class="avatar" title="View your public profile">
                                    <img src="/static/admin/img/logo.jpg">
                                </div>
                                <section style="min-width: 70px;">
                                    <h2><span class="profile"><span><?php echo session('admin.nickname'); ?></span></span></h2>
                                </section>
                            </a>
                            <!--Login Area Dropdown-->
                            <ul class="pull-right dropdown-menu dropdown-arrow dropdown-login-area">
                                <li class="username"><a>梦中程序员</a></li>
                                <li class="email"><a>leruge@163.com</a></li>
                                <!--Avatar Area-->
                                <li>
                                    <div class="avatar-area">
                                        <img src="/static/admin/img/logo.jpg" class="avatar">
                                        <span class="caption">个人头像</span>
                                    </div>
                                </li>
                                <!--Avatar Area-->
                                <li class="edit">
                                    <a href="profile.html" class="pull-left">个人资料</a>
                                    <a href="#" class="pull-right">个人设置</a>
                                </li>
                                <!--Theme Selector Area-->
                                <li class="theme-area">
                                    <ul class="colorpicker" id="skin-changer">
                                        <li><a class="colorpick-btn" href="#" style="background-color:#5DB2FF;" rel="/static/admin/css/skins/blue.min.css"></a></li>
                                        <li><a class="colorpick-btn" href="#" style="background-color:#2dc3e8;" rel="/static/admin/css/skins/azure.min.css"></a></li>
                                        <li><a class="colorpick-btn" href="#" style="background-color:#03B3B2;" rel="/static/admin/css/skins/teal.min.css"></a></li>
                                        <li><a class="colorpick-btn" href="#" style="background-color:#53a93f;" rel="/static/admin/css/skins/green.min.css"></a></li>
                                        <li><a class="colorpick-btn" href="#" style="background-color:#FF8F32;" rel="/static/admin/css/skins/orange.min.css"></a></li>
                                        <li><a class="colorpick-btn" href="#" style="background-color:#cc324b;" rel="/static/admin/css/skins/pink.min.css"></a></li>
                                        <li><a class="colorpick-btn" href="#" style="background-color:#AC193D;" rel="/static/admin/css/skins/darkred.min.css"></a></li>
                                        <li><a class="colorpick-btn" href="#" style="background-color:#8C0095;" rel="/static/admin/css/skins/purple.min.css"></a></li>
                                        <li><a class="colorpick-btn" href="#" style="background-color:#0072C6;" rel="/static/admin/css/skins/darkblue.min.css"></a></li>
                                        <li><a class="colorpick-btn" href="#" style="background-color:#585858;" rel="/static/admin/css/skins/gray.min.css"></a></li>
                                        <li><a class="colorpick-btn" href="#" style="background-color:#474544;" rel="/static/admin/css/skins/black.min.css"></a></li>
                                        <li><a class="colorpick-btn" href="#" style="background-color:#001940;" rel="/static/admin/css/skins/deepblue.min.css"></a></li>
                                    </ul>
                                </li>
                                <!--/Theme Selector Area-->
                                <li class="dropdown-footer">
                                    <a href="#" id="logout">退出</a>
                                </li>
                            </ul>
                            <!--/Login Area Dropdown-->
                        </li>
                        <!-- /Account Area -->
                        <!--Note: notice that setting div must start right after account area list.
                        no space must be between these elements-->
                        <!-- Settings -->
                    </ul>
                    <div class="setting">
                        <a id="btn-setting" title="Setting" href="#">
                            <i class="icon glyphicon glyphicon-cog"></i>
                        </a>
                    </div>
                    <div class="setting-container">
                        <label>
                            <input type="checkbox" id="checkbox_fixednavbar">
                            <span class="text">头部固定</span>
                        </label>
                        <label>
                            <input type="checkbox" id="checkbox_fixedsidebar">
                            <span class="text">菜单固定</span>
                        </label>
                    </div>
                    <!-- Settings -->
                </div>
            </div>
            <!-- /Account Area and Settings -->
        </div>
    </div>
</div>
<!-- /Navbar -->
<!-- Main Container -->
<div class="main-container container-fluid">
    <!-- Page Container -->
    <div class="page-container">

        <!-- Page Sidebar -->
        <!-- Page Sidebar -->
<div class="page-sidebar" id="sidebar">
    <ul class="nav sidebar-menu">
        <li class="active">
            <a href="index.html">
                <i class="menu-icon glyphicon glyphicon-home"></i>
                <span class="menu-text">后台首页</span>
            </a>
        </li>
        <li>
            <a href="index.html" class="menu-dropdown">
                <i class="menu-icon glyphicon glyphicon glyphicon-th"></i>
                <span class="menu-text">栏目管理</span>
                <i class="menu-expand"></i>
            </a>
            <ul class="submenu">
                <li>
                    <a href="<?php echo url('admin/cate/lst'); ?>">
                        <span class="menu-text">栏目列表</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo url('admin/cate/add'); ?>">
                        <span class="menu-text">栏目添加</span>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#" class="menu-dropdown">
                <i class="menu-icon glyphicon glyphicon glyphicon-book"></i>
                <span class="menu-text">文章管理</span>
                <i class="menu-expand"></i>
            </a>
            <ul class="submenu">
                <li>
                    <a href="<?php echo url('admin/article/lst'); ?>">
                        <span class="menu-text">文章列表</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo url('admin/article/add'); ?>">
                        <span class="menu-text">文章添加</span>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#" class="menu-dropdown">
                <i class="menu-icon glyphicon glyphicon glyphicon-user"></i>
                <span class="menu-text">会员管理</span>
                <i class="menu-expand"></i>
            </a>
            <ul class="submenu">
                <li>
                    <a href="<?php echo url('admin/member/lst'); ?>">
                        <span class="menu-text">会员列表</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo url('admin/member/add'); ?>">
                        <span class="menu-text">会员添加</span>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#" class="menu-dropdown">
                <i class="menu-icon glyphicon glyphicon glyphicon-send"></i>
                <span class="menu-text">管理员管理</span>
                <i class="menu-expand"></i>
            </a>
            <ul class="submenu">
                <li>
                    <a href="<?php echo url('admin/admin/lst'); ?>">
                        <span class="menu-text">管理员列表</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo url('admin/admin/add'); ?>">
                        <span class="menu-text">管理员添加</span>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#">
                <i class="menu-icon glyphicon glyphicon-cog"></i>
                <span class="menu-text">系统设置</span>
            </a>
        </li>
    </ul>
</div>
        <!-- /Page Sidebar -->
        <!-- Page Content -->
        <div class="page-content">
            <!-- Page Breadcrumb -->
            <div class="page-breadcrumbs">
                <ul class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-home"></i>&nbsp;栏目管理
                    </li>
                    <li>栏目列表</li>
                </ul>
            </div>
            <!-- /Page Breadcrumb -->
            <!-- Page Body -->
            <div class="page-body">
                <a href="<?php echo url('admin/cate/add'); ?>" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i>&nbsp;栏目添加</a>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="widget">
                            <div class="widget-header">
                                <span class="widget-caption">栏目列表</span>
                                <div class="widget-buttons">
                                    <?php echo replace($cates->render()); ?>
                                </div>
                            </div>
                            <div class="widget-body">
                                <table class="table table-hover table-bordered">
                                    <thead>
                                    <tr>
                                        <th>排序</th>
                                        <th>栏目名称</th>
                                        <th>操作</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php if(is_array($cates) || $cates instanceof \think\Collection || $cates instanceof \think\Paginator): $i = 0; $__LIST__ = $cates;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                    <tr id="cate_tr_<?php echo htmlentities($vo['id']); ?>">
                                        <td><input type="text" name="sort" value="<?php echo htmlentities($vo['sort']); ?>" size="1" dataid="<?php echo htmlentities($vo['id']); ?>"></td>
                                        <td><?php echo htmlentities($vo['catename']); ?></td>
                                        <td>
                                            <a href="<?php echo url('admin/cate/edit', ['id'=>$vo['id']]); ?>" class="btn btn-azure btn-xs">编辑</a>
                                            <a href="#" class="btn btn-danger btn-xs cate-del" dataid="<?php echo htmlentities($vo['id']); ?>">删除</a>
                                        </td>
                                    </tr>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Page Body -->
        </div>
        <!-- /Page Content -->

    </div>
    <!-- /Page Container -->
    <!-- Main Container -->

</div>

<script src="/static/admin/js/skins.min.js"></script>
<!--Basic Scripts-->
<script src="/static/admin/js/jquery.min.js"></script>
<script src="/static/admin/js/bootstrap.min.js"></script>
<script src="/static/admin/js/slimscroll/jquery.slimscroll.min.js"></script>
<!--Beyond Scripts-->
<script src="/static/admin/js/beyond.js"></script>
<script src="/static/lib/layer/layer.js"></script>
<script>
    $(window).bind("load", function () {

        /*Sets Themed Colors Based on Themes*/
        themeprimary = getThemeColorFromCss('themeprimary');
        themesecondary = getThemeColorFromCss('themesecondary');
        themethirdcolor = getThemeColorFromCss('themethirdcolor');
        themefourthcolor = getThemeColorFromCss('themefourthcolor');
        themefifthcolor = getThemeColorFromCss('themefifthcolor');

    });
    $(function() {
       $("#logout").click(function () {
           $.ajax({
               url: "<?php echo url('admin/home/logout'); ?>",
               type: 'post',
               dataType: 'json',
               success: function (data) {
                    if (data.code == 1) {
                        layer.msg(data.msg, {
                            icon: 6,
                            time: 1000
                        }, function () {
                            location.href = data.url;
                        });
                    } else {
                        layer.open({
                            icon: 5,
                            anim: 6,
                            title: '退出失败',
                            content: data.msg
                        });
                    }
               }
           });
       });
    });
</script>
<script>
    $(function () {
        $(".pagination").addClass("pagination-sm");

        $("input[name=sort]").change(function () {
            var id = $(this).attr('dataid');
            var sort = $(this).val();
            $.ajax({
                url: "<?php echo url('admin/cate/sort'); ?>",
                type: 'post',
                data: {id:id, sort:sort},
                dataType: 'json',
                success: function (data) {
                    if (data.code == 1) {
                        layer.msg(data.msg, {
                            icon: 6,
                            time: 1000
                        }, function () {
                            location.href = data.url;
                        });
                    } else {
                        layer.open({
                            icon: 5,
                            anim: 6,
                            title: '栏目排序失败',
                            content: data.msg
                        });
                    }
                }
            });
            return false;
        });

        $(".cate-del").click(function () {
            var id = $(this).attr('dataid');
            layer.confirm('确定删除吗？栏目下的文章也会删除哦！', {
                icon: 3,
                title: '栏目删除'
            }, function (index) {
                layer.close(index);
                $.ajax({
                    url: "<?php echo url('admin/cate/delete'); ?>",
                    type: 'post',
                    data: {id:id},
                    dataType: 'json',
                    success: function (data) {
                        if (data.code == 1) {
                            layer.msg(data.msg, {
                                icon: 6,
                                time: 1000
                            }, function () {
                                $("#cate_tr_"+id).remove();
                            });
                        } else {
                            layer.open({
                                icon: 5,
                                anim: 6,
                                title: '栏目删除失败',
                                content: data.msg
                            });
                        }
                    }
                });
            });
            return false;
        });
    })
</script>
</body>
<!--  /Body -->
</html>
