<?php
require_once("../common/commonfiles.php");
$condition = ($_SESSION["loggedInUserRole"] != "admin") ? " AND user_id='" . $_SESSION["loggedInUserId"] . "'" : "";
$progress = db::getRecord("SELECT COUNT(*) as progress FROM `data` WHERE status = '0' " . $condition);
$approved = db::getRecord("SELECT COUNT(*) as approved FROM `data` WHERE status = '1' " . $condition);
$deleted = db::getRecord("SELECT COUNT(*) as deleted FROM `data` WHERE status = '2' " . $condition);
$user = db::getRecord("SELECT COUNT(*) as user FROM `user`");
$current = basename($_SERVER['HTTP_REFERER']);
?>
<nav class="navbar" >
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.php"><?php echo $site_title;?></a>
        </div>
        <ul class="nav navbar-nav">
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Home <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="index.php"><i class="fa fa-circle-o"></i> Dashboard </a></li>
                    <li><a href="profile.php"><i class="fa fa-user"></i> Profile</a></li>
                    <li><a href="credentials.php"><i class="fa fa-lock"></i> Credentials</a></li>
                    <li><a href="users.php"><i class="fa fa-users"></i> Users</a></li>
                    <li><a href="ips.php"><i class="fa fa-globe"></i> IP</a></li>
                </ul>
            </li>
            <li class="<?php echo $current == "approved.php" ? "active" : ""; ?>">
                <a href="approved.php">
                    <i class="fa fa-check"></i> <span>Approved</span>
                    &nbsp;<span class="pull-right label label-success"><?php echo $approved['approved']; ?></span>
                </a>
            </li>
            <li class="<?php echo $current == "progress.php" ? "active" : ""; ?>">
                <a href="progress.php">
                    <i class="fa fa-bars "></i> <span>Progress</span>
                    &nbsp;<span class="pull-right label label-warning"><?php echo $progress['progress']; ?></span>
                </a>

            </li>
            <li class="<?php echo $current == "deleted.php" ? "active" : ""; ?>">
                <a href="deleted.php">
                    <i class="fa fa-trash-o "></i> <span>Deleted</span>
                    &nbsp;<span class="pull-right label label-danger"><?php echo $deleted['deleted']; ?></span>
                </a>
            </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['firstname']; ?></a>
            </li>
            <li><a href="actions.php?j=2"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
        </ul>
    </div>
</nav>