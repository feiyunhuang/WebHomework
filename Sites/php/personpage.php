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
                <li class="active"><a href="#">个人情况 <span class="sr-only">(current)</span></a></li>
                <li><a href="picshow.php">我的照片</a></li>
                <li><a href="forum.php">摄影活动</a></li>
                <li><a href="moment.php">好友动态</a></li>
                <li><a href="../html/changepassword.html">密码设置</a></li>

                <li><a href="logout.php">登出</a></li>
            </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h1 class="page-header">我的邮箱：
            <?php
            $db = new SQLite3('/Users/huangyunfei/Sites/db/picwalldb.db');
            $uid=$_COOKIE['uid'];
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

                    <h4>我的名字是：
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

                    <a href="../html/changename.html"> <button class="btn btn-xs btn-success" type="button">更改个人信息</button></a>
                </div>
            </div>

            <h2 class="sub-header">好友列表</h2>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>好友名</th>
                        <th>email</th>
                        <th>分组</th>
                        <th>备注</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <?php
                        $sql ="select  DISTINCT passiveuid from friend WHERE activeuid = $uid ORDER BY \"group\"";
                        $ret = $db->query($sql);
                        while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
                        $fid=$row['passiveuid'];
                            ?><td><a href="friendinform.php?fid=<?php echo $fid ?>"><?php echo $row['passiveuid'];
                                    ?>
                        </a>
                        </td>
                        <td><?php $select ="select uname from user WHERE uid = $fid";
                            $res=$db->query($select);
                            if($res){
                            if($array=$res->fetchArray()){
                            echo $array['uname'];
                            }
                            }?></td>
                        <td><?php $select ="select uemail from user WHERE uid = $fid";
                            $res=$db->query($select);
                            if($res){
                                if($array=$res->fetchArray()){
                                    echo $array['uemail'];
                                }
                            }?></td>
                        <td><?php $select ="select \"group\" from friend WHERE activeuid = $uid and passiveuid=$fid";
                            $res=$db->query($select);
                            if($res){
                                if($array=$res->fetchArray()){
                                    echo $array['group'];
                                }
                            }?></td>
                        <td><?php $select ="select remark from friend WHERE activeuid = $uid and passiveuid=$fid";
                            $res=$db->query($select);
                            if($res){
                                if($array=$res->fetchArray()){
                                    echo $array['remark'];
                                }
                            }?></td>
                        <td><a href="deletefriend.php?fid=<?php echo $fid ?>"><button class="btn btn-large btn-primary" type="button">删除</button></a></td>
                    </tr>

                        <?php
                        }
                        ?>

                    <form class="form-inline" action="searchuser.php" name="form" method="post">
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

