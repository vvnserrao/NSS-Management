<?php
include("css.php");
include("nav_officer.php");
include("connection.php");
$sql = "SELECT * FROM special_achievement";
$result = mysqli_query($conn, $sql);
echo "<center>";
if (mysqli_num_rows($result) > 0) {
  echo "<table>";
  echo "<h1 style=margin-top:100px;>Special Achievement List</h1></br>";
  echo " <tr>
                <th>SI No</th>
                <th>Rollno</th>
                <th>Name</th>
                <th>Achievement</th>
                <th>Date</th>
            </tr>";
  $serialNumber = 1;
  while ($row = mysqli_fetch_assoc($result)) {
    $rollno = $row['rollno'];
    $name = $row['v_name'];
    $program_name = $row['program_name'];
    $date = date('d-m-Y', strtotime($row['date']));
    echo "<tr>";
    echo "<td>$serialNumber</td>";
    echo "<td>$rollno</td>";
    echo "<td>$name</td>";
    echo "<td>$program_name</td>";
    echo "<td>$date</td>";
    echo "</tr>";
    $serialNumber++;
  }
  echo "</table>";
} else {

  echo "<script>alert('No record found.')</script>";
  echo "<script>location.href = './special_achievement.php'</script>";
}

echo "</center>";
