<?php
/**
 * Created by PhpStorm.
 * User: Wu
 * Date: 12/22/15
 * Time: 1:45 PM
 */
require_once("Security_admin.php");
function fix_keys($array) {
    foreach ($array as $k => $val) {
        if (is_array($val))
            $array[$k] = fix_keys($val); //recurse
    }
    return array_values($array);
}
require_once("DataBaseEngine.php");
$db = new DataBaseEngine();
$stmt = $db->selectStatus1();
$data2 = array();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $crawler_id = $row['crawler_id'];
            $current_page = $row['current_page'];
            $current_url = $row['current_url'];
            $current_title = $row['current_title'];
            $name = $row['name'];
            $isrunning = $row['isrunning'];
    array_push($data2,array($crawler_id,$name,$current_page,$current_title));

}
$data3["data"] = fix_keys($data2);
echo json_encode($data3);