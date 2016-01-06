<?php
require_once('Security.php');
/**
 * Created by PhpStorm.
 * User: Wu
 * Date: 12/6/15
 * Time: 10:05 PM
 */
require_once('BaseViewOutput.php');
$view = new BaseViewOutput();
require_once("DataBaseEngine.php");
$db = new DataBaseEngine();
$userName = $_SESSION["userName"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>用户信息</title>
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
            <h1 class="page-header">用户信息</h1>
            <div class="row">
                <ol class="breadcrumb">
                    <li>
                        <span class="glyphicon glyphicon-dashboard" aria-hidden="true"></span>
                        <a href="Home.php">控制面板</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-edit"></i> 用户信息
                    </li>
                </ol>
            </div>
            <div class="row" id="status">

            </div>
            </br>
            <div class="row">
                <div class="col-md-2">

                </div>
                <div class="col-md-5">
                    <div class="row">
                        <?php
                        echo <<<HTML
                <form class="form-horizontal">
                    <div class="form-group">
                        <label for="userName" class="col-sm-2 control-label">用户名</label>
                        <div class="col-sm-10">
                            <p class="form-control-static">$userName</p>
                        </div>

                    </div>
                    <div class="form-group">
                        <label for="password" class="col-sm-2 control-label">密码</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" placeholder="密码" name="password" id="password">
                        </div>

                    </div>
                    <div class="form-group">
                        <label for="verifyPassword" class="col-sm-2 control-label">确认密码</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" placeholder="确认密码" name="verifyPassword" id="verifyPassword">
                        </div>

                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="button" role="button" class="btn btn-primary" id="modify">修改</button>
                        </div>
                    </div>

                </form>
HTML;

                        ?>


                    </div>
                </div>
                <div class="col-md-5">

                </div>
            </div>


        </div>
    </div>
</div>
<script type="text/javascript">

    $("#modify").click(function(){
        var password1 = $('#password').val();
        var verifyPassword1 = $('#verifyPassword').val();
        if(password1 != verifyPassword1){
            $('#status').html("<div class=\"alert alert-warning fade in\"><a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a><strong>警告</strong> 两次输入的密码不一致</div>");
        }else{
            $.get("http://115.159.31.63/SEProjectWeb/ModifyUserInfo.php?password="+password1+"&verifyPassword="+verifyPassword1, function(data, status){
                    $('#status').html("<div class=\"alert alert-success fade in\"><a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a><strong>成功,</strong> "+ data +" </div>");
            }).fail(function(){
                $('#status').html("<div class=\"alert alert-danger fade in\"><a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a><strong>错误</strong>  请稍后再试 </div>");
            });
        }

    })
</script>
<script type="text/javascript">
    $("#userinfoli").attr("class","active");
</script>
</body>
</html>
