<?php
require_once('Security_admin.php');
/**
 * Created by PhpStorm.
 * User: Wu
 * Date: 12/6/15
 * Time: 10:05 PM
 */
//error_reporting(E_ALL);
//ini_set('display_errors', '1');
require_once('BaseViewOutput.php');
$view = new BaseViewOutput();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>爬虫状态</title>
    <?php $view->printHead();?>
</head>
<body>
<?php $view->printNavBar();?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 sidebar">
            <?php $view->printLeftBar();?>
        </div>
        <div class="col-md-10 col-md-offset-2 main">
            <h1 class="page-header">爬虫状态</h1>
            <ol class="breadcrumb">
                <li>
                    <span class="glyphicon glyphicon-dashboard" aria-hidden="true"></span>
                    <a href="Home.php">控制面板</a>
                </li>
                <li class="active">
                    <i class="fa fa-edit"></i> 爬虫状态
                </li>
            </ol>
            <div class="row">
                <?php $view->printCrawlerStatusTable();?>
            </div>

        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        var table = $('#statusTable').DataTable( {
            ajax: "getStatus.php"
        } );
        setInterval( function () {
            table.ajax.reload( null, false ); // user paging is not reset on reload
        }, 500 );
    } );
</script>
<script type="text/javascript">
    $("#crawlstatusli").attr("class","active");
</script>
</body>
</html>
