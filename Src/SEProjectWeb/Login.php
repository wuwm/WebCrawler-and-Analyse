<?php
session_start();
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
$row = $db->selectUser($userName)->fetch(PDO::FETCH_ASSOC);
if($row["password"] == $password){
    echo "登陆成功";
    $_SESSION["id"] = $row["id"];
    $_SESSION["userName"] = $row["username"];
    $_SESSION["type"] = $row["type"];
//    print_r($_SESSION);
}else{
    echo "密码错误";
}?>
<html>
<head>
    <meta http-equiv="refresh" content="1.5;url=http://115.159.31.63/SEProjectWeb/">
    <title>登录</title>
</head>
</html>
