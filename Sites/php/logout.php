<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sticky Footer Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<!-- Begin page content -->
<div class="container">
    <div class="page-header">
        <h1>PICWALL</h1>
        <?php setcookie("uid");?>
    </div>
    <p class="lead">您已成功登出，感谢您的使用！</p>
    <?php header('Refresh: 3; url=../html/cover.html');?>
    <p>将在3秒后返回首页<a href="../html/cover.html">立即返回点击这里</a></p>
</div>



</body>
</html>

