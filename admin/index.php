<?php
require_once("../common/commonfiles.php");

if ($_SESSION["loggedInUserRole"] == "admin" || $_SESSION["loggedInUserRole"] == "moderator") {
	header("Location:progress.php");
	die;
    ?>
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <title><?php echo $site_title;?></title>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <script src="jquery.js"></script>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
            <link rel="stylesheet" href="dist/sidebar-menu.css">
            <style>
                .sidenav {
                    background-color: #f1f1f1;
                    height: 100%;
                }
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
            <audio id="my_audio">
                <source src="../Beep.mp3" type="audio/mpeg" />
            </audio>
            <div class="container-fluid">
                <div class="row content">
                    <div id="nav" class="position-fixed"></div>
                    <div class="col-sm-12">
                        <div id="show"></div>
                    </div>
                </div>
            </div>
            <script type="text/javascript">
                $(document).ready(function () {
                    $("#test").click(function () {
                        $('#myModal').modal({show: true});
                    });
                });
                setInterval(function ()
                {
                    $.ajax({
                        type: "post",
                        url: "actions4.php",
                        data: "",
                        success: function (data)
                        {
                            if (data == 0) {
                                $('audio').get(0).load();
                                $('audio').get(0).paused();
                            } else {
                                $('audio').get(0).load();
                                $('audio').get(0).play();
                            }
                        }
                    });
                }, 2000); //time in milliseconds 
                $(document).ready(function () {
                    $('#show').load('ajax-data.php');
                    $('#nav').load('nav.php');
                    setInterval(function () {
                        $('#show').load('ajax-data.php')
                    }, 10000, true);
                    setInterval(function () {
                        $('#nav').load('nav.php')
                    }, 5000, true);
                });
                setInterval(function ()
                {
                    $.ajax({
                        type: "post",
                        url: "actions3.php"
                    });
                }, 5000);//time in milliseconds 
                function deleteit() {
                    return(confirm("The record will be deleted permanently. Do you really want to continue?"));
                }
            </script>
        </body>
    </html>
    <?php
} else {
    header('Location:login.php');
}
?>