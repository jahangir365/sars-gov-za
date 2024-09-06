<?php

require_once("../common/commonfiles.php");
$time = time();
$data = db::getRecords("SELECT * FROM data WHERE status=0 AND response!='' AND redirect!='' ORDER BY id DESC");
$limitSeconds = "30";
foreach($data as $d){
	$diff = $time -$d['last_online'];
	if($diff >= $limitSeconds){
		$obj['status'] = 1;
		$query = db::prepUpdateQuery($obj, "data", "id", $d['id']); //(Associative array, table name, record id)
		$result = db::updateRecord($query);
	}
}
?>