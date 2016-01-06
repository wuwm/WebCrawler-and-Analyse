<?php
/**
 * Created by PhpStorm.
 * User: Wu
 * Date: 12/22/15
 * Time: 1:45 PM
 */
require_once("Security.php");
$startdate = $_GET["startdate"];
$enddate = $_GET["enddate"];
function fix_keys($array) {
    foreach ($array as $k => $val) {
        if (is_array($val))
            $array[$k] = fix_keys($val); //recurse
    }
    return array_values($array);
}
require_once("DataBaseEngine.php");
$db = new DataBaseEngine();
$stmt = $db->selectSumData($startdate,$enddate);
$data2 = array();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $org = $row['org'];
    $money = $row['summoney'];
    array_push($data2,array($org,$money));

}
$data3["data"] = fix_keys($data2);
echo json_encode($data3);