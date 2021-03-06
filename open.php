<?php 
session_start();   
try{
header('X-Frame-Options: DENY');
header("Content-type: text/html; charset=utf-8");
$dir_explode = explode("open.php",__FILE__);
define("DIR",$dir_explode[0]);
define("WEBSITE","http://enterprise.404.ge/");
define("WEBSITE_","http://enterprise.404.ge");
define('START_TIME', microtime(TRUE));
define('START_MEMORY', memory_get_usage());
define('PLUGINS', WEBSITE.'_plugins/');
define('FILES', WEBSITE.'files/');
define('INVOICE', DIR.'files/invoices/');
define('FLASH', WEBSITE.'flash/');
define('IMG', WEBSITE.'images/');
define('SCRIPTS', WEBSITE.'scripts/');
define('STYLES', WEBSITE.'styles/');
@require_once("config.php"); 
date_default_timezone_set($c['date.timezone']); 
set_time_limit($c["time.limit"]);
ini_set('max_execution_time',$c['execution.time']);
ini_set('post_max_size',$c['post.max.size']);
ini_set('upload_max_filesize',$c['upload.max.filesize']);
function __autoload($class_name){
$class_load = false;
if(file_exists('functions/'.$class_name.'.php')){
@include 'functions/'.$class_name.'.php';
$class_load = true;
}
if(file_exists('controller/'.$class_name.'.php')){
@include 'controller/'.$class_name.'.php';
$class_load = true;
}
if(file_exists('controller/custom/'.$class_name.'.php')){
@include 'controller/custom/'.$class_name.'.php';
$class_load = true;
}
if(file_exists('model/'.$class_name.'.php')){
@include 'model/'.$class_name.'.php';
$class_load = true;
}
if(!$class_load){
echo "Class: <b>".$class_name."</b> can't load.."; exit();
}
}
$actual_link = "$_SERVER[REQUEST_URI]";
$findme   = array('\'','~','!','@','$','^','*','(',')','{','}','[',']','|',';','<','>','\\','..');
foreach ($findme as $f) {
$pos = strpos($actual_link, $f);
if ($pos !== false) {
redirect::url(WEBSITE);
}
}
$obj  = new url_controll();
$LANG = $obj->url("segment",1);
$get_ip = new get_ip();
$ip = $get_ip->ip;


if(empty($LANG)){ // just domain name
	$LANG = $c['main.language'];
}else if(!in_array($LANG, $c['languages.array']) && $LANG != "image" && $LANG!=$c['admin.slug']){
	$welcome_class = $c["welcome.page.slug"];
	$main_language = $c['main.language'];
	$redirect = new redirect();
	$redirect->go(WEBSITE.$main_language."/".$welcome_class);
}else if($LANG==$c['admin.slug']){
	$redirect = new redirect();
	$redirect->go(WEBSITE.$c['main.language']."/".$c['admin.slug']);
}


$get_lang_id = new get_lang_id();
$lang_id = $get_lang_id->id($c,$LANG);
define('LANG', $LANG);
define('LANG_ID', $lang_id);
define('PRE_VIEW', $c["product.view.pre.slug"]);
define('PRE_GALLERY', $c["gallery.view.pre.slug"]);
define('WEB_DIR', $c["website.directory"]);
define('TEMPLATE', WEBSITE.$c["website.directory"].'/');
define('MAIN_DIR', WEBSITE.LANG.'/');
define('MAIN_PAGE', MAIN_DIR."home");
define('ADMIN_SLUG',$c['admin.slug']);
$controller = new controller($c);
$controller->loadpage($obj,$c);
$fullPath = __DIR__ . "/_cache/" ;
array_map('unlink', glob( "$fullPath*.json"));
}catch(Exception $e){
echo "Critical error !";
}
?>