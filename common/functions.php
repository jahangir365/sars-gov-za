<?php
/*
All common functions 
*/



function secureIt($userRoles){
	global $app_id;
	$arr_userRoles = explode(",",$userRoles);
	//echo $_SESSION["app_id"]. " - ".$app_id;
	if ((isset($_SESSION["loggedInUserRole"]) && $_SESSION["loggedInUserRole"]=="" && $_SESSION["app_id"]==$app_id) 
			|| (!in_array($_SESSION["loggedInUserRole"], $arr_userRoles))){
				$email = trim($_COOKIE['email']);
				$pwd = trim($_COOKIE['pwd']);
				if (!$email=="" && !$pwd==""){
					$query = "select * from users where email='" . $email . "' and password='". $pwd ."'" ;
					$user = db::getRecord($query);
					if($user){
						//saveLastActiveTime($user['id']);
						$_SESSION["loggedInUserRole"] = $user["userrole"];
						$_SESSION['firstname'] = $user['firstname'];
						$_SESSION['lastname'] = $user['lastname'];
						$_SESSION['email'] = $user['email'];
						$_SESSION['photo'] = $user['photo'];
					}else{
						$_SESSION['error']="restrictedArea";
						$_SESSION["msgType"]="danger";
						header('location: ../admin/login.php');
						}
				}else{
					$_SESSION['error']="restrictedArea";
					$_SESSION["msgType"]="danger";
					header('location: ../index.php');
					}
		}
}
 function returnName($id,$filedname, $tblname){
 $name = db::getCell("SELECT $filedname FROM $tblname WHERE id=".$id);
 return $name;
}
function showMessage (&$messages){
	if(isset($_SESSION["error"]) && $_SESSION["error"]!=""){
		$m = $_SESSION["error"];
		if ($m != ''){
			if($_SESSION["update_entity"]!=""){
				$msg = str_replace("{Record}", $_SESSION["update_entity"], $messages[$m]);
			
			}else{
				$msg = str_replace("{Record}", "Record", $messages[$m]);
				}			
			echo '<div class="alert alert-'.$_SESSION["msgType"].' alert-block fade in">';
			echo $msg.'</div>';
		}
	$_SESSION["error"] = "";
	$_SESSION["msgType"]="";
	$_SESSION["update_entity"]="";
	}
}
function displayDropDown2(&$fieldlist, $defaultvalue){
        
	foreach ($fieldlist as $row){
		if(!$row['name'] == ""){
			$strDropDown = $strDropDown . '<option value="' . $row['id'] . '"';
				if ($row['id']==$defaultvalue && !defaultvalue == "" ){
					$strDropDown= $strDropDown . ' selected="selected" ';
				}
		$strDropDown = $strDropDown . ">" .  $row['name'] ."&nbsp;&nbsp;&nbsp;(". returnName($row['city_id'], 'name', 'city') . ")&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>";
		}
        
	}
	return $strDropDown;
}
function logout(){
	
	session_destroy();
	$_SESSION["msgType"]="warning";
	}
function adminRedirect($script, $result, $id, $operation, $params=""){ // Redirects to relevant admin page
	if($_SESSION["error"]==""){
		if ($result){
			$msgid = array(1=>"updated", 2=>"inserted", 3=>"deleted", 4=>"issued", 5=>"activated"); 
//                        $mode2 = $mode;
			$_SESSION["msgType"]="success";
		}else{
			$msgid = array(1=>"notUpdated", 2=>"notInserted", 3=>"notDeleted", 4=>"notIssued", 5=>"notActivated"); //Fail message for (update, insert, delete)
			$_SESSION["msgType"]="danger";
		}
		$_SESSION["error"] = $msgid[$operation];		
	}
	
	if ($_SESSION["msgType"]==""){
		$_SESSION["msgType"]= ($result ? "success" : "danger");
		}
	header("location: ".$script.".php?&id=".$id."&".$params);
}
function adminRedirect2($script, $result, $id, $operation, $params=""){ // Redirects to relevant admin page
	if($_SESSION["error"]==""){
		if ($result){
			$msgid = array(1=>"updated", 2=>"inserted", 3=>"deleted", 4=>"issued", 5=>"activated"); 
//                        $mode2 = $mode;
			$_SESSION["msgType"]="success";
		}else{
			$msgid = array(1=>"notUpdated", 2=>"notInserted", 3=>"notDeleted", 4=>"notIssued", 5=>"notActivated"); //Fail message for (update, insert, delete)
			$_SESSION["msgType"]="danger";
		}
		$_SESSION["error"] = $msgid[$operation];		
	}
	
	if ($_SESSION["msgType"]==""){
		$_SESSION["msgType"]= ($result ? "success" : "danger");
		}
	header("location: ".$script.".php?mode=new&idmsg=".$id."&".$params);
}
function showTitle($title){
	if ($title!=""){
		echo $title." | ";
		}
	}
