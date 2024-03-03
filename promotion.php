<center>
    <form method="POST" style=max-width:550px>
        <label>When you click promote, 1st year volunteers will be promoted as 2nd year volunteers and the 2nd year volunteers will be promoted as senior volunteers.</label>
        <label> Once you click 'promote' then later the status cannot be changed, it automatically updates class and team number. </label>
        <label><strong>Are you sure want to Promote?</strong> </label></br>
        <button type="submit" name="promote">Promote</button>
    </form>
</center>
<?php
include("nav_officer.php");
include("connection.php");
include("css.php");

if (!isset($_POST["promote"]))
    exit();
$sql = "UPDATE volunteer_profile SET class=concat('I',class),vtype='senior volunteer',year='III' where year='II'";
if (mysqli_query($conn, $sql)) {
    $sql = "UPDATE volunteer_profile SET class=concat('I',class),year='II',team='' where year='I'";
    mysqli_query($conn, $sql);
    $sql = "UPDATE pass
JOIN volunteer_profile ON pass.username = volunteer_profile.rollno
SET pass.type = 'senior volunteer'
WHERE volunteer_profile.year = 'III'";
    mysqli_query($conn, $sql);
    echo "<script>alert('Volunteers Promoted Successfully')</script>";
} else {
    echo "<script>alert('Unable to promote')</script>";
}
?>