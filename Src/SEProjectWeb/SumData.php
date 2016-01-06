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
    <?php $view->printHead();?>
    <link rel="stylesheet" href="./css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="./css/bootstrap-select.min.css">
</head>
<body>
<?php $view->printNavBar();?>
<div class="container-fluid">
    <div class="row">

        <div class="col-md-2 sidebar">
            <?php $view->printLeftBar();?>
        </div>
        <div class="col-md-10 col-md-offset-2 main">
            <h1 class="page-header">时间数据统计</h1>
            <ol class="breadcrumb">
                <li>
                    <span class="glyphicon glyphicon-dashboard" aria-hidden="true"></span>
                    <a href="Home.php">控制面板</a>
                </li>
                <li class="active">
                    <i class="fa fa-edit"></i> 时间数据统计
                </li>
            </ol>
            </br>
            <form action="SumData.php" method="post" class="form-inline">
                <input type="hidden" value="query" name="type">
                <div class="form-group">
                    <label for="startdate">开始日期</label>
                    <input  size="16" type="text" placeholder="起始日期"  class="form_datetime form-control" name="startdate" id="startdate">
                </div>
                <div class="form-group">
                    <label for="enddate">结束日期</label>
                    <input size="16" type="text" placeholder="结束日期"  class="form_datetime form-control" name="enddate" id="enddate">
                </div>
                <button type="button" role="button" class="btn btn-default" id="search">汇总数据</button>
            </form>
            <br><br>
            <?php
                echo <<<HTML
                    <div class="table-responsive" style="display:none;" id="sumTable">
                        <table class="table table-striped" id="queryTable">
                            <thead>
                                <tr>
                                    <th>中标单位</th>
                                    <th>金额(元)</th>
                                </tr>
                            </thead>
                            <tfoot>
            <tr>
                <th>中标单位</th>
                                    <th>金额(元)</th>
            </tr>
        </tfoot>

HTML;

                echo <<<HTML

                  </table>
            </div>
HTML;

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

    $("#search").click(function(){
        var startDate = $("#startdate").val();
        var endDate = $("#enddate").val();
        if ( $.fn.dataTable.isDataTable( '#queryTable' ) ) {
            var table = $('#queryTable').DataTable( {
                retrieve: true,
                paging: false
            } );
            table.ajax.url( "getSumData.php?startdate="+startDate+"&enddate="+endDate ).load();
        }
        else {
            $('#queryTable').DataTable( {
                ajax: "getSumData.php?startdate="+startDate+"&enddate="+endDate
            } );
        }

        $("#sumTable").css("display","block");
        a();
        return;

    });
    function a(){
        $('#queryTable').children("tbody").first().children().each(function(){
            var htmla = "<a href='http://115.159.31.63/SEProjectWeb/QueryByOrg.php?type=detail&keyword="+ $(this).children().first().text() +"'>"+$(this).children().first().text()+"</a>";
            $(this).children().first().html(htmla);
        });
        return;
    }

</script>
<script type="text/javascript">
    $("#timequeryli").attr("class","active");
</script>
</body>
</html>
