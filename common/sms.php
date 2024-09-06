<?php 
function sendSMS($source, $destination, $text){
    $username = '39wdfjkm';
    $password = 'ftRndtaw';

    $content =  'action=sendsms'.
                '&user='.$username.
                '&password='.$password.
                '&to='.$destination.
                '&from='.$source.
                '&text='.rawurlencode($text);
    $smsglobal_response = file_get_contents('http://www.smsglobal.com.au/http-api.php?'.$content);
  
    $explode_response = explode('SMSGlobalMsgID:', $smsglobal_response);
    if(count($explode_response) == 2) { //Message Success
        $smsglobal_message_id = $explode_response[1];
        return true;
    } else { //Message Failed
        return $smsglobal_response;
    }
}
?>