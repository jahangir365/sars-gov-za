<?php
require_once("../common/commonfiles.php");
if (!isset($_GET['j'])){
	header("location: ".$site_root."index.php?m=901");
}else {
	$task = trim($_GET['j']);
}
switch ($task) {
	case 3:
		$airport_id = strtolower($_GET["airport_id"]);
		if (!$airport_id){ 
			echo 0;
			return;
		}
	
		$query = "SELECT ss.id,
			(select title from services where id=ss.parent_service_id) as title
			FROM `services_supplier` ss
			where ss.is_active = 1 and ss.is_approved=1 and ss.airport_id=".$airport_id;
		
		$services = db::getRecords($query);
		if($services){
			echo array_to_json($services);
		}else{
			echo 0;
			}
		break;
		
	case 4:
		$airport_id = strtolower($_GET["airport_id"]);
		if (!$airport_id){ 
			echo 0;
			return;
		}
	
		$query = "SELECT d.id, d.name as title FROM destinations d
			where d.is_active = 1 and d.is_approved=1 and d.airport_id=".$airport_id."
			order by title
			";
		
		$destinations = db::getRecords($query);
		if($destinations){
			echo array_to_json($destinations);
		}else{
			echo 0;
			}
		
		break;
	case 5:
		$destination_id = strtolower($_GET["destination_id"]);
		if (!$destination_id){ 
			echo 0;
			return;
		}
	
		$query = "select v.id, concat(v.name,' (', v.capacity, 'pax)') as title, v.capacity
				from destination_prices dp
				inner join vehicles v on v.id=dp.vehicle_id
				where destination_id=".$destination_id."
				order by title";
		
		$vehicles = db::getRecords($query);
		if($vehicles){
			echo array_to_json($vehicles);
		}else{
			echo 0;
			}
		break;
	case 6:
		
		$service_id = trim($_GET["service_id"]);
		$adults = trim($_GET["adults"]);
		$children = trim($_GET["children"]);
		$infants = trim($_GET["infants"]);
		$destination_id = strtolower($_GET["destination_id"]);
		$vehicle_id = strtolower($_GET["vehicle_id"]);
		$no_of_vehicles = trim($_GET["no_of_vehicles"]);
		
		/*if (!$destination_id){ 
			echo 0;
			return;
		}*/
	
		$query = "select ss.*, s.title, st.title as service_type
					from services_supplier ss 
					left join services s on s.id=ss.parent_service_id
					left join service_types st on st.id=s.type_id
					where ss.id=".$service_id;
		$service = db::getRecord($query);
		
		if($adults!='0'){
			$adult_price = $service[$adults."_adults"];
			}
		if($children!='0'){
			if ($adults=='0'){
				$child_price = $service[$children."_adults"];
			}else{
				$child_price = $service[$children."_childs"];
				}
			}
		if($infants!='0'){
			$infant_price = $service[$infants."_infants"];
			}
		
		$initial_price_service = $adult_price + $child_price + $infant_price;
		$first_cut_service = $initial_price_service * (30/100);
		$second_cut_service = ($first_cut_service + $initial_price_service) * (5/100);
		
		$total_service_price = $initial_price_service + $first_cut_service + $second_cut_service;
		
		$obj["adult_price"] = $adult_price;
		$obj["child_price"] = $child_price;
		$obj["infant_price"] = $infant_price;
		$obj["total_service_price"] = $total_service_price;
		$obj["service_title"] = $service["title"];
		$obj["service_type"] = $service["service_type"];
		
		if ($destination_id!=""){
			$query = "select dp.*,
				(select name from destinations where id=dp.destination_id) as destination,
				(select concat(name,' (', capacity, 'pax)') from vehicles where id=dp.vehicle_id) as vehicle from destination_prices dp
				where dp.destination_id=".$destination_id." and dp.vehicle_id=".$vehicle_id;
			$transfer = db::getRecord($query);
			
			$initial_price_transport = $transfer["price"] * intval($no_of_vehicles);
			$first_cut_transport = $initial_price_transport * (30/100);
			$second_cut_transport = ($first_cut_transport + $initial_price_transport) * (5/100);
		
			$transfer_price = $initial_price_transport + $first_cut_transport + $second_cut_transport;
			
			$obj["destination"] = $transfer["destination"];
			$obj["vehicle"] = $transfer["vehicle"];
			$obj["transfer_price"] = $transfer_price;
			$obj["no_of_vehicles"] = $no_of_vehicles;
			}
			
			
		$obj["total_order_price"] = $total_service_price + $transfer_price;
		if($obj){
			echo array_to_json($obj);
		}else{
			echo 0;
			}
		
		break;
	
	
	case 16:
		if (isset($_GET['id'])){
			$id = trim($_GET['id']);
		}else{
			echo "Nothing requested";
			exit;
		}
		$invoice_template = invoiceText($id, "booking_invoice.html");
		if (!empty($invoice_template)){
			require('dompdf/dompdf_config.inc.php');
			$dompdf = new DOMPDF();
			$dompdf->load_html($invoice_template);
			$dompdf->set_paper(array(0,0, 8.5 * 72, 11 * 72), "portrait" );
			$dompdf->render();
			$canvas = $dompdf->get_canvas();
		
			$dompdf->stream("booking_".$id.".pdf", array("Attachment" => 1));
			}
		break;
	case 17:
		$type_id = strtolower($_GET["parenttype_id"]);
		if (!$type_id){ 
			echo 0;
			return;
		}
	
		$query = "select id,title from services where type_id=".$type_id." order by title";
		
		$services = db::getRecords($query);
		if($services){
			echo array_to_json($services);
		}else{
			echo 0;
			}
		break;
	case 19:
		$dis_count = $_GET["discount_title"];
		$tot_price = $_GET["total_price"];	
		if (!$dis_count){ 
			echo 567;
			return;
		}
	
		$query = "select discounttype, discount from promocodes where code='".$dis_count."' ";		
		
		$discounts = db::getRecord($query);
		if($discounts){
			if($discounts["discounttype"]!="Fixed"){
				$obj["d_val"] = $discounts["discount"]/100;
				$obj["d_tot"] = $tot_price - ($tot_price * $obj["d_val"]);
			}else{
				if ($tot_price < $discounts["discount"]){
					$obj["d_tot"]=0;
					}else{
						$obj["d_tot"]=$tot_price-$discounts["discount"];
					}
				}	
			}
		
			
		if($obj){
			echo array_to_json($obj);
		}else{
			echo 0;
			}
		break;
 	case 18:
		$type_id = strtolower($_GET["parenttype_id"]);
		if (!$type_id){ 
			echo 0;
			return;
		}
	
		$query = "select id,title from services where type_id=".$type_id." order by title";
		
		$services = db::getRecords($query);
		if($services){
			echo array_to_json($services);
		}else{
			echo 0;
			}
		break;
		
	case 20: //generate ELAL file
		//sercureIt("admin");
		$month = $_GET["month"];	
		$year = $_GET["year"];
		if ($month!="" && $year!=""){
			
			$start_date = $year."-".$month."-01";
			$end_date = date("Y-m-t", strtotime($start_date));
			$query = "SELECT b.id, b.after_discount, b.elal_num, b.elal_code, b.flight_date, 
					(select firstname from users where id=b.customer_id) as firstname
					FROM `bookings` b where b.elal_num<>'' and b.elal_code<>''
					and b.flight_date>='".$start_date."' and b.flight_date<='".$end_date."'";
			$elal_records = db::getRecords($query);
			
			if($elal_records){
				
				$file =  "1TA".date('dmy').".XYZ".date('dmy')."                                                                                 ".PHP_EOL;
				foreach($elal_records as $record){
					$elal_num = $record["elal_num"];
					for($i=0; $i<(12-strlen($record["elal_num"])); $i++){
						$elal_num = " ".$elal_num;
						}
						
					$points = strval(intval($record["after_discount"]/100));
					$str_length = strlen($points);
					for($i=0; $i<(7-$str_length); $i++){
						$points = "0".$points;
						}
					
					$familyname = $record["firstname"];
					for($i=0; $i<(15-strlen($record["firstname"])); $i++){
						$familyname = $familyname." ";
						}
					
					
					$file .= "2            ".$record["elal_code"]."".$elal_num.$points.$familyname;
					$file .= "  "; //reject code
					$file .= "               "; //corrected family name
					$file .= date("mdY", strtotime($record["flight_date"])); //transfer date
					$file .= "TLVVIP BOOKING SERVICES".PHP_EOL;
					}
				$total = strval(count($elal_records));
				$str_length = strlen($total);
				for($i=0; $i<(9-$str_length); $i++){
					$total = "0".$total;
					}
				
				$file .= "9".$total."00000000200                                                                               ";
				header("Content-type: text/plain");
				header("Content-Disposition: attachment; filename="."TA".date('dmy').".XYZ");
				print $file;
				}else{
					echo "No records available";
				}
				
			}
			
		break;

	case 21:
		$file = $_GET["file"];
		if (!empty($file)){
			$file = FILE_PATH.$file;
			if (file_exists($file)){
				header('Content-Description: File Transfer');
				header('Content-Type: application/octet-stream');
				header('Content-Disposition: attachment; filename='.basename($file));
				header('Expires: 0');
				header('Cache-Control: must-revalidate');
				header('Pragma: public');
				header('Content-Length: ' . filesize($file));
				readfile($file);
				exit;
			}
		}else{
			echo "Ooops! There is No File.";
			}
		break;
	case 22:
		$invoice_id = 23;//trim($_GET["id"]);

			$query = "SELECT b.*, bs.qty as Qty,bs.unit_price as Unit_price,bs.full_price as Full_price,
					(SELECT company FROM users WHERE id=b.customer_id) as company_name,
					 (select title from services where id in 
						(select parent_service_id from services_supplier where id=b.service_id))as servicetitle
					FROM bookings b 
					left join booking_services bs on bs.booking_id=b.id
					where b.id=".$invoice_id; 
					
			
			$invoice = db::getRecord($query);
			//print_r($invoice);
			$bid_price=$invoice["Qty"];
			$unit_price=$invoice["Unit_price"];
			$total_price=$invoice["Full_price"];
			$content = getHTML("invoice");

			$date = date("d/m/Y", strtotime($invoice["creation_date"]));
			$total_price = $bid_price*$invoice["bids_bought"];
			$gst = round((25/100)*$total_price, 2);
			$grandtotal = $total_price + $gst;
			$duedate = date("d/m/Y", strtotime($invoice["creation_date"]." +8 day"));
			$content = str_replace('{company}', $invoice["company_name"], $content);
			$content = str_replace('{address}', $invoice["address"], $content);
			$content = str_replace('{city}', $invoice["city"], $content);
			//$content = str_replace('{cvr}', $invoice["cvr"], $content);
			$content = str_replace('{date}', $date, $content);
			$content = str_replace('{Invoice No.}', $invoice_id, $content);
			$content = str_replace('{bids_bought}', $invoice["servicetitle"], $content);
			$content = str_replace('{Qty}', $bid_price, $content);
			$content = str_replace('{unitprice}', $unit_price, $content);
			$content = str_replace('{totalprice}', ($unit_price*$bid_price) , $content);
			//$content = str_replace('{subtotal}',$total_price , $content);
			//$content = str_replace('{gst}', $gst, $content);
			$content = str_replace('{grandtotal}', $total_price, $content);
			$content = str_replace('{duedate}', $duedate, $content);
			
			$filename = "invoice_".$invoice["id"];
			generatePDF($content, $filename);
			
		break;
		
		case 23:
		$user_email = $_GET["user_email"];
		$user_password = $_GET["password"];	
		if (!$user_email){ 
			echo 567;
			return;
		}
	
		$query = "select b.* from bookings where email='".$user_email."' ";		
		
		$discounts = db::getRecord($query);
		if($discounts){
			if($discounts["discounttype"]!="Fixed"){
				$obj["d_val"] = $discounts["discount"]/100;
				$obj["d_tot"] = $tot_price - ($tot_price * $obj["d_val"]);
			}else{
				if ($tot_price < $discounts["discount"]){
					$obj["d_tot"]=0;
					}else{
						$obj["d_tot"]=$tot_price-$discounts["discount"];
					}
				}	
			}
		
			
		if($obj){
			echo array_to_json($obj);
		}else{
			echo 0;
			}
		break;
}
?>