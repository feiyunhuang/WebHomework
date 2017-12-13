<?php
/**
 * Created by PhpStorm.
 * User: huangyunfei
 * Date: 2017/12/5
 * Time: 下午6:26
 */
$album= $_POST['album'];
$label= $_POST['label'];
$file = $_FILES['file'];//得到传输的数据
//得到文件名称
$name = $file['name'];
$type = strtolower(substr($name,strrpos($name,'.')+1)); //得到文件类型，并且都转化成小写
$allow_type = array('jpg','jpeg','gif','png'); //定义允许上传的类型
//判断文件类型是否被允许上传
if(!in_array($type, $allow_type)){
    //如果不被允许，则直接停止程序运行
    return ;
}
//判断是否是通过HTTP POST上传的
if(!is_uploaded_file($file['tmp_name'])){
    //如果不是通过HTTP POST上传的
    return ;
}

$upload_path = "/Users/huangyunfei/Sites/picturestore/"; //上传文件的存放路径
date_default_timezone_set('PRC');
$pid=date('ymdGis',time()).$file['name'];
$pname=$file['name'];
$pownerid=$_COOKIE['uid'];
$uploadtime=date('ymdGis',time());
$path=$upload_path.date('ymdGis',time()).$file['name'];
$description=$_POST['description'];

$db = new SQLite3('/Users/huangyunfei/Sites/db/picwalldb.db');
$insert = "insert into pictures (pid,pname,pownerid,uploadtime,path,description,album) values ('$pid','$pname','$pownerid','$uploadtime','$path','$description','$album')";
$db->exec($insert);
$insert1="insert into piclabel (pid, label) VALUES ('$pid','$label')";
$db->exec($insert1);
$db->close();


//开始移动文件到相应的文件夹
if(move_uploaded_file($file['tmp_name'],$path)){
    echo "Successfully!";
    header('Refresh: 1; url=picshow.php');
}else{
    echo "Failed!";
}
unlink('/Users/huangyunfei/Sites/picturestore/171205214309美图.jpg');
?>