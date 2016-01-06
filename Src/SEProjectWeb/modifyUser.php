<?php
/**
 * Created by PhpStorm.
 * User: Wu
 * Date: 12/24/15
 * Time: 11:02 AM
 */
require_once("Security_admin.php");
require_once("DataBaseEngine.php");
$db = new DataBaseEngine();
$username = $_GET["username"];
$usertype = $_GET["usertype"];
$id = $_GET["id"];
$stmt = $db->modifyUser($id,$username,$usertype);
if($stmt->rowCount() == 0){
    echo "请修改后提交";
}else{
    echo "修改成功";
}
