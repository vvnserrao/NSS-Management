  <center>
    <form action=" " method="post" enctype="multipart/form-data" ;>
      <h1 class="head">Upload Photos</h1></br></br>
      <input type="file" id="img" name="img" accept="image/*">
      <button name='submit'>Upload</button>
    </form>
  </center>
  <?php
  include("connection.php");
  include("nav_officer.php");
  include("css.php");
  if (isset($_POST["submit"])) {
    $img_name = $_FILES["img"]["name"];
    $img_path = $_FILES["img"]["tmp_name"];

    if (move_uploaded_file($img_path, "./img_upload/" . Date("Y") . $img_name)) {
      $path = './img_upload/' . Date("Y") . $img_name;
      $conn->query("INSERT INTO gallery(image_name) VALUE('$path')");
      echo "<script>alert('Image Uploaded Successfully')</script>";
    } else {
      echo "<script>alert('Unable to upload photo')</script>";
    }
  }
  ?>