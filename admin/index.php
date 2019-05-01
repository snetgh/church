<?php

ob_start();

?>


<!DOCTYPE html>
<html>

<head>

  <meta charset="UTF-8">
 <title>Church Of Pentecost | Donkorkrom </title>
 <link rel="icon" type="image/png" sizes="16x16" href="../assets/img/logo.png">
 <link rel="stylesheet" href="../assets/css/styled.css" media="screen" type="text/css" />

</head>

<body>

  <html lang="en-US">
  <head>

    <meta charset="utf-8">

    <title>Login</title>

    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,700">

    <!--[if lt IE 9]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
 <![endif]-->

  </head>

  <body>

    <div class="container">

      <div id="login">

      <form  style='width: 310px;' method="post">
          <img src="../assets/img/church.png" class="img-responsive" height="250px" width="250px" alt="Church Logo" style="margin-bottom: -40px !important; margin-left: 20px !important; ">
          <h2 style="text-align: center;color: #f1e600">THE CHURCH OF PENTECOST <br> DONKORKROM  DISTRICT <br>ENGLISH ASSEMBLY </h2><h3 style="text-align: center;color: #0000ac"> ADMIN LOGIN PAGE</h3>
          <fieldset class="clearfix">

            <p><span class="fontawesome-user"></span><input type="text" placeholder="Enter Username" name="txt_username"></p> <!-- JS because of IE support; better: placeholder="Username" -->

            <p><span class="fontawesome-user"></span><input type="password" placeholder="Enter Password" name="txt_password"></p> <!-- JS because of IE support; better: placeholder="Password -->
           
            <p><input type="submit" value="Sign In" name='btn_get_user_info' id="btn_get_user_info"></p>

          </fieldset>

        </form>

      </div> <!-- end login -->

    </div>
    
    <?php

require_once '../db.php';

  if(isset($_POST['btn_get_user_info'])){
$get_person_username = mysqli_real_escape_string($connection,$_POST['txt_username']);
$get_person_password = mysqli_real_escape_string($connection,$_POST['txt_password']);

$check_user_query = mysqli_query($connection,"SELECT * FROM `cop_users_table` WHERE `cop_username` = '$get_person_username' AND `cop_password` = '$get_person_password' LIMIT 1");
if (mysqli_num_rows($check_user_query) >= 1) {
  $get_user_type = mysqli_fetch_array($check_user_query);
  $get_person_type = $get_user_type['cop_type'];
  $get_person_name = $get_user_type['cop_user_name'];
  $get_person_id = $get_user_type['users_table_id'];
  setcookie("my_name", $get_person_name, time() + (86400 * 30),"/");
  setcookie("a", $get_person_id, time() + (86400 * 30),"/");

  if ($get_person_type == 'admin') {
     echo "<script>window.location.href='../dashboard.php';</script>";
  }elseif ($get_person_type == 'welfare') {
    echo "<script>window.location.href='../welfare_manager_dashboard.php';</script>";
  }

}else{
  echo "<script>alert('Sorry Username And Password Not Found')</script>";
}

}

?>

  </body>



</html>
