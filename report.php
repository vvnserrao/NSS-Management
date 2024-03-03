<?php
include("nav_officer.php");
include("connection.php");
include("css.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Retrieve Information by Days</title>
</head>
<body> <center>
    <form method="POST" style="max-width: 600px;">
    <h1 class="head">Activity Report</h1></br>
            <input type="radio"id="date_wise" onclick="dw()" name="date_wise" value="date_wise" <?php if(isset($_GET["condition"])){ if($_GET["condition"] == 'date_wise') echo "checked";} ?>>
            <label for="radio1">Date Wise</label>
            <input type="radio" id="event_wise" onclick="ew()" name="event_wise" value="event_wise" <?php if(isset($_GET["condition"])){ if($_GET["condition"] == 'event_wise') echo "checked";} ?>>
            <label for="radio2">Event Wise</label> 
            <input type="radio" id="particular_event" onclick="pe()" name="particular_event" value="particular_event"<?php if(isset($_GET["condition"])){ if($_GET["condition"] == 'particular_event') echo "checked";} ?>>
            <label for="radio3">Particular Event</label>
    <?php
    if(isset($_GET["condition"]))
    {
      $condition =  $_GET["condition"];
      if($condition=="date_wise")
      {
        echo "<h2 style='margin-top:40px;'>Date Wise Report</h2>";

        echo "<label for='from'>From:</label>";
        echo "<input type='date' name='from' required>";

        echo "<label for='to'> To: </label>";
        echo "<input type='date' name='to' required></br>";

        echo "<button formaction='date_wise.php'>View</button>";
    }
    elseif($condition=="event_wise")
    {
        echo "<h2 style='margin-top:40px;'>Event Wise Report</h2>";
        echo"<label for='select_option'>Select an option:</label>";
        echo "<select name='select_option' required style='height:25px';>";
        echo "<option value=''>-- Select --</option>";
        
        $query = "SELECT  DISTINCT activity_name FROM report";
        $result = mysqli_query($conn, $query);
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $optionValue = $row['activity_name'];
                echo "<option value='$optionValue'>$optionValue</option>";
            }
            echo "</select></br>";
        } 
        else {
            echo "Error: " . mysqli_error($conn);
        }
        mysqli_close($conn); 
        echo "</br><label for='from'>From:</label>";
        echo "<input type='date' name='from' required>";
        
        echo "<label for='to'>To: </label>";
        echo "<input type='date' name='to' required></br>";   
        echo "<button formaction='event_wise.php'>View</button>";   
    }
    elseif($condition=="particular_event")
    {
        echo "<h2 style='margin-top:40px;'>Particular Event Report</h2>";
        echo"<label for='select_option'>Select an option:</label>";
        echo "<select name='select_option' required style='height:25px';>";
        echo "<option value=''>-- Select --</option>";
        $query = "SELECT activity_name,date FROM report";
        $result = mysqli_query($conn, $query);
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $newDate = date('d-m-Y', strtotime($row['date']));
                $optionValue = $row['activity_name'].' ['.$row['date'].']';
                $optiondisplay = $row['activity_name'].' ['.$newDate.']';
                echo "<option value='$optionValue'>$optiondisplay</option>";
            }
            echo "</select></br>";
            echo "<button formaction='particular_event.php'>View</button>";  
            } 
            else {
                echo "Error: " . mysqli_error($conn);
            }
            mysqli_close($conn);
    }
    echo "</form>";
      }
    ?>
</body>
<script>
     function dw()
      {
          location.href = "./report.php?condition=date_wise";
        }
     function ew()
      {
          location.href = "./report.php?condition=event_wise";
        }
     function pe()
      {
          location.href = "./report.php?condition=particular_event";
        }
    </script>
        </center>
</html>
