<?php if(!defined("DIR")){ exit(); }
			class underconstruction{
				function __construct($c){
					$this->template($c,"underconstruction");
				}
				
				public function template($c,$page){
					$include = WEB_DIR."/underconstruction.php";
					if(file_exists($include)){
					/* 
					** Here goes any code developer wants to 
					*/
					@include($include);
					}else{
						$controller = new error_page(); 
					}
				}
			}
			?>