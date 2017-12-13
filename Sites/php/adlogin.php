<?php
$aid = $_POST['id'];
$password = $_POST['password'];


$db = new SQLite3('/Users/huangyunfei/Sites/db/picwalldb.db');

$select ="select password from administrator WHERE aid = $aid ";
$res=$db->query($select);
if($res){
    if($array=$res->fetchArray()){
        if( $array['password']==$password){
        echo '管理员权限登陆成功!';
        header('Refresh: 1; url=admin.php');
        }
        else{
            echo '账号或密码错误';
            header('Refresh: 2; url=../html/administratorlogin.html');}
        }
    }
    else{
        echo '账号或密码错误';
        header('Refresh: 2; url=../html/administratorlogin.html');
}
?>