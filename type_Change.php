  <?php
  include("css.php");
  include("nav_officer.php");
  include("connection.php");
  ?>
  <form method="post" style="margin-top:100px">
    <center>
      <h1 class="head">Type Change</h1>
      <div class="container">
        <label for="rollno">Roll no:</label>
        <input type="text" onkeyup='check_no(rollno)' id="rollno" name="rollno" placeholder="Enter your Roll no" required style="height: 24px;">
        <label for="type">Type:</label>
        <select id="type" name="type" required>
          <option value="">--Select Type--</option>
          <option value="Secretary">Secretary</option>
          <option value="Joint-Secretary">Joint-Secretary</option>
          <option value="attedance-committee">attedance-committee</option>
          <option value="Cultural-committee">Cultural-committee</option>
          <option value="Office-committee">Office-committee</option>
          <option value="Shramadana-committee">Shramadana-committee</option>
          <option value="Wall Magazine-committee">Wall Magazine-committee</option>
          <option value="Team Leader">Team Leader</option>
        </select>
      </div>
      <button style="margin-top: 35px" id="submit" name="submit">Submit</button>
    </center>
  </form>
  <?php
  if (isset($_POST['submit'])) {
    $type = $_POST['type'];
    $rollno = $_POST['rollno'];
    $sql = "SELECT * FROM volunteer_profile where rollno='$rollno' and not vtype='senior volunteer'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
      $sql = "Update volunteer_profile set vtype='$type' where rollno='$rollno'";
      if (mysqli_query($conn, $sql)) {
        $sql = "Update pass set type='secretary' where username='$rollno'";
        mysqli_query($conn, $sql);
        echo "<script>alert('Type Upated Successfully')</script>";
      } else {
        echo "Error in updating Type: " . mysqli_error($conn);
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