<?php
/**
 * Created by PhpStorm.
 * User: Wu
 * Date: 12/22/15
 * Time: 1:09 PM
 */
require_once("Security.php");
require_once("DataBaseEngine.php");
$db = new DataBaseEngine();
$stmt = $db->selectContentById($_GET['id']);
$row = $stmt->fetch(PDO::FETCH_ASSOC);
echo $row['content'];