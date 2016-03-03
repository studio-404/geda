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
<?=$data["text_general"][0]["text"]?>
<div class="financeImageBg" style="background-image:url('<?=WEBSITE.$data['text_general'][0]['background']?>'); width:747px; height:178px; margin-top:45px;">
<p class="mvp"><?=$data["language_data"]["missing"]?></p>
<p class="mvp"><?=$data["language_data"]["vission"]?></p>
<div class="bottom-text">
<div class="ccontent lefttxt"><?=$data["language_data"]["missionvalue"]?></div>
<div class="ccontent righttxt"><?=$data["language_data"]["vissionvalue"]?></div>
</div>
</div>
<div class="ul-li-dropdown-list">
<div class="ul-li-dropdown-item otheritems">
<div class="ul-li-item-header list-up" style="color:#82b4d3"><?=$data["language_data"]["ineda"]?>: </div> 
<div class="ul-li-item-content">
<div class="content-list-item bottom30">
<?=$data["language_data"]["mvlist1"]?>
</div>
<div class="content-list-item bottom30">
<?=$data["language_data"]["mvlist2"]?>
</div>
<div class="content-list-item bottom30">
<?=$data["language_data"]["mvlist3"]?>
</div>
<div class="content-list-item bottom30">
<?=$data["language_data"]["mvlist4"]?>
</div>
<div class="content-list-item bottom30">
<?=$data["language_data"]["mvlist5"]?>
</div>
<div class="content-list-item bottom30">
<?=$data["language_data"]["mvlist6"]?>
</div>
<div class="content-list-item bottom30">
<?=$data["language_data"]["mvlist7"]?>
</div>
</div> 
</div>
</div>
</div> 
</div>
</div>
<?php @include("parts/footer.php"); ?>