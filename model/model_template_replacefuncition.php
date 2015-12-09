<?php if(!defined("DIR")){ exit(); }
class model_template_replacefuncition extends connection{
	public function rpl($c,$load,$data){

		$out = '<div style="clear:both"></div>';
		// $out .= '<div class="ul-li-dropdown-item">';
		// $out .=	'<h6>'.$data["language_data"]["programpriorities"].'</h6>';
		// $out .= '<hr />';
		$out .= '<div class="ul-li-item-content" style="display:block; margin-top: 5px;">';
		$x = 1; 
		$l = '';
		$r = '';

		foreach($data as $files){
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
		$out .= '<div class="content-list-icon-items-left">';
		$out .= $l;
		$out .= '</div>';
		$out .= '<div class="content-list-icon-items-right">';
		$out .= $r;
		$out .= '</div>';
		$out .= '</div></div>';

		return $out;
	}
}
?>