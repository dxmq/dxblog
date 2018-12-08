<?php /*a:1:{s:55:"C:\wamp\www\tp5\application\admin\view\index\reset.html";i:1544173387;}*/ ?>
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
            <div class="loginbox-title">忘记密码？</div>

            <div class="loginbox-or">
                <div class="or-line"></div>
            </div>
            <div class="loginbox-textbox">
                <input type="text" class="form-control" placeholder="你的邮箱" name="email"/>
            </div>
            <div class="loginbox-textbox hidden">
                <input type="text" class="form-control" placeholder="填写您的邮箱验证码" name="code"/>
            </div>
            <div class="loginbox-submit">
                <input type="submit" class="btn btn-primary btn-block" id="sendCode" value="发送邮箱验证码">
            </div>
            <div class="loginbox-submit hidden">
                <input type="submit" class="btn btn-primary btn-block" id="reset" value="重置密码">
            </div>
            <div class="loginbox-signup">
                <a href="<?php echo url('admin/index/login'); ?>">返回登录</a>
            </div>
        </div>
    </form>
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
        $('#sendCode').click(function () {
            $.ajax({
                url: "<?php echo url('admin/index/reset'); ?>",
                type: 'post',
                data: $('form').serialize(),
                dataType: 'json',
                success: function (data) {
                    if (data.code ==1) {
                        layer.open({
                            content: data.msg,
                            icon: 6,
                            time: 1000
                        });
                        $('[name=code]').parent().removeClass('hidden');
                        $('#sendCode').parent().addClass('hidden');
                        $('#reset').parent().removeClass('hidden');
                    } else {
                        layer.open({
                            title: '验证码发送失败',
                            content: data.msg,
                            icon: 5,
                            anim: 6
                        })
                    }
                }
            });
            return false;
        })
    });
    $('#reset').click(function() {
        $.ajax({
            url: "<?php echo url('admin/index/resetPassword'); ?>",
            type: 'post',
            data: $('form').serialize(),
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
                        title: '重置密码失败',
                        content: data.msg,
                        icon: 5,
                        anim: 6
                    })
                }
            }
        });
       return false;
    });
</script>
</body>
<!--  /Body -->
</html>