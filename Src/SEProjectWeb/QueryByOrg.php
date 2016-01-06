<?php
require_once('Security.php');
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
require_once("DataBaseEngine.php");
$db = new DataBaseEngine();
require_once("getOrgData.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>企业数据统计</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="./css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="./css/bootstrap-theme.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="./js/jquery-2.1.4.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/datatables.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/dashboard.css"/>

    <link rel="stylesheet" href="./css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="./css/bootstrap-select.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
</head>
<body>
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" id="detailModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modalTitle"></h4>
            </div>
            <div class="modal-body">
                <div class="row" id="detailBody">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php $view->printNavBar();?>
<div class="container-fluid">
    <div class="row">

        <div class="col-md-2 sidebar">
            <?php $view->printLeftBar();?>
        </div>
        <div class="col-md-10 col-md-offset-2 main">
            <h1 class="page-header">企业数据统计</h1>
            <ol class="breadcrumb">
                <li>
                    <span class="glyphicon glyphicon-dashboard" aria-hidden="true"></span>
                    <a href="Home.php">控制面板</a>
                </li>
                <li class="active">
                    <i class="fa fa-edit"></i> 企业数据统计
                </li>
            </ol>
            <form action="QueryByOrg.php" method="post">
                <div class="row">
                    <?php //$view->printQueryCondition();?>
                    <div class="col-md-10">
                        <input class="form-control" type="text" placeholder="关键字" name="keyword">
                    </div>
                    <div class="col-md-2">
                        <input type="submit" value="搜索" class="btn btn-default">
                    </div>
                </div>
                </br>
                <input type="hidden" value="query" name="type">
            </form>
            <?php
            if(isset($_POST["type"])){
                echo <<<HTML
                <div class="row">
HTML;
                $keyword = $_POST["keyword"];
                if($keyword != "") {
                    $stmt = $db->selectByOrg($keyword);
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        $org = $row['org'];
                        echo <<<HTML
                        <div class="col-md-3">
                            <a href="QueryByOrg.php?type=detail&keyword=$org">$org</a>
                        </div>
HTML;
                    }
                }

                echo <<<HTML
                </div>
HTML;
            }else if(isset($_GET["type"])){
                $keyword = $_GET["keyword"];
                if($keyword != "") {
                    echo <<<HTML
                    <img src="drawLineGraph.php?keyword=$keyword" class="carousel-inner img-responsive img-rounded">
                    <div id="myfirstchart" style="height: 250px;"></div>
                    <div id="myfirstchart2" style="height: 250px;"></div>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>标题</th>
                                    <th>中标人</th>
                                    <th>金额</th>
                                    <th>日期</th>
                                    <th>来源</th>
                                    <th>操作</th>
                                </tr>
                            </thead>
                            <tbody>
HTML;
                    $stmt = $db->selectDataByOrg($keyword);
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        $title = $row['title'];
                        $org = $row['org'];
                        $money = $row['money'];
                        $date = $row['date'];
                        $spider = $row['spider'];
                        $id = $row['id'];
                        echo <<<HTML
                                <tr>
                                    <td>$title</td>
                                    <td>$org</td>
                                    <td>$money</td>
                                    <td>$date</td>
                                    <td>$spider</td>
                                    <td><button type="button" class="btn btn-primary" onclick="showDetail($id)">查看详情</button></td>
                                </tr>
HTML;
                    }
                    echo <<<HTML
                        </tbody>
                  </table>
            </div>

HTML;
                }
            }
            ?>
            <div class="row">

            </div>

        </div>
    </div>
</div>
<script src="./js/bootstrap-datetimepicker.min.js"></script>
<script src="./js/bootstrap-select.min.js"></script>
<script type="text/javascript">
    function showDetail(id2){
        htmlobj=$.ajax({url:"getContent.php?id="+id2,async:false});
        $("#detailBody").html(htmlobj.responseText);
        $("#detailModal").modal('show');
    }
    $("#orgqueryli").attr("class","active");

</script>
<script type="text/javascript" src="js/datatables.min.js"></script>
<?php
    if(isset($_GET["type"])){
        echo <<<HTML
<script type="text/javascript">

    new Morris.Area({
        // ID of the element in which to draw the chart.
        element: 'myfirstchart',
        // Chart data records -- each entry in this array corresponds to a point on
        // the chart.
        data:
HTML;
        getOrgData($_GET["keyword"]);
        echo <<<HTML
        ,
        // The name of the data record attribute that contains x-values.
        xkey: 'year',
        // A list of names of data record attributes that contain y-values.
        ykeys: ['money'],
        // Labels for the ykeys -- will be displayed when you hover over the
        // chart.
        labels: ['Value']
    });
HTML;
        echo <<<HTML
    new Morris.Bar({
        // ID of the element in which to draw the chart.
        element: 'myfirstchart2',
        // Chart data records -- each entry in this array corresponds to a point on
        // the chart.
        data:
HTML;
        getOrgData($_GET["keyword"]);
        echo <<<HTML
        ,
        // The name of the data record attribute that contains x-values.
        xkey: 'year',
        // A list of names of data record attributes that contain y-values.
        ykeys: ['money'],
        // Labels for the ykeys -- will be displayed when you hover over the
        // chart.
        labels: ['Value']
    });
</script>
HTML;
    }
?>

</body>
</html>
