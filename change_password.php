<?php
session_start();
if ($_SESSION["role"] == "officer") {
  include("nav_officer.php");
} elseif ($_SESSION["role"] == "secretary") {
  include("nav_secretary.php");
} else
  include("nav_volunteer.php");
include("css.php");
include("connection.php");
?>

<center>
  <form method="post" style="margin-top:100px">
    <h1>Change Password</h1>
    <label for="current_password" style="margin-top:30px;">Current Password:</label>
    <input type="password" id="current_password" name="current_password" required><br><br>
    <label for="new_password">New Password:</label>
    <input type="password" id="new_password" name="new_password" required><br><br>
    <label for="confirm_password">Confirm Password:</label>
    <input type="password" id="confirm_password" name="confirm_password" required><br><br>
    <button type="submit" name="submit">Change Password</button>
  </form>
  <?php
  if (isset($_POST['submit'])) {
    $username = $_SESSION['username'];
    $currentPassword = $_POST['current_password'];
    $newPassword = $_POST['new_password'];
    $confirmPassword = $_POST['confirm_password'];
    if ($newPassword !== $confirmPassword) {
      echo "<script>alert('New password and confirm password do not match')</script>";
    } else {
      $checkPasswordQuery = "SELECT * FROM pass WHERE username='$username' AND password='$currentPassword'";
      $result = mysqli_query($conn, $checkPasswordQuery);

      if (mysqli_num_rows($result) > 0) {
        $updatePasswordQuery = "UPDATE pass SET password='$newPassword' WHERE username='$username'";
        if (mysqli_query($conn, $updatePasswordQuery)) {
          echo "<script>alert('Password changed successfully')</script>";
        } else {
          echo "Error updating password: " . mysqli_error($conn);
        }
      } else {
        echo "<script>alert('Invalid current password')</script>";
      }
    }
    mysqli_close($conn);
  }
  ?>
</center>