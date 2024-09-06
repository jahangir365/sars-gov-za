<?php require("PHPMailer/class.phpmailer.php");
if($_GET["send"]=="1"){
	$message = "This is test message";
	$subject= "test subject";
	$to= "haider.ali@microrage.com";
	$toname="Imran";
	$from= "root@vps.mmfunds.org";
	$fromname="mmfunds";
	$result = sendMailgun($message, $subject, $to, $toname="", $from,  $fromname="", $attachment="");
	if($result){
		echo "mail sent";
	}else{
		echo "mail not sent";
	}
}
function sendMailgun($message, $subject, $to, $toname="", $from,  $fromname="", $attachment="", $SMTPUSER, $SMTPPASS){
	$headers  = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
	$headers .= "Reply-To: ".$fromname."<". $from . ">\r\n";
	$headers .= "From: ".$fromname."<". $from . ">\r\n";
	$headers .= "Return-Path: ".$fromname."<". $from . ">";
	$mail = new PHPMailer(true);
	$mail->IsSMTP();
	$mail->SMTPAuth = true; // enable SMTP authentication
	$mail->Host = "smtp.mailgun.org"; // sets the SMTP server
	$mail->Port = 587; // set the SMTP port
	$mail->Username = $SMTPUSER; // SMTP account username
	$mail->Password = $SMTPPASS; // SMTP account password
	$mail->From     = $from;
	$mail->FromName= $fromname;
	$mail->AddAddress($to, $toname);
	$mail->Subject  = $subject;
	$mail->IsHTML(true);
	$mail->Body     = $message;
	$mail->WordWrap = 50;
	
	if ($attachment!=""){
		$mail->AddAttachment($attachment);
	}
	if(!$mail->Send()) {
		echo $mail->ErrorInfo;
		return false;
	} else { //echo "Mail sent";
		return true;
	}
 }
 function send_mailgun($message, $subject, $to, $toname="", $from,  $fromname=""){
  $config = array();
  $config['api_key'] = "key-957c79290fe643d3ffd4532cd0a49a67";
  $config['api_url'] = "https://api.mailgun.net/v3/mg.mmfunds.org";
  $message_arr = array();
  $message_arr['from'] = $from;
  $message_arr['to'] = $to;
  $message_arr['h:Reply-To'] =$from;
  $message_arr['subject'] = $subject;
  //$message['text'] ="hello world";
  $message_arr['html'] = $message;
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $config['api_url']);
  curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
  curl_setopt($ch, CURLOPT_USERPWD, "api:{$config['api_key']}");
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS,$message_arr);
  $result = curl_exec($ch);
  
  curl_close($ch);
  return $result;
}
function sendSMTP($message, $subject, $to, $toname="", $from,  $fromname="", $attachment=""){ 
	$headers  = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";	   
	$headers .= "Reply-To: ".$fromname."<". $from . ">\r\n";	   
	$headers .= "From: ".$fromname."<". $from . ">\r\n";	   	   
	$headers .= "Return-Path: ".$fromname."<". $from . ">";	  	
	
	$mail = new PHPMailer();
	$mail->CharSet = 'UTF-8';
	$mail->SMTPAuth = true; // enable SMTP authentication
	$mail->SMTPSecure = "tls"; // sets the prefix to the servier
	$mail->Host = "smtp.gmail.com"; // sets the SMTP server
	$mail->Port = 587; // set the SMTP port for the GMAIL server
	$mail->Username = "pms@microrage.com"; // SMTP account username
	$mail->Password = "3%VgjFy6"; // SMTP account password
	$mail->From     = $from;
	$mail->FromName= $fromname;
	$mail->AddAddress($to, $toname);
	$mail->Subject  = $subject;
	$mail->IsHTML(true);
	$mail->Body     = $message;
	$mail->WordWrap = 50;
	if ($attachment!=""){
		$mail->AddAttachment($attachment);
	}
	//if site is on localhost then save the email message in a text file
	$servers = array('localhost', '127.0.0.1');
	if(in_array($_SERVER['HTTP_HOST'], $servers)){ 
		$file = $subject." ".unique_id(5).".txt";
		$message = str_replace("</p>", "", $message);
		$message = str_replace("<p>", "\r\n\r\n", $message);
		$message = str_replace("<strong>", "", $message);
		$message = str_replace("</strong>", "", $message);
		
		file_put_contents($file, $message);
	}else{
		if(!$mail->Send()) {
			///echo $mail->ErrorInfo;
			return false;
		} else {
			return true;
		}
	}
}

function sendMail($message, $subject, $to, $toname="", $from,  $fromname=""){ 
	//echo $message."<br>Subject: ".$subject."<br>To: ".$to."<br>Toname: ".$toname."<br>from: ".$from."<br>fromName: ".$fromname;
	$headers = 'Return-Path: ' . $from . "\r\n" . 
		'From: ' . $fromname . ' <' . $from . '>' . "\r\n" . 
		'X-Priority: 3' . "\r\n" . 
		'X-Mailer: PHP ' . phpversion() .  "\r\n" . 
		'Reply-To: ' . $fromname . ' <' . $from . '>' . "\r\n" .
		'MIME-Version: 1.0' . "\r\n" . 
		'Content-Transfer-Encoding: 8bit' . "\r\n" . 
		'Content-Type: text/html; charset=UTF-8' . "\r\n";
	
	$params = '-f ' . $from;
	$servers = array('localhost', '127.0.0.1');
	if(in_array($_SERVER['HTTP_HOST'], $servers)){ 
		$file = $subject." ".unique_id(5).".txt";
		$message = str_replace("</p>", "", $message);
		$message = str_replace("<p>", "\r\n\r\n", $message);
		$message = str_replace("<strong>", "", $message);
		$message = str_replace("</strong>", "", $message);
		
		file_put_contents($file, $message);
	}else{
		return mail($to, $subject, $message, $headers, $params);
	}
}