function unique_id($l = 8) {
    return substr(md5(uniqid(mt_rand(), true)), 0, $l);
}

function unique_idExt($l = 5) {
    return substr(md5(uniqid(mt_rand(), true)), 0, $l);
}
function replaceDash($str){
	if ($str=='')
		return ("-");
	else
		return ($str);
}
function displayDropDown(&$fieldlist, $defaultvalue){
	foreach ($fieldlist as $row){
		if(!$row['name'] == ""){
			$strDropDown = $strDropDown . '<option value="' . $row['id'] . '"';
				if ($row['id']==$defaultvalue && !defaultvalue == "" ){
					$strDropDown= $strDropDown . ' selected="selected" ';
				}
		$strDropDown = $strDropDown . ">" .  $row['name'] . "</option>";
		}
	}
	return $strDropDown;
}
function displayDropDownArray(&$list, $defaultvalue){
	foreach ($list as $key=>$val){
			$strDropDown = $strDropDown . '<option value="' . $key. '"';
				if ($key==$defaultvalue){
					$strDropDown= $strDropDown . ' selected="selected" ';
				}
		$strDropDown = $strDropDown . ">" .  $val . "</option>";
	}
	return $strDropDown;
}
function displayDropDownArray2($types, $defaultvalue){
	foreach ($types as $type){
			$strDropDown = $strDropDown . '<option value="' . $type['name']. '"';
				if ($type['name']==$defaultvalue){
					$strDropDown= $strDropDown . ' selected="selected" ';
				}
		$strDropDown = $strDropDown . ">" .  $type['name'] . "</option>";
	}
	return $strDropDown;
}
function displayDropDownArray3($values,$defaultvalue){
	foreach ($values as $value){
			$strDropDown = $strDropDown . '<option value="' . $value['id']. '"';
				if ($value['id']==$defaultvalue){
					$strDropDown= $strDropDown . ' selected="selected" ';
				}
		$strDropDown = $strDropDown . ">" .  $value['car'] . "</option>";
	}
	return $strDropDown;
}
function displayDropDownArray4($values,$defaultvalue){
	foreach ($values as $value){
			$strDropDown = $strDropDown . '<option value="' . $value['title']. '"';
				if ($value['title']==$defaultvalue){
					$strDropDown= $strDropDown . ' selected="selected" ';
				}
		$strDropDown = $strDropDown . ">" .  $value['title'] . "</option>";
	}
	return $strDropDown;
}
function getCursor(){
	global $pageNo, $pageSize;
	if (isset($_GET['pageNo'])){
		$pageNo = intval($_GET['pageNo']);
		if($pageNo < 1) $pageNo = 1;
		}
	$cursor = ($pageNo - 1) * $pageSize;
	return $cursor;
	}
	
function createPaging($totalRecords, $pageNo, $pageSize){
	$totalPages = $totalRecords / $pageSize;
	$querystring = $_SERVER['QUERY_STRING'];
	if (strpos($querystring, "pageNo")===FALSE){
		$querystring .= "&pageNo={pageNumberHere}";
	}else{
		$querystring = substr_replace($querystring, "{pageNumberHere}", strpos($querystring, "pageNo")+7, 1);
	}
	 if (($totalPages - floor($totalPages)) > 0){
		 $totalPages = floor($totalPages) + 1;
		 }

		echo '<div class="widget-foot dataTables_paginate paging_bootstrap pagination">';
		echo '<ul class=" pull-right">';
		echo '<li class="prev';
		if ($pageNo==1) echo ' disabled"';
		echo '"><a href="';
		echo ($pageNo>1 ? "?".str_replace("{pageNumberHere}", $pageNo-1, $querystring) : "#");
		echo '">&larr; Prev</a></li>';

		for ($i=1; $i<=$totalPages; $i++){
			echo '<li';
			if ($i==$pageNo) echo ' class="active"';
			echo '><a href="?'. str_replace("{pageNumberHere}", $i, $querystring).'"';

			echo '>'.$i.'</a></li>';
		}
		echo '<li class="next';
		if ($pageNo==$totalPages) echo ' disabled"';
		echo '"><a href="';
		echo ($pageNo!=$totalPages ? "?".str_replace("{pageNumberHere}", $pageNo+1, $querystring) : "#");
		echo '">Next &rarr;</a></li>';
		echo '</ul>';
		echo '<div class="clearfix"></div>';
		echo '</div>';
	}
