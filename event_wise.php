<?php
session_start();
if ($_SESSION["role"] == "secretary") {
  include("nav_secretary.php");
} elseif ($_SESSION["role"] == "officer") {
  include("nav_officer.php");
}
include("connection.php");
include("css.php");
$event = $_POST['select_option'];
$day1 = $_POST['from'];
$day2 = $_POST['to'];
$sql = "SELECT * FROM report WHERE activity_name='$event' and date BETWEEN '$day1' AND '$day2' order by date";
$result = mysqli_query($conn, $sql);
echo "<center>";
if (mysqli_num_rows($result) > 0) {
  echo "<table style='text-align: justify';>";
  echo "<h1 style=margin-top:100px;>" . $event . " Activity Report</h1></br>";
  echo " <tr>
           <th>SI No</th>
           <th>Date</th>
           <th>Activity Name</th>
           <th>Description</th>
           <th>Participants</th>
           </tr>";
  $serialNumber = 1;
  while ($row = mysqli_fetch_assoc($result)) {
    $date = $row['date'];
    $activity_name = $row['activity_name'];
    $description = $row['description'];
    $no = $row['no_participants'];
    $newDate = date('d-m-Y', strtotime($date));
    echo "<tr>";
    echo "<td>$serialNumber</td>";
    echo "<td>$newDate</td>";
    echo "<td>$activity_name</td>";
    echo "<td style='width:500px;'>$description</td>";
    echo "<td>$no</td>";
    echo "</tr>";
    $serialNumber++;
  }
  echo "</table>";
} else {

  echo "<script>alert('No record found.')</script>";
}
?>
<button onclick="window.print()">Print</button>