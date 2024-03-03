<?php
include("css.php");
include("nav_officer.php");
include("connection.php");
$event = $_POST['select_option'];
$activity = explode('[', $event);
$event = $activity[0];
$date = $activity[1];
$date = substr($date, 0, -1);
// $sql = "SELECT s.rollno, s.volunteer_name,s.class,a.activity_name,a.hour,a.
// FROM volunteer_profile AS s
// INNER JOIN (
//     SELECT rollno, SUM(hour) AS total_hours
//     FROM volunteer_attendance
//     GROUP BY rollno
// ) AS a ON s.rollno = a.rollno where s.year='$batch'";
$sql = "SELECT * FROM report WHERE activity_name='$event' and date='$date' order by date";
$result = mysqli_query($conn, $sql);
echo "<center>";
if (mysqli_num_rows($result) > 0) {
  echo "<table style='text-align: justify';>";
  echo "<h1 style=margin-top:100px;>" . $event . " Activity Report</h1> </br>";
  echo " <tr>
           <th>SI No</th>
           <th>Date</th>
           <th>Activity Name</th>
           <th>Description</th>
           <th>Participants</th>
          </tr>";
  $serialNumber = 1;
  while ($row = mysqli_fetch_assoc($result)) {
    $date = date('d-m-Y', strtotime($row['date']));
    $activity_name = $row['activity_name'];
    $description = $row['description'];
    $no = $row['no_participants'];
    echo "<tr>";
    echo "<td>$serialNumber</td>";
    echo "<td>$date</td>";
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
</br><button onclick="window.print()">Print</button>