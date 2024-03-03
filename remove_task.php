<?php
include("connection.php");
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
$query = "SELECT * FROM task";
    $result = mysqli_query($conn, $query);
    echo "<center>";
    echo "<form style='margin-top:154px'>";
    echo "<h1>Remove Task </h1>";
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $taskname = $row['taskname'];
            $task_id = $row['task_id'];
            $date = $row['date'];
           
            echo "<h3 style='margin-top:50px' >Task Name: ".$row['taskname']."</br>On ". date('d-m-Y', strtotime($row['date']))."</h3>";
            echo "<button style='margin-top:30px'><a style='color:white'; href='?taskid=". $task_id ."' name=register >Delete</a></button>";   
        }
    } else {
        echo "<script>alert(' No task Has been assigned.')</script>";
        echo "<script>location.href = './assign.php'</script>";
    }
    echo "</form>";
    echo "</center>";
    if (isset($_GET['taskid']))
     {
         $taskid = $_GET['taskid'];
         $rollno = $_SESSION['username'];
            $sql = "DELETE FROM task where task_id='$taskid'";
            if (mysqli_query($conn, $sql)) {
                $sql = "DELETE FROM event_register where task_id='$taskid'";
                mysqli_query($conn, $sql);
                echo "<script>alert('Task Removed Successfully')</script>";
                echo "<script>location.href = './assign.php'</script>";
            } else {
                echo "<script>alert(' Enable to remove Task')</script>";
            }
        }
