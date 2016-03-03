<?php if(!defined("DIR")){ exit(; }
class to_base64{
	public static function image($src){
		$t_ = pathinfo($src, PATHINFO_EXTENSION);
		$d_ = file_get_contents($src);
		$out = 'data:image/' . $t_ . ';base64,' . base64_encode($d_);
		return $out;
	}
}
?>