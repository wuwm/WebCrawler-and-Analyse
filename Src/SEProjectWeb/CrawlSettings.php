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
require_once("DataBaseEngine.php");
$db = new DataBaseEngine();
if(isset($_POST['type'])){
    $type = $_POST['type'];
    if($type == "modify"){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $startURL = $_POST['startURL'];
        $alloweddomain = $_POST['alloweddomain'];
        $link = $_POST['link'];
        $next = $_POST['next'];
        $title = $_POST['title'];
        $content = $_POST['content'];
        $isEnable = isset($_POST['isEnable'])? 1:0;
        $db->modifyCrawlSettings($id,$name,$startURL,$alloweddomain,$link,$next,$title,$content,$isEnable);
//        echo "1";
    }else if($type == "add"){
        $name = $_POST['name'];
        $startURL = $_POST['startURL'];
        $alloweddomain = $_POST['alloweddomain'];
        $link = $_POST['link'];
        $next = $_POST['next'];
        $title = $_POST['title'];
        $content = $_POST['content'];
        $isEnable = isset($_POST['isEnable'])? 1:0;
        $db->addRule($name,$startURL,$alloweddomain,$link,$next,$title,$content,$isEnable);
    }else if($type == "fileupload"){
        if ($_FILES["file"]["error"] > 0)
        {
            echo "Error: " . $_FILES["file"]["error"] . "<br />";
        }
        else
        {
            if(true){
                $path = $_FILES["file"]["tmp_name"];
                $fp=fopen($path,"r") or die("Unable to open file!");;
                while(!(feof($fp)))
                {
                    $text=fgets($fp);//读取文件的一行
                    $arr = explode(" ",$text);
                    $name = $arr[0];
                    $startURL = $arr[1];
                    $alloweddomain =$arr[2];
                    $link = $arr[3];
                    $next = $arr[4];
                    $title = $arr[5];
                    $content = $arr[6];
                    $isEnable = $arr[7];
                    $db->addRule($name,$startURL,$alloweddomain,$link,$next,$title,$content,$isEnable);
                }
                fclose($fp);
            }else{

            }
//            echo "Upload: " . $_FILES["file"]["name"] . "<br />";
//            echo "Type: " . $_FILES["file"]["type"] . "<br />";
//            echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
//            echo "Stored in: " . $_FILES["file"]["tmp_name"];
        }
    }
}else if(isset($_GET["type"])){
    $type = $_GET['type'];
    if($type == "delete"){
        $db->deleteRule($_GET['id']);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>爬虫设置</title>
<?php $view->printHead();?>
</head>
<body>
    <?php $view->printCrawlSettingsModal();?>
    <?php $view->printCrawlSettingsModalAdd();?>
    <?php $view->printNavBar();?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 sidebar">
                <?php $view->printLeftBar();?>
            </div>
            <div class="col-md-10 col-md-offset-2 main">
                <h1 class="page-header">爬虫设置</h1>
                <ol class="breadcrumb">
                    <li>
                        <span class="glyphicon glyphicon-dashboard" aria-hidden="true"></span>
                        <a href="Home.php">控制面板</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-edit"></i>爬虫设置
                    </li>
                </ol>
                <div class="row">
                    <?php $view->printRuleTable();?>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <button type="button" class="btn btn-success" id="start">开始</button>
                        <button type="button" class="btn btn-danger" id="end">结束所有进程</button>
                        <!--                    <button type="button" class="btn btn-default" id="refresh">刷新状态</button>-->
                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#addModal">
                            添加
                        </button>
                    </div>
                    <div class="col-md-6">
                        <a href="DownloadTemplate.php" class="btn btn-info"> 下载模板 </a>
                        <form action="CrawlSettings.php" method="post" enctype="multipart/form-data" class="form-inline">
                            <input type="hidden" value="fileupload" name="type">
                            <input type="file" id="exampleInputFile" name="file">
                            <button type="submit" class="btn btn-default">从文本文件导入</button>
                        </form>
                    </div>


                </div>
<!--                <h2>爬虫状态</h2>-->
<!--                <div class="row">-->
<!--                    --><?php //$view->printCrawlerStatusTable();?>
<!--                </div>-->

            </div>
        </div>
    </div>
    <script src="./js/crawlsettings.js"></script>
    <script type="text/javascript">
        $("#crawlli").attr("class","active");
    </script>
</body>
</html>
