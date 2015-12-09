<?php 
@include("parts/header.php"); 
?>
<div class="container" id="container">
<div class="col-sm-3" id="sidebar">
<div class="breadcrumbs">
<div class="your_are_here"><?=$data["language_data"]["path"]?>: </div>
<li><a href="<?=MAIN_PAGE?>"><?=$data["language_data"]["mainpage"]?></a><li>  >
<?php 
$count = count($data["breadcrups"]); 
$x=1;
foreach($data["breadcrups"] as $val)
{
if($x<$count){ $seperarator = ">"; }else{ $seperarator=""; }
?>
<li><a href="<?=WEBSITE.LANG."/".$val->slug?>"><?=$val->title?></a><li>  <?=$seperarator?>
<?php
$x++;
}
?>  
</div>
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
<?=$data["text_general"][0]["description"]?>
<h4><?=$data["text_general"][0]["title"]?></h4>
<div class="financeImageBg creditBg">
<p class="cre"><?=$data["language_data"]["credit"]?></p>
<p class="lea"><?=$data["language_data"]["lising"]?></p>
</div>
<div class="credit-load">
<h4 style="margin-top:40px;"><?=$data["language_data"]["financesupport"]?></h4>
<blockquote>
<p><?=$data["language_data"]["tocommercialbanks"]?></p>
</blockquote>
<blockquote>
<ul>
<li><strong><?=$data["language_data"]["tocommercialbankslist1"]?></strong></li>
<li><strong><?=$data["language_data"]["tocommercialbankslist2"]?></strong></li>
<li><strong><?=$data["language_data"]["tocommercialbankslist3"]?></strong></li>
</ul>
</blockquote>
<?php 
$x=1;
$x2=1;
$left = '';
$right = '';
$leasing = '';
foreach($data["components"] as $val){
if($val->com_name != "Banks" && $val->com_name != "Leasing"){ continue; }
if($val->com_name=="Banks"){
if($x<=6){
$left .= '<div class="ol-li-item">'.$x.'. <a href="'.$val->url.'" target="_blank">'.$val->title.'</a></div>';
}else{
$right .= '<div class="ol-li-item">'.$x.'. <a href="'.$val->url.'" target="_blank">'.$val->title.'</a></div>';
}
$x++;
}else{
$leasing .= '<div class="ol-li-item">'.$x2.'. <a href="'.$val->url.'" target="_blank">'.$val->title.'</a></div>';
$x2++;
}
}
?>
<div style="clear:both"></div>
<div class="ul-li-dropdown-list" style="margin-top:20px;">
<h6><?=$data["language_data"]["inclusionconditions"]?></h6>
<hr />
<ul>
<li><?=$data["language_data"]["icitem1"]?></li>
<li><?=$data["language_data"]["icitem2"]?></li>
<li><?=$data["language_data"]["icitem3"]?></li>
<li><?=$data["language_data"]["icitem4"]?></li>
</ul>
<div style="clear:both"></div>
<div class="ul-li-dropdown-item">
<h6><?=$data["language_data"]["programpriorities"]?></h6>
<hr />
<div class="ul-li-item-content" style="display:block; margin-top: 5px;">
<?php
$x = 1; 
$l = '';
$r = '';
foreach($data["text_files"] as $files){
$ex = explode("::",$files->title);
$t = ($ex[0]) ? $ex[0] : $files->title; 
$lx = ($ex[1]) ? $ex[1] : '';
if($x<=7){
$l .= '<div class="icon-item">';
$l .= '<div class="icon" style="background-image:url(\''.WEBSITE.$files->file.'\')"></div>';
if($lx!=''){
$l .= '<span><a href="http://'.$lx.'">'.$t.'</a></span>';
}else{
$l .= '<span>'.$t.'</span>';
}
$l .= '</div>';
}else{
$r .= '<div class="icon-item">';
$r .= '<div class="icon" style="background-image:url(\''.WEBSITE.$files->file.'\')"></div>';
if($lx!=''){
$r .= '<span><a href="http://'.$lx.'">'.$t.'</a></span>';
}else{
$r .= '<span>'.$t.'</span>';
}
$r .= '</div>';
}
$x++;
}
?>	
<div class="content-list-icon-items-left">
<?=$l?>
</div>
<div class="content-list-icon-items-right">
<?=$r?>
</div>
</div> 
</div>
<div style="clear:both"></div>
<h6><?=$data["language_data"]["partnerbanksprogram"]?></h6>
<hr />
<blockquote>
<a href=""><img src="<?=TEMPLATE?>img/bank.png" alt="" /></a>
<a href=""><img src="<?=TEMPLATE?>img/bank.png" alt="" /></a>
<a href=""><img src="<?=TEMPLATE?>img/bank.png" alt="" /></a>
<a href=""><img src="<?=TEMPLATE?>img/bank.png" alt="" /></a>
<a href=""><img src="<?=TEMPLATE?>img/bank.png" alt="" /></a>
<a href=""><img src="<?=TEMPLATE?>img/bank.png" alt="" /></a>
<a href=""><img src="<?=TEMPLATE?>img/bank.png" alt="" /></a>
<a href=""><img src="<?=TEMPLATE?>img/bank.png" alt="" /></a>
</blockquote>
<div style="clear:both"></div>
</div>
</div>
<div class="leasing-load">
<h4 style="margin-top:40px;"><?=$data["language_data"]["financesupport"]?></h4>
<blockquote>
<p><?=$data["language_data"]["toleasingcompanies"]?></p>
</blockquote>
<blockquote>
<ul>
<li><strong><?=$data["language_data"]["toleasingcompanieslist1"]?></strong></li>
<li><strong><?=$data["language_data"]["toleasingcompanieslist2"]?></strong></li>
</ul>
</blockquote>
<?php 
$x=1;
$x2=1;
$left = '';
$right = '';
$leasing = '';
foreach($data["components"] as $val){
if($val->com_name != "Banks" && $val->com_name != "Leasing"){ continue; }
if($val->com_name=="Banks"){
if($x<=6){
$left .= '<div class="ol-li-item">'.$x.'. <a href="'.$val->url.'" target="_blank">'.$val->title.'</a></div>';
}else{
$right .= '<div class="ol-li-item">'.$x.'. <a href="'.$val->url.'" target="_blank">'.$val->title.'</a></div>';
}
$x++;
}else{
$leasing .= '<div class="ol-li-item">'.$x2.'. <a href="'.$val->url.'" target="_blank">'.$val->title.'</a></div>';
$x2++;
}
}
?>
<div style="clear:both"></div>
<div class="ul-li-dropdown-list" style="margin-top:20px;">
<h6><?=$data["language_data"]["inclusionconditions"]?></h6>
<hr />
<ul>
<li><?=$data["language_data"]["icitem1"]?></li>
<li><?=$data["language_data"]["icitem2"]?></li>
<li><?=$data["language_data"]["icitem3"]?></li>
<li><?=$data["language_data"]["icitem4"]?></li>
</ul>
<div class="ul-li-dropdown-item">
<h6><?=$data["language_data"]["programpriorities"]?></h6>
<hr />
<div class="ul-li-item-content" style="display:block; margin-top: 5px;">
<?php
$x = 1; 
$l = '';
$r = '';
foreach($data["text_files"] as $files){
$ex = explode("::",$files->title);
$t = ($ex[0]) ? $ex[0] : $files->title; 
$lx = ($ex[1]) ? $ex[1] : '';
if($x<=7){
$l .= '<div class="icon-item">';
$l .= '<div class="icon" style="background-image:url(\''.WEBSITE.$files->file.'\')"></div>';
if($lx!=''){
$l .= '<span><a href="http://'.$lx.'">'.$t.'</a></span>';
}else{
$l .= '<span>'.$t.'</span>';
}
$l .= '</div>';
}else{
$r .= '<div class="icon-item">';
$r .= '<div class="icon" style="background-image:url(\''.WEBSITE.$files->file.'\')"></div>';
if($lx!=''){
$r .= '<span><a href="http://'.$lx.'">'.$t.'</a></span>';
}else{
$r .= '<span>'.$t.'</span>';
}
$r .= '</div>';
}
$x++;
}
?>	
<div class="content-list-icon-items-left">
<?=$l?>
</div>
<div class="content-list-icon-items-right">
<?=$r?>
</div>
</div> 
<div style="clear:both"></div>
<h6><?=$data["language_data"]["leasingpartners"]?></h6>
<hr />
<blockquote>
<a href=""><img src="<?=TEMPLATE?>img/bank.png" alt="" /></a>
<a href=""><img src="<?=TEMPLATE?>img/bank.png" alt="" /></a>
<a href=""><img src="<?=TEMPLATE?>img/bank.png" alt="" /></a>
</blockquote>
</div>
</div>
</div>
</div>
</div>
<?php @include("parts/footer.php"); ?>