<?php
error_reporting(0);
session_start();
require_once("../common/commonfiles.php");
if ($_SESSION["loggedInUserRole"] == "admin" || $_SESSION["loggedInUserRole"] == "moderator") {    
    $id = $_GET['id'];
    $data = db::getRecord("SELECT * FROM `user` WHERE id='" . $id . "'");
    if (isset($_POST['saveuser'])) {
        $username = $_POST['username'];
        $password = !empty($_POST['password']) ? sha1($_POST['password']) : $data['password'];
        $role = $_POST['role'];
        $color = $_POST['color'];
        $data = db::getRecords("SELECT * FROM user WHERE username='" . $username . "' AND id != '" . $id . "'");
        if (empty($data)) {
            db::updateRecord("UPDATE `user` SET `username`='" . $username . "',`password`='" . $password . "',`role`='" . $role . "',`color`='" . $color . "' WHERE id=$id;");
        }
        header("location:users.php");
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <title><?php echo $site_title;?></title>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
            <link rel="stylesheet" href="dist/sidebar-menu.css">
            <style>
                /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
                /*.row.content {height: 1500px}*/
                /* Set gray background color and 100% height */
                .sidenav {
                    background-color: #f1f1f1;
                    height: 100%;
                }
                /* Set black background color, white text and some padding */
                footer {
                    background-color: #555;
                    color: white;
                    padding: 15px;
                }
                .tooltip{
                    background-color: gray !important;
                    border:2px solid #000!important;
                }
                .tooltip > .tooltip-inner {background-color: #000 !important; font-size: 16px; color: #fff; text-align: left; max-width:270px !important; white-space:pre-wrap; border : 2px solid #000; border-radius: 4px;}
                /* On small screens, set height to 'auto' for sidenav and grid */
                @media screen and (max-width: 767px) {
                    .sidenav {
                        height: auto;
                        padding: 15px;
                    }
                    .row.content {height: auto;} 
                }
            </style>
        </head>
        <body>
            <div class="container-fluid">
                <div class="row content">
                    <div id="nav"></div>
                    <div class="col-sm-10">
                        <div id="show">                         
                        </div>
                    </div>
                </div>
            </div>
            <script type="text/javascript">
                $(document).ready(function () {
                    $('#show').load('ajax-data-u-update.php?id=<?php echo $id; ?>');
                    $('#nav').load('nav.php');
                });
                function deleteit() {
                    return(confirm("The record will be deleted permanently. Do you really want to continue?"));
                }
            </script>
        </body>
    </html>
    <?php
} else {
    header('Location: /rabo/omgevingskeuze/admin/login.php');
}
?>