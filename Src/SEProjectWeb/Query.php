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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>数据查询</title>
    <?php $view->printHead();?>
    <link rel="stylesheet" href="./css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="./css/bootstrap-select.min.css">
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
            <h1 class="page-header">数据查询</h1>
            <ol class="breadcrumb">
                <li>
                    <span class="glyphicon glyphicon-dashboard" aria-hidden="true"></span>
                    <a href="Home.php">控制面板</a>
                </li>
                <li class="active">
                    <i class="fa fa-edit"></i> 数据查询
                </li>
            </ol>
            <form action="Query.php" method="post">
            <div class="row">
                <?php //$view->printQueryCondition();?>
                <div class="col-md-9">
                    <input class="form-control" type="text" placeholder="关键字" name="keyword">
                </div>
                <div class="col-md-3">
                    <select class="selectpicker" name="category">
                        <option value="title">标题</option>
                        <option value="content">内容</option>
                        <option value="name">中标人</option>
                    </select>
                </div>
            </div>
            </br>
                <input type="hidden" value="query" name="type">
            <div class="row">
                <div class="col-md-3">
                    <input  size="16" type="text" placeholder="起始日期"  class="form_datetime form-control" name="startdate">
                </div>
                <div class="col-md-3">
                    <input size="16" type="text" placeholder="结束日期"  class="form_datetime form-control" name="enddate">
                </div>
                <div class="col-md-3">
                    <input class="form-control" size="16" type="text" placeholder="最小价格"  name="startmoney">
                </div>
                <div class="col-md-3">
                    <input class="form-control" size="16" type="text" placeholder="最大价格" name="endmoney">
                </div>
            </div>
            </br>
            <div class="row">
                <div class="col-md-12">
                    <input type="submit" value="提交" class="btn btn-primary btn-block">
                </div>
            </div>
            </form>
            <?php
                if(isset($_POST["type"])){
                    echo <<<HTML
                    <div class="table-responsive">
                        <table class="table table-striped" id="queryTable">
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
                    $keyword = $_POST["keyword"];
                    $category = $_POST["category"];
                    $startdate = $_POST["startdate"];
                    $enddate = $_POST["enddate"];
                    $startmoney = $_POST["startmoney"];
                    $endmoney = $_POST["endmoney"];
                    if($enddate == ""){
                        $enddate = "2500-01-01";
                    }
                    if($startdate == ""){
                        $startdate = "0001-01-01";
                    }
                    if($startmoney == ""){
                        $startmoney = "0";
                    }
                    if($endmoney == ""){
                        $endmoney = "99999999999";
                    }
                    if($keyword == "") {
                        $stmt = $db->search($startdate, $enddate, $startmoney, $endmoney);
                    }else if($category == "title") {
                        $stmt = $db->searchTitle($keyword,$startdate, $enddate, $startmoney, $endmoney);
                    }else if($category == "content") {
                        $stmt = $db->searchContent($keyword,$startdate, $enddate, $startmoney, $endmoney);
                    }else if($category == "name") {
                        $stmt = $db->searchOrg($keyword,$startdate, $enddate, $startmoney, $endmoney);
                    }
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            $title = $row['title'];
                            $org = $row['org'];
                            $money = $row['money'];
                            $date = $row['date'];
                            $spider = $row['spider'];
                            $id = $row["id"];
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
            ?>
            <div class="row">

            </div>

        </div>
    </div>
</div>
<script src="./js/bootstrap-datetimepicker.min.js"></script>
<script src="./js/bootstrap-select.min.js"></script>
<script type="text/javascript">
    $(".form_datetime").datetimepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
        todayBtn: true,
        minView: 2
    });
    $('.selectpicker').selectpicker({
        style: 'btn-default',
        size: 3
    });
    function showDetail(id2){
        htmlobj=$.ajax({url:"getContent.php?id="+id2,async:false});
        $("#detailBody").html(htmlobj.responseText);
        $("#detailModal").modal('show');
    }
    $(document).ready(function() {
        $('#queryTable').DataTable();
    } );

</script>
<script type="text/javascript">
    $("#queryli").attr("class","active");
</script>
</body>
</html>
