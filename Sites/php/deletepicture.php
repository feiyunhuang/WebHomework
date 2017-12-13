<?php
/**
 * Created by PhpStorm.
 * User: huangyunfei
 * Date: 2017/12/7
 * Time: 下午4:41
 */
$pid= $_GET['pid'];
$type=$_GET['type'];
$pid=$pid . '.'. $type;
$db = new SQLite3('/Users/huangyunfei/Sites/db/picwalldb.db');
$uid=$_COOKIE['uid'];
$select ="delete from pictures WHERE pid = '$pid' AND pownerid='$uid'";
$res=$db->query($select);
if($res){
    header('Refresh: 1; url=picshow.php');
}

?>