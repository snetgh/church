<?php
session_start();
require_once 'db.php';

 if(!isset($_SESSION['po'])){
     echo '<script>window.location.href="index.php';
}

if(isset($_GET['ui'])){
$set_user_id = $_GET['ui'];
$stored_id = $_SESSION['po'];

if($set_user_id == $stored_id){
    $set_user_id = $stored_id;
}else{
   header("Location:index.php"); 
}
}else{
    header("Location:index.php");
}

$get_person_details = mysqli_query($connection,"SELECT * FROM `members_table` WHERE `member_id` = '$set_user_id' LIMIT 1");

$get_each = mysqli_fetch_array($get_person_details);

     $member_id   = $get_each["member_id"];
     $member_image   = $get_each["member_image"];
     $member_name   = $get_each["member_name"];
     $member_sex   = $get_each["member_sex"];
     $member_contact   = $get_each["member_contact"];
     $member_location   = $get_each["member_location"];
     $member_shepherd   = $get_each["member_shepherd"];
     $member_cell   = $get_each["member_cell_group"];
     $member_dob = $get_each["member_dob"];

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
                            <li><a href="index.php" class="sf-lock">Logout</a></li>
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
                
                </div>
               
                <div class="dropdown pull-right">
                    <button class="btn btn-primary md-account-circle-white" data-toggle="dropdown"></button>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="index.php"><i class="fa fa-fw fa-sign-out"></i> Sign out</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div id="global">
            
                <div class="container-fluid">
                   <div class="row cm-fix-height">
                    <div class="col-lg-6 col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">My Profile</div>
                            <div class="panel-body">
                             
                        <form class="form-horizontal form-material" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                    <div class="col-md-12" style="text-align: right">
                                        <img src="assets/img/<?php  echo $member_image;  ?>" alt="profile picture" style="width: 150px;height: 150px">
                                </div>
                                <br>
                                <div class="form-group">
                                    <label class="col-md-12">Full Name</label>
                                    <div class="col-md-12">
                                        <input type="text" placeholder="Enter Full Name" class="form-control form-control-line" name="txt_full_name" value="<?php  echo $member_name;  ?>" disabled='disabled'> </div>
                                </div>
                                <div class="form-group">
                                    <label for="example-email" class="col-md-12">Sex</label>
                                    <div class="col-md-12">
                                       <select class="form-control form-control-line" name="sel_sex" disabled='disabled'>
                                          <option value="Male"<?php   if($member_sex == "Male"){echo "selected";}else{echo "";}   ?> >Male</option>
                                          <option value="Female" <?php   if($member_sex == "Female"){echo "selected";}else{echo "";} ?> >Female</option>
                                       </select>

                                        </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Contact</label>
                                    <div class="col-md-12">
                                        <input type="number" minlength="10" maxlength="12" class="form-control form-control-line" placeholder="Enter Contact" required="required" name="txt_contact" value="<?php  echo $member_contact;  ?>" disabled='disabled'> </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Date Of Birth</label>
                                    <div class="col-md-12">
                                        <input type="date" placeholder="Choose date of birth" class="form-control form-control-line" name="txt_dob" value="<?php  echo $member_dob;  ?>" disabled='disabled'> </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Location</label>
                                    <div class="col-md-12">
                                       <input type="text" placeholder="Choose Location" class="form-control form-control-line" required="required" name="txt_location" value="<?php  echo $member_location;  ?>" disabled='disabled'> </div>
                                    </div>
                               
                                <div class="form-group">
                                    <label class="col-sm-12">Shepherd</label>
                                    <div class="col-sm-12">
                                        <select class="form-control form-control-line" name="sel_shepherd" disabled='disabled'>
                   <option value="Elder Princeworth Abankwa" <?php   if($member_shepherd == "Elder Princeworth Abankwa"){echo "selected";}else{echo "";}   ?>>Elder Princeworth Abankwa</option>
                   <option value="Elder Apenyo Richard" <?php   if($member_shepherd == "Elder Apenyo Richard"){echo "selected";}else{echo "";}   ?>>Elder Apenyo Richard</option>
                   <option value="Den. Blessed Koduah" <?php   if($member_shepherd == "Den. Blessed Koduah"){echo "selected";}else{echo "";}   ?>>Den. Blessed Koduah</option>
                   <option value="Sis. Comfirt Adike" <?php   if($member_shepherd == "Sis. Comfirt Adike"){echo "selected";}else{echo "";}   ?>>Sis. Comfirt Adike</option>
                   <option value="Sis. Opare Esi Deborah" <?php   if($member_shepherd == "Sis. Opare Esi Deborah"){echo "selected";}else{echo "";}   ?>>Sis. Opare Esi Deborah</option>
                   <option value="Sis. Florence Agyei" <?php   if($member_shepherd == "Sis. Florence Agyei"){echo "selected";}else{echo "";}   ?>>Sis. Florence Agyei</option>
                   <option value="Bro. Francis Tsumasi Kyere" <?php   if($member_shepherd == "Bro. Francis Tsumasi Kyere"){echo "selected";}else{echo "";}   ?>>Bro. Francis Tsumasi Kyere</option>
                   <option value="Bro. Bismark Graham" <?php   if($member_shepherd == "Bro. Bismark Graham"){echo "selected";}else{echo "";}   ?>>Bro. Bismark Graham</option>
                   <option value="Dens. Selasi Awutey" <?php   if($member_shepherd == "Dens. Selasi Awutey"){echo "selected";}else{echo "";}   ?>>Dens. Selasi Awutey</option>
                                            
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-12">Home Cell Group</label>
                                    <div class="col-sm-12">
                                        <select class="form-control form-control-line" name="sel_home_group" disabled='disabled'>
                                       <option value="Zoe Home Cell" <?php   if($member_cell == "Zoe Home Cell"){echo "selected";}else{echo "";}   ?>>Zoe Home Cell(Hospital)</option>
                                       <option value="Holy Ghost Cell" <?php   if($member_cell == "Holy Ghost Cell"){echo "selected";}else{echo "";}   ?>>Holy Ghost Cell(Filling Station)</option>
                                       <option value="Light & Salt" <?php   if($member_cell == "Light & Salt"){echo "selected";}else{echo "";}   ?>>Light & Salt(Atakora)</option>
                                       <option value="Perez Home Cell" <?php   if($member_cell == "Perez Home Cell"){echo "selected";}else{echo "";}   ?>>Perez Home Cell(Abeka Area)</option>
                                       <option value="Peace Home Cell" <?php   if($member_cell == "Peace Home Cell"){echo "selected";}else{echo "";}   ?>>Peace Home Cell(Room Ten)</option>
                                        </select>
                                    </div>
                                </div>

                            </form>
      </div>
                </div>
                </div>
                </div>

                <div class="col-lg-6 col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">Payment History </div>
                            <div class="table-responsive">
                               
                                <table class="table" id="my_table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Month Paid</th>
                                            <th>Year Paid</th>
                                            <th>Amount Paid</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        $run_get_query = mysqli_query($connection,"SELECT * FROM welfare_accounts WHERE `welfare_user_id` = '$set_user_id'");
                                        while ($each_member = mysqli_fetch_array($run_get_query)) { ?>
                                           <tr>
                                       
                                        <td><?php echo $each_member["welfare_id"]; ?></td> 
                                        <td><?php 
        switch ($each_member["welfare_month"]) {
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

    }
                                         ?></td> 
                                        <td><?php echo $each_member["welfare_year"]; ?></td> 
                                        <td><?php echo $each_member["welfare_amount_paid"]; ?></td> 
                                        
                                           </tr>
                                       <?php }

                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>



            </div>
            
            <div class="row cm-fix-height">
                    
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