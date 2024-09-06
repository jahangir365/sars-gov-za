<?php
if (!isset($_SESSION)) {
    session_start();
}
error_reporting(E_ERROR);
ini_set('display_errors', 1);
ini_set('magic_quotes_gpc', 0);
date_default_timezone_set("Europe/Brussels");

$protocol = "http://";
$site_path = $protocol . $_SERVER['HTTP_HOST'];
$site_root = "";
$currency = "BTC";
$site_title = 'Anubis Panel';
$pageSize = 25;
$pageNo = 1;
define("SID", "frontend");
define("DEFAULT_CURRENCY", $currency);
define("FILE_PATH", "../uploads/");
define("SITE_URL", $site_path . $site_root);
?>