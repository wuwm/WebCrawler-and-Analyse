<?php
require_once('Security_admin.php');
/**
 * Created by PhpStorm.
 * User: Wu
 * Date: 12/6/15
 * Time: 10:05 PM
 */
require_once('BaseViewOutput.php');
$view = new BaseViewOutput();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>用户管理</title>
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
            <h1 class="page-header">用户管理</h1>
            <ol class="breadcrumb">
                <li>
                    <span class="glyphicon glyphicon-dashboard" aria-hidden="true"></span>
                    <a href="Home.php">控制面板</a>
                </li>
                <li class="active">
                    <i class="fa fa-edit"></i> 用户管理
                </li>
            </ol>
            <div class="row">
                <?php $view->printUserTable();?>
            </div>

        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {$('#statusTable').DataTable();});
</script>
<script type="text/javascript">
    $("#userManagementli").attr("class","active");
    function modifyUser(id){
        var username = $("#username-"+id).val();
        var usertype = $("#usertype-"+id).val();
        $.get("modifyUser.php?username="+username+"&usertype="+usertype+"&id="+id,function(data,status){
            $("#status-"+id).html(data);
        }).fail(function(){
            $("#status-"+id).html("网络错误");
        });
    }
</script>
</body>
</html>
