<?php /*a:1:{s:55:"C:\wamp\www\tp5\application\admin\view\index\login.html";i:1544183996;}*/ ?>
<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>梦中程序员管理后台--QQ:305530751</title>
    <!--<link rel="shortcut icon" href="/logo.jpg" type="image/x-icon">-->
    <link href="/static/admin/css/bootstrap.min.css" rel="stylesheet" />
    <link href="/static/admin/css/font-awesome.min.css" rel="stylesheet" />
    <link href="/static/admin/css/weather-icons.min.css" rel="stylesheet" />
    <link href="/static/admin/css/beyond.min.css" rel="stylesheet" />
</head>
<body>
<div class="login-container">
    <form>
        <div class="loginbox bg-white">
            <div class="loginbox-title">登录</div>

            <div class="loginbox-or">
                <div class="or-line"></div>
            </div>
            <div class="loginbox-textbox">
                <input type="text" class="form-control" placeholder="用户名" name="username"/>
            </div>
            <div class="loginbox-textbox">
                <input type="password" class="form-control" placeholder="密码" name="password"/>
            </div>
            <div class="loginbox-forgot">
                <a href="<?php echo url('admin/index/reset'); ?>">忘记密码?</a>
            </div>
            <div class="loginbox-submit">
                <input type="button" class="btn btn-primary btn-block" id="login" value="Login">
            </div>
            <div class="loginbox-signup">
                <a href="<?php echo url('admin/index/register'); ?>">注册账户</a>
            </div>
        </div>
    </form>
    <div class="logobox">
        <p class="text-center" style="font-size: 18px;font-weight: bold;text-shadow: 3px 3px 3px #FF0000;font-style: italic;">拜师QQ:305530751</p>
    </div>
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
        $('#login').click(function () {
            $.ajax({
                url: "<?php echo url('admin/index/login'); ?>",
                type: 'post',
                data: $('form').serialize(),
                dataType: 'json',
                success: function (data) {
                    if (data.code == 1) {
                        layer.msg(data.msg, {
                            icon: 6,
                            time: 2000
                        }, function () {
                            location.href = data.url;
                        });
                    } else {
                        layer.open({
                            title: '登录失败',
                            content: data.msg,
                            icon: 5,
                            anim: 6
                        })
                    }
                }
            });
            return false;
        })
    })
</script>
</body>
<!--  /Body -->
</html>
