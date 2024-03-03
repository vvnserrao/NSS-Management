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
$query = "SELECT * FROM task";
$result = mysqli_query($conn, $query);
echo "<center>";
echo "<form style='margin-top:154px;'max-width: 560px';>";
echo "<h1>Event Registartion </h1>";
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $taskname = $row['taskname'];
        $no_volunteer = $row['no_volunteer'];
        echo "<h3 style='margin-top:50px' >Task Name: " . $row['taskname'] . "</br>On" . date('d-m-Y', strtotime($row['date'])) . "</h3>";
        echo "<button style='margin-top:30px'><a style='color:white'; href='?taskid=" . $taskname . "&id=" . $row["task_id"] . "' name=register>Register</a></button>";
    }
} else {
    echo "<script>alert(' No Event Has been assigned.')</script>";
    // echo "<script>location.href = './navstud.php'</script>";
}
echo "</form>";
echo "</center>";
if (isset($_GET['taskid'])) {
    $taskid = $_GET['taskid'];
    $id = $_GET['id'];
    $rollno = $_SESSION['username'];
    $res = $conn->query("select * from event_register where task_id='$id' and rollno='$rollno'");
    if ($res->num_rows > 0)
        echo "<script>alert('Already Registered for the event')</script>";
    else {
        $res = $conn->query("select count(*) AS cnt from event_register where task_id=$id");
        $row = $res->fetch_array();
        $res1 = $conn->query("select no_volunteer from task where task_id=$id");
        $row1 = $res1->fetch_array();
        if ($row["cnt"] >= $row1["no_volunteer"]) {
            echo "<script>alert('Registration slot is full')</script>";
        } else {
            $sql = "INSERT INTO event_register (taskname,rollno,v_name,class,task_id)
                     SELECT '$taskid',rollno,volunteer_name,class,$id
                     FROM volunteer_profile
                     WHERE rollno='$rollno'";
            if (mysqli_query($conn, $sql)) {
                echo "<script>alert('Event Registered Successfully')</script>";
            } else
                echo "<script>alert('failed ')</script>";
        }
    }
}
