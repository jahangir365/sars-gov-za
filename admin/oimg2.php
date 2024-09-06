<?php
require_once("common/config.php");
require_once("common/database.php");
require_once("common/functions.php");

$data = db::getCell("SELECT kleure_ncode3 FROM data WHERE id =". $_SESSION['recordIdd']);

echo $data;
?>