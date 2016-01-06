<?php
require_once('Security.php');
require_once("DataBaseEngine.php");
$db = new DataBaseEngine();
/**
 * Created by PhpStorm.
 * User: Wu
 * Date: 12/22/15
 * Time: 4:02 PM
 */
//print_r($_GET);
$password = $_GET['password'];
$verifyPassword = $_GET["verifyPassword"];
$id=$_SESSION["id"];
if($password == $verifyPassword){
    $db->modifyUserInfoById($id,$password);
        echo "修改成功";
}else{
    echo "两次输入的密码不一致，请重新输入";
}