function replacewithdash($str){
	return strtolower(str_replace(' ', '-', $str));
}
function formatTimestamp($date){
	if ($date!=""){
		return strtotime($date);
	}else{
		return false;
	}
}
function formatDate4db($date){
	if ($date=="now" || $date==""){
		return date("Y-m-d", time());
	}else{
		return date("Y-m-d", strtotime($date));
	}
}
function customformatDate4db($date){
	if ($date=="m-d-Y" || $date==""){
		return date("Y-m-d", time());
	}else{
		return date("Y-m-d", strtotime($date));
	}
}
function formatDateTime4db($date){
	if ($date=="now" || $date==""){
		return date("Y-m-d H:i:s a", time());
	}else{
		return date("Y-m-d H:i:s a", strtotime($date));
		}
}
function formatFullDate($timestamp=''){
	if ($timestamp=='now' || $timestamp==''){ 
		return date("d F Y", time());
	}else{
		return date("d F Y", strtotime($timestamp));
	}
}
function formatFullDate2($timestamp=''){
	if ($timestamp=='now' || $timestamp==''){ 
		return date("D", time());
	}else{
		return date("D", strtotime($timestamp));
	}
}
function formatFullDateTime($timestamp){
	if ($timestamp=='now' || $timestamp==''){ 
		return date("m/d/Y, H:i", time());
	}else{
		return date("m/d/Y, H:i", $timestamp);
	}
}
function formatShortDate($timestamp=''){
	if ($timestamp=='now' || $timestamp==''){ 
		return date("m/d/Y", time());
	}else{
		return date("m/d/Y", $timestamp);
	}
}
function getYesNo($bool){
	if ($bool)
		return "Yes";
	else
		return "No";
	}
function altRow($isAlt){
	if ($isAlt){
		echo ' class="altrow"';
	}
}
function escape($str){
	return addcslashes($str, "\x00\n\r\'\"\x1a");
}
function unescape($str){
	return stripcslashes($str);
}
function IsEmpty($str){
	if ($str=='')
		return (true);
	else
		return (false);
}
function isRd1($isRead){
	return $isRead==0 ? '<strong>' : "";
	}
function isRd2($isRead){
	return $isRead==0 ? '</strong> <small><span class="label label-info" style="padding: 1px 4px; font-size: smaller;">New</span>' : "";
	}
	
function showNewSymbol($isRead){
	if (!$isRead){
		echo ' <small><span class="label label-warning new_symbol">New</span></small>';
		}
	}
	
function showApproveLabel($isApproved){
	if (!$isApproved){
		echo ' <small><span class="label label-danger new_symbol">Approval Required</span></small>';
		}
	}	
	
function sortFunction( $a, $b ) {
	return strtotime($b["date"]) - strtotime($a["date"]);
}
function saveLastActiveTime($userid){
	db::updateRecord("update users set lastActiveTime=".time()." where id=".$userid);
	}
function getTotalDays ($startDate, $endDate){
	$start = strtotime($startDate);
	$end = strtotime($endDate);
	$total_days = ceil(abs($end - $start) / 86400)+1;
	return $total_days;
	}
	
function getImagePath($image){
	$isAbs = strpos($image, "http://");
	if($image==""){
		$image = "../images/user.png";
		}else if ($isAbs === false){
			$image = "../uploads/".$image;
		}
	return $image;
	}
