<?php 
@include("parts/header.php"); 
?>
<div class="container" id="container">
<div class="col-sm-3" id="sidebar">
<?php
@include("parts/breadcrups.php");
?>
<div class="sidebar_menu">
<ul>
<?=$data["left_menu"]?>
</ul>
</div>
</div>
<div class="col-sm-9" id="content">
<div class="page_title_2">
<?=$data["text_general"][0]["title"]?>
</div>
<div class="text_formats">
<label><?=$data["text_general"][0]["text"]?></label>
</div> 
</div>
</div>
</div>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript" charset="utf-8">
google.load("visualization", "1", {packages:["orgchart"]});
google.setOnLoadCallback(drawChart);
function drawChart() {
var data = new google.visualization.DataTable();
data.addColumn('string', 'Name');
data.addColumn('string', 'Manager');
data.addColumn('string', 'ToolTip');
data.addRows([
<?php echo $k; ?>
]);
<?php
$font = (LANG=="ge") ? 'bpg_sans_web' : 'roboto'; 
$size = (LANG=="ge") ? '11px' : '12px'; 
for($x=0; $x<(count($count_array)-1);$x++){
?>
data.setRowProperty(<?=$x?>, 'selectedStyle', 'border:0; font-size:<?=$size?>; -webkit-border-radius:0px; font-family:\'<?=$font?>\'; -webkit-box-shadow:none; background:#e37b0a; color:white; padding:0,30px');
data.setRowProperty(<?=$x?>, 'style', 'width:auto; border:0; font-size:<?=$size?>; -webkit-border-radius:0px; font-family:\'<?=$font?>\'; -webkit-box-shadow:none; background:#244396; color:white; padding:0,30px');
<?php
}
?>
var chart = new google.visualization.OrgChart(document.getElementById('chart_div'));
chart.draw(data, {allowHtml:true});
}
</script>
<?php @include("parts/footer.php"); ?>