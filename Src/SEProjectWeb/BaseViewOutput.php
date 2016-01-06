<?php
session_start();
require_once('DataBaseEngine.php');

/**
 * Created by PhpStorm.
 * User: Wu
 * Date: 12/6/15
 * Time: 9:10 PM
 */
class BaseViewOutput
{
    private $db;

    function __construct()
    {
        $this->db = new DataBaseEngine();
    }


    function printHead()
    {
        echo <<<HTML
    <meta charset="UTF-8">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="./css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="./css/bootstrap-theme.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="./js/jquery-2.1.4.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/datatables.min.css"/>
    <link href="css/dashboard.css" rel="stylesheet">
    <script type="text/javascript" src="js/datatables.min.js"></script>
    <script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "//hm.baidu.com/hm.js?5314f42f4cbbe53967a1edec7c44a42f";
  var s = document.getElementsByTagName("script")[0];
  s.parentNode.insertBefore(hm, s);
})();
</script>
HTML;
    }

    function printNavBar()
    {
        echo <<<HTML
            <nav class="navbar navbar-inverse  navbar-fixed-top" role="navigation">
                <div class="navbar-header">

                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
                    </button> <a class="navbar-brand" href="index.php">软件工程课程设计</a>
                </div>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                    </ul>
HTML;
        if (isset($_SESSION["id"])) {
            echo <<<HTML
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">用户中心<strong class="caret"></strong></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="UserInfo.php">个人信息</a>
                                </li>
                                <li>
                                    <a href="./Home.php">功能界面</a>
                                </li>
                                <li class="divider">
                                </li>
                                <li>
                                    <a href="./Logout.php">退出登录</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"></a>
                        </li>
                    </ul>
HTML;
        } else {
            echo <<<HTML
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a data-toggle="modal" data-target="#loginModal">登录</a>
                </li>
                <li>
                    <a data-toggle="modal" data-target="#signUpModal">注册</a>
                </li>
                <li>
                    <a href="#"></a>
                </li>
            </ul>
HTML;
        }
        echo <<<HTML
            </div>
        </nav>
HTML;
    }

    function printLeftBar()
    {
        echo <<<HTML
                    <ul class="nav nav-sidebar">
                        <li id="homeli">
                            <a href="Home.php">首页<br><span class="sr-only">(current)</span></a>
                        </li>
                        <li id="runli">
                            <a href="#">运行情况</a>
                        </li>
                        <li id="userinfoli">
                            <a href="UserInfo.php">用户信息</a>
                        </li>
                        <!--<li>-->
                            <!--<a href="#">收费情况</a>-->
                        <!--</li>-->
                    </ul>
HTML;
        if ($_SESSION["type"] == "admin") {
            echo <<<HTML
            <ul class="nav nav-sidebar">
                        <li id="crawlli">
                            <a href="./CrawlSettings.php">爬虫管理</a>
                        </li>
                        <li id="crawlstatusli">
                            <a href="./CrawlStatus.php">爬虫状态</a>
                        </li>
                        <!--<li>-->
                            <!--<a href="">数据管理</a>-->
                        <!--</li>-->
                        <!--<li>-->
                            <!--<a href="">Another nav item</a>-->
                        <!--</li>-->
                        <li id="userManagementli">
                            <a href="UserManagement.php">用户管理</a>
                        </li>
            </ul>
HTML;

        }
        echo <<<HTML

                    <ul class="nav nav-sidebar">
                        <li id="queryli">
                            <a href="./Query.php">数据查询</a>
                        </li>
                        <li id="orgqueryli">
                            <a href="QueryByOrg.php">企业数据统计</a>
                        </li>
                        <li id="timequeryli">
                            <a href="SumData.php">时间数据统计</a>
                        </li>
                        <!--<li>-->
                            <!--<a href="">Another nav item</a>-->
                        <!--</li>-->
                    </ul>
HTML;
    }

    function printRuleTable()
    {
        $stmt = $this->db->getScrawlSettings();
        echo <<<HTML
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>名称</th>
                                    <th>开始地址</th>
                                    <th>是否可用</th>
                                    <th>操作</th>
                                </tr>
                            </thead>
                            <tbody>
HTML;
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $id = $row['id'];
            $name = $row['name'];
            $startURL = $row['starturl'];
            $enable = $row['enable'];
            $targetModal = '#detailModal' . $id;
            echo <<<HTML
                                <tr>
                                    <td>$id</td>
                                    <td>$name</td>
                                    <td>$startURL</td>
                                    <td>$enable</td>
                                    <td>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=$targetModal>查看详情
                                            <br>
                                        </button>
                                        <a class="btn btn-danger" href="./CrawlSettings.php?type=delete&id=$id" role="button">删除</a>
                                        <!--<button type="button" class="btn btn-danger">删除</button>-->
                                    </td>
                                </tr>
HTML;
        }
        echo <<<HTML
                        </tbody>
                  </table>
            </div>
