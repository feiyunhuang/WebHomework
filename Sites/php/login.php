<?php
/**
 * Created by PhpStorm.
 * User: huangyunfei
 * Date: 2017/12/5
 * Time: 下午11:57
 */

$uemail = $_POST['email'];
$password = $_POST['password'];
$secret=sha1($password);


$db = new SQLite3('/Users/huangyunfei/Sites/db/picwalldb.db');

$select ="select uid from user WHERE uemail = '$uemail' AND password = '$secret'";
$res=$db->query($select);
if($res){
    if($array=$res->fetchArray()){
        echo '登陆成功！ id为';
        setcookie( 'uid',$array['uid'],time() + (60 * 60 * 24 * 1));
        echo $array['uid'];
        header('Refresh: 3; url=personpage.php');
    }
    else{
        echo '登录失败！'. '</br>';
        echo '页面只停留3秒……';
        header('Refresh: 3; url=../html/login.html');
    }
}
?>

