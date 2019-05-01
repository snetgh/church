<?php

require_once 'db.php';

 if(!isset($_COOKIE['a'])){
     echo '<script>window.location.href="admin/index.php';
}

if(isset($_GET['i']) && isset($_GET['s'])){
$user_id = $_GET['i'];
$user_status = $_GET['s'];

}else{
    header("Location:manage_members.php");
}


if(isset($_POST['btn_update'])){
if($_FILES['my_profile']['size'] != 0){
    $target_folder ="assets/img/".basename($_FILES['my_profile']['name']);
    $image_name = $_FILES['my_profile']['name'];

    $mem_f_name = $_POST["txt_full_name"];
    $mem_sex= $_POST["sel_sex"];
    $mem_contact = $_POST["txt_contact"];
    $mem_dob = $_POST["txt_dob"];
    $mem_location = $_POST["txt_location"];
    $mem_shepherd = $_POST["sel_shepherd"];
    $mem_homecell = $_POST["sel_home_group"];

     $get_image_query = mysqli_query($connection,"SELECT * FROM members_table WHERE member_id = '$user_id' LIMIT 1");
        $picture_name = mysqli_fetch_array($get_image_query);
         $selected_picture   = $picture_name["member_image"];
         $picture_path = "assets/img/".$selected_picture;
         unlink($picture_path);
            
    $run_update_query = mysqli_query($connection,"UPDATE `members_table` SET `member_name` = '$mem_f_name', `member_contact` = '$mem_contact', `member_dob` = '$mem_dob', `member_sex` = '$mem_sex', `member_location` = '$mem_location', `member_shepherd` = '$mem_shepherd', `member_cell_group` = '$mem_homecell', `member_image` = '$image_name' WHERE `members_table`.`member_id` = '$user_id'");

    if($run_update_query){
        echo "<script>alert('Success')</script>";
         move_uploaded_file($_FILES['my_profile']['tmp_name'], $target_folder);
        
    }else{
        echo "<script>alert('Failed')</script>";
    }
}else{
    
    $mem_f_name = $_POST["txt_full_name"];
    $mem_sex= $_POST["sel_sex"];
    $mem_contact = $_POST["txt_contact"];
    $mem_dob = $_POST["txt_dob"];
    $mem_location = $_POST["txt_location"];
    $mem_shepherd = $_POST["sel_shepherd"];
    $mem_homecell = $_POST["sel_home_group"];
 $run_update_query = mysqli_query($connection,"UPDATE `members_table` SET `member_name` = '$mem_f_name', `member_contact` = '$mem_contact', `member_dob` = '$mem_dob', `member_sex` = '$mem_sex', `member_location` = '$mem_location', `member_shepherd` = '$mem_shepherd', `member_cell_group` = '$mem_homecell' WHERE `members_table`.`member_id` = '$user_id'");
}
    
}

