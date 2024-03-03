  <?php
  include("css.php");
  include("connection.php");
  include("nav_officer.php");
  ?>
  <form method="post" style="margin-top:105px;  max-width: 460px;">
    <center>
      <h1 class="head">Team Update</h1>
      <div class="container">
        <label for="rollno">Roll no:</label>
        <input type="text" onkeyup='check_no(rollno)' id="rollno" name="rollno" placeholder="Enter your Roll no" required style="height:25px ;">
        <label for="teams">Team Number:</label>
        <select id="teams" name="teams" required>
          <option value="">--Select team--</option>
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
      </div>
      <button style="margin-top: 35px" id="submit" name="submit">Submit</button>
    </center>
  </form>
  <?php
  if (isset($_POST['submit'])) {
    $team = $_POST['teams'];
    $rollno = $_POST['rollno'];
    $sql = "SELECT * FROM volunteer_profile where rollno='$rollno'and not vtype='senior volunteer'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
      $sql = "Update volunteer_profile set team='$team' where rollno='$rollno'";
      if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Team Upated Successfully')</script>";
      } else {
        echo "<script>alert('Please Enter Proper Rollno')</script>";
      }
    } else
      echo "<script>alert('Please Enter Proper Rollno')</script>";
  }
  ?>
  </body>
  <script>
    function check_no(t) {
      if (!Number.isFinite(Number(t.value))) {
        t.value = t.value.substr(0, (t.value).length - 1);
      }
    }
  </script>

  </html>