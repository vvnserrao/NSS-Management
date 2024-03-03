<?php
include("connection.php");
  if (isset($_POST['attendance'])) {
    $attendance = $_POST['attendance'];
    $count= count( $attendance);
    $hour=$_POST['hour'];
    $date=$_POST['date'];
    // $date=date('Y-m-d');
    $activity=$_POST['activity'];
    $desp=$_POST['desp'];
  if($activity=='others')
  {
    $activity=$_POST['otherOption'];
  }
    foreach ($attendance as $rollno) {
        $sql = "INSERT INTO volunteer_attendance(rollno,Date,hour,activity_name) VALUES('$rollno','$date','$hour','$activity')";
        mysqli_query($conn, $sql);
      }
      $sql = "INSERT INTO report(activity_name,no_participants,date,description) VALUES('$activity','$count','$date','$desp')";
      mysqli_query($conn, $sql);
      echo "<script>alert('Attendance recorded successfully.')</script>";
      echo "<script>location.href = './attendance.php'</script>";
  } else {
    echo "<script>alert('Unable to submit attendance.')</script>";
  }

  mysqli_close($conn);
