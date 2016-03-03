<?php if(!defined("DIR")){ exit(); }
class ajax extends connection{
	public $subject,$name,$email,$message,$lang,$ip;

	function __construct($c){
		if(!isset($_SESSION["requestWiev"])){
			$_SESSION["requestWiev"] = 1;
		}else{
			$_SESSION["requestWiev"]++;
		}
		if(isset($_SESSION["requestWiev"]) && $_SESSION["requestWiev"]>10000){
			//after 10 000 request shut it down
			die('E');
		}
		$this->requests($c);
	}

	public function requests($c){
		$conn = $this->conn($c); 
		if(Input::method("POST","loadmorenews")=="true" && is_numeric(Input::method("POST","f")) && is_numeric(Input::method("POST","t"))){
			$limit = ' LIMIT '.Input::method("POST","f").",".Input::method("POST","t");
			try{
				$sql = 'SELECT 
				from_unixtime(`studio404_module_item`.`date`,"%d-%m-%Y") AS datex, 
				`studio404_module_item`.`idx`, 
				`studio404_module_item`.`slug`, 
				`studio404_module_item`.`title`  
				FROM 
				`studio404_pages`,`studio404_module_attachment`, `studio404_module`, `studio404_module_item` 
				WHERE 
				`studio404_pages`.`page_type`=:pagetype AND 
				`studio404_pages`.`lang`=:lang AND 
				`studio404_pages`.`status`!=:status AND 
				`studio404_pages`.`idx`=`studio404_module_attachment`.`connect_idx` AND 
				`studio404_module_attachment`.`page_type`=:pagetype AND 
				`studio404_module_attachment`.`lang`=:lang AND 
				`studio404_module_attachment`.`status`!=:status AND 
				`studio404_module_attachment`.`idx`=`studio404_module`.`idx` AND 
				`studio404_module`.`lang`=:lang AND 
				`studio404_module`.`status`!=:status AND 
				`studio404_module`.`idx`=`studio404_module_item`.`module_idx` AND 
				`studio404_module_item`.`lang`=:lang AND 
				`studio404_module_item`.`long_description`!="" AND 
				`studio404_module_item`.`visibility`!=:visibility AND 
				`studio404_module_item`.`status`!=:status 
				ORDER BY `studio404_module_item`.`date` DESC'.$limit.' 
				';	
				$prepare = $conn->prepare($sql); 
				$prepare->execute(array(
					":pagetype"=>'newspage', 
					":lang"=>Input::method("POST","l"), 
					":status"=>1, 
					":visibility"=>1, 
				)); 
				$fetch = $prepare->fetchAll(PDO::FETCH_ASSOC); 
				echo json_encode($fetch);
			}catch(Exception $e){
				echo "Error";
			}
		}
	}

}
?>