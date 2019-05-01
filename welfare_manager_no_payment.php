<?php
  require_once 'db.php';

   if(!isset($_COOKIE['a'])){
     echo '<script>window.location.href="admin/index.php';
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
        <link rel="stylesheet" type="text/css" href="assets/css/jquery.dataTables.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/dataTables.bootstrap.css">
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
                            <li class="active"><a href="welfare_manager_no_payment.php" class="sf-file-pdf">Report Welfare Non-Paid</a></li>
                            <li><a href="welfare_manager_pass.php" class="sf-sign-sync">Change Password</a></li>
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
                            <div class="panel-heading">Welfare - Non Paid Members</div>
                            <div class="panel-body">
                               <form class="form-horizontal form-material" method="post">
                                <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="example-email" class="col-md-12">From</label>
                                    <div class="col-md-12">
                                       <select class="form-control" name="sel_month_form" id="sel_month_form">
                                          <option value="1">January</option>
                                          <option value="2">February</option>
                                          <option value="3">March</option>
                                          <option value="4">April</option>
                                          <option value="5">May</option>
                                          <option value="6">June</option>
                                          <option value="7">July</option>
                                          <option value="8">August</option>
                                          <option value="9">September</option>
                                          <option value="10">October</option>
                                          <option value="11">November</option>
                                          <option value="12">December</option>
                                       </select>

                                        </div>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="example-email" class="col-md-12">To</label>
                                    <div class="col-md-12">
                                       <select class="form-control" name="sel_month_to" id="sel_month_to">
                                          <option value="1">January</option>
                                          <option value="2">February</option>
                                          <option value="3">March</option>
                                          <option value="4">April</option>
                                          <option value="5">May</option>
                                          <option value="6">June</option>
                                          <option value="7">July</option>
                                          <option value="8">August</option>
                                          <option value="9">September</option>
                                          <option value="10">October</option>
                                          <option value="11">November</option>
                                          <option value="12">December</option>
                                       </select>

                                        </div>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="example-email" class="col-md-12">Year</label>
                                    <div class="col-md-12">
                                       <input type="text" class="form-control form-control-line" name="txt_year" id="txt_year" placeholder="Enter Year" required="required">
                                        </div>
                                </div>
                                </div>
                                <div class="form-group" style="text-align: center">
                                    <div class="col-sm-12">
                                        <button class="btn btn-success" type="submit" name="btn_submit">Generate List</button>
                                    </div>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>


                 <?php

                if(isset($_POST['btn_submit'])){
                    $get_from = $_POST['sel_month_form'];
                    $get_to = $_POST['sel_month_to'];
                    $get_year = $_POST['txt_year']; 

                     ?>

                     <div class="row cm-fix-height">
                    <div class="col-lg-12  col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">Report On Payment From: &nbsp; <?php  switch ($get_from) {
        case '1':
            echo "January";
            break;

        case '2':
            echo "February";
            break;

        case '3':
            echo "March";
            break;

        case '4':
            echo "April";
            break;

        case '5':
            echo "May";
            break;

        case '6':
            echo "June";
            break;

        case '7':
            echo "July";
            break;

        case '8':
            echo "August";
            break;

         case '9':
            echo "September";
            break;

        case '10':
            echo "October";
            break;

        case '11':
            echo "November";
            break;

        case '12':
            echo "December";
            break;
        
        default:
            echo "";
            break;

    }  ?> &nbsp;To &nbsp;<?php   switch ($get_to) {
        case '1':
            echo "January";
            break;

        case '2':
            echo "February";
            break;

        case '3':
            echo "March";
            break;

        case '4':
            echo "April";
            break;

        case '5':
            echo "May";
            break;

        case '6':
            echo "June";
            break;

        case '7':
            echo "July";
            break;

        case '8':
            echo "August";
            break;

         case '9':
            echo "September";
            break;

        case '10':
            echo "October";
            break;

        case '11':
            echo "November";
            break;

        case '12':
            echo "December";
            break;
        
        default:
            echo "";
            break;

    }  ?> <?php echo $get_year ?></div>
                            <div class="panel-body">
                               <div class="table-responsive">
                                <button class="btn btn-primary" id="btn_json">JSON</button>
                                <button class="btn btn-primary" id="btn_pdf">PDF</button>
                                <button class="btn btn-primary" id="btn_csv">CSV</button>
                                <button class="btn btn-primary" id="btn_txt">TXT</button>
                                <br><br>
                                <table class="table" id="my_table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Member Name</th>
                                            
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        $run_get_query = mysqli_query($connection,"SELECT * FROM members_table WHERE not exists (SELECT * FROM welfare_accounts WHERE `members_table`.`member_id` = `welfare_accounts`.`welfare_user_id` AND `welfare_accounts`.`welfare_month` BETWEEN $get_from AND $get_to AND `welfare_year` = '$get_year')");
                                        while ($each_member = mysqli_fetch_array($run_get_query)) { ?>
                                           <tr>
                                       
                                        <td><?php echo $each_member["member_id"]; ?></td> 
                                        <td><?php echo $each_member["member_name"]; ?></td> 
                                       
                                           </tr>
                                       <?php }

                                        ?>
                                    </tbody>
                                </table>
                            </div>
                               
                            </div>
                        </div>
                    </div>
                </div>

                <?php }

                ?>


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
        <script src="assets/js/jquery.dataTables.min.js"></script>
        <script src="assets/js/dataTables.bootstrap.min.js"></script>
        <script src="assets/js/tableHTMLExport.js"></script>
        <script src="assets/js/jsPDF_2.js"></script>
        <script src="assets/js/jsPDF.js"></script>

</body>

<script type="text/javascript">
    $(document).ready(function(){
        $("#my_table").dataTable();
        $("#btn_json").click(function(){
            $("#my_table").tableHTMLExport({
        // csv, txt, json, pdf
        type:'json',
        // file name
        filename:'sample.json'
            });
        });

        $("#btn_pdf").click(function(){
            $("#my_table").tableHTMLExport({
        // csv, txt, json, pdf
        type:'pdf',
        // file name
        filename:'sample.pdf'
            });
        });

        $("#btn_csv").click(function(){
            $("#my_table").tableHTMLExport({
        // csv, txt, json, pdf
        type:'csv',
        // file name
        filename:'sample.csv'
            });
        });

        $("#btn_txt").click(function(){
            $("#my_table").tableHTMLExport({
        // csv, txt, json, pdf
        type:'txt',
        // file name
        filename:'sample.txt'
            });
        });
       
    });
</script>
</html>