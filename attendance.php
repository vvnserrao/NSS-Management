<?php
include("css.php");
session_start();
include("connection.php");
if ($_SESSION["role"] == "secretary") {
  include("nav_secretary.php");
  $rollno = $_SESSION['username'];
  $sql = "SELECT * FROM volunteer_profile where rollno='$rollno' AND not vtype='attendance-committee'";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    echo "<script>alert('You are not authorised')</script>";
    echo "<script>location.href = './nav_secretary.php'</script>";
  }
} elseif ($_SESSION["role"] == "officer") {
  include("nav_officer.php");
}
?>
<style>
  .min-conatiner {
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-top: 1rem;

  }

  .min-conatiner label {
    display: inline-block;
    margin-bottom: 0.5rem;
    margin-right: 3rem;
  }

  .hidden {
    display: none;
  }
</style>
</head>

<body>
  <form action="process_attendance.php" method="post" style="margin-top:50px;  max-width: 500px;">

    <h1 style="text-align: center;margin: bottom 20px;">Attendance</h1>

    <div class="min-conatiner">
      <div>
        <input type="radio" id="all" onclick="a()" name="all" value="all" <?php if (isset($_GET["condition"])) {
                                                                            if ($_GET["condition"] == 'all') echo "checked";
                                                                          } ?>>
        <label for="">All</label>
        <input type="radio" id="male" onclick="m()" name="male" value="Male" <?php if (isset($_GET["condition"])) {
                                                                                if ($_GET["condition"] == 'male') echo "checked";
                                                                              } ?>>
        <label for="">Male</label>
        <input type="radio" id="female" name="female" onclick="f()" value="female" <?php if (isset($_GET["condition"])) {
                                                                                      if ($_GET["condition"] == 'female') echo "checked";
                                                                                    } ?>>
        <label for="">Female</label>
      </div>
      <div>
        <input type="radio" id="leader" name="leader" onclick="leaders()" value="leader" <?php if (isset($_GET["condition"])) {
                                                                                            if ($_GET["condition"] == 'leaders') echo "checked";
                                                                                          } ?>>
        <label for="">Leader</label>
        <input type="radio" id="1st year" name="1st year" onclick="fyear()" value="1st year" <?php if (isset($_GET["condition"])) {
                                                                                                if ($_GET["condition"] == 'fyear') echo "checked";
                                                                                              } ?>>
        <label for="">1st year</label>
        <input type="radio" id="2nd year" name="2nd year" onclick="syear()" value="2nd year" <?php if (isset($_GET["condition"])) {
                                                                                                if ($_GET["condition"] == 'syear') echo "checked";
                                                                                              } ?>>
        <label for="">2nd year</label>
      </div>
    </div>
    <div class="container">

      <label for="">Select Activity:</label>
      <select id="activity" name="activity" style="height: 35px;" required>
        <option value="">Select Activity</option>
        <option value="Blood Donation">Blood donation</option>
        <option value="Cleaning">Cleaning</option>
        <option value="Camp">Camp</option>
        <option value="Awareness">Awareness</option>
        <option value="CC Class">CC Class</option>
        <option value="others">Others</option>

      </select>
      <label for="" class="hidden">Others:</label>
      <input type="text" class="hidden" name="otherOption" id="otherOption" placeholder="Enter other option">
      <label for="">Date:</label>
      <input type="date" id="date" name="date" max="<?php echo date('Y-m-d'); ?>" min="<?php echo date('Y-m-d', strtotime('-1 day')); ?>" required style="height: 35px;">
      <label for="">Number of Hours:</label>
      <input type="text" pattern="[0-9]+" title=" Please Enter only Numbers" id="hour" name="hour" placeholder="Number of Hours" required style="height: 35px;">
      <label for="">Description:</label>
    </div>
    <textarea type="text" id="desp" name="desp" placeholder="Description" required style="height: auto; width: 450px; margin-left:10px;"></textarea>
    <br><label for="" style="  font-size: larger;">List of Students:</label>
    <input type="checkbox" id="selectall" name="select-all">
    <label for="">Select All</label></br>
    <center>

      <body>
        <?php
        if (isset($_GET["condition"])) {
          $condition =  $_GET["condition"];
          if ($condition == "all") {
            $sql = "SELECT * FROM volunteer_profile where not vtype='senior volunteer' GROUP BY rollno";
          } elseif ($condition == "male") {
            $sql = "SELECT * FROM volunteer_profile where gender='male' and not vtype='senior volunteer'GROUP BY rollno";
          } elseif ($condition == "female") {
            $sql = "SELECT * FROM volunteer_profile where gender='female'and not vtype='senior volunteer'GROUP BY rollno";
          } elseif ($condition == "leaders") {
            $sql = "SELECT * FROM volunteer_profile where not vtype='volunteer' and not vtype='senior volunteer'GROUP BY rollno";
          } elseif ($condition == "fyear") {
            $sql = "SELECT * FROM volunteer_profile where year='I'GROUP BY rollno";
          } elseif ($condition == "syear") {
            $sql = "SELECT * FROM volunteer_profile where year='II'GROUP BY rollno";
          }
          $result = mysqli_query($conn, $sql);

          if (mysqli_num_rows($result) > 0) {
            echo "<table>";
            echo "<form action='process_attendance.php' method='post'>";
            echo "<tr><th>Attendance</th><th>Roll No</th><th>Name</th></tr>";

            while ($row = mysqli_fetch_assoc($result)) {
              $rollno = $row['rollno'];
              $name = $row['volunteer_name'];

              echo "<tr>";
              echo "<td><input type='checkbox' class='check' name='attendance[]' value='$rollno'></td>";
              echo "<td>$rollno</td>";
              echo "<td>$name</td>";
              echo "</tr>";
            }

            echo "</table>";
          } else {
            echo "No students found.";
          }
        }
        mysqli_close($conn);
        ?>
        </br>
        <button name='Save' style="margin-right:100px;">Save</button>
        <button name="Back"  type="reset">Reset</button>

        </div>
    </center>

  </form>
</body>
<script>
  activity.addEventListener("change", (e) => {
    var hidden = document.querySelectorAll(".hidden");
    if (e.target.value === "others") {
      hidden[0].style.display = "block";
      hidden[1].style.display = "block";
    } else {
      hidden[0].style.display = "none";
      hidden[1].style.display = "none";
    }
  });

  function m() {
    location.href = "./attendance.php?condition=male";
  }

  function f() {
    location.href = "./attendance.php?condition=female";
  }

  function leaders() {
    location.href = "./attendance.php?condition=leaders";
  }

  function fyear() {
    location.href = "./attendance.php?condition=fyear";
  }

  function syear() {
    location.href = "./attendance.php?condition=syear";
  }

  function a() {
    location.href = "./attendance.php?condition=all";
  }

  selectall.addEventListener("click", (e) => {
    var chkall = document.querySelectorAll(".check");
    if (selectall.checked) {
      chkall.forEach((ele, i) => {
        ele.checked = true;
      });
    } else {
      chkall.forEach((ele, i) => {
        ele.checked = false;
      });
    }
  });
</script>

</html>