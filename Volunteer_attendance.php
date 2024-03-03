<?php
session_start();
if ($_SESSION["role"] == "secretary") {
  include("nav_secretary.php");
} elseif ($_SESSION["role"] == "volunteer") {
  include("nav_volunteer.php");
} else {
  echo "<script>location.href = './secretary_login.php'</script>";
}
include("css.php");
include("connection.php");
?>
<center>
  <form method="POST">
    <h1>Attendance</h1></br>

    <label for='from'>From:</label>
    <input type='date' name='from' required>

    <label for='to'> To: </label>
    <input type='date' name='to' required></br>

    <button name="view">View</button>
  </form>
  <?php
  if (isset($_POST["view"])) {
    $day1 = $_POST['from'];
    $day2 = $_POST['to'];
    echo "<h1 >Attendance List</h1>";

    if (isset($_SESSION['username'])) {
      $rollno = $_SESSION['username'];
    }
    $sql = "SELECT * FROM volunteer_attendance  where rollno='$rollno' AND date BETWEEN '$day1' AND '$day2' ORDER BY date";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
      echo "<table class=tb>";
      echo " <tr>
                <th>SI No</th>
                <th>Date</th>
                <th>Activity</th>
                <th>Hours</th>
            </tr>";
      $serialNumber = 1;
      while ($row = mysqli_fetch_assoc($result)) {
        $date = $row['Date'];
        $activity_name = $row['activity_name'];
        $hour = $row['hour'];
        $newDate = date('d-m-Y', strtotime($date));
        echo "<tr>";
        echo "<td>$serialNumber</td>";
        echo "<td>$newDate</td>";
        echo "<td>$activity_name</td>";
        echo "<td>$hour</td>";
        echo "</tr>";
        $serialNumber++;
      }
      $sql = "SELECT SUM(hour) AS total FROM volunteer_attendance where rollno='$rollno'AND date BETWEEN '$day1' AND '$day2'";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($result);
      $total = $row['total'];
      echo "<tr>";
      echo "<td colspan='3' style='text-align:center;'>Total</td>";
      echo "<td>$total</td>";
      echo "</tr>";
      echo "</table>";
    } else {
      echo "No data found.";
    }
  }
  ?>
</center>
</body>

</html>