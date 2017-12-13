
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
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h1 class="page-header">upload</h1>

            <div class="row placeholders">
                <div class="col-xs-6 col-sm-3 placeholder">
                    上传
                    <div class="page-header">
                    </div>
                    <div class="form-group">
                        <form action="handle.php" name="form" method="post" enctype="multipart/form-data">
                            <input type="file" name="file" /><br/>
                            <div class="form-group">
                                <textarea class="form-control" rows="3"  placeholder="Type some description..." name="description"></textarea>
                            </div><label >请选择相册</label>
                            <select class="form-control" name="album">

                                <option value="美图">美图</option>
                                <?php
                                $u=$_COOKIE['uid'];
                                $db = new SQLite3('/Users/huangyunfei/Sites/db/picwalldb.db');
                                $select ="select DISTINCT album from pictures WHERE pownerid = $u ";
                                $res=$db->query($select);
                                while($row = $res->fetchArray(SQLITE3_ASSOC) ){?>
                                    <option value="<?php echo $row['album'];?>"><?php echo $row['album'];?></option>
                                <?php } ?>

                            </select>
                            <br>
                            <label >添加个标签吧</label>
                            <input type="text" class="form-control" placeholder="标签" name="label">
                            <br>
                            <input type="submit"  class="btn btn-lg btn-primary" name="submit" value="上传" />
                        </form>

                        <div class="page-header">
                        </div>
                        <p>
                            <a href="picshow.php" ><button type="button" class="btn btn-lg btn-primary" style="margin-left:400px;">返回</button></a>
                        </p>
                    </div>
                </div>

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


