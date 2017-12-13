<?php
$name=$_POST['name'];
$description=$_POST['description'];
$uid=$_COOKIE['uid'];
$db = new SQLite3('/Users/huangyunfei/Sites/db/picwalldb.db');
$update = "UPDATE user SET uname = '$name' WHERE uid=$uid";
$db->exec($update);


$update = "UPDATE personinfor SET description = '$description' WHERE uid=$uid";
$db->exec($update);
echo "Successfully!";
header('Refresh: 1; url=personpage.php');
?>