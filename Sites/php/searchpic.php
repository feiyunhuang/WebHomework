
<!DOCTYPE html>
<html lang="zh">
<html xmlns:wb="http://open.weibo.com/wb">
<head>
    <script src="http://tjs.sjs.sinajs.cn/open/api/js/wb.js" type="text/javascript" charset="utf-8"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>search result</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/htmleaf-demo.css">
    <link rel="stylesheet" href="../css/baguetteBox.min.css">
    <link rel="stylesheet" href="../css/gallery-grid.css">
</head>
<body>
<div class="htmleaf-container">
    <header class="htmleaf-header no-color">
        <h1> 搜索结果 <span>PICWALL</span></h1>

        <div class="htmleaf-demo center">

            <a href="picshow.php" >返回</a>
        </div>
    </header>

    <div class="container gallery-container">

        <h1><?php
            $search=$_POST['search'];
            echo $search;?>
        </h1>

        <p class="page-description text-center">的搜索结果：</p>
        <!-- JiaThis Button BEGIN -->
        <script type="text/javascript" src="http://v3.jiathis.com/code/jiathis_r.js?type=left" charset="utf-8"></script>
        <!-- JiaThis Button END -->

        <div class="tz-gallery">


            <div class="row">
                <?php

                $db = new SQLite3('/Users/huangyunfei/Sites/db/picwalldb.db');
                $uid=$_COOKIE['uid'];
                $search='%'.$search.'%';
                $sql ="select DISTINCT  pid from piclabel where label LIKE '$search' ";
                $ret = $db->query($sql);
                while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
                    ?><div class="col-sm-6 col-md-4">
                    <a class="lightbox" href="../picturestore/<?php echo $row['pid'];?>">

                        <img src="../picturestore/<?php echo $row['pid']; $pid=$row['pid']; $de=$row['description'];?>" alt="picture">
                    </a>


                    <?php
                    $select ="select pownerid from pictures WHERE pid = \"$pid\"";
                    $re = $db->query($select);
                    while($row = $re->fetchArray(SQLITE3_ASSOC) ){ ?>
                    <br href="searchpic.php?search=<?php echo $row['pownerid'];?>" >
                            <span class="label label-danger">
                                由id为
                       <?php echo $row['pownerid'];?>
                                的用户上传
                       </span>
                        <?php
                        }?>

                        <br class="lead">
                        label：

                    <?php
                    $select ="select DISTINCT label from piclabel WHERE pid = \"$pid\"";
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


                    </div>
                <?php } ?>

            </div>

        </div>

    </div>

    <div class="related">
        <h3>搜索结果</h3>
    </div>
</div>

<script type="text/javascript" src="../js/baguetteBox.min.js"></script>
<script type="text/javascript">
    baguetteBox.run('.tz-gallery');
</script>
</body>
</html>
