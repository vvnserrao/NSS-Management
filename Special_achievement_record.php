<?php
include("css.php");
include("connection.php");
include("nav_officer.php");
?>
  <center>
<form action="" method="post" style="margin-top:105px;  max-width: 530px;">
   <h1 class="head">Special Achievements</h1>
    <div class="container">
      <label for=""> Roll No:</label>
      <input type="text" onkeyup='check_no(rollno)' onchange="call_name()" id="rollno" name="rollno" required placeholder="Enter your Rollno" style="height:30px;">
      <label id='hint' style="position: absolute; left:50%;top:36%; color:green"></label>
      <label for="">Name of Programmme:</label>
      <input type="text" id="program_name" name="program_name" required placeholder="Enter name of Programmme"style="height:30px;">
      <label for=""> Date:</label>
      <input  type="date" name="date" required >
    </div>
    <button style="margin-top:25px" name="submit">Submit</button>
  </form>
</center>
  <?php
if (isset($_POST['submit'])) 
{
$rollno = $_POST['rollno'];
$program_name = $_POST['program_name'];
$date = $_POST['date'];
$sql = "SELECT * FROM volunteer_profile where rollno='$rollno'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) 
{
$sql="INSERT INTO special_achievement (rollno,v_name,program_name,date )
        SELECT rollno,volunteer_name,'$program_name','$date'
        FROM volunteer_profile
        WHERE rollno='$rollno'";
  if(mysqli_query($conn, $sql))
  {
  echo "<script>alert('Special Achievement entered Successfully')</script>";
  echo "<script>location.href = './special_achievement.php'</script>";
} else {
  echo "<script>alert('Special Achievement not Recorded')</script>";
}
}
else
echo "<script>alert('Please Enter Proper Rollno')</script>";
}
?>
 <script>
    function check_no(t) {
      if (!Number.isFinite(Number(t.value))) {
        t.value = t.value.substr(0, (t.value).length - 1);
      }
    }
    function call_name(){
      fetch('./hint.php?rollno=' + rollno.value).then((res)=> res.json()).then((data)=>{
        if(data.name)
        {
          hint.innerHTML = data.name;
        }
      })
    }
    </script>



