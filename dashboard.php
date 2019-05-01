<?php

    require_once 'db.php';

     if(!isset($_COOKIE['a'])){
     echo '<script>window.location.href="admin/index.php';
}

    $first_day_this_week = date("Y-m-d",strtotime("monday this week"));
    $last_day_this_week = date("Y-m-d",strtotime("sunday this week"));

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-clearmin.min.css">
        <link rel="icon" type="image/png" sizes="16x16" href="assets/img/logo.png">
        <link rel="stylesheet" type="text/css" href="assets/css/roboto.css">
        <link rel="stylesheet" type="text/css" href="assets/css/material-design.css">
        <link rel="stylesheet" type="text/css" href="assets/css/small-n-flat.css">
        <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/demo.css" />
		<link rel="stylesheet" type="text/css" href="assets/css/calendar.css" />
		<link rel="stylesheet" type="text/css" href="assets/css/custom_1.css" />

        <title>Church Of Pentecost | Donkorkrom</title>
    </head>
    <body class="cm-no-transition cm-1-navbar">
        <div id="cm-menu">
            <nav class="cm-navbar cm-navbar-primary">
                <div class="cm-flex"><img src="assets/img/head.png" style="height: 50px;width: 191px;"></div>
                <div class="btn btn-primary md-menu-white" data-toggle="cm-menu"></div>
            </nav>
            <div id="cm-menu-content">
                <div id="cm-menu-items-wrapper">
                    <div id="cm-menu-scroller">
                        <ul class="cm-menu-items">
                            <li class="active" ><a href="dashboard.php" class="sf-house">Dashboard</a></li>
                            <li><a href="view_members.php" class="sf-post-it">View Members</a></li>
                            <li><a href="add_member.php" class="sf-profile-group">Add Member</a></li>
                            <li><a href="manage_members.php" class="sf-cogs">Manage Members</a></li>
                            <li ><a href="birthdays.php" class="sf-heart">Birthdays</a></li>
                            <li><a href="welfare.php" class="sf-money">Make Welfare Payment</a></li>
                            <li><a href="welfare_report_payment.php" class="sf-file-word">Report Welfare Paid</a></li>
                            <li><a href="welfare_report_no_payment.php" class="sf-file-pdf">Report Welfare Non-Paid</a></li>
                            <li><a href="change_password.php" class="sf-sign-sync">Change Password</a></li>
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
                   <div class="custom-calendar-wrap custom-calendar-full">
				<div class="custom-header clearfix">
					<h3 class="custom-month-year">
						<span id="custom-month" class="custom-month"></span>
						<span id="custom-year" class="custom-year"></span>
						<nav>
							<span id="custom-prev" class="custom-prev"></span>
							<span id="custom-next" class="custom-next"></span>
							<span id="custom-current" class="custom-current" title="Go to current date"></span>
						</nav>
					</h3>
				</div>
				<div id="calendar" class="fc-calendar-container"></div>
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
        <script src="assets/js/calendario.min.js" type="text/javascript" ></script>
		<script src="assets/js/data.js" type="text/javascript" ></script>
		<script type="text/javascript">	
			$(function() {				
				function updateMonthYear() {
					$( '#custom-month' ).html( $( '#calendar' ).calendario('getMonthName') );
					$( '#custom-year' ).html( $( '#calendar' ).calendario('getYear'));
				}
				
				$(document).on('finish.calendar.calendario', function(e){
                    $( '#custom-month' ).html( $( '#calendar' ).calendario('getMonthName') );
					$( '#custom-year' ).html( $( '#calendar' ).calendario('getYear'));
					$( '#custom-next' ).on( 'click', function() {
						$( '#calendar' ).calendario('gotoNextMonth', updateMonthYear);
					} );
					$( '#custom-prev' ).on( 'click', function() {
						$( '#calendar' ).calendario('gotoPreviousMonth', updateMonthYear);
					} );
					$( '#custom-current' ).on( 'click', function() {
						$( '#calendar' ).calendario('gotoNow', updateMonthYear);
					} );
                });
				
				$( '#calendar' ).calendario({
					checkUpdate : false,
					caldata : events,
					fillEmpty : false
				});
			});
		</script>
	</body>
</html>
