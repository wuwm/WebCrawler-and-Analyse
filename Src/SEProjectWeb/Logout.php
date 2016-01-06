<?php
/**
 * Created by PhpStorm.
 * User: Wu
 * Date: 12/21/15
 * Time: 2:02 AM
 */
session_start();
session_unset();
session_destroy();
header("location:index.php");
