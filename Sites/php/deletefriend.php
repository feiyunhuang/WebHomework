
<?php
/**
 * Created by PhpStorm.
 * User: huangyunfei
 * Date: 2017/12/7
 * Time: 下午4:41
 */
$fid= $_GET['fid'];
    $db = new SQLite3('/Users/huangyunfei/Sites/db/picwalldb.db');
            $uid=$_COOKIE['uid'];
            $select ="delete from friend WHERE activeuid = $uid AND passiveuid=$fid";
            $res=$db->query($select);
if($res){
    header('Refresh: 0.1; url=personpage.php');
    }

?>