<!DOCTYPE html>
<html lang="zh">
<html xmlns:wb="http://open.weibo.com/wb">
<head>
    <script src="http://tjs.sjs.sinajs.cn/open/api/js/wb.js" type="text/javascript" charset="utf-8"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PICWALL</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/htmleaf-demo.css">
    <link rel="stylesheet" href="../css/baguetteBox.min.css">
    <link rel="stylesheet" href="../css/gallery-grid.css">
</head>
<body>
<div class="htmleaf-container">
    <header class="htmleaf-header no-color">
        <h1> 最好看的照片墙 <span>PICWALL</span></h1>

        <div class="htmleaf-links">
            <a href="newupload.php"><span>上传</span></a>
            <a href="personpage.php"><span>个人</span></a>
        </div>
        <form class="form-search" method="post" action="searchpic.php">
            <input type="text" class="form-control" placeholder="输入你想搜索的图片…" name="search">
            <button  class="btn btn-lg btn-primary" type="submit">search</button>
        </form>
        <div class="htmleaf-demo center">
            相册列表：
            <a href="picshow.php" >全部图片</a>
            <?php
            $db = new SQLite3('/Users/huangyunfei/Sites/db/picwalldb.db');
            $uid=$_COOKIE['uid'];
            $sql ="select DISTINCT  album from pictures WHERE pownerid = $uid";
            $ret = $db->query($sql);
            while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
                ?><a href="albumshow.php?album=<?php echo $row['album'];?>">
                <?php
                echo $row['album'];
                ?></a>
            <?php } ?>

            <!--            <a href="../html/upload.html">上传新的图片</a>-->
            <!--            <a href="personpage.php">返回个人主页</a>-->
            <!--            <a href="index3.html" >摄影论坛</a>-->
            <!--            <a href="logout.php">登出</a>-->
        </div>
    </header>
    <div class="container gallery-container">

        <h1>My Picture Wall</h1>

        <p class="page-description text-center">beauty</p>
        <!-- JiaThis Button BEGIN -->
        <script type="text/javascript" src="http://v3.jiathis.com/code/jiathis_r.js?type=left" charset="utf-8"></script>
        <!-- JiaThis Button END -->

        <div class="tz-gallery">


            <div class="row">
                <?php
                $db = new SQLite3('/Users/huangyunfei/Sites/db/picwalldb.db');
                $album=$_GET['album'];
                $uid=$_COOKIE['uid'];
                $sql ="select pid,description,zan from pictures WHERE pownerid = $uid and album= \"$album\" ORDER BY zan DESC";
                $ret = $db->query($sql);
                while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
                    ?><div class="col-sm-6 col-md-4">
                    <a class="lightbox" href="../picturestore/<?php echo $row['pid'];?>">
                        <img src="../picturestore/<?php echo $row['pid']; $pid=$row['pid']; $de=$row['description']; $zan=$row['zan'];?>" alt="picture">
                    </a>

                    <br class="lead">
                    label:


                        <?php
                        $select ="select DISTINCT label from piclabel WHERE pid = \"$pid\" ";
                        $re = $db->query($select);
                        while($row = $re->fetchArray(SQLITE3_ASSOC) ){ ?>
                        <a href="labelsearch.php?search=<?php echo $row['label'];?>" >
                            <span class="label label-info">
                       <?php echo $row['label'];?>
                       </span>
                            <?php
                        }
                        ?>

                    </a>
                    </br>
                    my description:
                    <?php echo $de;?>
                    <a href="deletepicture.php?pid=<?php echo substr($pid,0,strlen($pid)-4); ?>&type=<?php echo substr($pid,-3); ?>"><button class="btn btn-large btn-primary" type="button">删除</button></a>
                    <!--                        <wb:share-button addition="simple" type="button"></wb:share-button>-->

                    </br>
                    <a href="addzan.php?pid=<?php echo substr($pid,0,strlen($pid)-4); ?>&type=<?php echo substr($pid,-3); ?>">❤️</a> <?php echo $zan;?>
                    </p>


                    </div>
                <?php } ?>

            </div>

        </div>

    </div>
    <div class="related">
        <h3>hope you like it</h3>
    </div>
</div>

<script type="text/javascript" src="../js/baguetteBox.min.js"></script>
<script type="text/javascript">
    baguetteBox.run('.tz-gallery');
</script>
</body>
</html>