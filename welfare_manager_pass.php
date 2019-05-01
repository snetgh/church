<?php

require_once 'db.php';

if(isset($_COOKIE['a'])){
$get_user_id = $_COOKIE['a'];

}else{

    header("Location:admin/index.php");
}


if(isset($_POST['btn_submit'])){
    $get_old_password = mysqli_real_escape_string($connection,$_POST['txt_old_pass']);
    $get_new_password = mysqli_real_escape_string($connection,$_POST['txt_password']);
    $get_match_password = mysqli_real_escape_string($connection,$_POST['txt_password_match']);

    if($get_old_password != ""  && $get_new_password != "" && $get_match_password != ""){

    if($get_new_password == $get_match_password){
        $get_user_password = mysqli_query($connection,"SELECT * FROM `cop_users_table` WHERE `users_table_id` = '$get_user_id'");
        $user_password = mysqli_fetch_array($get_user_password);
        if($get_old_password == $user_password['cop_password']){
            $update_pass = mysqli_query($connection,"UPDATE `cop_users_table` SET `cop_password` = '$get_new_password' WHERE `cop_users_table`.`users_table_id` = '$get_user_id'");

            if($update_pass){ echo "<script>alert('Password Changed Successfully')</script>"; }
        }else{ echo "<script>alert('Failed To Change Password')</script>"; }
    }else{
        echo "<script>alert('Passwords Do Not Match')</script>";
    }
}else{
    echo "<script>alert('Please Fill All Required Spaces')</script>";
}
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
        <link rel="icon" type="image/png" sizes="16x16" href="assets/img/logo.png">
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-clearmin.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/roboto.css">
        <link rel="stylesheet" type="text/css" href="assets/css/material-design.css">
        <link rel="stylesheet" type="text/css" href="assets/css/small-n-flat.css">
        <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
        <title>Church Of Pentecost | Donkorkrom</title>
    </head>
    <body class="cm-no-transition cm-1-navbar">
        <div id="cm-menu">
            <nav class="cm-navbar cm-navbar-primary">
                <div class="cm-flex"><img src="assets/img/head.png" style="height: 50px;width: 191px;">
                <div class="btn btn-primary md-menu-white" data-toggle="cm-menu"></div>
            </nav>
            <div id="cm-menu-content">
                <div id="cm-menu-items-wrapper">
                    <div id="cm-menu-scroller">
                        <ul class="cm-menu-items">
                            <li ><a href="welfare_manager_dashboard.php" class="sf-house">Dashboard</a></li> 
                            <li><a href="welfare_manager.php" class="sf-money">Make Welfare Payment</a></li>
                            <li ><a href="welfare_manager_report_payment.php" class="sf-file-word">Report Welfare Paid</a></li>
                            <li ><a href="welfare_manager_no_payment.php" class="sf-file-pdf">Report Welfare Non-Paid</a></li>
                            <li class="active"><a href="welfare_manager_pass.php" class="sf-sign-sync">Change Password</a></li>
                            <li><a href="admin/index.php" class="sf-lock">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <header id="cm-header">
            <nav class="cm-navbar cm-navbar-primary">
                <div class="btn btn-primary md-menu-white hidden-md hidden-lg" data-toggle="cm-menu"></div>
                <div class="cm-flex">
                    <h1>Home</h1> 
                    <form id="cm-search" action="index.html" method="get">
                        <input type="search" name="q" autocomplete="off" placeholder="Search...">
                    </form>
                </div>
                <div class="pull-right">
                    <div id="cm-search-btn" class="btn btn-primary md-search-white" data-toggle="cm-search"></div>
                </div>
                <div class="dropdown pull-right">
                    <button class="btn btn-primary md-account-circle-white" data-toggle="dropdown"></button>
                    <ul class="dropdown-menu">
                        <li class="disabled text-center">
                            <a style="cursor:default;"><strong><?php echo $_COOKIE['my_name'];  ?></strong></a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="change_password.php"><i class="fa fa-fw fa-refresh "></i> Change Password</a>
                        </li>
                   
                        <li>
                            <a href="admin/index.php"><i class="fa fa-fw fa-sign-out"></i> Sign out</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div id="global">
            
                <div class="container-fluid">
                    <div class="row cm-fix-height">
                    <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3">
                        <div class="panel panel-default">
                            <div class="panel-heading">Change Password</div>
                            <div class="panel-body">
                                <form class="form-horizontal form-material" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label class="col-md-12">Enter Old Password</label>
                                    <div class="col-md-12">
                                        <input type="password" placeholder="Enter Old Password" class="form-control" name="txt_old_pass"> </div>
                                </div>
                    
                                <div class="form-group">
                                    <label class="col-md-12">Enter New Password</label>
                                    <div class="col-md-12">
                                       <input type="password" placeholder="Enter New Password" class="form-control form-control-line" required="required" name="txt_password"> </div>
                                    </div>

                                <div class="form-group">
                                    <label class="col-md-12">Repeat New Password</label>
                                    <div class="col-md-12">
                                       <input type="password" placeholder="Re-Enter New Password " class="form-control form-control-line" required="required" name="txt_password_match"> </div>
                                    </div>

                                <div class="form-group" style="text-align: center">
                                    <div class="col-sm-12">
                                        <button class="btn btn-success" type="submit" name="btn_submit">Change Password</button>
                                    </div>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
             
            <footer class="cm-footer" style="text-align: center"><span ><?php  echo  date("Y")  ?> &copy; Developed By Step Network - <strong>024-590-8362</strong> </span></footer>
        </div>
        <script src="assets/js/lib/jquery-2.1.3.min.js"></script>
        <script src="assets/js/jquery.mousewheel.min.js"></script>
        <script src="assets/js/jquery.cookie.min.js"></script>
        <script src="assets/js/fastclick.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/clearmin.min.js"></script>
        <script src="assets/js/demo/home.js"></script>
    </body>
</html>