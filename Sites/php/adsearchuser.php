<?php
$search = $_POST['uid'];
?>

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
            <h1 class="page-header">搜索的用户邮箱为：
                <?php
                $db = new SQLite3('/Users/huangyunfei/Sites/db/picwalldb.db');
                $uid=$search;
                $select ="select uemail from user WHERE uid = $uid";
                $res=$db->query($select);
                if($res){
                    if($array=$res->fetchArray()){
                        echo $array['uemail'];
                    }
                }?>
            </h1>

            <div class="row placeholders">
                <div class="col-xs-6 col-sm-3 placeholder">
                    <img src="../headpath/<?php echo $uid ?>.jpg" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
                    id：<?php echo($uid); ?>

                    <h4>用户名为：
                        <?php
                        $select ="select uname from user WHERE uid = $uid";
                        $res=$db->query($select);
                        if($res){
                            if($array=$res->fetchArray()){
                                echo $array['uname'];
                            }
                        }
                        ?>
                    </h4>

                    <span class="text-muted">自我介绍:

                        <?php $db = new SQLite3('/Users/huangyunfei/Sites/db/picwalldb.db');
                        $select ="select description from personinfor WHERE uid = $uid";
                        $res=$db->query($select);
                        if($res){
                            if($array=$res->fetchArray()){
                                echo $array['description'];
                            }
                        }
                        ?>

                    </span>

                </div>
            </div>


            <h2 class="sub-header">用户动态</h2>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>图片</th>
                        <th>图片描述</th>
                        <th>上传时间</th>

                    </tr><?php
                    $sql ="select * from pictures WHERE pownerid = $uid ORDER BY uploadtime";
                    $ret = $db->query($sql);
                    while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
                    ?>
                    </thead>
                    <tbody>
                    <tr>
                        <td><img src="../picturestore/<?php echo $row['pid']; $time=$row['uploadtime']; ?>" alt="..." class="img-thumbnail" width="200" height="200"></td>
                        <td><?php echo $row['description'];?></td>
                        <td><?php echo '20'.substr($time,0,2).'年'.substr($time,2,2).'月'.substr($time,4,2).'日'?>
                            <br>
                            <?php echo '0'.substr($time,-4,1).'时'.substr($time,-4,-2).'分'.substr($time,-2).'秒'?>
                        </td>
                    </tr>


                    <?php
                    }
                    ?>


                    </tbody>
                </table>
            </div>

            <div class="page-header">
            </div>
            <p>
                <a href="admin.php" ><button type="button" class="btn btn-lg btn-primary" style="margin-left:400px;">返回</button></a>
            </p>
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


