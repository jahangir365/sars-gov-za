<?php
require_once("../common/commonfiles.php");
if (isset($_POST["username"]) && $_POST["username"] != "") {
    $username = trim($_POST['username']);
    $captcha = trim($_POST['g-recaptcha-response']);
    $pwd = trim($_POST['pwd']);

    if (!$username == "" && !$pwd == "") {
        $pwd = sha1($pwd);
        $query = "select * from user where username='" . $username . "' and password='" . $pwd . "'";
        $user = db::getRecord($query);
        if ($user) {
            $_SESSION["loggedInUserRole"] = $user["role"];
            $_SESSION["loggedInUserId"] = $user["id"];
            $_SESSION['firstname'] = $user['username'];
            /*print_r($_SESSION);
            die();*/
          
            if (trim($user["role"]) == "admin") { //Administrator
                $_SESSION["isAdminloggedin"] = true;
                //header('Location:index.php');
                echo "<script>location.href='index.php'</script>";
                
            } else if (trim($user["role"]) == "moderator") { //Customer
                $_SESSION["isAdminloggedin"] = true;
                header('Location:index.php');
            }
        } else {
            $_SESSION['error'] = "incorrect_login";
            $_SESSION["msgType"] = "danger";
        }
    } else {
        $_SESSION['error'] = "incorrect_login";
        $_SESSION["msgType"] = "danger";
    }
}
// }
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Bootstrap Example</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <style>
            /* Set height of the grid so .sidenav can be 100% (adjust if needed) */

            .row.content {
                height: 1500px
            }
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
            /* On small screens, set height to 'auto' for sidenav and grid */

            @media screen and (max-width: 767px) {
                .sidenav {
                    height: auto;
                    padding: 15px;
                }
                .row.content {
                    height: auto;
                }
            }
        </style>
        <script src='https://www.google.com/recaptcha/api.js'></script>
    </head>

    <body>

        <div class="container-fluid">
            <div class="row content">
                <div class="col-sm-3 sidenav">
                    <!--  <h4><img src="https://bankieren.rabobank.nl/rabo/sam/staticcontent/vrs_11_13_0/newdesign/images/rabobank_logo.png" alt="rabobank logo" /></h4> -->

                </div>
                <div class="col-sm-9">
                    <div class="col-md-6">
                        <h2><?php echo $site_title;?></h2>
                    </div>
                </div>
                <div class="col-sm-9">
                    <br/>
                    <br/>
                    <br/>
                    <br/>
                    <h2>Login </h2>
                    <?php showMessage($messages); ?>
                    <hr>

                    <form class="form-signin" action="login.php" method="post">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">User Name</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="username" id="" placeholder="User Name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-6">
                                <input type="password" class="form-control" name="pwd" id="" placeholder="Password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Sign in</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>