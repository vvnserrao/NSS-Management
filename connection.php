<?php
$conn = new mysqli("localhost", "root", "", "nss");

if ($conn->connect_errno) {
  echo "Failed to connect to MySQL: " . $conn->connect_error;
  exit();
}
