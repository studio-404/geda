<footer class="container padding_0">
<div id="footer_div">
<div id="footer" class="container">
<div class="row">
<?=$data["footer_menu"]?>
</div>
<div class="left_social_div">
<ul>
<?php
foreach($data["components"] as $val){
if($val->com_name != "Social networks"){ continue; }
?>
<li><a href="<?=$val->url?>" target="_blank"><img src="<?php echo WEBSITE_.$val->image?>"/></a></li>
<?php
}
?>
</ul>
</div>
</div>	
</div>	
<div id="footer_div_2">
<div id="footer_2" class="container">
<div class="col-sm-4 padding_0">
<li><?=$data["language_data"]["officelabel"]?>:</li>
<li><?=$data["language_data"]["officevalue"]?></li>
<li class="unclearemail"></li>
</div>
<div class="col-sm-2 padding_0">
<li><?=$data["language_data"]["hotlinelabel"]?></li>
<li><?=$data["language_data"]["hotlinevalue"]?></li>
<li><a href="javascript:;" class="callZopim"><?=$data["language_data"]["livechatvalue"]?></a></li>
</div>
<div class="col-sm-4 padding_0">
<li><?=$data["language_data"]["donourorganozations"]?>:</li>
<a href="https://www.giz.de/de/html/index.html" target="_blank"><img src="<?php echo TEMPLATE?>/img/donor_org.png" alt="donour" style="width:250px" /></a>
</div>
<div class="col-sm-2 padding_0 text-right getsadze_design">
<a href="http://getsadze.co.uk/en/home" target="_blank">
<img src="<?php echo TEMPLATE?>/img/getsadze_design.png"/>
</a>
</div>
</div>
</div>
</footer>
<script type="text/javascript" charset="utf-8" src="<?=TEMPLATE?>js/footer.js?v=<?=$c['websitevertion']?>"></script>
</body>
</html>