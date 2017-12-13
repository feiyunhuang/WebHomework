<?php
/**
 * Created by PhpStorm.
 * User: huangyunfei
 * Date: 2017/12/7
 * Time: 下午4:41
 */
$uid= $_GET['uid'];
$db = new SQLite3('/Users/huangyunfei/Sites/db/picwalldb.db');

$select ="delete from user WHERE uid = $uid";
$res=$db->query($select);
if($res){
    header('Refresh: 1; url=admin.php');
}

?>