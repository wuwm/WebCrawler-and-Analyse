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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>首页</title>
    <?php $view->printHead();?>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">

    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php $view->printNavBar();?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 sidebar">
            <?php $view->printLeftBar();?>
        </div>
        <div class="col-md-10 col-md-offset-2 main">
            <h1 class="page-header">首页</h1>
            <ol class="breadcrumb">
                <li>
                    <span class="glyphicon glyphicon-dashboard" aria-hidden="true"></span>
                    <a href="Home.php">控制面板</a>
                </li>
                <li class="active">
                    <i class="fa fa-edit"></i> 首页
                </li>
            </ol>
            <div class="row">
<!--                <p>欢迎您，--><?php //echo $_SESSION["userName"];?><!--</p>-->
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="alert alert-info alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <i class="fa fa-info-circle"></i>  <strong>通知</strong>  系统运行正常
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-comments fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">10</div>
                                    <div>爬虫数量</div>
                                </div>
                            </div>
                        </div>
                        <a href="CrawlSettings.php">
                            <div class="panel-footer">
                                <span class="pull-left">查看详情</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">0</div>
                                    <div>运行中的任务</div>
                                </div>
                            </div>
                        </div>
                        <a href="CrawlStatus.php">
                            <div class="panel-footer">
                                <span class="pull-left">查看详情</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-shopping-cart fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">4</div>
                                    <div>用户数量</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">查看详情</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-support fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">7898</div>
                                    <div>数据总量</div>
                                </div>
                            </div>
                        </div>
                        <a href="Query.php">
                            <div class="panel-footer">
                                <span class="pull-left">查看详情</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i>运行带宽监控示意图</h3>
                        </div>
                        <div class="panel-body">
                            <div id="morris-area-chart"
                                 style="position: relative; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
                                <svg height="347" version="1.1" width="1118" xmlns="http://www.w3.org/2000/svg"
                                     style="overflow: hidden; position: relative;">
                                    <desc style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Created with RaphaÃ«l
                                        2.1.2
                                    </desc>
                                    <defs style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></defs>
                                    <text x="49.203125" y="313" text-anchor="end" font="10px &quot;Arial&quot;"
                                          stroke="none" fill="#888888"
                                          style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-style: normal; font-variant: normal; font-weight: normal; font-stretch: normal; font-size: 12px; line-height: normal; font-family: sans-serif;"
                                          font-size="12px" font-family="sans-serif" font-weight="normal">
                                        <tspan dy="4.25" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">0
                                        </tspan>
                                    </text>
                                    <path fill="none" stroke="#aaaaaa" d="M61.703125,313H1093" stroke-width="0.5"
                                          style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path>
                                    <text x="49.203125" y="241" text-anchor="end" font="10px &quot;Arial&quot;"
                                          stroke="none" fill="#888888"
                                          style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-style: normal; font-variant: normal; font-weight: normal; font-stretch: normal; font-size: 12px; line-height: normal; font-family: sans-serif;"
                                          font-size="12px" font-family="sans-serif" font-weight="normal">
                                        <tspan dy="4.25" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">7,500
                                        </tspan>
                                    </text>
                                    <path fill="none" stroke="#aaaaaa" d="M61.703125,241H1093" stroke-width="0.5"
                                          style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path>
                                    <text x="49.203125" y="169" text-anchor="end" font="10px &quot;Arial&quot;"
                                          stroke="none" fill="#888888"
                                          style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-style: normal; font-variant: normal; font-weight: normal; font-stretch: normal; font-size: 12px; line-height: normal; font-family: sans-serif;"
                                          font-size="12px" font-family="sans-serif" font-weight="normal">
                                        <tspan dy="4.25" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">15,000
                                        </tspan>
                                    </text>
                                    <path fill="none" stroke="#aaaaaa" d="M61.703125,169H1093" stroke-width="0.5"
                                          style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path>
                                    <text x="49.203125" y="97.00000000000003" text-anchor="end"
                                          font="10px &quot;Arial&quot;" stroke="none" fill="#888888"
                                          style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-style: normal; font-variant: normal; font-weight: normal; font-stretch: normal; font-size: 12px; line-height: normal; font-family: sans-serif;"
                                          font-size="12px" font-family="sans-serif" font-weight="normal">
                                        <tspan dy="4.250000000000028"
                                               style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">22,500
                                        </tspan>
                                    </text>
                                    <path fill="none" stroke="#aaaaaa" d="M61.703125,97.00000000000003H1093"
                                          stroke-width="0.5"
                                          style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path>
                                    <text x="49.203125" y="25" text-anchor="end" font="10px &quot;Arial&quot;"
                                          stroke="none" fill="#888888"
                                          style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-style: normal; font-variant: normal; font-weight: normal; font-stretch: normal; font-size: 12px; line-height: normal; font-family: sans-serif;"
                                          font-size="12px" font-family="sans-serif" font-weight="normal">
                                        <tspan dy="4.25" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">30,000
                                        </tspan>
                                    </text>
                                    <path fill="none" stroke="#aaaaaa" d="M61.703125,25H1093" stroke-width="0.5"
                                          style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path>
                                    <text x="1093" y="325.5" text-anchor="middle" font="10px &quot;Arial&quot;"
                                          stroke="none" fill="#888888"
                                          style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-style: normal; font-variant: normal; font-weight: normal; font-stretch: normal; font-size: 12px; line-height: normal; font-family: sans-serif;"
                                          font-size="12px" font-family="sans-serif" font-weight="normal"
                                          transform="matrix(1,0,0,1,0,7)">
                                        <tspan dy="4.25" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
                                            2012-06
                                        </tspan>
                                    </text>
                                    <text x="1016.5612279769138" y="325.5" text-anchor="middle"
                                          font="10px &quot;Arial&quot;" stroke="none" fill="#888888"
                                          style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-style: normal; font-variant: normal; font-weight: normal; font-stretch: normal; font-size: 12px; line-height: normal; font-family: sans-serif;"
                                          font-size="12px" font-family="sans-serif" font-weight="normal"
                                          transform="matrix(1,0,0,1,0,7)">
                                        <tspan dy="4.25" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
                                            2012-04
                                        </tspan>
                                    </text>
                                    <text x="941.3755505771568" y="325.5" text-anchor="middle"
                                          font="10px &quot;Arial&quot;" stroke="none" fill="#888888"
                                          style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-style: normal; font-variant: normal; font-weight: normal; font-stretch: normal; font-size: 12px; line-height: normal; font-family: sans-serif;"
                                          font-size="12px" font-family="sans-serif" font-weight="normal"
                                          transform="matrix(1,0,0,1,0,7)">
                                        <tspan dy="4.25" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
                                            2012-02
                                        </tspan>
                                    </text>
                                    <text x="863.6836839307412" y="325.5" text-anchor="middle"
                                          font="10px &quot;Arial&quot;" stroke="none" fill="#888888"
                                          style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-style: normal; font-variant: normal; font-weight: normal; font-stretch: normal; font-size: 12px; line-height: normal; font-family: sans-serif;"
                                          font-size="12px" font-family="sans-serif" font-weight="normal"
                                          transform="matrix(1,0,0,1,0,7)">
                                        <tspan dy="4.25" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
                                            2011-12
                                        </tspan>
                                    </text>
                                    <text x="787.2449119076549" y="325.5" text-anchor="middle"
                                          font="10px &quot;Arial&quot;" stroke="none" fill="#888888"
                                          style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-style: normal; font-variant: normal; font-weight: normal; font-stretch: normal; font-size: 12px; line-height: normal; font-family: sans-serif;"
                                          font-size="12px" font-family="sans-serif" font-weight="normal"
                                          transform="matrix(1,0,0,1,0,7)">
                                        <tspan dy="4.25" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
                                            2011-10
                                        </tspan>
                                    </text>
                                    <text x="710.8061398845687" y="325.5" text-anchor="middle"
                                          font="10px &quot;Arial&quot;" stroke="none" fill="#888888"
                                          style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-style: normal; font-variant: normal; font-weight: normal; font-stretch: normal; font-size: 12px; line-height: normal; font-family: sans-serif;"
                                          font-size="12px" font-family="sans-serif" font-weight="normal"
                                          transform="matrix(1,0,0,1,0,7)">
                                        <tspan dy="4.25" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
                                            2011-08
                                        </tspan>
                                    </text>
                                    <text x="634.3673678614824" y="325.5" text-anchor="middle"
                                          font="10px &quot;Arial&quot;" stroke="none" fill="#888888"
                                          style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-style: normal; font-variant: normal; font-weight: normal; font-stretch: normal; font-size: 12px; line-height: normal; font-family: sans-serif;"
                                          font-size="12px" font-family="sans-serif" font-weight="normal"
                                          transform="matrix(1,0,0,1,0,7)">
                                        <tspan dy="4.25" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
                                            2011-06
                                        </tspan>
                                    </text>
                                    <text x="557.9285958383962" y="325.5" text-anchor="middle"
                                          font="10px &quot;Arial&quot;" stroke="none" fill="#888888"
                                          style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-style: normal; font-variant: normal; font-weight: normal; font-stretch: normal; font-size: 12px; line-height: normal; font-family: sans-serif;"
                                          font-size="12px" font-family="sans-serif" font-weight="normal"
                                          transform="matrix(1,0,0,1,0,7)">
                                        <tspan dy="4.25" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
                                            2011-04
                                        </tspan>
                                    </text>
                                    <text x="483.9960130619684" y="325.5" text-anchor="middle"
                                          font="10px &quot;Arial&quot;" stroke="none" fill="#888888"
                                          style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-style: normal; font-variant: normal; font-weight: normal; font-stretch: normal; font-size: 12px; line-height: normal; font-family: sans-serif;"
                                          font-size="12px" font-family="sans-serif" font-weight="normal"
                                          transform="matrix(1,0,0,1,0,7)">
                                        <tspan dy="4.25" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
                                            2011-02
                                        </tspan>
                                    </text>
                                    <text x="406.30414641555285" y="325.5" text-anchor="middle"
                                          font="10px &quot;Arial&quot;" stroke="none" fill="#888888"
                                          style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-style: normal; font-variant: normal; font-weight: normal; font-stretch: normal; font-size: 12px; line-height: normal; font-family: sans-serif;"
                                          font-size="12px" font-family="sans-serif" font-weight="normal"
                                          transform="matrix(1,0,0,1,0,7)">
                                        <tspan dy="4.25" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
                                            2010-12
                                        </tspan>
                                    </text>
                                    <text x="329.8653743924666" y="325.5" text-anchor="middle"
                                          font="10px &quot;Arial&quot;" stroke="none" fill="#888888"
                                          style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-style: normal; font-variant: normal; font-weight: normal; font-stretch: normal; font-size: 12px; line-height: normal; font-family: sans-serif;"
                                          font-size="12px" font-family="sans-serif" font-weight="normal"
                                          transform="matrix(1,0,0,1,0,7)">
                                        <tspan dy="4.25" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
                                            2010-10
                                        </tspan>
                                    </text>
                                    <text x="253.4266023693803" y="325.5" text-anchor="middle"
                                          font="10px &quot;Arial&quot;" stroke="none" fill="#888888"
                                          style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-style: normal; font-variant: normal; font-weight: normal; font-stretch: normal; font-size: 12px; line-height: normal; font-family: sans-serif;"
                                          font-size="12px" font-family="sans-serif" font-weight="normal"
                                          transform="matrix(1,0,0,1,0,7)">
                                        <tspan dy="4.25" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
                                            2010-08
                                        </tspan>
                                    </text>
                                    <text x="176.98783034629406" y="325.5" text-anchor="middle"
                                          font="10px &quot;Arial&quot;" stroke="none" fill="#888888"
                                          style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-style: normal; font-variant: normal; font-weight: normal; font-stretch: normal; font-size: 12px; line-height: normal; font-family: sans-serif;"
                                          font-size="12px" font-family="sans-serif" font-weight="normal"
                                          transform="matrix(1,0,0,1,0,7)">
                                        <tspan dy="4.25" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
                                            2010-06
                                        </tspan>
                                    </text>
                                    <text x="100.54905832320777" y="325.5" text-anchor="middle"
                                          font="10px &quot;Arial&quot;" stroke="none" fill="#888888"
                                          style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-style: normal; font-variant: normal; font-weight: normal; font-stretch: normal; font-size: 12px; line-height: normal; font-family: sans-serif;"
                                          font-size="12px" font-family="sans-serif" font-weight="normal"
                                          transform="matrix(1,0,0,1,0,7)">
                                        <tspan dy="4.25" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
                                            2010-04
                                        </tspan>
                                    </text>
                                    <path fill="#7cb47c" stroke="none"
                                          d="M61.703125,261.9952C90.52430133657352,256.7152,148.16665400972056,245.758,176.98783034629406,240.8752C205.80900668286756,235.9924,263.4513593560146,229.61712786885246,292.2725356925881,222.93280000000001C320.7804383733293,216.32112786885247,377.7962437348117,189.66403977900552,406.30414641555285,187.6912C434.4987754404617,185.74003977900554,490.88803349027944,205.80194285714288,519.0826625151883,207.23680000000002C547.9038388517619,208.70354285714288,605.5461915249089,198.32080000000002,634.3673678614824,199.29760000000002C663.188544198056,200.2744,720.8308968712029,232.39063606557377,749.6520732077764,215.0512C778.1599758885176,197.90023606557378,835.17578125,69.70240000000001,863.6836839307412,61.33600000000001C892.1915866114823,52.969600000000014,949.2073919729648,135.85260327868852,977.715294653706,148.12C1006.5364709902794,160.52220327868852,1064.1788236634266,157.04080000000002,1093,160.01440000000002L1093,313L61.703125,313Z"
                                          fill-opacity="1"
                                          style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></path>
                                    <path fill="none" stroke="#4da74d"
                                          d="M61.703125,261.9952C90.52430133657352,256.7152,148.16665400972056,245.758,176.98783034629406,240.8752C205.80900668286756,235.9924,263.4513593560146,229.61712786885246,292.2725356925881,222.93280000000001C320.7804383733293,216.32112786885247,377.7962437348117,189.66403977900552,406.30414641555285,187.6912C434.4987754404617,185.74003977900554,490.88803349027944,205.80194285714288,519.0826625151883,207.23680000000002C547.9038388517619,208.70354285714288,605.5461915249089,198.32080000000002,634.3673678614824,199.29760000000002C663.188544198056,200.2744,720.8308968712029,232.39063606557377,749.6520732077764,215.0512C778.1599758885176,197.90023606557378,835.17578125,69.70240000000001,863.6836839307412,61.33600000000001C892.1915866114823,52.969600000000014,949.2073919729648,135.85260327868852,977.715294653706,148.12C1006.5364709902794,160.52220327868852,1064.1788236634266,157.04080000000002,1093,160.01440000000002"
                                          stroke-width="3"
                                          style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path>
                                    <circle cx="61.703125" cy="261.9952" r="2" fill="#4da74d" stroke="#ffffff"
                                            stroke-width="1"
                                            style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                    <circle cx="176.98783034629406" cy="240.8752" r="2" fill="#4da74d" stroke="#ffffff"
                                            stroke-width="1"
                                            style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                    <circle cx="292.2725356925881" cy="222.93280000000001" r="2" fill="#4da74d"
                                            stroke="#ffffff" stroke-width="1"
                                            style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                    <circle cx="406.30414641555285" cy="187.6912" r="2" fill="#4da74d" stroke="#ffffff"
                                            stroke-width="1"
                                            style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                    <circle cx="519.0826625151883" cy="207.23680000000002" r="2" fill="#4da74d"
                                            stroke="#ffffff" stroke-width="1"
                                            style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                    <circle cx="634.3673678614824" cy="199.29760000000002" r="2" fill="#4da74d"
                                            stroke="#ffffff" stroke-width="1"
                                            style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                    <circle cx="749.6520732077764" cy="215.0512" r="2" fill="#4da74d" stroke="#ffffff"
                                            stroke-width="1"
                                            style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                    <circle cx="863.6836839307412" cy="61.33600000000001" r="2" fill="#4da74d"
                                            stroke="#ffffff" stroke-width="1"
                                            style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                    <circle cx="977.715294653706" cy="148.12" r="2" fill="#4da74d" stroke="#ffffff"
                                            stroke-width="1"
                                            style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                    <circle cx="1093" cy="160.01440000000002" r="2" fill="#4da74d" stroke="#ffffff"
                                            stroke-width="1"
                                            style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                    <path fill="#a7b3bc" stroke="none"
                                          d="M61.703125,287.4064C90.52430133657352,281.632,148.16665400972056,269.3668,176.98783034629406,264.3088C205.80900668286756,259.2508,263.4513593560146,249.70782950819674,292.2725356925881,246.94240000000002C320.7804383733293,244.20702950819674,377.7962437348117,244.5294187845304,406.30414641555285,242.30560000000003C434.4987754404617,240.1062187845304,490.88803349027944,232.33412747252746,519.0826625151883,229.2496C547.9038388517619,226.09652747252747,605.5461915249089,217.22440000000003,634.3673678614824,217.35520000000002C663.188544198056,217.48600000000002,720.8308968712029,243.66103606557377,749.6520732077764,230.296C778.1599758885176,217.07623606557377,835.17578125,118.85440000000001,863.6836839307412,111.01600000000002C892.1915866114823,103.17760000000001,949.2073919729648,159.3600131147541,977.715294653706,167.58880000000002C1006.5364709902794,175.9080131147541,1064.1788236634266,174.8032,1093,177.208L1093,313L61.703125,313Z"
                                          fill-opacity="1"
                                          style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></path>
                                    <path fill="none" stroke="#7a92a3"
                                          d="M61.703125,287.4064C90.52430133657352,281.632,148.16665400972056,269.3668,176.98783034629406,264.3088C205.80900668286756,259.2508,263.4513593560146,249.70782950819674,292.2725356925881,246.94240000000002C320.7804383733293,244.20702950819674,377.7962437348117,244.5294187845304,406.30414641555285,242.30560000000003C434.4987754404617,240.1062187845304,490.88803349027944,232.33412747252746,519.0826625151883,229.2496C547.9038388517619,226.09652747252747,605.5461915249089,217.22440000000003,634.3673678614824,217.35520000000002C663.188544198056,217.48600000000002,720.8308968712029,243.66103606557377,749.6520732077764,230.296C778.1599758885176,217.07623606557377,835.17578125,118.85440000000001,863.6836839307412,111.01600000000002C892.1915866114823,103.17760000000001,949.2073919729648,159.3600131147541,977.715294653706,167.58880000000002C1006.5364709902794,175.9080131147541,1064.1788236634266,174.8032,1093,177.208"
                                          stroke-width="3"
                                          style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path>
                                    <circle cx="61.703125" cy="287.4064" r="2" fill="#7a92a3" stroke="#ffffff"
                                            stroke-width="1"
                                            style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                    <circle cx="176.98783034629406" cy="264.3088" r="2" fill="#7a92a3" stroke="#ffffff"
                                            stroke-width="1"
                                            style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                    <circle cx="292.2725356925881" cy="246.94240000000002" r="2" fill="#7a92a3"
                                            stroke="#ffffff" stroke-width="1"
                                            style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                    <circle cx="406.30414641555285" cy="242.30560000000003" r="2" fill="#7a92a3"
                                            stroke="#ffffff" stroke-width="1"
                                            style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                    <circle cx="519.0826625151883" cy="229.2496" r="2" fill="#7a92a3" stroke="#ffffff"
                                            stroke-width="1"
                                            style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                    <circle cx="634.3673678614824" cy="217.35520000000002" r="2" fill="#7a92a3"
                                            stroke="#ffffff" stroke-width="1"
                                            style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                    <circle cx="749.6520732077764" cy="230.296" r="2" fill="#7a92a3" stroke="#ffffff"
                                            stroke-width="1"
                                            style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                    <circle cx="863.6836839307412" cy="111.01600000000002" r="2" fill="#7a92a3"
                                            stroke="#ffffff" stroke-width="1"
                                            style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                    <circle cx="977.715294653706" cy="167.58880000000002" r="2" fill="#7a92a3"
                                            stroke="#ffffff" stroke-width="1"
                                            style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                    <circle cx="1093" cy="177.208" r="2" fill="#7a92a3" stroke="#ffffff"
                                            stroke-width="1"
                                            style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                    <path fill="#2577b5" stroke="none"
                                          d="M61.703125,287.4064C90.52430133657352,287.1376,148.16665400972056,289.0264,176.98783034629406,286.3312C205.80900668286756,283.636,263.4513593560146,267.03808524590164,292.2725356925881,265.8448C320.7804383733293,264.66448524590163,377.7962437348117,279.1269834254143,406.30414641555285,276.8368C434.4987754404617,274.57178342541437,490.88803349027944,249.88250549450552,519.0826625151883,247.62400000000002C547.9038388517619,245.3153054945055,605.5461915249089,256.18,634.3673678614824,258.568C663.188544198056,260.95599999999996,720.8308968712029,278.0732590163934,749.6520732077764,266.728C778.1599758885176,255.50605901639346,835.17578125,175.33960000000002,863.6836839307412,168.2992C892.1915866114823,161.2588,949.2073919729648,202.47914754098363,977.715294653706,210.40480000000002C1006.5364709902794,218.41754754098363,1064.1788236634266,226.6408,1093,232.0528L1093,313L61.703125,313Z"
                                          fill-opacity="1"
                                          style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></path>
                                    <path fill="none" stroke="#0b62a4"
                                          d="M61.703125,287.4064C90.52430133657352,287.1376,148.16665400972056,289.0264,176.98783034629406,286.3312C205.80900668286756,283.636,263.4513593560146,267.03808524590164,292.2725356925881,265.8448C320.7804383733293,264.66448524590163,377.7962437348117,279.1269834254143,406.30414641555285,276.8368C434.4987754404617,274.57178342541437,490.88803349027944,249.88250549450552,519.0826625151883,247.62400000000002C547.9038388517619,245.3153054945055,605.5461915249089,256.18,634.3673678614824,258.568C663.188544198056,260.95599999999996,720.8308968712029,278.0732590163934,749.6520732077764,266.728C778.1599758885176,255.50605901639346,835.17578125,175.33960000000002,863.6836839307412,168.2992C892.1915866114823,161.2588,949.2073919729648,202.47914754098363,977.715294653706,210.40480000000002C1006.5364709902794,218.41754754098363,1064.1788236634266,226.6408,1093,232.0528"
                                          stroke-width="3"
                                          style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path>
                                    <circle cx="61.703125" cy="287.4064" r="2" fill="#0b62a4" stroke="#ffffff"
                                            stroke-width="1"
                                            style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                    <circle cx="176.98783034629406" cy="286.3312" r="2" fill="#0b62a4" stroke="#ffffff"
                                            stroke-width="1"
                                            style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                    <circle cx="292.2725356925881" cy="265.8448" r="2" fill="#0b62a4" stroke="#ffffff"
                                            stroke-width="1"
                                            style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                    <circle cx="406.30414641555285" cy="276.8368" r="2" fill="#0b62a4" stroke="#ffffff"
                                            stroke-width="1"
                                            style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                    <circle cx="519.0826625151883" cy="247.62400000000002" r="2" fill="#0b62a4"
                                            stroke="#ffffff" stroke-width="1"
                                            style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                    <circle cx="634.3673678614824" cy="258.568" r="2" fill="#0b62a4" stroke="#ffffff"
                                            stroke-width="1"
                                            style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                    <circle cx="749.6520732077764" cy="266.728" r="2" fill="#0b62a4" stroke="#ffffff"
                                            stroke-width="1"
                                            style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                    <circle cx="863.6836839307412" cy="168.2992" r="2" fill="#0b62a4" stroke="#ffffff"
                                            stroke-width="1"
                                            style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                    <circle cx="977.715294653706" cy="210.40480000000002" r="2" fill="#0b62a4"
                                            stroke="#ffffff" stroke-width="1"
                                            style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                    <circle cx="1093" cy="232.0528" r="2" fill="#0b62a4" stroke="#ffffff"
                                            stroke-width="1"
                                            style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                </svg>
                                <div class="morris-hover morris-default-style"
                                     style="left: 4.70312px; top: 183px; display: none;">
                                    <div class="morris-hover-row-label">2010 Q1</div>
                                    <div class="morris-hover-point" style="color: #0b62a4">
                                        iPhone:
                                        2,666
                                    </div>
                                    <div class="morris-hover-point" style="color: #7A92A3">
                                        iPad:
                                        -
                                    </div>
                                    <div class="morris-hover-point" style="color: #4da74d">
                                        iPod Touch:
                                        2,647
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<!--            <div class="row">-->
<!--                <div class="col-lg-4">-->
<!--                    <div class="panel panel-default">-->
<!--                        <div class="panel-heading">-->
<!--                            <h3 class="panel-title"><i class="fa fa-long-arrow-right fa-fw"></i> Donut Chart</h3>-->
<!--                        </div>-->
<!--                        <div class="panel-body">-->
<!--                            <div id="morris-donut-chart"><svg height="347" version="1.1" width="331" xmlns="http://www.w3.org/2000/svg" style="overflow: hidden; position: relative;"><desc style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Created with RaphaÃ«l 2.1.2</desc><defs style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></defs><path fill="none" stroke="#0b62a4" d="M165.5,279.6666666666667A103.66666666666667,103.66666666666667,0,0,0,263.41985516468753,210.0364472632558" stroke-width="2" opacity="0" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); opacity: 0;"></path><path fill="#0b62a4" stroke="#ffffff" d="M165.5,282.6666666666667A106.66666666666667,106.66666666666667,0,0,0,266.25354872250807,211.02142483679054L307.65696015066374,225.41304160565915A150.5,150.5,0,0,1,165.5,326.5Z" stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><path fill="none" stroke="#3980b5" d="M263.41985516468753,210.0364472632558A103.66666666666667,103.66666666666667,0,0,0,72.50848892625609,130.1812631557837" stroke-width="2" opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); opacity: 1;"></path><path fill="#3980b5" stroke="#ffffff" d="M266.25354872250807,211.02142483679054A106.66666666666667,106.66666666666667,0,0,0,69.81741625852717,128.85531900273565L26.012733389384152,107.2718947336756A155.5,155.5,0,0,1,312.3797827470313,227.0546708948837Z" stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><path fill="none" stroke="#679dc6" d="M72.50848892625609,130.1812631557837A103.66666666666667,103.66666666666667,0,0,0,165.46743215669352,279.6666615509218" stroke-width="2" opacity="0" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); opacity: 0;"></path><path fill="#679dc6" stroke="#ffffff" d="M69.81741625852717,128.85531900273565A106.66666666666667,106.66666666666667,0,0,0,165.46648967891295,282.6666614028777L165.45271903134125,326.49999257312277A150.5,150.5,0,0,1,30.49785450226568,109.48180165542236Z" stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="165.5" y="166" text-anchor="middle" font="10px &quot;Arial&quot;" stroke="none" fill="#000000" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-style: normal; font-variant: normal; font-weight: 800; font-stretch: normal; font-size: 15px; line-height: normal; font-family: Arial;" font-size="15px" font-weight="800" transform="matrix(1.8654,0,0,1.8654,-143.213,-150.7989)" stroke-width="0.5360731511254019"><tspan dy="5.25" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">In-Store Sales</tspan></text><text x="165.5" y="186" text-anchor="middle" font="10px &quot;Arial&quot;" stroke="none" fill="#000000" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-style: normal; font-variant: normal; font-weight: normal; font-stretch: normal; font-size: 14px; line-height: normal; font-family: Arial;" font-size="14px" transform="matrix(2.2294,0,0,2.2294,-203.4449,-219.1389)" stroke-width="0.44855305466237944"><tspan dy="4.75" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">30</tspan></text></svg></div>-->
<!--                            <div class="text-right">-->
<!--                                <a href="#">View Details <i class="fa fa-arrow-circle-right"></i></a>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="col-lg-4">-->
<!--                    <div class="panel panel-default">-->
<!--                        <div class="panel-heading">-->
<!--                            <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> Tasks Panel</h3>-->
<!--                        </div>-->
<!--                        <div class="panel-body">-->
<!--                            <div class="list-group">-->
<!--                                <a href="#" class="list-group-item">-->
<!--                                    <span class="badge">just now</span>-->
<!--                                    <i class="fa fa-fw fa-calendar"></i> Calendar updated-->
<!--                                </a>-->
<!--                                <a href="#" class="list-group-item">-->
<!--                                    <span class="badge">4 minutes ago</span>-->
<!--                                    <i class="fa fa-fw fa-comment"></i> Commented on a post-->
<!--                                </a>-->
<!--                                <a href="#" class="list-group-item">-->
<!--                                    <span class="badge">23 minutes ago</span>-->
<!--                                    <i class="fa fa-fw fa-truck"></i> Order 392 shipped-->
<!--                                </a>-->
<!--                                <a href="#" class="list-group-item">-->
<!--                                    <span class="badge">46 minutes ago</span>-->
<!--                                    <i class="fa fa-fw fa-money"></i> Invoice 653 has been paid-->
<!--                                </a>-->
<!--                                <a href="#" class="list-group-item">-->
<!--                                    <span class="badge">1 hour ago</span>-->
<!--                                    <i class="fa fa-fw fa-user"></i> A new user has been added-->
<!--                                </a>-->
<!--                                <a href="#" class="list-group-item">-->
<!--                                    <span class="badge">2 hours ago</span>-->
<!--                                    <i class="fa fa-fw fa-check"></i> Completed task: "pick up dry cleaning"-->
<!--                                </a>-->
<!--                                <a href="#" class="list-group-item">-->
<!--                                    <span class="badge">yesterday</span>-->
<!--                                    <i class="fa fa-fw fa-globe"></i> Saved the world-->
<!--                                </a>-->
<!--                                <a href="#" class="list-group-item">-->
<!--                                    <span class="badge">two days ago</span>-->
<!--                                    <i class="fa fa-fw fa-check"></i> Completed task: "fix error on sales page"-->
<!--                                </a>-->
<!--                            </div>-->
<!--                            <div class="text-right">-->
<!--                                <a href="#">View All Activity <i class="fa fa-arrow-circle-right"></i></a>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="col-lg-4">-->
<!--                    <div class="panel panel-default">-->
<!--                        <div class="panel-heading">-->
<!--                            <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Transactions Panel</h3>-->
<!--                        </div>-->
<!--                        <div class="panel-body">-->
<!--                            <div class="table-responsive">-->
<!--                                <table class="table table-bordered table-hover table-striped">-->
<!--                                    <thead>-->
<!--                                    <tr>-->
<!--                                        <th>Order #</th>-->
<!--                                        <th>Order Date</th>-->
<!--                                        <th>Order Time</th>-->
<!--                                        <th>Amount (USD)</th>-->
<!--                                    </tr>-->
<!--                                    </thead>-->
<!--                                    <tbody>-->
<!--                                    <tr>-->
<!--                                        <td>3326</td>-->
<!--                                        <td>10/21/2013</td>-->
<!--                                        <td>3:29 PM</td>-->
<!--                                        <td>$321.33</td>-->
<!--                                    </tr>-->
<!--                                    <tr>-->
<!--                                        <td>3325</td>-->
<!--                                        <td>10/21/2013</td>-->
<!--                                        <td>3:20 PM</td>-->
<!--                                        <td>$234.34</td>-->
<!--                                    </tr>-->
<!--                                    <tr>-->
<!--                                        <td>3324</td>-->
<!--                                        <td>10/21/2013</td>-->
<!--                                        <td>3:03 PM</td>-->
<!--                                        <td>$724.17</td>-->
<!--                                    </tr>-->
<!--                                    <tr>-->
<!--                                        <td>3323</td>-->
<!--                                        <td>10/21/2013</td>-->
<!--                                        <td>3:00 PM</td>-->
<!--                                        <td>$23.71</td>-->
<!--                                    </tr>-->
<!--                                    <tr>-->
<!--                                        <td>3322</td>-->
<!--                                        <td>10/21/2013</td>-->
<!--                                        <td>2:49 PM</td>-->
<!--                                        <td>$8345.23</td>-->
<!--                                    </tr>-->
<!--                                    <tr>-->
<!--                                        <td>3321</td>-->
<!--                                        <td>10/21/2013</td>-->
<!--                                        <td>2:23 PM</td>-->
<!--                                        <td>$245.12</td>-->
<!--                                    </tr>-->
<!--                                    <tr>-->
<!--                                        <td>3320</td>-->
<!--                                        <td>10/21/2013</td>-->
<!--                                        <td>2:15 PM</td>-->
<!--                                        <td>$5663.54</td>-->
<!--                                    </tr>-->
<!--                                    <tr>-->
<!--                                        <td>3319</td>-->
<!--                                        <td>10/21/2013</td>-->
<!--                                        <td>2:13 PM</td>-->
<!--                                        <td>$943.45</td>-->
<!--                                    </tr>-->
<!--                                    </tbody>-->
<!--                                </table>-->
<!--                            </div>-->
<!--                            <div class="text-right">-->
<!--                                <a href="#">View All Transactions <i class="fa fa-arrow-circle-right"></i></a>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->

        </div>
    </div>
</div>
<script type="text/javascript">
    $("#homeli").attr("class","active");
</script>
</body>
</html>
