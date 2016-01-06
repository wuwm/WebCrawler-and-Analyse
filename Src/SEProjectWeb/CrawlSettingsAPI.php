<?php
/**
 * Created by PhpStorm.
 * User: Wu
 * Date: 12/13/15
 * Time: 12:28 AM
 */
//error_reporting(E_ALL);
//ini_set('display_errors', '1');
require_once("DataBaseEngine.php");
$db = new DataBaseEngine();
if(isset($_POST['type'])){
    $type = $_POST['type'];
    if($type == "modify"){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $startURL = $_POST['startURL'];
        $alloweddomain = $_POST['alloweddomain'];
        $link = $_POST['link'];
        $next = $_POST['next'];
        $title = $_POST['title'];
        $content = $_POST['content'];
        $isEnable = isset($_POST['isEnable'])? 1:0;
        $db->modifyCrawlSettings($id,$name,$startURL,$alloweddomain,$link,$next,$title,$content,$isEnable);
//        echo "1";
    }
}else{
    echo "0";
}