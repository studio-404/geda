<?php if(!defined("DIR")){ exit(); }
class sendemail extends connection{
	public $subject,$name,$email,$message,$lang,$ip;

	function __construct(){
		$this->send();
	}

	public function selectEmailGeneralInfo(){
		global $c;
		$conn = $this->conn($c); 
		$out = array();
		$sql = 'SELECT `host`,`user`,`pass`,`from`,`fromname` FROM `studio404_newsletter` WHERE `id`=:id';
		$prepare = $conn->prepare($sql); 
		$prepare->execute(array(
			":id"=>1
		));
		$fetch = $prepare->fetch(PDO::FETCH_ASSOC); 
		$out["host"] = $fetch["host"];
		$out["user"] = $fetch["user"];
		$out["pass"] = $fetch["pass"];
		$out["from"] = $fetch["from"];
		return $out;
	}

	public function send(){
		$out = '';
		if(Input::exists("post")){
			$this->subject = Input::method("POST","s"); 
			$this->name = Input::method("POST","n"); 
			$this->email = Input::method("POST","e"); 
			$this->message = Input::method("POST","m");
			$this->lang = Input::method("POST","l");
			$this->ip = get_ip::ip();

			$_SESSION["send_view"] = (isset($_SESSION["send_view"])) ? $_SESSION["send_view"]+1 : 1;
			if($_SESSION["send_view"]>150){ 
				if($this->lang == "en"){
					$out = '<font color="red">Error !</font>';
				}else{
					$out = '<font color="red">მოხდა შეცდომა !</font>';
				}
				exit(); 
			}
			// echo $this->email; 
			if(empty($this->subject) || empty($this->name) || empty($this->email) || empty($this->message) || empty($this->lang)){
				if($this->lang == "en"){
					$out = '<font color="red">All field are required !</font>';
				}else{
					$out = '<font color="red">ყველა ველის შევსება სავალდებულოა !</font>';
				}
			}else{
				if(!$this->isValidEmail($this->email)){
					if($this->lang == "en"){
						$out = '<font color="red">Email is not valid !</font>';
					}else{
						$out = '<font color="red">გთხოვთ გადაამოწმოთ ელ-ფოსტის ველი !</font>';
					}
				}else{
					$i = $this->selectEmailGeneralInfo(); 
					$message = wordwrap(strip_tags($this->message), 70, "\r\n");
					$message .= '<br />Sender IP: '.$this->ip;
					$headers  = 'MIME-Version: 1.0' . "\r\n";
					$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
					$headers .= 'To: '.$i["fromname"].' <'.$i["from"].'>' . "\r\n";
					$headers .= 'From: '.$this->name.' <'.$this->email.'>' . "\r\n";
					$send_email = mail($to, $this->subject, $message, $headers);

					if($send_email){
						if($this->lang == "en"){
							$out = '<font color="green">Message sent !</font>';
						}else{
							$out = '<font color="green">შეტყობინება გაგზავნილია !</font>';
						}
					}else{
						if($this->lang == "en"){
							$out = '<font color="red">Error !</font>';
						}else{
							$out = '<font color="red">მოხდა შეცდომა !</font>';
						}
					}
				}
			}
		}
		echo $out;
	}

	public function isValidEmail($email){ 
    	return filter_var($email, FILTER_VALIDATE_EMAIL);
	}

}
?>