<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ajax";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$Nama = $_POST['Nama'];
$Email= $_POST['Email'];

$sql = "INSERT INTO `submit` (`Nama`, `Email`) VALUES ('$Nama', '$Email');";
$result = $conn->query($sql);

    $conn->close();
?> 