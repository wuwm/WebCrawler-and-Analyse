<?php
/**
 * Created by PhpStorm.
 * User: Wu
 * Date: 11/29/15
 * Time: 2:36 PM
 */
include_once "DataBaseEngine.php";
$dbEngine = new DataBaseEngine();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>数据查询</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="./css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="./css/bootstrap-theme.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="./js/jquery-2.1.4.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <nav class="navbar navbar-default" role="navigation">
                <div class="navbar-header">

                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
                    </button> <a class="navbar-brand" href="#">软件工程课程设计</a>
                </div>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <!--<li class="active">-->
                        <!--<a href="#">Link</a>-->
                        <!--</li>-->
                        <!--<li>-->
                        <!--<a href="#">Link</a>-->
                        <!--</li>-->
                        <!--<li class="dropdown">-->
                        <!--<a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown<strong class="caret"></strong></a>-->
                        <!--<ul class="dropdown-menu">-->
                        <!--<li>-->
                        <!--<a href="#">Action</a>-->
                        <!--</li>-->
                        <!--<li>-->
                        <!--<a href="#">Another action</a>-->
                        <!--</li>-->
                        <!--<li>-->
                        <!--<a href="#">Something else here</a>-->
                        <!--</li>-->
                        <!--<li class="divider">-->
                        <!--</li>-->
                        <!--<li>-->
                        <!--<a href="#">Separated link</a>-->
                        <!--</li>-->
                        <!--<li class="divider">-->
                        <!--</li>-->
                        <!--<li>-->
                        <!--<a href="#">One more separated link</a>-->
                        <!--</li>-->
                        <!--</ul>-->
                        <!--</li>-->
                    </ul>
                    <form class="navbar-form navbar-left" role="search">
                        <div class="form-group">
                            <input type="text" class="form-control" />
                        </div>
                        <button type="submit" class="btn btn-default">
                            Submit
                        </button>
                    </form>
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="#">登录/注册</a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">用户中心<strong class="caret"></strong></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="#">个人信息</a>
                                </li>
                                <li>
                                    <a href="#">收费</a>
                                </li>
                                <li>
                                    <a href="#">信息管理</a>
                                </li>
                                <li class="divider">
                                </li>
                                <li>
                                    <a href="#">退出登录</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>

            </nav>
            <div class="row">
                <div class="col-md-2">
                    <ul class="nav nav-pills nav-stacked">
                        <li class="active">
                            <a href="#">首页</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-10">
                    <div class="row">
                        <div class="col-md-1">
                        </div>
                        <div class="col-md-10">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>
                                        #
                                    </th>
                                    <th>
                                        标题
                                    </th>
                                    <th>
                                        内容
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $stmt = $dbEngine->getRawResultData(0,2000);
                                while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                ?>
                                <tr>
                                    <td>
                                        <?php echo $row['id'];?>
                                    </td>
                                    <td>
                                        <?php echo $row['title'];?>
                                    </td>
                                    <td>
                                        <?php echo $row['content'];?>
                                    </td>
                                </tr>
                                <?php
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-1">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>