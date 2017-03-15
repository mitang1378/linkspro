<html>
<head>
    <title>Bug Ask Desktop</title>
    <link href="http://apps.bdimg.com/libs/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
    <link href="statics/css/site.css">
    <script src="http://apps.bdimg.com/libs/jquery/1.9.1/jquery.min.js"></script>
</head>
<body>
    <div class="container text-center">
        <div class="row"><img src="/statics/img/success.png" /></div>
        <div class="row"><?=$message?></div>
        <div class="row">
            <span id="times" class="text-danger" style="font-size: 30px;">10</span>秒后会自动关闭
            <a href="javascript:" onclick="self.location=document.referrer;" style="margin-right: 10px;">返回上一页</a></div>
    </div>
    <script type="text/javascript">
        var index = parent.layer.getFrameIndex(window.name); //获取窗口索引
        var countdown=10;
        $(document).ready(function () {
            settime();
        });
        function settime() {
            if (countdown == 0) {
                parent.layer.close(index);
            } else {
                $('#times').text(countdown);
                countdown--;
            }
            setTimeout(function() {settime() },1000);
        }
    </script>
</body>
</html>