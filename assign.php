<?php
include("css.php");
include("connection.php");
session_start();
if ($_SESSION["role"] == "secretary") {
  include("nav_secretary.php");
} elseif ($_SESSION["role"] == "officer") {
  include("nav_officer.php");
}
?>
<form action="assign_task.php" method="post" style="margin-top:100px;  max-width: 460px;">
  <center>
    <h1 class="head">Assign Task</h1>
    <button id="assign" name="assign">Assign</button>
    <button formaction="view_task.php">View</button>
    <button formaction="remove_task.php">Remove</button>
  </center>
</form>