<?php 
@include("parts/header.php"); 
?>
<div class="container" id="container" style="padding-top:0; padding-bottom:0">
<div class="row">
<div class="col-sm-12" id="content_full" style="padding-bottom:0">
<div class="home_slider" style="max-height:340px; overflow:hidden">
<div id="featured" style="width:100%;">
<div class="col-sm-8 padding_0">
<?php
$x=1;
$ctext = new ctext();
if(LANG=="ge"){
$slider_title_number = 30;
$slider_title_number2 = 30;
$slider_desc_number = 75;
$slider_desc_number2 = 85;
}else{
$slider_title_number = 30;
$slider_title_number2 = 30;
$slider_desc_number = 45;
$slider_desc_number2 = 100;
}
foreach($data["components"] as $val){
if($x >=5){ break; }
if($val->com_name != "Slider"){ continue; }
?>
<div id="fragment-<?=$x?>" class="ui-tabs-panel" style="">
<a href="<?=$val->url?>" style="display:block">
<img src="<?=WEBSITE?>image?f=<?=WEBSITE_.$val->image?>&amp;w=773&amp;h=344" alt="<?=strip_tags($val->title)?>" />
</a>
<div class="slider_info">
<div class="title"><?=$ctext->cut(strip_tags($val->title),$slider_title_number)?></div><br />
<div class="text"><?=$ctext->cut(strip_tags($val->desc),$slider_desc_number)?></div>
</div>	
</div>
<?php
$x++;
}
?>
</div>	
<div class="col-sm-4 padding_0">			
<ul class="ui-tabs-nav">
<?php
$x=1;
foreach($data["components"] as $val){
if($x >=5){ break; }
if($val->com_name != "Slider"){ continue; }
?>
<li class="ui-tabs-nav-item" id="nav-fragment-<?=$x?>">
<a href="#fragment-<?=$x?>" data-gotourl="<?=$val->url?>">
<div>
<span><?=$ctext->cut(strip_tags($val->title),$slider_desc_number)?></span><br/>
<?=$ctext->cut(strip_tags($val->desc),$slider_desc_number2)?>
</div>
</a>
</li>
<?php
$x++;
}
?>
</ul>
</div>
</div>
</div>
<div class="page_title_6"><?=$data["language_data"]["multimedia"]?></div>
<div class="col-sm-12 padding_0">
<div class="other_gallery">
<div class="row">
<?php
$v = 1;
foreach($data["multimedia"] as $val){ 
$ex = explode( "?v=", $val->file); 
$mystring = $val->file;
$findme   = 'youtube';
$pos = strpos($mystring, $findme);
if($pos === false){
$playfile = WEBSITE.$mystring;
}else{
$playfile = $mystring;
}
?>
<div class="col-sm-4">
<div class="item">
<a class="youtube" href="<?=$mystring?>">
<div class="image"><img src="<?=WEBSITE?>image?f=<?=WEBSITE.$val->filev?>&w=373&h=193" alt="<?=$val->title?>" class="img-responsive">
<div class="play_icon"></div>
</div>									
</a>
<div class="text_formats">
<?=$val->title?>
</div>
</div>
</div>
<?php $v++; } ?>
<div class="col-sm-4">
<div class="home_div_3">
<div class="row">
<?php
foreach($data["components"] as $val){
if($val->com_name != "Banners"){ continue; }
?>
<div class="col-sm-12">
<a href="<?php echo $val->url; ?>" target="_blank">
<div class="item" style="position:relative">	
<div class="bunnerText">
<h4><?php echo strip_tags($val->title); ?></h4>
<p><?php echo strip_tags($val->desc); ?></p>
<span><?php echo strip_tags(str_replace( array("http://","http://www."), array("www.","www."), $val->url)); ?></span>
</div>				
<img src="<?php echo WEBSITE.$val->image; ?>" alt="<?=$val->title?>" class="img-responsive"/>							
</div>
</a>	
</div>
<?php
}
?>
</div>	
</div>
</div> 
</div>
</div>				
</div>
<div class="row">
<div class="col-sm-12 padding_0">
<div class="col-sm-4">
<div class="home_news_events" role="tabpanel">			
<ul class="tablist_div" role="tablist">
<li class="active home_news_event_tab">
<a href="#home_news" role="tab" data-toggle="tab" title="Under Construction">
<img src="<?php echo TEMPLATE?>img/home_news_tab.png" alt="" />
<div><?=$data["language_data"]["newsheader"]?></div>
</a>
</li>
<li class="home_news_event_tab" style="display:none">
<a href="#home_events" role="tab" data-toggle="tab">
<img src="<?php echo TEMPLATE?>img/home_events_tab.png" alt="" />
<?=$data["language_data"]["eventsheader"]?>
</a>
</li>
</ul>
<?php
if(LANG=="ge"){
$news_title_number = 50;
}else{
$news_title_number = 50;
}
?>
<div class="tab-content">
<div role="tabpanel" class="tab-pane fade in active" id="home_news">	
<div class="page_title_6" style="float:left;"><?=$data["language_data"]["newsheader"]?></div>									
<ul class="hone_news_slide">
<?php
$newArray1 = array_slice($data["news"], 0, 5, true);
if(is_array($newArray1) && count($newArray1)>0){
?>
<div>
<div class="news_div">
<?php 
foreach($newArray1 as $val){
?>
<div class="col-sm-12 news_item">
<a href="<?=WEBSITE.LANG."/".htmlentities($val->slug)?>">
<div class="date"><span><?=date("d",$val->date)?></span> <?=date("M",$val->date)?></div>
<div class="text"><?=$ctext->cut($val->title,$news_title_number)?></div>
</a>	
</div>
<?php
}
?>	
</div>
</div>
<?php } ?>
<?php
$newArray2 = array_slice($data["news"], 5, 5, true);
if(is_array($newArray2) && count($newArray2)>0){
?>
<div>
<div class="news_div">
<?php 
foreach($newArray2 as $val){
?>
<div class="col-sm-12 news_item">
<a href="<?=WEBSITE.LANG."/".htmlentities($val->slug)?>">
<div class="date"><span><?=date("d",$val->date)?></span> <?=date("M",$val->date)?></div>
<div class="text"><?=$ctext->cut($val->title,$news_title_number)?></div>
</a>	
</div>
<?php
}
?>	
</div>
</div>
<?php } ?>
<?php
$newArray3 = array_slice($data["news"], 10, 5, true);
if(is_array($newArray3) && count($newArray3)>0){
?>
<div>
<div class="news_div">
<?php 
foreach($newArray3 as $val){
?>
<div class="col-sm-12 news_item">
<a href="<?=WEBSITE.LANG."/".htmlentities($val->slug)?>">
<div class="date"><span><?=date("d",$val->date)?></span> <?=date("M",$val->date)?></div>
<div class="text"><?=$ctext->cut($val->title,$news_title_number)?></div>
</a>	
</div>
<?php
}
?>	
</div>
</div>
<?php } ?>
</ul>		
</div>
<div role="tabpanel" class="tab-pane fade" id="home_events">	
<div class="page_title_6" style="float:left;"><?=$data["language_data"]["eventsheader"]?></div>									
<ul class="hone_news_slide2">
<?php
$eventArray1 = array_slice($data["events"], 0, 5, true);
if(is_array($eventArray1) && count($eventArray1)>0){
?>
<div>
<div class="news_div">
<?php 
foreach($eventArray1 as $val){
?>
<div class="col-sm-12 news_item">
<a href="<?=WEBSITE.LANG."/".htmlentities($val->slug)?>">
<div class="date"><span><?=date("d",$val->date)?></span> <?=date("M",$val->date)?></div>
<div class="text"><?=$val->title?></div>
</a>	
</div>
<?php
}
?>	
</div>
</div>
<?php } ?>
<?php
$eventArray2 = array_slice($data["events"], 5, 5, true);
if(is_array($eventArray2) && count($eventArray2)>0){
?>
<div>
<div class="news_div">
<?php 
foreach($eventArray2 as $val){
?>
<div class="col-sm-12 news_item">
<a href="<?=WEBSITE.LANG."/".htmlentities($val->slug)?>">
<div class="date"><span><?=date("d",$val->date)?></span> <?=date("M",$val->date)?></div>
<div class="text"><?=$val->title?></div>
</a>	
</div>
<?php
}
?>	
</div>
</div>
<?php } ?>
<?php
$eventArray3 = array_slice($data["events"], 10, 5, true);
if(is_array($eventArray3) && count($eventArray3)>0){
?>
<div>
<div class="news_div">
<?php 
foreach($eventArray3 as $val){
?>
<div class="col-sm-12 news_item">
<a href="<?=WEBSITE.LANG."/".htmlentities($val->slug)?>">
<div class="date"><span><?=date("d",$val->date)?></span> <?=date("M",$val->date)?></div>
<div class="text"><?=$val->title?></div>
</a>	
</div>
<?php
}
?>	
</div>
</div>
<?php } ?>										
</ul>		
</div>
</div>
<div style="clear:both"></div>
</div>
</div>
<div class="col-sm-4">
<?php
foreach($data["components"] as $val){
if($val->com_name != "Big homepage banner"){ continue; }
?>
<div class="sme_service">
<div class="image">
<?php
$homepagebunner = WEBSITE."image?f=".WEBSITE_.$val->image."&amp;w=372&amp;h=372";
?>
<img src="<?php echo $homepagebunner; ?>" alt="<?=$val->title?>" class="img-responsive"/>
</div>
<div class="title"><?=strip_tags($val->title)?></div>
<div class="text"><?=$val->desc?></div>
<div class="find_out_more"><a href="<?php echo $val->url; ?>"><?=$data["language_data"]["findoutmore"]?></a></div>
</div>
<?php
}
?>
</div>
<div class="col-sm-4">
<div class="bussiness_ing_georgia" style="background:#eaeaea; margin-bottom:10px; position:relative">
<?php 
if(LANG=="ge") : 
$font = 'bpg_caps';
endif; 
if(LANG=="en") : 
$font = 'roboto';
endif; 
?>
<div style="color:#0d2065; font-family:roboto; font-size:18px; font-weight:bold; line-height:18px; padding:10px 10px 0 10px; position:absolute; z-index:1; font-family: '<?=$font?>';"><?=$data["language_data"]["piechartheader"]?></div>
<div id="piechart"></div>
</div>
<div id="home_subscribe">
<div class="row">
<div class="col-sm-12 publicationbanner">
<?php
$x=1;
foreach($data["components"] as $val){
if($val->com_name != "Home page banner under chart"){ continue; }
$expl = explode("::",$val->url);
if(!empty($expl[1])){ $target = 'target="_self"'; }else{ $target = 'target="_blank"'; }
?>
<a href="<?=$expl[0]?>" <?=$target?> style="display:block">
<div style="background-image:url('<?=WEBSITE?>image?f=<?=WEBSITE_.$val->image?>&amp;w=366&amp;h=132'); margin:0; padding:35px 30px; max-height:132px; min-height:132px;">
<div style="width:auto;">
<h4 style="margin: 0; padding: 0; width: 100%; font-size: 25px; color: white !important; margin-bottom: 10px;"><?=$ctext->cut(strip_tags($val->title),55)?></h4>
<p style="color:white; width:auto;"><?=$ctext->cut(strip_tags($val->desc),120)?></p>
</div>
</div>
</a>	
<?php
$x++;
}
?>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<?php 
$model_template_piechartjs = new model_template_piechartjs(); 
echo $model_template_piechartjs->piechart($data["components"],$data);
@include("parts/footer.php"); 
?>