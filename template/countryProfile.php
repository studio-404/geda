<?php @include("parts/header.php"); ?>
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
<?php
$first = array_slice($data["text_files"], 0, 1);
if($first[0]->file){
?>
<img src="<?=WEBSITE.$first[0]->file?>" class="img-responsive" />		
<?php } ?>
<?=$data["text_general"][0]["text"]?>
</div>
</div>
</div>
<?php @include("parts/footer.php"); ?>