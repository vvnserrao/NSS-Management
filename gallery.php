<!DOCTYPE html>
<html>

<head>
  <title>Gallery View</title>
  <style>
    .gallery {
      display: flex;
      flex-wrap: wrap;
    }

    .gallery-item {
      width: auto;
      height: 200px;
      margin: 5px;
      border: 1px solid #ccc;
      overflow: hidden;
    }

    .gallery-item img {
      width: 100%;
      height: 100%;
    }
  </style>
</head>

<body>
  <?php

  function year($date)
  {
    $yer = explode("-", $date);
    return $yer[0];
  }
  include('connection.php');
  $y = (int)Date('Y');
  while ($y >= 2000) {
    $sql = "SELECT * FROM gallery WHERE img_date BETWEEN  '" . $y . "-01-01' AND '" . $y . "-12-31'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      echo " <div class='gallery'>";
      echo " <div style='width:100vw;'>Year " . $y . "</div>";
      while ($row = $result->fetch_assoc()) {
        $img1 = $row['image_name'];
        echo "<div class='gallery-item'>";
        echo "<img src='" . $img1 . "' alt='Image 1'>";
        echo "</div>";
      }
      echo "</div>";
    }
    $y--;
  }
  ?>
</body>

</html>