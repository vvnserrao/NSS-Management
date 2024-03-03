<?php
include("connection.php");
include("css.php");
include("nav_officer.php");
?>
<center>
  <form method="post" style="margin-top:100px">
    <h1>Volunteer List</h1></br>
    <label for="year">Select year:</label>
    <select id="year" name="year" required style='height:25px' ;>
      <option value="">--Select year--</option>
      <option value="I">1st year</option>
      <option value="II">2nd year</option>
      <option value="leaders">Leaders</option>
    </select></br></br>
    <button name='submit'>Submit</button>
  </form>
  <?php
  if (isset($_POST['submit'])) {
    $option = $_POST['year'];
    $flag=false;
if($option=='I')
{

    $sql="select *from volunteer_profile where year='I'";
}
elseif($option=='II')
{
    $sql="select *from volunteer_profile where year='II'";
}
elseif($option=='leaders')
{
    $sql="select *from volunteer_profile where not vtype='volunteer' and not vtype='senior volunteer'";
    $flag=true;

}

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        if($flag)
        {
            echo "</br><table>";
            echo " <tr>
                  <th>SI No</th>
                  <th>Roll No</th>
                  <th>Name</th>
                  <th>Class</th>
                  <th>Type</th>
              </tr>";
              $serialNumber = 1;
              while ($row = mysqli_fetch_assoc($result)) {
                $rollno = $row["rollno"];
                $Name = $row['volunteer_name'];
                $class = $row['class'];
                $type = $row['vtype'];
                // $hour = $row['total_hours'];
                echo "<tr>";
                echo "<td>$serialNumber</td>";
                echo "<td>$rollno</td>";
                echo "<td>$Name</td>";
                echo "<td>$class</td>";
                echo "<td>$type</td>";
                echo "</tr>";
                $serialNumber++;
              }
        }
        else{

            echo "</br><table>";
            echo " <tr>
                  <th>SI No</th>
                  <th>Roll No</th>
                  <th>Name</th>
                  <th>Class</th>
              </tr>";
              $serialNumber = 1;
              while ($row = mysqli_fetch_assoc($result)) {
                $rollno = $row["rollno"];
                $Name = $row['volunteer_name'];
                $class = $row['class'];
                // $hour = $row['total_hours'];
                echo "<tr>";
                echo "<td>$serialNumber</td>";
                echo "<td>$rollno</td>";
                echo "<td>$Name</td>";
                echo "<td>$class</td>";
                echo "</tr>";
                $serialNumber++;
              }
        }
     
      echo "</table>";
    } else {
      echo "No data found.";
    }
}
  ?>
</center>