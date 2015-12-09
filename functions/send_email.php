<?php if(!defined("DIR")){ exit(); }
class send_email{
	public $outMessage = 2; 

	public $from;
	public $recipients;
	public $subject;
	public $bodyHtml;
	public $attachments;
	
	public $rootMail;
	public $headers;
	public $eol;
	public $separator;

	function __construct(){

	}

	public function init($from,$recipients,$subject,$bodyHtml,$attachments){
		$this->from = $from;
		if(!is_array($recipients)){
			$this->recipients = array($recipients);
		}else{
			$this->recipients = $recipients;
		}
        
        $this->subject = $subject;
		$this->bodyHtml = $bodyHtml;
        $this->attachments = $attachments;
        
        $this->eol = "\r\n";
        
		// a random hash will be necessary to send mixed content
		$this->separator = md5(time());
        
        if(count($this->recipients) > 0)
        {
			$this->rootMail = $this->recipients[(count($this->recipients)-1)];
			array_pop($this->recipients);
		}
		else
		{
			$this->rootMail = "";
		}
        $this->generateHeaders();
	}

	function generateHeaders()
	{
		$to = "";
		
		foreach($this->recipients as $recepient)
		{
			$to .= " <".$recepient."> ,";
		}
		
		// main header (multipart mandatory)
     	$this->headers = $to != "" ? "To:".$to.$this->eol : "";
		$this->headers .= "From: ".$this->from.$this->eol;
		$this->headers .= "MIME-Version: 1.0".$this->eol;
		$this->headers .= "Content-Type: text/html; charset=\"utf-8\"".$this->eol;
		
		if(is_array($this->attachments) && count($this->attachments) > 0){
			foreach($this->attachments as $filename=>$attachment)
			{
				// attachment
				$this->headers .= "--".$this->separator.$this->eol;
				$this->headers .= "Content-Type: application/octet-stream; name=\"".$filename."\"".$this->eol;
				$this->headers .= "Content-Transfer-Encoding: base64".$this->eol;
				$this->headers .= "Content-Disposition: attachment".$this->eol.$this->eol;
				$this->headers .= $attachment.$this->eol.$this->eol;
				$this->headers .= "--".$this->separator."--";
			}
		}

		//error_log($this->headers, 3, "/var/log/my-errors.log");
	}

	public function send($host,$user,$pass,$from,$fromname,$where_to_send,$subject,$message){
		$contents = html_entity_decode($message);
		$this->init($from,$where_to_send,$subject,$contents,"");
		//$emailer->send();
		$this->outMessage = 1;

		if($this->rootMail != "")
		{
			if (mail($this->rootMail,$this->subject,$this->bodyHtml,$this->headers) 	)
			{
				echo $this->rootMail." ".$this->subject;
				return true;
			}
			else 
			{
				return false;
			}
		}
	}

	function __destruct(){

	}
}
?>