function newBookings($array){
	return $array["status"]=="Pending" ? true:false;
}
function repliedBookings($array){
	return $array["status"]=="Replied" ? true:false;
}
function completedBookings($array){
	return $array["status"]=="Confirmed" ? true:false;
}
function cancelledBookings($array){
	return $array["status"]=="Cancelled" ? true:false;
}
function is_in_array($array_data, $field, $value, $returnField){	
	$found = 0;
	if ($array_data){
		foreach ($array_data as $row){
			if ($row[$field]==$value){
				$found = $row[$returnField];
				}
			}
	}
	return $found;
}
function arrayToCommaSeparated($list, $field="id"){
	$total = count($list);
	$counter = 1;
	foreach ($list as $row){
		if (!empty($row[$field])){
			$str .= $row[$field];
			if ($counter<$total){
				$str .= ",";
				}
			$counter++;
			}
		}
	return $str;
	}
	
function shortDesc($str, $char){
    if (strlen($str) <= $char){
        return $str;
        }else{
            return substr($str, 0, strpos($str, ' ', $char)).'...';
            }
    }
function allowTo($userRoles){
$arr_userRoles = explode(",",$userRoles);
if ((isset($_SESSION["loggedInUserRole"]) && $_SESSION["loggedInUserRole"]=="") 
|| (!in_array($_SESSION["loggedInUserRole"], $arr_userRoles))){
return false;
}else{
return true;
}
}
function array_to_csv_download($data, $headerdata, $filename = "export.csv",$dalimeter=',') {
	header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="'.$filename.'";');
	//header('Pragma: no-cache');
	//header('Expires: 0');
    $file = fopen('php://output', 'w');
    fputcsv($file,$headerdata);
    foreach ($data as $row){
			fputcsv($file, $row);
			}

			fclose($file);
			exit();
}
function array_to_json( $array ){
	if( !is_array( $array ) ){
		return false;
	}
	$associative = count( array_diff( array_keys($array), array_keys( array_keys( $array )) ));
	if( $associative ){
		$construct = array();
		foreach( $array as $key => $value ){
		if( is_numeric($key) ){
			$key = "key_$key";
		}
		$key = "\"".addslashes($key)."\"";
		if( is_array( $value )){
				$value = array_to_json( $value );
			} else if( !is_numeric( $value ) || is_string( $value ) ){
				$value = "\"".addslashes($value)."\"";
			}
	
			$construct[] = "$key: $value";
		}
		$result = "{ " . implode( ", ", $construct ) . " }";
	} else {
	
		$construct = array();
		foreach( $array as $value ){
			if( is_array( $value )){
				$value = array_to_json( $value );
			} else if( !is_numeric( $value ) || is_string( $value ) ){
				$value = "'".addslashes($value)."'";
			}
			$construct[] = $value;
		}
		$result = "[ " . implode( ", ", $construct ) . " ]";
	}
	return $result;
}	
function upload_file($file,$tpath,$max_size){
	$target_path = $tpath;
	$tname = $_FILES[$file]['tmp_name'];
	$image = $_FILES[$file]['name'];
	$size = $_FILES[$file]['size'];
	$acname = pathinfo($image,PATHINFO_FILENAME);
	//echo $acname;
	$orgname = $acname;
	$ext = pathinfo($image, PATHINFO_EXTENSION);
	//echo $extension;
	if ($size<=$max_size){
		$x = 1;
		while(file_exists($target_path.$acname.'.'.$ext)){           
			$acname = (string)$orgname.'('.$x.')';
			$x++;
		}	
		$fullname = $acname.'.'.$ext;
		 
		if(move_uploaded_file($tname, $target_path . $fullname)){}
		return $image;
	 }else {
		return 'Max Size allowed '.($max_size/1024).' KB';
		}
}
function getHTML($template){
		$myFile = "templates/".$template.".html";
		$fh = fopen($myFile, 'r');
		$content = fread($fh, filesize($myFile));
		fclose($fh);
		return $content;
	}
function getHTMLext($template){
		$myFile = "../common/templates/".$template.".html";
		$fh = fopen($myFile, 'r');
		$content = fread($fh, filesize($myFile));
		fclose($fh);
		return $content;
	}
function generatePDF($content, $filename){
	require('dompdf/dompdf_config.inc.php');
	
	$dompdf = new DOMPDF();
		
	$dompdf->load_html($content);
	$dompdf->set_paper("letter", "portrait");
	$dompdf->render();

	$canvas = $dompdf->get_canvas();
	$w = $canvas->get_width();
	$h = $canvas->get_height();
	
	$font = Font_Metrics::get_font("helvetica", "bold");

	$dompdf->stream( $filename.".pdf", array("Attachment" => 1));
	}
