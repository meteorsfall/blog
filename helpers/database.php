<?php
function connect() {
  $servername = "localhost";
  $database = "blog";
  $username = "php";
  $password = "HsR0xf1eLJLqDC1YpJ8w";

  $conn = new mysqli($servername, $username, $password, $database);

  if ($conn->connect_errno) {
    die("Failed to connect" . mysqli_connect_error());
  }

  return $conn;
}
?>

