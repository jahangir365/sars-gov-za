<?php
require_once("../common/commonfiles.php");

$user = db::getRecord("SELECT * FROM user WHERE id = " . $_SESSION["loggedInUserId"]);
// print_r($user);
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
        <div id="nav" class="position-fixed"></div>
        <div class="col-sm-12">
            <h2>Profile </h2>
            <?php showMessage($messages); ?>
            <hr>

            <form class="form-signin" action="actions.php" method="post">
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">User Name</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="username" value="<?php echo $user['username']; ?>"
                               id="" placeholder="User Name">
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
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
                <input type="hidden" name="j" value="14">
            </form>


        </div>
    </div>
</div>
<script type="text/javascript">
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
</script>

</body>
</html>
			
