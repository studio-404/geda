<?php
define('DIR',__FILE__);
include("config.php");
$host = 'mysql:host='.$c['database.hostname'].';dbname='.$c['database.name'].";charset=utf8"; 
$HANDLER = new PDO($host,$c['database.username'],$c['database.password']); 
$HANDLER->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
$HANDLER->exec("set names utf8"); 

$sql = 'SELECT 
`studio404_module_item`.* 
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
`studio404_module_item`.`visibility`!=:visibility AND 
`studio404_module_item`.`status`!=:status 
ORDER BY `studio404_module_item`.`date` DESC
';	
$prepare = $HANDLER->prepare($sql); 
$prepare->execute(array(
	":pagetype"=>'newspage', 
	":lang"=>5, 
	":status"=>1, 
	":visibility"=>1, 
)); 

if($prepare->rowCount() > 0){
	$fetch = $prepare->fetchAll(PDO::FETCH_ASSOC); 
	echo $prepare->rowCount()."<br /><hr /><br />";
	$kate = array();
	$found = 0;
	foreach($fetch as $val){
		if(in_array($val["slug"], $kate)){
			$found++;
		}else{
			array_push($kate,$val["slug"]);
		}
		echo $val["idx"]." ) ".$val["title"]." - ".$val["slug"]."<br />";
	}
	echo $found;
}

?>