<?php
/**
 * Created by PhpStorm.
 * User: Wu
 * Date: 12/22/15
 * Time: 1:09 PM
 */

function getOrgData($keyword){
    require_once("DataBaseEngine.php");
    $db = new DataBaseEngine();
    $stmt = $db->selectDataByOrg($keyword);
    $arr = array();
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        $date = $row['date'];
        $money = $row['money'];

        array_push($arr,array("year"=>$date,"money"=>$money));
    }
    echo json_encode(array_values($arr));
}
