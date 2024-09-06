<?php
require_once("../common/commonfiles.php");
$id = 1;
$value = !empty($_GET['value']) ? $_GET['value'] : "old";
if (!empty($id)) {
    $obj['value'] = $value;
    $query = db::prepUpdateQuery($obj, "mode", "id", $id); //(Associative array, table name, record id)
    db::updateRecord($query);
}
header("Location:progress.php");
?>