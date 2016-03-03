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
<?php 
echo $data["language_data"]["newsheader"]; 
?>
</div>
<div class="page_title_3">
<div class="row">
<div class="col-sm-10 padding_0"><?=$data["news_general"][0]["title"]?></div>
<div class="col-sm-2 padding_0">
<div class="icons">
<div id="u" data-lang="<?=LANG?>" style="position:absolute; top:-1000px; text-indent:-9999px"></div>
<div class="share"></div>
<div class="print"></div>
</div>
</div>
</div>			
</div>
<div class="news_date">
<?=date("d",$data["news_general"][0]["date"])." ".$data["language_data"][date("M",$data["news_general"][0]["date"])]." ".date("Y",$data["news_general"][0]["date"])?>
</div>
<hr class="line_effect"/>
<div class="text_formats" style="min-height:550px;">
<?php
$first = array_slice($data["news_files"], 0, 1);
if($first[0]->file){
?>
<img src="<?=IMG?>ajax-loader.gif" class="img-responsive" id="mainimage" data-mainimage="<?=WEBSITE?>image?f=<?=WEBSITE.$first[0]->file?>&w=377&h=235" />		
<?php } ?>
<?=$data["news_general"][0]["long_description"]?> 
</div>
<div style="clear:both"></div>
<?php if(count($data["news_documents"]) > 0) : ?>
<hr class="line_effect" />
<div class="page_title_4">
<?=$data["language_data"]["attachedfiles"]?>
</div>
<?php
foreach($data["news_documents"] as $val){ 
$ext = explode(".",$val->file);
$ext = end($ext);
$ext = strtoupper($ext);
?>
<a href="<?=WEBSITE.$val->file?>" target="_blank" style="text-decoration:none">
<div class="attachment_div">
<div class="attach_img"><img src="<?=TEMPLATE?>img/document.png"></div>
<div class="attach_info">
<ul>
<li><?=$val->title?></li>
<li><?=$data["language_data"]["date"]?>: <?=date("d.m.Y",$val->date)?></li>
</ul>
</div>
</div>
</a><br />
<?php 
} 
endif;
?>
<hr class="line_effect"/>
<div class="text_formats">
<label><?=$data["language_data"]["othernews"]?></label>
</div>
<div class="news_lists">
<ul>
<?php
$itemperpage = 10;
$path = WEBSITE.LANG."/".$data["text_general"][0]["slug"]; 
$model_template_pagination = new model_template_pagination();
$news_list = array_slice($data["news_list"],1);
$newslist = $model_template_pagination->pager($news_list,$itemperpage,$path);
$ctext = new ctext();
if(LANG=="ge"){
$news_title_number = 65;
}else{
$news_title_number = 65;
}
foreach ($newslist[0] as $val) {
?>
<li style="content:''; padding:0; "><a href="<?=WEBSITE.LANG.'/'.$val->slug?>?id=<?=$val->idx?>"><div class="news_date"><?=date("d",$val->date)." ".$data["language_data"][date("M",$val->date)]." ".date("Y",$val->date)?></div><?=$ctext->cut(strip_tags($val->title),$news_title_number)?></a></li>
<?php
}
?>
</ul>
<div class="loadergif"><img src="<?=WEBSITE?>images/ajax-loader.gif" width="32" height="32" /></div>
<a href="javascript:;" class="loadmorenews" data-fr="10" data-to="10" data-lg="<?=LANG_ID?>"><?=(LANG=="ge") ? 'ჩამოტვირთე მეტი' : 'Load more'?> »</a>
</div>
<div class="text-right">		
<ul class="navigation">
<?=$newslist[1]?>
</ul>
</div>	
</div>
</div>
<?php @include("parts/footer.php"); ?>