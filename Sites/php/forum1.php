<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Personpage</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/dashboard.css" rel="stylesheet">

</head>

<body>


<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-sidebar">
                <li><a href="../php/personpage.php">个人情况</a></li>
                <li><a href="../php/picshow.php">我的照片</a></li>
                <li class="active"><a href="#"> 摄影活动<span class="sr-only">(current)</span></a></li>
                <li><a href="../html/changepassword.html">密码设置</a></li>


                <li><a href="../php/logout.php">登出</a></li>
            </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h1 class="page-header">摄影活动

            </h1>



            <form method="get" action="#" id="search-form">
                <div class="input-group">
                    <input type="text" class="form-control" name="kw" id="search-input">
                    <span class="input-group-btn">
        					<button class="btn btn-default" type="submit" id="search-btn">活动搜索</button>
      					</span>
                </div>
            </form>



            <br>
            <br>
            <h2 class="sub-header">我参加的</h2>

            <thead>
            <ul class="row list-group">



                <li class="col-xs-12 list-group-item">去苏州园林摄影
                    <button type="button" class="btn btn-primary">取消</button>
                    <h4><span class="label label-danger">发起人：tom1</span></h4>
                    <h4><span class="label label-warning">参加人:</span></h4>
                    <h4><span class="label label-success">tom1</span> <span class="label label-success">tom13</span></h4>
                </li>
            </ul>

        </div>









    </div>
</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="../js/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="../js/jquery.min.js"><\/script>')</script>
<script src="../js/bootstrap.min.js"></script>
<!-- Just to make our placeholder images work. Don't actually copy the next line! -->
<script src="../js/holder.min.js"></script>
</body>
</html>

