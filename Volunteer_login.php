<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <style>
    body {
      font-family: 'Nunito', sans-serif;
      color: #384047;
      margin-top: 150px;
    }

    form {
      max-width: 400px;

      margin: auto;
      padding: 40px 10px;
      background: #f4f7f8;
      border-radius: 15px;
    }

    .container {
      display: grid;
      grid-template-columns: 1fr 1fr;
      grid-template-rows: 1fr 1fr;
      gap: 30px 1px;
      grid-auto-flow: row;
      grid-template-areas:
        ". ."
        ". .";

      font-size: larger;
      width: 200px;
      margin-right: 80px;


    }

    button {
      margin: 20px 20px;
      padding: 10px 30px;
      color: #FFF;
      background-color: #4bc970;
      font-size: 16px;
      text-align: center;
      font-style: normal;
      border-radius: 4px;
      border: 1px solid #3ac162;
      box-shadow: 0 -1px 0 rgba(255, 255, 255, 0.1) inset;
      margin-top: 40px;
      cursor: pointer;
      font-style: bold;


    }

    .img-container {
      text-align: center;
      margin-bottom: 30px;
    }

    .pic {
      width: 80px;
      height: auto;
    }
  </style>
</head>


<form action="" method="post">
  <center>
    <h1 class="head">Volunteer Login</h1>
    <div class="img-container">
      <img src="NSS Logo.png" alt="" class="pic">
    </div>
    <div class="container">
      <label for="">Username:</label>
      <input type="text" id="username" name="username" required style="height:20px;background: #f4f7f8;">
      <label for=""> Password:</label>
      <input type="password" id="password" name="password" required style="height:20px;background: #f4f7f8;">
    </div>
    <button type="submit" name="submit">Submit</button>
    <button type='reset'>RESET</button>
  </center>
</form>
</body>
<?php
session_start();
$conn = new mysqli("localhost", "root", "", "nss");
if (isset($_POST["submit"])) {
  $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
  $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);
  if (!empty($username) && !empty($password)) {
    $res = $conn->query("SELECT * FROM pass WHERE username='$username'");
    if ($res->num_rows > 0) {
      $row = $res->fetch_array();
      if ($row["password"] == $password) {
        $_SESSION["role"] = $row["type"];
        $_SESSION["username"] = $username;
        if ($_SESSION["role"] == "volunteer") {
          echo "<script>  setTimeout(() => {location.href='./nav_volunteer.php';}, 0); </script>";
        } else
          echo "<script>alert('Invalid Username and Password')</script>";
      } else {
        echo "<script>alert('Invalid Username and Password')</script>";
      }
    } else
      echo "<script>alert('Invalid Username and Password')</script>";
  }
}
?>

</html>