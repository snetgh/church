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
                            <li ><a href="dashboard.php" class="sf-house">Dashboard</a></li>
                            <li><a href="view_members.php" class="sf-post-it">View Members</a></li>
                            <li><a href="add_member.php" class=" sf-profile-group">Add Member</a></li>
                            <li><a href="manage_members.php" class="sf-cogs">Manage Members</a></li>
                            <li><a href="birthdays.php" class="sf-heart">Birthdays</a></li>
                            <li class="active"><a href="welfare.php" class="sf-money">Make Welfare Payment</a></li>
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
                    <div class="col-lg-12 col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">Make Payment </div>
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
                                            <th class="ignore_me">Image</th>
                                            <th>Full Name</th>
                                            <th>Sex</th>
                                            <th>Contact</th>
                                            <th>Location</th>
                                            <th>Shepherd</th>
                                            <th>Cell Group</th>
                                            <th class="ignore_me">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        $run_get_query = mysqli_query($connection,"SELECT * FROM members_table");
                                        while ($each_member = mysqli_fetch_array($run_get_query)) { ?>
                                           <tr>
                                        <td><?php echo $each_member["member_id"]; ?></td> 
                                        <td class="ignore_me"> <img src="assets/img/<?php echo $each_member["member_image"]; ?>" alt="profile-pic" height="50px" width="50px" style="border-radius: 50%;"></td> 
                                        <td><?php echo $each_member["member_name"]; ?></td> 
                                        <td><?php echo $each_member["member_sex"]; ?></td> 
                                        <td><?php echo $each_member["member_contact"]; ?></td> 
                                        <td><?php echo $each_member["member_location"]; ?></td> 
                                        <td><?php echo $each_member["member_shepherd"]; ?></td> 
                                        <td><?php echo $each_member["member_cell_group"]; ?></td> 
                                        <td class="ignore_me"><a href="make_payment.php?i=<?php echo $each_member['member_id'] ?>" class="btn btn-primary" title="Make Payment"><i class="fa fa-plus"></i></a></td> 






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
        filename:'sample.json',
        ignoreColumns:'.ignore_me'
            });
        });

        $("#btn_pdf").click(function(){
            $("#my_table").tableHTMLExport({
        // csv, txt, json, pdf
        type:'pdf',
        // file name
        filename:'sample.pdf',
        ignoreColumns:'.ignore_me'
            });
        });

        $("#btn_csv").click(function(){
            $("#my_table").tableHTMLExport({
        // csv, txt, json, pdf
        type:'csv',
        // file name
        filename:'sample.csv',
        ignoreColumns:'.ignore_me'
            });
        });

        $("#btn_txt").click(function(){
            $("#my_table").tableHTMLExport({
        // csv, txt, json, pdf
        type:'txt',
        // file name
        filename:'sample.txt',
        ignoreColumns:'.ignore_me'
            });
        });
       
    });
</script>
</html>
   