//********************************email template message body for supplier/admin/steward/driver*********************************//	
//function getBookingDetails($id, $withCustomerInfo=0){
function getBookingDetails($id){
	$query = "SELECT b.*,
			(SELECT concat(firstname, ' ',lastname) as name FROM users WHERE id=b.customer_id) as customer_name,
			
			(SELECT concat(firstname, ' ',lastname) as name FROM users WHERE id=b.agent_id) as agent_name,			
			(SELECT airport_name FROM airports WHERE id=b.airport_id) as airport_name,
            (select title from services where id in 
			(select parent_service_id from services_supplier where id=b.service_id))as servicetitle, 	
			(SELECT name FROM destinations WHERE id=b.destination_id) as destination,
			(SELECT concat(name, ' ',model)as vehicle FROM vehicles WHERE id=b.vehicle_id) as vehicle			
		 FROM bookings b where b.id=".$id;
	$booking = db::getRecord($query);
	
	$name = $booking['customer_name'];
	$phone = $booking['phone'];
	$price = $booking['after_discount'];
	$deposit = $booking['before_discount'];
	$vehicle = $booking['vehicle'];
	$pickupLocation = $booking['transportation_address'];
	$destination = $booking['destination'];
	$no_of_trips = $booking['adults'];
	$key = $booking['tracking_code'];
	
	$pickupDate = formatFullDateTime($booking['flight_date']);
	$dropoffDate = formatFullDateTime($booking['flight_time']);
	$occasion = $booking['passport_id_no'];
	$is_surprise = $booking['flight_company'];
	$sourceToHear = $booking['flight_no'];
	$specialReq = $booking['payment_method'];
	
	$message .= "<table border='0' width='40%' style='margin-top:25px;margin-bottom:25px;'>
		<tr>
			<td colspan='2'><strong>Booking details:</strong></td>
		</tr>
		<tr>
			<td></td>
		</tr><tr>
			<td align='right' style='padding-right:25px'>Booking ID</td>
			<td>$key</td>
		</tr>";
	if($withCustomerInfo){
		$message .= "<tr>
			<td align='right' style='padding-right:25px'>Passenger</td>
			<td>$name</td>
			</tr>
			<tr>
			<td align='right' style='padding-right:25px'>Phone</td>
			<td>$phone</td>
			</tr>";
		}
	$message .= "<tr>
			<td align='right' style='padding-right:25px'>Vehicle requested</td>
			<td>$vehicle</td>
		</tr>
		<tr>
			<td align='right' style='padding-right:25px'>Pickup Location</td>
			<td>$pickupLocation</td>
		</tr>
		<tr>
			<td align='right' style='padding-right:25px'>Drop Location</td>
			<td>$destination</td>
		</tr>
		<tr>
			<td align='right' style='padding-right:25px'>Number of trips</td>
			<td>$no_of_trips</td>
		</tr>
		<tr>
			<td align='right' style='padding-right:25px'>Date and time of pickup</td>
			<td>$pickupDate</td>
		</tr>
		<tr>
			<td align='right' style='padding-right:25px'>Date and time of drop off</td>
			<td>$dropoffDate</td>
		</tr>
		<tr>
			<td align='right' style='padding-right:25px'>Occasion</td>
			<td>$occasion</td>
		</tr>
		<tr>
			<td align='right' style='padding-right:25px'>Surprise</td>
			<td>$is_surprise</td>
		</tr>
		<tr>
			<td align='right' style='padding-right:25px'>How did you hear about us</td>
			<td>$sourceToHear</td>
		</tr>
		<tr>
			<td align='right' style='padding-right:25px'>Special requirements</td>
			<td>$specialReq</td>
		</tr>
		</table>";
	return $message;
}
function invoiceText($id){
			$kaka=explode(",", $id);
			//$bookings = array(1,2,3);
//			foreach($kaka as $booking){
//				echo $booking;
//			}
//			exit;			
			$counter1=1;
			foreach($kaka as $booking){
			$query = "select pc.code as code,p.product_name as name,p.product_price as price,
			(select countryName from countries where countryCode=p.country_code) as countryName
			from promocodes pc 
			left join products p on p.id=pc.product_id 
			where pc.id=".$booking;
			$invoices = db::getRecords($query);
			$total_services = count($invoices);
			$date=formatDateTime4db("now");
			$content = getHTMLext("newinvoice");
			$counter=1;
			foreach($invoices as $invoice){
				$bookings_html .= '<tr class="">'; 
				if($counter==1){
					$bookings_html .= '<td ';
					$bookings_html .= ($total_services > 1 ? ' rowspan="'.$total_services.'"' : '');
					$bookings_html .= ' class="padTopBot">'.$counter1.'</td>';
					} 
							  
				$bookings_html .= '<td align="left" class="padTopBot padright">'.$invoice["code"].'</td>							
							  <td align="right" class="padTopBot">'.$invoice["name"].'</td>
							  <td align="right" class="padTopBot">'.$invoice["price"]." ".$currency.'</td>
							  <td align="right" class="padTopBot">'.$invoice["countryName"].'</td>
							</tr>';
				$totalsum=$totalsum+$invoice["price"];
			$counter++;
			}
			$counter1++;
			}
			$content = str_replace('{totalprice}',($totalsum) , $content);
			$content = str_replace('{bookings_html}', $bookings_html, $content);
			$content = str_replace('{date}', $date, $content);
			$filename = "invoice_".time();
			generatePDF($content, $filename);
			}

