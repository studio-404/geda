<div class="breadcrumbs">
<div class="your_are_here"><?=$data["language_data"]["path"]?>: </div>
<li><a href="<?=MAIN_PAGE?>"><?=$data["language_data"]["mainpage"]?></a><li>  >
<?php 
$count = count($data["breadcrups"]); 
$x=1;
$a = array("whatwedo","aboutus","about-georgia","download-center","media-center");
foreach($data["breadcrups"] as $val)
{
if($x<$count){ $seperarator = ">"; }else{ $seperarator=""; }
if(in_array($val->slug, $a)){
	$u = "javascript:;";
}else if($val->slug=="media-center/news"){
	$u = WEBSITE.LANG."/".$val->slug."?v=31";	
}else if($val->slug=="media-center/events"){
	$u = WEBSITE.LANG."/".$val->slug."?v=32";	
}else{ 
	$u = WEBSITE.LANG."/".$val->slug."?v=".Input::method("GET","v"); 
}?>
<li><a href="<?=$u?>"><?=$val->title?></a><li>  <?=$seperarator?>
<?php
$x++;
}
?>  
</div>