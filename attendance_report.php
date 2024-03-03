<?php
include("connection.php");
include("css.php");
include("nav_officer.php");
?>
<center>
  <form method="post" style="margin-top:100px">
    <h1>Attendance Report</h1></br>
    <label for="attendance_report">Select year:</label>
    <select id="attendance_report" name="attendance_report" required style='height:25px' ;>
      <option value="">Select year</option>
      <option value="I">1st year</option>
      <option value="II">2nd year</option>
    </select></br></br>
    <button name='submit'>Submit</button>
  </form>
  <?php
  if (isset($_POST['submit'])) {
    $batch = $_POST['attendance_report'];
    $sql = "SELECT s.rollno, s.volunteer_name,s.year,a.total_hours
FROM volunteer_profile AS s
INNER JOIN (
    SELECT rollno, SUM(hour) AS total_hours
    FROM volunteer_attendance
    GROUP BY rollno
) AS a ON s.rollno = a.rollno where s.year='$batch'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
      echo "</br><table>";
      echo " <tr>
            <th>SI No</th>
            <th>Roll No</th>
            <th>Name</th>
            <th>Total Hours</th>
        </tr>";
      $serialNumber = 1;
      while ($row = mysqli_fetch_assoc($result)) {
        $rollno = $row["rollno"];
        $Name = $row['volunteer_name'];
        $hour = $row['total_hours'];
        echo "<tr>";
        echo "<td>$serialNumber</td>";
        echo "<td>$rollno</td>";
        echo "<td>$Name</td>";
        echo "<td>$hour</td>";
        echo "</tr>";
        $serialNumber++;
      }
      echo "</table>";
    } else {
      echo "No data found.";
    }
  }
  ?>
</center>