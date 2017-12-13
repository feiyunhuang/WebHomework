<?php
$oldpassword=$_POST['oldpassword'];
$newpassword1=$_POST['newpassword1'];
$newpassword2=$_POST['newpassword2'];
$uid=$_COOKIE['uid'];
$oldsecret=sha1($oldpassword);
$newsecret=sha1($newpassword1);


if($newpassword1!=$newpassword2){
    echo '两次密码不一致';
    header('Refresh: 2; url=../html/changepassword.html');
}
else {
    $db = new SQLite3('/Users/huangyunfei/Sites/db/picwalldb.db');

    $select = "select uname from user WHERE uid = $uid AND password = '$oldsecret'";
    $res = $db->query($select);
    if ($res) {
        if ($array = $res->fetchArray()) {
            $update = "UPDATE user SET password = '$newsecret' WHERE uid=$uid";
            $db->exec($update);

            echo '更改成功';
            header('Refresh: 2; url=../html/cover.html');
        } else {
            echo '原密码错误' . '</br>';
            header('Refresh: 2; url=../html/changepassword.html');
        }
    }


}
?>