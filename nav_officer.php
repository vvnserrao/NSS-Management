<?php
if (!isset($_SESSION)) {
  session_start();
}

if (!$_SESSION["role"] == "officer") {
  echo "<script>location.href = './officer_login.php'</script>";
  exit;
}
?>

<head>
  <link rel='stylesheet' href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="./zip/css/owl.carousel.min.css">
  <link rel="stylesheet" href="./zip/css/animate.min.css">
  <link rel="stylesheet" href="./zip/css/app.css">
  <script src="./zip/js/jquery.min.js"></script>
</head>
<nav class="navbar navbar-expand-lg navbar-dark fixed-top navbar bg-dark" id="mainNav">
  <div class="container-fluid">
    <a class="navbar-brand js-scroll-trigger" href="index.html" style="font-size: 18px; font-weight: bold;">
      <img src="NSS Logo.png" style="max-height: 50px; margin-left: -10px;" alt="" class="img-fluid">
      National Service Scheme
    </a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      Menu
      <i class="fa fa-bars"></i>
    </button>
    <div class="collapse navbar-collapse " id="navbarResponsive">
      <ul class="navbar-nav text-uppercase ml-auto">

        <li class="nav-item">
          <a class="nav-link js-scroll-trigger text-light" href="search_profile.php">Volunteer Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger text-light" href="assign.php">Manage Task</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger text-light" href="promotion.php">Promotion</a>
        </li>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger text-light" href="add_volunteer.html">Add Volunteer</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger text-light" href="report.php">Activity Report</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger text-light" href="upload_photo.php">Upload photos </a>
        </li>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle js-scroll-trigger text-light" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Volunteer List
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="class_list.php">Class List</a>
            <a class="dropdown-item" href="team_list.php">Team List</a>
            <a class="dropdown-item" href="participant_list.php">Participant List</a>
            <a class="dropdown-item" href="volunteer_list.php">Volunteer List</a>
            <a class="dropdown-item" href="attendance_report.php">Attendance Report</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle js-scroll-trigger text-light" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Update
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <!-- <a class="dropdown-item" href="team_update.php">Team No</a> -->
            <a class="dropdown-item" href="profile_update.php">Profile</a>
            <!-- <a class="dropdown-item" href="type_change.php">Type</a> -->
            <a class="dropdown-item" href="attendance.php">Attendance</a>
            <a class="dropdown-item" href="special_achievement.php">Special Achievement</a>
            <a class="dropdown-item" href="change_password.php">Change passoword</a>
            <a class="dropdown-item" href="login_detailes.php">Login Detailes</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" style="color:red" href="logout.php">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<script src="./zip/js/popper.min.js"></script>
<script src="./zip/js/bootstrap.min.js"></script>
<script src="./zip/js/jquery.easing.min.js"></script>
<script src="./zip/js/owl.carousel.min.js"></script>
<script src="./zip/js/wow.min.js"></script>
<script src="./zip/js/app.js"></script>