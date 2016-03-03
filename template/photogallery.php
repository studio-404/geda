<?php 
@include("parts/header.php"); 
$ctext = new ctext();
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
<div class="other_videos photo_gallery">
<div class="row">
<?php
$itemperpage = 10;
$path = WEBSITE.LANG."/".$data["text_general"][0]["slug"]."?v=".Input::method("GET","v"); 
$model_template_pagination = new model_template_pagination();
$photo_gallery_list = $data["photo_gallery_list"];
$photo_gallery_list = $model_template_pagination->pager($photo_gallery_list,$itemperpage,$path, false);
$gid = 1;
foreach ($photo_gallery_list[0] as $val) {
?>
<div id="loadgallery" style="position:absolute; visibility:hidden"></div>
<div class="col-sm-6" title="<?=htmlentities($val->sg_title)?>">
<div class="item" data-hrefload="<?=WEBSITE.LANG."/".$val->smi_slug?>" data-galleryid="loadgallery">
<a href="javascript:;">
<div class="image"><img src="<?=WEBSITE?>image?f=<?=WEBSITE.$val->pic?>&amp;w=377&amp;h=235" class="img-responsive"/></div>
</a>
<div class="text_formats">
<?=$ctext->cut($val->sg_title,38)?>
</div>
</div>
</div>
<?php 
$gid++;
}
?>

</div>
</div>
<div class="text-right">
<ul class="navigation">
<?=$photo_gallery_list[1]?>
</ul>
</div>	
</div>
</div>
<?php @include("parts/footer.php"); ?>
<script type="text/javascript" charset="utf-8">
$(document).on("click",".item", function(e){
var hrefload = $(this).data("hrefload"); 
var galleryid = $(this).data("galleryid"); 
$.get(hrefload,{},function(data){
$("#"+galleryid).html(data);
});
});
$(document).ready(function(){
$('.fancybox').fancybox({
width: 150,
height: 150, 
autoSize : false 
});
});
</script>