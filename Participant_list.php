<?php
include("connection.php");
include("css.php");
include("nav_officer.php");
?>
<center>
  <form method="post" style="margin-top:100px">
    <h1>Participant List</h1></br>
    <label for="year">Select Event:</label>
    <select id="event" name="event" required style='height:25px';>
  <?php
  
   echo "<option value=''>-- Select --</option>";
   $sql = "SELECT activity_name,date FROM report order by date desc";
   $result = mysqli_query($conn, $sql);
   if ($result) {
       while ($row = mysqli_fetch_assoc($result)) {
           $newDate = date('d-m-Y', strtotime($row['date']));
           $optionValue = $row['activity_name'].' ['.$row['date'].']';
           $optiondisplay = $row['activity_name'].' ['.$newDate.']';
           echo "<option value='$optionValue'>$optiondisplay</option>";
       }
       echo "</select></br>";
    //    echo "<button formaction='particular_event.php'>View</button>";  
       } 
       else {
           echo "Error: " . mysqli_error($conn);
       }
  ?>
      <!-- <option value="">--Select year--</option>
      <option value="I">1st year</option>
      <option value="II">2nd year</option>
      <option value="leaders">Leaders</option>
    </select></br></br> -->
    </br><button name='submit'>Submit</button>
  </form>
  <?php
  if (isset($_POST['submit'])) 
  {
$event = $_POST['event'];
$activity = explode('[', $event);
$event = $activity[0];
$date = $activity[1];
$date = substr($date, 0, -1);
// $sql = "SELECT s.rollno, s.volunteer_name,s.class,a.hour,a.activity_name,a.date
// FROM volunteer_profile AS s
// INNER JOIN (
//     SELECT rollno,hour,activity_name,date
//     FROM volunteer_attendance
//     GROUP BY rollno
// ) AS a ON s.rollno = a.rollno where a.activity_name='$event' and a.date='$date'";
$sql = "SELECT s.rollno, s.volunteer_name,s.class,a.activity_name,a.date
FROM volunteer_profile AS s
JOIN volunteer_attendance AS a ON s.rollno = a.rollno where a.activity_name='$event' and a.date='$date'";

// SELECT s.rollno, s.name, s.class, a.activityname
// FROM students s
// JOIN activities a ON s.rollno = a.rollno
// WHERE a.activityname = 'desired_activity_name';

// $sql = "SELECT * FROM volunteer_attendance WHERE activity_name='$event' and date='$date'";
$result = mysqli_query($conn, $sql);
echo "<center>";
if (mysqli_num_rows($result) > 0) {
// echo "$result";
  echo "<table style='text-align: justify';>";
  echo "<h1 style=margin-top:30px;>" . $event . " Participant List </br></h1><h2>On ".date('d-m-Y', strtotime($date)) ."</h2> </br>";
  echo " <tr>
           <th>SI No</th>
           <th>RollNo</th>
           <th>Name</th>
           <th>Class</th>
          </tr>";
  $serialNumber = 1;
  // while ($row = mysqli_fetch_assoc($result)) {
    while ($row = mysqli_fetch_assoc($result)) {



      echo "<tr>";
      echo "<td>$serialNumber</td>";
      echo "<td>" . $row['rollno'] . "</td>";
      echo "<td>" . $row['volunteer_name'] . "</td>";
      echo "<td>" . $row['class'] . "</td>";
      // echo "<td>" . $row['hour'] . "</td>";
      // echo "<td>" . $row['class'] . "</td>";
      echo "</tr>";
      $serialNumber++;
    }
    // $date = date('d-m-Y', strtotime($row['date']));
    // $activity_name = $row['activity_name'];
    // $rollno = $row['rollno'];
  //   $name = $row['volunteer_name'];
  //   $class = $row['class'];
  //   $hour = $row['hour'];
  //   echo "<tr>";
  //   echo "<td>$serialNumber</td>";
  //   echo "<td>$rollno</td>";
  //   echo "<td>$name</td>";
  //   echo "<td>$class</td>";
  //   echo "<td>$hour</td>";
  //   // echo "<td style='width:500px;'>$description</td>";
  //   // echo "<td>$no</td>";
  //   echo "</tr>";
  //   $serialNumber++;
  // }
  echo "</table>";
  echo "</br><button onclick='window.print()'>Print</button>";
} else {

  echo "<script>alert('No record found.')</script>";
}

  }
?>
