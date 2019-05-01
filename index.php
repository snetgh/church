<?php


session_start();

require_once 'db.php';

  if(isset($_POST['btn_get_user_info'])){
$get_person_number = $_POST['txt_number'];

$check_user_query = mysqli_query($connection,"SELECT * FROM `members_table` WHERE `member_contact` = '$get_person_number' LIMIT 1");
if (mysqli_num_rows($check_user_query) >= 1) {
  $get_user_id = mysqli_fetch_array($check_user_query);
  $get_person_id = $get_user_id['member_id'];
 // setcookie("po", $get_person_id, time() + (86400 * 30),"/");
 $_SESSION['po'] = $get_person_id;
  echo '<script>window.location.href="user_view.php?ui='.$get_person_id.'";</script>';
}else{
    echo "<script>alert('Sorry Your Number Is Not In The System, Contact Your Presiding Elder ')</script>";
}

}

?>
<!DOCTYPE html>
<html>

<head>

  <meta charset="UTF-8">
 <title>Church Of Pentecost | Donkorkrom </title>
 <link rel="icon" type="image/png" sizes="16x16" href="assets/img/logo.png">
 <link rel="stylesheet" href="assets/css/styled.css" media="screen" type="text/css" />

</head>

<body>
    <!--[if lt IE 9]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
 <![endif]-->

  </head>

  <body>

    <div class="container">

      <div id="login">

        <form  style='width: 310px;' method="post">
          <img src="assets/img/church.png" class="img-responsive" height="250px" width="250px" alt="Church Logo" style="margin-bottom: -40px !important; margin-left: 20px !important; ">
          <h2 style="text-align: center;color: #f1e600">THE CHURCH OF PENTECOST <br> DONKORKROM  DISTRICT <br>ENGLISH ASSEMBLY </h2><h3 style="text-align: center;color: #0000ac">LOGIN PAGE</h3>
          <fieldset class="clearfix">

            <p><span class="fontawesome-user"></span><input type="text" placeholder="Enter Phone Number" name="txt_number"></p> <!-- JS because of IE support; better: placeholder="Username" -->
           
            <p><input type="submit" value="Sign In" name='btn_get_user_info' id="btn_get_user_info"></p>

          </fieldset>

        </form>

      </div> <!-- end login -->

    </div>

  </body>

</html>
