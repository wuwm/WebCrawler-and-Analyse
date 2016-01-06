<?php
/**
 * Created by PhpStorm.
 * User: Wu
 * Date: 12/21/15
 * Time: 1:41 AM
 */
//error_reporting(E_ALL);
//ini_set('display_errors', '1');
require_once('BaseViewOutput.php');
$view = new BaseViewOutput();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php $view->printHead();?>
    <title>中标数据分析统计系统</title>
    <!--[if lte IE 8]>浏览器版本过低，请使用Chrome浏览器或者IE9以上版本，谢谢~<![endif]-->
</head>
<body>
<?php $view->printLoginModal();?>
<?php $view->printSignUpModal();?>
<?php $view->printNavBar();?>
<div class="container-fluid">
    <div class="row">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
<!--                <li data-target="#carousel-example-generic" data-slide-to="1"></li>-->
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
<!--                <div class="item active">-->
<!--                    <img src="img/img1.png" alt="xxxx">-->
<!--                    <div class="carousel-caption">-->
<!--                        dasfadsfadsfasdfasdfasdfads-->
<!--                    </div>-->
<!---->
<!--                </div>-->
                                <div class="item active">
                                    <img src="img/img1.jpg" alt="xxx">
                                    <div class="carousel-caption">
                                        <h3>欢迎使用本系统</h3>
                                        <p>南京航空航天大学</p>
                                    </div>
                                </div>
<!--                <div class="item">-->
<!--                    <img src="http://cs-student.nuaa.edu.cn/Content/back1.jpg" alt="xxx">-->
<!--                    <div class="carousel-caption">-->
<!--                        <h3>...</h3>-->
<!--                        <p>...</p>-->
<!--                    </div>-->
<!--                </div>-->
            </div>
        </div>
    </div>
</div>
</body>
</html>
