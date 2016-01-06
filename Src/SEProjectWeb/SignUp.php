<?php
/**
 * Created by PhpStorm.
 * User: Wu
 * Date: 12/21/15
 * Time: 1:20 AM
 */
require_once("DataBaseEngine.php");
$db = new DataBaseEngine();
$userName = $_POST["userName"];
$password = $_POST["password"];
$vPassword = $_POST["verifyPassword"];
if($db->selectUser($userName)->rowCount()){
    echo "用户名已存在";
}else{
    if($password == $vPassword){
        $db->addUser($userName,$password);
        echo "注册成功，正在返回主页";
    }else{
        echo "两次输入的密码不一致，请重新输入";
    }
}
?>
<html>
<head>
    <meta http-equiv="refresh" content="1.5;url=http://115.159.31.63/SEProjectWeb/">
</head>
</html>
