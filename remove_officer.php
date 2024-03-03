<?php
include("css.php");
include("connection.php");
include("nav_admin.php");
?>
<center>
    <form method="post" style=margin-top:115px;>
        <h2>Remove Officer</h2></br>
        <label>Enter Username: </label>
        <input type="text" name="username" required></br>
        </br><button name='submit'>Submit</button>
    </form>
    <?php
    if (isset($_POST["submit"])) {
        $username = $_POST['username'];
        $sql = "SELECT * FROM officer_profile where email='$username' and not otype='senior officer'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $sql = "update officer_profile set otype='senior officer' where email='$username'";
            if (mysqli_query($conn, $sql)) {
                $sql="update pass set type='senior officer' where username='$username'";
                mysqli_query($conn, $sql);
                echo "<script>alert('Officer Removed Successfully')</script>";
            } else {
                echo "<script>alert('Please Enter Proper name')</script>";
            }
        } else
            echo "<script>alert('Please Enter Proper name')</script>";
    }
    ?>
</center>