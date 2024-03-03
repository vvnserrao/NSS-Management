 <?php
  session_start();
  if ($_SESSION["role"] == "secretary") {
    include("nav_secretary.php");
  } elseif ($_SESSION["role"] == "officer") {
    include("nav_officer.php");
  }
  include("css.php");
  include("connection.php");
  ?>

 <form method="post">
   <center>
     <h1>Class Wise List</h1></br>
     <label for=""> Select Class:</label>
     <select id="class" name="class" style="width: 180px;height: 25px;" required>
       <option value="">Select Class</option>
       <option value="I BCOM A">I BCOM A</option>
       <option value="I BCOM B">I BCOM B</option>
       <option value="I BCOM C">I BCOM C</option>
       <option value="I BCOM D">I BCOM D</option>
       <option value="I BCA">I BCA</option>
       <option value="I BSC A">I BSC A</option>
       <option value="I BSC B">I BSC B</option>
       <option value="I BA A">I BA A</option>
       <option value="I BA B">I BA B</option>
       <option value="I BBA">I BBA</option>
       <option value="II BCOM A">II BCOM A</option>
       <option value="II BCOM B">II BCOM B</option>
       <option value="II BCOM C">II BCOM C</option>
       <option value="II BCOM D">II BCOM D</option>
       <option value="II BCA">II BCA</option>
       <option value="II BSC A">II BSC A</option>
       <option value="II BSC B">II BSC B</option>
       <option value="II BA A">II BA A</option>
       <option value="II BA B">II BA B</option>
       <option value="II BBA">II BBA</option>
     </select>
     <button type="submit" name="submit">Submit</button>

 </form>
 <?php

  if (isset($_POST['submit'])) {
    $selected_value = $_POST['class'];
    $query = "SELECT * FROM volunteer_profile WHERE class = '$selected_value' and not vtype='senior volunteer'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
      echo "<h2 style='margin-top:40px'>Class List of $selected_value </h2></br>";
      echo "<table border=2 cellpadding=15>";
      echo "<tr><th>Rollno</th><th>Name</th></tr>";
      while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['rollno'] . "</td>";
        echo "<td>" . $row['volunteer_name'] . "</td>";
        echo "</tr>";
      }
      echo "</table>";
    } else {
      echo "<script>alert('No record found.')</script>";
    }
  }
  echo "</center>";
  ?>