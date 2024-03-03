 <?php
  error_reporting(0);
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
     <h1>Team Wise List</h1></br>
     <label for=""> Select Team:</label>
     <select id="team" name="team" style="width: 180px;height: 25px; " required>
       <option value="">Select team</option>
       <option value="1">1</option>
       <option value="2">2</option>
       <option value="3">3</option>
       <option value="4">4</option>
       <option value="5">5</option>
       <option value="6">6</option>
       <option value="7">7</option>
       <option value="8">8</option>
       <option value="9">9</option>
       <option value="10">10</option>

     </select>
     <button type="submit" name="submit">Submit</button>
 </form>
 <?php
  if (isset($_POST['submit'])) {
    $selected_value = $_POST['team'];
    $query = "SELECT * FROM volunteer_profile WHERE team = '$selected_value'and not vtype='senior volunteer'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
      echo "<h2 style='margin-top:40px'>Team List of $selected_value </h2></br>";
      echo "<table border=2 cellpadding=15>";
      echo "<tr><th>Rollno</th><th>Name</th><th>Class</th></tr>";
      while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['rollno'] . "</td>";
        echo "<td>" . $row['volunteer_name'] . "</td>";
        echo "<td>" . $row['class'] . "</td>";
        echo "</tr>";
      }
      echo "</table>";
    } else {
      echo "<script>alert('No record found.')</script>";
    }
  }
  echo "</center>";
  ?>