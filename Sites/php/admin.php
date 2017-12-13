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
                <li class="active"><a href="#">用户管理 <span class="sr-only">(current)</span></a></li>

                <li><a href="logout.php">登出</a></li>
            </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h1 class="page-header">管理员权限</h1>



            <h2 class="sub-header">用户列表</h2>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>名字</th>
                        <th>email</th>
                        <th>删除操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <?php
                        $db = new SQLite3('/Users/huangyunfei/Sites/db/picwalldb.db');
                        $sql ="select  * from user ORDER BY uid";
                        $ret = $db->query($sql);
                        while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
                        ?><td><a href=adwatchuser.php?fid=<?php echo $row['uid'] ?>><?php echo $row['uid'];
                                ?>
                            </a>

                        </td>
                        <td><?php echo $row['uname'];
                                ?>
                            </td>
                        <td><?php echo $row['uemail'];
                            ?></td>


                        <td><a href="deleteuser.php?uid=<?php echo $row['uid'] ?>"><button class="btn btn-large btn-primary" type="button">删除</button></a></td>
                    </tr>

                    <?php
                    }
                    ?>
                    <form class="form-inline" action="adsearchuser.php" name="form" method="post">
                        <label for="exampleInputName2">用户id</label>
                        <input type="text" class="form-control" id="exampleInputName2" placeholder="id号" name="uid">

                        <br>
                        <button class="btn btn-info" type="submit">搜索用户</button>

                    </form>

                    </tbody>
                </table>
            </div>
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


