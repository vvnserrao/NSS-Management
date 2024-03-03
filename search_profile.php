<?php
session_start();
include('css.php');
include("nav_officer.php");

?>
<center>
  <form method="post" action="volunteer_profile.php" style="margin-top:135px">
    <h1> Volunteer Details</h1></br>
    <label for="rollno">Roll no:</label>
    <input type="text" id="rollno" name="rollno" onkeyup='check_no(rollno)' placeholder="Enter your Rollno" required></br></br>
    <button type="submit" name="submit">Submit</button>
  </form>
  <script>
    function check_no(t) {
      if (!Number.isFinite(Number(t.value))) {
        t.value = t.value.substr(0, (t.value).length - 1);
      }
    }
  </script>
</center>