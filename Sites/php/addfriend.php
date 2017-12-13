<?php
$fid=$_COOKIE['addfriend'];
$uid= $_COOKIE['uid'];
$group= $_POST['group'];
$remark= $_POST['remark'];
$db = new SQLite3('/Users/huangyunfei/Sites/db/picwalldb.db');
$insert = "insert into friend (activeuid, passiveuid,`group`,remark) values ('$uid','$fid','$group','$remark')";
$db->exec($insert);
$db->close();
echo '添加成功';
    header('Refresh: 2; url=personpage.php');
    ?>