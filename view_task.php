<?php
include("css.php");
session_start();
if ($_SESSION["role"] == "secretary")
{
  include("nav_secretary.php");  
}
elseif($_SESSION["role"] == "officer")
  {
    include("nav_officer.php");
  }
  else
{
    echo "<script>location.href = './secretary_login.php'</script>"; 
}
include("connection.php");
$sql = "SELECT * FROM task";
$task = mysqli_query($conn, $sql);
if (mysqli_num_rows($task) > 0) 
{
   while ($row = mysqli_fetch_assoc($task)) 
{
$taskid = $row['task_id'];
$taskname = $row['taskname'];
$sql = "SELECT * FROM event_register";
    $result = mysqli_query($conn, $sql);
    echo "<center>";
     if (mysqli_num_rows($result) > 0) {
      echo "<table>";
      echo "<h1 style=margin-top:100px;>Registered List for ".$taskname."</br>On ". date('d-m-Y', strtotime($row['date']))."</h1>";
      echo " <tr>
                <th>SI No</th>
                <th>Rollno</th>
                <th>Name</th>
                <th>Class</th>
            </tr>";
      $serialNumber = 1;
      while ($row = mysqli_fetch_assoc($result)) {
        $t = $row['task_id'];
        $rollno = $row['rollno'];
        $name = $row['v_name'];
        $class = $row['class'];
        if($t==$taskid)
      { 
        echo "<tr>";
        echo "<td>$serialNumber</td>";
        echo "<td>$rollno</td>";
        echo "<td>$name</td>";
        echo "<td>$class</td>";
        echo "</tr>";
        $serialNumber++;
      }
    }
      echo "</table>";
    } else {
      
      echo "<script>alert('No record found.')</script>";
      echo "<script>location.href = './assign.php'</script>";  
    }
  }
  echo "</br><button onclick='window.print()'>Print</button>";
}
else
echo "<script>alert('No Task has been Assigned.')</script>";
    echo "</center>";
