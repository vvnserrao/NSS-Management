<?php
include("css.php");
session_start();
if ($_SESSION["role"] == "secretary") {
  include("nav_secretary.php");
} elseif ($_SESSION["role"] == "officer") {
  include("nav_officer.php");
}
include("connection.php");

?>
<center>
  <form method="post" style="margin-top:100px;  max-width: 500px;">
    <h1 class="head">Assign Task</h1>
    <div class="container">
      <label for=""> Task Name:</label>
      <input type="text" id="task_name" name="task_name" required placeholder="Enter task name" style="height:30px;">
      <label for=""> Date:</label>
      <input type="date" id="date" name="date" min="<?php echo date('Y-m-d'); ?>" required>
      <label for="">No of Volunteer:</label>
      <input type="text" pattern="[0-9]+" title=" Please Enter only Numbers" id="no_volunteer" name="no_volunteer" required placeholder="Enter number of volunteers" style="height:30px;">
    </div>
    <button style="margin-top:30px;" id="assign_task" name="assign_task">Assign</button>

</center>
</form>
<?php
if (isset($_POST['assign_task'])) {
  $task = $_POST['task_name'];
  $date = $_POST['date'];
  $no_volunteer = $_POST['no_volunteer'];
  $sql = "INSERT INTO task (taskname,date,no_volunteer)Values('$task','$date','$no_volunteer')";
  mysqli_query($conn, $sql);
  echo "<script>alert('Task assigned Successfully')</script>";
  echo "<script>location.href = './assign.php'</script>";
}
?>
<!-- <script>
        const dateInput = document.getElementById('date');
        const today = new Date();
        dateInput.addEventListener('change', function () {
            const selectedDate = new Date(this.value);
            if (selectedDate < today) {
                alert("Please choose a proper date");
                this.value = '';
            }
        });
        </script> -->