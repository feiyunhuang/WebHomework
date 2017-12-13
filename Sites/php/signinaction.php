

<?php
/**
 * Created by PhpStorm.
 * User: huangyunfei
 * Date: 2017/12/5
 * Time: 上午11:10
 */
$email = $_POST['email'];
$password = $_POST['password'];



$db = new SQLite3('/Users/huangyunfei/Sites/db/picwalldb.db');
$secret=sha1($password);
$insert = "insert into user (uname,uemail,password) values ('unnamed','$email','$secret')";
$db->exec($insert);
$db->close();

echo ' Your password ' . $password . '<br />';
echo 'Your email address is ' . $email;
//重定向浏览器

?>
<html >
<head >
<meta   http-equiv = "refresh"   content ="3; url =../html/cover.html" >
</head >
<body >
页面只停留一秒……
</body >
</html >


