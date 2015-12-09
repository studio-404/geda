<?php if(!defined("DIR")){ exit(); }
class georgianMap extends connection{


	public static function map($components){
		//$img = (LANG=="ge") ? 'map_geo.png' : 'map.png'; // map.svg
		$img = (LANG=="ge") ? 'themap_geo.png' : 'themap_eng.png'; // map.svg
		$out = '<div style="clear:both"></div>';
		$out .= '<p id="mapbox">'; 
		$out .= '<img id="map-image" style="position: absolute; width: 760px; height: 430px; z-index: 1001; opacity: 1;" src="/files/manager/mikrodamcirebiznesisxelshewyoba/'.$img.'" alt="" usemap="#imageMap" width="760" height="430" /> '; 
		$out .= '<canvas id="canvas" style="position: absolute; width: 760px; height: 430px; z-index: 1; left: 0; top: 0;" width="760px" height="430px"></canvas>';
		$out .= '<map id="imageMap" name="imageMap"> ';

		foreach ($components as $val) {
			if($val->com_name != "Georgian Map"){ continue; }
			$out .= '<area class="masterTooltip magnifier2" title="'.nl2br(html_entity_decode($val->desc)).'" alt="'.nl2br(htmlentities($val->title)).'" coords="'.$val->url.'" shape="polygon" href="javascript:;" />';
		}
		$out .= '</map>';
		$out .= '</p>';
		// script
		$out .= '<script type="text/javascript" charset="utf-8"> $(document).ready(function(){	var canvas = document.getElementById("canvas");	var can = canvas.getContext(\'2d\'); $(\'.masterTooltip\').hover(function(){ var title = $(this).attr(\'title\'); $(this).data(\'tipText\', title).removeAttr(\'title\'); $(\'<p class="tooltip"></p>\').html(title).appendTo(\'body\').fadeIn(\'slow\'); }, function() { can.fillStyle = "#ffffff"; can.fillRect(0, 0, 760, 430); $(this).attr(\'title\', $(this).data(\'tipText\')); $(\'.tooltip\').remove(); }).mousemove(function(e) { var mousex = e.pageX + 25; var mousey = e.pageY + 5; $(\'.tooltip\').css({ top: mousey, left: mousex }); var coords = e.target.coords; var co = coords.split(","); var c1 = new Array(); var c2 = new Array(); var counter = 1; var x = 1; for(i=0;i<=co.length;i++){ if(counter==1){ c1.push(co[i]); counter=2; }else{ c2.push(co[i]); counter=1; } } can.beginPath(); for(var xx = 0; xx<=c1.length; xx++){ if((c1[xx]=="undefined" || c2[xx]=="undefined") || (c1[xx]=="" || c2[xx]=="") ){ }else{ if(x==1){ can.moveTo(c1[xx], c2[xx]); }else{ can.lineTo(c1[xx],c2[xx]); } } x++; } can.fillStyle = "#fd4a1f"; can.lineWidth = 3; can.strokeStyle="#fd4a1f"; can.stroke(); can.closePath(); can.fill(); }); }); 
		if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
 			var ti = new Array();
 			var al = new Array();
 			$("#imageMap area").each(function(){
 				ti.push($(this).attr("title")); 
 				al.push($(this).attr("alt")); 
 			});
			var tbl = "";
			for(var i=0; i<ti.length;i++){
				tbl += "<strong>"+al[i]+"</strong>:  <i style=\'word-wrap:break-word\'>"+stripHTML(ti[i])+"</i><br />";
			}
			$("#mapbox").html(tbl).css({"width":"100%","height":"auto"}).show();
 		}
		</script>';
		return $out; 
	}

}
?>