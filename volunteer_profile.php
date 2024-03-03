<?php
session_start();
if ($_SESSION["role"] == "secretary") {
  include("nav_secretary.php");
} elseif ($_SESSION["role"] == "officer") {
  include("nav_officer.php");
} else {
  include("nav_volunteer.php");
}
if (isset($_SESSION['username'])) {
  $rollno = $_SESSION['username'];
  if (isset($_POST['rollno'])) {
    $rollno = $_POST['rollno'];
  }
}
?>
<style>
  body {
    font-family: Arial, Helvetica, sans-serif;
    color: #384047;
  }

  form {
    max-width: 630px;

    margin: auto;
    padding: 40px 10px;
    background: #f4f7f8;
    border-radius: 15px;

  }

  .img-container {
    text-align: center;
    margin-bottom: 30px;
  }

  .pic {
    width: 100px;
    height: auto;
    border: 3px solid #101010;
    border-radius: 5px;
  }

  .container {
    display: grid;
    grid-template-columns: 1fr 1fr;
    grid-template-rows: 1fr 1fr 1fr 1fr;
    gap: 10px 1px;
    grid-auto-flow: row;
    grid-template-areas:
      ". ."
      ". .";
    font-size: larger;
    width: 450px;
    margin-left: auto;
    margin-right: auto;
    margin-top: 35px
  }
</style>
</head>

<body>

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Form</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/main.css">
  </head>
  <?php
  include("connection.php");
  $sql = "SELECT * FROM volunteer_profile where rollno='$rollno'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    echo "<form action='' method='POST' style='margin-top:70px'>";
    echo "<h1 style='text-align: center;'>VOLUNTEER PROFILE</h1>";
    while ($row = $result->fetch_assoc()) {
      echo "<center><img src=" . $row["img"] . " class=pic /></center>";
      echo "<div class=container>";
      echo "<strong>Name:</strong>";
      echo  $row["volunteer_name"];
      echo "<strong>Father Name:</strong>";
      echo  $row["fname"];
      echo "<strong>Roll No:</strong>";
      echo  $row["rollno"];
      echo "<strong>Class:</strong>";
      echo  $row["class"];
      echo "<strong>Date of Birth:</strong>";
      $dob =  $row["dob"];
      echo $date = date('d-m-Y', strtotime($dob));
      echo "<strong>Gender:</strong>";
      echo  $row["gender"];
      echo "<strong>Category:</strong>";
      echo  $row["Category"];
      echo "<strong>Phone Number:</strong>";
      echo  $row["phoneno"];
      echo "<strong>Email:</strong>";
      echo  $row["email"];
      echo "<strong>Type:</strong>";
      echo  $row["vtype"];
      echo "<strong>Team:</strong>";
      echo  $row["team"];
      echo "<strong>Batch:</strong>";
      echo  $row["batch"];
      echo "<strong>Address:</strong>";
      echo  $row["addres"];
    }
  } else {
    echo "<script>alert('No record found.')</script>";
  }
  ?>
  </div>
  </form>