HTML;

    }

    function printCrawlerStatusTable()
    {

        echo <<<HTML
                    <div class="table-responsive">
                        <table class="table table-striped" id="statusTable">
                            <thead>
                                <tr>
                                    <th>爬虫id</th>
                                    <th>爬虫名称</th>
                                    <th>当前页码</th>
                                    <th>当前标题</th>
                                </tr>
                            </thead>
                            <tfoot>
            <tr>
                <th>爬虫id</th>
                                    <th>爬虫名称</th>
                                    <th>当前页码</th>
                                    <th>当前标题</th>
            </tr>
        </tfoot>
HTML;

        echo <<<HTML
                  </table>
            </div>
HTML;

    }

    function printUserTable()
    {

        echo <<<HTML
                    <div class="table-responsive">
                        <table class="table table-striped" id="statusTable">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>用户名</th>
                                    <th>类型</th>
                                    <th>操作</th>
                                </tr>
                            </thead>


                            <tbody>
HTML;
        $stmt = $this->db->selectAllUser();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $id = $row['id'];
            $username = $row['username'];
            $type = $row['type'];
            echo <<<HTML

                                <tr>

                                    <td>
                                    $id
                                    </td>
                                    <td><input type="text" value=$username id="username-$id"></td>
                                    <td><input type="text" value=$type id="usertype-$id"></td>
                                    <td><input type="submit" class="btn btn-primary" value="修改" onclick="modifyUser($id);"><p id="status-$id"></p></td>

                                </tr>

HTML;
        }
        echo <<<HTML
                        </tbody>
                                                    <tfoot>
            <tr>
                <th>id</th>
                                    <th>用户名</th>
                                    <th>类型</th>
                                    <th>操作</th>
            </tr>
        </tfoot>
                  </table>
            </div>
