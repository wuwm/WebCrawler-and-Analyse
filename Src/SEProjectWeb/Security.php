<?php
/**
 * Created by PhpStorm.
 * User: Wu
 * Date: 12/21/15
 * Time: 1:37 AM
 */
session_start();
//print_r($_SESSION);
if(isset($_SESSION["userName"])){

}else{
    die("非法访问，请登陆");
}