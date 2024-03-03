<?php
if (!isset($_SESSION)) {
  session_start();
}
if (!$_SESSION["role"] == "admin") {
  echo "<script>location.href = './admin_login.php'</script>";
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
      <img src="NSS Logo.png" style="max-height: 50px;" alt="" class="img-fluid">
      National Service Scheme
    </a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      Menu
      <i class="fa fa-bars"></i>
    </button>
    <div class="collapse navbar-collapse " id="navbarResponsive">
      <ul class="navbar-nav text-uppercase ml-auto">
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger text-light" href="add_officer.html">Add officer</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger text-light" href="remove_officer.php">Remove officer</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger text-light" href="login_detailes.php">Login details</a>
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