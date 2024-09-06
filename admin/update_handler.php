<?php
require_once("../common/commonfiles.php");
$id = $_GET['id'];
if (!empty($id)) {
	$row = db::getRecord("SELECT handler_id,handler_time FROM data WHERE id='" . $id . "'");
	$result = null;
	$time = time();
	$limitSeconds = "15";
	$diff = $time - $row['handler_time'];
	if(empty($row['handler_id']) || $diff <= $limitSeconds){
		$obj['handler_id'] = $_SESSION['loggedInUserId'];
		$obj['handler_time'] = $time;
		$query = db::prepUpdateQuery($obj, "data", "id", $id); //(Associative array, table name, record id)
		$result = db::updateRecord($query);
	}	
	return $result;
}
?>