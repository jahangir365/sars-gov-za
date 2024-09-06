<!--header end-->
<header class="header fixed-top clearfix">
<!--logo start-->
<div class="brand">
    <a href="index.php" class="logo">
        <img style="height: 65px; width: 200px; margin-left:15px; border:0px;" src="<?php echo $site_root?>images/new1.png" alt=""> 
    </a>
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div>
</div>
<!--logo end-->
<div class="top-nav clearfix">
    <!--search & user info start-->
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="sales.php?mode=new"><button type="button" class="btn btn-primary  " >Add Sale</button></a>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="payment.php?mode=new"><button type="button" class="btn btn-primary  " >Pay Salary</button></a>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="muti_attendance.php?mode=attendence"><button type="button" class="btn btn-primary  " >Attendance</button></a>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="payment_reports.php?mode=view&id=1"><button type="button" class="btn btn-primary  " >Payment Report</button></a>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="owner_report.php"><button type="button" class="btn btn-primary  " >Payment Owner</button></a>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="db.php" ><button type="button" class="btn btn-primary" >Create BackUp</button></a>
    
    <ul class="nav pull-right top-menu">
        <!-- user login dropdown start-->
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <img alt="" src="<?php echo getImagePath($_SESSION["photo"]) ?>">
                <span class="username"><b> </b><?php echo $_SESSION['firstname']; ?></span>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
                <li><a href="user.php?id=<?php echo $_SESSION["loggedInUserId"]?>"><i class=" fa fa-suitcase"></i>Profile</a></li>
                <li><a href="actions.php?j=2"><i class="fa fa-key"></i> Log Out</a></li>
            </ul>
        </li>
    </ul>
    <!--search & user info end-->
</div>
</header>
