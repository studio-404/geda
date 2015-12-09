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
		 
		<!-- <div class="text_formats">
			<label><?=$data["text_general"][0]["shorttitle"]?></label>
		</div> -->		 
		
		<div class="text_formats">
		<?php
		$first = array_slice($data["text_files"], 0, 1);
		if($first[0]->file){
		?>
		<img src="<?=IMG?>ajax-loader.gif" class="img-responsive" alt="" id="mainimage" data-mainimage="<?=WEBSITE?>image?f=<?=WEBSITE.$first[0]->file?>&amp;w=377&amp;h=235" />		
		<?php } ?>
		<?=$data["text_general"][0]["text"]?>
		<div style="clear:both"></div>
		<div id="leftSideText">
		<?=$data["text_general"][0]["leftside"]?>
		</div>
		<div id="rightSideText" style="display:none"><?=$data["text_general"][0]["rightside"]?></div>
		<?php
		$obj  = new url_controll(); 
		$slugii = $obj->url("segment",3);
		// ---------------------- GEORGIAN MAP START----------------------------- //
		if($slugii=="mikro-da-mcire-biznesis-xelSewyoba") :
			echo georgianMap::map($data["components"]);
		endif; 
		// ---------------------- GEORGIAN MAP FINISH----------------------------- //
		?>




		</div>
		<div style="clear:both"></div>
		<?php if(count($data["text_documents"]) > 0) : ?>
		<hr class="line_effect" />
		<div class="page_title_4">
			<?=$data["language_data"]["attachedfiles"]?>
		</div>
		<?php
		foreach($data["text_documents"] as $val){ 
			$ext = explode(".",$val->file);
			$ext = end($ext);
			$ext = strtoupper($ext);
		?>
			<a href="<?=WEBSITE.$val->file?>" target="_blank" style="text-decoration:none">
			<div class="attachment_div">
				<div class="attach_img"><img src="<?=TEMPLATE?>img/document.png" alt="" /></div>
				<div class="attach_info">
					<ul>
						<!-- <li><?=$data["language_data"]["documenttype"]?>: <?=$ext?></li> -->
						<!-- <li><?=$data["language_data"]["documentname"]?>: <?=$val->title?></li> -->
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
		 
	
		
	</div>
</div>
<?php @include("parts/footer.php"); ?>