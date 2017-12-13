<?php
$pid= $_GET['pid'];
$type=$_GET['type'];
$pid=$pid . '.'. $type;
$db = new SQLite3('/Users/huangyunfei/Sites/db/picwalldb.db');
$uid=$_COOKIE['uid'];
$select ="select zan from pictures WHERE pid = '$pid' AND pownerid='$uid'";
$res=$db->query($select);
if($res){
    if($array=$res->fetchArray()){
       $zan= $array['zan'];
       $zan=$zan+1;
        $update = "UPDATE pictures SET zan = $zan WHERE pid = '$pid' AND pownerid='$uid'";
        $db->exec($update);
        header('Refresh: 0.1; url=picshow.php');
    }
}

?>