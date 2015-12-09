<?php if(!defined("DIR")){ exit(); }
class model_template_piechartjs{
	public function piechart($comp,$data){
	
		$out = '<style>';
		if(LANG=="ge") : 
		$out .= 'svg g text{ font-family: bpg_sans_web !important; } ';
		endif;
		if(LANG=="en") : 
		$out .= 'svg g text{ font-family: roboto !important; }';
		endif;
		$out .= '</style>';
		
		$count = 0;
		$name = array();
		$value = array();
		$color = array();
		foreach($data["components"] as $val){
			if($val->com_name != "homapage piechart"){ continue; }
			array_push($name,$val->title);
			array_push($value,(int)strip_tags($val->desc));
			array_push($color,$val->url);
			$count++;
		}
		
		$out .= '<script type="text/javascript" src="https://www.google.com/jsapi"></script>';
		$out .= '<script type="text/javascript">';
		$out .= '$(function () {';
		$out .= '$(".youtube").YouTubeModal({autoplay:0, width:\'100%\', height:\'400\'});';
		$out .= '});';
		$out .= 'google.load("visualization", "1", {packages:["corechart"]});';
		$out .= 'google.setOnLoadCallback(drawChart);';
		$out .= 'function drawChart() {';
		
		$out .= 'var data = google.visualization.arrayToDataTable([';
		$out .= '[\'Task\', \'Hours per Day\'],';
		$colorsOut='';
		for($x=0;$x<count($name);$x++){
			if($x==(count($name)-1)){ $mdz = ''; }
			else{ $mdz = ','; }
			$out .= '[\''.$name[$x].'\','.$value[$x].']'.$mdz;
			$colorsOut .= '"#'.$color[$x].'"'.$mdz;
		}
		
		
		
		$out .= ' ]);';
		
		$out .= 'var options = { '; 
		$out .= 'width: \'100%\', '; 
		$out .= 'title: \''.$data["language_data"]["subpiechartheader"].'\', '; 
		$out .= ' titleTextStyle: {  '; 
		$out .= ' color: \'#0d2065\', '; 
		$out .= ' fontSize: \'12\', '; 
		$out .= ' bold: 0, '; 
		$out .= ' italic: 0 '; 
		$out .= '  }, '; 
		$out .= 'legend: {position: \'right\', textStyle: {color: \'#1279bb\', fontSize: 12}},  '; 
		$out .= 'backgroundColor: \'#eaeaea\', '; 
		$out .= 'colors:['.$colorsOut.'],  '; 
		$out .= 'chartArea:{left:10,top:65,width:\'100%\',height:\'62%\'}, '; 
		$out .= 'tooltip:{ fontSize: \'9\'} '; 
		$out .= '}; '; 
		$out .= 'var chart = new google.visualization.PieChart(document.getElementById(\'piechart\')); '; 
		$out .= 'chart.draw(data, options); '; 
		$out .= ' } </script> '; 
		return $out;
	}
}
?>