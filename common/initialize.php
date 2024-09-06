<?php
// This will load all settings from database and make them in an array
// for($i=1; $i<5;$i++) {
// 	$user_id = 2;
// 	$usersarr =array();
// 	$user_downliner = db::getRecords("select user_id from tree where upline_user_id=".$user_id);
// 	$counter = 0;foreach ($user_downliner as $downline) {
// 		$user2_downliner = db::getRecords("select user_id from tree where upline_user_id=".$downline["user_id"]);
// 		$user_id = $user2_downliner[$counter]["user_id"];
// 		$usersarr[]=$user_id;
// 		$counter++;
// 	}
// 	pr($usersarr);
// }
$employee_status = array(0=>'Active',1=>'Standby');
$publish_status = array(0=>'Draft',1=>'Published');
$publish_label_status = array(0=>'default',1=>'info');
$status_label_booking = array(0=>'default',1=>'default',2=>'success',3=>'success',4=>'info', 5=>'info');
$service_id = array(1=>'Airport VIP',2=>'Transfer',3=>'Luggage');
$arr_percentage = array(5=>'5%',10=>'10%',15=>'15%',20=>'20%',25=>'25%',30=>'30%',35=>'35%',40=>'40%',45=>'45%',50=>'50%'
						,55=>'55%',60=>'60%',65=>'65%',70=>'70%',75=>'75%',80=>'80%',85=>'85%',90=>'90%',95=>'95%',100=>'100%');
$account_status = array(0=>'BLOCKED',1=>'ACTIVE');
$attendence = array(1=>"Present", 2=>"Absent");
$employee_type = array (0=>"Monthly",1=>"Daily Wages");
$payment_type = array(0=> "Full Payment", 1 =>"Paid with Deduction");

$expense_type = array (0=>"Markeet",1=>"Salary", 2 =>"Electricity", 3 =>"Machinery", 4=>"Furniture", 5=> "Repairing", 6=> "Others", 7=>"Orders");

$user_status    = array(0=>'Idle',1=>'Booking');
$status_label_user = array(0=>'default',1=>'info');
$type_status = array(0=>'Inactive',1=>'Active');
$type_status_booking = array(0=>'Submitted',1=>'Assigned');
$type_trust = array(0=>'NotTrusted',1=>'Trusted');
$type_status1 = array(0=>'No',1=>'Yes');

$status_label_type = array(0=>'default',1=>'success');

$upgrade_levels = array(1=>"Registerd",2=>"Bronze",3=>"Silver",4=>"Gold",5=>"Platinum");
$upliner_levels = array(2=>"Bronze",3=>"Silver",4=>"Gold",5=>"Platinum");
$upgrade_levels_label = array(1=>"default",2=>'success',3=>'info',4=>'warning',5=>'danger');
$upgrade_levels_color = array(1=>"blue",2=>'style="color:red"',3=>'style="color:silver"',4=>'style="color:#FFD700"',5=>'style="color:green"');
$level_upgrage_argets = array("silver"=>"50","gold"=>"100","platinum"=>"200");
$breakUp_donation = array("sponser"=>"0.02","upline"=>"0.08");

// if($_SESSION["loggedInUserRole"]=="Supplier"){
// 	$service_type=db::getcell("select group_concat(cat_key) from service_types where id in(select Service_type_id from supplier_servicetypes where supplier_id=".$_SESSION["loggedInUserId"].")");
// }
$months = array("01"=>"January","02"=>"February","03"=>"March","04"=>"April","05"=>"May","06"=>"June","07"=>"July","08"=>"August","09"=>"September","10"=>"October","11"=>"November","12"=>"December");
?>
