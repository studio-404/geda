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
<div class="publications"> 
<?php
$publication = array();
$x = 0;
foreach($data["components"] as $val){
	if($val->com_name != "publications"){ continue; }
	$publication[$x]['date'] = $val->date;
	$publication[$x]['title'] = $val->title;
	$publication[$x]['image'] = $val->image;
	$publication[$x]['document'] = $val->document;
	$x++;
}
// echo "<pre>";
// print_r($publication);
// echo "</pre>";

$itemperpage = 10;
$path = WEBSITE.LANG."/".$data["text_general"][0]["slug"]; 
$model_template_pagination = new model_template_pagination();
$publication_list = $model_template_pagination->pager($publication,$itemperpage,$path);
foreach ($publication_list[0] as $val) {
$ext = explode(".",$val['document']);
$ext = end($ext);
?>
<div class="item">
<div class="col-sm-12">					
<div class="row">
<div class="col-sm-5">
<div class="image">
<?php
$img = TEMPLATE."img/nopublicationimage.png";
if($val["image"]!=""){
$img = WEBSITE."image?f=".WEBSITE_.$val["image"]."&amp;w=580&amp;h=216";
}
?>
<img src="<?=$img?>" class="img-responsive" alt="" style="width:290px; height:108px;" />
</div>
</div>	
<div class="col-sm-7">
<div class="text_formats">
<li><?=$data["language_data"]["documenttype"]?>: <?=strtoupper($ext)?></li>
<li><?=$data["language_data"]["documentname"]?>: <?=$val["title"]?></li>
<li><?=$data["language_data"]["date"]?>: <?=date("d.m.Y",$val["date"])?></li>
</div>
<div class="download"><a href="<?=WEBSITE.$val["document"]?>" target="_blank"><?=$data["language_data"]["download"]?></a></div>
</div>
</div>					
</div>				
</div> 
<?php
}
?>
</div>		
<div class="text-right">		
<ul class="navigation">
<?=$publication_list[1]?>
</ul>
</div>	
</div>
</div>
<?php @include("parts/footer.php"); ?>