HTML;

    }

    function printCrawlSettingsModal()
    {
        $stmt = $this->db->getScrawlSettings();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $id = ($row['id']);
            $name = ($row['name']);
            $startURL = ($row['starturl']);
            $articlelinkrule = ($row['articlelinkrule']);
            $titlerule = ($row['titlerule']);
            $contentrule = ($row['contentrule']);
            $alloweddomain = ($row['alloweddomain']);
            $nextpagerule = ($row['nextpagerule']);
            $enable = ($row['enable']);
            $targetModal = 'detailModal' . $id;

            echo <<<HTML
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" id=$targetModal>
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="modalTitle">$name</h4>
      </div>
      <div class="modal-body">
        <div class="row">
<form class="form-horizontal" action="CrawlSettings.php" method="post">
    <input type="hidden" name="type" value="modify">
    <input type="hidden" name="id" value=$id>
    <div class="form-group">
    <label class="col-sm-2 control-label">爬虫id</label>
    <div class="col-sm-10">
      <p class="form-control-static" id="crawlIDLable">$id</p>
    </div>
    </div>
    <div class="form-group">
    <label for="inputPassword" class="col-sm-2 control-label">爬虫名</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="crawlNameLable" placeholder="爬虫名" name="name" value=$name>
    </div>
    </div>
    <div class="form-group">
    <label for="inputPassword" class="col-sm-2 control-label">允许域名</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="alloweddomain" placeholder="允许域名" name="alloweddomain" value=$alloweddomain>
    </div>
    </div>
    <div class="form-group">
    <label for="inputPassword" class="col-sm-2 control-label">开始地址</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="crawlStartLable" placeholder="开始地址" name="startURL" value=$startURL>
    </div>
    </div>
    <div class="form-group">
    <label for="inputPassword" class="col-sm-2 control-label">Link识别Xpath</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="crawlLinkLable" placeholder="Link" name="link" value=$articlelinkrule>
    </div>
    </div>
        <div class="form-group">
    <label for="inputPassword" class="col-sm-2 control-label">“下一页”识别Xpath</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="crawlNextLable" placeholder="下一页" name="next" value=$nextpagerule>
    </div>
    </div>
        <div class="form-group">
    <label for="inputPassword" class="col-sm-2 control-label">标题识别Xpath</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="crawlTitleLable" placeholder="标题" name="title" value=$titlerule>
    </div>
    </div>
        <div class="form-group">
    <label for="inputPassword" class="col-sm-2 control-label">内容识别Xpath</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="crawlContentLable" placeholder="内容" name="content" value=$contentrule>
    </div>
    </div>
    <div class="checkbox">
    <label>
      <input type="checkbox" id="crawlisEnableCheckBox" name="isEnable"> 可用
    </label>
    </div>
</div>
    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
        <button type="submit" class="btn btn-primary">保存修改</button>
      </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
HTML;
        }
    }

    function printQueryCondition()
    {
        echo <<<HTML


HTML;

    }

    function printCrawlSettingsModalAdd()
    {
        echo <<<HTML
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" id="addModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="modalTitle"></h4>
      </div>
      <div class="modal-body">
        <div class="row">
<form class="form-horizontal" action="CrawlSettings.php" method="post">
    <input type="hidden" name="type" value="add">
    <input type="hidden" name="id" value="">
    <div class="form-group">
    <label for="inputPassword" class="col-sm-2 control-label">爬虫名</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="crawlNameLable" placeholder="爬虫名" name="name" value="">
    </div>
    </div>
    <div class="form-group">
    <label for="inputPassword" class="col-sm-2 control-label">允许域名</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="alloweddomain" placeholder="允许域名" name="alloweddomain" value="">
    </div>
    </div>
    <div class="form-group">
    <label for="inputPassword" class="col-sm-2 control-label">开始地址</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="crawlStartLable" placeholder="开始地址" name="startURL" value="">
    </div>
    </div>
    <div class="form-group">
    <label for="inputPassword" class="col-sm-2 control-label">Link识别Xpath</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="crawlLinkLable" placeholder="Link" name="link" value="">
    </div>
    </div>
        <div class="form-group">
    <label for="inputPassword" class="col-sm-2 control-label">“下一页”识别Xpath</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="crawlNextLable" placeholder="下一页" name="next" value="">
    </div>
    </div>
        <div class="form-group">
    <label for="inputPassword" class="col-sm-2 control-label">标题识别Xpath</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="crawlTitleLable" placeholder="标题" name="title" value="">
    </div>
    </div>
        <div class="form-group">
    <label for="inputPassword" class="col-sm-2 control-label">内容识别Xpath</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="crawlContentLable" placeholder="内容" name="content" value="">
    </div>
    </div>
    <div class="checkbox">
    <label>
      <input type="checkbox" id="crawlisEnableCheckBox" name="isEnable"> 可用
    </label>
    </div>
</div>
    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
        <button type="submit" class="btn btn-primary">添加</button>
      </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
HTML;
    }

    function printLoginModal()
    {
        echo <<<HTML
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" id="loginModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="modalTitle"></h4>
      </div>
      <div class="modal-body">
        <div class="row">
<form class="form-horizontal" action="Login.php" method="post">
    <div class="form-group">
    <label for="inputPassword" class="col-sm-2 control-label">用户名</label>
    <div class="col-sm-10">
      <input type="text" class="form-control"  placeholder="用户名" name="userName" value="">
    </div>
    </div>
    <div class="form-group">
    <label for="inputPassword" class="col-sm-2 control-label">密码</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" placeholder="密码" name="password" value="">
    </div>
    </div>
    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
        <button type="submit" class="btn btn-primary">登陆</button>
      </div>
      </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
HTML;
    }

    function printSignUpModal()
    {
        echo <<<HTML
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" id="signUpModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="modalTitle"></h4>
      </div>
      <div class="modal-body">
        <div class="row">
<form class="form-horizontal" action="SignUp.php" method="post">
    <input type="hidden" name="type" value="add">
    <input type="hidden" name="id" value="">
    <div class="form-group">
    <label for="inputPassword" class="col-sm-2 control-label">用户名</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" placeholder="用户名" name="userName" value="">
    </div>
    </div>
    <div class="form-group">
    <label for="inputPassword" class="col-sm-2 control-label">密码</label>
    <div class="col-sm-10">
      <input type="password" class="form-control"  placeholder="密码" name="password" value="">
    </div>
    </div>
    <div class="form-group">
    <label for="inputPassword" class="col-sm-2 control-label">确认密码</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" placeholder="确认密码" name="verifyPassword" value="">
    </div>
    </div>
    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
        <button type="submit" class="btn btn-primary">注册</button>
      </div>
      </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
HTML;
    }

}