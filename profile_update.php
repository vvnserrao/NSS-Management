<?php
include("css.php");
include("connection.php");
include("nav_officer.php");
?>
<center>
    <form method="post" style='margin-top:110px;'>
        <h2>Update profile</h2></br>
        <label for=""> Roll No:</label>

        <input type="text" onkeyup='check_no(rollno)' onchange="call_name()" id="rollno" name="rollno" required placeholder="Enter your Rollno" style="height:30px;">
        <label id='hint' style="position: absolute; left:48%;top:34%; color:green"></label>
        </br></br><label for='select_option'> Select Field:</label>
        <select name='column' required style='height:30px;width:200px;' ;>
            <option value=''>-- Select --</option>
            <?php
            // $query = "SELECT COLUMN_NAME FROM nss WHERE  TABLE_NAME = '$tableName'";
            $query = "SHOW COLUMNS FROM volunteer_profile";
            $result = $conn->query($query);

            // Step 3: Fetch the column names and store them in an array
            $columns = array();
            while ($row = $result->fetch_row()) {
                $columns[] = $row[0];
            }

            // Step 4: Generate HTML code for the dropdown list
            // echo '<select name="columnDropdown">';
            foreach ($columns as $column) {
                if ($column == 'img')
                    break;
                echo '<option value="' . $column . '">' . $column . '</option>';
            }
            echo '</select>';
            ?>
            </br></br><label for="">Update:</label>
            <input type="text" id="update" name="update" required placeholder="Enter name update" style="height:30px;">
            <button style="margin-top: 35px" id="submit" name="submit">Submit</button>
    </form>
    <?php
    if (isset($_POST["submit"])) {

        $rollno = $_POST['rollno'];
        $column = $_POST['column'];
        $field = $_POST['update'];

        $sql = "UPDATE volunteer_profile set $column='$field' where rollno='$rollno'";
        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Detailes Upated Successfully')</script>";
            if ($column == 'vtype') {
                $sql = "Update pass set type='secretary' where username='$rollno'";
                mysqli_query($conn, $sql);
            }
        } else {
            echo "<script>alert('unable to update')</script>";
        }
    }
    ?>

    <script>
        function call_name() {
            fetch('./hint.php?rollno=' + rollno.value).then((res) => res.json()).then((data) => {
                if (data.name) {
                    hint.innerHTML = data.name;
                }
            })
        }
    </script>