<?php if(!defined("DIR")){ exit(); }
class eventsinside extends connection{
	function __construct($c){
		$this->template($c);
	}

	public function template($c){
		$conn = $this->conn($c); // connection

		$cache = new cache();

		$eventsinside_general = $cache->index($c,"eventsinside_general");
		$data["eventsinside_general"] = json_decode($eventsinside_general);


		$event_list = $cache->index($c,"event_list");
		$data["event_list"] = json_decode($event_list); 

		/* languages */
		$languages = $cache->index($c,"languages");
		$data["languages"] = json_decode($languages); 

		/* language variables */
		$language_data = $cache->index($c,"language_data");
		$language_data = json_decode($language_data);
		$model_template_makevars = new  model_template_makevars();
		$data["language_data"] = $model_template_makevars->vars($language_data); 

		/* website menu header & footer */
		$menu_array = $cache->index($c,"main_menu");
		$menu_array = json_decode($menu_array);
		$model_template_main_menu = new model_template_main_menu();
		$data["main_menu"] = $model_template_main_menu->nav($menu_array,"header");
		$data["footer_menu"] = $model_template_main_menu->nav($menu_array,"footer");
		$data["g_menu"] = $model_template_main_menu->gnav($menu_array,"header");

		/* website left menu */
		$left_menu = $cache->index($c,"left_menu");
		$left_menu = json_decode($left_menu);
		$data["left_menu"] = $model_template_main_menu->left($left_menu);

		/* breadcrups */
		$breadcrups = $cache->index($c,"breadcrups");
		$data["breadcrups"] = json_decode($breadcrups);

		/* components */
		$components = $cache->index($c,"components");
		$data["components"] = json_decode($components); 

		@include($c["website.directory"]."/eventsinside.php"); 
	}
}
?>