if(isset($_POST['btn_delete'])){

     $get_image_query = mysqli_query($connection,"SELECT * FROM members_table WHERE member_id = '$user_id' LIMIT 1");
        $picture_name = mysqli_fetch_array($get_image_query);
         $selected_picture   = $picture_name["member_image"];
         $picture_path = "images/".$selected_picture;
         unlink($picture_path);

    $run_delete_query = mysqli_query($connection,"DELETE FROM `members_table` WHERE `members_table`.`member_id` = '$user_id'");

    if($run_delete_query){
        header("Location:manage_members.php");
    }else{
        echo "<script>alert('Failed')</script>";
    }
}



 
$run_get_query = mysqli_query($connection,"SELECT * FROM members_table WHERE member_id = '$user_id' LIMIT 1");
$get_each = mysqli_fetch_array($run_get_query);

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
                            <li ><a href="dashboard.php" class="sf-house">Dashboard</a></li>
                            <li><a href="view_members.php" class="sf-post-it">View Members</a></li>
                            <li><a href="add_member.php" class=" sf-profile-group">Add Member</a></li>
                            <li class="active"><a href="manage_members.php" class="sf-cogs">Manage Members</a></li>
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
                    <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3">
                        <div class="panel panel-default">
                            <div class="panel-heading">Manage Member</div>
                            <div class="panel-body">
                              <?php   switch ($user_status) {
                        case 'u':  ?>
                        <form class="form-horizontal form-material" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                    <div class="col-md-12" style="text-align: right">
                                        <img src="assets/img/<?php  echo $member_image;  ?>" alt="profile picture" style="width: 150px;height: 150px">
                                </div>
                                <br>
                                <div class="form-group">
                                    <label class="col-md-12">Full Name</label>
                                    <div class="col-md-12">
                                        <input type="text" placeholder="Enter Full Name" class="form-control form-control-line" name="txt_full_name" value="<?php  echo $member_name;  ?>"> </div>
                                </div>
                                <div class="form-group">
                                    <label for="example-email" class="col-md-12">Sex</label>
                                    <div class="col-md-12">
                                       <select class="form-control form-control-line" name="sel_sex">
                                          <option value="Male"<?php   if($member_sex == "Male"){echo "selected";}else{echo "";}   ?> >Male</option>
                                          <option value="Female" <?php   if($member_sex == "Female"){echo "selected";}else{echo "";} ?> >Female</option>
                                       </select>

                                        </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Contact</label>
                                    <div class="col-md-12">
                                        <input type="number" minlength="10" maxlength="12" class="form-control form-control-line" placeholder="Enter Contact" required="required" name="txt_contact" value="<?php  echo $member_contact;  ?>"> </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Date Of Birth</label>
                                    <div class="col-md-12">
                                        <input type="date" placeholder="Choose date of birth" class="form-control form-control-line" name="txt_dob" value="<?php  echo $member_dob;  ?>"> </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Location</label>
                                    <div class="col-md-12">
                                       <input type="text" placeholder="Choose Location" class="form-control form-control-line" required="required" name="txt_location" value="<?php  echo $member_location;  ?>"> </div>
                                    </div>
                               
                                <div class="form-group">
                                    <label class="col-sm-12">Shepherd</label>
                                    <div class="col-sm-12">
                                        <select class="form-control form-control-line" name="sel_shepherd">
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
                                        <select class="form-control form-control-line" name="sel_home_group">
                                        <option value="Zoe Home Cell" <?php   if($member_cell == "Zoe Home Cell"){echo "selected";}else{echo "";}   ?>>Zoe Home Cell(Hospital)</option>
                                       <option value="Holy Ghost Cell" <?php   if($member_cell == "Holy Ghost Cell"){echo "selected";}else{echo "";}   ?>>Holy Ghost Cell(Filling Station)</option>
                                        <option value="Light & Salt" <?php   if($member_cell == "Light & Salt"){echo "selected";}else{echo "";}   ?>>Light & Salt(Atakora)</option>
                                        <option value="Perez Home Cell" <?php   if($member_cell == "Perez Home Cell"){echo "selected";}else{echo "";}   ?>>Perez Home Cell(Abeka Area)</option>
                                        <option value="Peace Home Cell" <?php   if($member_cell == "Peace Home Cell"){echo "selected";}else{echo "";}   ?>>Peace Home Cell(Room Ten)</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-12">Upload Picture</label>
                                    <div class="col-sm-12">
                                       <input type="file" class="form-control form-control-line" name="my_profile"> 
                                    </div>
                                </div>

                                <div class="form-group" style="text-align: center">
                                    <div class="col-sm-12">
                                        <button class="btn btn-success" type="submit" name="btn_update">Update Member</button>
                                        <a href="manage_members.php" class="btn btn-primary">Cancel Update</a>
                                    </div>
                                </div>
                            </form>

                            <?php   break;
                        case 'd':  ?>


                                <form class="form-horizontal form-material" method="post">
                                    <div class="form-group">
                                    <div class="col-md-12" style="text-align: right">
                                        <img src="assets/img/<?php  echo $member_image;  ?>" alt="profile picture" style="width: 150px;height: 150px">
                                </div>
                                <br>
                                <div class="form-group">
                                    <label class="col-md-12">Full Name</label>
                                    <div class="col-md-12">
                                        <input type="text" placeholder="Enter Full Name" class="form-control form-control-line" name="txt_full_name" value="<?php  echo $member_name;  ?>"> </div>
                                </div>
                                <div class="form-group">
                                    <label for="example-email" class="col-md-12">Sex</label>
                                    <div class="col-md-12">
                                       <select class="form-control form-control-line" name="sel_sex">
                                          <option value="Male">Male</option>
                                          <option value="Female">Female</option>
                                       </select>

                                        </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Contact</label>
                                    <div class="col-md-12">
                                        <input type="number" minlength="10" maxlength="12" class="form-control form-control-line" placeholder="Enter Contact" required="required" name="txt_contact" value="<?php  echo $member_contact;  ?>"> </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Date Of Birth</label>
                                    <div class="col-md-12">
                                        <input type="date" placeholder="Choose date of birth" class="form-control form-control-line" name="txt_dob" value="<?php  echo $member_dob;  ?>"> </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Location</label>
                                    <div class="col-md-12">
                                       <input type="text" placeholder="Choose Location" class="form-control form-control-line" required="required" name="txt_location" value="<?php  echo $member_location;  ?>"> </div>
                                    </div>
                               
                                <div class="form-group">
                                    <label class="col-sm-12">Shepherd</label>
                                    <div class="col-sm-12">
                                        <select class="form-control form-control-line" name="sel_shepherd">
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
                                        <select class="form-control form-control-line" name="sel_home_group">
                      					<option value="Zoe Home Cell" <?php   if($member_cell == "Zoe Home Cell"){echo "selected";}else{echo "";}   ?>>Zoe Home Cell(Hospital)</option>
                                       <option value="Holy Ghost Cell" <?php   if($member_cell == "Holy Ghost Cell"){echo "selected";}else{echo "";}   ?>>Holy Ghost Cell(Filling Station)</option>
                                        <option value="Light & Salt" <?php   if($member_cell == "Light & Salt"){echo "selected";}else{echo "";}   ?>>Light & Salt(Atakora)</option>
                                        <option value="Perez Home Cell" <?php   if($member_cell == "Perez Home Cell"){echo "selected";}else{echo "";}   ?>>Perez Home Cell(Abeka Area)</option>
                                        <option value="Peace Home Cell" <?php   if($member_cell == "Peace Home Cell"){echo "selected";}else{echo "";}   ?>>Peace Home Cell(Room Ten)</option>
                                        </select>
                                    </div>
                                </div>


                                <div class="form-group" style="text-align: center">
                                    <div class="col-sm-12">
                                        <button class="btn btn-danger" type="submit" name="btn_delete">Delete Member</button>
                                        <a href="manage_members.php" class="btn btn-success">Cancel Delete</a>
                                    </div>
                                </div>
                            </form>

                            <?php   break;
                        
                        default:
                            # code...
                            break;
                    }?>

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