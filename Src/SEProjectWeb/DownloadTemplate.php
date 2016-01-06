<?php
/**
 * Created by PhpStorm.
 * User: Wu
 * Date: 12/23/15
 * Time: 12:54 AM
 */
require_once("Security_admin.php");
$filename = 'template.txt';
//文件的类型
header('Content-type: application/txt');
//下载显示的名字
header('Content-Disposition: attachment; filename="template.txt"');
readfile("$filename");
exit();