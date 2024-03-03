<?php
include("css.php");
session_start();
include("connection.php");
if ($_SESSION["role"] == "admin") {
  include("nav_admin.php");
} elseif ($_SESSION["role"] == "officer") {
  include("nav_officer.php");
} else {
  echo "<script>location.href = './secretary_login.php'</script>";
}
?>
<center>
  <form method="post" style="margin-top:115px">
    <h1> Password:</h1></br>
    <label for="username">User Name:</label>
    <input type="text" id="username" name="username" placeholder="Enter your Username" required></br></br>
    <button name="submit">submit</button>
  </form></br>
  <?php
  if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $sql = "SELECT password FROM pass where username='$username'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      echo $row['password'];
    } else
      echo "Invalid username";

    $conn->close();
  }
  ?>
</center>