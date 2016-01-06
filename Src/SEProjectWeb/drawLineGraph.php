<?php
/**
 * Created by PhpStorm.
 * User: Wu
 * Date: 12/22/15
 * Time: 8:13 AM
 */
//content="text/plain; charset=utf-8"
require_once("DataBaseEngine.php");
require_once("Security_admin.php");
$db = new DataBaseEngine();
require_once ('jpgraph/jpgraph.php');
require_once ('jpgraph/jpgraph_line.php');
$keyword = $_GET["keyword"];
$stmt = $db->selectDataByOrg($keyword);
$moneyArray = array();
$dateArray = array();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $org = $row['org'];
    $money = $row['money']/10000;
    $date = $row['date'];
    array_push($moneyArray,$money);
    array_push($dateArray,$date);
}
array_push($moneyArray,"");
array_push($dateArray,"");
$tickLabels = array();

// Setup the graph
$graph = new Graph(1200,300);
$graph->SetScale("textlin");

$theme_class=new UniversalTheme;

$graph->SetTheme($theme_class);
$graph->img->SetAntiAliasing(false);
$graph->title->Set('Sum Up');
$graph->SetBox(false);

$graph->img->SetAntiAliasing();

$graph->yaxis->HideZeroLabel();
$graph->yaxis->HideLine(false);
$graph->yaxis->HideTicks(false,false);

$graph->xgrid->Show();
$graph->xgrid->SetLineStyle("solid");
$graph->xaxis->SetTickLabels($dateArray);
$graph->xgrid->SetColor('#E3E3E3');

// Create the first line
$p1 = new LinePlot($moneyArray);
$graph->Add($p1);
$p1->SetColor("#6495ED");
$p1->SetLegend('Trend');

$graph->legend->SetFrameWeight(1);

// Output line
$graph->Stroke();

?>

