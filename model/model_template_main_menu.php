<?php if(!defined("DIR")){ exit(); }
class model_template_main_menu{
	public function nav($menu_array,$type){	
		// echo "<pre>";
		// print_r($menu_array);
		// echo "</pre>";
		$get_slug_from_url = new get_slug_from_url();
		$slug = $get_slug_from_url->slug(); 

		if($type=="header"){
			$o = '<ul class="nav navbar-nav">';
				for($x=0;$x<count($menu_array->date);$x++){
					$active = ($menu_array->slug[$x]==$slug) ? 'active' : '';
					if($menu_array->sub[$x]){ 
						$o .= '<li class="dropdown '.$active.'">';
						$o .= '<a href="'.MAIN_DIR.$menu_array->slug[$x].'?v=<?=$menu_array->idx[$x]?>" class="sub_menu_arrow dropdown-toggle" data-toggle="dropdown">'.$menu_array->title[$x].'</a>';
						$o .= $this->sub($menu_array->sub[$x],$slug,"header"); 
						$o .= '</li>'; 
						
					}else{
						$o .= '<li class="'.$active.'"><a href="'.MAIN_DIR.$menu_array->slug[$x].'?v='.$menu_array->idx[$x].'">'.$menu_array->title[$x].'</a></li>'; 
					}
				}			
			$o .= '</ul>';
		}else if($type=="footer"){
			$o = '';
				for($x=0;$x<count($menu_array->date);$x++){
					
					if($menu_array->sub[$x]){ 
						// if($x==1){ $offset = ' col-sm-offset-1'; }else{ $offset=""; } 
						// $o .= '<div class="col-sm-2'.$offset.'"><ul class="text_formats_blue">';						
						$o .= '<div class="col-sm-2"><ul class="text_formats_blue">';						
						$o .= '<li>';
						//'.MAIN_DIR.$menu_array->slug[$x].'
						$o .= '<a href="javascript:;"><span>'.$menu_array->title[$x].'</span></a>';
						$o .= '</li>'; 
						$o .= $this->sub($menu_array->sub[$x],$slug,"footer"); 		
						$o .= '</ul></div>';				
					}
					
				}	
				$o .= '<div class="col-sm-2"><ul class="text_formats_blue">';
				$o .= '<li>';
				$contactname=(LANG=="en") ? 'Contact us' : 'კონტაქტი';
				$o .= '<a href="'.MAIN_DIR.'contact-us"><span>'.$contactname.'</span></a>';
				$o .= '</li>';	
				
				/* language variables */
				$cache = new cache();
				$language_data = $cache->index($_SESSION["c"],"language_data");
				$language_data = json_decode($language_data);
				$model_template_makevars = new  model_template_makevars();
				$data["language_data"] = $model_template_makevars->vars($language_data); 

				$o .= '<li>'.$data["language_data"]["hotlinelabel"].'</li>';
				$o .= '<li>'.$data["language_data"]["hotlinevalue"].'</li>';
				$o .= '</ul></div>';	
			
		}
		return $o;
	}



	public function left($menu_array){	
		$get_slug_from_url = new get_slug_from_url();
		$slug = $get_slug_from_url->slug();		
		$o = '';

		$obj  = new url_controll(); 
		$third_segment = $obj->url("segment",2)."/".$obj->url("segment",3);

		if(is_array($menu_array)){
			foreach($menu_array as $val){
				$active = ($val->slug==$third_segment) ? 'active' : '';

				if($val->redirectlink!="false" && !empty($val->redirectlink)){
					$gotoUrl = $val->redirectlink;
				}else{
					$gotoUrl = MAIN_DIR.$val->slug."?v=".$val->idx;
				}

				$o .= '<li class="'.$active.'"><a href="'.$gotoUrl.'">'.$val->title.'</a></li>';
			} 
		}
		return $o;
	}

	public function sub($sub,$slug,$type){
		// echo "<pre>";
		// print_r($sub);
		// echo "</pre>";
		if($type=="header"){
			$o = '<ul class="dropdown-menu dropdown-menu-2">'; 
			for($x=0;$x<count($sub->date);$x++){
				$active = ($sub->slug[$x]==$slug) ? 'active' : '';
					$o .= '<li class="'.$active.'"><a href="'.MAIN_DIR.$sub->slug[$x].'?v='.$sub->idx[$x].'">'.$sub->title[$x].'</a></li>'; 
			}
			$o .= '</ul>';
		}else if($type=="footer"){
			$o = ''; 
			for($x=0;$x<count($sub->date);$x++){
				$active = ($sub->slug[$x]==$slug) ? 'active' : '';
					$o .= '<li><a href="'.MAIN_DIR.$sub->slug[$x].'?v='.$sub->idx[$x].'">'.$sub->title[$x].'</a></li>'; 
			}
		}
		return $o;
	}


	public function gnav($menu_array,$type){
		// echo "<pre>";
		// print_r($menu_array); 
		// echo "</pre>";

		$get_slug_from_url = new get_slug_from_url();
		$slug = $get_slug_from_url->slug(); 

		if($type=="header"){
			$o = '<div class="gmenu g'.LANG.'"><ul>';
				for($x=0;$x<count($menu_array->date);$x++){
					$active = ($menu_array->slug[$x]==$slug) ? 'gactive' : '';
					if($menu_array->sub[$x]){ 
						$o .= '<li class="ghas">';
						// '.MAIN_DIR.$menu_array->slug[$x].'
						$o .= '<a href="javascript:;" class="'.$active.'">'.$menu_array->title[$x].'</a>';
						$o .= $this->gsub($menu_array->sub[$x],$slug,"header"); 
						$o .= '</li>'; 
						
					}else{
						$o .= '<li><a href="'.MAIN_DIR.$menu_array->slug[$x].'?v='.$menu_array->idx[$x].'" class="'.$active.'">'.$menu_array->title[$x].'</a></li>'; 
					}
				}			
			$o .= '</ul>';
		}
		return $o;
	}

	public function gsub($sub,$slug,$type){
		if($type=="header"){
			$o = '<ul class="gsub">'; 
			for($x=0;$x<count($sub->date);$x++){
				$active = ($sub->slug[$x]==$slug) ? 'gsubactive' : '';
					$o .= '<li><a href="'.MAIN_DIR.$sub->slug[$x].'?v='.$sub->idx[$x].'" class="'.$active.'">'.$sub->title[$x].'</a></li>'; 
			}
			$o .= '</ul>';
		}
		return $o;
	}


}
?>