function bitcoinzzz($hash_id){
	$url="http://blockchain.info/rawtx/".$hash_id;
	$ch1 = curl_init();
	curl_setopt($ch1, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch1, CURLOPT_URL,$url);
	curl_setopt($ch1, CURLINFO_HEADER_OUT, true);
	$result1=curl_exec($ch1);
	curl_getinfo($ch1, CURLINFO_HEADER_OUT);
	curl_getinfo($ch1,CURLINFO_HTTP_CODE);
	curl_close($ch1);
	$result1 = json_decode($result1,true);
	// echo "<pre>";
	// print_r($result1);
	// echo "</pre>";
	if($result1){ 
	  $confirmed =$result1["block_height"];
	  $foo=$result1['out'][0]['value'];
	  $sending_addr=$result1['inputs'][0]['prev_out']['addr'];
	  $transfer_amount =$foo/100000000;
	  $send_rec_addr=$result1['out'];
	  $sender_addr=$send_rec_addr[0]['addr'];
	  $rec_addr=$send_rec_addr[1]['addr'];
	  //$hash=$send_rec_addr['hash'];
	}
	$bitcoin_data["sending_addr"]=$sending_addr;
    $bitcoin_data["transfer_amount"]=$transfer_amount;
    $bitcoin_data["sender_addr"]=$sender_addr;
    $bitcoin_data["rec_addr"]=$rec_addr;
    $bitcoin_data["confirmation"] = $confirmed;
	return  $bitcoin_data;
}
function random_number($size = 6)
{
    $random_number='';
    $count=0;
    while ($count < $size ) 
        {
            $random_digit = mt_rand(0, 9);
            $random_number .= $random_digit;
            $count++;
        }
    return $random_number;  
}
function email_encoded ($email){
	$start = strpos($email,"@");
	$section1_s = substr($email,0,$start);
	$section = substr($email,$start);
	$start1 = strrpos($section,".");
	$section2_com = substr($section,$start1);
	$start2 = strpos($section,".");
	$section3_c = substr($section,0,$start1);
	/* ----------------------- */
	$first = substr($section1_s,0,3);
	$first1 = substr($section1_s,3,strlen($section1_s));
	$second = substr($section3_c,0,4);
	$second1 = substr($section3_c,4,strlen($section3_c));
	$array = str_split($first1);
	foreach($array as $key => $value){
		$freplace = str_replace($key,"&#149;",$key); 
		$str .= $freplace;
	}
	$firstString = $str;
	/*-------------------------------------------*/
	$array2 = str_split($second1);
	foreach($array2 as $key => $value){
		$freplace = str_replace($key,"&#149;",$key); 
		$str1 .= $freplace;
	}
	$firstString2 = $str1;
	return $finalStr = $first.$firstString.$second.$firstString2.$section2_com;
}
function pr($record){
	echo "<pre>";
	print_r($record);
	echo "</pre>";
	exit;
}

function get_client_ip() {
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if(isset($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}


?>